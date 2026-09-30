# Fonctionnalites e-commerce et formulaires

## Probleme signale par le jury

Le jury a releve que certaines fonctionnalites importantes pour un site e-commerce cosmetique n'etaient pas assez abouties : absence de choix de contenance avant achat, formulaires BtoB trop generiques, champs HTML peu qualifies et parcours utilisateur insuffisamment rassurant.

## Corrections apportees aux fiches produits

Les produits cosmetiques disposent maintenant d'un choix obligatoire de format avant l'ajout au panier :

- 50 ml : format decouverte ;
- 100 ml : format standard.

Le selecteur est affiche sous forme de capsules premium, avec etat actif, focus accessible, bordures discretes et integration visuelle coherente avec la charte COSM'ETHIQUE.

Chaque format possede un prix distinct :

- le 50 ml utilise le prix de reference du produit ;
- le 100 ml applique un tarif de format standard equivalent au double du format decouverte ;
- le prix affiche sur la fiche produit se met a jour lors de la selection ;
- la section Botanica reprend la meme logique sur les cartes et dans les fiches produit interactives.

Si aucune contenance n'est selectionnee, l'ajout au panier est bloque avec le message :

> Veuillez choisir une contenance avant d'ajouter ce produit au panier.

## Application aux produits existants

La logique s'applique aux produits cosmetiques pertinents : cremes, soins visage, serums, huiles, masques, soins corps, baumes, shampooings et soins cheveux.

Les accessoires, packs et coffrets sont exclus afin d'eviter une selection de contenance inutile ou incoherente.

## Application a la collection Botanica

La collection Botanica beneficie du meme parcours d'achat :

- Creme Hydratante Botanica ;
- Serum Botanica ;
- Huile Botanica ;
- Masque Botanica ;
- Baume Botanica.

Les coffrets Botanica restent exclus du choix obligatoire 50 ml / 100 ml, car ils representent un assemblage de produits et non un soin vendu dans une seule contenance.

## Panier, checkout et commande

Le format choisi est conserve dans WooCommerce et apparait :

- dans le panier ;
- dans le checkout ;
- dans le recapitulatif de commande ;
- dans les lignes de commande en administration.

Le prix du format 100 ml est ajuste automatiquement a partir du prix produit, tandis que le 50 ml conserve le prix de reference.

## Formulaire contact

Le formulaire de contact general a ete restructure avec des champs plus adaptes :

- prenom ;
- nom ;
- email ;
- telephone optionnel ;
- sujet ;
- type de demande ;
- message ;
- consentement RGPD obligatoire.

Les types HTML sont adaptes : `email`, `tel`, `select`, `textarea` et `checkbox`.

## Formulaires BtoB / franchise

Les formulaires franchise ont ete renforces avec une structure plus qualifiante :

- informations personnelles ;
- profil professionnel ;
- projet franchise ;
- horizon d'ouverture ;
- apport personnel estime ;
- local deja identifie ;
- site web ou LinkedIn ;
- motivations ;
- acceptation RGPD.

Les champs sont organises par sections afin d'obtenir un formulaire plus clair, plus rassurant et plus defendable devant le jury.

## Validation et accessibilite

Les formulaires disposent maintenant :

- de labels visibles ;
- d'attributs `aria-required` ;
- d'etats `aria-invalid` ;
- d'une validation cote interface ;
- d'une validation serveur securisee ;
- d'un focus automatique sur le premier champ en erreur ;
- d'un message d'erreur accessible.

## Benefice utilisateur

L'utilisateur comprend mieux ce qu'il achete, choisit la contenance adaptee avant paiement et dispose de formulaires plus simples a remplir.

## Benefice client COSM'ETHIQUE

Le site gagne en credibilite e-commerce : parcours d'achat plus realiste, panier plus precis, formulaires BtoB plus exploitables et meilleure conformite RGPD.

“Les fonctionnalités e-commerce et formulaires ont été retravaillées afin de mieux répondre au besoin client : choix de formats produits avant achat, application aux produits existants et à la nouvelle collection Botanica, formulaires BtoB plus qualifiants, champs HTML adaptés, validation renforcée et meilleure conformité RGPD.”
