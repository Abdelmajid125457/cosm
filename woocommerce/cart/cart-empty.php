<?php
/**
 * Panier vide premium COSM'ETHIQUE.
 *
 * @package Theme_Perso
 */

defined( 'ABSPATH' ) || exit;

$shop_url       = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
$diagnostic_url = home_url( '/diagnostic/' );
?>

<section class="cart-premium-hero cart-premium-hero--empty" aria-labelledby="empty-cart-hero-title">
    <div class="cart-hero-shape cart-hero-shape--one"></div>
    <div class="cart-hero-shape cart-hero-shape--two"></div>
    <div class="cart-hero-copy">
        <p class="eyebrow"><?php esc_html_e( 'COSM’ÉTHIQUE', 'theme-perso' ); ?></p>
        <h2 id="empty-cart-hero-title"><?php esc_html_e( 'Votre panier beauté', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'Composez une routine naturelle, sensorielle et responsable.', 'theme-perso' ); ?></p>
    </div>
    <div class="cart-hero-products" aria-hidden="true">
        <img src="<?php echo esc_url( theme_perso_product_asset_url( 'photo-baume-corps-karite-amande.png' ) ); ?>" alt="">
        <img src="<?php echo esc_url( theme_perso_product_asset_url( 'photo-serum-eclat-rose.png' ) ); ?>" alt="">
        <img src="<?php echo esc_url( theme_perso_product_asset_url( 'photo-shampooing-doux-sauge-ortie.png' ) ); ?>" alt="">
    </div>
</section>

<section class="cart-empty-premium" aria-labelledby="cart-empty-title">
    <figure class="cart-empty-visual">
        <span aria-hidden="true">□</span>
        <img src="<?php echo esc_url( theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille.png' ) ); ?>" alt="">
        <img src="<?php echo esc_url( theme_perso_product_asset_url( 'photo-huile-seche-botanique.png' ) ); ?>" alt="">
    </figure>
    <div>
        <p class="eyebrow"><?php esc_html_e( 'Panier vide', 'theme-perso' ); ?></p>
        <h2 id="cart-empty-title"><?php esc_html_e( 'Votre panier vous attend.', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'Découvrez notre sélection de soins naturels et créez votre routine beauté personnalisée.', 'theme-perso' ); ?></p>
        <div class="cart-empty-actions">
            <a class="button button-primary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Découvrir la boutique', 'theme-perso' ); ?></a>
            <a class="button shop-button-secondary" href="<?php echo esc_url( $diagnostic_url ); ?>"><?php esc_html_e( 'Faire mon diagnostic beauté', 'theme-perso' ); ?></a>
        </div>
    </div>
</section>

<?php
$recommended_products = class_exists( 'WooCommerce' )
    ? wc_get_products(
        array(
            'status'  => 'publish',
            'limit'   => 8,
            'orderby' => 'date',
            'order'   => 'DESC',
        )
    )
    : array();
?>

<?php if ( ! empty( $recommended_products ) ) : ?>
    <section class="cart-recommendations" aria-labelledby="cart-recommendations-title">
        <div class="section-heading">
            <p class="eyebrow"><?php esc_html_e( 'Sélection beauté', 'theme-perso' ); ?></p>
            <h2 id="cart-recommendations-title"><?php esc_html_e( 'Vous pourriez aimer...', 'theme-perso' ); ?></h2>
        </div>
        <div class="cart-recommendations-grid">
            <?php foreach ( $recommended_products as $recommended_product ) : ?>
                <?php
                if ( ! $recommended_product || ! $recommended_product->is_purchasable() ) {
                    continue;
                }

                $product_id = $recommended_product->get_id();
                $image_url  = get_post_meta( $product_id, '_cosmethique_image_url', true );
                ?>
                <article class="cart-recommendation-card">
                    <a class="cart-recommendation-media" href="<?php echo esc_url( get_permalink( $product_id ) ); ?>">
                        <?php if ( $image_url ) : ?>
                            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $recommended_product->get_name() ); ?>" loading="lazy">
                        <?php else : ?>
                            <?php echo wp_kses_post( $recommended_product->get_image( 'cosmethique-card' ) ); ?>
                        <?php endif; ?>
                    </a>
                    <div>
                        <h3><a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>"><?php echo esc_html( $recommended_product->get_name() ); ?></a></h3>
                        <p><?php echo wp_kses_post( $recommended_product->get_price_html() ); ?></p>
                        <a class="button button-primary ajax_add_to_cart add_to_cart_button" href="<?php echo esc_url( $recommended_product->add_to_cart_url() ); ?>" data-product_id="<?php echo esc_attr( $product_id ); ?>" data-product_sku="<?php echo esc_attr( $recommended_product->get_sku() ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Ajouter %s au panier', 'theme-perso' ), $recommended_product->get_name() ) ); ?>">
                            <?php esc_html_e( 'Ajouter au panier', 'theme-perso' ); ?>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>

<section class="cart-benefits-grid" aria-label="<?php esc_attr_e( 'Avantages COSM’ÉTHIQUE', 'theme-perso' ); ?>">
    <article><span aria-hidden="true">⌁</span><strong><?php esc_html_e( 'Livraison rapide', 'theme-perso' ); ?></strong><p><?php esc_html_e( 'Expédition soignée en 24-72h.', 'theme-perso' ); ?></p></article>
    <article><span aria-hidden="true">◎</span><strong><?php esc_html_e( 'Paiement sécurisé', 'theme-perso' ); ?></strong><p><?php esc_html_e( 'Solutions fiables et paiement SSL.', 'theme-perso' ); ?></p></article>
    <article><span aria-hidden="true">✦</span><strong><?php esc_html_e( 'Produits naturels', 'theme-perso' ); ?></strong><p><?php esc_html_e( 'Actifs sélectionnés avec exigence.', 'theme-perso' ); ?></p></article>
    <article><span aria-hidden="true">♡</span><strong><?php esc_html_e( 'Satisfait ou remboursé', 'theme-perso' ); ?></strong><p><?php esc_html_e( 'Un achat accompagné avec soin.', 'theme-perso' ); ?></p></article>
</section>
