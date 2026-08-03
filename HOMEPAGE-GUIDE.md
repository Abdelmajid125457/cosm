# COSM'ETHIQUE - Page d'Accueil Premium

Guide complet pour utiliser et personnaliser la page d'accueil premium de COSM'ETHIQUE.

## 🎨 Vue d'Ensemble du Design

### Palette de Couleurs
```
Beige Principal:       #F5F1EB
Beige Foncé:         #E8DFD5
Vert Sauge:          #8B9D83
Vert Sauge Foncé:    #6B7D63
Crème:               #FBF9F6
Or/Gold:             #D4A574
Blanc:               #FFFFFF
Gris Foncé:          #2A2A2A
Gris:                #6B6B6B
```

### Typographie
- **Serif (Titres)**: Cormorant Garamond
  - Weights: 400, 500, 600, 700
- **Sans-Serif (Corps)**: DM Sans
  - Weights: 400, 500, 600, 700

### Effets Visuels
- Glassmorphism avec blur effect
- Ombres douces et subtiles
- Animations scroll fluides
- Hover effects élégants
- Bordures arrondies 4px/8px
- Transitions 0.3s-0.5s

## 📁 Structure des Fichiers

```
theme-perso/
├── home.php                          # Template de la page d'accueil
├── css/
│   └── home-premium.css             # Styles premium (1500+ lignes)
├── js/
│   ├── main.js                      # JavaScript de base
│   └── home-animations.js           # Animations et interactions
├── images/
│   ├── hero-cosmetics.jpg           # Hero image (1920x1080)
│   ├── banner-new-collection.jpg    # Bannière collection (1000x600)
│   ├── banner-promotion.jpg         # Bannière promotion (1000x600)
│   └── storytelling.jpg             # Image storytelling (600x600)
├── functions.php                    # Mise à jour avec enqueue assets
└── images-config.php               # Configuration des images
```

## 🚀 Installation & Activation

### 1. Activer la Page d'Accueil

```
WordPress Admin > Réglages > Lecture
Définir la page d'accueil statique sur votre page home
```

### 2. Vérifier l'Enqueuing des Assets

Les fichiers suivants sont automatiquement chargés:
- `css/home-premium.css` - 1500+ lignes de styles premium
- `js/home-animations.js` - Animations et interactions
- AOS Library (CDN) - Pour les animations scroll

### 3. Configuration WooCommerce

La page affiche:
- 3 produits les plus vendus
- Prix régulier et promo
- Boutons "Ajouter au panier"
- Intégration automatique avec WooCommerce

**Important**: Assurer que WooCommerce est installé et activé.

## 🎯 Sections de la Page

### 1. Promo Bar (Sticky)
- Position: sticky en haut
- Message promotionnel configurable
- Icône de livraison
- Hauteur: 42px

**À modifier en dur dans home.php** ligne ~15:
```html
<span>Livraison offerte dès 40€ d'achat</span>
```

### 2. Header / Navbar
- Sticky après la promo bar
- Logo + titre du site
- Menu principal dynamique
- Glassmorphism effect
- Z-index: 99 (sous promo bar)

### 3. Hero Section
- 100% viewport height (min 700px)
- Background image avec overlay
- Parallax effect au scroll
- Contenu centré et animé
- Badge "100% Naturel & Cruelty Free"
- Titre principal (4.5rem max)
- Boutons d'action
- Carte testimonial glassmorphism
- Scroll indicator animé

**Images requises:**
- `hero-cosmetics.jpg` (1920x1080px minimum)

### 4. Trust Bar
- 5 éléments de confiance
- Icônes SVG animées
- Grid responsive
- Design minimaliste

Éléments (modifiables):
- Livraison Rapide
- 100% Bio
- Paiement Sécurisé
- Cruelty Free
- Éco-Responsable

### 5. Section Catégories
- 4 cartes de catégories
- Icônes SVG personnalisées
- Hover animations
- Texte descriptif

Catégories (modifiables):
- Soins Visage
- Soins Corps
- Soins Cheveux
- Aromathérapie

