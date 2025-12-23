/**
 * Tattva Dental Clinic - Main JavaScript
 *
 * @package Tattva_Dental
 */

(function() {
    'use strict';

    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        initHeader();
        initMobileMenu();
        initComparisonSliders();
        initContactForm();
        initSmoothScroll();
        initAnimations();
    });

    /**
     * Header scroll effect
     */
    function initHeader() {
        const header = document.getElementById('site-header');
        if (!header) return;

        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        });
    }

    /**
     * Mobile menu toggle
     */
    function initMobileMenu() {
        const toggle = document.getElementById('mobile-menu-toggle');
        const nav = document.getElementById('main-nav');

        if (!toggle || !nav) return;

        function closeMenu() {
            nav.classList.remove('active');
            toggle.classList.remove('active');
            const spans = toggle.querySelectorAll('span');
            spans[0].style.transform = 'none';
            spans[1].style.opacity = '1';
            spans[2].style.transform = 'none';
        }

        function openMenu() {
            nav.classList.add('active');
            toggle.classList.add('active');
            const spans = toggle.querySelectorAll('span');
            spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
            spans[1].style.opacity = '0';
            spans[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
        }

        toggle.addEventListener('click', function() {
            if (nav.classList.contains('active')) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!nav.contains(e.target) && !toggle.contains(e.target)) {
                closeMenu();
            }
        });

        // Close menu when clicking a link
        nav.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                closeMenu();
            });
        });
    }

    /**
     * Before/After comparison sliders
     */
    function initComparisonSliders() {
        const sliders = document.querySelectorAll('.comparison-slider');

        sliders.forEach(function(slider) {
            const handle = slider.querySelector('.slider-handle');
            const afterImage = slider.querySelector('.after-image');

            if (!handle || !afterImage) return;

            let isDragging = false;

            function updateSlider(x) {
                const rect = slider.getBoundingClientRect();
                let percentage = ((x - rect.left) / rect.width) * 100;
                percentage = Math.max(0, Math.min(100, percentage));

                handle.style.left = percentage + '%';
                afterImage.style.clipPath = 'inset(0 ' + (100 - percentage) + '% 0 0)';
            }

            // Mouse events
            handle.addEventListener('mousedown', function(e) {
                isDragging = true;
                e.preventDefault();
            });

            document.addEventListener('mousemove', function(e) {
                if (!isDragging) return;
                updateSlider(e.clientX);
            });

            document.addEventListener('mouseup', function() {
                isDragging = false;
            });

            // Touch events
            handle.addEventListener('touchstart', function(e) {
                isDragging = true;
            });

            document.addEventListener('touchmove', function(e) {
                if (!isDragging) return;
                updateSlider(e.touches[0].clientX);
            });

            document.addEventListener('touchend', function() {
                isDragging = false;
            });

            // Click on slider to move handle
            slider.addEventListener('click', function(e) {
                if (e.target === handle) return;
                updateSlider(e.clientX);
            });
        });
    }

    /**
     * Contact form handling
     */
    function initContactForm() {
        const form = document.getElementById('contact-form');
        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = form.querySelector('button[type="submit"]');
            const responseDiv = document.getElementById('form-response');
            const originalText = submitBtn.innerHTML;

            // Show loading state
            submitBtn.innerHTML = 'Sending...';
            submitBtn.disabled = true;

            // Collect form data
            const formData = new FormData(form);
            formData.append('action', 'tattva_contact_form');
            formData.append('nonce', tattvaAjax.nonce);

            // Send AJAX request
            fetch(tattvaAjax.ajaxUrl, {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    responseDiv.innerHTML = '<p style="color: var(--color-success);">' + data.data.message + '</p>';
                    form.reset();
                } else {
                    responseDiv.innerHTML = '<p style="color: #e74c3c;">' + data.data.message + '</p>';
                }
            })
            .catch(error => {
                responseDiv.innerHTML = '<p style="color: #e74c3c;">An error occurred. Please try again.</p>';
                console.error('Form submission error:', error);
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    /**
     * Smooth scroll for anchor links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (!targetElement) return;

                e.preventDefault();

                const headerHeight = document.getElementById('site-header').offsetHeight;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });

                // Close mobile menu if open
                const nav = document.getElementById('main-nav');
                const toggle = document.getElementById('mobile-menu-toggle');
                if (nav && nav.classList.contains('active')) {
                    nav.classList.remove('active');
                    if (toggle) {
                        toggle.classList.remove('active');
                        const spans = toggle.querySelectorAll('span');
                        spans[0].style.transform = 'none';
                        spans[1].style.opacity = '1';
                        spans[2].style.transform = 'none';
                    }
                }
            });
        });
    }

    /**
     * Scroll-triggered animations
     */
    function initAnimations() {
        const animatedElements = document.querySelectorAll('.animate-fadeInUp, .service-card, .testimonial-card, .gallery-item');

        if (!animatedElements.length) return;

        // Set initial state
        animatedElements.forEach(function(el) {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        });

        // Intersection Observer for scroll animations
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry, index) {
                if (entry.isIntersecting) {
                    // Add staggered delay
                    setTimeout(function() {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);

                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        animatedElements.forEach(function(el) {
            observer.observe(el);
        });
    }

    /**
     * Counter animation for stats
     */
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number');

        counters.forEach(function(counter) {
            const target = parseInt(counter.innerText.replace(/\D/g, ''));
            const suffix = counter.innerText.replace(/[\d]/g, '');
            let count = 0;
            const duration = 2000;
            const increment = target / (duration / 16);

            function updateCount() {
                count += increment;
                if (count < target) {
                    counter.innerText = Math.floor(count) + suffix;
                    requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target + suffix;
                }
            }

            // Start animation when in view
            const observer = new IntersectionObserver(function(entries) {
                if (entries[0].isIntersecting) {
                    updateCount();
                    observer.unobserve(counter);
                }
            });

            observer.observe(counter);
        });
    }

})();

