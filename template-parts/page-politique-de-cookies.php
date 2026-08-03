<?php
/**
 * Page Politique de cookies.
 *
 * @package Theme_Perso
 */
?>

<section class="cookie-policy-page">
    <div class="cookie-policy-intro">
        <p class="eyebrow"><?php esc_html_e( 'Confidentialité', 'theme-perso' ); ?></p>
        <h2><?php esc_html_e( 'Une gestion claire et maîtrisée des cookies.', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'COSM’ÉTHIQUE utilise uniquement les cookies utiles au bon fonctionnement du site et, avec votre accord, des cookies destinés à améliorer l’expérience, mesurer l’audience ou personnaliser certains contenus.', 'theme-perso' ); ?></p>
        <button class="button button-primary" type="button" data-cookie-manage><?php esc_html_e( 'Modifier mes préférences', 'theme-perso' ); ?></button>
    </div>

    <div class="cookie-policy-grid">
        <article>
            <h3><?php esc_html_e( 'Cookies strictement nécessaires', 'theme-perso' ); ?></h3>
            <p><?php esc_html_e( 'Ils permettent d’utiliser les fonctions essentielles du site : panier, commande, sécurité, compte client et mémorisation de votre choix de consentement.', 'theme-perso' ); ?></p>
            <small><?php esc_html_e( 'Durée : session à 6 mois selon la finalité.', 'theme-perso' ); ?></small>
        </article>
        <article>
            <h3><?php esc_html_e( 'Cookies analytiques', 'theme-perso' ); ?></h3>
            <p><?php esc_html_e( 'Ils nous aident à comprendre les pages consultées et les parcours les plus utiles afin d’améliorer continuellement le site.', 'theme-perso' ); ?></p>
            <small><?php esc_html_e( 'Durée : 13 mois maximum après consentement.', 'theme-perso' ); ?></small>
        </article>
        <article>
            <h3><?php esc_html_e( 'Cookies marketing', 'theme-perso' ); ?></h3>
            <p><?php esc_html_e( 'Ils servent à mesurer l’efficacité des campagnes et à proposer des contenus plus pertinents, uniquement si vous les acceptez.', 'theme-perso' ); ?></p>
            <small><?php esc_html_e( 'Durée : 6 à 13 mois selon les partenaires.', 'theme-perso' ); ?></small>
        </article>
        <article>
            <h3><?php esc_html_e( 'Cookies de personnalisation', 'theme-perso' ); ?></h3>
            <p><?php esc_html_e( 'Ils mémorisent certaines préférences d’affichage et de navigation pour rendre votre expérience plus fluide.', 'theme-perso' ); ?></p>
            <small><?php esc_html_e( 'Durée : 6 mois maximum.', 'theme-perso' ); ?></small>
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
                    <th><?php esc_html_e( 'Durée', 'theme-perso' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php esc_html_e( 'Nécessaires', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Sécurité, panier, paiement, compte client, préférence de cookies.', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Non requis', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Session à 6 mois', 'theme-perso' ); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e( 'Analytiques', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Mesure d’audience et amélioration de l’expérience utilisateur.', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Requis', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( '13 mois maximum', 'theme-perso' ); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e( 'Marketing', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Mesure des campagnes et contenus publicitaires personnalisés.', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Requis', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( '6 à 13 mois', 'theme-perso' ); ?></td>
                </tr>
                <tr>
                    <td><?php esc_html_e( 'Personnalisation', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Préférences d’affichage, langue, confort de navigation.', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( 'Requis sauf cookies techniques', 'theme-perso' ); ?></td>
                    <td><?php esc_html_e( '6 mois maximum', 'theme-perso' ); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <section class="cookie-policy-rights">
        <h2><?php esc_html_e( 'Vos droits', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'Vous pouvez accepter, refuser ou modifier vos préférences à tout moment depuis le lien “Gérer mes cookies” disponible en pied de page. Vous pouvez également supprimer les cookies depuis les réglages de votre navigateur.', 'theme-perso' ); ?></p>
        <p><?php esc_html_e( 'Pour toute question concernant vos données personnelles, vous pouvez nous contacter via la page Contact.', 'theme-perso' ); ?></p>
    </section>
</section>
