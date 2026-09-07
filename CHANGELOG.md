# Changelog COSM'ÉTHIQUE

Toutes les interventions sur le thème doivent être sauvegardées et documentées ici.

## 2026-09-07 15:50 - Reprise Événement Botanica : vraie interaction et CSS final

Résumé :
- Reprise stricte de la page Événement pour supprimer le système refusé basé sur image/popup.
- Reconstruction de l’expérience du pot Botanica en éléments HTML/CSS indépendants : pot, couvercle, crème, fumée, particules, halo et lumière dorée.
- Révélation progressive des produits Botanica autour du pot après ouverture : Sérum, Huile, Masque, Baume et Coffret.
- Ajout d’une fiche produit premium inline au clic sur chaque produit du Hero, avec prix, description, ingrédients et bouton d’ajout au panier.
- Remplacement de l’ancienne section "Expérience 3D" par une boutique Botanica réelle avec 6 produits, prix, badges, découverte produit et ajout panier.
- Correction des règles CSS mal fermées qui empêchaient la grille responsive et l’affichage des produits révélés de fonctionner correctement.

Fichiers modifiés :
- `template-parts/page-evenement.php`
- `style.css`
- `js/main.js`
- `CHANGELOG.md`

Corrections de bugs :
- Suppression confirmée des anciens sélecteurs liés à l’image géante, au drawer/popup et à la lightbox.
- Correction de l’opacité des produits révélés autour du pot.
- Correction de la grille Botanica : 4 colonnes desktop, 2 tablette, 1 mobile.
- Vérification PHP : `template-parts/page-evenement.php` sans erreur de syntaxe.
- Vérification JavaScript : `js/main.js` valide avec `node --check`.
- Vérification navigateur : pot ouvrable, produits révélés, panneau produit fonctionnel, ajout au panier testé, aucun débordement horizontal.

## 2026-09-07 01:07 - Page Événement Botanica : interaction, boutique et panier

Résumé :
- Création d'un point de restauration avant intervention : `5d17b00`.
- Correction de l'ouverture interactive du pot Botanica avec fumée, lumière dorée, particules et révélation progressive des produits.
- Suppression complète de l'ancienne section "Expérience 3D / Explorez la formule sous tous les angles".
- Création d'une section "Boutique Collection Botanica" avec 6 produits WooCommerce réels, prix, badges, boutons Découvrir et Ajouter au panier.
- Création d'un panneau produit premium avec grande image, galerie, ingrédients, bénéfices, conseils d'utilisation, prix, quantité et ajout panier.
- Ajout d'une logique AJAX dédiée à la page Événement pour garantir l'ajout au panier sans navigation ni conflit WooCommerce.
- Ajustements responsive de la grille Botanica : 4 colonnes desktop, 2 tablette, 1 mobile.

Fichiers modifiés :
- `functions.php`
- `template-parts/page-evenement.php`
- `style.css`
- `js/main.js`
- `CHANGELOG.md`

Corrections de bugs :
- Correction du conflit qui gardait le pot ouvert et les produits révélés invisibles dans certains états d'animation.
- Correction des miniatures du panneau produit afin qu'elles soient générées et stylées correctement.
- Vérification PHP : `functions.php` et `template-parts/page-evenement.php` sans erreur de syntaxe.
- Vérification JavaScript : `js/main.js` valide avec `node --check`.
- Vérification navigateur : pot ouvrable, 6 produits Botanica affichés, panneau produit ouvrable, ajout au panier fonctionnel.
- Vérification responsive : desktop, iPad Mini, iPhone 14 Pro Max et iPhone SE sans débordement horizontal.

## 2026-09-06 22:30 - Hero Événement Botanica premium

Résumé :
- Création d'un point de restauration avant intervention : `802eddb`.
- Refonte ciblée du Hero de la page Événement avec les visuels HD Botanica déjà présents dans le thème.
- Suppression du bouton "Voir la bande-annonce" dans le Hero.
- Remplacement complet du pot dessiné en CSS par une composition photographique Botanica : pot principal, sérum, huile, brume, masque et coffret.
- Ajout d'une mise en scène cinématique : décor assombri, halo doré, rayons lumineux, poussières, particules, reflets et sceau "Édition limitée".
- Ajout d'une ouverture progressive du pot et d'une apparition fluide des produits autour du visuel principal.
- Ajout de fiches interactives premium au clic sur les produits et points d'information, avec ingrédients, bénéfices et bouton "Découvrir".
- Ajustements responsive desktop, tablette et mobile sans modifier les autres pages du site.

Fichiers modifiés :
- `template-parts/page-evenement.php`
- `style.css`
- `js/main.js`
- `CHANGELOG.md`

Corrections de bugs :
- Suppression des styles et animations liés à l'ancien faux pot CSS.
- Correction des zones cliquables des produits afin que les images internes ne captent pas le clic.
- Vérification JavaScript : `js/main.js` valide avec `node --check`.
- Vérification Git : `git diff --check` sans erreur.
- Test navigateur local non exécuté : `cosmethique.local` ne répondait pas depuis l'environnement de travail au moment du contrôle.

## 2026-09-05 11:00 - Corrections finales du Hero Botanica et du header d'accueil

Résumé :
- Création d'un point de restauration avant intervention : `dc7ab87`.
- Suppression complète de l'indicateur "Explorer le lancement" en bas du Hero, avec retrait du HTML, du CSS et de l'animation JavaScript associée.
- Conservation d'un seul CTA dans le Hero : "Découvrir le lancement", relié à la page Événement.
- Retrait du lien "Événements" de la navigation principale sans supprimer la page `/evenement/`.
- Désactivation du fil d'Ariane uniquement sur la page d'accueil afin de supprimer la bande blanche entre le header et le Hero.
- Correction du décalage hérité de `css/home-premium.css` qui ajoutait `margin-top:-200px` et `padding-top:200px` au Hero.
- Ajout d'un header d'accueil plus premium : effet glass sombre, transparence légère, blur subtil et absence de bordure visible.
- Recentrage vertical du contenu éditorial du Hero pour mieux équilibrer texte, bouton, badges et compte à rebours avec la composition produit.

