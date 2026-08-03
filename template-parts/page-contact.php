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
    <div class="form-card" data-demo-autofill="contact">
        <?php
        $shortcode = theme_perso_get_contact_shortcode();
        if ( $shortcode ) {
            echo do_shortcode( $shortcode );
        } else {
            ?>
            <form class="cosmethique-form" action="#" method="post">
                <label>Nom<input type="text" name="name" required></label>
                <label>Prénom<input type="text" name="first_name" required></label>
                <label>Email<input type="email" name="email" required></label>
                <label>Téléphone<input type="tel" name="phone"></label>
                <label>Sujet<input type="text" name="subject" required></label>
                <label>Message<textarea name="message" rows="5" required></textarea></label>
                <?php theme_perso_security_fields( 'contact' ); ?>
                <button class="button button-primary" type="submit">Envoyer</button>
            </form>
            <?php
        }
        ?>
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
