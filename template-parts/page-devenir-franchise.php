<?php
$franchise_eligibility_url = home_url( '/franchise/eligibilite/' );
$franchise_training_url    = home_url( '/franchise/formation/' );
$franchise_form_notice     = function_exists( 'theme_perso_get_franchise_information_notice' ) ? theme_perso_get_franchise_information_notice() : null;
$franchise_privacy_url     = home_url( '/politique-de-confidentialite/' );
$franchise_value           = static function ( $field ) {
    return function_exists( 'theme_perso_get_franchise_information_value' ) ? theme_perso_get_franchise_information_value( $field ) : '';
};
$franchise_error           = static function ( $field ) {
    return function_exists( 'theme_perso_get_franchise_information_error' ) ? theme_perso_get_franchise_information_error( $field ) : '';
};
?>
<section class="franchise-network" aria-labelledby="franchise-network-title">
    <div class="franchise-network-shell">
        <div class="franchise-network-copy">
            <p class="eyebrow">Notre réseau de franchises</p>
            <h2 id="franchise-network-title">Notre réseau grandit partout en France</h2>
            <p>Rejoignez un réseau de boutiques engagées dans la cosmétique naturelle. Découvrez les villes déjà implantées et les opportunités encore disponibles.</p>
            <div class="franchise-network-stats" aria-label="Chiffres clés du réseau Cosm’Éthique">
                <div>
                    <span aria-hidden="true">
                        <svg viewBox="0 0 24 24" focusable="false"><path d="M4 21V8l8-5 8 5v13M8 21v-8h8v8M9 9h.01M15 9h.01"></path></svg>
                    </span>
                    <strong><em data-counter-target="12">0</em></strong>
                    <small>Boutiques ouvertes</small>
                </div>
                <div>
                    <span aria-hidden="true">
                        <svg viewBox="0 0 24 24" focusable="false"><path d="M12 21s7-5.2 7-11a7 7 0 1 0-14 0c0 5.8 7 11 7 11Z"></path><circle cx="12" cy="10" r="2.2"></circle></svg>
                    </span>
                    <strong><em data-counter-target="25">0</em></strong>
                    <small>Villes couvertes</small>
                </div>
                <div>
                    <span aria-hidden="true">
                        <svg viewBox="0 0 24 24" focusable="false"><path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM16 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3 21a5 5 0 0 1 10 0M11 21a5 5 0 0 1 10 0"></path></svg>
                    </span>
                    <strong><em data-counter-target="18">0</em></strong>
                    <small>Franchisés</small>
                </div>
                <div>
                    <span aria-hidden="true">
                        <svg viewBox="0 0 24 24" focusable="false"><path d="M20 4C12 4 6 10 6 18c8 0 14-6 14-14Z"></path><path d="M6 18c2-4 5-7 9-9"></path></svg>
                    </span>
                    <strong><em data-counter-target="98">0</em>%</strong>
                    <small>Produits naturels</small>
                </div>
            </div>
        </div>
        <div class="franchise-map-card">
            <div id="cosmethique-franchise-map" class="franchise-map" data-franchise-map aria-label="Carte du réseau de franchises Cosm’Éthique"></div>
            <div class="franchise-map-cta">
                <p>Vous souhaitez ouvrir une franchise dans votre ville ?</p>
                <div class="franchise-cta-actions">
                    <a class="button button-primary" href="#franchise-request-form">Devenir franchisé</a>
                    <a class="button franchise-eligibility-button" href="<?php echo esc_url( $franchise_eligibility_url ); ?>">
                        <span aria-hidden="true">✓</span>
                        Vérifier mon éligibilité
                    </a>
                </div>
                <p class="franchise-eligibility-note"><span aria-hidden="true">✓</span> Évaluez gratuitement votre projet en moins de 2 minutes avant de déposer votre candidature.</p>
            </div>
        </div>
    </div>
</section>

