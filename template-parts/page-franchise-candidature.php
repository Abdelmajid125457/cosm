<?php
/**
 * Formulaire candidature franchise indépendant.
 *
 * @package Theme_Perso
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$confirmation_url = home_url( '/franchise/confirmation/' );
?>

<div class="franchise-flow franchise-application-page" data-franchise-application-page>
    <section class="franchise-flow-hero franchise-application-hero" aria-labelledby="franchise-application-title">
        <div class="franchise-flow-copy motion-reveal motion-reveal--left">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Candidature franchise', 'theme-perso' ); ?></p>
            <h1 id="franchise-application-title"><?php esc_html_e( 'Présentez votre projet à Cosm’Éthique.', 'theme-perso' ); ?></h1>
            <p><?php esc_html_e( 'Ce formulaire est exclusivement dédié aux candidatures franchise. Il ne remplace pas le formulaire Contact classique.', 'theme-perso' ); ?></p>
        </div>
        <aside class="franchise-application-aside motion-reveal motion-reveal--right">
            <strong><?php esc_html_e( 'Parcours candidat', 'theme-perso' ); ?></strong>
            <ol>
                <li><?php esc_html_e( 'Questionnaire d’éligibilité', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Dossier de candidature', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Analyse par l’équipe Franchise', 'theme-perso' ); ?></li>
                <li><?php esc_html_e( 'Retour sous quelques jours', 'theme-perso' ); ?></li>
            </ol>
        </aside>
    </section>

    <section class="franchise-flow-section franchise-application-form-section" aria-labelledby="franchise-form-title">
        <div class="franchise-flow-heading motion-reveal">
            <p class="franchise-flow-kicker"><?php esc_html_e( 'Dossier franchise', 'theme-perso' ); ?></p>
            <h2 id="franchise-form-title"><?php esc_html_e( 'Déposez votre candidature complète.', 'theme-perso' ); ?></h2>
        </div>
        <form class="franchise-application-form motion-reveal" action="<?php echo esc_url( $confirmation_url ); ?>" method="post" enctype="multipart/form-data" data-franchise-application-form>
            <div class="franchise-form-grid">
                <label><?php esc_html_e( 'Nom', 'theme-perso' ); ?><input type="text" name="last_name" required aria-required="true"></label>
                <label><?php esc_html_e( 'Prénom', 'theme-perso' ); ?><input type="text" name="first_name" required aria-required="true"></label>
                <label><?php esc_html_e( 'Email', 'theme-perso' ); ?><input type="email" name="email" required aria-required="true"></label>
                <label><?php esc_html_e( 'Téléphone', 'theme-perso' ); ?><input type="tel" name="phone" required aria-required="true"></label>
                <label><?php esc_html_e( 'Ville', 'theme-perso' ); ?><input type="text" name="city" required aria-required="true"></label>
                <label><?php esc_html_e( 'Région souhaitée', 'theme-perso' ); ?><input type="text" name="desired_region" required aria-required="true"></label>
                <label><?php esc_html_e( 'Code postal', 'theme-perso' ); ?><input type="text" name="postcode" inputmode="numeric" autocomplete="postal-code" required aria-required="true"></label>
                <label><?php esc_html_e( 'Pays', 'theme-perso' ); ?><input type="text" name="country" required aria-required="true"></label>
                <label class="franchise-field-full"><?php esc_html_e( 'Adresse', 'theme-perso' ); ?><input type="text" name="address" required aria-required="true"></label>
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
                <label><?php esc_html_e( 'Expérience commerce / beauté / management', 'theme-perso' ); ?>
                    <select name="business_experience" required aria-required="true">
                        <option value=""><?php esc_html_e( 'Sélectionner', 'theme-perso' ); ?></option>
                        <option value="commerce"><?php esc_html_e( 'Commerce', 'theme-perso' ); ?></option>
                        <option value="beaute-cosmetique"><?php esc_html_e( 'Beauté / cosmétique', 'theme-perso' ); ?></option>
                        <option value="management"><?php esc_html_e( 'Management', 'theme-perso' ); ?></option>
                        <option value="multi-experience"><?php esc_html_e( 'Plusieurs expériences', 'theme-perso' ); ?></option>
                        <option value="aucune"><?php esc_html_e( 'Aucune expérience directe', 'theme-perso' ); ?></option>
                    </select>
                </label>
                <label><?php esc_html_e( 'Horizon d’ouverture', 'theme-perso' ); ?>
                    <select name="opening_horizon" required aria-required="true">
                        <option value=""><?php esc_html_e( 'Sélectionner', 'theme-perso' ); ?></option>
                        <option value="moins-3-mois"><?php esc_html_e( 'Moins de 3 mois', 'theme-perso' ); ?></option>
                        <option value="3-6-mois"><?php esc_html_e( '3 à 6 mois', 'theme-perso' ); ?></option>
                        <option value="6-12-mois"><?php esc_html_e( '6 à 12 mois', 'theme-perso' ); ?></option>
                        <option value="plus-12-mois"><?php esc_html_e( 'Plus de 12 mois', 'theme-perso' ); ?></option>
                    </select>
                </label>
                <label><?php esc_html_e( 'CV', 'theme-perso' ); ?><input type="file" name="cv" accept=".pdf,.doc,.docx" required aria-required="true"></label>
                <label><?php esc_html_e( 'Lettre de motivation', 'theme-perso' ); ?><input type="file" name="letter" accept=".pdf,.doc,.docx" required aria-required="true"></label>
                <label><?php esc_html_e( 'Photo du local', 'theme-perso' ); ?><input type="file" name="premises_photo" accept="image/*"></label>
                <label><?php esc_html_e( 'Apport personnel estimé', 'theme-perso' ); ?>
                    <select name="budget" required aria-required="true">
                        <option value=""><?php esc_html_e( 'Sélectionner', 'theme-perso' ); ?></option>
                        <option value="moins-15000"><?php esc_html_e( 'Moins de 15 000 €', 'theme-perso' ); ?></option>
                        <option value="15000-30000"><?php esc_html_e( '15 000 à 30 000 €', 'theme-perso' ); ?></option>
                        <option value="30000-50000"><?php esc_html_e( '30 000 à 50 000 €', 'theme-perso' ); ?></option>
                        <option value="plus-50000"><?php esc_html_e( 'Plus de 50 000 €', 'theme-perso' ); ?></option>
                    </select>
                </label>
                <label><?php esc_html_e( 'Local déjà identifié ?', 'theme-perso' ); ?>
                    <select name="premises_status" required aria-required="true">
                        <option value=""><?php esc_html_e( 'Sélectionner', 'theme-perso' ); ?></option>
                        <option value="oui"><?php esc_html_e( 'Oui', 'theme-perso' ); ?></option>
                        <option value="non"><?php esc_html_e( 'Non', 'theme-perso' ); ?></option>
                        <option value="recherche"><?php esc_html_e( 'En recherche', 'theme-perso' ); ?></option>
                    </select>
                </label>
                <label class="franchise-field-full"><?php esc_html_e( 'Site web ou LinkedIn', 'theme-perso' ); ?><input type="url" name="website" placeholder="https://"></label>
                <label class="franchise-field-full"><?php esc_html_e( 'Motivation et présentation du projet', 'theme-perso' ); ?><textarea name="message" rows="6" required aria-required="true"></textarea></label>
                <label class="franchise-field-full"><?php esc_html_e( 'Captcha', 'theme-perso' ); ?><input type="text" name="captcha" inputmode="numeric" autocomplete="off" data-franchise-captcha required aria-required="true" placeholder="<?php esc_attr_e( 'Combien font 7 + 2 ?', 'theme-perso' ); ?>"></label>
                <label class="franchise-rgpd franchise-field-full"><input type="checkbox" name="consent" required aria-required="true"> <?php esc_html_e( 'J’accepte que Cosm’Éthique traite mes informations afin d’étudier ma candidature franchise.', 'theme-perso' ); ?></label>
            </div>
            <?php theme_perso_security_fields( 'franchise_candidature' ); ?>
            <button class="button button-primary" type="submit"><?php esc_html_e( 'Envoyer ma candidature', 'theme-perso' ); ?></button>
            <p class="franchise-form-status" aria-live="polite"></p>
        </form>
    </section>
</div>
