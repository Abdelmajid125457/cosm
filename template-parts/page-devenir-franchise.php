<?php
$franchise_eligibility_url = home_url( '/franchise/eligibilite/' );
$franchise_training_url    = home_url( '/franchise/formation/' );
?>
<section class="franchise-network" aria-labelledby="franchise-network-title">
    <div class="franchise-network-shell">
        <div class="franchise-network-copy">
            <p class="eyebrow">Votre projet de franchise</p>
            <h2 id="franchise-network-title">Construisons une implantation cohérente avec votre territoire.</h2>
            <p>Chaque candidature est étudiée selon le projet, la zone d’implantation envisagée, les ressources disponibles et l’adhésion aux valeurs COSM’ÉTHIQUE. Aucune implantation n’est considérée comme acquise avant l’analyse du dossier et les étapes contractuelles.</p>
            <div class="franchise-network-stats franchise-network-stats--qualitative" aria-label="Axes d’étude d’un projet de franchise Cosm’Éthique">
                <div>
                    <span aria-hidden="true">
                        <svg viewBox="0 0 24 24" focusable="false"><path d="M12 21s7-5.2 7-11a7 7 0 1 0-14 0c0 5.8 7 11 7 11Z"></path><circle cx="12" cy="10" r="2.2"></circle></svg>
                    </span>
                    <strong>Zone</strong>
                    <small>Potentiel d’implantation</small>
                </div>
                <div>
                    <span aria-hidden="true">
                        <svg viewBox="0 0 24 24" focusable="false"><path d="M4 21V8l8-5 8 5v13M8 21v-8h8v8"></path></svg>
                    </span>
                    <strong>Projet</strong>
                    <small>Cohérence commerciale</small>
                </div>
                <div>
                    <span aria-hidden="true">
                        <svg viewBox="0 0 24 24" focusable="false"><path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3 21a5 5 0 0 1 10 0M14 8l2 2 4-4"></path></svg>
                    </span>
                    <strong>Profil</strong>
                    <small>Expérience et motivation</small>
                </div>
                <div>
                    <span aria-hidden="true">
                        <svg viewBox="0 0 24 24" focusable="false"><path d="M20 4C12 4 6 10 6 18c8 0 14-6 14-14Z"></path><path d="M6 18c2-4 5-7 9-9"></path></svg>
                    </span>
                    <strong>Valeurs</strong>
                    <small>Adéquation avec la marque</small>
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
            <p>Le programme COSM’ÉTHIQUE Phygital Franchise Lab est destiné aux nouveaux franchisés ayant signé leur contrat. Il intervient après validation de leur candidature et avant l’ouverture de leur boutique.</p>
            <div class="franchise-cta-actions">
                <a class="button button-primary" href="<?php echo esc_url( $franchise_training_url ); ?>">Découvrir le parcours de formation</a>
            </div>
        </div>
        <div class="franchise-training-preview__grid" aria-label="Étapes du COSM’ÉTHIQUE Phygital Franchise Lab">
            <article class="franchise-training-preview__card motion-reveal">
                <span aria-hidden="true">01</span>
                <h3>Phase digitale préparatoire</h3>
                <p>LearnyBox et serious game de 2 h 30 : conseil client, stocks, réclamations, gestion et communication responsable.</p>
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
                <p>Points de suivi à J+30 et J+90, analyse des KPI, conseils opérationnels et contrôle qualité.</p>
            </article>
        </div>
    </div>
</section>

<section id="franchise-request-form" class="rich-section franchise-section">
    <div>
        <h2>Ouvrir une adresse COSM’ETHIQUE</h2>
        <p>Le dépôt de candidature constitue une étape d’étude. Il ne vaut pas acceptation du projet et reste distinct de la formation réservée aux franchisés ayant signé leur contrat.</p>
        <div class="franchise-candidate-journey" aria-label="Parcours candidat franchise">
            <span>Éligibilité</span>
            <span>Candidature</span>
            <span>Analyse</span>
            <span>Entretien</span>
            <span>Signature éventuelle</span>
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
        <?php
        get_template_part(
            'template-parts/franchise',
            'candidate-form',
            array(
                'action_url' => home_url( '/devenir-franchise/' ),
                'id_prefix'  => 'franchise-main',
            )
        );
        ?>
    </div>
</section>
