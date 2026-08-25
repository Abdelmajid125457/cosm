<?php
/**
 * Espace client premium.
 *
 * @package Theme_Perso
 */

$asset = function_exists( 'theme_perso_product_asset_url' ) ? 'theme_perso_product_asset_url' : null;

$floating_products = array(
    array(
        'name'  => esc_html__( 'Sérum Éclat à la Rose', 'theme-perso' ),
        'image' => $asset ? $asset( 'photo-serum-eclat-rose.png' ) : '',
    ),
    array(
        'name'  => esc_html__( 'Crème Hydratante Sauge & Camomille', 'theme-perso' ),
        'image' => $asset ? $asset( 'photo-creme-hydratante-sauge-camomille.png' ) : '',
    ),
    array(
        'name'  => esc_html__( 'Baume Corps Karité & Amande', 'theme-perso' ),
        'image' => $asset ? $asset( 'photo-baume-corps-karite-amande.png' ) : '',
    ),
    array(
        'name'  => esc_html__( 'Shampooing Doux Sauge & Ortie', 'theme-perso' ),
        'image' => $asset ? $asset( 'photo-shampooing-doux-sauge-ortie.png' ) : '',
    ),
);

$account_benefits = array(
    array(
        'icon'  => 'package',
        'title' => esc_html__( 'Commande simplifiée', 'theme-perso' ),
        'text'  => esc_html__( 'Suivez vos commandes en temps réel.', 'theme-perso' ),
    ),
    array(
        'icon'  => 'sparkle',
        'title' => esc_html__( 'Diagnostic personnalisé', 'theme-perso' ),
        'text'  => esc_html__( 'Retrouvez vos recommandations beauté.', 'theme-perso' ),
    ),
    array(
        'icon'  => 'heart',
        'title' => esc_html__( 'Favoris', 'theme-perso' ),
        'text'  => esc_html__( 'Enregistrez vos produits préférés.', 'theme-perso' ),
    ),
    array(
        'icon'  => 'gift',
        'title' => esc_html__( 'Offres exclusives', 'theme-perso' ),
        'text'  => esc_html__( 'Accédez à des avantages réservés aux membres.', 'theme-perso' ),
    ),
);

if ( ! function_exists( 'theme_perso_account_icon' ) ) :
function theme_perso_account_icon( $name ) {
    $icons = array(
        'user'    => '<svg viewBox="0 0 24 24" focusable="false"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg>',
        'package' => '<svg viewBox="0 0 24 24" focusable="false"><path d="m3 7 9 5 9-5"></path><path d="M12 22V12"></path><path d="M21 7v10l-9 5-9-5V7l9-5 9 5Z"></path></svg>',
        'sparkle' => '<svg viewBox="0 0 24 24" focusable="false"><path d="M12 3l1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8L12 3Z"></path><path d="M19 15l.9 2.6L22 18.5l-2.1.9L19 22l-.9-2.6-2.1-.9 2.1-.9L19 15Z"></path></svg>',
        'heart'   => '<svg viewBox="0 0 24 24" focusable="false"><path d="M20.8 4.6a5.4 5.4 0 0 0-7.6 0L12 5.8l-1.2-1.2a5.4 5.4 0 1 0-7.6 7.6L12 21l8.8-8.8a5.4 5.4 0 0 0 0-7.6Z"></path></svg>',
        'gift'    => '<svg viewBox="0 0 24 24" focusable="false"><path d="M20 12v10H4V12"></path><path d="M2 7h20v5H2z"></path><path d="M12 22V7"></path><path d="M12 7H7.5a2.5 2.5 0 1 1 2.3-3.5C10.7 5.2 12 7 12 7Z"></path><path d="M12 7h4.5a2.5 2.5 0 1 0-2.3-3.5C13.3 5.2 12 7 12 7Z"></path></svg>',
        'lock'    => '<svg viewBox="0 0 24 24" focusable="false"><rect x="4" y="10" width="16" height="11" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3"></path></svg>',
    );

    return isset( $icons[ $name ] ) ? $icons[ $name ] : $icons['sparkle'];
}
endif;
?>

