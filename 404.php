<?php
/**
 * Latin Party Eventos - 404 Page Template
 *
 * @package Latin_Party_Eventos
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="section-padding" style="min-height: 70vh; display: flex; align-items: center;">
        <div class="container container-narrow" style="text-align: center;">
            <span class="section-badge gold" style="font-size: 1rem; padding: 8px 24px;">Error 404</span>
            <h1 style="font-size: clamp(3rem, 7vw, 6rem); margin: 20px 0 10px 0; color: #ffffff;">Página No Encontrada</h1>
            <p style="color: var(--text-muted); font-size: 1.15rem; max-width: 600px; margin: 0 auto 35px auto;">
                Lo sentimos, la página que buscas no existe o ha sido movida. Pero la fiesta continúa en Latin Party Eventos.
            </p>
            <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-teal">
                    <i class="fa-solid fa-house"></i> Ir al Inicio
                </a>
                <a href="<?php echo esc_url(lp_whatsapp_url('¡Hola! Deseo cotizar mi evento.')); ?>" target="_blank" rel="noopener" class="btn btn-gold">
                    <i class="fa-brands fa-whatsapp"></i> Hablar con un Asesor
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
