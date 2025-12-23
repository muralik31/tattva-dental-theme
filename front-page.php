<?php
/**
 * Front Page Template
 *
 * @package Tattva_Dental
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>
    
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Your Smile, <span>Our Passion</span></h1>
                <p>Experience exceptional dental care at Tattva Dental Clinic. We combine advanced technology with compassionate care to give you the healthy, beautiful smile you deserve.</p>
                
                <div class="hero-buttons">
                    <a href="#contact" class="btn btn-primary">Book Appointment</a>
                    <a href="#services" class="btn btn-secondary">Our Services</a>
                </div>
                
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">15+</span>
                        <span class="stat-label">Years Experience</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">5000+</span>
                        <span class="stat-label">Happy Patients</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">98%</span>
                        <span class="stat-label">Satisfaction Rate</span>
                    </div>
                </div>
            </div>
            
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?w=600&h=500&fit=crop" alt="Modern dental clinic interior" />
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section section-alt" id="services">
    <div class="container">
        <div class="text-center">
            <span class="section-subtitle">What We Offer</span>
            <h2 class="section-title">Our Dental Services</h2>
        </div>
        
        <div class="services-grid">
            <?php
            $services = get_posts(array(
                'post_type'      => 'service',
                'posts_per_page' => 6,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ));
            
            if ($services) :
                foreach ($services as $service) :
                    $icon = get_post_meta($service->ID, '_service_icon', true) ?: '🦷';
            ?>
                <div class="service-card animate-fadeInUp">
                    <div class="service-icon"><?php echo esc_html($icon); ?></div>
                    <h3><?php echo esc_html($service->post_title); ?></h3>
                    <p><?php echo wp_trim_words($service->post_excerpt ?: $service->post_content, 20); ?></p>
                    <a href="<?php echo get_permalink($service->ID); ?>" class="service-link">
                        Learn More →
                    </a>
                </div>
            <?php
                endforeach;
                wp_reset_postdata();
            else :
                // Default services if none exist
                $default_services = array(
                    array('icon' => '🦷', 'title' => 'General Dentistry', 'desc' => 'Comprehensive dental care including cleanings, fillings, and preventive treatments.'),
                    array('icon' => '✨', 'title' => 'Teeth Whitening', 'desc' => 'Professional whitening treatments to brighten your smile safely and effectively.'),
                    array('icon' => '🔧', 'title' => 'Dental Implants', 'desc' => 'Permanent tooth replacement solutions that look and feel like natural teeth.'),
                    array('icon' => '😁', 'title' => 'Orthodontics', 'desc' => 'Braces and clear aligners to straighten your teeth and perfect your smile.'),
                    array('icon' => '💎', 'title' => 'Cosmetic Dentistry', 'desc' => 'Veneers, bonding, and smile makeovers for a stunning transformation.'),
                    array('icon' => '🏥', 'title' => 'Emergency Care', 'desc' => 'Urgent dental care when you need it most. Same-day appointments available.'),
                );
                
                foreach ($default_services as $service) :
            ?>
                <div class="service-card animate-fadeInUp">
                    <div class="service-icon"><?php echo $service['icon']; ?></div>
                    <h3><?php echo esc_html($service['title']); ?></h3>
                    <p><?php echo esc_html($service['desc']); ?></p>
                    <a href="<?php echo esc_url(home_url('/services')); ?>" class="service-link">
                        Learn More →
                    </a>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="section" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?w=600&h=500&fit=crop" alt="Dentist with patient" />
            </div>
            
            <div class="about-content">
                <span class="section-subtitle">Why Choose Us</span>
                <h2 class="section-title">Excellence in Dental Care</h2>
                <p>At Tattva Dental Clinic, we believe everyone deserves a healthy, beautiful smile. Our team of experienced professionals is committed to providing personalized care in a comfortable, modern environment.</p>
                
                <div class="feature-list">
                    <div class="feature-item">
                        <div class="feature-icon">👨‍⚕️</div>
                        <div>
                            <h4>Expert Team</h4>
                            <p>Highly trained dentists with years of experience in various specialties.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">🏆</div>
                        <div>
                            <h4>Advanced Technology</h4>
                            <p>State-of-the-art equipment for precise diagnosis and treatment.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">💝</div>
                        <div>
                            <h4>Patient Comfort</h4>
                            <p>Gentle care in a relaxing environment designed for your comfort.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">🕐</div>
                        <div>
                            <h4>Flexible Scheduling</h4>
                            <p>Convenient appointment times to fit your busy lifestyle.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section testimonials" id="testimonials">
    <div class="container">
        <div class="text-center">
            <span class="section-subtitle">Patient Stories</span>
            <h2 class="section-title">What Our Patients Say</h2>
        </div>
        
        <div class="testimonials-slider">
            <?php
            // Query testimonials from custom post type
            $testimonials_query = new WP_Query(array(
                'post_type'      => 'testimonial',
                'posts_per_page' => 6,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));
            
            if ($testimonials_query->have_posts()) :
                while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                    $patient_name = get_post_meta(get_the_ID(), '_patient_name', true) ?: get_the_title();
                    $patient_title = get_post_meta(get_the_ID(), '_patient_title', true);
                    $rating = get_post_meta(get_the_ID(), '_rating', true) ?: 5;
            ?>
                <div class="testimonial-card">
                    <div class="testimonial-quote">
                        <?php the_content(); ?>
                    </div>
                    <div class="testimonial-author">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('testimonial-avatar', array('class' => 'testimonial-avatar')); ?>
                        <?php else : ?>
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($patient_name); ?>&background=40E0D0&color=000&size=120" alt="<?php echo esc_attr($patient_name); ?>" class="testimonial-avatar" />
                        <?php endif; ?>
                        <div class="testimonial-info">
                            <h4><?php echo esc_html($patient_name); ?></h4>
                            <?php if ($patient_title) : ?>
                                <p><?php echo esc_html($patient_title); ?></p>
                            <?php endif; ?>
                            <div class="testimonial-rating"><?php echo tattva_dental_star_rating($rating); ?></div>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default testimonials if none exist
                $default_testimonials = array(
                    array(
                        'quote' => 'The team at Tattva Dental made me feel so comfortable. I used to be terrified of the dentist, but now I actually look forward to my visits. My smile has never looked better!',
                        'name' => 'Sarah Johnson',
                        'title' => 'Business Owner',
                        'rating' => 5
                    ),
                    array(
                        'quote' => 'Professional, friendly, and thorough. Dr. Niharika explained everything clearly and the results exceeded my expectations. Highly recommend for anyone looking for quality dental care.',
                        'name' => 'Michael Chen',
                        'title' => 'Software Engineer',
                        'rating' => 5
                    ),
                    array(
                        'quote' => 'After my dental implant procedure, I can finally smile with confidence again. The entire process was smooth and the staff was incredibly supportive throughout.',
                        'name' => 'Emily Rodriguez',
                        'title' => 'Teacher',
                        'rating' => 5
                    ),
                );
                
                foreach ($default_testimonials as $testimonial) :
            ?>
                <div class="testimonial-card">
                    <div class="testimonial-quote">
                        <?php echo esc_html($testimonial['quote']); ?>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($testimonial['name']); ?>&background=48CAE4&color=fff&size=120" alt="<?php echo esc_attr($testimonial['name']); ?>" class="testimonial-avatar" />
                        <div class="testimonial-info">
                            <h4><?php echo esc_html($testimonial['name']); ?></h4>
                            <p><?php echo esc_html($testimonial['title']); ?></p>
                            <div class="testimonial-rating"><?php echo tattva_dental_star_rating($testimonial['rating']); ?></div>
                        </div>
                    </div>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Before/After Gallery Section -->
<section class="section section-alt" id="gallery">
    <div class="container">
        <div class="text-center">
            <span class="section-subtitle">Smile Transformations</span>
            <h2 class="section-title">Before & After Gallery</h2>
        </div>
        
        <div class="gallery-grid">
            <?php
            $gallery_items = get_posts(array(
                'post_type'      => 'gallery_item',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));
            
            if ($gallery_items) :
                foreach ($gallery_items as $item) :
                    $before_image = get_post_meta($item->ID, '_before_image', true);
                    $after_image = get_post_meta($item->ID, '_after_image', true);
                    $treatment_type = get_post_meta($item->ID, '_treatment_type', true);
            ?>
                <div class="gallery-item">
                    <div class="comparison-slider" data-before="<?php echo esc_url($before_image); ?>" data-after="<?php echo esc_url($after_image); ?>">
                        <img src="<?php echo esc_url($before_image); ?>" alt="Before treatment" class="before-image" />
                        <img src="<?php echo esc_url($after_image); ?>" alt="After treatment" class="after-image" />
                        <div class="slider-handle"></div>
                    </div>
                    <div class="gallery-item-caption">
                        <h4><?php echo esc_html($item->post_title); ?></h4>
                        <?php if ($treatment_type) : ?>
                            <p><?php echo esc_html($treatment_type); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
                endforeach;
                wp_reset_postdata();
            else :
                // Default gallery items if none exist
                $default_gallery = array(
                    array(
                        'title' => 'Smile Makeover',
                        'treatment' => 'Veneers & Whitening',
                        'before' => 'https://images.unsplash.com/photo-1606811841689-23dfddce3e95?w=400&h=300&fit=crop',
                        'after' => 'https://images.unsplash.com/photo-1601908911868-659e9fb24dc5?w=400&h=300&fit=crop'
                    ),
                    array(
                        'title' => 'Teeth Alignment',
                        'treatment' => 'Invisalign Treatment',
                        'before' => 'https://images.unsplash.com/photo-1595003969096-2232ae64da98?w=400&h=300&fit=crop',
                        'after' => 'https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?w=400&h=300&fit=crop'
                    ),
                    array(
                        'title' => 'Dental Restoration',
                        'treatment' => 'Implants & Crowns',
                        'before' => 'https://images.unsplash.com/photo-1609840114035-3c981b782dfe?w=400&h=300&fit=crop',
                        'after' => 'https://images.unsplash.com/photo-1606265752439-1f18756aa5fc?w=400&h=300&fit=crop'
                    ),
                );
                
                foreach ($default_gallery as $item) :
            ?>
                <div class="gallery-item">
                    <div class="comparison-slider">
                        <img src="<?php echo esc_url($item['before']); ?>" alt="Before treatment" class="before-image" />
                        <img src="<?php echo esc_url($item['after']); ?>" alt="After treatment" class="after-image" />
                        <div class="slider-handle"></div>
                    </div>
                    <div class="gallery-item-caption">
                        <h4><?php echo esc_html($item['title']); ?></h4>
                        <p><?php echo esc_html($item['treatment']); ?></p>
                    </div>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
        
        <div class="text-center" style="margin-top: 2rem;">
            <a href="<?php echo esc_url(home_url('/gallery')); ?>" class="btn btn-outline">View All Transformations</a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section" id="contact">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-form-wrapper">
                <span class="section-subtitle">Get In Touch</span>
                <h2 class="section-title">Book Your Appointment</h2>
                
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
                            <option value="general">General Dentistry</option>
                            <option value="whitening">Teeth Whitening</option>
                            <option value="implants">Dental Implants</option>
                            <option value="orthodontics">Orthodontics</option>
                            <option value="cosmetic">Cosmetic Dentistry</option>
                            <option value="emergency">Emergency Care</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" required placeholder="Tell us about your dental needs..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                    
                    <div id="form-response" style="margin-top: 1rem; text-align: center;"></div>
                </form>
            </div>
            
            <div class="contact-info">
                <div class="contact-info-item">
                    <div class="contact-info-icon">📍</div>
                    <div>
                        <h4>Visit Us</h4>
                        <p><?php echo nl2br(esc_html(get_theme_mod('tattva_address', 'Tattva Dental Clinic, Uppal, Hyderabad, Telangana 500039, India'))); ?></p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="contact-info-icon">📞</div>
                    <div>
                        <h4>Call Us</h4>
                        <p><a href="tel:<?php echo esc_attr(get_theme_mod('tattva_phone', '+1 (555) 123-4567')); ?>"><?php echo esc_html(get_theme_mod('tattva_phone', '+1 (555) 123-4567')); ?></a></p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="contact-info-icon">✉️</div>
                    <div>
                        <h4>Email Us</h4>
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
                
                <div class="contact-info-item">
                    <div class="contact-info-icon">📍</div>
                    <div>
                        <h4>Location</h4>
                        <p><?php echo nl2br(esc_html(get_theme_mod('tattva_address', "Mansoorabad Rd, Anitha Nagar,\nAuto Nagar, Hyderabad,\nTelangana 500068"))); ?></p>
                    </div>
                </div>
                
                <!-- Map -->
                <div class="map-container">
                    <?php 
                    $map_embed = get_theme_mod('tattva_map_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15233.700591586985!2d78.57099830000001!3d17.3432636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9f57017662e9%3A0x6301e74ec0e3f973!2sTATTVA%20DENTAL%20CLINIC!5e0!3m2!1sen!2sin!4v1766475408206!5m2!1sen!2sin');
                    ?>
                    <iframe src="<?php echo esc_url($map_embed); ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <a href="https://www.google.com/maps/place/TATTVA+DENTAL+CLINIC/@17.3271441,78.5547277,15z" target="_blank" class="map-fallback-link" style="display: block; text-align: center; padding: 10px; color: var(--color-primary);">📍 Open in Google Maps</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

