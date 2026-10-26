<?php
/**
 * Formulaire de candidature franchise indépendant du formulaire Contact.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$application_url = home_url( '/franchise/candidature/' );
?>

<div class="franchise-flow franchise-application-page" data-franchise-application-page>
    <section class="franchise-flow-hero franchise-application-hero" aria-labelledby="franchise-application-title">
        <div class="franchise-flow-copy motion-reveal motion-reveal--left">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Candidature franchise', 'theme-perso' ); ?></p>
            <h1 id="franchise-application-title"><?php esc_html_e( 'Présentez votre projet à Cosm’Éthique.', 'theme-perso' ); ?></h1>
            <p><?php esc_html_e( 'Ce formulaire est exclusivement dédié aux candidatures franchise. La formation Phygital Franchise Lab intervient uniquement après validation de la candidature et signature éventuelle du contrat.', 'theme-perso' ); ?></p>
        </div>
        <aside class="franchise-application-aside motion-reveal motion-reveal--right" aria-labelledby="candidate-path-title">
            <strong id="candidate-path-title"><?php esc_html_e( 'Parcours candidat', 'theme-perso' ); ?></strong>
            <ol>
                <li><?php esc_html_e( 'Questionnaire d’éligibilité', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Dépôt de candidature', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Analyse du dossier', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Entretien et étapes contractuelles', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Signature éventuelle du contrat', 'theme-perso' ); ?></li>
            </ol>
        </aside>
    </section>

    <section class="franchise-flow-section franchise-application-form-section" aria-labelledby="franchise-form-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Dossier franchise', 'theme-perso' ); ?></p>
            <h2 id="franchise-form-title"><?php esc_html_e( 'Déposez votre candidature.', 'theme-perso' ); ?></h2>
            <p><?php esc_html_e( 'Les dix informations ci-dessous suffisent à une première étude structurée de votre projet. Aucun CV ni document personnel n’est exigé à ce stade.', 'theme-perso' ); ?></p>
        </div>
        <?php
        get_template_part(
            'template-parts/franchise',
            'candidate-form',
            array(
                'action_url' => $application_url,
                'form_class' => 'franchise-application-form motion-reveal',
                'id_prefix'  => 'franchise-application',
            )
        );
        ?>
    </section>
</div>
