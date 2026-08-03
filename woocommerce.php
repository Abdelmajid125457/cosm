<?php
/**
 * Wrapper WooCommerce.
 *
 * @package Theme_Perso
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php if ( is_shop() && function_exists( 'theme_perso_render_shop_page' ) ) : ?>
        <?php theme_perso_render_shop_page(); ?>
    <?php elseif ( is_product_category( array( 'soins-visage', 'visage', 'soins-du-visage' ) ) && function_exists( 'theme_perso_render_visage_category_page' ) ) : ?>
        <?php theme_perso_render_visage_category_page(); ?>
    <?php elseif ( is_product_category( array( 'soins-corps', 'corps', 'soins-du-corps' ) ) && function_exists( 'theme_perso_render_corps_category_page' ) ) : ?>
        <?php theme_perso_render_corps_category_page(); ?>
    <?php elseif ( is_product_category( array( 'soins-cheveux', 'cheveux', 'soins-des-cheveux' ) ) && function_exists( 'theme_perso_render_cheveux_category_page' ) ) : ?>
        <?php theme_perso_render_cheveux_category_page(); ?>
    <?php elseif ( is_product_category( 'accessoires-beaute' ) && function_exists( 'theme_perso_render_accessoires_category_page' ) ) : ?>
        <?php theme_perso_render_accessoires_category_page(); ?>
    <?php elseif ( is_product_category( 'packs' ) && function_exists( 'theme_perso_render_packs_category_page' ) ) : ?>
        <?php theme_perso_render_packs_category_page(); ?>
    <?php else : ?>
        <header class="archive-hero<?php echo is_product() ? ' archive-hero--product' : ''; ?>">
            <div class="container">
                <p class="eyebrow">COSM’ETHIQUE</p>
                <?php if ( is_product() ) : ?>
                <h1><?php the_title(); ?></h1>
                <p><?php esc_html_e( 'Découvrez la description, les images, le prix, le code promo et l’ajout au panier.', 'theme-perso' ); ?></p>
                <?php else : ?>
                    <h1><?php woocommerce_page_title(); ?></h1>
                <?php endif; ?>
            </div>
        </header>

        <div class="container archive-wrap<?php echo is_product() ? ' archive-wrap--product' : ''; ?>">
            <?php woocommerce_content(); ?>
        </div>
    <?php endif; ?>
</main>

<?php
get_footer();
