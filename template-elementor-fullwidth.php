<?php
/**
 * Template Name: Elementor pleine largeur
 * Template Post Type: page
 *
 * @package Theme_Perso
 */

get_header();
?>

<main id="primary" class="site-main elementor-fullwidth-template">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php
get_footer();
