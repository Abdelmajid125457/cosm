# Accessibilité visible et gestion des cookies RGPD

## Synthèse

Le site COSM’ÉTHIQUE intègre un bouton d’accessibilité visible permettant d’adapter l’affichage aux besoins des utilisateurs, ainsi qu’un bandeau cookies conforme RGPD permettant d’accepter, refuser ou personnaliser les cookies.

Cette évolution répond à la demande de rattrapage visant à rendre les dispositifs d’accessibilité et de consentement clairement visibles pour les visiteurs, sans dégrader l’identité premium du site.

## Éléments ajoutés

- Bouton flottant d’accessibilité visible sur toutes les pages.
- Panneau d’options accessible au clavier et refermable au clic, au bouton de fermeture ou avec la touche Échap.
- Réglages utilisateur persistés dans le navigateur.
- Amélioration du bandeau cookies avec libellés plus explicites : Tout accepter, Tout refuser et Personnaliser.
- Préférences cookies structurées par catégories : nécessaires, analytiques, marketing et personnalisation.
- Lien de gestion des cookies conservé dans le footer pour modifier son choix ultérieurement.

## Options d’accessibilité disponibles

- Augmenter la taille du texte.
- Diminuer la taille du texte.
- Activer un contraste renforcé.
- Activer un mode lisibilité.
- Souligner les liens.
- Réduire les animations.
- Améliorer l’espacement du texte.
- Réinitialiser tous les réglages.

## Pourquoi le bouton accessibilité est utile

Le bouton donne aux visiteurs un contrôle immédiat sur l’affichage. Il aide notamment les personnes ayant une fatigue visuelle, des difficultés de lecture, une sensibilité aux animations ou un besoin de contraste plus marqué.

L’objectif n’est pas de remplacer les bonnes pratiques d’accessibilité du code, mais d’ajouter une couche visible et pratique qui améliore l’expérience utilisateur.

## Pourquoi le bandeau cookies est nécessaire

Le bandeau cookies permet de recueillir un consentement clair avant le dépôt ou l’activation de scripts non essentiels, notamment les scripts analytiques et marketing. Il offre trois choix principaux : accepter, refuser ou personnaliser.

Les cookies nécessaires restent actifs, car ils permettent le fonctionnement du site, du panier, de la sécurité, du paiement et de la mémorisation des préférences.

## Règles WCAG prises en compte

- **2.1.1 Clavier** : le panneau peut être ouvert, parcouru et fermé au clavier.
- **2.4.7 Focus visible** : les boutons conservent un focus clavier visible.
- **1.4.3 Contraste minimum** : l’option contraste renforcé améliore la lisibilité.
- **1.4.4 Redimensionnement du texte** : l’utilisateur peut augmenter ou réduire la taille du texte.
- **2.2.2 Pause, arrêt, masquage** : l’option de réduction des animations limite les mouvements visuels.
- **3.2.4 Identification cohérente** : les actions restent nommées clairement et de manière stable.
- **4.1.2 Nom, rôle, valeur** : les boutons utilisent des attributs ARIA adaptés, notamment `aria-expanded` et `aria-pressed`.

## Améliorations réalisées sur le site

- Le widget accessibilité est intégré dans le footer global afin d’être présent sur toutes les pages.
- Le panneau utilise une structure claire avec titres, boutons et états accessibles.
- Le panneau évite les conflits visuels avec le bandeau cookies, y compris sur mobile.
- Les préférences sont stockées localement afin de rester actives pendant la navigation.
- Le bandeau cookies garde une apparence cohérente avec la charte COSM’ÉTHIQUE : bleu marine, blanc, beige et doré discret.
- Les scripts cookies existants restent compatibles avec la gestion du consentement déjà en place.

## Présentation au jury

Pendant la soutenance, présenter cette partie en insistant sur trois points :

1. Le site ne se limite pas à une belle interface : il prend aussi en compte les besoins réels des utilisateurs.
2. Le bouton accessibilité apporte des réglages concrets et visibles sans casser le design premium.
3. Le bandeau cookies propose un choix clair et respecte le principe de consentement : accepter, refuser ou personnaliser.

Phrase de présentation possible :

> Nous avons ajouté une couche d’accessibilité visible, avec des options de confort de lecture, de contraste et de réduction des animations. En parallèle, le bandeau cookies permet à l’utilisateur d’accepter, refuser ou personnaliser ses préférences, ce qui renforce la conformité RGPD du site.

## Vérifications effectuées

- Présence du bouton accessibilité dans le footer global.
- Ouverture et fermeture du panneau.
- Persistance des réglages dans le navigateur.
- Réinitialisation fonctionnelle.
- Absence de chevauchement avec le bandeau cookies.
- Bandeau cookies avec actions accepter, refuser et personnaliser.
- Modal de préférences cookies toujours accessible.
- Responsive desktop et mobile pris en compte.
