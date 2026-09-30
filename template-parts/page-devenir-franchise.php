<?php
$franchise_eligibility_url = home_url( '/franchise/eligibilite/' );
$franchise_training_url    = home_url( '/franchise/formation/' );
$franchise_form_notice     = function_exists( 'theme_perso_get_franchise_information_notice' ) ? theme_perso_get_franchise_information_notice() : null;
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
    <div class="franchise-training-preview__intro motion-reveal">
        <p class="eyebrow">Formation & accompagnement</p>
        <h2 id="franchise-training-preview-title">Un parcours structuré pour ouvrir votre boutique avec méthode.</h2>
        <p>Chaque nouveau franchisé suit une formation hybride mêlant e-learning, classes virtuelles, immersion en boutique pilote, ateliers pratiques et accompagnement post-ouverture. L’objectif est simple : garantir une expérience client homogène, premium et fidèle aux valeurs COSM’ÉTHIQUE dans chaque ville.</p>
        <div class="franchise-cta-actions">
            <a class="button button-primary" href="<?php echo esc_url( $franchise_training_url ); ?>">Découvrir le parcours de formation</a>
        </div>
    </div>
    <div class="franchise-training-preview__grid">
        <article class="franchise-training-preview__card motion-reveal">
            <span aria-hidden="true">01</span>
            <h3>4 semaines de formation</h3>
            <p>Deux semaines à distance, une semaine en boutique pilote et une semaine dédiée au digital, aux KPI et à la certification.</p>
        </article>
        <article class="franchise-training-preview__card motion-reveal">
            <span aria-hidden="true">02</span>
            <h3>Immersion boutique</h3>
            <p>Mise en situation réelle : diagnostic beauté, conseil personnalisé, merchandising, encaissement et relation client.</p>
        </article>
        <article class="franchise-training-preview__card motion-reveal">
            <span aria-hidden="true">03</span>
            <h3>Certification interne</h3>
            <p>Quiz, cas pratiques, simulation de vente et validation finale avant ouverture de la boutique.</p>
        </article>
        <article class="franchise-training-preview__card motion-reveal">
            <span aria-hidden="true">04</span>
            <h3>3 mois de coaching</h3>
            <p>Suivi post-ouverture, points réguliers, analyse des KPI, accompagnement commercial et contrôle qualité.</p>
        </article>
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
    <div class="form-card" data-demo-autofill="franchise">
        <h3>Demande d’information franchisé</h3>
        <?php if ( $franchise_form_notice ) : ?>
            <p class="franchise-form-status <?php echo 'error' === $franchise_form_notice['type'] ? 'is-error' : 'is-success'; ?>" role="<?php echo 'error' === $franchise_form_notice['type'] ? 'alert' : 'status'; ?>">
                <?php echo esc_html( $franchise_form_notice['message'] ); ?>
            </p>
        <?php endif; ?>
        <form class="cosmethique-form cosmethique-form--structured franchise-btob-form" action="<?php echo esc_url( home_url( '/devenir-franchise/' ) ); ?>" method="post" data-franchise-info-form novalidate>
            <input type="hidden" name="cosmethique_form_type" value="franchise_information">
            <fieldset class="cosmethique-form-section">
                <legend>Informations personnelles</legend>
                <div class="cosmethique-form-grid">
                    <label>Prénom<input type="text" name="first_name" autocomplete="given-name" required aria-required="true"></label>
                    <label>Nom<input type="text" name="last_name" autocomplete="family-name" required aria-required="true"></label>
                    <label>Email<input type="email" name="email" autocomplete="email" required aria-required="true"></label>
                    <label>Téléphone<input type="tel" name="phone" autocomplete="tel" required aria-required="true"></label>
                    <label>Ville<input type="text" name="city" autocomplete="address-level2" required aria-required="true"></label>
                    <label>Code postal<input type="text" name="postcode" inputmode="numeric" autocomplete="postal-code" required aria-required="true"></label>
                </div>
            </fieldset>

            <fieldset class="cosmethique-form-section">
                <legend>Profil professionnel</legend>
                <div class="cosmethique-form-grid">
                    <label>Statut actuel
                        <select name="current_status" required aria-required="true">
                            <option value="">Sélectionner</option>
                            <option value="salarie">Salarié</option>
                            <option value="entrepreneur">Entrepreneur</option>
                            <option value="commercant">Commerçant</option>
                            <option value="investisseur">Investisseur</option>
                            <option value="reconversion">Reconversion professionnelle</option>
                            <option value="autre">Autre</option>
                        </select>
                    </label>
                    <label>Expérience principale
                        <select name="experience_area" required aria-required="true">
                            <option value="">Sélectionner</option>
                            <option value="commerce">Commerce</option>
                            <option value="vente">Vente</option>
                            <option value="beaute-cosmetique">Beauté / cosmétique</option>
                            <option value="management">Management</option>
                            <option value="entrepreneuriat">Entrepreneuriat</option>
                            <option value="aucune">Aucune expérience</option>
                        </select>
                    </label>
                </div>
            </fieldset>

            <fieldset class="cosmethique-form-section">
                <legend>Projet franchise</legend>
                <div class="cosmethique-form-grid">
                    <label>Ville ou région souhaitée<input type="text" name="desired_area" required aria-required="true"></label>
                    <label>Horizon d’ouverture
                        <select name="opening_horizon" required aria-required="true">
                            <option value="">Sélectionner</option>
                            <option value="moins-3-mois">Moins de 3 mois</option>
                            <option value="3-6-mois">3 à 6 mois</option>
                            <option value="6-12-mois">6 à 12 mois</option>
                            <option value="plus-12-mois">Plus de 12 mois</option>
                        </select>
                    </label>
                    <label>Apport personnel estimé
                        <select name="investment" required aria-required="true">
                            <option value="">Sélectionner</option>
                            <option value="moins-15000">Moins de 15 000 €</option>
                            <option value="15000-30000">15 000 à 30 000 €</option>
                            <option value="30000-50000">30 000 à 50 000 €</option>
                            <option value="plus-50000">Plus de 50 000 €</option>
                        </select>
                    </label>
                    <label>Local déjà identifié ?
                        <select name="premises_status" required aria-required="true">
                            <option value="">Sélectionner</option>
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>
                            <option value="recherche">En recherche</option>
                        </select>
                    </label>
                    <label class="cosmethique-field-full">Site web ou LinkedIn si disponible<input type="url" name="website" placeholder="https://www.linkedin.com/in/..."></label>
                </div>
            </fieldset>

            <fieldset class="cosmethique-form-section">
                <legend>Motivation</legend>
                <div class="cosmethique-form-grid">
                    <label class="cosmethique-field-full">Pourquoi souhaitez-vous rejoindre COSM’ÉTHIQUE ?<textarea name="motivation" rows="4" required aria-required="true"></textarea></label>
                    <label class="cosmethique-field-full">Quelles sont vos motivations pour ouvrir une franchise ?<textarea name="franchise_motivation" rows="4" required aria-required="true"></textarea></label>
                    <label class="cosmethique-field-full">Message libre<textarea name="message" rows="5" required aria-required="true"></textarea></label>
                </div>
            </fieldset>

            <label class="checkbox-label"><input type="checkbox" name="consent" required aria-required="true"> J’accepte que mes données soient utilisées pour être recontacté dans le cadre de ma demande de franchise.</label>
            <?php wp_nonce_field( 'franchise_information', 'franchise_information_nonce' ); ?>
            <?php theme_perso_security_fields( 'franchise' ); ?>
            <button class="button button-primary" type="submit">Envoyer ma candidature franchise</button>
        </form>
    </div>
</section>
