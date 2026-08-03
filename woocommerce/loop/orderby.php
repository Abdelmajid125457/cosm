<?php
/**
 * Premium product ordering controls.
 *
 * @package Theme_Perso
 * @version 9.7.0
 */

defined( 'ABSPATH' ) || exit;

$id_suffix = wp_unique_id( 'cosmethique-orderby-' );
$orderby   = isset( $orderby ) ? (string) $orderby : 'popularity';

$theme_perso_orderby_options = array(
    'popularity' => array(
        'label' => esc_html__( 'Les plus populaires', 'theme-perso' ),
        'short' => esc_html__( 'Popularité', 'theme-perso' ),
        'icon'  => 'star',
    ),
    'date'       => array(
        'label' => esc_html__( 'Nouveautés', 'theme-perso' ),
        'short' => esc_html__( 'Nouveautés', 'theme-perso' ),
        'icon'  => 'sparkles',
    ),
    'price'      => array(
        'label' => esc_html__( 'Prix croissant', 'theme-perso' ),
        'short' => esc_html__( 'Prix croissant', 'theme-perso' ),
        'icon'  => 'coins-up',
    ),
    'price-desc' => array(
        'label' => esc_html__( 'Prix décroissant', 'theme-perso' ),
        'short' => esc_html__( 'Prix décroissant', 'theme-perso' ),
        'icon'  => 'coins-down',
    ),
    'rating'     => array(
        'label' => esc_html__( 'Les mieux notés', 'theme-perso' ),
        'short' => esc_html__( 'Mieux notés', 'theme-perso' ),
        'icon'  => 'heart',
    ),
);

if ( ! isset( $theme_perso_orderby_options[ $orderby ] ) ) {
    $orderby = 'popularity';
}

global $wp_query;

$product_count = (int) wc_get_loop_prop( 'total' );
if ( ! $product_count && isset( $wp_query->found_posts ) ) {
    $product_count = (int) $wp_query->found_posts;
}

$current_option = $theme_perso_orderby_options[ $orderby ];

if ( ! function_exists( 'theme_perso_sort_icon' ) ) {
    function theme_perso_sort_icon( $icon ) {
        $icons = array(
            'star'       => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 2.74 5.55 6.13.89-4.44 4.33 1.05 6.1L12 17l-5.48 2.88 1.05-6.1-4.44-4.33 6.13-.89L12 3Z"/></svg>',
            'sparkles'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 1.28 4.22L17.5 8.5l-4.22 1.28L12 14l-1.28-4.22L6.5 8.5l4.22-1.28L12 3Z"/><path d="m18 13 .82 2.18L21 16l-2.18.82L18 19l-.82-2.18L15 16l2.18-.82L18 13Z"/><path d="m6 14 .68 1.82L8.5 16.5l-1.82.68L6 19l-.68-1.82-1.82-.68 1.82-.68L6 14Z"/></svg>',
            'coins-up'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 10c0 1.66 3.13 3 7 3s7-1.34 7-3-3.13-3-7-3-7 1.34-7 3Z"/><path d="M5 10v4c0 1.66 3.13 3 7 3s7-1.34 7-3v-4"/><path d="M8 5 12 2l4 3"/><path d="M12 2v5"/></svg>',
            'coins-down' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 9c0 1.66 3.13 3 7 3s7-1.34 7-3-3.13-3-7-3-7 1.34-7 3Z"/><path d="M5 9v4c0 1.66 3.13 3 7 3s7-1.34 7-3V9"/><path d="M8 19h8"/><path d="m12 22 4-3-4-3"/><path d="M8 19h8"/></svg>',
            'heart'      => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.42 5.58a5.4 5.4 0 0 0-7.64 0L12 6.36l-.78-.78a5.4 5.4 0 0 0-7.64 7.64L12 21.64l8.42-8.42a5.4 5.4 0 0 0 0-7.64Z"/></svg>',
        );

        return isset( $icons[ $icon ] ) ? $icons[ $icon ] : $icons['star'];
    }
}
?>
<div class="cosmethique-shop-toolbar" role="region" aria-label="<?php esc_attr_e( 'Tri des produits', 'theme-perso' ); ?>">
    <p class="cosmethique-product-count" role="status" aria-live="polite">
        <?php
        printf(
            /* translators: %s: product count. */
            esc_html( _n( '%s produit', '%s produits', $product_count, 'theme-perso' ) ),
            esc_html( number_format_i18n( $product_count ) )
        );
        ?>
    </p>

    <form class="woocommerce-ordering cosmethique-ordering" method="get" data-cosmethique-sort>
        <input type="hidden" name="orderby" value="<?php echo esc_attr( $orderby ); ?>" data-cosmethique-sort-value>
        <input type="hidden" name="paged" value="1">
        <?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>

        <div class="cosmethique-sort">
            <button
                type="button"
                class="cosmethique-sort-toggle"
                aria-haspopup="listbox"
                aria-expanded="false"
                aria-controls="<?php echo esc_attr( $id_suffix ); ?>"
            >
                <span><?php esc_html_e( 'Trier par :', 'theme-perso' ); ?></span>
                <strong data-cosmethique-sort-label><?php echo esc_html( $current_option['short'] ); ?></strong>
                <svg class="cosmethique-sort-chevron" viewBox="0 0 24 24" aria-hidden="true"><path d="m7 10 5 5 5-5"/></svg>
            </button>

            <div class="cosmethique-sort-menu" id="<?php echo esc_attr( $id_suffix ); ?>" role="listbox" aria-label="<?php esc_attr_e( 'Choisir le tri des produits', 'theme-perso' ); ?>">
                <?php foreach ( $theme_perso_orderby_options as $option_id => $option ) : ?>
                    <?php $is_selected = $orderby === $option_id; ?>
                    <button
                        type="button"
                        class="cosmethique-sort-option<?php echo $is_selected ? ' is-selected' : ''; ?>"
                        role="option"
                        aria-selected="<?php echo $is_selected ? 'true' : 'false'; ?>"
                        data-orderby="<?php echo esc_attr( $option_id ); ?>"
                        data-label="<?php echo esc_attr( $option['short'] ); ?>"
                    >
                        <span class="cosmethique-sort-option-icon"><?php echo theme_perso_sort_icon( $option['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                        <span><?php echo esc_html( $option['label'] ); ?></span>
                        <span class="cosmethique-sort-check" aria-hidden="true">✓</span>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </form>
</div>
