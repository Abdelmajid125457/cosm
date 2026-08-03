<?php
/**
 * Panier premium COSM'ETHIQUE.
 *
 * @package Theme_Perso
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' );

$cart            = WC()->cart;
$cart_items      = $cart ? $cart->get_cart() : array();
$shop_url        = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
$checkout_url    = function_exists( 'wc_get_checkout_url' ) ? wc_get_checkout_url() : home_url( '/commande/' );
$diagnostic_url  = home_url( '/diagnostic/' );
$free_threshold  = 40;
$subtotal_amount = $cart ? (float) $cart->get_displayed_subtotal() : 0;
$remaining       = max( 0, $free_threshold - $subtotal_amount );
$progress        = $free_threshold > 0 ? min( 100, ( $subtotal_amount / $free_threshold ) * 100 ) : 100;
?>

<section class="cart-premium-hero" aria-labelledby="cart-premium-title">
    <div class="cart-hero-shape cart-hero-shape--one"></div>
    <div class="cart-hero-shape cart-hero-shape--two"></div>
    <div class="cart-hero-copy">
        <p class="eyebrow"><?php esc_html_e( 'COSM’ÉTHIQUE', 'theme-perso' ); ?></p>
        <h2 id="cart-premium-title"><?php esc_html_e( 'Votre panier beauté', 'theme-perso' ); ?></h2>
        <p><?php esc_html_e( 'Finalisez votre routine naturelle avec une expérience simple, rassurante et élégante.', 'theme-perso' ); ?></p>
    </div>
    <div class="cart-hero-products" aria-hidden="true">
        <img src="<?php echo esc_url( theme_perso_product_asset_url( 'photo-serum-eclat-rose.png' ) ); ?>" alt="">
        <img src="<?php echo esc_url( theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille.png' ) ); ?>" alt="">
        <img src="<?php echo esc_url( theme_perso_product_asset_url( 'photo-huile-seche-botanique.png' ) ); ?>" alt="">
    </div>
</section>

<nav class="cart-progress-steps" aria-label="<?php esc_attr_e( 'Progression de commande', 'theme-perso' ); ?>">
    <span class="is-active"><?php esc_html_e( 'Panier', 'theme-perso' ); ?></span>
    <span><?php esc_html_e( 'Livraison', 'theme-perso' ); ?></span>
    <span><?php esc_html_e( 'Paiement', 'theme-perso' ); ?></span>
    <span><?php esc_html_e( 'Confirmation', 'theme-perso' ); ?></span>
</nav>

<div class="cart-free-shipping" aria-label="<?php esc_attr_e( 'Progression livraison offerte', 'theme-perso' ); ?>">
    <div>
        <?php if ( $remaining > 0 ) : ?>
            <strong><?php echo wp_kses_post( sprintf( __( 'Plus que %s pour bénéficier de la livraison offerte.', 'theme-perso' ), wc_price( $remaining ) ) ); ?></strong>
        <?php else : ?>
            <strong><?php esc_html_e( 'Livraison offerte débloquée.', 'theme-perso' ); ?></strong>
        <?php endif; ?>
        <span><?php esc_html_e( 'Livraison offerte dès 40 € d’achat.', 'theme-perso' ); ?></span>
    </div>
    <div class="cart-free-shipping-track">
        <span style="width: <?php echo esc_attr( $progress ); ?>%;"></span>
    </div>
</div>

<form class="woocommerce-cart-form cosmethique-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <?php do_action( 'woocommerce_before_cart_table' ); ?>

    <div class="cart-premium-layout">
        <section class="cart-items-panel" aria-label="<?php esc_attr_e( 'Produits du panier', 'theme-perso' ); ?>">
            <?php do_action( 'woocommerce_before_cart_contents' ); ?>

            <?php foreach ( $cart_items as $cart_item_key => $cart_item ) : ?>
                <?php
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( ! $_product || ! $_product->exists() || $cart_item['quantity'] <= 0 || ! apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    continue;
                }

                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'cosmethique-card' ), $cart_item, $cart_item_key );
                $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                ?>
                <article class="cart-product-card" data-cart-product-card>
                    <div class="cart-product-media">
                        <?php if ( $product_permalink ) : ?>
                            <a href="<?php echo esc_url( $product_permalink ); ?>"><?php echo wp_kses_post( $thumbnail ); ?></a>
                        <?php else : ?>
                            <?php echo wp_kses_post( $thumbnail ); ?>
                        <?php endif; ?>
                    </div>

                    <div class="cart-product-info">
                        <span><?php esc_html_e( 'Soin Cosm’Éthique', 'theme-perso' ); ?></span>
                        <h3>
                            <?php if ( $product_permalink ) : ?>
                                <a href="<?php echo esc_url( $product_permalink ); ?>"><?php echo wp_kses_post( $product_name ); ?></a>
                            <?php else : ?>
                                <?php echo wp_kses_post( $product_name ); ?>
                            <?php endif; ?>
                        </h3>
                        <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                    </div>

                    <div class="cart-product-price">
                        <small><?php esc_html_e( 'Prix unitaire', 'theme-perso' ); ?></small>
                        <strong><?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_price', $cart->get_product_price( $_product ), $cart_item, $cart_item_key ) ); ?></strong>
                    </div>

                    <div class="cart-product-quantity">
                        <small><?php esc_html_e( 'Quantité', 'theme-perso' ); ?></small>
                        <div class="cart-quantity-control" data-cart-quantity-control>
                            <button type="button" data-qty-minus aria-label="<?php esc_attr_e( 'Diminuer la quantité', 'theme-perso' ); ?>">−</button>
                            <?php
                            if ( $_product->is_sold_individually() ) {
                                $min_quantity = 1;
                                $max_quantity = 1;
                            } else {
                                $min_quantity = 0;
                                $max_quantity = $_product->get_max_purchase_quantity();
                            }

                            echo woocommerce_quantity_input(
                                array(
                                    'input_name'   => "cart[{$cart_item_key}][qty]",
                                    'input_value'  => $cart_item['quantity'],
                                    'max_value'    => $max_quantity,
                                    'min_value'    => $min_quantity,
                                    'product_name' => $product_name,
                                ),
                                $_product,
                                false
                            );
                            ?>
                            <button type="button" data-qty-plus aria-label="<?php esc_attr_e( 'Augmenter la quantité', 'theme-perso' ); ?>">+</button>
                        </div>
                    </div>

                    <div class="cart-product-subtotal">
                        <small><?php esc_html_e( 'Sous-total', 'theme-perso' ); ?></small>
                        <strong><?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_subtotal', $cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ) ); ?></strong>
                    </div>

                    <div class="cart-product-remove">
                        <?php
                        echo apply_filters(
                            'woocommerce_cart_item_remove_link',
                            sprintf(
                                '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">×</a>',
                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                esc_attr( sprintf( __( 'Supprimer %s du panier', 'theme-perso' ), wp_strip_all_tags( $product_name ) ) ),
                                esc_attr( $product_id ),
                                esc_attr( $_product->get_sku() )
                            ),
                            $cart_item_key
                        );
                        ?>
                    </div>
                </article>
            <?php endforeach; ?>

            <?php do_action( 'woocommerce_cart_contents' ); ?>

            <div class="cart-actions-panel">
                <?php if ( wc_coupons_enabled() ) : ?>
                    <div class="coupon cart-coupon-premium">
                        <label for="coupon_code"><?php esc_html_e( 'Code promo', 'theme-perso' ); ?></label>
                        <div>
                            <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Votre code', 'theme-perso' ); ?>">
                            <button type="submit" class="button shop-button-secondary" name="apply_coupon" value="<?php esc_attr_e( 'Appliquer', 'theme-perso' ); ?>"><?php esc_html_e( 'Appliquer', 'theme-perso' ); ?></button>
                        </div>
                        <?php do_action( 'woocommerce_cart_coupon' ); ?>
                    </div>
                <?php endif; ?>

                <button type="submit" class="button shop-button-secondary cart-update-button" name="update_cart" value="<?php esc_attr_e( 'Mettre à jour le panier', 'theme-perso' ); ?>"><?php esc_html_e( 'Mettre à jour le panier', 'theme-perso' ); ?></button>
                <?php do_action( 'woocommerce_cart_actions' ); ?>
                <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
            </div>

            <?php do_action( 'woocommerce_after_cart_contents' ); ?>
        </section>

        <aside class="cart-summary-card" aria-label="<?php esc_attr_e( 'Récapitulatif du panier', 'theme-perso' ); ?>">
            <p class="eyebrow"><?php esc_html_e( 'Récapitulatif', 'theme-perso' ); ?></p>
            <h2><?php esc_html_e( 'Votre commande', 'theme-perso' ); ?></h2>
            <dl>
                <div>
                    <dt><?php esc_html_e( 'Sous-total', 'theme-perso' ); ?></dt>
                    <dd><?php echo wp_kses_post( $cart->get_cart_subtotal() ); ?></dd>
                </div>
                <div>
                    <dt><?php esc_html_e( 'Livraison', 'theme-perso' ); ?></dt>
                    <dd><?php echo wp_kses_post( $cart->needs_shipping() ? $cart->get_cart_shipping_total() : esc_html__( 'Calculée au paiement', 'theme-perso' ) ); ?></dd>
                </div>
                <div>
                    <dt><?php esc_html_e( 'Réduction', 'theme-perso' ); ?></dt>
                    <dd><?php echo wp_kses_post( wc_price( $cart->get_discount_total() ) ); ?></dd>
                </div>
                <div>
                    <dt><?php esc_html_e( 'TVA', 'theme-perso' ); ?></dt>
                    <dd><?php echo wp_kses_post( wc_price( $cart->get_taxes_total() ) ); ?></dd>
                </div>
                <div class="cart-summary-total">
                    <dt><?php esc_html_e( 'Total', 'theme-perso' ); ?></dt>
                    <dd><?php echo wp_kses_post( $cart->get_total() ); ?></dd>
                </div>
            </dl>
            <a class="button button-primary checkout-button" href="<?php echo esc_url( $checkout_url ); ?>"><?php esc_html_e( 'Commander', 'theme-perso' ); ?></a>
            <a class="cart-continue-link" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Continuer mes achats', 'theme-perso' ); ?></a>
        </aside>
    </div>

    <?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<section class="cart-benefits-grid" aria-label="<?php esc_attr_e( 'Avantages COSM’ÉTHIQUE', 'theme-perso' ); ?>">
    <article><span aria-hidden="true">⌁</span><strong><?php esc_html_e( 'Livraison rapide', 'theme-perso' ); ?></strong><p><?php esc_html_e( 'Expédition soignée en 24-72h.', 'theme-perso' ); ?></p></article>
    <article><span aria-hidden="true">◎</span><strong><?php esc_html_e( 'Paiement sécurisé', 'theme-perso' ); ?></strong><p><?php esc_html_e( 'Solutions fiables et paiement SSL.', 'theme-perso' ); ?></p></article>
    <article><span aria-hidden="true">✦</span><strong><?php esc_html_e( 'Produits naturels', 'theme-perso' ); ?></strong><p><?php esc_html_e( 'Actifs sélectionnés avec exigence.', 'theme-perso' ); ?></p></article>
    <article><span aria-hidden="true">♡</span><strong><?php esc_html_e( 'Satisfait ou remboursé', 'theme-perso' ); ?></strong><p><?php esc_html_e( 'Un achat accompagné avec soin.', 'theme-perso' ); ?></p></article>
</section>

<?php do_action( 'woocommerce_after_cart' ); ?>