Fichiers modifiés :
- `front-page.php`
- `functions.php`
- `style.css`
- `css/home-premium.css`
- `css/mobile-responsive.css`
- `js/main.js`
- `CHANGELOG.md`

Corrections de bugs :
- Vérification navigateur desktop : écart header/Hero à `0px`, aucun fil d'Ariane sur l'accueil, aucun lien "Événements" dans le menu principal, aucun texte "Explorer le lancement".
- Vérification navigateur : un seul CTA dans le Hero, lien correct vers `/evenement/`, aucun débordement horizontal.
- Vérification tablette 768px : aucun débordement horizontal et mêmes suppressions confirmées.
- Vérification JavaScript : `js/main.js` valide avec `node --check`.
- Vérification Git : `git diff --check` sans erreur.

## 2026-09-05 10:40 - Hero d'accueil Botanica cinématique

Résumé :
- Création d'un point de restauration avant intervention : `49a2264`.
- Suppression complète de l'effet "panneau" autour du texte pour intégrer naturellement le contenu dans le décor.
- Remplacement des cartes Date/Lieu par deux badges compacts en glassmorphism.
- Renforcement de la mise en scène Botanica avec fond assombri, flou cinématique, halo doré, rayon lumineux, poussières, particules et feuilles animées.
- Recomposition du visuel produit pour donner plus de profondeur, de lumière et de présence aux packagings Botanica.
- Conservation d'un seul CTA principal : "Découvrir le lancement", relié à la page Événement.
- Refonte du compte à rebours en bloc premium plus léger avec contour doré discret et animation fluide.
- Synchronisation des animations d'arrivée : décor, produits, texte, bouton, badges puis compteur.
- Ajustement responsive ciblé du Hero sans modifier les autres sections.

Fichiers modifiés :
- `front-page.php`
- `style.css`
- `css/mobile-responsive.css`
- `js/main.js`
- `CHANGELOG.md`

Corrections de bugs :
- Plus aucune référence à l'ancien bouton "Découvrir la collection" ni au pot flottant interactif.
- Vérification desktop : un seul CTA dans le Hero, lien correct vers `/evenement/`, aucun chevauchement entre texte et visuel.
- Vérification JavaScript : `js/main.js` valide avec `node --check`.
- Vérification Git : `git diff --check` sans erreur.

## 2026-09-05 10:09 - Refonte ciblée du Hero Botanica d'accueil

Résumé :
- Création d'un point de restauration avant intervention : `1f101d9`.
- Suppression du bouton secondaire "Découvrir la collection" dans le Hero.
- Conservation d'un seul CTA principal : "Découvrir l'événement", relié à la page Événement.
- Suppression complète du pot flottant interactif et de la carte collection à droite.
- Remplacement par une composition premium Botanica avec rayon lumineux, halo, reflets et apparition progressive des nouveaux produits.
- Recentrage de la hiérarchie éditoriale : "Nouvelle collection", "Édition Automne 2026", "Botanica", puis description.
- Allègement visuel du compte à rebours avec glassmorphism, contour doré discret et animation des chiffres.
- Correction du clipping des effets lumineux pour éviter tout débordement horizontal.
- Adaptation responsive mobile ciblée du Hero sans modifier les autres sections.

Fichiers modifiés :
- `front-page.php`
- `style.css`
- `css/mobile-responsive.css`
- `js/main.js`
- `CHANGELOG.md`

Corrections de bugs :
- Plus aucune référence à l'ancien pot flottant ou à l'ancienne carte collection dans le HTML, le CSS ou le JavaScript.
- Vérification desktop : un seul CTA dans le Hero, lien correct vers `/evenement/`, aucun scroll horizontal global.
- Vérification mobile 430px : titre, compte à rebours et visuel Botanica contenus dans l'écran.
- Vérification JavaScript : `js/main.js` valide avec `node --check`.
- Vérification Git : `git diff --check` sans erreur.

## 2026-09-04 23:51 - Uniformisation visuelle de la campagne Botanica

Résumé :
- Création d'un point de restauration avant intervention : `72a6abc`.
- Remplacement du visuel du Hero d'accueil par une nouvelle composition Botanica complète.
- Refonte de la hiérarchie du Hero : "Botanica", "Nouvelle Collection Automne 2026" et accroche premium.
- Ajout de lumière volumétrique, reflets, particules dorées et halo autour de la scène Botanica.
- Renforcement du bouton principal avec reflet lumineux et micro-interaction au survol.
- Ajout d'un cycle d'ouverture puis de retour automatique du pot Botanica sur le Hero d'accueil.
- Remplacement des anciennes images de la page Événement dans le slider, la galerie et la carte vidéo par des visuels Botanica.
- Mise à jour des points interactifs pour supprimer les références visibles aux anciens actifs de campagne.

Fichiers modifiés :
- `front-page.php`
- `template-parts/page-evenement.php`
- `style.css`
- `js/main.js`
- `CHANGELOG.md`
- `assets/hero/cosmethique-botanica-campaign-suite.png`
- `assets/hero/cosmethique-botanica-cream-reveal.png`
- `assets/hero/cosmethique-botanica-launch-preview.png`

