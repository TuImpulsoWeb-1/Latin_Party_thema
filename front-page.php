<?php
/**
 * Latin Party Eventos - Front Page Template (Home)
 * Template Name: Página de Inicio
 *
 * 100% Fully editable via Advanced Custom Fields (ACF) and WordPress Customizer.
 * All texts, titles, images, badges, links, and buttons can be modified from WP Admin.
 *
 * @package Latin_Party_Eventos
 */

get_header();

// Dynamic URLs for key pages
$servicios_url = lp_get_page_url('servicios', '#servicios');
$nosotros_url  = lp_get_page_url('nosotros');
$contacto_url  = lp_get_page_url('contacto', '#contacto');

// -----------------------------------------------------------------------------
// 1. HERO SECTION
// -----------------------------------------------------------------------------
$hero_badge     = lp_get_setting('lp_hero_badge', '⭐ Producción Integral de Eventos');
$hero_title     = lp_get_setting('lp_hero_title', 'Vive la fiesta, nosotros la creamos');
$hero_hl        = lp_get_setting('lp_hero_highlight', 'Eventos que combinan confianza, estilo y diversión');
$hero_desc      = lp_get_setting('lp_hero_description', 'En Latin Party Eventos convertimos tus ideas en experiencias únicas. Desde bodas y 15 años hasta eventos corporativos y conciertos, nuestro equipo se encarga de cada detalle.');

$hero_btn1_show = lp_get_setting('lp_hero_btn1_show', true);
$hero_btn1_t    = lp_get_setting('lp_hero_btn1_text', 'Empieza tu evento hoy');
$hero_btn1_u    = lp_get_setting('lp_hero_btn1_url', '');
if (empty($hero_btn1_u)) {
    $hero_btn1_u = $contacto_url;
}

$hero_btn2_show = lp_get_setting('lp_hero_btn2_show', true);
$hero_btn2_t    = lp_get_setting('lp_hero_btn2_text', 'Hablar por WhatsApp');
$hero_btn2_u    = lp_get_setting('lp_hero_btn2_url', '');
if (empty($hero_btn2_u)) {
    $hero_btn2_u = lp_whatsapp_url();
}

$hero_img1 = lp_get_image_url(lp_get_setting('lp_hero_img1'), 'hero/hero-1.jpg');
$hero_img2 = lp_get_image_url(lp_get_setting('lp_hero_img2'), 'hero/hero-2.jpg');
$hero_img3 = lp_get_image_url(lp_get_setting('lp_hero_img3'), 'hero/hero-3.jpg');

// -----------------------------------------------------------------------------
// 2. METRICS / STATS
// -----------------------------------------------------------------------------
$s1_num = lp_get_setting('lp_stat1_num', '+15');
$s1_lbl = lp_get_setting('lp_stat1_lbl', 'Años de Experiencia');
$s2_num = lp_get_setting('lp_stat2_num', '+1,200');
$s2_lbl = lp_get_setting('lp_stat2_lbl', 'Eventos Exitosos');
$s3_num = lp_get_setting('lp_stat3_num', '100%');
$s3_lbl = lp_get_setting('lp_stat3_lbl', 'Satisfacción Garantizada');
$s4_num = lp_get_setting('lp_stat4_num', 'PRO');
$s4_lbl = lp_get_setting('lp_stat4_lbl', 'Equipos Propios DMX & LED');

// -----------------------------------------------------------------------------
// 3. ADVISORY BANNER
// -----------------------------------------------------------------------------
$adv_badge    = lp_get_setting('lp_adv_badge', 'Asesoría Gratuita');
$adv_title    = lp_get_setting('lp_adv_title', 'Asesoría Personalizada Sin Costo');
$adv_desc     = lp_get_setting('lp_adv_desc', 'Convierte tu idea en un evento inolvidable. Agenda una sesión gratuita con nuestros expertos y descubre cómo darle vida a tu celebración, sin compromiso.');
$adv_btn_show = lp_get_setting('lp_adv_btn_show', true);
$adv_btn_t    = lp_get_setting('lp_adv_btn_text', 'Agendar Asesoría Gratuita');
$adv_btn_u    = lp_get_setting('lp_adv_btn_url', '');
if (empty($adv_btn_u)) {
    $adv_btn_u = lp_whatsapp_url('¡Hola! Deseo agendar mi asesoría personalizada sin costo con Latin Party Eventos.');
}

