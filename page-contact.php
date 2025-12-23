<?php
/**
 * Template Name: Contact Page
 *
 * @package Tattva_Dental
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you. Reach out to schedule an appointment or ask any questions.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-form-wrapper">
                <h2 class="section-title">Send Us a Message</h2>
                
                <form class="contact-form" id="contact-form">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required placeholder="John Doe">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required placeholder="john@example.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="+1 (555) 123-4567">
                    </div>
                    
                    <div class="form-group">
                        <label for="service">Service Interest</label>
                        <select id="service" name="service">
                            <option value="">Select a service...</option>
                            <?php
                            $services = get_posts(array(
                                'post_type'      => 'service',
                                'posts_per_page' => -1,
                                'orderby'        => 'title',
                                'order'          => 'ASC',
                            ));
                            
                            if ($services) :
                                foreach ($services as $service) :
                            ?>
                                <option value="<?php echo esc_attr($service->post_name); ?>"><?php echo esc_html($service->post_title); ?></option>
                            <?php
                                endforeach;
                                wp_reset_postdata();
                            else :
                            ?>
                                <option value="general">General Dentistry</option>
                                <option value="whitening">Teeth Whitening</option>
                                <option value="implants">Dental Implants</option>
                                <option value="orthodontics">Orthodontics</option>
                                <option value="cosmetic">Cosmetic Dentistry</option>
                                <option value="emergency">Emergency Care</option>
                            <?php endif; ?>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="preferred_date">Preferred Date</label>
                        <input type="date" id="preferred_date" name="preferred_date">
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" required placeholder="Tell us about your dental needs or any questions you have..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                    
                    <div id="form-response" style="margin-top: 1rem; text-align: center;"></div>
                </form>
            </div>
            
            <div class="contact-info">
                <h2 class="section-title">Get In Touch</h2>
                
                <div class="contact-info-item">
                    <div class="contact-info-icon">📍</div>
                    <div>
                        <h4>Our Location</h4>
                        <p><?php echo nl2br(esc_html(get_theme_mod('tattva_address', 'Tattva Dental Clinic, Uppal, Hyderabad, Telangana 500039, India'))); ?></p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="contact-info-icon">📞</div>
                    <div>
                        <h4>Phone</h4>
                        <p><a href="tel:<?php echo esc_attr(get_theme_mod('tattva_phone', '+1 (555) 123-4567')); ?>"><?php echo esc_html(get_theme_mod('tattva_phone', '+1 (555) 123-4567')); ?></a></p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="contact-info-icon">✉️</div>
                    <div>
                        <h4>Email</h4>
                        <p><a href="mailto:<?php echo esc_attr(get_theme_mod('tattva_email', 'info@tattvadentalclinic.com')); ?>"><?php echo esc_html(get_theme_mod('tattva_email', 'info@tattvadentalclinic.com')); ?></a></p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="contact-info-icon">🕐</div>
                    <div>
                        <h4>Office Hours</h4>
                        <p><?php echo nl2br(esc_html(get_theme_mod('tattva_hours', "Mon - Sat: 10:30 AM - 2:30 PM\n& 5:30 PM - 8:00 PM\nSunday: Closed"))); ?></p>
                    </div>
                </div>
                
                <!-- Map -->
                <div class="map-container" style="height: 350px;">
                    <?php 
                    $map_embed = get_theme_mod('tattva_map_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15233.700591586985!2d78.57099830000001!3d17.3432636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9f57017662e9%3A0x6301e74ec0e3f973!2sTATTVA%20DENTAL%20CLINIC!5e0!3m2!1sen!2sin!4v1766475408206!5m2!1sen!2sin');
                    ?>
                    <iframe src="<?php echo esc_url($map_embed); ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