Corrections de bugs :
- Aucun ancien visuel produit n'est détecté dans les cartes, la galerie et la prévisualisation vidéo de la page Événement.
- Le Hero d'accueil charge bien le nouveau visuel Botanica.
- L'ouverture du pot s'exécute et revient automatiquement à l'état fermé.
- Vérification mobile 430px : pas de débordement horizontal, titre, carte et produit contenus.
- Vérification JavaScript : `js/main.js` valide avec `node --check`.
- Vérification Git : `git diff --check` sans erreur.

## 2026-09-04 12:18 - Finitions premium du Hero Botanica

Résumé :
- Création d'un point de restauration avant intervention : `fb534a3`.
- Correction de la taille et du cadrage responsive du titre du Hero d'accueil Botanica.
- Placement des deux CTA directement sous la description : "Découvrir l'événement" et "Découvrir la collection".
- Ajout d'un badge animé "Nouveauté 2026".
- Ajout d'un produit Botanica interactif en CSS avec halo, particules, feuilles animées et ouverture du couvercle au clic.
- Enrichissement de la carte collection : édition limitée, 6 nouveaux produits, disponibilité le 15 octobre et bouton "Découvrir".
- Ajout d'une animation fluide sur les chiffres du compte à rebours.
- Ajout d'un indicateur animé "Découvrir la collection" en bas du Hero.
- Ajout d'une animation de scroll légère pour donner un effet de transition premium.

Fichiers modifiés :
- `front-page.php`
- `style.css`
- `css/mobile-responsive.css`
- `js/main.js`
- `CHANGELOG.md`

Corrections de bugs :
- Le titre du Hero ne déborde plus sur desktop ni sur mobile.
- Le pot Botanica est maintenant cliquable et son animation d'ouverture s'exécute correctement.
- Les CTA pointent vers `/evenement/` et `/boutique/`.
- Vérification navigateur effectuée sur l'accueil local : pas de débordement horizontal causé par le Hero Botanica.
- Les validateurs `php` et `node` ne sont pas disponibles dans ce terminal local ; la vérification a donc été faite dans le navigateur.

## 2026-09-04 11:55 - Hero d'accueil campagne Botanica

Résumé :
- Création d'un point de restauration avant intervention : `e92e059`.
- Remplacement complet du Hero générique de la page d'accueil par une campagne de lancement Botanica.
- Création d'un nouveau visuel de collection avec packagings Botanica inédits, distincts des anciens produits Cosm'Éthique.
- Ajout du badge "Événement exclusif", du titre de campagne, de la date, du lieu, du compte à rebours animé et des CTA.
- Le bouton "Découvrir l'événement" redirige vers `/evenement/`.
- Le bouton "Découvrir la collection" redirige vers la boutique.
- Ajout d'animations GSAP ciblées sur l'accueil, parallaxe doux, particules lumineuses et adaptations mobile dédiées.

Fichiers modifiés :
- `front-page.php`
- `functions.php`
- `style.css`
- `css/mobile-responsive.css`
- `js/main.js`
- `assets/hero/cosmethique-botanica-home-campaign.png`
- `CHANGELOG.md`

Corrections de bugs :
- Suppression de l'effet "simple texte remplacé" dans l'ancien Hero.
- Le Hero d'accueil possède désormais une identité visuelle propre à la Collection Botanica.
- Les contrôles PHP, JavaScript et diff sont passés sans erreur.
- Le test navigateur local n'a pas pu être lancé car `cosmethique.local` ne répondait pas depuis le terminal.

## 2026-09-04 00:00 - Création de la page Événement Botanica

Résumé :
- Création d'un point de restauration avant intervention : `0d0b392`.
- Ajout de la page `/evenement/` dédiée au lancement de la Collection Botanica.
- Création d'un hero immersif pleine largeur avec compte à rebours, date, heure, lieu et CTA.
- Création d'un pot de crème Cosm'Éthique en CSS 3D avec ouverture au clic, lumière dorée, feuilles, fleurs, particules et fumée légère.
- Ajout de points interactifs ouvrant des fiches premium en glassmorphism.
- Ajout d'un slider d'événements à venir, d'une timeline, d'une galerie lightbox, d'une section vidéo et d'un formulaire de réservation.
- Chargement de GSAP uniquement sur la page Événement afin de préserver les performances du reste du site.
- Ajout automatique du lien "Événements" dans le menu principal pour rendre la page visible depuis le site.

Fichiers modifiés :
- `functions.php`
- `page.php`
- `style.css`
- `js/main.js`
- `template-parts/page-evenement.php`
- `CHANGELOG.md`

Corrections de bugs :
- Aucun bug détecté lors des contrôles PHP, JavaScript et diff.
- Le test visuel local n'a pas pu être lancé car `cosmethique.local` ne répondait pas depuis le terminal.

## 2026-08-04 20:17 - Refonte immersive de la page FAQ

Résumé :
- Création d'un point de restauration avant intervention : `815db1c`.
- Suppression du rendu FAQ centré type "feuille A4".
- Création d'un hero FAQ pleine largeur avec image immersive, overlay, grand titre et bouton Contact.
- Création d'une grande barre de recherche premium avec suggestions rapides.
- Ajout de grandes cartes de catégories : Livraison, Commande, Paiement, Compte client, Produits, Diagnostic, Franchise et Retours.
- Remplacement des petites cartes FAQ par de grands accordéons modernes, plus lisibles et animés.
- Ajout d'une section Questions populaires en grille large.
- Ajout d'une section Besoin d'aide avec grande image et boutons Contact / Diagnostic.
- Ajout des interactions JavaScript pour les suggestions, le filtrage FAQ et le défilement vers une catégorie.
- Ajout des traductions FR/EN/ES/AR pour les nouvelles chaînes FAQ.

