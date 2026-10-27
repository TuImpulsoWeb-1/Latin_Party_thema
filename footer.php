<?php
/**
 * Latin Party Eventos - Footer Template
 *
 * @package Latin_Party_Eventos
 */

$phone     = lp_get_setting('lp_primary_phone', '+57 311 8487785');
$email     = lp_get_setting('lp_contact_email', 'contacto@latinpartyeventos.com');
$pqr       = lp_get_setting('lp_pqr_email', 'pqr@latinpartyeventos.com');
$loc       = lp_get_setting('lp_location', 'Bogotá, Colombia');
$fb        = lp_get_setting('lp_facebook', 'https://www.facebook.com/share/17BwWKdEBR/');
$ig        = lp_get_setting('lp_instagram', 'https://www.instagram.com/latinparty?igsh=cWtsYWliY2pod2p5');
$tiktok    = lp_get_setting('lp_tiktok', '');
$youtube   = lp_get_setting('lp_youtube', '');
$about     = lp_get_setting('lp_footer_about', 'En Latin Party Eventos nos especializamos en diseñar experiencias memorables que combinan profesionalismo, creatividad y excelencia en cada detalle.');
$copy      = lp_get_setting('lp_copyright', 'Latin Party Eventos. Todos los derechos reservados.');
$show_wa   = lp_get_setting('lp_show_whatsapp_float', true);

// Dynamic URLs for Key Pages
$servicios_url = lp_get_page_url('servicios', '#servicios');
$nosotros_url  = lp_get_page_url('nosotros');
$contacto_url  = lp_get_page_url('contacto', '#contacto');
?>

<!-- Pre-Footer Final CTA -->
<section class="final-cta-section section-padding">
    <div class="container">
        <div class="final-cta-box">
            <span class="section-badge gold">⚡ Asesoría Inmediata</span>
            <h2 class="final-cta-title">¿Listo para tu <span class="highlight-gold">evento perfecto?</span></h2>
            <p class="final-cta-desc">Contáctanos hoy y recibe una asesoría personalizada sin costo con nuestros directores de producción.</p>
            <div style="display: flex; justify-content: center; gap: 18px; flex-wrap: wrap;">
                <a href="<?php echo esc_url(lp_whatsapp_url('¡Hola! Quiero cotizar mi evento con Latin Party Eventos.')); ?>" target="_blank" rel="noopener" class="btn btn-gold">
                    <i class="fa-brands fa-whatsapp"></i> Hablar por WhatsApp
                </a>
                <a href="<?php echo esc_url($contacto_url); ?>" class="btn btn-outline">
                    <i class="fa-solid fa-file-pen"></i> Solicitar Cotización
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Col 1: About & Logo -->
            <div class="footer-col footer-col-about">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-link" style="margin-bottom: 18px; display: inline-flex;">
                    <img src="<?php echo esc_url(lp_get_logo_url()); ?>" alt="Latin Party Eventos" class="footer-logo-img" style="border-radius: 6px;">
                </a>
                <p class="footer-about-text">
                    <?php echo esc_html($about); ?>
                </p>
                <div class="footer-social-links">
                    <?php if (!empty($fb)) : ?>
                        <a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" class="footer-social-link" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if (!empty($ig)) : ?>
                        <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener" class="footer-social-link" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if (!empty($tiktok)) : ?>
                        <a href="<?php echo esc_url($tiktok); ?>" target="_blank" rel="noopener" class="footer-social-link" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    <?php endif; ?>
                    <?php if (!empty($youtube)) : ?>
                        <a href="<?php echo esc_url($youtube); ?>" target="_blank" rel="noopener" class="footer-social-link" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    <?php endif; ?>
                    <a href="<?php echo esc_url(lp_whatsapp_url()); ?>" target="_blank" rel="noopener" class="footer-social-link" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Col 2: Navigation Links -->
            <div class="footer-col">
                <h3 class="footer-col-title">Navegación</h3>
                <ul class="footer-menu">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Inicio</a></li>
                    <li><a href="<?php echo esc_url($servicios_url); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Servicios</a></li>
                    <li><a href="<?php echo esc_url($nosotros_url); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Nosotros</a></li>
                    <li><a href="<?php echo esc_url($contacto_url); ?>"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Contacto</a></li>
                    <li><a href="<?php echo esc_url(lp_whatsapp_url('¡Hola! Deseo cotización para mi evento.')); ?>" target="_blank"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Cotizar Online</a></li>
                </ul>
            </div>

            <!-- Col 3: Services -->
            <div class="footer-col">
                <h3 class="footer-col-title">Especialidades</h3>
                <ul class="footer-menu">
                    <li><a href="<?php echo esc_url($servicios_url); ?>">Sonido Profesional &amp; Line Array</a></li>
                    <li><a href="<?php echo esc_url($servicios_url); ?>">Iluminación DMX &amp; Cabezas Móviles</a></li>
                    <li><a href="<?php echo esc_url($servicios_url); ?>">Pistas de Baile LED</a></li>
                    <li><a href="<?php echo esc_url($servicios_url); ?>">Escenarios, Tarimas y Carpas</a></li>
                    <li><a href="<?php echo esc_url($servicios_url); ?>">Bodas, 15 Años &amp; Corporativos</a></li>
                </ul>
            </div>

            <!-- Col 4: Contact & Location -->
            <div class="footer-col">
                <h3 class="footer-col-title">Contacto Directo</h3>
                <ul class="footer-contact-list">
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <span><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9\+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a></span>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <span><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></span>
                    </li>
                    <?php if (!empty($pqr)) : ?>
                    <li>
                        <i class="fa-solid fa-headset"></i>
                        <span>PQR: <a href="mailto:<?php echo esc_attr($pqr); ?>"><?php echo esc_html($pqr); ?></a></span>
                    </li>
                    <?php endif; ?>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <span><?php echo esc_html($loc); ?> (Cobertura Nacional)</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-clock"></i>
                        <span>Lun - Sáb: 8:00 AM - 7:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Copyright -->
        <div class="footer-bottom">
            <div>
                &copy; <?php echo date('Y'); ?> <?php echo esc_html($copy); ?>
            </div>
            <div>
                Diseñado para <strong>Latin Party Eventos</strong> | Creado por <em>Agencia de marketing Tu impulso Web</em>
            </div>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Widget (Toggleable in Customizer) -->
<?php if ($show_wa) : ?>
<a href="<?php echo esc_url(lp_whatsapp_url()); ?>" target="_blank" rel="noopener noreferrer" class="whatsapp-float-btn" aria-label="Chatear por WhatsApp">
    <span class="whatsapp-pulse"></span>
    <span class="whatsapp-icon-circle"><i class="fa-brands fa-whatsapp"></i></span>
    <span class="whatsapp-text">¡Escríbenos en línea!</span>
</a>
<?php endif; ?>

<!-- Global Lightbox Modal -->
<div class="lightbox-modal" role="dialog" aria-modal="true">
    <div class="lightbox-content">
        <button class="lightbox-close" aria-label="Cerrar">&times;</button>
        <button class="lightbox-prev" aria-label="Anterior">&#10094;</button>
        <img src="" alt="Latin Party Eventos" class="lightbox-img">
        <button class="lightbox-next" aria-label="Siguiente">&#10095;</button>
        <div class="lightbox-caption"></div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
