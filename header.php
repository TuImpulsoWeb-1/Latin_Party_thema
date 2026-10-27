<?php
/**
 * Latin Party Eventos - Header Template
 *
 * @package Latin_Party_Eventos
 */

$show_topbar   = lp_get_setting('lp_show_topbar', true);
$phone         = lp_get_setting('lp_primary_phone', '+57 311 8487785');
$email         = lp_get_setting('lp_contact_email', 'contacto@latinpartyeventos.com');
$location      = lp_get_setting('lp_location', 'Bogotá, Colombia');
$fb            = lp_get_setting('lp_facebook', 'https://www.facebook.com/share/17BwWKdEBR/');
$ig            = lp_get_setting('lp_instagram', 'https://www.instagram.com/latinparty?igsh=cWtsYWliY2pod2p5');
$btn_text      = lp_get_setting('lp_header_btn_text', 'Cotizar');
$btn_action    = lp_get_setting('lp_header_btn_action', 'whatsapp');

$btn_url = ($btn_action === 'contacto') 
    ? lp_get_page_url('contacto', '#contacto') 
    : lp_whatsapp_url('¡Hola! Deseo cotizar un evento con Latin Party Eventos.');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="description" content="<?php echo esc_attr(get_bloginfo('description') ?: 'Latin Party Eventos - Producción integral de eventos sociales y corporativos, sonido profesional, iluminación DMX, pantallas LED y tarimas en Colombia.'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Top Info Bar (Editable & Toggleable in Customizer) -->
<?php if ($show_topbar) : ?>
<div class="top-bar">
    <div class="container">
        <div class="top-bar-contact">
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9\+]/', '', $phone)); ?>">
                <i class="fa-solid fa-phone"></i> <?php echo esc_html($phone); ?>
            </a>
            <a href="mailto:<?php echo esc_attr($email); ?>">
                <i class="fa-solid fa-envelope"></i> <?php echo esc_html($email); ?>
            </a>
            <span>
                <i class="fa-solid fa-location-dot"></i> <?php echo esc_html($location); ?>
            </span>
        </div>
        <div class="top-bar-social">
            <?php if (!empty($fb)) : ?>
                <a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <?php endif; ?>
            <?php if (!empty($ig)) : ?>
                <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
            <?php endif; ?>
            <a href="<?php echo esc_url(lp_whatsapp_url()); ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Main Sticky Header -->
<header class="site-header" id="site-header">
    <div class="container">
        <div class="navbar">
            <!-- Brand Logo (Customizer / ACF / Fallback) -->
            <div class="site-branding">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-link" rel="home">
                    <img src="<?php echo esc_url(lp_get_logo_url()); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="site-logo-img">
                    <div class="logo-text-wrap">
                        <span class="logo-title">Latin Party</span>
                        <span class="logo-tagline">Eventos & Producción</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="main-nav" aria-label="<?php esc_attr_e('Menú Principal', 'latin-party'); ?>">
                <?php lp_render_primary_menu(); ?>

                <!-- CTA Button -->
                <div class="header-cta">
                    <a href="<?php echo esc_url($btn_url); ?>" <?php echo ($btn_action === 'whatsapp') ? 'target="_blank" rel="noopener"' : ''; ?> class="btn btn-teal btn-sm">
                        <?php if ($btn_action === 'whatsapp') : ?>
                            <i class="fa-brands fa-whatsapp"></i>
                        <?php else : ?>
                            <i class="fa-solid fa-file-pen"></i>
                        <?php endif; ?>
                        <?php echo esc_html($btn_text); ?>
                    </a>
                </div>
            </nav>

            <!-- Mobile Hamburger Button -->
            <button class="mobile-menu-toggle" aria-label="Abrir Menú" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="mobile-drawer-overlay"></div>
<div class="mobile-drawer">
    <button class="mobile-drawer-close" aria-label="Cerrar Menú">
        <i class="fa-solid fa-xmark"></i>
    </button>
    
    <div style="margin-bottom: 25px;">
        <img src="<?php echo esc_url(lp_get_logo_url()); ?>" alt="Latin Party Eventos" style="height: 48px; border-radius: 6px;">
    </div>

    <!-- Mobile Nav with Dynamic Page Links -->
    <?php lp_render_primary_menu(); ?>

    <div style="margin-top: 25px; margin-bottom: 25px;">
        <a href="<?php echo esc_url(lp_whatsapp_url()); ?>" target="_blank" rel="noopener" class="btn btn-teal" style="width: 100%;">
            <i class="fa-brands fa-whatsapp"></i> Hablar por WhatsApp
        </a>
    </div>

    <div class="mobile-drawer-contact">
        <p><i class="fa-solid fa-phone"></i> <?php echo esc_html($phone); ?></p>
        <p><i class="fa-solid fa-envelope"></i> <?php echo esc_html($email); ?></p>
        <p><i class="fa-solid fa-location-dot"></i> <?php echo esc_html($location); ?></p>
    </div>
</div>
