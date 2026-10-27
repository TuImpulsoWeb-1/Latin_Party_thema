<?php
/**
 * Latin Party Eventos - Front Page Template (Home)
 * Template Name: Página de Inicio
 *
 * Fully editable via WordPress Customizer and Advanced Custom Fields (ACF).
 *
 * @package Latin_Party_Eventos
 */

get_header();

// Dynamic URLs for key pages
$servicios_url = lp_get_page_url('servicios', '#servicios');
$nosotros_url  = lp_get_page_url('nosotros');
$contacto_url  = lp_get_page_url('contacto', '#contacto');

// ACF Fields with graceful fallbacks
$hero_badge  = lp_get_field('lp_hero_badge', false, '⭐ Producción Integral de Eventos');
$hero_title  = lp_get_field('lp_hero_title', false, 'Vive la fiesta, nosotros la creamos');
$hero_hl     = lp_get_field('lp_hero_highlight', false, 'Eventos que combinan confianza, estilo y diversión');
$hero_desc   = lp_get_field('lp_hero_description', false, 'En Latin Party Eventos convertimos tus ideas en experiencias únicas. Desde bodas y 15 años hasta eventos corporativos y conciertos, nuestro equipo se encarga de cada detalle.');
$hero_btn1_t = lp_get_field('lp_hero_btn1_text', false, 'Empieza tu evento hoy');
$hero_btn1_u = lp_get_field('lp_hero_btn1_url', false, $contacto_url);
$hero_btn2_t = lp_get_field('lp_hero_btn2_text', false, 'Hablar por WhatsApp');
$hero_btn2_u = lp_get_field('lp_hero_btn2_url', false, lp_whatsapp_url());

// Hero Images
$hero_img1 = lp_get_image_url(lp_get_field('lp_hero_img1'), 'hero/hero-1.jpg');
$hero_img2 = lp_get_image_url(lp_get_field('lp_hero_img2'), 'hero/hero-2.jpg');
$hero_img3 = get_template_directory_uri() . '/assets/images/hero/hero-3.jpg';

// Stats
$s1_num = lp_get_field('lp_stat1_num', false, '+15');
$s1_lbl = lp_get_field('lp_stat1_lbl', false, 'Años de Experiencia');
$s2_num = lp_get_field('lp_stat2_num', false, '+1,200');
$s2_lbl = lp_get_field('lp_stat2_lbl', false, 'Eventos Exitosos');
$s3_num = lp_get_field('lp_stat3_num', false, '100%');
$s3_lbl = lp_get_field('lp_stat3_lbl', false, 'Satisfacción Garantizada');
$s4_num = lp_get_field('lp_stat4_num', false, 'PRO');
$s4_lbl = lp_get_field('lp_stat4_lbl', false, 'Equipos Propios DMX & LED');

// Advisory Banner
$adv_title = lp_get_field('lp_adv_title', false, 'Asesoría Personalizada Sin Costo');
$adv_desc  = lp_get_field('lp_adv_desc', false, 'Convierte tu idea en un evento inolvidable. Agenda una sesión gratuita con nuestros expertos y descubre cómo darle vida a tu celebración, sin compromiso.');
$adv_btn_t = lp_get_field('lp_adv_btn_text', false, 'Agendar Asesoría Gratuita');

// Events
$events_title = lp_get_field('lp_events_title', false, 'Nuestros Eventos');
$events_desc  = lp_get_field('lp_events_desc', false, 'Cada celebración es única, por eso en Latin Party Eventos diseñamos experiencias a tu medida. Desde cumpleaños y bodas hasta fiestas corporativas y conciertos, nuestro equipo se encarga de que cada detalle brille con confianza, estilo y diversión.');

// Services
$serv_title = lp_get_field('lp_serv_title', false, 'Nuestros Servicios');

// Testimonials
$t1_name = lp_get_field('lp_testi1_name', false, 'Laura Torres');
$t1_city = lp_get_field('lp_testi1_city', false, 'Bogotá');
$t1_text = lp_get_field('lp_testi1_text', false, 'Contratamos a LatinPartyEventos para la celebración de los 15 años de mi hija y fue una experiencia inolvidable. Desde la decoración hasta la música, todo estuvo perfectamente coordinado. La atención fue muy profesional y nuestros invitados quedaron encantados. ¡Gracias por hacer de ese día algo tan especial!');

