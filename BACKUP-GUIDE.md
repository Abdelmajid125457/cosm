# Système de sauvegarde COSM'ÉTHIQUE

Ce projet utilise des sauvegardes locales complètes :

1. Des archives complètes dans `.cosmethique-backups/snapshots/`.
2. Un manifeste de fichiers pour chaque version dans `.cosmethique-backups/manifests/`.
3. Un historique lisible dans `.cosmethique-backups/history/` et dans `CHANGELOG.md`.

## Créer une sauvegarde

Depuis la racine du thème :

```bash
./tools/backup-create.sh "Résumé de la modification"
```

Le script :
- met à jour `CHANGELOG.md` ;
- vérifie la liste complète des fichiers inclus ;
- crée une archive `.tar.gz` ;
- crée un manifeste des fichiers sauvegardés ;
- ajoute un commit/tag Git uniquement si le projet est déjà dans un dépôt Git accessible.

## Restaurer une sauvegarde

Depuis la racine du thème :

```bash
./tools/backup-restore.sh NOM_DE_VERSION
```

Exemple :

```bash
./tools/backup-restore.sh reference-2026-08-03_22-54-34
```

Le script crée d'abord une sauvegarde de sécurité avant restauration, puis restaure l'archive demandée.

## Règle obligatoire

Avant chaque modification importante :

```bash
./tools/backup-create.sh "Point de restauration avant modification"
```

Après chaque intervention :

```bash
./tools/backup-create.sh "Résumé des changements réalisés"
```

Ne jamais supprimer les anciennes archives dans `.cosmethique-backups/snapshots/`.
