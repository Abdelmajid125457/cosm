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
        'period' => __( 'Phase digitale', 'theme-perso' ),
        'title'  => __( 'Préparation LearnyBox et serious game', 'theme-perso' ),
        'text'   => __( 'Diagnostic initial, culture de marque, lecture des compositions INCI, certifications COSMOS/Ecocert et entraînement aux objections clients.', 'theme-perso' ),
        'hours'  => __( 'En amont', 'theme-perso' ),
    ),
    array(
        'period' => __( 'Jours 1-2', 'theme-perso' ),
        'title'  => __( 'Marque, produits et conseil client', 'theme-perso' ),
        'text'   => __( 'Routines visage, corps et cheveux, naturalité, discours anti-greenwashing, diagnostic beauté et conseil personnalisé.', 'theme-perso' ),
        'hours'  => __( '2 jours', 'theme-perso' ),
    ),
    array(
        'period' => __( 'Jours 3-4', 'theme-perso' ),
        'title'  => __( 'Immersion en boutique pilote à Paris', 'theme-perso' ),
        'text'   => __( 'Mises en situation professionnelles : vente, relation client, merchandising, encaissement, gestion de stock et réclamations.', 'theme-perso' ),
        'hours'  => __( '2 jours', 'theme-perso' ),
    ),
    array(
        'period' => __( 'Jours 5-6', 'theme-perso' ),
        'title'  => __( 'Digital, KPI et validation finale', 'theme-perso' ),
        'text'   => __( 'Pilotage des indicateurs, reporting réseau, e-réputation, cas pratiques, quiz final et validation à 80 % des compétences attendues.', 'theme-perso' ),
        'hours'  => __( '2 jours', 'theme-perso' ),
    ),
    array(
        'period' => __( 'Post-ouverture', 'theme-perso' ),
        'title'  => __( 'Coaching et accompagnement opérationnel', 'theme-perso' ),
        'text'   => __( 'Suivi des premiers mois d’exploitation, analyse des KPI, accompagnement commercial et contrôle qualité réseau.', 'theme-perso' ),
        'hours'  => __( 'Premiers mois', 'theme-perso' ),
    ),
);

$modules = array(
    array( 'icon' => '✦', 'title' => __( 'LearnyBox', 'theme-perso' ), 'text' => __( 'Accéder en autonomie aux bases marque, RSE, réglementation, outils et standards réseau avant la présence terrain.', 'theme-perso' ) ),
    array( 'icon' => '☘', 'title' => __( 'INCI & certifications', 'theme-perso' ), 'text' => __( 'Comprendre les compositions, les actifs naturels, les labels COSMOS/Ecocert et le discours anti-greenwashing.', 'theme-perso' ) ),
    array( 'icon' => '◌', 'title' => __( 'Conseil client', 'theme-perso' ), 'text' => __( 'Savoir conduire un diagnostic beauté, personnaliser une routine et répondre aux objections.', 'theme-perso' ) ),
    array( 'icon' => '▣', 'title' => __( 'Gestion boutique', 'theme-perso' ), 'text' => __( 'Piloter le stock, le merchandising, l’encaissement, les animations et la fidélisation locale.', 'theme-perso' ) ),
    array( 'icon' => '◎', 'title' => __( 'Digital & KPI', 'theme-perso' ), 'text' => __( 'Suivre les indicateurs, le reporting réseau, les commandes, la visibilité locale et les leviers CRM.', 'theme-perso' ) ),
    array( 'icon' => '✺', 'title' => __( 'E-réputation', 'theme-perso' ), 'text' => __( 'Gérer les avis, les messages sensibles, les réponses publiques et les situations de crise.', 'theme-perso' ) ),
    array( 'icon' => '◆', 'title' => __( 'Certification interne', 'theme-perso' ), 'text' => __( 'Valider au minimum 80 % des compétences attendues avant l’ouverture du point de vente.', 'theme-perso' ) ),
);

