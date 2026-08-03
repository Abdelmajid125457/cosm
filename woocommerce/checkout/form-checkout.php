<?php
/**
 * Premium checkout form.
 *
 * @package Theme_Perso
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

$checkout_image_one = function_exists( 'theme_perso_product_asset_url' ) ? theme_perso_product_asset_url( 'photo-serum-eclat-rose.png' ) : '';
$checkout_image_two = function_exists( 'theme_perso_product_asset_url' ) ? theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille.png' ) : '';
$checkout_image_three = function_exists( 'theme_perso_product_asset_url' ) ? theme_perso_product_asset_url( 'photo-huile-seche-botanique.png' ) : '';
$coupon_form_priority = has_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form' );

if ( false !== $coupon_form_priority ) {
	remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', $coupon_form_priority );
}

do_action( 'woocommerce_before_checkout_form', $checkout );

if ( false !== $coupon_form_priority ) {
	add_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', $coupon_form_priority );
}

if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

$payment_hook_priority = has_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment' );

if ( false !== $payment_hook_priority ) {
	remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', $payment_hook_priority );
}
?>

<section class="checkout-premium-hero motion-reveal" aria-labelledby="checkout-premium-title">
	<span class="checkout-hero-shape checkout-hero-shape--one" aria-hidden="true"></span>
	<span class="checkout-hero-shape checkout-hero-shape--two" aria-hidden="true"></span>
	<div class="checkout-premium-copy">
		<p class="eyebrow"><?php esc_html_e( 'Commande sécurisée', 'theme-perso' ); ?></p>
		<h1 id="checkout-premium-title"><?php esc_html_e( 'Finalisez votre rituel beauté.', 'theme-perso' ); ?></h1>
		<p><?php esc_html_e( 'Un tunnel simple, rassurant et pensé pour protéger vos données jusqu’au paiement.', 'theme-perso' ); ?></p>
	</div>
	<div class="checkout-hero-products" aria-hidden="true">
		<?php if ( $checkout_image_one ) : ?>
			<img class="checkout-floating-product checkout-floating-product--one" src="<?php echo esc_url( $checkout_image_one ); ?>" alt="" loading="lazy">
		<?php endif; ?>
		<?php if ( $checkout_image_two ) : ?>
			<img class="checkout-floating-product checkout-floating-product--two" src="<?php echo esc_url( $checkout_image_two ); ?>" alt="" loading="lazy">
		<?php endif; ?>
		<?php if ( $checkout_image_three ) : ?>
			<img class="checkout-floating-product checkout-floating-product--three" src="<?php echo esc_url( $checkout_image_three ); ?>" alt="" loading="lazy">
		<?php endif; ?>
	</div>
</section>

<nav class="checkout-progress-steps motion-reveal" aria-label="<?php esc_attr_e( 'Progression de commande', 'theme-perso' ); ?>">
	<a class="checkout-progress-step is-complete" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
		<span><?php esc_html_e( 'Panier', 'theme-perso' ); ?></span>
	</a>
	<span class="checkout-progress-step is-active">
		<span><?php esc_html_e( 'Livraison', 'theme-perso' ); ?></span>
	</span>
	<span class="checkout-progress-step is-active">
		<span><?php esc_html_e( 'Paiement', 'theme-perso' ); ?></span>
	</span>
	<span class="checkout-progress-step">
		<span><?php esc_html_e( 'Confirmation', 'theme-perso' ); ?></span>
	</span>
</nav>

<form name="checkout" method="post" class="checkout woocommerce-checkout cosmethique-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__( 'Checkout', 'woocommerce' ); ?>">
	<div class="checkout-premium-layout">
		<div class="checkout-left-column">
			<?php if ( $checkout->get_checkout_fields() ) : ?>
				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

				<div id="customer_details" class="checkout-customer-details">
					<section class="checkout-step-card motion-reveal" aria-labelledby="checkout-billing-title">
						<div class="checkout-step-heading">
							<span><?php esc_html_e( 'Étape 1', 'theme-perso' ); ?></span>
							<h2 id="checkout-billing-title"><?php esc_html_e( 'Informations client', 'theme-perso' ); ?></h2>
							<p><?php esc_html_e( 'Renseignez vos coordonnées pour préparer votre commande avec soin.', 'theme-perso' ); ?></p>
						</div>
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
					</section>

					<section class="checkout-step-card motion-reveal" aria-labelledby="checkout-shipping-title">
						<div class="checkout-step-heading">
							<span><?php esc_html_e( 'Étape 2', 'theme-perso' ); ?></span>
							<h2 id="checkout-shipping-title"><?php esc_html_e( 'Adresse de livraison', 'theme-perso' ); ?></h2>
							<p><?php esc_html_e( 'Choisissez l’adresse où recevoir vos soins Cosm’Éthique.', 'theme-perso' ); ?></p>
						</div>
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</section>
				</div>

				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
			<?php endif; ?>

			<section class="checkout-step-card checkout-payment-card motion-reveal" aria-labelledby="checkout-payment-title">
				<div class="checkout-step-heading">
					<span><?php esc_html_e( 'Étape 3', 'theme-perso' ); ?></span>
					<h2 id="checkout-payment-title"><?php esc_html_e( 'Paiement sécurisé', 'theme-perso' ); ?></h2>
					<p><?php esc_html_e( 'Choisissez votre mode de paiement', 'theme-perso' ); ?></p>
				</div>
				<?php woocommerce_checkout_payment(); ?>
			</section>
		</div>

		<aside class="checkout-summary-column motion-reveal" aria-label="<?php esc_attr_e( 'Résumé de commande', 'theme-perso' ); ?>">
			<?php if ( wc_coupons_enabled() ) : ?>
				<section class="checkout-coupon-card" aria-labelledby="checkout-coupon-title">
					<button class="checkout-coupon-toggle" type="button" data-checkout-coupon-toggle aria-expanded="false" aria-controls="checkout-coupon-panel">
						<span id="checkout-coupon-title"><?php esc_html_e( 'Vous avez un code promotionnel ?', 'theme-perso' ); ?></span>
						<small><?php esc_html_e( 'Ajouter un code', 'theme-perso' ); ?></small>
					</button>
					<div id="checkout-coupon-panel" class="checkout-coupon-panel" data-checkout-coupon-panel hidden>
						<label for="checkout_coupon_code"><?php esc_html_e( 'Code promo', 'theme-perso' ); ?></label>
						<div class="checkout-coupon-fields">
							<input type="text" name="coupon_code" id="checkout_coupon_code" class="input-text" value="" placeholder="<?php esc_attr_e( 'Votre code', 'theme-perso' ); ?>">
							<button type="button" class="button checkout-apply-coupon" data-checkout-apply-coupon><?php esc_html_e( 'Appliquer', 'theme-perso' ); ?></button>
						</div>
						<p class="checkout-coupon-feedback" data-checkout-coupon-feedback aria-live="polite"></p>
					</div>
				</section>
			<?php endif; ?>

			<section class="checkout-order-summary-card" aria-labelledby="order_review_heading">
				<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
				<p class="eyebrow"><?php esc_html_e( 'Récapitulatif', 'theme-perso' ); ?></p>
				<h2 id="order_review_heading"><?php esc_html_e( 'Votre commande', 'theme-perso' ); ?></h2>
				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>
				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</section>
		</aside>
	</div>
</form>

<?php
if ( false !== $payment_hook_priority ) {
	add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', $payment_hook_priority );
}

do_action( 'woocommerce_after_checkout_form', $checkout );
