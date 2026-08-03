<?php
/**
 * Template pour le formulaire de commentaires
 *
 * @package Theme_Perso
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php
    if ( have_comments() ) {
        ?>
        <h2 class="comments-title">
            <?php
            $comment_count = intval( get_comments_number() );
            if ( 1 === $comment_count ) {
                esc_html_e( 'Un commentaire', 'theme-perso' );
            } else {
                printf( esc_html__( '%d commentaires', 'theme-perso' ), $comment_count );
            }
            ?>
        </h2>

        <ul class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'callback' => 'theme_perso_comment',
                    'style'    => 'ul',
                )
            );
            ?>
        </ul>

        <?php
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
            ?>
            <nav id="comment-nav-below" class="comment-navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Navigation dans les commentaires', 'theme-perso' ); ?></h2>
                <div class="nav-previous">
                    <?php previous_comments_link( esc_html__( '← Commentaires précédents', 'theme-perso' ) ); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link( esc_html__( 'Commentaires suivants →', 'theme-perso' ) ); ?>
                </div>
            </nav>
            <?php
        }
    }
    ?>

    <?php
    if ( comments_open() ) {
        comment_form(
            array(
                'label_submit' => esc_html__( 'Envoyer le commentaire', 'theme-perso' ),
                'title_reply'  => esc_html__( 'Laisser un commentaire', 'theme-perso' ),
            )
        );
    } elseif ( is_singular() ) {
        ?>
        <p class="no-comments"><?php esc_html_e( 'Les commentaires sont fermés pour cet article.', 'theme-perso' ); ?></p>
        <?php
    }
    ?>

</div>