<section class="franchise-training-preview" aria-labelledby="franchise-training-preview-title">
    <div class="franchise-training-preview__inner">
        <div class="franchise-training-preview__intro motion-reveal">
            <p class="eyebrow">Formation & accompagnement</p>
            <h2 id="franchise-training-preview-title">COSM’ÉTHIQUE Phygital Franchise Lab</h2>
            <p>Chaque nouveau franchisé suit un parcours préparatoire progressif combinant une phase digitale en amont, 6 jours de formation présentielle et mixte en boutique pilote à Paris, puis un accompagnement post-ouverture. L’objectif est de garantir une expérience client homogène, premium et fidèle aux standards COSM’ÉTHIQUE dans chaque ville.</p>
            <div class="franchise-cta-actions">
                <a class="button button-primary" href="<?php echo esc_url( $franchise_training_url ); ?>">Découvrir le parcours de formation</a>
            </div>
        </div>
        <div class="franchise-training-preview__grid" aria-label="Étapes du COSM’ÉTHIQUE Phygital Franchise Lab">
            <article class="franchise-training-preview__card motion-reveal">
                <span aria-hidden="true">01</span>
                <h3>Phase digitale préparatoire</h3>
                <p>LearnyBox, diagnostic initial, serious game, culture de marque, lecture INCI et certifications COSMOS/Ecocert.</p>
            </article>
            <article class="franchise-training-preview__card motion-reveal">
                <span aria-hidden="true">02</span>
                <h3>Immersion en boutique pilote</h3>
                <p>6 jours de formation présentielle et mixte à Paris : conseil client, vente, gestion opérationnelle, stocks et animation locale.</p>
            </article>
            <article class="franchise-training-preview__card motion-reveal">
                <span aria-hidden="true">03</span>
                <h3>Validation des compétences</h3>
                <p>Certification interne, attestation et validation avant ouverture avec un seuil de 80 % des compétences attendues.</p>
            </article>
            <article class="franchise-training-preview__card motion-reveal">
                <span aria-hidden="true">04</span>
                <h3>Accompagnement post-ouverture</h3>
                <p>Suivi des premiers mois, analyse des KPI, conseils opérationnels et maintien de l’homogénéité du réseau.</p>
            </article>
        </div>
    </div>
</section>

