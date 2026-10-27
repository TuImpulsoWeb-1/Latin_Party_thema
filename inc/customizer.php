<?php
/**
 * Latin Party Eventos - Customizer Controls
 * Allows easy visual editing in WordPress: Apariencia > Personalizar
 *
 * @package Latin_Party_Eventos
 */

if (!defined('ABSPATH')) {
    exit;
}

function latin_party_customize_register($wp_customize) {

    // Panel Principal de Latin Party
    $wp_customize->add_panel('latin_party_theme_panel', array(
        'title'       => __('⚙️ Opciones de Latin Party', 'latin-party'),
        'description' => __('Personaliza fácilmente las páginas, enlaces de menú, contacto, WhatsApp y diseño.', 'latin-party'),
        'priority'    => 20,
    ));

    // =========================================================================
    // 1. PÁGINAS Y ENLACES CLAVE DEL SITIO
    // =========================================================================
    $wp_customize->add_section('lp_pages_section', array(
        'title'    => __('🔗 Páginas y Enlaces del Sitio', 'latin-party'),
        'panel'    => 'latin_party_theme_panel',
        'priority' => 10,
        'description' => __('Selecciona las páginas creadas en WordPress para que el menú y los botones dirijan automáticamente al enlace exacto sin importar su nombre o slug.', 'latin-party'),
    ));

    // Selector: Página de Servicios
    $wp_customize->add_setting('lp_page_servicios', array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('lp_page_servicios', array(
        'label'       => __('Página de Servicios', 'latin-party'),
        'description' => __('Selecciona la página que creaste para los Servicios.', 'latin-party'),
        'section'     => 'lp_pages_section',
        'type'        => 'dropdown-pages',
    ));

    // Selector: Página de Nosotros
    $wp_customize->add_setting('lp_page_nosotros', array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('lp_page_nosotros', array(
        'label'       => __('Página de Nosotros', 'latin-party'),
        'description' => __('Selecciona la página que creaste para Nosotros / Acerca de.', 'latin-party'),
        'section'     => 'lp_pages_section',
        'type'        => 'dropdown-pages',
    ));

    // Selector: Página de Contacto
    $wp_customize->add_setting('lp_page_contacto', array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('lp_page_contacto', array(
        'label'       => __('Página de Contacto', 'latin-party'),
        'description' => __('Selecciona la página que creaste para Contacto / Cotizaciones.', 'latin-party'),
        'section'     => 'lp_pages_section',
        'type'        => 'dropdown-pages',
    ));

    // =========================================================================
    // 2. CABECERA & BARRA SUPERIOR
    // =========================================================================
    $wp_customize->add_section('lp_header_section', array(
        'title'    => __('🔝 Cabecera & Barra Superior', 'latin-party'),
        'panel'    => 'latin_party_theme_panel',
        'priority' => 20,
    ));

    // Mostrar Top Bar
    $wp_customize->add_setting('lp_show_topbar', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('lp_show_topbar', array(
        'label'   => __('Mostrar barra superior con datos de contacto', 'latin-party'),
        'section' => 'lp_header_section',
        'type'    => 'checkbox',
    ));

    // Texto botón Cabecera
    $wp_customize->add_setting('lp_header_btn_text', array(
        'default'           => 'Cotizar',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_header_btn_text', array(
        'label'   => __('Texto del botón de cabecera', 'latin-party'),
        'section' => 'lp_header_section',
        'type'    => 'text',
    ));

    // Destino botón Cabecera
    $wp_customize->add_setting('lp_header_btn_action', array(
        'default'           => 'whatsapp',
        'sanitize_callback' => 'sanitize_key',
    ));
    $wp_customize->add_control('lp_header_btn_action', array(
        'label'   => __('Acción del botón de cabecera', 'latin-party'),
        'section' => 'lp_header_section',
        'type'    => 'select',
        'choices' => array(
            'whatsapp' => __('Abrir chat directo de WhatsApp', 'latin-party'),
            'contacto' => __('Ir a la página de Contacto', 'latin-party'),
        ),
    ));

    // =========================================================================
    // 3. DATOS DE CONTACTO & WHATSAPP
    // =========================================================================
    $wp_customize->add_section('lp_contact_section', array(
        'title'    => __('📞 Teléfono, Correo & WhatsApp', 'latin-party'),
        'panel'    => 'latin_party_theme_panel',
        'priority' => 30,
    ));

    // Teléfono
    $wp_customize->add_setting('lp_primary_phone', array(
        'default'           => '+57 311 8487785',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_primary_phone', array(
        'label'   => __('Teléfono Principal', 'latin-party'),
        'section' => 'lp_contact_section',
        'type'    => 'text',
    ));

    // WhatsApp Número
    $wp_customize->add_setting('lp_whatsapp_number', array(
        'default'           => '573118487785',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_whatsapp_number', array(
        'label'       => __('Número WhatsApp (con código de país sin espacios)', 'latin-party'),
        'description' => __('Ejemplo: 573118487785', 'latin-party'),
        'section'     => 'lp_contact_section',
        'type'        => 'text',
    ));

    // WhatsApp Enlace Directo (wa.link)
    $wp_customize->add_setting('lp_whatsapp_link', array(
        'default'           => 'https://wa.link/p2g3qg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('lp_whatsapp_link', array(
        'label'       => __('Enlace Directo WhatsApp / wa.link (Opcional)', 'latin-party'),
        'description' => __('Si tienes un wa.link colócalo aquí para dirigir al usuario directamente.', 'latin-party'),
        'section'     => 'lp_contact_section',
        'type'        => 'url',
    ));

    // Mensaje predeterminado WhatsApp
    $wp_customize->add_setting('lp_whatsapp_default_message', array(
        'default'           => '¡Hola Latin Party Eventos! Deseo solicitar asesoría para mi evento.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('lp_whatsapp_default_message', array(
        'label'   => __('Mensaje Predeterminado de WhatsApp', 'latin-party'),
        'section' => 'lp_contact_section',
        'type'    => 'textarea',
    ));

    // Correo Contacto
    $wp_customize->add_setting('lp_contact_email', array(
        'default'           => 'contacto@latinpartyeventos.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('lp_contact_email', array(
        'label'   => __('Correo de Contacto', 'latin-party'),
        'section' => 'lp_contact_section',
        'type'    => 'email',
    ));

    // Correo PQR
    $wp_customize->add_setting('lp_pqr_email', array(
        'default'           => 'pqr@latinpartyeventos.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('lp_pqr_email', array(
        'label'   => __('Correo PQR (Peticiones, Quejas y Reclamos)', 'latin-party'),
        'section' => 'lp_contact_section',
        'type'    => 'email',
    ));

    // Ubicación
    $wp_customize->add_setting('lp_location', array(
        'default'           => 'Bogotá, Colombia',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_location', array(
        'label'   => __('Ubicación / Ciudad', 'latin-party'),
        'section' => 'lp_contact_section',
        'type'    => 'text',
    ));

    // =========================================================================
    // 4. REDES SOCIALES
    // =========================================================================
    $wp_customize->add_section('lp_social_section', array(
        'title'    => __('🌐 Redes Sociales', 'latin-party'),
        'panel'    => 'latin_party_theme_panel',
        'priority' => 40,
    ));

    $wp_customize->add_setting('lp_facebook', array(
        'default'           => 'https://www.facebook.com/share/17BwWKdEBR/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('lp_facebook', array(
        'label'   => __('Enlace Facebook', 'latin-party'),
        'section' => 'lp_social_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('lp_instagram', array(
        'default'           => 'https://www.instagram.com/latinparty?igsh=cWtsYWliY2pod2p5',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('lp_instagram', array(
        'label'   => __('Enlace Instagram', 'latin-party'),
        'section' => 'lp_social_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('lp_tiktok', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('lp_tiktok', array(
        'label'   => __('Enlace TikTok (Opcional)', 'latin-party'),
        'section' => 'lp_social_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('lp_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('lp_youtube', array(
        'label'   => __('Enlace YouTube (Opcional)', 'latin-party'),
        'section' => 'lp_social_section',
        'type'    => 'url',
    ));

    // =========================================================================
    // 5. PIE DE PÁGINA (FOOTER) & WIDGET FLOTANTE
    // =========================================================================
    $wp_customize->add_section('lp_footer_section', array(
        'title'    => __('🔻 Pie de Página (Footer)', 'latin-party'),
        'panel'    => 'latin_party_theme_panel',
        'priority' => 50,
    ));

    $wp_customize->add_setting('lp_footer_about', array(
        'default'           => 'En Latin Party Eventos nos especializamos en diseñar experiencias memorables que combinan profesionalismo, creatividad y excelencia en cada detalle.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('lp_footer_about', array(
        'label'   => __('Descripción corta del Footer', 'latin-party'),
        'section' => 'lp_footer_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('lp_copyright', array(
        'default'           => 'Latin Party Eventos. Todos los derechos reservados.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_copyright', array(
        'label'   => __('Texto de Copyright', 'latin-party'),
        'section' => 'lp_footer_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('lp_show_whatsapp_float', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('lp_show_whatsapp_float', array(
        'label'   => __('Mostrar botón flotante de WhatsApp en la esquina inferior', 'latin-party'),
        'section' => 'lp_footer_section',
        'type'    => 'checkbox',
    ));

    // =========================================================================
    // 6. COLORES DEL TEMA
    // =========================================================================
    $wp_customize->add_section('lp_colors_section', array(
        'title'    => __('🎨 Colores del Tema', 'latin-party'),
        'panel'    => 'latin_party_theme_panel',
        'priority' => 60,
    ));

    // Color Cian / Teal
    $wp_customize->add_setting('lp_color_teal', array(
        'default'           => '#21b4a6',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lp_color_teal', array(
        'label'   => __('Color Principal (Cian / Turquesa)', 'latin-party'),
        'section' => 'lp_colors_section',
    )));

    // Color Dorado / Gold
    $wp_customize->add_setting('lp_color_gold', array(
        'default'           => '#d4af37',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lp_color_gold', array(
        'label'   => __('Color de Acento (Dorado)', 'latin-party'),
        'section' => 'lp_colors_section',
    )));

    // Fondo Oscuro
    $wp_customize->add_setting('lp_color_bg', array(
        'default'           => '#0a0f19',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lp_color_bg', array(
        'label'   => __('Color de Fondo Principal', 'latin-party'),
        'section' => 'lp_colors_section',
    )));

    // =========================================================================
    // 7. ACTUALIZACIONES AUTOMÁTICAS (GITHUB)
    // =========================================================================
    $wp_customize->add_section('lp_updater_section', array(
        'title'       => __('🔄 Actualizaciones Automáticas', 'latin-party'),
        'panel'       => 'latin_party_theme_panel',
        'priority'    => 70,
        'description' => __('Conecta este tema a tu repositorio de GitHub para recibir avisos de actualización automática en WordPress con 1 solo clic.', 'latin-party'),
    ));

    $wp_customize->add_setting('lp_github_repo', array(
        'default'           => 'TuImpulsoWeb-1/Latin_Party_thema',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_github_repo', array(
        'label'       => __('Repositorio de GitHub (usuario/repositorio)', 'latin-party'),
        'description' => __('Ejemplo: tu-usuario/latin-party-theme', 'latin-party'),
        'section'     => 'lp_updater_section',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('lp_github_token', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_github_token', array(
        'label'       => __('Token de Acceso Personal (Solo si el repo es privado)', 'latin-party'),
        'description' => __('Si tu repositorio es público en GitHub, deja este campo vacío.', 'latin-party'),
        'section'     => 'lp_updater_section',
        'type'        => 'password',
    ));
    // =========================================================================
    // 8. TEXTOS: PÁGINA DE SERVICIOS
    // =========================================================================
    $wp_customize->add_section('lp_serv_section', array(
        'title'    => __('📄 Textos: Página de Servicios', 'latin-party'),
        'panel'    => 'latin_party_theme_panel',
        'priority' => 80,
    ));

    $wp_customize->add_setting('lp_serv_page_title', array(
        'default'           => 'Todo lo que necesitas para tu evento en un solo lugar',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_serv_page_title', array(
        'label'   => __('Título Principal (Hero)', 'latin-party'),
        'section' => 'lp_serv_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('lp_serv_page_desc', array(
        'default'           => 'En Latin Party Eventos ofrecemos soluciones completas para cada tipo de celebración. Desde el sonido profesional, la iluminación y la ambientación, hasta la producción integral de conciertos, bodas y eventos corporativos.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('lp_serv_page_desc', array(
        'label'   => __('Descripción Principal (Hero)', 'latin-party'),
        'section' => 'lp_serv_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('lp_serv_audio_title', array(
        'default'           => 'Soluciones de Audio Profesional',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_serv_audio_title', array(
        'label'   => __('Título Sección Audio', 'latin-party'),
        'section' => 'lp_serv_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('lp_serv_lights_title', array(
        'default'           => 'Iluminación Creativa & Control DMX',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_serv_lights_title', array(
        'label'   => __('Título Sección Iluminación', 'latin-party'),
        'section' => 'lp_serv_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('lp_serv_led_title', array(
        'default'           => 'Pistas de Baile LED, Tarimas y Carpas',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_serv_led_title', array(
        'label'   => __('Título Sección Pistas & Tarimas', 'latin-party'),
        'section' => 'lp_serv_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('lp_serv_cta_title', array(
        'default'           => '¿Necesitas un paquete personalizado?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_serv_cta_title', array(
        'label'   => __('Título Banner Asesoría', 'latin-party'),
        'section' => 'lp_serv_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('lp_serv_cta_btn', array(
        'default'           => 'Hablar con un Asesor',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_serv_cta_btn', array(
        'label'   => __('Texto Botón Banner Asesoría', 'latin-party'),
        'section' => 'lp_serv_section',
        'type'    => 'text',
    ));

    // =========================================================================
    // 9. TEXTOS: PÁGINA DE CONTACTO & FORMULARIO
    // =========================================================================
    $wp_customize->add_section('lp_contact_texts_section', array(
        'title'    => __('📄 Textos: Página de Contacto', 'latin-party'),
        'panel'    => 'latin_party_theme_panel',
        'priority' => 90,
    ));

    $wp_customize->add_setting('lp_contact_hero_title', array(
        'default'           => 'Tu Celebración, Nuestro Legado',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_contact_hero_title', array(
        'label'   => __('Título Principal (Hero)', 'latin-party'),
        'section' => 'lp_contact_texts_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('lp_contact_hero_desc', array(
        'default'           => '¿Planeando un evento inolvidable? Nuestro equipo está listo para asesorarte y crear la mejor experiencia para ti y tus invitados. Déjanos tus datos y recibe una cotización gratuita en minutos.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('lp_contact_hero_desc', array(
        'label'   => __('Descripción Principal (Hero)', 'latin-party'),
        'section' => 'lp_contact_texts_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('lp_contact_form_title', array(
        'default'           => 'Diseñemos juntos tu evento',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_contact_form_title', array(
        'label'   => __('Título del Formulario', 'latin-party'),
        'section' => 'lp_contact_texts_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('lp_contact_btn_text', array(
        'default'           => 'Enviar Cotización Ahora',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_contact_btn_text', array(
        'label'   => __('Texto Botón Enviar Formulario', 'latin-party'),
        'section' => 'lp_contact_texts_section',
        'type'    => 'text',
    ));

    // =========================================================================
    // 10. TEXTOS: PÁGINA DE NOSOTROS
    // =========================================================================
    $wp_customize->add_section('lp_nosotros_section', array(
        'title'    => __('📄 Textos: Página de Nosotros', 'latin-party'),
        'panel'    => 'latin_party_theme_panel',
        'priority' => 100,
    ));

    $wp_customize->add_setting('lp_nosotros_hero_title', array(
        'default'           => 'Tu Celebración, Nuestro Legado',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_nosotros_hero_title', array(
        'label'   => __('Título Principal (Hero)', 'latin-party'),
        'section' => 'lp_nosotros_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('lp_mision_title', array(
        'default'           => 'Nuestra Misión',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_mision_title', array(
        'label'   => __('Título Misión', 'latin-party'),
        'section' => 'lp_nosotros_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('lp_mision_text', array(
        'default'           => 'Ofrecer alternativas efectivas, eficaces y eficientes en la creación, diseño, organización y ejecución de eventos sociales y empresariales. Crear un ambiente óptimo con calidad, seriedad y cumplimiento, garantizando una ocasión inolvidable.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('lp_mision_text', array(
        'label'   => __('Texto Misión', 'latin-party'),
        'section' => 'lp_nosotros_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('lp_vision_title', array(
        'default'           => 'Nuestra Visión',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('lp_vision_title', array(
        'label'   => __('Título Visión', 'latin-party'),
        'section' => 'lp_nosotros_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('lp_vision_text', array(
        'default'           => 'Queremos que LATIN PARTY EVENTOS sea una empresa líder en organización y producción de eventos sociales y corporativos, con presencia y reconocimiento a nivel nacional, basada en el profesionalismo y la calidad humana de nuestro personal.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('lp_vision_text', array(
        'label'   => __('Texto Visión', 'latin-party'),
        'section' => 'lp_nosotros_section',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'latin_party_customize_register');

/**
 * Inyectar CSS dinámico según los colores seleccionados en el Personalizador
 */
function latin_party_customizer_css() {
    $teal = get_theme_mod('lp_color_teal', '#21b4a6');
    $gold = get_theme_mod('lp_color_gold', '#d4af37');
    $bg   = get_theme_mod('lp_color_bg', '#0a0f19');

    if ($teal !== '#21b4a6' || $gold !== '#d4af37' || $bg !== '#0a0f19') {
        $custom_css = "
        :root {
            --teal-primary: {$teal} !important;
            --gold-primary: {$gold} !important;
            --bg-dark: {$bg} !important;
        }";
        wp_add_inline_style('latin-party-main-css', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'latin_party_customizer_css', 20);
