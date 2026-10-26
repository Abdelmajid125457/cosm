<?php
/**
 * Formulaire de candidature franchise partagé par les parcours franchise.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$args = wp_parse_args(
    $args ?? array(),
    array(
        'action_url'   => home_url( '/devenir-franchise/' ),
        'form_class'   => '',
        'id_prefix'    => 'franchise',
        'submit_label' => __( 'Envoyer ma candidature', 'theme-perso' ),
    )
);

$form_notice = function_exists( 'theme_perso_get_franchise_information_notice' ) ? theme_perso_get_franchise_information_notice() : null;
$privacy_url = home_url( '/politique-de-confidentialite/' );
$id_prefix   = sanitize_html_class( $args['id_prefix'] );
$form_class  = trim( 'cosmethique-form cosmethique-form--structured franchise-btob-form ' . $args['form_class'] );
$value       = static function ( $field ) {
    return function_exists( 'theme_perso_get_franchise_information_value' ) ? theme_perso_get_franchise_information_value( $field ) : '';
};
$error       = static function ( $field ) {
    return function_exists( 'theme_perso_get_franchise_information_error' ) ? theme_perso_get_franchise_information_error( $field ) : '';
};
?>

<p class="franchise-required-note"><span aria-hidden="true">*</span> <?php esc_html_e( 'Champs obligatoires', 'theme-perso' ); ?></p>
<?php if ( $form_notice ) : ?>
    <p class="franchise-form-status <?php echo 'error' === $form_notice['type'] ? 'is-error' : 'is-success'; ?>" role="<?php echo 'error' === $form_notice['type'] ? 'alert' : 'status'; ?>">
        <?php echo esc_html( $form_notice['message'] ); ?>
    </p>
<?php endif; ?>

<form class="<?php echo esc_attr( $form_class ); ?>" action="<?php echo esc_url( $args['action_url'] ); ?>" method="post" data-franchise-info-form data-demo-autofill-disabled="true" data-error-summary="<?php esc_attr_e( 'Merci de vérifier les champs indiqués avant d’envoyer votre candidature.', 'theme-perso' ); ?>" novalidate>
    <input type="hidden" name="cosmethique_form_type" value="franchise_information">
    <p class="franchise-form-status" data-form-status role="alert" aria-live="assertive"></p>

    <fieldset class="cosmethique-form-section">
        <legend><?php esc_html_e( 'Informations personnelles', 'theme-perso' ); ?></legend>
        <div class="cosmethique-form-grid">
            <div class="cosmethique-form-field">
                <label for="<?php echo esc_attr( $id_prefix ); ?>-last-name"><?php esc_html_e( 'Nom', 'theme-perso' ); ?> <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> <?php esc_html_e( '(obligatoire)', 'theme-perso' ); ?></span></label>
                <input id="<?php echo esc_attr( $id_prefix ); ?>-last-name" type="text" name="last_name" value="<?php echo esc_attr( $value( 'last_name' ) ); ?>" autocomplete="family-name" maxlength="80" required aria-required="true" aria-describedby="<?php echo esc_attr( $id_prefix ); ?>-last-name-error" aria-invalid="<?php echo $error( 'last_name' ) ? 'true' : 'false'; ?>" data-error-required="<?php esc_attr_e( 'Veuillez renseigner votre nom.', 'theme-perso' ); ?>">
                <span id="<?php echo esc_attr( $id_prefix ); ?>-last-name-error" class="form-error-message" data-field-error-for="<?php echo esc_attr( $id_prefix ); ?>-last-name"><?php echo esc_html( $error( 'last_name' ) ); ?></span>
            </div>
            <div class="cosmethique-form-field">
                <label for="<?php echo esc_attr( $id_prefix ); ?>-first-name"><?php esc_html_e( 'Prénom', 'theme-perso' ); ?> <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> <?php esc_html_e( '(obligatoire)', 'theme-perso' ); ?></span></label>
                <input id="<?php echo esc_attr( $id_prefix ); ?>-first-name" type="text" name="first_name" value="<?php echo esc_attr( $value( 'first_name' ) ); ?>" autocomplete="given-name" maxlength="80" required aria-required="true" aria-describedby="<?php echo esc_attr( $id_prefix ); ?>-first-name-error" aria-invalid="<?php echo $error( 'first_name' ) ? 'true' : 'false'; ?>" data-error-required="<?php esc_attr_e( 'Veuillez renseigner votre prénom.', 'theme-perso' ); ?>">
                <span id="<?php echo esc_attr( $id_prefix ); ?>-first-name-error" class="form-error-message" data-field-error-for="<?php echo esc_attr( $id_prefix ); ?>-first-name"><?php echo esc_html( $error( 'first_name' ) ); ?></span>
            </div>
            <div class="cosmethique-form-field">
                <label for="<?php echo esc_attr( $id_prefix ); ?>-email"><?php esc_html_e( 'E-mail', 'theme-perso' ); ?> <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> <?php esc_html_e( '(obligatoire)', 'theme-perso' ); ?></span></label>
                <input id="<?php echo esc_attr( $id_prefix ); ?>-email" type="email" name="email" value="<?php echo esc_attr( $value( 'email' ) ); ?>" autocomplete="email" maxlength="190" required aria-required="true" aria-describedby="<?php echo esc_attr( $id_prefix ); ?>-email-error" aria-invalid="<?php echo $error( 'email' ) ? 'true' : 'false'; ?>" data-error-required="<?php esc_attr_e( 'Veuillez renseigner votre adresse e-mail.', 'theme-perso' ); ?>" data-error-type="<?php esc_attr_e( 'Veuillez saisir une adresse e-mail valide.', 'theme-perso' ); ?>">
                <span id="<?php echo esc_attr( $id_prefix ); ?>-email-error" class="form-error-message" data-field-error-for="<?php echo esc_attr( $id_prefix ); ?>-email"><?php echo esc_html( $error( 'email' ) ); ?></span>
            </div>
            <div class="cosmethique-form-field">
                <label for="<?php echo esc_attr( $id_prefix ); ?>-phone"><?php esc_html_e( 'Téléphone', 'theme-perso' ); ?> <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> <?php esc_html_e( '(obligatoire)', 'theme-perso' ); ?></span></label>
                <input id="<?php echo esc_attr( $id_prefix ); ?>-phone" type="tel" name="phone" value="<?php echo esc_attr( $value( 'phone' ) ); ?>" autocomplete="tel" maxlength="20" pattern="[0-9+(). -]{6,20}" required aria-required="true" aria-describedby="<?php echo esc_attr( $id_prefix ); ?>-phone-error" aria-invalid="<?php echo $error( 'phone' ) ? 'true' : 'false'; ?>" data-error-required="<?php esc_attr_e( 'Veuillez renseigner votre téléphone.', 'theme-perso' ); ?>" data-error-pattern="<?php esc_attr_e( 'Veuillez renseigner un numéro de téléphone valide.', 'theme-perso' ); ?>">
                <span id="<?php echo esc_attr( $id_prefix ); ?>-phone-error" class="form-error-message" data-field-error-for="<?php echo esc_attr( $id_prefix ); ?>-phone"><?php echo esc_html( $error( 'phone' ) ); ?></span>
            </div>
        </div>
    </fieldset>

    <fieldset class="cosmethique-form-section">
        <legend><?php esc_html_e( 'Projet d’implantation', 'theme-perso' ); ?></legend>
        <p id="<?php echo esc_attr( $id_prefix ); ?>-location-help" class="cosmethique-form-section-help"><?php esc_html_e( 'Précisez la localisation envisagée pour votre future boutique COSM’ÉTHIQUE.', 'theme-perso' ); ?></p>
        <div class="cosmethique-form-grid">
            <div class="cosmethique-form-field">
                <label for="<?php echo esc_attr( $id_prefix ); ?>-implantation-city"><?php esc_html_e( 'Ville d’implantation souhaitée', 'theme-perso' ); ?> <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> <?php esc_html_e( '(obligatoire)', 'theme-perso' ); ?></span></label>
                <input id="<?php echo esc_attr( $id_prefix ); ?>-implantation-city" type="text" name="implantation_city" value="<?php echo esc_attr( $value( 'implantation_city' ) ); ?>" autocomplete="address-level2" maxlength="120" required aria-required="true" aria-describedby="<?php echo esc_attr( $id_prefix ); ?>-location-help <?php echo esc_attr( $id_prefix ); ?>-implantation-city-error" aria-invalid="<?php echo $error( 'implantation_city' ) ? 'true' : 'false'; ?>" data-error-required="<?php esc_attr_e( 'Veuillez renseigner la ville d’implantation souhaitée.', 'theme-perso' ); ?>">
                <span id="<?php echo esc_attr( $id_prefix ); ?>-implantation-city-error" class="form-error-message" data-field-error-for="<?php echo esc_attr( $id_prefix ); ?>-implantation-city"><?php echo esc_html( $error( 'implantation_city' ) ); ?></span>
            </div>
            <div class="cosmethique-form-field">
                <label for="<?php echo esc_attr( $id_prefix ); ?>-implantation-postcode"><?php esc_html_e( 'Code postal de la zone d’implantation souhaitée', 'theme-perso' ); ?> <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> <?php esc_html_e( '(obligatoire)', 'theme-perso' ); ?></span></label>
                <input id="<?php echo esc_attr( $id_prefix ); ?>-implantation-postcode" type="text" name="implantation_postcode" value="<?php echo esc_attr( $value( 'implantation_postcode' ) ); ?>" inputmode="numeric" autocomplete="postal-code" minlength="5" maxlength="5" pattern="[0-9]{5}" required aria-required="true" aria-describedby="<?php echo esc_attr( $id_prefix ); ?>-location-help <?php echo esc_attr( $id_prefix ); ?>-implantation-postcode-error" aria-invalid="<?php echo $error( 'implantation_postcode' ) ? 'true' : 'false'; ?>" data-error-required="<?php esc_attr_e( 'Veuillez renseigner le code postal de la zone d’implantation.', 'theme-perso' ); ?>" data-error-pattern="<?php esc_attr_e( 'Veuillez saisir un code postal valide à 5 chiffres.', 'theme-perso' ); ?>">
                <span id="<?php echo esc_attr( $id_prefix ); ?>-implantation-postcode-error" class="form-error-message" data-field-error-for="<?php echo esc_attr( $id_prefix ); ?>-implantation-postcode"><?php echo esc_html( $error( 'implantation_postcode' ) ); ?></span>
            </div>
            <div class="cosmethique-form-field cosmethique-field-full">
                <label for="<?php echo esc_attr( $id_prefix ); ?>-personal-contribution"><?php esc_html_e( 'Apport personnel disponible', 'theme-perso' ); ?> <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> <?php esc_html_e( '(obligatoire)', 'theme-perso' ); ?></span></label>
                <div class="franchise-currency-field">
                    <input id="<?php echo esc_attr( $id_prefix ); ?>-personal-contribution" type="number" name="personal_contribution" value="<?php echo esc_attr( $value( 'personal_contribution' ) ); ?>" inputmode="numeric" min="0" step="1000" placeholder="25000" required aria-required="true" aria-describedby="<?php echo esc_attr( $id_prefix ); ?>-contribution-help <?php echo esc_attr( $id_prefix ); ?>-personal-contribution-error" aria-invalid="<?php echo $error( 'personal_contribution' ) ? 'true' : 'false'; ?>" data-error-required="<?php esc_attr_e( 'Veuillez indiquer votre apport personnel disponible.', 'theme-perso' ); ?>" data-error-range="<?php esc_attr_e( 'Le montant de l’apport personnel ne peut pas être négatif.', 'theme-perso' ); ?>" data-error-step="<?php esc_attr_e( 'Veuillez saisir un montant par tranche de 1 000 €.', 'theme-perso' ); ?>">
                    <span aria-hidden="true">€</span>
                </div>
                <small id="<?php echo esc_attr( $id_prefix ); ?>-contribution-help"><?php esc_html_e( 'Indiquez le montant disponible, sans espace ni symbole monétaire. Cette information sert uniquement à qualifier le projet.', 'theme-perso' ); ?></small>
                <span id="<?php echo esc_attr( $id_prefix ); ?>-personal-contribution-error" class="form-error-message" data-field-error-for="<?php echo esc_attr( $id_prefix ); ?>-personal-contribution"><?php echo esc_html( $error( 'personal_contribution' ) ); ?></span>
            </div>
        </div>
    </fieldset>

    <fieldset class="cosmethique-form-section">
        <legend><?php esc_html_e( 'Votre parcours et votre projet', 'theme-perso' ); ?></legend>
        <div class="cosmethique-form-grid">
            <div class="cosmethique-form-field cosmethique-field-full">
                <label for="<?php echo esc_attr( $id_prefix ); ?>-professional-experience"><?php esc_html_e( 'Expérience professionnelle', 'theme-perso' ); ?></label>
                <textarea id="<?php echo esc_attr( $id_prefix ); ?>-professional-experience" name="professional_experience" rows="4" maxlength="2000" aria-describedby="<?php echo esc_attr( $id_prefix ); ?>-professional-experience-help"><?php echo esc_textarea( $value( 'professional_experience' ) ); ?></textarea>
                <small id="<?php echo esc_attr( $id_prefix ); ?>-professional-experience-help"><?php esc_html_e( 'Facultatif — présentez brièvement votre parcours, notamment en commerce, management ou entrepreneuriat.', 'theme-perso' ); ?></small>
            </div>
            <div class="cosmethique-form-field cosmethique-field-full">
                <label for="<?php echo esc_attr( $id_prefix ); ?>-project-message"><?php esc_html_e( 'Message / Présentation du projet', 'theme-perso' ); ?> <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> <?php esc_html_e( '(obligatoire)', 'theme-perso' ); ?></span></label>
                <textarea id="<?php echo esc_attr( $id_prefix ); ?>-project-message" name="project_message" rows="6" maxlength="4000" required aria-required="true" aria-describedby="<?php echo esc_attr( $id_prefix ); ?>-project-message-error" aria-invalid="<?php echo $error( 'project_message' ) ? 'true' : 'false'; ?>" data-error-required="<?php esc_attr_e( 'Veuillez présenter votre projet de franchise.', 'theme-perso' ); ?>"><?php echo esc_textarea( $value( 'project_message' ) ); ?></textarea>
                <span id="<?php echo esc_attr( $id_prefix ); ?>-project-message-error" class="form-error-message" data-field-error-for="<?php echo esc_attr( $id_prefix ); ?>-project-message"><?php echo esc_html( $error( 'project_message' ) ); ?></span>
            </div>
        </div>
    </fieldset>

    <fieldset class="cosmethique-form-section cosmethique-form-section--privacy">
        <legend><?php esc_html_e( 'Protection des données', 'theme-perso' ); ?></legend>
        <div class="cosmethique-form-field cosmethique-field-full">
            <p class="franchise-consent-heading"><?php esc_html_e( 'Consentement RGPD', 'theme-perso' ); ?> <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> <?php esc_html_e( '(obligatoire)', 'theme-perso' ); ?></span></p>
            <label class="checkbox-label" for="<?php echo esc_attr( $id_prefix ); ?>-privacy-consent">
                <input id="<?php echo esc_attr( $id_prefix ); ?>-privacy-consent" type="checkbox" name="privacy_consent" value="1" <?php checked( '1', $value( 'privacy_consent' ) ); ?> required aria-required="true" aria-describedby="<?php echo esc_attr( $id_prefix ); ?>-privacy-consent-error" aria-invalid="<?php echo $error( 'privacy_consent' ) ? 'true' : 'false'; ?>" data-error-required="<?php esc_attr_e( 'Veuillez accepter le traitement des données nécessaire à votre candidature.', 'theme-perso' ); ?>">
                <span><?php esc_html_e( 'J’accepte que les informations transmises soient utilisées par COSM’ÉTHIQUE pour étudier ma candidature franchise et me recontacter dans le cadre de mon projet.', 'theme-perso' ); ?> <a href="<?php echo esc_url( $privacy_url ); ?>"><?php esc_html_e( 'Consulter la politique de confidentialité', 'theme-perso' ); ?></a>.</span>
            </label>
            <span id="<?php echo esc_attr( $id_prefix ); ?>-privacy-consent-error" class="form-error-message" data-field-error-for="<?php echo esc_attr( $id_prefix ); ?>-privacy-consent"><?php echo esc_html( $error( 'privacy_consent' ) ); ?></span>
        </div>
    </fieldset>

    <?php wp_nonce_field( 'franchise_information', 'franchise_information_nonce' ); ?>
    <?php theme_perso_security_fields( 'franchise' ); ?>
    <button class="button button-primary franchise-submit-button" type="submit"><?php echo esc_html( $args['submit_label'] ); ?></button>
</form>