### 6. Section Produits Vedettes
- Affiche 3 produits WooCommerce (best sellers)
- Images produits
- Prix régulier + promo
- Bouton "Ajouter au panier"
- Animations hover
- Rating stars

**Dynamique**: Requête WP_Query pour les produits
- Tri: par ventes (total_sales)
- Nombre: 3 produits
- Post type: 'product'

### 7. Bannières Promotionnelles
- 2 bannières side-by-side
- Images lifestyle
- Overlay dynamique au hover
- CTA buttons
- Responsive (1 colonne en mobile)

**Images requises:**
- `banner-new-collection.jpg`
- `banner-promotion.jpg`

### 8. Section Storytelling
- Texte + Image côte à côte
- Histoire de la marque
- Bouton "En savoir plus"
- Layout responsive

### 9. Section Avis Clients
- 3 cartes testimoniales
- Photos avatar (Gravatar)
- Étoiles rating
- Citations premium
- Carousel responsive

### 10. Section Blog / Magazine
- Affiche 3 articles récents
- Images, catégories, dates
- Extraits d'articles
- Liens "Lire plus"

**Dynamique**: WP_Query pour articles
- Tri: par date (DESC)
- Nombre: 3 articles
- Post type: 'post'

### 11. Newsletter
- Fond beige/crème gradient
- Champ email + bouton
- Note de confidentialité
- Validation simple JS

### 12. Footer Premium
- Fond gris foncé
- 3 zones de widgets
- Menu footer
- Crédits et mentions légales
- Design minimaliste élégant

## ⚙️ Personnalisation

### Changer les Couleurs

Éditer `css/home-premium.css` (lignes 13-25):

```css
:root {
    --color-beige: #F5F1EB;        /* Changer la couleur */
    --color-sage: #8B9D83;          /* Couleur principale */
    --color-gold: #D4A574;          /* Couleur accentuation */
}
```

### Modifier les Textes

- **Promo Bar**: `home.php` ligne ~15
- **Hero Title**: `home.php` ligne ~35
- **Trust Items**: `home.php` lignes ~55-95
- **Catégories**: `home.php` lignes ~110-150
- **Newsletter**: `home.php` ligne ~320

### Ajouter/Modifier les Images

1. Placer les images dans `/images/`
2. Mettre à jour les chemins dans `home.php`

Chemins actuels:
```php
get_template_directory_uri() . '/images/hero-cosmetics.jpg'
get_template_directory_uri() . '/images/banner-new-collection.jpg'
get_template_directory_uri() . '/images/banner-promotion.jpg'
get_template_directory_uri() . '/images/storytelling.jpg'
```

### Modifier les Polices

Éditer `home-premium.css` ligne ~20:
```css
@import url('https://fonts.googleapis.com/css2?family=VOTRE_POLICE');
```

### Ajouter/Supprimer des Sections

1. Copier la section HTML dans `home.php`
2. Créer les styles dans `home-premium.css`
3. Ajouter les animations si nécessaire dans `js/home-animations.js`

## 📱 Responsive Design

### Breakpoints
- **Desktop**: 1200px+ (largeur complète)
- **Tablet**: 768px-1200px
- **Mobile**: < 768px

### Spécificités Mobile

- Hero height réduit (80vh)
- Buttons empilés verticalement
- Images optimisées
- Grids une colonne
- Font sizes réduites

CSS Media Queries: `home-premium.css` lignes ~1200+

## 🎬 Animations & Interactions

### AOS (Animate On Scroll)
- Bibliothèque: https://unpkg.com/aos@next
- Chargée depuis CDN automatiquement
- Animations: fade-up, fade-down, fade-left, fade-right

Attributs HTML:
```html
<div data-aos="fade-up" data-aos-delay="200">Contenu</div>
```

### Animations JavaScript

Fichier: `js/home-animations.js`

Fonctionnalités:
- Smooth scroll pour ancres
- Parallax hero effect
- Mobile menu toggle
- Navbar shadow au scroll
- Hover animations
- Form enhancements
- Scroll to top button
- Counter animations

### Keyframe Animations

