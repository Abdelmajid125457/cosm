<?php
/**
 * Page Formation des franchisés.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$asset = function( $folder, $file ) {
    return get_template_directory_uri() . '/assets/' . trim( $folder, '/' ) . '/' . ltrim( $file, '/' );
};

$candidature_url = home_url( '/franchise/candidature/' );
$eligibility_url = home_url( '/franchise/eligibilite/' );

$timeline = array(
    array(
        'period' => __( 'Semaine 1', 'theme-perso' ),
        'title'  => __( 'Marque, valeurs et cadre réglementaire', 'theme-perso' ),
        'text'   => __( 'Histoire de Cosm’Éthique, positionnement premium accessible, RSE, transparence, charte de marque et bases de la réglementation cosmétique.', 'theme-perso' ),
        'hours'  => __( '12 h', 'theme-perso' ),
    ),
    array(
        'period' => __( 'Semaine 2', 'theme-perso' ),
        'title'  => __( 'Produits, ingrédients et conseil client', 'theme-perso' ),
        'text'   => __( 'Gammes visage, corps, cheveux, routines, diagnostic beauté, objections clients, naturalité et discours anti-greenwashing.', 'theme-perso' ),
        'hours'  => __( '16 h', 'theme-perso' ),
    ),
    array(
        'period' => __( 'Semaine 3', 'theme-perso' ),
        'title'  => __( 'Immersion boutique pilote', 'theme-perso' ),
        'text'   => __( 'Merchandising, gestion de stock, encaissement, animation commerciale, relation client, avis et réclamations en boutique.', 'theme-perso' ),
        'hours'  => __( '28 h', 'theme-perso' ),
    ),
    array(
        'period' => __( 'Semaine 4', 'theme-perso' ),
        'title'  => __( 'Digital, performance et certification', 'theme-perso' ),
        'text'   => __( 'WooCommerce côté franchise, CRM, newsletters, Google Business Profile, KPI, e-réputation, gestion de crise et soutenance finale.', 'theme-perso' ),
        'hours'  => __( '18 h', 'theme-perso' ),
    ),
    array(
        'period' => __( 'Post-ouverture', 'theme-perso' ),
        'title'  => __( 'Coaching opérationnel pendant 3 mois', 'theme-perso' ),
        'text'   => __( 'Points hebdomadaires le premier mois, rendez-vous bi-mensuels ensuite, suivi KPI, coaching vente et contrôle qualité réseau.', 'theme-perso' ),
        'hours'  => __( '12 h', 'theme-perso' ),
    ),
);

$modules = array(
    array( 'icon' => '✦', 'title' => __( 'Marque & valeurs', 'theme-perso' ), 'text' => __( 'Comprendre l’ADN Cosm’Éthique, la promesse client, la naturalité et l’exigence de transparence.', 'theme-perso' ) ),
    array( 'icon' => '☘', 'title' => __( 'Produits & ingrédients', 'theme-perso' ), 'text' => __( 'Maîtriser les actifs, les textures, les routines et les bénéfices de chaque gamme.', 'theme-perso' ) ),
    array( 'icon' => '◌', 'title' => __( 'Conseil client', 'theme-perso' ), 'text' => __( 'Savoir conduire un diagnostic beauté, personnaliser une routine et répondre aux objections.', 'theme-perso' ) ),
    array( 'icon' => '▣', 'title' => __( 'Gestion boutique', 'theme-perso' ), 'text' => __( 'Piloter le stock, le merchandising, l’encaissement, les animations et la fidélisation locale.', 'theme-perso' ) ),
    array( 'icon' => '◎', 'title' => __( 'Digital & e-commerce', 'theme-perso' ), 'text' => __( 'Utiliser les outils WordPress/WooCommerce, suivre les commandes et activer les leviers CRM.', 'theme-perso' ) ),
    array( 'icon' => '✺', 'title' => __( 'E-réputation', 'theme-perso' ), 'text' => __( 'Gérer les avis, les messages sensibles, les réponses publiques et les situations de crise.', 'theme-perso' ) ),
    array( 'icon' => '◆', 'title' => __( 'Performance & KPI', 'theme-perso' ), 'text' => __( 'Suivre le chiffre d’affaires, la satisfaction, le taux de réachat et la conformité à la charte.', 'theme-perso' ) ),
);

$faq = array(
    __( 'Où se déroule la formation ?', 'theme-perso' ) => __( 'Les deux premières semaines sont réalisées à distance via une plateforme e-learning. La troisième semaine se déroule à Paris, dans la boutique pilote et un espace showroom. Le suivi post-ouverture se fait à distance.', 'theme-perso' ),
    __( 'Combien de temps dure-t-elle ?', 'theme-perso' ) => __( 'Le parcours initial dure 4 semaines pour environ 74 heures de formation, puis 3 mois d’accompagnement opérationnel après ouverture.', 'theme-perso' ),
    __( 'Est-elle obligatoire ?', 'theme-perso' ) => __( 'Oui. Elle garantit une expérience client homogène, la maîtrise des produits et le respect de la charte Cosm’Éthique dans toutes les boutiques.', 'theme-perso' ),
    __( 'Quels outils sont fournis ?', 'theme-perso' ) => __( 'Le franchisé reçoit un manuel opératoire, des fiches produits, un guide de vente, un guide merchandising, des scripts de réponse client et un tableau de bord KPI.', 'theme-perso' ),
    __( 'Comment est-on évalué ?', 'theme-perso' ) => __( 'Chaque module comprend un quiz. La validation finale combine une simulation de vente, une étude de cas et une courte soutenance devant l’équipe réseau.', 'theme-perso' ),
    __( 'Y a-t-il un accompagnement après ouverture ?', 'theme-perso' ) => __( 'Oui. Des rendez-vous réguliers permettent de suivre les KPI, corriger les points de friction et renforcer l’autonomie commerciale du franchisé.', 'theme-perso' ),
);
?>

<div class="franchise-flow franchise-training-page" data-franchise-training-page>
    <section class="franchise-flow-hero franchise-training-hero" aria-labelledby="franchise-training-title">
        <div class="franchise-flow-copy motion-reveal motion-reveal--left">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Formation franchisés', 'theme-perso' ); ?></p>
            <h1 id="franchise-training-title"><?php esc_html_e( 'Formation des franchisés COSM’ÉTHIQUE', 'theme-perso' ); ?></h1>
            <p><?php esc_html_e( 'Un parcours complet pour ouvrir, gérer et développer votre boutique en toute confiance, avec une expérience client homogène et premium.', 'theme-perso' ); ?></p>
            <div class="franchise-flow-actions">
                <a class="button button-primary" href="<?php echo esc_url( $candidature_url ); ?>"><?php esc_html_e( 'Déposer ma candidature', 'theme-perso' ); ?></a>
                <a class="button franchise-flow-secondary" href="<?php echo esc_url( $eligibility_url ); ?>"><?php esc_html_e( 'Vérifier mon éligibilité', 'theme-perso' ); ?></a>
            </div>
        </div>
        <aside class="franchise-training-summary motion-reveal motion-reveal--right" aria-label="<?php esc_attr_e( 'Résumé du parcours de formation', 'theme-perso' ); ?>">
            <img src="<?php echo esc_url( $asset( 'about', 'about-eco-commitment.png' ) ); ?>" alt="" loading="lazy">
            <div>
                <strong><?php esc_html_e( '4 semaines', 'theme-perso' ); ?></strong>
                <span><?php esc_html_e( '74 h de formation initiale', 'theme-perso' ); ?></span>
            </div>
            <div>
                <strong><?php esc_html_e( '3 mois', 'theme-perso' ); ?></strong>
                <span><?php esc_html_e( 'd’accompagnement post-ouverture', 'theme-perso' ); ?></span>
            </div>
            <div>
                <strong><?php esc_html_e( 'Certification', 'theme-perso' ); ?></strong>
                <span><?php esc_html_e( 'Franchisé COSM’ÉTHIQUE certifié', 'theme-perso' ); ?></span>
            </div>
        </aside>
    </section>

    <section class="franchise-flow-program motion-reveal" aria-labelledby="training-why-title">
        <div>
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Pourquoi une formation ?', 'theme-perso' ); ?></p>
            <h2 id="training-why-title"><?php esc_html_e( 'Sécuriser l’ouverture et protéger l’expérience de marque.', 'theme-perso' ); ?></h2>
        </div>
        <p><?php esc_html_e( 'La formation permet de transmettre le savoir-faire Cosm’Éthique, d’éviter les écarts de discours entre boutiques et d’accompagner les franchisés sur les enjeux clés : conseil beauté, RSE, gestion commerciale, outils digitaux et e-réputation.', 'theme-perso' ); ?></p>
    </section>

    <section class="franchise-flow-section franchise-flow-timeline franchise-training-timeline" aria-labelledby="training-timeline-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Déroulé', 'theme-perso' ); ?></p>
            <h2 id="training-timeline-title"><?php esc_html_e( 'Un parcours progressif, hybride et mesurable.', 'theme-perso' ); ?></h2>
        </div>
        <div class="franchise-training-timeline-list">
            <?php foreach ( $timeline as $step ) : ?>
                <article class="franchise-flow-card franchise-training-step motion-reveal">
                    <span><?php echo esc_html( $step['period'] ); ?></span>
                    <h3><?php echo esc_html( $step['title'] ); ?></h3>
                    <p><?php echo esc_html( $step['text'] ); ?></p>
                    <small><?php echo esc_html( $step['hours'] ); ?></small>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="franchise-flow-section franchise-training-modules" aria-labelledby="training-modules-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Modules pédagogiques', 'theme-perso' ); ?></p>
            <h2 id="training-modules-title"><?php esc_html_e( 'Les compétences indispensables pour piloter une boutique.', 'theme-perso' ); ?></h2>
        </div>
        <div class="franchise-flow-grid franchise-training-module-grid">
            <?php foreach ( $modules as $module ) : ?>
                <article class="franchise-flow-card motion-reveal">
                    <strong aria-hidden="true"><?php echo esc_html( $module['icon'] ); ?></strong>
                    <h3><?php echo esc_html( $module['title'] ); ?></h3>
                    <p><?php echo esc_html( $module['text'] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="franchise-flow-section franchise-training-immersive" aria-labelledby="training-immersive-title">
        <div class="franchise-training-immersive-grid">
            <div class="franchise-flow-copy motion-reveal motion-reveal--left">
                <p class="franchise-flow-kicker"><?php esc_html_e( 'Expérience immersive', 'theme-perso' ); ?></p>
                <h2 id="training-immersive-title"><?php esc_html_e( 'Apprendre en situation réelle, pas seulement en théorie.', 'theme-perso' ); ?></h2>
                <p><?php esc_html_e( 'Le parcours combine vidéos courtes, quiz, serious game, ateliers pratiques, jeux de rôle vendeur/client, simulation de diagnostic beauté et immersion dans la boutique pilote parisienne.', 'theme-perso' ); ?></p>
                <ul class="check-list">
                    <li><?php esc_html_e( 'Serious game : gérer une journée en boutique COSM’ÉTHIQUE', 'theme-perso' ); ?></li>
                    <li><?php esc_html_e( 'Simulation de vente et objections client', 'theme-perso' ); ?></li>
                    <li><?php esc_html_e( 'Badges de progression et certification interne', 'theme-perso' ); ?></li>
                    <li><?php esc_html_e( 'Cas pratiques de gestion de crise et avis clients', 'theme-perso' ); ?></li>
                </ul>
            </div>
            <figure class="franchise-flow-visual motion-reveal motion-reveal--right">
                <img src="<?php echo esc_url( $asset( 'products', 'category-soins-visage-hero.png' ) ); ?>" alt="<?php esc_attr_e( 'Atelier de formation boutique Cosm’Éthique', 'theme-perso' ); ?>" loading="lazy">
                <span></span>
                <span></span>
            </figure>
        </div>
    </section>

    <section class="franchise-flow-stats" data-counter-scope aria-label="<?php esc_attr_e( 'Chiffres clés de la formation', 'theme-perso' ); ?>">
        <div><strong><span data-counter-target="74">0</span>h</strong><p><?php esc_html_e( 'formation initiale', 'theme-perso' ); ?></p></div>
        <div><strong><span data-counter-target="4">0</span></strong><p><?php esc_html_e( 'semaines structurées', 'theme-perso' ); ?></p></div>
        <div><strong><span data-counter-target="3">0</span></strong><p><?php esc_html_e( 'mois de coaching', 'theme-perso' ); ?></p></div>
        <div><strong><span data-counter-target="80">0</span>%</strong><p><?php esc_html_e( 'score minimum de certification', 'theme-perso' ); ?></p></div>
    </section>

    <section class="franchise-flow-section franchise-benefits" aria-labelledby="training-support-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Après ouverture', 'theme-perso' ); ?></p>
            <h2 id="training-support-title"><?php esc_html_e( 'Un accompagnement opérationnel pour transformer la formation en performance.', 'theme-perso' ); ?></h2>
        </div>
        <div class="franchise-flow-grid franchise-flow-grid--three">
            <article class="franchise-flow-card motion-reveal"><h3><?php esc_html_e( 'Coaching vente', 'theme-perso' ); ?></h3><p><?php esc_html_e( 'Analyse des premières ventes, aide à la posture conseil et amélioration du panier moyen.', 'theme-perso' ); ?></p></article>
            <article class="franchise-flow-card motion-reveal"><h3><?php esc_html_e( 'Suivi KPI', 'theme-perso' ); ?></h3><p><?php esc_html_e( 'Lecture mensuelle des indicateurs : chiffre d’affaires, satisfaction, avis, fidélisation et conformité.', 'theme-perso' ); ?></p></article>
            <article class="franchise-flow-card motion-reveal"><h3><?php esc_html_e( 'Support réseau', 'theme-perso' ); ?></h3><p><?php esc_html_e( 'Points réguliers avec l’équipe franchise pour corriger rapidement les irritants opérationnels.', 'theme-perso' ); ?></p></article>
        </div>
    </section>

    <section class="franchise-flow-section franchise-flow-faq" aria-labelledby="training-faq-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'FAQ formation', 'theme-perso' ); ?></p>
            <h2 id="training-faq-title"><?php esc_html_e( 'Les réponses avant de vous engager.', 'theme-perso' ); ?></h2>
        </div>
        <div class="franchise-flow-faq-list">
            <?php foreach ( $faq as $question => $answer ) : ?>
                <details class="franchise-flow-card motion-reveal">
                    <summary><?php echo esc_html( $question ); ?></summary>
                    <p><?php echo esc_html( $answer ); ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="franchise-flow-final">
        <div class="motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Rejoindre le réseau', 'theme-perso' ); ?></p>
            <h2><?php esc_html_e( 'Votre future boutique commence par une formation solide.', 'theme-perso' ); ?></h2>
            <div class="franchise-flow-actions">
                <a class="button button-primary" href="<?php echo esc_url( $candidature_url ); ?>"><?php esc_html_e( 'Rejoindre le réseau COSM’ÉTHIQUE', 'theme-perso' ); ?></a>
                <a class="button franchise-flow-secondary" href="<?php echo esc_url( $eligibility_url ); ?>"><?php esc_html_e( 'Vérifier mon éligibilité', 'theme-perso' ); ?></a>
            </div>
        </div>
    </section>
</div>