$faq = array(
    __( 'Où se déroule la formation ?', 'theme-perso' ) => __( 'La phase digitale se déroule en autonomie via LearnyBox. Elle est complétée par 6 jours de formation présentielle et mixte en boutique pilote à Paris.', 'theme-perso' ),
    __( 'Combien de temps dure-t-elle ?', 'theme-perso' ) => __( 'Le parcours comprend une phase digitale préparatoire, 6 jours présentiel/mixte en boutique pilote, puis un accompagnement post-ouverture pendant les premiers mois d’exploitation.', 'theme-perso' ),
    __( 'Est-elle obligatoire ?', 'theme-perso' ) => __( 'Oui. Elle sécurise l’ouverture, homogénéise l’expérience client et vérifie que chaque franchisé maîtrise les standards COSM’ÉTHIQUE.', 'theme-perso' ),
    __( 'Quels outils sont fournis ?', 'theme-perso' ) => __( 'Le franchisé reçoit un accès LearnyBox, un serious game pédagogique, un manuel opératoire, des fiches produits, un guide de vente, un guide merchandising et un tableau de bord KPI.', 'theme-perso' ),
    __( 'Comment est-on évalué ?', 'theme-perso' ) => __( 'La validation repose sur une logique de compétences : quiz, serious game, simulation de vente, cas pratique et seuil minimum de 80 % avant ouverture.', 'theme-perso' ),
    __( 'Y a-t-il un accompagnement après ouverture ?', 'theme-perso' ) => __( 'Oui. L’équipe réseau suit les premiers mois, analyse les KPI, accompagne les actions commerciales et maintient l’homogénéité de l’expérience client.', 'theme-perso' ),
);
?>

