<?php
/**
 * Configuration Premium de la Page d'Accueil COSM'ETHIQUE
 * 
 * Fichier optionnel pour centraliser les configurations
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Configuration globale
 */
class COSM_Homepage_Config {

    /**
     * Textes et messages
     */
    public static $texts = array(
        'promo_bar'       => 'Livraison offerte dès 40€ d\'achat',
        'hero_badge'      => '100% Naturel & Cruelty Free',
        'hero_title'      => 'Révélez la beauté naturelle de votre peau',
        'hero_subtitle'   => 'Des soins premium à base d\'ingrédients naturels, formulés pour sublimer et respecter votre épiderme',
        'hero_btn_1'      => 'Découvrir la boutique',
        'hero_btn_2'      => 'Voir les collections',
        'hero_testimonial_count' => '+4800',
        'hero_testimonial_text'  => 'clientes satisfaites',
        'hero_rating'           => 'Note moyenne 4.9/5',
    );

    /**
     * Éléments de confiance
     */
    public static $trust_items = array(
        array(
            'title'       => 'Livraison Rapide',
            'description' => 'En 24-72h en France',
            'icon'        => 'truck', // Type d'icône
        ),
        array(
            'title'       => '100% Bio',
            'description' => 'Certifiés et garantis',
            'icon'        => 'leaf',
        ),
        array(
            'title'       => 'Paiement Sécurisé',
            'description' => 'Certifié SSL 256 bits',
            'icon'        => 'shield',
        ),
        array(
            'title'       => 'Cruelty Free',
            'description' => 'Sans test animal',
            'icon'        => 'check',
        ),
        array(
            'title'       => 'Éco-Responsable',
            'description' => 'Emballages recyclés',
            'icon'        => 'message',
        ),
    );

    /**
     * Catégories
     */
    public static $categories = array(
        array(
            'name'        => 'Soins Visage',
            'description' => 'Sérums, crèmes et masques premium',
            'link'        => '#',
        ),
        array(
            'name'        => 'Soins Corps',
            'description' => 'Huiles, laits et gommages naturels',
            'link'        => '#',
        ),
        array(
            'name'        => 'Soins Cheveux',
            'description' => 'Shampooings et traitements doux',
            'link'        => '#',
        ),
        array(
            'name'        => 'Aromathérapie',
            'description' => 'Huiles essentielles et diffuseurs',
            'link'        => '#',
        ),
    );

    /**
     * Produits vedettes (optionnel - sinon utilise WooCommerce)
     */
    public static $featured_products = array(
        'count'  => 3,
        'orderby' => 'meta_value_num',
        'meta_key' => 'total_sales',
        'order'   => 'DESC',
    );

    /**
     * Bannières promotionnelles
     */
    public static $banners = array(
        array(
            'label'  => 'Nouvelle Collection',
            'title'  => 'Glow Ritual',
            'text'   => 'Rituels de beauté pour une peau rayonnante',
            'button' => 'Découvrir',
            'link'   => '#',
        ),
        array(
            'label'  => 'Promotion Limitée',
            'title'  => '-20% sur les Sérums',
            'text'   => 'Jusqu\'au 31 mai - Ne ratez pas cette offre',
            'button' => 'Profiter',
            'link'   => '#',
        ),
    );

    /**
     * Testimoniaux
     */
    public static $testimonials = array(
        array(
            'name'    => 'Sophie D.',
            'rating'  => 5,
            'quote'   => 'Le sérum rose est devenu un incontournable de ma routine. Ma peau est visiblement plus radieuse et hydratée. J\'adore que ce soit naturel et les résultats sont vraiment au rendez-vous !',
            'avatar'  => 'https://i.pravatar.cc/60?img=1',
        ),
        array(
            'name'    => 'Marie L.',
            'rating'  => 5,
            'quote'   => 'Enfin une marque qui ne fait aucun compromis ! Les produits sont délicieux, l\'emballage est magnifique et le service client est impeccable. Je recommande vivement !',
            'avatar'  => 'https://i.pravatar.cc/60?img=2',
        ),
        array(
            'name'    => 'Julie M.',
            'rating'  => 5,
            'quote'   => 'L\'huile sèche botanique a révolutionné mon routine beauté. Application facile, résultat immédiat et l\'odeur est simplement divine. Je suis complètement conquise !',
            'avatar'  => 'https://i.pravatar.cc/60?img=3',
        ),
    );

    /**
     * Blog / Articles
     */
    public static $blog = array(
        'count'   => 3,
        'orderby' => 'date',
        'order'   => 'DESC',
    );

    /**
     * Newsletter
     */
    public static $newsletter = array(
        'title'       => 'Rejoignez Notre Communauté',
        'subtitle'    => 'Recevez nos conseils beauté, nos nouveautés et nos offres exclusives',
        'button'      => 'S\'inscrire',
        'note'        => 'Nous ne partageons jamais vos données.',
    );

    /**
     * Couleurs (CSS Variables)
     */
    public static $colors = array(
        'beige'          => '#FFFFFF',
        'beige_dark'     => '#E8EBF1',
        'sage'           => '#2B7D8A',
        'sage_dark'      => '#0D1B3D',
        'cream'          => '#FFFFFF',
        'gold'           => '#1E9CA6',
        'gold_light'     => '#1E9CA6',
        'white'          => '#FFFFFF',
        'dark'           => '#0D1B3D',
        'gray'           => '#6B6B6B',
        'gray_light'     => '#D1D1D1',
    );

    /**
     * Obtenir une valeur de texte
     */
    public static function get_text( $key, $default = '' ) {
        return isset( self::$texts[ $key ] ) ? self::$texts[ $key ] : $default;
    }

    /**
     * Obtenir une couleur
     */
    public static function get_color( $key ) {
        return isset( self::$colors[ $key ] ) ? self::$colors[ $key ] : '';
    }

    /**
     * Obtenir les items de confiance
     */
    public static function get_trust_items() {
        return self::$trust_items;
    }

    /**
     * Obtenir les catégories
     */
    public static function get_categories() {
        return self::$categories;
    }

    /**
     * Obtenir les bannières
     */
    public static function get_banners() {
        return self::$banners;
    }

    /**
     * Obtenir les testimoniaux
     */
    public static function get_testimonials() {
        return self::$testimonials;
    }
}

/**
 * Hook pour modifier les configurations
 * Exemple:
 * add_filter( 'cosm_homepage_text', function( $texts ) {
 *     $texts['promo_bar'] = 'Ma promotion personnalisée';
 *     return $texts;
 * });
 */
do_action( 'cosm_homepage_loaded', COSM_Homepage_Config::class );
?>
