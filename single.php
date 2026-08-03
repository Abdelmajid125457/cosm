<?php
/**
 * Article simple premium.
 *
 * @package Theme_Perso
 */

get_header();
?>

<main id="primary" class="site-main blog-article-main">
    <?php
    while ( have_posts() ) :
        the_post();

        $post_image = theme_perso_get_post_image_url( get_the_ID() );
        $read_time  = get_post_meta( get_the_ID(), '_cosmethique_read_time', true );
        $views      = get_post_meta( get_the_ID(), '_cosmethique_views', true );
        $author     = get_post_meta( get_the_ID(), '_cosmethique_author_label', true );
        $category   = get_the_category();
        $cat_name   = $category ? $category[0]->name : esc_html__( 'Conseils beauté', 'theme-perso' );

        if ( ! $read_time ) {
            $read_time = '6 min';
        }

        if ( ! $views ) {
            $views = '1 892 vues';
        }

        if ( ! $author ) {
            $author = get_the_author();
        }
        ?>
        <section class="blog-article-hero">
            <div class="container">
                <nav class="blog-breadcrumb" aria-label="<?php esc_attr_e( 'Fil d’Ariane', 'theme-perso' ); ?>">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Accueil', 'theme-perso' ); ?></a>
                    <span>›</span>
                    <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'theme-perso' ); ?></a>
                    <span>›</span>
                    <span><?php echo esc_html( $cat_name ); ?></span>
                </nav>
                <span class="blog-pill"><?php echo esc_html( $cat_name ); ?></span>
                <h1><?php the_title(); ?></h1>
                <div class="blog-article-meta">
                    <span><?php echo esc_html( $author ); ?></span>
                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'd F Y' ) ); ?></time>
                    <span><?php echo esc_html( $read_time ); ?></span>
                    <span><?php echo esc_html( $views ); ?></span>
                </div>
            </div>
        </section>

        <div class="container blog-article-layout">
            <aside class="blog-share-rail" aria-label="<?php esc_attr_e( 'Partager', 'theme-perso' ); ?>">
                <span><?php esc_html_e( 'Partager', 'theme-perso' ); ?></span>
                <?php foreach ( theme_perso_blog_share_links( get_permalink(), get_the_title(), $post_image ) as $network => $share ) : ?>
                    <a class="blog-share-link blog-share-link--<?php echo esc_attr( $network ); ?>" href="<?php echo esc_url( $share['url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $share['aria'] ); ?>" title="<?php echo esc_attr( $share['label'] ); ?>">
                        <?php echo theme_perso_social_icon( $network ); ?>
                        <span class="screen-reader-text"><?php echo esc_html( $share['label'] ); ?></span>
                    </a>
                <?php endforeach; ?>
            </aside>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-article-content' ); ?>>
                <?php if ( $post_image ) : ?>
                    <figure class="blog-article-image">
                        <img src="<?php echo esc_url( $post_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="eager">
                    </figure>
                <?php elseif ( has_post_thumbnail() ) : ?>
                    <figure class="blog-article-image"><?php the_post_thumbnail( 'cosmethique-wide' ); ?></figure>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>

            <aside class="blog-article-sidebar">
                <section class="blog-sidebar-card toc-card">
                    <h2><?php esc_html_e( 'Sommaire', 'theme-perso' ); ?></h2>
                    <ol>
                        <li><?php esc_html_e( 'Comprendre le besoin de peau', 'theme-perso' ); ?></li>
                        <li><?php esc_html_e( 'Choisir les bons actifs', 'theme-perso' ); ?></li>
                        <li><?php esc_html_e( 'Construire une routine douce', 'theme-perso' ); ?></li>
                        <li><?php esc_html_e( 'Conseils d’application', 'theme-perso' ); ?></li>
                    </ol>
                </section>
                <section class="blog-sidebar-card ingredient-card">
                    <h2><?php esc_html_e( 'Ingrédients vedettes', 'theme-perso' ); ?></h2>
                    <div>
                        <span>Rose</span>
                        <span>Karité</span>
                        <span>Lavande</span>
                        <span>Camomille</span>
                        <span>Vitamine C</span>
                        <span>Argan</span>
                    </div>
                </section>
                <section class="blog-sidebar-card">
                    <h2><?php esc_html_e( 'Articles populaires', 'theme-perso' ); ?></h2>
                    <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Masque cheveux réparateur', 'theme-perso' ); ?><span>5 min</span></a>
                    <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Les secrets de la lavande fine', 'theme-perso' ); ?><span>4 min</span></a>
                </section>
                <section class="blog-sidebar-card">
                    <h2><?php esc_html_e( 'Produits associés', 'theme-perso' ); ?></h2>
                    <a href="<?php echo esc_url( home_url( '/boutique/' ) ); ?>"><?php esc_html_e( 'Sérum Éclat à la Rose', 'theme-perso' ); ?><span>Visage</span></a>
                    <a href="<?php echo esc_url( home_url( '/boutique/' ) ); ?>"><?php esc_html_e( 'Crème Hydratante Sauge & Camomille', 'theme-perso' ); ?><span>Peau sensible</span></a>
                </section>
                <section class="blog-sidebar-card blog-newsletter-card">
                    <h2><?php esc_html_e( 'Recevez nos conseils beauté chaque semaine', 'theme-perso' ); ?></h2>
                    <form class="newsletter-form" action="#" method="post">
                        <input type="email" name="email" placeholder="<?php esc_attr_e( 'Votre adresse email', 'theme-perso' ); ?>" required>
                        <?php theme_perso_security_fields( 'article_newsletter' ); ?>
                        <button class="button button-primary" type="submit"><?php esc_html_e( 'S’inscrire', 'theme-perso' ); ?></button>
                    </form>
                </section>
            </aside>
        </div>

        <section class="blog-trust-section">
            <div class="container blog-trust-grid">
                <div><span>◎</span><strong><?php esc_html_e( 'Conseils rédigés avec une experte', 'theme-perso' ); ?></strong></div>
                <div><span>✦</span><strong><?php esc_html_e( 'Ingrédients naturels', 'theme-perso' ); ?></strong></div>
                <div><span>⌁</span><strong><?php esc_html_e( 'Sans compromis', 'theme-perso' ); ?></strong></div>
                <div><span>♡</span><strong><?php esc_html_e( 'Engagement éthique', 'theme-perso' ); ?></strong></div>
            </div>
        </section>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
