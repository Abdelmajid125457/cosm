<?php
/**
 * Page Mentions légales.
 *
 * @package Theme_Perso
 */

$contact_url = home_url( '/contact/' );
$privacy_url = home_url( '/politique-de-confidentialite/' );
$cookies_url = theme_perso_cookie_policy_url();
?>

<section class="legal-page legal-page--mentions" aria-labelledby="legal-mentions-title">
    <div class="legal-intro-card">
        <p class="eyebrow"><?php esc_html_e( 'Cadre légal', 'theme-perso' ); ?></p>
        <h2 id="legal-mentions-title"><?php esc_html_e( 'Mentions légales COSM’ÉTHIQUE', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'Cette page rassemble les informations d’identification de COSM’ÉTHIQUE SAS, les responsabilités éditoriales, les conditions d’hébergement et les mentions propres au cadre pédagogique du projet.', 'theme-perso' ); ?></p>
        <div class="legal-alert legal-alert--student">
            <strong><?php esc_html_e( 'Projet étudiant fictif', 'theme-perso' ); ?></strong>
            <p><?php esc_html_e( 'Ce site est un projet étudiant fictif réalisé dans le cadre d’une soutenance. Aucun achat réel, paiement réel ou livraison réelle ne peut être effectué.', 'theme-perso' ); ?></p>
        </div>
    </div>

    <nav class="legal-summary" aria-label="<?php esc_attr_e( 'Sommaire des mentions légales', 'theme-perso' ); ?>">
        <a href="#editeur-site"><?php esc_html_e( 'Éditeur', 'theme-perso' ); ?></a>
        <a href="#responsable-publication"><?php esc_html_e( 'Publication', 'theme-perso' ); ?></a>
        <a href="#hebergeur-site"><?php esc_html_e( 'Hébergeur', 'theme-perso' ); ?></a>
        <a href="#propriete-intellectuelle"><?php esc_html_e( 'Propriété intellectuelle', 'theme-perso' ); ?></a>
        <a href="#responsabilite-site"><?php esc_html_e( 'Responsabilité', 'theme-perso' ); ?></a>
        <a href="#donnees-cookies"><?php esc_html_e( 'Données & cookies', 'theme-perso' ); ?></a>
    </nav>

    <div class="legal-grid legal-grid--identity" id="editeur-site">
        <article class="legal-section-card legal-section-card--wide">
            <span class="legal-card-index">01</span>
            <h2><?php esc_html_e( 'Éditeur du site', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Le site COSM’ÉTHIQUE est édité, dans le cadre de ce projet pédagogique, par la société fictive suivante :', 'theme-perso' ); ?></p>
            <dl class="legal-definition-list">
                <div><dt><?php esc_html_e( 'Dénomination sociale', 'theme-perso' ); ?></dt><dd>COSM’ÉTHIQUE SAS</dd></div>
                <div><dt><?php esc_html_e( 'Nom commercial', 'theme-perso' ); ?></dt><dd>Cosm’Éthique</dd></div>
                <div><dt><?php esc_html_e( 'Forme juridique', 'theme-perso' ); ?></dt><dd><?php esc_html_e( 'Société par Actions Simplifiée (SAS)', 'theme-perso' ); ?></dd></div>
                <div><dt><?php esc_html_e( 'Capital social', 'theme-perso' ); ?></dt><dd>50 000 €</dd></div>
                <div><dt><?php esc_html_e( 'Adresse', 'theme-perso' ); ?></dt><dd>28 Rue des Martyrs, 75009 Paris, France</dd></div>
                <div><dt>RCS</dt><dd>Paris B 894 632 517</dd></div>
                <div><dt>SIREN</dt><dd>894 632 517</dd></div>
                <div><dt>SIRET</dt><dd>894 632 517 00018</dd></div>
                <div><dt><?php esc_html_e( 'Code APE / NAF', 'theme-perso' ); ?></dt><dd>4775Z — <?php esc_html_e( 'Commerce de détail de produits de beauté', 'theme-perso' ); ?></dd></div>
                <div><dt><?php esc_html_e( 'TVA intracommunautaire', 'theme-perso' ); ?></dt><dd>FR 82 894 632 517</dd></div>
                <div><dt><?php esc_html_e( 'Représentante légale', 'theme-perso' ); ?></dt><dd><?php esc_html_e( 'Madame Claire Lefebvre, Présidente', 'theme-perso' ); ?></dd></div>
                <div><dt><?php esc_html_e( 'Activité', 'theme-perso' ); ?></dt><dd><?php esc_html_e( 'Vente de cosmétiques naturels, biologiques et accessoires écoresponsables.', 'theme-perso' ); ?></dd></div>
            </dl>
        </article>

        <article class="legal-section-card" id="responsable-publication">
            <span class="legal-card-index">02</span>
            <h2><?php esc_html_e( 'Responsable de publication', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'La responsable de publication est Madame Claire Lefebvre, représentante de COSM’ÉTHIQUE SAS dans le cadre du projet étudiant.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Cette information permet d’identifier la personne référente pour les contenus publiés dans cette démonstration.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="hebergeur-site">
            <span class="legal-card-index">03</span>
            <h2><?php esc_html_e( 'Hébergeur', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Le site est prévu pour être hébergé sur une infrastructure OVHcloud / VPS avec environnement web sécurisé.', 'theme-perso' ); ?></p>
            <p><strong><?php esc_html_e( 'Informations à compléter avant exploitation réelle :', 'theme-perso' ); ?></strong> <?php esc_html_e( 'adresse exacte de l’hébergeur, contact technique, modalités de support et configuration finale de production.', 'theme-perso' ); ?></p>
            <ul class="legal-check-list">
                <li>WordPress</li>
                <li>WooCommerce</li>
                <li>PHP</li>
                <li>MariaDB / MySQL</li>
                <li>Nginx</li>
                <li>HTTPS</li>
            </ul>
        </article>
    </div>

    <article class="legal-section-card" id="contact-legal">
        <span class="legal-card-index">04</span>
        <h2><?php esc_html_e( 'Contact', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'Pour toute demande relative au site, aux contenus ou aux données personnelles, l’utilisateur peut contacter l’équipe COSM’ÉTHIQUE via la page Contact.', 'theme-perso' ); ?></p>
        <p><a class="legal-inline-link" href="mailto:contact@cosmethique.fr">contact@cosmethique.fr</a></p>
        <p><a class="button button-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Accéder à la page Contact', 'theme-perso' ); ?></a></p>
    </article>

    <div class="legal-grid">
        <article class="legal-section-card" id="propriete-intellectuelle">
            <span class="legal-card-index">05</span>
            <h2><?php esc_html_e( 'Propriété intellectuelle', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Le logo, la charte graphique, les textes, les visuels, les fiches produits, les interfaces, les animations et l’ensemble des contenus présentés sur le site sont protégés par le droit de la propriété intellectuelle.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Toute reproduction, représentation, adaptation ou réutilisation sans autorisation préalable est interdite. Certains contenus peuvent être utilisés à titre pédagogique dans le cadre de la soutenance.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="responsabilite-site">
            <span class="legal-card-index">06</span>
            <h2><?php esc_html_e( 'Responsabilité', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les informations publiées sont fournies à titre de démonstration et ne constituent pas une offre commerciale réelle. Les produits, prix, promotions, commandes et paiements sont simulés.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'COSM’ÉTHIQUE ne garantit pas une exploitation commerciale effective du site sans validation juridique, technique et réglementaire préalable.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="donnees-cookies">
            <span class="legal-card-index">07</span>
            <h2><?php esc_html_e( 'Données personnelles et cookies', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les données transmises via les formulaires sont utilisées uniquement pour traiter la demande dans le cadre du projet. Les cookies peuvent être acceptés, refusés ou personnalisés à tout moment.', 'theme-perso' ); ?></p>
            <div class="legal-link-row">
                <a href="<?php echo esc_url( $privacy_url ); ?>"><?php esc_html_e( 'Politique de confidentialité', 'theme-perso' ); ?></a>
                <a href="<?php echo esc_url( $cookies_url ); ?>"><?php esc_html_e( 'Politique de cookies', 'theme-perso' ); ?></a>
            </div>
        </article>

        <article class="legal-section-card legal-section-card--notice">
            <span class="legal-card-index">08</span>
            <h2><?php esc_html_e( 'Validation juridique', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Ces mentions légales sont adaptées à un projet étudiant fictif. Une validation juridique finale serait nécessaire avant toute exploitation commerciale réelle.', 'theme-perso' ); ?></p>
        </article>
    </div>
</section>
