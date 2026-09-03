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
                <label><?php esc_html_e( 'Nom', 'theme-perso' ); ?><input type="text" name="last_name" required></label>
                <label><?php esc_html_e( 'Prénom', 'theme-perso' ); ?><input type="text" name="first_name" required></label>
                <label><?php esc_html_e( 'Email', 'theme-perso' ); ?><input type="email" name="email" required></label>
                <label><?php esc_html_e( 'Téléphone', 'theme-perso' ); ?><input type="tel" name="phone" required></label>
                <label><?php esc_html_e( 'Ville', 'theme-perso' ); ?><input type="text" name="city" required></label>
                <label><?php esc_html_e( 'Pays', 'theme-perso' ); ?><input type="text" name="country" required></label>
                <label class="franchise-field-full"><?php esc_html_e( 'Adresse', 'theme-perso' ); ?><input type="text" name="address" required></label>
                <label><?php esc_html_e( 'CV', 'theme-perso' ); ?><input type="file" name="cv" accept=".pdf,.doc,.docx" required></label>
                <label><?php esc_html_e( 'Lettre de motivation', 'theme-perso' ); ?><input type="file" name="letter" accept=".pdf,.doc,.docx" required></label>
                <label><?php esc_html_e( 'Photo du local', 'theme-perso' ); ?><input type="file" name="premises_photo" accept="image/*"></label>
                <label><?php esc_html_e( 'Budget', 'theme-perso' ); ?><input type="text" name="budget" required></label>
                <label class="franchise-field-full"><?php esc_html_e( 'Message', 'theme-perso' ); ?><textarea name="message" rows="6" required></textarea></label>
                <label class="franchise-field-full"><?php esc_html_e( 'Captcha', 'theme-perso' ); ?><input type="text" name="captcha" inputmode="numeric" autocomplete="off" data-franchise-captcha required placeholder="<?php esc_attr_e( 'Combien font 7 + 2 ?', 'theme-perso' ); ?>"></label>
                <label class="franchise-rgpd franchise-field-full"><input type="checkbox" name="consent" required> <?php esc_html_e( 'J’accepte que Cosm’Éthique traite mes informations afin d’étudier ma candidature franchise.', 'theme-perso' ); ?></label>
            </div>
            <?php theme_perso_security_fields( 'franchise_candidature' ); ?>
            <button class="button button-primary" type="submit"><?php esc_html_e( 'Envoyer ma candidature', 'theme-perso' ); ?></button>
            <p class="franchise-form-status" aria-live="polite"></p>
        </form>
    </section>
</div>
