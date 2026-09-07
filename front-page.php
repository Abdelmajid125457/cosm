<?php
/**
 * Page d'accueil premium COSM'ETHIQUE.
 *
 * @package Theme_Perso
 */

get_header();

$shop_url    = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
$visage_url  = function_exists( 'theme_perso_get_shop_collection_url' ) ? theme_perso_get_shop_collection_url( 'visage', $shop_url ) : $shop_url;
$corps_url   = function_exists( 'theme_perso_get_shop_collection_url' ) ? theme_perso_get_shop_collection_url( 'corps', $shop_url ) : $shop_url;
$cheveux_url = function_exists( 'theme_perso_get_shop_collection_url' ) ? theme_perso_get_shop_collection_url( 'cheveux', $shop_url ) : $shop_url;
$event_url   = function_exists( 'theme_perso_footer_page_url' ) ? theme_perso_footer_page_url( 'evenement' ) : home_url( '/evenement/' );
$event_transition_url = add_query_arg( 'botanica', 'reveal', $event_url );
?>

<main id="primary" class="site-main front-page">
    <section class="hero-section hero-section--botanica" aria-labelledby="hero-title" data-home-botanica-hero>
        <div class="botanica-hero-bg" aria-hidden="true"></div>
        <div class="botanica-hero-glow" aria-hidden="true"></div>
        <div class="botanica-hero-light" aria-hidden="true"></div>
        <div class="botanica-hero-reflection" aria-hidden="true"></div>
        <div class="botanica-hero-particles" aria-hidden="true">
            <?php for ( $i = 0; $i < 18; $i++ ) : ?>
                <span></span>
            <?php endfor; ?>
        </div>
        <span class="botanica-limited-badge" aria-hidden="true">Édition limitée</span>
        <div class="hero-content botanica-hero-content">
            <p class="eyebrow botanica-event-badge">Nouvelle collection</p>
            <p class="botanica-season">Édition Automne 2026</p>
            <h1 id="hero-title">Botanica</h1>
            <p>Une routine botanique premium inspirée des actifs naturels les plus précieux.</p>

            <div class="hero-actions">
                <a class="button button-primary" href="<?php echo esc_url( $event_transition_url ); ?>" data-botanica-launch-trigger data-botanica-target="<?php echo esc_url( $event_transition_url ); ?>">Découvrir le lancement</a>
            </div>

            <div class="botanica-event-meta" aria-label="<?php esc_attr_e( 'Date et lieu du lancement Botanica', 'theme-perso' ); ?>">
                <span><strong>15 Octobre 2026</strong></span>
                <span><strong><?php esc_html_e( 'Paris & en ligne', 'theme-perso' ); ?></strong></span>
            </div>

            <div class="botanica-countdown" data-home-countdown data-countdown-date="2026-10-15T18:00:00+02:00" aria-label="<?php esc_attr_e( 'Compte à rebours avant le lancement Botanica', 'theme-perso' ); ?>">
                <p><?php esc_html_e( 'Lancement dans', 'theme-perso' ); ?></p>
                <div>
                    <span><strong data-home-countdown-days>00</strong><?php esc_html_e( 'Jours', 'theme-perso' ); ?></span>
                    <span><strong data-home-countdown-hours>00</strong><?php esc_html_e( 'Heures', 'theme-perso' ); ?></span>
                    <span><strong data-home-countdown-minutes>00</strong><?php esc_html_e( 'Minutes', 'theme-perso' ); ?></span>
                    <span><strong data-home-countdown-seconds>00</strong><?php esc_html_e( 'Secondes', 'theme-perso' ); ?></span>
                </div>
            </div>
        </div>
        <div class="botanica-product-showcase botanica-product-showcase--pot" data-home-botanica-showcase>
            <span class="botanica-launch-ray"></span>
            <span class="botanica-showcase-halo"></span>
            <span class="botanica-showcase-dust"></span>
            <span class="botanica-showcase-leaf botanica-showcase-leaf--one"></span>
            <span class="botanica-showcase-leaf botanica-showcase-leaf--two"></span>
            <div class="event-collection-scene botanica-home-pot-scene" data-botanica-home-pot-scene aria-label="<?php esc_attr_e( 'Pot de crème Botanica interactif', 'theme-perso' ); ?>">
                <button class="event-real-pot botanica-home-pot" type="button" data-botanica-launch-trigger data-botanica-target="<?php echo esc_url( $event_transition_url ); ?>" aria-label="<?php esc_attr_e( 'Ouvrir le pot Botanica et découvrir le lancement', 'theme-perso' ); ?>">
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
                <span class="botanica-pot-hint" aria-hidden="true"><?php esc_html_e( 'Cliquez pour révéler Botanica', 'theme-perso' ); ?></span>
            </div>
            <span class="botanica-portal-light" data-botanica-portal aria-hidden="true"></span>
        </div>
    </section>

    <section class="home-univers-section" aria-labelledby="home-univers-title">
        <div class="container">
            <div class="home-univers-heading">
                <p class="eyebrow">Nos univers</p>
                <h2 id="home-univers-title">Explorez les rituels Cosm’Éthique</h2>
                <p>Des soins naturels, sensoriels et précis, organisés par besoins pour composer une routine élégante et efficace.</p>
            </div>
            <?php
            $home_univers = array(
                array(
                    'title' => 'Tous les soins',
                    'text'  => 'La sélection complète Cosm’Éthique pour le visage, le corps et les cheveux.',
                    'image' => get_template_directory_uri() . '/assets/home/home-univers-tous-les-soins.png',
                    'url'   => $shop_url,
                    'cta'   => 'Découvrir la boutique',
                    'wide'  => true,
                ),
                array(
                    'title' => 'Soins Visage',
                    'text'  => 'Sérum rose, crème sauge & camomille et masque argile verte pour révéler l’éclat.',
                    'image' => get_template_directory_uri() . '/assets/home/home-univers-visage.png',
                    'url'   => $visage_url,
                    'cta'   => 'Voir les soins visage',
                ),
                array(
                    'title' => 'Soins Corps',
                    'text'  => 'Baume karité, huile botanique et lavande fine pour nourrir et sublimer la peau.',
                    'image' => get_template_directory_uri() . '/assets/home/home-univers-corps.png',
                    'url'   => $corps_url,
                    'cta'   => 'Voir les soins corps',
                ),
                array(
                    'title' => 'Soins Cheveux',
                    'text'  => 'Shampooing sauge & ortie et masque réparateur pour une fibre douce et lumineuse.',
                    'image' => get_template_directory_uri() . '/assets/home/home-univers-cheveux.png',
                    'url'   => $cheveux_url,
                    'cta'   => 'Voir les soins cheveux',
                ),
            );
            ?>
            <div class="home-univers-grid">
                <?php foreach ( $home_univers as $universe ) : ?>
                    <article class="home-universe-card<?php echo ! empty( $universe['wide'] ) ? ' home-universe-card--wide' : ''; ?>" data-universe-card>
                        <a href="<?php echo esc_url( $universe['url'] ); ?>" aria-label="<?php echo esc_attr( $universe['cta'] ); ?>">
                            <span class="home-universe-media">
                                <img src="<?php echo esc_url( $universe['image'] ); ?>" alt="<?php echo esc_attr( $universe['title'] ); ?>" loading="lazy" data-universe-parallax>
                            </span>
                            <span class="home-universe-content">
                                <span class="home-universe-kicker">Cosm’Éthique</span>
                                <strong><?php echo esc_html( $universe['title'] ); ?></strong>
                                <em><?php echo esc_html( $universe['text'] ); ?></em>
                                <span class="home-universe-button"><?php echo esc_html( $universe['cta'] ); ?></span>
                            </span>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section featured-products" id="boutique">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">Best sellers</p>
                <h2>Les essentiels COSM’ETHIQUE</h2>
            </div>
            <div class="products-grid filterable-products" aria-live="polite">
                <?php
                $has_products = false;

                if ( class_exists( 'WooCommerce' ) ) {
                    $products = new WP_Query(
                        array(
                            'post_type'      => 'product',
                            'posts_per_page' => 3,
                            'post_status'    => 'publish',
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                        )
                    );

                    if ( $products->have_posts() ) {
                        $has_products = true;

                        while ( $products->have_posts() ) {
                            $products->the_post();
                            global $product;
                            $terms     = get_the_terms( get_the_ID(), 'product_cat' );
                            $slugs     = $terms && ! is_wp_error( $terms ) ? wp_list_pluck( $terms, 'slug' ) : array();
                            $image_url = get_post_meta( get_the_ID(), '_cosmethique_image_url', true );
                            ?>
                            <article <?php wc_product_class( 'product-card', $product ); ?> data-product-categories="<?php echo esc_attr( implode( ' ', $slugs ) ); ?>" data-product-url="<?php the_permalink(); ?>">
                                <a class="product-image" href="<?php the_permalink(); ?>">
                                    <?php
                                    if ( $image_url ) {
                                        echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( get_the_title() ) . '" loading="lazy">';
                                    } elseif ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'cosmethique-card' );
                                    } else {
                                        echo '<img src="' . esc_url( theme_perso_demo_products()[0]['image'] ) . '" alt="' . esc_attr( get_the_title() ) . '" loading="lazy">';
                                    }
                                    ?>
                                    <span class="product-badge"><?php echo $product->is_on_sale() ? esc_html__( 'Offre', 'theme-perso' ) : esc_html__( 'Soin premium', 'theme-perso' ); ?></span>
                                </a>
                                <div class="product-body">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="product-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
                                    <a class="button button-primary add_to_cart_button ajax_add_to_cart" href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>" data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Ajouter %s au panier', 'theme-perso' ), get_the_title() ) ); ?>">Ajouter au panier</a>
                                </div>
                            </article>
                            <?php
                        }
                        wp_reset_postdata();
                    }
                }

                if ( ! $has_products ) :
                    foreach ( array_slice( theme_perso_demo_products(), 0, 3 ) as $demo_product ) :
                        ?>
                        <article class="product-card" data-product-categories="<?php echo esc_attr( $demo_product['category'] ); ?>" data-product-url="<?php echo esc_url( $shop_url ); ?>">
                            <div class="product-image">
                                <img src="<?php echo esc_url( $demo_product['image'] ); ?>" alt="<?php echo esc_attr( $demo_product['title'] ); ?>" loading="lazy">
                                <span class="product-badge"><?php echo esc_html( $demo_product['badge'] ); ?></span>
                            </div>
                            <div class="product-body">
                                <h3><?php echo esc_html( $demo_product['title'] ); ?></h3>
                                <div class="product-price"><?php echo esc_html( $demo_product['price'] ); ?></div>
                                <a class="button button-primary" href="<?php echo esc_url( $shop_url ); ?>">Ajouter au panier</a>
                            </div>
                        </article>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
            <div class="section-cta">
                <a class="button button-outline" href="<?php echo esc_url( $shop_url ); ?>">Voir tous les produits</a>
            </div>
        </div>
    </section>

    <section class="home-diagnostic-cta" aria-labelledby="home-diagnostic-title">
        <div class="container">
            <article class="home-diagnostic-panel">
                <div class="home-diagnostic-copy">
                    <p class="eyebrow">Diagnostic beauté</p>
                    <h2 id="home-diagnostic-title">Trouvez votre routine idéale.</h2>
                    <p>Répondez à quelques questions et découvrez en moins d'une minute les soins Cosm'Éthique parfaitement adaptés à votre peau.</p>
                    <ul class="home-diagnostic-benefits" aria-label="<?php esc_attr_e( 'Avantages du Diagnostic Beauté', 'theme-perso' ); ?>">
                        <li>Gratuit</li>
                        <li>100 % personnalisé</li>
                        <li>Résultat immédiat</li>
                        <li>Produits adaptés à votre profil</li>
                    </ul>
                    <a class="button button-primary" href="<?php echo esc_url( home_url( '/diagnostic/' ) ); ?>">Commencer le diagnostic</a>
                </div>
                <figure class="home-diagnostic-media">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/home/home-diagnostic-beaute.png' ); ?>" alt="<?php esc_attr_e( 'Diagnostic Beauté avec les soins Cosm’Éthique', 'theme-perso' ); ?>" loading="lazy">
                </figure>
            </article>
        </div>
    </section>

    <section class="home-expertise-section" aria-labelledby="home-expertise-title">
        <div class="container">
            <div class="home-expertise-heading">
                <p class="eyebrow">Notre savoir-faire</p>
                <h2 id="home-expertise-title">Notre savoir-faire</h2>
                <p>Chaque soin Cosm'Éthique est pensé pour offrir une expérience sensorielle tout en respectant la peau et la nature.</p>
            </div>
            <div class="home-expertise-grid">
                <article class="home-expertise-copy">
                    <p class="eyebrow">NOTRE EXPERTISE</p>
                    <h3>Des soins conçus avec précision.</h3>
                    <p>Chez Cosm'Éthique, chaque formule est développée autour d'actifs soigneusement sélectionnés.</p>
                    <p>Nous privilégions les ingrédients naturels, les textures élégantes et une fabrication responsable afin d'offrir une efficacité visible sans compromettre le respect de la peau.</p>
                    <div class="home-expertise-cards" aria-label="<?php esc_attr_e( 'Engagements de formulation Cosm’Éthique', 'theme-perso' ); ?>">
                        <article>
                            <span aria-hidden="true">🌿</span>
                            <strong>98 % d'ingrédients naturels</strong>
                        </article>
                        <article>
                            <span aria-hidden="true">🧪</span>
                            <strong>Actifs soigneusement sélectionnés</strong>
                        </article>
                        <article>
                            <span aria-hidden="true">♻</span>
                            <strong>Packaging recyclable</strong>
                        </article>
                        <article>
                            <span aria-hidden="true">🐇</span>
                            <strong>Cruelty Free</strong>
                        </article>
                    </div>
                </article>
                <figure class="home-expertise-media">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/home/home-savoir-faire-cosmethique.png' ); ?>" alt="<?php esc_attr_e( 'Produits Cosm’Éthique sur pierre naturelle avec fleurs séchées', 'theme-perso' ); ?>" loading="lazy">
                </figure>
            </div>
        </div>
    </section>

    <section class="section testimonials-section">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">Avis clients</p>
                <h2>Des routines qui changent tout</h2>
            </div>
            <div class="testimonial-grid">
                <figure>
                    <span class="stars" aria-hidden="true">★★★★★</span>
                    <blockquote>Le sérum à la rose a remplacé trois produits dans ma routine. Ma peau est plus souple, plus lumineuse.</blockquote>
                    <figcaption>Sophie D.</figcaption>
                </figure>
                <figure>
                    <span class="stars" aria-hidden="true">★★★★★</span>
                    <blockquote>Des textures sublimes, une livraison rapide et une vraie cohérence écologique. La marque fait très premium.</blockquote>
                    <figcaption>Marie L.</figcaption>
                </figure>
                <figure>
                    <span class="stars" aria-hidden="true">★★★★★</span>
                    <blockquote>L’huile sèche est devenue mon geste préféré après la douche. Elle sent bon, pénètre vite, et le flacon est magnifique.</blockquote>
                    <figcaption>Inès R.</figcaption>
                </figure>
            </div>
        </div>
    </section>

    <section class="section blog-section">
        <div class="container">
            <div class="section-heading blog-showcase-heading">
                <p class="eyebrow">Le blog</p>
                <h2>Conseils & inspirations</h2>
                <p>Des contenus experts pour prendre soin de vous naturellement et adopter une routine beauté saine et responsable.</p>
            </div>
            <div class="blog-showcase-grid">
                <?php theme_perso_render_blog_showcase_cards( 3 ); ?>
            </div>
            <div class="blog-showcase-cta">
                <a class="button button-primary" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
                    <?php esc_html_e( 'Voir tous les articles', 'theme-perso' ); ?>
                    <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
