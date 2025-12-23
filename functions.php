<?php
/**
 * Tattva Dental Clinic Theme Functions
 *
 * @package Tattva_Dental
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function tattva_dental_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'tattva-dental'),
        'footer'  => __('Footer Menu', 'tattva-dental'),
    ));
    
    // Add image sizes
    add_image_size('service-thumb', 400, 300, true);
    add_image_size('testimonial-avatar', 120, 120, true);
    add_image_size('gallery-image', 800, 600, true);
    add_image_size('hero-image', 1200, 800, true);
}
add_action('after_setup_theme', 'tattva_dental_setup');

/**
 * Enqueue Styles and Scripts
 */
function tattva_dental_scripts() {
    // Google Fonts - Modern sans-serif to match logo
    wp_enqueue_style(
        'tattva-dental-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap',
        array(),
        null
    );
    
    // Main stylesheet
    wp_enqueue_style(
        'tattva-dental-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
    
    // Custom scripts
    wp_enqueue_script(
        'tattva-dental-scripts',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );
    
    // Localize script for AJAX
    wp_localize_script('tattva-dental-scripts', 'tattvaAjax', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('tattva_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'tattva_dental_scripts');

/**
 * Register Custom Post Types
 */
function tattva_dental_register_post_types() {
    // Services Post Type
    register_post_type('service', array(
        'labels' => array(
            'name'               => __('Services', 'tattva-dental'),
            'singular_name'      => __('Service', 'tattva-dental'),
            'add_new'            => __('Add New Service', 'tattva-dental'),
            'add_new_item'       => __('Add New Service', 'tattva-dental'),
            'edit_item'          => __('Edit Service', 'tattva-dental'),
            'new_item'           => __('New Service', 'tattva-dental'),
            'view_item'          => __('View Service', 'tattva-dental'),
            'search_items'       => __('Search Services', 'tattva-dental'),
            'not_found'          => __('No services found', 'tattva-dental'),
            'not_found_in_trash' => __('No services found in trash', 'tattva-dental'),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-heart',
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'       => array('slug' => 'services'),
        'show_in_rest'  => true,
    ));
    
    // Testimonials Post Type
    register_post_type('testimonial', array(
        'labels' => array(
            'name'               => __('Testimonials', 'tattva-dental'),
            'singular_name'      => __('Testimonial', 'tattva-dental'),
            'add_new'            => __('Add New Testimonial', 'tattva-dental'),
            'add_new_item'       => __('Add New Testimonial', 'tattva-dental'),
            'edit_item'          => __('Edit Testimonial', 'tattva-dental'),
            'new_item'           => __('New Testimonial', 'tattva-dental'),
            'view_item'          => __('View Testimonial', 'tattva-dental'),
            'search_items'       => __('Search Testimonials', 'tattva-dental'),
            'not_found'          => __('No testimonials found', 'tattva-dental'),
            'not_found_in_trash' => __('No testimonials found in trash', 'tattva-dental'),
        ),
        'public'        => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-format-quote',
        'supports'      => array('title', 'editor', 'thumbnail'),
        'show_in_rest'  => true,
    ));
    
    // Before/After Gallery Post Type
    register_post_type('gallery_item', array(
        'labels' => array(
            'name'               => __('Before/After Gallery', 'tattva-dental'),
            'singular_name'      => __('Gallery Item', 'tattva-dental'),
            'add_new'            => __('Add New Gallery Item', 'tattva-dental'),
            'add_new_item'       => __('Add New Gallery Item', 'tattva-dental'),
            'edit_item'          => __('Edit Gallery Item', 'tattva-dental'),
            'new_item'           => __('New Gallery Item', 'tattva-dental'),
            'view_item'          => __('View Gallery Item', 'tattva-dental'),
            'search_items'       => __('Search Gallery', 'tattva-dental'),
            'not_found'          => __('No gallery items found', 'tattva-dental'),
            'not_found_in_trash' => __('No gallery items found in trash', 'tattva-dental'),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-format-gallery',
        'supports'      => array('title', 'thumbnail'),
        'rewrite'       => array('slug' => 'gallery'),
        'show_in_rest'  => true,
    ));
}
add_action('init', 'tattva_dental_register_post_types');

/**
 * Register Custom Meta Boxes
 */
function tattva_dental_add_meta_boxes() {
    // Testimonial Meta
    add_meta_box(
        'testimonial_details',
        __('Testimonial Details', 'tattva-dental'),
        'tattva_dental_testimonial_meta_callback',
        'testimonial',
        'normal',
        'high'
    );
    
    // Service Meta
    add_meta_box(
        'service_details',
        __('Service Details', 'tattva-dental'),
        'tattva_dental_service_meta_callback',
        'service',
        'normal',
        'high'
    );
    
    // Gallery Meta
    add_meta_box(
        'gallery_details',
        __('Before/After Images', 'tattva-dental'),
        'tattva_dental_gallery_meta_callback',
        'gallery_item',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'tattva_dental_add_meta_boxes');

/**
 * Testimonial Meta Box Callback
 */
function tattva_dental_testimonial_meta_callback($post) {
    wp_nonce_field('tattva_dental_testimonial_nonce', 'testimonial_nonce');
    
    $patient_name = get_post_meta($post->ID, '_patient_name', true);
    $patient_title = get_post_meta($post->ID, '_patient_title', true);
    $rating = get_post_meta($post->ID, '_rating', true);
    ?>
    <p>
        <label for="patient_name"><?php _e('Patient Name:', 'tattva-dental'); ?></label>
        <input type="text" id="patient_name" name="patient_name" value="<?php echo esc_attr($patient_name); ?>" class="widefat">
    </p>
    <p>
        <label for="patient_title"><?php _e('Patient Title (e.g., "Business Owner"):', 'tattva-dental'); ?></label>
        <input type="text" id="patient_title" name="patient_title" value="<?php echo esc_attr($patient_title); ?>" class="widefat">
    </p>
    <p>
        <label for="rating"><?php _e('Rating (1-5):', 'tattva-dental'); ?></label>
        <select id="rating" name="rating">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <option value="<?php echo $i; ?>" <?php selected($rating, $i); ?>><?php echo $i; ?> Stars</option>
            <?php endfor; ?>
        </select>
    </p>
    <?php
}

/**
 * Service Meta Box Callback
 */
function tattva_dental_service_meta_callback($post) {
    wp_nonce_field('tattva_dental_service_nonce', 'service_nonce');
    
    $service_icon = get_post_meta($post->ID, '_service_icon', true);
    $service_price = get_post_meta($post->ID, '_service_price', true);
    ?>
    <p>
        <label for="service_icon"><?php _e('Service Icon (emoji or icon class):', 'tattva-dental'); ?></label>
        <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($service_icon); ?>" class="widefat" placeholder="🦷">
    </p>
    <p>
        <label for="service_price"><?php _e('Starting Price:', 'tattva-dental'); ?></label>
        <input type="text" id="service_price" name="service_price" value="<?php echo esc_attr($service_price); ?>" class="widefat" placeholder="From $99">
    </p>
    <?php
}

/**
 * Gallery Meta Box Callback
 */
function tattva_dental_gallery_meta_callback($post) {
    wp_nonce_field('tattva_dental_gallery_nonce', 'gallery_nonce');
    
    $before_image = get_post_meta($post->ID, '_before_image', true);
    $after_image = get_post_meta($post->ID, '_after_image', true);
    $treatment_type = get_post_meta($post->ID, '_treatment_type', true);
    ?>
    <p>
        <label for="before_image"><?php _e('Before Image URL:', 'tattva-dental'); ?></label>
        <input type="text" id="before_image" name="before_image" value="<?php echo esc_url($before_image); ?>" class="widefat">
        <button type="button" class="button upload-image-btn" data-target="before_image"><?php _e('Upload Image', 'tattva-dental'); ?></button>
    </p>
    <p>
        <label for="after_image"><?php _e('After Image URL:', 'tattva-dental'); ?></label>
        <input type="text" id="after_image" name="after_image" value="<?php echo esc_url($after_image); ?>" class="widefat">
        <button type="button" class="button upload-image-btn" data-target="after_image"><?php _e('Upload Image', 'tattva-dental'); ?></button>
    </p>
    <p>
        <label for="treatment_type"><?php _e('Treatment Type:', 'tattva-dental'); ?></label>
        <input type="text" id="treatment_type" name="treatment_type" value="<?php echo esc_attr($treatment_type); ?>" class="widefat" placeholder="e.g., Teeth Whitening">
    </p>
    
    <script>
    jQuery(document).ready(function($) {
        $('.upload-image-btn').on('click', function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            var mediaUploader = wp.media({
                title: 'Select Image',
                button: { text: 'Use This Image' },
                multiple: false
            });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#' + target).val(attachment.url);
            });
            mediaUploader.open();
        });
    });
    </script>
    <?php
}

/**
 * Save Meta Box Data
 */
function tattva_dental_save_meta($post_id) {
    // Testimonial meta
    if (isset($_POST['testimonial_nonce']) && wp_verify_nonce($_POST['testimonial_nonce'], 'tattva_dental_testimonial_nonce')) {
        if (isset($_POST['patient_name'])) {
            update_post_meta($post_id, '_patient_name', sanitize_text_field($_POST['patient_name']));
        }
        if (isset($_POST['patient_title'])) {
            update_post_meta($post_id, '_patient_title', sanitize_text_field($_POST['patient_title']));
        }
        if (isset($_POST['rating'])) {
            update_post_meta($post_id, '_rating', intval($_POST['rating']));
        }
    }
    
    // Service meta
    if (isset($_POST['service_nonce']) && wp_verify_nonce($_POST['service_nonce'], 'tattva_dental_service_nonce')) {
        if (isset($_POST['service_icon'])) {
            update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
        }
        if (isset($_POST['service_price'])) {
            update_post_meta($post_id, '_service_price', sanitize_text_field($_POST['service_price']));
        }
    }
    
    // Gallery meta
    if (isset($_POST['gallery_nonce']) && wp_verify_nonce($_POST['gallery_nonce'], 'tattva_dental_gallery_nonce')) {
        if (isset($_POST['before_image'])) {
            update_post_meta($post_id, '_before_image', esc_url_raw($_POST['before_image']));
        }
        if (isset($_POST['after_image'])) {
            update_post_meta($post_id, '_after_image', esc_url_raw($_POST['after_image']));
        }
        if (isset($_POST['treatment_type'])) {
            update_post_meta($post_id, '_treatment_type', sanitize_text_field($_POST['treatment_type']));
        }
    }
}
add_action('save_post', 'tattva_dental_save_meta');

/**
 * Enqueue Admin Scripts for Media Uploader
 */
function tattva_dental_admin_scripts($hook) {
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'tattva_dental_admin_scripts');

/**
 * Theme Customizer Settings
 */
function tattva_dental_customize_register($wp_customize) {
    // Contact Information Section
    $wp_customize->add_section('tattva_contact_info', array(
        'title'    => __('Contact Information', 'tattva-dental'),
        'priority' => 30,
    ));
    
    // Phone Number
    $wp_customize->add_setting('tattva_phone', array(
        'default'           => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('tattva_phone', array(
        'label'   => __('Phone Number', 'tattva-dental'),
        'section' => 'tattva_contact_info',
        'type'    => 'text',
    ));
    
    // Email
    $wp_customize->add_setting('tattva_email', array(
        'default'           => 'info@tattvadentalclinic.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('tattva_email', array(
        'label'   => __('Email Address', 'tattva-dental'),
        'section' => 'tattva_contact_info',
        'type'    => 'email',
    ));
    
    // Address
    $wp_customize->add_setting('tattva_address', array(
        'default'           => "Mansoorabad Rd, Anitha Nagar,\nAuto Nagar, Hyderabad,\nTelangana 500068",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('tattva_address', array(
        'label'   => __('Address', 'tattva-dental'),
        'section' => 'tattva_contact_info',
        'type'    => 'textarea',
    ));
    
    // Google Maps Embed URL
    $wp_customize->add_setting('tattva_map_embed', array(
        'default'           => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15233.700591586985!2d78.57099830000001!3d17.3432636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9f57017662e9%3A0x6301e74ec0e3f973!2sTATTVA%20DENTAL%20CLINIC!5e0!3m2!1sen!2sin!4v1766475408206!5m2!1sen!2sin',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('tattva_map_embed', array(
        'label'       => __('Google Maps Embed URL', 'tattva-dental'),
        'description' => __('Paste your Google Maps embed URL here', 'tattva-dental'),
        'section'     => 'tattva_contact_info',
        'type'        => 'url',
    ));
    
    // Office Hours
    $wp_customize->add_setting('tattva_hours', array(
        'default'           => "Mon - Sat: 10:30 AM - 2:30 PM\n& 5:30 PM - 8:00 PM\nSunday: Closed",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('tattva_hours', array(
        'label'   => __('Office Hours', 'tattva-dental'),
        'section' => 'tattva_contact_info',
        'type'    => 'textarea',
    ));
    
    // Social Media Section
    $wp_customize->add_section('tattva_social_media', array(
        'title'    => __('Social Media Links', 'tattva-dental'),
        'priority' => 35,
    ));
    
    $social_platforms = array('facebook', 'instagram', 'twitter', 'linkedin', 'youtube');
    
    foreach ($social_platforms as $platform) {
        $wp_customize->add_setting('tattva_' . $platform, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('tattva_' . $platform, array(
            'label'   => ucfirst($platform) . ' URL',
            'section' => 'tattva_social_media',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'tattva_dental_customize_register');

/**
 * Handle Contact Form Submission
 */
function tattva_dental_contact_form_handler() {
    check_ajax_referer('tattva_nonce', 'nonce');
    
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $service = sanitize_text_field($_POST['service'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array('message' => __('Please fill in all required fields.', 'tattva-dental')));
    }
    
    $to = get_theme_mod('tattva_email', get_option('admin_email'));
    $subject = sprintf(__('New Contact Form Submission from %s', 'tattva-dental'), $name);
    
    $body = sprintf(
        "Name: %s\nEmail: %s\nPhone: %s\nService Interest: %s\n\nMessage:\n%s",
        $name,
        $email,
        $phone,
        $service,
        $message
    );
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email,
    );
    
    $sent = wp_mail($to, $subject, $body, $headers);
    
    if ($sent) {
        wp_send_json_success(array('message' => __('Thank you! Your message has been sent successfully.', 'tattva-dental')));
    } else {
        wp_send_json_error(array('message' => __('Sorry, there was an error sending your message. Please try again.', 'tattva-dental')));
    }
}
add_action('wp_ajax_tattva_contact_form', 'tattva_dental_contact_form_handler');
add_action('wp_ajax_nopriv_tattva_contact_form', 'tattva_dental_contact_form_handler');

/**
 * Helper function to display star rating
 */
function tattva_dental_star_rating($rating = 5) {
    $output = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $output .= '★';
        } else {
            $output .= '☆';
        }
    }
    return $output;
}

/**
 * Flush rewrite rules on theme activation
 */
function tattva_dental_activate() {
    tattva_dental_register_post_types();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'tattva_dental_activate');

