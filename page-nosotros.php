<?php
/**
 * Latin Party Eventos - Nosotros Template
 * Template Name: Página de Nosotros
 *
 * @package Latin_Party_Eventos
 */

get_header();

$hero_title = lp_get_setting('lp_nosotros_hero_title', 'Tu Celebración, Nuestro Legado');
$hero_desc  = lp_get_setting('lp_nosotros_hero_desc', 'En Latin Party Eventos nos especializamos en diseñar experiencias memorables que combinan tecnología, pasión, profesionalismo y excelencia en cada detalle.');

$mision_t = lp_get_setting('lp_mision_title', 'Nuestra Misión');
$mision_c = lp_get_setting('lp_mision_text', 'Ofrecer alternativas efectivas, eficaces y eficientes en la creación, diseño, organización y ejecución de eventos sociales y empresariales. Crear un ambiente óptimo con calidad, seriedad y cumplimiento, garantizando una ocasión inolvidable.');

$vision_t = lp_get_setting('lp_vision_title', 'Nuestra Visión');
$vision_c = lp_get_setting('lp_vision_text', 'Queremos que LATIN PARTY EVENTOS sea una empresa líder en organización y producción de eventos sociales y corporativos, con presencia y reconocimiento a nivel nacional, basada en el profesionalismo y la calidad humana de nuestro personal.');
?>

<main id="primary" class="site-main">

    <!-- Page Hero Banner -->
    <section class="page-hero">
        <div class="container">
            <span class="section-badge gold">Nuestra Historia &bull; Valores</span>
            <h1 class="page-hero-title"><?php echo esc_html($hero_title); ?></h1>
            <p class="page-hero-desc"><?php echo esc_html($hero_desc); ?></p>
        </div>
    </section>

    <!-- Misión & Visión Section -->
    <section class="section-padding">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 35px; margin-bottom: 70px;">
                <!-- Misión -->
                <div class="value-card" style="padding: 40px 35px;">
                    <span class="section-badge" style="margin-bottom: 15px;">Propósito Fundamental</span>
                    <h2 style="font-size: 2rem; margin-bottom: 18px;"><?php echo esc_html($mision_t); ?></h2>
                    <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.75;">
                        <?php echo esc_html($mision_c); ?>
                    </p>
                </div>

                <!-- Visión -->
                <div class="value-card gold-edge" style="padding: 40px 35px;">
                    <span class="section-badge gold" style="margin-bottom: 15px;">Hacia el Futuro</span>
                    <h2 style="font-size: 2rem; margin-bottom: 18px;"><?php echo esc_html($vision_t); ?></h2>
                    <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.75;">
                        <?php echo esc_html($vision_c); ?>
                    </p>
                </div>
            </div>

            <!-- Valores Corporativos -->
            <div class="section-header">
                <span class="section-badge"><?php echo esc_html(lp_get_setting('lp_val_sec_badge', 'Principios de Trabajo')); ?></span>
                <h2 class="section-title"><?php echo esc_html(lp_get_setting('lp_val_sec_title', 'Nuestros Valores')); ?></h2>
                <p class="section-subtitle"><?php echo esc_html(lp_get_setting('lp_val_sec_desc', 'En cada proyecto ponemos en práctica principios que garantizan experiencias únicas y exitosas.')); ?></p>
            </div>

            <div class="values-grid">
                <div class="value-card">
                    <h3 style="font-size: 1.3rem; margin-bottom: 10px; color: #ffffff;"><i class="fa-solid fa-award" style="color: var(--teal-primary); margin-right: 8px;"></i> <?php echo esc_html(lp_get_setting('lp_val1_title', 'Profesionalismo')); ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                        <?php echo esc_html(lp_get_setting('lp_val1_desc', 'Un equipo técnico y logístico altamente capacitado en cada área del evento: ingenieros de sonido, operadores de luces y directores de protocolo.')); ?>
                    </p>
                </div>

                <div class="value-card gold-edge">
                    <h3 style="font-size: 1.3rem; margin-bottom: 10px; color: #ffffff;"><i class="fa-solid fa-clock" style="color: var(--gold-light); margin-right: 8px;"></i> <?php echo esc_html(lp_get_setting('lp_val2_title', 'Ahorro de Tiempo y Recursos')); ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                        <?php echo esc_html(lp_get_setting('lp_val2_desc', 'Nos encargamos de todo el proceso técnico y de coordinación, permitiéndote disfrutar de tu día especial sin el estrés de la logística.')); ?>
                    </p>
                </div>

                <div class="value-card">
                    <h3 style="font-size: 1.3rem; margin-bottom: 10px; color: #ffffff;"><i class="fa-solid fa-chart-line" style="color: var(--teal-primary); margin-right: 8px;"></i> <?php echo esc_html(lp_get_setting('lp_val3_title', 'Mayor Visibilidad de Marca')); ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                        <?php echo esc_html(lp_get_setting('lp_val3_desc', 'Para eventos empresariales, potenciamos el posicionamiento de tu marca con puestas en escena de alto impacto que cautivan a los asistentes.')); ?>
                    </p>
                </div>

                <div class="value-card gold-edge">
                    <h3 style="font-size: 1.3rem; margin-bottom: 10px; color: #ffffff;"><i class="fa-solid fa-shield-halved" style="color: var(--gold-light); margin-right: 8px;"></i> <?php echo esc_html(lp_get_setting('lp_val4_title', 'Cumplimiento & Calidad')); ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                        <?php echo esc_html(lp_get_setting('lp_val4_desc', 'Puntualidad rigurosa en el montaje y pruebas de sonido anticipadas. Garantizamos cero improvisaciones en tu evento.')); ?>
                    </p>
                </div>
            </div>

            <!-- Respaldo / Banner de Crecimiento -->
            <?php
            $nos_cta_url      = lp_get_setting('lp_nos_cta_url', '');
            $nos_cta_btn_show = lp_get_setting('lp_nos_cta_btn_show', true);
            $nos_cta_link     = !empty($nos_cta_url) ? esc_url($nos_cta_url) : lp_whatsapp_url('¡Hola! Deseo cotizar mi evento con Latin Party Eventos.');
            ?>
            <div class="banner-advisory" style="margin-top: 60px;">
                <div class="banner-advisory-inner">
                    <div>
                        <span class="section-badge gold"><?php echo esc_html(lp_get_setting('lp_nos_cta_badge', 'Relaciones Duraderas')); ?></span>
                        <h3 style="font-size: clamp(1.4rem, 3.5vw, 1.8rem); margin-bottom: 10px;"><?php echo esc_html(lp_get_setting('lp_nos_cta_title', '¿Listo para crecer con nosotros?')); ?></h3>
                        <p style="color: var(--text-muted); max-width: 680px;"><?php echo esc_html(lp_get_setting('lp_nos_cta_desc', 'Nuestra misión y visión están enfocadas en ayudarte a alcanzar tus metas, construyendo momentos memorables que trascienden en el tiempo.')); ?></p>
                    </div>
                    <?php if ($nos_cta_btn_show) : ?>
                    <div>
                        <a href="<?php echo esc_url($nos_cta_link); ?>" target="_blank" rel="noopener" class="btn btn-gold">
                            <i class="fa-brands fa-whatsapp"></i> <?php echo esc_html(lp_get_setting('lp_nos_cta_btn', 'Quiero una Estrategia a Medida')); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