// -----------------------------------------------------------------------------
// 4. EVENT CATEGORIES (NUESTROS EVENTOS)
// -----------------------------------------------------------------------------
$events_badge = lp_get_setting('lp_events_badge', 'Celebraciones Exclusivas');
$events_title = lp_get_setting('lp_events_title', 'Nuestros Eventos');
$events_desc  = lp_get_setting('lp_events_desc', 'Cada celebración es única, por eso en Latin Party Eventos diseñamos experiencias a tu medida. Desde cumpleaños y bodas hasta fiestas corporativas y conciertos, nuestro equipo se encarga de que cada detalle brille con confianza, estilo y diversión.');

$ev_items = array(
    array(
        'badge' => lp_get_setting('lp_ev1_badge', 'Celebración Soñada'),
        'title' => lp_get_setting('lp_ev1_title', '15 Años'),
        'desc'  => lp_get_setting('lp_ev1_desc', 'Montajes inolvidables con luces robóticas, pista LED de baile, efectos especiales y sonido de primer nivel.'),
        'img'   => lp_get_image_url(lp_get_setting('lp_ev1_img'), 'categorias/15-anos.jpg'),
        'btn'   => lp_get_setting('lp_ev1_btn', 'Ver detalles'),
        'url'   => lp_get_setting('lp_ev1_url', '') ?: $servicios_url,
    ),
    array(
        'badge' => lp_get_setting('lp_ev2_badge', 'Elegancia & Romance'),
        'title' => lp_get_setting('lp_ev2_title', 'Bodas'),
        'desc'  => lp_get_setting('lp_ev2_desc', 'Atmósferas cálidas, iluminación perimetral sutil, drapeados en telas, sonido de ceremonia y fiesta nupcial.'),
        'img'   => lp_get_image_url(lp_get_setting('lp_ev2_img'), 'categorias/bodas.jpg'),
        'btn'   => lp_get_setting('lp_ev2_btn', 'Ver detalles'),
        'url'   => lp_get_setting('lp_ev2_url', '') ?: $servicios_url,
    ),
    array(
        'badge' => lp_get_setting('lp_ev3_badge', 'Impacto de Marca'),
        'title' => lp_get_setting('lp_ev3_title', 'Corporativos'),
        'desc'  => lp_get_setting('lp_ev3_desc', 'Congresos, lanzamientos de marca, ferias y fiestas de fin de año con tecnología audiovisual de vanguardia.'),
        'img'   => lp_get_image_url(lp_get_setting('lp_ev3_img'), 'categorias/corporativos.jpg'),
        'btn'   => lp_get_setting('lp_ev3_btn', 'Ver detalles'),
        'url'   => lp_get_setting('lp_ev3_url', '') ?: $servicios_url,
    ),
    array(
        'badge' => lp_get_setting('lp_ev4_badge', 'Pura Energía'),
        'title' => lp_get_setting('lp_ev4_title', 'Fiestas'),
        'desc'  => lp_get_setting('lp_ev4_desc', 'Conciertos privados, cumpleaños temáticos y aniversarios con tarimas modulares y pantallas gigantes.'),
        'img'   => lp_get_image_url(lp_get_setting('lp_ev4_img'), 'categorias/fiestas.jpg'),
        'btn'   => lp_get_setting('lp_ev4_btn', 'Ver detalles'),
        'url'   => lp_get_setting('lp_ev4_url', '') ?: $servicios_url,
    ),
);

