<?php
/**
 * Latin Party Eventos - Main Index / Blog Template
 *
 * @package Latin_Party_Eventos
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container">
            <span class="section-badge gold">Actualidad &amp; Tendencias</span>
            <h1 class="page-hero-title">Noticias y Eventos</h1>
            <p class="page-hero-desc">Consejos de planeación, ideas para bodas, 15 años y tendencias audiovisuales.</p>
        </div>
    </section>

    <div class="container section-padding">
        <?php if (have_posts()) : ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="service-card" style="display: flex; flex-direction: column;">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="service-img-wrap">
                                <?php the_post_thumbnail('medium_large', array('class' => 'service-img')); ?>
                            </div>
                        <?php endif; ?>
                        <div class="service-content">
                            <span style="font-size: 0.8rem; color: var(--gold-light); text-transform: uppercase; margin-bottom: 8px;"><?php echo get_the_date(); ?></span>
                            <h2 style="font-size: 1.4rem; margin-bottom: 12px;">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="service-desc"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm" style="align-self: flex-start; margin-top: auto;">
                                Leer Más <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div style="margin-top: 50px; text-align: center;">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <div style="text-align: center; padding: 60px 0;">
                <h2>No se encontraron publicaciones</h2>
                <p style="color: var(--text-muted); margin-top: 10px;">Próximamente publicaremos nuevo contenido.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-teal" style="margin-top: 25px;">Volver al Inicio</a>
            </div>
        <?php endif; ?>
    </div>

</main>

<?php
get_footer();
