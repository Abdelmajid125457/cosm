<?php
/**
 * Pages institutionnelles premium COSM'ETHIQUE.
 *
 * @package Theme_Perso
 */

$slug = isset( $args['slug'] ) ? sanitize_key( $args['slug'] ) : get_post_field( 'post_name', get_the_ID() );

$asset = function( $folder, $file ) {
    return get_template_directory_uri() . '/assets/' . trim( $folder, '/' ) . '/' . ltrim( $file, '/' );
};

$icon = function( $name ) {
    $icons = array(
        'leaf'      => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19c8.5-.2 13.4-5.2 14-14-8.8.6-13.8 5.5-14 14Z"></path><path d="M5 19c2.8-4 6.3-7.3 10.5-10"></path></svg>',
        'skin'      => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-5.2 7-11a7 7 0 0 0-14 0c0 5.8 7 11 7 11Z"></path><path d="M9.5 10.5c1.4 1 3.6 1 5 0"></path></svg>',
        'heart'     => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.8 8.6c0 5.1-8.8 10.4-8.8 10.4S3.2 13.7 3.2 8.6A4.5 4.5 0 0 1 12 7a4.5 4.5 0 0 1 8.8 1.6Z"></path></svg>',
        'factory'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20V9l5 3V9l5 3V7h6v13H4Z"></path><path d="M8 16h2M13 16h2M18 16h1"></path></svg>',
        'recycle'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m7.5 7.2 2.2-3.5 2.2 3.5"></path><path d="m16.5 7.2 2.2 3.5-4.1.2"></path><path d="m8.6 17.7-4.1-.2 2.2-3.5"></path><path d="m4.5 17.5h7"></path></svg>',
        'clarity'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12s3-6 8-6 8 6 8 6-3 6-8 6-8-6-8-6Z"></path><circle cx="12" cy="12" r="2.5"></circle></svg>',
        'flask'     => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3h6"></path><path d="M10 3v6l-5 9a2 2 0 0 0 1.7 3h10.6a2 2 0 0 0 1.7-3l-5-9V3"></path><path d="M8 15h8"></path></svg>',
        'sparkle'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3Z"></path><path d="M19 16l.8 2.2L22 19l-2.2.8L19 22l-.8-2.2L16 19l2.2-.8L19 16Z"></path></svg>',
        'check'     => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg>',
        'package'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z"></path><path d="M4 7.5 12 12l8-4.5"></path><path d="M12 12v9"></path></svg>',
        'truck'     => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h11v10H3z"></path><path d="M14 9h4l3 3v4h-7z"></path><circle cx="7" cy="18" r="1.7"></circle><circle cx="17.5" cy="18" r="1.7"></circle></svg>',
        'store'     => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 10h16l-1-5H5l-1 5Z"></path><path d="M6 10v10h12V10"></path><path d="M9 20v-6h6v6"></path></svg>',
        'pin'       => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-6 7-12a7 7 0 0 0-14 0c0 6 7 12 7 12Z"></path><circle cx="12" cy="9" r="2.4"></circle></svg>',
        'question'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9.5 9a2.7 2.7 0 1 1 4.5 2c-1.2.8-2 1.5-2 3"></path><path d="M12 18h.01"></path><circle cx="12" cy="12" r="9"></circle></svg>',
        'star'      => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 2.7 5.5 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.8 1-6.1-4.4-4.3 6.1-.9L12 3Z"></path></svg>',
    );

    return isset( $icons[ $name ] ) ? $icons[ $name ] : $icons['sparkle'];
};

$pages = array(
    'engagements' => array(
        'label'    => __( 'Maison engagée', 'theme-perso' ),
        'title'    => __( 'Nos engagements', 'theme-perso' ),
        'subtitle' => __( 'Une cosmétique naturelle, exigeante et responsable, pensée pour prendre soin de la peau sans compromis.', 'theme-perso' ),
        'image'    => $asset( 'about', 'reference-catalog-products.png' ),
    ),
    'ingredients' => array(
        'label'    => __( 'Bibliothèque botanique', 'theme-perso' ),
        'title'    => __( 'Nos ingrédients', 'theme-perso' ),
        'subtitle' => __( 'Des actifs naturels sélectionnés avec précision pour leurs bénéfices, leur sensorialité et leur traçabilité.', 'theme-perso' ),
        'image'    => $asset( 'products', 'category-soins-visage-hero.png' ),
    ),
    'qualite' => array(
        'label'    => __( 'Fabrication & qualité', 'theme-perso' ),
        'title'    => __( 'Une exigence à chaque étape', 'theme-perso' ),
        'subtitle' => __( 'De la matière première au conditionnement, chaque soin suit un processus rigoureux et transparent.', 'theme-perso' ),
        'image'    => $asset( 'about', 'about-eco-commitment.png' ),
    ),
    'boutiques' => array(
        'label'    => __( 'Réseau Cosm’Éthique', 'theme-perso' ),
        'title'    => __( 'Nos boutiques', 'theme-perso' ),
        'subtitle' => __( 'Découvrez les premières implantations Cosm’Éthique et les villes bientôt disponibles.', 'theme-perso' ),
        'image'    => $asset( 'products', 'hero-accessoires-cosmethique.png' ),
    ),
    'faq' => array(
        'label'    => __( 'Besoin d’aide ?', 'theme-perso' ),
        'title'    => __( 'Questions fréquentes', 'theme-perso' ),
        'subtitle' => __( 'Toutes les réponses essentielles pour commander, choisir vos soins et profiter sereinement de votre expérience Cosm’Éthique.', 'theme-perso' ),
        'image'    => $asset( 'about', 'about-story-lifestyle.png' ),
    ),
    'avis-clients' => array(
        'label'    => __( 'Communauté Cosm’Éthique', 'theme-perso' ),
        'title'    => __( 'Avis clients', 'theme-perso' ),
        'subtitle' => __( 'Des routines naturelles adoptées par une communauté exigeante, sensible à la qualité et à la beauté responsable.', 'theme-perso' ),
        'image'    => $asset( 'products', 'photo-pack-routine-visage-lifestyle-reel.png' ),
    ),
);

