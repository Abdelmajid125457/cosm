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
$botanica_arrival = isset( $_GET['botanica'] ) && ! is_array( $_GET['botanica'] ) ? sanitize_key( wp_unslash( $_GET['botanica'] ) ) : '';
$arrive_from_home = 'reveal' === $botanica_arrival;
$botanica_home    = $asset( 'hero', 'cosmethique-botanica-home-campaign.png' );
$botanica_suite   = $asset( 'hero', 'cosmethique-botanica-campaign-suite.png' );
$botanica_reveal  = function_exists( 'theme_perso_botanica_primary_pot_asset_url' ) ? theme_perso_botanica_primary_pot_asset_url() : $asset( 'hero', 'cosmethique-botanica-cream-reveal.png' );
$botanica_preview = $asset( 'hero', 'cosmethique-botanica-launch-preview.png' );
$botanica_product_asset = function( $file ) use ( $asset ) {
    $asset_path = get_template_directory() . '/assets/hero/botanica-products/' . ltrim( $file, '/' );
    $asset_url  = $asset( 'hero/botanica-products', $file );

    if ( file_exists( $asset_path ) ) {
        $asset_url = add_query_arg( 'ver', (string) filemtime( $asset_path ), $asset_url );
    }

    return $asset_url;
};

$botanica_event_gallery_views = function( $key, $title ) use ( $botanica_product_asset ) {
    $views = array(
        'creme'   => array(
            array(
                'url'         => $botanica_product_asset( 'creme-hydratante-botanica-pot-ferme.png' ),
                'label'       => __( 'pot fermé', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - pot fermé', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'creme-hydratante-botanica-pot-ouvert.png' ),
                'label'       => __( 'pot ouvert', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - pot ouvert', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'creme-hydratante-botanica-angle.png' ),
                'label'       => __( 'vue trois-quarts', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - vue trois-quarts du pot', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
        ),
        'serum'   => array(
            array(
                'url'         => $botanica_product_asset( 'serum-botanica-face.png' ),
                'label'       => __( 'sérum de face', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - flacon de face', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'serum-botanica-pipette.png' ),
                'label'       => __( 'pipette ouverte', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - pipette ouverte', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'serum-botanica-gouttes.png' ),
                'label'       => __( 'gouttes sérum', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - gouttes en mise en scène', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
        ),
        'huile'   => array(
            array(
                'url'         => $botanica_product_asset( 'huile-botanica-face.png' ),
                'label'       => __( 'huile de face', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - flacon de face', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'huile-botanica-pipette.png' ),
                'label'       => __( 'pipette huile', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - pipette ouverte', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'huile-botanica-gouttes.png' ),
                'label'       => __( 'huile en utilisation', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - huile en utilisation', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
        ),
        'masque'  => array(
            array(
                'url'         => $botanica_product_asset( 'masque-botanica-pot-ferme.png' ),
                'label'       => __( 'masque fermé', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - pot fermé', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'masque-botanica-detail.png' ),
                'label'       => __( 'masque ouvert', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - détail du pot', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'masque-botanica-angle.png' ),
                'label'       => __( 'vue trois-quarts', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - vue trois-quarts du pot', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
        ),
        'baume'   => array(
            array(
                'url'         => $botanica_product_asset( 'baume-botanica-pot-ferme.png' ),
                'label'       => __( 'baume fermé', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - pot fermé', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'baume-botanica-detail.png' ),
                'label'       => __( 'baume ouvert', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - détail du pot', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'baume-botanica-angle.png' ),
                'label'       => __( 'vue trois-quarts', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - vue trois-quarts du pot', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
        ),
        'coffret' => array(
            array(
                'url'         => $botanica_product_asset( 'coffret-botanica-ferme.png' ),
                'label'       => __( 'coffret fermé', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - coffret fermé', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'coffret-botanica-ouvert.png' ),
                'label'       => __( 'coffret ouvert', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - coffret ouvert', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
            array(
                'url'         => $botanica_product_asset( 'coffret-botanica-lifestyle.png' ),
                'label'       => __( 'lifestyle coffret', 'theme-perso' ),
                'alt'         => sprintf( __( '%s - mise en scène premium', 'theme-perso' ), $title ),
                'position'    => '50% 50%',
                'scale'       => '1',
                'panel_scale' => '1',
            ),
        ),
    );

    if ( empty( $views[ $key ] ) ) {
        return array();
    }

    return array_map(
        function( $view ) use ( $title ) {
            return wp_parse_args(
                $view,
                array(
                    'url'         => '',
                    'label'       => __( 'vue produit', 'theme-perso' ),
                    'alt'         => $title,
                    'position'    => '50% 50%',
                    'scale'       => '1',
                    'panel_scale' => '1',
                )
            );
        },
        array_slice( $views[ $key ], 0, 3 )
    );
};

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

    if ( $wc_product instanceof WC_Product && function_exists( 'theme_perso_product_gallery_images' ) ) {
        $product_gallery = theme_perso_product_gallery_images( $wc_product );
        $primary_image    = function_exists( 'theme_perso_product_primary_gallery_image_url' ) ? theme_perso_product_primary_gallery_image_url( $wc_product ) : '';

        if ( $primary_image ) {
            $product_data['image'] = $primary_image;
        }

        if ( ! empty( $product_gallery ) ) {
            if ( $primary_image ) {
                array_unshift( $product_gallery, $primary_image );
                $product_gallery = array_values( array_unique( array_filter( $product_gallery ) ) );
            }

            $product_data['gallery'] = $product_gallery;
        }
    }

    $event_gallery_views = $botanica_event_gallery_views( $product_data['key'], $product_title );

    if ( ! empty( $event_gallery_views ) ) {
        $product_data['image']         = $event_gallery_views[0]['url'];
        $product_data['gallery']       = wp_list_pluck( $event_gallery_views, 'url' );
        $product_data['gallery_views'] = $event_gallery_views;
    }

    if ( isset( $product_data['badge'] ) && 'bestseller' === strtolower( $product_data['badge'] ) ) {
        $product_data['badge'] = __( 'Nouveau', 'theme-perso' );
    } elseif ( isset( $product_data['badge'] ) && 'edition limitée' === strtolower( $product_data['badge'] ) ) {
        $product_data['badge'] = __( 'Édition limitée', 'theme-perso' );
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

$timeline = array(
    array(
        'icon'        => '01',
        'title'       => __( 'Inscription', 'theme-perso' ),
        'description' => __( 'Réservez votre accès et recevez votre invitation personnalisée.', 'theme-perso' ),
    ),
    array(
        'icon'        => '02',
        'title'       => __( 'Découverte', 'theme-perso' ),
        'description' => __( 'Entrez dans l’univers Botanica avec une présentation immersive.', 'theme-perso' ),
    ),
    array(
        'icon'        => '03',
        'title'       => __( 'Animation', 'theme-perso' ),
        'description' => __( 'Explorez les textures, les parfums et les actifs de la collection.', 'theme-perso' ),
    ),
    array(
        'icon'        => '04',
        'title'       => __( 'Atelier', 'theme-perso' ),
        'description' => __( 'Composez une routine adaptée avec les conseils de notre équipe.', 'theme-perso' ),
    ),
    array(
        'icon'        => '05',
        'title'       => __( 'Cadeaux', 'theme-perso' ),
        'description' => __( 'Profitez d’attentions exclusives réservées aux participantes.', 'theme-perso' ),
    ),
    array(
        'icon'        => '06',
        'title'       => __( 'Cocktail', 'theme-perso' ),
        'description' => __( 'Terminez la soirée autour d’un moment confidentiel et sensoriel.', 'theme-perso' ),
    ),
);

?>

<div class="event-page<?php echo $arrive_from_home ? ' event-page--from-home' : ''; ?>" data-event-page data-event-arrival="<?php echo esc_attr( $arrive_from_home ? 'home' : 'direct' ); ?>">
    <section class="event-hero" aria-labelledby="event-title">
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
            <div class="event-collection-scene event-collection-scene--interactive<?php echo $arrive_from_home ? ' is-open is-unlocked is-arrived-open' : ''; ?>" data-event-product aria-label="<?php esc_attr_e( 'Scène interactive de la Collection Botanica', 'theme-perso' ); ?>">
                <span class="event-product-spot event-product-spot--one" aria-hidden="true"></span>
                <span class="event-product-spot event-product-spot--two" aria-hidden="true"></span>
                <span class="event-product-halo" aria-hidden="true"></span>
                <span class="event-product-shadow" aria-hidden="true"></span>

                <button
                    class="event-real-pot"
                    type="button"
                    data-event-open-product
                    aria-label="<?php esc_attr_e( 'Révéler la collection Botanica', 'theme-perso' ); ?>"
                >
                    <img class="event-real-pot-image" src="<?php echo esc_url( $botanica_reveal ); ?>" alt="<?php esc_attr_e( 'Pot de crème Botanica', 'theme-perso' ); ?>" loading="eager" decoding="async">
                    <span class="event-real-pot-glow" aria-hidden="true"></span>
                    <span class="event-real-pot-smoke" aria-hidden="true"></span>
                    <span class="event-real-pot-sparkles" aria-hidden="true"></span>
                </button>
            </div>
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
                    <span><?php echo esc_html( $step['icon'] ); ?></span>
                    <h3><?php echo esc_html( $step['title'] ); ?></h3>
                    <p><?php echo esc_html( $step['description'] ); ?></p>
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
                $gallery_views = ! empty( $product['gallery_views'] ) && is_array( $product['gallery_views'] )
                    ? array_values( $product['gallery_views'] )
                    : array_map(
                        function( $image_url ) use ( $product ) {
                            return array(
                                'url'         => $image_url,
                                'label'       => __( 'vue produit', 'theme-perso' ),
                                'alt'         => $product['title'],
                                'position'    => '50% 50%',
                                'scale'       => '1',
                                'panel_scale' => '1',
                            );
                        },
                        array_slice( array_values( array_filter( $product['gallery'] ) ), 0, 3 )
                    );
                $gallery_views = array_slice( $gallery_views, 0, 3 );
                $main_view     = ! empty( $gallery_views[0] ) ? $gallery_views[0] : array(
                    'url'         => $product['image'],
                    'label'       => __( 'vue produit', 'theme-perso' ),
                    'alt'         => $product['title'],
                    'position'    => '50% 50%',
                    'scale'       => '1',
                    'panel_scale' => '1',
                );
                $gallery_json  = wp_json_encode( $gallery_views );
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
                    data-event-product-image="<?php echo esc_url( $main_view['url'] ); ?>"
                    data-event-product-image-alt="<?php echo esc_attr( $main_view['alt'] ); ?>"
                    data-event-product-image-position="<?php echo esc_attr( $main_view['position'] ); ?>"
                    data-event-product-image-scale="<?php echo esc_attr( $main_view['scale'] ); ?>"
                    data-event-product-panel-scale="<?php echo esc_attr( $main_view['panel_scale'] ); ?>"
                    data-event-product-gallery="<?php echo esc_attr( $gallery_json ); ?>"
                    data-event-product-url="<?php echo esc_url( $product['product_url'] ); ?>"
                    data-event-add-url="<?php echo esc_url( $product['add_url'] ); ?>"
                    data-event-product-id="<?php echo esc_attr( (string) $product['product_id'] ); ?>"
                >
                    <span class="event-botanica-badge"><?php echo esc_html( $product['badge'] ); ?></span>
                    <button class="event-botanica-image-button" type="button" data-event-product-open aria-label="<?php echo esc_attr( sprintf( __( 'Découvrir %s', 'theme-perso' ), $product['title'] ) ); ?>">
                        <img
                            src="<?php echo esc_url( $main_view['url'] ); ?>"
                            alt="<?php echo esc_attr( $main_view['alt'] ); ?>"
                            loading="lazy"
                            decoding="async"
                            data-event-card-main-image
                            style="<?php echo esc_attr( '--event-product-position:' . $main_view['position'] . ';--event-product-scale:' . $main_view['scale'] . ';' ); ?>"
                        >
                    </button>
                    <div class="event-botanica-thumbs" aria-label="<?php echo esc_attr( sprintf( __( 'Galerie de %s', 'theme-perso' ), $product['title'] ) ); ?>">
                        <?php foreach ( $gallery_views as $index => $view ) : ?>
                            <button
                                class="event-botanica-thumb<?php echo 0 === $index ? ' is-active' : ''; ?>"
                                type="button"
                                data-event-card-thumb
                                data-event-thumb-image="<?php echo esc_url( $view['url'] ); ?>"
                                data-event-thumb-alt="<?php echo esc_attr( $view['alt'] ); ?>"
                                data-event-thumb-position="<?php echo esc_attr( $view['position'] ); ?>"
                                data-event-thumb-scale="<?php echo esc_attr( $view['scale'] ); ?>"
                                data-event-thumb-panel-scale="<?php echo esc_attr( $view['panel_scale'] ); ?>"
                                aria-label="<?php echo esc_attr( sprintf( __( 'Afficher %1$s de %2$s', 'theme-perso' ), $view['label'], $product['title'] ) ); ?>"
                            >
                                <img
                                    src="<?php echo esc_url( $view['url'] ); ?>"
                                    alt=""
                                    loading="lazy"
                                    decoding="async"
                                    style="<?php echo esc_attr( '--event-thumb-position:' . $view['position'] . ';--event-thumb-scale:' . $view['scale'] . ';' ); ?>"
                                >
                            </button>
                        <?php endforeach; ?>
                    </div>
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

    <section id="event-reservation" class="event-reservation-section" aria-labelledby="event-reservation-title">
        <div class="event-reservation-layout">
            <div class="event-reservation-card">
                <p class="event-kicker"><?php esc_html_e( 'Inscription', 'theme-perso' ); ?></p>
                <h2 id="event-reservation-title"><?php esc_html_e( 'Réserver ma place', 'theme-perso' ); ?></h2>
                <form class="event-form" data-event-form novalidate>
                    <div class="event-form-grid">
                        <label><?php esc_html_e( 'Nom', 'theme-perso' ); ?><input type="text" name="last_name" autocomplete="family-name" required></label>
                        <label><?php esc_html_e( 'Prénom', 'theme-perso' ); ?><input type="text" name="first_name" autocomplete="given-name" required></label>
                        <label><?php esc_html_e( 'Email', 'theme-perso' ); ?><input type="email" name="email" autocomplete="email" required></label>
                        <label><?php esc_html_e( 'Téléphone', 'theme-perso' ); ?><input type="tel" name="phone" autocomplete="tel" required></label>
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
        </div>
    </section>
</div>
