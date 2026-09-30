<section class="rich-section two-columns">
    <div>
        <h2>Nous écrire</h2>
        <p>Une question sur une commande, un produit ou une routine beauté? Notre équipe vous répond avec attention.</p>
        <div class="contact-details">
            <p><strong>Email</strong><br>contact@cosmethique.fr</p>
            <p><strong>Service client</strong><br>Du lundi au vendredi, 9h-18h</p>
            <p><strong>Adresse</strong><br>12 rue des Botanistes, 75002 Paris</p>
        </div>
    </div>
    <div class="form-card form-card--premium-contact" data-demo-autofill="contact">
        <?php $contact_notice = function_exists( 'theme_perso_get_contact_form_notice' ) ? theme_perso_get_contact_form_notice() : null; ?>
        <h3><?php esc_html_e( 'Votre demande', 'theme-perso' ); ?></h3>
        <p><?php esc_html_e( 'Choisissez le bon type de demande pour être orienté vers la bonne équipe.', 'theme-perso' ); ?></p>
        <?php if ( $contact_notice ) : ?>
            <p class="franchise-form-status <?php echo 'error' === $contact_notice['type'] ? 'is-error' : 'is-success'; ?>" role="<?php echo 'error' === $contact_notice['type'] ? 'alert' : 'status'; ?>">
                <?php echo esc_html( $contact_notice['message'] ); ?>
            </p>
        <?php endif; ?>
        <form class="cosmethique-form cosmethique-form--structured" action="<?php echo esc_url( home_url( '/contact/' ) ); ?>" method="post" novalidate>
            <input type="hidden" name="cosmethique_form_type" value="contact_general">
            <div class="cosmethique-form-grid">
                <label><?php esc_html_e( 'Prénom', 'theme-perso' ); ?><input type="text" name="first_name" autocomplete="given-name" placeholder="<?php esc_attr_e( 'Claire', 'theme-perso' ); ?>" required aria-required="true"></label>
                <label><?php esc_html_e( 'Nom', 'theme-perso' ); ?><input type="text" name="last_name" autocomplete="family-name" placeholder="<?php esc_attr_e( 'Lefebvre', 'theme-perso' ); ?>" required aria-required="true"></label>
                <label><?php esc_html_e( 'Email', 'theme-perso' ); ?><input type="email" name="email" autocomplete="email" placeholder="<?php esc_attr_e( 'vous@email.fr', 'theme-perso' ); ?>" required aria-required="true"></label>
                <label><?php esc_html_e( 'Téléphone optionnel', 'theme-perso' ); ?><input type="tel" name="phone" autocomplete="tel" placeholder="<?php esc_attr_e( '06 12 34 56 78', 'theme-perso' ); ?>"></label>
                <label><?php esc_html_e( 'Sujet de la demande', 'theme-perso' ); ?><input type="text" name="subject" placeholder="<?php esc_attr_e( 'Ex : question sur une commande', 'theme-perso' ); ?>" required aria-required="true"></label>
                <label><?php esc_html_e( 'Type de demande', 'theme-perso' ); ?>
                    <select name="request_type" required aria-required="true">
                        <option value=""><?php esc_html_e( 'Sélectionner une option', 'theme-perso' ); ?></option>
                        <option value="service-client"><?php esc_html_e( 'Service client', 'theme-perso' ); ?></option>
                        <option value="commande"><?php esc_html_e( 'Commande', 'theme-perso' ); ?></option>
                        <option value="produit"><?php esc_html_e( 'Produit', 'theme-perso' ); ?></option>
                        <option value="partenariat"><?php esc_html_e( 'Partenariat', 'theme-perso' ); ?></option>
                        <option value="presse"><?php esc_html_e( 'Presse', 'theme-perso' ); ?></option>
                        <option value="franchise"><?php esc_html_e( 'Franchise', 'theme-perso' ); ?></option>
                        <option value="autre"><?php esc_html_e( 'Autre', 'theme-perso' ); ?></option>
                    </select>
                </label>
                <label class="cosmethique-field-full"><?php esc_html_e( 'Message', 'theme-perso' ); ?><textarea name="message" rows="6" placeholder="<?php esc_attr_e( 'Décrivez votre demande avec les informations utiles.', 'theme-perso' ); ?>" required aria-required="true"></textarea></label>
                <label class="checkbox-label cosmethique-field-full"><input type="checkbox" name="consent" required aria-required="true"> <?php esc_html_e( 'J’accepte que mes données soient utilisées pour être recontacté dans le cadre de ma demande.', 'theme-perso' ); ?></label>
            </div>
            <?php wp_nonce_field( 'contact_general', 'contact_general_nonce' ); ?>
            <?php theme_perso_security_fields( 'contact' ); ?>
            <button class="button button-primary" type="submit"><?php esc_html_e( 'Envoyer ma demande', 'theme-perso' ); ?></button>
        </form>
    </div>
</section>

<section class="contact-social-section" aria-labelledby="contact-social-title">
    <div class="section-heading">
        <p class="eyebrow"><?php esc_html_e( 'Réseaux sociaux', 'theme-perso' ); ?></p>
        <h2 id="contact-social-title"><?php esc_html_e( 'Suivez-nous', 'theme-perso' ); ?></h2>
    </div>
    <div class="contact-social-grid">
        <?php foreach ( theme_perso_social_links() as $network => $social ) : ?>
            <a class="contact-social-card social-link--<?php echo esc_attr( $network ); ?>" href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $social['tooltip'] ); ?>">
                <span class="contact-social-icon"><?php echo theme_perso_social_icon( $network ); ?></span>
                <strong><?php echo esc_html( $social['label'] ); ?></strong>
                <span><?php esc_html_e( 'Découvrez notre univers beauté', 'theme-perso' ); ?></span>
            </a>
        <?php endforeach; ?>
    </div>
</section>
