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

    <section class="event-experience-section" aria-labelledby="event-experience-title">
        <div>
            <p class="event-kicker"><?php esc_html_e( 'Expérience 3D', 'theme-perso' ); ?></p>
            <h2 id="event-experience-title"><?php esc_html_e( 'Explorez la formule sous tous les angles.', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Ouvrez le pot, activez les points lumineux et découvrez les détails sensoriels de la Collection Botanica.', 'theme-perso' ); ?></p>
        </div>
        <ul>
            <li><?php esc_html_e( 'Rotation 360° après ouverture', 'theme-perso' ); ?></li>
            <li><?php esc_html_e( 'Zoom doux au clic', 'theme-perso' ); ?></li>
            <li><?php esc_html_e( 'Fiches ingrédients en glassmorphism', 'theme-perso' ); ?></li>
        </ul>
    </section>

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
