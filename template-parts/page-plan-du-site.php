<?php
/**
 * Page Plan du site immersive COSM'ETHIQUE.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$asset = function( $folder, $file ) {
    return get_template_directory_uri() . '/assets/' . trim( $folder, '/' ) . '/' . ltrim( $file, '/' );
};

$page_url = function( $slug, $fallback = '' ) {
    $page = get_page_by_path( $slug );

    if ( $page ) {
        return get_permalink( $page );
    }

    return $fallback ? home_url( '/' . trim( $fallback, '/' ) . '/' ) : home_url( '/' . trim( $slug, '/' ) . '/' );
};

$term_url = function( $slug, $fallback = '' ) {
    if ( taxonomy_exists( 'product_cat' ) ) {
        $term = get_term_by( 'slug', $slug, 'product_cat' );

        if ( $term && ! is_wp_error( $term ) ) {
            $link = get_term_link( $term );

            if ( ! is_wp_error( $link ) ) {
                return $link;
            }
        }
    }

    return $fallback ? home_url( '/' . trim( $fallback, '/' ) . '/' ) : home_url( '/product-category/' . trim( $slug, '/' ) . '/' );
};

$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : $page_url( 'boutique', 'boutique' );
$cart_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $page_url( 'panier', 'panier' );
$account_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : $page_url( 'mon-compte', 'mon-compte' );
$posts_page_id = (int) get_option( 'page_for_posts' );
$blog_url      = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/blog/' );

$nodes = array(
    array(
        'key'         => 'boutique',
        'title'       => __( 'Boutique', 'theme-perso' ),
        'description' => __( 'Toutes les collections de soins naturels.', 'theme-perso' ),
        'url'         => $shop_url,
        'icon'        => 'bottle',
        'image'       => $asset( 'products', 'photo-serum-eclat-rose.png' ),
        'x'           => 15,
        'y'           => 25,
        'subs'        => array(
            array( 'label' => __( 'Soins visage', 'theme-perso' ), 'url' => $term_url( 'soins-visage' ) ),
            array( 'label' => __( 'Soins corps', 'theme-perso' ), 'url' => $term_url( 'soins-corps' ) ),
            array( 'label' => __( 'Cheveux', 'theme-perso' ), 'url' => $term_url( 'soins-cheveux' ) ),
            array( 'label' => __( 'Accessoires', 'theme-perso' ), 'url' => $term_url( 'accessoires-beaute' ) ),
            array( 'label' => __( 'Packs', 'theme-perso' ), 'url' => $term_url( 'packs' ) ),
        ),
    ),
    array(
        'key'         => 'diagnostic',
        'title'       => __( 'Diagnostic', 'theme-perso' ),
        'description' => __( 'Une routine personnalisée en moins d’une minute.', 'theme-perso' ),
        'url'         => $page_url( 'diagnostic', 'diagnostic' ),
        'icon'        => 'tablet',
        'image'       => $asset( 'products', 'photo-creme-hydratante-sauge-camomille.png' ),
        'x'           => 50,
        'y'           => 12,
        'subs'        => array(),
    ),
    array(
        'key'         => 'blog',
        'title'       => __( 'Blog', 'theme-perso' ),
        'description' => __( 'Conseils beauté, actifs et routines.', 'theme-perso' ),
        'url'         => $blog_url,
        'icon'        => 'book',
        'image'       => $asset( 'blog', 'blog-serum.png' ),
        'x'           => 85,
        'y'           => 26,
        'subs'        => array(),
    ),
    array(
        'key'         => 'contact',
        'title'       => __( 'Contact', 'theme-perso' ),
        'description' => __( 'Une question, un conseil ou un accompagnement.', 'theme-perso' ),
        'url'         => $page_url( 'contact', 'contact' ),
        'icon'        => 'mail',
        'image'       => $asset( 'products', 'photo-trousse-beaute-cosmethique.png' ),
        'x'           => 86,
        'y'           => 73,
        'subs'        => array(),
    ),
    array(
        'key'         => 'compte',
        'title'       => __( 'Mon compte', 'theme-perso' ),
        'description' => __( 'Commandes, adresses et suivi client.', 'theme-perso' ),
        'url'         => $account_url,
        'icon'        => 'avatar',
        'image'       => $asset( 'products', 'photo-pack-routine-visage-contenu-reel.png' ),
        'x'           => 50,
        'y'           => 88,
        'subs'        => array(
            array( 'label' => __( 'Panier', 'theme-perso' ), 'url' => $cart_url ),
            array( 'label' => __( 'Commande', 'theme-perso' ), 'url' => function_exists( 'wc_get_checkout_url' ) ? wc_get_checkout_url() : $page_url( 'commande', 'commande' ) ),
        ),
    ),
    array(
        'key'         => 'engagements',
        'title'       => __( 'Nos engagements', 'theme-perso' ),
        'description' => __( 'Une beauté exigeante, claire et responsable.', 'theme-perso' ),
        'url'         => $page_url( 'engagements', 'engagements' ),
        'icon'        => 'leaf',
        'image'       => $asset( 'about', 'about-eco-commitment.png' ),
        'x'           => 14,
        'y'           => 74,
        'subs'        => array(
            array( 'label' => __( 'Ingrédients', 'theme-perso' ), 'url' => $page_url( 'ingredients', 'ingredients' ) ),
            array( 'label' => __( 'Qualité', 'theme-perso' ), 'url' => $page_url( 'qualite', 'qualite' ) ),
        ),
    ),
    array(
        'key'         => 'franchise',
        'title'       => __( 'Franchise', 'theme-perso' ),
        'description' => __( 'Rejoindre le réseau Cosm’Éthique.', 'theme-perso' ),
        'url'         => $page_url( 'devenir-franchise', 'devenir-franchise' ),
        'icon'        => 'store',
        'image'       => $asset( 'products', 'category-packs-hero-reel.png' ),
        'x'           => 29,
        'y'           => 50,
        'subs'        => array(
            array( 'label' => __( 'Devenir franchisé', 'theme-perso' ), 'url' => $page_url( 'devenir-franchise', 'devenir-franchise' ) ),
            array( 'label' => __( 'Éligibilité', 'theme-perso' ), 'url' => $page_url( 'devenir-franchise', 'devenir-franchise' ) . '#franchise-request-form' ),
        ),
    ),
    array(
        'key'         => 'autres',
        'title'       => __( 'Autres pages', 'theme-perso' ),
        'description' => __( 'Aide, avis clients et informations légales.', 'theme-perso' ),
        'url'         => $page_url( 'faq', 'faq' ),
        'icon'        => 'sparkle',
        'image'       => $asset( 'products', 'photo-huile-seche-botanique.png' ),
        'x'           => 71,
        'y'           => 50,
        'subs'        => array(
            array( 'label' => __( 'FAQ', 'theme-perso' ), 'url' => $page_url( 'faq', 'faq' ) ),
            array( 'label' => __( 'Avis clients', 'theme-perso' ), 'url' => $page_url( 'avis-clients', 'avis-clients' ) ),
            array( 'label' => __( 'Mentions légales', 'theme-perso' ), 'url' => $page_url( 'mentions-legales', 'mentions-legales' ) ),
        ),
    ),
);

$quick_cards = array(
    array( 'title' => __( 'Recherche rapide', 'theme-perso' ), 'text' => __( 'Trouvez instantanément une page, une collection ou un service.', 'theme-perso' ), 'icon' => 'search' ),
    array( 'title' => __( 'Navigation intuitive', 'theme-perso' ), 'text' => __( 'Chaque univers est relié pour guider naturellement votre parcours.', 'theme-perso' ), 'icon' => 'compass' ),
    array( 'title' => __( 'Accès direct', 'theme-perso' ), 'text' => __( 'Un clic suffit pour rejoindre les pages essentielles du site.', 'theme-perso' ), 'icon' => 'arrow' ),
    array( 'title' => __( 'Expérience optimisée', 'theme-perso' ), 'text' => __( 'Une interface claire, responsive et pensée pour tous les écrans.', 'theme-perso' ), 'icon' => 'sparkle' ),
);
?>

<div class="sitemap-premium" data-sitemap-page>
    <nav class="sitemap-breadcrumb" aria-label="<?php esc_attr_e( 'Fil d’Ariane', 'theme-perso' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Accueil', 'theme-perso' ); ?></a>
        <span aria-hidden="true">/</span>
        <span><?php esc_html_e( 'Plan du site', 'theme-perso' ); ?></span>
    </nav>

    <section class="sitemap-hero" aria-labelledby="sitemap-title">
        <div class="sitemap-ambient sitemap-ambient--one" aria-hidden="true"></div>
        <div class="sitemap-ambient sitemap-ambient--two" aria-hidden="true"></div>
        <div class="sitemap-particles" aria-hidden="true">
            <?php for ( $i = 0; $i < 18; $i++ ) : ?>
                <span></span>
            <?php endfor; ?>
        </div>
        <div class="sitemap-hero-copy motion-reveal motion-reveal--left">
            <p class="sitemap-kicker"><?php esc_html_e( 'COSM’ÉTHIQUE', 'theme-perso' ); ?></p>
            <h1 id="sitemap-title"><?php esc_html_e( 'PLAN DU SITE', 'theme-perso' ); ?></h1>
            <p class="sitemap-lead"><?php esc_html_e( 'Explorez l’univers Cosm’Éthique.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Une cartographie immersive pour rejoindre rapidement les collections, les conseils, les pages de service et l’espace client.', 'theme-perso' ); ?></p>
            <form class="sitemap-search" role="search" data-sitemap-search-form>
                <label class="screen-reader-text" for="sitemap-search-input"><?php esc_html_e( 'Rechercher une page', 'theme-perso' ); ?></label>
                <input id="sitemap-search-input" type="search" placeholder="<?php esc_attr_e( 'Rechercher une page...', 'theme-perso' ); ?>" autocomplete="off" data-sitemap-search>
                <button type="submit" aria-label="<?php esc_attr_e( 'Lancer la recherche', 'theme-perso' ); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m21 21-4.35-4.35m1.35-5.15a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0Z"></path></svg>
                </button>
                <div class="sitemap-search-results" data-sitemap-results hidden></div>
            </form>
        </div>
        <div class="sitemap-hero-visual motion-reveal motion-reveal--right" data-sitemap-parallax>
            <div class="sitemap-hero-stage" aria-hidden="true">
                <img class="sitemap-product sitemap-product--serum" src="<?php echo esc_url( $asset( 'products', 'photo-serum-eclat-rose.png' ) ); ?>" alt="">
                <img class="sitemap-product sitemap-product--cream" src="<?php echo esc_url( $asset( 'products', 'photo-creme-hydratante-sauge-camomille.png' ) ); ?>" alt="">
                <img class="sitemap-product sitemap-product--oil" src="<?php echo esc_url( $asset( 'products', 'photo-huile-seche-botanique.png' ) ); ?>" alt="">
                <span class="sitemap-stone"></span>
                <span class="sitemap-leaf sitemap-leaf--one"></span>
                <span class="sitemap-leaf sitemap-leaf--two"></span>
                <span class="sitemap-light"></span>
            </div>
        </div>
    </section>

    <section class="sitemap-map-section" aria-labelledby="sitemap-map-title">
        <div class="sitemap-section-heading motion-reveal">
            <p class="sitemap-kicker"><?php esc_html_e( 'Navigation immersive', 'theme-perso' ); ?></p>
            <h2 id="sitemap-map-title"><?php esc_html_e( 'Un plan vivant de l’expérience Cosm’Éthique.', 'theme-perso' ); ?></h2>
        </div>
        <div class="sitemap-orbit" data-sitemap-orbit>
            <svg class="sitemap-connections" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                <defs>
                    <linearGradient id="sitemap-gold-line" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#F8F4EE" stop-opacity="0.12"></stop>
                        <stop offset="48%" stop-color="#C9A45C" stop-opacity="0.95"></stop>
                        <stop offset="100%" stop-color="#2B7D8A" stop-opacity="0.42"></stop>
                    </linearGradient>
                </defs>
                <?php foreach ( $nodes as $node ) : ?>
                    <line x1="50" y1="50" x2="<?php echo esc_attr( $node['x'] ); ?>" y2="<?php echo esc_attr( $node['y'] ); ?>"></line>
                <?php endforeach; ?>
            </svg>
            <a class="sitemap-home-node motion-reveal motion-reveal--scale" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Accueil Cosm’Éthique', 'theme-perso' ); ?>">
                <span>COSM’ÉTHIQUE</span>
                <strong><?php esc_html_e( 'Accueil', 'theme-perso' ); ?></strong>
            </a>
            <?php foreach ( $nodes as $node_index => $node ) : ?>
                <article class="sitemap-node sitemap-node--<?php echo esc_attr( $node['key'] ); ?> motion-reveal motion-reveal--scale" style="--node-x: <?php echo esc_attr( $node['x'] ); ?>%; --node-y: <?php echo esc_attr( $node['y'] ); ?>%; --node-index: <?php echo esc_attr( (string) $node_index ); ?>;" data-sitemap-entry="<?php echo esc_attr( strtolower( remove_accents( $node['title'] . ' ' . $node['description'] ) ) ); ?>">
                    <a class="sitemap-node-link" href="<?php echo esc_url( $node['url'] ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Ouvrir %s', 'theme-perso' ), $node['title'] ) ); ?>">
                        <span class="sitemap-node-glow"></span>
                        <span class="sitemap-node-object sitemap-node-object--<?php echo esc_attr( $node['icon'] ); ?>">
                            <img src="<?php echo esc_url( $node['image'] ); ?>" alt="" loading="lazy">
                        </span>
                        <span class="sitemap-node-title"><?php echo esc_html( $node['title'] ); ?></span>
                        <small><?php echo esc_html( $node['description'] ); ?></small>
                    </a>
                    <?php if ( ! empty( $node['subs'] ) ) : ?>
                        <div class="sitemap-subnodes" aria-label="<?php echo esc_attr( sprintf( __( 'Sous-catégories %s', 'theme-perso' ), $node['title'] ) ); ?>">
                            <?php foreach ( $node['subs'] as $sub ) : ?>
                                <a href="<?php echo esc_url( $sub['url'] ); ?>"><?php echo esc_html( $sub['label'] ); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="sitemap-quick-section" aria-labelledby="sitemap-quick-title">
        <div class="sitemap-section-heading motion-reveal">
            <p class="sitemap-kicker"><?php esc_html_e( 'Accès essentiel', 'theme-perso' ); ?></p>
            <h2 id="sitemap-quick-title"><?php esc_html_e( 'Pensé pour aller vite, sans perdre l’élégance.', 'theme-perso' ); ?></h2>
        </div>
        <div class="sitemap-quick-grid">
            <?php foreach ( $quick_cards as $card ) : ?>
                <article class="sitemap-quick-card motion-reveal motion-reveal--scale">
                    <span class="sitemap-quick-icon sitemap-quick-icon--<?php echo esc_attr( $card['icon'] ); ?>"></span>
                    <h3><?php echo esc_html( $card['title'] ); ?></h3>
                    <p><?php echo esc_html( $card['text'] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="sitemap-footer-panel" aria-labelledby="sitemap-footer-title">
        <div>
            <p class="sitemap-kicker"><?php esc_html_e( 'Liens rapides', 'theme-perso' ); ?></p>
            <h2 id="sitemap-footer-title"><?php esc_html_e( 'Continuez votre exploration.', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Rejoignez les pages essentielles de Cosm’Éthique en un clic, puis retrouvez la newsletter dans le footer global.', 'theme-perso' ); ?></p>
        </div>
        <div class="sitemap-footer-links" aria-label="<?php esc_attr_e( 'Liens rapides du plan du site', 'theme-perso' ); ?>">
            <a href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Boutique', 'theme-perso' ); ?></a>
            <a href="<?php echo esc_url( $page_url( 'devenir-franchise', 'devenir-franchise' ) ); ?>"><?php esc_html_e( 'Franchise', 'theme-perso' ); ?></a>
            <a href="<?php echo esc_url( $page_url( 'contact', 'contact' ) ); ?>"><?php esc_html_e( 'Contact', 'theme-perso' ); ?></a>
            <a href="<?php echo esc_url( $page_url( 'mentions-legales', 'mentions-legales' ) ); ?>"><?php esc_html_e( 'Mentions légales', 'theme-perso' ); ?></a>
            <a href="<?php echo esc_url( $page_url( 'politique-de-confidentialite', 'politique-de-confidentialite' ) ); ?>"><?php esc_html_e( 'Politique de confidentialité', 'theme-perso' ); ?></a>
            <a href="<?php echo esc_url( theme_perso_instagram_url() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Instagram', 'theme-perso' ); ?></a>
            <a href="<?php echo esc_url( theme_perso_pinterest_url() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Pinterest', 'theme-perso' ); ?></a>
            <a href="<?php echo esc_url( theme_perso_tiktok_url() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'TikTok', 'theme-perso' ); ?></a>
        </div>
    </section>
</div>
