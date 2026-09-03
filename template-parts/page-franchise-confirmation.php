<?php
/**
 * Confirmation candidature franchise.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="franchise-flow franchise-confirmation-page">
    <section class="franchise-confirmation-panel" aria-labelledby="franchise-confirmation-title">
        <span class="franchise-confirmation-burst" aria-hidden="true"></span>
        <div class="franchise-confirmation-icon" aria-hidden="true">✓</div>
        <p class="franchise-flow-kicker"><?php esc_html_e( 'Candidature envoyée', 'theme-perso' ); ?></p>
        <h1 id="franchise-confirmation-title"><?php esc_html_e( 'Merci pour votre candidature.', 'theme-perso' ); ?></h1>
        <p><?php esc_html_e( 'Notre équipe Franchise vous répondra sous quelques jours.', 'theme-perso' ); ?></p>
        <div class="franchise-flow-actions">
            <a class="button button-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Retour à l’accueil', 'theme-perso' ); ?></a>
            <a class="button franchise-flow-secondary" href="<?php echo esc_url( home_url( '/boutiques/' ) ); ?>"><?php esc_html_e( 'Découvrir nos boutiques', 'theme-perso' ); ?></a>
        </div>
    </section>
</div>
