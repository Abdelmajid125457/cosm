<?php
/**
 * Pages institutionnelles premium COSM'ETHIQUE.
 *
 * @package Theme_Perso
 */

$slug = isset( $args['slug'] ) ? sanitize_key( $args['slug'] ) : get_post_field( 'post_name', get_the_ID() );

$asset = function( $folder, $file ) {
    return get_template_directory_uri() . '/assets/' . trim( $folder, '/' ) . '/' . ltrim( $file, '/' );
};

$icon = function( $name ) {
    $icons = array(
        'leaf'      => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19c8.5-.2 13.4-5.2 14-14-8.8.6-13.8 5.5-14 14Z"></path><path d="M5 19c2.8-4 6.3-7.3 10.5-10"></path></svg>',
        'skin'      => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-5.2 7-11a7 7 0 0 0-14 0c0 5.8 7 11 7 11Z"></path><path d="M9.5 10.5c1.4 1 3.6 1 5 0"></path></svg>',
        'heart'     => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.8 8.6c0 5.1-8.8 10.4-8.8 10.4S3.2 13.7 3.2 8.6A4.5 4.5 0 0 1 12 7a4.5 4.5 0 0 1 8.8 1.6Z"></path></svg>',
        'factory'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20V9l5 3V9l5 3V7h6v13H4Z"></path><path d="M8 16h2M13 16h2M18 16h1"></path></svg>',
        'recycle'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m7.5 7.2 2.2-3.5 2.2 3.5"></path><path d="m16.5 7.2 2.2 3.5-4.1.2"></path><path d="m8.6 17.7-4.1-.2 2.2-3.5"></path><path d="m4.5 17.5h7"></path></svg>',
        'clarity'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12s3-6 8-6 8 6 8 6-3 6-8 6-8-6-8-6Z"></path><circle cx="12" cy="12" r="2.5"></circle></svg>',
        'flask'     => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3h6"></path><path d="M10 3v6l-5 9a2 2 0 0 0 1.7 3h10.6a2 2 0 0 0 1.7-3l-5-9V3"></path><path d="M8 15h8"></path></svg>',
        'sparkle'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3Z"></path><path d="M19 16l.8 2.2L22 19l-2.2.8L19 22l-.8-2.2L16 19l2.2-.8L19 16Z"></path></svg>',
        'check'     => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg>',
        'package'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z"></path><path d="M4 7.5 12 12l8-4.5"></path><path d="M12 12v9"></path></svg>',
        'truck'     => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h11v10H3z"></path><path d="M14 9h4l3 3v4h-7z"></path><circle cx="7" cy="18" r="1.7"></circle><circle cx="17.5" cy="18" r="1.7"></circle></svg>',
        'store'     => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 10h16l-1-5H5l-1 5Z"></path><path d="M6 10v10h12V10"></path><path d="M9 20v-6h6v6"></path></svg>',
        'pin'       => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-6 7-12a7 7 0 0 0-14 0c0 6 7 12 7 12Z"></path><circle cx="12" cy="9" r="2.4"></circle></svg>',
        'question'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9.5 9a2.7 2.7 0 1 1 4.5 2c-1.2.8-2 1.5-2 3"></path><path d="M12 18h.01"></path><circle cx="12" cy="12" r="9"></circle></svg>',
        'star'      => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 2.7 5.5 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.8 1-6.1-4.4-4.3 6.1-.9L12 3Z"></path></svg>',
    );

    return isset( $icons[ $name ] ) ? $icons[ $name ] : $icons['sparkle'];
};

$pages = array(
    'engagements' => array(
        'label'    => __( 'Maison engagée', 'theme-perso' ),
        'title'    => __( 'Nos engagements', 'theme-perso' ),
        'subtitle' => __( 'Une cosmétique naturelle, exigeante et responsable, pensée pour prendre soin de la peau sans compromis.', 'theme-perso' ),
        'image'    => $asset( 'about', 'reference-catalog-products.png' ),
    ),
    'ingredients' => array(
        'label'    => __( 'Bibliothèque botanique', 'theme-perso' ),
        'title'    => __( 'Nos ingrédients', 'theme-perso' ),
        'subtitle' => __( 'Des actifs naturels sélectionnés avec précision pour leurs bénéfices, leur sensorialité et leur traçabilité.', 'theme-perso' ),
        'image'    => $asset( 'products', 'category-soins-visage-hero.png' ),
    ),
    'qualite' => array(
        'label'    => __( 'Fabrication & qualité', 'theme-perso' ),
        'title'    => __( 'Une exigence à chaque étape', 'theme-perso' ),
        'subtitle' => __( 'De la matière première au conditionnement, chaque soin suit un processus rigoureux et transparent.', 'theme-perso' ),
        'image'    => $asset( 'about', 'about-eco-commitment.png' ),
    ),
    'boutiques' => array(
        'label'    => __( 'Réseau Cosm’Éthique', 'theme-perso' ),
        'title'    => __( 'Nos boutiques', 'theme-perso' ),
        'subtitle' => __( 'Découvrez les premières implantations Cosm’Éthique et les villes bientôt disponibles.', 'theme-perso' ),
        'image'    => $asset( 'products', 'hero-accessoires-cosmethique.png' ),
    ),
    'faq' => array(
        'label'    => __( 'Besoin d’aide ?', 'theme-perso' ),
        'title'    => __( 'Questions fréquentes', 'theme-perso' ),
        'subtitle' => __( 'Toutes les réponses essentielles pour commander, choisir vos soins et profiter sereinement de votre expérience Cosm’Éthique.', 'theme-perso' ),
        'image'    => $asset( 'about', 'about-story-lifestyle.png' ),
    ),
    'avis-clients' => array(
        'label'    => __( 'Communauté Cosm’Éthique', 'theme-perso' ),
        'title'    => __( 'Avis clients', 'theme-perso' ),
        'subtitle' => __( 'Des routines naturelles adoptées par une communauté exigeante, sensible à la qualité et à la beauté responsable.', 'theme-perso' ),
        'image'    => $asset( 'products', 'photo-pack-routine-visage-lifestyle-reel.png' ),
    ),
);

if ( ! isset( $pages[ $slug ] ) ) {
    return;
}

