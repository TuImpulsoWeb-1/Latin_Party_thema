<?php
/**
 * Latin Party Eventos - Single Post Template
 *
 * @package Latin_Party_Eventos
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container container-narrow">
            <span class="section-badge gold">Latin Party Eventos Blog</span>
            <h1 class="page-hero-title"><?php the_title(); ?></h1>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 10px;">
                Publicado el <?php echo get_the_date(); ?> por <?php the_author(); ?>
            </p>
        </div>
    </section>

    <div class="container container-narrow section-padding">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (has_post_thumbnail()) : ?>
                <div style="margin-bottom: 35px; border-radius: var(--radius-md); overflow: hidden;">
                    <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto;')); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content" style="color: var(--text-primary); font-size: 1.08rem; line-height: 1.85;">
                <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </article>
    </div>

</main>

<?php
get_footer();
