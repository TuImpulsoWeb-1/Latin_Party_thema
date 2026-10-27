<?php
/**
 * Latin Party Eventos - Helper & Template Functions
 * Seamless integration between WordPress Customizer, ACF and native WP features.
 *
 * @package Latin_Party_Eventos
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
/**
 * Unified Getter: Prioritizes ACF Page Field > Customizer > ACF Theme Options > Default Fallback.
 * This ensures that EVERY text, image, link and button edited in ACF immediately updates the live site.
 */
function lp_get_value($key, $default = '', $post_id = false) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    // 1. Check ACF Field on current page/post
    if ($post_id && function_exists('get_field')) {
        $val = get_field($key, $post_id);
        if ($val !== null && $val !== false && $val !== '') {
            return $val;
        }
    }

    // 2. Check WordPress Customizer
    $customizer_val = get_theme_mod($key);
    if ($customizer_val !== null && $customizer_val !== false && $customizer_val !== '') {
        return $customizer_val;
    }

    // 3. Check ACF Options Page
    if (function_exists('get_field')) {
        $acf_opt = get_field($key, 'option');
        if ($acf_opt !== null && $acf_opt !== false && $acf_opt !== '') {
            return $acf_opt;
        }
    }

    return $default;
}

/**
 * Unified alias for lp_get_setting
 */
function lp_get_setting($key, $default = '', $post_id = false) {
    return lp_get_value($key, $default, $post_id);
}

/**
 * Unified alias for lp_get_option
 */
function lp_get_option($key, $default = '') {
    return lp_get_value($key, $default);
}

/**
 * Unified alias for lp_get_field
 */
function lp_get_field($key, $post_id = false, $default = '') {
    return lp_get_value($key, $default, $post_id);
}

/**
 * Dynamic Page URL Resolver
 * Resolves the exact permalink for key pages (servicios, nosotros, contacto)
 * by checking Customizer selection, page template assignment, or slug.
 */
function lp_get_page_url($slug_or_key, $fallback_hash = '') {
    $clean_key = strtolower(trim($slug_or_key));

    // 1. Check if user assigned a page in the Customizer (Apariencia > Personalizar > Páginas y Enlaces)
    $customizer_page_id = get_theme_mod('lp_page_' . $clean_key);
    if (!empty($customizer_page_id) && is_numeric($customizer_page_id) && $customizer_page_id > 0) {
        $link = get_permalink($customizer_page_id);
        if ($link && !is_wp_error($link)) {
            return esc_url($link);
        }
    }

    // 2. Search dynamically for an existing published page with template page-{key}.php
    $template_name = 'page-' . $clean_key . '.php';
    $pages_by_template = get_pages(array(
        'meta_key'   => '_wp_page_template',
        'meta_value' => $template_name,
        'number'     => 1,
        'post_status'=> 'publish',
    ));

    if (!empty($pages_by_template)) {
        return esc_url(get_permalink($pages_by_template[0]->ID));
    }

    // 3. Search dynamically by slug (e.g. 'servicios', 'nosotros', 'contacto')
    $page_by_path = get_page_by_path($clean_key);
    if ($page_by_path && $page_by_path->post_status === 'publish') {
        return esc_url(get_permalink($page_by_path->ID));
    }

    // Also check common Spanish variations
    $alt_slugs = array(
        'servicios' => array('nuestros-servicios', 'servicios-eventos'),
        'nosotros'  => array('quienes-somos', 'sobre-nosotros', 'acerca-de'),
        'contacto'  => array('contactenos', 'cotizaciones', 'cotizar'),
    );

    if (isset($alt_slugs[$clean_key])) {
        foreach ($alt_slugs[$clean_key] as $alt) {
            $alt_page = get_page_by_path($alt);
            if ($alt_page && $alt_page->post_status === 'publish') {
                return esc_url(get_permalink($alt_page->ID));
            }
        }
    }

    // 3b. Search by page title (e.g. 'Servicios', 'Nosotros', 'Contacto')
    $pages_by_title = get_posts(array(
        'post_type'   => 'page',
        'title'       => ucfirst($clean_key),
        'post_status' => 'publish',
        'numberposts' => 1,
    ));
    if (!empty($pages_by_title)) {
        return esc_url(get_permalink($pages_by_title[0]->ID));
    }

    // 4. Fallback: if a section hash exists, use anchor on front page or full url on subpages
    if (!empty($fallback_hash)) {
        if (is_front_page()) {
            return $fallback_hash;
        } else {
            return esc_url(home_url('/' . ltrim($fallback_hash, '/')));
        }
    }

    // 5. Ultimate fallback respecting PATHINFO / index.php permalinks
    $structure = get_option('permalink_structure');
    if ($structure && strpos($structure, 'index.php') !== false) {
        return esc_url(home_url('/index.php/' . $clean_key . '/'));
    }

    return esc_url(home_url('/' . $clean_key . '/'));
}

/**
 * Auto-correct any hardcoded or broken menu items in WordPress native menus
 */
