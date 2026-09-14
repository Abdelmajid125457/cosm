# Rapport accessibilite WCAG AA - COSM'ETHIQUE

Date : 2026-09-14 17:55:31 CEST

## Resume

Passe d'accessibilite globale appliquee au theme WordPress COSM'ETHIQUE sans modifier le design, les couleurs, WooCommerce, Elementor ou les animations existantes.

## Fichiers modifies

- `header.php`
- `front-page.php`
- `page.php`
- `woocommerce.php`
- `archive.php`
- `search.php`
- `single.php`
- `index.php`
- `template-elementor-fullwidth.php`
- `404.php`
- `functions.php`
- `js/main.js`
- `style.css`
- `woocommerce/cart/cart.php`
- `woocommerce/checkout/form-checkout.php`
- `woocommerce/checkout/payment-method.php`

## Corrections realisees

- Ajout du lien "Passer au contenu principal" juste apres `wp_body_open()`, cible `#main-content`.
- Harmonisation des templates principaux avec un point d'ancrage unique `id="main-content"` et `tabindex="-1"`.
- Ajout d'un focus clavier visible global avec outline bleu marine et halo discret, visible uniquement sur `:focus-visible`.
- Conservation du focus propre de la recherche header sur le conteneur complet pour eviter le double cadre interne.
- Ajout d'attributs ARIA automatiques sur le menu principal : `aria-current`, `aria-haspopup`, `aria-expanded`.
- Ajout de `aria-controls` et d'un libelle explicite sur le selecteur de langue.
- Ajout d'un comportement clavier pour le menu mobile et les sous-menus : ouverture, fermeture avec `Escape`, gestion de l'etat `aria-expanded`.
- Ajout d'un enrichissement automatique des formulaires : labels invisibles si manquants, `aria-required`, `aria-invalid`.
- Ajout de roles accessibles sur les messages WooCommerce et messages de formulaire : `alert` ou `status` avec `aria-live`.
- Ajout d'un piege de focus generique pour les modales declarees avec `role="dialog"` et `aria-modal="true"`.
- Ajout d'un texte alternatif automatique pour les images produit WooCommerce lorsqu'aucun alt n'est renseigne.
- Ajout de `aria-current="step"` sur les etapes courantes du panier et du checkout.
- Ajout de `aria-controls` et `aria-expanded` sur les moyens de paiement WooCommerce avec synchronisation JS.
- Garantie d'une zone tactile minimale de 44 x 44 px pour les principaux boutons et controles sur mobile.

## Criteres WCAG concernes

- 1.1.1 Contenu non textuel
- 1.3.1 Information et relations
- 1.3.5 Identifier la finalite de la saisie
- 1.4.3 Contraste minimum
- 1.4.10 Redistribution
- 2.1.1 Clavier
- 2.1.2 Pas de piege au clavier
- 2.4.1 Contourner des blocs
- 2.4.3 Parcours du focus
- 2.4.4 Fonction du lien
- 2.4.7 Visibilite du focus
- 2.5.5 Taille de la cible
- 3.1.1 Langue de la page
- 3.3.1 Identification des erreurs
- 3.3.2 Etiquettes ou instructions
- 4.1.2 Nom, role et valeur
- 4.1.3 Messages d'etat

## Verifications effectuees

- Syntaxe PHP validee avec le PHP Local sur les fichiers PHP modifies.
- Syntaxe JavaScript validee avec `node --check`.
- Controle DOM sur la page d'accueil via navigateur : `#main-content` unique, lien d'evitement present, `lang` present, pas de debordement horizontal, aucun bouton/lien/champ visible sans nom accessible detecte.
- Verification que le style du lien d'evitement est cache par defaut et visible au focus.

## Scores Lighthouse

- Avant : non mesure dans cet environnement.
- Apres : non mesure officiellement.

Raison : `lighthouse` et `npx` ne sont pas disponibles localement, et le domaine `cosmethique.local` n'est pas joignable depuis le shell (`curl` retourne `000`). Un passage final dans Chrome DevTools Lighthouse et WAVE reste necessaire pour confirmer les scores officiels.

## Points a verifier manuellement

- Audit Lighthouse Chrome : Accessibility, Best Practices, SEO.
- Extension WAVE sur les pages principales.
- Navigation clavier complete : `Tab`, `Shift+Tab`, `Enter`, `Space`, `Escape`.
- Parcours WooCommerce complet avec un panier rempli : panier, checkout, selection paiement, commande test.
- Zoom navigateur a 200 % sur desktop et mobile emule.
