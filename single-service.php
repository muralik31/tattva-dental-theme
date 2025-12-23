<?php
/**
 * Single Service Template
 *
 * @package Tattva_Dental
 */

get_header();

$icon = get_post_meta(get_the_ID(), '_service_icon', true) ?: '🦷';
$price = get_post_meta(get_the_ID(), '_service_price', true);
?>

<div class="page-header">
    <div class="container">
        <div class="breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <span>›</span>
            <a href="<?php echo esc_url(home_url('/services')); ?>">Services</a>
            <span>›</span>
            <span><?php the_title(); ?></span>
        </div>
        <h1><?php the_title(); ?></h1>
        <?php if ($price) : ?>
            <p style="font-size: 1.25rem;"><?php echo esc_html($price); ?></p>
        <?php endif; ?>
    </div>
</div>

<section class="section">
    <div class="container container-narrow">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <article class="single-service">
                <?php if (has_post_thumbnail()) : ?>
                    <div style="margin-bottom: 2rem; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md);">
                        <?php the_post_thumbnail('hero-image'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="service-content" style="font-size: 1.1rem; line-height: 1.8;">
                    <?php the_content(); ?>
                </div>
                
                <!-- Benefits Section -->
                <div style="background: var(--color-off-white); padding: 2rem; border-radius: var(--radius-md); margin: 2rem 0;">
                    <h3 style="display: flex; align-items: center; gap: 0.5rem;">
                        <span style="font-size: 1.5rem;"><?php echo esc_html($icon); ?></span>
                        Why Choose This Treatment?
                    </h3>
                    <ul style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem; margin-top: 1rem;">
                        <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <span style="color: var(--color-success);">✓</span>
                            <span>Expert care from experienced professionals</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <span style="color: var(--color-success);">✓</span>
                            <span>State-of-the-art equipment and techniques</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <span style="color: var(--color-success);">✓</span>
                            <span>Comfortable, patient-focused environment</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <span style="color: var(--color-success);">✓</span>
                            <span>Personalized treatment plans</span>
                        </li>
                    </ul>
                </div>
                
                <!-- CTA -->
                <div style="text-align: center; padding: 2rem; background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark)); border-radius: var(--radius-md); color: var(--color-white);">
                    <h3 style="color: var(--color-white); margin-bottom: 0.5rem;">Ready to Get Started?</h3>
                    <p style="opacity: 0.9; margin-bottom: 1.5rem;">Schedule your consultation today and take the first step towards a healthier smile.</p>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary">Book Appointment</a>
                </div>
            </article>
            
        <?php endwhile; endif; ?>
        
        <!-- Related Services -->
        <?php
        $related_services = get_posts(array(
            'post_type'      => 'service',
            'posts_per_page' => 3,
            'post__not_in'   => array(get_the_ID()),
            'orderby'        => 'rand',
        ));
        
        if ($related_services) :
        ?>
            <div style="margin-top: 4rem;">
                <h2 class="section-title">Other Services You May Like</h2>
                <div class="services-grid">
                    <?php foreach ($related_services as $service) : 
                        $service_icon = get_post_meta($service->ID, '_service_icon', true) ?: '🦷';
                    ?>
                        <div class="service-card">
                            <div class="service-icon"><?php echo esc_html($service_icon); ?></div>
                            <h3><?php echo esc_html($service->post_title); ?></h3>
                            <p><?php echo wp_trim_words($service->post_excerpt ?: $service->post_content, 15); ?></p>
                            <a href="<?php echo get_permalink($service->ID); ?>" class="service-link">
                                Learn More →
                            </a>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

