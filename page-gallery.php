<?php
/**
 * Template Name: Gallery Page
 *
 * @package Tattva_Dental
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <h1>Before & After Gallery</h1>
        <p>See the amazing smile transformations we've achieved for our patients.</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="gallery-grid">
            <?php
            $gallery_items = get_posts(array(
                'post_type'      => 'gallery_item',
                'posts_per_page' => -1,
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
                // Default gallery items
                $default_gallery = array(
                    array(
                        'title' => 'Complete Smile Makeover',
                        'treatment' => 'Veneers & Professional Whitening',
                        'before' => 'https://images.unsplash.com/photo-1606811841689-23dfddce3e95?w=500&h=375&fit=crop',
                        'after' => 'https://images.unsplash.com/photo-1601908911868-659e9fb24dc5?w=500&h=375&fit=crop'
                    ),
                    array(
                        'title' => 'Teeth Straightening',
                        'treatment' => 'Invisalign Clear Aligners',
                        'before' => 'https://images.unsplash.com/photo-1595003969096-2232ae64da98?w=500&h=375&fit=crop',
                        'after' => 'https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?w=500&h=375&fit=crop'
                    ),
                    array(
                        'title' => 'Full Dental Restoration',
                        'treatment' => 'Dental Implants & Crowns',
                        'before' => 'https://images.unsplash.com/photo-1609840114035-3c981b782dfe?w=500&h=375&fit=crop',
                        'after' => 'https://images.unsplash.com/photo-1606265752439-1f18756aa5fc?w=500&h=375&fit=crop'
                    ),
                    array(
                        'title' => 'Professional Whitening',
                        'treatment' => 'In-Office Bleaching Treatment',
                        'before' => 'https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?w=500&h=375&fit=crop',
                        'after' => 'https://images.unsplash.com/photo-1606811971618-4486d14f3f99?w=500&h=375&fit=crop'
                    ),
                    array(
                        'title' => 'Porcelain Veneers',
                        'treatment' => 'Custom Veneer Application',
                        'before' => 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?w=500&h=375&fit=crop',
                        'after' => 'https://images.unsplash.com/photo-1629909615184-74f495363b67?w=500&h=375&fit=crop'
                    ),
                    array(
                        'title' => 'Gum Contouring',
                        'treatment' => 'Laser Gum Reshaping',
                        'before' => 'https://images.unsplash.com/photo-1588776814546-daab30f310ce?w=500&h=375&fit=crop',
                        'after' => 'https://images.unsplash.com/photo-1601908912840-057be52cb2a5?w=500&h=375&fit=crop'
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
        
        <div class="text-center" style="margin-top: 3rem;">
            <p style="font-size: 0.9rem; color: var(--color-gray); margin-bottom: 1rem;">
                <strong>Note:</strong> Results may vary. All photos are of actual patients who consented to share their transformations.
            </p>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section section-alt">
    <div class="container text-center">
        <h2>Ready for Your Transformation?</h2>
        <p style="max-width: 600px; margin: 0 auto 2rem;">Schedule a consultation to discuss how we can help you achieve your dream smile.</p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">Book Your Consultation</a>
    </div>
</section>

<?php get_footer(); ?>

