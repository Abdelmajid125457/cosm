<?php
/**
 * Page Recrutement premium COSM'ETHIQUE.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$asset = function( $folder, $file ) {
    return get_template_directory_uri() . '/assets/' . trim( $folder, '/' ) . '/' . ltrim( $file, '/' );
};

$page_url = function( $slug, $fallback = '' ) {
    $page = get_page_by_path( $slug );

    if ( $page ) {
        return get_permalink( $page );
    }

    return $fallback ? home_url( '/' . trim( $fallback, '/' ) . '/' ) : home_url( '/' . trim( $slug, '/' ) . '/' );
};

$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : $page_url( 'boutique', 'boutique' );

$benefits = array(
    array( 'icon' => 'leaf', 'title' => __( 'Produits naturels', 'theme-perso' ), 'text' => __( 'Des soins formulés autour d’actifs sélectionnés avec exigence.', 'theme-perso' ) ),
    array( 'icon' => 'rocket', 'title' => __( 'Innovation', 'theme-perso' ), 'text' => __( 'Une maison qui imagine de nouvelles expériences beauté responsables.', 'theme-perso' ) ),
    array( 'icon' => 'team', 'title' => __( 'Esprit d’équipe', 'theme-perso' ), 'text' => __( 'Des projets construits avec confiance, écoute et précision.', 'theme-perso' ) ),
    array( 'icon' => 'growth', 'title' => __( 'Évolution de carrière', 'theme-perso' ), 'text' => __( 'Des parcours pensés pour progresser et prendre des responsabilités.', 'theme-perso' ) ),
    array( 'icon' => 'earth', 'title' => __( 'Impact environnemental', 'theme-perso' ), 'text' => __( 'Une approche attentive aux choix de formulation et d’emballage.', 'theme-perso' ) ),
    array( 'icon' => 'academy', 'title' => __( 'Formation continue', 'theme-perso' ), 'text' => __( 'Un accompagnement régulier pour développer vos compétences.', 'theme-perso' ) ),
);

$values = array(
    array( 'icon' => 'heart', 'title' => __( 'Exigence', 'theme-perso' ), 'text' => __( 'Chaque détail compte, de la formule à l’expérience client.', 'theme-perso' ) ),
    array( 'icon' => 'leaf', 'title' => __( 'Naturalité', 'theme-perso' ), 'text' => __( 'Nous avançons avec des actifs naturels et une approche responsable.', 'theme-perso' ) ),
    array( 'icon' => 'team', 'title' => __( 'Écoute', 'theme-perso' ), 'text' => __( 'Les idées circulent, les talents progressent et les équipes construisent ensemble.', 'theme-perso' ) ),
    array( 'icon' => 'growth', 'title' => __( 'Ambition', 'theme-perso' ), 'text' => __( 'Nous voulons faire grandir une maison française premium, utile et sincère.', 'theme-perso' ) ),
);

$jobs = array(
    array( 'title' => __( 'Marketing Digital', 'theme-perso' ), 'text' => __( 'Développer les campagnes, contenus et leviers d’acquisition.', 'theme-perso' ), 'salary' => '32-42 k€', 'place' => 'Paris / hybride', 'contract' => 'CDI', 'tags' => 'cdi marketing digital', 'image' => $asset( 'products', 'category-soins-visage-hero.png' ) ),
    array( 'title' => __( 'Chef de projet', 'theme-perso' ), 'text' => __( 'Coordonner les lancements produits et les temps forts e-commerce.', 'theme-perso' ), 'salary' => '35-46 k€', 'place' => 'Paris', 'contract' => 'CDI', 'tags' => 'cdi marketing', 'image' => $asset( 'products', 'category-packs-hero-reel.png' ) ),
    array( 'title' => __( 'Web Designer', 'theme-perso' ), 'text' => __( 'Créer des interfaces élégantes, claires et orientées conversion.', 'theme-perso' ), 'salary' => '30-40 k€', 'place' => 'Remote partiel', 'contract' => 'CDD', 'tags' => 'cdd digital', 'image' => $asset( 'about', 'about-story-lifestyle.png' ) ),
    array( 'title' => __( 'Développeur', 'theme-perso' ), 'text' => __( 'Améliorer les parcours WooCommerce, tracking et performances.', 'theme-perso' ), 'salary' => '38-52 k€', 'place' => 'Hybride', 'contract' => 'CDI', 'tags' => 'cdi developpement digital', 'image' => $asset( 'products', 'photo-pack-routine-premium-reel.png' ) ),
    array( 'title' => __( 'Responsable Boutique', 'theme-perso' ), 'text' => __( 'Piloter l’expérience retail et accompagner les conseillers beauté.', 'theme-perso' ), 'salary' => '34-45 k€', 'place' => 'Lyon', 'contract' => 'CDI', 'tags' => 'cdi boutique', 'image' => $asset( 'products', 'hero-accessoires-cosmethique.png' ) ),
    array( 'title' => __( 'Conseiller beauté', 'theme-perso' ), 'text' => __( 'Guider les clientes vers des routines naturelles et personnalisées.', 'theme-perso' ), 'salary' => '24-30 k€', 'place' => 'Paris', 'contract' => 'Alternance', 'tags' => 'alternance boutique', 'image' => $asset( 'products', 'photo-creme-hydratante-sauge-camomille.png' ) ),
    array( 'title' => __( 'Logistique', 'theme-perso' ), 'text' => __( 'Préparer les commandes avec soin et suivre les expéditions.', 'theme-perso' ), 'salary' => '24-32 k€', 'place' => 'Île-de-France', 'contract' => 'Stage', 'tags' => 'stage logistique', 'image' => $asset( 'products', 'photo-trousse-beaute-cosmethique-lifestyle.png' ) ),
);

$culture = array(
    __( 'Intégration', 'theme-perso' ),
    __( 'Formation', 'theme-perso' ),
    __( 'Accompagnement', 'theme-perso' ),
    __( 'Évolution', 'theme-perso' ),
    __( 'Responsabilités', 'theme-perso' ),
    __( 'Leadership', 'theme-perso' ),
);

$stats = array(
    array( 'value' => '25', 'label' => __( 'collaborateurs', 'theme-perso' ) ),
    array( 'value' => '96', 'suffix' => '%', 'label' => __( 'satisfaction collaborateurs', 'theme-perso' ) ),
    array( 'value' => '4', 'label' => __( 'pays', 'theme-perso' ) ),
    array( 'value' => '98', 'suffix' => '%', 'label' => __( 'CDI', 'theme-perso' ) ),
    array( 'value' => '100', 'suffix' => '%', 'label' => __( 'produits naturels', 'theme-perso' ) ),
);

$testimonials = array(
    array( 'name' => 'Sarah M.', 'role' => __( 'Responsable boutique', 'theme-perso' ), 'text' => __( 'J’ai trouvé une maison exigeante, humaine et très attentive au détail. Chaque journée a du sens.', 'theme-perso' ), 'image' => $asset( 'products', 'photo-roller-jade-naturel-lifestyle.png' ) ),
    array( 'name' => 'Nina B.', 'role' => __( 'Marketing digital', 'theme-perso' ), 'text' => __( 'Les projets avancent vite, mais toujours avec une vraie réflexion de marque et d’expérience client.', 'theme-perso' ), 'image' => $asset( 'blog', 'blog-serum.png' ) ),
    array( 'name' => 'Thomas R.', 'role' => __( 'Projet e-commerce', 'theme-perso' ), 'text' => __( 'Cosm’Éthique laisse la place aux idées, à l’amélioration continue et aux parcours de qualité.', 'theme-perso' ), 'image' => $asset( 'about', 'about-eco-commitment.png' ) ),
);

$faq = array(
    __( 'Comment postuler ?', 'theme-perso' ) => __( 'Choisissez une offre ou utilisez la candidature spontanée. Notre équipe revient vers vous si votre profil correspond.', 'theme-perso' ),
    __( 'Combien de temps dure le recrutement ?', 'theme-perso' ) => __( 'Le parcours dure généralement deux à trois semaines selon le poste et les disponibilités.', 'theme-perso' ),
    __( 'Puis-je envoyer une candidature spontanée ?', 'theme-perso' ) => __( 'Oui, le formulaire dédié permet de présenter votre parcours même sans offre ouverte.', 'theme-perso' ),
    __( 'Proposez-vous du travail hybride ?', 'theme-perso' ) => __( 'Certains métiers peuvent être organisés en hybride selon les besoins de l’équipe.', 'theme-perso' ),
    __( 'Recrutez-vous en alternance ?', 'theme-perso' ) => __( 'Oui, des opportunités peuvent être ouvertes en boutique, marketing et digital.', 'theme-perso' ),
    __( 'Acceptez-vous les stages ?', 'theme-perso' ) => __( 'Oui, les stages sont étudiés selon les périodes et les missions disponibles.', 'theme-perso' ),
);

$icon = function( $name ) {
    $paths = array(
        'leaf'    => '<path d="M20 4C12 4 6 10 6 18c8 0 14-6 14-14Z"/><path d="M6 18c2-4 5-7 9-9"/>',
        'rocket'  => '<path d="M13 4c4.5 1 6 2.5 7 7l-5 5-7-7 5-5Z"/><path d="M8 9l-3 1 4 4-1 3 3-1"/><circle cx="15" cy="9" r="1.4"/>',
        'team'    => '<path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM16 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3 21a5 5 0 0 1 10 0M11 21a5 5 0 0 1 10 0"/>',
        'growth'  => '<path d="M4 19V5m0 14h16M8 15l3-3 3 2 5-7"/><path d="M17 7h2v2"/>',
        'earth'   => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.6 3.8 5.6 3.8 9S14.5 18.4 12 21M12 3c-2.5 2.6-3.8 5.6-3.8 9S9.5 18.4 12 21"/>',
        'academy' => '<path d="m3 8 9-4 9 4-9 4-9-4Z"/><path d="M7 10v5c3 2 7 2 10 0v-5"/><path d="M21 8v6"/>',
        'brief'   => '<path d="M9 6V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1M4 7h16v12H4V7Z"/><path d="M4 12h16"/>',
        'heart'   => '<path d="M20 8.5c0 5-8 10.5-8 10.5S4 13.5 4 8.5A4.5 4.5 0 0 1 12 6a4.5 4.5 0 0 1 8 2.5Z"/>',
    );

    return '<span class="recruitment-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false">' . ( $paths[ $name ] ?? $paths['leaf'] ) . '</svg></span>';
};

$job_schema = array(
    '@context' => 'https://schema.org',
    '@graph'   => array(),
);

foreach ( $jobs as $job ) {
    $job_schema['@graph'][] = array(
        '@type'           => 'JobPosting',
        'title'           => wp_strip_all_tags( $job['title'] ),
        'description'     => wp_strip_all_tags( $job['text'] ),
        'employmentType'  => wp_strip_all_tags( $job['contract'] ),
        'hiringOrganization' => array(
            '@type' => 'Organization',
            'name'  => 'COSM’ÉTHIQUE',
            'sameAs'=> home_url( '/' ),
        ),
        'jobLocation'     => array(
            '@type'   => 'Place',
            'address' => array(
                '@type'           => 'PostalAddress',
                'addressLocality' => wp_strip_all_tags( $job['place'] ),
                'addressCountry'  => 'FR',
            ),
        ),
    );
}
?>

<div class="recruitment-page" data-recruitment-page>
    <section class="recruitment-hero" aria-labelledby="recruitment-title">
        <span class="recruitment-ambient recruitment-ambient--one" aria-hidden="true"></span>
        <span class="recruitment-ambient recruitment-ambient--two" aria-hidden="true"></span>
        <div class="recruitment-hero-copy motion-reveal motion-reveal--left">
            <p class="recruitment-kicker"><?php esc_html_e( 'Carrières', 'theme-perso' ); ?></p>
            <h1 id="recruitment-title"><?php esc_html_e( 'Rejoignez l’aventure Cosm’Éthique.', 'theme-perso' ); ?></h1>
            <p><?php esc_html_e( 'Ensemble, créons la cosmétique naturelle de demain.', 'theme-perso' ); ?></p>
            <div class="recruitment-actions">
                <a class="button button-primary" href="#offres"><?php esc_html_e( 'Voir nos offres', 'theme-perso' ); ?></a>
                <a class="button recruitment-button-secondary" href="#candidature"><?php esc_html_e( 'Candidature spontanée', 'theme-perso' ); ?></a>
            </div>
        </div>
        <div class="recruitment-hero-visual motion-reveal motion-reveal--right" data-recruitment-parallax aria-hidden="true">
            <img class="recruitment-product recruitment-product--serum" src="<?php echo esc_url( $asset( 'products', 'photo-serum-eclat-rose.png' ) ); ?>" alt="">
            <img class="recruitment-product recruitment-product--cream" src="<?php echo esc_url( $asset( 'products', 'photo-creme-hydratante-sauge-camomille.png' ) ); ?>" alt="">
            <img class="recruitment-product recruitment-product--oil" src="<?php echo esc_url( $asset( 'products', 'photo-huile-seche-botanique.png' ) ); ?>" alt="">
            <span class="recruitment-stone"></span>
            <span class="recruitment-botanical recruitment-botanical--one"></span>
            <span class="recruitment-botanical recruitment-botanical--two"></span>
        </div>
    </section>

    <section class="recruitment-section recruitment-benefits" aria-labelledby="why-join">
        <div class="recruitment-section-heading motion-reveal">
            <p class="recruitment-kicker"><?php esc_html_e( 'Pourquoi nous rejoindre', 'theme-perso' ); ?></p>
            <h2 id="why-join"><?php esc_html_e( 'Un environnement exigeant, humain et créatif.', 'theme-perso' ); ?></h2>
        </div>
        <div class="recruitment-benefit-grid">
            <?php foreach ( $benefits as $benefit ) : ?>
                <article class="recruitment-benefit-card motion-reveal motion-reveal--scale">
                    <?php echo $icon( $benefit['icon'] ); ?>
                    <h3><?php echo esc_html( $benefit['title'] ); ?></h3>
                    <p><?php echo esc_html( $benefit['text'] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="recruitment-section recruitment-values" aria-labelledby="recruitment-values-title">
        <div class="recruitment-section-heading motion-reveal">
            <p class="recruitment-kicker"><?php esc_html_e( 'Nos valeurs', 'theme-perso' ); ?></p>
            <h2 id="recruitment-values-title"><?php esc_html_e( 'Une maison qui avance avec sens.', 'theme-perso' ); ?></h2>
        </div>
        <div class="recruitment-benefit-grid recruitment-values-grid">
            <?php foreach ( $values as $value ) : ?>
                <article class="recruitment-benefit-card motion-reveal motion-reveal--scale">
                    <?php echo $icon( $value['icon'] ); ?>
                    <h3><?php echo esc_html( $value['title'] ); ?></h3>
                    <p><?php echo esc_html( $value['text'] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="metiers" class="recruitment-section recruitment-jobs-carousel" aria-labelledby="jobs-title">
        <div class="recruitment-section-heading motion-reveal">
            <p class="recruitment-kicker"><?php esc_html_e( 'Nos métiers', 'theme-perso' ); ?></p>
            <h2 id="jobs-title"><?php esc_html_e( 'Des expertises au service d’une beauté plus consciente.', 'theme-perso' ); ?></h2>
        </div>
        <div class="recruitment-carousel" aria-label="<?php esc_attr_e( 'Métiers Cosm’Éthique', 'theme-perso' ); ?>">
            <?php foreach ( $jobs as $job ) : ?>
                <article class="recruitment-job-card motion-reveal" data-job-card data-job-tags="<?php echo esc_attr( $job['tags'] ); ?>">
                    <figure><img src="<?php echo esc_url( $job['image'] ); ?>" alt="" loading="lazy"></figure>
                    <div>
                        <h3><?php echo esc_html( $job['title'] ); ?></h3>
                        <p><?php echo esc_html( $job['text'] ); ?></p>
                        <ul>
                            <li><?php echo esc_html( $job['salary'] ); ?></li>
                            <li><?php echo esc_html( $job['place'] ); ?></li>
                            <li><?php echo esc_html( $job['contract'] ); ?></li>
                        </ul>
                        <a class="recruitment-mini-button" href="#offres"><?php esc_html_e( 'Découvrir', 'theme-perso' ); ?></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="recruitment-culture" aria-labelledby="culture-title">
        <div class="recruitment-culture-copy motion-reveal motion-reveal--left">
            <p class="recruitment-kicker"><?php esc_html_e( 'Notre environnement de travail', 'theme-perso' ); ?></p>
            <h2 id="culture-title"><?php esc_html_e( 'Grandir avec méthode, confiance et élégance.', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Chaque parcours est accompagné avec clarté : intégration, formation, autonomie progressive et responsabilité réelle.', 'theme-perso' ); ?></p>
        </div>
        <div class="recruitment-timeline motion-reveal motion-reveal--right">
            <?php foreach ( $culture as $index => $step ) : ?>
                <article>
                    <span><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
                    <strong><?php echo esc_html( $step ); ?></strong>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="recruitment-stats" data-counter-scope aria-label="<?php esc_attr_e( 'Chiffres clés Cosm’Éthique', 'theme-perso' ); ?>">
        <?php foreach ( $stats as $stat ) : ?>
            <div class="recruitment-stat-card motion-reveal">
                <strong><span data-counter-target="<?php echo esc_attr( $stat['value'] ); ?>">0</span><?php echo esc_html( $stat['suffix'] ?? '' ); ?></strong>
                <p><?php echo esc_html( $stat['label'] ); ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="recruitment-section recruitment-testimonials" aria-labelledby="team-title">
        <div class="recruitment-section-heading motion-reveal">
            <p class="recruitment-kicker"><?php esc_html_e( 'Témoignages collaborateurs', 'theme-perso' ); ?></p>
            <h2 id="team-title"><?php esc_html_e( 'Celles et ceux qui font vivre la maison.', 'theme-perso' ); ?></h2>
        </div>
        <div class="recruitment-testimonial-track">
            <?php foreach ( $testimonials as $testimonial ) : ?>
                <figure class="recruitment-testimonial motion-reveal">
                    <img src="<?php echo esc_url( $testimonial['image'] ); ?>" alt="" loading="lazy">
                    <blockquote><?php echo esc_html( $testimonial['text'] ); ?></blockquote>
                    <figcaption>
                        <strong><?php echo esc_html( $testimonial['name'] ); ?></strong>
                        <span><?php echo esc_html( $testimonial['role'] ); ?></span>
                        <em aria-label="<?php esc_attr_e( 'Note 5 sur 5', 'theme-perso' ); ?>">★★★★★</em>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="offres" class="recruitment-section recruitment-openings" aria-labelledby="openings-title">
        <div class="recruitment-section-heading motion-reveal">
            <p class="recruitment-kicker"><?php esc_html_e( 'Les offres disponibles', 'theme-perso' ); ?></p>
            <h2 id="openings-title"><?php esc_html_e( 'Choisissez le poste qui vous ressemble.', 'theme-perso' ); ?></h2>
        </div>
        <div class="recruitment-filters" aria-label="<?php esc_attr_e( 'Filtres des offres', 'theme-perso' ); ?>">
            <?php foreach ( array( 'all' => __( 'Tous', 'theme-perso' ), 'cdi' => 'CDI', 'cdd' => 'CDD', 'alternance' => __( 'Alternance', 'theme-perso' ), 'stage' => __( 'Stage', 'theme-perso' ), 'marketing' => 'Marketing', 'digital' => 'Digital', 'developpement' => __( 'Développement', 'theme-perso' ), 'boutique' => __( 'Boutique', 'theme-perso' ) ) as $filter => $label ) : ?>
                <button type="button" data-recruitment-filter="<?php echo esc_attr( $filter ); ?>" class="<?php echo 'all' === $filter ? 'is-active' : ''; ?>"><?php echo esc_html( $label ); ?></button>
            <?php endforeach; ?>
        </div>
        <div class="recruitment-opening-grid">
            <?php foreach ( $jobs as $job ) : ?>
                <article class="recruitment-opening-card motion-reveal" data-recruitment-opening data-job-tags="<?php echo esc_attr( $job['tags'] ); ?>">
                    <?php echo $icon( 'brief' ); ?>
                    <h3><?php echo esc_html( $job['title'] ); ?></h3>
                    <p><?php echo esc_html( $job['place'] ); ?></p>
                    <div><span><?php echo esc_html( $job['contract'] ); ?></span><span><?php esc_html_e( 'Temps plein', 'theme-perso' ); ?></span></div>
                    <a class="button button-primary" href="#candidature"><?php esc_html_e( 'Voir l’offre', 'theme-perso' ); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="candidature" class="recruitment-application" aria-labelledby="application-title">
        <div class="recruitment-application-copy motion-reveal motion-reveal--left">
            <p class="recruitment-kicker"><?php esc_html_e( 'Candidature spontanée', 'theme-perso' ); ?></p>
            <h2 id="application-title"><?php esc_html_e( 'Présentez-nous votre talent.', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Envoyez votre parcours, votre vision et ce que vous aimeriez construire avec Cosm’Éthique.', 'theme-perso' ); ?></p>
        </div>
        <form class="recruitment-form motion-reveal motion-reveal--right" action="#" method="post" enctype="multipart/form-data" data-demo-autofill="recruitment" data-recruitment-form>
            <div class="recruitment-form-grid">
                <label><?php esc_html_e( 'Nom', 'theme-perso' ); ?><input type="text" name="last_name" required></label>
                <label><?php esc_html_e( 'Prénom', 'theme-perso' ); ?><input type="text" name="first_name" required></label>
                <label><?php esc_html_e( 'Email', 'theme-perso' ); ?><input type="email" name="email" required></label>
                <label><?php esc_html_e( 'Téléphone', 'theme-perso' ); ?><input type="tel" name="phone" required></label>
                <label><?php esc_html_e( 'CV', 'theme-perso' ); ?><input type="file" name="cv" accept=".pdf,.doc,.docx"></label>
                <label><?php esc_html_e( 'Lettre de motivation', 'theme-perso' ); ?><input type="file" name="letter" accept=".pdf,.doc,.docx"></label>
                <label class="recruitment-field-full"><?php esc_html_e( 'Message', 'theme-perso' ); ?><textarea name="message" rows="5" required></textarea></label>
                <label class="recruitment-field-full"><?php esc_html_e( 'Captcha', 'theme-perso' ); ?><input type="text" name="captcha" inputmode="numeric" autocomplete="off" data-recruitment-captcha required placeholder="<?php esc_attr_e( 'Combien font 7 + 2 ?', 'theme-perso' ); ?>"></label>
            </div>
            <?php theme_perso_security_fields( 'recruitment' ); ?>
            <button class="button button-primary" type="submit"><?php esc_html_e( 'Envoyer ma candidature', 'theme-perso' ); ?></button>
            <p class="recruitment-form-status" aria-live="polite"></p>
        </form>
    </section>

    <section class="recruitment-section recruitment-faq" aria-labelledby="recruitment-faq-title">
        <div class="recruitment-section-heading motion-reveal">
            <p class="recruitment-kicker"><?php esc_html_e( 'FAQ recrutement', 'theme-perso' ); ?></p>
            <h2 id="recruitment-faq-title"><?php esc_html_e( 'Vos questions avant de postuler.', 'theme-perso' ); ?></h2>
        </div>
        <div class="recruitment-faq-list">
            <?php foreach ( $faq as $question => $answer ) : ?>
                <details class="motion-reveal">
                    <summary><?php echo esc_html( $question ); ?></summary>
                    <p><?php echo esc_html( $answer ); ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="recruitment-final-cta" aria-labelledby="recruitment-final-title">
        <img src="<?php echo esc_url( $asset( 'products', 'photo-pack-routine-premium-reel.png' ) ); ?>" alt="" loading="lazy">
        <div class="motion-reveal">
            <p class="recruitment-kicker"><?php esc_html_e( 'Votre futur commence ici', 'theme-perso' ); ?></p>
            <h2 id="recruitment-final-title"><?php esc_html_e( 'Votre prochaine aventure commence ici.', 'theme-perso' ); ?></h2>
            <a class="button button-primary" href="#candidature"><?php esc_html_e( 'Je rejoins Cosm’Éthique', 'theme-perso' ); ?></a>
        </div>
    </section>

    <script type="application/ld+json"><?php echo wp_json_encode( $job_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?></script>
</div>