Définies dans `home-premium.css`:
- `@keyframes bounce` - Scroll indicator
- `@keyframes slideInUp` - Éléments au scroll
- `@keyframes pulse` - Éléments qui clignotent
- `@keyframes floatToCart` - Animation produit au panier

## 🔧 Intégrations

### WooCommerce
- Requêtes SQL pour produits best sellers
- Boutons "Ajouter au panier" fonctionnels
- Affichage prix promo/régulier
- Ratings stars produits

### WordPress
- WP_Query pour articles blog
- Dynamic sidebar widgets
- Navigation menus
- Featured images
- Custom post types support

### Google Fonts
- Cormorant Garamond (serif)
- DM Sans (sans-serif)
- Chargement depuis Google Fonts CDN

## 🎯 Optimisations

### Performance
- Images lazy loading (loading="lazy")
- CSS critiques en priorité
- JS déféré (defer)
- Minification CSS
- Font loading asynchrone

### SEO
- HTML5 sémantique
- Meta tags (title, description)
- Headings hiérarchiques
- Alt text images
- Schema markup prêt

### Accessibilité
- ARIA labels préparés
- Navigation au clavier
- Contraste couleurs optimisé
- Skip links prêts
- Boutons accessibles

## 🐛 Troubleshooting

### Images ne s'affichent pas
1. Vérifier le chemin `/images/`
2. Vérifier permissions fichiers
3. Utiliser des URLs absolues en dev

### Animations ne fonctionnent pas
1. Vérifier chargement AOS: `https://unpkg.com/aos@next/dist/aos.js`
2. Vérifier `home-animations.js` est chargé
3. Ouvrir DevTools > Console pour erreurs

### Produits ne s'affichent pas
1. Installer et activer WooCommerce
2. Créer quelques produits de test
3. Vérifier la requête WP_Query

### Styles ne s'appliquent pas
1. Vérifier `home-premium.css` est enqueué
2. Hard refresh navigateur (Ctrl+Shift+R)
3. Vérifier pas de conflit avec plugins

### Menu ne fonctionne pas
1. Créer un menu dans WordPress Admin
2. L'assigner à "Menu Principal"
3. Vérifier structure HTML

## 📊 Performance Metrics

Cibles de performance:
- **LCP**: < 2.5s
- **FID**: < 100ms
- **CLS**: < 0.1
- **PageSpeed**: > 90

Mesurer avec:
- Google PageSpeed Insights
- GTmetrix
- WebPageTest

## 🔐 Sécurité

Bonnes pratiques implémentées:
- ✅ `esc_html()` pour textes
- ✅ `esc_url()` pour URLs
- ✅ `esc_attr()` pour attributs
- ✅ `wp_kses_post()` pour contenu riche
- ✅ Nonces sur formulaires (à ajouter)
- ✅ Validation entrées utilisateur

## 📚 Ressources Utiles

- [WordPress Theme Development](https://developer.wordpress.org/themes/)
- [WooCommerce Template Structure](https://docs.woocommerce.com/document/template-structure/)
- [AOS Documentation](https://github.com/michalsnik/aos)
- [Google Fonts](https://fonts.google.com/)
- [Inspiration Design](https://www.awwwards.com/)

## 📞 Support & Maintenance

### À faire régulièrement
- Mettre à jour WordPress
- Mettre à jour les plugins
- Tester les formulaires
- Vérifier les images
- Optimiser la base de données

### Avant la production
- ✅ Tester tous les navigateurs
- ✅ Tester sur mobiles (iOS + Android)
- ✅ Optimiser les images
- ✅ Minifier CSS/JS
- ✅ Configurer CDN
- ✅ Tests de sécurité
- ✅ Tests de performance
- ✅ Tests d'accessibilité

## 🎉 Version & Updates

**Version**: 1.0.0  
**Date**: 21 mai 2026  
**Compatibilité**: WordPress 5.0+, WooCommerce 5.0+

---

**Theme**: COSM'ETHIQUE Premium  
**Developer**: Abdelmajid Benider  
**License**: GPL v2 or later