<section class="account-premium">
    <?php if ( is_user_logged_in() ) : ?>
        <section class="account-access-section account-auth-experience" aria-labelledby="account-hero-title">
            <div class="account-auth-shell">
                <aside class="account-auth-brand" aria-label="<?php esc_attr_e( 'Avantages de l’espace client', 'theme-perso' ); ?>">
                    <div class="account-auth-brand-copy">
                        <p class="eyebrow"><?php esc_html_e( 'COSM’ÉTHIQUE', 'theme-perso' ); ?></p>
                        <h1 id="account-hero-title"><?php esc_html_e( 'Mon espace beauté', 'theme-perso' ); ?></h1>
                        <p><?php esc_html_e( 'Retrouvez vos commandes, votre diagnostic personnalisé, vos favoris et une expérience pensée pour votre routine beauté.', 'theme-perso' ); ?></p>
                    </div>

                    <figure class="account-auth-lifestyle">
                        <?php if ( ! empty( $floating_products[0]['image'] ) ) : ?>
                            <img src="<?php echo esc_url( $floating_products[0]['image'] ); ?>" alt="<?php echo esc_attr__( 'Routine beauté COSM’ÉTHIQUE', 'theme-perso' ); ?>" loading="eager">
                        <?php endif; ?>
                        <figcaption>
                            <span><?php echo theme_perso_account_icon( 'lock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                            <strong><?php esc_html_e( 'Espace sécurisé', 'theme-perso' ); ?></strong>
                            <small><?php esc_html_e( 'Vos données et commandes restent protégées.', 'theme-perso' ); ?></small>
                        </figcaption>
                    </figure>

                    <div class="account-auth-trust-grid">
                        <div>
                            <strong>24/72h</strong>
                            <span><?php esc_html_e( 'Suivi de livraison', 'theme-perso' ); ?></span>
                        </div>
                        <div>
                            <strong>98%</strong>
                            <span><?php esc_html_e( 'Origine naturelle', 'theme-perso' ); ?></span>
                        </div>
                        <div>
                            <strong>100%</strong>
                            <span><?php esc_html_e( 'Paiement protégé', 'theme-perso' ); ?></span>
                        </div>
                    </div>

                    <ul class="account-auth-benefits">
                        <li><?php echo theme_perso_account_icon( 'package' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span><?php esc_html_e( 'Commandes et factures centralisées', 'theme-perso' ); ?></span></li>
                        <li><?php echo theme_perso_account_icon( 'sparkle' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span><?php esc_html_e( 'Diagnostic beauté sauvegardé', 'theme-perso' ); ?></span></li>
                        <li><?php echo theme_perso_account_icon( 'heart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span><?php esc_html_e( 'Favoris et recommandations personnalisés', 'theme-perso' ); ?></span></li>
                    </ul>
                </aside>

                <div class="account-woocommerce-wrap account-dashboard-wrap" data-account-auth>
                    <?php echo do_shortcode( '[woocommerce_my_account]' ); ?>
                </div>
            </div>
        </section>
    <?php else : ?>
    <section class="account-access-section account-auth-experience" aria-labelledby="account-hero-title">
        <div class="account-auth-shell">
            <aside class="account-auth-brand" aria-label="<?php esc_attr_e( 'Avantages de l’espace client', 'theme-perso' ); ?>">
                <div class="account-auth-brand-copy">
                    <p class="eyebrow"><?php esc_html_e( 'COSM’ÉTHIQUE', 'theme-perso' ); ?></p>
                    <h1 id="account-hero-title"><?php esc_html_e( 'Mon espace beauté', 'theme-perso' ); ?></h1>
                    <p><?php esc_html_e( 'Retrouvez vos commandes, votre diagnostic personnalisé, vos favoris et une expérience pensée pour votre routine beauté.', 'theme-perso' ); ?></p>
                </div>

                <figure class="account-auth-lifestyle">
                    <?php if ( ! empty( $floating_products[0]['image'] ) ) : ?>
                        <img src="<?php echo esc_url( $floating_products[0]['image'] ); ?>" alt="<?php echo esc_attr__( 'Routine beauté COSM’ÉTHIQUE', 'theme-perso' ); ?>" loading="eager">
                    <?php endif; ?>
                    <figcaption>
                        <span><?php echo theme_perso_account_icon( 'lock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                        <strong><?php esc_html_e( 'Espace sécurisé', 'theme-perso' ); ?></strong>
                        <small><?php esc_html_e( 'Vos données et commandes restent protégées.', 'theme-perso' ); ?></small>
                    </figcaption>
                </figure>

                <div class="account-auth-trust-grid">
                    <div>
                        <strong>24/72h</strong>
                        <span><?php esc_html_e( 'Suivi de livraison', 'theme-perso' ); ?></span>
                    </div>
                    <div>
                        <strong>98%</strong>
                        <span><?php esc_html_e( 'Origine naturelle', 'theme-perso' ); ?></span>
                    </div>
                    <div>
                        <strong>100%</strong>
                        <span><?php esc_html_e( 'Paiement protégé', 'theme-perso' ); ?></span>
                    </div>
                </div>

                <ul class="account-auth-benefits">
                    <li><?php echo theme_perso_account_icon( 'package' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span><?php esc_html_e( 'Commandes et factures centralisées', 'theme-perso' ); ?></span></li>
                    <li><?php echo theme_perso_account_icon( 'sparkle' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span><?php esc_html_e( 'Diagnostic beauté sauvegardé', 'theme-perso' ); ?></span></li>
                    <li><?php echo theme_perso_account_icon( 'heart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span><?php esc_html_e( 'Favoris et recommandations personnalisés', 'theme-perso' ); ?></span></li>
                </ul>
            </aside>

            <div class="account-login-card account-auth-card">
                <div class="account-login-heading">
                    <span><?php echo theme_perso_account_icon( 'user' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                    <h2><?php esc_html_e( 'Bienvenue', 'theme-perso' ); ?></h2>
                    <p><?php esc_html_e( 'Connectez-vous ou créez votre compte client en quelques instants.', 'theme-perso' ); ?></p>
                </div>
                <div class="account-auth-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Choisir une action', 'theme-perso' ); ?>">
                    <button type="button" class="account-auth-tab is-active" id="account-tab-login" role="tab" aria-selected="true" aria-controls="customer_login_panel" data-account-tab="login"><?php esc_html_e( 'Connexion', 'theme-perso' ); ?></button>
                    <button type="button" class="account-auth-tab" id="account-tab-register" role="tab" aria-selected="false" aria-controls="customer_register_panel" data-account-tab="register"><?php esc_html_e( 'Créer un compte', 'theme-perso' ); ?></button>
                </div>
                <div class="account-woocommerce-wrap" data-account-auth>
                    <?php echo do_shortcode( '[woocommerce_my_account]' ); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="account-benefits-section">
        <div class="section-heading">
            <p class="eyebrow"><?php esc_html_e( 'Espace membre', 'theme-perso' ); ?></p>
            <h2><?php esc_html_e( 'Pourquoi créer un compte ?', 'theme-perso' ); ?></h2>
        </div>
        <div class="account-benefits-grid">
            <?php foreach ( $account_benefits as $benefit ) : ?>
                <article class="account-benefit-card">
                    <span><?php echo theme_perso_account_icon( $benefit['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                    <h3><?php echo esc_html( $benefit['title'] ); ?></h3>
                    <p><?php echo esc_html( $benefit['text'] ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="account-stats-band" data-counter-scope aria-label="<?php esc_attr_e( 'Chiffres clés COSM’ÉTHIQUE', 'theme-perso' ); ?>">
        <div>
            <strong>+<em data-counter-target="12000">0</em></strong>
            <span><?php esc_html_e( 'clientes satisfaites', 'theme-perso' ); ?></span>
        </div>
        <div>
            <strong><em data-counter-target="98">0</em>%</strong>
            <span><?php esc_html_e( 'd’ingrédients d’origine naturelle', 'theme-perso' ); ?></span>
        </div>
        <div>
            <strong><em data-counter-target="72">0</em>h</strong>
            <span><?php esc_html_e( 'livraison en 24/72 h', 'theme-perso' ); ?></span>
        </div>
        <div>
            <strong>100%</strong>
            <span><?php esc_html_e( 'paiement sécurisé', 'theme-perso' ); ?></span>
        </div>
    </section>
</section>