// -----------------------------------------------------------------------------
// 5. FEATURED SERVICES (NUESTROS SERVICIOS)
// -----------------------------------------------------------------------------
$serv_badge = lp_get_setting('lp_serv_badge', 'Tecnología de Punta');
$serv_title = lp_get_setting('lp_serv_title', 'Nuestros Servicios');
$serv_sub   = lp_get_setting('lp_serv_subtitle', 'Equipamiento técnico profesional propio para garantizar que la potencia, el color y la calidad visual de tu evento sean impecables.');

$serv_cards = array(
    array(
        'icon'  => 'fa-solid fa-volume-high',
        'title' => lp_get_setting('lp_serv1_title', 'Sonido Profesional'),
        'desc'  => lp_get_setting('lp_serv1_desc', 'La potencia y claridad que tu evento merece. Desde sistemas convencionales hasta line array de gran formato, garantizamos una experiencia auditiva impecable para 50 hasta 5,000 personas.'),
        'img'   => lp_get_image_url(lp_get_setting('lp_serv1_img'), 'servicios/sonido.jpg'),
        'btn'   => lp_get_setting('lp_serv1_btn', 'Ver configuración'),
        'url'   => lp_get_setting('lp_serv1_url', '') ?: $servicios_url,
    ),
    array(
        'icon'  => 'fa-solid fa-lightbulb',
        'title' => lp_get_setting('lp_serv2_title', 'Iluminación Creativa'),
        'desc'  => lp_get_setting('lp_serv2_desc', 'Transformamos espacios con luces LED, cabezas móviles Beam/Spot y control DMX computarizado que generan atmósferas envolventes y sincronizadas al ritmo de la música.'),
        'img'   => lp_get_image_url(lp_get_setting('lp_serv2_img'), 'servicios/iluminacion.jpg'),
        'btn'   => lp_get_setting('lp_serv2_btn', 'Ver configuración'),
        'url'   => lp_get_setting('lp_serv2_url', '') ?: $servicios_url,
    ),
    array(
        'icon'  => 'fa-solid fa-tv',
        'title' => lp_get_setting('lp_serv3_title', 'Pantallas y Visuales'),
        'desc'  => lp_get_setting('lp_serv3_desc', 'Impacta a tu público con pantallas LED de alta definición y proyectores de alto brillo, ideales para videos corporativos, transmisiones en vivo y backings interactivos.'),
        'img'   => lp_get_image_url(lp_get_setting('lp_serv3_img'), 'servicios/pantallas.jpg'),
        'btn'   => lp_get_setting('lp_serv3_btn', 'Ver configuración'),
        'url'   => lp_get_setting('lp_serv3_url', '') ?: $servicios_url,
    ),
    array(
        'icon'  => 'fa-solid fa-landmark',
        'title' => lp_get_setting('lp_serv4_title', 'Escenarios y Tarimas'),
        'desc'  => lp_get_setting('lp_serv4_desc', 'Estructuras seguras, pasarelas, carpas tipo hangar y truss modulares en aluminio que se adaptan a cualquier espectáculo, desde presentaciones íntimas hasta grandes conciertos.'),
        'img'   => lp_get_image_url(lp_get_setting('lp_serv4_img'), 'servicios/tarimas.jpg'),
        'btn'   => lp_get_setting('lp_serv4_btn', 'Ver configuración'),
        'url'   => lp_get_setting('lp_serv4_url', '') ?: $servicios_url,
    ),
    array(
        'icon'  => 'fa-solid fa-border-all',
        'title' => lp_get_setting('lp_serv5_title', 'Pistas de Baile LED DMX'),
        'desc'  => lp_get_setting('lp_serv5_desc', 'El centro de atracción de la fiesta. Módulos de vidrio templado con gráficos animados, textos y destellos luminosos para que el baile sea el momento más vibrante de la noche.'),
        'img'   => lp_get_image_url(lp_get_setting('lp_serv5_img'), 'servicios/pista-led.jpg'),
        'btn'   => lp_get_setting('lp_serv5_btn', 'Ver configuración'),
        'url'   => lp_get_setting('lp_serv5_url', '') ?: $servicios_url,
    ),
    array(
        'icon'  => 'fa-solid fa-couch',
        'title' => lp_get_setting('lp_serv6_title', 'Mobiliario & Decoración'),
        'desc'  => lp_get_setting('lp_serv6_desc', 'Cada detalle cuenta. Ofrecemos mobiliario moderno tipo lounge, sillas Tiffany, mesas iluminadas y drapeados en telas que realzan el estilo y la comodidad de tu celebración.'),
        'img'   => lp_get_image_url(lp_get_setting('lp_serv6_img'), 'servicios/mobiliario.jpg'),
        'btn'   => lp_get_setting('lp_serv6_btn', 'Ver configuración'),
        'url'   => lp_get_setting('lp_serv6_url', '') ?: $servicios_url,
    ),
);

