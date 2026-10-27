<?php
/**
 * Latin Party Eventos - Servicios Template
 * Template Name: Página de Servicios
 *
 * @package Latin_Party_Eventos
 */

get_header();

$page_title = lp_get_field('lp_serv_page_title', false, 'Todo lo que necesitas para tu evento en un solo lugar');
$page_desc  = lp_get_field('lp_serv_page_desc', false, 'En Latin Party Eventos ofrecemos soluciones completas para cada tipo de celebración. Desde el sonido profesional, la iluminación y la ambientación, hasta la producción integral de conciertos, bodas y eventos corporativos.');
?>

<main id="primary" class="site-main">

    <!-- Page Hero Banner -->
    <section class="page-hero">
        <div class="container">
            <span class="section-badge gold">Nuestras Soluciones</span>
            <h1 class="page-hero-title"><?php echo esc_html($page_title); ?></h1>
            <p class="page-hero-desc"><?php echo esc_html($page_desc); ?></p>
        </div>
    </section>

    <!-- Detailed Services Breakdown -->
    <section class="section-padding">
        <div class="container">

            <!-- 1. Audio Profesional -->
            <div style="margin-bottom: 70px;">
                <span class="section-badge">Potencia Acústica</span>
                <h2 style="font-size: 2.2rem; margin-bottom: 15px;">Soluciones de Audio Profesional</h2>
                <p style="color: var(--text-muted); max-width: 800px; margin-bottom: 30px;">
                    Configuraciones acústicas de vanguardia calibradas digitalmente para garantizar máxima inteligibilidad de la voz y calidez sonora en cada rincón del recinto.
                </p>

                <div class="service-spec-grid">
                    <div class="service-spec-card">
                        <div class="spec-badge">Hasta 100 Personas</div>
                        <h3 class="spec-title">Sonido Convencional</h3>
                        <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                            Ideal para eventos íntimos, matrimonios civiles, 15 años y salones medianos. Altavoces de alta fidelidad, micrófonos inalámbricos UHF y consolas de mezcla limpias.
                        </p>
                    </div>

                    <div class="service-spec-card" style="border-color: var(--border-accent);">
                        <div class="spec-badge" style="color: var(--teal-primary);">Gran Formato</div>
                        <h3 class="spec-title">Sonido Line Array</h3>
                        <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                            Para conciertos, festivales, asambleas y recintos masivos. Distribución de presión sonora uniforme en grandes distancias sin pérdida de agudos ni saturación de graves.
                        </p>
                    </div>

                    <div class="service-spec-card">
                        <div class="spec-badge">Espectáculos Vivos</div>
                        <h3 class="spec-title">Sonido Tipo Concierto</h3>
                        <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                            Configuración completa para orquestas y bandas en vivo: microfonía instrumental Shure/Sennheiser, monitores de piso, consolas digitales multicanal y técnicos en vivo.
                        </p>
                    </div>
                </div>
            </div>

            <!-- 2. Iluminación que Transforma Espacios -->
            <div style="margin-bottom: 70px;">
                <span class="section-badge gold">Shows Visuales</span>
                <h2 style="font-size: 2.2rem; margin-bottom: 15px;">Iluminación Creativa &amp; Control DMX</h2>
                <p style="color: var(--text-muted); max-width: 800px; margin-bottom: 30px;">
                    Crea atmósferas envolventes y sincronizadas que realzan momentos clave como el vals, el brindis o la apertura del baile.
                </p>

                <div class="service-spec-grid">
                    <div class="service-spec-card">
                        <div class="spec-badge">Dinámicas 360°</div>
                        <h3 class="spec-title">Cabezas Móviles Beam &amp; Spot</h3>
                        <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                            Efectos de prisma, gobos personalizados con el logo de tu empresa o las iniciales de los novios, y haces de luz potentes que llenan todo el salón.
                        </p>
                    </div>

                    <div class="service-spec-card">
                        <div class="spec-badge">Software Computarizado</div>
                        <h3 class="spec-title">Control DMX en Tiempo Real</h3>
                        <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                            Programación milimétrica por escenas. Cambios de color acordes a la temática de la decoración y sincronía total con la música.
                        </p>
                    </div>

                    <div class="service-spec-card">
                        <div class="spec-badge">Ambientación Perimetral</div>
                        <h3 class="spec-title">Par LED, Neón &amp; City Color</h3>
                        <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                            Baño de luz a paredes, columnas y jardines para transformar salones comunes en espacios de alta sofisticación y glamour.
                        </p>
                    </div>
                </div>
            </div>

            <!-- 3. Pistas LED & Tarimas -->
            <div style="margin-bottom: 70px;">
                <span class="section-badge">Estructuras &amp; Baile</span>
                <h2 style="font-size: 2.2rem; margin-bottom: 15px;">Pistas de Baile LED, Tarimas y Carpas</h2>
                <p style="color: var(--text-muted); max-width: 800px; margin-bottom: 30px;">
                    Infraestructura sólida con certificación técnica para eventos al aire libre o en salones cerrados.
                </p>

                <div class="service-spec-grid">
                    <div class="service-spec-card">
                        <div class="spec-badge">Efecto WOW</div>
                        <h3 class="spec-title">Pistas de Baile LED</h3>
                        <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                            Paneles modulares de alta resistencia con cristal templado. Gráficos de túnel infinito, estrellas, corazones, nombres y ecualizadores visuales.
                        </p>
                    </div>

                    <div class="service-spec-card">
                        <div class="spec-badge">Modularidad Segura</div>
                        <h3 class="spec-title">Tarimas y Pasarelas</h3>
                        <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                            Módulos regulables en altura con faldones perimetrales, escaleras de acceso antideslizantes, barandas y atriles para conferencias o desfiles.
                        </p>
                    </div>

                    <div class="service-spec-card">
                        <div class="spec-badge">Protección Total</div>
                        <h3 class="spec-title">Carpas Estructurales</h3>
                        <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                            Carpas tipo hangar de 6x12m y mayores dimensiones, impermeables, con laterales transparentes tipo cristal y plafones decorativos en telas.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Call to Action Card -->
            <div class="banner-advisory" style="margin-top: 40px;">
                <div class="banner-advisory-inner">
                    <div>
                        <h3 style="font-size: 1.8rem; margin-bottom: 10px;">¿Necesitas un paquete personalizado?</h3>
                        <p style="color: var(--text-muted);">Armamos la combinación perfecta de sonido, luces, pista LED y carpas según tu presupuesto y cantidad de invitados.</p>
                    </div>
                    <div>
                        <a href="<?php echo esc_url(lp_whatsapp_url('¡Hola! Deseo cotizar un paquete personalizado de servicios para mi evento.')); ?>" target="_blank" rel="noopener" class="btn btn-teal">
                            <i class="fa-brands fa-whatsapp"></i> Hablar con un Asesor
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
