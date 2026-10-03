# Rapport de corrections - Rattrapage franchise COSM'ÉTHIQUE

## 1. Éléments analysés

Les éléments suivants ont été analysés avant correction :

- cahier des charges COSM'ÉTHIQUE V2 ;
- objectif stratégique de développement national via un réseau de franchises ;
- contraintes du projet : cohérence RSE, positionnement premium accessible, WordPress/WooCommerce, responsive, accessibilité, e-réputation ;
- page principale `/devenir-franchise/` ;
- pages du parcours franchise existantes :
  - `/franchise/eligibilite/` ;
  - `/franchise/candidature/` ;
  - `/franchise/confirmation/` ;
- templates PHP du thème liés aux pages franchise ;
- styles CSS existants du parcours franchise ;
- logique de création automatique des pages franchise.

## 2. Ce qui a été créé

### Document de rattrapage

Fichier créé :

`rattrapage/franchise/formation-franchises-cosmethique.md`

Ce document propose une formation complète et défendable devant un jury :

- introduction stratégique ;
- objectifs pédagogiques ;
- format hybride innovant ;
- durée et organisation semaine par semaine ;
- lieu de formation ;
- déroulé détaillé ;
- méthodes pédagogiques innovantes ;
- évaluation et certification ;
- supports remis aux franchisés ;
- budget détaillé ;
- planning de mise en œuvre ;
- KPI de suivi ;
- bénéfices pour COSM'ÉTHIQUE et les franchisés ;
- conclusion professionnelle.

### Page dédiée au parcours de formation

Nouvelle page prévue :

`/franchise/formation/`

Template créé :

`template-parts/page-franchise-formation.php`

La page contient :

- hero premium ;
- résumé du parcours ;
- section "Pourquoi une formation ?" ;
- timeline de formation ;
- modules pédagogiques ;
- expérience immersive ;
- accompagnement post-ouverture ;
- chiffres clés ;
- FAQ formation ;
- CTA final vers candidature et éligibilité.

## 3. Ce qui a été modifié

### Page "Devenir franchisé"

Fichier modifié :

`template-parts/page-devenir-franchise.php`

Ajout d'une section complète :

**Formation & accompagnement**

Cette section présente :

- formation hybride ;
- phase digitale préparatoire via LearnyBox ;
- serious game pédagogique ;
- 6 jours présentiel/mixte en boutique pilote à Paris ;
- certification interne ;
- validation à 80 % des compétences ;
- accompagnement post-ouverture ;
- bénéfices pour le futur franchisé ;
- bouton "Découvrir le parcours de formation" ;
- bouton "Vérifier mon éligibilité".

### Routage WordPress

Fichier modifié :

`page.php`

Ajout de la prise en charge du template dédié pour :

`/franchise/formation/`

### Création automatique de la page

Fichier modifié :

`functions.php`

La page enfant `Formation des franchisés` est ajoutée à la logique de création automatique des pages franchise. Elle est rattachée au parent `/franchise/`.

### SEO de base

Fichier modifié :

`functions.php`

Ajout des titres et descriptions adaptés pour :

`/franchise/formation/`

### Design et responsive

Fichier modifié :

`style.css`

Ajout de styles pour :

- section formation de la page principale ;
- cartes pédagogiques ;
- timeline premium ;
- résumé formation ;
- grille des modules ;
- section immersive ;
- responsive tablette et mobile.

## 4. Pages concernées

| Page | Rôle |
|---|---|
| `/devenir-franchise/` | Présente le réseau, la formation, la carte et le formulaire de demande. |
| `/franchise/formation/` | Page dédiée au parcours de formation des franchisés. |
| `/franchise/eligibilite/` | Qualification du projet avant candidature. |
| `/franchise/candidature/` | Formulaire de candidature franchise indépendant. |
| `/franchise/confirmation/` | Confirmation après soumission valide. |

## 5. Choix pédagogiques

La proposition repose sur une logique hybride et progressive :

- e-learning pour transmettre les bases ;
- classes virtuelles pour clarifier les notions ;
- immersion en boutique pilote pour pratiquer ;
- serious game pour simuler les situations réelles ;
- quiz pour mesurer la progression ;
- jeux de rôle pour valider la posture conseil ;
- certification pour garantir l'homogénéité du réseau ;
- accompagnement post-ouverture pour sécuriser le lancement.

Ce choix répond directement au besoin du cahier des charges : garantir une expérience client homogène et transmettre les valeurs de la marque à l'échelle nationale.

## 6. Choix UX/UI

Le design reprend l'univers premium du site :

- bleu marine ;
- blanc ;
- beige ;
- doré discret ;
- cartes arrondies ;
- ombres douces ;
- glassmorphism léger ;
- animations au scroll déjà utilisées par le thème ;
- responsive desktop, tablette et mobile.

La page `/franchise/formation/` a été pensée comme une landing page professionnelle, pas comme une simple page de texte.

## 7. Coûts proposés

Le document propose un budget structuré :

| Élément | Montant |
|---|---:|
| Coût de création initial | 26 600 € |
| Coût par franchisé formé | 1 700 € |
| Maintenance annuelle | 6 500 € |
| Hypothèse 5 franchisés | 41 600 € |
| Hypothèse 10 franchisés | 50 100 € |

Ces coûts sont réalistes pour un dispositif hybride complet, réutilisable et adapté à une marque en phase de développement.

## 8. Points importants à présenter au jury

À l'oral, il faut mettre en avant :

1. La formation répond à une demande précise du cahier des charges : structurer le développement en franchise.
2. Elle n'est pas générique : elle est adaptée aux enjeux COSM'ÉTHIQUE (naturalité, RSE, transparence, e-réputation, expérience premium).
3. Elle protège l'homogénéité du réseau et l'image de marque.
4. Elle accompagne le franchisé avant, pendant et après l'ouverture.
5. Elle inclut des méthodes innovantes : serious game, diagnostic beauté simulé, quiz interactifs, badges, certification.
6. Elle est chiffrée, planifiée et mesurable avec des KPI.
7. Elle est désormais visible dans le site via une section dédiée et une page complète.

## 9. Conclusion

La correction transforme une faiblesse du dossier en proposition professionnelle complète. COSM'ÉTHIQUE dispose désormais d'un dispositif de formation cohérent avec son ambition nationale, son positionnement premium et les exigences du jury.
