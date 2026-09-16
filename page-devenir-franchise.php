<?php
/**
 * Template dédié de la page Devenir franchisé.
 *
 * @package Theme_Perso
 */

get_header();
?>

<main id="main-content" class="site-main page-main" tabindex="-1">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-layout' ); ?>>
            <header class="page-hero page-hero--compact">
                <div class="container">
                    <p class="eyebrow"><?php esc_html_e( 'COSM’ETHIQUE', 'theme-perso' ); ?></p>
                    <h1><?php the_title(); ?></h1>
                    <?php if ( has_excerpt() ) : ?>
                        <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                    <?php endif; ?>
                </div>
            </header>

            <div class="container page-content-wrap page-content-wrap--compact">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="page-featured-image"><?php the_post_thumbnail( 'cosmethique-wide' ); ?></div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php get_template_part( 'template-parts/page', 'devenir-franchise' ); ?>
                </div>
            </div>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
