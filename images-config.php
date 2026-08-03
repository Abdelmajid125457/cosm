<?php
/**
 * Fichier d'aide pour les images placeholder
 * Ce fichier n'est pas utilisé directement, c'est juste un guide
 * 
 * Images nécessaires à remplacer :
 * - /images/hero-cosmetics.jpg (1920x1080px minimum)
 * - /images/banner-new-collection.jpg (1000x600px)
 * - /images/banner-promotion.jpg (1000x600px)
 * - /images/storytelling.jpg (600x600px)
 * 
 * Vous pouvez utiliser des services gratuits comme :
 * - Unsplash.com
 * - Pexels.com
 * - Pixabay.com
 * 
 * Ou générer des images avec :
 * - Placeholder.com
 * - DummyImage.com
 */

// Générer une image placeholder de test
function generate_placeholder_image() {
    $upload_dir = wp_upload_dir();
    $images_dir = get_template_directory() . '/images';

    // Créer le dossier images s'il n'existe pas
    if ( ! is_dir( $images_dir ) ) {
        wp_mkdir_p( $images_dir );
    }

    // Créer des images placeholder si nécessaire
    $placeholders = array(
        'hero-cosmetics.jpg' => array( 1920, 1080 ),
        'banner-new-collection.jpg' => array( 1000, 600 ),
        'banner-promotion.jpg' => array( 1000, 600 ),
        'storytelling.jpg' => array( 600, 600 ),
    );

    foreach ( $placeholders as $filename => $size ) {
        $file_path = $images_dir . '/' . $filename;
        if ( ! file_exists( $file_path ) ) {
            // Créer une image placeholder simple (optionnel)
            // ou utiliser une URL externe
        }
    }
}

// Hook dans after_switch_theme
add_action( 'after_switch_theme', 'generate_placeholder_image' );
?>
