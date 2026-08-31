<?php
/**
 * En-tête premium COSM'ETHIQUE.
 *
 * @package Theme_Perso
 */

$cart_count = 0;

if ( function_exists( 'WC' ) && WC()->cart ) {
    $cart_count = WC()->cart->get_cart_contents_count();
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Aller au contenu', 'theme-perso' ); ?></a>

    <header class="site-header" id="masthead">
        <div class="promo-bar promo-marquee" role="status" aria-label="<?php esc_attr_e( 'Avantages COSM’ETHIQUE', 'theme-perso' ); ?>">
            <div class="promo-track">
                <?php for ( $i = 0; $i < 2; $i++ ) : ?>
                    <span><strong><?php esc_html_e( 'Livraison offerte dès 40€ d’achat', 'theme-perso' ); ?></strong></span>
                    <span><strong><?php esc_html_e( 'Livraison rapide', 'theme-perso' ); ?></strong> <?php esc_html_e( '24-72h en France', 'theme-perso' ); ?></span>
                    <span><strong><?php esc_html_e( 'Produits bio', 'theme-perso' ); ?></strong> <?php esc_html_e( 'Actifs sélectionnés', 'theme-perso' ); ?></span>
                    <span><strong><?php esc_html_e( 'Paiement sécurisé', 'theme-perso' ); ?></strong> <?php esc_html_e( 'SSL & solutions fiables', 'theme-perso' ); ?></span>
                    <span><strong><?php esc_html_e( 'Cruelty free', 'theme-perso' ); ?></strong> <?php esc_html_e( 'Aucun test animal', 'theme-perso' ); ?></span>
                    <span><strong><?php esc_html_e( 'Emballages recyclés', 'theme-perso' ); ?></strong> <?php esc_html_e( 'Choix responsables', 'theme-perso' ); ?></span>
                <?php endfor; ?>
            </div>
        </div>

        <div class="header-shell">
            <div class="header-inner">
                <div class="site-branding">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a class="brand-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php esc_attr_e( 'Accueil COSM’ETHIQUE', 'theme-perso' ); ?>">
                            <span>COSM’ETHIQUE</span>
                        </a>
                    <?php endif; ?>
                </div>

                <button class="mobile-menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu">
                    <span class="screen-reader-text"><?php esc_html_e( 'Ouvrir le menu', 'theme-perso' ); ?></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <nav class="site-navigation" aria-label="<?php esc_attr_e( 'Navigation principale', 'theme-perso' ); ?>">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'primary-menu',
                            'container'      => false,
                            'fallback_cb'    => 'theme_perso_primary_menu_fallback',
                        )
                    );
                    ?>
                </nav>

                <div class="header-actions">
                    <form class="product-search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" data-smart-search>
                        <label class="screen-reader-text" for="cosmethique-product-search"><?php esc_html_e( 'Rechercher un produit', 'theme-perso' ); ?></label>
                        <input id="cosmethique-product-search" type="search" name="s" placeholder="<?php esc_attr_e( 'Recherche', 'theme-perso' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-controls="cosmethique-smart-search-panel" aria-describedby="cosmethique-search-help">
                        <span id="cosmethique-search-help" class="screen-reader-text"><?php esc_html_e( 'Les suggestions apparaissent automatiquement pendant la saisie.', 'theme-perso' ); ?></span>
                        <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                            <input type="hidden" name="post_type" value="product">
                        <?php endif; ?>
                        <button type="submit" aria-label="<?php esc_attr_e( 'Lancer la recherche', 'theme-perso' ); ?>">
                            <svg aria-hidden="true" viewBox="0 0 24 24"><path d="m21 21-4.35-4.35m1.35-5.15a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0Z"/></svg>
                        </button>
                        <div class="smart-search-panel" id="cosmethique-smart-search-panel" hidden>
                            <div class="smart-search-status" aria-live="polite"></div>
                            <div class="smart-search-results" role="listbox" aria-label="<?php esc_attr_e( 'Suggestions de recherche', 'theme-perso' ); ?>"></div>
                        </div>
                    </form>

                    <?php theme_perso_render_language_selector(); ?>

                    <a class="header-icon" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : wp_login_url() ); ?>" aria-label="<?php esc_attr_e( 'Mon compte', 'theme-perso' ); ?>">
                        <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M20 21a8 8 0 0 0-16 0m12-13a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/></svg>
                    </a>

                    <a class="header-icon cart-link" href="<?php echo esc_url( function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Panier', 'theme-perso' ); ?>">
                        <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M6 7h15l-1.5 9h-12L6 7Zm0 0 1-4H3m6 17a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm9 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"/></svg>
                        <span class="cart-count"><?php echo esc_html( $cart_count ); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <?php theme_perso_render_custom_breadcrumb(); ?>
