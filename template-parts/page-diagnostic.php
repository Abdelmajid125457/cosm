<?php
/**
 * Diagnostic beauté premium.
 *
 * @package Theme_Perso
 */

$shop_url  = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
$cart_url  = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/panier/' );
$asset_url = static function ( $file ) {
    return get_template_directory_uri() . '/assets/products/' . ltrim( $file, '/' );
};
$hero_image = $asset_url( 'photo-pack-routine-premium-reel.png' );

$product_sources = array(
    'gel' => array(
        'title'       => 'Gel Nettoyant Aloe Vera',
        'fallback'    => 'photo-gel-nettoyant-aloe-vera.png',
        'fallbackAlt' => 'Gel Nettoyant Aloe Vera Cosm’Éthique',
        'price'       => '15,90 €',
        'moment'      => 'morning',
        'reason'      => 'Nettoie la peau sans l’agresser et prépare les soins.',
    ),
    'serum' => array(
        'title'       => 'Sérum Éclat à la Rose',
        'fallback'    => 'photo-serum-eclat-rose.png',
        'fallbackAlt' => 'Sérum Éclat à la Rose Cosm’Éthique',
        'price'       => '29,90 €',
        'moment'      => 'morning',
        'reason'      => 'Apporte de l’éclat et cible le manque de luminosité.',
    ),
    'creme' => array(
        'title'       => 'Crème Hydratante Sauge & Camomille',
        'fallback'    => 'photo-creme-hydratante-sauge-camomille.png',
        'fallbackAlt' => 'Crème Hydratante Sauge et Camomille Cosm’Éthique',
        'price'       => '24,90 €',
        'moment'      => 'morning',
        'reason'      => 'Hydrate, apaise et soutient le confort cutané.',
    ),
    'lotion' => array(
        'title'       => 'Lotion Tonique Fleur d’Oranger',
        'fallback'    => 'photo-lotion-tonique-fleur-oranger.png',
        'fallbackAlt' => 'Lotion Tonique Fleur d’Oranger Cosm’Éthique',
        'price'       => '16,90 €',
        'moment'      => 'morning',
        'reason'      => 'Rafraîchit, tonifie et affine la routine quotidienne.',
    ),
    'masque' => array(
        'title'       => 'Masque Purifiant Argile Verte',
        'fallback'    => 'photo-masque-purifiant-argile-verte.png',
        'fallbackAlt' => 'Masque Purifiant Argile Verte Cosm’Éthique',
        'price'       => '19,90 €',
        'moment'      => 'evening',
        'reason'      => 'Aide à purifier la peau et lisser le grain.',
    ),
    'huile' => array(
        'title'       => 'Huile de Soin Nourrissante',
        'fallback'    => 'photo-huile-soin-nourrissante.png',
        'fallbackAlt' => 'Huile de Soin Nourrissante Cosm’Éthique',
        'price'       => '22,90 €',
        'moment'      => 'evening',
        'reason'      => 'Nourrit intensément et enveloppe la peau de confort.',
    ),
);

$diagnostic_products = array();

foreach ( $product_sources as $key => $source ) {
    $product_id = 0;
    $product    = null;

    if ( class_exists( 'WooCommerce' ) ) {
        $post = get_page_by_path( sanitize_title( $source['title'] ), OBJECT, 'product' );
        if ( $post ) {
            $product_id = (int) $post->ID;
            $product    = wc_get_product( $product_id );
        }
    }

    $image_url = $product_id ? get_post_meta( $product_id, '_cosmethique_image_url', true ) : '';
    if ( ! $image_url && $product_id ) {
        $image_url = get_the_post_thumbnail_url( $product_id, 'cosmethique-card' );
    }

    $diagnostic_products[ $key ] = array(
        'id'     => $product_id,
        'title'  => $product ? $product->get_name() : $source['title'],
        'price'  => $product ? wp_strip_all_tags( $product->get_price_html() ) : $source['price'],
        'image'  => $image_url ? $image_url : $asset_url( $source['fallback'] ),
        'alt'    => $product_id ? get_post_meta( get_post_thumbnail_id( $product_id ), '_wp_attachment_image_alt', true ) : $source['fallbackAlt'],
        'url'    => $product_id ? get_permalink( $product_id ) : $shop_url,
        'cartUrl' => $product_id ? add_query_arg( 'add-to-cart', $product_id, home_url( '/' ) ) : $cart_url,
        'moment' => $source['moment'],
        'reason' => $source['reason'],
    );
}
?>

