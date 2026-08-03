# Theme Perso - Cosmethique

Un thème WordPress personnalisé et moderne pour le site Cosmethique.

## Description

Theme Perso est un thème WordPress complet et fonctionnel, développé spécifiquement pour répondre aux besoins du site Cosmethique. Il est basé sur les bonnes pratiques de développement WordPress et est entièrement personnalisable.

## Fonctionnalités

- **Design Responsive** : Adapté à tous les appareils (mobile, tablette, desktop)
- **Menu Personnalisé** : Support des menus de navigation personnalisés
- **Sidebar Dynamique** : Zones de widgets pour le contenu dynamique
- **Support des Commentaires** : Système complet de commentaires
- **Images Mises en Avant** : Support des images principales pour les articles
- **Formats d'Articles** : Support de différents formats (galerie, vidéo, etc.)
- **Moteur de Recherche** : Template de recherche complet
- **Pages d'Erreur** : Page 404 personnalisée
- **Archives** : Support des archives par catégorie, tag, auteur et date
- **Optimisation SEO** : Structure correcte pour le référencement

## Structure du Thème

```
theme-perso/
├── index.php              # Template principal
├── header.php             # En-tête du site
├── footer.php             # Pied de page du site
├── single.php             # Template pour les articles
├── page.php               # Template pour les pages
├── archive.php            # Template pour les archives
├── search.php             # Template pour la recherche
├── 404.php                # Template pour l'erreur 404
├── comments.php           # Template pour les commentaires
├── functions.php          # Functions du thème
├── style.css              # Styles du thème
├── js/
│   └── main.js            # JavaScript principal
├── languages/             # Fichiers de traduction
└── README.md              # Ce fichier
```

## Installation

1. Téléchargez le dossier `theme-perso`
2. Placez-le dans `/wp-content/themes/`
3. Allez dans le panneau d'administration WordPress
4. Naviguez vers Apparence > Thèmes
5. Activez le thème "Theme Personnalisé Cosmethique"

## Configuration

### Menus de Navigation

1. Allez dans Apparence > Menus
2. Créez un nouveau menu (par ex. "Menu Principal")
3. Ajoutez vos éléments de menu
4. Assignez le menu à "Menu Principal" dans les paramètres

### Widgets

1. Allez dans Apparence > Widgets
2. Ajoutez des widgets aux différentes zones :
   - Sidebar Principale
   - Footer Widget 1, 2, 3

### Logo Personnalisé

1. Allez dans Apparence > Personnaliser
2. Cliquez sur "Identité du Site"
3. Téléchargez votre logo

## Personnalisation

### Modifier les Couleurs

Éditez le fichier `style.css` et modifiez les variables CSS ou les couleurs directement dans les classes.

### Ajouter des Styles Personnalisés

Vous pouvez ajouter vos styles personnalisés directement dans `style.css` ou créer un fichier `custom.css` supplémentaire et l'enqueuer dans `functions.php`.

### JavaScript Personnalisé

Modifiez le fichier `js/main.js` pour ajouter vos propres fonctionnalités JavaScript.

## Support des Navigateurs

- Chrome (dernière version)
- Firefox (dernière version)
- Safari (dernière version)
- Edge (dernière version)
- Mobile browsers

## Traductions

Pour ajouter une traduction :

1. Créez un dossier `languages` s'il n'existe pas
2. Utilisez un outil comme Poedit pour créer les fichiers `.po` et `.mo`
3. Nommez-les `theme-perso-fr_FR.po` et `theme-perso-fr_FR.mo`

## Mise à Jour

Pour mettre à jour le thème, téléchargez la dernière version et remplacez les fichiers existants.

## Licence

GNU General Public License v2 ou ultérieure

## Auteur

Abdelmajid Benider

## Ressources Utiles

- [Documentation WordPress](https://developer.wordpress.org/)
- [WordPress Plugin et Theme Handbook](https://developer.wordpress.org/plugins/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)

---

**Version:** 1.0.0  
**Date:** 21 mai 2026
