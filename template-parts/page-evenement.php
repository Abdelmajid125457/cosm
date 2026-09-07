<?php
/**
 * Page événement immersive Cosm'Éthique.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$asset = function( $folder, $file ) {
    return get_template_directory_uri() . '/assets/' . trim( $folder, '/' ) . '/' . ltrim( $file, '/' );
};

$event_date = new DateTimeImmutable( '2026-10-15 18:00:00', wp_timezone() );
$event_iso  = $event_date->format( DATE_ATOM );
$botanica_home    = $asset( 'hero', 'cosmethique-botanica-home-campaign.png' );
$botanica_suite   = $asset( 'hero', 'cosmethique-botanica-campaign-suite.png' );
$botanica_reveal  = $asset( 'hero', 'cosmethique-botanica-cream-reveal.png' );
$botanica_preview = $asset( 'hero', 'cosmethique-botanica-launch-preview.png' );

$event_cards = array(
    array(
        'title' => __( 'Collection Botanica', 'theme-perso' ),
        'date'  => __( '15 Octobre 2026', 'theme-perso' ),
        'image' => $botanica_reveal,
        'url'   => home_url( '/evenement/' ),
    ),
    array(
        'title' => __( 'Atelier Botanica', 'theme-perso' ),
        'date'  => __( '22 Octobre 2026', 'theme-perso' ),
        'image' => $botanica_preview,
        'url'   => home_url( '/contact/' ),
    ),
    array(
        'title' => __( 'Masterclass Botanique', 'theme-perso' ),
        'date'  => __( '29 Octobre 2026', 'theme-perso' ),
        'image' => $botanica_suite,
        'url'   => home_url( '/blog/' ),
    ),
    array(
        'title' => __( 'Preview privée Botanica', 'theme-perso' ),
        'date'  => __( '05 Novembre 2026', 'theme-perso' ),
        'image' => $botanica_preview,
        'url'   => home_url( '/boutiques/' ),
    ),
    array(
        'title' => __( 'Rencontre Collection Botanica', 'theme-perso' ),
        'date'  => __( '12 Novembre 2026', 'theme-perso' ),
        'image' => $botanica_reveal,
        'url'   => home_url( '/devenir-franchise/' ),
    ),
);

$hero_product_keys = array( 'serum', 'huile', 'masque', 'baume', 'coffret' );

$botanica_shop_products = array();
$botanica_catalog       = function_exists( 'theme_perso_botanica_collection_products' ) ? theme_perso_botanica_collection_products() : array();

foreach ( $botanica_catalog as $product_title => $product_data ) {
    $product_post = function_exists( 'theme_perso_get_seed_product' ) ? theme_perso_get_seed_product( $product_title ) : get_page_by_title( $product_title, OBJECT, 'product' );
    $wc_product   = $product_post && function_exists( 'wc_get_product' ) ? wc_get_product( $product_post->ID ) : null;
    $price_html   = function_exists( 'wc_price' ) ? wc_price( (float) $product_data['price'] ) : esc_html( $product_data['price'] . ' €' );
    $product_url  = $wc_product instanceof WC_Product ? get_permalink( $wc_product->get_id() ) : home_url( '/boutique/' );
    $add_url      = $wc_product instanceof WC_Product ? $wc_product->add_to_cart_url() : $product_url;

    if ( $wc_product instanceof WC_Product && $wc_product->get_price_html() ) {
        $price_html = $wc_product->get_price_html();
    }

    $botanica_shop_products[] = array_merge(
        $product_data,
        array(
            'title'          => $product_title,
            'product_id'     => $wc_product instanceof WC_Product ? $wc_product->get_id() : 0,
            'product_url'    => $product_url,
            'add_url'        => $add_url,
            'price_html'     => $price_html,
            'purchasable'    => $wc_product instanceof WC_Product && $wc_product->is_purchasable() && $wc_product->is_in_stock(),
            'tracking_attrs' => $wc_product instanceof WC_Product && function_exists( 'theme_perso_tracking_item_attributes' ) ? theme_perso_tracking_item_attributes( $wc_product ) : '',
        )
    );
}

$hero_collection_products = array_values(
    array_filter(
        $botanica_shop_products,
        static function( $product ) use ( $hero_product_keys ) {
            return in_array( $product['key'], $hero_product_keys, true );
        }
    )
);

$timeline = array(
    __( 'Inscription', 'theme-perso' ),
    __( 'Découverte', 'theme-perso' ),
    __( 'Animation', 'theme-perso' ),
    __( 'Atelier', 'theme-perso' ),
    __( 'Cadeaux', 'theme-perso' ),
    __( 'Cocktail', 'theme-perso' ),
);

$gallery = array(
    $botanica_suite,
    $botanica_reveal,
    $botanica_preview,
    $botanica_suite,
);
?>

<div class="event-page" data-event-page>
    <section class="event-hero" aria-labelledby="event-title" style="--event-hero-bg: url('<?php echo esc_url( $botanica_home ); ?>');">
        <div class="event-hero-backdrop" aria-hidden="true"></div>
        <div class="event-particles" aria-hidden="true">
            <?php for ( $i = 0; $i < 14; $i++ ) : ?>
                <span></span>
            <?php endfor; ?>
        </div>

        <div class="event-hero-copy">
            <p class="event-kicker"><?php esc_html_e( 'Événement Exclusif', 'theme-perso' ); ?></p>
            <h1 id="event-title"><?php esc_html_e( 'Lancement de la Collection Botanica', 'theme-perso' ); ?></h1>
            <p><?php esc_html_e( 'Une nouvelle génération de soins inspirés par la nature, entre innovation sensorielle, actifs botaniques et rituel premium.', 'theme-perso' ); ?></p>

            <dl class="event-meta">
                <div><dt><?php esc_html_e( 'Date', 'theme-perso' ); ?></dt><dd><?php esc_html_e( '15 Octobre 2026', 'theme-perso' ); ?></dd></div>
                <div><dt><?php esc_html_e( 'Heure', 'theme-perso' ); ?></dt><dd>18:00</dd></div>
                <div><dt><?php esc_html_e( 'Lieu', 'theme-perso' ); ?></dt><dd><?php esc_html_e( 'Paris & en ligne', 'theme-perso' ); ?></dd></div>
            </dl>

            <div class="event-actions">
                <a class="button button-primary" href="#event-reservation"><?php esc_html_e( 'Découvrir l’événement', 'theme-perso' ); ?></a>
            </div>

            <div class="event-countdown" data-event-countdown data-event-date="<?php echo esc_attr( $event_iso ); ?>" aria-label="<?php esc_attr_e( 'Compte à rebours avant le lancement', 'theme-perso' ); ?>">
                <p><?php esc_html_e( 'Lancement dans', 'theme-perso' ); ?></p>
                <div>
                    <span><strong data-countdown-days>00</strong><?php esc_html_e( 'Jours', 'theme-perso' ); ?></span>
                    <span><strong data-countdown-hours>00</strong><?php esc_html_e( 'Heures', 'theme-perso' ); ?></span>
                    <span><strong data-countdown-minutes>00</strong><?php esc_html_e( 'Minutes', 'theme-perso' ); ?></span>
                    <span><strong data-countdown-seconds>00</strong><?php esc_html_e( 'Secondes', 'theme-perso' ); ?></span>
                </div>
            </div>
        </div>

        <div class="event-hero-stage" data-event-stage>
            <div class="event-collection-scene event-collection-scene--interactive" data-event-product aria-label="<?php esc_attr_e( 'Scène interactive de la Collection Botanica', 'theme-perso' ); ?>">
                <span class="event-cinematic-ray event-cinematic-ray--one" aria-hidden="true"></span>
                <span class="event-cinematic-ray event-cinematic-ray--two" aria-hidden="true"></span>
                <span class="event-cinematic-glow" aria-hidden="true"></span>
                <span class="event-cinematic-dust" aria-hidden="true"></span>
                <span class="event-edition-seal" aria-hidden="true"><?php esc_html_e( 'Édition limitée', 'theme-perso' ); ?></span>

                <button class="event-real-pot" type="button" data-event-open-product aria-label="<?php esc_attr_e( 'Ouvrir le pot de crème Botanica', 'theme-perso' ); ?>">
                    <span class="event-real-pot-shadow" aria-hidden="true"></span>
                    <span class="event-real-pot-lid" aria-hidden="true">
                        <span class="event-real-pot-lid-top"></span>
                        <span class="event-real-pot-lid-rim"></span>
                        <span class="event-real-pot-lid-mark">BOTANICA</span>
                    </span>
                    <span class="event-real-pot-cream" aria-hidden="true">
                        <span></span>
                    </span>
                    <span class="event-real-pot-jar" aria-hidden="true">
                        <span class="event-real-pot-glass"></span>
                        <span class="event-real-pot-label">
                            <small><?php esc_html_e( 'COSM’ÉTHIQUE', 'theme-perso' ); ?></small>
                            <strong>BOTANICA</strong>
                            <em><?php esc_html_e( 'Crème botanique', 'theme-perso' ); ?></em>
                        </span>
                        <span class="event-real-pot-reflection"></span>
                    </span>
                    <span class="event-real-pot-light" aria-hidden="true"></span>
                    <span class="event-real-pot-particles" aria-hidden="true">
                        <?php for ( $i = 0; $i < 10; $i++ ) : ?>
                            <i></i>
                        <?php endfor; ?>
                    </span>
                    <span class="event-real-pot-smoke" aria-hidden="true">
                        <i></i>
                        <i></i>
                        <i></i>
                    </span>
                </button>

                <div class="event-orbit-products" aria-label="<?php esc_attr_e( 'Produits de la Collection Botanica', 'theme-perso' ); ?>">
                    <?php foreach ( $hero_collection_products as $product ) : ?>
                        <?php $gallery_json = wp_json_encode( array_values( $product['gallery'] ) ); ?>
                        <button
                            class="event-orbit-product event-orbit-product--<?php echo esc_attr( $product['key'] ); ?>"
                            type="button"
                            data-event-product-card
                            data-event-hero-product-open
                            data-event-product-title="<?php echo esc_attr( $product['title'] ); ?>"
                            data-event-product-description="<?php echo esc_attr( $product['description'] ); ?>"
                            data-event-product-ingredients="<?php echo esc_attr( $product['ingredients'] ); ?>"
                            data-event-product-benefits="<?php echo esc_attr( $product['benefits'] ); ?>"
                            data-event-product-usage="<?php echo esc_attr( $product['usage'] ); ?>"
                            data-event-product-price="<?php echo esc_attr( wp_strip_all_tags( $product['price_html'] ) ); ?>"
                            data-event-product-badge="<?php echo esc_attr( $product['badge'] ); ?>"
                            data-event-product-image="<?php echo esc_url( $product['image'] ); ?>"
                            data-event-product-gallery="<?php echo esc_attr( $gallery_json ); ?>"
                            data-event-add-url="<?php echo esc_url( $product['add_url'] ); ?>"
                            data-event-product-id="<?php echo esc_attr( (string) $product['product_id'] ); ?>"
                        >
                            <span class="event-orbit-product-media">
                                <img src="<?php echo esc_url( $product['image'] ); ?>" alt="<?php echo esc_attr( $product['title'] ); ?>" loading="eager">
                            </span>
                            <span class="event-orbit-product-label"><?php echo esc_html( $product['title'] ); ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <p class="event-discover-hint"><?php esc_html_e( 'Cliquez sur le pot pour révéler la collection', 'theme-perso' ); ?></p>

            <article class="event-hero-product-card" data-event-hero-product-card hidden>
                <button type="button" data-event-hero-product-close aria-label="<?php esc_attr_e( 'Fermer la fiche produit', 'theme-perso' ); ?>">×</button>
                <span data-event-hero-product-badge></span>
                <img src="" alt="" loading="lazy" data-event-hero-product-image>
                <h2 data-event-hero-product-title></h2>
                <strong data-event-hero-product-price></strong>
                <p data-event-hero-product-description></p>
                <dl>
                    <div><dt><?php esc_html_e( 'Ingrédients', 'theme-perso' ); ?></dt><dd data-event-hero-product-ingredients></dd></div>
                    <div><dt><?php esc_html_e( 'Bénéfices', 'theme-perso' ); ?></dt><dd data-event-hero-product-benefits></dd></div>
                </dl>
                <a class="button button-primary add_to_cart_button ajax_add_to_cart" href="<?php echo esc_url( home_url( '/boutique/' ) ); ?>" data-event-hero-product-add data-product_id="" data-quantity="1"><?php esc_html_e( 'Ajouter au panier', 'theme-perso' ); ?></a>
            </article>
        </div>
    </section>

    <section class="event-slider-section" aria-labelledby="event-slider-title">
        <div class="event-section-heading">
            <p class="event-kicker"><?php esc_html_e( 'Événements à venir', 'theme-perso' ); ?></p>
            <h2 id="event-slider-title"><?php esc_html_e( 'Les prochains rendez-vous Cosm’Éthique.', 'theme-perso' ); ?></h2>
        </div>
        <div class="event-slider-controls">
            <button type="button" data-event-slider-prev aria-label="<?php esc_attr_e( 'Événement précédent', 'theme-perso' ); ?>">‹</button>
            <button type="button" data-event-slider-next aria-label="<?php esc_attr_e( 'Événement suivant', 'theme-perso' ); ?>">›</button>
        </div>
        <div class="event-card-track" data-event-slider>
            <?php foreach ( $event_cards as $card ) : ?>
                <article class="event-card">
                    <img src="<?php echo esc_url( $card['image'] ); ?>" alt="" loading="lazy">
                    <div>
                        <p class="event-kicker"><?php echo esc_html( $card['date'] ); ?></p>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <a href="<?php echo esc_url( $card['url'] ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Découvrir %s', 'theme-perso' ), $card['title'] ) ); ?>">→</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="event-timeline-section" aria-labelledby="event-timeline-title">
        <div class="event-section-heading">
            <p class="event-kicker"><?php esc_html_e( 'Programme', 'theme-perso' ); ?></p>
            <h2 id="event-timeline-title"><?php esc_html_e( 'Une soirée pensée comme un rituel.', 'theme-perso' ); ?></h2>
        </div>
        <div class="event-timeline">
            <?php foreach ( $timeline as $index => $step ) : ?>
                <article>
                    <span><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
                    <h3><?php echo esc_html( $step ); ?></h3>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="collection-botanica" class="event-botanica-shop-section" aria-labelledby="event-botanica-shop-title" data-event-shop>
        <div class="event-section-heading event-shop-heading">
            <p class="event-kicker"><?php esc_html_e( 'Boutique Collection Botanica', 'theme-perso' ); ?></p>
            <h2 id="event-botanica-shop-title"><?php esc_html_e( 'Découvrez les soins du lancement.', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Une sélection pensée comme une routine complète, entre textures sensorielles, actifs botaniques et packagings bleu nuit.', 'theme-perso' ); ?></p>
        </div>

        <div class="event-botanica-grid">
            <?php foreach ( $botanica_shop_products as $product ) : ?>
                <?php
                $gallery_json = wp_json_encode( array_values( $product['gallery'] ) );
                $button_class = 'button button-primary event-botanica-cart-button';

                if ( $product['purchasable'] ) {
                    $button_class .= ' ajax_add_to_cart add_to_cart_button';
                }
                ?>
                <article
                    class="event-botanica-card event-botanica-card--<?php echo esc_attr( $product['key'] ); ?>"
                    data-event-product-card
                    data-event-product-title="<?php echo esc_attr( $product['title'] ); ?>"
                    data-event-product-description="<?php echo esc_attr( $product['description'] ); ?>"
                    data-event-product-ingredients="<?php echo esc_attr( $product['ingredients'] ); ?>"
                    data-event-product-benefits="<?php echo esc_attr( $product['benefits'] ); ?>"
                    data-event-product-usage="<?php echo esc_attr( $product['usage'] ); ?>"
                    data-event-product-price="<?php echo esc_attr( wp_strip_all_tags( $product['price_html'] ) ); ?>"
                    data-event-product-badge="<?php echo esc_attr( $product['badge'] ); ?>"
                    data-event-product-image="<?php echo esc_url( $product['image'] ); ?>"
                    data-event-product-gallery="<?php echo esc_attr( $gallery_json ); ?>"
                    data-event-product-url="<?php echo esc_url( $product['product_url'] ); ?>"
                    data-event-add-url="<?php echo esc_url( $product['add_url'] ); ?>"
                    data-event-product-id="<?php echo esc_attr( (string) $product['product_id'] ); ?>"
                >
                    <span class="event-botanica-badge"><?php echo esc_html( $product['badge'] ); ?></span>
                    <button class="event-botanica-image-button" type="button" data-event-product-open aria-label="<?php echo esc_attr( sprintf( __( 'Découvrir %s', 'theme-perso' ), $product['title'] ) ); ?>">
                        <img src="<?php echo esc_url( $product['image'] ); ?>" alt="<?php echo esc_attr( $product['title'] ); ?>" loading="lazy">
                    </button>
                    <div class="event-botanica-card-body">
                        <p class="event-botanica-category"><?php echo esc_html( $product['category'] ); ?></p>
                        <h3><?php echo esc_html( $product['title'] ); ?></h3>
                        <p><?php echo esc_html( $product['description'] ); ?></p>
                        <div class="event-botanica-card-footer">
                            <strong><?php echo wp_kses_post( $product['price_html'] ); ?></strong>
                            <button class="button button-outline" type="button" data-event-product-open><?php esc_html_e( 'Découvrir', 'theme-perso' ); ?></button>
                            <a
                                class="<?php echo esc_attr( $button_class ); ?>"
                                href="<?php echo esc_url( $product['add_url'] ); ?>"
                                data-product_id="<?php echo esc_attr( (string) $product['product_id'] ); ?>"
                                data-product_sku="<?php echo esc_attr( $product['sku'] ); ?>"
                                data-quantity="1"
                                <?php echo $product['tracking_attrs']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            >
                                <?php esc_html_e( 'Ajouter au panier', 'theme-perso' ); ?>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <article class="event-product-panel" data-event-product-panel hidden aria-labelledby="event-product-panel-title">
            <button class="event-product-close" type="button" data-event-product-panel-close aria-label="<?php esc_attr_e( 'Fermer la fiche produit', 'theme-perso' ); ?>">×</button>
            <div class="event-product-panel-media">
                <span data-event-product-panel-badge></span>
                <img src="<?php echo esc_url( $botanica_reveal ); ?>" alt="" loading="lazy" data-event-product-panel-image>
                <div class="event-product-panel-gallery" data-event-product-panel-gallery></div>
            </div>
            <div class="event-product-panel-content">
                <p class="event-kicker"><?php esc_html_e( 'Collection Botanica', 'theme-perso' ); ?></p>
                <h2 id="event-product-panel-title" data-event-product-panel-title></h2>
                <p class="event-product-panel-description" data-event-product-panel-description></p>
                <strong class="event-product-panel-price" data-event-product-panel-price></strong>

                <dl class="event-product-panel-details">
                    <div>
                        <dt><?php esc_html_e( 'Ingrédients clés', 'theme-perso' ); ?></dt>
                        <dd data-event-product-panel-ingredients></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e( 'Bénéfices', 'theme-perso' ); ?></dt>
                        <dd data-event-product-panel-benefits></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e( 'Conseils d’utilisation', 'theme-perso' ); ?></dt>
                        <dd data-event-product-panel-usage></dd>
                    </div>
                </dl>

                <div class="event-product-panel-actions">
                    <div class="event-product-quantity" aria-label="<?php esc_attr_e( 'Quantité', 'theme-perso' ); ?>">
                        <button type="button" data-event-product-qty-minus aria-label="<?php esc_attr_e( 'Réduire la quantité', 'theme-perso' ); ?>">-</button>
                        <input type="number" min="1" max="12" value="1" data-event-product-quantity>
                        <button type="button" data-event-product-qty-plus aria-label="<?php esc_attr_e( 'Augmenter la quantité', 'theme-perso' ); ?>">+</button>
                    </div>
                    <a class="button button-primary event-product-panel-add add_to_cart_button ajax_add_to_cart" href="<?php echo esc_url( home_url( '/boutique/' ) ); ?>" data-event-product-add data-product_id="" data-quantity="1">
                        <?php esc_html_e( 'Ajouter au panier', 'theme-perso' ); ?>
                    </a>
                </div>
            </div>
        </article>
    </section>

    <section class="event-gallery-section" aria-labelledby="event-gallery-title">
        <div class="event-section-heading">
            <p class="event-kicker"><?php esc_html_e( 'Galerie', 'theme-perso' ); ?></p>
            <h2 id="event-gallery-title"><?php esc_html_e( 'Textures, lumière naturelle et détails botaniques.', 'theme-perso' ); ?></h2>
        </div>
        <div class="event-gallery">
            <?php foreach ( $gallery as $image ) : ?>
                <figure>
                    <img src="<?php echo esc_url( $image ); ?>" alt="" loading="lazy">
                </figure>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="event-reservation" class="event-reservation-section" aria-labelledby="event-reservation-title">
        <div class="event-reservation-card">
            <p class="event-kicker"><?php esc_html_e( 'Inscription', 'theme-perso' ); ?></p>
            <h2 id="event-reservation-title"><?php esc_html_e( 'Réserver ma place', 'theme-perso' ); ?></h2>
            <form class="event-form" data-event-form>
                <div class="event-form-grid">
                    <label><?php esc_html_e( 'Nom', 'theme-perso' ); ?><input type="text" name="last_name" required></label>
                    <label><?php esc_html_e( 'Prénom', 'theme-perso' ); ?><input type="text" name="first_name" required></label>
                    <label><?php esc_html_e( 'Email', 'theme-perso' ); ?><input type="email" name="email" required></label>
                    <label><?php esc_html_e( 'Téléphone', 'theme-perso' ); ?><input type="tel" name="phone" required></label>
                    <label class="event-field-full"><?php esc_html_e( 'Nombre de participants', 'theme-perso' ); ?><input type="number" name="participants" min="1" max="6" value="1" required></label>
                </div>
                <button class="button button-primary" type="submit"><?php esc_html_e( 'Je participe', 'theme-perso' ); ?></button>
                <p class="event-form-status" aria-live="polite"></p>
            </form>
        </div>
        <div class="event-reservation-note" aria-label="<?php esc_attr_e( 'Informations événement Botanica', 'theme-perso' ); ?>">
            <img src="<?php echo esc_url( $botanica_preview ); ?>" alt="" loading="lazy">
            <div>
                <p class="event-kicker"><?php esc_html_e( 'Accès privilégié', 'theme-perso' ); ?></p>
                <h2><?php esc_html_e( 'Une immersion privée dans l’univers Botanica.', 'theme-perso' ); ?></h2>
                <p><?php esc_html_e( 'Découvrez les textures, les actifs et les rituels de la collection dans un cadre confidentiel pensé pour une expérience sensorielle complète.', 'theme-perso' ); ?></p>
            </div>
        </div>
    </section>
</div>
