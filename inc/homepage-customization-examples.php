<?php
/**
 * EXEMPLE DE PERSONNALISATION - COSM'ETHIQUE
 * Snippet à ajouter dans functions.php ou plugin personnalisé
 *
 * @package Theme_Perso
 */

// ===========================
// EXEMPLE 1: Modifier les textes
// ===========================
/*
add_filter( 'the_title', function( $title ) {
    if ( is_home() ) {
        return 'Accueil COSM\'ETHIQUE';
    }
    return $title;
});
*/

// ===========================
// EXEMPLE 2: Ajouter des scripts personnalisés
// ===========================
/*
add_action( 'wp_footer', function() {
    ?>
    <script>
    // Votre JavaScript personnalisé
    console.log('Scripts personnalisés chargés');
    </script>
    <?php
});
*/

// ===========================
// EXEMPLE 3: Modifier les couleurs via CSS
// ===========================
/*
add_action( 'wp_head', function() {
    ?>
    <style>
    :root {
        --color-sage: #YOUR_COLOR !important;
        --color-gold: #YOUR_COLOR !important;
    }
    </style>
    <?php
});
*/

// ===========================
// EXEMPLE 4: Ajouter un hook personnalisé
// ===========================
/*
add_action( 'cosm_homepage_loaded', function() {
    // Faire quelque chose après le chargement
    error_log( 'Page d\'accueil chargée' );
});
*/

// ===========================
// EXEMPLE 5: Filtrer les produits affichés
// ===========================
/*
add_filter( 'posts_where', function( $where ) {
    global $wpdb;
    
    if ( ! is_admin() && is_home() ) {
        // Ajouter une condition personnalisée
    }
    
    return $where;
});
*/

// ===========================
// EXEMPLE 6: Personnaliser le hero badge
// ===========================
/*
add_filter( 'template_include', function( $template ) {
    if ( basename( $template ) === 'home.php' ) {
        // Code pour modifier le hero badge
    }
    return $template;
});
*/

// ===========================
// EXEMPLE 7: Ajouter une section personnalisée
// ===========================
/*
add_action( 'wp_footer', function() {
    if ( is_home() ) {
        ?>
        <section class="custom-section">
            <div class="container">
                <h2>Ma Section Personnalisée</h2>
                <p>Contenu personnalisé</p>
            </div>
        </section>
        <?php
    }
});
*/

// ===========================
// EXEMPLE 8: Logger les erreurs
// ===========================
/*
if ( WP_DEBUG ) {
    error_log( 'COSM\'ETHIQUE Homepage Debug Mode Active' );
}
*/

// ===========================
// EXEMPLE 9: Custom API Endpoint
// ===========================
/*
add_action( 'rest_api_init', function() {
    register_rest_route( 'cosm/v1', '/products', array(
        'methods'  => 'GET',
        'callback' => function() {
            $products = new WP_Query( array(
                'post_type' => 'product',
                'posts_per_page' => 3,
                'orderby' => 'meta_value_num',
                'meta_key' => 'total_sales',
            ));
            
            return rest_ensure_response( $products->posts );
        }
    ));
});
*/

// ===========================
// EXEMPLE 10: Shortcode personnalisé
// ===========================
/*
add_shortcode( 'cosm_promo', function( $atts ) {
    $atts = shortcode_atts( array(
        'text' => 'Promotion spéciale',
        'color' => 'sage',
    ), $atts );
    
    return sprintf(
        '<div class="promo-box promo-%s">%s</div>',
        esc_attr( $atts['color'] ),
        esc_html( $atts['text'] )
    );
});

// Usage: [cosm_promo text="Ma promo" color="gold"]
*/

// ===========================
// EXEMPLE 11: Page de produit spéciale
// ===========================
/*
add_filter( 'template_include', function( $template ) {
    if ( is_product() ) {
        $custom_template = get_template_directory() . '/single-product-premium.php';
        if ( file_exists( $custom_template ) ) {
            return $custom_template;
        }
    }
    return $template;
});
*/

