<?php
/**
 * Template pour la page 404
 *
 * @package Theme_Perso
 */

get_header();
?>

<main class="container">
    <article class="post error404 not-found">
        <header class="post-header">
            <h1 class="post-title"><?php esc_html_e( 'Erreur 404 - Page non trouvée', 'theme-perso' ); ?></h1>
        </header>

        <div class="post-content">
            <p><?php esc_html_e( 'Désolé, la page que vous cherchez n\'existe pas ou a été supprimée.', 'theme-perso' ); ?></p>

            <div class="search-form">
                <?php get_search_form(); ?>
            </div>

            <h2><?php esc_html_e( 'Articles récents', 'theme-perso' ); ?></h2>
            <?php
            $recent_posts = wp_get_recent_posts(
                array(
                    'numberposts' => 5,
                    'post_status' => 'publish',
                )
            );

            if ( ! empty( $recent_posts ) ) {
                echo '<ul>';
                foreach ( $recent_posts as $post ) {
                    echo '<li><a href="' . esc_url( get_permalink( $post['ID'] ) ) . '">' . esc_html( $post['post_title'] ) . '</a></li>';
                }
                echo '</ul>';
            } else {
                echo '<p>' . esc_html__( 'Aucun article trouvé.', 'theme-perso' ) . '</p>';
            }
            ?>
        </div>
    </article>
</main>

<?php
get_footer();