$page = $pages[ $slug ];
$institutional_shop_heroes = array(
    'engagements' => array(
        'aria'      => __( 'Présentation des engagements Cosm’Éthique', 'theme-perso' ),
        'label'     => __( 'COSM’ÉTHIQUE', 'theme-perso' ),
        'title'     => __( 'Nos engagements', 'theme-perso' ),
        'text'      => __( 'Une beauté plus responsable, pensée pour respecter la peau, les gestes du quotidien et les choix qui comptent vraiment.', 'theme-perso' ),
        'primary'   => array( 'label' => __( 'Découvrir nos engagements', 'theme-perso' ), 'url' => '#nos-valeurs' ),
        'secondary' => array( 'label' => __( 'Découvrir nos produits', 'theme-perso' ), 'url' => function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' ) ),
        'benefits'  => array( __( '98 % d’ingrédients naturels', 'theme-perso' ), __( 'Cruelty Free', 'theme-perso' ), __( 'Packaging responsable', 'theme-perso' ), __( 'Transparence', 'theme-perso' ) ),
        'image'     => $asset( 'about', 'reference-catalog-products.png' ),
        'alt'       => __( 'Produits Cosm’Éthique engagés', 'theme-perso' ),
        'caption'   => __( 'ENGAGEMENTS', 'theme-perso' ),
        'caption_h' => __( 'Une exigence visible jusque dans les détails.', 'theme-perso' ),
        'float_one' => array( 'value' => '98%', 'text' => __( 'naturel', 'theme-perso' ) ),
        'float_two' => array( 'value' => __( 'France', 'theme-perso' ), 'text' => __( 'fabrication suivie', 'theme-perso' ) ),
    ),
    'ingredients' => array(
        'aria'      => __( 'Présentation des ingrédients Cosm’Éthique', 'theme-perso' ),
        'label'     => __( 'COSM’ÉTHIQUE', 'theme-perso' ),
        'title'     => __( 'Nos ingrédients', 'theme-perso' ),
        'text'      => __( 'Une bibliothèque d’actifs naturels sélectionnés pour leur sensorialité, leur efficacité et leur cohérence avec chaque routine.', 'theme-perso' ),
        'primary'   => array( 'label' => __( 'Explorer les actifs', 'theme-perso' ), 'url' => '#bibliotheque-actifs' ),
        'secondary' => array( 'label' => __( 'Voir les produits', 'theme-perso' ), 'url' => function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' ) ),
        'benefits'  => array( __( 'Rose', 'theme-perso' ), __( 'Karité', 'theme-perso' ), __( 'Camomille', 'theme-perso' ), __( 'Lavande', 'theme-perso' ) ),
        'image'     => $asset( 'products', 'category-soins-visage-hero.png' ),
        'alt'       => __( 'Ingrédients naturels et soins Cosm’Éthique', 'theme-perso' ),
        'caption'   => __( 'ACTIFS NATURELS', 'theme-perso' ),
        'caption_h' => __( 'Des ingrédients lisibles, beaux et utiles.', 'theme-perso' ),
        'float_one' => array( 'value' => '12', 'text' => __( 'actifs clés', 'theme-perso' ) ),
        'float_two' => array( 'value' => '3', 'text' => __( 'univers de soin', 'theme-perso' ) ),
    ),
    'qualite' => array(
        'aria'      => __( 'Présentation fabrication et qualité Cosm’Éthique', 'theme-perso' ),
        'label'     => __( 'COSM’ÉTHIQUE', 'theme-perso' ),
        'title'     => __( 'Fabrication & Qualité', 'theme-perso' ),
        'text'      => __( 'Un processus clair, rigoureux et premium, de la sélection des actifs au conditionnement final de chaque soin.', 'theme-perso' ),
        'primary'   => array( 'label' => __( 'Voir le processus', 'theme-perso' ), 'url' => '#processus-qualite' ),
        'secondary' => array( 'label' => __( 'Nos certifications', 'theme-perso' ), 'url' => '#certifications' ),
        'benefits'  => array( __( 'Contrôle qualité', 'theme-perso' ), __( 'Formulation précise', 'theme-perso' ), __( 'Traçabilité', 'theme-perso' ), __( 'Conditionnement soigné', 'theme-perso' ) ),
        'image'     => $asset( 'about', 'about-eco-commitment.png' ),
        'alt'       => __( 'Fabrication responsable Cosm’Éthique', 'theme-perso' ),
        'caption'   => __( 'ATELIER QUALITÉ', 'theme-perso' ),
        'caption_h' => __( 'Chaque soin suit une méthode exigeante.', 'theme-perso' ),
        'float_one' => array( 'value' => '6', 'text' => __( 'étapes suivies', 'theme-perso' ) ),
        'float_two' => array( 'value' => '100%', 'text' => __( 'contrôlé', 'theme-perso' ) ),
    ),
);
?>

<div class="institutional-page institutional-page--<?php echo esc_attr( $slug ); ?>">
    <?php if ( isset( $institutional_shop_heroes[ $slug ] ) ) : ?>
        <?php $hero = $institutional_shop_heroes[ $slug ]; ?>
        <section class="institutional-shop-hero institutional-shop-hero--<?php echo esc_attr( $slug ); ?>" aria-label="<?php echo esc_attr( $hero['aria'] ); ?>">
            <div class="institutional-shop-hero-content motion-reveal motion-reveal--left">
                <p class="shop-label"><?php echo esc_html( $hero['label'] ); ?></p>
                <h1><?php echo esc_html( $hero['title'] ); ?></h1>
                <p><?php echo esc_html( $hero['text'] ); ?></p>
                <div class="shop-hero-actions">
                    <a class="button button-primary" href="<?php echo esc_url( $hero['primary']['url'] ); ?>"><?php echo esc_html( $hero['primary']['label'] ); ?></a>
                    <a class="button shop-button-secondary" href="<?php echo esc_url( $hero['secondary']['url'] ); ?>"><?php echo esc_html( $hero['secondary']['label'] ); ?></a>
                </div>
                <div class="shop-hero-benefits" aria-label="<?php esc_attr_e( 'Points forts Cosm’Éthique', 'theme-perso' ); ?>">
                    <?php foreach ( $hero['benefits'] as $benefit ) : ?>
                        <span>
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12.5l4.2 4.2L19 7"></path></svg>
                            <?php echo esc_html( $benefit ); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
            <figure class="institutional-shop-visual-card motion-reveal motion-reveal--right">
                <img src="<?php echo esc_url( $hero['image'] ); ?>" alt="<?php echo esc_attr( $hero['alt'] ); ?>" loading="eager">
                <figcaption>
                    <span><?php echo esc_html( $hero['caption'] ); ?></span>
                    <strong><?php echo esc_html( $hero['caption_h'] ); ?></strong>
                </figcaption>
                <div class="shop-floating-card institutional-floating-card institutional-floating-card--one">
                    <span class="faq-floating-icon" aria-hidden="true"><?php echo $icon( 'sparkle' ); ?></span>
                    <strong><?php echo esc_html( $hero['float_one']['value'] ); ?></strong>
                    <em><?php echo esc_html( $hero['float_one']['text'] ); ?></em>
                </div>
                <div class="shop-floating-card institutional-floating-card institutional-floating-card--two">
                    <span class="faq-floating-icon" aria-hidden="true"><?php echo $icon( 'check' ); ?></span>
                    <strong><?php echo esc_html( $hero['float_two']['value'] ); ?></strong>
                    <em><?php echo esc_html( $hero['float_two']['text'] ); ?></em>
                </div>
            </figure>
        </section>
    <?php elseif ( 'faq' === $slug ) : ?>
        <section class="faq-shop-hero" aria-label="<?php esc_attr_e( 'Questions fréquentes Cosm’Éthique', 'theme-perso' ); ?>">
            <div class="faq-shop-hero-content motion-reveal motion-reveal--left">
                <p class="shop-label"><?php esc_html_e( 'COSM’ÉTHIQUE', 'theme-perso' ); ?></p>
                <h1><?php esc_html_e( 'Questions fréquentes', 'theme-perso' ); ?></h1>
                <p><?php esc_html_e( 'Toutes les réponses pour profiter pleinement de votre expérience Cosm’Éthique.', 'theme-perso' ); ?></p>
                <div class="shop-hero-actions">
                    <a class="button button-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Nous contacter', 'theme-perso' ); ?></a>
                    <a class="button shop-button-secondary" href="<?php echo esc_url( home_url( '/diagnostic/' ) ); ?>"><?php esc_html_e( 'Diagnostic', 'theme-perso' ); ?></a>
                </div>
                <div class="shop-hero-benefits" aria-label="<?php esc_attr_e( 'Aide Cosm’Éthique', 'theme-perso' ); ?>">
                    <?php foreach ( array( __( 'Réponses rapides', 'theme-perso' ), __( 'Commande', 'theme-perso' ), __( 'Paiement sécurisé', 'theme-perso' ), __( 'Conseils produits', 'theme-perso' ) ) as $benefit ) : ?>
                        <span>
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12.5l4.2 4.2L19 7"></path></svg>
                            <?php echo esc_html( $benefit ); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
            <figure class="faq-shop-visual-card motion-reveal motion-reveal--right">
                <img src="<?php echo esc_url( $asset( 'about', 'about-story-lifestyle.png' ) ); ?>" alt="<?php esc_attr_e( 'Conseils et accompagnement Cosm’Éthique', 'theme-perso' ); ?>" loading="eager">
                <figcaption>
                    <span><?php esc_html_e( 'CENTRE D’AIDE', 'theme-perso' ); ?></span>
                    <strong><?php esc_html_e( 'Une réponse claire à chaque étape.', 'theme-perso' ); ?></strong>
                </figcaption>
                <div class="shop-floating-card faq-floating-contact">
                    <span aria-hidden="true">★★★★★</span>
                    <strong>4.9/5</strong>
                    <em><?php esc_html_e( 'clientes accompagnées', 'theme-perso' ); ?></em>
                </div>
                <div class="shop-floating-card faq-floating-answer">
                    <span class="faq-floating-icon" aria-hidden="true"><?php echo $icon( 'question' ); ?></span>
                    <strong><?php esc_html_e( 'Réponse rapide', 'theme-perso' ); ?></strong>
                    <em><?php esc_html_e( 'FAQ & contact', 'theme-perso' ); ?></em>
                </div>
            </figure>
        </section>
    <?php else : ?>
        <section class="institutional-hero">
            <div class="container institutional-hero-grid">
                <div class="institutional-hero-copy motion-reveal motion-reveal--left">
                    <p class="eyebrow"><?php echo esc_html( $page['label'] ); ?></p>
                    <h1><?php echo esc_html( $page['title'] ); ?></h1>
                    <p><?php echo esc_html( $page['subtitle'] ); ?></p>
                </div>
                <figure class="institutional-hero-media motion-reveal motion-reveal--right">
                    <img src="<?php echo esc_url( $page['image'] ); ?>" alt="<?php echo esc_attr( $page['title'] ); ?>" loading="eager">
                </figure>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( 'engagements' === $slug ) : ?>
        <?php
        $commitments = array(
            array( 'icon' => 'leaf', 'title' => __( 'Beauté naturelle', 'theme-perso' ), 'text' => __( 'Des formules inspirées par les actifs végétaux et la sensorialité des rituels de soin.', 'theme-perso' ) ),
            array( 'icon' => 'flask', 'title' => __( 'Ingrédients responsables', 'theme-perso' ), 'text' => __( 'Des actifs choisis pour leur utilité, leur origine et leur cohérence avec nos formules.', 'theme-perso' ) ),
            array( 'icon' => 'heart', 'title' => __( 'Cruelty Free', 'theme-perso' ), 'text' => __( 'Aucun test sur les animaux, dans une démarche responsable et transparente.', 'theme-perso' ) ),
            array( 'icon' => 'factory', 'title' => __( 'Fabrication française', 'theme-perso' ), 'text' => __( 'Une production maîtrisée avec des exigences qualité précises à chaque étape.', 'theme-perso' ) ),
            array( 'icon' => 'recycle', 'title' => __( 'Emballages recyclables', 'theme-perso' ), 'text' => __( 'Des contenants conçus pour durer, se recycler ou limiter le superflu.', 'theme-perso' ) ),
            array( 'icon' => 'clarity', 'title' => __( 'Transparence', 'theme-perso' ), 'text' => __( 'Des informations claires sur les actifs, les bénéfices et l’usage de chaque soin.', 'theme-perso' ) ),
            array( 'icon' => 'sparkle', 'title' => __( 'Qualité premium', 'theme-perso' ), 'text' => __( 'Une expérience haut de gamme, du packaging à l’application sur la peau.', 'theme-perso' ) ),
            array( 'icon' => 'leaf', 'title' => __( 'Respect de la planète', 'theme-perso' ), 'text' => __( 'Des choix sobres et durables pour accompagner une beauté plus consciente.', 'theme-perso' ) ),
        );
        $commitment_timeline = array(
            array( 'icon' => 'leaf', 'title' => __( 'Sélectionner', 'theme-perso' ), 'text' => __( 'Nous choisissons des actifs naturels lisibles, sensoriels et utiles.', 'theme-perso' ) ),
            array( 'icon' => 'flask', 'title' => __( 'Formuler', 'theme-perso' ), 'text' => __( 'Chaque texture est pensée pour associer efficacité, plaisir et douceur.', 'theme-perso' ) ),
            array( 'icon' => 'factory', 'title' => __( 'Fabriquer', 'theme-perso' ), 'text' => __( 'Les soins suivent un processus responsable et contrôlé.', 'theme-perso' ) ),
            array( 'icon' => 'package', 'title' => __( 'Conditionner', 'theme-perso' ), 'text' => __( 'Nous privilégions des packagings élégants, recyclables et cohérents.', 'theme-perso' ) ),
        );
        $priorities = array(
            array( 'icon' => 'leaf', 'title' => __( 'Protection de la planète', 'theme-perso' ), 'text' => __( 'Réduire le superflu, choisir des matières cohérentes et encourager des gestes plus conscients.', 'theme-perso' ), 'image' => $asset( 'about', 'about-eco-commitment.png' ) ),
            array( 'icon' => 'skin', 'title' => __( 'Respect de la peau', 'theme-perso' ), 'text' => __( 'Des formules pensées pour le confort, la douceur et une routine lisible.', 'theme-perso' ), 'image' => $asset( 'about', 'about-story-lifestyle.png' ) ),
            array( 'icon' => 'flask', 'title' => __( 'Innovation', 'theme-perso' ), 'text' => __( 'Associer actifs naturels, textures modernes et expérience premium.', 'theme-perso' ), 'image' => $asset( 'products', 'category-soins-visage-hero.png' ) ),
            array( 'icon' => 'sparkle', 'title' => __( 'Qualité', 'theme-perso' ), 'text' => __( 'Contrôler chaque étape pour proposer des soins réguliers, sûrs et agréables.', 'theme-perso' ), 'image' => $asset( 'products', 'photo-pack-routine-visage-reel.png' ) ),
            array( 'icon' => 'clarity', 'title' => __( 'Transparence', 'theme-perso' ), 'text' => __( 'Expliquer clairement les bénéfices, les usages et les choix de formulation.', 'theme-perso' ), 'image' => $asset( 'products', 'photo-huile-essentielle-lavande-fine.png' ) ),
        );
        $commitment_stats = array(
            array( 'value' => '98', 'suffix' => '%', 'label' => __( 'Ingrédients d’origine naturelle', 'theme-perso' ) ),
            array( 'value' => '0', 'suffix' => '', 'label' => __( 'Tests sur les animaux', 'theme-perso' ) ),
            array( 'value' => '100', 'suffix' => '%', 'label' => __( 'Emballages recyclables', 'theme-perso' ) ),
            array( 'value' => '4800', 'suffix' => '+', 'label' => __( 'Clients satisfaits', 'theme-perso' ) ),
        );
        ?>
        <section id="nos-valeurs" class="commitments-values-section">
            <div class="commitments-wide">
                <div class="commitments-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Nos valeurs', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Des engagements visibles dans chaque détail.', 'theme-perso' ); ?></h2>
                </div>
                <div class="commitments-values-grid">
                    <?php foreach ( $commitments as $item ) : ?>
                        <article class="commitments-value-card motion-reveal motion-reveal--scale">
                            <span class="institutional-icon"><?php echo $icon( $item['icon'] ); ?></span>
                            <h3><?php echo esc_html( $item['title'] ); ?></h3>
                            <p><?php echo esc_html( $item['text'] ); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="commitments-stats-band" data-counter-scope>
            <div class="commitments-wide commitments-stats-grid">
                <?php foreach ( $commitment_stats as $stat ) : ?>
                    <article class="commitments-stat-card motion-reveal motion-reveal--scale">
                        <strong><span data-counter-target="<?php echo esc_attr( $stat['value'] ); ?>">0</span><?php echo esc_html( $stat['suffix'] ); ?></strong>
                        <p><?php echo esc_html( $stat['label'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="commitments-action-section">
            <div class="commitments-action-grid">
                <figure class="commitments-action-media motion-reveal motion-reveal--left">
                    <img src="<?php echo esc_url( $asset( 'about', 'about-eco-commitment.png' ) ); ?>" alt="<?php esc_attr_e( 'Engagement écologique Cosm’Éthique', 'theme-perso' ); ?>" loading="lazy">
                </figure>
                <div class="commitments-action-copy motion-reveal motion-reveal--right">
                    <p class="eyebrow"><?php esc_html_e( 'Notre engagement en action', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Faire mieux, à chaque étape.', 'theme-perso' ); ?></h2>
                    <p><?php esc_html_e( 'Cosm’Éthique associe plaisir d’utilisation, exigence de formulation et responsabilité. Chaque décision vise à créer une beauté plus lisible, plus douce et plus durable.', 'theme-perso' ); ?></p>
                    <div class="commitments-action-timeline">
                        <?php foreach ( $commitment_timeline as $step ) : ?>
                            <article>
                                <span class="institutional-icon"><?php echo $icon( $step['icon'] ); ?></span>
                                <div>
                                    <h3><?php echo esc_html( $step['title'] ); ?></h3>
                                    <p><?php echo esc_html( $step['text'] ); ?></p>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="commitments-priorities-section">
            <div class="commitments-wide">
                <div class="commitments-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Nos priorités', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Une exigence responsable, pensée pour durer.', 'theme-perso' ); ?></h2>
                </div>
                <div class="commitments-priorities-grid">
                    <?php foreach ( $priorities as $priority ) : ?>
                        <article class="commitments-priority-card motion-reveal motion-reveal--scale">
                            <figure><img src="<?php echo esc_url( $priority['image'] ); ?>" alt="<?php echo esc_attr( $priority['title'] ); ?>" loading="lazy"></figure>
                            <div>
                                <span class="institutional-icon"><?php echo $icon( $priority['icon'] ); ?></span>
                                <h3><?php echo esc_html( $priority['title'] ); ?></h3>
                                <p><?php echo esc_html( $priority['text'] ); ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="commitments-quote-banner motion-reveal">
            <img src="<?php echo esc_url( $asset( 'products', 'category-packs-hero-reel.png' ) ); ?>" alt="<?php esc_attr_e( 'Produits Cosm’Éthique sur fond premium', 'theme-perso' ); ?>" loading="lazy">
            <div>
                <p><?php esc_html_e( 'La beauté responsable commence par des choix exigeants.', 'theme-perso' ); ?></p>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( 'ingredients' === $slug ) : ?>
        <?php
        $ingredients = array(
            array( 'slug' => 'rose', 'name' => __( 'Rose', 'theme-perso' ), 'image' => $asset( 'products', 'ingredient-rose.svg' ), 'group' => 'visage', 'benefits' => __( 'Hydrate, illumine et apporte de l’éclat.', 'theme-perso' ), 'skin' => __( 'Peaux ternes et déshydratées', 'theme-perso' ), 'origin' => __( 'France / Europe', 'theme-perso' ), 'products' => __( 'Sérum Éclat à la Rose, Routine Visage', 'theme-perso' ), 'detail' => __( 'La rose est utilisée pour sa douceur sensorielle et son effet éclat. Elle accompagne les routines visage qui cherchent à hydrater, lisser et réveiller la luminosité naturelle.', 'theme-perso' ) ),
            array( 'slug' => 'karite', 'name' => __( 'Karité', 'theme-perso' ), 'image' => $asset( 'products', 'baume-corps.svg' ), 'group' => 'corps cheveux', 'benefits' => __( 'Nourrit intensément et restaure le confort.', 'theme-perso' ), 'skin' => __( 'Peaux sèches, cheveux secs', 'theme-perso' ), 'origin' => __( 'Afrique de l’Ouest', 'theme-perso' ), 'products' => __( 'Baume Corps Karité & Amande, Après-Shampooing Aloe Vera & Karité', 'theme-perso' ), 'detail' => __( 'Le karité apporte une nutrition généreuse et un fini protecteur. Il est idéal pour les zones sèches, les longueurs fragilisées et les textures riches.', 'theme-perso' ) ),
            array( 'slug' => 'camomille', 'name' => __( 'Camomille', 'theme-perso' ), 'image' => $asset( 'products', 'photo-creme-hydratante-sauge-camomille.png' ), 'group' => 'visage', 'benefits' => __( 'Apaise et aide à réduire les sensations d’inconfort.', 'theme-perso' ), 'skin' => __( 'Peaux sensibles', 'theme-perso' ), 'origin' => __( 'Europe', 'theme-perso' ), 'products' => __( 'Crème Hydratante Sauge & Camomille', 'theme-perso' ), 'detail' => __( 'La camomille est choisie pour son profil doux et réconfortant. Elle accompagne les peaux sensibles qui recherchent une routine simple et apaisante.', 'theme-perso' ) ),
            array( 'slug' => 'sauge', 'name' => __( 'Sauge', 'theme-perso' ), 'image' => $asset( 'products', 'photo-shampooing-doux-sauge-ortie.png' ), 'group' => 'visage cheveux', 'benefits' => __( 'Équilibre, purifie et accompagne les routines légères.', 'theme-perso' ), 'skin' => __( 'Peaux mixtes, cuir chevelu', 'theme-perso' ), 'origin' => __( 'France', 'theme-perso' ), 'products' => __( 'Crème Hydratante Sauge & Camomille, Shampooing Doux Sauge & Ortie', 'theme-perso' ), 'detail' => __( 'La sauge apporte une sensation de fraîcheur et d’équilibre. Elle est particulièrement intéressante dans les soins visage légers et les routines capillaires douces.', 'theme-perso' ) ),
            array( 'slug' => 'lavande', 'name' => __( 'Lavande', 'theme-perso' ), 'image' => $asset( 'products', 'lavender-ingredient.svg' ), 'group' => 'corps cheveux', 'benefits' => __( 'Signature relaxante et sensation de bien-être.', 'theme-perso' ), 'skin' => __( 'Tous types de peau', 'theme-perso' ), 'origin' => __( 'Provence', 'theme-perso' ), 'products' => __( 'Huile Essentielle Lavande Fine, Gommage Corps Sucre & Lavande', 'theme-perso' ), 'detail' => __( 'La lavande signe des rituels relaxants et raffinés. Elle évoque la Provence, le soin du soir et les textures enveloppantes.', 'theme-perso' ) ),
            array( 'slug' => 'calendula', 'name' => __( 'Calendula', 'theme-perso' ), 'image' => $asset( 'products', 'botanical-oil.svg' ), 'group' => 'visage corps', 'benefits' => __( 'Adoucit et accompagne les peaux fragilisées.', 'theme-perso' ), 'skin' => __( 'Peaux sensibles', 'theme-perso' ), 'origin' => __( 'Europe', 'theme-perso' ), 'products' => __( 'Huile de Soin Nourrissante, Lait Corps Hydratant', 'theme-perso' ), 'detail' => __( 'Le calendula est associé aux routines de confort. Il soutient les soins pensés pour adoucir, protéger et améliorer la sensation de souplesse.', 'theme-perso' ) ),
            array( 'slug' => 'jojoba', 'name' => __( 'Huile de jojoba', 'theme-perso' ), 'image' => $asset( 'products', 'photo-huile-soin-nourrissante.png' ), 'group' => 'visage cheveux', 'benefits' => __( 'Aide à équilibrer et à nourrir sans fini lourd.', 'theme-perso' ), 'skin' => __( 'Peaux mixtes, cheveux ternes', 'theme-perso' ), 'origin' => __( 'Amérique du Sud', 'theme-perso' ), 'products' => __( 'Huile de Soin Nourrissante, Sérum Pointes Nourrissant', 'theme-perso' ), 'detail' => __( 'L’huile de jojoba est appréciée pour son toucher fin et équilibrant. Elle nourrit sans alourdir et trouve sa place dans les soins visage comme capillaires.', 'theme-perso' ) ),
            array( 'slug' => 'amande', 'name' => __( 'Huile d’amande douce', 'theme-perso' ), 'image' => $asset( 'products', 'photo-baume-corps-karite-amande.png' ), 'group' => 'corps', 'benefits' => __( 'Assouplit, nourrit et laisse la peau plus douce.', 'theme-perso' ), 'skin' => __( 'Peaux sèches', 'theme-perso' ), 'origin' => __( 'Bassin méditerranéen', 'theme-perso' ), 'products' => __( 'Baume Corps Karité & Amande, Huile de Massage', 'theme-perso' ), 'detail' => __( 'L’amande douce apporte une sensorialité ronde et confortable. Elle est idéale pour les soins corps nourrissants et les massages délicats.', 'theme-perso' ) ),
            array( 'slug' => 'argile', 'name' => __( 'Argile verte', 'theme-perso' ), 'image' => $asset( 'products', 'photo-masque-purifiant-argile-verte.png' ), 'group' => 'visage', 'benefits' => __( 'Purifie les pores et affine visuellement le grain de peau.', 'theme-perso' ), 'skin' => __( 'Peaux mixtes à grasses', 'theme-perso' ), 'origin' => __( 'France', 'theme-perso' ), 'products' => __( 'Masque Purifiant Argile Verte', 'theme-perso' ), 'detail' => __( 'L’argile verte est un incontournable des routines purifiantes. Elle aide à absorber l’excès de sébum et à retrouver une peau nette.', 'theme-perso' ) ),
            array( 'slug' => 'vitamine-e', 'name' => __( 'Vitamine E', 'theme-perso' ), 'image' => $asset( 'products', 'texture-creme.svg' ), 'group' => 'visage corps cheveux', 'benefits' => __( 'Protège les formules et accompagne l’éclat de la peau.', 'theme-perso' ), 'skin' => __( 'Tous types de peau', 'theme-perso' ), 'origin' => __( 'Origine végétale', 'theme-perso' ), 'products' => __( 'Huile Sèche Botanique, Sérum Éclat à la Rose', 'theme-perso' ), 'detail' => __( 'La vitamine E est intégrée pour soutenir la stabilité des formules et enrichir les rituels qui recherchent douceur, confort et éclat.', 'theme-perso' ) ),
            array( 'slug' => 'cacao', 'name' => __( 'Beurre de cacao', 'theme-perso' ), 'image' => $asset( 'products', 'photo-beurre-corporel-coco-vanille.png' ), 'group' => 'corps', 'benefits' => __( 'Apporte confort, nutrition et texture fondante.', 'theme-perso' ), 'skin' => __( 'Peaux sèches à très sèches', 'theme-perso' ), 'origin' => __( 'Afrique / Amérique latine', 'theme-perso' ), 'products' => __( 'Beurre Corporel Coco & Vanille', 'theme-perso' ), 'detail' => __( 'Le beurre de cacao donne du corps aux textures riches. Il apporte une sensation enveloppante et une nutrition durable.', 'theme-perso' ) ),
        );
        $featured_actives = array(
            array( 'icon' => 'sparkle', 'title' => __( 'Éclat', 'theme-perso' ), 'text' => __( 'Rose, vitamine E et huiles fines pour réveiller la luminosité naturelle.', 'theme-perso' ) ),
            array( 'icon' => 'heart', 'title' => __( 'Confort', 'theme-perso' ), 'text' => __( 'Karité, camomille et calendula pour accompagner les peaux en recherche de douceur.', 'theme-perso' ) ),
            array( 'icon' => 'leaf', 'title' => __( 'Équilibre', 'theme-perso' ), 'text' => __( 'Sauge, argile verte et jojoba pour des routines plus légères et ciblées.', 'theme-perso' ) ),
        );
        ?>
        <section id="bibliotheque-actifs" class="institutional-section institutional-section--ingredients-library">
            <div class="container">
                <div class="institutional-toolbar motion-reveal">
                    <div>
                        <p class="eyebrow"><?php esc_html_e( 'Bibliothèque active', 'theme-perso' ); ?></p>
                        <h2><?php esc_html_e( 'Explorer par univers de soin.', 'theme-perso' ); ?></h2>
                    </div>
                    <div class="institutional-filter" data-filter-group="ingredients">
                        <?php foreach ( array( 'all' => __( 'Tous', 'theme-perso' ), 'visage' => __( 'Visage', 'theme-perso' ), 'corps' => __( 'Corps', 'theme-perso' ), 'cheveux' => __( 'Cheveux', 'theme-perso' ) ) as $filter => $label ) : ?>
                            <button type="button" class="<?php echo 'all' === $filter ? 'is-active' : ''; ?>" data-filter-button="<?php echo esc_attr( $filter ); ?>"><?php echo esc_html( $label ); ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="ingredient-library-grid">
                    <?php foreach ( $ingredients as $item ) : ?>
                        <article class="ingredient-library-card motion-reveal motion-reveal--scale" data-filter-card="ingredients" data-filter-values="<?php echo esc_attr( $item['group'] ); ?>">
                            <figure><img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" loading="lazy"></figure>
                            <div>
                                <h3><?php echo esc_html( $item['name'] ); ?></h3>
                                <p><?php echo esc_html( $item['benefits'] ); ?></p>
                                <dl>
                                    <dt><?php esc_html_e( 'Type de peau', 'theme-perso' ); ?></dt><dd><?php echo esc_html( $item['skin'] ); ?></dd>
                                    <dt><?php esc_html_e( 'Origine', 'theme-perso' ); ?></dt><dd><?php echo esc_html( $item['origin'] ); ?></dd>
                                    <dt><?php esc_html_e( 'Produits associés', 'theme-perso' ); ?></dt><dd><?php echo esc_html( $item['products'] ); ?></dd>
                                </dl>
                                <button type="button" class="ingredient-detail-button" data-ingredient-open="<?php echo esc_attr( $item['slug'] ); ?>"><?php esc_html_e( 'Découvrir', 'theme-perso' ); ?></button>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="institutional-section institutional-section--soft">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Notre sélection d’actifs', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Des actifs choisis pour construire des routines lisibles.', 'theme-perso' ); ?></h2>
                </div>
                <div class="ingredient-feature-grid">
                    <?php foreach ( $featured_actives as $active ) : ?>
                        <article class="ingredient-feature-card motion-reveal motion-reveal--scale">
                            <span class="institutional-icon"><?php echo $icon( $active['icon'] ); ?></span>
                            <h3><?php echo esc_html( $active['title'] ); ?></h3>
                            <p><?php echo esc_html( $active['text'] ); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <div class="ingredient-detail-panel" data-ingredient-panel hidden>
            <button type="button" class="ingredient-panel-backdrop" data-ingredient-close aria-label="<?php esc_attr_e( 'Fermer', 'theme-perso' ); ?>"></button>
            <div class="ingredient-panel-dialog" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Fiche ingrédient', 'theme-perso' ); ?>">
                <button type="button" class="ingredient-panel-close" data-ingredient-close><?php esc_html_e( 'Fermer', 'theme-perso' ); ?></button>
                <?php foreach ( $ingredients as $item ) : ?>
                    <article class="ingredient-detail-card" data-ingredient-detail="<?php echo esc_attr( $item['slug'] ); ?>" hidden>
                        <figure><img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" loading="lazy"></figure>
                        <div>
                            <p class="eyebrow"><?php esc_html_e( 'Fiche ingrédient', 'theme-perso' ); ?></p>
                            <h2><?php echo esc_html( $item['name'] ); ?></h2>
                            <p><?php echo esc_html( $item['detail'] ); ?></p>
                            <ul class="institutional-check-list">
                                <li><?php echo $icon( 'check' ); ?><?php echo esc_html( $item['benefits'] ); ?></li>
                                <li><?php echo $icon( 'check' ); ?><?php echo esc_html( $item['skin'] ); ?></li>
                                <li><?php echo $icon( 'check' ); ?><?php echo esc_html( $item['products'] ); ?></li>
                            </ul>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ( 'qualite' === $slug ) : ?>
        <?php
        $steps = array(
            array( 'icon' => 'leaf', 'title' => __( 'Sélection des matières premières', 'theme-perso' ), 'text' => __( 'Nous privilégions des actifs cohérents avec chaque besoin de peau.', 'theme-perso' ) ),
            array( 'icon' => 'clarity', 'title' => __( 'Contrôle qualité', 'theme-perso' ), 'text' => __( 'Chaque lot est suivi pour garantir constance et traçabilité.', 'theme-perso' ) ),
            array( 'icon' => 'flask', 'title' => __( 'Formulation', 'theme-perso' ), 'text' => __( 'Les textures sont travaillées pour conjuguer sensorialité et efficacité.', 'theme-perso' ) ),
            array( 'icon' => 'factory', 'title' => __( 'Fabrication', 'theme-perso' ), 'text' => __( 'La production respecte un cahier des charges précis et responsable.', 'theme-perso' ) ),
            array( 'icon' => 'package', 'title' => __( 'Conditionnement', 'theme-perso' ), 'text' => __( 'Les packagings protègent les soins et valorisent l’expérience.', 'theme-perso' ) ),
            array( 'icon' => 'truck', 'title' => __( 'Expédition', 'theme-perso' ), 'text' => __( 'Les commandes sont préparées avec soin pour préserver les produits.', 'theme-perso' ) ),
        );
        $quality_gallery = array(
            array( 'title' => __( 'Le laboratoire', 'theme-perso' ), 'text' => __( 'Un univers propre, précis et organisé pour développer des soins cohérents.', 'theme-perso' ), 'image' => $asset( 'about', 'about-eco-commitment.png' ) ),
            array( 'title' => __( 'Les matières premières', 'theme-perso' ), 'text' => __( 'Des actifs naturels sélectionnés pour leur intérêt et leur traçabilité.', 'theme-perso' ), 'image' => $asset( 'about', 'reference-catalog-products.png' ) ),
            array( 'title' => __( 'Les tests qualité', 'theme-perso' ), 'text' => __( 'Des contrôles réguliers pour conserver stabilité, texture et sécurité.', 'theme-perso' ), 'image' => $asset( 'products', 'category-soins-visage-hero.png' ) ),
            array( 'title' => __( 'Le packaging', 'theme-perso' ), 'text' => __( 'Des contenants élégants, protecteurs et alignés avec l’identité de la marque.', 'theme-perso' ), 'image' => $asset( 'products', 'photo-pack-routine-premium-reel.png' ) ),
        );
        $quality_reasons = array(
            array( 'icon' => 'sparkle', 'title' => __( 'Sensorialité', 'theme-perso' ), 'text' => __( 'Des textures agréables qui transforment le soin en rituel.', 'theme-perso' ) ),
            array( 'icon' => 'clarity', 'title' => __( 'Lisibilité', 'theme-perso' ), 'text' => __( 'Des bénéfices clairs, des usages simples et une communication transparente.', 'theme-perso' ) ),
            array( 'icon' => 'check', 'title' => __( 'Rigueur', 'theme-perso' ), 'text' => __( 'Un niveau d’exigence constant du choix des actifs à la livraison.', 'theme-perso' ) ),
        );
        ?>
        <section class="institutional-section quality-motion-section">
            <div class="container quality-motion-card motion-reveal">
                <div>
                    <p class="eyebrow"><?php esc_html_e( 'Atelier qualité', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Une fabrication pensée comme un rituel de précision.', 'theme-perso' ); ?></h2>
                    <p><?php esc_html_e( 'Chaque formule avance par étapes : choisir, tester, ajuster, contrôler puis conditionner avec soin. Cette méthode garantit une expérience fiable et premium.', 'theme-perso' ); ?></p>
                </div>
                <div class="quality-orbit" aria-hidden="true">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </section>
        <section id="processus-qualite" class="institutional-section institutional-section--quality-process">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Processus', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'De l’actif au rituel final.', 'theme-perso' ); ?></h2>
                </div>
                <div class="quality-timeline">
                    <?php foreach ( $steps as $index => $step ) : ?>
                        <article class="quality-step motion-reveal">
                            <span class="quality-step-number"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
                            <span class="institutional-icon"><?php echo $icon( $step['icon'] ); ?></span>
                            <h3><?php echo esc_html( $step['title'] ); ?></h3>
                            <p><?php echo esc_html( $step['text'] ); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section id="certifications" class="institutional-section institutional-section--soft institutional-section--quality-certifications">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Nos certifications', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Des garanties visibles et rassurantes.', 'theme-perso' ); ?></h2>
                </div>
                <div class="certification-grid">
                    <?php foreach ( array( __( 'Origine naturelle', 'theme-perso' ), __( 'Cruelty Free', 'theme-perso' ), __( 'Vegan friendly', 'theme-perso' ), __( 'Emballages recyclables', 'theme-perso' ), __( 'Contrôle qualité', 'theme-perso' ), __( 'Fabrication responsable', 'theme-perso' ) ) as $badge ) : ?>
                        <span class="certification-badge motion-reveal motion-reveal--scale"><?php echo $icon( 'check' ); ?><?php echo esc_html( $badge ); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="institutional-section">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Dans les coulisses', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Une qualité visible jusque dans les détails.', 'theme-perso' ); ?></h2>
                </div>
                <div class="quality-gallery-grid">
                    <?php foreach ( $quality_gallery as $item ) : ?>
                        <article class="quality-gallery-card motion-reveal motion-reveal--scale">
                            <figure><img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" loading="lazy"></figure>
                            <div>
                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo esc_html( $item['text'] ); ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="institutional-section institutional-section--soft">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Pourquoi choisir Cosm’Éthique', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Une exigence premium, simple à comprendre.', 'theme-perso' ); ?></h2>
                </div>
                <div class="quality-choice-grid">
                    <?php foreach ( $quality_reasons as $item ) : ?>
                        <article class="quality-choice-card motion-reveal motion-reveal--scale">
                            <span class="institutional-icon"><?php echo $icon( $item['icon'] ); ?></span>
                            <h3><?php echo esc_html( $item['title'] ); ?></h3>
                            <p><?php echo esc_html( $item['text'] ); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( 'boutiques' === $slug ) : ?>
        <?php
        $stores = array(
            array( 'city' => 'Paris', 'status' => __( 'Ouverte', 'theme-perso' ), 'address' => '18 rue Saint-Honoré, 75001 Paris', 'hours' => 'Lun-Sam 10h-19h', 'image' => $asset( 'about', 'reference-catalog-products.png' ), 'left' => '54%', 'top' => '33%' ),
            array( 'city' => 'Lyon', 'status' => __( 'Bientôt', 'theme-perso' ), 'address' => '6 rue Édouard Herriot, 69002 Lyon', 'hours' => 'Ouverture prochaine', 'image' => $asset( 'products', 'category-soins-corps-hero.png' ), 'left' => '59%', 'top' => '57%' ),
            array( 'city' => 'Marseille', 'status' => __( 'Bientôt', 'theme-perso' ), 'address' => '22 rue Paradis, 13001 Marseille', 'hours' => 'Ouverture prochaine', 'image' => $asset( 'products', 'photo-huile-seche-botanique.png' ), 'left' => '62%', 'top' => '78%' ),
            array( 'city' => 'Bordeaux', 'status' => __( 'Bientôt', 'theme-perso' ), 'address' => '9 cours de l’Intendance, 33000 Bordeaux', 'hours' => 'Ouverture prochaine', 'image' => $asset( 'products', 'photo-baume-corps-karite-amande.png' ), 'left' => '39%', 'top' => '64%' ),
            array( 'city' => 'Toulouse', 'status' => __( 'Bientôt', 'theme-perso' ), 'address' => '14 rue d’Alsace-Lorraine, 31000 Toulouse', 'hours' => 'Ouverture prochaine', 'image' => $asset( 'products', 'category-packs-hero-reel.png' ), 'left' => '48%', 'top' => '76%' ),
        );
        ?>
        <section class="institutional-section">
            <div class="container boutiques-layout">
                <div class="boutique-map-panel motion-reveal motion-reveal--left" aria-label="<?php esc_attr_e( 'Carte des boutiques Cosm’Éthique', 'theme-perso' ); ?>">
                    <div class="boutique-map-visual">
                        <?php foreach ( $stores as $store ) : ?>
                            <button type="button" class="boutique-map-pin" style="--pin-left: <?php echo esc_attr( $store['left'] ); ?>; --pin-top: <?php echo esc_attr( $store['top'] ); ?>;" data-store-pin="<?php echo esc_attr( strtolower( remove_accents( $store['city'] ) ) ); ?>">
                                <span>CÉ</span>
                                <strong><?php echo esc_html( $store['city'] ); ?></strong>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="boutiques-copy motion-reveal motion-reveal--right">
                    <p class="eyebrow"><?php esc_html_e( 'Trouver une boutique', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Une présence qui grandit en France.', 'theme-perso' ); ?></h2>
                    <label class="boutique-search">
                        <span><?php esc_html_e( 'Trouver la boutique la plus proche', 'theme-perso' ); ?></span>
                        <input type="search" placeholder="<?php esc_attr_e( 'Rechercher une ville...', 'theme-perso' ); ?>" data-store-search>
                    </label>
                </div>
            </div>
            <div class="container boutique-card-grid">
                <?php foreach ( $stores as $store ) : ?>
                    <article class="boutique-card motion-reveal motion-reveal--scale" data-store-card data-store-city="<?php echo esc_attr( strtolower( remove_accents( $store['city'] ) ) ); ?>">
                        <img src="<?php echo esc_url( $store['image'] ); ?>" alt="<?php echo esc_attr( $store['city'] ); ?>" loading="lazy">
                        <div>
                            <span><?php echo esc_html( $store['status'] ); ?></span>
                            <h3><?php echo esc_html( $store['city'] ); ?></h3>
                            <p><?php echo esc_html( $store['address'] ); ?></p>
                            <p><?php echo esc_html( $store['hours'] ); ?></p>
                            <a class="button button-primary" href="<?php echo esc_url( home_url( '/devenir-franchise/' ) ); ?>"><?php esc_html_e( 'Voir la boutique', 'theme-perso' ); ?></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( 'faq' === $slug ) : ?>
        <?php
        $faq_categories = array(
            'livraison' => array(
                'icon'        => 'truck',
                'title'       => __( 'Livraison', 'theme-perso' ),
                'description' => __( 'Délais, frais et suivi de livraison.', 'theme-perso' ),
                'items'       => array(
                    array( 'question' => __( 'Quand ma commande est-elle expédiée ?', 'theme-perso' ), 'answer' => __( 'Les commandes sont préparées sous 24 à 48h ouvrées, puis confiées au transporteur.', 'theme-perso' ) ),
                    array( 'question' => __( 'La livraison est-elle offerte ?', 'theme-perso' ), 'answer' => __( 'La livraison est offerte dès 40 € d’achat en France métropolitaine.', 'theme-perso' ) ),
                    array( 'question' => __( 'Comment suivre ma livraison ?', 'theme-perso' ), 'answer' => __( 'Le lien de suivi est disponible dans votre espace client dès l’expédition de la commande.', 'theme-perso' ) ),
                ),
            ),
            'commande' => array(
                'icon'        => 'package',
                'title'       => __( 'Commande', 'theme-perso' ),
                'description' => __( 'Validation, modification et historique de commande.', 'theme-perso' ),
                'items'       => array(
                    array( 'question' => __( 'Puis-je modifier une commande ?', 'theme-perso' ), 'answer' => __( 'Contactez-nous rapidement après validation afin que nous puissions vérifier les possibilités.', 'theme-perso' ) ),
                    array( 'question' => __( 'Comment suivre ma commande ?', 'theme-perso' ), 'answer' => __( 'Le suivi est disponible depuis votre espace client lorsque la commande est expédiée.', 'theme-perso' ) ),
                    array( 'question' => __( 'Où retrouver ma facture ?', 'theme-perso' ), 'answer' => __( 'Les documents liés à vos commandes sont accessibles depuis votre espace client.', 'theme-perso' ) ),
                ),
            ),
            'paiement' => array(
                'icon'        => 'check',
                'title'       => __( 'Paiement', 'theme-perso' ),
                'description' => __( 'Moyens de paiement et sécurité.', 'theme-perso' ),
                'items'       => array(
                    array( 'question' => __( 'Le paiement est-il sécurisé ?', 'theme-perso' ), 'answer' => __( 'Oui, les paiements sont protégés par chiffrement SSL et des solutions de paiement reconnues.', 'theme-perso' ) ),
                    array( 'question' => __( 'Puis-je payer en plusieurs fois ?', 'theme-perso' ), 'answer' => __( 'Des options de paiement fractionné peuvent être proposées selon le montant et l’éligibilité.', 'theme-perso' ) ),
                    array( 'question' => __( 'Quels moyens de paiement sont acceptés ?', 'theme-perso' ), 'answer' => __( 'Le site présente les solutions disponibles directement dans le tunnel de commande.', 'theme-perso' ) ),
                ),
            ),
            'compte' => array(
                'icon'        => 'skin',
                'title'       => __( 'Compte client', 'theme-perso' ),
                'description' => __( 'Connexion, données et espace personnel.', 'theme-perso' ),
                'items'       => array(
                    array( 'question' => __( 'Dois-je créer un compte ?', 'theme-perso' ), 'answer' => __( 'Le compte permet de retrouver vos commandes, recommandations et informations plus facilement.', 'theme-perso' ) ),
                    array( 'question' => __( 'Mes données sont-elles protégées ?', 'theme-perso' ), 'answer' => __( 'Nous traitons vos données avec attention et uniquement pour les finalités nécessaires.', 'theme-perso' ) ),
                    array( 'question' => __( 'Puis-je modifier mes informations ?', 'theme-perso' ), 'answer' => __( 'Vos informations personnelles peuvent être mises à jour depuis la rubrique dédiée de votre espace client.', 'theme-perso' ) ),
                ),
            ),
            'produits' => array(
                'icon'        => 'leaf',
                'title'       => __( 'Produits', 'theme-perso' ),
                'description' => __( 'Conseils, compositions et types de peau.', 'theme-perso' ),
                'items'       => array(
                    array( 'question' => __( 'Les soins conviennent-ils aux peaux sensibles ?', 'theme-perso' ), 'answer' => __( 'Chaque fiche produit précise les types de peau recommandés et les conseils d’utilisation.', 'theme-perso' ) ),
                    array( 'question' => __( 'Les produits sont-ils testés sur les animaux ?', 'theme-perso' ), 'answer' => __( 'Non, Cosm’Éthique s’inscrit dans une démarche cruelty free.', 'theme-perso' ) ),
                    array( 'question' => __( 'Comment choisir ma routine ?', 'theme-perso' ), 'answer' => __( 'Le diagnostic beauté vous oriente vers les soins les plus adaptés à vos besoins.', 'theme-perso' ) ),
                ),
            ),
            'diagnostic' => array(
                'icon'        => 'sparkle',
                'title'       => __( 'Diagnostic', 'theme-perso' ),
                'description' => __( 'Routine personnalisée et recommandations.', 'theme-perso' ),
                'items'       => array(
                    array( 'question' => __( 'Le diagnostic est-il gratuit ?', 'theme-perso' ), 'answer' => __( 'Oui, il permet d’obtenir une routine indicative en moins d’une minute.', 'theme-perso' ) ),
                    array( 'question' => __( 'Puis-je recommencer le diagnostic ?', 'theme-perso' ), 'answer' => __( 'Oui, vous pouvez le relancer à tout moment pour adapter votre routine.', 'theme-perso' ) ),
                    array( 'question' => __( 'Les recommandations sont-elles personnalisées ?', 'theme-perso' ), 'answer' => __( 'Les produits proposés dépendent des réponses données pendant le diagnostic.', 'theme-perso' ) ),
                ),
            ),
            'franchise' => array(
                'icon'        => 'store',
                'title'       => __( 'Franchise', 'theme-perso' ),
                'description' => __( 'Ouvrir une boutique Cosm’Éthique.', 'theme-perso' ),
                'items'       => array(
                    array( 'question' => __( 'Comment devenir franchisé ?', 'theme-perso' ), 'answer' => __( 'La page Devenir franchisé présente le concept et le formulaire de demande.', 'theme-perso' ) ),
                    array( 'question' => __( 'Quels profils recherchez-vous ?', 'theme-perso' ), 'answer' => __( 'Des profils sensibles à la beauté naturelle, au commerce premium et au conseil client.', 'theme-perso' ) ),
                    array( 'question' => __( 'Puis-je proposer ma ville ?', 'theme-perso' ), 'answer' => __( 'Oui, le formulaire permet d’indiquer la ville souhaitée pour votre projet.', 'theme-perso' ) ),
                ),
            ),
            'retours' => array(
                'icon'        => 'recycle',
                'title'       => __( 'Retours', 'theme-perso' ),
                'description' => __( 'Conditions et délais de retour.', 'theme-perso' ),
                'items'       => array(
                    array( 'question' => __( 'Puis-je retourner un produit ?', 'theme-perso' ), 'answer' => __( 'Les conditions de retour sont détaillées dans les CGV du site.', 'theme-perso' ) ),
                    array( 'question' => __( 'Quel est le délai de retour ?', 'theme-perso' ), 'answer' => __( 'Le délai indiqué est de 30 jours selon les conditions applicables.', 'theme-perso' ) ),
                    array( 'question' => __( 'Comment demander un retour ?', 'theme-perso' ), 'answer' => __( 'Contactez notre équipe avec votre numéro de commande afin d’être accompagné.', 'theme-perso' ) ),
                ),
            ),
        );
        $popular_faqs = array(
            array( 'title' => __( 'Livraison offerte', 'theme-perso' ), 'text' => __( 'La livraison est offerte dès 40 € d’achat en France métropolitaine.', 'theme-perso' ) ),
            array( 'title' => __( 'Diagnostic beauté', 'theme-perso' ), 'text' => __( 'Le diagnostic vous aide à composer une routine adaptée en moins d’une minute.', 'theme-perso' ) ),
            array( 'title' => __( 'Paiement sécurisé', 'theme-perso' ), 'text' => __( 'Vos données sont protégées et chiffrées grâce au protocole SSL.', 'theme-perso' ) ),
            array( 'title' => __( 'Peaux sensibles', 'theme-perso' ), 'text' => __( 'Les fiches produits précisent les conseils adaptés aux peaux délicates.', 'theme-perso' ) ),
        );
        ?>
        <section class="faq-categories-immersive">
            <div class="faq-full">
                <div class="faq-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Catégories d’aide', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Choisissez votre sujet, trouvez la bonne réponse.', 'theme-perso' ); ?></h2>
                </div>
                <div class="faq-category-strip">
                    <?php foreach ( $faq_categories as $key => $category ) : ?>
                        <button type="button" class="faq-category-tile motion-reveal motion-reveal--scale" data-faq-category-jump="<?php echo esc_attr( $key ); ?>">
                            <span class="faq-category-topline">
                                <span class="institutional-icon"><?php echo $icon( $category['icon'] ); ?></span>
                                <span class="faq-category-count"><?php echo esc_html( sprintf( _n( '%d question', '%d questions', count( $category['items'] ), 'theme-perso' ), count( $category['items'] ) ) ); ?></span>
                            </span>
                            <strong><?php echo esc_html( $category['title'] ); ?></strong>
                            <small><?php echo esc_html( $category['description'] ); ?></small>
                            <em><?php esc_html_e( 'Voir les réponses', 'theme-perso' ); ?></em>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="faq-questions-immersive" data-faq-list>
            <div class="faq-full faq-questions-layout">
                <aside class="faq-question-aside motion-reveal motion-reveal--left">
                    <p class="eyebrow"><?php esc_html_e( 'Toutes vos questions', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Des réponses détaillées, organisées par sujet.', 'theme-perso' ); ?></h2>
                    <p><?php esc_html_e( 'Parcourez les thèmes essentiels pour commander, choisir vos soins, gérer votre compte ou préparer votre projet franchise.', 'theme-perso' ); ?></p>
                </aside>
                <div class="faq-accordion-column">
                    <?php foreach ( $faq_categories as $key => $category ) : ?>
                        <section class="faq-accordion-group motion-reveal" data-faq-category data-faq-category-key="<?php echo esc_attr( $key ); ?>">
                            <header>
                                <span class="institutional-icon"><?php echo $icon( $category['icon'] ); ?></span>
                                <div>
                                    <p><?php echo esc_html( $category['description'] ); ?></p>
                                    <h3><?php echo esc_html( $category['title'] ); ?></h3>
                                </div>
                            </header>
                            <div class="faq-large-accordion-list">
                                <?php foreach ( $category['items'] as $item ) : ?>
                                    <details class="faq-large-accordion" data-faq-item>
                                        <summary><span><?php echo esc_html( $item['question'] ); ?></span></summary>
                                        <p><?php echo esc_html( $item['answer'] ); ?></p>
                                    </details>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="faq-popular-immersive">
            <div class="faq-full">
                <div class="faq-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Les plus consultées', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Les réponses que nos clientes consultent le plus souvent.', 'theme-perso' ); ?></h2>
                </div>
                <div class="faq-popular-large-grid">
                    <?php foreach ( $popular_faqs as $item ) : ?>
                        <article class="faq-popular-large-card motion-reveal motion-reveal--scale">
                            <span class="institutional-icon"><?php echo $icon( 'star' ); ?></span>
                            <h3><?php echo esc_html( $item['title'] ); ?></h3>
                            <p><?php echo esc_html( $item['text'] ); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="faq-help-immersive">
            <div class="faq-full faq-help-grid">
                <figure class="faq-help-media motion-reveal motion-reveal--left">
                    <img src="<?php echo esc_url( $asset( 'products', 'category-packs-hero-reel.png' ) ); ?>" alt="<?php esc_attr_e( 'Conseillère Cosm’Éthique et produits premium', 'theme-perso' ); ?>" loading="lazy">
                </figure>
                <div class="faq-help-copy motion-reveal motion-reveal--right">
                    <p class="eyebrow"><?php esc_html_e( 'Besoin d’aide ?', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Vous ne trouvez pas votre réponse ?', 'theme-perso' ); ?></h2>
                    <p><?php esc_html_e( 'Notre équipe vous accompagne pour choisir vos soins, suivre une commande ou préparer un projet de franchise.', 'theme-perso' ); ?></p>
                    <div class="button-group">
                        <a class="button button-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'theme-perso' ); ?></a>
                        <a class="button button-secondary" href="<?php echo esc_url( home_url( '/diagnostic/' ) ); ?>"><?php esc_html_e( 'Diagnostic', 'theme-perso' ); ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( 'avis-clients' === $slug ) : ?>
        <?php
        $reviews = array(
            array( 'name' => 'Sophie M.', 'city' => 'Paris', 'group' => 'visage', 'image' => $asset( 'blog', 'blog-peau-sensible.png' ), 'text' => 'Le sérum a rendu ma routine beaucoup plus lumineuse. La texture est fine, élégante et très agréable.' ),
            array( 'name' => 'Camille R.', 'city' => 'Lyon', 'group' => 'corps', 'image' => $asset( 'products', 'lifestyle-baume-corps.png' ), 'text' => 'Le baume corps est devenu mon indispensable. Il nourrit sans sensation lourde et le packaging est magnifique.' ),
            array( 'name' => 'Nadia B.', 'city' => 'Bordeaux', 'group' => 'cheveux', 'image' => $asset( 'products', 'lifestyle-masque-cheveux.png' ), 'text' => 'Mes cheveux sont plus doux après quelques utilisations. Le masque sent très bon et se rince facilement.' ),
            array( 'name' => 'Julie L.', 'city' => 'Nantes', 'group' => 'visage', 'image' => $asset( 'about', 'about-story-lifestyle.png' ), 'text' => 'La crème est douce, rassurante, et parfaite pour ma peau sensible. Très belle expérience.' ),
            array( 'name' => 'Inès D.', 'city' => 'Marseille', 'group' => 'corps', 'image' => $asset( 'products', 'lifestyle-huile-botanique.png' ), 'text' => 'L’huile sèche laisse un fini satiné sans coller. C’est exactement le rendu premium que je cherchais.' ),
            array( 'name' => 'Laura P.', 'city' => 'Toulouse', 'group' => 'cheveux', 'image' => $asset( 'products', 'lifestyle-shampooing-sauge.png' ), 'text' => 'Le shampooing est doux et laisse les cheveux légers. J’aime beaucoup l’univers de la marque.' ),
        );
        ?>
        <section class="institutional-section">
            <div class="container review-summary motion-reveal">
                <div>
                    <span class="review-stars">★★★★★</span>
                    <strong>4.9/5</strong>
                    <p><?php esc_html_e( 'Plus de 4 800 avis clients', 'theme-perso' ); ?></p>
                </div>
                <div class="institutional-filter" data-filter-group="reviews">
                    <?php foreach ( array( 'all' => __( 'Tous', 'theme-perso' ), 'visage' => __( 'Visage', 'theme-perso' ), 'corps' => __( 'Corps', 'theme-perso' ), 'cheveux' => __( 'Cheveux', 'theme-perso' ) ) as $filter => $label ) : ?>
                        <button type="button" class="<?php echo 'all' === $filter ? 'is-active' : ''; ?>" data-filter-button="<?php echo esc_attr( $filter ); ?>"><?php echo esc_html( $label ); ?></button>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="container review-card-grid">
                <?php foreach ( $reviews as $review ) : ?>
                    <article class="review-page-card motion-reveal motion-reveal--scale" data-filter-card="reviews" data-filter-values="<?php echo esc_attr( $review['group'] ); ?>">
                        <img src="<?php echo esc_url( $review['image'] ); ?>" alt="<?php echo esc_attr( $review['name'] ); ?>" loading="lazy">
                        <div>
                            <span class="review-stars">★★★★★</span>
                            <p>“<?php echo esc_html( $review['text'] ); ?>”</p>
                            <strong><?php echo esc_html( $review['name'] ); ?></strong>
                            <small><?php echo esc_html( $review['city'] ); ?></small>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( 'faq' !== $slug ) : ?>
        <section class="institutional-cta motion-reveal">
            <div class="container institutional-cta-inner">
                <p class="eyebrow"><?php esc_html_e( 'Cosm’Éthique', 'theme-perso' ); ?></p>
                <h2><?php esc_html_e( 'Découvrez des soins naturels pensés avec exigence.', 'theme-perso' ); ?></h2>
                <div class="button-group">
                    <a class="button button-primary" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' ) ); ?>"><?php esc_html_e( 'Découvrir la boutique', 'theme-perso' ); ?></a>
                    <a class="button button-secondary" href="<?php echo esc_url( home_url( '/diagnostic/' ) ); ?>"><?php esc_html_e( 'Faire mon diagnostic', 'theme-perso' ); ?></a>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
