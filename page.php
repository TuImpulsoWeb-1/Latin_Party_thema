<?php
/**
 * Latin Party Eventos - Default Page Template
 *
 * @package Latin_Party_Eventos
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="page-hero">
        <div class="container">
            <h1 class="page-hero-title"><?php the_title(); ?></h1>
        </div>
    </section>

    <div class="container section-padding">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content" style="color: var(--text-primary); font-size: 1.05rem; line-height: 1.8;">
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
