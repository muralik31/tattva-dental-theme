<?php
/**
 * Template Name: Testimonials Page
 *
 * @package Tattva_Dental
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <h1>Patient Testimonials</h1>
        <p>See what our patients have to say about their experience at Tattva Dental Clinic</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="testimonials-page-grid">
            <?php
            // Query all testimonials
            $testimonials_query = new WP_Query(array(
                'post_type'      => 'testimonial',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));
            
            if ($testimonials_query->have_posts()) :
                while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                    $patient_name = get_post_meta(get_the_ID(), '_patient_name', true) ?: get_the_title();
                    $patient_title = get_post_meta(get_the_ID(), '_patient_title', true);
                    $rating = get_post_meta(get_the_ID(), '_rating', true) ?: 5;
                    $treatment = get_post_meta(get_the_ID(), '_treatment_type', true);
            ?>
                <div class="testimonial-card-full">
                    <div class="testimonial-header">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('testimonial-avatar', array('class' => 'testimonial-avatar-large')); ?>
                        <?php else : ?>
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($patient_name); ?>&background=40E0D0&color=000&size=150" alt="<?php echo esc_attr($patient_name); ?>" class="testimonial-avatar-large" />
                        <?php endif; ?>
                        <div class="testimonial-meta">
                            <h3><?php echo esc_html($patient_name); ?></h3>
                            <?php if ($patient_title) : ?>
                                <p class="testimonial-title"><?php echo esc_html($patient_title); ?></p>
                            <?php endif; ?>
                            <?php if ($treatment) : ?>
                                <p class="testimonial-treatment">Treatment: <?php echo esc_html($treatment); ?></p>
                            <?php endif; ?>
                            <div class="testimonial-rating"><?php echo tattva_dental_star_rating($rating); ?></div>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <span class="quote-icon">"</span>
                        <?php the_content(); ?>
                    </div>
                    <div class="testimonial-date">
                        <?php echo get_the_date('F Y'); ?>
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
                        'treatment' => 'Teeth Whitening',
                        'rating' => 5
                    ),
                    array(
                        'quote' => 'Professional, friendly, and thorough. Dr. Niharika explained everything clearly and the results exceeded my expectations. Highly recommend for anyone looking for quality dental care.',
                        'name' => 'Michael Chen',
                        'title' => 'Software Engineer',
                        'treatment' => 'Dental Implants',
                        'rating' => 5
                    ),
                    array(
                        'quote' => 'After my dental implant procedure, I can finally smile with confidence again. The entire process was smooth and the staff was incredibly supportive throughout.',
                        'name' => 'Emily Rodriguez',
                        'title' => 'Teacher',
                        'treatment' => 'Full Mouth Rehabilitation',
                        'rating' => 5
                    ),
                    array(
                        'quote' => 'Best dental experience I have ever had! The clinic is modern, clean, and the staff is so welcoming. Dr. Niharika truly cares about her patients.',
                        'name' => 'Rajesh Kumar',
                        'title' => 'IT Professional',
                        'treatment' => 'Root Canal Treatment',
                        'rating' => 5
                    ),
                    array(
                        'quote' => 'I brought my entire family here and everyone had a great experience. The pediatric care for my kids was exceptional - no tears at all!',
                        'name' => 'Priya Sharma',
                        'title' => 'Homemaker',
                        'treatment' => 'Family Dental Care',
                        'rating' => 5
                    ),
                    array(
                        'quote' => 'My Invisalign journey at Tattva Dental was amazing. The results are incredible and I could not be happier with my new smile!',
                        'name' => 'Ankit Reddy',
                        'title' => 'Marketing Executive',
                        'treatment' => 'Invisalign',
                        'rating' => 5
                    ),
                );
                
                foreach ($default_testimonials as $testimonial) :
            ?>
                <div class="testimonial-card-full">
                    <div class="testimonial-header">
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($testimonial['name']); ?>&background=40E0D0&color=000&size=150" alt="<?php echo esc_attr($testimonial['name']); ?>" class="testimonial-avatar-large" />
                        <div class="testimonial-meta">
                            <h3><?php echo esc_html($testimonial['name']); ?></h3>
                            <p class="testimonial-title"><?php echo esc_html($testimonial['title']); ?></p>
                            <p class="testimonial-treatment">Treatment: <?php echo esc_html($testimonial['treatment']); ?></p>
                            <div class="testimonial-rating"><?php echo tattva_dental_star_rating($testimonial['rating']); ?></div>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <span class="quote-icon">"</span>
                        <?php echo esc_html($testimonial['quote']); ?>
                    </div>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
        
        <!-- CTA -->
        <div class="testimonial-cta" style="text-align: center; margin-top: 3rem; padding: 2rem; background: var(--color-surface-light); border-radius: var(--radius-md);">
            <h3 style="color: var(--color-white); margin-bottom: 0.5rem;">Ready to Experience the Tattva Difference?</h3>
            <p style="color: var(--color-gray); margin-bottom: 1.5rem;">Join our family of happy patients today!</p>
            <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn-primary">Book Your Appointment</a>
        </div>
    </div>
</section>

<style>
.testimonials-page-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
}

.testimonial-card-full {
    background: var(--color-surface-light);
    border-radius: var(--radius-md);
    padding: 2rem;
    border: 1px solid var(--color-surface-lighter);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.testimonial-card-full:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 40px rgba(64, 224, 208, 0.15);
}

.testimonial-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.testimonial-avatar-large {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--color-primary);
}

.testimonial-meta h3 {
    color: var(--color-white);
    margin: 0 0 0.25rem 0;
    font-size: 1.1rem;
}

.testimonial-title {
    color: var(--color-gray);
    font-size: 0.9rem;
    margin: 0 0 0.25rem 0;
}

.testimonial-treatment {
    color: var(--color-primary);
    font-size: 0.85rem;
    margin: 0 0 0.5rem 0;
}

.testimonial-content {
    color: var(--color-text);
    line-height: 1.7;
    position: relative;
    padding-left: 1.5rem;
}

.quote-icon {
    position: absolute;
    left: 0;
    top: -0.5rem;
    font-size: 3rem;
    color: var(--color-primary);
    opacity: 0.3;
    font-family: Georgia, serif;
}

.testimonial-date {
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid var(--color-surface-lighter);
    color: var(--color-gray);
    font-size: 0.85rem;
}

@media (max-width: 768px) {
    .testimonials-page-grid {
        grid-template-columns: 1fr;
    }
    
    .testimonial-header {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<?php get_footer(); ?>