if ( ! isset( $pages[ $slug ] ) ) {
    return;
}

$page = $pages[ $slug ];
?>

<div class="institutional-page institutional-page--<?php echo esc_attr( $slug ); ?>">
    <section class="institutional-hero">
        <div class="container institutional-hero-grid">
            <div class="institutional-hero-copy motion-reveal motion-reveal--left">
                <p class="eyebrow"><?php echo esc_html( $page['label'] ); ?></p>
                <h1><?php echo esc_html( $page['title'] ); ?></h1>
                <p><?php echo esc_html( $page['subtitle'] ); ?></p>
            </div>
            <figure class="institutional-hero-media motion-reveal motion-reveal--right">
                <img src="<?php echo esc_url( $page['image'] ); ?>" alt="<?php echo esc_attr( $page['title'] ); ?>" loading="eager">
            </figure>
        </div>
    </section>

    <?php if ( 'engagements' === $slug ) : ?>
        <?php
        $commitments = array(
            array( 'icon' => 'leaf', 'title' => __( 'Beauté naturelle', 'theme-perso' ), 'text' => __( 'Des formules inspirées par les actifs végétaux et la sensorialité des rituels de soin.', 'theme-perso' ) ),
            array( 'icon' => 'flask', 'title' => __( 'Ingrédients responsables', 'theme-perso' ), 'text' => __( 'Des actifs choisis pour leur utilité, leur origine et leur cohérence avec nos formules.', 'theme-perso' ) ),
            array( 'icon' => 'heart', 'title' => __( 'Cruelty Free', 'theme-perso' ), 'text' => __( 'Aucun test sur les animaux, dans une démarche responsable et transparente.', 'theme-perso' ) ),
            array( 'icon' => 'factory', 'title' => __( 'Fabrication française', 'theme-perso' ), 'text' => __( 'Une production maîtrisée avec des exigences qualité précises à chaque étape.', 'theme-perso' ) ),
            array( 'icon' => 'recycle', 'title' => __( 'Emballages recyclables', 'theme-perso' ), 'text' => __( 'Des contenants conçus pour durer, se recycler ou limiter le superflu.', 'theme-perso' ) ),
            array( 'icon' => 'clarity', 'title' => __( 'Transparence', 'theme-perso' ), 'text' => __( 'Des informations claires sur les actifs, les bénéfices et l’usage de chaque soin.', 'theme-perso' ) ),
            array( 'icon' => 'sparkle', 'title' => __( 'Qualité premium', 'theme-perso' ), 'text' => __( 'Une expérience haut de gamme, du packaging à l’application sur la peau.', 'theme-perso' ) ),
            array( 'icon' => 'leaf', 'title' => __( 'Respect de la planète', 'theme-perso' ), 'text' => __( 'Des choix sobres et durables pour accompagner une beauté plus consciente.', 'theme-perso' ) ),
        );
        $commitment_timeline = array(
            array( 'icon' => 'leaf', 'title' => __( 'Sélectionner', 'theme-perso' ), 'text' => __( 'Nous choisissons des actifs naturels lisibles, sensoriels et utiles.', 'theme-perso' ) ),
            array( 'icon' => 'flask', 'title' => __( 'Formuler', 'theme-perso' ), 'text' => __( 'Chaque texture est pensée pour associer efficacité, plaisir et douceur.', 'theme-perso' ) ),
            array( 'icon' => 'factory', 'title' => __( 'Fabriquer', 'theme-perso' ), 'text' => __( 'Les soins suivent un processus responsable et contrôlé.', 'theme-perso' ) ),
            array( 'icon' => 'package', 'title' => __( 'Conditionner', 'theme-perso' ), 'text' => __( 'Nous privilégions des packagings élégants, recyclables et cohérents.', 'theme-perso' ) ),
        );
        $commitment_stats = array(
            array( 'value' => '98', 'suffix' => '%', 'label' => __( 'd’ingrédients naturels', 'theme-perso' ) ),
            array( 'value' => '0', 'suffix' => '', 'label' => __( 'test animal', 'theme-perso' ) ),
            array( 'value' => '100', 'suffix' => '%', 'label' => __( 'emballages recyclables', 'theme-perso' ) ),
            array( 'value' => '4800', 'suffix' => '+', 'label' => __( 'clients satisfaits', 'theme-perso' ) ),
        );
        ?>
        <section class="institutional-section">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Nos piliers', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Une maison de soin exigeante et consciente.', 'theme-perso' ); ?></h2>
                </div>
                <div class="institutional-card-grid institutional-card-grid--four">
                    <?php foreach ( $commitments as $item ) : ?>
                        <article class="institutional-value-card motion-reveal motion-reveal--scale">
                            <span class="institutional-icon"><?php echo $icon( $item['icon'] ); ?></span>
                            <h3><?php echo esc_html( $item['title'] ); ?></h3>
                            <p><?php echo esc_html( $item['text'] ); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="institutional-section institutional-section--soft">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Traçabilité', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Nos engagements se construisent étape par étape.', 'theme-perso' ); ?></h2>
                </div>
                <div class="commitment-timeline">
                    <?php foreach ( $commitment_timeline as $step ) : ?>
                        <article class="commitment-timeline-card motion-reveal">
                            <span class="institutional-icon"><?php echo $icon( $step['icon'] ); ?></span>
                            <h3><?php echo esc_html( $step['title'] ); ?></h3>
                            <p><?php echo esc_html( $step['text'] ); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
                <div class="institutional-stats-grid" data-counter-scope>
                    <?php foreach ( $commitment_stats as $stat ) : ?>
                        <article class="institutional-stat-card motion-reveal motion-reveal--scale">
                            <strong><span data-counter-target="<?php echo esc_attr( $stat['value'] ); ?>">0</span><?php echo esc_html( $stat['suffix'] ); ?></strong>
                            <p><?php echo esc_html( $stat['label'] ); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="institutional-split">
            <div class="container institutional-split-grid">
                <figure class="motion-reveal motion-reveal--left"><img src="<?php echo esc_url( $asset( 'about', 'about-eco-commitment.png' ) ); ?>" alt="<?php esc_attr_e( 'Engagement écologique Cosm’Éthique', 'theme-perso' ); ?>" loading="lazy"></figure>
                <div class="institutional-split-copy motion-reveal motion-reveal--right">
                    <p class="eyebrow"><?php esc_html_e( 'Notre promesse', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Faire mieux, avec moins de compromis.', 'theme-perso' ); ?></h2>
                    <p><?php esc_html_e( 'Cosm’Éthique associe plaisir d’utilisation, exigence de formulation et responsabilité. Chaque décision vise à créer une beauté plus lisible, plus douce et plus durable.', 'theme-perso' ); ?></p>
                    <ul class="institutional-check-list">
                        <li><?php echo $icon( 'check' ); ?><?php esc_html_e( 'Actifs d’origine naturelle sélectionnés avec soin', 'theme-perso' ); ?></li>
                        <li><?php echo $icon( 'check' ); ?><?php esc_html_e( 'Formules sûres, efficaces et sensorielles', 'theme-perso' ); ?></li>
                        <li><?php echo $icon( 'check' ); ?><?php esc_html_e( 'Expérience premium sans surconsommation inutile', 'theme-perso' ); ?></li>
                    </ul>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( 'ingredients' === $slug ) : ?>
        <?php
        $ingredients = array(
            array( 'slug' => 'rose', 'name' => __( 'Rose', 'theme-perso' ), 'image' => $asset( 'products', 'ingredient-rose.svg' ), 'group' => 'visage', 'benefits' => __( 'Hydrate, illumine et apporte de l’éclat.', 'theme-perso' ), 'skin' => __( 'Peaux ternes et déshydratées', 'theme-perso' ), 'origin' => __( 'France / Europe', 'theme-perso' ), 'products' => __( 'Sérum Éclat à la Rose, Routine Visage', 'theme-perso' ), 'detail' => __( 'La rose est utilisée pour sa douceur sensorielle et son effet éclat. Elle accompagne les routines visage qui cherchent à hydrater, lisser et réveiller la luminosité naturelle.', 'theme-perso' ) ),
            array( 'slug' => 'karite', 'name' => __( 'Karité', 'theme-perso' ), 'image' => $asset( 'products', 'baume-corps.svg' ), 'group' => 'corps cheveux', 'benefits' => __( 'Nourrit intensément et restaure le confort.', 'theme-perso' ), 'skin' => __( 'Peaux sèches, cheveux secs', 'theme-perso' ), 'origin' => __( 'Afrique de l’Ouest', 'theme-perso' ), 'products' => __( 'Baume Corps Karité & Amande, Après-Shampooing Aloe Vera & Karité', 'theme-perso' ), 'detail' => __( 'Le karité apporte une nutrition généreuse et un fini protecteur. Il est idéal pour les zones sèches, les longueurs fragilisées et les textures riches.', 'theme-perso' ) ),
            array( 'slug' => 'camomille', 'name' => __( 'Camomille', 'theme-perso' ), 'image' => $asset( 'products', 'photo-creme-hydratante-sauge-camomille.png' ), 'group' => 'visage', 'benefits' => __( 'Apaise et aide à réduire les sensations d’inconfort.', 'theme-perso' ), 'skin' => __( 'Peaux sensibles', 'theme-perso' ), 'origin' => __( 'Europe', 'theme-perso' ), 'products' => __( 'Crème Hydratante Sauge & Camomille', 'theme-perso' ), 'detail' => __( 'La camomille est choisie pour son profil doux et réconfortant. Elle accompagne les peaux sensibles qui recherchent une routine simple et apaisante.', 'theme-perso' ) ),
            array( 'slug' => 'sauge', 'name' => __( 'Sauge', 'theme-perso' ), 'image' => $asset( 'products', 'photo-shampooing-doux-sauge-ortie.png' ), 'group' => 'visage cheveux', 'benefits' => __( 'Équilibre, purifie et accompagne les routines légères.', 'theme-perso' ), 'skin' => __( 'Peaux mixtes, cuir chevelu', 'theme-perso' ), 'origin' => __( 'France', 'theme-perso' ), 'products' => __( 'Crème Hydratante Sauge & Camomille, Shampooing Doux Sauge & Ortie', 'theme-perso' ), 'detail' => __( 'La sauge apporte une sensation de fraîcheur et d’équilibre. Elle est particulièrement intéressante dans les soins visage légers et les routines capillaires douces.', 'theme-perso' ) ),
            array( 'slug' => 'lavande', 'name' => __( 'Lavande', 'theme-perso' ), 'image' => $asset( 'products', 'lavender-ingredient.svg' ), 'group' => 'corps cheveux', 'benefits' => __( 'Signature relaxante et sensation de bien-être.', 'theme-perso' ), 'skin' => __( 'Tous types de peau', 'theme-perso' ), 'origin' => __( 'Provence', 'theme-perso' ), 'products' => __( 'Huile Essentielle Lavande Fine, Gommage Corps Sucre & Lavande', 'theme-perso' ), 'detail' => __( 'La lavande signe des rituels relaxants et raffinés. Elle évoque la Provence, le soin du soir et les textures enveloppantes.', 'theme-perso' ) ),
            array( 'slug' => 'calendula', 'name' => __( 'Calendula', 'theme-perso' ), 'image' => $asset( 'products', 'botanical-oil.svg' ), 'group' => 'visage corps', 'benefits' => __( 'Adoucit et accompagne les peaux fragilisées.', 'theme-perso' ), 'skin' => __( 'Peaux sensibles', 'theme-perso' ), 'origin' => __( 'Europe', 'theme-perso' ), 'products' => __( 'Huile de Soin Nourrissante, Lait Corps Hydratant', 'theme-perso' ), 'detail' => __( 'Le calendula est associé aux routines de confort. Il soutient les soins pensés pour adoucir, protéger et améliorer la sensation de souplesse.', 'theme-perso' ) ),
            array( 'slug' => 'jojoba', 'name' => __( 'Huile de jojoba', 'theme-perso' ), 'image' => $asset( 'products', 'photo-huile-soin-nourrissante.png' ), 'group' => 'visage cheveux', 'benefits' => __( 'Aide à équilibrer et à nourrir sans fini lourd.', 'theme-perso' ), 'skin' => __( 'Peaux mixtes, cheveux ternes', 'theme-perso' ), 'origin' => __( 'Amérique du Sud', 'theme-perso' ), 'products' => __( 'Huile de Soin Nourrissante, Sérum Pointes Nourrissant', 'theme-perso' ), 'detail' => __( 'L’huile de jojoba est appréciée pour son toucher fin et équilibrant. Elle nourrit sans alourdir et trouve sa place dans les soins visage comme capillaires.', 'theme-perso' ) ),
            array( 'slug' => 'amande', 'name' => __( 'Huile d’amande douce', 'theme-perso' ), 'image' => $asset( 'products', 'photo-baume-corps-karite-amande.png' ), 'group' => 'corps', 'benefits' => __( 'Assouplit, nourrit et laisse la peau plus douce.', 'theme-perso' ), 'skin' => __( 'Peaux sèches', 'theme-perso' ), 'origin' => __( 'Bassin méditerranéen', 'theme-perso' ), 'products' => __( 'Baume Corps Karité & Amande, Huile de Massage', 'theme-perso' ), 'detail' => __( 'L’amande douce apporte une sensorialité ronde et confortable. Elle est idéale pour les soins corps nourrissants et les massages délicats.', 'theme-perso' ) ),
            array( 'slug' => 'argile', 'name' => __( 'Argile verte', 'theme-perso' ), 'image' => $asset( 'products', 'photo-masque-purifiant-argile-verte.png' ), 'group' => 'visage', 'benefits' => __( 'Purifie les pores et affine visuellement le grain de peau.', 'theme-perso' ), 'skin' => __( 'Peaux mixtes à grasses', 'theme-perso' ), 'origin' => __( 'France', 'theme-perso' ), 'products' => __( 'Masque Purifiant Argile Verte', 'theme-perso' ), 'detail' => __( 'L’argile verte est un incontournable des routines purifiantes. Elle aide à absorber l’excès de sébum et à retrouver une peau nette.', 'theme-perso' ) ),
            array( 'slug' => 'vitamine-e', 'name' => __( 'Vitamine E', 'theme-perso' ), 'image' => $asset( 'products', 'texture-creme.svg' ), 'group' => 'visage corps cheveux', 'benefits' => __( 'Protège les formules et accompagne l’éclat de la peau.', 'theme-perso' ), 'skin' => __( 'Tous types de peau', 'theme-perso' ), 'origin' => __( 'Origine végétale', 'theme-perso' ), 'products' => __( 'Huile Sèche Botanique, Sérum Éclat à la Rose', 'theme-perso' ), 'detail' => __( 'La vitamine E est intégrée pour soutenir la stabilité des formules et enrichir les rituels qui recherchent douceur, confort et éclat.', 'theme-perso' ) ),
            array( 'slug' => 'cacao', 'name' => __( 'Beurre de cacao', 'theme-perso' ), 'image' => $asset( 'products', 'photo-beurre-corporel-coco-vanille.png' ), 'group' => 'corps', 'benefits' => __( 'Apporte confort, nutrition et texture fondante.', 'theme-perso' ), 'skin' => __( 'Peaux sèches à très sèches', 'theme-perso' ), 'origin' => __( 'Afrique / Amérique latine', 'theme-perso' ), 'products' => __( 'Beurre Corporel Coco & Vanille', 'theme-perso' ), 'detail' => __( 'Le beurre de cacao donne du corps aux textures riches. Il apporte une sensation enveloppante et une nutrition durable.', 'theme-perso' ) ),
        );
        $featured_actives = array(
            array( 'icon' => 'sparkle', 'title' => __( 'Éclat', 'theme-perso' ), 'text' => __( 'Rose, vitamine E et huiles fines pour réveiller la luminosité naturelle.', 'theme-perso' ) ),
            array( 'icon' => 'heart', 'title' => __( 'Confort', 'theme-perso' ), 'text' => __( 'Karité, camomille et calendula pour accompagner les peaux en recherche de douceur.', 'theme-perso' ) ),
            array( 'icon' => 'leaf', 'title' => __( 'Équilibre', 'theme-perso' ), 'text' => __( 'Sauge, argile verte et jojoba pour des routines plus légères et ciblées.', 'theme-perso' ) ),
        );
        ?>
        <section class="institutional-section">
            <div class="container">
                <div class="institutional-toolbar motion-reveal">
                    <div>
                        <p class="eyebrow"><?php esc_html_e( 'Bibliothèque active', 'theme-perso' ); ?></p>
                        <h2><?php esc_html_e( 'Explorer par univers de soin.', 'theme-perso' ); ?></h2>
                    </div>
                    <div class="institutional-filter" data-filter-group="ingredients">
                        <?php foreach ( array( 'all' => __( 'Tous', 'theme-perso' ), 'visage' => __( 'Visage', 'theme-perso' ), 'corps' => __( 'Corps', 'theme-perso' ), 'cheveux' => __( 'Cheveux', 'theme-perso' ) ) as $filter => $label ) : ?>
                            <button type="button" class="<?php echo 'all' === $filter ? 'is-active' : ''; ?>" data-filter-button="<?php echo esc_attr( $filter ); ?>"><?php echo esc_html( $label ); ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="ingredient-library-grid">
                    <?php foreach ( $ingredients as $item ) : ?>
                        <article class="ingredient-library-card motion-reveal motion-reveal--scale" data-filter-card="ingredients" data-filter-values="<?php echo esc_attr( $item['group'] ); ?>">
                            <figure><img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" loading="lazy"></figure>
                            <div>
                                <h3><?php echo esc_html( $item['name'] ); ?></h3>
                                <p><?php echo esc_html( $item['benefits'] ); ?></p>
                                <dl>
                                    <dt><?php esc_html_e( 'Type de peau', 'theme-perso' ); ?></dt><dd><?php echo esc_html( $item['skin'] ); ?></dd>
                                    <dt><?php esc_html_e( 'Origine', 'theme-perso' ); ?></dt><dd><?php echo esc_html( $item['origin'] ); ?></dd>
                                    <dt><?php esc_html_e( 'Produits associés', 'theme-perso' ); ?></dt><dd><?php echo esc_html( $item['products'] ); ?></dd>
                                </dl>
                                <button type="button" class="ingredient-detail-button" data-ingredient-open="<?php echo esc_attr( $item['slug'] ); ?>"><?php esc_html_e( 'Découvrir', 'theme-perso' ); ?></button>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="institutional-section institutional-section--soft">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Notre sélection d’actifs', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Des actifs choisis pour construire des routines lisibles.', 'theme-perso' ); ?></h2>
                </div>
                <div class="ingredient-feature-grid">
                    <?php foreach ( $featured_actives as $active ) : ?>
                        <article class="ingredient-feature-card motion-reveal motion-reveal--scale">
                            <span class="institutional-icon"><?php echo $icon( $active['icon'] ); ?></span>
                            <h3><?php echo esc_html( $active['title'] ); ?></h3>
                            <p><?php echo esc_html( $active['text'] ); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <div class="ingredient-detail-panel" data-ingredient-panel hidden>
            <button type="button" class="ingredient-panel-backdrop" data-ingredient-close aria-label="<?php esc_attr_e( 'Fermer', 'theme-perso' ); ?>"></button>
            <div class="ingredient-panel-dialog" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Fiche ingrédient', 'theme-perso' ); ?>">
                <button type="button" class="ingredient-panel-close" data-ingredient-close><?php esc_html_e( 'Fermer', 'theme-perso' ); ?></button>
                <?php foreach ( $ingredients as $item ) : ?>
                    <article class="ingredient-detail-card" data-ingredient-detail="<?php echo esc_attr( $item['slug'] ); ?>" hidden>
                        <figure><img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" loading="lazy"></figure>
                        <div>
                            <p class="eyebrow"><?php esc_html_e( 'Fiche ingrédient', 'theme-perso' ); ?></p>
                            <h2><?php echo esc_html( $item['name'] ); ?></h2>
                            <p><?php echo esc_html( $item['detail'] ); ?></p>
                            <ul class="institutional-check-list">
                                <li><?php echo $icon( 'check' ); ?><?php echo esc_html( $item['benefits'] ); ?></li>
                                <li><?php echo $icon( 'check' ); ?><?php echo esc_html( $item['skin'] ); ?></li>
                                <li><?php echo $icon( 'check' ); ?><?php echo esc_html( $item['products'] ); ?></li>
                            </ul>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ( 'qualite' === $slug ) : ?>
        <?php
        $steps = array(
            array( 'icon' => 'leaf', 'title' => __( 'Sélection des matières premières', 'theme-perso' ), 'text' => __( 'Nous privilégions des actifs cohérents avec chaque besoin de peau.', 'theme-perso' ) ),
            array( 'icon' => 'clarity', 'title' => __( 'Contrôle qualité', 'theme-perso' ), 'text' => __( 'Chaque lot est suivi pour garantir constance et traçabilité.', 'theme-perso' ) ),
            array( 'icon' => 'flask', 'title' => __( 'Formulation', 'theme-perso' ), 'text' => __( 'Les textures sont travaillées pour conjuguer sensorialité et efficacité.', 'theme-perso' ) ),
            array( 'icon' => 'factory', 'title' => __( 'Fabrication', 'theme-perso' ), 'text' => __( 'La production respecte un cahier des charges précis et responsable.', 'theme-perso' ) ),
            array( 'icon' => 'package', 'title' => __( 'Conditionnement', 'theme-perso' ), 'text' => __( 'Les packagings protègent les soins et valorisent l’expérience.', 'theme-perso' ) ),
            array( 'icon' => 'truck', 'title' => __( 'Expédition', 'theme-perso' ), 'text' => __( 'Les commandes sont préparées avec soin pour préserver les produits.', 'theme-perso' ) ),
        );
        $quality_gallery = array(
            array( 'title' => __( 'Le laboratoire', 'theme-perso' ), 'text' => __( 'Un univers propre, précis et organisé pour développer des soins cohérents.', 'theme-perso' ), 'image' => $asset( 'about', 'about-eco-commitment.png' ) ),
            array( 'title' => __( 'Les matières premières', 'theme-perso' ), 'text' => __( 'Des actifs naturels sélectionnés pour leur intérêt et leur traçabilité.', 'theme-perso' ), 'image' => $asset( 'about', 'reference-catalog-products.png' ) ),
            array( 'title' => __( 'Les tests qualité', 'theme-perso' ), 'text' => __( 'Des contrôles réguliers pour conserver stabilité, texture et sécurité.', 'theme-perso' ), 'image' => $asset( 'products', 'category-soins-visage-hero.png' ) ),
            array( 'title' => __( 'Le packaging', 'theme-perso' ), 'text' => __( 'Des contenants élégants, protecteurs et alignés avec l’identité de la marque.', 'theme-perso' ), 'image' => $asset( 'products', 'photo-pack-routine-premium-reel.png' ) ),
        );
        $quality_reasons = array(
            array( 'icon' => 'sparkle', 'title' => __( 'Sensorialité', 'theme-perso' ), 'text' => __( 'Des textures agréables qui transforment le soin en rituel.', 'theme-perso' ) ),
            array( 'icon' => 'clarity', 'title' => __( 'Lisibilité', 'theme-perso' ), 'text' => __( 'Des bénéfices clairs, des usages simples et une communication transparente.', 'theme-perso' ) ),
            array( 'icon' => 'check', 'title' => __( 'Rigueur', 'theme-perso' ), 'text' => __( 'Un niveau d’exigence constant du choix des actifs à la livraison.', 'theme-perso' ) ),
        );
        ?>
        <section class="institutional-section quality-motion-section">
            <div class="container quality-motion-card motion-reveal">
                <div>
                    <p class="eyebrow"><?php esc_html_e( 'Atelier qualité', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Une fabrication pensée comme un rituel de précision.', 'theme-perso' ); ?></h2>
                    <p><?php esc_html_e( 'Chaque formule avance par étapes : choisir, tester, ajuster, contrôler puis conditionner avec soin. Cette méthode garantit une expérience fiable et premium.', 'theme-perso' ); ?></p>
                </div>
                <div class="quality-orbit" aria-hidden="true">
                    <img src="<?php echo esc_url( $asset( 'about', 'reference-catalog-products.png' ) ); ?>" alt="">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </section>
        <section class="institutional-section">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Processus', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'De l’actif au rituel final.', 'theme-perso' ); ?></h2>
                </div>
                <div class="quality-timeline">
                    <?php foreach ( $steps as $index => $step ) : ?>
                        <article class="quality-step motion-reveal">
                            <span class="quality-step-number"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
                            <span class="institutional-icon"><?php echo $icon( $step['icon'] ); ?></span>
                            <h3><?php echo esc_html( $step['title'] ); ?></h3>
                            <p><?php echo esc_html( $step['text'] ); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="institutional-section institutional-section--soft">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Nos certifications', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Des garanties visibles et rassurantes.', 'theme-perso' ); ?></h2>
                </div>
                <div class="certification-grid">
                    <?php foreach ( array( __( 'Origine naturelle', 'theme-perso' ), __( 'Cruelty Free', 'theme-perso' ), __( 'Vegan friendly', 'theme-perso' ), __( 'Emballages recyclables', 'theme-perso' ), __( 'Contrôle qualité', 'theme-perso' ), __( 'Fabrication responsable', 'theme-perso' ) ) as $badge ) : ?>
                        <span class="certification-badge motion-reveal motion-reveal--scale"><?php echo $icon( 'check' ); ?><?php echo esc_html( $badge ); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="institutional-section">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Dans les coulisses', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Une qualité visible jusque dans les détails.', 'theme-perso' ); ?></h2>
                </div>
                <div class="quality-gallery-grid">
                    <?php foreach ( $quality_gallery as $item ) : ?>
                        <article class="quality-gallery-card motion-reveal motion-reveal--scale">
                            <figure><img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" loading="lazy"></figure>
                            <div>
                                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                <p><?php echo esc_html( $item['text'] ); ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="institutional-section institutional-section--soft">
            <div class="container">
                <div class="institutional-section-heading motion-reveal">
                    <p class="eyebrow"><?php esc_html_e( 'Pourquoi choisir Cosm’Éthique', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Une exigence premium, simple à comprendre.', 'theme-perso' ); ?></h2>
                </div>
                <div class="quality-choice-grid">
                    <?php foreach ( $quality_reasons as $item ) : ?>
                        <article class="quality-choice-card motion-reveal motion-reveal--scale">
                            <span class="institutional-icon"><?php echo $icon( $item['icon'] ); ?></span>
                            <h3><?php echo esc_html( $item['title'] ); ?></h3>
                            <p><?php echo esc_html( $item['text'] ); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( 'boutiques' === $slug ) : ?>
        <?php
        $stores = array(
            array( 'city' => 'Paris', 'status' => __( 'Ouverte', 'theme-perso' ), 'address' => '18 rue Saint-Honoré, 75001 Paris', 'hours' => 'Lun-Sam 10h-19h', 'image' => $asset( 'about', 'reference-catalog-products.png' ), 'left' => '54%', 'top' => '33%' ),
            array( 'city' => 'Lyon', 'status' => __( 'Bientôt', 'theme-perso' ), 'address' => '6 rue Édouard Herriot, 69002 Lyon', 'hours' => 'Ouverture prochaine', 'image' => $asset( 'products', 'category-soins-corps-hero.png' ), 'left' => '59%', 'top' => '57%' ),
            array( 'city' => 'Marseille', 'status' => __( 'Bientôt', 'theme-perso' ), 'address' => '22 rue Paradis, 13001 Marseille', 'hours' => 'Ouverture prochaine', 'image' => $asset( 'products', 'photo-huile-seche-botanique.png' ), 'left' => '62%', 'top' => '78%' ),
            array( 'city' => 'Bordeaux', 'status' => __( 'Bientôt', 'theme-perso' ), 'address' => '9 cours de l’Intendance, 33000 Bordeaux', 'hours' => 'Ouverture prochaine', 'image' => $asset( 'products', 'photo-baume-corps-karite-amande.png' ), 'left' => '39%', 'top' => '64%' ),
            array( 'city' => 'Toulouse', 'status' => __( 'Bientôt', 'theme-perso' ), 'address' => '14 rue d’Alsace-Lorraine, 31000 Toulouse', 'hours' => 'Ouverture prochaine', 'image' => $asset( 'products', 'category-packs-hero-reel.png' ), 'left' => '48%', 'top' => '76%' ),
        );
        ?>
        <section class="institutional-section">
            <div class="container boutiques-layout">
                <div class="boutique-map-panel motion-reveal motion-reveal--left" aria-label="<?php esc_attr_e( 'Carte des boutiques Cosm’Éthique', 'theme-perso' ); ?>">
                    <div class="boutique-map-visual">
                        <?php foreach ( $stores as $store ) : ?>
                            <button type="button" class="boutique-map-pin" style="--pin-left: <?php echo esc_attr( $store['left'] ); ?>; --pin-top: <?php echo esc_attr( $store['top'] ); ?>;" data-store-pin="<?php echo esc_attr( strtolower( remove_accents( $store['city'] ) ) ); ?>">
                                <span>CÉ</span>
                                <strong><?php echo esc_html( $store['city'] ); ?></strong>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="boutiques-copy motion-reveal motion-reveal--right">
                    <p class="eyebrow"><?php esc_html_e( 'Trouver une boutique', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Une présence qui grandit en France.', 'theme-perso' ); ?></h2>
                    <label class="boutique-search">
                        <span><?php esc_html_e( 'Trouver la boutique la plus proche', 'theme-perso' ); ?></span>
                        <input type="search" placeholder="<?php esc_attr_e( 'Rechercher une ville...', 'theme-perso' ); ?>" data-store-search>
                    </label>
                </div>
            </div>
            <div class="container boutique-card-grid">
                <?php foreach ( $stores as $store ) : ?>
                    <article class="boutique-card motion-reveal motion-reveal--scale" data-store-card data-store-city="<?php echo esc_attr( strtolower( remove_accents( $store['city'] ) ) ); ?>">
                        <img src="<?php echo esc_url( $store['image'] ); ?>" alt="<?php echo esc_attr( $store['city'] ); ?>" loading="lazy">
                        <div>
                            <span><?php echo esc_html( $store['status'] ); ?></span>
                            <h3><?php echo esc_html( $store['city'] ); ?></h3>
                            <p><?php echo esc_html( $store['address'] ); ?></p>
                            <p><?php echo esc_html( $store['hours'] ); ?></p>
                            <a class="button button-primary" href="<?php echo esc_url( home_url( '/devenir-franchise/' ) ); ?>"><?php esc_html_e( 'Voir la boutique', 'theme-perso' ); ?></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( 'faq' === $slug ) : ?>
        <?php
        $faqs = array(
            __( 'Livraison', 'theme-perso' ) => array( __( 'Quand ma commande est-elle expédiée ?', 'theme-perso' ) => __( 'Les commandes sont préparées sous 24 à 48h ouvrées, puis confiées au transporteur.', 'theme-perso' ), __( 'La livraison est-elle offerte ?', 'theme-perso' ) => __( 'La livraison est offerte dès 40 € d’achat en France métropolitaine.', 'theme-perso' ) ),
            __( 'Commande', 'theme-perso' ) => array( __( 'Puis-je modifier une commande ?', 'theme-perso' ) => __( 'Contactez-nous rapidement après validation afin que nous puissions vérifier les possibilités.', 'theme-perso' ), __( 'Comment suivre ma commande ?', 'theme-perso' ) => __( 'Le suivi est disponible depuis votre espace client lorsque la commande est expédiée.', 'theme-perso' ) ),
            __( 'Paiement', 'theme-perso' ) => array( __( 'Le paiement est-il sécurisé ?', 'theme-perso' ) => __( 'Oui, les paiements sont protégés par chiffrement SSL et des solutions de paiement reconnues.', 'theme-perso' ), __( 'Puis-je payer en plusieurs fois ?', 'theme-perso' ) => __( 'Des options de paiement fractionné peuvent être proposées selon le montant et l’éligibilité.', 'theme-perso' ) ),
            __( 'Compte', 'theme-perso' ) => array( __( 'Dois-je créer un compte ?', 'theme-perso' ) => __( 'Le compte permet de retrouver vos commandes, recommandations et informations plus facilement.', 'theme-perso' ), __( 'Mes données sont-elles protégées ?', 'theme-perso' ) => __( 'Nous traitons vos données avec attention et uniquement pour les finalités nécessaires.', 'theme-perso' ) ),
            __( 'Diagnostic', 'theme-perso' ) => array( __( 'Le diagnostic est-il gratuit ?', 'theme-perso' ) => __( 'Oui, il permet d’obtenir une routine indicative en moins d’une minute.', 'theme-perso' ), __( 'Puis-je recommencer le diagnostic ?', 'theme-perso' ) => __( 'Oui, vous pouvez le relancer à tout moment pour adapter votre routine.', 'theme-perso' ) ),
            __( 'Produits', 'theme-perso' ) => array( __( 'Les soins conviennent-ils aux peaux sensibles ?', 'theme-perso' ) => __( 'Chaque fiche produit précise les types de peau recommandés et les conseils d’utilisation.', 'theme-perso' ), __( 'Les produits sont-ils testés sur les animaux ?', 'theme-perso' ) => __( 'Non, Cosm’Éthique s’inscrit dans une démarche cruelty free.', 'theme-perso' ) ),
            __( 'Retours', 'theme-perso' ) => array( __( 'Puis-je retourner un produit ?', 'theme-perso' ) => __( 'Les conditions de retour sont détaillées dans les CGV du site.', 'theme-perso' ), __( 'Quel est le délai de retour ?', 'theme-perso' ) => __( 'Le délai indiqué est de 30 jours selon les conditions applicables.', 'theme-perso' ) ),
            __( 'Franchise', 'theme-perso' ) => array( __( 'Comment devenir franchisé ?', 'theme-perso' ) => __( 'La page Devenir franchisé présente le concept et le formulaire de demande.', 'theme-perso' ), __( 'Quels profils recherchez-vous ?', 'theme-perso' ) => __( 'Des profils sensibles à la beauté naturelle, au commerce premium et au conseil client.', 'theme-perso' ) ),
        );
        $popular_faqs = array(
            array( 'title' => __( 'Livraison offerte', 'theme-perso' ), 'text' => __( 'La livraison est offerte dès 40 € d’achat en France métropolitaine.', 'theme-perso' ) ),
            array( 'title' => __( 'Diagnostic beauté', 'theme-perso' ), 'text' => __( 'Le diagnostic vous aide à composer une routine adaptée en moins d’une minute.', 'theme-perso' ) ),
            array( 'title' => __( 'Paiement sécurisé', 'theme-perso' ), 'text' => __( 'Vos données sont protégées et chiffrées grâce au protocole SSL.', 'theme-perso' ) ),
        );
        ?>
        <section class="institutional-section">
            <div class="container faq-search-panel motion-reveal">
                <div>
                    <p class="eyebrow"><?php esc_html_e( 'Centre d’aide', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Rechercher une réponse.', 'theme-perso' ); ?></h2>
                </div>
                <label>
                    <span class="screen-reader-text"><?php esc_html_e( 'Rechercher une question', 'theme-perso' ); ?></span>
                    <input type="search" data-faq-search placeholder="<?php esc_attr_e( 'Rechercher une question...', 'theme-perso' ); ?>">
                </label>
            </div>
            <div class="container institutional-section-heading faq-popular-heading motion-reveal">
                <p class="eyebrow"><?php esc_html_e( 'Les questions les plus fréquentes', 'theme-perso' ); ?></p>
                <h2><?php esc_html_e( 'Les réponses à consulter en priorité.', 'theme-perso' ); ?></h2>
            </div>
            <div class="container faq-popular-grid">
                <?php foreach ( $popular_faqs as $item ) : ?>
                    <article class="faq-popular-card motion-reveal motion-reveal--scale">
                        <span class="institutional-icon"><?php echo $icon( 'star' ); ?></span>
                        <h3><?php echo esc_html( $item['title'] ); ?></h3>
                        <p><?php echo esc_html( $item['text'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="container faq-category-grid" data-faq-list>
                <?php foreach ( $faqs as $category => $items ) : ?>
                    <article class="faq-category-card motion-reveal" data-faq-category>
                        <span class="institutional-icon"><?php echo $icon( 'question' ); ?></span>
                        <h2><?php echo esc_html( $category ); ?></h2>
                        <div class="institutional-accordion">
                            <?php foreach ( $items as $question => $answer ) : ?>
                                <details data-faq-item>
                                    <summary><?php echo esc_html( $question ); ?></summary>
                                    <p><?php echo esc_html( $answer ); ?></p>
                                </details>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="institutional-section institutional-section--soft">
            <div class="container faq-contact-panel motion-reveal">
                <div>
                    <p class="eyebrow"><?php esc_html_e( 'Besoin d’un conseil', 'theme-perso' ); ?></p>
                    <h2><?php esc_html_e( 'Vous n’avez pas trouvé votre réponse ?', 'theme-perso' ); ?></h2>
                    <p><?php esc_html_e( 'Notre équipe vous accompagne pour choisir vos soins, suivre une commande ou préparer un projet de franchise.', 'theme-perso' ); ?></p>
                </div>
                <a class="button button-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contacter notre équipe', 'theme-perso' ); ?></a>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( 'avis-clients' === $slug ) : ?>
        <?php
        $reviews = array(
            array( 'name' => 'Sophie M.', 'city' => 'Paris', 'group' => 'visage', 'image' => $asset( 'blog', 'blog-peau-sensible.png' ), 'text' => 'Le sérum a rendu ma routine beaucoup plus lumineuse. La texture est fine, élégante et très agréable.' ),
            array( 'name' => 'Camille R.', 'city' => 'Lyon', 'group' => 'corps', 'image' => $asset( 'products', 'lifestyle-baume-corps.png' ), 'text' => 'Le baume corps est devenu mon indispensable. Il nourrit sans sensation lourde et le packaging est magnifique.' ),
            array( 'name' => 'Nadia B.', 'city' => 'Bordeaux', 'group' => 'cheveux', 'image' => $asset( 'products', 'lifestyle-masque-cheveux.png' ), 'text' => 'Mes cheveux sont plus doux après quelques utilisations. Le masque sent très bon et se rince facilement.' ),
            array( 'name' => 'Julie L.', 'city' => 'Nantes', 'group' => 'visage', 'image' => $asset( 'about', 'about-story-lifestyle.png' ), 'text' => 'La crème est douce, rassurante, et parfaite pour ma peau sensible. Très belle expérience.' ),
            array( 'name' => 'Inès D.', 'city' => 'Marseille', 'group' => 'corps', 'image' => $asset( 'products', 'lifestyle-huile-botanique.png' ), 'text' => 'L’huile sèche laisse un fini satiné sans coller. C’est exactement le rendu premium que je cherchais.' ),
            array( 'name' => 'Laura P.', 'city' => 'Toulouse', 'group' => 'cheveux', 'image' => $asset( 'products', 'lifestyle-shampooing-sauge.png' ), 'text' => 'Le shampooing est doux et laisse les cheveux légers. J’aime beaucoup l’univers de la marque.' ),
        );
        ?>
        <section class="institutional-section">
            <div class="container review-summary motion-reveal">
                <div>
                    <span class="review-stars">★★★★★</span>
                    <strong>4.9/5</strong>
                    <p><?php esc_html_e( 'Plus de 4 800 avis clients', 'theme-perso' ); ?></p>
                </div>
                <div class="institutional-filter" data-filter-group="reviews">
                    <?php foreach ( array( 'all' => __( 'Tous', 'theme-perso' ), 'visage' => __( 'Visage', 'theme-perso' ), 'corps' => __( 'Corps', 'theme-perso' ), 'cheveux' => __( 'Cheveux', 'theme-perso' ) ) as $filter => $label ) : ?>
                        <button type="button" class="<?php echo 'all' === $filter ? 'is-active' : ''; ?>" data-filter-button="<?php echo esc_attr( $filter ); ?>"><?php echo esc_html( $label ); ?></button>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="container review-card-grid">
                <?php foreach ( $reviews as $review ) : ?>
                    <article class="review-page-card motion-reveal motion-reveal--scale" data-filter-card="reviews" data-filter-values="<?php echo esc_attr( $review['group'] ); ?>">
                        <img src="<?php echo esc_url( $review['image'] ); ?>" alt="<?php echo esc_attr( $review['name'] ); ?>" loading="lazy">
                        <div>
                            <span class="review-stars">★★★★★</span>
                            <p>“<?php echo esc_html( $review['text'] ); ?>”</p>
                            <strong><?php echo esc_html( $review['name'] ); ?></strong>
                            <small><?php echo esc_html( $review['city'] ); ?></small>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="institutional-cta motion-reveal">
        <div class="container institutional-cta-inner">
            <p class="eyebrow"><?php esc_html_e( 'Cosm’Éthique', 'theme-perso' ); ?></p>
            <h2><?php esc_html_e( 'Découvrez des soins naturels pensés avec exigence.', 'theme-perso' ); ?></h2>
            <div class="button-group">
                <a class="button button-primary" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' ) ); ?>"><?php esc_html_e( 'Découvrir la boutique', 'theme-perso' ); ?></a>
                <a class="button button-secondary" href="<?php echo esc_url( home_url( '/diagnostic/' ) ); ?>"><?php esc_html_e( 'Faire mon diagnostic', 'theme-perso' ); ?></a>
            </div>
        </div>
    </section>
</div>
