<?php
/**
 * Template Name: About Page
 *
 * @package Tattva_Dental
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <h1>About Tattva Dental</h1>
        <p>Where compassionate care meets dental excellence.</p>
    </div>
</div>

<!-- Our Story Section -->
<section class="section">
    <div class="container">
        <div class="about-grid">
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1629909615184-74f495363b67?w=600&h=500&fit=crop" alt="Our dental clinic" />
            </div>
            
            <div class="about-content">
                <span class="section-subtitle">Our Story</span>
                <h2 class="section-title">A Legacy of Dental Excellence</h2>
                <p>Founded with a vision to transform dental care, Tattva Dental Clinic has been serving our community for over 15 years. Our name "Tattva" means "essence" or "truth" in Sanskrit, reflecting our commitment to providing honest, essential dental care.</p>
                <p>We believe that everyone deserves access to quality dental care in a comfortable, welcoming environment. Our team combines advanced technology with a gentle, patient-first approach to make every visit a positive experience.</p>
                
                <div class="hero-stats" style="margin-top: 2rem; justify-content: flex-start;">
                    <div class="stat-item" style="text-align: left;">
                        <span class="stat-number" style="color: var(--color-primary);">15+</span>
                        <span class="stat-label" style="color: var(--color-text);">Years of Excellence</span>
                    </div>
                    <div class="stat-item" style="text-align: left;">
                        <span class="stat-number" style="color: var(--color-primary);">5000+</span>
                        <span class="stat-label" style="color: var(--color-text);">Happy Patients</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Values -->
<section class="section section-alt">
    <div class="container">
        <div class="text-center">
            <span class="section-subtitle">What Drives Us</span>
            <h2 class="section-title">Our Mission & Values</h2>
        </div>
        
        <div class="services-grid" style="margin-top: 2rem;">
            <div class="service-card" style="text-align: center;">
                <div class="service-icon" style="margin: 0 auto 1rem;">🎯</div>
                <h3>Our Mission</h3>
                <p>To provide exceptional dental care that improves our patients' overall health and quality of life, while creating lasting relationships built on trust and compassion.</p>
            </div>
            
            <div class="service-card" style="text-align: center;">
                <div class="service-icon" style="margin: 0 auto 1rem;">💝</div>
                <h3>Patient First</h3>
                <p>Every decision we make puts our patients' comfort, safety, and well-being at the center. Your smile is our passion.</p>
            </div>
            
            <div class="service-card" style="text-align: center;">
                <div class="service-icon" style="margin: 0 auto 1rem;">🏆</div>
                <h3>Excellence</h3>
                <p>We continuously invest in the latest technology and training to ensure you receive the highest standard of dental care.</p>
            </div>
            
            <div class="service-card" style="text-align: center;">
                <div class="service-icon" style="margin: 0 auto 1rem;">🤝</div>
                <h3>Integrity</h3>
                <p>Honest recommendations, transparent pricing, and ethical treatment plans. We treat you like family.</p>
            </div>
        </div>
    </div>
</section>

<!-- Meet Our Team -->
<section class="section">
    <div class="container">
        <div class="text-center">
            <span class="section-subtitle">The Expert</span>
            <h2 class="section-title">Meet Our Doctor</h2>
        </div>
        
        <div style="max-width: 400px; margin: 2rem auto 0;">
            <div class="service-card" style="text-align: center; padding-top: 0; overflow: hidden;">
                <div style="margin: 0 -2rem 1.5rem; height: 300px; overflow: hidden; background: linear-gradient(135deg, var(--color-surface-lighter), var(--color-surface)); display: flex; align-items: center; justify-content: center;">
                    <!-- Placeholder for photo - Replace src with actual photo URL -->
                    <div style="text-align: center; color: var(--color-gray);">
                        <div style="font-size: 4rem; margin-bottom: 0.5rem;">👩‍⚕️</div>
                        <p style="font-size: 0.85rem; margin: 0;">Photo Coming Soon</p>
                    </div>
                </div>
                <h3 style="margin-bottom: 0.25rem;">Dr. Niharika Harsha</h3>
                <p style="color: var(--color-primary); font-weight: 600; margin-bottom: 0.5rem;">Founder & Lead Dentist</p>
                <p style="font-size: 0.9rem;">Dedicated to providing exceptional dental care with a gentle, patient-first approach. Committed to creating healthy, beautiful smiles.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section section-alt">
    <div class="container">
        <div class="about-grid">
            <div class="about-content">
                <span class="section-subtitle">Why Choose Us</span>
                <h2 class="section-title">The Tattva Difference</h2>
                <p>We've created a dental practice that prioritizes your comfort and care above all else.</p>
                
                <div class="feature-list">
                    <div class="feature-item">
                        <div class="feature-icon">🏥</div>
                        <div>
                            <h4>Modern Facility</h4>
                            <p>State-of-the-art equipment in a spa-like, comfortable environment.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">👨‍⚕️</div>
                        <div>
                            <h4>Expert Team</h4>
                            <p>Highly trained specialists with decades of combined experience.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">💳</div>
                        <div>
                            <h4>Flexible Payment</h4>
                            <p>Insurance accepted, financing available, competitive pricing.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">🕐</div>
                        <div>
                            <h4>Convenient Hours</h4>
                            <p>Early morning and weekend appointments to fit your schedule.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?w=600&h=500&fit=crop" alt="Modern dental equipment" />
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