// -----------------------------------------------------------------------------
// 6. PILARES DE CONFIANZA
// -----------------------------------------------------------------------------
$pillars_badge = lp_get_setting('lp_pillars_badge', 'Garantía de Calidad');
$pillars_title = lp_get_setting('lp_pillars_title', 'Nuestros Pilares');
$pillars_desc  = lp_get_setting('lp_pillars_desc', 'El estándar de excelencia técnica y humana que respalda cada uno de nuestros montajes.');

$pillar_items = array(
    array(
        'icon'  => 'fa-solid fa-user-tie',
        'title' => lp_get_setting('lp_pillar1_title', 'Profesionalismo'),
        'desc'  => lp_get_setting('lp_pillar1_desc', 'Equipo humano capacitado, puntual y con vocación de servicio para que todo salga perfecto.'),
    ),
    array(
        'icon'  => 'fa-solid fa-compact-disc',
        'title' => lp_get_setting('lp_pillar2_title', 'Sonido Premium'),
        'desc'  => lp_get_setting('lp_pillar2_desc', 'Cero saturación ni acoples. Calibración acústica con procesadores digitales de alta fidelidad.'),
    ),
    array(
        'icon'  => 'fa-solid fa-wand-magic-sparkles',
        'title' => lp_get_setting('lp_pillar3_title', 'Iluminación Dinámica'),
        'desc'  => lp_get_setting('lp_pillar3_desc', 'Efectos visuales coreografiados por operadores de consolas DMX profesionales.'),
    ),
    array(
        'icon'  => 'fa-solid fa-gem',
        'title' => lp_get_setting('lp_pillar4_title', 'Mobiliario Elegante'),
        'desc'  => lp_get_setting('lp_pillar4_desc', 'Diseño estético y confortable que armoniza perfectamente con la temática de tu festejo.'),
    ),
);

// -----------------------------------------------------------------------------
// 7. TESTIMONIOS
// -----------------------------------------------------------------------------
$testi_badge = lp_get_setting('lp_testi_badge', 'Opiniones de Clientes');
$testi_title = lp_get_setting('lp_testi_title', 'Lo que dicen nuestros clientes');
$testi_desc  = lp_get_setting('lp_testi_desc', 'La satisfacción de cada anfitrión es nuestro mayor testimonio de compromiso y éxito.');

$t1_name = lp_get_setting('lp_testi1_name', 'Laura Torres');
$t1_city = lp_get_setting('lp_testi1_city', 'Bogotá • Celebración 15 Años');
$t1_text = lp_get_setting('lp_testi1_text', 'Contratamos a LatinPartyEventos para la celebración de los 15 años de mi hija y fue una experiencia inolvidable. Desde la decoración hasta la música, todo estuvo perfectamente coordinado. La atención fue muy profesional y nuestros invitados quedaron encantados. ¡Gracias por hacer de ese día algo tan especial!');

