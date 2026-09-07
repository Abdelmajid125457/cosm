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

$hotspots = array(
    array( 'key' => 'sauge', 'label' => __( 'Complexe Botanica', 'theme-perso' ), 'text' => __( 'Un assemblage d’actifs naturels précieux imaginé pour signer la nouvelle routine Botanica.', 'theme-perso' ) ),
    array( 'key' => 'camomille', 'label' => __( 'Notes florales', 'theme-perso' ), 'text' => __( 'Une signature sensorielle délicate, lumineuse et enveloppante, pensée pour l’expérience de lancement.', 'theme-perso' ) ),
    array( 'key' => 'texture', 'label' => __( 'Texture', 'theme-perso' ), 'text' => __( 'Crème onctueuse, fini confortable et absorption progressive.', 'theme-perso' ) ),
    array( 'key' => 'packaging', 'label' => __( 'Packaging', 'theme-perso' ), 'text' => __( 'Pot bleu nuit, détails dorés et identité Cosm’Éthique premium.', 'theme-perso' ) ),
    array( 'key' => 'fabrication', 'label' => __( 'Fabrication', 'theme-perso' ), 'text' => __( 'Une formulation responsable pensée pour concilier plaisir, exigence et naturalité.', 'theme-perso' ) ),
);

$collection_products = array(
    array(
        'key'         => 'serum',
        'name'        => __( 'Sérum Botanica', 'theme-perso' ),
        'description' => __( 'Un concentré lumineux imaginé pour révéler l’éclat de la peau.', 'theme-perso' ),
        'ingredients' => __( 'Sauge, complexe floral, vitamine E.', 'theme-perso' ),
        'benefits'    => __( 'Éclat, confort et peau visiblement plus uniforme.', 'theme-perso' ),
        'image'       => $botanica_suite,
    ),
    array(
        'key'         => 'huile',
        'name'        => __( 'Huile Botanica', 'theme-perso' ),
        'description' => __( 'Une huile précieuse au fini satiné pour nourrir sans alourdir.', 'theme-perso' ),
        'ingredients' => __( 'Huiles botaniques, jojoba, amande douce.', 'theme-perso' ),
        'benefits'    => __( 'Nutrition, souplesse et reflets délicats.', 'theme-perso' ),
        'image'       => $botanica_suite,
    ),
    array(
        'key'         => 'brume',
        'name'        => __( 'Brume Botanica', 'theme-perso' ),
        'description' => __( 'Une brume fraîche pour envelopper la peau d’un voile botanique.', 'theme-perso' ),
        'ingredients' => __( 'Camomille, eau florale, actifs apaisants.', 'theme-perso' ),
        'benefits'    => __( 'Fraîcheur, apaisement et rituel sensoriel.', 'theme-perso' ),
        'image'       => $botanica_suite,
    ),
    array(
        'key'         => 'masque',
        'name'        => __( 'Masque Botanica', 'theme-perso' ),
        'description' => __( 'Un masque onctueux pour offrir un moment de soin profond.', 'theme-perso' ),
        'ingredients' => __( 'Argile fine, calendula, beurre de cacao.', 'theme-perso' ),
        'benefits'    => __( 'Peau douce, ressourcée et lumineuse.', 'theme-perso' ),
        'image'       => $botanica_suite,
    ),
    array(
        'key'         => 'coffret',
        'name'        => __( 'Coffret Botanica', 'theme-perso' ),
        'description' => __( 'La routine complète Botanica réunie dans un coffret édition limitée.', 'theme-perso' ),
        'ingredients' => __( 'Routine visage, corps et rituel sensoriel.', 'theme-perso' ),
        'benefits'    => __( 'Découverte complète, cadeau premium et expérience de lancement.', 'theme-perso' ),
        'image'       => $botanica_preview,
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
            <div class="event-collection-scene" data-event-product aria-label="<?php esc_attr_e( 'Scène interactive de la Collection Botanica', 'theme-perso' ); ?>">
                <span class="event-cinematic-ray event-cinematic-ray--one" aria-hidden="true"></span>
                <span class="event-cinematic-ray event-cinematic-ray--two" aria-hidden="true"></span>
                <span class="event-cinematic-glow" aria-hidden="true"></span>
                <span class="event-cinematic-dust" aria-hidden="true"></span>
                <span class="event-edition-seal" aria-hidden="true"><?php esc_html_e( 'Édition limitée', 'theme-perso' ); ?></span>

                <button class="event-main-product" type="button" data-event-open-product aria-label="<?php esc_attr_e( 'Ouvrir le pot de crème Botanica', 'theme-perso' ); ?>">
                    <span class="event-main-product-closed" aria-hidden="true">
                        <img src="<?php echo esc_url( $botanica_suite ); ?>" alt="" loading="eager" fetchpriority="high">
                    </span>
                    <span class="event-main-product-open">
                        <img src="<?php echo esc_url( $botanica_reveal ); ?>" alt="<?php esc_attr_e( 'Pot de crème Botanica ouvert avec couvercle métallique doré', 'theme-perso' ); ?>" loading="eager" fetchpriority="high">
                    </span>
                    <span class="event-main-product-shine" aria-hidden="true"></span>
                    <span class="event-main-product-lid-glow" aria-hidden="true"></span>
                    <span class="event-main-product-cream-light" aria-hidden="true"></span>
                    <span class="event-main-product-smoke" aria-hidden="true">
                        <i></i>
                        <i></i>
                        <i></i>
                    </span>
                </button>

                <div class="event-collection-products" aria-label="<?php esc_attr_e( 'Produits de la Collection Botanica', 'theme-perso' ); ?>">
                    <?php foreach ( $collection_products as $product ) : ?>
                        <button
                            class="event-collection-product event-collection-product--<?php echo esc_attr( $product['key'] ); ?>"
                            type="button"
                            data-event-hotspot
                            data-event-hotspot-title="<?php echo esc_attr( $product['name'] ); ?>"
                            data-event-hotspot-text="<?php echo esc_attr( $product['description'] ); ?>"
                            data-event-hotspot-ingredients="<?php echo esc_attr( $product['ingredients'] ); ?>"
                            data-event-hotspot-benefits="<?php echo esc_attr( $product['benefits'] ); ?>"
                            data-event-hotspot-url="<?php echo esc_url( home_url( '/boutique/' ) ); ?>"
                        >
                            <span class="event-collection-product-media">
                                <img src="<?php echo esc_url( $product['image'] ); ?>" alt="<?php echo esc_attr( $product['name'] ); ?>" loading="eager">
                            </span>
                            <span class="event-collection-product-label"><?php echo esc_html( $product['name'] ); ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>

                <div class="event-hotspots" aria-label="<?php esc_attr_e( 'Détails interactifs de la Collection Botanica', 'theme-perso' ); ?>">
                    <?php foreach ( $hotspots as $index => $hotspot ) : ?>
                        <button class="event-hotspot event-hotspot--<?php echo esc_attr( $hotspot['key'] ); ?>" type="button" data-event-hotspot="<?php echo esc_attr( (string) $index ); ?>" data-event-hotspot-title="<?php echo esc_attr( $hotspot['label'] ); ?>" data-event-hotspot-text="<?php echo esc_attr( $hotspot['text'] ); ?>" data-event-hotspot-ingredients="<?php esc_attr_e( 'Actifs botaniques sélectionnés', 'theme-perso' ); ?>" data-event-hotspot-benefits="<?php esc_attr_e( 'Expérience sensorielle, naturalité et exigence premium.', 'theme-perso' ); ?>" data-event-hotspot-url="<?php echo esc_url( home_url( '/boutique/' ) ); ?>">
                            <span>+</span><?php echo esc_html( $hotspot['label'] ); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <p class="event-discover-hint"><?php esc_html_e( 'Cliquez sur le pot pour révéler la collection', 'theme-perso' ); ?></p>

            <article class="event-hotspot-card" data-event-hotspot-card hidden>
                <button type="button" data-event-hotspot-close aria-label="<?php esc_attr_e( 'Fermer la fiche', 'theme-perso' ); ?>">×</button>
                <p class="event-kicker" data-event-hotspot-title></p>
                <p data-event-hotspot-text></p>
                <dl>
                    <div><dt><?php esc_html_e( 'Ingrédients', 'theme-perso' ); ?></dt><dd data-event-hotspot-ingredients></dd></div>
                    <div><dt><?php esc_html_e( 'Bénéfices', 'theme-perso' ); ?></dt><dd data-event-hotspot-benefits></dd></div>
                </dl>
                <a class="button button-primary" href="<?php echo esc_url( home_url( '/boutique/' ) ); ?>" data-event-hotspot-link><?php esc_html_e( 'Découvrir', 'theme-perso' ); ?></a>
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
    </section>

    <aside class="event-product-drawer" data-event-product-modal hidden aria-hidden="true">
        <button class="event-product-drawer-overlay" type="button" data-event-product-modal-close aria-label="<?php esc_attr_e( 'Fermer la fiche produit', 'theme-perso' ); ?>"></button>
        <article class="event-product-panel" role="dialog" aria-modal="true" aria-labelledby="event-product-panel-title">
            <button class="event-product-close" type="button" data-event-product-modal-close aria-label="<?php esc_attr_e( 'Fermer', 'theme-perso' ); ?>">×</button>
            <div class="event-product-panel-media">
                <span data-event-product-modal-badge></span>
                <img src="<?php echo esc_url( $botanica_reveal ); ?>" alt="" loading="lazy" data-event-product-modal-image>
                <div class="event-product-panel-gallery" data-event-product-modal-gallery></div>
            </div>
            <div class="event-product-panel-content">
                <p class="event-kicker"><?php esc_html_e( 'Collection Botanica', 'theme-perso' ); ?></p>
                <h2 id="event-product-panel-title" data-event-product-modal-title></h2>
                <p class="event-product-panel-description" data-event-product-modal-description></p>
                <strong class="event-product-panel-price" data-event-product-modal-price></strong>

                <dl class="event-product-panel-details">
                    <div>
                        <dt><?php esc_html_e( 'Ingrédients clés', 'theme-perso' ); ?></dt>
                        <dd data-event-product-modal-ingredients></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e( 'Bénéfices', 'theme-perso' ); ?></dt>
                        <dd data-event-product-modal-benefits></dd>
                    </div>
                    <div>
                        <dt><?php esc_html_e( 'Conseils d’utilisation', 'theme-perso' ); ?></dt>
                        <dd data-event-product-modal-usage></dd>
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
    </aside>

    <section class="event-gallery-section" aria-labelledby="event-gallery-title">
        <div class="event-section-heading">
            <p class="event-kicker"><?php esc_html_e( 'Galerie', 'theme-perso' ); ?></p>
            <h2 id="event-gallery-title"><?php esc_html_e( 'Textures, lumière naturelle et détails botaniques.', 'theme-perso' ); ?></h2>
        </div>
        <div class="event-gallery">
            <?php foreach ( $gallery as $image ) : ?>
                <button type="button" data-event-gallery-image="<?php echo esc_url( $image ); ?>">
                    <img src="<?php echo esc_url( $image ); ?>" alt="" loading="lazy">
                </button>
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
        <div class="event-video-card">
            <img src="<?php echo esc_url( $botanica_preview ); ?>" alt="" loading="lazy">
            <button type="button" data-event-video-open><?php esc_html_e( 'Lire la vidéo', 'theme-perso' ); ?></button>
        </div>
    </section>

    <div class="event-lightbox" data-event-lightbox hidden>
        <button type="button" data-event-lightbox-close aria-label="<?php esc_attr_e( 'Fermer', 'theme-perso' ); ?>">×</button>
        <div data-event-lightbox-content></div>
    </div>
</div>
