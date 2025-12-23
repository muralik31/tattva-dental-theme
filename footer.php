</main><!-- .site-main -->

<!-- Call to Action Section -->
<section class="cta-section">
    <div class="container">
        <h2>Ready for Your Best Smile?</h2>
        <p>Schedule your appointment today and take the first step towards optimal dental health.</p>
        <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn-secondary">Book Your Appointment</a>
    </div>
</section>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand Column -->
            <div class="footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo footer-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Tattva Dental Clinic" class="site-logo-img" />
                    <?php endif; ?>
                </a>
                <p>Providing exceptional dental care with a gentle touch. Your smile is our passion.</p>
                <div class="footer-social">
                    <?php if (get_theme_mod('tattva_facebook')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('tattva_facebook')); ?>" target="_blank" rel="noopener" aria-label="Facebook">
                            <span>📘</span>
                        </a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('tattva_instagram')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('tattva_instagram')); ?>" target="_blank" rel="noopener" aria-label="Instagram">
                            <span>📷</span>
                        </a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('tattva_twitter')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('tattva_twitter')); ?>" target="_blank" rel="noopener" aria-label="Twitter">
                            <span>🐦</span>
                        </a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('tattva_linkedin')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('tattva_linkedin')); ?>" target="_blank" rel="noopener" aria-label="LinkedIn">
                            <span>💼</span>
                        </a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('tattva_youtube')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('tattva_youtube')); ?>" target="_blank" rel="noopener" aria-label="YouTube">
                            <span>▶️</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="footer-column">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services')); ?>">Services</a></li>
                    <li><a href="<?php echo esc_url(home_url('/gallery')); ?>">Gallery</a></li>
                    <li><a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div class="footer-column">
                <h4>Our Services</h4>
                <ul>
                    <?php
                    $services = get_posts(array(
                        'post_type'      => 'service',
                        'posts_per_page' => 5,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    ));
                    
                    if ($services) :
                        foreach ($services as $service) :
                    ?>
                        <li><a href="<?php echo get_permalink($service->ID); ?>"><?php echo esc_html($service->post_title); ?></a></li>
                    <?php
                        endforeach;
                        wp_reset_postdata();
                    else :
                    ?>
                        <li><a href="#">General Dentistry</a></li>
                        <li><a href="#">Teeth Whitening</a></li>
                        <li><a href="#">Dental Implants</a></li>
                        <li><a href="#">Orthodontics</a></li>
                        <li><a href="#">Cosmetic Dentistry</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="footer-column">
                <h4>Contact Us</h4>
                <ul>
                    <li>
                        <span>📍</span>
                        <?php echo nl2br(esc_html(get_theme_mod('tattva_address', 'Tattva Dental Clinic, Uppal, Hyderabad, Telangana 500039, India'))); ?>
                    </li>
                    <li>
                        <span>📞</span>
                        <a href="tel:<?php echo esc_attr(get_theme_mod('tattva_phone', '+1 (555) 123-4567')); ?>">
                            <?php echo esc_html(get_theme_mod('tattva_phone', '+1 (555) 123-4567')); ?>
                        </a>
                    </li>
                    <li>
                        <span>✉️</span>
                        <a href="mailto:<?php echo esc_attr(get_theme_mod('tattva_email', 'tattvadental.tdc@gmail.com')); ?>">
                            <?php echo esc_html(get_theme_mod('tattva_email', 'tattvadental.tdc@gmail.com')); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            <p>
                <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy Policy</a> | 
                <a href="<?php echo esc_url(home_url('/terms')); ?>">Terms of Service</a>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