Fichiers modifiés :
- `template-parts/page-institutionnel.php`
- `style.css`
- `js/main.js`
- `inc/multilingual.php`
- `CHANGELOG.md`

Corrections de bugs :
- La page FAQ ne réutilise plus le CTA institutionnel générique en bas de page.
- Les nouveaux blocs FAQ exploitent presque toute la largeur de l'écran et restent responsive.
- Les contrôles JavaScript respectent la préférence `prefers-reduced-motion`.

## 2026-08-04 09:35 - Refonte immersive de la page Nos engagements

Résumé :
- Sauvegarde locale de l'état non validé précédent : `2fb30b6`.
- Restauration de la base propre avant refonte ciblée : `fd24bc5`.
- Refonte complète de la page Nos engagements uniquement.
- Création d'un hero presque plein écran avec grand titre, boutons et collage produit premium.
- Transformation des valeurs en grandes cartes asymétriques pleine largeur.
- Création d'une section chiffres sur fond bleu marine avec compteurs animés.
- Création d'une section Notre engagement en action avec grande image immersive et timeline.
- Ajout d'une section Nos priorités avec cartes illustrées.
- Ajout d'une bannière pleine largeur avec citation et effet visuel premium.
- Ajout d'un parallaxe léger ciblé sur les grands visuels de la page.
- Ajout des chaînes multilingues FR/EN/ES/AR pour les nouveaux contenus.

Fichiers modifiés :
- `template-parts/page-institutionnel.php`
- `style.css`
- `js/main.js`
- `inc/multilingual.php`
- `CHANGELOG.md`

Corrections de bugs :
- Suppression du rendu trop étroit type "feuille A4" sur la page Nos engagements.
- Agrandissement des images et suppression de l'effet de petits blocs centrés.
- Limitation des styles et scripts ajoutés à la page Nos engagements afin de ne pas impacter le reste du site.

## 2026-08-04 00:30 - Refonte premium des pages institutionnelles

Résumé :
- Refonte complète des pages Nos ingrédients, Fabrication & Qualité et FAQ.
- Création d'une bibliothèque d'ingrédients avec filtres, cartes premium et fiches détaillées ouvrables au clic.
- Ajout d'une section Notre sélection d'actifs pour structurer les bénéfices beauté.
- Refonte de Fabrication & Qualité avec animation légère, timeline en 6 étapes, certifications, galerie coulisses et cartes de réassurance.
- Refonte de la FAQ avec barre de recherche, questions fréquentes, catégories en accordéon et CTA contact.
- Ajout des styles responsive et des micro-interactions premium.
- Ajout des scripts pour la recherche FAQ, les fiches ingrédients et les animations au scroll.
- Ajout des traductions français, anglais, espagnol et arabe pour les nouvelles sections principales.

Fichiers modifiés :
- `template-parts/page-institutionnel.php`
- `style.css`
- `js/main.js`
- `inc/multilingual.php`
- `CHANGELOG.md`

Corrections de bugs :
- Suppression de textes FAQ non traduisibles codés en dur.
- Ajustement de la timeline qualité pour correspondre aux étapes demandées.
- Ajout d'un comportement de fermeture clavier pour les fiches ingrédients.

## 2026-08-03 23:59 - Refonte institutionnelle : Nos engagements

Résumé :
- Création d'un commit Git de sauvegarde avant intervention : `b41408a`.
- Mise à jour de la page Nos engagements avec une grille premium de 8 engagements.
- Ajout d'une timeline illustrée pour présenter la traçabilité des engagements.
- Ajout de compteurs animés pour renforcer la crédibilité de la page.

Fichiers modifiés :
- `template-parts/page-institutionnel.php`
- `CHANGELOG.md`

Corrections de bugs :
- Remplacement des intitulés génériques par les engagements demandés.
- Ajout d'une structure plus riche pour éviter une page institutionnelle trop vide.

## 2026-08-03 23:26 - Refonte premium minimaliste du footer

Résumé :
- Création d'un commit Git de sauvegarde avant intervention : `e1370d8`.
- Refonte du footer avec une structure plus premium, aérée et minimaliste.
- Newsletter déplacée en haut du footer sous forme de ligne élégante.
- Bloc marque simplifié : logo, description courte, réseaux sociaux et micro-ligne d'engagements.
- Navigation réduite à 3 colonnes : Produits, À propos, Aide & Informations.
- Ajout d'un bloc contact sobre avec email, téléphone et horaires.
- Partie inférieure compactée avec copyright, moyens de paiement et services essentiels.
- Optimisation responsive : colonnes transformées en accordéons sur mobile.
- Ajout de micro-interactions discrètes au focus, au hover et sur les accordéons.
- Ajout des nouvelles chaînes du footer dans le système multilingue.

Fichiers modifiés :
- `footer.php`
- `style.css`
- `js/main.js`
- `inc/multilingual.php`
- `CHANGELOG.md`

Corrections de bugs :
- Suppression du bloc d'engagements en cartes qui surchargeait visuellement le footer.
- Réduction des doublons visuels entre newsletter, informations et réassurance.
- Amélioration de la lisibilité et de l'équilibre du footer sur mobile.

## 2026-08-03 22:54 - Version reference-2026-08-03_22-54-34

Résumé :
- Sauvegarde de référence créée avant l'installation du système de sauvegarde.
- État actuel complet du thème conservé dans une archive locale.

Fichiers modifiés :
- Aucun fichier du projet modifié avant cette sauvegarde de référence.

Archive :
- `.cosmethique-backups/snapshots/reference-2026-08-03_22-54-34.tar.gz`

## 2026-08-03 22:55 - Mise en place du système de sauvegarde