<section class="diagnostic-page" data-diagnostic>
    <script type="application/json" data-diagnostic-products><?php echo wp_json_encode( $diagnostic_products ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></script>

    <div class="diagnostic-hero">
        <div class="diagnostic-hero-copy">
            <p class="eyebrow">DIAGNOSTIC PREMIUM</p>
            <h1>Diagnostic Beauté</h1>
            <p>Découvrez votre routine personnalisée en moins d'une minute.</p>
            <a class="button button-primary" href="#diagnostic-questionnaire">Commencer le diagnostic</a>
        </div>
        <figure class="diagnostic-hero-media">
            <img src="<?php echo esc_url( $hero_image ); ?>" alt="Routine premium avec produits Cosm’Éthique" loading="eager">
        </figure>
    </div>

    <div class="diagnostic-indicators" aria-label="Avantages du diagnostic beauté">
        <article><span>⏱</span><strong>1 minute</strong></article>
        <article><span>✓</span><strong>Gratuit</strong></article>
        <article><span>🌿</span><strong>100 % personnalisé</strong></article>
        <article><span>🧴</span><strong>Produits adaptés à votre peau</strong></article>
    </div>

    <div id="diagnostic-questionnaire" class="diagnostic-shell">
        <div class="diagnostic-widget">
            <div class="diagnostic-progress" aria-live="polite">
                <span data-diagnostic-step-label>Étape 1 / 6</span>
                <div class="diagnostic-progress-track" aria-hidden="true"><span data-diagnostic-progress></span></div>
            </div>

            <form class="diagnostic-form">
                <section class="diagnostic-step is-active" data-diagnostic-step="1">
                    <p class="diagnostic-step-kicker">Type de peau</p>
                    <h3>Quel est votre type de peau ?</h3>
                    <div class="diagnostic-options">
                        <label><input type="radio" name="skin" value="dry"> <span>Sèche</span></label>
                        <label><input type="radio" name="skin" value="mixed"> <span>Mixte</span></label>
                        <label><input type="radio" name="skin" value="oily"> <span>Grasse</span></label>
                        <label><input type="radio" name="skin" value="sensitive"> <span>Sensible</span></label>
                    </div>
                </section>

                <section class="diagnostic-step" data-diagnostic-step="2">
                    <p class="diagnostic-step-kicker">Objectif</p>
                    <h3>Quel est votre objectif principal ?</h3>
                    <div class="diagnostic-options">
                        <label><input type="radio" name="goal" value="hydrate"> <span>Hydratation</span></label>
                        <label><input type="radio" name="goal" value="glow"> <span>Éclat</span></label>
                        <label><input type="radio" name="goal" value="imperfections"> <span>Imperfections</span></label>
                        <label><input type="radio" name="goal" value="soothe"> <span>Apaiser</span></label>
                        <label><input type="radio" name="goal" value="age"> <span>Anti-âge</span></label>
                    </div>
                </section>

                <section class="diagnostic-step" data-diagnostic-step="3">
                    <p class="diagnostic-step-kicker">Routine</p>
                    <h3>À quel moment utilisez-vous principalement vos soins ?</h3>
                    <div class="diagnostic-options diagnostic-options--three">
                        <label><input type="radio" name="moment" value="morning"> <span>Matin</span></label>
                        <label><input type="radio" name="moment" value="evening"> <span>Soir</span></label>
                        <label><input type="radio" name="moment" value="both"> <span>Les deux</span></label>
                    </div>
                </section>

                <section class="diagnostic-step" data-diagnostic-step="4">
                    <p class="diagnostic-step-kicker">Texture</p>
                    <h3>Quelle texture préférez-vous ?</h3>
                    <div class="diagnostic-options">
                        <label><input type="radio" name="texture" value="cream"> <span>Crème</span></label>
                        <label><input type="radio" name="texture" value="light"> <span>Gel</span></label>
                        <label><input type="radio" name="texture" value="oil"> <span>Huile</span></label>
                        <label><input type="radio" name="texture" value="any"> <span>Peu importe</span></label>
                    </div>
                </section>

                <section class="diagnostic-step" data-diagnostic-step="5">
                    <p class="diagnostic-step-kicker">Budget</p>
                    <h3>Quel est votre budget ?</h3>
                    <div class="diagnostic-options diagnostic-options--three">
                        <label><input type="radio" name="budget" value="low"> <span>&lt;30 €</span></label>
                        <label><input type="radio" name="budget" value="medium"> <span>30 à 60 €</span></label>
                        <label><input type="radio" name="budget" value="high"> <span>+60 €</span></label>
                    </div>
                </section>

                <section class="diagnostic-step" data-diagnostic-step="6">
                    <p class="diagnostic-step-kicker">Routine complète ?</p>
                    <h3>Souhaitez-vous une routine complète ?</h3>
                    <div class="diagnostic-options diagnostic-options--two">
                        <label><input type="radio" name="complete" value="yes"> <span>Oui</span></label>
                        <label><input type="radio" name="complete" value="no"> <span>Non</span></label>
                    </div>
                </section>

                <div class="diagnostic-actions">
                    <button class="button shop-button-secondary" type="button" data-diagnostic-prev>Précédent</button>
                    <button class="button button-primary" type="button" data-diagnostic-next disabled>Continuer</button>
                </div>
            </form>

            <section class="diagnostic-result" data-diagnostic-result hidden>
                <p class="eyebrow">Votre résultat</p>
                <h3>Votre routine idéale</h3>
                <div class="diagnostic-score">
                    <span>Compatibilité Cosm’Éthique</span>
                    <strong>98 %</strong>
                </div>
                <div class="diagnostic-routine-columns" data-diagnostic-routine></div>
                <div class="diagnostic-why">
                    <h4>Pourquoi cette routine ?</h4>
                    <p data-diagnostic-explanation></p>
                </div>
                <div class="diagnostic-result-actions">
                    <a class="button shop-button-secondary" href="<?php echo esc_url( $shop_url ); ?>">Voir les produits</a>
                    <button class="button shop-button-secondary" type="button" data-diagnostic-restart>Recommencer le diagnostic</button>
                    <a class="button button-primary" href="<?php echo esc_url( $cart_url ); ?>" data-diagnostic-cart>Ajouter toute la routine au panier</a>
                </div>
            </section>
        </div>
    </div>
</section>
