<?php
/**
 * Page Politique de cookies.
 *
 * @package Theme_Perso
 */

$privacy_url = home_url( '/politique-de-confidentialite/' );
?>

<section class="legal-page legal-page--cookies cookie-policy-page" aria-labelledby="legal-cookies-title">
    <div class="legal-intro-card cookie-policy-intro">
        <p class="eyebrow"><?php esc_html_e( 'Cookies & RGPD', 'theme-perso' ); ?></p>
        <h2 id="legal-cookies-title"><?php esc_html_e( 'Une gestion claire et maîtrisée des cookies.', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'COSM’ÉTHIQUE utilise des cookies nécessaires au fonctionnement du site et, avec votre accord, des cookies destinés à mesurer l’audience, améliorer l’expérience ou personnaliser certains contenus.', 'theme-perso' ); ?></p>
        <div class="legal-actions">
            <button class="button button-primary" type="button" data-cookie-manage><?php esc_html_e( 'Modifier mes préférences', 'theme-perso' ); ?></button>
            <a class="button button-secondary" href="<?php echo esc_url( $privacy_url ); ?>"><?php esc_html_e( 'Politique de confidentialité', 'theme-perso' ); ?></a>
        </div>
    </div>

    <nav class="legal-summary" aria-label="<?php esc_attr_e( 'Sommaire de la politique de cookies', 'theme-perso' ); ?>">
        <a href="#definition-cookies"><?php esc_html_e( 'Définition', 'theme-perso' ); ?></a>
        <a href="#cookies-necessaires"><?php esc_html_e( 'Nécessaires', 'theme-perso' ); ?></a>
        <a href="#cookies-analytiques"><?php esc_html_e( 'Analytiques', 'theme-perso' ); ?></a>
        <a href="#cookies-marketing"><?php esc_html_e( 'Marketing', 'theme-perso' ); ?></a>
        <a href="#cookies-personnalisation"><?php esc_html_e( 'Personnalisation', 'theme-perso' ); ?></a>
        <a href="#gestion-consentement"><?php esc_html_e( 'Consentement', 'theme-perso' ); ?></a>
    </nav>

    <div class="legal-grid cookie-policy-grid">
        <article id="definition-cookies">
            <span class="legal-card-index">01</span>
            <h2><?php esc_html_e( 'Qu’est-ce qu’un cookie ?', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Un cookie est un petit fichier déposé sur le terminal de l’utilisateur afin de mémoriser une information, sécuriser une session, mesurer une audience ou adapter l’expérience.', 'theme-perso' ); ?></p>
        </article>
        <article id="cookies-necessaires">
            <span class="legal-card-index">02</span>
            <h2><?php esc_html_e( 'Cookies strictement nécessaires', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Ils permettent d’utiliser les fonctions essentielles : sécurité, panier, paiement simulé, compte client et mémorisation du choix de consentement.', 'theme-perso' ); ?></p>
            <small><?php esc_html_e( 'Consentement non requis — session à 6 mois.', 'theme-perso' ); ?></small>
        </article>
        <article id="cookies-analytiques">
            <span class="legal-card-index">03</span>
            <h2><?php esc_html_e( 'Cookies analytiques', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Ils aident à comprendre les pages consultées et les parcours les plus utiles via Google Analytics, uniquement après consentement.', 'theme-perso' ); ?></p>
            <small><?php esc_html_e( 'Consentement requis — 13 mois maximum.', 'theme-perso' ); ?></small>
        </article>
        <article id="cookies-marketing">
            <span class="legal-card-index">04</span>
            <h2><?php esc_html_e( 'Cookies marketing', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Ils peuvent mesurer l’efficacité des campagnes ou personnaliser certains contenus publicitaires si l’utilisateur les accepte.', 'theme-perso' ); ?></p>
            <small><?php esc_html_e( 'Consentement requis — 6 à 13 mois.', 'theme-perso' ); ?></small>
        </article>
        <article id="cookies-personnalisation">
            <span class="legal-card-index">05</span>
            <h2><?php esc_html_e( 'Cookies de personnalisation', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Ils mémorisent certaines préférences comme la langue, l’affichage ou les réglages de confort de navigation.', 'theme-perso' ); ?></p>
            <small><?php esc_html_e( 'Consentement requis sauf préférence technique — 6 mois maximum.', 'theme-perso' ); ?></small>
        </article>
        <article id="gestion-consentement">
            <span class="legal-card-index">06</span>
            <h2><?php esc_html_e( 'Gestion du consentement', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Le bandeau cookies propose trois choix : Tout accepter, Tout refuser ou Personnaliser. Le choix peut être modifié à tout moment depuis le lien “Gérer mes cookies” dans le footer.', 'theme-perso' ); ?></p>
            <button class="legal-cookie-inline" type="button" data-cookie-manage><?php esc_html_e( 'Gérer mes cookies', 'theme-perso' ); ?></button>
        </article>
    </div>

    <div class="cookie-policy-table-wrap">
        <h2><?php esc_html_e( 'Détail des finalités', 'theme-perso' ); ?></h2>
        <table class="cookie-policy-table">
            <thead>
                <tr>
                    <th><?php esc_html_e( 'Catégorie', 'theme-perso' ); ?></th>
                    <th><?php esc_html_e( 'Finalité', 'theme-perso' ); ?></th>
                    <th><?php esc_html_e( 'Consentement', 'theme-perso' ); ?></th>
                    <th><?php esc_html_e( 'Durée indicative', 'theme-perso' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php esc_html_e( 'Nécessaires', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Sécurité, panier, compte client, paiement simulé, choix cookies.', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Non requis', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Session à 6 mois', 'theme-perso' ); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e( 'Analytiques', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Mesure d’audience, amélioration UX, analyse des performances.', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Requis', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( '13 mois maximum', 'theme-perso' ); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e( 'Marketing', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Mesure de campagnes, contenus promotionnels personnalisés.', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Requis', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( '6 à 13 mois', 'theme-perso' ); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e( 'Personnalisation', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Langue, préférences d’affichage, confort de navigation.', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Requis sauf cookies techniques', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( '6 mois maximum', 'theme-perso' ); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <section class="cookie-policy-rights">
        <h2><?php esc_html_e( 'Modifier ou retirer son choix', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'L’utilisateur peut accepter, refuser ou modifier ses préférences à tout moment depuis le lien “Gérer mes cookies” disponible dans le footer. Il peut également supprimer les cookies depuis les réglages de son navigateur.', 'theme-perso' ); ?></p>
        <p><?php esc_html_e( 'Les cookies nécessaires restent actifs, car ils garantissent la sécurité et le fonctionnement normal du site.', 'theme-perso' ); ?></p>
    </section>
</section>