Résumé :
- Ajout d'un changelog obligatoire.
- Ajout des scripts de création et de restauration des sauvegardes.
- Ajout d'un guide d'utilisation.
- Ajout d'un `.gitignore` pour conserver les archives localement sans les injecter dans Git.

Fichiers modifiés :
- `.gitignore`
- `CHANGELOG.md`
- `BACKUP-GUIDE.md`
- `tools/backup-create.sh`
- `tools/backup-restore.sh`

Corrections de bugs :
- Aucune.

## 2026-08-03 23:01 - Version v2026-08-03_23-01-33

Résumé :
- Installation du système de sauvegarde obligatoire

Fichiers modifiés :
- .gitignore
- 00-START-HERE.txt
- 404.php
- BACKUP-GUIDE.md
- CHANGELOG.md
- COSM-HOMEPAGE-SUMMARY.md
- DELIVERY-CHECKLIST.txt
- DOCUMENTATION-INDEX.md
- HOME-README.md
- HOMEPAGE-GUIDE.md
- QUICK-START.txt
- README.md
- archive.php
- assets/about/about-eco-commitment.png
- assets/about/about-story-lifestyle.png
- assets/about/reference-catalog-products.png
- assets/blog/blog-karite.png
- assets/blog/blog-peau-sensible.png
- assets/blog/blog-serum.png
- assets/hero/cosmethique-home-hero-campaign-4k.png
- assets/hero/cosmethique-home-hero-campaign.png
- assets/home/home-diagnostic-beaute.png
- assets/home/home-savoir-faire-cosmethique.png
- assets/home/home-univers-cheveux.png
- assets/home/home-univers-corps.png
- assets/home/home-univers-tous-les-soins.png
- assets/home/home-univers-visage.png
- assets/payment/alma-brand-platform.png
- assets/payment/alma.png
- assets/payment/floa.svg
- assets/payment/klarna.svg
- assets/payment/paypal-mark.jpg
- assets/payment/paypal.svg
- assets/products/baume-corps.svg
- assets/products/botanical-oil.svg
- assets/products/category-accessoires-beaute-hero.png
- assets/products/category-packs-hero-reel.png
- assets/products/category-packs-hero.png
- assets/products/category-soins-cheveux-hero.png
- assets/products/category-soins-corps-hero.png
- assets/products/category-soins-visage-hero.png
- assets/products/cosmethique-product-placeholder.svg
- assets/products/creme-sauge.svg
- assets/products/hair-ritual.svg
- assets/products/hero-accessoires-cosmethique.png
- assets/products/huile-botanique.svg
- assets/products/ingredient-rose.svg
- assets/products/lavande-fine.svg
- assets/products/lavender-ingredient.svg
- assets/products/lifestyle-baume-corps.png
- assets/products/lifestyle-creme-sauge.png
- assets/products/lifestyle-huile-botanique.png
- assets/products/lifestyle-lavande-fine.png
- assets/products/lifestyle-masque-cheveux.png
- assets/products/lifestyle-masque-visage.png
- assets/products/lifestyle-serum-rose.png
- assets/products/lifestyle-shampooing-sauge.png
- assets/products/masque-cheveux.svg
- assets/products/masque-visage.svg
- assets/products/photo-apres-shampooing-aloe-vera-karite-back.png
- assets/products/photo-apres-shampooing-aloe-vera-karite-lifestyle.png
- assets/products/photo-apres-shampooing-aloe-vera-karite.png
- assets/products/photo-baume-corps-karite-amande-back.png
- assets/products/photo-baume-corps-karite-amande-texture.png
- assets/products/photo-baume-corps-karite-amande.png
- assets/products/photo-beurre-corporel-coco-vanille-back.png
- assets/products/photo-beurre-corporel-coco-vanille-lifestyle.png
- assets/products/photo-beurre-corporel-coco-vanille.png
- assets/products/photo-brosse-cheveux-bambou-lifestyle.png
- assets/products/photo-brosse-cheveux-bambou-packshot.png
- assets/products/photo-brosse-cheveux-bambou.png
- assets/products/photo-creme-hydratante-sauge-camomille-back.png
- assets/products/photo-creme-hydratante-sauge-camomille-texture.png
- assets/products/photo-creme-hydratante-sauge-camomille.png
- assets/products/photo-deodorant-naturel-back.png
- assets/products/photo-deodorant-naturel-lifestyle.png
- assets/products/photo-deodorant-naturel.png
- assets/products/photo-eponge-konjac-naturelle-lifestyle.png
- assets/products/photo-eponge-konjac-naturelle-packshot.png
- assets/products/photo-eponge-konjac-naturelle.png
- assets/products/photo-gel-douche-coton-avoine-back.png
- assets/products/photo-gel-douche-coton-avoine-lifestyle.png
- assets/products/photo-gel-douche-coton-avoine.png
- assets/products/photo-gel-nettoyant-aloe-vera-back.png
- assets/products/photo-gel-nettoyant-aloe-vera-lifestyle.png
- assets/products/photo-gel-nettoyant-aloe-vera.png
- assets/products/photo-gommage-corps-sucre-lavande-back.png
- assets/products/photo-gommage-corps-sucre-lavande-lifestyle.png
- assets/products/photo-gommage-corps-sucre-lavande.png
- assets/products/photo-gua-sha-quartz-rose-lifestyle.png
- assets/products/photo-gua-sha-quartz-rose-packshot.png
- assets/products/photo-gua-sha-quartz-rose.png
- assets/products/photo-huile-capillaire-botanique-back.png
- assets/products/photo-huile-capillaire-botanique-lifestyle.png
- assets/products/photo-huile-capillaire-botanique.png
- assets/products/photo-huile-essentielle-lavande-fine-back.png
- assets/products/photo-huile-essentielle-lavande-fine-lifestyle.png
- assets/products/photo-huile-essentielle-lavande-fine.png
- assets/products/photo-huile-massage-back.png
- assets/products/photo-huile-massage-lifestyle.png
- assets/products/photo-huile-massage.png
- assets/products/photo-huile-seche-botanique-back.png
- assets/products/photo-huile-seche-botanique-lifestyle.png
- assets/products/photo-huile-seche-botanique.png
- assets/products/photo-huile-soin-nourrissante-back.png
- assets/products/photo-huile-soin-nourrissante-lifestyle.png
- assets/products/photo-huile-soin-nourrissante.png
- assets/products/photo-lait-corps-hydratant-back.png
- assets/products/photo-lait-corps-hydratant-lifestyle.png
- assets/products/photo-lait-corps-hydratant.png
- assets/products/photo-lotion-tonique-fleur-oranger-back.png
- assets/products/photo-lotion-tonique-fleur-oranger-lifestyle.png
- assets/products/photo-lotion-tonique-fleur-oranger.png
- assets/products/photo-masque-cheveux-reparateur-back.png
- assets/products/photo-masque-cheveux-reparateur-lifestyle.png
- assets/products/photo-masque-cheveux-reparateur.png
- assets/products/photo-masque-nutrition-intense.png
- assets/products/photo-masque-purifiant-argile-verte-back.png
- assets/products/photo-masque-purifiant-argile-verte-lifestyle.png
- assets/products/photo-masque-purifiant-argile-verte.png
- assets/products/photo-pack-routine-cheveux-cadeau.png
- assets/products/photo-pack-routine-cheveux-contenu-reel.png
- assets/products/photo-pack-routine-cheveux-contenu.png
- assets/products/photo-pack-routine-cheveux-lifestyle-reel.png
- assets/products/photo-pack-routine-cheveux-reel.png
- assets/products/photo-pack-routine-cheveux.png
- assets/products/photo-pack-routine-corps-cadeau.png
- assets/products/photo-pack-routine-corps-contenu-reel.png
- assets/products/photo-pack-routine-corps-contenu.png
- assets/products/photo-pack-routine-corps-lifestyle-reel.png
- assets/products/photo-pack-routine-corps-reel.png
- assets/products/photo-pack-routine-corps.png
- assets/products/photo-pack-routine-premium-cadeau.png
- assets/products/photo-pack-routine-premium-contenu-reel.png
- assets/products/photo-pack-routine-premium-contenu.png
- assets/products/photo-pack-routine-premium-lifestyle-reel.png
- assets/products/photo-pack-routine-premium-reel.png
- assets/products/photo-pack-routine-premium.png
- assets/products/photo-pack-routine-visage-cadeau.png
- assets/products/photo-pack-routine-visage-contenu-reel.png
- assets/products/photo-pack-routine-visage-contenu.png
- assets/products/photo-pack-routine-visage-lifestyle-reel.png
- assets/products/photo-pack-routine-visage-reel.png
- assets/products/photo-pack-routine-visage.png
- assets/products/photo-roller-jade-naturel-lifestyle.png
- assets/products/photo-roller-jade-naturel-packshot.png
- assets/products/photo-roller-jade-naturel.png
- assets/products/photo-serum-eclat-rose-packshot.png
- assets/products/photo-serum-eclat-rose.png
- assets/products/photo-serum-pointes-nourrissant-back.png
- assets/products/photo-serum-pointes-nourrissant-lifestyle.png
- assets/products/photo-serum-pointes-nourrissant.png
- assets/products/photo-set-premium-gua-sha-roller-lifestyle.png
- assets/products/photo-set-premium-gua-sha-roller-packshot.png
- assets/products/photo-set-premium-gua-sha-roller.png
- assets/products/photo-shampooing-doux-sauge-ortie-back.png
- assets/products/photo-shampooing-doux-sauge-ortie-lifestyle.png
- assets/products/photo-shampooing-doux-sauge-ortie.png
- assets/products/photo-spray-protecteur-thermique-back.png
- assets/products/photo-spray-protecteur-thermique-lifestyle.png
- assets/products/photo-spray-protecteur-thermique.png
- assets/products/photo-trousse-beaute-cosmethique-lifestyle.png
- assets/products/photo-trousse-beaute-cosmethique-packshot.png
- assets/products/photo-trousse-beaute-cosmethique.png
- assets/products/routine-premium.svg
- assets/products/serum-rose.svg
- assets/products/shampooing-sauge.svg
- assets/products/texture-creme.svg
- comments.php
- css/home-premium-extras.css
- css/home-premium.css
- footer.php
- front-page.php
- functions.php
- header.php
- home.php
- images-config.php
- inc/homepage-config.php
- inc/homepage-customization-examples.php
- inc/multilingual.php
- index.php
- js/home-animations.js
- js/main.js
- page.php
- search.php
- single.php
- style.css
- template-elementor-fullwidth.php
- template-parts/page-boutique.php
- template-parts/page-cgu.php
- template-parts/page-cgv.php
- template-parts/page-contact.php
- template-parts/page-devenir-franchise.php
- template-parts/page-diagnostic.php
- template-parts/page-institutionnel.php
- template-parts/page-mentions-legales.php
- template-parts/page-mon-compte.php
- template-parts/page-politique-de-confidentialite.php
- template-parts/page-politique-de-cookies.php
- template-parts/page-qui-sommes-nous.php
- tools/backup-create.sh
- tools/backup-restore.sh
- woocommerce.php
- woocommerce/cart/cart-empty.php
- woocommerce/cart/cart.php
- woocommerce/checkout/form-checkout.php
- woocommerce/checkout/payment-method.php
- woocommerce/checkout/payment.php
- woocommerce/checkout/review-order.php
- woocommerce/loop/orderby.php

