<?php
/**
 * Archives.
 *
 * @package Theme_Perso
 */

get_header();
?>

<main id="primary" class="site-main">
    <header class="archive-hero">
        <div class="container">
            <p class="eyebrow">Archives</p>
            <h1><?php the_archive_title(); ?></h1>
            <?php the_archive_description( '<p>', '</p>' ); ?>
        </div>
    </header>

    <div class="container archive-wrap">
        <?php if ( have_posts() ) : ?>
            <div class="archive-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
                        <a class="post-thumbnail" href="<?php the_permalink(); ?>">
                            <?php
                            $post_image = theme_perso_get_post_image_url( get_the_ID() );
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'cosmethique-wide' );
                            } elseif ( $post_image ) {
                                echo '<img src="' . esc_url( $post_image ) . '" alt="' . esc_attr( get_the_title() ) . '" loading="lazy">';
                            } else {
                                echo '<img src="https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&w=900&q=80" alt="' . esc_attr( get_the_title() ) . '" loading="lazy">';
                            }
                            ?>
                        </a>
                        <div class="post-card-content">
                            <span class="post-meta"><?php echo esc_html( get_the_date() ); ?></span>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
                            <a class="blog-link" href="<?php the_permalink(); ?>">Lire plus</a>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <article class="single-article">
                <h2><?php esc_html_e( 'Aucun contenu trouvé', 'theme-perso' ); ?></h2>
                <p><?php esc_html_e( 'Essayez une autre recherche ou revenez bientôt.', 'theme-perso' ); ?></p>
            </article>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
