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
                <a class="button button-primary" href="#franchise-request-form">Devenir franchisé</a>
            </div>
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
    <div class="form-card" data-demo-autofill="franchise">
        <h3>Demande d’information franchisé</h3>
        <form class="cosmethique-form" action="#" method="post">
            <label>Nom complet<input type="text" name="name" required></label>
            <label>Email<input type="email" name="email" required></label>
            <label>Téléphone<input type="tel" name="phone" required></label>
            <label>Ville souhaitée<input type="text" name="city" required></label>
            <label>Apport personnel<input type="text" name="investment" required></label>
            <label>Surface souhaitée<input type="text" name="surface" required></label>
            <label>Expérience professionnelle<textarea name="experience" rows="4" required></textarea></label>
            <label>Message<textarea name="message" rows="5" required></textarea></label>
            <label class="checkbox-label"><input type="checkbox" name="consent" required> J’accepte d’être contacté au sujet de ma demande de franchise.</label>
            <?php theme_perso_security_fields( 'franchise' ); ?>
            <button class="button button-primary" type="submit">Envoyer ma demande</button>
        </form>
    </div>
</section>