Corrections de bugs :
- À renseigner si applicable.

Archive :
- `.cosmethique-backups/snapshots/v2026-08-03_23-01-33.tar.gz`

## 2026-08-03 23:06 - Version v2026-08-03_23-06-53

Résumé :
- Amélioration du système de sauvegarde avec manifestes et empreintes

Fichiers modifiés :
- .gitignore
- 00-START-HERE.txt
- 404.php
- BACKUP-GUIDE.md
- CHANGELOG.md
- COSM-HOMEPAGE-SUMMARY.md
- DELIVERY-CHECKLIST.txt
- DOCUMENTATION-INDEX.md
- HOME-README.md
- HOMEPAGE-GUIDE.md
- QUICK-START.txt
- README.md
- archive.php
- assets/about/about-eco-commitment.png
- assets/about/about-story-lifestyle.png
- assets/about/reference-catalog-products.png
- assets/blog/blog-karite.png
- assets/blog/blog-peau-sensible.png
- assets/blog/blog-serum.png
- assets/hero/cosmethique-home-hero-campaign-4k.png
- assets/hero/cosmethique-home-hero-campaign.png
- assets/home/home-diagnostic-beaute.png
- assets/home/home-savoir-faire-cosmethique.png
- assets/home/home-univers-cheveux.png
- assets/home/home-univers-corps.png
- assets/home/home-univers-tous-les-soins.png
- assets/home/home-univers-visage.png
- assets/payment/alma-brand-platform.png
- assets/payment/alma.png
- assets/payment/floa.svg
- assets/payment/klarna.svg
- assets/payment/paypal-mark.jpg
- assets/payment/paypal.svg
- assets/products/baume-corps.svg
- assets/products/botanical-oil.svg
- assets/products/category-accessoires-beaute-hero.png
- assets/products/category-packs-hero-reel.png
- assets/products/category-packs-hero.png
- assets/products/category-soins-cheveux-hero.png
- assets/products/category-soins-corps-hero.png
- assets/products/category-soins-visage-hero.png
- assets/products/cosmethique-product-placeholder.svg
- assets/products/creme-sauge.svg
- assets/products/hair-ritual.svg
- assets/products/hero-accessoires-cosmethique.png
- assets/products/huile-botanique.svg
- assets/products/ingredient-rose.svg
- assets/products/lavande-fine.svg
- assets/products/lavender-ingredient.svg
- assets/products/lifestyle-baume-corps.png
- assets/products/lifestyle-creme-sauge.png
- assets/products/lifestyle-huile-botanique.png
- assets/products/lifestyle-lavande-fine.png
- assets/products/lifestyle-masque-cheveux.png
- assets/products/lifestyle-masque-visage.png
- assets/products/lifestyle-serum-rose.png
- assets/products/lifestyle-shampooing-sauge.png
- assets/products/masque-cheveux.svg
- assets/products/masque-visage.svg
- assets/products/photo-apres-shampooing-aloe-vera-karite-back.png
- assets/products/photo-apres-shampooing-aloe-vera-karite-lifestyle.png
- assets/products/photo-apres-shampooing-aloe-vera-karite.png
- assets/products/photo-baume-corps-karite-amande-back.png
- assets/products/photo-baume-corps-karite-amande-texture.png
- assets/products/photo-baume-corps-karite-amande.png
- assets/products/photo-beurre-corporel-coco-vanille-back.png
- assets/products/photo-beurre-corporel-coco-vanille-lifestyle.png
- assets/products/photo-beurre-corporel-coco-vanille.png
- assets/products/photo-brosse-cheveux-bambou-lifestyle.png
- assets/products/photo-brosse-cheveux-bambou-packshot.png
- assets/products/photo-brosse-cheveux-bambou.png
- assets/products/photo-creme-hydratante-sauge-camomille-back.png
- assets/products/photo-creme-hydratante-sauge-camomille-texture.png
- assets/products/photo-creme-hydratante-sauge-camomille.png
- assets/products/photo-deodorant-naturel-back.png
- assets/products/photo-deodorant-naturel-lifestyle.png
- assets/products/photo-deodorant-naturel.png
- assets/products/photo-eponge-konjac-naturelle-lifestyle.png
- assets/products/photo-eponge-konjac-naturelle-packshot.png
- assets/products/photo-eponge-konjac-naturelle.png
- assets/products/photo-gel-douche-coton-avoine-back.png
- assets/products/photo-gel-douche-coton-avoine-lifestyle.png
- assets/products/photo-gel-douche-coton-avoine.png
- assets/products/photo-gel-nettoyant-aloe-vera-back.png
- assets/products/photo-gel-nettoyant-aloe-vera-lifestyle.png
- assets/products/photo-gel-nettoyant-aloe-vera.png
- assets/products/photo-gommage-corps-sucre-lavande-back.png
- assets/products/photo-gommage-corps-sucre-lavande-lifestyle.png
- assets/products/photo-gommage-corps-sucre-lavande.png
- assets/products/photo-gua-sha-quartz-rose-lifestyle.png
- assets/products/photo-gua-sha-quartz-rose-packshot.png
- assets/products/photo-gua-sha-quartz-rose.png
- assets/products/photo-huile-capillaire-botanique-back.png
- assets/products/photo-huile-capillaire-botanique-lifestyle.png
- assets/products/photo-huile-capillaire-botanique.png
- assets/products/photo-huile-essentielle-lavande-fine-back.png
- assets/products/photo-huile-essentielle-lavande-fine-lifestyle.png
- assets/products/photo-huile-essentielle-lavande-fine.png
- assets/products/photo-huile-massage-back.png
- assets/products/photo-huile-massage-lifestyle.png
- assets/products/photo-huile-massage.png
- assets/products/photo-huile-seche-botanique-back.png
- assets/products/photo-huile-seche-botanique-lifestyle.png
- assets/products/photo-huile-seche-botanique.png
- assets/products/photo-huile-soin-nourrissante-back.png
- assets/products/photo-huile-soin-nourrissante-lifestyle.png
- assets/products/photo-huile-soin-nourrissante.png
- assets/products/photo-lait-corps-hydratant-back.png
- assets/products/photo-lait-corps-hydratant-lifestyle.png
- assets/products/photo-lait-corps-hydratant.png
- assets/products/photo-lotion-tonique-fleur-oranger-back.png
- assets/products/photo-lotion-tonique-fleur-oranger-lifestyle.png
- assets/products/photo-lotion-tonique-fleur-oranger.png
- assets/products/photo-masque-cheveux-reparateur-back.png
- assets/products/photo-masque-cheveux-reparateur-lifestyle.png
- assets/products/photo-masque-cheveux-reparateur.png
- assets/products/photo-masque-nutrition-intense.png
- assets/products/photo-masque-purifiant-argile-verte-back.png
- assets/products/photo-masque-purifiant-argile-verte-lifestyle.png
- assets/products/photo-masque-purifiant-argile-verte.png
- assets/products/photo-pack-routine-cheveux-cadeau.png
- assets/products/photo-pack-routine-cheveux-contenu-reel.png
- assets/products/photo-pack-routine-cheveux-contenu.png
- assets/products/photo-pack-routine-cheveux-lifestyle-reel.png
- assets/products/photo-pack-routine-cheveux-reel.png
- assets/products/photo-pack-routine-cheveux.png
- assets/products/photo-pack-routine-corps-cadeau.png
- assets/products/photo-pack-routine-corps-contenu-reel.png
- assets/products/photo-pack-routine-corps-contenu.png
- assets/products/photo-pack-routine-corps-lifestyle-reel.png
- assets/products/photo-pack-routine-corps-reel.png
- assets/products/photo-pack-routine-corps.png
- assets/products/photo-pack-routine-premium-cadeau.png
- assets/products/photo-pack-routine-premium-contenu-reel.png
- assets/products/photo-pack-routine-premium-contenu.png
- assets/products/photo-pack-routine-premium-lifestyle-reel.png
- assets/products/photo-pack-routine-premium-reel.png
- assets/products/photo-pack-routine-premium.png
- assets/products/photo-pack-routine-visage-cadeau.png
- assets/products/photo-pack-routine-visage-contenu-reel.png
- assets/products/photo-pack-routine-visage-contenu.png
- assets/products/photo-pack-routine-visage-lifestyle-reel.png
- assets/products/photo-pack-routine-visage-reel.png
- assets/products/photo-pack-routine-visage.png
- assets/products/photo-roller-jade-naturel-lifestyle.png
- assets/products/photo-roller-jade-naturel-packshot.png
- assets/products/photo-roller-jade-naturel.png
- assets/products/photo-serum-eclat-rose-packshot.png
- assets/products/photo-serum-eclat-rose.png
- assets/products/photo-serum-pointes-nourrissant-back.png
- assets/products/photo-serum-pointes-nourrissant-lifestyle.png
- assets/products/photo-serum-pointes-nourrissant.png
- assets/products/photo-set-premium-gua-sha-roller-lifestyle.png
- assets/products/photo-set-premium-gua-sha-roller-packshot.png
- assets/products/photo-set-premium-gua-sha-roller.png
- assets/products/photo-shampooing-doux-sauge-ortie-back.png
- assets/products/photo-shampooing-doux-sauge-ortie-lifestyle.png
- assets/products/photo-shampooing-doux-sauge-ortie.png
- assets/products/photo-spray-protecteur-thermique-back.png
- assets/products/photo-spray-protecteur-thermique-lifestyle.png
- assets/products/photo-spray-protecteur-thermique.png
- assets/products/photo-trousse-beaute-cosmethique-lifestyle.png
- assets/products/photo-trousse-beaute-cosmethique-packshot.png
- assets/products/photo-trousse-beaute-cosmethique.png
- assets/products/routine-premium.svg
- assets/products/serum-rose.svg
- assets/products/shampooing-sauge.svg
- assets/products/texture-creme.svg
- comments.php
- css/home-premium-extras.css
- css/home-premium.css
- footer.php
- front-page.php
- functions.php
- header.php
- home.php
- images-config.php
- inc/homepage-config.php
- inc/homepage-customization-examples.php
- inc/multilingual.php
- index.php
- js/home-animations.js
- js/main.js
- page.php
- search.php
- single.php
- style.css
- template-elementor-fullwidth.php
- template-parts/page-boutique.php
- template-parts/page-cgu.php
- template-parts/page-cgv.php
- template-parts/page-contact.php
- template-parts/page-devenir-franchise.php
- template-parts/page-diagnostic.php
- template-parts/page-institutionnel.php
- template-parts/page-mentions-legales.php
- template-parts/page-mon-compte.php
- template-parts/page-politique-de-confidentialite.php
- template-parts/page-politique-de-cookies.php
- template-parts/page-qui-sommes-nous.php
- tools/backup-create.sh
- tools/backup-restore.sh
- woocommerce.php
- woocommerce/cart/cart-empty.php
- woocommerce/cart/cart.php
- woocommerce/checkout/form-checkout.php
- woocommerce/checkout/payment-method.php
- woocommerce/checkout/payment.php
- woocommerce/checkout/review-order.php
- woocommerce/loop/orderby.php

Corrections de bugs :
- À renseigner si applicable.

Archive :
- `.cosmethique-backups/snapshots/v2026-08-03_23-06-53.tar.gz`