// ===========================
// EXEMPLE 12: AJAX pour le panier
// ===========================
/*
add_action( 'wp_ajax_add_to_cart', function() {
    $product_id = intval( $_POST['product_id'] );
    
    if ( WC()->cart->add_to_cart( $product_id ) ) {
        wp_send_json_success( array(
            'message' => 'Produit ajouté au panier',
        ));
    } else {
        wp_send_json_error( array(
            'message' => 'Erreur lors de l\'ajout',
        ));
    }
});

add_action( 'wp_ajax_nopriv_add_to_cart', function() {
    do_action( 'wp_ajax_add_to_cart' );
});
*/

// ===========================
// EXEMPLE 13: Meta Box personnalisée
// ===========================
/*
add_action( 'add_meta_boxes', function() {
    add_meta_box(
        'cosm_product_special',
        'Promotion Spéciale',
        function( $post ) {
            $special = get_post_meta( $post->ID, '_cosm_special', true );
            ?>
            <input type="checkbox" name="cosm_special" 
                   value="1" <?php checked( $special, 1 ); ?>>
            <label>Afficher comme Best Seller</label>
            <?php
        },
        'product',
        'side'
    );
});

add_action( 'save_post_product', function( $post_id ) {
    $value = isset( $_POST['cosm_special'] ) ? 1 : 0;
    update_post_meta( $post_id, '_cosm_special', $value );
});
*/

// ===========================
// EXEMPLE 14: Activer du contenu dynamique
// ===========================
/*
function get_cosm_featured_products() {
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 3,
        'orderby'        => 'meta_value_num',
        'meta_key'       => 'total_sales',
        'order'          => 'DESC',
    );
    
    $query = new WP_Query( $args );
    return $query->posts;
}

// Usage
$products = get_cosm_featured_products();
foreach ( $products as $product ) {
    echo $product->post_title;
}
*/

// ===========================
// EXEMPLE 15: Importer les styles extras
// ===========================
/*
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 
        'home-premium-extras',
        get_template_directory_uri() . '/css/home-premium-extras.css',
        array( 'theme-perso-home-premium' ),
        wp_get_theme()->get( 'Version' )
    );
});
*/

// ===========================
// EXEMPLE 16: Ajouter Google Analytics
// ===========================
/*
add_action( 'wp_head', function() {
    ?>
    <!-- Google Analytics: chargé uniquement après consentement analytique. -->
    <script type="text/plain" data-cookie-category="analytics" async src="https://www.googletagmanager.com/gtag/js?id=GA_ID"></script>
    <script type="text/plain" data-cookie-category="analytics">
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'GA_ID');
    </script>
    <?php
});
*/

// ===========================
// EXEMPLE 17: Newsletter avec Mailchimp
// ===========================
/*
add_action( 'wp_ajax_cosm_newsletter', function() {
    $email = sanitize_email( $_POST['email'] );
    
    if ( ! is_email( $email ) ) {
        wp_send_json_error( 'Email invalide' );
    }
    
    // Intégrer Mailchimp API
    // ...
    
    wp_send_json_success( 'Inscription confirmée!' );
});
*/

// ===========================
// EXEMPLE 18: Ajouter des animations personnalisées
// ===========================
/*
add_action( 'wp_footer', function() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Vos animations personnalisées
        console.log('Animations chargées');
    });
    </script>
    <?php
});
*/

// ===========================
// EXEMPLE 19: Image sizes personnalisés
// ===========================
/*
add_action( 'after_setup_theme', function() {
    add_image_size( 'hero-image', 1920, 1080, true );
    add_image_size( 'product-card', 400, 500, true );
    add_image_size( 'banner-promo', 1000, 600, true );
});
*/

// ===========================
// EXEMPLE 20: Redirect vers page d'accueil
// ===========================
/*
add_action( 'template_redirect', function() {
    if ( is_page( array( 'old-page-id' ) ) ) {
        wp_redirect( home_url( '/' ), 301 );
        exit;
    }
});
*/

?>
<!-- EXEMPLES DE PERSONNALISATION TERMINÉS -->
<!-- Décommenter les exemples que vous souhaitez utiliser -->
