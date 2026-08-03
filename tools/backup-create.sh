#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT_DIR"

SUMMARY="${1:-Sauvegarde manuelle}"
STAMP="$(date '+%Y-%m-%d_%H-%M-%S')"
VERSION="v${STAMP}"
BACKUP_DIR=".cosmethique-backups"
SNAPSHOT_DIR="${BACKUP_DIR}/snapshots"
MANIFEST_DIR="${BACKUP_DIR}/manifests"
HISTORY_DIR="${BACKUP_DIR}/history"
CHECKSUM_DIR="${BACKUP_DIR}/checksums"
STATE_DIR="${BACKUP_DIR}/state"
ARCHIVE="${SNAPSHOT_DIR}/${VERSION}.tar.gz"
MANIFEST="${MANIFEST_DIR}/${VERSION}.txt"
HISTORY="${HISTORY_DIR}/${VERSION}.md"
CHECKSUMS="${CHECKSUM_DIR}/${VERSION}.sha256"
LAST_CHECKSUMS="${STATE_DIR}/last.sha256"

mkdir -p "$SNAPSHOT_DIR" "$MANIFEST_DIR" "$HISTORY_DIR" "$CHECKSUM_DIR" "$STATE_DIR"

find . -type f \
    ! -path './.git/*' \
    ! -path './.cosmethique-backups/*' \
    ! -name '.DS_Store' \
    | sed 's#^\./##' \
    | sort > "$MANIFEST"

while IFS= read -r file; do
    hash="$(shasum -a 256 "$file" | awk '{print $1}')"
    printf '%s %s\n' "$file" "$hash"
done < "$MANIFEST" | sort > "$CHECKSUMS"

if command -v git >/dev/null 2>&1 && git rev-parse --is-inside-work-tree >/dev/null 2>&1; then
    CHANGED_FILES="$(git status --short | sed 's/^...//' | sed '/^$/d' || true)"
elif [ -f "$LAST_CHECKSUMS" ]; then
    ADDED_OR_MODIFIED="$(awk 'NR==FNR { old[$1]=$2; next } !($1 in old) || old[$1] != $2 { print $1 }' "$LAST_CHECKSUMS" "$CHECKSUMS" || true)"
    DELETED_FILES="$(awk 'NR==FNR { current[$1]=$2; next } !($1 in current) { print $1 }' "$CHECKSUMS" "$LAST_CHECKSUMS" || true)"
    CHANGED_FILES="$(
        {
            if [ -n "$ADDED_OR_MODIFIED" ]; then
                printf '%s\n' "$ADDED_OR_MODIFIED"
            fi
            if [ -n "$DELETED_FILES" ]; then
                printf '%s\n' "$DELETED_FILES" | sed 's/^/[supprimé] /'
            fi
        } | sed '/^$/d' | sort -u
    )"
else
    CHANGED_FILES="$(cat "$MANIFEST")"
fi

{
    echo ""
    echo "## $(date '+%Y-%m-%d %H:%M') - Version ${VERSION}"
    echo ""
    echo "Résumé :"
    echo "- ${SUMMARY}"
    echo ""
    echo "Fichiers modifiés :"
    if [ -n "$CHANGED_FILES" ]; then
        printf '%s\n' "$CHANGED_FILES" | sed 's/^/- /'
    else
        echo "- Aucun changement détecté depuis la dernière version."
    fi
    echo ""
    echo "Corrections de bugs :"
    echo "- À renseigner si applicable."
    echo ""
    echo "Archive :"
    echo "- \`${ARCHIVE}\`"
} >> CHANGELOG.md

tar --exclude='./.git' \
    --exclude='./.cosmethique-backups' \
    --exclude='./.DS_Store' \
    -czf "$ARCHIVE" .

{
    echo "# ${VERSION}"
    echo ""
    echo "Date : $(date '+%Y-%m-%d %H:%M:%S')"
    echo ""
    echo "Résumé : ${SUMMARY}"
    echo ""
    echo "Archive : ${ARCHIVE}"
    echo "Manifeste : ${MANIFEST}"
    echo "Empreintes : ${CHECKSUMS}"
    echo ""
    echo "Fichiers sauvegardés : $(wc -l < "$MANIFEST" | tr -d ' ')"
} > "$HISTORY"

cp "$CHECKSUMS" "$LAST_CHECKSUMS"

if command -v git >/dev/null 2>&1 && git rev-parse --is-inside-work-tree >/dev/null 2>&1; then
    git add -A
    if ! git diff --cached --quiet; then
        git commit -m "Backup ${VERSION}: ${SUMMARY}" >/dev/null
    fi
    git tag -a "$VERSION" -m "$SUMMARY" >/dev/null 2>&1 || true
fi

echo "Sauvegarde créée : ${VERSION}"
echo "Archive : ${ARCHIVE}"
echo "Manifeste : ${MANIFEST}"