<section id="franchise-request-form" class="rich-section franchise-section">
    <div>
        <h2>Ouvrir une adresse COSM’ETHIQUE</h2>
        <p>Nous recherchons des partenaires sensibles à la beauté naturelle, au conseil client et à l’expérience retail premium.</p>
        <div class="franchise-stats">
            <div>
                <strong>8</strong>
                <span>produits signature au lancement</span>
            </div>
            <div>
                <strong>40€</strong>
                <span>seuil de livraison offerte</span>
            </div>
            <div>
                <strong>72h</strong>
                <span>délai d’expédition cible</span>
            </div>
            <div>
                <strong>4.9/5</strong>
                <span>satisfaction client visée</span>
            </div>
        </div>
        <ul class="check-list">
            <li>Concept boutique élégant et duplicable</li>
            <li>Accompagnement lancement, merchandising et formation</li>
            <li>Catalogue naturel premium et stratégie ecommerce</li>
            <li>Supports marketing et animation locale</li>
        </ul>
    </div>
    <div class="form-card">
        <p class="eyebrow">Candidature franchise</p>
        <h3>Présentez votre projet</h3>
        <p class="franchise-form-intro">Ces informations permettent à notre équipe d’évaluer votre projet d’implantation et de vous recontacter dans un cadre strictement professionnel.</p>
        <p class="franchise-required-note"><span aria-hidden="true">*</span> Champs obligatoires</p>
        <?php if ( $franchise_form_notice ) : ?>
            <p class="franchise-form-status <?php echo 'error' === $franchise_form_notice['type'] ? 'is-error' : 'is-success'; ?>" role="<?php echo 'error' === $franchise_form_notice['type'] ? 'alert' : 'status'; ?>">
                <?php echo esc_html( $franchise_form_notice['message'] ); ?>
            </p>
        <?php endif; ?>
        <form class="cosmethique-form cosmethique-form--structured franchise-btob-form" action="<?php echo esc_url( home_url( '/devenir-franchise/' ) ); ?>" method="post" data-franchise-info-form data-demo-autofill-disabled="true" data-error-summary="Merci de vérifier les champs indiqués avant d’envoyer votre candidature." novalidate>
            <input type="hidden" name="cosmethique_form_type" value="franchise_information">
            <p class="franchise-form-status" data-form-status role="alert" aria-live="assertive"></p>

            <fieldset class="cosmethique-form-section">
                <legend>Informations personnelles</legend>
                <div class="cosmethique-form-grid">
                    <div class="cosmethique-form-field">
                        <label for="franchise-last-name">Nom <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> (obligatoire)</span></label>
                        <input id="franchise-last-name" type="text" name="last_name" value="<?php echo esc_attr( $franchise_value( 'last_name' ) ); ?>" autocomplete="family-name" maxlength="80" required aria-required="true" aria-describedby="franchise-last-name-error" aria-invalid="<?php echo $franchise_error( 'last_name' ) ? 'true' : 'false'; ?>" data-error-required="Veuillez renseigner votre nom.">
                        <span id="franchise-last-name-error" class="form-error-message" data-field-error-for="franchise-last-name"><?php echo esc_html( $franchise_error( 'last_name' ) ); ?></span>
                    </div>
                    <div class="cosmethique-form-field">
                        <label for="franchise-first-name">Prénom <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> (obligatoire)</span></label>
                        <input id="franchise-first-name" type="text" name="first_name" value="<?php echo esc_attr( $franchise_value( 'first_name' ) ); ?>" autocomplete="given-name" maxlength="80" required aria-required="true" aria-describedby="franchise-first-name-error" aria-invalid="<?php echo $franchise_error( 'first_name' ) ? 'true' : 'false'; ?>" data-error-required="Veuillez renseigner votre prénom.">
                        <span id="franchise-first-name-error" class="form-error-message" data-field-error-for="franchise-first-name"><?php echo esc_html( $franchise_error( 'first_name' ) ); ?></span>
                    </div>
                    <div class="cosmethique-form-field">
                        <label for="franchise-email">E-mail <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> (obligatoire)</span></label>
                        <input id="franchise-email" type="email" name="email" value="<?php echo esc_attr( $franchise_value( 'email' ) ); ?>" autocomplete="email" maxlength="190" required aria-required="true" aria-describedby="franchise-email-error" aria-invalid="<?php echo $franchise_error( 'email' ) ? 'true' : 'false'; ?>" data-error-required="Veuillez renseigner votre adresse e-mail." data-error-type="Veuillez saisir une adresse e-mail valide.">
                        <span id="franchise-email-error" class="form-error-message" data-field-error-for="franchise-email"><?php echo esc_html( $franchise_error( 'email' ) ); ?></span>
                    </div>
                    <div class="cosmethique-form-field">
                        <label for="franchise-phone">Téléphone <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> (obligatoire)</span></label>
                        <input id="franchise-phone" type="tel" name="phone" value="<?php echo esc_attr( $franchise_value( 'phone' ) ); ?>" autocomplete="tel" maxlength="20" pattern="[0-9+(). -]{6,20}" required aria-required="true" aria-describedby="franchise-phone-error" aria-invalid="<?php echo $franchise_error( 'phone' ) ? 'true' : 'false'; ?>" data-error-required="Veuillez renseigner votre téléphone." data-error-pattern="Veuillez renseigner un numéro de téléphone valide.">
                        <span id="franchise-phone-error" class="form-error-message" data-field-error-for="franchise-phone"><?php echo esc_html( $franchise_error( 'phone' ) ); ?></span>
                    </div>
                </div>
            </fieldset>

            <fieldset class="cosmethique-form-section">
                <legend>Projet d’implantation</legend>
                <p id="franchise-location-help" class="cosmethique-form-section-help">Précisez la localisation envisagée pour votre future boutique COSM’ÉTHIQUE.</p>
                <div class="cosmethique-form-grid">
                    <div class="cosmethique-form-field">
                        <label for="franchise-implantation-city">Ville d’implantation souhaitée <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> (obligatoire)</span></label>
                        <input id="franchise-implantation-city" type="text" name="implantation_city" value="<?php echo esc_attr( $franchise_value( 'implantation_city' ) ); ?>" autocomplete="address-level2" maxlength="120" required aria-required="true" aria-describedby="franchise-location-help franchise-implantation-city-error" aria-invalid="<?php echo $franchise_error( 'implantation_city' ) ? 'true' : 'false'; ?>" data-error-required="Veuillez renseigner la ville d’implantation souhaitée.">
                        <span id="franchise-implantation-city-error" class="form-error-message" data-field-error-for="franchise-implantation-city"><?php echo esc_html( $franchise_error( 'implantation_city' ) ); ?></span>
                    </div>
                    <div class="cosmethique-form-field">
                        <label for="franchise-implantation-postcode">Code postal de la zone d’implantation souhaitée <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> (obligatoire)</span></label>
                        <input id="franchise-implantation-postcode" type="text" name="implantation_postcode" value="<?php echo esc_attr( $franchise_value( 'implantation_postcode' ) ); ?>" inputmode="numeric" autocomplete="postal-code" minlength="5" maxlength="5" pattern="[0-9]{5}" required aria-required="true" aria-describedby="franchise-location-help franchise-implantation-postcode-error" aria-invalid="<?php echo $franchise_error( 'implantation_postcode' ) ? 'true' : 'false'; ?>" data-error-required="Veuillez renseigner le code postal de la zone d’implantation." data-error-pattern="Veuillez saisir un code postal valide à 5 chiffres.">
                        <span id="franchise-implantation-postcode-error" class="form-error-message" data-field-error-for="franchise-implantation-postcode"><?php echo esc_html( $franchise_error( 'implantation_postcode' ) ); ?></span>
                    </div>
                    <div class="cosmethique-form-field cosmethique-field-full">
                        <label for="franchise-personal-contribution">Apport personnel disponible <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> (obligatoire)</span></label>
                        <div class="franchise-currency-field">
                            <input id="franchise-personal-contribution" type="number" name="personal_contribution" value="<?php echo esc_attr( $franchise_value( 'personal_contribution' ) ); ?>" inputmode="numeric" min="0" step="1000" placeholder="25000" required aria-required="true" aria-describedby="franchise-contribution-help franchise-personal-contribution-error" aria-invalid="<?php echo $franchise_error( 'personal_contribution' ) ? 'true' : 'false'; ?>" data-error-required="Veuillez indiquer votre apport personnel disponible." data-error-range="Le montant de l’apport personnel ne peut pas être négatif." data-error-step="Veuillez saisir un montant par tranche de 1 000 €.">
                            <span aria-hidden="true">€</span>
                        </div>
                        <small id="franchise-contribution-help">Indiquez le montant disponible, sans espace ni symbole monétaire. Cette information sert uniquement à qualifier le projet.</small>
                        <span id="franchise-personal-contribution-error" class="form-error-message" data-field-error-for="franchise-personal-contribution"><?php echo esc_html( $franchise_error( 'personal_contribution' ) ); ?></span>
                    </div>
                </div>
            </fieldset>

            <fieldset class="cosmethique-form-section">
                <legend>Votre parcours et votre projet</legend>
                <div class="cosmethique-form-grid">
                    <div class="cosmethique-form-field cosmethique-field-full">
                        <label for="franchise-professional-experience">Expérience professionnelle</label>
                        <textarea id="franchise-professional-experience" name="professional_experience" rows="4" maxlength="2000" aria-describedby="franchise-professional-experience-help"><?php echo esc_textarea( $franchise_value( 'professional_experience' ) ); ?></textarea>
                        <small id="franchise-professional-experience-help">Facultatif — présentez brièvement votre parcours, notamment en commerce, management ou entrepreneuriat.</small>
                    </div>
                    <div class="cosmethique-form-field cosmethique-field-full">
                        <label for="franchise-project-message">Message / Présentation du projet <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> (obligatoire)</span></label>
                        <textarea id="franchise-project-message" name="project_message" rows="6" maxlength="4000" required aria-required="true" aria-describedby="franchise-project-message-error" aria-invalid="<?php echo $franchise_error( 'project_message' ) ? 'true' : 'false'; ?>" data-error-required="Veuillez présenter votre projet de franchise."><?php echo esc_textarea( $franchise_value( 'project_message' ) ); ?></textarea>
                        <span id="franchise-project-message-error" class="form-error-message" data-field-error-for="franchise-project-message"><?php echo esc_html( $franchise_error( 'project_message' ) ); ?></span>
                    </div>
                </div>
            </fieldset>

            <fieldset class="cosmethique-form-section cosmethique-form-section--privacy">
                <legend>Protection des données</legend>
                <div class="cosmethique-form-field cosmethique-field-full">
                    <p class="franchise-consent-heading">Consentement RGPD <span class="franchise-required-mark" aria-hidden="true">*</span><span class="screen-reader-text"> (obligatoire)</span></p>
                    <label class="checkbox-label" for="franchise-privacy-consent">
                        <input id="franchise-privacy-consent" type="checkbox" name="privacy_consent" value="1" <?php checked( '1', $franchise_value( 'privacy_consent' ) ); ?> required aria-required="true" aria-describedby="franchise-privacy-consent-error" aria-invalid="<?php echo $franchise_error( 'privacy_consent' ) ? 'true' : 'false'; ?>" data-error-required="Veuillez accepter le traitement des données nécessaire à votre candidature.">
                        <span>J’accepte que les informations transmises soient utilisées par COSM’ÉTHIQUE pour étudier ma candidature franchise et me recontacter dans le cadre de mon projet. <a href="<?php echo esc_url( $franchise_privacy_url ); ?>">Consulter la politique de confidentialité</a>.</span>
                    </label>
                    <span id="franchise-privacy-consent-error" class="form-error-message" data-field-error-for="franchise-privacy-consent"><?php echo esc_html( $franchise_error( 'privacy_consent' ) ); ?></span>
                </div>
            </fieldset>

            <?php wp_nonce_field( 'franchise_information', 'franchise_information_nonce' ); ?>
            <?php theme_perso_security_fields( 'franchise' ); ?>
            <button class="button button-primary franchise-submit-button" type="submit">Envoyer ma candidature</button>
        </form>
    </div>
</section>