<div class="franchise-flow franchise-training-page" data-franchise-training-page>
    <section class="franchise-flow-hero franchise-training-hero" aria-labelledby="franchise-training-title">
        <div class="franchise-flow-copy motion-reveal motion-reveal--left">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Formation franchisés', 'theme-perso' ); ?></p>
            <h1 id="franchise-training-title"><?php esc_html_e( 'COSM’ÉTHIQUE Phygital Franchise Lab', 'theme-perso' ); ?></h1>
            <p><?php esc_html_e( 'Un parcours hybride pour préparer, valider et accompagner chaque franchisé avant et après l’ouverture de son point de vente.', 'theme-perso' ); ?></p>
            <div class="franchise-flow-actions">
                <a class="button button-primary" href="<?php echo esc_url( $candidature_url ); ?>"><?php esc_html_e( 'Déposer ma candidature', 'theme-perso' ); ?></a>
                <a class="button franchise-flow-secondary" href="<?php echo esc_url( $eligibility_url ); ?>"><?php esc_html_e( 'Vérifier mon éligibilité', 'theme-perso' ); ?></a>
            </div>
        </div>
        <aside class="franchise-training-summary motion-reveal motion-reveal--right" aria-label="<?php esc_attr_e( 'Résumé du parcours de formation', 'theme-perso' ); ?>">
            <img src="<?php echo esc_url( $asset( 'about', 'about-eco-commitment.png' ) ); ?>" alt="" loading="lazy">
            <div>
                <strong><?php esc_html_e( 'LearnyBox', 'theme-perso' ); ?></strong>
                <span><?php esc_html_e( 'phase digitale préparatoire', 'theme-perso' ); ?></span>
            </div>
            <div>
                <strong><?php esc_html_e( '6 jours', 'theme-perso' ); ?></strong>
                <span><?php esc_html_e( 'présentiel/mixte en boutique pilote à Paris', 'theme-perso' ); ?></span>
            </div>
            <div>
                <strong><?php esc_html_e( '80 %', 'theme-perso' ); ?></strong>
                <span><?php esc_html_e( 'minimum de compétences validées', 'theme-perso' ); ?></span>
            </div>
        </aside>
    </section>

    <section class="franchise-flow-program motion-reveal" aria-labelledby="training-why-title">
        <div>
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Pourquoi une formation ?', 'theme-perso' ); ?></p>
            <h2 id="training-why-title"><?php esc_html_e( 'Sécuriser l’ouverture et protéger l’expérience de marque.', 'theme-perso' ); ?></h2>
        </div>
        <div class="franchise-flow-program__content">
            <p><?php esc_html_e( 'Le parcours COSM’ÉTHIQUE Phygital Franchise Lab accompagne chaque nouveau franchisé avant l’ouverture de son point de vente. Il combine une phase digitale préparatoire, accessible en autonomie via LearnyBox, avec un serious game pédagogique permettant de s’entraîner à la lecture des compositions INCI, aux certifications COSMOS/Ecocert et au traitement des objections clients.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Cette phase digitale est complétée par 6 jours de formation présentielle et mixte en boutique pilote à Paris. Les franchisés sont placés dans des situations concrètes : conseil client, vente, gestion des stocks, animation commerciale locale, pilotage des indicateurs et reporting réseau.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'La validation du parcours repose sur une logique de compétences. Le franchisé doit atteindre au minimum 80 % des compétences attendues afin de garantir sa capacité à représenter la marque, conseiller les clients et piloter son point de vente dans le respect des standards COSM’ÉTHIQUE.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Après l’ouverture, un accompagnement post-ouverture est prévu afin de suivre les premiers mois d’exploitation, analyser les indicateurs de performance et maintenir l’homogénéité de l’expérience client au sein du réseau.', 'theme-perso' ); ?></p>
        </div>
    </section>

    <section class="franchise-flow-section franchise-flow-timeline franchise-training-timeline" aria-labelledby="training-timeline-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Déroulé', 'theme-perso' ); ?></p>
            <h2 id="training-timeline-title"><?php esc_html_e( 'Un parcours progressif, hybride et mesurable.', 'theme-perso' ); ?></h2>
        </div>
        <div class="franchise-training-timeline-list">
            <?php foreach ( $timeline as $step ) : ?>
                <article class="franchise-flow-card franchise-training-step motion-reveal">
                    <span class="franchise-training-step__period"><?php echo esc_html( $step['period'] ); ?></span>
                    <div class="franchise-training-step__content">
                        <h3><?php echo esc_html( $step['title'] ); ?></h3>
                        <p><?php echo esc_html( $step['text'] ); ?></p>
                    </div>
                    <small class="franchise-training-step__duration"><?php echo esc_html( $step['hours'] ); ?></small>
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
                <p><?php esc_html_e( 'Le parcours combine LearnyBox, quiz, serious game, ateliers pratiques, jeux de rôle vendeur/client, simulation de diagnostic beauté et immersion dans la boutique pilote parisienne.', 'theme-perso' ); ?></p>
                <ul class="check-list">
                    <li><?php esc_html_e( 'Serious game : gérer une journée en boutique COSM’ÉTHIQUE', 'theme-perso' ); ?></li>
                    <li><?php esc_html_e( 'Lecture INCI et certifications COSMOS/Ecocert', 'theme-perso' ); ?></li>
                    <li><?php esc_html_e( 'Simulation de vente et objections client', 'theme-perso' ); ?></li>
                    <li><?php esc_html_e( 'Attestation de compétences après validation à 80 %', 'theme-perso' ); ?></li>
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
        <div><strong><span data-counter-target="6">0</span></strong><p><?php esc_html_e( 'jours présentiel/mixte à Paris', 'theme-perso' ); ?></p></div>
        <div><strong><span data-counter-target="1">0</span></strong><p><?php esc_html_e( 'plateforme LearnyBox préparatoire', 'theme-perso' ); ?></p></div>
        <div><strong><span data-counter-target="3">0</span></strong><p><?php esc_html_e( 'mois de suivi post-ouverture', 'theme-perso' ); ?></p></div>
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
