<?php
/**
 * Page d'information financière du parcours franchise.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$asset = function( $folder, $file ) {
    return get_template_directory_uri() . '/assets/' . trim( $folder, '/' ) . '/' . ltrim( $file, '/' );
};

$eligibility_url = home_url( '/franchise/eligibilite/' );
$candidate_url   = home_url( '/franchise/candidature/' );

$financial_conditions = array(
    array(
        'label'       => __( 'Droit d’entrée', 'theme-perso' ),
        'value'       => __( '10 000 € HT', 'theme-perso' ),
        'description' => __( 'Paiement unique lors de l’entrée dans le réseau, selon le contrat. Il comprend l’accès au concept, le savoir-faire, les supports et la formation initiale.', 'theme-perso' ),
    ),
    array(
        'label'       => __( 'Investissement global estimé', 'theme-perso' ),
        'value'       => __( '50 000 € HT', 'theme-perso' ),
        'description' => __( 'Budget initial prévisionnel pour ouvrir une boutique. Le droit d’entrée de 10 000 € HT est déjà compris dans ce montant et ne doit pas être ajouté une seconde fois.', 'theme-perso' ),
    ),
    array(
        'label'       => __( 'Redevance d’exploitation', 'theme-perso' ),
        'value'       => __( '5 % du CA HT', 'theme-perso' ),
        'description' => __( 'Calcul mensuel selon le chiffre d’affaires réel de la boutique et paiement aux échéances prévues au contrat.', 'theme-perso' ),
    ),
    array(
        'label'       => __( 'Formation initiale', 'theme-perso' ),
        'value'       => __( 'Incluse', 'theme-perso' ),
        'description' => __( 'Aucun tarif de formation supplémentaire. Le programme est obligatoire pour les nouveaux franchisés après signature du contrat.', 'theme-perso' ),
    ),
);

$budget_items = array(
    __( 'Droit d’entrée, formation incluse', 'theme-perso' )             => '10 000 €',
    __( 'Aménagement de la boutique', 'theme-perso' )                   => '12 000 €',
    __( 'Mobilier et présentoirs', 'theme-perso' )                      => '8 000 €',
    __( 'Stock initial de cosmétiques', 'theme-perso' )                 => '8 000 €',
    __( 'Équipements et caisse', 'theme-perso' )                        => '5 000 €',
    __( 'Communication de lancement et trésorerie', 'theme-perso' )     => '7 000 €',
);

$training_steps = array(
    array( 'title' => __( 'Formation digitale avec LearnyBox', 'theme-perso' ), 'text' => __( 'Culture de marque, gammes de cosmétiques, lecture INCI, certifications et techniques de conseil client.', 'theme-perso' ) ),
    array( 'title' => __( 'Serious game de 2 h 30', 'theme-perso' ), 'text' => __( 'Simulations professionnelles autour des clients, des stocks et de la gestion de boutique.', 'theme-perso' ) ),
    array( 'title' => __( 'Immersion pratique de six jours à Paris', 'theme-perso' ), 'text' => __( 'Apprentissage en boutique pilote, avec deux participants maximum par session.', 'theme-perso' ) ),
    array( 'title' => __( 'Évaluation des compétences', 'theme-perso' ), 'text' => __( 'Score minimal de 80/100, sans faute critique, avant l’ouverture.', 'theme-perso' ) ),
    array( 'title' => __( 'Accompagnement après ouverture', 'theme-perso' ), 'text' => __( 'Points de suivi opérationnels à J+30 et J+90.', 'theme-perso' ) ),
);

$candidate_steps = array(
    __( 'Vérifier son éligibilité', 'theme-perso' ),
    __( 'Déposer sa candidature', 'theme-perso' ),
    __( 'Faire analyser son dossier et participer à un entretien', 'theme-perso' ),
    __( 'Signer le contrat de franchise', 'theme-perso' ),
    __( 'Suivre la formation initiale avant l’ouverture', 'theme-perso' ),
);

$faq = array(
    __( 'Les 50 000 € incluent-ils le droit d’entrée ?', 'theme-perso' ) => __( 'Oui, le droit d’entrée de 10 000 € est déjà compris dans l’investissement global estimé à 50 000 €.', 'theme-perso' ),
    __( 'La formation est-elle payante en supplément ?', 'theme-perso' ) => __( 'Non, le programme de formation initiale est inclus dans le droit d’entrée.', 'theme-perso' ),
    __( 'Quand la redevance est-elle payée ?', 'theme-perso' ) => __( 'Elle est calculée mensuellement sur le chiffre d’affaires HT réalisé, selon les échéances contractuelles.', 'theme-perso' ),
    __( 'Faut-il obligatoirement disposer de 50 000 € d’apport personnel ?', 'theme-perso' ) => __( 'Non, l’investissement global ne doit pas être confondu avec l’apport personnel. Le montage financier du projet est étudié lors de la candidature.', 'theme-perso' ),
);
?>

<div class="franchise-flow franchise-investment-page" data-franchise-investment-page>
    <section class="franchise-flow-hero franchise-investment-hero" aria-labelledby="franchise-investment-title">
        <div class="franchise-flow-copy motion-reveal motion-reveal--left">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Investissement franchise', 'theme-perso' ); ?></p>
            <h1 id="franchise-investment-title"><?php esc_html_e( 'Ouvrez votre boutique COSM’ÉTHIQUE', 'theme-perso' ); ?></h1>
            <p><?php esc_html_e( 'Découvrez l’investissement nécessaire pour rejoindre notre réseau de franchises de cosmétiques naturels et bénéficier d’un concept structuré, d’une formation initiale complète et d’un accompagnement personnalisé.', 'theme-perso' ); ?></p>
            <div class="franchise-flow-actions">
                <a class="button button-primary" href="#conditions-financieres"><?php esc_html_e( 'Voir les conditions financières', 'theme-perso' ); ?></a>
                <a class="button franchise-flow-secondary" href="<?php echo esc_url( $eligibility_url ); ?>"><?php esc_html_e( 'Vérifier mon éligibilité', 'theme-perso' ); ?></a>
            </div>
        </div>
        <div class="franchise-investment-hero__visual motion-reveal motion-reveal--right">
            <img src="<?php echo esc_url( $asset( 'home', 'home-savoir-faire-cosmethique.png' ) ); ?>" alt="Sélection de soins naturels COSM’ÉTHIQUE présentée dans un univers boutique premium" loading="eager" fetchpriority="high">
            <div class="franchise-investment-hero__summary" aria-label="Résumé des conditions financières">
                <span><strong>50 000 € HT</strong><?php esc_html_e( 'Investissement global estimé', 'theme-perso' ); ?></span>
                <span><strong>10 000 € HT</strong><?php esc_html_e( 'Droit d’entrée déjà inclus', 'theme-perso' ); ?></span>
                <span><strong>5 %</strong><?php esc_html_e( 'Redevance mensuelle du CA HT', 'theme-perso' ); ?></span>
            </div>
        </div>
    </section>

    <section id="conditions-financieres" class="franchise-flow-section franchise-investment-conditions" aria-labelledby="financial-conditions-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Conditions financières', 'theme-perso' ); ?></p>
            <h2 id="financial-conditions-title"><?php esc_html_e( 'Un modèle transparent, sans double comptage.', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Tous les montants du modèle prévisionnel ci-dessous sont présentés hors taxes.', 'theme-perso' ); ?></p>
        </div>
        <div class="franchise-investment-card-grid">
            <?php foreach ( $financial_conditions as $index => $condition ) : ?>
                <article class="franchise-investment-card motion-reveal">
                    <span aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
                    <p><?php echo esc_html( $condition['label'] ); ?></p>
                    <h3><?php echo esc_html( $condition['value'] ); ?></h3>
                    <p><?php echo esc_html( $condition['description'] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="franchise-flow-section franchise-investment-budget" aria-labelledby="investment-breakdown-title">
        <div class="franchise-investment-budget__copy motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Budget prévisionnel', 'theme-perso' ); ?></p>
            <h2 id="investment-breakdown-title"><?php esc_html_e( 'Comment se répartissent les 50 000 € ?', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Cette répartition constitue un modèle budgétaire prévisionnel hors taxes. Elle permet de comprendre les principaux postes avant l’étude personnalisée du projet.', 'theme-perso' ); ?></p>
            <div class="franchise-investment-note">
                <strong><?php esc_html_e( 'À retenir', 'theme-perso' ); ?></strong>
                <p><?php esc_html_e( 'Le droit d’entrée de 10 000 € HT est inclus dans les 50 000 € HT. Ces deux montants ne s’additionnent pas.', 'theme-perso' ); ?></p>
            </div>
        </div>
        <div class="franchise-investment-table-wrap motion-reveal">
            <table class="franchise-investment-table">
                <caption class="screen-reader-text"><?php esc_html_e( 'Répartition prévisionnelle de l’investissement initial de 50 000 euros hors taxes', 'theme-perso' ); ?></caption>
                <thead><tr><th scope="col"><?php esc_html_e( 'Poste', 'theme-perso' ); ?></th><th scope="col"><?php esc_html_e( 'Budget HT', 'theme-perso' ); ?></th></tr></thead>
                <tbody>
                    <?php foreach ( $budget_items as $label => $amount ) : ?>
                        <tr><th scope="row"><?php echo esc_html( $label ); ?></th><td><?php echo esc_html( $amount ); ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot><tr><th scope="row"><?php esc_html_e( 'Total', 'theme-perso' ); ?></th><td>50 000 €</td></tr></tfoot>
            </table>
        </div>
    </section>

    <section class="franchise-flow-section franchise-investment-training" aria-labelledby="investment-training-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Phygital Franchise Lab', 'theme-perso' ); ?></p>
            <h2 id="investment-training-title"><?php esc_html_e( 'Une formation complète pour préparer votre réussite', 'theme-perso' ); ?></h2>
        </div>
        <ol class="franchise-investment-training-list">
            <?php foreach ( $training_steps as $index => $step ) : ?>
                <li class="motion-reveal">
                    <span aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
                    <div><h3><?php echo esc_html( $step['title'] ); ?></h3><p><?php echo esc_html( $step['text'] ); ?></p></div>
                </li>
            <?php endforeach; ?>
        </ol>
        <div class="franchise-investment-training-included motion-reveal">
            <strong><?php esc_html_e( 'Formation initiale obligatoire incluse dans les 10 000 € HT du droit d’entrée.', 'theme-perso' ); ?></strong>
            <p><?php esc_html_e( 'Le budget interne de 7 528 € HT consacré à la conception et au lancement du programme n’est pas facturé au franchisé. Il n’est ajouté ni à l’investissement initial ni à la facture du candidat.', 'theme-perso' ); ?></p>
        </div>
    </section>

    <section class="franchise-flow-section franchise-investment-royalty" aria-labelledby="royalty-title">
        <div class="franchise-investment-royalty__copy motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Redevance d’exploitation', 'theme-perso' ); ?></p>
            <h2 id="royalty-title"><?php esc_html_e( 'Une redevance adaptée à votre activité', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'COSM’ÉTHIQUE perçoit chaque mois une redevance représentant 5 % du chiffre d’affaires HT réellement réalisé par la boutique.', 'theme-perso' ); ?></p>
            <p><?php esc_html_e( 'Exemple : pour 20 000 € HT de chiffre d’affaires mensuel, la redevance est de 1 000 € HT. Il reste 19 000 € avant les autres charges : ce montant ne constitue pas le bénéfice du franchisé.', 'theme-perso' ); ?></p>
        </div>
        <div class="franchise-royalty-calculator motion-reveal" data-franchise-royalty-calculator>
            <label for="franchise-monthly-revenue"><?php esc_html_e( 'Votre chiffre d’affaires mensuel HT', 'theme-perso' ); ?></label>
            <div class="franchise-royalty-calculator__input"><input id="franchise-monthly-revenue" type="number" min="0" step="100" value="20000" inputmode="decimal" data-franchise-revenue><span aria-hidden="true">€</span></div>
            <div class="franchise-royalty-calculator__results" aria-live="polite" aria-atomic="true">
                <p><span><?php esc_html_e( 'Redevance de 5 %', 'theme-perso' ); ?></span><output data-franchise-royalty>1 000 € HT</output></p>
                <p><span><?php esc_html_e( 'CA restant avant autres charges', 'theme-perso' ); ?></span><output data-franchise-remainder>19 000 € HT</output></p>
            </div>
            <small><?php esc_html_e( 'Simulation indicative. Le chiffre d’affaires restant ne correspond pas au bénéfice.', 'theme-perso' ); ?></small>
        </div>
    </section>

    <section class="franchise-flow-section franchise-investment-journey" aria-labelledby="investment-journey-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Votre parcours', 'theme-perso' ); ?></p>
            <h2 id="investment-journey-title"><?php esc_html_e( 'Cinq étapes avant l’ouverture.', 'theme-perso' ); ?></h2>
        </div>
        <ol class="franchise-investment-journey-list">
            <?php foreach ( $candidate_steps as $index => $step ) : ?>
                <li class="motion-reveal"><span><?php echo esc_html( (string) ( $index + 1 ) ); ?></span><p><?php echo esc_html( $step ); ?></p></li>
            <?php endforeach; ?>
        </ol>
        <div class="franchise-flow-actions franchise-investment-actions motion-reveal">
            <a class="button franchise-flow-secondary" href="<?php echo esc_url( $eligibility_url ); ?>"><?php esc_html_e( 'Vérifier mon éligibilité', 'theme-perso' ); ?></a>
            <a class="button button-primary" href="<?php echo esc_url( $candidate_url ); ?>"><?php esc_html_e( 'Déposer ma candidature', 'theme-perso' ); ?></a>
        </div>
    </section>

    <section class="franchise-flow-section franchise-flow-faq franchise-investment-faq" aria-labelledby="investment-faq-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'FAQ financière', 'theme-perso' ); ?></p>
            <h2 id="investment-faq-title"><?php esc_html_e( 'Comprendre le modèle avant de candidater.', 'theme-perso' ); ?></h2>
        </div>
        <div class="franchise-flow-faq-list">
            <?php foreach ( $faq as $question => $answer ) : ?>
                <details class="franchise-flow-card motion-reveal"><summary><?php echo esc_html( $question ); ?></summary><p><?php echo esc_html( $answer ); ?></p></details>
            <?php endforeach; ?>
        </div>
    </section>
</div>
