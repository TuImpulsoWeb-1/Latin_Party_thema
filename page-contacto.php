<?php
/**
 * Latin Party Eventos - Contacto Template
 * Template Name: Página de Contacto
 *
 * @package Latin_Party_Eventos
 */

get_header();

$hero_title = lp_get_field('lp_contact_hero_title', false, 'Tu Celebración, Nuestro Legado');
$hero_desc  = lp_get_field('lp_contact_hero_desc', false, '¿Planeando un evento inolvidable? Nuestro equipo está listo para asesorarte y crear la mejor experiencia para ti y tus invitados. Déjanos tus datos y recibe una cotización gratuita en minutos.');

$phone = lp_get_option('lp_primary_phone', '+57 311 8487785');
$email = lp_get_option('lp_contact_email', 'contacto@latinpartyeventos.com');
$pqr   = lp_get_option('lp_pqr_email', 'pqr@latinpartyeventos.com');
$loc   = lp_get_option('lp_location', 'Bogotá, Colombia');
$fb    = lp_get_option('lp_facebook', 'https://www.facebook.com/share/17BwWKdEBR/');
$ig    = lp_get_option('lp_instagram', 'https://www.instagram.com/latinparty?igsh=cWtsYWliY2pod2p5');
?>

<main id="primary" class="site-main">

    <!-- Page Hero Banner -->
    <section class="page-hero">
        <div class="container">
            <span class="section-badge gold">Atención Inmediata</span>
            <h1 class="page-hero-title"><?php echo esc_html($hero_title); ?></h1>
            <p class="page-hero-desc"><?php echo esc_html($hero_desc); ?></p>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">

            <!-- Contact Information Cards -->
            <?php
            $c_phone_val = lp_get_setting('lp_c_phone_val', $phone);
            $c_wa_btn    = lp_get_setting('lp_c_wa_btn', 'Chatear Ahora');
            $c_wa_url    = lp_get_setting('lp_c_wa_url', '');
            $c_wa_link   = !empty($c_wa_url) ? esc_url($c_wa_url) : lp_whatsapp_url('¡Hola Latin Party Eventos! Deseo solicitar asesoría.');
            $c_mail_val  = lp_get_setting('lp_c_mail_val', $email);
            ?>
            <div class="contact-info-grid">
                <!-- Teléfono -->
                <div class="contact-info-card">
                    <div class="contact-icon-box"><i class="fa-solid fa-phone"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 6px;"><?php echo esc_html(lp_get_setting('lp_c_phone_title', 'Línea Telefónica')); ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 12px;"><?php echo esc_html(lp_get_setting('lp_c_phone_sub', 'Atención de lunes a sábado')); ?></p>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9\+]/', '', $c_phone_val)); ?>" style="color: var(--gold-light); font-weight: 700;">
                        <?php echo esc_html($c_phone_val); ?>
                    </a>
                </div>

                <!-- WhatsApp -->
                <div class="contact-info-card" style="border-color: var(--border-accent);">
                    <div class="contact-icon-box" style="background: rgba(37, 211, 102, 0.15); color: #25d366;"><i class="fa-brands fa-whatsapp"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 6px;"><?php echo esc_html(lp_get_setting('lp_c_wa_title', 'WhatsApp Oficial')); ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 12px;"><?php echo esc_html(lp_get_setting('lp_c_wa_sub', 'Respuesta rápida')); ?></p>
                    <a href="<?php echo esc_url($c_wa_link); ?>" target="_blank" rel="noopener" class="btn btn-teal btn-sm">
                        <?php echo esc_html($c_wa_btn); ?>
                    </a>
                </div>

                <!-- Email -->
                <div class="contact-info-card">
                    <div class="contact-icon-box"><i class="fa-solid fa-envelope"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 6px;"><?php echo esc_html(lp_get_setting('lp_c_mail_title', 'Correo de Contacto')); ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 12px;"><?php echo esc_html(lp_get_setting('lp_c_mail_sub', 'Propuestas y cotizaciones')); ?></p>
                    <a href="mailto:<?php echo esc_attr($c_mail_val); ?>" style="color: var(--teal-primary); font-size: 0.88rem; word-break: break-all;">
                        <?php echo esc_html($c_mail_val); ?>
                    </a>
                </div>

                <!-- Ubicación -->
                <div class="contact-info-card">
                    <div class="contact-icon-box"><i class="fa-solid fa-location-dot"></i></div>
                    <h3 style="font-size: 1.15rem; margin-bottom: 6px;"><?php echo esc_html(lp_get_setting('lp_c_loc_title', 'Sede & Cobertura')); ?></h3>
                    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 6px;"><?php echo esc_html(lp_get_setting('lp_c_loc_sub', $loc)); ?></p>
                    <span style="font-size: 0.82rem; color: var(--gold-light);"><?php echo esc_html(lp_get_setting('lp_c_loc_badge', 'Servicio a Nivel Nacional')); ?></span>
                </div>
            </div>

            <!-- Form & Social Section -->
            <div class="contact-form-container">
                <div class="contact-form-wrap">
                    <div style="text-align: center; margin-bottom: 25px;">
                        <span class="section-badge gold"><?php echo esc_html(lp_get_setting('lp_contact_form_badge', 'Cotización Gratuita')); ?></span>
                        <h2 style="font-size: clamp(1.6rem, 3.5vw, 2.1rem); margin-bottom: 10px;">
                            <?php echo esc_html(lp_get_setting('lp_contact_form_title', 'Diseñemos juntos tu evento')); ?>
                        </h2>
                        <p style="color: var(--text-muted); font-size: 0.95rem; max-width: 600px; margin: 0 auto;">
                            <?php echo esc_html(lp_get_setting('lp_contact_form_desc', 'Completa el formulario y nos pondremos en contacto contigo de forma inmediata.')); ?>
                        </p>
                    </div>

                    <form id="latin-party-contact-form" method="post">
                        <div class="form-row-2">
                            <div class="form-group">
                                <label class="form-label" for="client_name">Tu Nombre *</label>
                                <input type="text" id="client_name" name="client_name" class="form-control" placeholder="Ej: Diana Gómez" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="client_phone">Celular o WhatsApp *</label>
                                <input type="tel" id="client_phone" name="client_phone" class="form-control" placeholder="Ej: 311 8487785" required>
                            </div>
                        </div>

                        <div class="form-row-2">
                            <div class="form-group">
                                <label class="form-label" for="client_email">Correo Electrónico</label>
                                <input type="email" id="client_email" name="client_email" class="form-control" placeholder="nombre@correo.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="event_type">Servicio de Interés</label>
                                <select id="event_type" name="event_type" class="form-control">
                                    <option value="Boda Completa">Boda Completa</option>
                                    <option value="Celebración 15 Años">Celebración 15 Años</option>
                                    <option value="Evento Corporativo / Fin de Año">Evento Corporativo / Fin de Año</option>
                                    <option value="Sonido Profesional Line Array">Sonido Profesional Line Array</option>
                                    <option value="Iluminación DMX y Cabezas Móviles">Iluminación DMX y Cabezas Móviles</option>
                                    <option value="Pistas de Baile LED">Pistas de Baile LED</option>
                                    <option value="Tarimas, Pasarelas y Carpas">Tarimas, Pasarelas y Carpas</option>
                                    <option value="Mobiliario y Decoración en Telas">Mobiliario y Decoración en Telas</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="client_message">Detalles del Evento (Fecha, Lugar, Invitados)</label>
                            <textarea id="client_message" name="client_message" class="form-control" rows="4" placeholder="Indícanos la fecha estimada, la ciudad y qué te gustaría incluir..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-gold" style="width: 100%; font-size: 1.05rem;">
                            <i class="fa-solid fa-paper-plane"></i> <?php echo esc_html(lp_get_setting('lp_contact_btn_text', 'Enviar Cotización Ahora')); ?>
                        </button>

                        <div id="form-status-msg" class="form-status-msg"></div>
                    </form>

                    <!-- Redes Sociales Banner -->
                    <?php
                    $c_social_txt = lp_get_setting('lp_contact_social_text', 'Síguenos en redes como @Latinpartyeventos');
                    $c_fb_link    = lp_get_setting('lp_contact_fb_url', '') ?: $fb;
                    $c_ig_link    = lp_get_setting('lp_contact_ig_url', '') ?: $ig;
                    ?>
                    <div class="contact-social-wrap">
                        <p style="font-size: 0.95rem; color: var(--text-muted); margin-bottom: 12px;"><?php echo esc_html($c_social_txt); ?></p>
                        <div class="contact-social-buttons">
                            <?php if (!empty($c_fb_link)) : ?>
                                <a href="<?php echo esc_url($c_fb_link); ?>" target="_blank" rel="noopener" class="btn btn-outline btn-sm">
                                    <i class="fa-brands fa-facebook-f"></i> Facebook
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($c_ig_link)) : ?>
                                <a href="<?php echo esc_url($c_ig_link); ?>" target="_blank" rel="noopener" class="btn btn-outline btn-sm">
                                    <i class="fa-brands fa-instagram"></i> Instagram
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo esc_url(lp_whatsapp_url()); ?>" target="_blank" rel="noopener" class="btn btn-teal btn-sm">
                                <i class="fa-brands fa-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