$t2_name = lp_get_field('lp_testi2_name', false, 'Carolina Ramírez');
$t2_city = lp_get_field('lp_testi2_city', false, 'Ibagué');
$t2_text = lp_get_field('lp_testi2_text', false, 'Confiamos en LatinPartyEventos para la fiesta de fin de año de la empresa y superaron todas nuestras expectativas. La organización, la ambientación y la energía que lograron fue espectacular. Sin duda volveremos a trabajar con ellos para futuros eventos.');
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
                    <a href="<?php echo esc_url($hero_btn1_u); ?>" class="btn btn-gold">
                        <i class="fa-solid fa-calendar-check"></i> <?php echo esc_html($hero_btn1_t); ?>
                    </a>
                    <a href="<?php echo esc_url($hero_btn2_u); ?>" target="_blank" rel="noopener" class="btn btn-teal">
                        <i class="fa-brands fa-whatsapp"></i> <?php echo esc_html($hero_btn2_t); ?>
                    </a>
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
                    <span class="section-badge gold" style="margin-bottom: 8px;">Asesoría Gratuita</span>
                    <h2 class="banner-advisory-title"><?php echo esc_html($adv_title); ?></h2>
                    <p class="banner-advisory-desc"><?php echo esc_html($adv_desc); ?></p>
                </div>
                <div>
                    <a href="<?php echo esc_url(lp_whatsapp_url('¡Hola! Deseo agendar mi asesoría personalizada sin costo con Latin Party Eventos.')); ?>" target="_blank" rel="noopener" class="btn btn-teal">
                        <i class="fa-solid fa-comments"></i> <?php echo esc_html($adv_btn_t); ?>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <!-- =======================================================================
         3. NUESTROS EVENTOS (15 AÑOS, BODAS, CORPORATIVOS, FIESTAS)
         ======================================================================= -->
    <section class="section-padding" id="eventos">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Celebraciones Exclusivas</span>
                <h2 class="section-title"><?php echo esc_html($events_title); ?></h2>
                <p class="section-subtitle"><?php echo esc_html($events_desc); ?></p>
            </div>

            <div class="events-grid">
                <!-- 15 Años -->
                <a href="<?php echo esc_url($servicios_url); ?>" class="event-card">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/categorias/15-anos.jpg'); ?>" alt="15 Años Latin Party" class="event-card-img" loading="lazy">
                    <div class="event-card-overlay"></div>
                    <div class="event-card-content">
                        <span class="event-badge">Celebración Soñada</span>
                        <h3 class="event-card-title">15 Años</h3>
                        <p class="event-card-desc">Montajes inolvidables con luces robóticas, pista LED de baile, efectos especiales y sonido de primer nivel.</p>
                        <span class="event-card-link-arrow">Ver detalles <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </a>

                <!-- Bodas -->
                <a href="<?php echo esc_url($servicios_url); ?>" class="event-card">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/categorias/bodas.jpg'); ?>" alt="Bodas Latin Party" class="event-card-img" loading="lazy">
                    <div class="event-card-overlay"></div>
                    <div class="event-card-content">
                        <span class="event-badge">Elegancia & Romance</span>
                        <h3 class="event-card-title">Bodas</h3>
                        <p class="event-card-desc">Atmósferas cálidas, iluminación perimetral sutil, drapeados en telas, sonido de ceremonia y fiesta nupcial.</p>
                        <span class="event-card-link-arrow">Ver detalles <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </a>

                <!-- Corporativos -->
                <a href="<?php echo esc_url($servicios_url); ?>" class="event-card">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/categorias/corporativos.jpg'); ?>" alt="Eventos Corporativos Latin Party" class="event-card-img" loading="lazy">
                    <div class="event-card-overlay"></div>
                    <div class="event-card-content">
                        <span class="event-badge">Impacto de Marca</span>
                        <h3 class="event-card-title">Corporativos</h3>
                        <p class="event-card-desc">Congresos, lanzamientos de marca, ferias y fiestas de fin de año con tecnología audiovisual de vanguardia.</p>
                        <span class="event-card-link-arrow">Ver detalles <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </a>

                <!-- Fiestas & Conciertos -->
                <a href="<?php echo esc_url($servicios_url); ?>" class="event-card">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/categorias/fiestas.jpg'); ?>" alt="Fiestas y Conciertos Latin Party" class="event-card-img" loading="lazy">
                    <div class="event-card-overlay"></div>
                    <div class="event-card-content">
                        <span class="event-badge">Pura Energía</span>
                        <h3 class="event-card-title">Fiestas</h3>
                        <p class="event-card-desc">Conciertos privados, cumpleaños temáticos y aniversarios con tarimas modulares y pantallas gigantes.</p>
                        <span class="event-card-link-arrow">Ver detalles <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- =======================================================================
         4. NUESTROS SERVICIOS DESTACADOS
         ======================================================================= -->
    <section class="section-padding" id="servicios" style="background: var(--bg-surface);">
        <div class="container">
            <div class="section-header">
                <span class="section-badge gold">Tecnología de Punta</span>
                <h2 class="section-title"><?php echo esc_html($serv_title); ?></h2>
                <p class="section-subtitle">Equipamiento técnico profesional propio para garantizar que la potencia, el color y la calidad visual de tu evento sean impecables.</p>
            </div>

            <div class="services-grid">
                <!-- Servicio 1: Sonido Profesional -->
                <div class="service-card">
                    <div class="service-img-wrap">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/servicios/sonido.jpg'); ?>" alt="Sonido Profesional" class="service-img" loading="lazy">
                        <div class="service-icon-floating"><i class="fa-solid fa-volume-high"></i></div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Sonido Profesional</h3>
                        <p class="service-desc">La potencia y claridad que tu evento merece. Desde sistemas convencionales hasta line array de gran formato, garantizamos una experiencia auditiva impecable para 50 hasta 5,000 personas.</p>
                        <a href="<?php echo esc_url($servicios_url); ?>" class="btn btn-outline btn-sm">Ver configuración <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Servicio 2: Iluminación Creativa -->
                <div class="service-card">
                    <div class="service-img-wrap">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/servicios/iluminacion.jpg'); ?>" alt="Iluminación Creativa" class="service-img" loading="lazy">
                        <div class="service-icon-floating"><i class="fa-solid fa-lightbulb"></i></div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Iluminación Creativa</h3>
                        <p class="service-desc">Transformamos espacios con luces LED, cabezas móviles Beam/Spot y control DMX computarizado que generan atmósferas envolventes y sincronizadas al ritmo de la música.</p>
                        <a href="<?php echo esc_url($servicios_url); ?>" class="btn btn-outline btn-sm">Ver configuración <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Servicio 3: Pantallas y Visuales -->
                <div class="service-card">
                    <div class="service-img-wrap">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/servicios/pantallas.jpg'); ?>" alt="Pantallas y Visuales" class="service-img" loading="lazy">
                        <div class="service-icon-floating"><i class="fa-solid fa-tv"></i></div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Pantallas y Visuales</h3>
                        <p class="service-desc">Impacta a tu público con pantallas LED de alta definición y proyectores de alto brillo, ideales para videos corporativos, transmisiones en vivo y backings interactivos.</p>
                        <a href="<?php echo esc_url($servicios_url); ?>" class="btn btn-outline btn-sm">Ver configuración <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Servicio 4: Escenarios y Tarimas -->
                <div class="service-card">
                    <div class="service-img-wrap">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/servicios/tarimas.jpg'); ?>" alt="Escenarios y Tarimas" class="service-img" loading="lazy">
                        <div class="service-icon-floating"><i class="fa-solid fa-landmark"></i></div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Escenarios y Tarimas</h3>
                        <p class="service-desc">Estructuras seguras, pasarelas, carpas tipo hangar y truss modulares en aluminio que se adaptan a cualquier espectáculo, desde presentaciones íntimas hasta grandes conciertos.</p>
                        <a href="<?php echo esc_url($servicios_url); ?>" class="btn btn-outline btn-sm">Ver configuración <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Servicio 5: Pistas LED de Baile -->
                <div class="service-card">
                    <div class="service-img-wrap">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/servicios/pista-led.jpg'); ?>" alt="Pistas de Baile LED" class="service-img" loading="lazy">
                        <div class="service-icon-floating"><i class="fa-solid fa-border-all"></i></div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Pistas de Baile LED DMX</h3>
                        <p class="service-desc">El centro de atracción de la fiesta. Módulos de vidrio templado con gráficos animados, textos y destellos luminosos para que el baile sea el momento más vibrante de la noche.</p>
                        <a href="<?php echo esc_url($servicios_url); ?>" class="btn btn-outline btn-sm">Ver configuración <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Servicio 6: Mobiliario & Decoración -->
                <div class="service-card">
                    <div class="service-img-wrap">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/servicios/mobiliario.jpg'); ?>" alt="Mobiliario & Decoración" class="service-img" loading="lazy">
                        <div class="service-icon-floating"><i class="fa-solid fa-couch"></i></div>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Mobiliario &amp; Decoración</h3>
                        <p class="service-desc">Cada detalle cuenta. Ofrecemos mobiliario moderno tipo lounge, sillas Tiffany, mesas iluminadas y drapeados en telas que realzan el estilo y la comodidad de tu celebración.</p>
                        <a href="<?php echo esc_url($servicios_url); ?>" class="btn btn-outline btn-sm">Ver configuración <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =======================================================================
         5. NUESTROS PILARES DE CONFIANZA
         ======================================================================= -->
    <section class="pillars-section section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-badge gold">Garantía de Calidad</span>
                <h2 class="section-title">Nuestros Pilares</h2>
                <p class="section-subtitle">El estándar de excelencia técnica y humana que respalda cada uno de nuestros montajes.</p>
            </div>

            <div class="pillars-grid">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fa-solid fa-user-tie"></i></div>
                    <h3 class="pillar-title">Profesionalismo</h3>
                    <p class="pillar-desc">Equipo humano capacitado, puntual y con vocación de servicio para que todo salga perfecto.</p>
                </div>

                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fa-solid fa-compact-disc"></i></div>
                    <h3 class="pillar-title">Sonido Premium</h3>
                    <p class="pillar-desc">Cero saturación ni acoples. Calibración acústica con procesadores digitales de alta fidelidad.</p>
                </div>

                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h3 class="pillar-title">Iluminación Dinámica</h3>
                    <p class="pillar-desc">Efectos visuales coreografiados por operadores de consolas DMX profesionales.</p>
                </div>

                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fa-solid fa-gem"></i></div>
                    <h3 class="pillar-title">Mobiliario Elegante</h3>
                    <p class="pillar-desc">Diseño estético y confortable que armoniza perfectamente con la temática de tu festejo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- =======================================================================
         6. TESTIMONIOS REALES
         ======================================================================= -->
    <section class="section-padding">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Opiniones de Clientes</span>
                <h2 class="section-title">Lo que dicen <span class="highlight-gold">nuestros clientes</span></h2>
                <p class="section-subtitle">La satisfacción de cada anfitrión es nuestro mayor testimonio de compromiso y éxito.</p>
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
                            <div class="author-city"><?php echo esc_html($t1_city); ?> &bull; Celebración 15 Años</div>
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
                            <div class="author-city"><?php echo esc_html($t2_city); ?> &bull; Evento Corporativo</div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-quote-icon">&ldquo;</div>
                    <?php echo lp_render_stars(5); ?>
                    <p class="testimonial-text">&ldquo;El montaje de sonido para nuestra boda y la pista de luces LED superaron completamente lo que soñamos. Todos los invitados no pararon de bailar toda la noche. ¡Recomendadísimos al 100%!&rdquo;</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">J</div>
                        <div>
                            <div class="author-name">Julián &amp; Andrea</div>
                            <div class="author-city">Bogotá &bull; Boda Campestre</div>
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
         8. FORMULARIO RÁPIDO DE COTIZACIÓN DIRECTA
         ======================================================================= -->
    <section class="section-padding" id="contacto">
        <div class="container container-narrow">
            <div class="section-header">
                <span class="section-badge">Cotización Online</span>
                <h2 class="section-title">Diseñemos juntos tu <span class="highlight-gold">próximo evento</span></h2>
                <p class="section-subtitle">Diligencia este formulario y nuestro director técnico te contactará con una propuesta a tu medida en menos de 30 minutos.</p>
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
                        <i class="fa-solid fa-paper-plane"></i> Enviar Solicitud &bull; Recibir Asesoría
                    </button>

                    <div id="form-status-msg" class="form-status-msg"></div>
                </form>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
