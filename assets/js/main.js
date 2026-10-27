/**
 * Latin Party Eventos - Theme Scripts
 */

document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    // 1. Header scroll effect
    const header = document.querySelector('.site-header');
    if (header) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 40) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // 2. Mobile Drawer Navigation
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const mobileDrawer = document.querySelector('.mobile-drawer');
    const drawerOverlay = document.querySelector('.mobile-drawer-overlay');
    const drawerClose = document.querySelector('.mobile-drawer-close');
    const drawerLinks = document.querySelectorAll('.mobile-drawer .nav-link');

    function openDrawer() {
        if (mobileDrawer) mobileDrawer.classList.add('active');
        if (drawerOverlay) drawerOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        if (mobileDrawer) mobileDrawer.classList.remove('active');
        if (drawerOverlay) drawerOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (mobileToggle) mobileToggle.addEventListener('click', openDrawer);
    if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
    if (drawerOverlay) drawerOverlay.addEventListener('click', closeDrawer);

    drawerLinks.forEach(function (link) {
        link.addEventListener('click', closeDrawer);
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeDrawer();
            closeLightbox();
        }
    });

    // 3. Hero Background Slider
    const heroSlides = document.querySelectorAll('.hero-slide');
    if (heroSlides.length > 1) {
        let currentSlide = 0;
        setInterval(function () {
            heroSlides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % heroSlides.length;
            heroSlides[currentSlide].classList.add('active');
        }, 5000);
    }

    // 4. Gallery Category Filtering
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');

            galleryItems.forEach(function (item) {
                const category = item.getAttribute('data-category') || '';
                if (filterValue === 'all' || category.includes(filterValue)) {
                    item.style.display = 'block';
                    setTimeout(() => { item.style.opacity = '1'; item.style.transform = 'scale(1)'; }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.9)';
                    setTimeout(() => { item.style.display = 'none'; }, 250);
                }
            });
        });
    });

    // 5. Image Lightbox Modal
    const lightboxModal = document.querySelector('.lightbox-modal');
    const lightboxImg = document.querySelector('.lightbox-img');
    const lightboxCaption = document.querySelector('.lightbox-caption');
    const lightboxCloseBtn = document.querySelector('.lightbox-close');
    const lightboxPrevBtn = document.querySelector('.lightbox-prev');
    const lightboxNextBtn = document.querySelector('.lightbox-next');

    let currentGalleryIndex = 0;
    const galleryItemArray = Array.from(galleryItems);

    function openLightbox(index) {
        if (!lightboxModal || !galleryItemArray[index]) return;
        currentGalleryIndex = index;
        const item = galleryItemArray[index];
        const img = item.querySelector('img');
        const title = item.querySelector('.gallery-overlay-title') ? item.querySelector('.gallery-overlay-title').textContent : '';

        if (img && lightboxImg) {
            lightboxImg.src = img.src;
            if (lightboxCaption) lightboxCaption.textContent = title || img.alt || 'Latin Party Eventos';
            lightboxModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeLightbox() {
        if (lightboxModal) {
            lightboxModal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    function nextLightbox() {
        currentGalleryIndex = (currentGalleryIndex + 1) % galleryItemArray.length;
        openLightbox(currentGalleryIndex);
    }

    function prevLightbox() {
        currentGalleryIndex = (currentGalleryIndex - 1 + galleryItemArray.length) % galleryItemArray.length;
        openLightbox(currentGalleryIndex);
    }

    galleryItems.forEach(function (item, index) {
        item.addEventListener('click', function () {
            openLightbox(index);
        });
    });

    if (lightboxCloseBtn) lightboxCloseBtn.addEventListener('click', closeLightbox);
    if (lightboxNextBtn) lightboxNextBtn.addEventListener('click', nextLightbox);
    if (lightboxPrevBtn) lightboxPrevBtn.addEventListener('click', prevLightbox);

    if (lightboxModal) {
        lightboxModal.addEventListener('click', function (e) {
            if (e.target === lightboxModal) closeLightbox();
        });
    }

    // Lightbox keyboard arrows
    document.addEventListener('keydown', function (e) {
        if (lightboxModal && lightboxModal.classList.contains('active')) {
            if (e.key === 'ArrowRight') nextLightbox();
            if (e.key === 'ArrowLeft') prevLightbox();
        }
    });

    // 6. Interactive Contact / Quotation Form
    const contactForm = document.querySelector('#latin-party-contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const statusMsg = document.querySelector('#form-status-msg');
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn ? submitBtn.innerHTML : 'Enviar Mensaje';

            // Extract data
            const name = contactForm.querySelector('[name="client_name"]')?.value || '';
            const email = contactForm.querySelector('[name="client_email"]')?.value || '';
            const phone = contactForm.querySelector('[name="client_phone"]')?.value || '';
            const eventType = contactForm.querySelector('[name="event_type"]')?.value || 'Evento General';
            const message = contactForm.querySelector('[name="client_message"]')?.value || '';

            if (!name || !phone) {
                if (statusMsg) {
                    statusMsg.className = 'form-status-msg error';
                    statusMsg.textContent = 'Por favor ingresa tu nombre y número de teléfono/WhatsApp.';
                }
                return;
            }

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Enviando...';
            }

            // Check if WordPress ajax is available
            if (typeof latinPartyData !== 'undefined' && latinPartyData.ajax_url) {
                const formData = new FormData(contactForm);
                formData.append('action', 'latin_party_send_contact');
                formData.append('nonce', latinPartyData.nonce);

                fetch(latinPartyData.ajax_url, {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    }
                    if (data.success) {
                        if (statusMsg) {
                            statusMsg.className = 'form-status-msg success';
                            statusMsg.innerHTML = '¡Gracias! Hemos recibido tu solicitud. Te contactaremos en minutos. Redirigiendo a WhatsApp...';
                        }
                        contactForm.reset();
                        // Open WhatsApp with details
                        setTimeout(() => {
                            const waUrl = data.data.whatsapp_url || `https://wa.link/p2g3qg`;
                            window.open(waUrl, '_blank');
                        }, 1200);
                    } else {
                        if (statusMsg) {
                            statusMsg.className = 'form-status-msg error';
                            statusMsg.textContent = data.data.message || 'Error al enviar. Por favor contáctanos directo a WhatsApp.';
                        }
                    }
                })
                .catch(() => {
                    fallbackToWhatsApp();
                });
            } else {
                // Standalone / fallback behavior: direct WhatsApp redirect
                fallbackToWhatsApp();
            }

            function fallbackToWhatsApp() {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
                if (statusMsg) {
                    statusMsg.className = 'form-status-msg success';
                    statusMsg.textContent = '¡Información lista! Abriendo WhatsApp para asesorarte de inmediato...';
                }
                const text = `¡Hola Latin Party Eventos! Mi nombre es ${name}. Me interesa asesoría para: ${eventType}. Teléfono: ${phone}. Email: ${email}. Detalle: ${message}`;
                const waUrl = `https://wa.me/573118487785?text=${encodeURIComponent(text)}`;
                setTimeout(() => {
                    window.open(waUrl, '_blank');
                }, 800);
            }
        });
    }

    // 7. Smooth Scroll for anchors
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
});