function latin_party_fix_nav_menu_items($items) {
    if (!is_array($items)) {
        return $items;
    }
    foreach ($items as $item) {
        if (!isset($item->title) || !isset($item->url)) {
            continue;
        }
        $title_lower = strtolower(trim($item->title));
        if (strpos($title_lower, 'servicio') !== false) {
            $item->url = lp_get_page_url('servicios', '#servicios');
        } elseif (strpos($title_lower, 'nosotros') !== false) {
            $item->url = lp_get_page_url('nosotros');
        } elseif (strpos($title_lower, 'contacto') !== false) {
            $item->url = lp_get_page_url('contacto', '#contacto');
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'latin_party_fix_nav_menu_items');

/**
 * Resolve Image URL from Customizer/ACF (handles ID, array, string) with fallback
 */
function lp_get_image_url($field_value, $fallback_rel_path = '') {
    $fallback_url = get_template_directory_uri() . '/assets/images/' . ltrim($fallback_rel_path, '/');

    if (empty($field_value)) {
        return $fallback_url;
    }

    if (is_array($field_value) && isset($field_value['url'])) {
        return esc_url($field_value['url']);
    }

    if (is_numeric($field_value)) {
        $src = wp_get_attachment_image_src($field_value, 'full');
        if ($src && isset($src[0])) {
            return esc_url($src[0]);
        }
    }

    if (is_string($field_value) && filter_var($field_value, FILTER_VALIDATE_URL)) {
        return esc_url($field_value);
    }

    return $fallback_url;
}

/**
 * Get WhatsApp Click URL
 */
function lp_whatsapp_url($message = '') {
    $custom_link = lp_get_setting('lp_whatsapp_link', '');
    if (!empty($custom_link) && filter_var($custom_link, FILTER_VALIDATE_URL)) {
        return esc_url($custom_link);
    }

    $phone = lp_get_setting('lp_whatsapp_number', '573118487785');
    $clean_phone = preg_replace('/[^0-9]/', '', $phone);
    if (empty($clean_phone)) {
        $clean_phone = '573118487785';
    }

    if (empty($message)) {
        $message = lp_get_setting('lp_whatsapp_default_message', '¡Hola Latin Party Eventos! Deseo solicitar asesoría para mi evento.');
    }

    return 'https://wa.me/' . $clean_phone . '?text=' . rawurlencode($message);
}

/**
 * Get Site Logo URL (Customizer Custom Logo > ACF > Theme Assets)
 */
function lp_get_logo_url() {
    // 1. WordPress Native Custom Logo (Apariencia > Personalizar > Identidad del Sitio)
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        $src = wp_get_attachment_image_src($custom_logo_id, 'full');
        if ($src && isset($src[0])) {
            return esc_url($src[0]);
        }
    }

    // 2. ACF Option
    $acf_logo = lp_get_setting('lp_site_logo', '');
    if (!empty($acf_logo)) {
        return lp_get_image_url($acf_logo, 'logo.png');
    }

    // 3. Bundled Transparent PNG Logo
    if (file_exists(get_template_directory() . '/assets/images/logo.png')) {
        return get_template_directory_uri() . '/assets/images/logo.png';
    }

    return get_template_directory_uri() . '/assets/images/logo.jpg';
}

/**
 * Render Primary Navigation Menu
 * Supports native WordPress menus assigned in Apariencia > Menús / Personalizar
 * with automatic fallback resolving exact dynamic links for Servicios, Nosotros and Contacto.
 */
function lp_render_primary_menu() {
    if (has_nav_menu('primary-menu')) {
        wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'container'      => false,
            'menu_class'     => 'nav-links',
            'fallback_cb'    => false,
            'depth'          => 2,
        ));
    } else {
        $servicios_url = lp_get_page_url('servicios', '#servicios');
        $nosotros_url  = lp_get_page_url('nosotros');
        $contacto_url  = lp_get_page_url('contacto', '#contacto');

        $is_home      = is_front_page();
        $is_servicios = is_page_template('page-servicios.php') || is_page('servicios');
        $is_nosotros  = is_page_template('page-nosotros.php')  || is_page('nosotros');
        $is_contacto  = is_page_template('page-contacto.php')  || is_page('contacto');
        ?>
        <ul class="nav-links">
            <li class="menu-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link <?php echo $is_home ? 'active' : ''; ?>">Home</a></li>
            <li class="menu-item"><a href="<?php echo esc_url($servicios_url); ?>" class="nav-link <?php echo $is_servicios ? 'active' : ''; ?>">Servicios</a></li>
            <li class="menu-item"><a href="<?php echo esc_url($nosotros_url); ?>" class="nav-link <?php echo $is_nosotros ? 'active' : ''; ?>">Nosotros</a></li>
            <li class="menu-item"><a href="<?php echo esc_url($contacto_url); ?>" class="nav-link <?php echo $is_contacto ? 'active' : ''; ?>">Contacto</a></li>
        </ul>
        <?php
    }
}

/**
 * Render Star Rating HTML
 */
function lp_render_stars($count = 5) {
    $count = intval($count);
    if ($count < 1) $count = 5;
    if ($count > 5) $count = 5;

    $html = '<div class="testimonial-rating" aria-label="' . $count . ' de 5 estrellas">';
    for ($i = 0; $i < $count; $i++) {
        $html .= '<span class="star-icon">&#9733;</span>';
    }
    $html .= '<span class="testimonial-score">' . $count . '/5</span>';
    $html .= '</div>';
    return $html;
}
