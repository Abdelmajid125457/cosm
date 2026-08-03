<?php
/**
 * Index et blog premium.
 *
 * @package Theme_Perso
 */

get_header();

$featured      = theme_perso_featured_blog_article();
$featured_post = get_page_by_title( $featured['title'], OBJECT, 'post' );
$featured_url  = $featured_post ? get_permalink( $featured_post ) : home_url( '/blog/' );
?>

<main id="primary" class="site-main blog-page-main">
    <section class="blog-page-hero">
        <div class="container">
            <p class="eyebrow">Le blog</p>
            <h1>Conseils & inspirations</h1>
            <p>Des contenus experts pour prendre soin de votre peau naturellement et adopter une routine beauté saine, responsable et durable.</p>
        </div>
    </section>

    <section class="blog-featured-section">
        <div class="container">
            <article class="blog-featured-card">
                <div class="blog-featured-copy">
                    <span class="blog-pill"><?php echo esc_html( $featured['category'] ); ?></span>
                    <h2><a href="<?php echo esc_url( $featured_url ); ?>"><?php echo esc_html( $featured['title'] ); ?></a></h2>
                    <p><?php echo esc_html( $featured['excerpt'] ); ?></p>
                    <a class="button button-primary" href="<?php echo esc_url( $featured_url ); ?>">
                        <?php esc_html_e( 'Lire l’article', 'theme-perso' ); ?>
                        <span aria-hidden="true">→</span>
                    </a>
                </div>
                <a class="blog-featured-image" href="<?php echo esc_url( $featured_url ); ?>">
                    <img src="<?php echo esc_url( $featured['image'] ); ?>" alt="<?php echo esc_attr( $featured['title'] ); ?>" loading="eager">
                </a>
            </article>

            <div class="blog-toolbar">
                <div class="blog-filter-list" aria-label="<?php esc_attr_e( 'Filtrer les articles', 'theme-perso' ); ?>">
                    <button class="is-active" type="button" data-blog-filter="all"><?php esc_html_e( 'Tous', 'theme-perso' ); ?></button>
                    <button type="button" data-blog-filter="visage"><?php esc_html_e( 'Visage', 'theme-perso' ); ?></button>
                    <button type="button" data-blog-filter="corps"><?php esc_html_e( 'Corps', 'theme-perso' ); ?></button>
                    <button type="button" data-blog-filter="cheveux"><?php esc_html_e( 'Cheveux', 'theme-perso' ); ?></button>
                    <button type="button" data-blog-filter="bien-etre"><?php esc_html_e( 'Bien-être', 'theme-perso' ); ?></button>
                    <button type="button" data-blog-filter="peau-sensible"><?php esc_html_e( 'Peau sensible', 'theme-perso' ); ?></button>
                    <button type="button" data-blog-filter="ingredients-naturels"><?php esc_html_e( 'Ingrédients naturels', 'theme-perso' ); ?></button>
                </div>
                <label class="blog-sort">
                    <span><?php esc_html_e( 'Trier par', 'theme-perso' ); ?></span>
                    <select>
                        <option><?php esc_html_e( 'Les plus récents', 'theme-perso' ); ?></option>
                    </select>
                </label>
            </div>
        </div>
    </section>

    <section class="section blog-page-showcase">
        <div class="container blog-layout">
            <div class="blog-showcase-grid blog-showcase-grid-large">
                <?php theme_perso_render_blog_showcase_cards(); ?>
            </div>
            <aside class="blog-sidebar" aria-label="<?php esc_attr_e( 'Compléments blog', 'theme-perso' ); ?>">
                <section class="blog-sidebar-card">
                    <h2><?php esc_html_e( 'Articles populaires', 'theme-perso' ); ?></h2>
                    <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Aromathérapie : les bienfaits de la lavande fine', 'theme-perso' ); ?><span>4 min</span></a>
                    <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Vitamine C : l’actif éclat incontournable', 'theme-perso' ); ?><span>6 min</span></a>
                    <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Masque cheveux réparateur : les bons gestes', 'theme-perso' ); ?><span>5 min</span></a>
                </section>
                <section class="blog-sidebar-card">
                    <h2><?php esc_html_e( 'Produits associés', 'theme-perso' ); ?></h2>
                    <a href="<?php echo esc_url( home_url( '/boutique/' ) ); ?>"><?php esc_html_e( 'Sérum Éclat à la Rose', 'theme-perso' ); ?><span>Visage</span></a>
                    <a href="<?php echo esc_url( home_url( '/boutique/' ) ); ?>"><?php esc_html_e( 'Baume Corps Karité & Amande', 'theme-perso' ); ?><span>Corps</span></a>
                    <a href="<?php echo esc_url( home_url( '/boutique/' ) ); ?>"><?php esc_html_e( 'Huile Essentielle Lavande Fine', 'theme-perso' ); ?><span>Bien-être</span></a>
                </section>
                <section class="blog-sidebar-card blog-newsletter-card">
                    <h2><?php esc_html_e( 'Recevez nos conseils beauté chaque semaine', 'theme-perso' ); ?></h2>
                    <form class="newsletter-form" action="#" method="post">
                        <label class="screen-reader-text" for="blog-newsletter-email"><?php esc_html_e( 'Adresse email', 'theme-perso' ); ?></label>
                        <input id="blog-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e( 'Votre adresse email', 'theme-perso' ); ?>" required>
                        <?php theme_perso_security_fields( 'blog_newsletter' ); ?>
                        <button class="button button-primary" type="submit"><?php esc_html_e( 'S’inscrire', 'theme-perso' ); ?></button>
                    </form>
                </section>
            </aside>
        </div>
    </section>

    <section class="blog-trust-section">
        <div class="container blog-trust-grid">
            <div><span>◎</span><strong><?php esc_html_e( 'Conseils rédigés avec une experte', 'theme-perso' ); ?></strong></div>
            <div><span>✦</span><strong><?php esc_html_e( 'Ingrédients naturels', 'theme-perso' ); ?></strong></div>
            <div><span>⌁</span><strong><?php esc_html_e( 'Sans compromis', 'theme-perso' ); ?></strong></div>
            <div><span>♡</span><strong><?php esc_html_e( 'Engagement éthique', 'theme-perso' ); ?></strong></div>
        </div>
    </section>
</main>

<?php
get_footer();
