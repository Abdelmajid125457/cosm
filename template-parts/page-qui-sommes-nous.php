<?php
/**
 * Page Qui sommes-nous premium.
 *
 * @package Theme_Perso
 */

$asset_url = function_exists( 'theme_perso_product_asset_url' ) ? 'theme_perso_product_asset_url' : null;
$about_url = static function ( $file ) {
    return get_template_directory_uri() . '/assets/about/' . ltrim( $file, '/' );
};
$shop_url    = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
$contact_url = home_url( '/contact/' );

$philosophy_cards = array(
    array(
        'icon'  => 'leaf',
        'title' => 'Nature',
        'text'  => 'Des ingrédients soigneusement sélectionnés pour respecter la peau et révéler son équilibre naturel.',
    ),
    array(
        'icon'  => 'recycle',
        'title' => 'Responsabilité',
        'text'  => 'Des emballages pensés pour durer, être recyclés et réduire l’impact de chaque routine.',
    ),
    array(
        'icon'  => 'sparkle',
        'title' => 'Qualité',
        'text'  => 'Des formules efficaces, sensorielles et lisibles, développées avec exigence.',
    ),
    array(
        'icon'  => 'heart',
        'title' => 'Engagement',
        'text'  => 'Une cosmétique respectueuse de la peau, des clientes et des choix de consommation responsables.',
    ),
);

$numbers = array(
    array( 'value' => '98', 'suffix' => '%', 'label' => 'd’ingrédients naturels' ),
    array( 'value' => '100', 'suffix' => '%', 'label' => 'Cruelty Free' ),
    array( 'value' => '25', 'suffix' => '', 'label' => 'villes couvertes' ),
    array( 'value' => '50000', 'suffix' => '+', 'label' => 'clients satisfaits' ),
);

$process_steps = array(
    array( 'title' => 'Sélection des ingrédients', 'icon' => 'leaf' ),
    array( 'title' => 'Développement des formules', 'icon' => 'flask' ),
    array( 'title' => 'Fabrication française', 'icon' => 'factory' ),
    array( 'title' => 'Contrôle qualité', 'icon' => 'shield' ),
    array( 'title' => 'Livraison', 'icon' => 'truck' ),
);

$ingredients = array(
    array( 'name' => 'Rose', 'text' => 'Hydrate et illumine.', 'image' => $asset_url ? $asset_url( 'photo-serum-eclat-rose.png' ) : '' ),
    array( 'name' => 'Sauge', 'text' => 'Purifie et équilibre.', 'image' => $asset_url ? $asset_url( 'photo-creme-hydratante-sauge-camomille.png' ) : '' ),
    array( 'name' => 'Camomille', 'text' => 'Apaise les peaux sensibles.', 'image' => $asset_url ? $asset_url( 'photo-creme-hydratante-sauge-camomille-texture.png' ) : '' ),
    array( 'name' => 'Karité', 'text' => 'Nourrit intensément.', 'image' => $asset_url ? $asset_url( 'photo-baume-corps-karite-amande.png' ) : '' ),
    array( 'name' => 'Lavande', 'text' => 'Relaxante et sensorielle.', 'image' => $asset_url ? $asset_url( 'photo-huile-essentielle-lavande-fine.png' ) : '' ),
    array( 'name' => 'Amande', 'text' => 'Adoucit et protège.', 'image' => $asset_url ? $asset_url( 'photo-baume-corps-karite-amande-texture.png' ) : '' ),
);

$testimonials = array(
    array(
        'name'  => 'Camille R.',
        'city'  => 'Bordeaux',
        'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=240&q=80',
        'text'  => 'La marque raconte exactement ce que je cherchais: des soins naturels, beaux, efficaces et vraiment agréables à utiliser.',
    ),
    array(
        'name'  => 'Nora B.',
        'city'  => 'Lyon',
        'image' => 'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?auto=format&fit=crop&w=240&q=80',
        'text'  => 'J’aime la cohérence de l’univers, la texture des produits et la sensation premium sans excès. Tout paraît très soigné.',
    ),
    array(
        'name'  => 'Sofia M.',
        'city'  => 'Paris',
        'image' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=240&q=80',
        'text'  => 'Les routines sont simples à comprendre et les packagings sont magnifiques dans la salle de bain. C’est naturel et élégant.',
    ),
);

