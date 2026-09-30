<?php
/**
 * Page Conditions générales de vente.
 *
 * @package Theme_Perso
 */

$contact_url = home_url( '/contact/' );
$privacy_url = home_url( '/politique-de-confidentialite/' );
?>

<section class="legal-page legal-page--cgv" aria-labelledby="legal-cgv-title">
    <div class="legal-intro-card">
        <p class="eyebrow"><?php esc_html_e( 'E-commerce', 'theme-perso' ); ?></p>
        <h2 id="legal-cgv-title"><?php esc_html_e( 'Conditions générales de vente', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'Les présentes conditions générales de vente présentent le cadre théorique applicable aux produits et commandes affichés sur le site COSM’ÉTHIQUE.', 'theme-perso' ); ?></p>
        <div class="legal-alert legal-alert--student">
            <strong><?php esc_html_e( 'Important', 'theme-perso' ); ?></strong>
            <p><?php esc_html_e( 'Ce site est un projet étudiant fictif. Les commandes, paiements et livraisons sont simulés. Aucun paiement réel n’est encaissé et aucune commande réelle ne peut être exécutée depuis ce site.', 'theme-perso' ); ?></p>
        </div>
    </div>

    <nav class="legal-summary" aria-label="<?php esc_attr_e( 'Sommaire des conditions générales de vente', 'theme-perso' ); ?>">
        <a href="#objet-cgv"><?php esc_html_e( 'Objet', 'theme-perso' ); ?></a>
        <a href="#produits-cgv"><?php esc_html_e( 'Produits', 'theme-perso' ); ?></a>
        <a href="#prix-cgv"><?php esc_html_e( 'Prix', 'theme-perso' ); ?></a>
        <a href="#commande-cgv"><?php esc_html_e( 'Commande', 'theme-perso' ); ?></a>
        <a href="#paiement-cgv"><?php esc_html_e( 'Paiement', 'theme-perso' ); ?></a>
        <a href="#livraison-cgv"><?php esc_html_e( 'Livraison', 'theme-perso' ); ?></a>
        <a href="#retractation-cgv"><?php esc_html_e( 'Rétractation', 'theme-perso' ); ?></a>
        <a href="#litiges-cgv"><?php esc_html_e( 'Litiges', 'theme-perso' ); ?></a>
    </nav>

    <div class="legal-grid">
        <article class="legal-section-card" id="objet-cgv">
            <span class="legal-card-index">01</span>
            <h2><?php esc_html_e( 'Objet des CGV', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les CGV encadrent la présentation des ventes de cosmétiques naturels, produits biologiques et accessoires écoresponsables proposés sur le site.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Dans le cadre de ce projet étudiant, elles décrivent un parcours e-commerce professionnel mais les transactions restent simulées.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="produits-cgv">
            <span class="legal-card-index">02</span>
            <h2><?php esc_html_e( 'Produits', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les fiches produits présentent des descriptions, visuels, prix, informations principales, bénéfices, routines et produits associés.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Ces informations sont utilisées à des fins de démonstration et devront être vérifiées avant toute commercialisation réelle.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="prix-cgv">
            <span class="legal-card-index">03</span>
            <h2><?php esc_html_e( 'Prix', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les prix sont affichés en euros et présentés comme TTC lorsque cela est applicable dans l’interface WooCommerce.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Dans le cadre de la soutenance, les prix, promotions, frais de livraison et avantages affichés sont fictifs.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="commande-cgv">
            <span class="legal-card-index">04</span>
            <h2><?php esc_html_e( 'Commande', 'theme-perso' ); ?></h2>
            <ol class="legal-steps">
                <li><?php esc_html_e( 'Choix du produit ou du pack.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Ajout au panier.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Validation du panier.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Saisie des informations client.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Acceptation des CGV.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Paiement simulé.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Confirmation de commande fictive.', 'theme-perso' ); ?></li>
            </ol>
        </article>

        <article class="legal-section-card" id="paiement-cgv">
            <span class="legal-card-index">05</span>
            <h2><?php esc_html_e( 'Paiement', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les moyens de paiement affichés peuvent inclure carte bancaire, Apple Pay, Google Pay, PayPal ou paiement en plusieurs fois selon la configuration de démonstration.', 'theme-perso' ); ?></p>
            <p><strong><?php esc_html_e( 'Aucun paiement réel n’est encaissé dans le cadre de ce projet.', 'theme-perso' ); ?></strong></p>
        </article>

        <article class="legal-section-card" id="livraison-cgv">
            <span class="legal-card-index">06</span>
            <h2><?php esc_html_e( 'Livraison', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les informations de livraison affichées servent à simuler un parcours e-commerce complet : délais, seuil de livraison offerte, suivi et confirmation.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Aucune expédition réelle n’est effectuée depuis le site dans le cadre du projet étudiant.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="retractation-cgv">
            <span class="legal-card-index">07</span>
            <h2><?php esc_html_e( 'Droit de rétractation', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Pour une exploitation réelle, le droit de rétractation devra être adapté aux produits cosmétiques, notamment aux produits scellés ne pouvant pas être retournés après ouverture pour des raisons d’hygiène.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Cette section devra être validée juridiquement avant mise en production commerciale.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="garanties-cgv">
            <span class="legal-card-index">08</span>
            <h2><?php esc_html_e( 'Garanties et réclamations', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Dans un cadre réel, les garanties légales de conformité et relatives aux défauts du produit s’appliqueraient selon la réglementation en vigueur.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Les demandes de remboursement, échange ou réclamation sont présentées ici de manière théorique.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="service-client-cgv">
            <span class="legal-card-index">09</span>
            <h2><?php esc_html_e( 'Service client', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Le service client peut être contacté via la page Contact ou par e-mail à contact@cosmethique.fr. Le délai de réponse indicatif est de 2 à 5 jours ouvrés dans le cadre de la démonstration.', 'theme-perso' ); ?></p>
            <p><a class="legal-inline-link" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contacter COSM’ÉTHIQUE', 'theme-perso' ); ?></a></p>
        </article>

        <article class="legal-section-card" id="responsabilite-cgv">
            <span class="legal-card-index">10</span>
            <h2><?php esc_html_e( 'Responsabilité', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Le site constitue une démonstration pédagogique. COSM’ÉTHIQUE ne peut être tenue responsable d’une commande, livraison, paiement ou disponibilité produit présentés fictivement.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="donnees-cgv">
            <span class="legal-card-index">11</span>
            <h2><?php esc_html_e( 'Données personnelles', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les données éventuellement saisies dans le cadre des formulaires ou du tunnel WooCommerce sont encadrées par la politique de confidentialité.', 'theme-perso' ); ?></p>
            <p><a class="legal-inline-link" href="<?php echo esc_url( $privacy_url ); ?>"><?php esc_html_e( 'Consulter la politique de confidentialité', 'theme-perso' ); ?></a></p>
        </article>

        <article class="legal-section-card" id="litiges-cgv">
            <span class="legal-card-index">12</span>
            <h2><?php esc_html_e( 'Litiges et médiation', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les informations relatives à la médiation de la consommation, au tribunal compétent et aux modalités de règlement des litiges sont à compléter avant exploitation réelle.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Une validation juridique finale est nécessaire pour transformer ces CGV pédagogiques en conditions commerciales opposables.', 'theme-perso' ); ?></p>
        </article>
    </div>

    <div class="legal-alert legal-alert--acceptance">
        <strong><?php esc_html_e( 'Acceptation des CGV', 'theme-perso' ); ?></strong>
        <p><?php esc_html_e( 'Si le tunnel de commande est actif, l’utilisateur doit pouvoir accepter les CGV avant validation de la commande. Cette acceptation doit rester distincte de l’acceptation marketing ou newsletter.', 'theme-perso' ); ?></p>
    </div>
</section>