$t2_name = lp_get_setting('lp_testi2_name', 'Carolina Ramírez');
$t2_city = lp_get_setting('lp_testi2_city', 'Ibagué • Evento Corporativo');
$t2_text = lp_get_setting('lp_testi2_text', 'Confiamos en LatinPartyEventos para la fiesta de fin de año de la empresa y superaron todas nuestras expectativas. La organización, la ambientación y la energía que lograron fue espectacular. Sin duda volveremos a trabajar con ellos para futuros eventos.');

$t3_name = lp_get_setting('lp_testi3_name', 'Julián & Andrea');
$t3_city = lp_get_setting('lp_testi3_city', 'Bogotá • Boda Campestre');
$t3_text = lp_get_setting('lp_testi3_text', 'El montaje de sonido para nuestra boda y la pista de luces LED superaron completamente lo que soñamos. Todos los invitados no pararon de bailar toda la noche. ¡Recomendadísimos al 100%!');

// -----------------------------------------------------------------------------
// 8. FORMULARIO RÁPIDO EN HOME
// -----------------------------------------------------------------------------
$h_form_badge = lp_get_setting('lp_home_form_badge', 'Cotización Online');
$h_form_title = lp_get_setting('lp_home_form_title', 'Diseñemos juntos tu próximo evento');
$h_form_desc  = lp_get_setting('lp_home_form_desc', 'Diligencia este formulario y nuestro director técnico te contactará con una propuesta a tu medida en menos de 30 minutos.');
$h_form_btn   = lp_get_setting('lp_home_form_btn', 'Enviar Solicitud • Recibir Asesoría');
?>

