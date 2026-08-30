<?php
/**
 * Fonctions du thème COSM'ETHIQUE.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function theme_perso_setup() {
    load_theme_textdomain( 'theme-perso', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'custom-logo', array( 'height' => 90, 'width' => 280, 'flex-width' => true, 'flex-height' => true ) );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'elementor' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    add_image_size( 'cosmethique-card', 720, 860, true );
    add_image_size( 'cosmethique-wide', 1600, 900, true );

    register_nav_menus(
        array(
            'primary' => esc_html__( 'Menu principal', 'theme-perso' ),
            'footer'  => esc_html__( 'Menu pied de page', 'theme-perso' ),
        )
    );
}
add_action( 'after_setup_theme', 'theme_perso_setup' );

function theme_perso_disable_frontend_admin_bar_offset() {
    if ( is_admin() ) {
        return;
    }

    show_admin_bar( false );
    remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'init', 'theme_perso_disable_frontend_admin_bar_offset' );

function theme_perso_remove_frontend_top_spacing() {
    if ( is_admin() ) {
        return;
    }
    ?>
    <style id="theme-perso-remove-top-spacing">
        html,
        body,
        body.admin-bar {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        :root {
            --wp-admin--admin-bar--height: 0px !important;
        }

        #wpadminbar {
            display: none !important;
        }

        #page,
        .site,
        .site-header,
        .promo-bar,
        .header-shell {
            margin-top: 0 !important;
            padding-top: 0 !important;
            top: 0 !important;
            transform: none !important;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'theme_perso_remove_frontend_top_spacing', 999 );

function theme_perso_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'theme_perso_content_width', 1280 );
}
add_action( 'after_setup_theme', 'theme_perso_content_width', 0 );

function theme_perso_cookie_policy_url() {
    $page = get_page_by_path( 'politique-de-cookies' );

    return $page ? get_permalink( $page ) : home_url( '/politique-de-cookies/' );
}

function theme_perso_cookie_consent() {
    if ( empty( $_COOKIE['cosmethique_cookie_consent'] ) ) {
        return array();
    }

    $raw     = rawurldecode( wp_unslash( $_COOKIE['cosmethique_cookie_consent'] ) );
    $consent = json_decode( $raw, true );

    return is_array( $consent ) ? $consent : array();
}

function theme_perso_cookie_category_allowed( $category ) {
    if ( 'necessary' === $category ) {
        return true;
    }

    $consent = theme_perso_cookie_consent();

    return ! empty( $consent[ $category ] );
}

function theme_perso_google_analytics_measurement_id() {
    $measurement_id = defined( 'COSMETHIQUE_GA_MEASUREMENT_ID' ) ? COSMETHIQUE_GA_MEASUREMENT_ID : get_theme_mod( 'cosmethique_ga_measurement_id', 'G-KDCY4CP560' );
    $measurement_id = strtoupper( trim( (string) $measurement_id ) );

    if ( ! $measurement_id || ! preg_match( '/^[A-Z]+-[A-Z0-9_-]+$/', $measurement_id ) ) {
        return '';
    }

    return apply_filters( 'theme_perso_google_analytics_measurement_id', $measurement_id );
}

function theme_perso_google_tag_manager_container_id() {
    $container_id = defined( 'COSMETHIQUE_GTM_CONTAINER_ID' ) ? COSMETHIQUE_GTM_CONTAINER_ID : get_theme_mod( 'cosmethique_gtm_container_id', 'GTM-NDGB4SLC' );
    $container_id = strtoupper( trim( (string) $container_id ) );

    if ( ! $container_id || ! preg_match( '/^GTM-[A-Z0-9]+$/', $container_id ) ) {
        return '';
    }

    return apply_filters( 'theme_perso_google_tag_manager_container_id', $container_id );
}

function theme_perso_sanitize_google_analytics_measurement_id( $value ) {
    $value = strtoupper( trim( sanitize_text_field( (string) $value ) ) );

    if ( '' === $value ) {
        return '';
    }

    return preg_match( '/^[A-Z]+-[A-Z0-9_-]+$/', $value ) ? $value : '';
}

function theme_perso_sanitize_google_tag_manager_container_id( $value ) {
    $value = strtoupper( trim( sanitize_text_field( (string) $value ) ) );

    if ( '' === $value ) {
        return '';
    }

    return preg_match( '/^GTM-[A-Z0-9]+$/', $value ) ? $value : '';
}

function theme_perso_tracking_product_category_name( $product ) {
    if ( ! $product instanceof WC_Product ) {
        return '';
    }

    $terms = get_the_terms( $product->get_id(), 'product_cat' );

    if ( empty( $terms ) || is_wp_error( $terms ) ) {
        return '';
    }

    $term = reset( $terms );

    return $term && ! empty( $term->name ) ? $term->name : '';
}

function theme_perso_tracking_item_data( $product, $quantity = 1 ) {
    if ( ! $product instanceof WC_Product ) {
        return array();
    }

    return array(
        'item_id'   => (string) $product->get_id(),
        'item_name' => $product->get_name(),
        'category'  => theme_perso_tracking_product_category_name( $product ),
        'price'     => (float) wc_get_price_to_display( $product ),
        'quantity'  => max( 1, (int) $quantity ),
    );
}

function theme_perso_tracking_item_attributes( $product, $quantity = 1 ) {
    $item = theme_perso_tracking_item_data( $product, $quantity );

    if ( empty( $item ) ) {
        return '';
    }

    return sprintf(
        ' data-tracking-item-id="%1$s" data-tracking-item-name="%2$s" data-tracking-item-category="%3$s" data-tracking-item-price="%4$s" data-tracking-item-quantity="%5$s"',
        esc_attr( $item['item_id'] ),
        esc_attr( $item['item_name'] ),
        esc_attr( $item['category'] ),
        esc_attr( $item['price'] ),
        esc_attr( $item['quantity'] )
    );
}

function theme_perso_tracking_cart_items_data() {
    if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
        return array();
    }

    $items = array();

    foreach ( WC()->cart->get_cart() as $cart_item ) {
        $product = isset( $cart_item['data'] ) ? $cart_item['data'] : null;

        if ( $product instanceof WC_Product ) {
            $items[] = theme_perso_tracking_item_data( $product, isset( $cart_item['quantity'] ) ? $cart_item['quantity'] : 1 );
        }
    }

    return $items;
}

function theme_perso_tracking_order_data() {
    if ( ! function_exists( 'is_wc_endpoint_url' ) || ! is_wc_endpoint_url( 'order-received' ) ) {
        return array();
    }

    $order_id = absint( get_query_var( 'order-received' ) );

    if ( ! $order_id ) {
        return array();
    }

    $order = wc_get_order( $order_id );

    if ( ! $order instanceof WC_Order ) {
        return array();
    }

    $order_key = isset( $_GET['key'] ) ? wc_clean( wp_unslash( $_GET['key'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

    if ( $order_key && $order->get_order_key() !== $order_key ) {
        return array();
    }

    $items = array();

    foreach ( $order->get_items() as $item ) {
        $product = $item->get_product();

        if ( $product instanceof WC_Product ) {
            $items[] = theme_perso_tracking_item_data( $product, $item->get_quantity() );
        }
    }

    return array(
        'transaction_id' => (string) $order->get_order_number(),
        'value'          => (float) $order->get_total(),
        'currency'       => $order->get_currency(),
        'items'          => $items,
    );
}

function theme_perso_tracking_page_context() {
    return array(
        'page_title'    => wp_get_document_title(),
        'page_location' => home_url( add_query_arg( null, null ) ),
        'page_path'     => isset( $_SERVER['REQUEST_URI'] ) ? strtok( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ), '?' ) : '/',
        'language'      => function_exists( 'determine_locale' ) ? determine_locale() : get_locale(),
        'user_type'     => is_user_logged_in() ? 'logged_in' : 'guest',
        'timestamp'     => current_time( 'c' ),
    );
}

function theme_perso_tracking_script_data() {
    $data = array(
        'context'     => theme_perso_tracking_page_context(),
        'currency'    => function_exists( 'get_woocommerce_currency' ) ? get_woocommerce_currency() : 'EUR',
        'product'     => array(),
        'cart'        => array(),
        'purchase'    => array(),
        'sessionKey'  => 'cosmethique_session_started',
        'visitKey'    => 'cosmethique_first_visit',
    );

    if ( function_exists( 'is_product' ) && is_product() ) {
        $product = wc_get_product( get_the_ID() );

        if ( $product instanceof WC_Product ) {
            $data['product'] = theme_perso_tracking_item_data( $product );
        }
    }

    if ( function_exists( 'is_cart' ) && ( is_cart() || is_checkout() ) ) {
        $data['cart'] = array(
            'value'    => function_exists( 'WC' ) && WC()->cart ? (float) WC()->cart->get_total( 'edit' ) : 0,
            'currency' => $data['currency'],
            'items'    => theme_perso_tracking_cart_items_data(),
        );
    }

    $data['purchase'] = theme_perso_tracking_order_data();

    return $data;
}

function theme_perso_tracking_loop_add_to_cart_args( $args, $product ) {
    if ( $product instanceof WC_Product ) {
        $args['attributes']['data-tracking-item-id']       = (string) $product->get_id();
        $args['attributes']['data-tracking-item-name']     = $product->get_name();
        $args['attributes']['data-tracking-item-category'] = theme_perso_tracking_product_category_name( $product );
        $args['attributes']['data-tracking-item-price']    = (string) (float) wc_get_price_to_display( $product );
        $args['attributes']['data-tracking-item-quantity'] = '1';
    }

    return $args;
}
add_filter( 'woocommerce_loop_add_to_cart_args', 'theme_perso_tracking_loop_add_to_cart_args', 20, 2 );

function theme_perso_customize_google_analytics( $wp_customize ) {
    $wp_customize->add_section(
        'cosmethique_analytics',
        array(
            'title'       => __( 'COSM’ETHIQUE - Analytics', 'theme-perso' ),
            'description' => __( 'Renseignez le conteneur GTM et l’identifiant GA4. Les tags restent bloqués tant que les cookies analytiques ne sont pas acceptés.', 'theme-perso' ),
            'priority'    => 160,
        )
    );

    $wp_customize->add_setting(
        'cosmethique_gtm_container_id',
        array(
            'default'           => 'GTM-NDGB4SLC',
            'sanitize_callback' => 'theme_perso_sanitize_google_tag_manager_container_id',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        'cosmethique_gtm_container_id',
        array(
            'label'       => __( 'Identifiant Google Tag Manager', 'theme-perso' ),
            'description' => __( 'Exemple : GTM-XXXXXXX', 'theme-perso' ),
            'section'     => 'cosmethique_analytics',
            'type'        => 'text',
        )
    );

    $wp_customize->add_setting(
        'cosmethique_ga_measurement_id',
        array(
            'default'           => 'G-KDCY4CP560',
            'sanitize_callback' => 'theme_perso_sanitize_google_analytics_measurement_id',
            'transport'         => 'refresh',
        )
    );

    $wp_customize->add_control(
        'cosmethique_ga_measurement_id',
        array(
            'label'       => __( 'Identifiant Google Analytics GA4', 'theme-perso' ),
            'description' => __( 'Exemple : G-XXXXXXXXXX', 'theme-perso' ),
            'section'     => 'cosmethique_analytics',
            'type'        => 'text',
        )
    );
}
add_action( 'customize_register', 'theme_perso_customize_google_analytics' );

function theme_perso_sanitize_oauth_text( $value ) {
    return trim( sanitize_text_field( (string) $value ) );
}

function theme_perso_sanitize_oauth_private_key( $value ) {
    return trim( (string) wp_kses_post( $value ) );
}

function theme_perso_customize_social_login( $wp_customize ) {
    $wp_customize->add_section(
        'cosmethique_social_login',
        array(
            'title'       => __( 'COSM’ETHIQUE - Connexion sociale', 'theme-perso' ),
            'description' => __( 'Configurez les identifiants OAuth Google et Apple. Les URI de redirection sont affichées sur la page Mon Compte.', 'theme-perso' ),
            'priority'    => 162,
        )
    );

    $settings = array(
        'cosmethique_google_client_id'     => array( __( 'Google Client ID', 'theme-perso' ), 'text', 'theme_perso_sanitize_oauth_text' ),
        'cosmethique_google_client_secret' => array( __( 'Google Client Secret', 'theme-perso' ), 'password', 'theme_perso_sanitize_oauth_text' ),
        'cosmethique_apple_service_id'     => array( __( 'Apple Service ID', 'theme-perso' ), 'text', 'theme_perso_sanitize_oauth_text' ),
        'cosmethique_apple_team_id'        => array( __( 'Apple Team ID', 'theme-perso' ), 'text', 'theme_perso_sanitize_oauth_text' ),
        'cosmethique_apple_key_id'         => array( __( 'Apple Key ID', 'theme-perso' ), 'text', 'theme_perso_sanitize_oauth_text' ),
        'cosmethique_apple_private_key'    => array( __( 'Apple Private Key', 'theme-perso' ), 'textarea', 'theme_perso_sanitize_oauth_private_key' ),
    );

    foreach ( $settings as $setting_id => $setting ) {
        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => '',
                'sanitize_callback' => $setting[2],
                'transport'         => 'refresh',
            )
        );

        $wp_customize->add_control(
            $setting_id,
            array(
                'label'   => $setting[0],
                'section' => 'cosmethique_social_login',
                'type'    => $setting[1],
            )
        );
    }
}
add_action( 'customize_register', 'theme_perso_customize_social_login' );

function theme_perso_scripts() {
    $version           = wp_get_theme()->get( 'Version' );
    $stylesheet_path   = get_stylesheet_directory() . '/style.css';
    $mobile_style_path = get_template_directory() . '/css/mobile-responsive.css';
    $main_script_path  = get_template_directory() . '/js/main.js';
    $style_version     = file_exists( $stylesheet_path ) ? (string) filemtime( $stylesheet_path ) : $version;
    $mobile_version    = file_exists( $mobile_style_path ) ? (string) filemtime( $mobile_style_path ) : $version;
    $script_version    = file_exists( $main_script_path ) ? (string) filemtime( $main_script_path ) : $version;

    wp_enqueue_style( 'theme-perso-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@400;500;600;700;800&display=swap', array(), null );
    if ( is_page( 'devenir-franchise' ) ) {
        wp_enqueue_style( 'leaflet', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css', array(), '1.9.4' );
        wp_enqueue_script( 'leaflet', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', array(), '1.9.4', true );
    }

    wp_enqueue_style( 'theme-perso-style', get_stylesheet_uri(), array( 'theme-perso-fonts' ), $style_version );
    wp_enqueue_style( 'theme-perso-mobile-responsive', get_template_directory_uri() . '/css/mobile-responsive.css', array( 'theme-perso-style' ), $mobile_version );
    wp_enqueue_script( 'theme-perso-script', get_template_directory_uri() . '/js/main.js', is_page( 'devenir-franchise' ) ? array( 'leaflet' ) : array(), $script_version, true );

    if ( function_exists( 'theme_perso_multilingual_script_data' ) ) {
        wp_localize_script( 'theme-perso-script', 'cosmethiqueI18n', theme_perso_multilingual_script_data() );
    }

    wp_localize_script(
        'theme-perso-script',
        'cosmethiqueCookieSettings',
        array(
            'policyUrl' => theme_perso_cookie_policy_url(),
            'version'   => '2026-07-rgpd',
        )
    );

    wp_localize_script( 'theme-perso-script', 'cosmethiqueSearch', theme_perso_smart_search_script_data() );
    wp_localize_script( 'theme-perso-script', 'cosmethiqueTracking', theme_perso_tracking_script_data() );
    wp_localize_script(
        'theme-perso-script',
        'cosmethiqueAccount',
        array(
            'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'cosmethique_account_auth' ),
            'redirect' => function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/mon-compte/' ),
            'labels'   => array(
                'networkError' => __( 'Une erreur est survenue. Merci de réessayer.', 'theme-perso' ),
                'loginSuccess' => __( 'Connexion réussie. Ouverture de votre espace beauté…', 'theme-perso' ),
                'registerSuccess' => __( 'Votre compte est créé. Ouverture de votre espace beauté…', 'theme-perso' ),
            ),
        )
    );

    if ( is_front_page() ) {
        wp_enqueue_style( 'theme-perso-aos', 'https://unpkg.com/aos@next/dist/aos.css', array(), null );
        wp_enqueue_script( 'aos-script', 'https://unpkg.com/aos@next/dist/aos.js', array(), null, true );
        wp_enqueue_style( 'theme-perso-home-premium', get_template_directory_uri() . '/css/home-premium.css', array( 'theme-perso-style' ), $version );
        wp_enqueue_script( 'theme-perso-home-animations', get_template_directory_uri() . '/js/home-animations.js', array( 'aos-script' ), $version, true );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( theme_perso_recaptcha_is_configured() && ! is_admin() ) {
        $site_key = theme_perso_recaptcha_site_key();

        wp_enqueue_script( 'google-recaptcha-v3', 'https://www.google.com/recaptcha/api.js?render=' . rawurlencode( $site_key ), array(), null, true );
        wp_add_inline_script(
            'google-recaptcha-v3',
            "document.addEventListener('DOMContentLoaded',function(){var siteKey='" . esc_js( $site_key ) . "';function refreshTokens(){if(!window.grecaptcha){return;}grecaptcha.ready(function(){document.querySelectorAll('[data-cosmethique-recaptcha-action]').forEach(function(field){var action=field.getAttribute('data-cosmethique-recaptcha-action')||'cosmethique_form';grecaptcha.execute(siteKey,{action:action}).then(function(token){field.value=token;});});});}refreshTokens();window.setInterval(refreshTokens,90000);if(window.jQuery){jQuery(document.body).on('updated_checkout',refreshTokens);}});"
        );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_perso_scripts' );

function theme_perso_block_nonconsented_tracking_scripts() {
    if ( is_admin() ) {
        return;
    }

    $blocked_handles = array(
        'analytics'  => array(
            'google-analytics',
            'googleanalytics',
            'ga',
            'ga4',
            'gtag',
            'gtag-js',
            'monsterinsights',
            'exactmetrics',
            'woocommerce-google-analytics-integration',
        ),
        'marketing' => array(
            'google-tag-manager',
            'gtm',
            'gtm4wp',
            'meta-pixel',
            'fb-pixel',
            'pixel-caffeine',
        ),
    );

    foreach ( $blocked_handles as $category => $handles ) {
        if ( theme_perso_cookie_category_allowed( $category ) ) {
            continue;
        }

        foreach ( $handles as $handle ) {
            wp_dequeue_script( $handle );
            wp_deregister_script( $handle );
        }

        $scripts = wp_scripts();
        if ( ! $scripts || empty( $scripts->registered ) ) {
            continue;
        }

        foreach ( array_keys( $scripts->registered ) as $registered_handle ) {
            $normalized_handle = strtolower( (string) $registered_handle );

            foreach ( $handles as $blocked_handle ) {
                if ( strlen( $blocked_handle ) < 4 ) {
                    continue;
                }

                if ( false !== strpos( $normalized_handle, strtolower( $blocked_handle ) ) ) {
                    wp_dequeue_script( $registered_handle );
                    wp_deregister_script( $registered_handle );
                    break;
                }
            }
        }
    }
}
add_action( 'wp_print_scripts', 'theme_perso_block_nonconsented_tracking_scripts', 1 );
add_action( 'wp_print_footer_scripts', 'theme_perso_block_nonconsented_tracking_scripts', 1 );

function theme_perso_render_google_tag_manager_head() {
    if ( is_admin() ) {
        return;
    }

    $container_id   = theme_perso_google_tag_manager_container_id();
    $measurement_id = theme_perso_google_analytics_measurement_id();

    if ( ! $container_id ) {
        return;
    }
    ?>
    <script>
        window.cosmethiqueTrackingSettings = {
            gtmContainerId: '<?php echo esc_js( $container_id ); ?>',
            ga4MeasurementId: '<?php echo esc_js( $measurement_id ); ?>'
        };
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('consent', 'default', {
            ad_storage: 'denied',
            ad_user_data: 'denied',
            ad_personalization: 'denied',
            analytics_storage: 'denied',
            functionality_storage: 'granted',
            security_storage: 'granted'
        });
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            cosmethique_ga4_measurement_id: '<?php echo esc_js( $measurement_id ); ?>'
        });
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php echo esc_js( $container_id ); ?>');
    </script>
    <?php
}
add_action( 'wp_head', 'theme_perso_render_google_tag_manager_head', 5 );

function theme_perso_render_google_tag_manager_body() {
    if ( is_admin() ) {
        return;
    }

    $container_id = theme_perso_google_tag_manager_container_id();

    if ( ! $container_id ) {
        return;
    }
    ?>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( $container_id ); ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php
}
add_action( 'wp_body_open', 'theme_perso_render_google_tag_manager_body', 1 );

function theme_perso_redirect_notre_histoire_to_about() {
    if ( ! function_exists( 'is_page' ) || ! is_page( 'notre-histoire' ) ) {
        return;
    }

    $about_page = get_page_by_path( 'qui-sommes-nous' );
    $target     = $about_page ? get_permalink( $about_page ) : home_url( '/qui-sommes-nous/' );

    wp_safe_redirect( $target, 301 );
    exit;
}
add_action( 'template_redirect', 'theme_perso_redirect_notre_histoire_to_about', 1 );

function theme_perso_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = 'https://fonts.googleapis.com';
        $urls[] = 'https://fonts.gstatic.com';

        if ( theme_perso_google_analytics_measurement_id() ) {
            $urls[] = 'https://www.googletagmanager.com';
        }
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'theme_perso_resource_hints', 10, 2 );

function theme_perso_language_options() {
    return array(
        'fr' => array(
            'label'  => 'Français',
            'short'  => 'FR',
            'locale' => 'fr_FR',
            'dir'    => 'ltr',
        ),
        'en' => array(
            'label'  => 'English',
            'short'  => 'EN',
            'locale' => 'en_US',
            'dir'    => 'ltr',
        ),
        'es' => array(
            'label'  => 'Español',
            'short'  => 'ES',
            'locale' => 'es_ES',
            'dir'    => 'ltr',
        ),
        'ar' => array(
            'label'  => 'العربية',
            'short'  => 'AR',
            'locale' => 'ar',
            'dir'    => 'rtl',
        ),
    );
}

function theme_perso_normalize_language_code( $code ) {
    $code      = strtolower( sanitize_key( (string) $code ) );
    $code      = substr( $code, 0, 2 );
    $languages = theme_perso_language_options();

    return isset( $languages[ $code ] ) ? $code : 'fr';
}

function theme_perso_has_multilingual_plugin() {
    return function_exists( 'pll_current_language' ) || has_filter( 'wpml_active_languages' ) || class_exists( 'TRP_Translate_Press' );
}

function theme_perso_preferred_language_code() {
    if ( isset( $_GET['lang'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        return theme_perso_normalize_language_code( wp_unslash( $_GET['lang'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    }

    if ( isset( $_COOKIE['cosmethique_lang'] ) ) {
        return theme_perso_normalize_language_code( wp_unslash( $_COOKIE['cosmethique_lang'] ) );
    }

    return 'fr';
}

function theme_perso_current_language() {
    if ( function_exists( 'pll_current_language' ) ) {
        $pll_language = pll_current_language( 'slug' );

        if ( $pll_language ) {
            return theme_perso_normalize_language_code( $pll_language );
        }
    }

    if ( has_filter( 'wpml_current_language' ) ) {
        $wpml_language = apply_filters( 'wpml_current_language', null );

        if ( $wpml_language ) {
            return theme_perso_normalize_language_code( $wpml_language );
        }
    }

    return theme_perso_preferred_language_code();
}

function theme_perso_store_language_preference() {
    if ( ! isset( $_GET['lang'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        return;
    }

    $language    = theme_perso_normalize_language_code( wp_unslash( $_GET['lang'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    $cookie_path = defined( 'COOKIEPATH' ) && COOKIEPATH ? COOKIEPATH : '/';
    $domain      = defined( 'COOKIE_DOMAIN' ) ? COOKIE_DOMAIN : '';

    setcookie( 'cosmethique_lang', $language, time() + YEAR_IN_SECONDS, $cookie_path, $domain, is_ssl(), false );
    $_COOKIE['cosmethique_lang'] = $language;
}
add_action( 'init', 'theme_perso_store_language_preference', 1 );

function theme_perso_filter_locale( $locale ) {
    if ( theme_perso_has_multilingual_plugin() ) {
        return $locale;
    }

    $languages = theme_perso_language_options();
    $language  = theme_perso_preferred_language_code();

    return isset( $languages[ $language ]['locale'] ) ? $languages[ $language ]['locale'] : $locale;
}
add_filter( 'locale', 'theme_perso_filter_locale', 20 );

function theme_perso_language_url( $code ) {
    $code = theme_perso_normalize_language_code( $code );

    if ( function_exists( 'pll_the_languages' ) ) {
        $polylang_languages = pll_the_languages(
            array(
                'raw'                    => 1,
                'hide_if_no_translation' => 0,
            )
        );

        if ( isset( $polylang_languages[ $code ]['url'] ) ) {
            return $polylang_languages[ $code ]['url'];
        }
    }

    if ( has_filter( 'wpml_active_languages' ) ) {
        $wpml_languages = apply_filters(
            'wpml_active_languages',
            null,
            array(
                'skip_missing' => 0,
            )
        );

        if ( is_array( $wpml_languages ) && isset( $wpml_languages[ $code ]['url'] ) ) {
            return $wpml_languages[ $code ]['url'];
        }
    }

    return add_query_arg( 'lang', $code, remove_query_arg( 'lang' ) );
}

function theme_perso_language_attributes( $output ) {
    $languages = theme_perso_language_options();
    $language  = theme_perso_current_language();

    if ( empty( $languages[ $language ] ) ) {
        return $output;
    }

    $lang_attr = str_replace( '_', '-', strtolower( $languages[ $language ]['locale'] ) );
    $dir_attr  = $languages[ $language ]['dir'];

    if ( preg_match( '/lang="[^"]*"/', $output ) ) {
        $output = preg_replace( '/lang="[^"]*"/', 'lang="' . esc_attr( $lang_attr ) . '"', $output );
    } else {
        $output .= ' lang="' . esc_attr( $lang_attr ) . '"';
    }

    if ( preg_match( '/dir="[^"]*"/', $output ) ) {
        $output = preg_replace( '/dir="[^"]*"/', 'dir="' . esc_attr( $dir_attr ) . '"', $output );
    } else {
        $output .= ' dir="' . esc_attr( $dir_attr ) . '"';
    }

    return $output;
}
add_filter( 'language_attributes', 'theme_perso_language_attributes', 20 );

function theme_perso_language_body_classes( $classes ) {
    $language    = theme_perso_current_language();
    $languages   = theme_perso_language_options();
    $classes[]   = 'cosmethique-lang-' . $language;

    if ( isset( $languages[ $language ] ) && 'rtl' === $languages[ $language ]['dir'] ) {
        $classes[] = 'cosmethique-rtl';
    }

    return $classes;
}
add_filter( 'body_class', 'theme_perso_language_body_classes' );

function theme_perso_render_language_selector() {
    $languages = theme_perso_language_options();
    $current   = theme_perso_current_language();
    $active    = isset( $languages[ $current ] ) ? $languages[ $current ] : $languages['fr'];
    ?>
    <div class="language-switcher" data-language-switcher>
        <button class="language-switcher-toggle" type="button" aria-haspopup="true" aria-expanded="false">
            <span class="language-label-full"><?php echo esc_html( $active['label'] ); ?></span>
            <span class="language-label-short"><?php echo esc_html( $active['short'] ); ?></span>
            <svg aria-hidden="true" viewBox="0 0 16 16"><path d="M4 6l4 4 4-4"/></svg>
        </button>
        <div class="language-switcher-menu" role="menu" hidden>
            <?php foreach ( $languages as $code => $language ) : ?>
                <a
                    class="language-switcher-option<?php echo $current === $code ? ' is-active' : ''; ?>"
                    href="<?php echo esc_url( theme_perso_language_url( $code ) ); ?>"
                    role="menuitemradio"
                    aria-checked="<?php echo $current === $code ? 'true' : 'false'; ?>"
                    hreflang="<?php echo esc_attr( str_replace( '_', '-', strtolower( $language['locale'] ) ) ); ?>"
                    lang="<?php echo esc_attr( str_replace( '_', '-', strtolower( $language['locale'] ) ) ); ?>"
                    dir="<?php echo esc_attr( $language['dir'] ); ?>"
                    data-language-code="<?php echo esc_attr( $code ); ?>"
                >
                    <span><?php echo esc_html( $language['label'] ); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}

require_once get_template_directory() . '/inc/multilingual.php';

function theme_perso_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar blog', 'theme-perso' ),
            'id'            => 'primary-sidebar',
            'description'   => esc_html__( 'Widgets affichés sur le blog et les archives.', 'theme-perso' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'theme_perso_widgets_init' );

function theme_perso_customize_security( $wp_customize ) {
    $wp_customize->add_section(
        'theme_perso_security',
        array(
            'title'       => esc_html__( 'Sécurité COSM’ETHIQUE', 'theme-perso' ),
            'description' => esc_html__( 'Ajoutez les clés Google reCAPTCHA v3 pour protéger les formulaires et le checkout.', 'theme-perso' ),
            'priority'    => 160,
        )
    );

    $wp_customize->add_setting(
        'theme_perso_recaptcha_site_key',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => '',
        )
    );

    $wp_customize->add_control(
        'theme_perso_recaptcha_site_key',
        array(
            'label'   => esc_html__( 'Clé site reCAPTCHA v3', 'theme-perso' ),
            'section' => 'theme_perso_security',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'theme_perso_recaptcha_secret_key',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => '',
        )
    );

    $wp_customize->add_control(
        'theme_perso_recaptcha_secret_key',
        array(
            'label'   => esc_html__( 'Clé secrète reCAPTCHA v3', 'theme-perso' ),
            'section' => 'theme_perso_security',
            'type'    => 'password',
        )
    );
}
add_action( 'customize_register', 'theme_perso_customize_security' );

function theme_perso_recaptcha_site_key() {
    if ( defined( 'COSMETHIQUE_RECAPTCHA_SITE_KEY' ) && COSMETHIQUE_RECAPTCHA_SITE_KEY ) {
        return (string) COSMETHIQUE_RECAPTCHA_SITE_KEY;
    }

    return (string) get_theme_mod( 'theme_perso_recaptcha_site_key', '' );
}

function theme_perso_recaptcha_secret_key() {
    if ( defined( 'COSMETHIQUE_RECAPTCHA_SECRET_KEY' ) && COSMETHIQUE_RECAPTCHA_SECRET_KEY ) {
        return (string) COSMETHIQUE_RECAPTCHA_SECRET_KEY;
    }

    return (string) get_theme_mod( 'theme_perso_recaptcha_secret_key', '' );
}

function theme_perso_recaptcha_is_configured() {
    return theme_perso_recaptcha_site_key() && theme_perso_recaptcha_secret_key();
}

function theme_perso_security_fields( $action = 'cosmethique_form' ) {
    $action = sanitize_key( $action );
    ?>
    <input type="hidden" name="cosmethique_recaptcha_action" value="<?php echo esc_attr( $action ); ?>">
    <input type="hidden" name="cosmethique_recaptcha_token" value="" data-cosmethique-recaptcha-action="<?php echo esc_attr( $action ); ?>">
    <div class="cosmethique-security-field" aria-hidden="true">
        <label><?php esc_html_e( 'Site web', 'theme-perso' ); ?><input type="text" name="cosmethique_company_website" value="" tabindex="-1" autocomplete="off"></label>
    </div>
    <?php
}

function theme_perso_is_honeypot_triggered() {
    return ! empty( $_POST['cosmethique_company_website'] ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
}

function theme_perso_verify_recaptcha_submission( $expected_action = 'cosmethique_form' ) {
    if ( ! theme_perso_recaptcha_is_configured() ) {
        return true;
    }

    $token = isset( $_POST['cosmethique_recaptcha_token'] ) ? sanitize_text_field( wp_unslash( $_POST['cosmethique_recaptcha_token'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing

    if ( ! $token ) {
        return false;
    }

    $response = wp_remote_post(
        'https://www.google.com/recaptcha/api/siteverify',
        array(
            'timeout' => 8,
            'body'    => array(
                'secret'   => theme_perso_recaptcha_secret_key(),
                'response' => $token,
                'remoteip' => isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '',
            ),
        )
    );

    if ( is_wp_error( $response ) ) {
        return false;
    }

    $body = json_decode( wp_remote_retrieve_body( $response ), true );

    if ( empty( $body['success'] ) ) {
        return false;
    }

    $score  = isset( $body['score'] ) ? (float) $body['score'] : 1;
    $action = isset( $body['action'] ) ? sanitize_key( $body['action'] ) : sanitize_key( $expected_action );

    return $score >= 0.5 && sanitize_key( $expected_action ) === $action;
}

function theme_perso_recaptcha_admin_notice() {
    if ( ! current_user_can( 'manage_options' ) || theme_perso_recaptcha_is_configured() ) {
        return;
    }

    $screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

    if ( ! $screen || false === strpos( (string) $screen->id, 'woocommerce' ) ) {
        return;
    }

    $customizer_url = admin_url( 'customize.php?autofocus%5Bsection%5D=theme_perso_security' );
    ?>
    <div class="notice notice-warning is-dismissible">
        <p>
            <?php esc_html_e( 'Protection COSM’ETHIQUE: l’anti-spam invisible est actif, mais reCAPTCHA v3 nécessite encore les clés Google pour être totalement activé.', 'theme-perso' ); ?>
            <a href="<?php echo esc_url( $customizer_url ); ?>"><?php esc_html_e( 'Ajouter les clés', 'theme-perso' ); ?></a>
        </p>
    </div>
    <?php
}
add_action( 'admin_notices', 'theme_perso_recaptcha_admin_notice' );

function theme_perso_primary_menu_fallback() {
    $items = array(
        esc_html__( 'Accueil', 'theme-perso' )          => home_url( '/' ),
        esc_html__( 'Boutique', 'theme-perso' )         => function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' ),
        esc_html__( 'Diagnostic', 'theme-perso' )       => home_url( '/diagnostic/' ),
        esc_html__( 'Qui sommes-nous', 'theme-perso' )  => home_url( '/qui-sommes-nous/' ),
        esc_html__( 'Blog', 'theme-perso' )             => home_url( '/blog/' ),
        esc_html__( 'Contact', 'theme-perso' )          => home_url( '/contact/' ),
        esc_html__( 'Devenir franchisé', 'theme-perso' ) => home_url( '/devenir-franchise/' ),
    );

    echo '<ul id="primary-menu" class="primary-menu">';
    foreach ( $items as $label => $url ) {
        printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
    }
    echo '</ul>';
}

function theme_perso_footer_menu_fallback() {
    $items = array(
        esc_html__( 'CGV', 'theme-perso' )                         => home_url( '/cgv/' ),
        esc_html__( 'CGU', 'theme-perso' )                         => home_url( '/cgu/' ),
        esc_html__( 'Mentions légales', 'theme-perso' )             => home_url( '/mentions-legales/' ),
        esc_html__( 'Politique confidentialité', 'theme-perso' )    => home_url( '/politique-de-confidentialite/' ),
        esc_html__( 'Politique de cookies', 'theme-perso' )         => theme_perso_cookie_policy_url(),
        esc_html__( 'Contact', 'theme-perso' )                     => home_url( '/contact/' ),
    );

    echo '<ul class="footer-menu">';
    foreach ( $items as $label => $url ) {
        printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
    }
    echo '</ul>';
}

function theme_perso_excerpt_length() {
    return 22;
}
add_filter( 'excerpt_length', 'theme_perso_excerpt_length' );

function theme_perso_excerpt_more() {
    return '...';
}
add_filter( 'excerpt_more', 'theme_perso_excerpt_more' );

function theme_perso_body_classes( $classes ) {
    if ( class_exists( 'WooCommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) ) {
        $classes[] = 'cosmethique-woocommerce';
    }

    if ( is_front_page() ) {
        $classes[] = 'cosmethique-front-page';
    }

    if ( function_exists( 'is_product' ) && is_product() && get_post_meta( get_the_ID(), '_cosmethique_gallery_images', true ) ) {
        $classes[] = 'has-cosmethique-product-gallery';
    }

    return $classes;
}
add_filter( 'body_class', 'theme_perso_body_classes' );

function theme_perso_seo_meta_description() {
    if ( defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || is_admin() ) {
        return;
    }

    $description = get_bloginfo( 'description' );

    if ( is_front_page() ) {
        $description = "COSM’ETHIQUE, marque de cosmétiques naturels premium: soins visage, corps, cheveux et aromathérapie formulés avec exigence.";
    } elseif ( is_page( 'plan-du-site' ) ) {
        $description = "Explorez l’univers Cosm’Éthique avec un plan du site immersif: boutique, diagnostic beauté, blog, contact, compte client et pages essentielles.";
    } elseif ( is_singular() ) {
        $description = wp_strip_all_tags( get_the_excerpt() );
    } elseif ( is_archive() ) {
        $description = wp_strip_all_tags( get_the_archive_description() );
    }

    if ( $description ) {
        printf( '<meta name="description" content="%s">' . "\n", esc_attr( wp_trim_words( $description, 28, '' ) ) );
    }
}
add_action( 'wp_head', 'theme_perso_seo_meta_description', 2 );

function theme_perso_sitemap_document_title( $parts ) {
    if ( is_admin() || ! is_page( 'plan-du-site' ) ) {
        return $parts;
    }

    $parts['title'] = 'Plan du site premium';
    $parts['site']  = 'COSM’ÉTHIQUE';

    return $parts;
}
add_filter( 'document_title_parts', 'theme_perso_sitemap_document_title', 20 );

function theme_perso_sitemap_page_seo() {
    if ( is_admin() || ! is_page( 'plan-du-site' ) ) {
        return;
    }

    remove_action( 'wp_head', 'rel_canonical' );

    $canonical = get_permalink();
    $schema    = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'WebPage',
        'name'        => 'Plan du site COSM’ÉTHIQUE',
        'description' => 'Explorez l’univers Cosm’Éthique avec un plan du site immersif regroupant les pages essentielles de la boutique.',
        'url'         => $canonical,
        'isPartOf'    => array(
            '@type' => 'WebSite',
            'name'  => get_bloginfo( 'name' ),
            'url'   => home_url( '/' ),
        ),
    );
    ?>
    <link rel="canonical" href="<?php echo esc_url( $canonical ); ?>">
    <script type="application/ld+json"><?php echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
    <?php
}
add_action( 'wp_head', 'theme_perso_sitemap_page_seo', 3 );

function theme_perso_cart_count_fragments( $fragments ) {
    if ( function_exists( 'WC' ) && WC()->cart ) {
        $fragments['.cart-count'] = '<span class="cart-count">' . esc_html( WC()->cart->get_cart_contents_count() ) . '</span>';
    }

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'theme_perso_cart_count_fragments' );

if ( ! defined( 'THEME_PERSO_INSTAGRAM_URL' ) ) {
    define( 'THEME_PERSO_INSTAGRAM_URL', 'https://www.instagram.com/cosm_ethiquefr/' );
}

if ( ! defined( 'THEME_PERSO_PINTEREST_URL' ) ) {
    define( 'THEME_PERSO_PINTEREST_URL', 'https://fr.pinterest.com/cosm_ethique' );
}

if ( ! defined( 'THEME_PERSO_TIKTOK_URL' ) ) {
    define( 'THEME_PERSO_TIKTOK_URL', 'https://www.tiktok.com/@cosmethique5' );
}

function theme_perso_instagram_url() {
    return THEME_PERSO_INSTAGRAM_URL;
}

function theme_perso_pinterest_url() {
    return THEME_PERSO_PINTEREST_URL;
}

function theme_perso_tiktok_url() {
    return THEME_PERSO_TIKTOK_URL;
}

function theme_perso_social_links() {
    return array(
        'instagram' => array(
            'label'   => __( 'Instagram', 'theme-perso' ),
            'url'     => theme_perso_instagram_url(),
            'tooltip' => __( 'Suivez-nous sur Instagram', 'theme-perso' ),
        ),
        'pinterest' => array(
            'label'   => __( 'Pinterest', 'theme-perso' ),
            'url'     => theme_perso_pinterest_url(),
            'tooltip' => __( 'Suivez-nous sur Pinterest', 'theme-perso' ),
        ),
        'tiktok'    => array(
            'label'   => __( 'TikTok', 'theme-perso' ),
            'url'     => theme_perso_tiktok_url(),
            'tooltip' => __( 'Suivez-nous sur TikTok', 'theme-perso' ),
        ),
    );
}

function theme_perso_social_icon( $network ) {
    $icons = array(
        'instagram' => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="4" y="4" width="16" height="16" rx="5"></rect><circle cx="12" cy="12" r="3.4"></circle><circle cx="17.2" cy="6.8" r="0.7"></circle></svg>',
        'pinterest' => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="8.5"></circle><path d="M10.4 18.2c.4-1.5.8-3 1.1-4.4"></path><path d="M11.7 13.8c-.3-.6-.4-1.4-.2-2.2.4-1.5 1.5-2.6 2.8-2.2 1.2.3 1.7 1.4 1.4 2.7-.4 1.8-1.4 3-2.8 2.6-.6-.1-1-.5-1.2-.9z"></path><path d="M12 20.5c4.7 0 8.5-3.8 8.5-8.5S16.7 3.5 12 3.5 3.5 7.3 3.5 12c0 2.8 1.4 5.3 3.5 6.8"></path></svg>',
        'tiktok'    => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M14 4v10.2a4 4 0 1 1-3.6-4"></path><path d="M14 6.5c1.1 1.7 2.8 2.9 5 3.1"></path><path d="M18.9 9.6v3.1c-1.7-.1-3.4-.8-4.9-2"></path></svg>',
    );

    return isset( $icons[ $network ] ) ? $icons[ $network ] : '';
}

function theme_perso_blog_share_links( $url = '', $title = '', $image = '' ) {
    $url   = $url ? $url : get_permalink();
    $title = $title ? $title : get_the_title();

    return array(
        'instagram' => array(
            'label' => __( 'Instagram', 'theme-perso' ),
            'url'   => theme_perso_instagram_url(),
            'aria'  => __( 'Ouvrir Instagram COSM’ÉTHIQUE', 'theme-perso' ),
        ),
        'pinterest' => array(
            'label' => __( 'Pinterest', 'theme-perso' ),
            'url'   => add_query_arg(
                array_filter(
                    array(
                        'url'         => $url,
                        'media'       => $image,
                        'description' => $title,
                    )
                ),
                'https://pinterest.com/pin/create/button/'
            ),
            'aria'  => __( 'Partager cet article sur Pinterest', 'theme-perso' ),
        ),
        'tiktok'    => array(
            'label' => __( 'TikTok', 'theme-perso' ),
            'url'   => theme_perso_tiktok_url(),
            'aria'  => __( 'Ouvrir TikTok COSM’ÉTHIQUE', 'theme-perso' ),
        ),
    );
}

function theme_perso_demo_products() {
    $visuals = theme_perso_product_visuals();

    return array(
        array(
            'title' => 'Sérum Éclat à la Rose',
            'price' => '34,90€',
            'badge' => 'Best seller',
            'category' => 'visage',
            'image' => $visuals['Sérum Éclat à la Rose']['image'],
        ),
        array(
            'title' => 'Huile Sèche Botanique',
            'price' => '29,90€',
            'badge' => 'Nouveau',
            'category' => 'corps',
            'image' => $visuals['Huile Sèche Botanique']['image'],
        ),
        array(
            'title' => 'Masque Nutrition Intense',
            'price' => '26,90€',
            'badge' => 'Rituel soin',
            'category' => 'visage',
            'image' => $visuals['Masque Nutrition Intense']['image'],
        ),
        array(
            'title' => 'Baume Corps Karité & Amande',
            'price' => '24,90€',
            'badge' => 'Nutrition',
            'category' => 'corps',
            'image' => $visuals['Baume Corps Karité & Amande']['image'],
        ),
        array(
            'title' => 'Shampooing Doux Sauge & Ortie',
            'price' => '18,90€',
            'badge' => 'Cheveux',
            'category' => 'cheveux',
            'image' => $visuals['Shampooing Doux Sauge & Ortie']['image'],
        ),
        array(
            'title' => 'Huile Essentielle Lavande Fine',
            'price' => '12,90€',
            'badge' => 'Aromathérapie',
            'category' => 'aromatherapie',
            'image' => $visuals['Huile Essentielle Lavande Fine']['image'],
        ),
    );
}

function theme_perso_product_asset_url( $file ) {
    return get_template_directory_uri() . '/assets/products/' . ltrim( $file, '/' );
}

function theme_perso_product_fallback_image_url() {
    return theme_perso_product_asset_url( 'cosmethique-product-placeholder.svg' );
}

function theme_perso_is_fallback_product_image( $image_url ) {
    return is_string( $image_url ) && false !== strpos( $image_url, 'cosmethique-product-placeholder.svg' );
}

function theme_perso_featured_blog_cards() {
    return array(
        array(
            'title'     => 'Hydratation naturelle : les bienfaits du karité pour votre peau',
            'category'  => 'Corps',
            'image'     => theme_perso_product_asset_url( 'photo-baume-corps-karite-amande.png' ),
            'read_time' => '5 min',
            'views'     => '3 104 vues',
            'author'    => 'Julie Martin',
            'excerpt'   => 'Découvrez pourquoi le karité est un allié incontournable pour nourrir, protéger et réparer les peaux sèches au quotidien.',
            'content'   => '<p>Le karité est l’un des ingrédients les plus appréciés dans les soins naturels pour sa richesse et son confort. Il aide à nourrir les zones sèches, à renforcer la barrière cutanée et à laisser la peau plus souple.</p><p>Appliqué après la douche, sur peau légèrement humide, il transforme le massage en rituel enveloppant. Pour les peaux très sèches, privilégiez une texture baume sur les jambes, les coudes et les mains.</p><h2>Le geste COSM’ETHIQUE</h2><p>Chauffez une petite quantité entre les paumes, puis massez lentement jusqu’à absorption. La peau reste confortable sans sensation lourde.</p>',
        ),
        array(
            'title'     => 'Sérums naturels : comment choisir celui qui correspond à votre peau',
            'category'  => 'Visage',
            'image'     => theme_perso_product_asset_url( 'photo-serum-eclat-rose.png' ),
            'read_time' => '4 min',
            'views'     => '1 892 vues',
            'author'    => 'Julie Martin',
            'excerpt'   => 'Actifs, textures, besoins de peau... Nos conseils pour sélectionner le sérum idéal et booster l’éclat naturellement.',
            'content'   => '<p>Un sérum se choisit d’abord selon l’objectif principal de votre peau: éclat, hydratation, confort ou nutrition. Sa texture légère permet une application avant la crème, sans surcharger la routine.</p><p>Pour une peau terne, recherchez des actifs éclat et hydratants. Pour une peau sensible, avancez progressivement et observez la réaction de la peau pendant plusieurs jours.</p><h2>Notre conseil</h2><p>Deux à trois gouttes suffisent souvent. Appliquez par pressions douces plutôt qu’en frottant.</p>',
        ),
        array(
            'title'     => 'Peau sensible : adopter une routine douce',
            'category'  => 'Peau sensible',
            'image'     => theme_perso_product_asset_url( 'lifestyle-creme-sauge.png' ),
            'read_time' => '6 min',
            'views'     => '2 540 vues',
            'author'    => 'Julie Martin',
            'excerpt'   => 'Découvrez notre routine complète et les bons gestes pour apaiser, protéger et renforcer les peaux sensibles.',
            'content'   => '<p>Une peau sensible a besoin d’une routine courte, régulière et rassurante. La priorité est d’éviter l’accumulation d’actifs trop puissants et de choisir des textures confortables.</p><p>Nettoyez délicatement, hydratez avec une formule simple, puis protégez la peau des agressions extérieures. Introduisez chaque nouveau soin un par un pour comprendre ce qui convient réellement.</p><h2>À retenir</h2><p>La douceur n’est pas un compromis: c’est souvent la stratégie la plus efficace pour retrouver une peau confortable.</p>',
        ),
        array(
            'title'     => 'Routine skincare naturelle : les 5 gestes essentiels',
            'category'  => 'Visage',
            'image'     => theme_perso_product_asset_url( 'lifestyle-serum-rose.png' ),
            'read_time' => '7 min',
            'views'     => '2 214 vues',
            'author'    => 'Claire Bernard',
            'excerpt'   => 'Un rituel simple, sensoriel et naturel pour nettoyer, hydrater, nourrir et protéger la peau sans la surcharger.',
            'content'   => '<p>Une routine naturelle efficace repose sur cinq gestes: nettoyer avec douceur, hydrater, nourrir, protéger et ajuster selon les besoins de la peau.</p><p>Le matin, privilégiez les textures légères. Le soir, offrez à votre peau un soin plus enveloppant et quelques minutes de massage.</p><h2>Une routine lisible</h2><p>La régularité compte davantage que la quantité de produits. Trois soins bien choisis suffisent souvent à révéler l’éclat naturel.</p>',
        ),
        array(
            'title'     => 'Les huiles végétales à adopter',
            'category'  => 'Ingrédients naturels',
            'image'     => theme_perso_product_asset_url( 'photo-huile-seche-botanique.png' ),
            'read_time' => '5 min',
            'views'     => '1 674 vues',
            'author'    => 'Julie Martin',
            'excerpt'   => 'Jojoba, amande douce, argan: découvrez les huiles végétales adaptées au visage, au corps et aux longueurs.',
            'content'   => '<p>Les huiles végétales apportent confort, souplesse et éclat lorsqu’elles sont choisies avec précision. Une huile légère convient au visage, tandis qu’une texture plus riche accompagne les zones sèches.</p><p>Pour les cheveux, appliquez uniquement sur les longueurs et les pointes afin de préserver la légèreté.</p>',
        ),
        array(
            'title'     => 'Vitamine C : booster naturellement son éclat',
            'category'  => 'Ingrédients naturels',
            'image'     => theme_perso_product_asset_url( 'ingredient-rose.svg' ),
            'read_time' => '6 min',
            'views'     => '1 436 vues',
            'author'    => 'Claire Bernard',
            'excerpt'   => 'Comprendre comment intégrer un actif éclat dans une routine naturelle, sans sensibiliser la peau.',
            'content'   => '<p>La vitamine C est appréciée pour illuminer le teint et accompagner les routines anti-fatigue. Elle s’introduit progressivement, surtout sur les peaux sensibles.</p><p>Associez-la à une hydratation confortable et à une protection adaptée le matin.</p>',
        ),
        array(
            'title'     => 'Masque cheveux réparateur',
            'category'  => 'Cheveux',
            'image'     => theme_perso_product_asset_url( 'photo-masque-cheveux-reparateur.png' ),
            'read_time' => '5 min',
            'views'     => '1 328 vues',
            'author'    => 'Julie Martin',
            'excerpt'   => 'Les gestes essentiels pour nourrir les longueurs, renforcer la fibre et retrouver des cheveux plus souples.',
            'content'   => '<p>Un masque réparateur s’applique sur les longueurs essorées, en insistant sur les zones les plus sèches. Laissez poser quelques minutes, puis rincez soigneusement.</p><p>Pour un fini léger, évitez la racine et adaptez la quantité à l’épaisseur des cheveux.</p>',
        ),
        array(
            'title'     => 'Les secrets de la lavande fine',
            'category'  => 'Bien-être',
            'image'     => theme_perso_product_asset_url( 'photo-huile-essentielle-lavande-fine.png' ),
            'read_time' => '4 min',
            'views'     => '1 205 vues',
            'author'    => 'Claire Bernard',
            'excerpt'   => 'Une plante emblématique des rituels sensoriels, appréciée pour son parfum floral, doux et apaisant.',
            'content'   => '<p>La lavande fine accompagne les rituels de détente grâce à son parfum délicat et floral. Elle s’utilise avec précaution, selon les recommandations de l’aromathérapie.</p><p>Quelques gestes simples suffisent à créer un moment calme, sensoriel et responsable.</p>',
        ),
    );
}

function theme_perso_featured_blog_article() {
    return array(
        'title'     => 'Routine skincare 2026 : les essentiels d’une peau saine et lumineuse',
        'category'  => 'Article à la une',
        'image'     => theme_perso_product_asset_url( 'photo-serum-eclat-rose.png' ),
        'read_time' => '8 min',
        'views'     => '4 820 vues',
        'author'    => 'Julie Martin',
        'excerpt'   => 'Découvrez les gestes essentiels pour une peau éclatante grâce à une routine naturelle adaptée à votre type de peau.',
        'content'   => '<p>En 2026, la skincare premium devient plus précise, plus naturelle et plus respectueuse de la peau. L’objectif n’est plus de multiplier les étapes, mais de choisir les bons gestes.</p><h2>Nettoyer sans agresser</h2><p>Un nettoyage doux prépare la peau sans déséquilibrer son film protecteur. Le geste doit laisser une sensation de confort, jamais de tiraillement.</p><h2>Hydrater avec précision</h2><p>Un sérum bien choisi cible le besoin principal: éclat, hydratation, confort ou texture de peau. Il s’applique avant la crème, en petite quantité.</p><h2>Nourrir et protéger</h2><p>La crème scelle l’hydratation et soutient la barrière cutanée. Une à deux fois par semaine, ajoutez un masque ou une huile selon les besoins.</p><h2>La sélection COSM’ETHIQUE</h2><p>Associez le Sérum Éclat à la Rose à une crème douce, puis adaptez votre routine avec une huile ou un masque lorsque la peau réclame plus de nutrition.</p>',
    );
}

function theme_perso_product_visuals() {
    return array(
        'Sérum Éclat à la Rose' => array(
            'image'   => theme_perso_product_asset_url( 'photo-serum-eclat-rose.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-serum-eclat-rose.png' ),
                theme_perso_product_asset_url( 'lifestyle-serum-rose.png' ),
                theme_perso_product_asset_url( 'photo-serum-eclat-rose-packshot.png' ),
            ),
        ),
        'Crème Hydratante Sauge & Camomille' => array(
            'image'   => theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille.png' ),
                theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille-back.png' ),
                theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille-texture.png' ),
            ),
        ),
        'Gel Nettoyant Aloe Vera' => array(
            'image'   => theme_perso_product_asset_url( 'photo-gel-nettoyant-aloe-vera.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-gel-nettoyant-aloe-vera.png' ),
                theme_perso_product_asset_url( 'photo-gel-nettoyant-aloe-vera-back.png' ),
                theme_perso_product_asset_url( 'photo-gel-nettoyant-aloe-vera-lifestyle.png' ),
            ),
        ),
        'Lotion Tonique Fleur d’Oranger' => array(
            'image'   => theme_perso_product_asset_url( 'photo-lotion-tonique-fleur-oranger.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-lotion-tonique-fleur-oranger.png' ),
                theme_perso_product_asset_url( 'photo-lotion-tonique-fleur-oranger-back.png' ),
                theme_perso_product_asset_url( 'photo-lotion-tonique-fleur-oranger-lifestyle.png' ),
            ),
        ),
        'Masque Purifiant Argile Verte' => array(
            'image'   => theme_perso_product_asset_url( 'photo-masque-purifiant-argile-verte.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-masque-purifiant-argile-verte.png' ),
                theme_perso_product_asset_url( 'photo-masque-purifiant-argile-verte-back.png' ),
                theme_perso_product_asset_url( 'photo-masque-purifiant-argile-verte-lifestyle.png' ),
            ),
        ),
        'Huile de Soin Nourrissante' => array(
            'image'   => theme_perso_product_asset_url( 'photo-huile-soin-nourrissante.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-huile-soin-nourrissante.png' ),
                theme_perso_product_asset_url( 'photo-huile-soin-nourrissante-back.png' ),
                theme_perso_product_asset_url( 'photo-huile-soin-nourrissante-lifestyle.png' ),
            ),
        ),
        'Masque Nutrition Intense' => array(
            'image'   => theme_perso_product_asset_url( 'photo-masque-nutrition-intense.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-masque-nutrition-intense.png' ),
                theme_perso_product_asset_url( 'lifestyle-masque-visage.png' ),
                theme_perso_product_asset_url( 'masque-visage.svg' ),
            ),
        ),
        'Huile Sèche Botanique' => array(
            'image'   => theme_perso_product_asset_url( 'photo-huile-seche-botanique.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-huile-seche-botanique.png' ),
                theme_perso_product_asset_url( 'photo-huile-seche-botanique-back.png' ),
                theme_perso_product_asset_url( 'photo-huile-seche-botanique-lifestyle.png' ),
            ),
        ),
        'Baume Corps Karité & Amande' => array(
            'image'   => theme_perso_product_asset_url( 'photo-baume-corps-karite-amande.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-baume-corps-karite-amande.png' ),
                theme_perso_product_asset_url( 'photo-baume-corps-karite-amande-back.png' ),
                theme_perso_product_asset_url( 'lifestyle-baume-corps.png' ),
            ),
        ),
        'Gommage Corps Sucre & Lavande' => array(
            'image'   => theme_perso_product_asset_url( 'photo-gommage-corps-sucre-lavande.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-gommage-corps-sucre-lavande.png' ),
                theme_perso_product_asset_url( 'photo-gommage-corps-sucre-lavande-back.png' ),
                theme_perso_product_asset_url( 'photo-gommage-corps-sucre-lavande-lifestyle.png' ),
            ),
        ),
        'Lait Corps Hydratant' => array(
            'image'   => theme_perso_product_asset_url( 'photo-lait-corps-hydratant.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-lait-corps-hydratant.png' ),
                theme_perso_product_asset_url( 'photo-lait-corps-hydratant-back.png' ),
                theme_perso_product_asset_url( 'photo-lait-corps-hydratant-lifestyle.png' ),
            ),
        ),
        'Beurre Corporel Coco & Vanille' => array(
            'image'   => theme_perso_product_asset_url( 'photo-beurre-corporel-coco-vanille.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-beurre-corporel-coco-vanille.png' ),
                theme_perso_product_asset_url( 'photo-beurre-corporel-coco-vanille-back.png' ),
                theme_perso_product_asset_url( 'photo-beurre-corporel-coco-vanille-lifestyle.png' ),
            ),
        ),
        'Gel Douche Coton & Avoine' => array(
            'image'   => theme_perso_product_asset_url( 'photo-gel-douche-coton-avoine.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-gel-douche-coton-avoine.png' ),
                theme_perso_product_asset_url( 'photo-gel-douche-coton-avoine-back.png' ),
                theme_perso_product_asset_url( 'photo-gel-douche-coton-avoine-lifestyle.png' ),
            ),
        ),
        'Shampooing Doux Sauge & Ortie' => array(
            'image'   => theme_perso_product_asset_url( 'photo-shampooing-doux-sauge-ortie.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-shampooing-doux-sauge-ortie.png' ),
                theme_perso_product_asset_url( 'photo-shampooing-doux-sauge-ortie-back.png' ),
                theme_perso_product_asset_url( 'photo-shampooing-doux-sauge-ortie-lifestyle.png' ),
            ),
        ),
        'Masque Cheveux Réparateur' => array(
            'image'   => theme_perso_product_asset_url( 'photo-masque-cheveux-reparateur.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-masque-cheveux-reparateur.png' ),
                theme_perso_product_asset_url( 'photo-masque-cheveux-reparateur-back.png' ),
                theme_perso_product_asset_url( 'photo-masque-cheveux-reparateur-lifestyle.png' ),
            ),
        ),
        'Huile Capillaire Botanique' => array(
            'image'   => theme_perso_product_asset_url( 'photo-huile-capillaire-botanique.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-huile-capillaire-botanique.png' ),
                theme_perso_product_asset_url( 'photo-huile-capillaire-botanique-back.png' ),
                theme_perso_product_asset_url( 'photo-huile-capillaire-botanique-lifestyle.png' ),
            ),
        ),
        'Après-Shampooing Aloe Vera & Karité' => array(
            'image'   => theme_perso_product_asset_url( 'photo-apres-shampooing-aloe-vera-karite.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-apres-shampooing-aloe-vera-karite.png' ),
                theme_perso_product_asset_url( 'photo-apres-shampooing-aloe-vera-karite-back.png' ),
                theme_perso_product_asset_url( 'photo-apres-shampooing-aloe-vera-karite-lifestyle.png' ),
            ),
        ),
        'Sérum Pointes Nourrissant' => array(
            'image'   => theme_perso_product_asset_url( 'photo-serum-pointes-nourrissant.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-serum-pointes-nourrissant.png' ),
                theme_perso_product_asset_url( 'photo-serum-pointes-nourrissant-back.png' ),
                theme_perso_product_asset_url( 'photo-serum-pointes-nourrissant-lifestyle.png' ),
            ),
        ),
        'Spray Protecteur Thermique' => array(
            'image'   => theme_perso_product_asset_url( 'photo-spray-protecteur-thermique.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-spray-protecteur-thermique.png' ),
                theme_perso_product_asset_url( 'photo-spray-protecteur-thermique-back.png' ),
                theme_perso_product_asset_url( 'photo-spray-protecteur-thermique-lifestyle.png' ),
            ),
        ),
        'Éponge Konjac Naturelle' => array(
            'image'   => theme_perso_product_asset_url( 'photo-eponge-konjac-naturelle.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-eponge-konjac-naturelle.png' ),
                theme_perso_product_asset_url( 'photo-eponge-konjac-naturelle-lifestyle.png' ),
                theme_perso_product_asset_url( 'photo-eponge-konjac-naturelle-packshot.png' ),
            ),
        ),
        'Brosse Cheveux Bambou' => array(
            'image'   => theme_perso_product_asset_url( 'photo-brosse-cheveux-bambou.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-brosse-cheveux-bambou.png' ),
                theme_perso_product_asset_url( 'photo-brosse-cheveux-bambou-lifestyle.png' ),
                theme_perso_product_asset_url( 'photo-brosse-cheveux-bambou-packshot.png' ),
            ),
        ),
        'Gua Sha Quartz Rose' => array(
            'image'   => theme_perso_product_asset_url( 'photo-gua-sha-quartz-rose.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-gua-sha-quartz-rose.png' ),
                theme_perso_product_asset_url( 'photo-gua-sha-quartz-rose-lifestyle.png' ),
                theme_perso_product_asset_url( 'photo-gua-sha-quartz-rose-packshot.png' ),
            ),
        ),
        'Roller Jade Naturel' => array(
            'image'   => theme_perso_product_asset_url( 'photo-roller-jade-naturel.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-roller-jade-naturel.png' ),
                theme_perso_product_asset_url( 'photo-roller-jade-naturel-lifestyle.png' ),
                theme_perso_product_asset_url( 'photo-roller-jade-naturel-packshot.png' ),
            ),
        ),
        'Trousse Beauté Cosm’Éthique' => array(
            'image'   => theme_perso_product_asset_url( 'photo-trousse-beaute-cosmethique.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-trousse-beaute-cosmethique.png' ),
                theme_perso_product_asset_url( 'photo-trousse-beaute-cosmethique-lifestyle.png' ),
                theme_perso_product_asset_url( 'photo-trousse-beaute-cosmethique-packshot.png' ),
            ),
        ),
        'Set Premium Gua Sha + Roller' => array(
            'image'   => theme_perso_product_asset_url( 'photo-set-premium-gua-sha-roller.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-set-premium-gua-sha-roller.png' ),
                theme_perso_product_asset_url( 'photo-set-premium-gua-sha-roller-lifestyle.png' ),
                theme_perso_product_asset_url( 'photo-set-premium-gua-sha-roller-packshot.png' ),
            ),
        ),
        'Pack Routine Visage' => array(
            'image'   => theme_perso_product_asset_url( 'photo-pack-routine-visage-reel.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-pack-routine-visage-reel.png' ),
                theme_perso_product_asset_url( 'photo-pack-routine-visage-contenu-reel.png' ),
                theme_perso_product_asset_url( 'photo-pack-routine-visage-lifestyle-reel.png' ),
            ),
        ),
        'Pack Routine Corps' => array(
            'image'   => theme_perso_product_asset_url( 'photo-pack-routine-corps-reel.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-pack-routine-corps-reel.png' ),
                theme_perso_product_asset_url( 'photo-pack-routine-corps-contenu-reel.png' ),
                theme_perso_product_asset_url( 'photo-pack-routine-corps-lifestyle-reel.png' ),
            ),
        ),
        'Pack Routine Cheveux' => array(
            'image'   => theme_perso_product_asset_url( 'photo-pack-routine-cheveux-reel.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-pack-routine-cheveux-reel.png' ),
                theme_perso_product_asset_url( 'photo-pack-routine-cheveux-contenu-reel.png' ),
                theme_perso_product_asset_url( 'photo-pack-routine-cheveux-lifestyle-reel.png' ),
            ),
        ),
        'Pack Routine Premium' => array(
            'image'   => theme_perso_product_asset_url( 'photo-pack-routine-premium-reel.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-pack-routine-premium-reel.png' ),
                theme_perso_product_asset_url( 'photo-pack-routine-premium-contenu-reel.png' ),
                theme_perso_product_asset_url( 'photo-pack-routine-premium-lifestyle-reel.png' ),
            ),
        ),
        'Déodorant Naturel' => array(
            'image'   => theme_perso_product_asset_url( 'photo-deodorant-naturel.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-deodorant-naturel.png' ),
                theme_perso_product_asset_url( 'photo-deodorant-naturel-back.png' ),
                theme_perso_product_asset_url( 'photo-deodorant-naturel-lifestyle.png' ),
            ),
        ),
        'Lait Corps' => array(
            'image'   => theme_perso_product_asset_url( 'photo-lait-corps-hydratant.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-lait-corps-hydratant.png' ),
                theme_perso_product_asset_url( 'photo-lait-corps-hydratant-back.png' ),
                theme_perso_product_asset_url( 'photo-lait-corps-hydratant-lifestyle.png' ),
            ),
        ),
        'Gommage Corps' => array(
            'image'   => theme_perso_product_asset_url( 'photo-gommage-corps-sucre-lavande.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-gommage-corps-sucre-lavande.png' ),
                theme_perso_product_asset_url( 'photo-gommage-corps-sucre-lavande-back.png' ),
                theme_perso_product_asset_url( 'photo-gommage-corps-sucre-lavande-lifestyle.png' ),
            ),
        ),
        'Huile de Massage' => array(
            'image'   => theme_perso_product_asset_url( 'photo-huile-massage.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-huile-massage.png' ),
                theme_perso_product_asset_url( 'photo-huile-massage-back.png' ),
                theme_perso_product_asset_url( 'photo-huile-massage-lifestyle.png' ),
            ),
        ),
        'Après-shampoing' => array(
            'image'   => theme_perso_product_asset_url( 'photo-apres-shampooing-aloe-vera-karite.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-apres-shampooing-aloe-vera-karite.png' ),
                theme_perso_product_asset_url( 'photo-apres-shampooing-aloe-vera-karite-back.png' ),
                theme_perso_product_asset_url( 'photo-apres-shampooing-aloe-vera-karite-lifestyle.png' ),
            ),
        ),
        'Sérum Capillaire' => array(
            'image'   => theme_perso_product_asset_url( 'photo-serum-pointes-nourrissant.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-serum-pointes-nourrissant.png' ),
                theme_perso_product_asset_url( 'photo-serum-pointes-nourrissant-back.png' ),
                theme_perso_product_asset_url( 'photo-serum-pointes-nourrissant-lifestyle.png' ),
            ),
        ),
        'Huile Capillaire' => array(
            'image'   => theme_perso_product_asset_url( 'photo-huile-capillaire-botanique.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-huile-capillaire-botanique.png' ),
                theme_perso_product_asset_url( 'photo-huile-capillaire-botanique-back.png' ),
                theme_perso_product_asset_url( 'photo-huile-capillaire-botanique-lifestyle.png' ),
            ),
        ),
        'Spray Protecteur' => array(
            'image'   => theme_perso_product_asset_url( 'photo-spray-protecteur-thermique.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-spray-protecteur-thermique.png' ),
                theme_perso_product_asset_url( 'photo-spray-protecteur-thermique-back.png' ),
                theme_perso_product_asset_url( 'photo-spray-protecteur-thermique-lifestyle.png' ),
            ),
        ),
        'Huile Essentielle Lavande Fine' => array(
            'image'   => theme_perso_product_asset_url( 'photo-huile-essentielle-lavande-fine.png' ),
            'gallery' => array(
                theme_perso_product_asset_url( 'photo-huile-essentielle-lavande-fine.png' ),
                theme_perso_product_asset_url( 'photo-huile-essentielle-lavande-fine-back.png' ),
                theme_perso_product_asset_url( 'photo-huile-essentielle-lavande-fine-lifestyle.png' ),
            ),
        ),
    );
}

function theme_perso_product_descriptions() {
    return array(
        'Sérum Éclat à la Rose' => array(
            'short' => 'Sérum illuminateur à la rose, aloe vera et acide hyaluronique végétal.',
            'long'  => '<p>Ce sérum concentré a été pensé pour réveiller l’éclat du teint sans alourdir la peau. Sa texture fluide pénètre rapidement et laisse un fini frais, confortable et lumineux.</p><p>La rose aide à adoucir la peau, l’aloe vera apporte une sensation d’hydratation immédiate, et l’acide hyaluronique végétal contribue à maintenir une peau plus souple au fil des applications.</p><ul><li>Idéal pour les teints ternes ou fatigués</li><li>Texture légère adaptée à une routine matin et soir</li><li>Fini non collant sous une crème ou un maquillage</li></ul>',
        ),
        'Crème Hydratante Sauge & Camomille' => array(
            'short' => 'Crème de jour apaisante pour hydrater et protéger les peaux sensibles.',
            'long'  => '<p>Une crème quotidienne douce, formulée pour les peaux qui recherchent confort, hydratation et simplicité. Elle enveloppe la peau d’un voile souple sans effet gras.</p><p>La sauge participe à l’équilibre de la peau, tandis que la camomille apporte une sensation de calme et de confort. Elle s’utilise chaque matin après le sérum.</p><ul><li>Hydratation confortable toute la journée</li><li>Texture crème fine et facile à appliquer</li><li>Parfaite pour compléter une routine visage minimaliste</li></ul>',
        ),
        'Gel Nettoyant Aloe Vera' => array(
            'short' => 'Gel nettoyant doux à l’aloe vera pour nettoyer sans dessécher.',
            'long'  => '<p>Ce gel nettoyant élimine les impuretés avec douceur tout en respectant le confort de la peau. Sa texture fraîche se transforme en mousse fine au contact de l’eau.</p><p>L’aloe vera apporte une sensation d’apaisement immédiat, tandis que la base lavante douce préserve la barrière cutanée.</p><ul><li>Bénéfices: peau nette, souple et fraîche</li><li>Ingrédients clés: aloe vera, glycérine végétale, eau florale</li><li>Mode d’utilisation: masser sur peau humide puis rincer</li><li>Texture: gel frais non décapant</li><li>Type de peau: tous types de peaux, même sensibles</li><li>Résultats: teint plus clair et peau confortable</li></ul>',
        ),
        'Lotion Tonique Fleur d’Oranger' => array(
            'short' => 'Lotion tonique florale pour tonifier et rafraîchir la peau.',
            'long'  => '<p>Cette lotion complète le nettoyage et prépare la peau à recevoir les soins. Son parfum délicat de fleur d’oranger transforme le geste en rituel frais et lumineux.</p><p>Elle aide à raviver l’éclat, adoucir la sensation de tiraillement et équilibrer la routine du matin comme du soir.</p><ul><li>Bénéfices: tonifie, rafraîchit et prépare la peau</li><li>Ingrédients clés: fleur d’oranger, glycérine, eau apaisante</li><li>Mode d’utilisation: appliquer sur coton ou aux mains</li><li>Texture: lotion légère et fraîche</li><li>Type de peau: normales, ternes ou déshydratées</li><li>Résultats: peau plus souple et teint réveillé</li></ul>',
        ),
        'Masque Purifiant Argile Verte' => array(
            'short' => 'Masque à l’argile verte pour purifier les pores et affiner le grain de peau.',
            'long'  => '<p>Ce masque purifiant absorbe l’excès de sébum tout en laissant la peau confortable. Sa texture onctueuse s’étale facilement et se rince sans agresser.</p><p>L’argile verte aide à purifier, tandis que les actifs hydratants équilibrent la formule pour éviter l’effet desséchant.</p><ul><li>Bénéfices: pores purifiés, peau plus nette</li><li>Ingrédients clés: argile verte, aloe vera, glycérine végétale</li><li>Mode d’utilisation: poser 8 à 10 minutes puis rincer</li><li>Texture: crème argileuse douce</li><li>Type de peau: mixtes à grasses</li><li>Résultats: grain de peau plus régulier</li></ul>',
        ),
        'Huile de Soin Nourrissante' => array(
            'short' => 'Huile de soin fine pour nourrir intensément et apporter de l’éclat.',
            'long'  => '<p>Cette huile de soin nourrit la peau sans sensation lourde. Quelques gouttes suffisent pour envelopper le visage d’un fini satiné et confortable.</p><p>Inspirée des rituels botaniques, elle associe des huiles végétales précieuses pour renforcer la souplesse et l’éclat naturel.</p><ul><li>Bénéfices: nourrit, assouplit et illumine</li><li>Ingrédients clés: argan, amande douce, tournesol</li><li>Mode d’utilisation: appliquer 2 à 3 gouttes en massage</li><li>Texture: huile fine au toucher soyeux</li><li>Type de peau: sèches, normales ou inconfortables</li><li>Résultats: peau plus douce et lumineuse</li></ul>',
        ),
        'Masque Nutrition Intense' => array(
            'short' => 'Masque onctueux aux beurres végétaux pour nourrir la peau en profondeur.',
            'long'  => '<p>Ce masque riche est conçu comme un moment cocooning pour les peaux en manque de confort. Sa texture fondante aide à retrouver une peau plus douce, plus souple et visiblement reposée.</p><p>Il associe des beurres végétaux, des huiles naturelles et des extraits botaniques pour offrir une nutrition intense sans sensation lourde après rinçage.</p><ul><li>À utiliser 1 à 2 fois par semaine</li><li>Convient aux peaux sèches ou déshydratées</li><li>Résultat: peau nourrie, plus douce et lumineuse</li></ul>',
        ),
        'Huile Sèche Botanique' => array(
            'short' => 'Huile sèche satinée qui nourrit, illumine et sublime la peau sans fini gras.',
            'long'  => '<p>Cette huile sèche botanique enveloppe la peau d’un voile satiné tout en conservant un toucher léger. Elle se masse facilement après la douche et laisse une sensation souple, lumineuse et confortable.</p><p>Sa formule associe des huiles végétales précieuses pour nourrir la peau, renforcer son confort et révéler un éclat naturel sans film gras.</p><ul><li>Bénéfices: nourrit, satine et sublime</li><li>Ingrédients clés: jojoba, amande douce, tournesol</li><li>Mode d’utilisation: appliquer sur peau sèche ou légèrement humide</li><li>Texture: huile fine au toucher sec</li><li>Type de peau: tous types de peaux</li><li>Résultats: peau plus douce, lumineuse et souple</li></ul>',
        ),
        'Baume Corps Karité & Amande' => array(
            'short' => 'Baume fondant au karité et à l’amande douce pour restaurer le confort cutané.',
            'long'  => '<p>Un baume généreux, idéal pour les zones qui tiraillent: jambes, coudes, genoux, mains ou épaules. Sa texture riche fond au contact de la peau et laisse un fini protecteur.</p><p>Le karité nourrit intensément, l’amande douce apaise, et la formule aide à restaurer le confort des peaux sèches au quotidien.</p><ul><li>Bénéfices: nourrit intensément et restaure le confort</li><li>Ingrédients clés: beurre de karité, huile d’amande douce, vitamine E</li><li>Mode d’utilisation: masser sur peau propre, idéalement après la douche</li><li>Texture: baume riche et fondant</li><li>Type de peau: peaux sèches à très sèches</li><li>Résultats: peau plus souple, douce et protégée</li></ul>',
        ),
        'Gommage Corps Sucre & Lavande' => array(
            'short' => 'Gommage corps au sucre et à la lavande pour lisser la peau en douceur.',
            'long'  => '<p>Ce gommage exfolie délicatement la peau grâce à des grains de sucre, tout en laissant une sensation douce et lumineuse après rinçage.</p><p>La lavande apporte une dimension sensorielle apaisante, tandis que les huiles végétales aident à préserver le confort cutané.</p><ul><li>Bénéfices: exfolie, lisse et illumine</li><li>Ingrédients clés: sucre, lavande fine, amande douce</li><li>Mode d’utilisation: masser sur peau humide puis rincer</li><li>Texture: grains fondants dans une base nourrissante</li><li>Type de peau: tous types de peaux, hors peau irritée</li><li>Résultats: peau douce, régulière et plus lumineuse</li></ul>',
        ),
        'Lait Corps Hydratant' => array(
            'short' => 'Lait corps léger pour hydrater durablement les peaux normales à sèches.',
            'long'  => '<p>Ce lait corps hydrate la peau avec une texture fluide et confortable, pensée pour une application rapide au quotidien.</p><p>Les actifs humectants et les huiles végétales aident à maintenir la souplesse de la peau, sans effet collant ni sensation lourde.</p><ul><li>Bénéfices: hydrate durablement et adoucit</li><li>Ingrédients clés: coton, avoine, amande douce</li><li>Mode d’utilisation: appliquer matin ou soir sur peau propre</li><li>Texture: lait fluide, frais et non gras</li><li>Type de peau: normales à sèches</li><li>Résultats: peau confortable, souple et délicatement parfumée</li></ul>',
        ),
        'Beurre Corporel Coco & Vanille' => array(
            'short' => 'Beurre corporel fondant coco et vanille pour une nutrition intense.',
            'long'  => '<p>Ce beurre corporel offre une nutrition enveloppante aux peaux qui manquent de confort. Sa texture riche fond au massage et laisse la peau veloutée.</p><p>Le coco nourrit, la vanille apporte une signature sensorielle douce, et les beurres végétaux renforcent la sensation de protection longue durée.</p><ul><li>Bénéfices: nourrit intensément et protège</li><li>Ingrédients clés: coco, vanille, beurre de karité</li><li>Mode d’utilisation: appliquer sur les zones sèches en massage circulaire</li><li>Texture: beurre crémeux et fondant</li><li>Type de peau: sèches à très sèches</li><li>Résultats: peau plus douce, nourrie et confortable</li></ul>',
        ),
        'Gel Douche Coton & Avoine' => array(
            'short' => 'Gel douche doux au coton et à l’avoine pour nettoyer sans dessécher.',
            'long'  => '<p>Ce gel douche nettoie la peau avec une mousse douce et légère, tout en respectant l’équilibre naturel de la peau.</p><p>L’avoine apporte une sensation de confort, le coton adoucit le rituel, et la formule laisse la peau propre, fraîche et agréable au toucher.</p><ul><li>Bénéfices: nettoie en douceur et préserve le confort</li><li>Ingrédients clés: avoine, coton, glycérine végétale</li><li>Mode d’utilisation: faire mousser sur peau humide puis rincer</li><li>Texture: gel doux à mousse fine</li><li>Type de peau: tous types de peaux</li><li>Résultats: peau nette, douce et sans tiraillement</li></ul>',
        ),
        'Shampooing Doux Sauge & Ortie' => array(
            'short' => 'Shampooing doux à la sauge et à l’ortie pour nettoyer sans agresser le cuir chevelu.',
            'long'  => '<p>Ce shampooing a été formulé pour nettoyer délicatement les cheveux tout en respectant l’équilibre du cuir chevelu. Sa mousse fine se rince facilement et laisse les longueurs légères.</p><p>La sauge aide à équilibrer, l’ortie est appréciée dans les soins capillaires naturels, et la base lavante douce respecte la fibre capillaire.</p><ul><li>Bénéfices: nettoie, purifie et apporte de la légèreté</li><li>Ingrédients clés: sauge, ortie, glycérine végétale</li><li>Mode d’utilisation: masser sur cheveux mouillés puis rincer</li><li>Texture: gel lavant à mousse fine</li><li>Type de cheveux: normaux à mixtes</li><li>Résultats: cheveux propres, souples et brillants</li></ul>',
        ),
        'Masque Cheveux Réparateur' => array(
            'short' => 'Masque capillaire réparateur pour nourrir intensément les longueurs sensibilisées.',
            'long'  => '<p>Un soin réparateur pensé pour les cheveux secs, sensibilisés ou difficiles à démêler. Il enveloppe la fibre capillaire et aide les longueurs à retrouver souplesse et douceur.</p><p>Sa texture crémeuse nourrit sans alourdir lorsqu’elle est appliquée sur les longueurs et pointes, après le shampooing.</p><ul><li>Bénéfices: répare visiblement et nourrit la fibre</li><li>Ingrédients clés: karité, avoine, huiles végétales</li><li>Mode d’utilisation: laisser poser 5 à 10 minutes puis rincer</li><li>Texture: masque crème onctueux</li><li>Type de cheveux: secs, abîmés ou sensibilisés</li><li>Résultats: cheveux plus doux, faciles à coiffer et lumineux</li></ul>',
        ),
        'Huile Capillaire Botanique' => array(
            'short' => 'Huile capillaire fine pour apporter brillance et nutrition sans alourdir.',
            'long'  => '<p>Cette huile capillaire botanique nourrit les longueurs et apporte un fini lumineux aux cheveux ternes ou secs. Sa texture fine s’applique en petite quantité pour préserver la légèreté.</p><p>Elle aide à lisser visuellement la fibre, sublimer la brillance et assouplir les pointes.</p><ul><li>Bénéfices: nourrit, illumine et discipline</li><li>Ingrédients clés: argan, jojoba, tournesol</li><li>Mode d’utilisation: appliquer quelques gouttes sur longueurs et pointes</li><li>Texture: huile sèche capillaire</li><li>Type de cheveux: secs, ternes ou indisciplinés</li><li>Résultats: cheveux plus brillants, doux et souples</li></ul>',
        ),
        'Après-Shampooing Aloe Vera & Karité' => array(
            'short' => 'Après-shampooing doux pour démêler instantanément et protéger les cheveux.',
            'long'  => '<p>Cet après-shampooing facilite le démêlage tout en apportant confort et douceur aux longueurs. Il laisse les cheveux souples sans effet lourd.</p><p>L’aloe vera apporte une sensation d’hydratation, tandis que le karité aide à nourrir et protéger la fibre capillaire.</p><ul><li>Bénéfices: démêle, adoucit et protège</li><li>Ingrédients clés: aloe vera, karité, huile d’amande douce</li><li>Mode d’utilisation: appliquer après le shampooing, laisser agir 1 à 2 minutes puis rincer</li><li>Texture: crème légère</li><li>Type de cheveux: tous types, surtout secs ou difficiles à démêler</li><li>Résultats: cheveux plus souples et faciles à coiffer</li></ul>',
        ),
        'Sérum Pointes Nourrissant' => array(
            'short' => 'Sérum sans rinçage pour protéger les pointes contre la casse et les frisottis.',
            'long'  => '<p>Ce sérum cible les pointes sèches et fragilisées. Il aide à lisser les frisottis, protéger les longueurs et améliorer l’aspect des pointes au quotidien.</p><p>Sa texture légère s’utilise en finition, sur cheveux secs ou humides, sans alourdir.</p><ul><li>Bénéfices: protège les pointes, limite les frisottis et apporte de la douceur</li><li>Ingrédients clés: argan, lin, vitamine E</li><li>Mode d’utilisation: chauffer une petite quantité entre les mains puis appliquer sur les pointes</li><li>Texture: sérum léger sans rinçage</li><li>Type de cheveux: cheveux secs, abîmés ou sujets aux frisottis</li><li>Résultats: pointes plus nettes et cheveux plus disciplinés</li></ul>',
        ),
        'Spray Protecteur Thermique' => array(
            'short' => 'Spray protecteur pour préparer les cheveux avant le séchage ou le lissage.',
            'long'  => '<p>Ce spray prépare les cheveux avant l’utilisation d’appareils chauffants. Il aide à préserver la fibre, faciliter le coiffage et maintenir un fini plus souple.</p><p>Sa brume légère se répartit facilement sur les longueurs sans coller ni alourdir.</p><ul><li>Bénéfices: protège, hydrate légèrement et facilite le coiffage</li><li>Ingrédients clés: avoine, protéines de blé, aloe vera</li><li>Mode d’utilisation: vaporiser sur cheveux humides avant brushing ou lissage</li><li>Texture: brume fine</li><li>Type de cheveux: tous types de cheveux</li><li>Résultats: cheveux mieux préparés, plus doux et plus brillants</li></ul>',
        ),
        'Éponge Konjac Naturelle' => array(
            'short' => 'Éponge douce pour nettoyer délicatement la peau et éliminer les impuretés.',
            'long'  => '<p>L’éponge Konjac Naturelle accompagne le nettoyage quotidien avec un geste doux, sensoriel et précis. Sa texture moelleuse aide à retirer les impuretés sans agresser la peau.</p><p>Elle s’utilise humidifiée, seule ou avec un nettoyant doux, puis se rince soigneusement après chaque utilisation.</p><ul><li>Avantages: nettoie, adoucit et affine le geste de nettoyage</li><li>Matériaux: fibres végétales de konjac et lien coton</li><li>Conseils d’utilisation: humidifier, masser le visage par mouvements circulaires, rincer puis laisser sécher</li><li>Résultats: peau plus nette, douce et confortable</li></ul>',
        ),
        'Brosse Cheveux Bambou' => array(
            'short' => 'Brosse en bambou pour démêler les cheveux tout en respectant la fibre capillaire.',
            'long'  => '<p>Cette brosse en bambou démêle les longueurs avec douceur et accompagne les routines capillaires naturelles. Ses picots souples aident à limiter la casse liée au brossage.</p><p>Elle s’utilise sur cheveux secs ou légèrement humides, en commençant par les pointes avant de remonter vers les racines.</p><ul><li>Avantages: démêle, masse le cuir chevelu et respecte la fibre</li><li>Matériaux: bambou, coussin souple et picots arrondis</li><li>Conseils d’utilisation: brosser délicatement des pointes vers les racines</li><li>Résultats: cheveux plus souples, disciplinés et brillants</li></ul>',
        ),
        'Gua Sha Quartz Rose' => array(
            'short' => 'Gua sha en quartz rose pour stimuler la microcirculation et raffermir la peau.',
            'long'  => '<p>Le Gua Sha Quartz Rose transforme l’application des soins en rituel de massage précis. Sa forme épouse les contours du visage pour accompagner les gestes drainants.</p><p>À utiliser avec une huile ou un sérum pour permettre à l’accessoire de glisser confortablement sur la peau.</p><ul><li>Avantages: stimule, détend les traits et raffermit visuellement</li><li>Matériaux: quartz rose poli</li><li>Conseils d’utilisation: masser du centre du visage vers l’extérieur avec une pression légère</li><li>Résultats: teint plus frais et peau visiblement reposée</li></ul>',
        ),
        'Roller Jade Naturel' => array(
            'short' => 'Roller en jade naturel pour apaiser la peau et réduire les poches.',
            'long'  => '<p>Le Roller Jade Naturel apporte une sensation de fraîcheur immédiate et accompagne les routines de soin du matin comme du soir.</p><p>Il s’utilise sur peau propre, après l’application d’un sérum ou d’une crème, pour masser délicatement les zones du visage.</p><ul><li>Avantages: apaise, rafraîchit et aide à décongestionner</li><li>Matériaux: jade naturel poli et monture métallique</li><li>Conseils d’utilisation: faire rouler du centre du visage vers l’extérieur</li><li>Résultats: peau plus fraîche et regard défatigué</li></ul>',
        ),
        'Trousse Beauté Cosm’Éthique' => array(
            'short' => 'Trousse élégante et durable pour transporter vos essentiels beauté.',
            'long'  => '<p>La Trousse Beauté Cosm’Éthique rassemble vos soins et accessoires dans un format élégant, pratique et durable. Son textile beige et son marquage bleu nuit prolongent l’identité premium de la marque.</p><p>Elle accompagne les routines à la maison, en déplacement ou dans une valise de week-end.</p><ul><li>Avantages: organise, protège et transporte les essentiels</li><li>Matériaux: coton beige, doublure résistante et fermeture zippée</li><li>Conseils d’utilisation: ranger les soins propres et refermer après usage</li><li>Résultats: routine mieux organisée et toujours accessible</li></ul>',
        ),
        'Set Premium Gua Sha + Roller' => array(
            'short' => 'Duo premium pour les massages visage et les routines bien-être.',
            'long'  => '<p>Le Set Premium Gua Sha + Roller réunit deux accessoires complémentaires pour masser, rafraîchir et sublimer la peau au quotidien.</p><p>Le gua sha accompagne les gestes profonds et sculptants, tandis que le roller offre un massage doux et rafraîchissant.</p><ul><li>Avantages: masse, apaise et complète l’application des soins</li><li>Matériaux: quartz rose, jade naturel et montures métalliques</li><li>Conseils d’utilisation: appliquer un soin puis masser de l’intérieur vers l’extérieur du visage</li><li>Résultats: peau plus détendue, lumineuse et confortable</li></ul>',
        ),
        'Pack Routine Visage' => array(
            'short' => 'Une routine visage complète avec trois soins ciblés et une trousse Cosm’Éthique.',
            'long'  => '<p>Le Pack Routine Visage réunit uniquement des références déjà présentes dans la boutique Cosm’Éthique pour composer un rituel naturel, précis et élégant.</p><p><strong>Contenu du pack:</strong> Sérum Éclat à la Rose, Crème Hydratante Sauge & Camomille, Masque Purifiant Argile Verte et Trousse Beauté Cosm’Éthique.</p><ul><li>Prix habituel: 99,60 €</li><li>Prix pack: 79,90 €</li><li>Économie réalisée: 19,70 €</li><li>Avantages: hydrate, illumine, purifie et organise la routine</li><li>Conseils d’utilisation: appliquer le sérum, poursuivre avec la crème, puis utiliser le masque 1 à 2 fois par semaine</li><li>Résultats: peau plus nette, souple et lumineuse</li></ul>',
        ),
        'Pack Routine Corps' => array(
            'short' => 'Un rituel corps nourrissant avec baume, huile, lavande fine et trousse Cosm’Éthique.',
            'long'  => '<p>Le Pack Routine Corps associe exclusivement des produits existants de la boutique pour un rituel nourrissant, sensoriel et prêt à offrir.</p><p><strong>Contenu du pack:</strong> Baume Corps Karité & Amande, Huile Sèche Botanique, Huile Essentielle Lavande Fine et Trousse Beauté Cosm’Éthique.</p><ul><li>Prix habituel: 92,60 €</li><li>Prix pack: 74,90 €</li><li>Économie réalisée: 17,70 €</li><li>Avantages: nourrit, satine, apaise et transporte les essentiels</li><li>Conseils d’utilisation: appliquer le baume sur les zones sèches, l’huile en finition, puis réserver la lavande aux rituels bien-être adaptés</li><li>Résultats: peau plus douce, souple et confortable</li></ul>',
        ),
        'Pack Routine Cheveux' => array(
            'short' => 'Une routine cheveux complète avec shampoing, masque, huile sèche et trousse.',
            'long'  => '<p>Le Pack Routine Cheveux réunit des soins capillaires déjà présents dans le catalogue pour nettoyer, réparer et sublimer les longueurs.</p><p><strong>Contenu du pack:</strong> Shampooing Doux Sauge & Ortie, Masque Cheveux Réparateur, Huile Sèche Botanique et Trousse Beauté Cosm’Éthique.</p><ul><li>Prix habituel: 97,60 €</li><li>Prix pack: 79,90 €</li><li>Économie réalisée: 17,70 €</li><li>Avantages: nettoie, répare, nourrit, sublime et organise la routine</li><li>Conseils d’utilisation: laver avec le shampooing, laisser poser le masque sur les longueurs, puis appliquer quelques gouttes d’huile en finition</li><li>Résultats: cheveux plus doux, brillants et faciles à coiffer</li></ul>',
        ),
        'Pack Routine Premium' => array(
            'short' => 'L’expérience Cosm’Éthique complète avec les meilleures références de la boutique.',
            'long'  => '<p>Le Pack Routine Premium rassemble les meilleures références existantes de la boutique Cosm’Éthique dans un coffret complet, pensé comme une expérience beauté globale et haut de gamme.</p><p><strong>Contenu du pack:</strong> Sérum Éclat à la Rose, Crème Hydratante Sauge & Camomille, Masque Purifiant Argile Verte, Baume Corps Karité & Amande, Huile Sèche Botanique, Shampooing Doux Sauge & Ortie, Masque Cheveux Réparateur, Huile Essentielle Lavande Fine et Grande Trousse Cosm’Éthique.</p><ul><li>Prix habituel: 210,10 €</li><li>Prix pack: 169,90 €</li><li>Économie réalisée: 40,20 €</li><li>Avantages: routine complète visage, corps et cheveux</li><li>Conseils d’utilisation: organiser les soins dans la trousse et suivre chaque rituel selon le besoin de la peau ou des cheveux</li><li>Résultats: une routine premium prête à offrir ou à adopter</li></ul>',
        ),
        'Déodorant Naturel' => array(
            'short' => 'Déodorant doux au coton et à la sauge pour une sensation de fraîcheur naturelle.',
            'long'  => '<p>Ce déodorant naturel accompagne le quotidien avec une formule douce, pensée pour respecter la peau tout en apportant une sensation de confort durable.</p><p>Sa texture s’applique facilement, ne colle pas et laisse une finition propre sous les vêtements.</p><ul><li>Bénéfices: aide à neutraliser les odeurs et apporte une sensation fraîche</li><li>Ingrédients clés: sauge, coton, glycérine végétale</li><li>Mode d’utilisation: appliquer sur peau propre et sèche</li><li>Texture: crème légère au fini sec</li><li>Type de peau: tous types de peaux</li><li>Résultats: peau confortable et routine plus naturelle</li></ul>',
        ),
        'Lait Corps' => array(
            'short' => 'Lait corps léger pour hydrater durablement les peaux normales à sèches.',
            'long'  => '<p>Ce lait corps hydrate la peau avec une texture fluide et confortable, pensée pour une application rapide au quotidien.</p><p>Les actifs humectants et les huiles végétales aident à maintenir la souplesse de la peau, sans effet collant ni sensation lourde.</p><ul><li>Bénéfices: hydrate durablement et adoucit</li><li>Ingrédients clés: coton, avoine, amande douce</li><li>Mode d’utilisation: appliquer matin ou soir sur peau propre</li><li>Texture: lait fluide, frais et non gras</li><li>Type de peau: normales à sèches</li><li>Résultats: peau confortable, souple et délicatement parfumée</li></ul>',
        ),
        'Gommage Corps' => array(
            'short' => 'Gommage corps au sucre et à la lavande pour lisser la peau en douceur.',
            'long'  => '<p>Ce gommage exfolie délicatement la peau grâce à des grains de sucre, tout en laissant une sensation douce et lumineuse après rinçage.</p><p>La lavande apporte une dimension sensorielle apaisante, tandis que les huiles végétales aident à préserver le confort cutané.</p><ul><li>Bénéfices: exfolie, lisse et illumine</li><li>Ingrédients clés: sucre, lavande fine, amande douce</li><li>Mode d’utilisation: masser sur peau humide puis rincer</li><li>Texture: grains fondants dans une base nourrissante</li><li>Type de peau: tous types de peaux, hors peau irritée</li><li>Résultats: peau douce, régulière et plus lumineuse</li></ul>',
        ),
        'Huile de Massage' => array(
            'short' => 'Huile de massage satinée à l’amande et à la lavande pour assouplir la peau.',
            'long'  => '<p>Cette huile de massage transforme l’application en rituel sensoriel. Sa texture glisse sur la peau, facilite le massage et laisse un fini satiné sans effet lourd.</p><p>L’amande douce nourrit et adoucit, tandis que la lavande apporte une signature aromatique apaisante.</p><ul><li>Bénéfices: assouplit, nourrit et accompagne le massage</li><li>Ingrédients clés: amande douce, lavande, tournesol</li><li>Mode d’utilisation: chauffer quelques gouttes entre les mains puis masser</li><li>Texture: huile fine au toucher soyeux</li><li>Type de peau: normales à sèches</li><li>Résultats: peau plus souple et lumineuse</li></ul>',
        ),
        'Après-shampoing' => array(
            'short' => 'Après-shampoing doux pour démêler instantanément et protéger les cheveux.',
            'long'  => '<p>Cet après-shampoing facilite le démêlage tout en apportant confort et douceur aux longueurs. Il laisse les cheveux souples sans effet lourd.</p><p>L’aloe vera apporte une sensation d’hydratation, tandis que le karité aide à nourrir et protéger la fibre capillaire.</p><ul><li>Bénéfices: démêle, adoucit et protège</li><li>Ingrédients clés: aloe vera, karité, huile d’amande douce</li><li>Mode d’utilisation: appliquer après le shampooing, laisser agir 1 à 2 minutes puis rincer</li><li>Texture: crème légère</li><li>Type de cheveux: tous types, surtout secs ou difficiles à démêler</li><li>Résultats: cheveux plus souples et faciles à coiffer</li></ul>',
        ),
        'Sérum Capillaire' => array(
            'short' => 'Sérum sans rinçage pour protéger les pointes contre la casse et les frisottis.',
            'long'  => '<p>Ce sérum cible les pointes sèches et fragilisées. Il aide à lisser les frisottis, protéger les longueurs et améliorer l’aspect des pointes au quotidien.</p><p>Sa texture légère s’utilise en finition, sur cheveux secs ou humides, sans alourdir.</p><ul><li>Bénéfices: protège les pointes, limite les frisottis et apporte de la douceur</li><li>Ingrédients clés: argan, lin, vitamine E</li><li>Mode d’utilisation: chauffer une petite quantité entre les mains puis appliquer sur les pointes</li><li>Texture: sérum léger sans rinçage</li><li>Type de cheveux: cheveux secs, abîmés ou sujets aux frisottis</li><li>Résultats: pointes plus nettes et cheveux plus disciplinés</li></ul>',
        ),
        'Huile Capillaire' => array(
            'short' => 'Huile capillaire fine pour apporter brillance et nutrition sans alourdir.',
            'long'  => '<p>Cette huile capillaire nourrit les longueurs et apporte un fini lumineux aux cheveux ternes ou secs. Sa texture fine s’applique en petite quantité pour préserver la légèreté.</p><p>Elle aide à lisser visuellement la fibre, sublimer la brillance et assouplir les pointes.</p><ul><li>Bénéfices: nourrit, illumine et discipline</li><li>Ingrédients clés: argan, jojoba, tournesol</li><li>Mode d’utilisation: appliquer quelques gouttes sur longueurs et pointes</li><li>Texture: huile sèche capillaire</li><li>Type de cheveux: secs, ternes ou indisciplinés</li><li>Résultats: cheveux plus brillants, doux et souples</li></ul>',
        ),
        'Spray Protecteur' => array(
            'short' => 'Spray protecteur pour préparer les cheveux avant le séchage ou le lissage.',
            'long'  => '<p>Ce spray prépare les cheveux avant l’utilisation d’appareils chauffants. Il aide à préserver la fibre, faciliter le coiffage et maintenir un fini plus souple.</p><p>Sa brume légère se répartit facilement sur les longueurs sans coller ni alourdir.</p><ul><li>Bénéfices: protège, hydrate légèrement et facilite le coiffage</li><li>Ingrédients clés: avoine, protéines de blé, aloe vera</li><li>Mode d’utilisation: vaporiser sur cheveux humides avant brushing ou lissage</li><li>Texture: brume fine</li><li>Type de cheveux: tous types de cheveux</li><li>Résultats: cheveux mieux préparés, plus doux et plus brillants</li></ul>',
        ),
        'Huile Essentielle Lavande Fine' => array(
            'short' => 'Huile essentielle de lavande fine pour les rituels bien-être.',
            'long'  => '<p>Une huile essentielle de lavande fine sélectionnée pour accompagner les moments de détente et les rituels aromatiques. Son profil olfactif floral et herbacé crée une ambiance douce et apaisante.</p><p>Elle peut être utilisée selon les recommandations habituelles de l’aromathérapie. Toujours respecter les précautions d’usage et éviter l’utilisation non diluée sur la peau.</p><ul><li>Parfum floral, fin et relaxant</li><li>Format pratique pour les rituels maison</li><li>À utiliser avec précaution et selon les conseils adaptés</li></ul>',
        ),
    );
}

function theme_perso_catalog_categories() {
    return array(
        'visage'        => array(
            'name'        => 'Visage',
            'description' => 'Sérums, crèmes et masques naturels pour illuminer le teint.',
            'image'       => theme_perso_product_asset_url( 'category-soins-visage-hero.png' ),
        ),
        'corps'         => array(
            'name'        => 'Corps',
            'description' => 'Huiles, baumes et textures enveloppantes pour nourrir la peau.',
            'image'       => theme_perso_product_asset_url( 'category-soins-corps-hero.png' ),
        ),
        'cheveux'       => array(
            'name'        => 'Cheveux',
            'description' => 'Soins doux pour brillance, confort du cuir chevelu et nutrition.',
            'image'       => theme_perso_product_asset_url( 'category-soins-cheveux-hero.png' ),
        ),
        'aromatherapie' => array(
            'name'        => 'Aromathérapie',
            'description' => 'Huiles essentielles et rituels sensoriels pour le bien-être.',
            'image'       => theme_perso_product_asset_url( 'photo-huile-essentielle-lavande-fine.png' ),
        ),
    );
}

function theme_perso_shop_collection_category_config( $collection ) {
    $configs = array(
        'visage'  => array(
            'name'        => 'Soins Visage',
            'slug'        => 'soins-visage',
            'description' => 'Soins naturels premium pour hydrater, protéger et révéler l’éclat de la peau.',
            'candidates'  => array( 'Soins Visage', 'Soins du visage', 'Visage' ),
            'products'    => 'theme_perso_visage_collection_products',
        ),
        'corps'   => array(
            'name'        => 'Soins Corps',
            'slug'        => 'soins-corps',
            'description' => 'Soins naturels premium pour nourrir, hydrater et sublimer la peau du corps.',
            'candidates'  => array( 'Soins Corps', 'Soins du corps', 'Corps' ),
            'products'    => 'theme_perso_corps_collection_products',
        ),
        'cheveux' => array(
            'name'        => 'Soins Cheveux',
            'slug'        => 'soins-cheveux',
            'description' => 'Soins capillaires naturels premium pour nourrir, réparer et sublimer les cheveux.',
            'candidates'  => array( 'Soins Cheveux', 'Soins cheveux', 'Cheveux' ),
            'products'    => 'theme_perso_cheveux_collection_products',
        ),
    );

    return isset( $configs[ $collection ] ) ? $configs[ $collection ] : null;
}

function theme_perso_find_shop_collection_term( $config ) {
    if ( empty( $config['candidates'] ) ) {
        return null;
    }

    $terms = get_terms(
        array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
        )
    );

    if ( is_wp_error( $terms ) || empty( $terms ) ) {
        return null;
    }

    $candidate_slugs = array_map( 'sanitize_title', $config['candidates'] );

    foreach ( $terms as $term ) {
        $term_name_slug = sanitize_title( $term->name );

        if ( in_array( $term_name_slug, $candidate_slugs, true ) || in_array( $term->slug, $candidate_slugs, true ) ) {
            return $term;
        }
    }

    return null;
}

function theme_perso_ensure_shop_collection_term( $collection ) {
    if ( ! class_exists( 'WooCommerce' ) || ! taxonomy_exists( 'product_cat' ) ) {
        return null;
    }

    $config = theme_perso_shop_collection_category_config( $collection );

    if ( ! $config ) {
        return null;
    }

    $canonical = get_term_by( 'slug', $config['slug'], 'product_cat' );

    if ( $canonical && ! is_wp_error( $canonical ) ) {
        wp_update_term(
            (int) $canonical->term_id,
            'product_cat',
            array(
                'name'        => $config['name'],
                'description' => $config['description'],
            )
        );

        return get_term( (int) $canonical->term_id, 'product_cat' );
    }

    $term = theme_perso_find_shop_collection_term( $config );

    if ( $term ) {
        return $term;
    }

    $created = wp_insert_term(
        $config['name'],
        'product_cat',
        array(
            'slug'        => $config['slug'],
            'description' => $config['description'],
        )
    );

    if ( is_wp_error( $created ) ) {
        return null;
    }

    delete_option( 'rewrite_rules' );

    return get_term( (int) $created['term_id'], 'product_cat' );
}

function theme_perso_assign_collection_products_to_term( $collection, $term_id ) {
    $config = theme_perso_shop_collection_category_config( $collection );

    if ( ! $config || empty( $config['products'] ) || ! function_exists( $config['products'] ) || ! function_exists( 'wc_get_product' ) ) {
        return;
    }

    $products = call_user_func( $config['products'] );

    foreach ( array_keys( $products ) as $title ) {
        $existing = theme_perso_get_seed_product( $title );

        if ( ! $existing ) {
            continue;
        }

        $product = wc_get_product( $existing->ID );

        if ( ! $product ) {
            continue;
        }

        $category_ids = array_map( 'intval', $product->get_category_ids() );

        if ( in_array( (int) $term_id, $category_ids, true ) ) {
            continue;
        }

        $category_ids[] = (int) $term_id;
        $product->set_category_ids( array_values( array_unique( $category_ids ) ) );
        $product->save();
    }
}

function theme_perso_get_shop_collection_url( $collection, $fallback_url = '' ) {
    $fallback_url = $fallback_url ? $fallback_url : home_url( '/' );

    if ( ! class_exists( 'WooCommerce' ) || ! taxonomy_exists( 'product_cat' ) ) {
        return $fallback_url;
    }

    $term = theme_perso_ensure_shop_collection_term( $collection );

    if ( ! $term || is_wp_error( $term ) ) {
        return $fallback_url;
    }

    theme_perso_assign_collection_products_to_term( $collection, (int) $term->term_id );

    $link = get_term_link( (int) $term->term_id, 'product_cat' );

    return ! is_wp_error( $link ) ? $link : $fallback_url;
}

function theme_perso_get_product_cat_url_by_slugs( $slugs, $fallback_url = '' ) {
    $fallback_url = $fallback_url ? $fallback_url : home_url( '/' );

    if ( ! taxonomy_exists( 'product_cat' ) ) {
        return $fallback_url;
    }

    foreach ( (array) $slugs as $slug ) {
        $term = get_term_by( 'slug', sanitize_title( $slug ), 'product_cat' );

        if ( ! $term || is_wp_error( $term ) ) {
            continue;
        }

        $link = get_term_link( $term, 'product_cat' );

        if ( ! is_wp_error( $link ) ) {
            return $link;
        }
    }

    return $fallback_url;
}

function theme_perso_normalize_search_text( $value ) {
    $value = wp_strip_all_tags( (string) $value );
    $value = remove_accents( $value );
    $value = strtolower( $value );
    $value = preg_replace( '/[^a-z0-9]+/u', ' ', $value );
    $value = preg_replace( '/\s+/', ' ', $value );

    return trim( $value );
}

function theme_perso_search_text_score( $query, $candidate, $base = 0 ) {
    $query     = theme_perso_normalize_search_text( $query );
    $candidate = theme_perso_normalize_search_text( $candidate );

    if ( '' === $query || '' === $candidate ) {
        return 0;
    }

    if ( $query === $candidate ) {
        return $base + 100;
    }

    if ( 0 === strpos( $candidate, $query ) ) {
        return $base + 86;
    }

    if ( false !== strpos( $candidate, $query ) ) {
        return $base + 72;
    }

    $query_words     = preg_split( '/\s+/', $query );
    $candidate_words = preg_split( '/\s+/', $candidate );
    $matches         = 0;

    foreach ( $query_words as $word ) {
        if ( strlen( $word ) < 3 ) {
            continue;
        }

        foreach ( $candidate_words as $candidate_word ) {
            if ( false !== strpos( $candidate_word, $word ) || false !== strpos( $word, $candidate_word ) ) {
                $matches++;
                break;
            }

            $distance  = levenshtein( $word, $candidate_word );
            $threshold = strlen( $word ) <= 5 ? 1 : 2;

            if ( $distance <= $threshold ) {
                $matches++;
                break;
            }
        }
    }

    if ( $matches > 0 ) {
        return $base + min( 64, 28 + ( $matches * 12 ) );
    }

    return 0;
}

function theme_perso_get_page_url_by_slug( $slug, $fallback_url = '' ) {
    $page = get_page_by_path( $slug );

    if ( $page ) {
        return get_permalink( $page );
    }

    return $fallback_url ? $fallback_url : home_url( '/' . trim( $slug, '/' ) . '/' );
}

function theme_perso_smart_search_routes() {
    $shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );

    return array(
        array(
            'title'    => __( 'Soins du visage', 'theme-perso' ),
            'type'     => __( 'Catégorie', 'theme-perso' ),
            'url'      => theme_perso_get_shop_collection_url( 'visage', $shop_url ),
            'keywords' => array( 'visage', 'soins visage', 'soins du visage', 'face', 'serum', 'sérum', 'creme', 'crème', 'peau', 'visgae' ),
            'score'    => 96,
        ),
        array(
            'title'    => __( 'Soins du corps', 'theme-perso' ),
            'type'     => __( 'Catégorie', 'theme-perso' ),
            'url'      => theme_perso_get_shop_collection_url( 'corps', $shop_url ),
            'keywords' => array( 'corps', 'soins corps', 'soins du corps', 'body', 'baume', 'huile seche', 'huile sèche', 'gommage', 'lait corps' ),
            'score'    => 96,
        ),
        array(
            'title'    => __( 'Soins Cheveux', 'theme-perso' ),
            'type'     => __( 'Catégorie', 'theme-perso' ),
            'url'      => theme_perso_get_shop_collection_url( 'cheveux', $shop_url ),
            'keywords' => array( 'cheveux', 'soins cheveux', 'capillaire', 'shampooing', 'shampoing', 'masque cheveux', 'apres shampooing', 'après shampooing' ),
            'score'    => 96,
        ),
        array(
            'title'    => __( 'Accessoires Beauté', 'theme-perso' ),
            'type'     => __( 'Catégorie', 'theme-perso' ),
            'url'      => theme_perso_get_product_cat_url_by_slugs( array( 'accessoires-beaute', 'accessoires' ), $shop_url ),
            'keywords' => array( 'accessoires', 'accessoire', 'gua sha', 'roller jade', 'trousse', 'eponge', 'éponge', 'brosse' ),
            'score'    => 94,
        ),
        array(
            'title'    => __( 'Packs & Coffrets', 'theme-perso' ),
            'type'     => __( 'Catégorie', 'theme-perso' ),
            'url'      => theme_perso_get_product_cat_url_by_slugs( array( 'packs', 'packs-coffrets', 'coffrets' ), $shop_url ),
            'keywords' => array( 'pack', 'packs', 'coffret', 'coffrets', 'routine complete', 'routine complète' ),
            'score'    => 94,
        ),
        array(
            'title'    => __( 'Promotions', 'theme-perso' ),
            'type'     => __( 'Collection', 'theme-perso' ),
            'url'      => add_query_arg( 'cosmethique_filter', 'sale', $shop_url ),
            'keywords' => array( 'promotion', 'promotions', 'promo', 'offre', 'soldes', 'remise' ),
            'score'    => 92,
        ),
        array(
            'title'    => __( 'Nouveautés', 'theme-perso' ),
            'type'     => __( 'Collection', 'theme-perso' ),
            'url'      => add_query_arg( 'orderby', 'date', $shop_url ),
            'keywords' => array( 'nouveaute', 'nouveauté', 'nouveautes', 'nouveautés', 'nouveau', 'nouveaux', 'new' ),
            'score'    => 92,
        ),
        array(
            'title'    => __( 'Nos best-sellers', 'theme-perso' ),
            'type'     => __( 'Collection', 'theme-perso' ),
            'url'      => add_query_arg( 'orderby', 'popularity', $shop_url ),
            'keywords' => array( 'best seller', 'best sellers', 'bestseller', 'best-seller', 'meilleures ventes', 'populaire', 'popularite', 'popularité' ),
            'score'    => 92,
        ),
        array(
            'title'    => __( 'Diagnostic Beauté', 'theme-perso' ),
            'type'     => __( 'Page', 'theme-perso' ),
            'url'      => theme_perso_get_page_url_by_slug( 'diagnostic', home_url( '/diagnostic/' ) ),
            'keywords' => array( 'diagnostic', 'routine', 'routine ideale', 'routine idéale', 'test peau', 'questionnaire' ),
            'score'    => 90,
        ),
        array(
            'title'    => __( 'Blog', 'theme-perso' ),
            'type'     => __( 'Page', 'theme-perso' ),
            'url'      => theme_perso_get_page_url_by_slug( 'blog', home_url( '/blog/' ) ),
            'keywords' => array( 'blog', 'article', 'conseils', 'inspirations', 'routine skincare' ),
            'score'    => 88,
        ),
        array(
            'title'    => __( 'Contact', 'theme-perso' ),
            'type'     => __( 'Page', 'theme-perso' ),
            'url'      => theme_perso_get_page_url_by_slug( 'contact', home_url( '/contact/' ) ),
            'keywords' => array( 'contact', 'nous contacter', 'message', 'service client', 'aide' ),
            'score'    => 88,
        ),
        array(
            'title'    => __( 'Devenir franchisé', 'theme-perso' ),
            'type'     => __( 'Page', 'theme-perso' ),
            'url'      => theme_perso_get_page_url_by_slug( 'devenir-franchise', home_url( '/devenir-franchise/' ) ),
            'keywords' => array( 'franchise', 'franchisee', 'franchisé', 'devenir franchise', 'devenir franchisé', 'ouvrir boutique' ),
            'score'    => 88,
        ),
        array(
            'title'    => __( 'Notre histoire', 'theme-perso' ),
            'type'     => __( 'Page', 'theme-perso' ),
            'url'      => theme_perso_get_page_url_by_slug( 'qui-sommes-nous', home_url( '/qui-sommes-nous/' ) ),
            'keywords' => array( 'notre histoire', 'qui sommes nous', 'qui sommes-nous', 'marque', 'engagements', 'ingredients', 'ingrédients' ),
            'score'    => 86,
        ),
    );
}

function theme_perso_smart_search_no_result_links() {
    $shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );

    return array(
        array( 'label' => __( 'Soins du visage', 'theme-perso' ), 'url' => theme_perso_get_shop_collection_url( 'visage', $shop_url ) ),
        array( 'label' => __( 'Soins du corps', 'theme-perso' ), 'url' => theme_perso_get_shop_collection_url( 'corps', $shop_url ) ),
        array( 'label' => __( 'Soins Cheveux', 'theme-perso' ), 'url' => theme_perso_get_shop_collection_url( 'cheveux', $shop_url ) ),
        array( 'label' => __( 'Accessoires Beauté', 'theme-perso' ), 'url' => theme_perso_get_product_cat_url_by_slugs( array( 'accessoires-beaute', 'accessoires' ), $shop_url ) ),
    );
}

function theme_perso_smart_search_script_data() {
    $routes = array();

    foreach ( theme_perso_smart_search_routes() as $route ) {
        $routes[] = array(
            'url'      => esc_url_raw( $route['url'] ),
            'keywords' => array_map( 'theme_perso_normalize_search_text', $route['keywords'] ),
        );
    }

    return array(
        'ajaxUrl'       => admin_url( 'admin-ajax.php' ),
        'nonce'         => wp_create_nonce( 'theme_perso_smart_search' ),
        'minChars'      => 2,
        'routes'        => $routes,
        'noResultLinks' => theme_perso_smart_search_no_result_links(),
        'labels'        => array(
            'loading'       => __( 'Recherche en cours…', 'theme-perso' ),
            'noResults'     => __( 'Aucun résultat trouvé. Découvrez nos catégories principales.', 'theme-perso' ),
            'suggestions'   => __( 'Suggestions de recherche', 'theme-perso' ),
            'viewAll'       => __( 'Voir tous les résultats', 'theme-perso' ),
            'product'       => __( 'Produit', 'theme-perso' ),
            'category'      => __( 'Catégorie', 'theme-perso' ),
            'page'          => __( 'Page', 'theme-perso' ),
            'collection'    => __( 'Collection', 'theme-perso' ),
            'minCharacters' => __( 'Saisissez au moins deux caractères.', 'theme-perso' ),
        ),
    );
}

function theme_perso_add_smart_search_item( &$items, $item ) {
    if ( empty( $item['url'] ) || empty( $item['title'] ) ) {
        return;
    }

    $key = md5( $item['url'] . '|' . $item['title'] );

    if ( isset( $items[ $key ] ) && (int) $items[ $key ]['score'] >= (int) $item['score'] ) {
        return;
    }

    $items[ $key ] = $item;
}

function theme_perso_get_product_search_text( $product ) {
    if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
        return '';
    }

    $product_id = $product->get_id();
    $terms      = get_the_terms( $product_id, 'product_cat' );
    $tags       = get_the_terms( $product_id, 'product_tag' );
    $term_names = array();

    foreach ( array( $terms, $tags ) as $term_group ) {
        if ( is_wp_error( $term_group ) || empty( $term_group ) ) {
            continue;
        }

        foreach ( $term_group as $term ) {
            $term_names[] = $term->name;
            $term_names[] = $term->slug;
        }
    }

    return implode(
        ' ',
        array_filter(
            array(
                $product->get_name(),
                $product->get_short_description(),
                $product->get_description(),
                implode( ' ', $term_names ),
                theme_perso_get_product_search_aliases( $product ),
            )
        )
    );
}

function theme_perso_get_product_search_aliases( $product ) {
    if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
        return '';
    }

    $name    = theme_perso_normalize_search_text( $product->get_name() );
    $aliases = array();

    $rules = array(
        'serum'      => array( 'sérum', 'serum', 'rose', 'éclat', 'eclat', 'hydratant', 'anti âge', 'anti age', 'vitamine c', 'peau lumineuse', 'routine visage' ),
        'creme'      => array( 'crème', 'creme', 'hydratante', 'hydratant', 'camomille', 'sauge', 'peau sensible', 'apaiser', 'visage', 'texture crème' ),
        'masque'     => array( 'masque', 'nutrition', 'purifiant', 'argile', 'imperfections', 'pores', 'peau grasse', 'cheveux', 'réparateur', 'reparateur' ),
        'huile'      => array( 'huile', 'lavande', 'botanique', 'corps', 'nourrissant', 'nourrissante', 'aromathérapie', 'aromatherapie', 'relaxant' ),
        'baume'      => array( 'baume', 'karité', 'karite', 'amande', 'corps', 'peau sèche', 'peau seche', 'nutrition intense' ),
        'shampooing' => array( 'shampooing', 'shampoing', 'cheveux', 'cuir chevelu', 'sauge', 'ortie', 'lavage doux' ),
        'gel'        => array( 'gel', 'nettoyant', 'aloe vera', 'visage', 'nettoyage', 'peau mixte' ),
        'lotion'     => array( 'lotion', 'tonique', 'fleur d oranger', 'fleur d’oranger', 'rafraichir', 'rafraîchir', 'visage' ),
        'gommage'    => array( 'gommage', 'sucre', 'lavande', 'exfoliant', 'exfoliation', 'corps' ),
        'roller'     => array( 'roller', 'jade', 'accessoire', 'massage visage', 'routine beauté' ),
        'gua'        => array( 'gua sha', 'quartz rose', 'accessoire', 'massage visage', 'peau ferme' ),
        'trousse'    => array( 'trousse', 'pochette', 'accessoire', 'voyage', 'routine complète' ),
        'pack'       => array( 'pack', 'coffret', 'routine', 'routine complète', 'cadeau', 'bundle' ),
    );

    foreach ( $rules as $needle => $words ) {
        if ( false !== strpos( $name, $needle ) ) {
            $aliases = array_merge( $aliases, $words );
        }
    }

    if ( false !== strpos( $name, 'cheveux' ) || false !== strpos( $name, 'capillaire' ) ) {
        $aliases[] = 'soins cheveux';
        $aliases[] = 'capillaire';
    }

    return implode( ' ', array_unique( $aliases ) );
}

function theme_perso_smart_search_product_results( $query ) {
    if ( ! class_exists( 'WooCommerce' ) || ! function_exists( 'wc_get_products' ) ) {
        return array();
    }

    $products = wc_get_products(
        array(
            'status' => 'publish',
            'limit'  => 80,
            'return' => 'objects',
        )
    );
    $results  = array();

    foreach ( $products as $product ) {
        if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
            continue;
        }

        $title_score = theme_perso_search_text_score( $query, $product->get_name(), 24 );
        $full_score  = theme_perso_search_text_score( $query, theme_perso_get_product_search_text( $product ), 0 );
        $score       = max( $title_score, $full_score );

        if ( $score < 30 ) {
            continue;
        }

        $product_id = $product->get_id();
        $terms      = get_the_terms( $product_id, 'product_cat' );
        $category   = '';

        if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
            $category = $terms[0]->name;
        }

        $image = get_the_post_thumbnail_url( $product_id, 'thumbnail' );

        if ( ! $image && function_exists( 'wc_placeholder_img_src' ) ) {
            $image = wc_placeholder_img_src( 'thumbnail' );
        }

        $results[] = array(
            'title'    => $product->get_name(),
            'url'      => get_permalink( $product_id ),
            'type'     => __( 'Produit', 'theme-perso' ),
            'meta'     => $category,
            'price'    => wp_strip_all_tags( $product->get_price_html() ),
            'image'    => $image,
            'score'    => $score,
            'priority' => 1,
        );
    }

    return $results;
}

function theme_perso_smart_search_category_results( $query ) {
    if ( ! taxonomy_exists( 'product_cat' ) ) {
        return array();
    }

    $terms = get_terms(
        array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
        )
    );

    if ( is_wp_error( $terms ) || empty( $terms ) ) {
        return array();
    }

    $results = array();

    foreach ( $terms as $term ) {
        $score = theme_perso_search_text_score( $query, $term->name . ' ' . $term->slug . ' ' . $term->description, 18 );

        if ( $score < 30 ) {
            continue;
        }

        $link = get_term_link( $term, 'product_cat' );

        if ( is_wp_error( $link ) ) {
            continue;
        }

        $results[] = array(
            'title'    => $term->name,
            'url'      => $link,
            'type'     => __( 'Catégorie', 'theme-perso' ),
            'meta'     => sprintf( _n( '%s produit', '%s produits', (int) $term->count, 'theme-perso' ), number_format_i18n( (int) $term->count ) ),
            'price'    => '',
            'image'    => '',
            'score'    => $score,
            'priority' => 2,
        );
    }

    return $results;
}

function theme_perso_smart_search_page_results( $query ) {
    $pages = get_posts(
        array(
            'post_type'      => 'page',
            'post_status'    => 'publish',
            'posts_per_page' => 40,
        )
    );
    $results = array();

    foreach ( $pages as $page ) {
        $score = theme_perso_search_text_score( $query, $page->post_title . ' ' . $page->post_excerpt . ' ' . $page->post_content . ' ' . $page->post_name, 6 );

        if ( $score < 35 ) {
            continue;
        }

        $results[] = array(
            'title'    => get_the_title( $page ),
            'url'      => get_permalink( $page ),
            'type'     => __( 'Page', 'theme-perso' ),
            'meta'     => '',
            'price'    => '',
            'image'    => '',
            'score'    => $score,
            'priority' => 4,
        );
    }

    return $results;
}

function theme_perso_smart_search_route_results( $query ) {
    $results = array();

    foreach ( theme_perso_smart_search_routes() as $route ) {
        $score = 0;

        foreach ( $route['keywords'] as $keyword ) {
            $score = max( $score, theme_perso_search_text_score( $query, $keyword, (int) $route['score'] - 70 ) );
        }

        if ( $score < 35 ) {
            continue;
        }

        $results[] = array(
            'title'    => $route['title'],
            'url'      => $route['url'],
            'type'     => $route['type'],
            'meta'     => '',
            'price'    => '',
            'image'    => '',
            'score'    => $score + 20,
            'priority' => 0,
        );
    }

    return $results;
}

function theme_perso_smart_search() {
    check_ajax_referer( 'theme_perso_smart_search', 'nonce' );

    $query = isset( $_GET['term'] ) ? sanitize_text_field( wp_unslash( $_GET['term'] ) ) : '';

    if ( strlen( theme_perso_normalize_search_text( $query ) ) < 2 ) {
        wp_send_json_success(
            array(
                'results'       => array(),
                'noResultLinks' => theme_perso_smart_search_no_result_links(),
            )
        );
    }

    $items = array();

    foreach ( theme_perso_smart_search_route_results( $query ) as $item ) {
        theme_perso_add_smart_search_item( $items, $item );
    }

    foreach ( theme_perso_smart_search_category_results( $query ) as $item ) {
        theme_perso_add_smart_search_item( $items, $item );
    }

    foreach ( theme_perso_smart_search_product_results( $query ) as $item ) {
        theme_perso_add_smart_search_item( $items, $item );
    }

    foreach ( theme_perso_smart_search_page_results( $query ) as $item ) {
        theme_perso_add_smart_search_item( $items, $item );
    }

    $results = array_values( $items );

    usort(
        $results,
        function ( $a, $b ) {
            if ( (int) $a['score'] === (int) $b['score'] ) {
                return (int) $a['priority'] <=> (int) $b['priority'];
            }

            return (int) $b['score'] <=> (int) $a['score'];
        }
    );

    $results = array_slice( $results, 0, 10 );
    $results = array_map(
        function ( $item ) {
            return array(
                'title' => html_entity_decode( wp_strip_all_tags( $item['title'] ), ENT_QUOTES, get_bloginfo( 'charset' ) ),
                'url'   => esc_url_raw( $item['url'] ),
                'type'  => html_entity_decode( wp_strip_all_tags( $item['type'] ), ENT_QUOTES, get_bloginfo( 'charset' ) ),
                'meta'  => html_entity_decode( wp_strip_all_tags( $item['meta'] ), ENT_QUOTES, get_bloginfo( 'charset' ) ),
                'price' => html_entity_decode( wp_strip_all_tags( $item['price'] ), ENT_QUOTES, get_bloginfo( 'charset' ) ),
                'image' => ! empty( $item['image'] ) ? esc_url_raw( $item['image'] ) : '',
            );
        },
        $results
    );

    wp_send_json_success(
        array(
            'results'       => $results,
            'noResultLinks' => theme_perso_smart_search_no_result_links(),
        )
    );
}
add_action( 'wp_ajax_theme_perso_smart_search', 'theme_perso_smart_search' );
add_action( 'wp_ajax_nopriv_theme_perso_smart_search', 'theme_perso_smart_search' );

function theme_perso_filter_sale_products_query( $query ) {
    if ( is_admin() || ! $query->is_main_query() || empty( $_GET['cosmethique_filter'] ) || 'sale' !== sanitize_key( wp_unslash( $_GET['cosmethique_filter'] ) ) ) {
        return;
    }

    if ( ! function_exists( 'is_shop' ) || ! ( is_shop() || is_product_taxonomy() ) || ! function_exists( 'wc_get_product_ids_on_sale' ) ) {
        return;
    }

    $sale_ids = wc_get_product_ids_on_sale();

    $query->set( 'post__in', ! empty( $sale_ids ) ? array_map( 'intval', $sale_ids ) : array( 0 ) );
}
add_action( 'pre_get_posts', 'theme_perso_filter_sale_products_query', 20 );

function theme_perso_refresh_collection_rewrite_rules_once() {
    if ( ! class_exists( 'WooCommerce' ) || '20260724' === get_option( 'theme_perso_collection_rewrites_refreshed' ) ) {
        return;
    }

    flush_rewrite_rules( false );
    update_option( 'theme_perso_collection_rewrites_refreshed', '20260724' );
}
add_action( 'init', 'theme_perso_refresh_collection_rewrite_rules_once', 99 );

function theme_perso_get_contact_shortcode() {
    if ( shortcode_exists( 'contact-form-7' ) ) {
        $forms = get_posts(
            array(
                'post_type'      => 'wpcf7_contact_form',
                'posts_per_page' => 1,
                'post_status'    => 'publish',
            )
        );

        if ( $forms ) {
            return '[contact-form-7 id="' . absint( $forms[0]->ID ) . '"]';
        }
    }

    if ( shortcode_exists( 'wpforms' ) ) {
        $forms = get_posts(
            array(
                'post_type'      => 'wpforms',
                'posts_per_page' => 1,
                'post_status'    => 'publish',
            )
        );

        if ( $forms ) {
            return '[wpforms id="' . absint( $forms[0]->ID ) . '" title="false"]';
        }
    }

    return '';
}

function theme_perso_comment( $comment, $args, $depth ) {
    ?>
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'comment-item' ); ?>>
        <article class="comment-body">
            <div class="comment-meta">
                <strong><?php comment_author_link(); ?></strong>
                <time datetime="<?php comment_time( 'c' ); ?>"><?php comment_date(); ?></time>
            </div>
            <div class="comment-content"><?php comment_text(); ?></div>
            <?php
            comment_reply_link(
                array_merge(
                    $args,
                    array(
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                    )
                )
            );
            ?>
        </article>
    <?php
}

function theme_perso_remove_wp_version() {
    remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'theme_perso_remove_wp_version' );

function theme_perso_create_page_if_missing( $title, $slug, $excerpt = '' ) {
    $existing = get_page_by_path( $slug );

    if ( $existing ) {
        return (int) $existing->ID;
    }

    return wp_insert_post(
        array(
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_excerpt' => $excerpt,
        )
    );
}

function theme_perso_get_or_create_page_permalink( $title, $slug, $excerpt = '', $content = '' ) {
    $page_id = theme_perso_create_page_if_missing( $title, $slug, $excerpt );

    if ( ! $page_id || is_wp_error( $page_id ) ) {
        return home_url( '/' . trim( $slug, '/' ) . '/' );
    }

    if ( $content ) {
        $page = get_post( $page_id );

        if ( $page && '' === trim( (string) $page->post_content ) ) {
            wp_update_post(
                array(
                    'ID'           => $page_id,
                    'post_content' => wp_kses_post( $content ),
                )
            );
        }
    }

    $permalink = get_permalink( $page_id );

    return $permalink ? $permalink : home_url( '/' . trim( $slug, '/' ) . '/' );
}

function theme_perso_footer_page_specs() {
    return array(
        'notre-histoire' => array(
            'title'   => 'Notre histoire',
            'excerpt' => 'Découvrez la naissance et la vision de Cosm’Éthique.',
            'content' => '<h2>Notre histoire</h2><p>COSM’ÉTHIQUE est une maison de cosmétiques naturels imaginée autour d’une beauté plus consciente, premium et responsable.</p>',
        ),
        'engagements' => array(
            'title'   => 'Nos engagements',
            'excerpt' => 'Nos engagements pour une cosmétique naturelle, sûre et responsable.',
            'content' => '<h2>Nos engagements</h2><p>Nous privilégions des ingrédients d’origine naturelle, des formules sûres, des emballages responsables et une démarche cruelty free.</p>',
        ),
        'ingredients' => array(
            'title'   => 'Nos ingrédients',
            'excerpt' => 'Les actifs naturels sélectionnés avec exigence.',
            'content' => '<h2>Nos ingrédients</h2><p>Rose, karité, camomille, sauge, lavande et huiles végétales composent l’univers sensoriel de Cosm’Éthique.</p>',
        ),
        'qualite' => array(
            'title'   => 'Fabrication & qualité',
            'excerpt' => 'Notre exigence de formulation et de fabrication.',
            'content' => '<h2>Fabrication & qualité</h2><p>Chaque soin est pensé pour associer plaisir d’utilisation, efficacité visible et contrôle qualité rigoureux.</p>',
        ),
        'boutiques' => array(
            'title'   => 'Nos boutiques',
            'excerpt' => 'Découvrez le réseau Cosm’Éthique.',
            'content' => '<h2>Nos boutiques</h2><p>Le réseau Cosm’Éthique se développe partout en France avec des boutiques engagées dans la cosmétique naturelle.</p>',
        ),
        'faq' => array(
            'title'   => 'FAQ',
            'excerpt' => 'Les réponses aux questions fréquentes.',
            'content' => '<h2>FAQ</h2><p>Retrouvez les réponses aux questions fréquentes sur les produits, la livraison, les retours, les commandes et les routines beauté.</p>',
        ),
        'avis-clients' => array(
            'title'   => 'Avis clients',
            'excerpt' => 'Les retours de la communauté Cosm’Éthique.',
            'content' => '<h2>Avis clients</h2><p>Découvrez les témoignages de clientes qui ont adopté les soins Cosm’Éthique dans leur routine quotidienne.</p>',
        ),
    );
}

function theme_perso_footer_page_url( $slug ) {
    $pages = theme_perso_footer_page_specs();

    if ( ! isset( $pages[ $slug ] ) ) {
        return home_url( '/' . trim( $slug, '/' ) . '/' );
    }

    return theme_perso_get_or_create_page_permalink( $pages[ $slug ]['title'], $slug, $pages[ $slug ]['excerpt'], $pages[ $slug ]['content'] );
}

function theme_perso_ensure_footer_navigation_pages() {
    foreach ( theme_perso_footer_page_specs() as $slug => $page ) {
        theme_perso_get_or_create_page_permalink( $page['title'], $slug, $page['excerpt'], $page['content'] );
    }
}
add_action( 'init', 'theme_perso_ensure_footer_navigation_pages', 42 );

function theme_perso_seed_pages_and_menus() {
    if ( get_option( 'theme_perso_seeded_v2' ) ) {
        return;
    }

    $pages = array(
        array( 'Accueil', 'accueil', 'La beauté naturelle dans une expérience ecommerce premium.' ),
        array( 'Boutique', 'boutique', 'Découvrez nos soins naturels premium.' ),
        array( 'Diagnostic Beauté', 'diagnostic', 'Découvrez en moins d’une minute les soins Cosm’Éthique parfaitement adaptés à votre peau et à vos besoins.' ),
        array( 'Qui sommes-nous', 'qui-sommes-nous', 'Une maison cosmétique naturelle, élégante et responsable.' ),
        array( 'Blog', 'blog', 'Conseils beauté, routines et inspirations naturelles.' ),
        array( 'Contact', 'contact', 'Notre équipe vous accompagne avec attention.' ),
        array( 'Devenir franchisé', 'devenir-franchise', 'Rejoignez le développement de la maison COSM’ETHIQUE.' ),
        array( 'Panier', 'panier', 'Votre panier COSM’ETHIQUE.' ),
        array( 'Commande', 'commande', 'Finalisez votre commande en toute sécurité.' ),
        array( 'Mon compte', 'mon-compte', 'Gérez vos informations et commandes.' ),
        array( 'CGV', 'cgv', 'Conditions générales de vente.' ),
        array( 'CGU', 'cgu', 'Conditions générales d’utilisation.' ),
        array( 'Mentions légales', 'mentions-legales', 'Informations légales de COSM’ETHIQUE.' ),
        array( 'Politique de confidentialité', 'politique-de-confidentialite', 'Gestion et protection des données personnelles.' ),
        array( 'Politique de cookies', 'politique-de-cookies', 'Comprendre et gérer les cookies utilisés par COSM’ETHIQUE.' ),
    );

    $ids = array();

    foreach ( $pages as $page ) {
        $ids[ $page[1] ] = theme_perso_create_page_if_missing( $page[0], $page[1], $page[2] );
    }

    if ( ! get_option( 'show_on_front' ) || 'posts' === get_option( 'show_on_front' ) ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $ids['accueil'] );
        update_option( 'page_for_posts', $ids['blog'] );
    }

    if ( class_exists( 'WooCommerce' ) && empty( get_option( 'woocommerce_shop_page_id' ) ) ) {
        update_option( 'woocommerce_shop_page_id', $ids['boutique'] );
    }

    if ( class_exists( 'WooCommerce' ) ) {
        if ( empty( get_option( 'woocommerce_cart_page_id' ) ) ) {
            wp_update_post( array( 'ID' => $ids['panier'], 'post_content' => '<!-- wp:shortcode -->[woocommerce_cart]<!-- /wp:shortcode -->' ) );
            update_option( 'woocommerce_cart_page_id', $ids['panier'] );
        }

        if ( empty( get_option( 'woocommerce_checkout_page_id' ) ) ) {
            wp_update_post( array( 'ID' => $ids['commande'], 'post_content' => '<!-- wp:shortcode -->[woocommerce_checkout]<!-- /wp:shortcode -->' ) );
            update_option( 'woocommerce_checkout_page_id', $ids['commande'] );
        }

        if ( empty( get_option( 'woocommerce_myaccount_page_id' ) ) ) {
            wp_update_post( array( 'ID' => $ids['mon-compte'], 'post_content' => '<!-- wp:shortcode -->[woocommerce_my_account]<!-- /wp:shortcode -->' ) );
            update_option( 'woocommerce_myaccount_page_id', $ids['mon-compte'] );
        }
    }

    $menu_locations = get_theme_mod( 'nav_menu_locations', array() );

    if ( empty( $menu_locations['primary'] ) ) {
        $primary_menu    = wp_get_nav_menu_object( 'Menu COSM’ETHIQUE' );
        $primary_menu_id = $primary_menu ? $primary_menu->term_id : wp_create_nav_menu( 'Menu COSM’ETHIQUE' );
        $primary_items   = array( 'accueil', 'boutique', 'diagnostic', 'qui-sommes-nous', 'blog', 'contact', 'devenir-franchise' );

        if ( ! is_wp_error( $primary_menu_id ) ) {
            foreach ( $primary_items as $slug ) {
                $menu_item_args = array(
                    'menu-item-object-id' => $ids[ $slug ],
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                );

                if ( 'diagnostic' === $slug ) {
                    $menu_item_args['menu-item-title'] = esc_html__( 'Diagnostic', 'theme-perso' );
                }

                wp_update_nav_menu_item(
                    $primary_menu_id,
                    0,
                    $menu_item_args
                );
            }

            $menu_locations['primary'] = $primary_menu_id;
        }
    }

    if ( empty( $menu_locations['footer'] ) ) {
        $footer_menu    = wp_get_nav_menu_object( 'Menu légal COSM’ETHIQUE' );
        $footer_menu_id = $footer_menu ? $footer_menu->term_id : wp_create_nav_menu( 'Menu légal COSM’ETHIQUE' );
        $footer_items   = array( 'cgv', 'cgu', 'mentions-legales', 'politique-de-confidentialite', 'politique-de-cookies', 'contact' );

        if ( ! is_wp_error( $footer_menu_id ) ) {
            foreach ( $footer_items as $slug ) {
                wp_update_nav_menu_item(
                    $footer_menu_id,
                    0,
                    array(
                        'menu-item-object-id' => $ids[ $slug ],
                        'menu-item-object'    => 'page',
                        'menu-item-type'      => 'post_type',
                        'menu-item-status'    => 'publish',
                    )
                );
            }

            $menu_locations['footer'] = $footer_menu_id;
        }
    }

    set_theme_mod( 'nav_menu_locations', $menu_locations );
    update_option( 'theme_perso_seeded_v2', 1 );
}
add_action( 'after_switch_theme', 'theme_perso_seed_pages_and_menus' );

function theme_perso_seed_existing_theme() {
    if ( current_user_can( 'manage_options' ) ) {
        theme_perso_seed_pages_and_menus();
        theme_perso_seed_woocommerce_catalog();
        theme_perso_seed_blog_articles();
    }
}
add_action( 'admin_init', 'theme_perso_seed_existing_theme' );

function theme_perso_ensure_cookie_policy_page_and_menu() {
    $cookie_page_id = theme_perso_create_page_if_missing(
        'Politique de cookies',
        'politique-de-cookies',
        'Comprendre et gérer les cookies utilisés par COSM’ETHIQUE.'
    );

    if ( ! $cookie_page_id || is_wp_error( $cookie_page_id ) ) {
        return;
    }

    $locations = get_theme_mod( 'nav_menu_locations', array() );
    if ( empty( $locations['footer'] ) ) {
        return;
    }

    $menu_id = (int) $locations['footer'];
    $items   = wp_get_nav_menu_items( $menu_id );

    if ( is_wp_error( $items ) ) {
        return;
    }

    foreach ( (array) $items as $item ) {
        if ( (int) $item->object_id === (int) $cookie_page_id ) {
            return;
        }
    }

    wp_update_nav_menu_item(
        $menu_id,
        0,
        array(
            'menu-item-object-id' => $cookie_page_id,
            'menu-item-object'    => 'page',
            'menu-item-type'      => 'post_type',
            'menu-item-title'     => esc_html__( 'Politique de cookies', 'theme-perso' ),
            'menu-item-status'    => 'publish',
            'menu-item-position'  => 45,
        )
    );
}
add_action( 'init', 'theme_perso_ensure_cookie_policy_page_and_menu', 40 );

function theme_perso_ensure_diagnostic_page_and_menu() {
    $diagnostic_id = theme_perso_create_page_if_missing(
        'Diagnostic Beauté',
        'diagnostic',
        'Découvrez en moins d’une minute les soins Cosm’Éthique parfaitement adaptés à votre peau et à vos besoins.'
    );

    if ( ! $diagnostic_id || is_wp_error( $diagnostic_id ) ) {
        return;
    }

    $locations = get_theme_mod( 'nav_menu_locations', array() );
    if ( empty( $locations['primary'] ) ) {
        return;
    }

    $menu_id = (int) $locations['primary'];
    $items   = wp_get_nav_menu_items( $menu_id );

    if ( ! $items || is_wp_error( $items ) ) {
        return;
    }

    foreach ( $items as $item ) {
        if ( (int) $item->object_id === (int) $diagnostic_id ) {
            if ( 'Diagnostic' !== $item->title ) {
                wp_update_nav_menu_item(
                    $menu_id,
                    (int) $item->ID,
                    array(
                        'menu-item-object-id' => $diagnostic_id,
                        'menu-item-object'    => 'page',
                        'menu-item-type'      => 'post_type',
                        'menu-item-title'     => esc_html__( 'Diagnostic', 'theme-perso' ),
                        'menu-item-status'    => 'publish',
                    )
                );
            }

            theme_perso_reorder_primary_menu_items( $menu_id );
            return;
        }
    }

    wp_update_nav_menu_item(
        $menu_id,
        0,
        array(
            'menu-item-object-id' => $diagnostic_id,
            'menu-item-object'    => 'page',
            'menu-item-type'      => 'post_type',
            'menu-item-title'     => esc_html__( 'Diagnostic', 'theme-perso' ),
            'menu-item-status'    => 'publish',
            'menu-item-position'  => 30,
        )
    );

    theme_perso_reorder_primary_menu_items( $menu_id );
}
add_action( 'init', 'theme_perso_ensure_diagnostic_page_and_menu', 39 );

function theme_perso_reorder_primary_menu_items( $menu_id ) {
    $items = wp_get_nav_menu_items( $menu_id );

    if ( ! $items || is_wp_error( $items ) ) {
        return;
    }

    $desired_order = array(
        'accueil'            => 10,
        'boutique'           => 20,
        'diagnostic'         => 30,
        'qui-sommes-nous'    => 40,
        'blog'               => 50,
        'contact'            => 60,
        'devenir-franchise'  => 70,
    );

    foreach ( $items as $item ) {
        if ( 'page' !== $item->object || empty( $item->object_id ) ) {
            continue;
        }

        $slug = get_post_field( 'post_name', (int) $item->object_id );
        if ( ! isset( $desired_order[ $slug ] ) || (int) $item->menu_order === $desired_order[ $slug ] ) {
            continue;
        }

        wp_update_post(
            array(
                'ID'         => (int) $item->ID,
                'menu_order' => $desired_order[ $slug ],
            )
        );
    }
}

function theme_perso_add_diagnostic_routine_to_cart() {
    if ( empty( $_GET['cosmethique_add_routine'] ) || ! class_exists( 'WooCommerce' ) || ! function_exists( 'WC' ) ) {
        return;
    }

    if ( ! WC()->cart ) {
        return;
    }

    $raw_ids = sanitize_text_field( wp_unslash( $_GET['cosmethique_add_routine'] ) );
    $ids     = array_filter( array_map( 'absint', explode( ',', $raw_ids ) ) );
    $ids     = array_slice( array_unique( $ids ), 0, 6 );

    foreach ( $ids as $product_id ) {
        $product = wc_get_product( $product_id );

        if ( $product && $product->is_purchasable() ) {
            WC()->cart->add_to_cart( $product_id, 1 );
        }
    }

    if ( function_exists( 'wc_add_notice' ) && $ids ) {
        wc_add_notice( __( 'Votre routine beauté a été ajoutée au panier.', 'theme-perso' ), 'success' );
    }

    wp_safe_redirect( function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/panier/' ) );
    exit;
}
add_action( 'template_redirect', 'theme_perso_add_diagnostic_routine_to_cart', 20 );

function theme_perso_is_diagnostic_page() {
    return function_exists( 'is_page' ) && is_page( 'diagnostic' );
}

function theme_perso_disable_product_context_on_diagnostic() {
    if ( ! theme_perso_is_diagnostic_page() ) {
        return;
    }

    remove_action( 'woocommerce_before_single_product_summary', 'theme_perso_disable_native_product_gallery', 1 );
    remove_action( 'woocommerce_before_single_product_summary', 'theme_perso_single_product_gallery', 5 );
    remove_action( 'woocommerce_after_add_to_cart_form', 'theme_perso_product_coupon_bar' );
    remove_action( 'woocommerce_single_product_summary', 'theme_perso_product_pack_summary', 24 );
    remove_action( 'woocommerce_single_product_summary', 'theme_perso_product_reassurance', 35 );
    remove_action( 'woocommerce_after_single_product_summary', 'theme_perso_product_static_reviews', 8 );
}
add_action( 'wp', 'theme_perso_disable_product_context_on_diagnostic', 5 );

function theme_perso_disable_comments_on_diagnostic( $open, $post_id ) {
    $post = get_post( $post_id );

    if ( $post && 'diagnostic' === $post->post_name ) {
        return false;
    }

    return $open;
}
add_filter( 'comments_open', 'theme_perso_disable_comments_on_diagnostic', 10, 2 );

function theme_perso_ensure_woocommerce_system_pages() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $pages = array(
        'cart'       => array(
            'slug'      => 'panier',
            'title'     => 'Panier',
            'content'   => '<!-- wp:shortcode -->[woocommerce_cart]<!-- /wp:shortcode -->',
            'option'    => 'woocommerce_cart_page_id',
            'shortcode' => '[woocommerce_cart]',
        ),
        'checkout'   => array(
            'slug'      => 'commande',
            'title'     => 'Commande',
            'content'   => '<!-- wp:shortcode -->[woocommerce_checkout]<!-- /wp:shortcode -->',
            'option'    => 'woocommerce_checkout_page_id',
            'shortcode' => '[woocommerce_checkout]',
        ),
        'myaccount'  => array(
            'slug'      => 'mon-compte',
            'title'     => 'Mon compte',
            'content'   => '<!-- wp:shortcode -->[woocommerce_my_account]<!-- /wp:shortcode -->',
            'option'    => 'woocommerce_myaccount_page_id',
            'shortcode' => '[woocommerce_my_account]',
        ),
    );

    foreach ( $pages as $page ) {
        $page_obj = get_page_by_path( $page['slug'] );
        $page_id  = $page_obj ? (int) $page_obj->ID : 0;

        if ( ! $page_id ) {
            $page_id = wp_insert_post(
                array(
                    'post_title'   => $page['title'],
                    'post_name'    => $page['slug'],
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                    'post_content' => $page['content'],
                )
            );
        }

        if ( $page_id && ! is_wp_error( $page_id ) ) {
            $current_content = get_post_field( 'post_content', $page_id );

            if ( false === strpos( $current_content, $page['shortcode'] ) ) {
                wp_update_post(
                    array(
                        'ID'           => $page_id,
                        'post_content' => $page['content'],
                    )
                );
            }

            update_option( $page['option'], $page_id );
        }
    }
}
add_action( 'init', 'theme_perso_ensure_woocommerce_system_pages', 35 );

function theme_perso_blog_articles() {
    return array(
        array(
            'title'    => 'Routine skincare naturelle: les 5 gestes essentiels',
            'category' => 'Skincare',
            'image'    => theme_perso_product_asset_url( 'lifestyle-serum-rose.png' ),
            'excerpt'  => 'Un guide simple et premium pour composer une routine visage naturelle, efficace et agréable à suivre chaque jour.',
            'content'  => '<p>Une routine naturelle réussie ne dépend pas du nombre de produits, mais de la cohérence des gestes. L’objectif est de nettoyer sans agresser, hydrater avec précision et protéger la peau au quotidien.</p><p>Commencez par un nettoyage doux, poursuivez avec un sérum ciblé, puis scellez l’hydratation avec une crème confortable. Une à deux fois par semaine, ajoutez un masque ou une huile selon les besoins de votre peau.</p><h2>Le rituel COSM’ETHIQUE</h2><p>Privilégiez les textures fines le matin et les soins plus enveloppants le soir. La régularité reste le vrai secret d’une peau lumineuse.</p>',
        ),
        array(
            'title'    => 'Vitamine C et éclat: comment l’intégrer sans sensibiliser la peau',
            'category' => 'Actifs naturels',
            'image'    => theme_perso_product_asset_url( 'ingredient-rose.svg' ),
            'excerpt'  => 'Comprendre les actifs éclat, choisir le bon moment d’application et éviter les associations trop agressives.',
            'content'  => '<p>La vitamine C est appréciée pour son action éclat et son intérêt dans les routines anti-teint terne. Dans une approche naturelle, elle s’utilise avec mesure, surtout sur les peaux sensibles.</p><p>Introduisez-la progressivement, idéalement le matin sous une protection adaptée. Évitez de multiplier les actifs puissants le même jour si votre peau réagit facilement.</p><h2>Notre conseil</h2><p>Une routine éclat peut rester minimaliste: un sérum adapté, une crème hydratante et une bonne constance suffisent souvent à transformer l’aspect du teint.</p>',
        ),
        array(
            'title'    => 'Huiles végétales: lesquelles choisir pour le visage, le corps et les cheveux ?',
            'category' => 'Huiles végétales',
            'image'    => theme_perso_product_asset_url( 'lifestyle-huile-botanique.png' ),
            'excerpt'  => 'Jojoba, amande douce, tournesol: apprendre à choisir une huile selon la zone et la texture souhaitée.',
            'content'  => '<p>Les huiles végétales sont des alliées précieuses, à condition de choisir la bonne texture. Une huile légère peut sublimer la peau sans effet gras, tandis qu’une huile plus riche convient mieux aux zones sèches.</p><p>Pour le corps, appliquez quelques gouttes sur peau légèrement humide. Pour les cheveux, travaillez uniquement les pointes afin d’éviter d’alourdir la racine.</p><h2>Le bon geste</h2><p>Chauffez l’huile entre les paumes avant application: le massage devient plus agréable et la répartition plus homogène.</p>',
        ),
        array(
            'title'    => 'Peau sensible: construire une routine douce et rassurante',
            'category' => 'Peau sensible',
            'image'    => theme_perso_product_asset_url( 'lifestyle-creme-sauge.png' ),
            'excerpt'  => 'Des conseils concrets pour limiter les irritations, renforcer le confort et simplifier son rituel beauté.',
            'content'  => '<p>Une peau sensible a besoin de stabilité. Mieux vaut une routine courte, régulière et sans accumulation d’actifs. Le nettoyage doit rester doux et la phase d’hydratation doit renforcer la sensation de confort.</p><p>Introduisez les nouveautés une par une. Cela permet d’identifier plus facilement ce qui convient réellement à votre peau.</p><h2>À retenir</h2><p>La douceur est une stratégie, pas un manque d’efficacité. Les meilleures routines sont souvent les plus lisibles.</p>',
        ),
        array(
            'title'    => 'Sérums naturels: comment choisir celui qui correspond à votre peau',
            'category' => 'Sérums',
            'image'    => theme_perso_product_asset_url( 'serum-rose.svg' ),
            'excerpt'  => 'Hydratation, éclat, confort: comprendre le rôle d’un sérum et l’intégrer dans une routine premium.',
            'content'  => '<p>Le sérum est un soin concentré que l’on choisit selon une priorité: éclat, hydratation, confort ou texture de peau. Il s’applique avant la crème, sur peau propre, en petite quantité.</p><p>Un bon sérum doit se faire oublier après application. Si la peau colle ou tiraille, ajustez la quantité ou la crème qui suit.</p><h2>Astuce routine</h2><p>Appliquez le sérum par pressions légères plutôt qu’en frottant. Le geste est plus doux et plus sensoriel.</p>',
        ),
        array(
            'title'    => 'Tendances skincare 2026: moins de produits, plus de précision',
            'category' => 'Tendances 2026',
            'image'    => theme_perso_product_asset_url( 'routine-premium.svg' ),
            'excerpt'  => 'La beauté premium se recentre sur des rituels courts, des actifs choisis et une expérience plus responsable.',
            'content'  => '<p>La grande tendance skincare 2026 confirme une envie de simplicité intelligente. Les routines se raccourcissent, les compositions deviennent plus lisibles et l’expérience sensorielle reste essentielle.</p><p>Les consommatrices recherchent des soins qui font sens: une texture agréable, une promesse claire, une fabrication responsable et une vraie cohérence esthétique.</p><h2>La vision COSM’ETHIQUE</h2><p>Formuler moins, formuler mieux: une beauté naturelle, précise et durable.</p>',
        ),
    );
}

function theme_perso_seed_blog_articles() {
    if ( get_option( 'theme_perso_blog_seeded_v1' ) ) {
        return;
    }

    foreach ( theme_perso_blog_articles() as $article ) {
        $category = term_exists( $article['category'], 'category' );

        if ( ! $category ) {
            $category = wp_insert_term( $article['category'], 'category' );
        }

        $category_id = ! is_wp_error( $category ) ? ( is_array( $category ) ? (int) $category['term_id'] : (int) $category ) : 0;
        $existing    = get_page_by_title( $article['title'], OBJECT, 'post' );

        if ( $existing ) {
            update_post_meta( $existing->ID, '_cosmethique_post_image_url', esc_url_raw( $article['image'] ) );
            continue;
        }

        $post_id = wp_insert_post(
            array(
                'post_title'    => $article['title'],
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_excerpt'  => $article['excerpt'],
                'post_content'  => $article['content'],
                'post_category' => $category_id ? array( $category_id ) : array(),
            )
        );

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, '_cosmethique_post_image_url', esc_url_raw( $article['image'] ) );
        }
    }

    update_option( 'theme_perso_blog_seeded_v1', 1 );
}
add_action( 'init', 'theme_perso_seed_blog_articles', 36 );

function theme_perso_seed_featured_blog_cards() {
    $articles = array_merge( array( theme_perso_featured_blog_article() ), theme_perso_featured_blog_cards() );

    foreach ( $articles as $article ) {
        $category = term_exists( $article['category'], 'category' );

        if ( ! $category ) {
            $category = wp_insert_term( $article['category'], 'category' );
        }

        $category_id = ! is_wp_error( $category ) ? ( is_array( $category ) ? (int) $category['term_id'] : (int) $category ) : 0;
        $existing    = get_page_by_title( $article['title'], OBJECT, 'post' );

        $post_data = array(
            'post_title'   => $article['title'],
            'post_status'  => 'publish',
            'post_type'    => 'post',
            'post_excerpt' => $article['excerpt'],
            'post_content' => $article['content'],
        );

        if ( $existing ) {
            $post_data['ID'] = $existing->ID;
            $post_id         = wp_update_post( $post_data );
        } else {
            $post_id = wp_insert_post( $post_data );
        }

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            if ( $category_id ) {
                wp_set_post_terms( $post_id, array( $category_id ), 'category', false );
            }

            update_post_meta( $post_id, '_cosmethique_post_image_url', esc_url_raw( $article['image'] ) );
            update_post_meta( $post_id, '_cosmethique_read_time', sanitize_text_field( $article['read_time'] ) );
            update_post_meta( $post_id, '_cosmethique_views', sanitize_text_field( $article['views'] ) );
            update_post_meta( $post_id, '_cosmethique_author_label', sanitize_text_field( $article['author'] ) );
        }
    }
}
add_action( 'init', 'theme_perso_seed_featured_blog_cards', 37 );

function theme_perso_render_blog_showcase_cards( $limit = 0 ) {
    $cards = theme_perso_featured_blog_cards();

    if ( $limit ) {
        $cards = array_slice( $cards, 0, $limit );
    }

    foreach ( $cards as $card ) {
        $post = get_page_by_title( $card['title'], OBJECT, 'post' );
        $url  = $post ? get_permalink( $post ) : home_url( '/blog/' );
        ?>
        <article class="blog-showcase-card" data-blog-card data-blog-category="<?php echo esc_attr( sanitize_title( $card['category'] ) ); ?>">
            <a class="blog-showcase-image" href="<?php echo esc_url( $url ); ?>">
                <img src="<?php echo esc_url( $card['image'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>" loading="lazy">
                <span><?php echo esc_html( $card['category'] ); ?></span>
            </a>
            <div class="blog-showcase-body">
                <div class="blog-showcase-meta">
                    <time datetime="2026-05-21"><?php esc_html_e( '21 mai 2026', 'theme-perso' ); ?></time>
                    <span><?php echo esc_html( $card['author'] ); ?></span>
                    <span><?php echo esc_html( $card['read_time'] ); ?></span>
                </div>
                <h3><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $card['title'] ); ?></a></h3>
                <p><?php echo esc_html( $card['excerpt'] ); ?></p>
                <div class="blog-showcase-stats">
                    <span><?php echo esc_html( $card['views'] ); ?></span>
                    <span>♡ 128</span>
                </div>
                <a class="blog-showcase-link" href="<?php echo esc_url( $url ); ?>">
                    <?php esc_html_e( 'Lire l’article', 'theme-perso' ); ?>
                    <span aria-hidden="true">→</span>
                </a>
            </div>
        </article>
        <?php
    }
}

function theme_perso_hide_default_hello_post() {
    $hello = get_page_by_path( 'hello-world', OBJECT, 'post' );

    if ( $hello && 'publish' === $hello->post_status && false !== strpos( $hello->post_content, 'Welcome to WordPress' ) ) {
        wp_update_post(
            array(
                'ID'          => $hello->ID,
                'post_status' => 'draft',
            )
        );
    }
}
add_action( 'init', 'theme_perso_hide_default_hello_post', 37 );

function theme_perso_get_post_image_url( $post_id = null ) {
    $post_id = $post_id ? $post_id : get_the_ID();
    return get_post_meta( $post_id, '_cosmethique_post_image_url', true );
}

function theme_perso_seed_woocommerce_catalog() {
    if ( ! class_exists( 'WooCommerce' ) || get_option( 'theme_perso_catalog_seeded_v1' ) ) {
        return;
    }

    $term_ids = array();

    foreach ( theme_perso_catalog_categories() as $slug => $category ) {
        $term = term_exists( $slug, 'product_cat' );

        if ( ! $term ) {
            $term = wp_insert_term(
                $category['name'],
                'product_cat',
                array(
                    'slug'        => $slug,
                    'description' => $category['description'],
                )
            );
        }

        if ( ! is_wp_error( $term ) ) {
            $term_ids[ $slug ] = is_array( $term ) ? (int) $term['term_id'] : (int) $term;
        }
    }

    $products = array(
        array(
            'title'       => 'Sérum Éclat à la Rose',
            'category'    => 'visage',
            'price'       => '34.90',
            'sale_price'  => '29.90',
            'sku'         => 'COSM-SER-ROSE',
            'image'       => theme_perso_product_asset_url( 'photo-serum-eclat-rose.png' ),
            'gallery'     => array(
                theme_perso_product_asset_url( 'photo-serum-eclat-rose.png' ),
                theme_perso_product_asset_url( 'lifestyle-serum-rose.png' ),
                theme_perso_product_asset_url( 'photo-serum-eclat-rose-packshot.png' ),
            ),
            'description' => 'Sérum illuminateur à la rose, aloe vera et acide hyaluronique végétal pour une peau souple et lumineuse.',
        ),
        array(
            'title'       => 'Crème Hydratante Sauge & Camomille',
            'category'    => 'visage',
            'price'       => '31.90',
            'sku'         => 'COSM-CRE-SAU',
            'image'       => theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille.png' ),
            'gallery'     => array(
                theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille.png' ),
                theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille-back.png' ),
                theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille-texture.png' ),
            ),
            'description' => 'Crème de jour confortable pour hydrater, apaiser et protéger les peaux sensibles.',
        ),
        array(
            'title'       => 'Masque Nutrition Intense',
            'category'    => 'visage',
            'price'       => '26.90',
            'sku'         => 'COSM-MAS-NUT',
            'image'       => theme_perso_product_asset_url( 'photo-masque-nutrition-intense.png' ),
            'gallery'     => array(
                theme_perso_product_asset_url( 'photo-masque-nutrition-intense.png' ),
                theme_perso_product_asset_url( 'lifestyle-masque-visage.png' ),
                theme_perso_product_asset_url( 'masque-visage.svg' ),
            ),
            'description' => 'Masque onctueux aux beurres végétaux et extraits botaniques pour une peau nourrie en profondeur.',
        ),
        array(
            'title'       => 'Huile Sèche Botanique',
            'category'    => 'corps',
            'price'       => '29.90',
            'sku'         => 'COSM-HUI-BOT',
            'image'       => theme_perso_product_asset_url( 'photo-huile-seche-botanique.png' ),
            'gallery'     => array(
                theme_perso_product_asset_url( 'photo-huile-seche-botanique.png' ),
                theme_perso_product_asset_url( 'photo-huile-seche-botanique-back.png' ),
                theme_perso_product_asset_url( 'photo-huile-seche-botanique-lifestyle.png' ),
            ),
            'description' => 'Huile sèche satinée aux huiles de jojoba, amande douce et tournesol pour le corps et les pointes.',
        ),
        array(
            'title'       => 'Baume Corps Karité & Amande',
            'category'    => 'corps',
            'price'       => '24.90',
            'sku'         => 'COSM-BAU-KAR',
            'image'       => theme_perso_product_asset_url( 'photo-baume-corps-karite-amande.png' ),
            'gallery'     => array(
                theme_perso_product_asset_url( 'photo-baume-corps-karite-amande.png' ),
                theme_perso_product_asset_url( 'photo-baume-corps-karite-amande-back.png' ),
                theme_perso_product_asset_url( 'lifestyle-baume-corps.png' ),
            ),
            'description' => 'Baume fondant pour nourrir les zones sèches avec un fini doux et non collant.',
        ),
        array(
            'title'       => 'Shampooing Doux Sauge & Ortie',
            'category'    => 'cheveux',
            'price'       => '18.90',
            'sku'         => 'COSM-SHA-SAU',
            'image'       => theme_perso_product_asset_url( 'photo-shampooing-doux-sauge-ortie.png' ),
            'gallery'     => array(
                theme_perso_product_asset_url( 'photo-shampooing-doux-sauge-ortie.png' ),
                theme_perso_product_asset_url( 'photo-shampooing-doux-sauge-ortie-back.png' ),
                theme_perso_product_asset_url( 'photo-shampooing-doux-sauge-ortie-lifestyle.png' ),
            ),
            'description' => 'Shampooing naturel pour nettoyer en douceur, rééquilibrer le cuir chevelu et apporter de la brillance.',
        ),
        array(
            'title'       => 'Masque Cheveux Réparateur',
            'category'    => 'cheveux',
            'price'       => '22.90',
            'sku'         => 'COSM-MAS-CHE',
            'image'       => theme_perso_product_asset_url( 'photo-masque-cheveux-reparateur.png' ),
            'gallery'     => array(
                theme_perso_product_asset_url( 'photo-masque-cheveux-reparateur.png' ),
                theme_perso_product_asset_url( 'photo-masque-cheveux-reparateur-back.png' ),
                theme_perso_product_asset_url( 'photo-masque-cheveux-reparateur-lifestyle.png' ),
            ),
            'description' => 'Soin capillaire riche aux huiles végétales pour réparer les longueurs et faciliter le démêlage.',
        ),
        array(
            'title'       => 'Huile Essentielle Lavande Fine',
            'category'    => 'aromatherapie',
            'price'       => '12.90',
            'sku'         => 'COSM-HE-LAV',
            'image'       => theme_perso_product_asset_url( 'photo-huile-essentielle-lavande-fine.png' ),
            'gallery'     => array(
                theme_perso_product_asset_url( 'photo-huile-essentielle-lavande-fine.png' ),
                theme_perso_product_asset_url( 'photo-huile-essentielle-lavande-fine-back.png' ),
                theme_perso_product_asset_url( 'photo-huile-essentielle-lavande-fine-lifestyle.png' ),
            ),
            'description' => 'Huile essentielle de lavande fine pour les rituels bien-être et les moments de détente.',
        ),
    );

    foreach ( $products as $item ) {
        $visuals      = theme_perso_product_visuals();
        $descriptions = theme_perso_product_descriptions();

        if ( isset( $visuals[ $item['title'] ] ) ) {
            $item = array_merge( $item, $visuals[ $item['title'] ] );
        }

        if ( isset( $descriptions[ $item['title'] ] ) ) {
            $item['description']       = $descriptions[ $item['title'] ]['long'];
            $item['short_description'] = $descriptions[ $item['title'] ]['short'];
        }

        $existing = function_exists( 'theme_perso_get_seed_product' ) ? theme_perso_get_seed_product( $item['title'] ) : get_page_by_title( $item['title'], OBJECT, 'product' );

        if ( $existing ) {
            wp_update_post(
                array(
                    'ID'           => $existing->ID,
                    'post_content' => wp_kses_post( $item['description'] ),
                    'post_excerpt' => isset( $item['short_description'] ) ? wp_kses_post( $item['short_description'] ) : wp_trim_words( wp_strip_all_tags( $item['description'] ), 18 ),
                )
            );
            update_post_meta( $existing->ID, '_cosmethique_image_url', esc_url_raw( $item['image'] ) );
            update_post_meta( $existing->ID, '_cosmethique_gallery_images', array_map( 'esc_url_raw', $item['gallery'] ) );
            update_post_meta( $existing->ID, '_cosmethique_badge', ucfirst( $item['category'] ) );
            continue;
        }

        $product = new WC_Product_Simple();
        $product->set_name( $item['title'] );
        $product->set_status( 'publish' );
        $product->set_catalog_visibility( 'visible' );
        $product->set_description( $item['description'] );
        $product->set_short_description( isset( $item['short_description'] ) ? $item['short_description'] : wp_trim_words( wp_strip_all_tags( $item['description'] ), 18 ) );
        $product->set_regular_price( $item['price'] );
        $product->set_price( $item['price'] );
        $product->set_sku( $item['sku'] );
        $product->set_manage_stock( true );
        $product->set_stock_quantity( 40 );
        $product->set_stock_status( 'instock' );

        if ( ! empty( $item['sale_price'] ) ) {
            $product->set_sale_price( $item['sale_price'] );
            $product->set_price( $item['sale_price'] );
        }

        if ( isset( $term_ids[ $item['category'] ] ) ) {
            $product->set_category_ids( array( $term_ids[ $item['category'] ] ) );
        }

        $product_id = $product->save();

        if ( $product_id ) {
            update_post_meta( $product_id, '_cosmethique_image_url', esc_url_raw( $item['image'] ) );
            update_post_meta( $product_id, '_cosmethique_gallery_images', array_map( 'esc_url_raw', $item['gallery'] ) );
            update_post_meta( $product_id, '_cosmethique_badge', ucfirst( $item['category'] ) );
        }
    }

    theme_perso_seed_coupon();
    update_option( 'theme_perso_catalog_seeded_v1', 1 );
}
add_action( 'after_switch_theme', 'theme_perso_seed_woocommerce_catalog' );
add_action( 'init', 'theme_perso_seed_woocommerce_catalog', 30 );

function theme_perso_get_seed_product( $title ) {
    $product = get_page_by_title( $title, OBJECT, 'product' );

    if ( $product ) {
        return $product;
    }

    return get_page_by_path( sanitize_title( $title ), OBJECT, 'product' );
}

function theme_perso_visage_collection_products() {
    return array(
        'Sérum Éclat à la Rose' => array(
            'price'      => '34.90',
            'sale_price' => '29.90',
            'sku'        => 'COSM-VIS-SER-ROSE',
            'excerpt'    => 'Hydrate et illumine.',
            'badge'      => 'Promo',
        ),
        'Crème Hydratante Sauge & Camomille' => array(
            'price'   => '24.90',
            'sku'     => 'COSM-VIS-CRE-SAU-CAM',
            'excerpt' => 'Apaise les peaux sensibles.',
        ),
        'Gel Nettoyant Aloe Vera' => array(
            'price'   => '15.90',
            'sku'     => 'COSM-VIS-GEL-ALO',
            'excerpt' => 'Nettoie sans dessécher.',
        ),
        'Lotion Tonique Fleur d’Oranger' => array(
            'price'   => '16.90',
            'sku'     => 'COSM-VIS-LOT-ORA',
            'excerpt' => 'Tonifie et rafraîchit.',
        ),
        'Masque Purifiant Argile Verte' => array(
            'price'   => '19.90',
            'sku'     => 'COSM-VIS-MAS-ARG',
            'excerpt' => 'Purifie les pores.',
        ),
        'Huile de Soin Nourrissante' => array(
            'price'   => '22.90',
            'sku'     => 'COSM-VIS-HUI-NOU',
            'excerpt' => 'Nourrit intensément.',
        ),
    );
}

function theme_perso_sync_visage_collection() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $term = term_exists( 'soins-visage', 'product_cat' );

    if ( ! $term ) {
        $term = wp_insert_term(
            'Soins du visage',
            'product_cat',
            array(
                'slug'        => 'soins-visage',
                'description' => 'Soins naturels premium pour hydrater, protéger et révéler l’éclat de la peau.',
            )
        );
    }

    if ( is_wp_error( $term ) ) {
        return;
    }

    $term_id      = is_array( $term ) ? (int) $term['term_id'] : (int) $term;
    $visuals      = theme_perso_product_visuals();
    $descriptions = theme_perso_product_descriptions();

    foreach ( theme_perso_visage_collection_products() as $title => $data ) {
        if ( empty( $visuals[ $title ] ) || empty( $descriptions[ $title ] ) ) {
            continue;
        }

        $existing = theme_perso_get_seed_product( $title );
        $product  = $existing ? wc_get_product( $existing->ID ) : new WC_Product_Simple();

        if ( ! $product ) {
            continue;
        }

        $product->set_name( $title );
        $product->set_status( 'publish' );
        $product->set_catalog_visibility( 'visible' );
        $product->set_regular_price( $data['price'] );
        $product->set_sale_price( '' );
        $product->set_price( $data['price'] );
        $product->set_sku( $data['sku'] );
        $product->set_manage_stock( true );
        $product->set_stock_quantity( 40 );
        $product->set_stock_status( 'instock' );
        $product->set_description( wp_kses_post( $descriptions[ $title ]['long'] ) );
        $product->set_short_description( wp_kses_post( $descriptions[ $title ]['short'] ) );
        $product->set_category_ids( array( $term_id ) );

        if ( ! empty( $data['sale_price'] ) ) {
            $product->set_sale_price( $data['sale_price'] );
            $product->set_price( $data['sale_price'] );
        }

        $product_id = $product->save();

        if ( ! $product_id ) {
            continue;
        }

        update_post_meta( $product_id, '_cosmethique_image_url', esc_url_raw( $visuals[ $title ]['image'] ) );
        update_post_meta( $product_id, '_cosmethique_gallery_images', array_map( 'esc_url_raw', $visuals[ $title ]['gallery'] ) );
        update_post_meta( $product_id, '_cosmethique_badge', ! empty( $data['badge'] ) ? sanitize_text_field( $data['badge'] ) : 'Visage' );
        update_post_meta( $product_id, '_cosmethique_collection_excerpt', sanitize_text_field( $data['excerpt'] ) );
        theme_perso_sync_product_media_gallery( $product_id, $visuals[ $title ]['gallery'] );
    }
}
add_action( 'init', 'theme_perso_sync_visage_collection', 34 );

function theme_perso_corps_collection_products() {
    return array(
        'Huile Sèche Botanique' => array(
            'price'   => '29.90',
            'sku'     => 'COSM-COR-HUI-SEC',
            'excerpt' => 'Nourrit, satine et sublime la peau sans laisser de film gras.',
        ),
        'Baume Corps Karité & Amande' => array(
            'price'      => '29.90',
            'sale_price' => '24.90',
            'sku'        => 'COSM-COR-BAU-KAR',
            'excerpt'    => 'Nourrit intensément les peaux sèches et restaure le confort cutané.',
            'badge'      => 'Promo',
        ),
        'Déodorant Naturel' => array(
            'price'   => '12.90',
            'sku'     => 'COSM-COR-DEO-NAT',
            'excerpt' => 'Protège et rafraîchit tout en respectant la peau.',
        ),
        'Lait Corps' => array(
            'price'   => '18.90',
            'sku'     => 'COSM-COR-LAI-COR',
            'excerpt' => 'Hydrate durablement les peaux normales à sèches.',
        ),
        'Gommage Corps' => array(
            'price'   => '19.90',
            'sku'     => 'COSM-COR-GOM-COR',
            'excerpt' => 'Exfolie délicatement et laisse la peau douce et lumineuse.',
        ),
        'Huile de Massage' => array(
            'price'   => '21.90',
            'sku'     => 'COSM-COR-HUI-MAS',
            'excerpt' => 'Assouplit, nourrit et accompagne les massages sensoriels.',
        ),
    );
}

function theme_perso_sync_corps_collection() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $term = term_exists( 'soins-corps', 'product_cat' );

    if ( ! $term ) {
        $term = wp_insert_term(
            'Soins du corps',
            'product_cat',
            array(
                'slug'        => 'soins-corps',
                'description' => 'Soins naturels premium pour nourrir, hydrater et sublimer la peau du corps.',
            )
        );
    }

    if ( is_wp_error( $term ) ) {
        return;
    }

    $term_id      = is_array( $term ) ? (int) $term['term_id'] : (int) $term;
    $visuals      = theme_perso_product_visuals();
    $descriptions = theme_perso_product_descriptions();

    foreach ( theme_perso_corps_collection_products() as $title => $data ) {
        if ( empty( $visuals[ $title ] ) || empty( $descriptions[ $title ] ) ) {
            continue;
        }

        $existing = theme_perso_get_seed_product( $title );
        $product  = $existing ? wc_get_product( $existing->ID ) : new WC_Product_Simple();

        if ( ! $product ) {
            continue;
        }

        $product->set_name( $title );
        $product->set_status( 'publish' );
        $product->set_catalog_visibility( 'visible' );
        $product->set_regular_price( $data['price'] );
        $product->set_sale_price( '' );
        $product->set_price( $data['price'] );
        $product->set_sku( $data['sku'] );
        $product->set_manage_stock( true );
        $product->set_stock_quantity( 40 );
        $product->set_stock_status( 'instock' );
        $product->set_description( wp_kses_post( $descriptions[ $title ]['long'] ) );
        $product->set_short_description( wp_kses_post( $descriptions[ $title ]['short'] ) );
        $product->set_category_ids( array( $term_id ) );

        if ( ! empty( $data['sale_price'] ) ) {
            $product->set_sale_price( $data['sale_price'] );
            $product->set_price( $data['sale_price'] );
        }

        $product_id = $product->save();

        if ( ! $product_id ) {
            continue;
        }

        update_post_meta( $product_id, '_cosmethique_image_url', esc_url_raw( $visuals[ $title ]['image'] ) );
        update_post_meta( $product_id, '_cosmethique_gallery_images', array_map( 'esc_url_raw', $visuals[ $title ]['gallery'] ) );
        update_post_meta( $product_id, '_cosmethique_badge', ! empty( $data['badge'] ) ? sanitize_text_field( $data['badge'] ) : 'Corps' );
        update_post_meta( $product_id, '_cosmethique_collection_excerpt', sanitize_text_field( $data['excerpt'] ) );
        theme_perso_sync_product_media_gallery( $product_id, $visuals[ $title ]['gallery'] );
    }
}
add_action( 'init', 'theme_perso_sync_corps_collection', 35 );

function theme_perso_cheveux_collection_products() {
    return array(
        'Shampooing Doux Sauge & Ortie' => array(
            'price'      => '24.90',
            'sale_price' => '19.90',
            'sku'        => 'COSM-CHE-SHA-SAU',
            'excerpt'    => 'Nettoie délicatement les cheveux tout en respectant le cuir chevelu.',
            'badge'      => 'Promo',
        ),
        'Masque Cheveux Réparateur' => array(
            'price'   => '22.90',
            'sku'     => 'COSM-CHE-MAS-REP',
            'excerpt' => 'Répare les longueurs et nourrit intensément la fibre capillaire.',
        ),
        'Après-shampoing' => array(
            'price'   => '18.90',
            'sku'     => 'COSM-CHE-APR-SHP',
            'excerpt' => 'Démêle instantanément et protège les cheveux.',
        ),
        'Sérum Capillaire' => array(
            'price'   => '24.90',
            'sku'     => 'COSM-CHE-SER-CAP',
            'excerpt' => 'Protège les pointes contre la casse et les frisottis.',
        ),
        'Huile Capillaire' => array(
            'price'   => '29.90',
            'sku'     => 'COSM-CHE-HUI-CAP',
            'excerpt' => 'Apporte brillance et nutrition sans alourdir les cheveux.',
        ),
        'Spray Protecteur' => array(
            'price'   => '17.90',
            'sku'     => 'COSM-CHE-SPR-PRO',
            'excerpt' => 'Protège les cheveux avant le séchage ou le lissage.',
        ),
    );
}

function theme_perso_sync_cheveux_collection() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $term = term_exists( 'soins-cheveux', 'product_cat' );

    if ( ! $term ) {
        $term = wp_insert_term(
            'Soins Cheveux',
            'product_cat',
            array(
                'slug'        => 'soins-cheveux',
                'description' => 'Soins capillaires naturels premium pour nourrir, réparer et sublimer les cheveux.',
            )
        );
    }

    if ( is_wp_error( $term ) ) {
        return;
    }

    $term_id      = is_array( $term ) ? (int) $term['term_id'] : (int) $term;
    $visuals      = theme_perso_product_visuals();
    $descriptions = theme_perso_product_descriptions();

    foreach ( theme_perso_cheveux_collection_products() as $title => $data ) {
        if ( empty( $visuals[ $title ] ) || empty( $descriptions[ $title ] ) ) {
            continue;
        }

        $existing = theme_perso_get_seed_product( $title );
        $product  = $existing ? wc_get_product( $existing->ID ) : new WC_Product_Simple();

        if ( ! $product ) {
            continue;
        }

        $product->set_name( $title );
        $product->set_status( 'publish' );
        $product->set_catalog_visibility( 'visible' );
        $product->set_regular_price( $data['price'] );
        $product->set_sale_price( '' );
        $product->set_price( $data['price'] );
        $product->set_sku( $data['sku'] );
        $product->set_manage_stock( true );
        $product->set_stock_quantity( 40 );
        $product->set_stock_status( 'instock' );
        $product->set_description( wp_kses_post( $descriptions[ $title ]['long'] ) );
        $product->set_short_description( wp_kses_post( $descriptions[ $title ]['short'] ) );
        $product->set_category_ids( array( $term_id ) );

        if ( ! empty( $data['sale_price'] ) ) {
            $product->set_sale_price( $data['sale_price'] );
            $product->set_price( $data['sale_price'] );
        }

        $product_id = $product->save();

        if ( ! $product_id ) {
            continue;
        }

        update_post_meta( $product_id, '_cosmethique_image_url', esc_url_raw( $visuals[ $title ]['image'] ) );
        update_post_meta( $product_id, '_cosmethique_gallery_images', array_map( 'esc_url_raw', $visuals[ $title ]['gallery'] ) );
        update_post_meta( $product_id, '_cosmethique_badge', ! empty( $data['badge'] ) ? sanitize_text_field( $data['badge'] ) : 'Cheveux' );
        update_post_meta( $product_id, '_cosmethique_collection_excerpt', sanitize_text_field( $data['excerpt'] ) );
        theme_perso_sync_product_media_gallery( $product_id, $visuals[ $title ]['gallery'] );
    }
}
add_action( 'init', 'theme_perso_sync_cheveux_collection', 36 );

function theme_perso_accessoires_collection_products() {
    return array(
        'Éponge Konjac Naturelle' => array(
            'price'   => '8.90',
            'sku'     => 'COSM-ACC-EPO-KON',
            'excerpt' => 'Nettoie délicatement la peau et élimine les impuretés.',
        ),
        'Brosse Cheveux Bambou' => array(
            'price'   => '12.90',
            'sku'     => 'COSM-ACC-BRO-BAM',
            'excerpt' => 'Démêle les cheveux tout en respectant la fibre capillaire.',
        ),
        'Gua Sha Quartz Rose' => array(
            'price'   => '19.90',
            'sku'     => 'COSM-ACC-GUA-ROS',
            'excerpt' => 'Stimule la microcirculation et raffermit la peau.',
        ),
        'Roller Jade Naturel' => array(
            'price'   => '16.90',
            'sku'     => 'COSM-ACC-ROL-JAD',
            'excerpt' => 'Apaise la peau et réduit les poches.',
        ),
        'Trousse Beauté Cosm’Éthique' => array(
            'price'   => '24.90',
            'sku'     => 'COSM-ACC-TRO-BEA',
            'excerpt' => 'Transportez vos essentiels dans une trousse élégante et durable.',
        ),
        'Set Premium Gua Sha + Roller' => array(
            'price'      => '39.90',
            'sale_price' => '34.90',
            'sku'        => 'COSM-ACC-SET-PRE',
            'excerpt'    => 'Le duo idéal pour vos massages visage et votre routine bien-être.',
            'badge'      => 'Promo',
        ),
    );
}

function theme_perso_sync_accessoires_collection() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $term = term_exists( 'accessoires-beaute', 'product_cat' );

    if ( ! $term ) {
        $term = wp_insert_term(
            'Accessoires Beauté',
            'product_cat',
            array(
                'slug'        => 'accessoires-beaute',
                'description' => 'Accessoires premium pour compléter une routine beauté naturelle avec élégance et précision.',
            )
        );
    }

    if ( is_wp_error( $term ) ) {
        return;
    }

    $term_id      = is_array( $term ) ? (int) $term['term_id'] : (int) $term;
    $visuals      = theme_perso_product_visuals();
    $descriptions = theme_perso_product_descriptions();

    foreach ( theme_perso_accessoires_collection_products() as $title => $data ) {
        if ( empty( $visuals[ $title ] ) || empty( $descriptions[ $title ] ) ) {
            continue;
        }

        $existing = theme_perso_get_seed_product( $title );
        $product  = $existing ? wc_get_product( $existing->ID ) : new WC_Product_Simple();

        if ( ! $product ) {
            continue;
        }

        $product->set_name( $title );
        $product->set_status( 'publish' );
        $product->set_catalog_visibility( 'visible' );
        $product->set_regular_price( $data['price'] );
        $product->set_sale_price( '' );
        $product->set_price( $data['price'] );
        $product->set_sku( $data['sku'] );
        $product->set_manage_stock( true );
        $product->set_stock_quantity( 40 );
        $product->set_stock_status( 'instock' );
        $product->set_description( wp_kses_post( $descriptions[ $title ]['long'] ) );
        $product->set_short_description( wp_kses_post( $descriptions[ $title ]['short'] ) );
        $product->set_category_ids( array( $term_id ) );

        if ( ! empty( $data['sale_price'] ) ) {
            $product->set_sale_price( $data['sale_price'] );
            $product->set_price( $data['sale_price'] );
        }

        $product_id = $product->save();

        if ( ! $product_id ) {
            continue;
        }

        update_post_meta( $product_id, '_cosmethique_image_url', esc_url_raw( $visuals[ $title ]['image'] ) );
        update_post_meta( $product_id, '_cosmethique_gallery_images', array_map( 'esc_url_raw', $visuals[ $title ]['gallery'] ) );
        update_post_meta( $product_id, '_cosmethique_badge', ! empty( $data['badge'] ) ? sanitize_text_field( $data['badge'] ) : 'Accessoire' );
        update_post_meta( $product_id, '_cosmethique_collection_excerpt', sanitize_text_field( $data['excerpt'] ) );
        theme_perso_sync_product_media_gallery( $product_id, $visuals[ $title ]['gallery'] );
    }
}
add_action( 'init', 'theme_perso_sync_accessoires_collection', 37 );

function theme_perso_packs_collection_products() {
    return array(
        'Pack Routine Visage' => array(
            'price'      => '99.60',
            'sale_price' => '79.90',
            'sku'        => 'COSM-PACK-VISAGE',
            'excerpt'    => 'Sérum, crème, masque purifiant et trousse pour une routine visage complète.',
            'contents'   => 'Sérum Éclat à la Rose, Crème Hydratante Sauge & Camomille, Masque Purifiant Argile Verte, Trousse Beauté Cosm’Éthique',
            'saving'     => '19,70 €',
            'badge'      => 'Promo',
        ),
        'Pack Routine Corps' => array(
            'price'      => '92.60',
            'sale_price' => '74.90',
            'sku'        => 'COSM-PACK-CORPS',
            'excerpt'    => 'Baume, huile sèche, lavande fine et trousse pour nourrir le corps.',
            'contents'   => 'Baume Corps Karité & Amande, Huile Sèche Botanique, Huile Essentielle Lavande Fine, Trousse Beauté Cosm’Éthique',
            'saving'     => '17,70 €',
            'badge'      => 'Promo',
        ),
        'Pack Routine Cheveux' => array(
            'price'      => '97.60',
            'sale_price' => '79.90',
            'sku'        => 'COSM-PACK-CHEVEUX',
            'excerpt'    => 'Shampoing, masque, huile sèche et trousse pour sublimer les cheveux.',
            'contents'   => 'Shampooing Doux Sauge & Ortie, Masque Cheveux Réparateur, Huile Sèche Botanique, Trousse Beauté Cosm’Éthique',
            'saving'     => '17,70 €',
            'badge'      => 'Promo',
        ),
        'Pack Routine Premium' => array(
            'price'      => '210.10',
            'sale_price' => '169.90',
            'sku'        => 'COSM-PACK-PREMIUM',
            'excerpt'    => 'Le coffret complet visage, corps et cheveux avec les références phares.',
            'contents'   => 'Sérum Éclat à la Rose, Crème Hydratante Sauge & Camomille, Masque Purifiant Argile Verte, Baume Corps Karité & Amande, Huile Sèche Botanique, Shampooing Doux Sauge & Ortie, Masque Cheveux Réparateur, Huile Essentielle Lavande Fine, Grande Trousse Cosm’Éthique',
            'saving'     => '40,20 €',
            'badge'      => 'Promo',
        ),
    );
}

function theme_perso_sync_packs_collection() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $term = term_exists( 'packs', 'product_cat' );

    if ( ! $term ) {
        $term = wp_insert_term(
            'Packs',
            'product_cat',
            array(
                'slug'        => 'packs',
                'description' => 'Routines Cosm’Éthique prêtes à l’emploi pour répondre aux besoins du visage, du corps et des cheveux.',
            )
        );
    }

    if ( is_wp_error( $term ) ) {
        return;
    }

    $term_id      = is_array( $term ) ? (int) $term['term_id'] : (int) $term;
    $visuals      = theme_perso_product_visuals();
    $descriptions = theme_perso_product_descriptions();

    foreach ( theme_perso_packs_collection_products() as $title => $data ) {
        if ( empty( $visuals[ $title ] ) || empty( $descriptions[ $title ] ) ) {
            continue;
        }

        $existing = theme_perso_get_seed_product( $title );
        $product  = $existing ? wc_get_product( $existing->ID ) : new WC_Product_Simple();

        if ( ! $product ) {
            continue;
        }

        $product->set_name( $title );
        $product->set_status( 'publish' );
        $product->set_catalog_visibility( 'visible' );
        $product->set_regular_price( $data['price'] );
        $product->set_sale_price( $data['sale_price'] );
        $product->set_price( $data['sale_price'] );
        $product->set_sku( $data['sku'] );
        $product->set_manage_stock( true );
        $product->set_stock_quantity( 40 );
        $product->set_stock_status( 'instock' );
        $product->set_description( wp_kses_post( $descriptions[ $title ]['long'] ) );
        $product->set_short_description( wp_kses_post( $descriptions[ $title ]['short'] ) );
        $product->set_category_ids( array( $term_id ) );

        $product_id = $product->save();

        if ( ! $product_id ) {
            continue;
        }

        update_post_meta( $product_id, '_cosmethique_image_url', esc_url_raw( $visuals[ $title ]['image'] ) );
        update_post_meta( $product_id, '_cosmethique_gallery_images', array_map( 'esc_url_raw', $visuals[ $title ]['gallery'] ) );
        update_post_meta( $product_id, '_cosmethique_badge', sanitize_text_field( $data['badge'] ) );
        update_post_meta( $product_id, '_cosmethique_collection_excerpt', sanitize_text_field( $data['excerpt'] ) );
        update_post_meta( $product_id, '_cosmethique_pack_contents', sanitize_text_field( $data['contents'] ) );
        update_post_meta( $product_id, '_cosmethique_pack_saving', sanitize_text_field( $data['saving'] ) );
        theme_perso_sync_product_media_gallery( $product_id, $visuals[ $title ]['gallery'] );
    }
}
add_action( 'init', 'theme_perso_sync_packs_collection', 38 );

function theme_perso_import_product_asset_to_media( $asset_url, $product_id ) {
    $theme_url = trailingslashit( get_template_directory_uri() );

    if ( 0 !== strpos( $asset_url, $theme_url ) ) {
        return 0;
    }

    $relative_path = ltrim( substr( $asset_url, strlen( $theme_url ) ), '/' );
    $source_path   = get_template_directory() . '/' . $relative_path;

    if ( ! file_exists( $source_path ) || ! is_readable( $source_path ) ) {
        return 0;
    }

    $filename  = basename( $source_path );
    $filetype  = wp_check_filetype( $filename );
    $mime_type = isset( $filetype['type'] ) ? $filetype['type'] : '';

    if ( ! in_array( $mime_type, array( 'image/jpeg', 'image/png', 'image/webp' ), true ) ) {
        return 0;
    }

    $existing = get_posts(
        array(
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'fields'         => 'ids',
            'posts_per_page' => 1,
            'meta_key'       => '_cosmethique_source_asset_url',
            'meta_value'     => esc_url_raw( $asset_url ),
        )
    );

    if ( ! empty( $existing ) ) {
        $existing_id   = (int) $existing[0];
        $attached_file = get_attached_file( $existing_id );

        if ( $attached_file && file_exists( $attached_file ) && is_writable( $attached_file ) && md5_file( $source_path ) !== md5_file( $attached_file ) ) {
            copy( $source_path, $attached_file ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_copy

            require_once ABSPATH . 'wp-admin/includes/image.php';

            $metadata = wp_generate_attachment_metadata( $existing_id, $attached_file );
            wp_update_attachment_metadata( $existing_id, $metadata );
        }

        update_post_meta( $existing_id, '_wp_attachment_image_alt', get_the_title( $product_id ) );

        return $existing_id;
    }

    $contents = file_get_contents( $source_path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
    if ( false === $contents ) {
        return 0;
    }

    $upload = wp_upload_bits( $filename, null, $contents );
    if ( ! empty( $upload['error'] ) || empty( $upload['file'] ) ) {
        return 0;
    }

    $attachment_id = wp_insert_attachment(
        array(
            'post_mime_type' => $mime_type,
            'post_title'     => sanitize_text_field( pathinfo( $filename, PATHINFO_FILENAME ) ),
            'post_content'   => '',
            'post_status'    => 'inherit',
        ),
        $upload['file'],
        $product_id
    );

    if ( is_wp_error( $attachment_id ) || ! $attachment_id ) {
        return 0;
    }

    require_once ABSPATH . 'wp-admin/includes/image.php';

    $metadata = wp_generate_attachment_metadata( $attachment_id, $upload['file'] );
    wp_update_attachment_metadata( $attachment_id, $metadata );
    update_post_meta( $attachment_id, '_cosmethique_source_asset_url', esc_url_raw( $asset_url ) );
    update_post_meta( $attachment_id, '_wp_attachment_image_alt', get_the_title( $product_id ) );

    return (int) $attachment_id;
}

function theme_perso_sync_product_media_gallery( $product_id, $gallery_urls ) {
    $attachment_ids = array();

    foreach ( $gallery_urls as $asset_url ) {
        $attachment_id = theme_perso_import_product_asset_to_media( $asset_url, $product_id );

        if ( $attachment_id ) {
            $attachment_ids[] = $attachment_id;
        }
    }

    if ( empty( $attachment_ids ) ) {
        return;
    }

    update_post_meta( $product_id, '_thumbnail_id', $attachment_ids[0] );
    update_post_meta( $product_id, '_product_image_gallery', implode( ',', array_slice( $attachment_ids, 1, 2 ) ) );
}

function theme_perso_get_shop_collection_term_ids( $collection ) {
    if ( ! taxonomy_exists( 'product_cat' ) ) {
        return array();
    }

    $config = theme_perso_shop_collection_category_config( $collection );

    if ( ! $config ) {
        return array();
    }

    $term_ids  = array();
    $canonical = theme_perso_ensure_shop_collection_term( $collection );

    if ( $canonical && ! is_wp_error( $canonical ) ) {
        $term_ids[] = (int) $canonical->term_id;
    }

    $candidate_slugs = array_map(
        'sanitize_title',
        array_merge( array( $config['slug'] ), $config['candidates'] )
    );

    $terms = get_terms(
        array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
        )
    );

    if ( is_wp_error( $terms ) || empty( $terms ) ) {
        return array_values( array_unique( $term_ids ) );
    }

    foreach ( $terms as $term ) {
        $term_name_slug = sanitize_title( $term->name );

        if ( in_array( $term->slug, $candidate_slugs, true ) || in_array( $term_name_slug, $candidate_slugs, true ) ) {
            $term_ids[] = (int) $term->term_id;
        }
    }

    return array_values( array_unique( array_filter( $term_ids ) ) );
}

function theme_perso_repair_catalog_product_state( $title, $term_ids, $fallback_data = array(), $badge = '' ) {
    if ( empty( $term_ids ) || ! function_exists( 'wc_get_product' ) ) {
        return;
    }

    $existing = theme_perso_get_seed_product( $title );

    if ( ! $existing ) {
        return;
    }

    $product = wc_get_product( $existing->ID );

    if ( ! $product ) {
        return;
    }

    $needs_save       = false;
    $current_term_ids = array_map( 'intval', $product->get_category_ids() );
    $next_term_ids    = array_values( array_unique( array_merge( $current_term_ids, $term_ids ) ) );
    $current_sorted   = $current_term_ids;
    $next_sorted      = $next_term_ids;

    sort( $current_sorted );
    sort( $next_sorted );

    if ( $current_sorted !== $next_sorted ) {
        $product->set_category_ids( $next_term_ids );
        $needs_save = true;
    }

    if ( 'publish' !== $product->get_status() ) {
        $product->set_status( 'publish' );
        $needs_save = true;
    }

    if ( 'visible' !== $product->get_catalog_visibility() ) {
        $product->set_catalog_visibility( 'visible' );
        $needs_save = true;
    }

    if ( empty( $product->get_regular_price() ) && ! empty( $fallback_data['price'] ) ) {
        $product->set_regular_price( $fallback_data['price'] );
        $product->set_price( ! empty( $fallback_data['sale_price'] ) ? $fallback_data['sale_price'] : $fallback_data['price'] );
        $needs_save = true;
    }

    if ( ! empty( $fallback_data['sale_price'] ) ) {
        if ( (string) $product->get_sale_price() !== (string) $fallback_data['sale_price'] ) {
            $product->set_sale_price( $fallback_data['sale_price'] );
            $product->set_price( $fallback_data['sale_price'] );
            $needs_save = true;
        }
    }

    $product_id    = $needs_save ? $product->save() : $product->get_id();
    $visuals       = theme_perso_product_visuals();
    $descriptions  = theme_perso_product_descriptions();
    $product_badge = $badge ? $badge : ( ! empty( $fallback_data['badge'] ) ? $fallback_data['badge'] : '' );

    if ( ! $product_id ) {
        return;
    }

    if ( ! empty( $visuals[ $title ] ) ) {
        update_post_meta( $product_id, '_cosmethique_image_url', esc_url_raw( $visuals[ $title ]['image'] ) );
        update_post_meta( $product_id, '_cosmethique_gallery_images', array_map( 'esc_url_raw', $visuals[ $title ]['gallery'] ) );
        theme_perso_sync_product_media_gallery( $product_id, $visuals[ $title ]['gallery'] );
    }

    if ( ! empty( $descriptions[ $title ] ) ) {
        wp_update_post(
            array(
                'ID'           => $product_id,
                'post_content' => wp_kses_post( $descriptions[ $title ]['long'] ),
                'post_excerpt' => wp_kses_post( $descriptions[ $title ]['short'] ),
            )
        );
    }

    if ( $product_badge ) {
        update_post_meta( $product_id, '_cosmethique_badge', sanitize_text_field( $product_badge ) );
    }

    if ( ! empty( $fallback_data['excerpt'] ) ) {
        update_post_meta( $product_id, '_cosmethique_collection_excerpt', sanitize_text_field( $fallback_data['excerpt'] ) );
    }

    if ( function_exists( 'wc_delete_product_transients' ) ) {
        wc_delete_product_transients( $product_id );
    }
}

function theme_perso_repair_catalog_categories() {
    if ( ! class_exists( 'WooCommerce' ) || ! taxonomy_exists( 'product_cat' ) ) {
        return;
    }

    if (
        ! is_admin()
        || ! current_user_can( 'manage_woocommerce' )
        || empty( $_GET['cosmethique_repair_catalog'] )
        || empty( $_GET['_wpnonce'] )
        || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'cosmethique_repair_catalog' )
    ) {
        return;
    }

    $collections = array(
        'visage'  => array(
            'products' => theme_perso_visage_collection_products(),
            'badge'    => 'Visage',
            'legacy'   => array(),
        ),
        'corps'   => array(
            'products' => theme_perso_corps_collection_products(),
            'badge'    => 'Corps',
            'legacy'   => array(
                'Gommage Corps Sucre & Lavande',
                'Lait Corps Hydratant',
                'Beurre Corporel Coco & Vanille',
                'Gel Douche Coton & Avoine',
            ),
        ),
        'cheveux' => array(
            'products' => theme_perso_cheveux_collection_products(),
            'badge'    => 'Cheveux',
            'legacy'   => array(
                'Huile Capillaire Botanique',
                'Après-Shampooing Aloe Vera & Karité',
                'Sérum Pointes Nourrissant',
                'Spray Protecteur Thermique',
            ),
        ),
    );

    foreach ( $collections as $collection => $data ) {
        $term_ids = theme_perso_get_shop_collection_term_ids( $collection );

        foreach ( $data['products'] as $title => $product_data ) {
            theme_perso_repair_catalog_product_state( $title, $term_ids, $product_data, $data['badge'] );
        }

        foreach ( $data['legacy'] as $legacy_title ) {
            theme_perso_repair_catalog_product_state( $legacy_title, $term_ids, array(), $data['badge'] );
        }
    }

    delete_option( 'rewrite_rules' );
}
add_action( 'init', 'theme_perso_repair_catalog_categories', 40 );

function theme_perso_seed_coupon() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $existing_coupon = get_page_by_title( 'COSM20', OBJECT, 'shop_coupon' );

    if ( $existing_coupon ) {
        return;
    }

    $coupon_id = wp_insert_post(
        array(
            'post_title'   => 'COSM20',
            'post_content' => 'Code promo de bienvenue COSM’ETHIQUE.',
            'post_status'  => 'publish',
            'post_author'  => 1,
            'post_type'    => 'shop_coupon',
        )
    );

    if ( $coupon_id && ! is_wp_error( $coupon_id ) ) {
        update_post_meta( $coupon_id, 'discount_type', 'percent' );
        update_post_meta( $coupon_id, 'coupon_amount', '20' );
        update_post_meta( $coupon_id, 'individual_use', 'no' );
        update_post_meta( $coupon_id, 'usage_limit', '' );
        update_post_meta( $coupon_id, 'usage_limit_per_user', '' );
    }
}
add_action( 'init', 'theme_perso_seed_coupon', 31 );

function theme_perso_make_woocommerce_store_public() {
    if ( 'yes' === get_option( 'woocommerce_coming_soon' ) ) {
        update_option( 'woocommerce_coming_soon', 'no' );
    }
}
add_action( 'init', 'theme_perso_make_woocommerce_store_public', 9 );
add_action( 'after_setup_theme', 'theme_perso_make_woocommerce_store_public', 20 );
add_filter( 'woocommerce_coming_soon_exclude', '__return_true' );

function theme_perso_upgrade_product_visuals() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $seed_products = theme_perso_product_visuals();
    $descriptions  = theme_perso_product_descriptions();

    foreach ( $seed_products as $title => $data ) {
        $product = theme_perso_get_seed_product( $title );

        if ( $product ) {
            if ( isset( $descriptions[ $title ] ) ) {
                wp_update_post(
                    array(
                        'ID'           => $product->ID,
                        'post_content' => wp_kses_post( $descriptions[ $title ]['long'] ),
                        'post_excerpt' => wp_kses_post( $descriptions[ $title ]['short'] ),
                    )
                );
            }

            update_post_meta( $product->ID, '_cosmethique_image_url', esc_url_raw( $data['image'] ) );
            update_post_meta( $product->ID, '_cosmethique_gallery_images', array_map( 'esc_url_raw', $data['gallery'] ) );

            if ( in_array( $title, array( 'Crème Hydratante Sauge & Camomille', 'Huile Essentielle Lavande Fine' ), true ) ) {
                theme_perso_sync_product_media_gallery( $product->ID, $data['gallery'] );
            }
        }
    }
}
add_action( 'init', 'theme_perso_upgrade_product_visuals', 32 );

function theme_perso_woocommerce_placeholder_img( $image ) {
    global $product;

    if ( $product instanceof WC_Product ) {
        $image_url = get_post_meta( $product->get_id(), '_cosmethique_image_url', true );

        if ( $image_url ) {
            return '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $product->get_name() ) . '" loading="lazy">';
        }

        return '<img class="cosmethique-product-fallback-img" src="' . esc_url( theme_perso_product_fallback_image_url() ) . '" alt="' . esc_attr( $product->get_name() ) . '" loading="lazy">';
    }

    return '<img class="cosmethique-product-fallback-img" src="' . esc_url( theme_perso_product_fallback_image_url() ) . '" alt="' . esc_attr__( 'COSM’ÉTHIQUE', 'theme-perso' ) . '" loading="lazy">';
}
add_filter( 'woocommerce_placeholder_img', 'theme_perso_woocommerce_placeholder_img' );

function theme_perso_woocommerce_placeholder_img_src() {
    return theme_perso_product_fallback_image_url();
}
add_filter( 'woocommerce_placeholder_img_src', 'theme_perso_woocommerce_placeholder_img_src' );

function theme_perso_woocommerce_product_image( $image, $product, $size, $attr ) {
    if ( ! $product instanceof WC_Product ) {
        return $image;
    }

    $image_url = get_post_meta( $product->get_id(), '_cosmethique_image_url', true );

    if ( ! $image_url && $product->get_image_id() ) {
        return $image;
    }

    if ( ! $image_url ) {
        $image_url = theme_perso_product_fallback_image_url();
    }

    $classes = is_array( $attr ) && isset( $attr['class'] ) ? $attr['class'] : 'attachment-woocommerce_thumbnail size-woocommerce_thumbnail';

    if ( theme_perso_is_fallback_product_image( $image_url ) ) {
        $classes .= ' cosmethique-product-fallback-img';
    }

    return '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $product->get_name() ) . '" class="' . esc_attr( $classes ) . '" loading="lazy">';
}
add_filter( 'woocommerce_product_get_image', 'theme_perso_woocommerce_product_image', 10, 4 );

function theme_perso_apply_product_coupon() {
    if ( ! class_exists( 'WooCommerce' ) || empty( $_POST['theme_perso_coupon_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['theme_perso_coupon_nonce'] ) ), 'theme_perso_apply_coupon' ) ) {
        return;
    }

    $coupon_code = isset( $_POST['coupon_code'] ) ? wc_format_coupon_code( wp_unslash( $_POST['coupon_code'] ) ) : '';

    if ( ! $coupon_code || ! WC()->cart ) {
        return;
    }

    if ( WC()->cart->is_empty() ) {
        wc_add_notice( esc_html__( 'Ajoutez un produit au panier avant d’appliquer votre code promo.', 'theme-perso' ), 'notice' );
        return;
    }

    if ( WC()->cart->has_discount( $coupon_code ) ) {
        wc_add_notice( esc_html__( 'Ce code promo est déjà appliqué à votre panier.', 'theme-perso' ), 'notice' );
        return;
    }

    if ( WC()->cart->apply_coupon( $coupon_code ) ) {
        wc_add_notice( esc_html__( 'Code promo appliqué avec succès.', 'theme-perso' ), 'success' );
    } else {
        wc_add_notice( esc_html__( 'Ce code promo n’est pas valide pour le moment.', 'theme-perso' ), 'error' );
    }
}
add_action( 'wp_loaded', 'theme_perso_apply_product_coupon' );

function theme_perso_buy_now_product() {
    if ( ! class_exists( 'WooCommerce' ) || empty( $_POST['cosmethique_buy_now'] ) || ! WC()->cart ) {
        return;
    }

    $product_id = absint( wp_unslash( $_POST['cosmethique_buy_now'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
    $quantity   = isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : 1; // phpcs:ignore WordPress.Security.NonceVerification.Missing
    $product    = $product_id ? wc_get_product( $product_id ) : null;

    if ( ! $product || ! $product->is_purchasable() ) {
        return;
    }

    WC()->cart->add_to_cart( $product_id, max( 1, $quantity ) );
    wp_safe_redirect( wc_get_checkout_url() );
    exit;
}
add_action( 'wp_loaded', 'theme_perso_buy_now_product', 20 );

function theme_perso_track_recently_viewed_product() {
    if ( ! is_product() ) {
        return;
    }

    $product_id = get_the_ID();

    if ( ! $product_id ) {
        return;
    }

    $viewed = array();

    if ( ! empty( $_COOKIE['cosmethique_recently_viewed'] ) ) {
        $viewed = array_filter( array_map( 'absint', explode( '|', wp_unslash( $_COOKIE['cosmethique_recently_viewed'] ) ) ) );
    }

    $viewed = array_values( array_diff( $viewed, array( $product_id ) ) );
    array_unshift( $viewed, $product_id );
    $viewed = array_slice( $viewed, 0, 8 );

    setcookie( 'cosmethique_recently_viewed', implode( '|', $viewed ), time() + MONTH_IN_SECONDS, COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN, is_ssl(), false );
    $_COOKIE['cosmethique_recently_viewed'] = implode( '|', $viewed );
}
add_action( 'template_redirect', 'theme_perso_track_recently_viewed_product', 20 );

function theme_perso_customize_single_product_template() {
    if ( ! is_product() ) {
        return;
    }

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
    remove_action( 'woocommerce_single_product_summary', 'theme_perso_product_pack_summary', 24 );
    remove_action( 'woocommerce_single_product_summary', 'theme_perso_product_reassurance', 35 );
    remove_action( 'woocommerce_after_single_product_summary', 'theme_perso_product_static_reviews', 8 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

    add_action( 'woocommerce_single_product_summary', 'theme_perso_single_product_summary_premium', 5 );
    add_action( 'woocommerce_after_add_to_cart_button', 'theme_perso_product_buy_now_button', 12 );
    add_action( 'woocommerce_after_single_product_summary', 'theme_perso_product_premium_sections', 8 );
}
add_action( 'wp', 'theme_perso_customize_single_product_template', 8 );

function theme_perso_product_premium_rating() {
    global $product;

    if ( ! $product instanceof WC_Product ) {
        return;
    }

    $rating_count = (int) $product->get_rating_count();
    $review_count = (int) $product->get_review_count();
    $average      = (float) $product->get_average_rating();

    if ( $average <= 0 ) {
        $average      = 4.9;
        $review_count = max( $review_count, 128 );
    }
    ?>
    <div class="product-premium-rating" aria-label="<?php echo esc_attr( sprintf( __( 'Note moyenne %1$s sur 5', 'theme-perso' ), number_format_i18n( $average, 1 ) ) ); ?>">
        <span class="stars" aria-hidden="true">★★★★★</span>
        <strong><?php echo esc_html( number_format_i18n( $average, 1 ) ); ?>/5</strong>
        <span><?php echo esc_html( sprintf( _n( '%s avis', '%s avis', $review_count, 'theme-perso' ), number_format_i18n( $review_count ) ) ); ?></span>
    </div>
    <?php
}

function theme_perso_product_benefit_items( $product = null ) {
    $name = $product instanceof WC_Product ? $product->get_name() : '';

    if ( false !== stripos( $name, 'accessoire' ) || false !== stripos( $name, 'brosse' ) || false !== stripos( $name, 'gua sha' ) || false !== stripos( $name, 'roller' ) || false !== stripos( $name, 'trousse' ) || false !== stripos( $name, 'éponge' ) ) {
        return array(
            array( 'icon' => '✦', 'label' => __( 'Rituel précis', 'theme-perso' ) ),
            array( 'icon' => '◎', 'label' => __( 'Matériaux premium', 'theme-perso' ) ),
            array( 'icon' => '♡', 'label' => __( 'Geste doux', 'theme-perso' ) ),
            array( 'icon' => '↻', 'label' => __( 'Durable', 'theme-perso' ) ),
        );
    }

    if ( false !== stripos( $name, 'pack' ) ) {
        return array(
            array( 'icon' => '✦', 'label' => __( 'Routine complète', 'theme-perso' ) ),
            array( 'icon' => '✓', 'label' => __( 'Produits assortis', 'theme-perso' ) ),
            array( 'icon' => '↻', 'label' => __( 'Prix avantageux', 'theme-perso' ) ),
            array( 'icon' => '♡', 'label' => __( 'Prêt à offrir', 'theme-perso' ) ),
        );
    }

    return array(
        array( 'icon' => '98%', 'label' => __( 'Origine naturelle', 'theme-perso' ) ),
        array( 'icon' => '♡', 'label' => __( 'Cruelty Free', 'theme-perso' ) ),
        array( 'icon' => 'FR', 'label' => __( 'Fabriqué en France', 'theme-perso' ) ),
        array( 'icon' => '↻', 'label' => __( 'Emballage recyclable', 'theme-perso' ) ),
    );
}

function theme_perso_product_benefit_cards() {
    global $product;

    if ( ! $product instanceof WC_Product ) {
        return;
    }
    ?>
    <div class="product-benefit-cards">
        <?php foreach ( theme_perso_product_benefit_items( $product ) as $benefit ) : ?>
            <span><i><?php echo esc_html( $benefit['icon'] ); ?></i><?php echo esc_html( $benefit['label'] ); ?></span>
        <?php endforeach; ?>
    </div>
    <?php
}

function theme_perso_product_buy_now_button() {
    global $product;

    if ( ! $product instanceof WC_Product || ! $product->is_purchasable() || ! $product->is_in_stock() ) {
        return;
    }
    ?>
    <button type="submit" class="button product-buy-now-button" name="cosmethique_buy_now" value="<?php echo esc_attr( $product->get_id() ); ?>">
        <?php esc_html_e( 'Acheter maintenant', 'theme-perso' ); ?>
    </button>
    <?php
}

function theme_perso_product_primary_category_name( $product ) {
    if ( ! $product instanceof WC_Product ) {
        return __( 'Soin COSM’ÉTHIQUE', 'theme-perso' );
    }

    $terms = get_the_terms( $product->get_id(), 'product_cat' );

    if ( empty( $terms ) || is_wp_error( $terms ) ) {
        return __( 'Soin COSM’ÉTHIQUE', 'theme-perso' );
    }

    $term = reset( $terms );

    return $term && ! empty( $term->name ) ? $term->name : __( 'Soin COSM’ÉTHIQUE', 'theme-perso' );
}

function theme_perso_product_short_story( $product ) {
    if ( ! $product instanceof WC_Product ) {
        return '';
    }

    $short_description = trim( wp_strip_all_tags( $product->get_short_description() ) );

    if ( $short_description ) {
        return $short_description;
    }

    return __( 'Un soin formulé avec des actifs soigneusement sélectionnés pour révéler une beauté naturelle, sensorielle et exigeante au quotidien.', 'theme-perso' );
}

function theme_perso_product_availability_label( $product ) {
    if ( ! $product instanceof WC_Product ) {
        return __( 'Disponible', 'theme-perso' );
    }

    if ( ! $product->is_in_stock() ) {
        return __( 'Rupture temporaire', 'theme-perso' );
    }

    return __( 'En stock', 'theme-perso' );
}

function theme_perso_single_product_summary_premium() {
    global $product;

    if ( ! $product instanceof WC_Product ) {
        return;
    }

    $average      = (float) $product->get_average_rating();
    $review_count = (int) $product->get_review_count();

    if ( $average <= 0 ) {
        $average      = 4.9;
        $review_count = max( $review_count, 128 );
    }
    ?>
    <section class="cosmethique-product-hero-copy" aria-label="<?php esc_attr_e( 'Présentation du produit', 'theme-perso' ); ?>">
        <span class="product-hero-kicker"><?php echo esc_html( theme_perso_product_primary_category_name( $product ) ); ?></span>
        <h1 class="product-hero-title"><?php echo esc_html( $product->get_name() ); ?></h1>

        <div class="product-hero-rating" aria-label="<?php echo esc_attr( sprintf( __( 'Note moyenne %1$s sur 5', 'theme-perso' ), number_format_i18n( $average, 1 ) ) ); ?>">
            <span aria-hidden="true">★★★★★</span>
            <strong><?php echo esc_html( number_format_i18n( $average, 1 ) ); ?>/5</strong>
            <em><?php echo esc_html( sprintf( _n( '%s avis client', '%s avis clients', $review_count, 'theme-perso' ), number_format_i18n( $review_count ) ) ); ?></em>
        </div>

        <div class="product-hero-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
        <p class="product-hero-description"><?php echo esc_html( theme_perso_product_short_story( $product ) ); ?></p>

        <div class="product-hero-status">
            <span><?php echo esc_html( theme_perso_product_availability_label( $product ) ); ?></span>
            <span><?php esc_html_e( 'Expédition 24–72h', 'theme-perso' ); ?></span>
            <span><?php esc_html_e( 'Paiement sécurisé', 'theme-perso' ); ?></span>
        </div>

        <div class="product-hero-benefits">
            <?php foreach ( theme_perso_product_benefit_items( $product ) as $benefit ) : ?>
                <span><i><?php echo esc_html( $benefit['icon'] ); ?></i><?php echo esc_html( $benefit['label'] ); ?></span>
            <?php endforeach; ?>
        </div>

        <div class="product-hero-purchase">
            <?php woocommerce_template_single_add_to_cart(); ?>
            <button class="button product-favorite-button" type="button" aria-pressed="false">
                <?php esc_html_e( 'Ajouter aux favoris', 'theme-perso' ); ?>
            </button>
        </div>
    </section>
    <?php
}

function theme_perso_disable_native_product_gallery() {
    global $product;

    if ( ! $product instanceof WC_Product ) {
        return;
    }

    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
}
add_action( 'woocommerce_before_single_product_summary', 'theme_perso_disable_native_product_gallery', 1 );

function theme_perso_single_product_gallery() {
    global $product;

    if ( ! $product instanceof WC_Product ) {
        return;
    }

    $gallery = get_post_meta( $product->get_id(), '_cosmethique_gallery_images', true );

    if ( ! is_array( $gallery ) || empty( $gallery ) ) {
        $image = get_post_meta( $product->get_id(), '_cosmethique_image_url', true );
        $gallery = $image ? array( $image ) : array();
    }

    if ( empty( $gallery ) && $product->get_image_id() ) {
        $main_image = wp_get_attachment_image_url( $product->get_image_id(), 'full' );

        if ( $main_image ) {
            $gallery[] = $main_image;
        }

        foreach ( $product->get_gallery_image_ids() as $gallery_image_id ) {
            $gallery_image_url = wp_get_attachment_image_url( $gallery_image_id, 'full' );

            if ( $gallery_image_url ) {
                $gallery[] = $gallery_image_url;
            }
        }
    }

    if ( empty( $gallery ) ) {
        $gallery[] = theme_perso_product_fallback_image_url();
    }

    if ( empty( $gallery ) ) {
        return;
    }
    ?>
    <section class="cosmethique-product-gallery" aria-label="<?php esc_attr_e( 'Galerie produit', 'theme-perso' ); ?>" data-cosmethique-gallery>
        <button class="cosmethique-gallery-main" type="button" data-gallery-open aria-label="<?php esc_attr_e( 'Agrandir l’image produit', 'theme-perso' ); ?>">
            <img src="<?php echo esc_url( $gallery[0] ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>" loading="eager" data-gallery-main-image>
        </button>
        <?php if ( count( $gallery ) > 1 ) : ?>
            <div class="cosmethique-gallery-thumbs" aria-label="<?php esc_attr_e( 'Miniatures produit', 'theme-perso' ); ?>">
                <?php foreach ( array_slice( $gallery, 0, 3 ) as $index => $image_url ) : ?>
                    <?php
                    $thumb_alt = 0 === $index
                        ? sprintf( __( '%s - face avant', 'theme-perso' ), $product->get_name() )
                        : sprintf( __( '%s - vue %d', 'theme-perso' ), $product->get_name(), $index + 1 );
                    ?>
                    <button
                        class="cosmethique-gallery-thumb<?php echo 0 === $index ? ' is-active' : ''; ?>"
                        type="button"
                        data-gallery-thumb
                        data-gallery-src="<?php echo esc_url( $image_url ); ?>"
                        data-gallery-alt="<?php echo esc_attr( $thumb_alt ); ?>"
                        aria-label="<?php echo esc_attr( $thumb_alt ); ?>"
                        aria-current="<?php echo 0 === $index ? 'true' : 'false'; ?>"
                    >
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $thumb_alt ); ?>" loading="lazy">
                    </button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
    <?php
}
add_action( 'woocommerce_before_single_product_summary', 'theme_perso_single_product_gallery', 5 );

function theme_perso_product_coupon_bar() {
    global $product;

    if ( ! $product instanceof WC_Product ) {
        return;
    }
    
    ?>
    <form class="product-coupon-bar" method="post">
        <label for="cosmethique-coupon-code"><?php esc_html_e( 'Code promo', 'theme-perso' ); ?></label>
        <div>
            <input id="cosmethique-coupon-code" type="text" name="coupon_code" value="COSM20" placeholder="<?php esc_attr_e( 'Ex: COSM20', 'theme-perso' ); ?>">
            <?php wp_nonce_field( 'theme_perso_apply_coupon', 'theme_perso_coupon_nonce' ); ?>
            <button class="button button-outline" type="submit"><?php esc_html_e( 'Appliquer', 'theme-perso' ); ?></button>
        </div>
        <small><?php esc_html_e( 'Astuce: utilisez COSM20 pour tester une remise de bienvenue.', 'theme-perso' ); ?></small>
    </form>
    <?php
}

function theme_perso_product_pack_summary() {
    global $product;

    if ( ! $product instanceof WC_Product ) {
        return;
    }

    $contents = get_post_meta( $product->get_id(), '_cosmethique_pack_contents', true );
    $saving   = get_post_meta( $product->get_id(), '_cosmethique_pack_saving', true );

    if ( ! $contents && ! $saving ) {
        return;
    }

    $items = array_filter( array_map( 'trim', explode( ',', (string) $contents ) ) );
    ?>
    <section class="product-pack-summary">
        <?php if ( $saving ) : ?>
            <span><?php echo esc_html( sprintf( __( 'Économie réalisée : %s', 'theme-perso' ), $saving ) ); ?></span>
        <?php endif; ?>
        <?php if ( ! empty( $items ) ) : ?>
            <h2><?php esc_html_e( 'Contenu du pack', 'theme-perso' ); ?></h2>
            <ul>
                <?php foreach ( $items as $item ) : ?>
                    <li><?php echo esc_html( $item ); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>
    <?php
}
add_action( 'woocommerce_single_product_summary', 'theme_perso_product_pack_summary', 24 );

function theme_perso_product_reassurance() {
    global $product;

    if ( ! $product instanceof WC_Product ) {
        return;
    }

    ?>
    <div class="product-reassurance">
        <span><?php esc_html_e( 'Livraison offerte dès 40€', 'theme-perso' ); ?></span>
        <span><?php esc_html_e( 'Paiement sécurisé', 'theme-perso' ); ?></span>
        <span><?php esc_html_e( 'Formule cruelty free', 'theme-perso' ); ?></span>
        <span><?php esc_html_e( 'Visa · Apple Pay · Google Pay', 'theme-perso' ); ?></span>
        <span><?php esc_html_e( '1€ = 1 point fidélité', 'theme-perso' ); ?></span>
        <span><?php esc_html_e( 'Retours accompagnés', 'theme-perso' ); ?></span>
    </div>
    <?php
}
add_action( 'woocommerce_single_product_summary', 'theme_perso_product_reassurance', 35 );

function theme_perso_product_static_reviews() {
    global $product;

    if ( ! $product instanceof WC_Product ) {
        return;
    }

    ?>
    <section class="product-review-highlights">
        <h2><?php esc_html_e( 'Avis clientes', 'theme-perso' ); ?></h2>
        <div class="product-review-grid">
            <figure>
                <span class="stars" aria-hidden="true">★★★★★</span>
                <blockquote><?php esc_html_e( 'La texture est vraiment premium. Le produit correspond exactement à la promesse et s’intègre facilement dans ma routine.', 'theme-perso' ); ?></blockquote>
                <figcaption>Camille R.</figcaption>
            </figure>
            <figure>
                <span class="stars" aria-hidden="true">★★★★★</span>
                <blockquote><?php esc_html_e( 'J’aime le côté naturel mais élégant. Le parfum est discret, le packaging est beau, et la peau reste confortable.', 'theme-perso' ); ?></blockquote>
                <figcaption>Nora B.</figcaption>
            </figure>
            <figure>
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <blockquote><?php esc_html_e( 'Très bonne découverte. La livraison a été rapide et les conseils d’utilisation sur la fiche produit sont clairs.', 'theme-perso' ); ?></blockquote>
                <figcaption>Leila M.</figcaption>
            </figure>
        </div>
    </section>
    <?php
}

function theme_perso_product_key_ingredients( $product = null ) {
    $name = $product instanceof WC_Product ? $product->get_name() : '';

    $sets = array(
        'rose' => array(
            array( 'image' => theme_perso_product_asset_url( 'ingredient-rose.svg' ), 'name' => 'Rose', 'benefit' => __( 'Illumine et adoucit le teint.', 'theme-perso' ) ),
            array( 'image' => theme_perso_product_asset_url( 'texture-creme.svg' ), 'name' => 'Acide hyaluronique', 'benefit' => __( 'Aide à maintenir l’hydratation.', 'theme-perso' ) ),
            array( 'image' => theme_perso_product_asset_url( 'botanical-oil.svg' ), 'name' => 'Aloe vera', 'benefit' => __( 'Apaise et rafraîchit la peau.', 'theme-perso' ) ),
        ),
        'corps' => array(
            array( 'image' => theme_perso_product_asset_url( 'baume-corps.svg' ), 'name' => 'Karité', 'benefit' => __( 'Nourrit intensément.', 'theme-perso' ) ),
            array( 'image' => theme_perso_product_asset_url( 'botanical-oil.svg' ), 'name' => 'Amande douce', 'benefit' => __( 'Apaise et assouplit.', 'theme-perso' ) ),
            array( 'image' => theme_perso_product_asset_url( 'lavender-ingredient.svg' ), 'name' => 'Lavande', 'benefit' => __( 'Apporte une signature sensorielle.', 'theme-perso' ) ),
        ),
        'cheveux' => array(
            array( 'image' => theme_perso_product_asset_url( 'hair-ritual.svg' ), 'name' => 'Sauge', 'benefit' => __( 'Aide à équilibrer.', 'theme-perso' ) ),
            array( 'image' => theme_perso_product_asset_url( 'masque-cheveux.svg' ), 'name' => 'Karité', 'benefit' => __( 'Nourrit la fibre capillaire.', 'theme-perso' ) ),
            array( 'image' => theme_perso_product_asset_url( 'botanical-oil.svg' ), 'name' => 'Argan', 'benefit' => __( 'Apporte brillance et douceur.', 'theme-perso' ) ),
        ),
    );

    if ( false !== stripos( $name, 'cheveux' ) || false !== stripos( $name, 'shampooing' ) || false !== stripos( $name, 'capillaire' ) ) {
        return $sets['cheveux'];
    }

    if ( false !== stripos( $name, 'corps' ) || false !== stripos( $name, 'baume' ) || false !== stripos( $name, 'huile sèche' ) || false !== stripos( $name, 'gommage' ) ) {
        return $sets['corps'];
    }

    return $sets['rose'];
}

function theme_perso_product_faq_items( $product = null ) {
    return array(
        array(
            'question' => __( 'Ce produit convient-il aux peaux sensibles ?', 'theme-perso' ),
            'answer'   => __( 'Oui, la routine COSM’ÉTHIQUE privilégie des textures douces et des actifs sélectionnés avec soin. En cas de sensibilité particulière, réalisez toujours un test localisé avant la première utilisation.', 'theme-perso' ),
        ),
        array(
            'question' => __( 'Puis-je l’utiliser tous les jours ?', 'theme-perso' ),
            'answer'   => __( 'La majorité des soins peut s’intégrer dans une routine quotidienne. Les masques, gommages et huiles essentielles doivent être utilisés selon les conseils indiqués sur la fiche.', 'theme-perso' ),
        ),
        array(
            'question' => __( 'Le produit est-il cruelty free ?', 'theme-perso' ),
            'answer'   => __( 'Oui, COSM’ÉTHIQUE défend une beauté respectueuse et ne teste pas ses produits sur les animaux.', 'theme-perso' ),
        ),
        array(
            'question' => __( 'Comment optimiser les résultats ?', 'theme-perso' ),
            'answer'   => __( 'Appliquez le soin régulièrement, sur peau propre, en suivant l’ordre de routine recommandé : nettoyer, cibler, hydrater, puis nourrir si nécessaire.', 'theme-perso' ),
        ),
    );
}

function theme_perso_get_products_by_names( $names, $limit = 4, $exclude_id = 0 ) {
    $products = array();

    foreach ( $names as $name ) {
        $post = theme_perso_get_seed_product( $name );

        if ( ! $post || (int) $post->ID === (int) $exclude_id ) {
            continue;
        }

        $product = wc_get_product( $post->ID );

        if ( $product instanceof WC_Product && $product->is_visible() ) {
            $products[] = $product;
        }

        if ( count( $products ) >= $limit ) {
            break;
        }
    }

    return $products;
}

function theme_perso_product_routine_products( $product ) {
    $name = $product instanceof WC_Product ? $product->get_name() : '';

    if ( false !== stripos( $name, 'cheveux' ) || false !== stripos( $name, 'shampooing' ) || false !== stripos( $name, 'capillaire' ) ) {
        return theme_perso_get_products_by_names(
            array( 'Shampooing Doux Sauge & Ortie', 'Masque Cheveux Réparateur', 'Huile Capillaire Botanique', 'Sérum Pointes Nourrissant' ),
            4,
            $product->get_id()
        );
    }

    if ( false !== stripos( $name, 'corps' ) || false !== stripos( $name, 'baume' ) || false !== stripos( $name, 'huile sèche' ) || false !== stripos( $name, 'gommage' ) ) {
        return theme_perso_get_products_by_names(
            array( 'Baume Corps Karité & Amande', 'Huile Sèche Botanique', 'Gommage Corps Sucre & Lavande', 'Lait Corps Hydratant' ),
            4,
            $product->get_id()
        );
    }

    return theme_perso_get_products_by_names(
        array( 'Gel Nettoyant Aloe Vera', 'Sérum Éclat à la Rose', 'Crème Hydratante Sauge & Camomille', 'Masque Purifiant Argile Verte' ),
        4,
        $product->get_id()
    );
}

function theme_perso_render_premium_product_card( $product ) {
    if ( ! $product instanceof WC_Product ) {
        return;
    }

    $image = get_post_meta( $product->get_id(), '_cosmethique_image_url', true );

    if ( ! $image ) {
        $image = theme_perso_product_fallback_image_url();
    }
    ?>
    <article class="premium-product-card">
        <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" aria-label="<?php echo esc_attr( $product->get_name() ); ?>">
            <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>" loading="lazy">
        </a>
        <h3><?php echo esc_html( $product->get_name() ); ?></h3>
        <p><?php echo wp_kses_post( $product->get_price_html() ); ?></p>
        <a class="button button-outline" href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"><?php esc_html_e( 'Voir le produit', 'theme-perso' ); ?></a>
    </article>
    <?php
}

function theme_perso_related_products_for_current( $product, $limit = 4 ) {
    $related_ids = wc_get_related_products( $product->get_id(), $limit + 2 );
    $products    = array();

    foreach ( $related_ids as $related_id ) {
        $related = wc_get_product( $related_id );

        if ( $related instanceof WC_Product && $related->is_visible() ) {
            $products[] = $related;
        }

        if ( count( $products ) >= $limit ) {
            break;
        }
    }

    if ( count( $products ) < $limit ) {
        $fallback_names = array(
            'Sérum Éclat à la Rose',
            'Crème Hydratante Sauge & Camomille',
            'Baume Corps Karité & Amande',
            'Masque Cheveux Réparateur',
            'Huile Sèche Botanique',
            'Trousse Beauté Cosm’Éthique',
        );
        $products = array_merge( $products, theme_perso_get_products_by_names( $fallback_names, $limit - count( $products ), $product->get_id() ) );
    }

    return array_slice( $products, 0, $limit );
}

function theme_perso_recently_viewed_products( $current_id, $limit = 4 ) {
    if ( empty( $_COOKIE['cosmethique_recently_viewed'] ) ) {
        return array();
    }

    $ids      = array_filter( array_map( 'absint', explode( '|', wp_unslash( $_COOKIE['cosmethique_recently_viewed'] ) ) ) );
    $products = array();

    foreach ( $ids as $id ) {
        if ( (int) $id === (int) $current_id ) {
            continue;
        }

        $product = wc_get_product( $id );

        if ( $product instanceof WC_Product && $product->is_visible() ) {
            $products[] = $product;
        }

        if ( count( $products ) >= $limit ) {
            break;
        }
    }

    return $products;
}

function theme_perso_product_detail_items( $product ) {
    $name = $product instanceof WC_Product ? $product->get_name() : '';

    if ( false !== stripos( $name, 'accessoire' ) || false !== stripos( $name, 'brosse' ) || false !== stripos( $name, 'gua sha' ) || false !== stripos( $name, 'roller' ) || false !== stripos( $name, 'trousse' ) || false !== stripos( $name, 'éponge' ) ) {
        return array(
            array( 'icon' => '✦', 'title' => __( 'Pourquoi cet accessoire ?', 'theme-perso' ), 'text' => __( 'Il accompagne les gestes beauté avec précision et apporte une finition premium à chaque routine.', 'theme-perso' ) ),
            array( 'icon' => '◎', 'title' => __( 'Pour quel usage ?', 'theme-perso' ), 'text' => __( 'Idéal pour compléter le nettoyage, le massage, le coiffage ou l’organisation de vos essentiels.', 'theme-perso' ) ),
            array( 'icon' => '♡', 'title' => __( 'Ses bénéfices', 'theme-perso' ), 'text' => __( 'Un rituel plus fluide, plus sensoriel et plus durable, pensé pour le quotidien.', 'theme-perso' ) ),
            array( 'icon' => '↻', 'title' => __( 'Sa finition', 'theme-perso' ), 'text' => __( 'Matières sélectionnées, lignes sobres et rendu élégant pour une salle de bain haut de gamme.', 'theme-perso' ) ),
        );
    }

    if ( false !== stripos( $name, 'cheveux' ) || false !== stripos( $name, 'shampooing' ) || false !== stripos( $name, 'capillaire' ) ) {
        return array(
            array( 'icon' => '✦', 'title' => __( 'Pourquoi ce soin ?', 'theme-perso' ), 'text' => __( 'Il aide à restaurer la douceur, la brillance et le confort de la fibre capillaire.', 'theme-perso' ) ),
            array( 'icon' => '◎', 'title' => __( 'Pour quel type de cheveux ?', 'theme-perso' ), 'text' => __( 'Pensé pour les cheveux qui recherchent équilibre, nutrition et toucher léger.', 'theme-perso' ) ),
            array( 'icon' => '♡', 'title' => __( 'Ses bénéfices', 'theme-perso' ), 'text' => __( 'Les longueurs paraissent plus souples, plus disciplinées et visiblement plus lumineuses.', 'theme-perso' ) ),
            array( 'icon' => '☾', 'title' => __( 'Sa texture', 'theme-perso' ), 'text' => __( 'Une texture sensorielle facile à répartir, sans effet lourd lorsqu’elle est bien dosée.', 'theme-perso' ) ),
            array( 'icon' => '✧', 'title' => __( 'Son parfum', 'theme-perso' ), 'text' => __( 'Une signature botanique discrète qui accompagne le rituel sans saturer les sens.', 'theme-perso' ) ),
            array( 'icon' => '✓', 'title' => __( 'Son utilisation', 'theme-perso' ), 'text' => __( 'À intégrer dans votre routine capillaire selon le besoin : nettoyage, nutrition ou finition.', 'theme-perso' ) ),
        );
    }

    if ( false !== stripos( $name, 'corps' ) || false !== stripos( $name, 'baume' ) || false !== stripos( $name, 'huile sèche' ) || false !== stripos( $name, 'gommage' ) || false !== stripos( $name, 'lait' ) ) {
        return array(
            array( 'icon' => '✦', 'title' => __( 'Pourquoi ce soin ?', 'theme-perso' ), 'text' => __( 'Il enveloppe la peau de confort et transforme l’hydratation du corps en rituel sensoriel.', 'theme-perso' ) ),
            array( 'icon' => '◎', 'title' => __( 'Pour quel type de peau ?', 'theme-perso' ), 'text' => __( 'Adapté aux peaux qui recherchent nutrition, souplesse et confort durable.', 'theme-perso' ) ),
            array( 'icon' => '♡', 'title' => __( 'Ses bénéfices', 'theme-perso' ), 'text' => __( 'La peau paraît plus douce, plus satinée et mieux protégée des sensations de tiraillement.', 'theme-perso' ) ),
            array( 'icon' => '☾', 'title' => __( 'Sa texture', 'theme-perso' ), 'text' => __( 'Une texture généreuse ou satinée selon le soin, pensée pour une application agréable.', 'theme-perso' ) ),
            array( 'icon' => '✧', 'title' => __( 'Son parfum', 'theme-perso' ), 'text' => __( 'Des notes naturelles, subtiles et réconfortantes, sans excès.', 'theme-perso' ) ),
            array( 'icon' => '✓', 'title' => __( 'Son utilisation', 'theme-perso' ), 'text' => __( 'À appliquer après la douche ou dès que la peau demande plus de confort.', 'theme-perso' ) ),
        );
    }

    return array(
        array( 'icon' => '✦', 'title' => __( 'Pourquoi ce soin ?', 'theme-perso' ), 'text' => __( 'Il accompagne la peau avec une formule naturelle, précise et pensée pour révéler l’éclat.', 'theme-perso' ) ),
        array( 'icon' => '◎', 'title' => __( 'Pour quel type de peau ?', 'theme-perso' ), 'text' => __( 'Idéal pour les peaux qui recherchent hydratation, confort et équilibre au quotidien.', 'theme-perso' ) ),
        array( 'icon' => '♡', 'title' => __( 'Ses bénéfices', 'theme-perso' ), 'text' => __( 'La peau semble plus lumineuse, plus douce et mieux préparée à recevoir les soins suivants.', 'theme-perso' ) ),
        array( 'icon' => '☾', 'title' => __( 'Sa texture', 'theme-perso' ), 'text' => __( 'Une texture élégante, facile à appliquer, conçue pour laisser un fini confortable.', 'theme-perso' ) ),
        array( 'icon' => '✧', 'title' => __( 'Son parfum', 'theme-perso' ), 'text' => __( 'Une signature douce et botanique, fidèle à l’univers COSM’ÉTHIQUE.', 'theme-perso' ) ),
        array( 'icon' => '✓', 'title' => __( 'Son utilisation', 'theme-perso' ), 'text' => __( 'À utiliser sur peau propre, seul ou dans une routine complète selon vos besoins.', 'theme-perso' ) ),
    );
}

function theme_perso_product_routine_steps( $product ) {
    $name = $product instanceof WC_Product ? $product->get_name() : '';

    if ( false !== stripos( $name, 'cheveux' ) || false !== stripos( $name, 'shampooing' ) || false !== stripos( $name, 'capillaire' ) ) {
        return array(
            array( 'title' => __( 'Nettoyer', 'theme-perso' ), 'text' => __( 'Laver délicatement le cuir chevelu sans agresser la fibre.', 'theme-perso' ) ),
            array( 'title' => __( 'Nourrir', 'theme-perso' ), 'text' => __( 'Appliquer le masque ou le soin ciblé sur les longueurs.', 'theme-perso' ) ),
            array( 'title' => __( 'Sublimer', 'theme-perso' ), 'text' => __( 'Terminer par une huile ou un sérum sur les pointes.', 'theme-perso' ) ),
        );
    }

    if ( false !== stripos( $name, 'corps' ) || false !== stripos( $name, 'baume' ) || false !== stripos( $name, 'huile sèche' ) || false !== stripos( $name, 'gommage' ) ) {
        return array(
            array( 'title' => __( 'Préparer', 'theme-perso' ), 'text' => __( 'Appliquer sur peau propre, idéalement après la douche.', 'theme-perso' ) ),
            array( 'title' => __( 'Masser', 'theme-perso' ), 'text' => __( 'Faire pénétrer avec des mouvements circulaires et lents.', 'theme-perso' ) ),
            array( 'title' => __( 'Protéger', 'theme-perso' ), 'text' => __( 'Répéter régulièrement pour maintenir douceur et confort.', 'theme-perso' ) ),
        );
    }

    return array(
        array( 'title' => __( 'Nettoyer', 'theme-perso' ), 'text' => __( 'Préparer la peau avec un nettoyage doux et adapté.', 'theme-perso' ) ),
        array( 'title' => __( 'Cibler', 'theme-perso' ), 'text' => __( 'Appliquer le soin sur les zones qui ont besoin d’éclat ou de confort.', 'theme-perso' ) ),
        array( 'title' => __( 'Hydrater', 'theme-perso' ), 'text' => __( 'Sceller la routine avec une crème ou une huile selon votre peau.', 'theme-perso' ) ),
    );
}

function theme_perso_product_gallery_images( $product ) {
    if ( ! $product instanceof WC_Product ) {
        return array();
    }

    $gallery = get_post_meta( $product->get_id(), '_cosmethique_gallery_images', true );

    if ( ! is_array( $gallery ) || empty( $gallery ) ) {
        $gallery = array();
    }

    $image = get_post_meta( $product->get_id(), '_cosmethique_image_url', true );

    if ( $image ) {
        array_unshift( $gallery, $image );
    }

    if ( empty( $gallery ) && $product->get_image_id() ) {
        $main_image = wp_get_attachment_image_url( $product->get_image_id(), 'full' );
        if ( $main_image ) {
            $gallery[] = $main_image;
        }
    }

    $gallery = array_values( array_unique( array_filter( $gallery ) ) );

    if ( empty( $gallery ) ) {
        $gallery[] = theme_perso_product_fallback_image_url();
    }

    return $gallery;
}

function theme_perso_product_premium_sections() {
    global $product;

    if ( ! $product instanceof WC_Product ) {
        return;
    }

    $ingredients      = theme_perso_product_key_ingredients( $product );
    $routine_products = theme_perso_product_routine_products( $product );
    $related_products = theme_perso_related_products_for_current( $product, 4 );
    $recent_products  = theme_perso_recently_viewed_products( $product->get_id(), 4 );
    $detail_items     = theme_perso_product_detail_items( $product );
    $routine_steps    = theme_perso_product_routine_steps( $product );
    ?>
    <div class="product-premium-sections">
        <section class="product-premium-section product-detail-immersive">
            <div class="product-section-heading">
                <span><?php esc_html_e( 'Le produit en détail', 'theme-perso' ); ?></span>
                <h2><?php esc_html_e( 'Une formule pensée pour votre rituel.', 'theme-perso' ); ?></h2>
            </div>
            <div class="product-detail-grid">
                <?php foreach ( $detail_items as $item ) : ?>
                    <article>
                        <span aria-hidden="true"><?php echo esc_html( $item['icon'] ); ?></span>
                        <h3><?php echo esc_html( $item['title'] ); ?></h3>
                        <p><?php echo esc_html( $item['text'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="product-premium-section product-ingredients-section">
            <div class="product-section-heading">
                <span><?php esc_html_e( 'Actifs naturels', 'theme-perso' ); ?></span>
                <h2><?php esc_html_e( 'Les ingrédients clés', 'theme-perso' ); ?></h2>
            </div>
            <div class="product-ingredient-grid">
                <?php foreach ( $ingredients as $ingredient ) : ?>
                    <article>
                        <img src="<?php echo esc_url( $ingredient['image'] ); ?>" alt="<?php echo esc_attr( $ingredient['name'] ); ?>" loading="lazy">
                        <h3><?php echo esc_html( $ingredient['name'] ); ?></h3>
                        <p><?php echo esc_html( $ingredient['benefit'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="product-premium-section product-routine-timeline-section">
            <div class="product-section-heading">
                <span><?php esc_html_e( 'Routine beauté', 'theme-perso' ); ?></span>
                <h2><?php esc_html_e( 'Comment l’utiliser', 'theme-perso' ); ?></h2>
            </div>
            <div class="product-routine-timeline">
                <?php foreach ( $routine_steps as $index => $step ) : ?>
                    <article>
                        <span><?php echo esc_html( $index + 1 ); ?></span>
                        <h3><?php echo esc_html( $step['title'] ); ?></h3>
                        <p><?php echo esc_html( $step['text'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <?php if ( ! empty( $routine_products ) ) : ?>
            <section class="product-premium-section product-routine-section">
                <div class="product-section-heading">
                    <span><?php esc_html_e( 'Produits complémentaires', 'theme-perso' ); ?></span>
                    <h2><?php esc_html_e( 'Complétez votre routine.', 'theme-perso' ); ?></h2>
                </div>
                <div class="premium-product-grid premium-product-grid--routine">
                    <?php foreach ( $routine_products as $routine_product ) : ?>
                        <?php theme_perso_render_premium_product_card( $routine_product ); ?>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <section class="product-premium-section product-client-reviews">
            <div class="product-section-heading">
                <span><?php esc_html_e( 'Avis clients', 'theme-perso' ); ?></span>
                <h2><?php esc_html_e( 'Elles ont adopté COSM’ÉTHIQUE', 'theme-perso' ); ?></h2>
            </div>
            <div class="product-review-filters" aria-label="<?php esc_attr_e( 'Filtres avis', 'theme-perso' ); ?>">
                <button type="button"><?php esc_html_e( 'Tous', 'theme-perso' ); ?></button>
                <button type="button"><?php esc_html_e( 'Texture', 'theme-perso' ); ?></button>
                <button type="button"><?php esc_html_e( 'Résultats', 'theme-perso' ); ?></button>
                <button type="button"><?php esc_html_e( 'Routine', 'theme-perso' ); ?></button>
            </div>
            <div class="product-review-grid product-review-grid--premium">
                <figure>
                    <img src="<?php echo esc_url( theme_perso_product_asset_url( 'photo-serum-eclat-rose.png' ) ); ?>" alt="<?php esc_attr_e( 'Photo cliente Cosm’Éthique', 'theme-perso' ); ?>" loading="lazy">
                    <span class="stars" aria-hidden="true">★★★★★</span>
                    <blockquote><?php esc_html_e( 'Texture raffinée, application facile et un vrai sentiment de soin premium dès les premiers jours.', 'theme-perso' ); ?></blockquote>
                    <figcaption>Camille R. · <?php esc_html_e( 'il y a 8 jours', 'theme-perso' ); ?></figcaption>
                </figure>
                <figure>
                    <img src="<?php echo esc_url( theme_perso_product_asset_url( 'photo-creme-hydratante-sauge-camomille.png' ) ); ?>" alt="<?php esc_attr_e( 'Routine cliente Cosm’Éthique', 'theme-perso' ); ?>" loading="lazy">
                    <span class="stars" aria-hidden="true">★★★★★</span>
                    <blockquote><?php esc_html_e( 'La fiche est claire, les produits sont beaux et la routine donne envie de rester régulière.', 'theme-perso' ); ?></blockquote>
                    <figcaption>Nora B. · <?php esc_html_e( 'il y a 2 semaines', 'theme-perso' ); ?></figcaption>
                </figure>
                <figure>
                    <img src="<?php echo esc_url( theme_perso_product_asset_url( 'photo-baume-corps-karite-amande.png' ) ); ?>" alt="<?php esc_attr_e( 'Soin Cosm’Éthique en situation', 'theme-perso' ); ?>" loading="lazy">
                    <span class="stars" aria-hidden="true">★★★★☆</span>
                    <blockquote><?php esc_html_e( 'Un univers naturel mais très élégant. La livraison est rapide et le packaging fait vraiment premium.', 'theme-perso' ); ?></blockquote>
                    <figcaption>Leila M. · <?php esc_html_e( 'il y a 1 mois', 'theme-perso' ); ?></figcaption>
                </figure>
            </div>
        </section>

        <section class="product-premium-section product-faq-section">
            <div class="product-section-heading">
                <span><?php esc_html_e( 'Questions fréquentes', 'theme-perso' ); ?></span>
                <h2><?php esc_html_e( 'Tout savoir avant de commander', 'theme-perso' ); ?></h2>
            </div>
            <div class="product-faq-list">
                <?php foreach ( theme_perso_product_faq_items( $product ) as $item ) : ?>
                    <details>
                        <summary><?php echo esc_html( $item['question'] ); ?></summary>
                        <p><?php echo esc_html( $item['answer'] ); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </section>

        <?php if ( ! empty( $related_products ) ) : ?>
            <section class="product-premium-section product-similar-slider-section">
                <div class="product-section-heading">
                    <span><?php esc_html_e( 'Sélection associée', 'theme-perso' ); ?></span>
                    <h2><?php esc_html_e( 'Produits similaires', 'theme-perso' ); ?></h2>
                </div>
                <div class="premium-product-grid premium-product-grid--slider">
                    <?php foreach ( $related_products as $related_product ) : ?>
                        <?php theme_perso_render_premium_product_card( $related_product ); ?>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if ( ! empty( $recent_products ) ) : ?>
            <section class="product-premium-section">
                <div class="product-section-heading">
                    <span><?php esc_html_e( 'Votre sélection', 'theme-perso' ); ?></span>
                    <h2><?php esc_html_e( 'Produits récemment consultés', 'theme-perso' ); ?></h2>
                </div>
                <div class="premium-product-grid">
                    <?php foreach ( $recent_products as $recent_product ) : ?>
                        <?php theme_perso_render_premium_product_card( $recent_product ); ?>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

    </div>
    <?php
}

function theme_perso_shop_product_card_data( $title, $fallback = array() ) {
    $post = function_exists( 'theme_perso_get_seed_product' ) ? theme_perso_get_seed_product( $title ) : get_page_by_title( $title, OBJECT, 'product' );

    $catalog_data = array();
    foreach ( array( 'theme_perso_visage_collection_products', 'theme_perso_corps_collection_products', 'theme_perso_cheveux_collection_products', 'theme_perso_accessoires_collection_products', 'theme_perso_packs_collection_products' ) as $catalog_callback ) {
        if ( function_exists( $catalog_callback ) ) {
            $catalog_data = array_merge( $catalog_data, call_user_func( $catalog_callback ) );
        }
    }

    $seed_data = isset( $catalog_data[ $title ] ) ? $catalog_data[ $title ] : array();

    if ( ! $post && ! empty( $seed_data['sku'] ) && function_exists( 'wc_get_product_id_by_sku' ) ) {
        $product_id = wc_get_product_id_by_sku( $seed_data['sku'] );
        $post       = $product_id ? get_post( $product_id ) : null;
    }

    $product = $post && function_exists( 'wc_get_product' ) ? wc_get_product( $post->ID ) : null;
    $visuals = function_exists( 'theme_perso_product_visuals' ) ? theme_perso_product_visuals() : array();
    $excerpt = '';

    $image = '';
    if ( $post ) {
        $image   = get_post_meta( $post->ID, '_cosmethique_image_url', true );
        $excerpt = get_post_meta( $post->ID, '_cosmethique_collection_excerpt', true );
    }

    if ( ! $image && isset( $visuals[ $title ]['image'] ) ) {
        $image = $visuals[ $title ]['image'];
    }

    if ( ! $image && ! empty( $fallback['image'] ) ) {
        $image = $fallback['image'];
    }

    if ( ! $image ) {
        $image = theme_perso_product_fallback_image_url();
    }

    $price_html = $product ? $product->get_price_html() : '';

    if ( '' === trim( wp_strip_all_tags( $price_html ) ) ) {
        $regular_price = isset( $fallback['price'] ) ? $fallback['price'] : ( isset( $seed_data['price'] ) ? number_format_i18n( (float) $seed_data['price'], 2 ) . ' €' : '' );
        $sale_price    = isset( $fallback['sale_price'] ) ? $fallback['sale_price'] : ( isset( $seed_data['sale_price'] ) ? number_format_i18n( (float) $seed_data['sale_price'], 2 ) . ' €' : '' );

        if ( $sale_price && $regular_price && $sale_price !== $regular_price ) {
            $price_html = '<del>' . esc_html( $regular_price ) . '</del> <ins>' . esc_html( $sale_price ) . '</ins>';
        } else {
            $price_html = esc_html( $regular_price );
        }
    }

    return array(
        'title'      => $product ? $product->get_name() : $title,
        'price'      => $price_html,
        'old_price'  => isset( $fallback['old_price'] ) ? $fallback['old_price'] : '',
        'badge'      => isset( $fallback['badge'] ) ? $fallback['badge'] : '',
        'excerpt'    => $excerpt ? $excerpt : ( isset( $fallback['excerpt'] ) ? $fallback['excerpt'] : '' ),
        'image'      => $image,
        'url'        => $post ? get_permalink( $post ) : ( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' ) ),
        'discount'   => isset( $fallback['discount'] ) ? $fallback['discount'] : ( $product && $product->is_on_sale() ? 'Promo' : '' ),
    );
}

function theme_perso_shop_render_icon( $label ) {
    ?>
    <span class="shop-picto" aria-label="<?php echo esc_attr( $label ); ?>">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
            <circle cx="12" cy="12" r="8.5"></circle>
            <path d="M8 12.4l2.6 2.6L16.8 9"></path>
        </svg>
        <em><?php echo esc_html( $label ); ?></em>
    </span>
    <?php
}

function theme_perso_shop_render_product_card( $product, $is_offer = false ) {
    ?>
    <article class="shop-product-card<?php echo $is_offer ? ' shop-offer-card' : ''; ?>">
        <?php if ( ! empty( $product['discount'] ) ) : ?>
            <span class="shop-product-discount"><?php echo esc_html( $product['discount'] ); ?></span>
        <?php endif; ?>
        <a href="<?php echo esc_url( $product['url'] ); ?>" aria-label="<?php echo esc_attr( $product['title'] ); ?>">
            <?php if ( ! empty( $product['image'] ) ) : ?>
                <img class="<?php echo theme_perso_is_fallback_product_image( $product['image'] ) ? 'cosmethique-product-fallback-img' : ''; ?>" src="<?php echo esc_url( $product['image'] ); ?>" alt="<?php echo esc_attr( $product['title'] ); ?>" loading="lazy">
            <?php endif; ?>
            <strong><?php echo esc_html( $product['title'] ); ?></strong>
        </a>
        <?php if ( ! empty( $product['excerpt'] ) ) : ?>
            <p><?php echo esc_html( $product['excerpt'] ); ?></p>
        <?php endif; ?>
        <span class="shop-product-price">
            <?php if ( ! empty( $product['old_price'] ) && false === strpos( $product['price'], '<del' ) ) : ?>
                <del><?php echo esc_html( $product['old_price'] ); ?></del>
            <?php endif; ?>
            <?php echo wp_kses_post( $product['price'] ); ?>
        </span>
        <?php if ( $is_offer ) : ?>
            <a class="button button-primary" href="<?php echo esc_url( $product['url'] ); ?>"><?php esc_html_e( 'Voir l’offre', 'theme-perso' ); ?></a>
        <?php endif; ?>
    </article>
    <?php
}

function theme_perso_shop_render_feature_block( $section ) {
    ?>
    <section class="shop-premium-block shop-block-<?php echo esc_attr( sanitize_title( $section['label'] ) ); ?>">
        <figure class="shop-lifestyle-photo">
            <img src="<?php echo esc_url( $section['image'] ); ?>" alt="<?php echo esc_attr( $section['title'] ); ?>" loading="lazy">
        </figure>
        <div class="shop-section-panel">
            <div class="shop-info-card">
                <span class="shop-icon-badge" aria-hidden="true">
                    <svg viewBox="0 0 24 24" focusable="false"><path d="M12 21c0-7 4-12 9-15-6 0-11 4-13 10-2-3-4-5-7-6 1 5 4 9 11 11Z"></path></svg>
                </span>
                <p class="shop-label"><?php echo esc_html( $section['label'] ); ?></p>
                <h2><?php echo ! empty( $section['title_html'] ) ? wp_kses_post( $section['title_html'] ) : esc_html( $section['title'] ); ?></h2>
                <p><?php echo esc_html( $section['description'] ); ?></p>
                <a class="button button-primary" href="<?php echo esc_url( $section['url'] ); ?>"><?php echo esc_html( $section['button'] ); ?></a>
                <div class="shop-picto-grid">
                    <?php foreach ( $section['pictos'] as $picto ) : ?>
                        <?php theme_perso_shop_render_icon( $picto ); ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="shop-products-slider" aria-label="<?php echo esc_attr( $section['title'] ); ?>">
                <?php foreach ( $section['products'] as $product ) : ?>
                    <?php theme_perso_shop_render_product_card( $product ); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function theme_perso_render_shop_page() {
    $shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
    $asset    = function_exists( 'theme_perso_product_asset_url' ) ? 'theme_perso_product_asset_url' : null;
    $product  = 'theme_perso_shop_product_card_data';
    $visage_url = theme_perso_get_shop_collection_url( 'visage', $shop_url );
    $corps_url  = theme_perso_get_shop_collection_url( 'corps', $shop_url );
    $cheveux_url = theme_perso_get_shop_collection_url( 'cheveux', $shop_url );
    $accessoires_term = term_exists( 'accessoires-beaute', 'product_cat' );
    $accessoires_url  = $shop_url;
    $packs_term = term_exists( 'packs', 'product_cat' );
    $packs_url  = $shop_url;

    if ( $accessoires_term && ! is_wp_error( $accessoires_term ) ) {
        $term_id          = is_array( $accessoires_term ) ? (int) $accessoires_term['term_id'] : (int) $accessoires_term;
        $accessoires_link = get_term_link( $term_id, 'product_cat' );
        $accessoires_url  = ! is_wp_error( $accessoires_link ) ? $accessoires_link : $shop_url;
    }

    if ( $packs_term && ! is_wp_error( $packs_term ) ) {
        $term_id    = is_array( $packs_term ) ? (int) $packs_term['term_id'] : (int) $packs_term;
        $packs_link = get_term_link( $term_id, 'product_cat' );
        $packs_url  = ! is_wp_error( $packs_link ) ? $packs_link : $shop_url;
    }

    $sections = array(
        array(
            'label'       => 'Soins du visage',
            'title'       => 'Prenez soin de votre visage naturellement',
            'title_html'  => 'Prenez soin<br>de votre visage<br>naturellement',
            'description' => 'Des textures fines et sensorielles pour hydrater, protéger et révéler l’éclat de votre peau au quotidien.',
            'button'      => 'Découvrir les soins visage',
            'url'         => $visage_url,
            'image'       => $asset ? $asset( 'lifestyle-serum-rose.png' ) : '',
            'pictos'      => array( 'Hydratation', 'Éclat', 'Confort', 'Routine douce' ),
            'products'    => array(
                $product( 'Sérum Éclat à la Rose' ),
                $product( 'Crème Hydratante Sauge & Camomille' ),
                $product( 'Gel Nettoyant Aloe Vera' ),
            ),
        ),
        array(
            'label'       => 'Soins du corps',
            'title'       => 'Une peau douce chaque jour',
            'description' => 'Des soins nourrissants au fini élégant pour apporter confort, souplesse et lumière à la peau.',
            'button'      => 'Découvrir les soins corps',
            'url'         => $corps_url,
            'image'       => $asset ? $asset( 'lifestyle-baume-corps.png' ) : '',
            'pictos'      => array( 'Nutrition', 'Texture riche', 'Peau douce', 'Fini satiné' ),
            'products'    => array(
                $product( 'Baume Corps Karité & Amande' ),
                $product( 'Huile Sèche Botanique' ),
                $product( 'Gommage Corps Sucre & Lavande' ),
            ),
        ),
        array(
            'label'       => 'Soins cheveux',
            'title'       => 'Révélez la beauté naturelle de vos cheveux',
            'description' => 'Shampooings, masques et rituels enrichis en actifs végétaux pour des cheveux souples et brillants.',
            'button'      => 'Découvrir les soins cheveux',
            'url'         => $cheveux_url,
            'image'       => $asset ? $asset( 'lifestyle-shampooing-sauge.png' ) : '',
            'pictos'      => array( 'Brillance', 'Douceur', 'Réparation', 'Légèreté' ),
            'products'    => array(
                $product( 'Shampooing Doux Sauge & Ortie' ),
                $product( 'Masque Cheveux Réparateur' ),
                $product( 'Huile Capillaire Botanique' ),
            ),
        ),
        array(
            'label'       => 'Accessoires beauté',
            'title'       => 'Les indispensables beauté',
            'title_html'  => 'Les<br>indispensables<br>beauté',
            'description' => 'Complétez votre routine avec des accessoires durables, élégants et pensés pour sublimer le geste.',
            'button'      => 'Voir les accessoires',
            'url'         => $accessoires_url,
            'image'       => $asset ? $asset( 'category-accessoires-beaute-hero.png' ) : '',
            'pictos'      => array( 'Rituel', 'Massage', 'Précision', 'Durable' ),
            'products'    => array(
                $product( 'Éponge Konjac Naturelle' ),
                $product( 'Brosse Cheveux Bambou' ),
                $product( 'Roller Jade Naturel' ),
            ),
        ),
    );

    $promos = array(
        $product( 'Sérum Éclat à la Rose', array( 'old_price' => '34,90€', 'discount' => '-20%', 'excerpt' => 'Routine éclat pour illuminer le teint.' ) ),
        $product( 'Crème Hydratante Sauge & Camomille', array( 'old_price' => '31,90€', 'discount' => '-15%', 'excerpt' => 'Hydratation douce pour peau sensible.' ) ),
        $product( 'Baume Corps Karité & Amande', array( 'old_price' => '29,90€', 'discount' => '-15%', 'excerpt' => 'Nutrition corps et confort durable.' ) ),
        $product( 'Shampooing Doux Sauge & Ortie', array( 'old_price' => '21,90€', 'discount' => '-10%', 'excerpt' => 'Rituel cheveux doux et brillant.' ) ),
    );

    $packs = array();

    foreach ( theme_perso_packs_collection_products() as $title => $data ) {
        $packs[] = $product(
            $title,
            array(
                'old_price' => number_format_i18n( (float) $data['price'], 2 ) . ' €',
                'price'     => number_format_i18n( (float) $data['sale_price'], 2 ) . ' €',
                'excerpt'   => $data['excerpt'],
                'discount'  => 'Promo',
            )
        );
    }

    $hero_slides = array(
        array(
            'label' => 'Routine Visage',
            'title' => 'Sérum Éclat à la Rose + Crème Hydratante',
            'image' => $asset ? $asset( 'lifestyle-serum-rose.png' ) : '',
        ),
        array(
            'label' => 'Routine Corps',
            'title' => 'Baume Karité + Huile Botanique',
            'image' => $asset ? $asset( 'lifestyle-baume-corps.png' ) : '',
        ),
        array(
            'label' => 'Routine Cheveux',
            'title' => 'Masque réparateur + Shampooing doux',
            'image' => $asset ? $asset( 'lifestyle-masque-cheveux.png' ) : '',
        ),
        array(
            'label' => 'Accessoires Beauté',
            'title' => 'Trousse beauté • Roller Jade • Gua Sha • Brosse bambou',
            'image' => $asset ? $asset( 'hero-accessoires-cosmethique.png' ) : '',
        ),
    );
    ?>
    <div class="shop-redesign">
        <section class="shop-hero-premium" aria-label="<?php esc_attr_e( 'Introduction boutique Cosm’Éthique', 'theme-perso' ); ?>">
            <div class="shop-hero-content">
                <p class="shop-label">COSM’ÉTHIQUE</p>
                <h1>Boutique</h1>
                <p>Des soins naturels, sensoriels et efficaces pour révéler votre beauté avec exigence et douceur.</p>
                <div class="shop-hero-actions">
                    <a class="button button-primary" href="#shop-sections"><?php esc_html_e( 'Découvrir les soins', 'theme-perso' ); ?></a>
                    <a class="button shop-button-secondary" href="#shop-packs"><?php esc_html_e( 'Nos routines', 'theme-perso' ); ?></a>
                </div>
                <div class="shop-hero-benefits" aria-label="<?php esc_attr_e( 'Avantages Cosm’Éthique', 'theme-perso' ); ?>">
                    <?php foreach ( array( '98 % d’ingrédients naturels', 'Fabriqué en France', 'Livraison offerte dès 40 €', 'Cruelty Free' ) as $benefit ) : ?>
                        <span>
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12.5l4.2 4.2L19 7"></path></svg>
                            <?php echo esc_html( $benefit ); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="shop-hero-slider-card" data-shop-hero-slider>
                <div class="shop-hero-slides">
                    <?php foreach ( $hero_slides as $index => $slide ) : ?>
                        <figure class="shop-hero-slide<?php echo 0 === $index ? ' is-active' : ''; ?>" data-shop-slide>
                            <img src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>">
                            <figcaption>
                                <span><?php echo esc_html( $slide['label'] ); ?></span>
                                <strong><?php echo esc_html( $slide['title'] ); ?></strong>
                            </figcaption>
                        </figure>
                    <?php endforeach; ?>
                </div>
                <button class="shop-hero-arrow shop-hero-prev" type="button" data-shop-slider-prev aria-label="<?php esc_attr_e( 'Image précédente', 'theme-perso' ); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M15 18l-6-6 6-6"></path></svg>
                </button>
                <button class="shop-hero-arrow shop-hero-next" type="button" data-shop-slider-next aria-label="<?php esc_attr_e( 'Image suivante', 'theme-perso' ); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M9 6l6 6-6 6"></path></svg>
                </button>
                <div class="shop-hero-pagination" aria-label="<?php esc_attr_e( 'Pagination du slider', 'theme-perso' ); ?>">
                    <?php foreach ( $hero_slides as $index => $slide ) : ?>
                        <button type="button" data-shop-slider-dot="<?php echo esc_attr( $index ); ?>" aria-label="<?php echo esc_attr( sprintf( 'Afficher %s', $slide['label'] ) ); ?>" aria-current="<?php echo 0 === $index ? 'true' : 'false'; ?>"></button>
                    <?php endforeach; ?>
                </div>
                <div class="shop-floating-card shop-floating-review">
                    <span aria-hidden="true">★★★★★</span>
                    <strong>4.9/5</strong>
                    <em>+2500 clientes satisfaites</em>
                </div>
                <div class="shop-floating-card shop-floating-delivery">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M3 7h11v9H3zM14 10h4l3 3v3h-7zM7 19a2 2 0 1 0 0-4 2 2 0 0 0 0 4ZM18 19a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path></svg>
                    <strong>Livraison offerte</strong>
                    <em>dès 40 €</em>
                </div>
                <div class="shop-floating-card shop-floating-natural">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 21c0-7 4-12 9-15-6 0-11 4-13 10-2-3-4-5-7-6 1 5 4 9 11 11Z"></path></svg>
                    <strong>98 %</strong>
                    <em>Naturel</em>
                </div>
            </div>
        </section>

        <div id="shop-sections" class="shop-anchor"></div>
        <?php foreach ( $sections as $section ) : ?>
            <?php theme_perso_shop_render_feature_block( $section ); ?>
        <?php endforeach; ?>

        <section class="shop-promo-section">
            <div class="shop-promo-intro">
                <span class="shop-icon-badge" aria-hidden="true">
                    <svg viewBox="0 0 24 24" focusable="false"><path d="M20 12v8H4v-8M2 7h20v5H2zM12 7v13M12 7H7.5a2.5 2.5 0 1 1 2-4c1.4 1.3 2.5 4 2.5 4Zm0 0h4.5a2.5 2.5 0 1 0-2-4c-1.4 1.3-2.5 4-2.5 4Z"></path></svg>
                </span>
                <p class="shop-label">Promotions</p>
                <h2>Offres limitées</h2>
                <p>Profitez d’une sélection de soins premium à prix doux pendant quelques jours.</p>
                <div class="shop-countdown" aria-label="<?php esc_attr_e( 'Compte à rebours promotionnel', 'theme-perso' ); ?>">
                    <span><strong>02</strong>Jours</span>
                    <span><strong>18</strong>Heures</span>
                    <span><strong>36</strong>Min</span>
                    <span><strong>45</strong>Sec</span>
                </div>
            </div>
            <div class="shop-products-slider shop-promo-slider">
                <?php foreach ( $promos as $promo ) : ?>
                    <?php theme_perso_shop_render_product_card( $promo, true ); ?>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="shop-packs-section" id="shop-packs">
            <div class="shop-packs-header">
                <p class="shop-label">Packs</p>
                <h2>Des routines complètes à prix doux</h2>
                <a class="button button-primary" href="<?php echo esc_url( $packs_url ); ?>"><?php esc_html_e( 'Voir tous les packs', 'theme-perso' ); ?></a>
            </div>
            <div class="shop-pack-grid">
                <?php foreach ( $packs as $pack ) : ?>
                    <article class="shop-pack-card">
                        <img src="<?php echo esc_url( $pack['image'] ); ?>" alt="<?php echo esc_attr( $pack['title'] ); ?>" loading="lazy">
                        <div>
                            <h3><?php echo esc_html( $pack['title'] ); ?></h3>
                            <p><?php echo esc_html( $pack['excerpt'] ); ?></p>
                            <span class="shop-pack-price">
                                <?php if ( ! empty( $pack['old_price'] ) && false === strpos( $pack['price'], '<del' ) ) : ?>
                                    <del><?php echo esc_html( $pack['old_price'] ); ?></del>
                                <?php endif; ?>
                                <strong><?php echo wp_kses_post( $pack['price'] ); ?></strong>
                            </span>
                            <a class="button button-primary" href="<?php echo esc_url( $pack['url'] ); ?>"><?php esc_html_e( 'Voir le pack', 'theme-perso' ); ?></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
    <?php
}

function theme_perso_render_visage_category_page() {
    $asset    = function_exists( 'theme_perso_product_asset_url' ) ? 'theme_perso_product_asset_url' : null;
    $shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
    ?>
    <div class="visage-category-page">
        <section class="visage-category-hero">
            <div class="visage-category-copy">
                <p class="shop-label">COSM’ÉTHIQUE</p>
                <h1>Soins du visage</h1>
                <p>Découvrez notre sélection de soins naturels pour hydrater, protéger et révéler l’éclat de votre peau.</p>
                <a class="button button-primary" href="#collection-visage"><?php esc_html_e( 'Découvrir la collection', 'theme-perso' ); ?></a>
            </div>
            <figure>
                <img src="<?php echo esc_url( $asset ? $asset( 'category-soins-visage-hero.png' ) : '' ); ?>" alt="<?php esc_attr_e( 'Collection soins du visage Cosm’Éthique', 'theme-perso' ); ?>">
            </figure>
        </section>

        <section class="visage-collection" id="collection-visage">
            <div class="visage-collection-heading">
                <p class="shop-label">Collection visage</p>
                <h2><?php esc_html_e( '6 essentiels pour une routine naturelle', 'theme-perso' ); ?></h2>
            </div>
            <div class="visage-product-grid">
                <?php foreach ( theme_perso_visage_collection_products() as $title => $data ) : ?>
                    <?php
                    $card = theme_perso_shop_product_card_data(
                        $title,
                        array(
                            'price'   => number_format_i18n( (float) $data['price'], 2 ) . '€',
                            'excerpt' => $data['excerpt'],
                        )
                    );
                    ?>
                    <?php theme_perso_shop_render_product_card( $card ); ?>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="visage-routine-note">
            <div>
                <p class="shop-label">Routine conseillée</p>
                <h2><?php esc_html_e( 'Nettoyer, tonifier, hydrater, sublimer.', 'theme-perso' ); ?></h2>
            </div>
            <a class="button shop-button-secondary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Retour à la boutique', 'theme-perso' ); ?></a>
        </section>
    </div>
    <?php
}

function theme_perso_render_corps_category_page() {
    $asset    = function_exists( 'theme_perso_product_asset_url' ) ? 'theme_perso_product_asset_url' : null;
    $shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
    ?>
    <div class="visage-category-page corps-category-page">
        <section class="visage-category-hero">
            <div class="visage-category-copy">
                <p class="shop-label">COSM’ÉTHIQUE</p>
                <h1>Soins du corps</h1>
                <p>Découvrez notre sélection de soins naturels pour nourrir, hydrater et sublimer votre peau au quotidien.</p>
                <a class="button button-primary" href="#collection-corps"><?php esc_html_e( 'Découvrir la collection', 'theme-perso' ); ?></a>
            </div>
            <figure>
                <img src="<?php echo esc_url( $asset ? $asset( 'category-soins-corps-hero.png' ) : '' ); ?>" alt="<?php esc_attr_e( 'Collection soins du corps Cosm’Éthique', 'theme-perso' ); ?>">
            </figure>
        </section>

        <section class="visage-collection" id="collection-corps">
            <div class="visage-collection-heading">
                <p class="shop-label">Collection corps</p>
                <h2><?php esc_html_e( '6 soins naturels pour une peau douce', 'theme-perso' ); ?></h2>
            </div>
            <div class="visage-product-grid">
                <?php foreach ( theme_perso_corps_collection_products() as $title => $data ) : ?>
                    <?php
                    $card = theme_perso_shop_product_card_data(
                        $title,
                        array(
                            'price'   => number_format_i18n( (float) ( ! empty( $data['sale_price'] ) ? $data['sale_price'] : $data['price'] ), 2 ) . '€',
                            'excerpt' => $data['excerpt'],
                        )
                    );
                    ?>
                    <?php theme_perso_shop_render_product_card( $card ); ?>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="visage-routine-note">
            <div>
                <p class="shop-label">Routine conseillée</p>
                <h2><?php esc_html_e( 'Exfolier, nourrir, hydrater, sublimer.', 'theme-perso' ); ?></h2>
            </div>
            <a class="button shop-button-secondary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Retour à la boutique', 'theme-perso' ); ?></a>
        </section>
    </div>
    <?php
}

function theme_perso_render_cheveux_category_page() {
    $asset    = function_exists( 'theme_perso_product_asset_url' ) ? 'theme_perso_product_asset_url' : null;
    $shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
    ?>
    <div class="visage-category-page cheveux-category-page">
        <section class="visage-category-hero">
            <div class="visage-category-copy">
                <p class="shop-label">COSM’ÉTHIQUE</p>
                <h1>Soins Cheveux</h1>
                <p>Découvrez notre collection de soins capillaires naturels pour nourrir, réparer et sublimer vos cheveux au quotidien.</p>
                <a class="button button-primary" href="#collection-cheveux"><?php esc_html_e( 'Découvrir la collection', 'theme-perso' ); ?></a>
            </div>
            <figure>
                <img src="<?php echo esc_url( $asset ? $asset( 'category-soins-cheveux-hero.png' ) : '' ); ?>" alt="<?php esc_attr_e( 'Collection soins cheveux Cosm’Éthique', 'theme-perso' ); ?>">
            </figure>
        </section>

        <section class="visage-collection" id="collection-cheveux">
            <div class="visage-collection-heading">
                <p class="shop-label">Collection cheveux</p>
                <h2><?php esc_html_e( '6 rituels naturels pour sublimer la fibre', 'theme-perso' ); ?></h2>
            </div>
            <div class="visage-product-grid">
                <?php foreach ( theme_perso_cheveux_collection_products() as $title => $data ) : ?>
                    <?php
                    $card = theme_perso_shop_product_card_data(
                        $title,
                        array(
                            'price'   => number_format_i18n( (float) ( ! empty( $data['sale_price'] ) ? $data['sale_price'] : $data['price'] ), 2 ) . '€',
                            'excerpt' => $data['excerpt'],
                        )
                    );
                    ?>
                    <?php theme_perso_shop_render_product_card( $card ); ?>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="visage-routine-note">
            <div>
                <p class="shop-label">Routine conseillée</p>
                <h2><?php esc_html_e( 'Nettoyer, réparer, protéger, illuminer.', 'theme-perso' ); ?></h2>
            </div>
            <a class="button shop-button-secondary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Retour à la boutique', 'theme-perso' ); ?></a>
        </section>
    </div>
    <?php
}

function theme_perso_render_accessoires_category_page() {
    $asset    = function_exists( 'theme_perso_product_asset_url' ) ? 'theme_perso_product_asset_url' : null;
    $shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
    ?>
    <div class="visage-category-page accessoires-category-page">
        <section class="visage-category-hero">
            <div class="visage-category-copy">
                <p class="shop-label">COSM’ÉTHIQUE</p>
                <h1>Accessoires Beauté</h1>
                <p>Découvrez notre sélection d’accessoires premium pour compléter votre routine beauté avec élégance, précision et durabilité.</p>
                <a class="button button-primary" href="#collection-accessoires"><?php esc_html_e( 'Découvrir les accessoires', 'theme-perso' ); ?></a>
            </div>
            <figure>
                <img src="<?php echo esc_url( $asset ? $asset( 'category-accessoires-beaute-hero.png' ) : '' ); ?>" alt="<?php esc_attr_e( 'Accessoires beauté Cosm’Éthique', 'theme-perso' ); ?>">
            </figure>
        </section>

        <section class="visage-collection" id="collection-accessoires">
            <div class="visage-collection-heading">
                <p class="shop-label">Collection accessoires</p>
                <h2><?php esc_html_e( '6 essentiels premium pour votre routine', 'theme-perso' ); ?></h2>
            </div>
            <div class="visage-product-grid">
                <?php foreach ( theme_perso_accessoires_collection_products() as $title => $data ) : ?>
                    <?php
                    $card = theme_perso_shop_product_card_data(
                        $title,
                        array(
                            'price'   => number_format_i18n( (float) ( ! empty( $data['sale_price'] ) ? $data['sale_price'] : $data['price'] ), 2 ) . '€',
                            'excerpt' => $data['excerpt'],
                        )
                    );
                    ?>
                    <?php theme_perso_shop_render_product_card( $card ); ?>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="visage-routine-note">
            <div>
                <p class="shop-label">Routine conseillée</p>
                <h2><?php esc_html_e( 'Nettoyer, masser, organiser, sublimer.', 'theme-perso' ); ?></h2>
            </div>
            <a class="button shop-button-secondary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Retour à la boutique', 'theme-perso' ); ?></a>
        </section>
    </div>
    <?php
}

function theme_perso_render_packs_category_page() {
    $asset    = function_exists( 'theme_perso_product_asset_url' ) ? 'theme_perso_product_asset_url' : null;
    $shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
    ?>
    <div class="visage-category-page packs-category-page">
        <section class="visage-category-hero">
            <div class="visage-category-copy">
                <p class="shop-label">COSM’ÉTHIQUE</p>
                <h1>Nos packs beauté</h1>
                <p>Découvrez nos routines prêtes à l’emploi, pensées pour répondre à tous les besoins de votre peau et de vos cheveux.</p>
                <a class="button button-primary" href="#collection-packs"><?php esc_html_e( 'Découvrir les packs', 'theme-perso' ); ?></a>
            </div>
            <figure>
                <img src="<?php echo esc_url( $asset ? $asset( 'category-packs-hero-reel.png' ) : '' ); ?>" alt="<?php esc_attr_e( 'Packs beauté Cosm’Éthique', 'theme-perso' ); ?>">
            </figure>
        </section>

        <section class="visage-collection" id="collection-packs">
            <div class="visage-collection-heading">
                <p class="shop-label">Routines prêtes à l’emploi</p>
                <h2><?php esc_html_e( '4 coffrets pour simplifier votre routine', 'theme-perso' ); ?></h2>
            </div>
            <div class="visage-product-grid packs-product-grid">
                <?php foreach ( theme_perso_packs_collection_products() as $title => $data ) : ?>
                    <?php
                    $card = theme_perso_shop_product_card_data(
                        $title,
                        array(
                            'old_price' => number_format_i18n( (float) $data['price'], 2 ) . ' €',
                            'price'     => number_format_i18n( (float) $data['sale_price'], 2 ) . ' €',
                            'excerpt'   => $data['excerpt'],
                            'discount'  => 'Promo',
                        )
                    );
                    ?>
                    <?php theme_perso_shop_render_product_card( $card ); ?>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="visage-routine-note">
            <div>
                <p class="shop-label">Avantage pack</p>
                <h2><?php esc_html_e( 'Des routines complètes, élégantes et plus avantageuses.', 'theme-perso' ); ?></h2>
            </div>
            <a class="button shop-button-secondary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Retour à la boutique', 'theme-perso' ); ?></a>
        </section>
    </div>
    <?php
}

function theme_perso_cart_item_thumbnail( $thumbnail, $cart_item ) {
    if ( empty( $cart_item['product_id'] ) ) {
        return $thumbnail;
    }

    $image_url = get_post_meta( (int) $cart_item['product_id'], '_cosmethique_image_url', true );

    if ( ! $image_url && ! empty( $thumbnail ) && false === strpos( $thumbnail, 'woocommerce-placeholder' ) ) {
        return $thumbnail;
    }

    if ( ! $image_url ) {
        $image_url = theme_perso_product_fallback_image_url();
    }

    $classes = 'cosmethique-cart-thumb';

    if ( theme_perso_is_fallback_product_image( $image_url ) ) {
        $classes .= ' cosmethique-product-fallback-img';
    }

    return '<img class="' . esc_attr( $classes ) . '" src="' . esc_url( $image_url ) . '" alt="' . esc_attr( get_the_title( (int) $cart_item['product_id'] ) ) . '" loading="lazy">';
}
add_filter( 'woocommerce_cart_item_thumbnail', 'theme_perso_cart_item_thumbnail', 10, 2 );

function theme_perso_checkout_payment_options_panel() {
    ?>
    <section class="checkout-payment-options" aria-label="<?php esc_attr_e( 'Paiement sécurisé SSL', 'theme-perso' ); ?>">
        <span class="checkout-payment-lock" aria-hidden="true">🔒</span>
        <p><?php esc_html_e( 'Paiement sécurisé SSL', 'theme-perso' ); ?></p>
    </section>
    <?php
}
add_action( 'woocommerce_review_order_before_payment', 'theme_perso_checkout_payment_options_panel', 5 );

function theme_perso_register_payment_gateways( $gateways ) {
    $gateways[] = 'Theme_Perso_Gateway_Card';
    $gateways[] = 'Theme_Perso_Gateway_Apple_Pay';
    $gateways[] = 'Theme_Perso_Gateway_Google_Pay';
    $gateways[] = 'Theme_Perso_Gateway_Installments';

    return $gateways;
}
add_filter( 'woocommerce_payment_gateways', 'theme_perso_register_payment_gateways' );

function theme_perso_hide_demo_gateways_when_real_available( $available_gateways ) {
    if ( is_admin() && ! wp_doing_ajax() ) {
        return $available_gateways;
    }

    $premium_gateway_ids = array(
        'cosmethique_card'         => true,
        'cosmethique_apple_pay'    => true,
        'cosmethique_google_pay'   => true,
        'cosmethique_installments' => true,
    );

    $ordered_gateways = array();

    foreach ( array_keys( $premium_gateway_ids ) as $gateway_id ) {
        if ( isset( $available_gateways[ $gateway_id ] ) ) {
            $ordered_gateways[ $gateway_id ] = $available_gateways[ $gateway_id ];
        }
    }

    if ( ! empty( $ordered_gateways ) ) {
        if ( function_exists( 'WC' ) && WC()->session ) {
            $chosen_gateway = WC()->session->get( 'chosen_payment_method' );

            if ( ! isset( $ordered_gateways[ $chosen_gateway ] ) ) {
                WC()->session->set( 'chosen_payment_method', array_key_first( $ordered_gateways ) );
            }
        }

        return $ordered_gateways;
    }

    unset( $available_gateways['cosmethique_paypal'], $available_gateways['cosmethique_klarna'] );

    foreach ( $available_gateways as $gateway_id => $gateway ) {
        if ( false !== stripos( $gateway_id, 'paypal' ) ) {
            unset( $available_gateways[ $gateway_id ] );
        }
    }

    return $available_gateways;
}
add_filter( 'woocommerce_available_payment_gateways', 'theme_perso_hide_demo_gateways_when_real_available', 30 );

function theme_perso_payment_logo_url( $filename ) {
    return get_template_directory_uri() . '/assets/payment/' . ltrim( $filename, '/' );
}

function theme_perso_init_payment_gateways() {
    if ( ! class_exists( 'WC_Payment_Gateway' ) ) {
        return;
    }

    if ( class_exists( 'Theme_Perso_Gateway_Base' ) ) {
        return;
    }

    abstract class Theme_Perso_Gateway_Base extends WC_Payment_Gateway {
        public function __construct() {
            $this->has_fields         = true;
            $this->enabled            = 'yes';
            $this->method_description = esc_html__( 'Moyen de paiement de démonstration pour le projet COSM’ETHIQUE.', 'theme-perso' );
            $this->supports           = array( 'products' );

            $this->init_form_fields();
            $this->init_settings();

            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
        }

        public function init_form_fields() {
            $this->form_fields = array(
                'enabled' => array(
                    'title'   => esc_html__( 'Activer', 'theme-perso' ),
                    'type'    => 'checkbox',
                    'label'   => esc_html__( 'Activer ce moyen de paiement', 'theme-perso' ),
                    'default' => 'yes',
                ),
            );
        }

        public function payment_fields() {
            $this->render_payment_fields();
        }

        protected function render_payment_fields() {
            if ( $this->description ) {
                echo '<p class="cosmethique-gateway-note">' . wp_kses_post( $this->description ) . '</p>';
            }
        }

        public function get_icon() {
            return $this->get_payment_icon_markup();
        }

        protected function get_payment_icon_markup() {
            return '';
        }

        public function process_payment( $order_id ) {
            $order = wc_get_order( $order_id );

            if ( ! $order ) {
                return array( 'result' => 'failure' );
            }

            $order->update_status( 'processing', esc_html__( 'Paiement de démonstration validé.', 'theme-perso' ) );
            wc_reduce_stock_levels( $order_id );
            WC()->cart->empty_cart();

            return array(
                'result'   => 'success',
                'redirect' => $this->get_return_url( $order ),
            );
        }
    }

    class Theme_Perso_Gateway_Card extends Theme_Perso_Gateway_Base {
        public function __construct() {
            $this->id                 = 'cosmethique_card';
            $this->method_title       = esc_html__( 'Carte bancaire', 'theme-perso' );
            $this->title              = esc_html__( 'Carte bancaire', 'theme-perso' );
            $this->description        = esc_html__( 'Paiement sécurisé par carte bancaire. Option prête pour une intégration Stripe ou WooPayments.', 'theme-perso' );
            parent::__construct();
        }

        protected function render_payment_fields() {
            ?>
            <div class="cosmethique-card-payment-form">
                <div class="cosmethique-payment-brand-row" aria-label="<?php esc_attr_e( 'Moyens de paiement acceptés', 'theme-perso' ); ?>">
                    <span>Visa</span>
                    <span>Mastercard</span>
                    <span>American Express</span>
                </div>
                <div class="cosmethique-card-fields">
                    <label>
                        <span><?php esc_html_e( 'Numéro de carte', 'theme-perso' ); ?></span>
                        <input type="text" name="cosmethique_card_number" inputmode="numeric" autocomplete="cc-number" maxlength="19" placeholder="1234 5678 9012 3456" data-card-number>
                    </label>
                    <label>
                        <span><?php esc_html_e( 'Nom du titulaire de la carte', 'theme-perso' ); ?></span>
                        <input type="text" name="cosmethique_card_holder" autocomplete="cc-name" placeholder="<?php esc_attr_e( 'Sophie Martin', 'theme-perso' ); ?>">
                    </label>
                    <div class="cosmethique-card-field-grid">
                        <label>
                            <span><?php esc_html_e( 'Date d’expiration', 'theme-perso' ); ?></span>
                            <input type="text" name="cosmethique_card_expiry" inputmode="numeric" autocomplete="cc-exp" maxlength="7" placeholder="<?php esc_attr_e( 'MM / AA', 'theme-perso' ); ?>" data-card-expiry>
                        </label>
                        <label>
                            <span><?php esc_html_e( 'Cryptogramme visuel', 'theme-perso' ); ?></span>
                            <input type="text" name="cosmethique_card_cvv" inputmode="numeric" autocomplete="cc-csc" maxlength="4" placeholder="<?php esc_attr_e( 'CVV', 'theme-perso' ); ?>" data-card-cvv>
                        </label>
                    </div>
                </div>
            </div>
            <?php
        }

        public function validate_fields() {
            $number = isset( $_POST['cosmethique_card_number'] ) ? preg_replace( '/\D+/', '', wp_unslash( $_POST['cosmethique_card_number'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing
            $holder = isset( $_POST['cosmethique_card_holder'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['cosmethique_card_holder'] ) ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing
            $expiry = isset( $_POST['cosmethique_card_expiry'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['cosmethique_card_expiry'] ) ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing
            $cvv    = isset( $_POST['cosmethique_card_cvv'] ) ? preg_replace( '/\D+/', '', wp_unslash( $_POST['cosmethique_card_cvv'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing

            if ( strlen( $number ) < 13 || '' === $holder || ! preg_match( '/^\d{2}\s?\/\s?\d{2}$/', $expiry ) || strlen( $cvv ) < 3 ) {
                wc_add_notice( esc_html__( 'Veuillez compléter correctement les informations de carte bancaire.', 'theme-perso' ), 'error' );
                return false;
            }

            return true;
        }

        protected function get_payment_icon_markup() {
            return '<span class="cosmethique-payment-logo cosmethique-payment-logo--card" aria-hidden="true"><span>💳</span></span>';
        }
    }

    class Theme_Perso_Gateway_Apple_Pay extends Theme_Perso_Gateway_Base {
        public function __construct() {
            $this->id                 = 'cosmethique_apple_pay';
            $this->method_title       = 'Apple Pay';
            $this->title              = 'Apple Pay';
            $this->description        = esc_html__( 'Paiement rapide et sécurisé avec Apple Pay. Une fois sélectionné, le bouton Apple Pay s’affiche automatiquement si votre appareil est compatible.', 'theme-perso' );
            parent::__construct();
        }

        protected function render_payment_fields() {
            ?>
            <div class="cosmethique-wallet-payment">
                <span class="cosmethique-wallet-logo cosmethique-wallet-logo--apple" aria-hidden="true"> Pay</span>
                <p><?php esc_html_e( 'Paiement rapide et sécurisé avec Apple Pay. Une fois sélectionné, le bouton Apple Pay s’affiche automatiquement si votre appareil est compatible.', 'theme-perso' ); ?></p>
            </div>
            <?php
        }

        protected function get_payment_icon_markup() {
            return '<span class="cosmethique-payment-logo cosmethique-payment-logo--apple" aria-hidden="true"><span> Pay</span></span>';
        }
    }

    class Theme_Perso_Gateway_Google_Pay extends Theme_Perso_Gateway_Base {
        public function __construct() {
            $this->id                 = 'cosmethique_google_pay';
            $this->method_title       = 'Google Pay';
            $this->title              = 'Google Pay';
            $this->description        = esc_html__( 'Paiement rapide et sécurisé avec Google Pay. Disponible sur les appareils compatibles.', 'theme-perso' );
            parent::__construct();
        }

        protected function render_payment_fields() {
            ?>
            <div class="cosmethique-wallet-payment">
                <span class="cosmethique-wallet-logo cosmethique-wallet-logo--google" aria-hidden="true">G Pay</span>
                <p><?php esc_html_e( 'Paiement rapide et sécurisé avec Google Pay. Disponible sur les appareils compatibles.', 'theme-perso' ); ?></p>
            </div>
            <?php
        }

        protected function get_payment_icon_markup() {
            return '<span class="cosmethique-payment-logo cosmethique-payment-logo--google" aria-hidden="true"><span>G Pay</span></span>';
        }
    }

    class Theme_Perso_Gateway_Installments extends Theme_Perso_Gateway_Base {
        public function __construct() {
            $this->id                 = 'cosmethique_installments';
            $this->method_title       = esc_html__( 'Paiement en plusieurs fois', 'theme-perso' );
            $this->title              = esc_html__( 'Paiement en plusieurs fois', 'theme-perso' );
            $this->description        = esc_html__( 'Présentez une option de règlement en plusieurs fois pour les paniers premium.', 'theme-perso' );
            parent::__construct();
        }

        protected function render_payment_fields() {
            ?>
            <div class="cosmethique-choice-list cosmethique-choice-list--installments">
                <label>
                    <span class="installment-provider-logo installment-provider-logo--klarna"><img src="<?php echo esc_url( theme_perso_payment_logo_url( 'klarna.svg' ) ); ?>" alt="Klarna"></span>
                    <span class="installment-provider-copy"><strong>Klarna</strong><small><?php esc_html_e( 'Paiement en 3x, 4x ou différé', 'theme-perso' ); ?></small></span>
                    <input type="radio" name="cosmethique_installment_provider" value="klarna" checked>
                </label>
                <label>
                    <span class="installment-provider-logo installment-provider-logo--alma"><img src="<?php echo esc_url( theme_perso_payment_logo_url( 'alma.png' ) ); ?>" alt="Alma"></span>
                    <span class="installment-provider-copy"><strong>Alma</strong><small><?php esc_html_e( 'Paiement en plusieurs mensualités', 'theme-perso' ); ?></small></span>
                    <input type="radio" name="cosmethique_installment_provider" value="alma">
                </label>
                <label>
                    <span class="installment-provider-logo installment-provider-logo--floa"><img src="<?php echo esc_url( theme_perso_payment_logo_url( 'floa.svg' ) ); ?>" alt="Floa"></span>
                    <span class="installment-provider-copy"><strong>Floa</strong><small><?php esc_html_e( 'Paiement fractionné sécurisé', 'theme-perso' ); ?></small></span>
                    <input type="radio" name="cosmethique_installment_provider" value="floa">
                </label>
                <label>
                    <span class="installment-provider-logo installment-provider-logo--paypal"><img src="<?php echo esc_url( theme_perso_payment_logo_url( 'paypal.svg' ) ); ?>" alt="PayPal"></span>
                    <span class="installment-provider-copy"><strong>PayPal 4X</strong><small><?php esc_html_e( 'Paiement en 4 fois sans frais si éligible', 'theme-perso' ); ?></small></span>
                    <input type="radio" name="cosmethique_installment_provider" value="paypal-4x">
                </label>
            </div>
            <?php
        }

        protected function get_payment_icon_markup() {
            return '<span class="cosmethique-payment-logo cosmethique-payment-logo--installments" aria-hidden="true"><span>💳</span></span>';
        }
    }
}
add_action( 'plugins_loaded', 'theme_perso_init_payment_gateways', 20 );
add_action( 'after_setup_theme', 'theme_perso_init_payment_gateways', 30 );
add_action( 'init', 'theme_perso_init_payment_gateways', 5 );

function theme_perso_register_order_tracking_endpoint() {
    add_rewrite_endpoint( 'suivi-commande', EP_ROOT | EP_PAGES );
}
add_action( 'init', 'theme_perso_register_order_tracking_endpoint', 9 );

function theme_perso_flush_order_tracking_endpoint_once() {
    if ( get_option( 'theme_perso_order_tracking_endpoint_v1' ) ) {
        return;
    }

    theme_perso_register_order_tracking_endpoint();
    flush_rewrite_rules( false );
    update_option( 'theme_perso_order_tracking_endpoint_v1', 1 );
}
add_action( 'admin_init', 'theme_perso_flush_order_tracking_endpoint_once' );
add_action( 'init', 'theme_perso_flush_order_tracking_endpoint_once', 99 );

function theme_perso_order_tracking_query_vars( $vars ) {
    $vars[] = 'suivi-commande';

    return $vars;
}
add_filter( 'query_vars', 'theme_perso_order_tracking_query_vars' );

function theme_perso_order_tracking_account_menu_item( $items ) {
    $logout = array();

    if ( isset( $items['customer-logout'] ) ) {
        $logout = array( 'customer-logout' => $items['customer-logout'] );
        unset( $items['customer-logout'] );
    }

    $items['suivi-commande'] = esc_html__( 'Suivi de commande', 'theme-perso' );

    return array_merge( $items, $logout );
}
add_filter( 'woocommerce_account_menu_items', 'theme_perso_order_tracking_account_menu_item', 30 );

function theme_perso_order_tracking_title( $title, $endpoint = '' ) {
    if ( 'suivi-commande' === $endpoint ) {
        return esc_html__( 'Suivi de commande', 'theme-perso' );
    }

    return $title;
}
add_filter( 'woocommerce_endpoint_suivi-commande_title', 'theme_perso_order_tracking_title', 10, 2 );

function theme_perso_get_order_meta_first( $order, $keys ) {
    foreach ( $keys as $key ) {
        $value = $order->get_meta( $key, true );

        if ( '' !== $value && null !== $value ) {
            return is_scalar( $value ) ? (string) $value : '';
        }
    }

    return '';
}

function theme_perso_order_tracking_data( $order ) {
    $tracking_number = theme_perso_get_order_meta_first(
        $order,
        array(
            '_tracking_number',
            'tracking_number',
            '_wc_shipment_tracking_number',
            '_aftership_tracking_number',
            '_wot_tracking_number',
            'cosmethique_tracking_number',
        )
    );
    $carrier = theme_perso_get_order_meta_first(
        $order,
        array(
            '_tracking_provider',
            'tracking_provider',
            '_wc_shipment_tracking_provider',
            '_aftership_tracking_provider_name',
            '_wot_tracking_provider',
            'cosmethique_tracking_carrier',
        )
    );
    $tracking_url = theme_perso_get_order_meta_first(
        $order,
        array(
            '_tracking_url',
            'tracking_url',
            '_wc_shipment_tracking_url',
            '_aftership_tracking_url',
            '_wot_tracking_url',
            'cosmethique_tracking_url',
        )
    );
    $estimated_delivery = theme_perso_get_order_meta_first(
        $order,
        array(
            '_estimated_delivery_date',
            'estimated_delivery_date',
            '_delivery_date',
            'delivery_date',
            'cosmethique_estimated_delivery',
        )
    );

    if ( ! $tracking_url && $tracking_number && $carrier ) {
        $carrier_slug = strtolower( remove_accents( $carrier ) );

        if ( false !== strpos( $carrier_slug, 'colissimo' ) || false !== strpos( $carrier_slug, 'la poste' ) ) {
            $tracking_url = 'https://www.laposte.fr/outils/suivre-vos-envois?code=' . rawurlencode( $tracking_number );
        } elseif ( false !== strpos( $carrier_slug, 'chronopost' ) ) {
            $tracking_url = 'https://www.chronopost.fr/tracking-no-cms/suivi-page?listeNumerosLT=' . rawurlencode( $tracking_number );
        } elseif ( false !== strpos( $carrier_slug, 'mondial' ) ) {
            $tracking_url = 'https://www.mondialrelay.fr/suivi-de-colis/?numeroExpedition=' . rawurlencode( $tracking_number );
        } elseif ( false !== strpos( $carrier_slug, 'dhl' ) ) {
            $tracking_url = 'https://www.dhl.com/fr-fr/home/tracking/tracking-parcel.html?submit=1&tracking-id=' . rawurlencode( $tracking_number );
        } elseif ( false !== strpos( $carrier_slug, 'ups' ) ) {
            $tracking_url = 'https://www.ups.com/track?tracknum=' . rawurlencode( $tracking_number );
        } elseif ( false !== strpos( $carrier_slug, 'fedex' ) ) {
            $tracking_url = 'https://www.fedex.com/fedextrack/?trknbr=' . rawurlencode( $tracking_number );
        }
    }

    return array(
        'tracking_number'    => $tracking_number,
        'carrier'            => $carrier,
        'tracking_url'       => $tracking_url,
        'estimated_delivery' => $estimated_delivery,
    );
}

function theme_perso_order_tracking_steps( $order, $tracking_data ) {
    $status       = $order->get_status();
    $has_tracking = ! empty( $tracking_data['tracking_number'] );

    $completed_index = 0;

    if ( in_array( $status, array( 'processing', 'on-hold', 'completed' ), true ) ) {
        $completed_index = 1;
    }

    if ( $has_tracking || in_array( $status, array( 'completed', 'shipped' ), true ) ) {
        $completed_index = 2;
    }

    if ( $has_tracking && ! in_array( $status, array( 'completed', 'cancelled', 'refunded', 'failed' ), true ) ) {
        $completed_index = 3;
    }

    if ( 'completed' === $status ) {
        $completed_index = 4;
    }

    $labels = array(
        esc_html__( 'Commande confirmée', 'theme-perso' ),
        esc_html__( 'Préparation', 'theme-perso' ),
        esc_html__( 'Expédiée', 'theme-perso' ),
        esc_html__( 'En cours de livraison', 'theme-perso' ),
        esc_html__( 'Livrée', 'theme-perso' ),
    );

    $steps = array();
    foreach ( $labels as $index => $label ) {
        $steps[] = array(
            'label'     => $label,
            'completed' => $index <= $completed_index,
            'active'    => $index === $completed_index && $completed_index < count( $labels ) - 1,
        );
    }

    return $steps;
}

function theme_perso_download_order_invoice() {
    if ( ! is_user_logged_in() || empty( $_GET['cosmethique_invoice'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        return;
    }

    $order_id = absint( wp_unslash( $_GET['cosmethique_invoice'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    if ( ! $order_id || ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'cosmethique_invoice_' . $order_id ) ) {
        wp_die( esc_html__( 'Lien de facture invalide.', 'theme-perso' ) );
    }

    $order = wc_get_order( $order_id );
    if ( ! $order || (int) $order->get_customer_id() !== get_current_user_id() ) {
        wp_die( esc_html__( 'Vous ne pouvez pas télécharger cette facture.', 'theme-perso' ) );
    }

    nocache_headers();
    header( 'Content-Type: text/html; charset=' . get_bloginfo( 'charset' ) );
    header( 'Content-Disposition: attachment; filename="facture-cosmethique-' . $order->get_order_number() . '.html"' );

    ?>
    <!doctype html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <title><?php echo esc_html( sprintf( __( 'Facture commande %s', 'theme-perso' ), $order->get_order_number() ) ); ?></title>
        <style>
            body{font-family:Arial,sans-serif;color:#0D1B3D;margin:40px;line-height:1.6}h1{font-family:Georgia,serif;font-size:36px}table{width:100%;border-collapse:collapse;margin-top:24px}th,td{padding:12px;border-bottom:1px solid #e8ebf1;text-align:left}.total{font-size:20px;font-weight:700}
        </style>
    </head>
    <body>
        <h1>COSM’ÉTHIQUE</h1>
        <h2><?php echo esc_html( sprintf( __( 'Facture commande #%s', 'theme-perso' ), $order->get_order_number() ) ); ?></h2>
        <p><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></p>
        <p><?php echo wp_kses_post( $order->get_formatted_billing_address() ); ?></p>
        <table>
            <thead>
                <tr>
                    <th><?php esc_html_e( 'Produit', 'theme-perso' ); ?></th>
                    <th><?php esc_html_e( 'Quantité', 'theme-perso' ); ?></th>
                    <th><?php esc_html_e( 'Total', 'theme-perso' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $order->get_items() as $item ) : ?>
                    <tr>
                        <td><?php echo esc_html( $item->get_name() ); ?></td>
                        <td><?php echo esc_html( $item->get_quantity() ); ?></td>
                        <td><?php echo wp_kses_post( $order->get_formatted_line_subtotal( $item ) ); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="total"><?php esc_html_e( 'Total :', 'theme-perso' ); ?> <?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></p>
    </body>
    </html>
    <?php
    exit;
}
add_action( 'template_redirect', 'theme_perso_download_order_invoice' );

function theme_perso_render_tracking_icon() {
    return '<svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>';
}

function theme_perso_order_tracking_endpoint_content() {
    if ( ! is_user_logged_in() ) {
        echo '<p>' . esc_html__( 'Connectez-vous pour consulter le suivi de vos commandes.', 'theme-perso' ) . '</p>';
        return;
    }

    $orders = wc_get_orders(
        array(
            'customer_id' => get_current_user_id(),
            'limit'       => -1,
            'orderby'     => 'date',
            'order'       => 'DESC',
        )
    );

    $shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
    ?>
    <section class="account-tracking-page">
        <header class="account-tracking-header">
            <p class="eyebrow"><?php esc_html_e( 'COSM’ÉTHIQUE', 'theme-perso' ); ?></p>
            <h2><?php esc_html_e( 'Suivi de votre commande', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Consultez en temps réel l’état de vos commandes.', 'theme-perso' ); ?></p>
        </header>

        <?php if ( empty( $orders ) ) : ?>
            <div class="account-tracking-empty">
                <div class="account-tracking-empty-visual" aria-hidden="true">
                    <span><?php echo theme_perso_render_tracking_icon(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                </div>
                <h3><?php esc_html_e( 'Vous n’avez pas encore passé de commande.', 'theme-perso' ); ?></h3>
                <a class="button button-primary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Découvrir nos produits', 'theme-perso' ); ?></a>
            </div>
        <?php else : ?>
            <div class="account-tracking-list">
                <?php foreach ( $orders as $order ) : ?>
                    <?php
                    $tracking_data     = theme_perso_order_tracking_data( $order );
                    $steps             = theme_perso_order_tracking_steps( $order, $tracking_data );
                    $shipping_methods  = $order->get_shipping_method() ? $order->get_shipping_method() : esc_html__( 'Non renseigné', 'theme-perso' );
                    $shipping_address  = $order->get_formatted_shipping_address() ? $order->get_formatted_shipping_address() : esc_html__( 'Adresse non renseignée', 'theme-perso' );
                    $invoice_url       = wp_nonce_url(
                        add_query_arg( 'cosmethique_invoice', $order->get_id(), wc_get_account_endpoint_url( 'suivi-commande' ) ),
                        'cosmethique_invoice_' . $order->get_id()
                    );
                    ?>
                    <article class="account-tracking-card">
                        <div class="account-tracking-card-head">
                            <div>
                                <span><?php echo esc_html( sprintf( __( 'Commande #%s', 'theme-perso' ), $order->get_order_number() ) ); ?></span>
                                <strong><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></strong>
                            </div>
                            <mark><?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></mark>
                        </div>

                        <div class="account-tracking-meta">
                            <div>
                                <small><?php esc_html_e( 'Produits commandés', 'theme-perso' ); ?></small>
                                <p>
                                    <?php
                                    echo esc_html(
                                        implode(
                                            ', ',
                                            array_map(
                                                static function( $item ) {
                                                    return $item->get_name();
                                                },
                                                $order->get_items()
                                            )
                                        )
                                    );
                                    ?>
                                </p>
                            </div>
                            <div>
                                <small><?php esc_html_e( 'Total', 'theme-perso' ); ?></small>
                                <p><?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></p>
                            </div>
                            <div>
                                <small><?php esc_html_e( 'Mode de livraison', 'theme-perso' ); ?></small>
                                <p><?php echo esc_html( $shipping_methods ); ?></p>
                            </div>
                            <div>
                                <small><?php esc_html_e( 'Adresse de livraison', 'theme-perso' ); ?></small>
                                <p><?php echo wp_kses_post( $shipping_address ); ?></p>
                            </div>
                            <div>
                                <small><?php esc_html_e( 'Transporteur', 'theme-perso' ); ?></small>
                                <p><?php echo $tracking_data['carrier'] ? esc_html( $tracking_data['carrier'] ) : esc_html__( 'Non renseigné', 'theme-perso' ); ?></p>
                            </div>
                            <div>
                                <small><?php esc_html_e( 'Numéro de suivi', 'theme-perso' ); ?></small>
                                <p><?php echo $tracking_data['tracking_number'] ? esc_html( $tracking_data['tracking_number'] ) : esc_html__( 'Non disponible', 'theme-perso' ); ?></p>
                            </div>
                            <div>
                                <small><?php esc_html_e( 'Date estimée de livraison', 'theme-perso' ); ?></small>
                                <p><?php echo $tracking_data['estimated_delivery'] ? esc_html( $tracking_data['estimated_delivery'] ) : esc_html__( 'Non renseignée', 'theme-perso' ); ?></p>
                            </div>
                        </div>

                        <ol class="account-tracking-timeline">
                            <?php foreach ( $steps as $step ) : ?>
                                <li class="<?php echo esc_attr( trim( ( $step['completed'] ? 'is-complete ' : '' ) . ( $step['active'] ? 'is-active' : '' ) ) ); ?>">
                                    <span><?php echo $step['completed'] ? theme_perso_render_tracking_icon() : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                                    <strong><?php echo esc_html( $step['label'] ); ?></strong>
                                </li>
                            <?php endforeach; ?>
                        </ol>

                        <div class="account-tracking-actions">
                            <a class="button shop-button-secondary" href="<?php echo esc_url( $order->get_view_order_url() ); ?>"><?php esc_html_e( 'Voir les détails', 'theme-perso' ); ?></a>
                            <a class="button shop-button-secondary" href="<?php echo esc_url( $invoice_url ); ?>"><?php esc_html_e( 'Télécharger la facture', 'theme-perso' ); ?></a>
                            <?php if ( $tracking_data['tracking_url'] ) : ?>
                                <a class="button button-primary" href="<?php echo esc_url( $tracking_data['tracking_url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Suivre le colis', 'theme-perso' ); ?></a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
    <?php
}
add_action( 'woocommerce_account_suivi-commande_endpoint', 'theme_perso_order_tracking_endpoint_content' );

function theme_perso_checkout_security_fields() {
    theme_perso_security_fields( 'checkout' );
}
add_action( 'woocommerce_review_order_before_submit', 'theme_perso_checkout_security_fields', 8 );

function theme_perso_validate_checkout_security( $data, $errors ) {
    if ( theme_perso_is_honeypot_triggered() ) {
        $errors->add( 'cosmethique_spam_detected', esc_html__( 'Votre demande n’a pas pu être validée. Merci de réessayer.', 'theme-perso' ) );
    }

    if ( ! theme_perso_verify_recaptcha_submission( 'checkout' ) ) {
        $errors->add( 'cosmethique_recaptcha_failed', esc_html__( 'La vérification de sécurité a échoué. Merci de réessayer.', 'theme-perso' ) );
    }
}
add_action( 'woocommerce_after_checkout_validation', 'theme_perso_validate_checkout_security', 10, 2 );

function theme_perso_account_security_fields() {
    theme_perso_security_fields( 'account' );
}
add_action( 'woocommerce_login_form', 'theme_perso_account_security_fields' );
add_action( 'woocommerce_register_form', 'theme_perso_account_security_fields' );

function theme_perso_enable_woocommerce_account_registration( $value ) {
    return 'yes';
}
add_filter( 'pre_option_woocommerce_enable_myaccount_registration', 'theme_perso_enable_woocommerce_account_registration' );
add_filter( 'woocommerce_registration_generate_password', '__return_false' );
add_filter( 'woocommerce_registration_generate_username', '__return_true' );

function theme_perso_oauth_setting( $theme_mod, $constant = '' ) {
    if ( $constant && defined( $constant ) ) {
        return trim( (string) constant( $constant ) );
    }

    return trim( (string) get_theme_mod( $theme_mod, '' ) );
}

function theme_perso_social_login_callback_url( $provider ) {
    return add_query_arg( 'cosmethique_social_callback', sanitize_key( $provider ), home_url( '/' ) );
}

function theme_perso_social_login_provider_config( $provider ) {
    $providers = array(
        'google' => array(
            'label'         => esc_html__( 'Continuer avec Google', 'theme-perso' ),
            'notice'        => esc_html__( 'La connexion Google doit être reliée à vos identifiants OAuth avant d’être activée.', 'theme-perso' ),
            'icon'          => 'google',
            'client_id'     => theme_perso_oauth_setting( 'cosmethique_google_client_id', 'COSMETHIQUE_GOOGLE_CLIENT_ID' ),
            'client_secret' => theme_perso_oauth_setting( 'cosmethique_google_client_secret', 'COSMETHIQUE_GOOGLE_CLIENT_SECRET' ),
            'auth_url'      => 'https://accounts.google.com/o/oauth2/v2/auth',
            'token_url'     => 'https://oauth2.googleapis.com/token',
            'scope'         => 'openid email profile',
        ),
        'apple'  => array(
            'label'       => esc_html__( 'Continuer avec Apple', 'theme-perso' ),
            'notice'      => esc_html__( 'La connexion Apple nécessite un identifiant Sign in with Apple configuré.', 'theme-perso' ),
            'icon'        => 'apple',
            'client_id'   => theme_perso_oauth_setting( 'cosmethique_apple_service_id', 'COSMETHIQUE_APPLE_SERVICE_ID' ),
            'team_id'     => theme_perso_oauth_setting( 'cosmethique_apple_team_id', 'COSMETHIQUE_APPLE_TEAM_ID' ),
            'key_id'      => theme_perso_oauth_setting( 'cosmethique_apple_key_id', 'COSMETHIQUE_APPLE_KEY_ID' ),
            'private_key' => theme_perso_oauth_setting( 'cosmethique_apple_private_key', 'COSMETHIQUE_APPLE_PRIVATE_KEY' ),
            'auth_url'    => 'https://appleid.apple.com/auth/authorize',
            'token_url'   => 'https://appleid.apple.com/auth/token',
            'scope'       => 'name email',
        ),
    );

    if ( ! isset( $providers[ $provider ] ) ) {
        return array();
    }

    $providers[ $provider ]['redirect_uri'] = theme_perso_social_login_callback_url( $provider );
    $providers[ $provider ]['configured']   = ! empty( $providers[ $provider ]['client_id'] );

    if ( 'google' === $provider ) {
        $providers[ $provider ]['configured'] = $providers[ $provider ]['configured'] && ! empty( $providers[ $provider ]['client_secret'] );
    }

    if ( 'apple' === $provider ) {
        $providers[ $provider ]['configured'] = $providers[ $provider ]['configured'] && ! empty( $providers[ $provider ]['team_id'] ) && ! empty( $providers[ $provider ]['key_id'] ) && ! empty( $providers[ $provider ]['private_key'] );
    }

    return apply_filters( 'theme_perso_social_login_provider_config', $providers[ $provider ], $provider );
}

function theme_perso_social_login_start_url( $provider ) {
    $account_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : wp_login_url();

    return wp_nonce_url(
        add_query_arg(
            array(
                'cosmethique_social_login' => $provider,
            ),
            $account_url
        ),
        'cosmethique_social_login_' . $provider
    );
}

function theme_perso_base64url_encode( $data ) {
    return rtrim( strtr( base64_encode( $data ), '+/', '-_' ), '=' );
}

function theme_perso_base64url_decode( $data ) {
    return base64_decode( strtr( $data, '-_', '+/' ) . str_repeat( '=', ( 4 - strlen( $data ) % 4 ) % 4 ) );
}

function theme_perso_social_login_authorization_url( $provider, $config ) {
    $state = wp_generate_password( 32, false, false );

    set_transient(
        'theme_perso_oauth_state_' . hash( 'sha256', $state ),
        array(
            'provider' => $provider,
            'redirect' => function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : wp_login_url(),
        ),
        10 * MINUTE_IN_SECONDS
    );

    $args = array(
        'client_id'     => $config['client_id'],
        'redirect_uri'  => $config['redirect_uri'],
        'response_type' => 'code',
        'scope'         => $config['scope'],
        'state'         => $state,
    );

    if ( 'google' === $provider ) {
        $args['access_type'] = 'online';
        $args['prompt']      = 'select_account';
    }

    if ( 'apple' === $provider ) {
        $args['response_mode'] = 'form_post';
    }

    return add_query_arg( $args, $config['auth_url'] );
}

function theme_perso_social_login_icon( $icon ) {
    $icons = array(
        'google' => '<svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path fill="#4285F4" d="M21.8 12.2c0-.7-.1-1.4-.2-2H12v3.8h5.5a4.7 4.7 0 0 1-2 3.1v2.6h3.2c1.9-1.8 3.1-4.4 3.1-7.5Z"></path><path fill="#34A853" d="M12 22c2.7 0 5-0.9 6.7-2.4l-3.2-2.6c-.9.6-2 .9-3.5.9-2.6 0-4.8-1.8-5.6-4.1H3.1v2.7A10 10 0 0 0 12 22Z"></path><path fill="#FBBC05" d="M6.4 13.8a6 6 0 0 1 0-3.6V7.5H3.1a10 10 0 0 0 0 9l3.3-2.7Z"></path><path fill="#EA4335" d="M12 6.1c1.5 0 2.8.5 3.8 1.5l2.9-2.9A9.7 9.7 0 0 0 12 2 10 10 0 0 0 3.1 7.5l3.3 2.7C7.2 7.9 9.4 6.1 12 6.1Z"></path></svg>',
        'apple'  => '<svg viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path fill="currentColor" d="M17.7 12.8c0-2.1 1.7-3.1 1.8-3.2-1-1.4-2.5-1.6-3-1.6-1.3-.1-2.5.8-3.1.8-.7 0-1.6-.8-2.7-.7-1.4 0-2.7.8-3.4 2.1-1.5 2.6-.4 6.4 1.1 8.5.7 1 1.6 2.2 2.7 2.1 1.1 0 1.5-.7 2.8-.7s1.7.7 2.9.7c1.2 0 2-1 2.7-2.1.8-1.2 1.2-2.4 1.2-2.5 0 0-2.3-.9-2.3-3.4ZM15.6 6.6c.6-.7 1-1.7.9-2.6-.9 0-1.9.6-2.5 1.3-.6.7-1.1 1.7-1 2.6 1 0 2-.5 2.6-1.3Z"></path></svg>',
    );

    return isset( $icons[ $icon ] ) ? $icons[ $icon ] : '';
}

function theme_perso_render_social_login_buttons() {
    if ( is_user_logged_in() ) {
        return;
    }

    $providers = array( 'google', 'apple' );
    ?>
    <div class="cosmethique-social-login" aria-label="<?php esc_attr_e( 'Connexion sociale', 'theme-perso' ); ?>">
        <p><?php esc_html_e( 'Connexion rapide', 'theme-perso' ); ?></p>
        <div class="cosmethique-social-login__buttons">
            <?php foreach ( $providers as $provider ) : ?>
                <?php $config = theme_perso_social_login_provider_config( $provider ); ?>
                <a class="cosmethique-social-login__button cosmethique-social-login__button--<?php echo esc_attr( $provider ); ?>" href="<?php echo esc_url( theme_perso_social_login_start_url( $provider ) ); ?>">
                    <span aria-hidden="true"><?php echo theme_perso_social_login_icon( $config['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                    <?php echo esc_html( $config['label'] ); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="cosmethique-social-login__divider"><span><?php esc_html_e( 'ou', 'theme-perso' ); ?></span></div>
    </div>
    <?php
}
add_action( 'woocommerce_login_form_start', 'theme_perso_render_social_login_buttons', 5 );
add_action( 'woocommerce_register_form_start', 'theme_perso_render_social_login_buttons', 5 );

function theme_perso_apple_der_to_jose_signature( $der_signature ) {
    $offset = 3;

    if ( ! isset( $der_signature[ $offset ] ) || "\x02" !== $der_signature[ $offset ] ) {
        return '';
    }

    $r_length = ord( $der_signature[ ++$offset ] );
    $r        = substr( $der_signature, ++$offset, $r_length );
    $offset  += $r_length;

    if ( ! isset( $der_signature[ $offset ] ) || "\x02" !== $der_signature[ $offset ] ) {
        return '';
    }

    $s_length = ord( $der_signature[ ++$offset ] );
    $s        = substr( $der_signature, ++$offset, $s_length );

    return str_pad( ltrim( $r, "\x00" ), 32, "\x00", STR_PAD_LEFT ) . str_pad( ltrim( $s, "\x00" ), 32, "\x00", STR_PAD_LEFT );
}

function theme_perso_apple_client_secret( $config ) {
    $private_key = str_replace( '\n', "\n", $config['private_key'] );
    $header      = theme_perso_base64url_encode( wp_json_encode( array( 'alg' => 'ES256', 'kid' => $config['key_id'] ) ) );
    $payload     = theme_perso_base64url_encode(
        wp_json_encode(
            array(
                'iss' => $config['team_id'],
                'iat' => time(),
                'exp' => time() + DAY_IN_SECONDS,
                'aud' => 'https://appleid.apple.com',
                'sub' => $config['client_id'],
            )
        )
    );
    $data        = $header . '.' . $payload;
    $signature   = '';

    if ( ! function_exists( 'openssl_sign' ) || ! openssl_sign( $data, $signature, $private_key, OPENSSL_ALGO_SHA256 ) ) {
        return '';
    }

    $signature = theme_perso_apple_der_to_jose_signature( $signature );

    return $signature ? $data . '.' . theme_perso_base64url_encode( $signature ) : '';
}

function theme_perso_decode_jwt_payload( $jwt ) {
    $parts = explode( '.', (string) $jwt );

    if ( count( $parts ) < 2 ) {
        return array();
    }

    $payload = json_decode( theme_perso_base64url_decode( $parts[1] ), true );

    return is_array( $payload ) ? $payload : array();
}

function theme_perso_social_login_fetch_profile( $provider, $code, $config ) {
    $body = array(
        'code'         => $code,
        'client_id'    => $config['client_id'],
        'redirect_uri' => $config['redirect_uri'],
        'grant_type'   => 'authorization_code',
    );

    if ( 'google' === $provider ) {
        $body['client_secret'] = $config['client_secret'];
    } else {
        $client_secret = theme_perso_apple_client_secret( $config );

        if ( ! $client_secret ) {
            return new WP_Error( 'cosmethique_apple_secret', esc_html__( 'La clé Apple Sign In est invalide.', 'theme-perso' ) );
        }

        $body['client_secret'] = $client_secret;
    }

    $token_response = wp_remote_post(
        $config['token_url'],
        array(
            'timeout' => 15,
            'body'    => $body,
        )
    );

    if ( is_wp_error( $token_response ) ) {
        return $token_response;
    }

    $token_data = json_decode( wp_remote_retrieve_body( $token_response ), true );

    if ( empty( $token_data['access_token'] ) && empty( $token_data['id_token'] ) ) {
        return new WP_Error( 'cosmethique_oauth_token', esc_html__( 'La connexion sociale n’a pas pu être validée.', 'theme-perso' ) );
    }

    if ( 'google' === $provider ) {
        $profile_response = wp_remote_get(
            'https://openidconnect.googleapis.com/v1/userinfo',
            array(
                'timeout' => 15,
                'headers' => array(
                    'Authorization' => 'Bearer ' . $token_data['access_token'],
                ),
            )
        );

        if ( is_wp_error( $profile_response ) ) {
            return $profile_response;
        }

        $profile = json_decode( wp_remote_retrieve_body( $profile_response ), true );

        return is_array( $profile ) ? $profile : array();
    }

    $profile = theme_perso_decode_jwt_payload( $token_data['id_token'] );

    if ( ! empty( $_POST['user'] ) ) {
        $apple_user = json_decode( wp_unslash( $_POST['user'] ), true );
        if ( is_array( $apple_user ) && ! empty( $apple_user['name'] ) ) {
            $profile['given_name']  = $apple_user['name']['firstName'] ?? '';
            $profile['family_name'] = $apple_user['name']['lastName'] ?? '';
        }
    }

    return $profile;
}

function theme_perso_social_login_authenticate_customer( $provider, $profile ) {
    $email = isset( $profile['email'] ) ? sanitize_email( $profile['email'] ) : '';

    if ( ! $email || ! is_email( $email ) ) {
        return new WP_Error( 'cosmethique_social_email', esc_html__( 'Votre compte social ne fournit pas d’adresse e-mail valide.', 'theme-perso' ) );
    }

    $user_id    = email_exists( $email );
    $first_name = isset( $profile['given_name'] ) ? sanitize_text_field( $profile['given_name'] ) : '';
    $last_name  = isset( $profile['family_name'] ) ? sanitize_text_field( $profile['family_name'] ) : '';

    if ( ! $first_name && ! empty( $profile['name'] ) ) {
        $parts      = explode( ' ', sanitize_text_field( $profile['name'] ), 2 );
        $first_name = $parts[0] ?? '';
        $last_name  = $last_name ?: ( $parts[1] ?? '' );
    }

    if ( ! $user_id ) {
        $username = sanitize_user( current( explode( '@', $email ) ), true );
        $username = $username ? $username : 'cosmethique_client';
        $base     = $username;
        $suffix   = 1;

        while ( username_exists( $username ) ) {
            $username = $base . '_' . $suffix;
            $suffix++;
        }

        $user_id = function_exists( 'wc_create_new_customer' )
            ? wc_create_new_customer( $email, $username, wp_generate_password( 24, true ) )
            : wp_create_user( $username, wp_generate_password( 24, true ), $email );

        if ( is_wp_error( $user_id ) ) {
            return $user_id;
        }

        $user = new WP_User( $user_id );
        $user->set_role( 'customer' );
        update_user_meta( $user_id, 'cosmethique_registration_date', current_time( 'mysql' ) );
    }

    update_user_meta( $user_id, 'cosmethique_signup_method', $provider );
    update_user_meta( $user_id, 'cosmethique_social_' . $provider . '_linked', current_time( 'mysql' ) );
    update_user_meta( $user_id, 'billing_email', $email );

    if ( ! empty( $profile['picture'] ) && filter_var( $profile['picture'], FILTER_VALIDATE_URL ) ) {
        update_user_meta( $user_id, 'cosmethique_social_avatar', esc_url_raw( $profile['picture'] ) );
    }

    if ( $first_name ) {
        update_user_meta( $user_id, 'first_name', $first_name );
        update_user_meta( $user_id, 'billing_first_name', $first_name );
    }

    if ( $last_name ) {
        update_user_meta( $user_id, 'last_name', $last_name );
        update_user_meta( $user_id, 'billing_last_name', $last_name );
    }

    wp_set_current_user( $user_id );
    wp_set_auth_cookie( $user_id, true );

    if ( function_exists( 'wc_set_customer_auth_cookie' ) ) {
        wc_set_customer_auth_cookie( $user_id );
    }

    $user = get_user_by( 'id', $user_id );
    if ( $user ) {
        do_action( 'wp_login', $user->user_login, $user );
    }

    return $user_id;
}

function theme_perso_account_notice( $message, $type = 'notice' ) {
    if ( function_exists( 'wc_add_notice' ) ) {
        wc_add_notice( $message, $type );
    }
}

function theme_perso_handle_social_login_start() {
    if ( empty( $_GET['cosmethique_social_login'] ) && empty( $_REQUEST['cosmethique_social_callback'] ) ) {
        return;
    }

    $account_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : wp_login_url();

    if ( ! empty( $_REQUEST['cosmethique_social_callback'] ) ) {
        $provider = sanitize_key( wp_unslash( $_REQUEST['cosmethique_social_callback'] ) );
        $config   = theme_perso_social_login_provider_config( $provider );
        $state    = isset( $_REQUEST['state'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['state'] ) ) : '';
        $stored   = $state ? get_transient( 'theme_perso_oauth_state_' . hash( 'sha256', $state ) ) : false;

        if ( $state ) {
            delete_transient( 'theme_perso_oauth_state_' . hash( 'sha256', $state ) );
        }

        if ( empty( $config ) || empty( $stored['provider'] ) || $stored['provider'] !== $provider || empty( $_REQUEST['code'] ) ) {
            theme_perso_account_notice( esc_html__( 'La connexion sociale a expiré. Merci de réessayer.', 'theme-perso' ), 'error' );
            wp_safe_redirect( $account_url );
            exit;
        }

        $profile = theme_perso_social_login_fetch_profile( $provider, sanitize_text_field( wp_unslash( $_REQUEST['code'] ) ), $config );

        if ( is_wp_error( $profile ) ) {
            theme_perso_account_notice( $profile->get_error_message(), 'error' );
            wp_safe_redirect( $account_url );
            exit;
        }

        $user_id = theme_perso_social_login_authenticate_customer( $provider, $profile );

        if ( is_wp_error( $user_id ) ) {
            theme_perso_account_notice( $user_id->get_error_message(), 'error' );
            wp_safe_redirect( $account_url );
            exit;
        }

        theme_perso_account_notice( esc_html__( 'Connexion réussie. Bienvenue dans votre espace beauté.', 'theme-perso' ), 'success' );
        wp_safe_redirect( $account_url );
        exit;
    }

    $provider = sanitize_key( wp_unslash( $_GET['cosmethique_social_login'] ) );
    $config   = theme_perso_social_login_provider_config( $provider );

    if ( empty( $config ) || ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'cosmethique_social_login_' . $provider ) ) {
        wp_safe_redirect( $account_url );
        exit;
    }

    if ( ! empty( $config['configured'] ) ) {
        wp_safe_redirect( esc_url_raw( theme_perso_social_login_authorization_url( $provider, $config ) ) );
        exit;
    }

    theme_perso_account_notice( $config['notice'], 'notice' );

    wp_safe_redirect( $account_url . '#customer_login' );
    exit;
}
add_action( 'template_redirect', 'theme_perso_handle_social_login_start' );

function theme_perso_account_registration_name_fields() {
    if ( is_user_logged_in() ) {
        return;
    }

    $first_name = isset( $_POST['billing_first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['billing_first_name'] ) ) : '';
    $last_name  = isset( $_POST['billing_last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['billing_last_name'] ) ) : '';
    ?>
    <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php esc_html_e( 'Prénom', 'theme-perso' ); ?> <span class="required" aria-hidden="true">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" autocomplete="given-name" value="<?php echo esc_attr( $first_name ); ?>" required>
    </p>
    <p class="form-row form-row-last">
        <label for="reg_billing_last_name"><?php esc_html_e( 'Nom', 'theme-perso' ); ?> <span class="required" aria-hidden="true">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" autocomplete="family-name" value="<?php echo esc_attr( $last_name ); ?>" required>
    </p>
    <div class="clear"></div>
    <?php
}
add_action( 'woocommerce_register_form_start', 'theme_perso_account_registration_name_fields', 10 );

function theme_perso_account_registration_password_field() {
    if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_registration_generate_password' ) ) {
        return;
    }
    ?>
    <p class="form-row form-row-wide">
        <label for="reg_password"><?php esc_html_e( 'Mot de passe', 'theme-perso' ); ?> <span class="required" aria-hidden="true">*</span></label>
        <input type="password" class="input-text" name="password" id="reg_password" autocomplete="new-password" required>
    </p>
    <?php
}
add_action( 'woocommerce_register_form', 'theme_perso_account_registration_password_field', 8 );

function theme_perso_account_registration_extra_fields() {
    if ( is_user_logged_in() ) {
        return;
    }

    $newsletter_checked = ! isset( $_POST['register'] ) || ! empty( $_POST['cosmethique_newsletter_optin'] );
    $phone              = isset( $_POST['billing_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['billing_phone'] ) ) : '';
    ?>
    <p class="form-row form-row-wide">
        <label for="reg_password_confirm"><?php esc_html_e( 'Confirmation du mot de passe', 'theme-perso' ); ?> <span class="required" aria-hidden="true">*</span></label>
        <input type="password" class="input-text" name="password_confirm" id="reg_password_confirm" autocomplete="new-password" required>
    </p>
    <p class="form-row form-row-wide">
        <label for="reg_billing_phone"><?php esc_html_e( 'Téléphone', 'theme-perso' ); ?> <span class="optional"><?php esc_html_e( 'optionnel', 'theme-perso' ); ?></span></label>
        <input type="tel" class="input-text" name="billing_phone" id="reg_billing_phone" autocomplete="tel" value="<?php echo esc_attr( $phone ); ?>">
    </p>
    <div class="cosmethique-register-consents">
        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox">
            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="cosmethique_accept_terms" type="checkbox" value="1" <?php checked( ! empty( $_POST['cosmethique_accept_terms'] ) ); ?>>
            <span><?php esc_html_e( 'J’accepte les Conditions Générales.', 'theme-perso' ); ?> <span class="required" aria-hidden="true">*</span></span>
        </label>
        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox">
            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="cosmethique_accept_privacy" type="checkbox" value="1" <?php checked( ! empty( $_POST['cosmethique_accept_privacy'] ) ); ?>>
            <span><?php esc_html_e( 'J’accepte la Politique de confidentialité.', 'theme-perso' ); ?> <span class="required" aria-hidden="true">*</span></span>
        </label>
        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox">
            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="cosmethique_newsletter_optin" type="checkbox" value="1" <?php checked( $newsletter_checked ); ?>>
            <span><?php esc_html_e( 'Je souhaite recevoir les nouveautés.', 'theme-perso' ); ?></span>
        </label>
    </div>
    <?php
}
add_action( 'woocommerce_register_form', 'theme_perso_account_registration_extra_fields', 12 );

function theme_perso_is_account_registration_request() {
    if ( function_exists( 'is_account_page' ) && is_account_page() ) {
        return true;
    }

    $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';

    return (bool) preg_match( '#/(mon-compte|my-account)(/|\\?|$)#i', $request_uri );
}

function theme_perso_use_customer_registration_password( $generate_password ) {
    if ( theme_perso_is_account_registration_request() ) {
        return false;
    }

    return $generate_password;
}
add_filter( 'woocommerce_registration_generate_password', 'theme_perso_use_customer_registration_password', 20 );

function theme_perso_force_account_password_field( $pre_option ) {
    if ( theme_perso_is_account_registration_request() ) {
        return 'no';
    }

    return $pre_option;
}
add_filter( 'pre_option_woocommerce_registration_generate_password', 'theme_perso_force_account_password_field', 20 );

function theme_perso_validate_account_registration_fields( $errors, $username = '', $email = '' ) {
    $first_name       = isset( $_POST['billing_first_name'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['billing_first_name'] ) ) ) : '';
    $last_name        = isset( $_POST['billing_last_name'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['billing_last_name'] ) ) ) : '';
    $email            = $email ? sanitize_email( $email ) : ( isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '' );
    $password         = isset( $_POST['password'] ) ? (string) wp_unslash( $_POST['password'] ) : '';
    $password_confirm = isset( $_POST['password_confirm'] ) ? (string) wp_unslash( $_POST['password_confirm'] ) : '';

    if ( '' === $first_name ) {
        $errors->add( 'cosmethique_first_name_required', esc_html__( 'Merci d’indiquer votre prénom.', 'theme-perso' ) );
    }

    if ( '' === $last_name ) {
        $errors->add( 'cosmethique_last_name_required', esc_html__( 'Merci d’indiquer votre nom.', 'theme-perso' ) );
    }

    if ( '' === $email || ! is_email( $email ) ) {
        $errors->add( 'cosmethique_email_required', esc_html__( 'Merci d’indiquer une adresse e-mail valide.', 'theme-perso' ) );
    } elseif ( email_exists( $email ) ) {
        $errors->add( 'cosmethique_email_exists', esc_html__( 'Un compte existe déjà avec cette adresse e-mail.', 'theme-perso' ) );
    }

    if ( '' === $password ) {
        $errors->add( 'cosmethique_password_required', esc_html__( 'Merci de choisir un mot de passe.', 'theme-perso' ) );
    }

    if ( strlen( $password ) < 8 || ! preg_match( '/[A-Z]/', $password ) || ! preg_match( '/[a-z]/', $password ) || ! preg_match( '/[0-9]/', $password ) ) {
        $errors->add( 'cosmethique_password_strength', esc_html__( 'Votre mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.', 'theme-perso' ) );
    }

    if ( $password !== $password_confirm ) {
        $errors->add( 'cosmethique_password_match', esc_html__( 'La confirmation du mot de passe ne correspond pas.', 'theme-perso' ) );
    }

    if ( empty( $_POST['cosmethique_accept_terms'] ) ) {
        $errors->add( 'cosmethique_terms_required', esc_html__( 'Vous devez accepter les Conditions Générales pour créer un compte.', 'theme-perso' ) );
    }

    if ( empty( $_POST['cosmethique_accept_privacy'] ) ) {
        $errors->add( 'cosmethique_privacy_required', esc_html__( 'Vous devez accepter la Politique de confidentialité pour créer un compte.', 'theme-perso' ) );
    }

    return $errors;
}
add_filter( 'woocommerce_registration_errors', 'theme_perso_validate_account_registration_fields', 20, 3 );

function theme_perso_save_account_registration_fields( $customer_id ) {
    $first_name = isset( $_POST['billing_first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['billing_first_name'] ) ) : '';
    $last_name  = isset( $_POST['billing_last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['billing_last_name'] ) ) : '';
    $email      = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $phone      = isset( $_POST['billing_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['billing_phone'] ) ) : '';

    if ( $first_name ) {
        update_user_meta( $customer_id, 'first_name', $first_name );
        update_user_meta( $customer_id, 'billing_first_name', $first_name );
    }

    if ( $last_name ) {
        update_user_meta( $customer_id, 'last_name', $last_name );
        update_user_meta( $customer_id, 'billing_last_name', $last_name );
    }

    if ( $email ) {
        update_user_meta( $customer_id, 'billing_email', $email );
    }

    if ( $phone ) {
        update_user_meta( $customer_id, 'billing_phone', $phone );
    }

    update_user_meta( $customer_id, 'cosmethique_accept_terms', current_time( 'mysql' ) );
    update_user_meta( $customer_id, 'cosmethique_accept_privacy', current_time( 'mysql' ) );
    update_user_meta( $customer_id, 'cosmethique_newsletter_optin', empty( $_POST['cosmethique_newsletter_optin'] ) ? 'no' : 'yes' );
    update_user_meta( $customer_id, 'cosmethique_signup_method', 'classic' );
    update_user_meta( $customer_id, 'cosmethique_registration_date', current_time( 'mysql' ) );

    $user = new WP_User( $customer_id );
    if ( $user && ! in_array( 'customer', (array) $user->roles, true ) ) {
        $user->set_role( 'customer' );
    }

    wp_update_user(
        array(
            'ID'           => $customer_id,
            'display_name' => trim( $first_name . ' ' . $last_name ),
            'first_name'   => $first_name,
            'last_name'    => $last_name,
        )
    );
}
add_action( 'woocommerce_created_customer', 'theme_perso_save_account_registration_fields', 10, 1 );

function theme_perso_authenticate_new_account_customer( $authenticate ) {
    return true;
}
add_filter( 'woocommerce_registration_auth_new_customer', 'theme_perso_authenticate_new_account_customer', 20 );

function theme_perso_account_auth_redirect( $redirect = '' ) {
    if ( function_exists( 'wc_get_page_permalink' ) ) {
        return wc_get_page_permalink( 'myaccount' );
    }

    return $redirect ? $redirect : home_url( '/mon-compte/' );
}
add_filter( 'woocommerce_login_redirect', 'theme_perso_account_auth_redirect', 20, 1 );
add_filter( 'woocommerce_registration_redirect', 'theme_perso_account_auth_redirect', 20, 1 );

function theme_perso_account_lost_password_url( $lostpassword_url, $redirect ) {
    if ( function_exists( 'wc_lostpassword_url' ) && theme_perso_is_account_registration_request() ) {
        return wc_lostpassword_url();
    }

    return $lostpassword_url;
}
add_filter( 'lostpassword_url', 'theme_perso_account_lost_password_url', 20, 2 );

function theme_perso_account_json_error( $message, $code = 'cosmethique_account_error', $status = 400 ) {
    wp_send_json_error(
        array(
            'code'    => $code,
            'message' => wp_strip_all_tags( $message ),
        ),
        $status
    );
}

function theme_perso_account_json_success( $message ) {
    wp_send_json_success(
        array(
            'message'  => wp_strip_all_tags( $message ),
            'redirect' => theme_perso_account_auth_redirect(),
        )
    );
}

function theme_perso_validate_account_ajax_request() {
    if ( ! check_ajax_referer( 'cosmethique_account_auth', 'nonce', false ) ) {
        theme_perso_account_json_error( esc_html__( 'Votre session a expiré. Merci de réessayer.', 'theme-perso' ), 'invalid_nonce', 403 );
    }

    if ( theme_perso_is_honeypot_triggered() || ! theme_perso_verify_recaptcha_submission( 'account' ) ) {
        theme_perso_account_json_error( esc_html__( 'La vérification de sécurité a échoué. Merci de réessayer.', 'theme-perso' ), 'security_failed', 403 );
    }
}

function theme_perso_ajax_account_login() {
    theme_perso_validate_account_ajax_request();

    $username = isset( $_POST['username'] ) ? trim( sanitize_text_field( wp_unslash( $_POST['username'] ) ) ) : '';
    $password = isset( $_POST['password'] ) ? (string) wp_unslash( $_POST['password'] ) : '';
    $remember = ! empty( $_POST['rememberme'] );

    if ( '' === $username || '' === $password ) {
        theme_perso_account_json_error( esc_html__( 'Merci d’indiquer votre e-mail et votre mot de passe.', 'theme-perso' ), 'missing_credentials' );
    }

    $user = is_email( $username ) ? get_user_by( 'email', sanitize_email( $username ) ) : get_user_by( 'login', sanitize_user( $username ) );

    if ( ! $user ) {
        theme_perso_account_json_error( esc_html__( 'Aucun compte ne correspond à ces identifiants.', 'theme-perso' ), 'invalid_user', 401 );
    }

    if ( (int) get_transient( theme_perso_login_rate_limit_key() ) >= 8 ) {
        theme_perso_account_json_error( esc_html__( 'Trop de tentatives de connexion. Merci de patienter quelques minutes avant de réessayer.', 'theme-perso' ), 'cosmethique_login_rate_limit', 403 );
    }

    $signed_in = wp_signon(
        array(
            'user_login'    => $user->user_login,
            'user_password' => $password,
            'remember'      => $remember,
        ),
        is_ssl()
    );

    if ( is_wp_error( $signed_in ) ) {
        theme_perso_account_json_error( esc_html__( 'Le mot de passe indiqué est incorrect.', 'theme-perso' ), 'invalid_password', 401 );
    }

    wp_set_current_user( $signed_in->ID );

    if ( function_exists( 'wc_set_customer_auth_cookie' ) ) {
        wc_set_customer_auth_cookie( $signed_in->ID );
    }

    do_action( 'wp_login', $signed_in->user_login, $signed_in );

    theme_perso_account_json_success( esc_html__( 'Connexion réussie. Ouverture de votre espace beauté…', 'theme-perso' ) );
}
add_action( 'wp_ajax_nopriv_theme_perso_account_login', 'theme_perso_ajax_account_login' );

function theme_perso_ajax_account_register() {
    theme_perso_validate_account_ajax_request();

    $errors = new WP_Error();
    $email  = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $errors = theme_perso_validate_account_registration_fields( $errors, '', $email );

    if ( $errors->has_errors() ) {
        theme_perso_account_json_error( $errors->get_error_message(), $errors->get_error_code() );
    }

    $password = isset( $_POST['password'] ) ? (string) wp_unslash( $_POST['password'] ) : '';
    $username = sanitize_user( current( explode( '@', $email ) ), true );
    $username = $username ? $username : 'cosmethique_client';
    $base     = $username;
    $suffix   = 1;

    while ( username_exists( $username ) ) {
        $username = $base . '_' . $suffix;
        $suffix++;
    }

    $customer_id = function_exists( 'wc_create_new_customer' )
        ? wc_create_new_customer( $email, $username, $password )
        : wp_create_user( $username, $password, $email );

    if ( is_wp_error( $customer_id ) ) {
        theme_perso_account_json_error( $customer_id->get_error_message(), $customer_id->get_error_code() );
    }

    theme_perso_save_account_registration_fields( $customer_id );
    wp_set_current_user( $customer_id );
    wp_set_auth_cookie( $customer_id, true, is_ssl() );

    if ( function_exists( 'wc_set_customer_auth_cookie' ) ) {
        wc_set_customer_auth_cookie( $customer_id );
    }

    $user = get_user_by( 'id', $customer_id );
    if ( $user ) {
        do_action( 'wp_login', $user->user_login, $user );
    }

    theme_perso_account_json_success( esc_html__( 'Votre compte est créé. Ouverture de votre espace beauté…', 'theme-perso' ) );
}
add_action( 'wp_ajax_nopriv_theme_perso_account_register', 'theme_perso_ajax_account_register' );

function theme_perso_account_form_button_labels( $translated, $text, $domain ) {
    if ( is_admin() || 'woocommerce' !== $domain || ! function_exists( 'is_account_page' ) || ! is_account_page() ) {
        return $translated;
    }

    if ( 'Register' === $text ) {
        return esc_html__( 'Créer mon compte', 'theme-perso' );
    }

    if ( 'Log in' === $text ) {
        return esc_html__( 'Se connecter', 'theme-perso' );
    }

    return $translated;
}
add_filter( 'gettext', 'theme_perso_account_form_button_labels', 20, 3 );

function theme_perso_account_menu_labels( $items ) {
    $labels = array(
        'dashboard'       => esc_html__( 'Tableau de bord', 'theme-perso' ),
        'orders'          => esc_html__( 'Mes commandes', 'theme-perso' ),
        'edit-address'    => esc_html__( 'Mes adresses', 'theme-perso' ),
        'edit-account'    => esc_html__( 'Mes informations personnelles', 'theme-perso' ),
        'customer-logout' => esc_html__( 'Déconnexion', 'theme-perso' ),
    );

    foreach ( $labels as $endpoint => $label ) {
        if ( isset( $items[ $endpoint ] ) ) {
            $items[ $endpoint ] = $label;
        }
    }

    if ( isset( $items['downloads'] ) ) {
        unset( $items['downloads'] );
    }

    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'theme_perso_account_menu_labels', 40 );

function theme_perso_login_rate_limit_key() {
    $ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';

    return 'theme_perso_login_attempts_' . md5( $ip );
}

function theme_perso_record_failed_login_attempt() {
    $key      = theme_perso_login_rate_limit_key();
    $attempts = (int) get_transient( $key );
    set_transient( $key, $attempts + 1, 15 * MINUTE_IN_SECONDS );
}
add_action( 'wp_login_failed', 'theme_perso_record_failed_login_attempt' );

function theme_perso_clear_failed_login_attempts() {
    delete_transient( theme_perso_login_rate_limit_key() );
}
add_action( 'wp_login', 'theme_perso_clear_failed_login_attempts' );

function theme_perso_validate_login_security( $validation_error ) {
    if ( (int) get_transient( theme_perso_login_rate_limit_key() ) >= 8 ) {
        $validation_error->add( 'cosmethique_login_rate_limit', esc_html__( 'Trop de tentatives de connexion. Merci de patienter quelques minutes avant de réessayer.', 'theme-perso' ) );
    }

    if ( theme_perso_is_honeypot_triggered() || ! theme_perso_verify_recaptcha_submission( 'account' ) ) {
        $validation_error->add( 'cosmethique_security_failed', esc_html__( 'La vérification de sécurité a échoué. Merci de réessayer.', 'theme-perso' ) );
    }

    return $validation_error;
}
add_filter( 'woocommerce_process_login_errors', 'theme_perso_validate_login_security', 10, 1 );

function theme_perso_validate_registration_security( $errors ) {
    if ( theme_perso_is_honeypot_triggered() || ! theme_perso_verify_recaptcha_submission( 'account' ) ) {
        $errors->add( 'cosmethique_security_failed', esc_html__( 'La vérification de sécurité a échoué. Merci de réessayer.', 'theme-perso' ) );
    }

    return $errors;
}
add_filter( 'woocommerce_registration_errors', 'theme_perso_validate_registration_security', 10, 1 );

function theme_perso_comment_security_fields() {
    theme_perso_security_fields( 'comment' );
}
add_action( 'comment_form_after_fields', 'theme_perso_comment_security_fields' );
add_action( 'comment_form_logged_in_after', 'theme_perso_comment_security_fields' );

function theme_perso_validate_comment_security( $commentdata ) {
    if ( theme_perso_is_honeypot_triggered() || ! theme_perso_verify_recaptcha_submission( 'comment' ) ) {
        wp_die( esc_html__( 'La vérification de sécurité a échoué. Merci de revenir en arrière et de réessayer.', 'theme-perso' ) );
    }

    return $commentdata;
}
add_filter( 'preprocess_comment', 'theme_perso_validate_comment_security' );
