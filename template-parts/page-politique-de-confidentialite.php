<?php
/**
 * Page Politique de confidentialité.
 *
 * @package Theme_Perso
 */

$contact_url = home_url( '/contact/' );
$cookies_url = theme_perso_cookie_policy_url();
?>

<section class="legal-page legal-page--privacy" aria-labelledby="legal-privacy-title">
    <div class="legal-intro-card">
        <p class="eyebrow"><?php esc_html_e( 'Données personnelles', 'theme-perso' ); ?></p>
        <h2 id="legal-privacy-title"><?php esc_html_e( 'Politique de confidentialité', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'Cette politique explique comment COSM’ÉTHIQUE SAS traite les données personnelles collectées via le site, les formulaires, les comptes clients WooCommerce, les commandes simulées, la newsletter et les outils de mesure d’audience.', 'theme-perso' ); ?></p>
        <div class="legal-alert legal-alert--student">
            <strong><?php esc_html_e( 'Cadre pédagogique', 'theme-perso' ); ?></strong>
            <p><?php esc_html_e( 'COSM’ÉTHIQUE est un projet étudiant fictif. Les données ne doivent pas être utilisées commercialement dans le cadre de cette démonstration.', 'theme-perso' ); ?></p>
        </div>
    </div>

    <nav class="legal-summary" aria-label="<?php esc_attr_e( 'Sommaire de la politique de confidentialité', 'theme-perso' ); ?>">
        <a href="#responsable-traitement"><?php esc_html_e( 'Responsable', 'theme-perso' ); ?></a>
        <a href="#donnees-collectees"><?php esc_html_e( 'Données', 'theme-perso' ); ?></a>
        <a href="#finalites-traitement"><?php esc_html_e( 'Finalités', 'theme-perso' ); ?></a>
        <a href="#bases-legales"><?php esc_html_e( 'Bases légales', 'theme-perso' ); ?></a>
        <a href="#conservation-donnees"><?php esc_html_e( 'Conservation', 'theme-perso' ); ?></a>
        <a href="#droits-utilisateurs"><?php esc_html_e( 'Droits', 'theme-perso' ); ?></a>
        <a href="#securite-donnees"><?php esc_html_e( 'Sécurité', 'theme-perso' ); ?></a>
    </nav>

    <div class="legal-grid">
        <article class="legal-section-card" id="responsable-traitement">
            <span class="legal-card-index">01</span>
            <h2><?php esc_html_e( 'Responsable du traitement', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Le responsable du traitement présenté dans ce projet est COSM’ÉTHIQUE SAS, société fictive située au 28 Rue des Martyrs, 75009 Paris, France.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Représentante : Madame Claire Lefebvre, Présidente.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="donnees-collectees">
            <span class="legal-card-index">02</span>
            <h2><?php esc_html_e( 'Données collectées', 'theme-perso' ); ?></h2>
            <ul class="legal-check-list">
                <li><?php esc_html_e( 'Formulaire de contact : nom, e-mail, message et sujet de la demande.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Formulaire franchise : identité, coordonnées, ville, projet et candidature.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Compte client WooCommerce : identité, e-mail, mot de passe chiffré, adresses, commandes simulées.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Newsletter : adresse e-mail et consentement associé.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Cookies et analytics : données de navigation, préférences de consentement et événements anonymisés ou pseudonymisés.', 'theme-perso' ); ?></li>
            </ul>
        </article>

        <article class="legal-section-card" id="finalites-traitement">
            <span class="legal-card-index">03</span>
            <h2><?php esc_html_e( 'Finalités du traitement', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les données peuvent être utilisées pour répondre aux demandes, gérer les candidatures franchise, améliorer le site, analyser les performances, gérer les comptes utilisateurs, suivre les commandes simulées et envoyer des communications uniquement en cas de consentement.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="bases-legales">
            <span class="legal-card-index">04</span>
            <h2><?php esc_html_e( 'Bases légales', 'theme-perso' ); ?></h2>
            <dl class="legal-definition-list legal-definition-list--compact">
                <div><dt><?php esc_html_e( 'Consentement', 'theme-perso' ); ?></dt><dd><?php esc_html_e( 'newsletter, cookies analytiques ou marketing, préférences facultatives.', 'theme-perso' ); ?></dd></div>
                <div><dt><?php esc_html_e( 'Exécution d’une demande', 'theme-perso' ); ?></dt><dd><?php esc_html_e( 'formulaires de contact, candidature franchise, compte client.', 'theme-perso' ); ?></dd></div>
                <div><dt><?php esc_html_e( 'Intérêt légitime', 'theme-perso' ); ?></dt><dd><?php esc_html_e( 'sécurité, amélioration du site, prévention des abus.', 'theme-perso' ); ?></dd></div>
                <div><dt><?php esc_html_e( 'Obligation légale', 'theme-perso' ); ?></dt><dd><?php esc_html_e( 'à adapter avant exploitation réelle selon les obligations comptables, fiscales ou réglementaires.', 'theme-perso' ); ?></dd></div>
            </dl>
        </article>

        <article class="legal-section-card" id="conservation-donnees">
            <span class="legal-card-index">05</span>
            <h2><?php esc_html_e( 'Durées de conservation', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les demandes de contact peuvent être conservées jusqu’à 3 ans, les candidatures franchise jusqu’à 2 ans, les comptes clients jusqu’à suppression du compte et les données analytiques jusqu’à 13 mois maximum après consentement.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Ces durées devront être adaptées avant toute exploitation réelle.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="destinataires-donnees">
            <span class="legal-card-index">06</span>
            <h2><?php esc_html_e( 'Destinataires', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les données peuvent être accessibles à l’équipe projet COSM’ÉTHIQUE, à l’hébergeur OVHcloud / VPS, aux outils WordPress/WooCommerce nécessaires au fonctionnement du site et aux outils analytics uniquement après consentement.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="droits-utilisateurs">
            <span class="legal-card-index">07</span>
            <h2><?php esc_html_e( 'Droits des utilisateurs', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Chaque utilisateur peut demander l’accès, la rectification, la suppression, l’opposition, la limitation, la portabilité lorsque applicable et le retrait du consentement.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Une réclamation peut également être introduite auprès de la CNIL si l’utilisateur estime que ses droits ne sont pas respectés.', 'theme-perso' ); ?></p>
            <div class="legal-link-row">
                <a href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Exercer mes droits', 'theme-perso' ); ?></a>
                <a href="https://www.cnil.fr/" target="_blank" rel="noopener noreferrer">CNIL</a>
            </div>
        </article>

        <article class="legal-section-card" id="securite-donnees">
            <span class="legal-card-index">08</span>
            <h2><?php esc_html_e( 'Sécurité', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Le site prévoit l’usage de HTTPS, des accès administrateur limités, des bonnes pratiques WordPress, des sauvegardes et une gestion raisonnée des extensions.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Une revue de sécurité complète serait nécessaire avant une mise en production commerciale.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="cookies-confidentialite">
            <span class="legal-card-index">09</span>
            <h2><?php esc_html_e( 'Cookies et consentement', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les cookies nécessaires assurent le fonctionnement du site. Les cookies analytiques, marketing ou de personnalisation sont soumis au choix de l’utilisateur.', 'theme-perso' ); ?></p>
            <p><a class="legal-inline-link" href="<?php echo esc_url( $cookies_url ); ?>"><?php esc_html_e( 'Consulter la politique de cookies', 'theme-perso' ); ?></a></p>
        </article>
    </div>
</section>
