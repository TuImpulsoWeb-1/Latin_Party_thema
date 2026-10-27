<?php
/**
 * Latin Party Eventos - ACF Field Groups Registration
 * Automatically registers all ACF field groups via PHP so they appear instantly
 * in WordPress admin without requiring manual imports.
 *
 * @package Latin_Party_Eventos
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('acf/init', 'lp_register_acf_field_groups');

function lp_register_acf_field_groups() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // =========================================================================
    // 1. AJUSTES GLOBALES DEL TEMA (OPTIONS PAGE)
    // =========================================================================
    acf_add_local_field_group(array(
        'key' => 'group_lp_theme_options',
        'title' => 'Ajustes Generales - Latin Party Eventos',
        'fields' => array(
            array(
                'key' => 'field_lp_site_logo',
                'label' => 'Logo de la Empresa',
                'name' => 'lp_site_logo',
                'type' => 'image',
                'instructions' => 'Sube el logo oficial (PNG transparente o JPG).',
                'return_format' => 'array',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_lp_primary_phone',
                'label' => 'Teléfono Principal',
                'name' => 'lp_primary_phone',
                'type' => 'text',
                'default_value' => '+57 311 8487785',
            ),
            array(
                'key' => 'field_lp_whatsapp_number',
                'label' => 'Número de WhatsApp (con código de país)',
                'name' => 'lp_whatsapp_number',
                'type' => 'text',
                'default_value' => '573118487785',
                'instructions' => 'Ej: 573118487785 (sin espacios ni símbolos)',
            ),
            array(
                'key' => 'field_lp_whatsapp_link',
                'label' => 'Enlace Directo WhatsApp / wa.link (Opcional)',
                'name' => 'lp_whatsapp_link',
                'type' => 'url',
                'default_value' => 'https://wa.link/p2g3qg',
                'instructions' => 'Si se define, tiene prioridad sobre el número.',
            ),
            array(
                'key' => 'field_lp_contact_email',
                'label' => 'Correo de Contacto',
                'name' => 'lp_contact_email',
                'type' => 'email',
                'default_value' => 'contacto@latinpartyeventos.com',
            ),
            array(
                'key' => 'field_lp_pqr_email',
                'label' => 'Correo PQR',
                'name' => 'lp_pqr_email',
                'type' => 'email',
                'default_value' => 'pqr@latinpartyeventos.com',
            ),
            array(
                'key' => 'field_lp_location',
                'label' => 'Ubicación / Ciudad',
                'name' => 'lp_location',
                'type' => 'text',
                'default_value' => 'Bogotá, Colombia',
            ),
            array(
                'key' => 'field_lp_facebook',
                'label' => 'Enlace de Facebook',
                'name' => 'lp_facebook',
                'type' => 'url',
                'default_value' => 'https://www.facebook.com/share/17BwWKdEBR/',
            ),
            array(
                'key' => 'field_lp_instagram',
                'label' => 'Enlace de Instagram',
                'name' => 'lp_instagram',
                'type' => 'url',
                'default_value' => 'https://www.instagram.com/latinparty?igsh=cWtsYWliY2pod2p5',
            ),
            array(
                'key' => 'field_lp_footer_about',
                'label' => 'Texto Descriptivo del Footer',
                'name' => 'lp_footer_about',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'En Latin Party Eventos nos especializamos en diseñar experiencias memorables que combinan profesionalismo, creatividad y excelencia en cada detalle.',
            ),
            array(
                'key' => 'field_lp_copyright',
                'label' => 'Texto de Copyright',
                'name' => 'lp_copyright',
                'type' => 'text',
                'default_value' => 'Latin Party Eventos. Todos los derechos reservados.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'latin-party-settings',
                ),
            ),
        ),
    ));

    // =========================================================================
    // 2. PÁGINA DE INICIO (HOME / FRONT PAGE)
    // =========================================================================
    acf_add_local_field_group(array(
        'key' => 'group_lp_home_fields',
        'title' => 'Personalización - Página de Inicio',
        'fields' => array(
            // TAB 1: HERO
            array(
                'key' => 'tab_lp_hero',
                'label' => 'Hero Principal',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lp_hero_badge',
                'label' => 'Badge / Etiqueta Superior',
                'name' => 'lp_hero_badge',
                'type' => 'text',
                'default_value' => '⭐ Producción Integral de Eventos',
            ),
            array(
                'key' => 'field_lp_hero_title',
                'label' => 'Título Principal',
                'name' => 'lp_hero_title',
                'type' => 'text',
                'default_value' => 'Vive la fiesta, nosotros la creamos',
            ),
            array(
                'key' => 'field_lp_hero_highlight',
                'label' => 'Subtítulo Destacado (Dorado)',
                'name' => 'lp_hero_highlight',
                'type' => 'text',
                'default_value' => 'Eventos que combinan confianza, estilo y diversión',
            ),
            array(
                'key' => 'field_lp_hero_description',
                'label' => 'Descripción del Hero',
                'name' => 'lp_hero_description',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'En Latin Party Eventos convertimos tus ideas en experiencias únicas. Desde bodas y 15 años hasta eventos corporativos y conciertos, nuestro equipo se encarga de cada detalle.',
            ),
            array(
                'key' => 'field_lp_hero_btn1_text',
                'label' => 'Botón 1 Texto',
                'name' => 'lp_hero_btn1_text',
                'type' => 'text',
                'default_value' => 'Empieza tu evento hoy',
            ),
            array(
                'key' => 'field_lp_hero_btn1_url',
                'label' => 'Botón 1 Enlace',
                'name' => 'lp_hero_btn1_url',
                'type' => 'text',
                'default_value' => '#contacto',
            ),
            array(
                'key' => 'field_lp_hero_btn2_text',
                'label' => 'Botón 2 Texto',
                'name' => 'lp_hero_btn2_text',
                'type' => 'text',
                'default_value' => 'Hablar por WhatsApp',
            ),
            array(
                'key' => 'field_lp_hero_btn2_url',
                'label' => 'Botón 2 Enlace',
                'name' => 'lp_hero_btn2_url',
                'type' => 'text',
                'default_value' => 'https://wa.link/p2g3qg',
            ),
            array(
                'key' => 'field_lp_hero_img1',
                'label' => 'Imagen Hero 1 (Fondo)',
                'name' => 'lp_hero_img1',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_lp_hero_img2',
                'label' => 'Imagen Hero 2 (Fondo)',
                'name' => 'lp_hero_img2',
                'type' => 'image',
                'return_format' => 'array',
            ),

            // TAB 2: ESTADÍSTICAS
            array(
                'key' => 'tab_lp_stats',
                'label' => 'Métricas / Estadísticas',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lp_stat1_num',
                'label' => 'Métrica 1 Número',
                'name' => 'lp_stat1_num',
                'type' => 'text',
                'default_value' => '+15',
            ),
            array(
                'key' => 'field_lp_stat1_lbl',
                'label' => 'Métrica 1 Etiqueta',
                'name' => 'lp_stat1_lbl',
                'type' => 'text',
                'default_value' => 'Años de Experiencia',
            ),
            array(
                'key' => 'field_lp_stat2_num',
                'label' => 'Métrica 2 Número',
                'name' => 'lp_stat2_num',
                'type' => 'text',
                'default_value' => '+1,200',
            ),
            array(
                'key' => 'field_lp_stat2_lbl',
                'label' => 'Métrica 2 Etiqueta',
                'name' => 'lp_stat2_lbl',
                'type' => 'text',
                'default_value' => 'Eventos Exitosos',
            ),
            array(
                'key' => 'field_lp_stat3_num',
                'label' => 'Métrica 3 Número',
                'name' => 'lp_stat3_num',
                'type' => 'text',
                'default_value' => '100%',
            ),
            array(
                'key' => 'field_lp_stat3_lbl',
                'label' => 'Métrica 3 Etiqueta',
                'name' => 'lp_stat3_lbl',
                'type' => 'text',
                'default_value' => 'Satisfacción Garantizada',
            ),
            array(
                'key' => 'field_lp_stat4_num',
                'label' => 'Métrica 4 Número',
                'name' => 'lp_stat4_num',
                'type' => 'text',
                'default_value' => 'PRO',
            ),
            array(
                'key' => 'field_lp_stat4_lbl',
                'label' => 'Métrica 4 Etiqueta',
                'name' => 'lp_stat4_lbl',
                'type' => 'text',
                'default_value' => 'Equipos Propios DMX & LED',
            ),

            // TAB 3: ASESORÍA
            array(
                'key' => 'tab_lp_advisory',
                'label' => 'Banner Asesoría',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lp_adv_title',
                'label' => 'Título de Asesoría',
                'name' => 'lp_adv_title',
                'type' => 'text',
                'default_value' => 'Asesoría Personalizada Sin Costo',
            ),
            array(
                'key' => 'field_lp_adv_desc',
                'label' => 'Descripción de Asesoría',
                'name' => 'lp_adv_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Convierte tu idea en un evento inolvidable. Agenda una sesión gratuita con nuestros expertos y descubre cómo darle vida a tu celebración, sin compromiso.',
            ),
            array(
                'key' => 'field_lp_adv_btn_text',
                'label' => 'Texto Botón Asesoría',
                'name' => 'lp_adv_btn_text',
                'type' => 'text',
                'default_value' => 'Agendar Asesoría Gratuita',
            ),

            // TAB 4: EVENTOS
            array(
                'key' => 'tab_lp_events',
                'label' => 'Tipos de Eventos',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lp_events_title',
                'label' => 'Título Sección Eventos',
                'name' => 'lp_events_title',
                'type' => 'text',
                'default_value' => 'Nuestros Eventos',
            ),
            array(
                'key' => 'field_lp_events_desc',
                'label' => 'Descripción Sección Eventos',
                'name' => 'lp_events_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Cada celebración es única, por eso en Latin Party Eventos diseñamos experiencias a tu medida. Desde cumpleaños y bodas hasta fiestas corporativas y conciertos.',
            ),

            // TAB 5: SERVICIOS
            array(
                'key' => 'tab_lp_services',
                'label' => 'Servicios Destacados',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lp_serv_title',
                'label' => 'Título Sección Servicios',
                'name' => 'lp_serv_title',
                'type' => 'text',
                'default_value' => 'Nuestros Servicios',
            ),

            // TAB 6: PILARES & TESTIMONIOS
            array(
                'key' => 'tab_lp_testimonials',
                'label' => 'Pilares y Testimonios',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lp_testi1_name',
                'label' => 'Testimonio 1 - Cliente',
                'name' => 'lp_testi1_name',
                'type' => 'text',
                'default_value' => 'Laura Torres',
            ),
            array(
                'key' => 'field_lp_testi1_city',
                'label' => 'Testimonio 1 - Ciudad',
                'name' => 'lp_testi1_city',
                'type' => 'text',
                'default_value' => 'Bogotá',
            ),
            array(
                'key' => 'field_lp_testi1_text',
                'label' => 'Testimonio 1 - Comentario',
                'name' => 'lp_testi1_text',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Contratamos a LatinPartyEventos para la celebración de los 15 años de mi hija y fue una experiencia inolvidable. Desde la decoración hasta la música, todo estuvo perfectamente coordinado. La atención fue muy profesional y nuestros invitados quedaron encantados.',
            ),
            array(
                'key' => 'field_lp_testi2_name',
                'label' => 'Testimonio 2 - Cliente',
                'name' => 'lp_testi2_name',
                'type' => 'text',
                'default_value' => 'Carolina Ramírez',
            ),
            array(
                'key' => 'field_lp_testi2_city',
                'label' => 'Testimonio 2 - Ciudad',
                'name' => 'lp_testi2_city',
                'type' => 'text',
                'default_value' => 'Ibagué',
            ),
            array(
                'key' => 'field_lp_testi2_text',
                'label' => 'Testimonio 2 - Comentario',
                'name' => 'lp_testi2_text',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Confiamos en LatinPartyEventos para la fiesta de fin de año de la empresa y superaron todas nuestras expectativas. La organización, la ambientación y la energía que lograron fue espectacular. Sin duda volveremos a trabajar con ellos.',
            ),

            // TAB 7: CTA FINAL
            array(
                'key' => 'tab_lp_final_cta',
                'label' => 'CTA Final',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lp_cta_title',
                'label' => 'Título CTA Final',
                'name' => 'lp_cta_title',
                'type' => 'text',
                'default_value' => '¿Listo para tu evento perfecto?',
            ),
            array(
                'key' => 'field_lp_cta_desc',
                'label' => 'Descripción CTA Final',
                'name' => 'lp_cta_desc',
                'type' => 'text',
                'default_value' => 'Contáctanos hoy y recibe una asesoría personalizada sin costo alguno',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
        ),
    ));

    // =========================================================================
    // 3. PÁGINA SERVICIOS (TEMPLATE: page-servicios.php)
    // =========================================================================
    acf_add_local_field_group(array(
        'key' => 'group_lp_servicios_page',
        'title' => 'Personalización - Página de Servicios',
        'fields' => array(
            array(
                'key' => 'field_lp_serv_page_title',
                'label' => 'Título de la Página',
                'name' => 'lp_serv_page_title',
                'type' => 'text',
                'default_value' => 'Todo lo que necesitas para tu evento en un solo lugar',
            ),
            array(
                'key' => 'field_lp_serv_page_desc',
                'label' => 'Descripción de la Página',
                'name' => 'lp_serv_page_desc',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'En Latin Party Eventos ofrecemos soluciones completas para cada tipo de celebración. Desde sonido profesional e iluminación, hasta la producción integral de conciertos, bodas y eventos corporativos.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-servicios.php',
                ),
            ),
        ),
    ));

    // =========================================================================
    // 4. PÁGINA NOSOTROS (TEMPLATE: page-nosotros.php)
    // =========================================================================
    acf_add_local_field_group(array(
        'key' => 'group_lp_nosotros_page',
        'title' => 'Personalización - Página Nosotros',
        'fields' => array(
            array(
                'key' => 'field_lp_mision_title',
                'label' => 'Título de Misión',
                'name' => 'lp_mision_title',
                'type' => 'text',
                'default_value' => 'Nuestra Misión',
            ),
            array(
                'key' => 'field_lp_mision_text',
                'label' => 'Texto de Misión',
                'name' => 'lp_mision_text',
                'type' => 'textarea',
                'rows' => 4,
                'default_value' => 'Ofrecer alternativas efectivas, eficaces y eficientes, en la creación, diseño, organización y ejecución de eventos sociales y empresariales. Crear un ambiente óptimo con calidad, seriedad y cumplimiento, garantizando una ocasión inolvidable.',
            ),
            array(
                'key' => 'field_lp_vision_title',
                'label' => 'Título de Visión',
                'name' => 'lp_vision_title',
                'type' => 'text',
                'default_value' => 'Nuestra Visión',
            ),
            array(
                'key' => 'field_lp_vision_text',
                'label' => 'Texto de Visión',
                'name' => 'lp_vision_text',
                'type' => 'textarea',
                'rows' => 4,
                'default_value' => 'Queremos que LATIN PARTY EVENTOS sea una empresa líder en organización y producción de eventos sociales y corporativos, con presencia y reconocimiento a nivel nacional, basada en el profesionalismo y la calidad humana de nuestro personal.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-nosotros.php',
                ),
            ),
        ),
    ));

    // =========================================================================
    // 5. PÁGINA CONTACTO (TEMPLATE: page-contacto.php)
    // =========================================================================
    acf_add_local_field_group(array(
        'key' => 'group_lp_contacto_page',
        'title' => 'Personalización - Página de Contacto',
        'fields' => array(
            array(
                'key' => 'field_lp_contact_hero_title',
                'label' => 'Título Cabecera de Contacto',
                'name' => 'lp_contact_hero_title',
                'type' => 'text',
                'default_value' => 'Tu Celebración, Nuestro Legado',
            ),
            array(
                'key' => 'field_lp_contact_hero_desc',
                'label' => 'Descripción Cabecera de Contacto',
                'name' => 'lp_contact_hero_desc',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => '¿Planeando un evento inolvidable? Nuestro equipo está listo para asesorarte y crear la mejor experiencia para ti y tus invitados. Déjanos tus datos y recibe una cotización gratuita en minutos.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-contacto.php',
                ),
            ),
        ),
    ));
}
