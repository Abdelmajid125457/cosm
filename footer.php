<?php
/**
 * Pied de page premium COSM'ETHIQUE.
 *
 * @package Theme_Perso
 */
?>
    <footer class="site-footer" data-animate>
        <?php
        $footer_shop_url      = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/boutique/' );
        $footer_visage_url    = function_exists( 'theme_perso_get_shop_collection_url' ) ? theme_perso_get_shop_collection_url( 'visage', $footer_shop_url ) : $footer_shop_url;
        $footer_corps_url     = function_exists( 'theme_perso_get_shop_collection_url' ) ? theme_perso_get_shop_collection_url( 'corps', $footer_shop_url ) : $footer_shop_url;
        $footer_cheveux_url   = function_exists( 'theme_perso_get_shop_collection_url' ) ? theme_perso_get_shop_collection_url( 'cheveux', $footer_shop_url ) : $footer_shop_url;
        $footer_category_link = function( $slug, $fallback = '' ) use ( $footer_shop_url ) {
            $fallback = $fallback ? $fallback : $footer_shop_url;

            if ( ! taxonomy_exists( 'product_cat' ) ) {
                return $fallback;
            }

            $term = get_term_by( 'slug', $slug, 'product_cat' );
            if ( ! $term ) {
                return $fallback;
            }

            $link = get_term_link( $term );

            return is_wp_error( $link ) ? $fallback : $link;
        };
        $footer_accessoires_url = $footer_category_link( 'accessoires-beaute' );
        $footer_packs_url       = $footer_category_link( 'packs' );
        $footer_promos_url      = add_query_arg( 'cosmethique_filter', 'sale', $footer_shop_url );
        $footer_new_url         = add_query_arg( 'orderby', 'date', $footer_shop_url );
        $footer_best_url        = add_query_arg( 'orderby', 'popularity', $footer_shop_url );
        $footer_page_link       = function( $title, $slug, $excerpt = '' ) {
            if ( function_exists( 'theme_perso_get_or_create_page_permalink' ) ) {
                return theme_perso_get_or_create_page_permalink( $title, $slug, $excerpt );
            }

            $page = get_page_by_path( $slug );

            return $page ? get_permalink( $page ) : home_url( '/' . trim( $slug, '/' ) . '/' );
        };
        $footer_shop_links      = array(
            esc_html__( 'Soins du visage', 'theme-perso' ) => $footer_visage_url,
            esc_html__( 'Soins du corps', 'theme-perso' )  => $footer_corps_url,
            esc_html__( 'Cheveux', 'theme-perso' )         => $footer_cheveux_url,
            esc_html__( 'Accessoires', 'theme-perso' )     => $footer_accessoires_url,
            esc_html__( 'Packs & Coffrets', 'theme-perso' ) => $footer_packs_url,
            esc_html__( 'Promotions', 'theme-perso' )      => $footer_promos_url,
            esc_html__( 'Nouveautés', 'theme-perso' )      => $footer_new_url,
            esc_html__( 'Nos best-sellers', 'theme-perso' ) => $footer_best_url,
        );
        $footer_house_links     = array(
            esc_html__( 'Notre histoire', 'theme-perso' )       => $footer_page_link( 'Qui sommes-nous', 'qui-sommes-nous', 'Une maison cosmétique naturelle, élégante et responsable.' ),
            esc_html__( 'Nos engagements', 'theme-perso' )      => function_exists( 'theme_perso_footer_page_url' ) ? theme_perso_footer_page_url( 'engagements' ) : home_url( '/engagements/' ),
            esc_html__( 'Nos ingrédients', 'theme-perso' )      => function_exists( 'theme_perso_footer_page_url' ) ? theme_perso_footer_page_url( 'ingredients' ) : home_url( '/ingredients/' ),
            esc_html__( 'Fabrication & qualité', 'theme-perso' ) => function_exists( 'theme_perso_footer_page_url' ) ? theme_perso_footer_page_url( 'qualite' ) : home_url( '/qualite/' ),
            esc_html__( 'Nos boutiques', 'theme-perso' )        => function_exists( 'theme_perso_footer_page_url' ) ? theme_perso_footer_page_url( 'boutiques' ) : home_url( '/boutiques/' ),
            esc_html__( 'Devenir franchisé', 'theme-perso' )    => $footer_page_link( 'Devenir franchisé', 'devenir-franchise', 'Rejoignez le développement de la maison COSM’ETHIQUE.' ),
            esc_html__( 'FAQ', 'theme-perso' )                  => function_exists( 'theme_perso_footer_page_url' ) ? theme_perso_footer_page_url( 'faq' ) : home_url( '/faq/' ),
            esc_html__( 'Avis clients', 'theme-perso' )         => function_exists( 'theme_perso_footer_page_url' ) ? theme_perso_footer_page_url( 'avis-clients' ) : home_url( '/avis-clients/' ),
        );
        $footer_legal_links     = array(
            esc_html__( 'CGV', 'theme-perso' )                         => $footer_page_link( 'CGV', 'cgv', 'Conditions générales de vente.' ),
            esc_html__( 'CGU', 'theme-perso' )                         => $footer_page_link( 'CGU', 'cgu', 'Conditions générales d’utilisation.' ),
            esc_html__( 'Mentions légales', 'theme-perso' )             => $footer_page_link( 'Mentions légales', 'mentions-legales', 'Informations légales de COSM’ETHIQUE.' ),
            esc_html__( 'Politique de confidentialité', 'theme-perso' ) => $footer_page_link( 'Politique de confidentialité', 'politique-de-confidentialite', 'Gestion et protection des données personnelles.' ),
            esc_html__( 'Contact', 'theme-perso' )                     => $footer_page_link( 'Contact', 'contact', 'Notre équipe vous accompagne avec attention.' ),
            esc_html__( 'Politique de cookies', 'theme-perso' )         => theme_perso_cookie_policy_url(),
        );
        $footer_icon = function( $icon ) {
            $icons = array(
                'leaf'    => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19c8.5-.2 13.4-5.2 14-14-8.8.6-13.8 5.5-14 14Z"></path><path d="M5 19c2.8-4 6.3-7.3 10.5-10"></path></svg>',
                'shield'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 19 6v5c0 4.5-2.9 8.2-7 10-4.1-1.8-7-5.5-7-10V6l7-3Z"></path><path d="m9 12 2 2 4-5"></path></svg>',
                'heart'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.8 8.6c0 5.1-8.8 10.4-8.8 10.4S3.2 13.7 3.2 8.6A4.5 4.5 0 0 1 12 7a4.5 4.5 0 0 1 8.8 1.6Z"></path></svg>',
                'recycle' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m7.5 7.2 2.2-3.5 2.2 3.5"></path><path d="M9.7 3.7 6.1 9.5"></path><path d="m16.5 7.2 2.2 3.5-4.1.2"></path><path d="m18.7 10.7-3.5-5.8"></path><path d="m8.6 17.7-4.1-.2 2.2-3.5"></path><path d="m4.5 17.5h7"></path></svg>',
                'lock'    => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="10" width="14" height="10" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3"></path></svg>',
                'truck'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h11v10H3z"></path><path d="M14 9h4l3 3v4h-7z"></path><circle cx="7" cy="18" r="1.7"></circle><circle cx="17.5" cy="18" r="1.7"></circle></svg>',
                'chat'    => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5h16v11H8l-4 4V5Z"></path><path d="M8 9h8M8 13h5"></path></svg>',
            );

            return isset( $icons[ $icon ] ) ? $icons[ $icon ] : '';
        };
        $footer_product_links = array_slice( $footer_shop_links, 0, 5, true );
        $footer_about_links   = array_slice( $footer_house_links, 0, 5, true );
        $footer_help_links    = array(
            esc_html__( 'Contact', 'theme-perso' )                     => $footer_legal_links[ esc_html__( 'Contact', 'theme-perso' ) ],
            esc_html__( 'FAQ', 'theme-perso' )                         => $footer_house_links[ esc_html__( 'FAQ', 'theme-perso' ) ],
            esc_html__( 'CGV', 'theme-perso' )                         => $footer_legal_links[ esc_html__( 'CGV', 'theme-perso' ) ],
            esc_html__( 'Mentions légales', 'theme-perso' )             => $footer_legal_links[ esc_html__( 'Mentions légales', 'theme-perso' ) ],
            esc_html__( 'Politique de confidentialité', 'theme-perso' ) => $footer_legal_links[ esc_html__( 'Politique de confidentialité', 'theme-perso' ) ],
            esc_html__( 'Politique de cookies', 'theme-perso' )         => $footer_legal_links[ esc_html__( 'Politique de cookies', 'theme-perso' ) ],
        );
        ?>
        <section class="footer-newsletter footer-newsletter--top" aria-labelledby="footer-newsletter-title">
            <div class="footer-newsletter-copy">
                <p class="eyebrow"><?php esc_html_e( 'Newsletter', 'theme-perso' ); ?></p>
                <h2 id="footer-newsletter-title"><?php esc_html_e( 'L’essentiel dans votre boîte', 'theme-perso' ); ?></h2>
                <p><?php esc_html_e( 'Recevez nos nouveautés, conseils beauté et offres exclusives.', 'theme-perso' ); ?></p>
            </div>
            <form class="newsletter-form footer-newsletter-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post" novalidate>
                <label class="screen-reader-text" for="footer-newsletter-email"><?php esc_html_e( 'Adresse email', 'theme-perso' ); ?></label>
                <input id="footer-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e( 'Votre adresse email', 'theme-perso' ); ?>" autocomplete="email" required>
                <button type="submit" aria-label="<?php esc_attr_e( 'S’inscrire à la newsletter', 'theme-perso' ); ?>">
                    <span><?php esc_html_e( 'S’inscrire', 'theme-perso' ); ?></span>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13"></path><path d="m13 6 6 6-6 6"></path></svg>
                </button>
                <small class="newsletter-status" aria-live="polite"></small>
            </form>
        </section>

        <div class="footer-main footer-main--minimal">
            <div class="footer-brand footer-brand-rich">
                <a class="footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">COSM’ETHIQUE</a>
                <p><?php esc_html_e( 'Soins naturels premium, formulés avec exigence pour une beauté plus consciente.', 'theme-perso' ); ?></p>
                <div class="social-links" aria-label="<?php esc_attr_e( 'Réseaux sociaux', 'theme-perso' ); ?>">
                    <?php foreach ( theme_perso_social_links() as $network => $social ) : ?>
                        <a class="social-link social-link--<?php echo esc_attr( $network ); ?>" href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $social['tooltip'] ); ?>" title="<?php echo esc_attr( $social['tooltip'] ); ?>" data-tooltip="<?php echo esc_attr( $social['tooltip'] ); ?>">
                            <?php echo theme_perso_social_icon( $network ); ?>
                            <span class="screen-reader-text"><?php echo esc_html( $social['label'] ); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
                <p class="footer-brand-note"><?php esc_html_e( '98 % naturel · Cruelty Free · Emballages responsables', 'theme-perso' ); ?></p>
            </div>

            <details class="footer-column footer-nav-group" open>
                <summary><?php esc_html_e( 'Produits', 'theme-perso' ); ?><span aria-hidden="true">+</span></summary>
                <ul class="footer-link-list">
                    <?php foreach ( $footer_product_links as $label => $url ) : ?>
                        <li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?><span aria-hidden="true">›</span></a></li>
                    <?php endforeach; ?>
                </ul>
            </details>

            <details class="footer-column footer-nav-group" open>
                <summary><?php esc_html_e( 'À propos', 'theme-perso' ); ?><span aria-hidden="true">+</span></summary>
                <ul class="footer-link-list">
                    <?php foreach ( $footer_about_links as $label => $url ) : ?>
                        <li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?><span aria-hidden="true">›</span></a></li>
                    <?php endforeach; ?>
                </ul>
            </details>

            <details class="footer-column footer-nav-group footer-utility-column" open>
                <summary><?php esc_html_e( 'Aide & Informations', 'theme-perso' ); ?><span aria-hidden="true">+</span></summary>
                <ul class="footer-link-list">
                    <?php foreach ( $footer_help_links as $label => $url ) : ?>
                        <li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?><span aria-hidden="true">›</span></a></li>
                    <?php endforeach; ?>
                    <li><button class="footer-cookie-link" type="button" data-cookie-manage><?php esc_html_e( 'Gérer mes cookies', 'theme-perso' ); ?><span aria-hidden="true">›</span></button></li>
                </ul>
            </details>

            <aside class="footer-contact-card" aria-labelledby="footer-contact-title">
                <span class="footer-contact-mark">CÉ</span>
                <h2 id="footer-contact-title"><?php esc_html_e( 'Contact', 'theme-perso' ); ?></h2>
                <a href="mailto:contact@cosmethique.fr">contact@cosmethique.fr</a>
                <a href="tel:+33142184012">01 42 18 40 12</a>
                <p><?php esc_html_e( 'Du lundi au vendredi, 9h-18h', 'theme-perso' ); ?></p>
            </aside>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> COSM’ETHIQUE. <?php esc_html_e( 'Tous droits réservés.', 'theme-perso' ); ?></p>

            <div class="footer-payment-logos" aria-label="<?php esc_attr_e( 'Moyens de paiement acceptés', 'theme-perso' ); ?>">
                <span class="payment-logo payment-logo--visa" aria-label="Visa"><svg viewBox="0 0 78 28" role="img" aria-hidden="true"><rect width="78" height="28" rx="8"></rect><text x="39" y="18">VISA</text></svg></span>
                <span class="payment-logo payment-logo--mastercard" aria-label="Mastercard"><svg viewBox="0 0 78 28" role="img" aria-hidden="true"><rect width="78" height="28" rx="8"></rect><circle cx="34" cy="14" r="7"></circle><circle cx="44" cy="14" r="7"></circle><text x="39" y="23">mastercard</text></svg></span>
                <span class="payment-logo payment-logo--paypal" aria-label="PayPal"><svg viewBox="0 0 78 28" role="img" aria-hidden="true"><rect width="78" height="28" rx="8"></rect><text x="39" y="18">PayPal</text></svg></span>
                <span class="payment-logo payment-logo--klarna" aria-label="Klarna"><svg viewBox="0 0 78 28" role="img" aria-hidden="true"><rect width="78" height="28" rx="8"></rect><text x="39" y="18">Klarna</text></svg></span>
                <span class="payment-logo payment-logo--apple" aria-label="Apple Pay"><svg viewBox="0 0 78 28" role="img" aria-hidden="true"><rect width="78" height="28" rx="8"></rect><text x="39" y="18"> Pay</text></svg></span>
                <span class="payment-logo payment-logo--google" aria-label="Google Pay"><svg viewBox="0 0 78 28" role="img" aria-hidden="true"><rect width="78" height="28" rx="8"></rect><text x="39" y="18">G Pay</text></svg></span>
                <span class="payment-logo payment-logo--cb" aria-label="<?php esc_attr_e( 'Carte Bancaire', 'theme-perso' ); ?>"><svg viewBox="0 0 78 28" role="img" aria-hidden="true"><rect width="78" height="28" rx="8"></rect><text x="39" y="18">CB</text></svg></span>
            </div>

            <div class="footer-trust-badges" aria-label="<?php esc_attr_e( 'Réassurance', 'theme-perso' ); ?>">
                <span><?php echo $footer_icon( 'lock' ); ?><?php esc_html_e( 'Paiement sécurisé', 'theme-perso' ); ?></span>
                <span><?php echo $footer_icon( 'truck' ); ?><?php esc_html_e( 'Expédition France', 'theme-perso' ); ?></span>
                <span><?php echo $footer_icon( 'chat' ); ?><?php esc_html_e( 'Service client réactif', 'theme-perso' ); ?></span>
            </div>
        </div>

        <div class="payment-loyalty-strip" aria-label="<?php esc_attr_e( 'Programme fidélité', 'theme-perso' ); ?>">
            <strong><?php esc_html_e( 'Programme fidélité : 1 € = 1 point beauté', 'theme-perso' ); ?></strong>
        </div>
    </footer>

    <div class="cookie-banner" role="dialog" aria-live="polite" aria-label="<?php esc_attr_e( 'Gestion des cookies', 'theme-perso' ); ?>" data-cookie-banner hidden>
        <div class="cookie-banner-content">
            <strong><?php esc_html_e( 'Votre confidentialité', 'theme-perso' ); ?></strong>
            <p><?php esc_html_e( 'Nous utilisons des cookies afin d’améliorer votre expérience de navigation, mesurer l’audience du site et personnaliser certains contenus. Vous pouvez accepter tous les cookies, les refuser ou personnaliser vos préférences.', 'theme-perso' ); ?></p>
            <a href="<?php echo esc_url( theme_perso_cookie_policy_url() ); ?>"><?php esc_html_e( 'Consulter la politique de cookies', 'theme-perso' ); ?></a>
        </div>
        <div class="cookie-actions">
            <button class="button cookie-button cookie-button--accept" type="button" data-cookie-accept-all><?php esc_html_e( 'Accepter tout', 'theme-perso' ); ?></button>
            <button class="button cookie-button cookie-button--refuse" type="button" data-cookie-refuse><?php esc_html_e( 'Refuser', 'theme-perso' ); ?></button>
            <button class="button cookie-button cookie-button--customize" type="button" data-cookie-customize><?php esc_html_e( 'Personnaliser', 'theme-perso' ); ?></button>
        </div>
    </div>

    <div class="cookie-modal" data-cookie-modal hidden>
        <div class="cookie-modal-backdrop" data-cookie-modal-close></div>
        <section class="cookie-modal-panel" role="dialog" aria-modal="true" aria-labelledby="cookie-modal-title" aria-describedby="cookie-modal-desc" tabindex="-1">
            <button class="cookie-modal-close" type="button" data-cookie-modal-close aria-label="<?php esc_attr_e( 'Fermer les préférences cookies', 'theme-perso' ); ?>">×</button>
            <p class="eyebrow"><?php esc_html_e( 'Préférences RGPD', 'theme-perso' ); ?></p>
            <h2 id="cookie-modal-title"><?php esc_html_e( 'Gérer mes cookies', 'theme-perso' ); ?></h2>
            <p id="cookie-modal-desc"><?php esc_html_e( 'Choisissez les catégories que vous acceptez. Les cookies strictement nécessaires restent actifs pour assurer le fonctionnement du site.', 'theme-perso' ); ?></p>

            <div class="cookie-preferences">
                <article class="cookie-preference">
                    <div>
                        <h3><?php esc_html_e( 'Cookies strictement nécessaires', 'theme-perso' ); ?></h3>
                        <p><?php esc_html_e( 'Indispensables au panier, à la sécurité, au paiement et à la mémorisation de vos choix.', 'theme-perso' ); ?></p>
                    </div>
                    <label class="cookie-toggle is-disabled">
                        <input type="checkbox" checked disabled>
                        <span><?php esc_html_e( 'Toujours activés', 'theme-perso' ); ?></span>
                    </label>
                </article>

                <article class="cookie-preference">
                    <div>
                        <h3><?php esc_html_e( 'Cookies analytiques', 'theme-perso' ); ?></h3>
                        <p><?php esc_html_e( 'Ils nous aident à comprendre la navigation afin d’améliorer les contenus et les parcours.', 'theme-perso' ); ?></p>
                    </div>
                    <label class="cookie-toggle">
                        <input type="checkbox" data-cookie-category="analytics">
                        <span><?php esc_html_e( 'Activer les cookies analytiques', 'theme-perso' ); ?></span>
                    </label>
                </article>

                <article class="cookie-preference">
                    <div>
                        <h3><?php esc_html_e( 'Cookies marketing', 'theme-perso' ); ?></h3>
                        <p><?php esc_html_e( 'Ils permettent de mesurer les campagnes et de proposer des contenus publicitaires plus pertinents.', 'theme-perso' ); ?></p>
                    </div>
                    <label class="cookie-toggle">
                        <input type="checkbox" data-cookie-category="marketing">
                        <span><?php esc_html_e( 'Activer les cookies marketing', 'theme-perso' ); ?></span>
                    </label>
                </article>

                <article class="cookie-preference">
                    <div>
                        <h3><?php esc_html_e( 'Cookies de personnalisation', 'theme-perso' ); ?></h3>
                        <p><?php esc_html_e( 'Ils mémorisent vos préférences afin de rendre l’expérience plus fluide et adaptée.', 'theme-perso' ); ?></p>
                    </div>
                    <label class="cookie-toggle">
                        <input type="checkbox" data-cookie-category="personalization">
                        <span><?php esc_html_e( 'Activer les cookies de personnalisation', 'theme-perso' ); ?></span>
                    </label>
                </article>
            </div>

            <div class="cookie-modal-actions">
                <button class="button cookie-button cookie-button--refuse" type="button" data-cookie-refuse><?php esc_html_e( 'Refuser', 'theme-perso' ); ?></button>
                <button class="button cookie-button cookie-button--customize" type="button" data-cookie-save><?php esc_html_e( 'Enregistrer mes choix', 'theme-perso' ); ?></button>
                <button class="button cookie-button cookie-button--accept" type="button" data-cookie-accept-all><?php esc_html_e( 'Accepter tout', 'theme-perso' ); ?></button>
            </div>
        </section>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