<main id="primary" class="site-main">

    <!-- =======================================================================
         1. HERO SECTION
         ======================================================================= -->
    <section class="hero-section">
        <!-- Background Slider -->
        <div class="hero-bg-slider" aria-hidden="true">
            <div class="hero-slide active" style="background-image: url('<?php echo esc_url($hero_img1); ?>');"></div>
            <div class="hero-slide" style="background-image: url('<?php echo esc_url($hero_img2); ?>');"></div>
            <div class="hero-slide" style="background-image: url('<?php echo esc_url($hero_img3); ?>');"></div>
        </div>
        <div class="hero-overlay" aria-hidden="true"></div>

        <div class="container">
            <div class="hero-content">
                <span class="section-badge"><?php echo esc_html($hero_badge); ?></span>
                <h1 class="hero-title">
                    <?php echo esc_html($hero_title); ?>
                    <span class="highlight-gold" style="display: block;"><?php echo esc_html($hero_hl); ?></span>
                </h1>
                <p class="hero-description">
                    <?php echo esc_html($hero_desc); ?>
                </p>

                <div class="hero-actions">
                    <?php if ($hero_btn1_show) : ?>
                        <a href="<?php echo esc_url($hero_btn1_u); ?>" class="btn btn-gold">
                            <i class="fa-solid fa-calendar-check"></i> <?php echo esc_html($hero_btn1_t); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($hero_btn2_show) : ?>
                        <a href="<?php echo esc_url($hero_btn2_u); ?>" target="_blank" rel="noopener" class="btn btn-teal">
                            <i class="fa-brands fa-whatsapp"></i> <?php echo esc_html($hero_btn2_t); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Metrics / Stats Bar -->
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number"><?php echo esc_html($s1_num); ?></div>
                        <div class="stat-label"><?php echo esc_html($s1_lbl); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo esc_html($s2_num); ?></div>
                        <div class="stat-label"><?php echo esc_html($s2_lbl); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo esc_html($s3_num); ?></div>
                        <div class="stat-label"><?php echo esc_html($s3_lbl); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?php echo esc_html($s4_num); ?></div>
                        <div class="stat-label"><?php echo esc_html($s4_lbl); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =======================================================================
         2. ASESORÍA PERSONALIZADA SIN COSTO
         ======================================================================= -->
    <div class="container">
        <section class="banner-advisory">
            <div class="banner-advisory-inner">
                <div class="banner-advisory-text">
                    <span class="section-badge gold" style="margin-bottom: 8px;"><?php echo esc_html($adv_badge); ?></span>
                    <h2 class="banner-advisory-title"><?php echo esc_html($adv_title); ?></h2>
                    <p class="banner-advisory-desc"><?php echo esc_html($adv_desc); ?></p>
                </div>
                <?php if ($adv_btn_show) : ?>
                <div>
                    <a href="<?php echo esc_url($adv_btn_u); ?>" target="_blank" rel="noopener" class="btn btn-teal">
                        <i class="fa-solid fa-comments"></i> <?php echo esc_html($adv_btn_t); ?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </div>

    <!-- =======================================================================
         3. NUESTROS EVENTOS (CATEGORÍAS EDITABLES)
         ======================================================================= -->
    <section class="section-padding" id="eventos">
        <div class="container">
            <div class="section-header">
                <span class="section-badge"><?php echo esc_html($events_badge); ?></span>
                <h2 class="section-title"><?php echo esc_html($events_title); ?></h2>
                <p class="section-subtitle"><?php echo esc_html($events_desc); ?></p>
            </div>

            <div class="events-grid">
                <?php foreach ($ev_items as $ev) : ?>
                    <a href="<?php echo esc_url($ev['url']); ?>" class="event-card">
                        <img src="<?php echo esc_url($ev['img']); ?>" alt="<?php echo esc_attr($ev['title']); ?>" class="event-card-img" loading="lazy">
                        <div class="event-card-overlay"></div>
                        <div class="event-card-content">
                            <span class="event-badge"><?php echo esc_html($ev['badge']); ?></span>
                            <h3 class="event-card-title"><?php echo esc_html($ev['title']); ?></h3>
                            <p class="event-card-desc"><?php echo esc_html($ev['desc']); ?></p>
                            <span class="event-card-link-arrow"><?php echo esc_html($ev['btn']); ?> <i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- =======================================================================
         4. NUESTROS SERVICIOS DESTACADOS (6 TARJETAS EDITABLES)
         ======================================================================= -->
    <section class="section-padding" id="servicios" style="background: var(--bg-surface);">
        <div class="container">
            <div class="section-header">
                <span class="section-badge gold"><?php echo esc_html($serv_badge); ?></span>
                <h2 class="section-title"><?php echo esc_html($serv_title); ?></h2>
                <p class="section-subtitle"><?php echo esc_html($serv_sub); ?></p>
            </div>

            <div class="services-grid">
                <?php foreach ($serv_cards as $sc) : ?>
                    <div class="service-card">
                        <div class="service-img-wrap">
                            <img src="<?php echo esc_url($sc['img']); ?>" alt="<?php echo esc_attr($sc['title']); ?>" class="service-img" loading="lazy">
                            <div class="service-icon-floating"><i class="<?php echo esc_attr($sc['icon']); ?>"></i></div>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title"><?php echo esc_html($sc['title']); ?></h3>
                            <p class="service-desc"><?php echo esc_html($sc['desc']); ?></p>
                            <a href="<?php echo esc_url($sc['url']); ?>" class="btn btn-outline btn-sm">
                                <?php echo esc_html($sc['btn']); ?> <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- =======================================================================
         5. NUESTROS PILARES DE CONFIANZA (EDITABLES)
         ======================================================================= -->
    <section class="pillars-section section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-badge gold"><?php echo esc_html($pillars_badge); ?></span>
                <h2 class="section-title"><?php echo esc_html($pillars_title); ?></h2>
                <p class="section-subtitle"><?php echo esc_html($pillars_desc); ?></p>
            </div>

            <div class="pillars-grid">
                <?php foreach ($pillar_items as $pil) : ?>
                    <div class="pillar-card">
                        <div class="pillar-icon"><i class="<?php echo esc_attr($pil['icon']); ?>"></i></div>
                        <h3 class="pillar-title"><?php echo esc_html($pil['title']); ?></h3>
                        <p class="pillar-desc"><?php echo esc_html($pil['desc']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- =======================================================================
         6. TESTIMONIOS REALES (EDITABLES)
         ======================================================================= -->
    <section class="section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-badge"><?php echo esc_html($testi_badge); ?></span>
                <h2 class="section-title"><?php echo esc_html($testi_title); ?></h2>
                <p class="section-subtitle"><?php echo esc_html($testi_desc); ?></p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-quote-icon">&ldquo;</div>
                    <?php echo lp_render_stars(5); ?>
                    <p class="testimonial-text">&ldquo;<?php echo esc_html($t1_text); ?>&rdquo;</p>
                    <div class="testimonial-author">
                        <div class="author-avatar"><?php echo esc_html(mb_substr($t1_name, 0, 1)); ?></div>
                        <div>
                            <div class="author-name"><?php echo esc_html($t1_name); ?></div>
                            <div class="author-city"><?php echo esc_html($t1_city); ?></div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-quote-icon">&ldquo;</div>
                    <?php echo lp_render_stars(5); ?>
                    <p class="testimonial-text">&ldquo;<?php echo esc_html($t2_text); ?>&rdquo;</p>
                    <div class="testimonial-author">
                        <div class="author-avatar"><?php echo esc_html(mb_substr($t2_name, 0, 1)); ?></div>
                        <div>
                            <div class="author-name"><?php echo esc_html($t2_name); ?></div>
                            <div class="author-city"><?php echo esc_html($t2_city); ?></div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-quote-icon">&ldquo;</div>
                    <?php echo lp_render_stars(5); ?>
                    <p class="testimonial-text">&ldquo;<?php echo esc_html($t3_text); ?>&rdquo;</p>
                    <div class="testimonial-author">
                        <div class="author-avatar"><?php echo esc_html(mb_substr($t3_name, 0, 1)); ?></div>
                        <div>
                            <div class="author-name"><?php echo esc_html($t3_name); ?></div>
                            <div class="author-city"><?php echo esc_html($t3_city); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =======================================================================
         7. GALERÍA FOTOGRÁFICA CON FILTROS Y LIGHTBOX
         ======================================================================= -->
    <section class="section-padding" id="galeria" style="background: var(--bg-surface);">
        <div class="container">
            <div class="section-header">
                <span class="section-badge gold">Nuestros Trabajos</span>
                <h2 class="section-title">Galería de <span class="highlight-teal">Momentos Únicos</span></h2>
                <p class="section-subtitle">Explora fotografías reales de montajes acústicos, lumínicos, pistas LED y recepciones producidas por nuestro equipo.</p>
            </div>

            <div class="gallery-filters">
                <button class="filter-btn active" data-filter="all">Todos</button>
                <button class="filter-btn" data-filter="social">Sociales &amp; Bodas</button>
                <button class="filter-btn" data-filter="corporate">Corporativos</button>
                <button class="filter-btn" data-filter="led">Pistas LED &amp; Luces</button>
                <button class="filter-btn" data-filter="tarimas">Tarimas &amp; Carpas</button>
            </div>

            <div class="gallery-grid">
                <?php
                $gallery_items = array(
                    array('img' => 'galeria/galeria-1.jpg', 'cat' => 'social led', 'title' => 'Montaje de Luces y Sonido Pro'),
                    array('img' => 'galeria/galeria-2.jpg', 'cat' => 'social', 'title' => 'Recepción Social de Gala'),
                    array('img' => 'galeria/galeria-3.jpg', 'cat' => 'corporate', 'title' => 'Conferencia Corporativa'),
                    array('img' => 'galeria/galeria-4.jpg', 'cat' => 'social led', 'title' => 'Pista de Luces e Iluminación DMX'),
                    array('img' => 'galeria/galeria-5.jpg', 'cat' => 'social', 'title' => 'Celebración 15 Años'),
                    array('img' => 'galeria/galeria-6.jpg', 'cat' => 'corporate', 'title' => 'Lanzamiento de Marca'),
                    array('img' => 'galeria/galeria-7.jpg', 'cat' => 'social', 'title' => 'Salón VIP Hotel Tequendama'),
                    array('img' => 'galeria/galeria-8.jpg', 'cat' => 'social', 'title' => 'Boda en Gran Salón'),
                    array('img' => 'galeria/galeria-9.jpg', 'cat' => 'led', 'title' => 'Pista de Baile LED DMX'),
                    array('img' => 'galeria/galeria-10.jpg', 'cat' => 'tarimas', 'title' => 'Tarima y Estructura Modular'),
                    array('img' => 'galeria/galeria-11.jpg', 'cat' => 'corporate tarimas', 'title' => 'Evento Empresarial y Backing'),
                    array('img' => 'galeria/galeria-12.jpg', 'cat' => 'led social', 'title' => 'Show de Cabezas Móviles y Neón'),
                );

                foreach ($gallery_items as $item) :
                    $img_src = get_template_directory_uri() . '/assets/images/' . $item['img'];
                ?>
                    <div class="gallery-item" data-category="<?php echo esc_attr($item['cat']); ?>">
                        <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($item['title']); ?>" class="gallery-img" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-overlay-icon"><i class="fa-solid fa-expand"></i></div>
                            <span class="gallery-overlay-tag"><?php echo esc_html(strtoupper(str_replace(' ', ' • ', $item['cat']))); ?></span>
                            <h4 class="gallery-overlay-title"><?php echo esc_html($item['title']); ?></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- =======================================================================
         8. FORMULARIO RÁPIDO DE COTIZACIÓN DIRECTA (EDITABLE)
         ======================================================================= -->
    <section class="section-padding" id="contacto">
        <div class="container container-narrow">
            <div class="section-header">
                <span class="section-badge"><?php echo esc_html($h_form_badge); ?></span>
                <h2 class="section-title"><?php echo esc_html($h_form_title); ?></h2>
                <p class="section-subtitle"><?php echo esc_html($h_form_desc); ?></p>
            </div>

            <div class="contact-form-wrap">
                <form id="latin-party-contact-form" method="post">
                    <div class="form-row-2">
                        <div class="form-group">
                            <label class="form-label" for="client_name">Tu Nombre Completo *</label>
                            <input type="text" id="client_name" name="client_name" class="form-control" placeholder="Ej: Carlos Gómez" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="client_phone">Celular / WhatsApp *</label>
                            <input type="tel" id="client_phone" name="client_phone" class="form-control" placeholder="Ej: 311 8487785" required>
                        </div>
                    </div>

                    <div class="form-row-2">
                        <div class="form-group">
                            <label class="form-label" for="client_email">Correo Electrónico</label>
                            <input type="email" id="client_email" name="client_email" class="form-control" placeholder="nombre@correo.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="event_type">Tipo de Evento</label>
                            <select id="event_type" name="event_type" class="form-control">
                                <option value="Boda">Boda</option>
                                <option value="15 Años">15 Años</option>
                                <option value="Evento Corporativo / Empresarial">Evento Corporativo / Empresarial</option>
                                <option value="Fiesta Privada / Cumpleaños">Fiesta Privada / Cumpleaños</option>
                                <option value="Concierto / Festival">Concierto / Festival</option>
                                <option value="Alquiler de Sonido / Iluminación">Alquiler de Sonido / Iluminación</option>
                                <option value="Pistas de Baile LED">Pistas de Baile LED</option>
                                <option value="Tarimas y Carpas">Tarimas y Carpas</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="client_message">Cuéntanos sobre tu evento (Fecha estimada, ciudad, aforo)</label>
                        <textarea id="client_message" name="client_message" class="form-control" rows="4" placeholder="Ej: Deseo cotizar sonido, luces y pista LED para 120 personas en Bogotá el próximo mes..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-teal" style="width: 100%; font-size: 1.05rem;">
                        <i class="fa-solid fa-paper-plane"></i> <?php echo esc_html($h_form_btn); ?>
                    </button>

                    <div id="form-status-msg" class="form-status-msg"></div>
                </form>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
