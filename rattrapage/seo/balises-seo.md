# Optimisation des balises SEO - COSM'ÉTHIQUE

Suite au retour du jury, les balises SEO du site ont été retravaillées afin d’améliorer la lisibilité pour les moteurs de recherche : title, meta description, H1/H2, balises ALT, Open Graph, canonical, sitemap et données structurées lorsque cela est pertinent.

## Objectif

L’objectif de cette correction est de rendre le site COSM'ÉTHIQUE plus clair pour les moteurs de recherche sans modifier le design ni l’expérience utilisateur. Les pages principales, les catégories WooCommerce, les fiches produits, les pages franchise, les pages légales et les pages système disposent désormais d’un contexte SEO cohérent.

## Optimisations réalisées

- Centralisation des titres SEO, descriptions, canonical, Open Graph et Twitter Cards dans une couche dédiée du thème.
- Compatibilité avec Yoast SEO : lorsque Yoast est actif, les valeurs du thème alimentent les filtres Yoast au lieu de créer des doublons.
- Fallback complet si Yoast est désactivé : meta description, robots, canonical, Open Graph, Twitter Card et JSON-LD sont générés proprement.
- Ajout de données structurées adaptées selon le type de page : WebSite, WebPage, CollectionPage, Product, BlogPosting, Event, FAQPage, ContactPage et CheckoutPage.
- Amélioration des balises ALT : les images produits reçoivent un texte alternatif basé sur le nom du produit, et les autres images importantes disposent d’un fallback descriptif.
- Gestion des pages à ne pas indexer automatiquement : recherche interne et page 404.

## Pages couvertes

- Accueil
- Boutique
- Catégories produits : soins visage, soins corps, soins cheveux, accessoires, packs, promotions, Collection Botanica
- Fiches produits WooCommerce, dont les produits Botanica
- Diagnostic beauté
- Qui sommes-nous / Notre histoire
- Nos engagements
- Nos ingrédients
- Fabrication & qualité
- FAQ
- Blog et articles
- Contact
- Devenir franchisé
- Formation franchisés
- Éligibilité franchise
- Candidature franchise
- Confirmation franchise
- Recrutement
- Mon compte
- Panier
- Paiement / commande
- Plan du site
- Événement Botanica
- Mentions légales, CGV, CGU, Politique de confidentialité, Politique de cookies
- Recherche et page 404

## Cohérence avec Yoast SEO

Le thème ne remplace pas Yoast SEO. Il fournit des valeurs propres via les filtres WordPress/Yoast :

- `wpseo_title`
- `wpseo_metadesc`
- `wpseo_canonical`
- `wpseo_opengraph_title`
- `wpseo_opengraph_desc`
- `wpseo_opengraph_image`
- `wpseo_twitter_title`
- `wpseo_twitter_description`
- `wpseo_twitter_image`
- `wpseo_robots`

Si Yoast SEO est absent ou désactivé, le thème génère lui-même les balises essentielles afin d’éviter une page sans meta description ou canonical.

## Comment le présenter au jury

Cette amélioration montre que le site ne se limite pas au rendu visuel. Il est également préparé pour la visibilité, la structure technique et la compréhension par les moteurs de recherche. Le travail couvre les balises visibles par Google, les données structurées, les partages sociaux, les images et les pages e-commerce.

Phrase de synthèse :

> Le site COSM'ÉTHIQUE dispose désormais d’une base SEO homogène : chaque page importante possède un titre optimisé, une meta description claire, une canonical cohérente, des données Open Graph et, lorsque c’est pertinent, des données structurées adaptées au type de contenu.
