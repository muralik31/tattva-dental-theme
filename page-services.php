<?php
/**
 * Template Name: Services Page
 *
 * @package Tattva_Dental
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <h1>Our Services</h1>
        <p>Comprehensive dental care for your entire family. From routine checkups to advanced treatments.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="services-grid">
            <?php
            $services = get_posts(array(
                'post_type'      => 'service',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ));
            
            if ($services) :
                foreach ($services as $service) :
                    $icon = get_post_meta($service->ID, '_service_icon', true) ?: '🦷';
                    $price = get_post_meta($service->ID, '_service_price', true);
            ?>
                <div class="service-card">
                    <?php if (has_post_thumbnail($service->ID)) : ?>
                        <div style="margin: -2rem -2rem 1.5rem -2rem; border-radius: 16px 16px 0 0; overflow: hidden;">
                            <?php echo get_the_post_thumbnail($service->ID, 'service-thumb'); ?>
                        </div>
                    <?php else : ?>
                        <div class="service-icon"><?php echo esc_html($icon); ?></div>
                    <?php endif; ?>
                    
                    <h3><?php echo esc_html($service->post_title); ?></h3>
                    
                    <?php if ($price) : ?>
                        <p style="color: var(--color-primary); font-weight: 600; margin-bottom: 0.5rem;"><?php echo esc_html($price); ?></p>
                    <?php endif; ?>
                    
                    <p><?php echo wp_trim_words($service->post_excerpt ?: $service->post_content, 25); ?></p>
                    
                    <a href="<?php echo get_permalink($service->ID); ?>" class="service-link">
                        Learn More →
                    </a>
                </div>
            <?php
                endforeach;
                wp_reset_postdata();
            else :
                // Default services
                $default_services = array(
                    array('icon' => '🦷', 'title' => 'General Dentistry', 'desc' => 'Comprehensive dental care including cleanings, fillings, extractions, and preventive treatments to maintain your oral health.', 'price' => 'From $75'),
                    array('icon' => '✨', 'title' => 'Teeth Whitening', 'desc' => 'Professional whitening treatments to brighten your smile safely and effectively. Achieve a brighter smile in just one visit.', 'price' => 'From $199'),
                    array('icon' => '🔧', 'title' => 'Dental Implants', 'desc' => 'Permanent tooth replacement solutions that look, feel, and function like natural teeth. Restore your smile with confidence.', 'price' => 'From $1,500'),
                    array('icon' => '😁', 'title' => 'Orthodontics', 'desc' => 'Braces and clear aligners to straighten your teeth and perfect your smile. Options for children and adults.', 'price' => 'From $2,500'),
                    array('icon' => '💎', 'title' => 'Cosmetic Dentistry', 'desc' => 'Veneers, bonding, and complete smile makeovers for a stunning transformation. Enhance your natural beauty.', 'price' => 'From $500'),
                    array('icon' => '🏥', 'title' => 'Emergency Care', 'desc' => 'Urgent dental care when you need it most. Same-day appointments available for dental emergencies.', 'price' => 'Call for pricing'),
                    array('icon' => '👶', 'title' => 'Pediatric Dentistry', 'desc' => 'Gentle, child-friendly dental care to establish healthy habits early. Making dental visits fun for kids.', 'price' => 'From $50'),
                    array('icon' => '🛡️', 'title' => 'Preventive Care', 'desc' => 'Regular checkups, cleanings, and sealants to prevent dental problems before they start.', 'price' => 'From $99'),
                    array('icon' => '😴', 'title' => 'Sedation Dentistry', 'desc' => 'Relaxing options for anxious patients. Multiple sedation levels available for your comfort.', 'price' => 'From $150'),
                );
                
                foreach ($default_services as $service) :
            ?>
                <div class="service-card">
                    <div class="service-icon"><?php echo $service['icon']; ?></div>
                    <h3><?php echo esc_html($service['title']); ?></h3>
                    <p style="color: var(--color-primary); font-weight: 600; margin-bottom: 0.5rem;"><?php echo esc_html($service['price']); ?></p>
                    <p><?php echo esc_html($service['desc']); ?></p>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="service-link">
                        Book Now →
                    </a>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Insurance Section -->
<section class="section section-alt">
    <div class="container text-center">
        <span class="section-subtitle">Payment Options</span>
        <h2 class="section-title">Insurance & Financing</h2>
        <p style="max-width: 700px; margin: 0 auto 2rem;">We accept most major dental insurance plans and offer flexible financing options to make your dental care affordable.</p>
        
        <div style="display: flex; justify-content: center; gap: 2rem; flex-wrap: wrap; margin-top: 2rem;">
            <div style="background: var(--color-white); padding: 1.5rem 2rem; border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
                <h4 style="margin-bottom: 0.5rem;">💳 Insurance Accepted</h4>
                <p style="margin: 0; color: var(--color-gray);">Most major dental insurance plans</p>
            </div>
            <div style="background: var(--color-white); padding: 1.5rem 2rem; border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
                <h4 style="margin-bottom: 0.5rem;">📅 Payment Plans</h4>
                <p style="margin: 0; color: var(--color-gray);">Flexible monthly payment options</p>
            </div>
            <div style="background: var(--color-white); padding: 1.5rem 2rem; border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
                <h4 style="margin-bottom: 0.5rem;">💰 No Insurance?</h4>
                <p style="margin: 0; color: var(--color-gray);">Affordable self-pay rates available</p>
            </div>
        </div>
        
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary" style="margin-top: 2rem;">Contact Us About Pricing</a>
    </div>
</section>

<?php get_footer(); ?>

