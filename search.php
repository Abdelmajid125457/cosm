<?php
/**
 * Recherche.
 *
 * @package Theme_Perso
 */

get_header();
?>

<main id="primary" class="site-main">
    <header class="archive-hero">
        <div class="container">
            <p class="eyebrow"><?php esc_html_e( 'Recherche', 'theme-perso' ); ?></p>
            <h1><?php printf( esc_html__( 'Résultats pour “%s”', 'theme-perso' ), esc_html( get_search_query() ) ); ?></h1>
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
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'cosmethique-wide' );
                            } else {
                                echo '<img src="https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&w=900&q=80" alt="' . esc_attr( get_the_title() ) . '" loading="lazy">';
                            }
                            ?>
                        </a>
                        <div class="post-card-content">
                            <span class="post-meta"><?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?></span>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <article class="single-article">
                <h2><?php esc_html_e( 'Aucun résultat trouvé', 'theme-perso' ); ?></h2>
                <p><?php esc_html_e( 'Essayez avec un autre mot-clé ou parcourez la boutique.', 'theme-perso' ); ?></p>
                <?php get_search_form(); ?>
            </article>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
