<?php
/**
 * Template des pages statiques.
 *
 * @package Theme_Perso
 */

get_header();
?>

<main id="primary" class="site-main page-main">
    <?php
    while ( have_posts() ) :
        the_post();

        $slug              = get_post_field( 'post_name', get_the_ID() );
        $is_cart_page      = function_exists( 'is_cart' ) && is_cart();
        $is_checkout_page  = function_exists( 'is_checkout' ) && is_checkout() && ( ! function_exists( 'is_order_received_page' ) || ! is_order_received_page() ) && ( ! function_exists( 'is_checkout_pay_page' ) || ! is_checkout_pay_page() );
        $institutional_slugs = array( 'engagements', 'ingredients', 'qualite', 'boutiques', 'faq', 'avis-clients' );
        $is_institutional_page = in_array( $slug, $institutional_slugs, true );
        $has_custom_hero   = in_array( $slug, array( 'diagnostic', 'mon-compte' ), true ) || $is_cart_page || $is_checkout_page || $is_institutional_page;
        $is_compact_hero   = in_array( $slug, array( 'contact', 'devenir-franchise' ), true );
        $hero_classes      = 'page-hero' . ( $is_compact_hero ? ' page-hero--compact' : '' );
        if ( $is_institutional_page ) {
            $content_classes = 'page-content-wrap page-content-wrap--institutional';
        } elseif ( 'diagnostic' === $slug ) {
            $content_classes = 'page-content-wrap page-content-wrap--diagnostic';
        } elseif ( 'mon-compte' === $slug ) {
            $content_classes = 'page-content-wrap page-content-wrap--account';
        } elseif ( $is_cart_page ) {
            $content_classes = 'page-content-wrap page-content-wrap--cart';
        } elseif ( $is_checkout_page ) {
            $content_classes = 'page-content-wrap page-content-wrap--checkout';
        } else {
            $content_classes = 'container page-content-wrap' . ( $is_compact_hero ? ' page-content-wrap--compact' : '' );
        }
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-layout' ); ?>>
            <?php if ( ! $has_custom_hero ) : ?>
                <header class="<?php echo esc_attr( $hero_classes ); ?>">
                    <div class="container">
                        <p class="eyebrow">COSM’ETHIQUE</p>
                        <h1><?php the_title(); ?></h1>
                        <?php if ( has_excerpt() ) : ?>
                            <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                        <?php endif; ?>
                    </div>
                </header>
            <?php endif; ?>

            <div class="<?php echo esc_attr( $content_classes ); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="page-featured-image"><?php the_post_thumbnail( 'cosmethique-wide' ); ?></div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    if ( $is_institutional_page ) {
                        get_template_part( 'template-parts/page', 'institutionnel', array( 'slug' => $slug ) );
                    } elseif ( in_array( $slug, array( 'qui-sommes-nous', 'mon-compte' ), true ) ) {
                        get_template_part( 'template-parts/page', $slug );
                    } elseif ( trim( get_the_content() ) ) {
                        the_content();
                    } else {
                        get_template_part( 'template-parts/page', $slug );
                    }
                    ?>
                </div>
            </div>
        </article>
        <?php
        if ( ! $has_custom_hero && ( comments_open() || get_comments_number() ) ) {
            comments_template();
        }
    endwhile;
    ?>
</main>

<?php
get_footer();
