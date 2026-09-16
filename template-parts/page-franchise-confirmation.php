<?php
/**
 * Confirmation candidature franchise.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
?>

<div class="franchise-flow franchise-confirmation-page">
    <section class="franchise-confirmation-panel" aria-labelledby="franchise-confirmation-title">
        <span class="franchise-confirmation-burst" aria-hidden="true"></span>
        <div class="franchise-confirmation-icon" aria-hidden="true">✓</div>
        <p class="franchise-flow-kicker"><?php esc_html_e( 'Demande envoyée', 'theme-perso' ); ?></p>
        <h1 id="franchise-confirmation-title"><?php esc_html_e( 'Votre demande a bien été envoyée', 'theme-perso' ); ?></h1>
        <p><?php esc_html_e( 'Merci pour votre candidature. Notre équipe étudiera votre demande et reviendra vers vous prochainement.', 'theme-perso' ); ?></p>
        <div class="franchise-flow-actions">
            <a class="button button-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Retour à l’accueil', 'theme-perso' ); ?></a>
            <a class="button franchise-flow-secondary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Découvrir la boutique', 'theme-perso' ); ?></a>
        </div>
    </section>
</div>
