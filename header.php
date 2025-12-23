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
    <div class="header-top-bar" style="background:#0D1117; border-bottom:1px solid #21262D; padding:0.5rem 0;">
        <div class="container" style="max-width:1200px; margin:0 auto; padding:0 2rem;">
            <div class="top-bar-content" style="display:flex !important; justify-content:space-between !important; align-items:center !important;">
                <a href="tel:<?php echo esc_attr(get_theme_mod('tattva_phone', '08309164387')); ?>" class="top-bar-item" style="display:inline-flex; align-items:center; gap:0.5rem; color:#8B949E; font-size:0.9rem; text-decoration:none;">
                    <span>📞</span>
                    <span><?php echo esc_html(get_theme_mod('tattva_phone', '08309164387')); ?></span>
                </a>
                <a href="mailto:<?php echo esc_attr(get_theme_mod('tattva_email', 'tattvadental.tdc@gmail.com')); ?>" class="top-bar-item" style="display:inline-flex; align-items:center; gap:0.5rem; color:#8B949E; font-size:0.9rem; text-decoration:none;">
                    <span>📧</span>
                    <span><?php echo esc_html(get_theme_mod('tattva_email', 'tattvadental.tdc@gmail.com')); ?></span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Main Header: Logo, Nav, CTA -->
    <div class="header-main" style="background:rgba(0,0,0,0.95); padding:1rem 0;">
        <div class="container" style="max-width:1200px; margin:0 auto; padding:0 2rem;">
            <div class="header-main-content" style="display:flex !important; align-items:center !important; justify-content:space-between !important; gap:2rem; flex-wrap:nowrap !important;">
                
                <!-- Logo + Clinic Name -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-brand" style="display:flex !important; align-items:center !important; gap:1rem; text-decoration:none; flex-shrink:0;">
                    <div class="site-logo" style="flex-shrink:0;">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Tattva Dental Clinic" style="height:70px; width:auto;" />
                        <?php endif; ?>
                    </div>
                    <div class="site-identity" style="display:flex; flex-direction:column; gap:0.1rem;">
                        <span class="site-name" style="font-size:1.5rem; font-weight:700; color:#fff; line-height:1.2; white-space:nowrap;">Tattva Dental Clinic</span>
                        <span class="site-tagline" style="font-size:0.8rem; color:#40E0D0; white-space:nowrap;">Your Smile, Our Passion</span>
                    </div>
                </a>
                
                <!-- Navigation -->
                <nav class="main-nav" id="main-nav" style="display:flex; align-items:center;">
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
                <div class="header-cta" style="flex-shrink:0;">
                    <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn-primary" style="display:inline-block; padding:0.75rem 1.5rem; background:linear-gradient(135deg,#40E0D0,#2CB5A8); color:#000; font-weight:700; font-size:0.85rem; text-transform:uppercase; letter-spacing:1px; border-radius:50px; text-decoration:none; white-space:nowrap;">Book Appointment</a>
                </div>
                
                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle mobile menu" style="display:none; flex-direction:column; gap:5px; padding:0.5rem; background:none; border:none; cursor:pointer;">
                    <span style="display:block; width:24px; height:2px; background:#fff;"></span>
                    <span style="display:block; width:24px; height:2px; background:#fff;"></span>
                    <span style="display:block; width:24px; height:2px; background:#fff;"></span>
                </button>
            </div>
        </div>
    </div>
</header>

<style>
/* Navigation menu inline fix */
.main-nav ul {
    display: flex !important;
    align-items: center !important;
    gap: 2rem !important;
    list-style: none !important;
    margin: 0 !important;
    padding: 0 !important;
}
.main-nav li {
    margin: 0 !important;
    padding: 0 !important;
}
.main-nav a {
    color: #fff !important;
    text-decoration: none !important;
    font-weight: 500 !important;
    font-size: 0.9rem !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    opacity: 0.9;
    transition: color 0.3s ease, opacity 0.3s ease;
}
.main-nav a:hover {
    color: #40E0D0 !important;
    opacity: 1;
}
/* Custom logo fix */
.site-logo .custom-logo-link {
    display: block !important;
}
.site-logo .custom-logo {
    height: 70px !important;
    width: auto !important;
}
/* Mobile styles */
@media (max-width: 768px) {
    .header-main-content {
        flex-wrap: wrap !important;
        justify-content: center !important;
    }
    .main-nav, .header-cta {
        display: none !important;
    }
    .mobile-menu-toggle {
        display: flex !important;
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
    }
    .site-name {
        font-size: 1.2rem !important;
    }
    .site-logo .custom-logo,
    .site-logo img {
        height: 50px !important;
    }
}
</style>

<main class="site-main">

<?php
/**
 * Fallback menu if no menu is assigned
 */
function tattva_dental_fallback_menu() {
    $is_front = is_front_page();
    $home = esc_url(home_url('/'));
    
    echo '<ul style="display:flex !important; align-items:center; gap:2rem; list-style:none; margin:0; padding:0;">';
    echo '<li><a href="' . $home . '" style="color:#fff; text-decoration:none; font-weight:500; font-size:0.9rem; text-transform:uppercase;">Home</a></li>';
    echo '<li><a href="' . ($is_front ? '#about' : $home . '#about') . '" style="color:#fff; text-decoration:none; font-weight:500; font-size:0.9rem; text-transform:uppercase;">About</a></li>';
    echo '<li><a href="' . ($is_front ? '#services' : $home . '#services') . '" style="color:#fff; text-decoration:none; font-weight:500; font-size:0.9rem; text-transform:uppercase;">Services</a></li>';
    echo '<li><a href="' . ($is_front ? '#gallery' : $home . '#gallery') . '" style="color:#fff; text-decoration:none; font-weight:500; font-size:0.9rem; text-transform:uppercase;">Gallery</a></li>';
    echo '<li><a href="' . ($is_front ? '#testimonials' : $home . '#testimonials') . '" style="color:#fff; text-decoration:none; font-weight:500; font-size:0.9rem; text-transform:uppercase;">Testimonials</a></li>';
    echo '<li><a href="' . ($is_front ? '#contact' : $home . '#contact') . '" style="color:#fff; text-decoration:none; font-weight:500; font-size:0.9rem; text-transform:uppercase;">Contact</a></li>';
    echo '</ul>';
}
?>

