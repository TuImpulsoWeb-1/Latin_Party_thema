# Tema Oficial WordPress - Latin Party Eventos

Tema premium de WordPress diseñado exclusivamente para **Latin Party Eventos** (https://latinpartyeventos.com). Especializado en producción integral de eventos sociales y corporativos, sonido profesional (Line Array / Convencional), iluminación DMX, pistas LED de baile, tarimas y carpas.

---

## 🚀 Nuevas Mejoras: Edición Rápida en el "Personalizador" (Customizer)

Ahora puedes editar las configuraciones más importantes de manera visual e inmediata desde **Apariencia > Personalizar** en WordPress, además de la edición avanzada por **ACF**.

### ⚙️ Panel "Opciones de Latin Party" en el Personalizador:

1. **🔗 Páginas y Enlaces del Sitio (¡Solución al enlace de Servicios!)**:
   - **Selector de Página de Servicios**: Desplegable donde eliges la página que creaste para Servicios. El tema detecta su enlace exacto (sin importar su nombre o slug) y lo vincula automáticamente al menú y a todos los botones del sitio.
   - **Selector de Página de Nosotros**: Vinculación automática a la página de historia y valores.
   - **Selector de Página de Contacto**: Vinculación directa a la página de cotizaciones.
2. **🔝 Cabecera & Barra Superior**:
   - **Logo del Sitio**: Cárgalo directamente en *Identidad del Sitio* con vista previa en vivo.
   - **Interruptor de Barra Superior**: Muestra u oculta la barra superior de teléfono y correo con un solo clic.
   - **Botón de Cabecera**: Personaliza el texto (por defecto "Cotizar") y decide si abre directamente WhatsApp o la página de Contacto.
3. **📞 Teléfono, Correo & WhatsApp**:
   - Teléfono principal visible y clickeable para llamadas directas.
   - Número de WhatsApp y enlace directo personalizado (`wa.link`).
   - Mensaje predeterminado de saludo para WhatsApp.
   - Correos de contacto y PQR.
   - Ubicación de cobertura.
4. **🌐 Redes Sociales**:
   - Enlaces directos a Facebook, Instagram, TikTok y YouTube.
5. **🔻 Pie de Página (Footer) & Widget Flotante**:
   - Descripción corporativa y texto de copyright.
   - Interruptor para activar/desactivar el botón flotante de WhatsApp.
6. **🎨 Colores del Tema en Tiempo Real**:
   - Selector visual de Color Principal (Cian / Turquesa).
   - Selector visual de Color de Acento (Dorado).
   - Selector visual de Fondo Oscuro.
7. **📋 Gestión de Menús Nativos de WordPress**:
   - Puedes ir a **Apariencia > Menús** (o en el Personalizador > Menús) y crear cualquier menú personalizado asignándolo a la ubicación **"Menú Principal de Cabecera"**.
   - Si no creas ningún menú, el tema utiliza su **menú inteligente automatizado**, que detecta las páginas de Servicios, Nosotros y Contacto creadas y las enlaza con su URL exacta.

---

## 🧩 Edición Avanzada con ACF (Advanced Custom Fields)

Para modificar el contenido interno de cada página (textos del hero, contadores +15 años / +1200 eventos, testimonios de clientes, especificaciones de sonido e iluminación):

- **Latin Party Opciones** en la barra lateral del administrador.
- **Página de Inicio**: Pestañas organizadas para editar Hero, Asesoría, Eventos, Testimonios y CTA.
- **Página de Servicios**: Detalle de configuraciones de audio, iluminación DMX y pistas LED.
- **Página de Nosotros**: Misión, Visión y Valores corporativos.
- **Página de Contacto**: Título, bajada y recepción de cotizaciones.

---

## 📦 Estructura de la Carpeta

Todo el tema está organizado de manera autocontenida en la carpeta **`latin-party-theme`**:

```
latin-party-theme/
├── latin-party-theme.zip      # Archivo ZIP listo para subir a WordPress (4.12 MB)
├── preview.html               # Demostración interactiva ejecutable en navegador
├── style.css                  # Declaración y estilos base
├── functions.php              # Hooks, menús, scripts, AJAX y opciones ACF
├── header.php                 # Cabecera dinámica, barra superior, logo y menú inteligente
├── footer.php                 # Pie de página dinámico, redes y WhatsApp flotante
├── front-page.php             # Portada principal con enlaces dinámicos a servicios
├── page-servicios.php         # Plantilla dedicada para Servicios
├── page-nosotros.php          # Plantilla dedicada para Nosotros
├── page-contacto.php          # Plantilla dedicada para Contacto
├── page.php                   # Plantilla estándar para páginas generales
├── single.php                 # Plantilla para entradas de blog
├── index.php                  # Plantilla de archivo / blog
├── 404.php                    # Página 404 personalizada
├── screenshot.png             # Portada HD para el panel de temas de WordPress
├── acf-export.json            # Exportación unificada de campos ACF
├── acf-json/                  # Auto-sincronización de campos ACF
├── inc/
│   ├── customizer.php         # Controles del Personalizador (Apariencia > Personalizar)
│   ├── template-functions.php # Resolutor dinámico de URLs y enlaces de menú
│   └── acf-fields.php         # Registro nativo PHP de todos los campos ACF
└── assets/
    ├── css/main.css           # Estilos de lujo, glassmorphism y diseño responsivo
    ├── js/main.js             # Lógica de menú móvil, galería, lightbox y formulario
    └── images/                # Biblioteca de fotos reales optimizadas
```

---

## 🛠️ Cómo Instalar y Configurar en 3 Pasos

1. **Subir el Tema**:
   - En WordPress ve a **Apariencia > Temas > Añadir nuevo tema > Subir tema**.
   - Selecciona `latin-party-theme.zip` y haz clic en **Instalar ahora** y luego en **Activar**.

2. **Crear tus Páginas**:
   - Crea una página llamada "Inicio" y asígnale la plantilla **Página de Inicio**.
   - En **Ajustes > Lectura**, define "Tu portada muestra una página estática" y selecciona "Inicio".
   - Crea tus páginas para "Servicios", "Nosotros" y "Contacto", asignando sus plantillas respectivas (`Página de Servicios`, `Página de Nosotros`, `Página de Contacto`).

3. **Personalizar Fácilmente**:
   - Ve a **Apariencia > Personalizar > ⚙️ Opciones de Latin Party**.
   - En **🔗 Páginas y Enlaces del Sitio**, selecciona tu página de Servicios recién creada para que quede vinculada al 100%.
   - Configura tu teléfono, WhatsApp y colores a tu gusto.
