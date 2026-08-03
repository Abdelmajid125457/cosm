#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT_DIR"

VERSION="${1:-}"

if [ -z "$VERSION" ]; then
    echo "Usage : ./tools/backup-restore.sh NOM_DE_VERSION"
    echo "Versions disponibles :"
    find .cosmethique-backups/snapshots -maxdepth 1 -type f -name '*.tar.gz' 2>/dev/null | sed 's#.*/##; s#\.tar\.gz$##' | sort
    exit 1
fi

ARCHIVE=".cosmethique-backups/snapshots/${VERSION}.tar.gz"

if [ ! -f "$ARCHIVE" ]; then
    echo "Archive introuvable : ${ARCHIVE}"
    echo "Versions disponibles :"
    find .cosmethique-backups/snapshots -maxdepth 1 -type f -name '*.tar.gz' 2>/dev/null | sed 's#.*/##; s#\.tar\.gz$##' | sort
    exit 1
fi

if [ -x "./tools/backup-create.sh" ]; then
    ./tools/backup-create.sh "Sauvegarde automatique avant restauration de ${VERSION}" >/dev/null
fi

find . -mindepth 1 \
    ! -path './.git' \
    ! -path './.git/*' \
    ! -path './.cosmethique-backups' \
    ! -path './.cosmethique-backups/*' \
    -exec rm -rf {} +

tar -xzf "$ARCHIVE" -C .

echo "Version restaurée : ${VERSION}"
