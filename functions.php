<?php
/**
 * Latin Party Eventos - Theme Functions & Setup
 *
 * @package Latin_Party_Eventos
 */

if (!defined('ABSPATH')) {
    exit;
}

define('LATIN_PARTY_VERSION', '1.3.0');
define('LATIN_PARTY_DIR', get_template_directory());
define('LATIN_PARTY_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function latin_party_setup() {
    load_theme_textdomain('latin-party', LATIN_PARTY_DIR . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Custom Logo nativo editable desde Apariencia > Personalizar > Identidad del Sitio
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Registro de Menús de Navegación nativos de WordPress
    register_nav_menus(array(
        'primary-menu' => __('Menú Principal de Cabecera', 'latin-party'),
        'footer-menu'  => __('Menú del Pie de Página', 'latin-party'),
    ));
}
add_action('after_setup_theme', 'latin_party_setup');

/**
 * Filter: Añadir automáticamente la clase 'nav-link' a los enlaces del menú nativo de WordPress
 */
function latin_party_menu_link_attrs($atts, $item, $args) {
    if (isset($args->theme_location) && $args->theme_location === 'primary-menu') {
        $classes = empty($atts['class']) ? '' : $atts['class'];
        $classes .= ' nav-link';
        if (in_array('current-menu-item', $item->classes) || in_array('current_page_item', $item->classes)) {
            $classes .= ' active';
        }
        $atts['class'] = trim($classes);
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'latin_party_menu_link_attrs', 10, 3);

/**
 * Enqueue Scripts and Styles
 */
function latin_party_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'latin-party-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&display=swap',
        array(),
        null
    );

    // Font Awesome 6 Icons
    wp_enqueue_style(
        'latin-party-font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );

    // Main Theme CSS
    wp_enqueue_style(
        'latin-party-main-css',
        LATIN_PARTY_URI . '/assets/css/main.css',
        array(),
        LATIN_PARTY_VERSION
    );

    // Root style.css
    wp_enqueue_style(
        'latin-party-style',
        get_stylesheet_uri(),
        array('latin-party-main-css'),
        LATIN_PARTY_VERSION
    );

    // Main Theme JS
    wp_enqueue_script(
        'latin-party-main-js',
        LATIN_PARTY_URI . '/assets/js/main.js',
        array(),
        LATIN_PARTY_VERSION,
        true
    );

    // Localize Script for AJAX & WhatsApp
    wp_localize_script('latin-party-main-js', 'latinPartyData', array(
        'ajax_url'     => admin_url('admin-ajax.php'),
        'nonce'        => wp_create_nonce('latin_party_nonce'),
        'whatsapp_url' => lp_whatsapp_url(),
    ));
}
add_action('wp_enqueue_scripts', 'latin_party_scripts');

/**
 * Register ACF Options Page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Ajustes Latin Party Eventos',
        'menu_title'    => 'Latin Party Opciones',
        'menu_slug'     => 'latin-party-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-star-filled',
        'position'      => 2,
    ));

    if (function_exists('acf_add_options_sub_page')) {
        acf_add_options_sub_page(array(
            'page_title'  => 'Ajustes Generales',
            'menu_title'  => 'Ajustes Generales',
            'parent_slug' => 'latin-party-settings',
            'menu_slug'   => 'latin-party-settings',
        ));
        acf_add_options_sub_page(array(
            'page_title'  => 'Página de Inicio (Home)',
            'menu_title'  => 'Página de Inicio',
            'parent_slug' => 'latin-party-settings',
            'menu_slug'   => 'latin-party-inicio',
        ));
        acf_add_options_sub_page(array(
            'page_title'  => 'Página de Servicios',
            'menu_title'  => 'Página de Servicios',
            'parent_slug' => 'latin-party-settings',
            'menu_slug'   => 'latin-party-servicios',
        ));
        acf_add_options_sub_page(array(
            'page_title'  => 'Página de Nosotros',
            'menu_title'  => 'Página de Nosotros',
            'parent_slug' => 'latin-party-settings',
            'menu_slug'   => 'latin-party-nosotros',
        ));
        acf_add_options_sub_page(array(
            'page_title'  => 'Página de Contacto',
            'menu_title'  => 'Página de Contacto',
            'parent_slug' => 'latin-party-settings',
            'menu_slug'   => 'latin-party-contacto',
        ));
    }
}

/**
 * Configure ACF Local JSON Save and Load Points
 */
function latin_party_acf_json_save_point($path) {
    $path = LATIN_PARTY_DIR . '/acf-json';
    return $path;
}
add_filter('acf/settings/save_json', 'latin_party_acf_json_save_point');

function latin_party_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = LATIN_PARTY_DIR . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'latin_party_acf_json_load_point');

/**
 * AJAX Handler for Contact Form Submission
 */
function latin_party_ajax_contact_handler() {
    check_ajax_referer('latin_party_nonce', 'nonce');

    $name    = isset($_POST['client_name']) ? sanitize_text_field($_POST['client_name']) : '';
    $email   = isset($_POST['client_email']) ? sanitize_email($_POST['client_email']) : '';
    $phone   = isset($_POST['client_phone']) ? sanitize_text_field($_POST['client_phone']) : '';
    $event   = isset($_POST['event_type']) ? sanitize_text_field($_POST['event_type']) : 'General';
    $message = isset($_POST['client_message']) ? sanitize_textarea_field($_POST['client_message']) : '';

    if (empty($name) || empty($phone)) {
        wp_send_json_error(array('message' => 'Por favor completa tu nombre y teléfono.'));
    }

    $to_email = lp_get_setting('lp_contact_email', 'contacto@latinpartyeventos.com');
    $subject  = 'Nueva Solicitud de Cotización - Latin Party Eventos';
    $body     = "Nombre: {$name}\n";
    $body    .= "Teléfono: {$phone}\n";
    $body    .= "Email: {$email}\n";
    $body    .= "Tipo de Evento: {$event}\n";
    $body    .= "Mensaje: {$message}\n\n";
    $body    .= "Enviado desde el formulario web de latinpartyeventos.com";

    $headers = array('Content-Type: text/plain; charset=UTF-8');
    if (!empty($email)) {
        $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
    }

    @wp_mail($to_email, $subject, $body, $headers);

    $wa_msg = "¡Hola Latin Party Eventos! Mi nombre es {$name}. Solicito asesoría para {$event}. Teléfono: {$phone}. Mensaje: {$message}";
    $wa_url = lp_whatsapp_url($wa_msg);

    wp_send_json_success(array(
        'message'      => 'Solicitud enviada correctamente.',
        'whatsapp_url' => $wa_url,
    ));
}
add_action('wp_ajax_latin_party_send_contact', 'latin_party_ajax_contact_handler');
add_action('wp_ajax_nopriv_latin_party_send_contact', 'latin_party_ajax_contact_handler');

/**
 * Include Required Submodules
 */
require_once LATIN_PARTY_DIR . '/inc/template-functions.php';
require_once LATIN_PARTY_DIR . '/inc/customizer.php';
require_once LATIN_PARTY_DIR . '/inc/acf-fields.php';
require_once LATIN_PARTY_DIR . '/inc/github-updater.php';