if ( ! function_exists( 'theme_perso_about_icon' ) ) :
function theme_perso_about_icon( $name ) {
    $icons = array(
        'leaf'    => '<path d="M20 4C12 4 6 10 6 18c8 0 14-6 14-14Z"></path><path d="M6 18c2-4 5-7 9-9"></path>',
        'recycle' => '<path d="m7 7 2-3 2 3M9 4v7M17 17l-2 3-2-3M15 20v-7M4 15l-2-3 2-3M2 12h7M20 9l2 3-2 3M22 12h-7"></path>',
        'sparkle' => '<path d="M12 3l1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8L12 3Z"></path><path d="M19 15l.8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8L19 15Z"></path>',
        'heart'   => '<path d="M20.8 5.6a5 5 0 0 0-7.1 0L12 7.3l-1.7-1.7a5 5 0 1 0-7.1 7.1L12 21l8.8-8.3a5 5 0 0 0 0-7.1Z"></path>',
        'flask'   => '<path d="M9 3h6M10 3v6l-5 9a2 2 0 0 0 1.8 3h10.4a2 2 0 0 0 1.8-3l-5-9V3"></path><path d="M8 15h8"></path>',
        'factory' => '<path d="M3 21V9l6 4V9l6 4V9l6 4v8H3Z"></path><path d="M7 21v-4h3v4M14 21v-4h3v4"></path>',
        'shield'  => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"></path><path d="m9 12 2 2 4-5"></path>',
        'truck'   => '<path d="M3 7h11v9H3zM14 10h4l3 3v3h-7zM7 19a2 2 0 1 0 0-4 2 2 0 0 0 0 4ZM18 19a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>',
        'check'   => '<path d="m5 12 4 4L19 6"></path>',
    );

    return '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">' . ( $icons[ $name ] ?? $icons['leaf'] ) . '</svg>';
}
endif;
?>

