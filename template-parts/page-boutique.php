<?php
$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
?>
<section class="rich-section">
    <div class="section-heading">
        <p class="eyebrow">Boutique</p>
        <h2>Installez WooCommerce pour activer le catalogue</h2>
        <p>Le thème est prêt pour la boutique, les fiches produits, le panier, le checkout et le compte client.</p>
    </div>
    <div class="products-grid">
        <?php foreach ( theme_perso_demo_products() as $demo_product ) : ?>
            <article class="product-card">
                <div class="product-image">
                    <img src="<?php echo esc_url( $demo_product['image'] ); ?>" alt="<?php echo esc_attr( $demo_product['title'] ); ?>" loading="lazy">
                    <span class="product-badge"><?php echo esc_html( $demo_product['badge'] ); ?></span>
                </div>
                <div class="product-body">
                    <h3><?php echo esc_html( $demo_product['title'] ); ?></h3>
                    <div class="product-price"><?php echo esc_html( $demo_product['price'] ); ?></div>
                    <a class="button button-primary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Voir la boutique', 'theme-perso' ); ?></a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
