<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
    <!-- Top Bar: Phone & Email -->
    <div class="header-top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-bar-left">
                    <a href="tel:<?php echo esc_attr(get_theme_mod('tattva_phone', '08309164387')); ?>" class="top-bar-item">
                        <span class="top-bar-icon">📞</span>
                        <span><?php echo esc_html(get_theme_mod('tattva_phone', '08309164387')); ?></span>
                    </a>
                </div>
                <div class="top-bar-right">
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('tattva_email', 'info@tattvadentalclinic.com')); ?>" class="top-bar-item">
                        <span class="top-bar-icon">📧</span>
                        <span><?php echo esc_html(get_theme_mod('tattva_email', 'info@tattvadentalclinic.com')); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Header: Logo, Nav, CTA -->
    <div class="header-main">
        <div class="container">
            <div class="header-main-content">
                <!-- Logo + Clinic Name -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-brand">
                    <div class="site-logo">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Tattva Dental Clinic" />
                        <?php endif; ?>
                    </div>
                    <div class="site-identity">
                        <span class="site-name">Tattva Dental Clinic</span>
                        <span class="site-tagline">Your Smile, Our Priority</span>
                    </div>
                </a>
                
                <!-- Navigation -->
                <nav class="main-nav" id="main-nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => '',
                        'fallback_cb'    => 'tattva_dental_fallback_menu',
                    ));
                    ?>
                </nav>
                
                <!-- CTA Button -->
                <div class="header-cta">
                    <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn-primary">Book Appointment</a>
                </div>
                
                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle mobile menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>

<main class="site-main">

<?php
/**
 * Fallback menu if no menu is assigned
 */
function tattva_dental_fallback_menu() {
    $is_front = is_front_page();
    $home = esc_url(home_url('/'));
    
    echo '<ul>';
    echo '<li><a href="' . $home . '">Home</a></li>';
    echo '<li><a href="' . ($is_front ? '#services' : $home . '#services') . '">Services</a></li>';
    echo '<li><a href="' . ($is_front ? '#gallery' : $home . '#gallery') . '">Gallery</a></li>';
    echo '<li><a href="' . ($is_front ? '#testimonials' : $home . '#testimonials') . '">Testimonials</a></li>';
    echo '<li><a href="' . ($is_front ? '#contact' : $home . '#contact') . '">Contact</a></li>';
    echo '</ul>';
}
?>