<div class="about-brand-page">
    <section class="about-story-section about-reveal">
        <div class="about-story-copy">
            <p class="eyebrow">Notre Histoire</p>
            <h2>Une beauté naturelle pensée autrement</h2>
            <p>COSM’ETHIQUE est née d’une envie simple: réconcilier l’exigence d’un soin premium avec une approche plus naturelle, plus lisible et plus responsable de la beauté.</p>
            <p>La marque imagine des rituels sensoriels, conçus pour accompagner les gestes du quotidien sans multiplier les étapes. Chaque formule met en avant des actifs botaniques choisis avec précision, des textures élégantes et une identité visuelle qui transforme la salle de bain en véritable espace de soin.</p>
            <p>Notre vision est claire: proposer une cosmétique française haut de gamme, respectueuse de la peau, attentive aux emballages et fidèle à une beauté plus consciente.</p>
            <a class="button button-primary" href="<?php echo esc_url( $shop_url ); ?>">Découvrir nos produits</a>
        </div>
        <figure class="about-story-media">
            <img src="<?php echo esc_url( $about_url( 'about-story-lifestyle.png' ) ); ?>" alt="Rituel visage Cosm’Éthique dans une salle de bain premium" loading="lazy">
        </figure>
    </section>

    <section class="about-philosophy-section about-reveal">
        <div class="about-section-heading">
            <p class="eyebrow">Notre philosophie</p>
            <h2>Des choix simples, exigeants et durables.</h2>
        </div>
        <div class="about-philosophy-grid">
            <?php foreach ( $philosophy_cards as $card ) : ?>
                <article class="about-value-card">
                    <span><?php echo theme_perso_about_icon( $card['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                    <h3><?php echo esc_html( $card['title'] ); ?></h3>
                    <p><?php echo esc_html( $card['text'] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="about-numbers-section about-reveal" data-counter-scope>
        <div class="about-number-grid">
            <?php foreach ( $numbers as $number ) : ?>
                <div class="about-number-card">
                    <strong><em data-counter-target="<?php echo esc_attr( $number['value'] ); ?>">0</em><?php echo esc_html( $number['suffix'] ); ?></strong>
                    <span><?php echo esc_html( $number['label'] ); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="about-process-section about-reveal">
        <div class="about-section-heading">
            <p class="eyebrow">Notre processus</p>
            <h2>De l’actif botanique au rituel final.</h2>
        </div>
        <div class="about-process-timeline">
            <?php foreach ( $process_steps as $index => $step ) : ?>
                <article class="about-process-step">
                    <span class="about-process-index"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
                    <span class="about-process-icon"><?php echo theme_perso_about_icon( $step['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                    <h3><?php echo esc_html( $step['title'] ); ?></h3>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="about-ingredients-section about-reveal">
        <div class="about-section-heading">
            <p class="eyebrow">Nos ingrédients</p>
            <h2>Une galerie botanique au service de la peau.</h2>
        </div>
        <div class="about-ingredient-grid">
            <?php foreach ( $ingredients as $ingredient ) : ?>
                <article class="about-ingredient-card">
                    <img src="<?php echo esc_url( $ingredient['image'] ); ?>" alt="<?php echo esc_attr( $ingredient['name'] ); ?>" loading="lazy">
                    <div>
                        <h3><?php echo esc_html( $ingredient['name'] ); ?></h3>
                        <p><?php echo esc_html( $ingredient['text'] ); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="about-eco-section about-reveal">
        <figure>
            <img src="<?php echo esc_url( $about_url( 'about-eco-commitment.png' ) ); ?>" alt="Produits Cosm’Éthique et emballages recyclables" loading="lazy">
        </figure>
        <div>
            <p class="eyebrow">Engagement écologique</p>
            <h2>Un luxe plus responsable, jusque dans les détails.</h2>
            <p>Notre démarche associe performance, plaisir d’utilisation et responsabilité. Chaque choix de formulation, d’emballage et de fournisseur vise à créer une beauté plus transparente.</p>
            <ul class="about-eco-list">
                <li><?php echo theme_perso_about_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> emballages recyclables</li>
                <li><?php echo theme_perso_about_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> ingrédients naturels</li>
                <li><?php echo theme_perso_about_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> fabrication responsable</li>
                <li><?php echo theme_perso_about_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> cruelty free</li>
                <li><?php echo theme_perso_about_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> fournisseurs européens</li>
            </ul>
            <span class="about-eco-badge">98 % d’ingrédients d’origine naturelle</span>
        </div>
    </section>

    <section class="about-testimonials-section about-reveal" data-about-testimonials>
        <div class="about-section-heading">
            <p class="eyebrow">Témoignages</p>
            <h2>Une expérience qui reste en mémoire.</h2>
        </div>
        <div class="about-testimonial-slider">
            <?php foreach ( $testimonials as $index => $testimonial ) : ?>
                <figure class="about-testimonial-card<?php echo 0 === $index ? ' is-active' : ''; ?>" data-about-testimonial>
                    <img src="<?php echo esc_url( $testimonial['image'] ); ?>" alt="<?php echo esc_attr( $testimonial['name'] ); ?>" loading="lazy">
                    <figcaption>
                        <strong><?php echo esc_html( $testimonial['name'] ); ?></strong>
                        <span><?php echo esc_html( $testimonial['city'] ); ?></span>
                    </figcaption>
                    <span class="stars" aria-hidden="true">★★★★★</span>
                    <blockquote><?php echo esc_html( $testimonial['text'] ); ?></blockquote>
                </figure>
            <?php endforeach; ?>
        </div>
        <div class="about-testimonial-controls">
            <?php foreach ( $testimonials as $index => $testimonial ) : ?>
                <button type="button" data-about-testimonial-dot="<?php echo esc_attr( (string) $index ); ?>" aria-label="<?php echo esc_attr( 'Afficher le témoignage ' . ( $index + 1 ) ); ?>" aria-current="<?php echo 0 === $index ? 'true' : 'false'; ?>"></button>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="about-cta-section about-reveal">
        <div>
            <p class="eyebrow">Cosmétique naturelle premium</p>
            <h2>Prenez soin de votre peau naturellement.</h2>
            <p>Découvrez des soins pensés pour accompagner vos routines avec exigence, douceur et élégance.</p>
            <div class="about-cta-actions">
                <a class="button button-primary" href="<?php echo esc_url( $shop_url ); ?>">Découvrir la boutique</a>
                <a class="button shop-button-secondary" href="<?php echo esc_url( $contact_url ); ?>">Nous contacter</a>
            </div>
        </div>
    </section>
</div>
