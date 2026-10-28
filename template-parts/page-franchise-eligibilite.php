<?php
/**
 * Parcours premium d'éligibilité franchise.
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
$investment_url  = home_url( '/franchise/investissement/' );
$shop_url        = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );

$criteria = array(
    array( 'value' => __( 'Projet local solide', 'theme-perso' ), 'text' => __( 'Une ville identifiée, une zone de chalandise claire et une vraie motivation retail.', 'theme-perso' ) ),
    array( 'value' => __( 'Apport maîtrisé', 'theme-perso' ), 'text' => __( 'Un budget cohérent pour préparer l’ouverture et sécuriser les premiers mois.', 'theme-perso' ) ),
    array( 'value' => __( 'Sens du conseil', 'theme-perso' ), 'text' => __( 'Une envie d’accompagner les clientes vers des routines naturelles et premium.', 'theme-perso' ) ),
    array( 'value' => __( 'Engagement durable', 'theme-perso' ), 'text' => __( 'Une adhésion forte aux valeurs Cosm’Éthique : naturalité, exigence et responsabilité.', 'theme-perso' ) ),
    array( 'value' => __( 'Capacité de pilotage', 'theme-perso' ), 'text' => __( 'Une organisation adaptée à la gestion quotidienne d’un commerce et à la relation client.', 'theme-perso' ) ),
    array( 'value' => __( 'Projet documenté', 'theme-perso' ), 'text' => __( 'Une présentation sincère de la zone, de l’apport disponible et des motivations du porteur de projet.', 'theme-perso' ) ),
);

$steps = array(
    __( 'Questionnaire d’éligibilité', 'theme-perso' ),
    __( 'Dépôt de candidature', 'theme-perso' ),
    __( 'Analyse du dossier', 'theme-perso' ),
    __( 'Entretien et étapes contractuelles', 'theme-perso' ),
    __( 'Signature éventuelle du contrat', 'theme-perso' ),
);

$benefits = array(
    __( 'Concept boutique premium', 'theme-perso' ),
    __( 'Phygital Franchise Lab après signature', 'theme-perso' ),
    __( 'Serious game pédagogique de 2 h 30', 'theme-perso' ),
    __( 'Accompagnement merchandising', 'theme-perso' ),
    __( 'Supports marketing prêts à l’emploi', 'theme-perso' ),
    __( '6 jours en boutique pilote à Paris après signature', 'theme-perso' ),
    __( 'Suivi post-ouverture à J+30 et J+90', 'theme-perso' ),
);

$faq = array(
    __( 'Le questionnaire remplace-t-il la candidature ?', 'theme-perso' ) => __( 'Non. Il permet uniquement de vérifier les premiers critères avant de déposer un dossier complet.', 'theme-perso' ),
    __( 'Combien de temps faut-il pour répondre ?', 'theme-perso' ) => __( 'Moins de deux minutes suffisent pour obtenir une première orientation.', 'theme-perso' ),
    __( 'Puis-je candidater sans local ?', 'theme-perso' ) => __( 'Oui. Le local peut être étudié dans une seconde étape selon la ville et le potentiel commercial.', 'theme-perso' ),
    __( 'Le résultat est-il définitif ?', 'theme-perso' ) => __( 'Non. Notre équipe vérifie ensuite votre dossier et vous accompagne dans l’analyse du projet.', 'theme-perso' ),
);
?>

<div class="franchise-flow franchise-eligibility-page" data-franchise-eligibility-page>
    <section class="franchise-flow-hero" aria-labelledby="eligibility-title">
        <div class="franchise-flow-copy motion-reveal motion-reveal--left">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Éligibilité franchise', 'theme-perso' ); ?></p>
            <h1 id="eligibility-title"><?php esc_html_e( 'Vérifiez si votre projet peut rejoindre Cosm’Éthique.', 'theme-perso' ); ?></h1>
            <p><?php esc_html_e( 'Un parcours rapide, clair et rassurant pour obtenir une première orientation avant de déposer votre candidature. Le résultat ne constitue ni une acceptation, ni un engagement contractuel.', 'theme-perso' ); ?></p>
            <div class="franchise-flow-actions">
                <a class="button button-primary" href="#questionnaire-eligibilite"><?php esc_html_e( 'Commencer le questionnaire', 'theme-perso' ); ?></a>
                <a class="button franchise-flow-secondary" href="#criteres-eligibilite"><?php esc_html_e( 'Voir les critères', 'theme-perso' ); ?></a>
            </div>
        </div>
        <div class="franchise-flow-visual motion-reveal motion-reveal--right" aria-hidden="true">
            <img src="<?php echo esc_url( $asset( 'products', 'photo-pack-routine-premium-reel.png' ) ); ?>" alt="" loading="lazy">
            <span></span>
            <span></span>
        </div>
    </section>

    <section class="franchise-flow-program motion-reveal">
        <div>
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Programme franchise', 'theme-perso' ); ?></p>
            <h2><?php esc_html_e( 'Une méthode pour ouvrir une boutique naturelle, premium et cohérente.', 'theme-perso' ); ?></h2>
        </div>
        <p><?php esc_html_e( 'Le parcours candidat comprend le questionnaire, le dépôt du dossier, son analyse, les entretiens et les étapes contractuelles. Le COSM’ÉTHIQUE Phygital Franchise Lab est réservé aux nouveaux franchisés ayant signé leur contrat et intervient avant l’ouverture de leur boutique.', 'theme-perso' ); ?></p>
    </section>

    <section class="franchise-flow-section franchise-flow-timeline" aria-labelledby="franchise-process-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Processus', 'theme-perso' ); ?></p>
            <h2 id="franchise-process-title"><?php esc_html_e( 'Un parcours simple, étape par étape.', 'theme-perso' ); ?></h2>
        </div>
        <div class="franchise-flow-step-grid">
            <?php foreach ( $steps as $index => $step ) : ?>
                <article class="franchise-flow-card motion-reveal">
                    <strong><?php echo esc_html( (string) ( $index + 1 ) ); ?></strong>
                    <h3><?php echo esc_html( $step ); ?></h3>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="questionnaire-eligibilite" class="franchise-flow-section franchise-quiz-panel" aria-labelledby="quiz-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Questionnaire d’éligibilité', 'theme-perso' ); ?></p>
            <h2 id="quiz-title"><?php esc_html_e( 'Évaluez votre projet en moins de 2 minutes.', 'theme-perso' ); ?></h2>
        </div>
        <form class="franchise-quiz motion-reveal" data-franchise-eligibility-form>
            <div class="franchise-form-grid">
                <label><?php esc_html_e( 'Quel est votre nom ?', 'theme-perso' ); ?><input type="text" name="name" required aria-required="true"></label>
                <label><?php esc_html_e( 'Votre email', 'theme-perso' ); ?><input type="email" name="email" required aria-required="true"></label>
                <label><?php esc_html_e( 'Votre téléphone', 'theme-perso' ); ?><input type="tel" name="phone" required aria-required="true"></label>
                <label><?php esc_html_e( 'Votre ville', 'theme-perso' ); ?><input type="text" name="city" required aria-required="true"></label>
                <label><?php esc_html_e( 'Code postal', 'theme-perso' ); ?><input type="text" name="postcode" inputmode="numeric" autocomplete="postal-code" required aria-required="true"></label>
                <label><?php esc_html_e( 'Votre pays', 'theme-perso' ); ?><input type="text" name="country" required aria-required="true"></label>
                <label><?php esc_html_e( 'Statut actuel', 'theme-perso' ); ?>
                    <select name="current_status" required aria-required="true">
                        <option value=""><?php esc_html_e( 'Sélectionner', 'theme-perso' ); ?></option>
                        <option value="salarie"><?php esc_html_e( 'Salarié', 'theme-perso' ); ?></option>
                        <option value="entrepreneur"><?php esc_html_e( 'Entrepreneur', 'theme-perso' ); ?></option>
                        <option value="commercant"><?php esc_html_e( 'Commerçant', 'theme-perso' ); ?></option>
                        <option value="investisseur"><?php esc_html_e( 'Investisseur', 'theme-perso' ); ?></option>
                        <option value="reconversion"><?php esc_html_e( 'Reconversion professionnelle', 'theme-perso' ); ?></option>
                        <option value="autre"><?php esc_html_e( 'Autre', 'theme-perso' ); ?></option>
                    </select>
                </label>
                <fieldset>
                    <legend><?php esc_html_e( 'Disposez-vous d’un local ?', 'theme-perso' ); ?></legend>
                    <label><input type="radio" name="premises" value="yes" required aria-required="true"> <?php esc_html_e( 'Oui', 'theme-perso' ); ?></label>
                    <label><input type="radio" name="premises" value="no"> <?php esc_html_e( 'Non', 'theme-perso' ); ?></label>
                </fieldset>
                <label><?php esc_html_e( 'Surface du local', 'theme-perso' ); ?><input type="text" name="surface"></label>
                <label><?php esc_html_e( 'Horizon d’ouverture', 'theme-perso' ); ?>
                    <select name="opening_horizon" required aria-required="true">
                        <option value=""><?php esc_html_e( 'Sélectionner', 'theme-perso' ); ?></option>
                        <option value="moins-3-mois"><?php esc_html_e( 'Moins de 3 mois', 'theme-perso' ); ?></option>
                        <option value="3-6-mois"><?php esc_html_e( '3 à 6 mois', 'theme-perso' ); ?></option>
                        <option value="6-12-mois"><?php esc_html_e( '6 à 12 mois', 'theme-perso' ); ?></option>
                        <option value="plus-12-mois"><?php esc_html_e( 'Plus de 12 mois', 'theme-perso' ); ?></option>
                    </select>
                </label>
                <fieldset>
                    <legend><?php esc_html_e( 'Budget disponible', 'theme-perso' ); ?></legend>
                    <label><input type="radio" name="budget" value="low" required aria-required="true"> <?php esc_html_e( 'moins de 20 000€', 'theme-perso' ); ?></label>
                    <label><input type="radio" name="budget" value="medium"> <?php esc_html_e( '20-40k€', 'theme-perso' ); ?></label>
                    <label><input type="radio" name="budget" value="good"> <?php esc_html_e( '40-80k€', 'theme-perso' ); ?></label>
                    <label><input type="radio" name="budget" value="strong"> <?php esc_html_e( 'plus de 80k€', 'theme-perso' ); ?></label>
                </fieldset>
                <fieldset>
                    <legend><?php esc_html_e( 'Avez-vous déjà dirigé une entreprise ?', 'theme-perso' ); ?></legend>
                    <label><input type="radio" name="business" value="yes" required aria-required="true"> <?php esc_html_e( 'Oui', 'theme-perso' ); ?></label>
                    <label><input type="radio" name="business" value="no"> <?php esc_html_e( 'Non', 'theme-perso' ); ?></label>
                </fieldset>
                <label class="franchise-field-full"><?php esc_html_e( 'Pourquoi souhaitez-vous rejoindre Cosm’Éthique ?', 'theme-perso' ); ?><textarea name="motivation" rows="5" required aria-required="true"></textarea></label>
                <label class="franchise-field-full"><?php esc_html_e( 'Captcha', 'theme-perso' ); ?><input type="text" name="captcha" inputmode="numeric" autocomplete="off" data-franchise-captcha required aria-required="true" placeholder="<?php esc_attr_e( 'Combien font 7 + 2 ?', 'theme-perso' ); ?>"></label>
            </div>
            <button class="button button-primary" type="submit"><?php esc_html_e( 'Voir mon résultat', 'theme-perso' ); ?></button>
            <div class="franchise-quiz-result" data-franchise-eligibility-result hidden>
                <span aria-hidden="true">✓</span>
                <h3 data-compatible-text="<?php esc_attr_e( 'Votre profil semble compatible avec notre réseau.', 'theme-perso' ); ?>" data-adjust-text="<?php esc_attr_e( 'Votre projet nécessite encore quelques ajustements.', 'theme-perso' ); ?>"></h3>
                <p><?php esc_html_e( 'Vous pouvez maintenant déposer une candidature franchise complète et indépendante du formulaire Contact.', 'theme-perso' ); ?></p>
                <a class="button button-primary" href="<?php echo esc_url( $candidature_url ); ?>"><?php esc_html_e( 'Déposer ma candidature', 'theme-perso' ); ?></a>
            </div>
        </form>
    </section>

    <section id="criteres-eligibilite" class="franchise-flow-section franchise-criteria" aria-labelledby="criteria-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Critères d’éligibilité', 'theme-perso' ); ?></p>
            <h2 id="criteria-title"><?php esc_html_e( 'Les bases d’un projet solide.', 'theme-perso' ); ?></h2>
        </div>
        <div class="franchise-flow-grid">
            <?php foreach ( $criteria as $item ) : ?>
                <article class="franchise-flow-card motion-reveal">
                    <h3><?php echo esc_html( $item['value'] ); ?></h3>
                    <p><?php echo esc_html( $item['text'] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="franchise-flow-section franchise-investment-discovery" aria-labelledby="investment-discovery-title">
        <div class="franchise-investment-discovery__inner motion-reveal">
            <div>
                <p class="franchise-flow-kicker"><?php esc_html_e( 'Investissement franchise', 'theme-perso' ); ?></p>
                <h2 id="investment-discovery-title"><?php esc_html_e( 'Quel budget prévoir pour ouvrir votre franchise COSM’ÉTHIQUE ?', 'theme-perso' ); ?></h2>
                <p><?php esc_html_e( 'Découvrez les conditions financières pour rejoindre notre réseau : droit d’entrée, investissement initial, formation comprise et redevances d’exploitation.', 'theme-perso' ); ?></p>
            </div>
            <a class="button button-primary" href="<?php echo esc_url( $investment_url ); ?>"><?php esc_html_e( 'Découvrir l’investissement franchise', 'theme-perso' ); ?></a>
        </div>
    </section>

    <section class="franchise-flow-section franchise-benefits" aria-labelledby="benefits-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Avantages', 'theme-perso' ); ?></p>
            <h2 id="benefits-title"><?php esc_html_e( 'Rejoindre une marque pensée pour durer.', 'theme-perso' ); ?></h2>
        </div>
        <div class="franchise-flow-grid franchise-flow-grid--three">
            <?php foreach ( $benefits as $benefit ) : ?>
                <article class="franchise-flow-card motion-reveal"><h3><?php echo esc_html( $benefit ); ?></h3></article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="franchise-flow-section franchise-candidate-next" aria-labelledby="franchise-next-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Après le questionnaire', 'theme-perso' ); ?></p>
            <h2 id="franchise-next-title"><?php esc_html_e( 'Une orientation, puis une étude humaine du projet.', 'theme-perso' ); ?></h2>
        </div>
        <div class="franchise-flow-grid franchise-flow-grid--three">
            <article class="franchise-flow-card motion-reveal"><h3><?php esc_html_e( 'Résultat indicatif', 'theme-perso' ); ?></h3><p><?php esc_html_e( 'Le questionnaire fournit une première orientation automatisée, sans décision définitive.', 'theme-perso' ); ?></p></article>
            <article class="franchise-flow-card motion-reveal"><h3><?php esc_html_e( 'Candidature distincte', 'theme-perso' ); ?></h3><p><?php esc_html_e( 'Le dossier complet est transmis séparément et fait l’objet d’une analyse par l’équipe Franchise.', 'theme-perso' ); ?></p></article>
            <article class="franchise-flow-card motion-reveal"><h3><?php esc_html_e( 'Formation après signature', 'theme-perso' ); ?></h3><p><?php esc_html_e( 'Le Phygital Franchise Lab commence seulement après validation du projet et signature éventuelle du contrat.', 'theme-perso' ); ?></p></article>
        </div>
    </section>

    <section class="franchise-flow-section franchise-flow-faq" aria-labelledby="franchise-faq-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'FAQ Franchise', 'theme-perso' ); ?></p>
            <h2 id="franchise-faq-title"><?php esc_html_e( 'Les réponses avant de vous lancer.', 'theme-perso' ); ?></h2>
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
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Prochaine étape', 'theme-perso' ); ?></p>
            <h2><?php esc_html_e( 'Commencez par vérifier votre éligibilité.', 'theme-perso' ); ?></h2>
            <a class="button button-primary" href="#questionnaire-eligibilite"><?php esc_html_e( 'Commencer le questionnaire', 'theme-perso' ); ?></a>
            <a class="button franchise-flow-secondary" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Découvrir la boutique', 'theme-perso' ); ?></a>
        </div>
    </section>
</div>
