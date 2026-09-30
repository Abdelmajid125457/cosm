<?php
/**
 * Page Conditions générales d'utilisation.
 *
 * @package Theme_Perso
 */

$contact_url = home_url( '/contact/' );
?>

<section class="legal-page legal-page--cgu" aria-labelledby="legal-cgu-title">
    <div class="legal-intro-card">
        <p class="eyebrow"><?php esc_html_e( 'Utilisation du site', 'theme-perso' ); ?></p>
        <h2 id="legal-cgu-title"><?php esc_html_e( 'Conditions générales d’utilisation', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'Les présentes CGU encadrent l’accès au site COSM’ÉTHIQUE, la consultation des contenus, l’utilisation du compte client, des formulaires et des fonctionnalités de démonstration.', 'theme-perso' ); ?></p>
        <div class="legal-alert legal-alert--student">
            <strong><?php esc_html_e( 'Projet pédagogique', 'theme-perso' ); ?></strong>
            <p><?php esc_html_e( 'COSM’ÉTHIQUE est un projet étudiant fictif. Les fonctionnalités e-commerce sont présentées à des fins de démonstration et ne produisent aucun effet commercial réel.', 'theme-perso' ); ?></p>
        </div>
    </div>

    <nav class="legal-summary" aria-label="<?php esc_attr_e( 'Sommaire des CGU', 'theme-perso' ); ?>">
        <a href="#acces-site"><?php esc_html_e( 'Accès', 'theme-perso' ); ?></a>
        <a href="#compte-utilisateur"><?php esc_html_e( 'Compte', 'theme-perso' ); ?></a>
        <a href="#formulaires-site"><?php esc_html_e( 'Formulaires', 'theme-perso' ); ?></a>
        <a href="#contenus-site"><?php esc_html_e( 'Contenus', 'theme-perso' ); ?></a>
        <a href="#comportements-interdits"><?php esc_html_e( 'Usages interdits', 'theme-perso' ); ?></a>
        <a href="#contact-cgu"><?php esc_html_e( 'Contact', 'theme-perso' ); ?></a>
    </nav>

    <div class="legal-grid">
        <article class="legal-section-card" id="acces-site">
            <span class="legal-card-index">01</span>
            <h2><?php esc_html_e( 'Accès au site', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Le site est accessible sous réserve d’opérations de maintenance, de mises à jour, d’évolutions techniques ou d’interruptions indépendantes de la volonté de l’éditeur.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="compte-utilisateur">
            <span class="legal-card-index">02</span>
            <h2><?php esc_html_e( 'Compte utilisateur', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Le compte client WooCommerce permet de présenter un espace personnel, des commandes simulées, des adresses et des informations de profil dans le cadre du projet.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'L’utilisateur doit conserver la confidentialité de ses identifiants et signaler toute utilisation anormale.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="formulaires-site">
            <span class="legal-card-index">03</span>
            <h2><?php esc_html_e( 'Formulaires', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les formulaires de contact, franchise, candidature ou inscription servent à simuler un parcours professionnel. Les informations doivent rester cohérentes, exactes et adaptées au contexte pédagogique.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="contenus-site">
            <span class="legal-card-index">04</span>
            <h2><?php esc_html_e( 'Contenus et propriété intellectuelle', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les textes, visuels, interfaces, animations, logos et éléments graphiques du site sont protégés. Toute réutilisation non autorisée est interdite.', 'theme-perso' ); ?></p>
        </article>

        <article class="legal-section-card" id="comportements-interdits">
            <span class="legal-card-index">05</span>
            <h2><?php esc_html_e( 'Usages interdits', 'theme-perso' ); ?></h2>
            <ul class="legal-check-list">
                <li><?php esc_html_e( 'Détourner le site de son objectif pédagogique.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Tenter de contourner les protections techniques.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Publier ou transmettre des informations illicites, trompeuses ou malveillantes.', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Copier les contenus sans autorisation.', 'theme-perso' ); ?></li>
            </ul>
        </article>

        <article class="legal-section-card" id="contact-cgu">
            <span class="legal-card-index">06</span>
            <h2><?php esc_html_e( 'Contact et signalement', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Pour toute question relative à l’utilisation du site, l’utilisateur peut contacter l’équipe via la page Contact.', 'theme-perso' ); ?></p>
            <p><a class="button button-primary" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contacter COSM’ÉTHIQUE', 'theme-perso' ); ?></a></p>
        </article>
    </div>
</section>
