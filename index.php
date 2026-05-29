<?php
/**
 * Main template — Maintenance Page
 *
 * @package Babarida_Maintenance
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Get Customizer values
 $site_name     = babarida_get( 'site_name', 'Babarida Dive Center' );
 $tagline       = babarida_get( 'tagline', 'Explore The Underwater World' );
 $heading_id    = babarida_get( 'heading_id', 'Maaf, halaman ini sedang dalam perbaikan' );
 $heading_en    = babarida_get( 'heading_en', 'Sorry, this page is currently under maintenance' );
 $desc_id       = babarida_get( 'desc_id', 'Coba lagi beberapa saat. Kami sedang memperbaiki dan meningkatkan pengalaman Anda.' );
 $desc_en       = babarida_get( 'desc_en', 'Please try again in a moment. We are currently making improvements to serve you better.' );
 $progress      = min( 100, max( 0, absint( babarida_get( 'progress', 72 ) ) ) );
 $show_progress = babarida_get( 'show_progress', true );

 $email           = babarida_get( 'email', 'info@babaridadive.com' );
 $whatsapp        = babarida_get( 'whatsapp', '6281234567890' );
 $whatsapp_display= babarida_get( 'whatsapp_display', '+62 812-3456-7890' );
 $phone           = babarida_get( 'phone', '+62 812-3456-7890' );
 $phone_link      = babarida_get( 'phone_link', '+6281234567890' );
 $location        = babarida_get( 'location', 'Babarida Dive Center' );
 $maps_url        = babarida_get( 'maps_url', 'https://maps.google.com/?q=Babarida+Dive+Center' );

 $instagram   = babarida_get( 'instagram', '#' );
 $facebook    = babarida_get( 'facebook', '#' );
 $youtube     = babarida_get( 'youtube', '#' );
 $tiktok      = babarida_get( 'tiktok', '#' );
 $tripadvisor = babarida_get( 'tripadvisor', '#' );

 $has_custom_logo = has_custom_logo();
?>

            <!-- Logo -->
            <div class="logo-wrapper">
                <?php if ( $has_custom_logo ) : ?>
                    <div class="site-logo-wrapper">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <div class="logo-icon">
                        <span class="iconify" data-icon="mdi:diving-scuba-flag"></span>
                    </div>
                <?php endif; ?>

                <?php if ( ! $has_custom_logo ) : ?>
                <div class="logo-text"><?php echo esc_html( $site_name ); ?></div>
                <div class="logo-subtext"><?php echo esc_html( $tagline ); ?></div>
                <?php endif; ?>
            </div>

            <!-- Dive Animation -->
            <div class="dive-animation" aria-hidden="true">
                <div class="dive-ring"></div>
                <div class="dive-ring"></div>
                <div class="dive-ring"></div>
                <span class="iconify dive-icon-main" data-icon="mdi:diving-scuba-tank"></span>
            </div>

            <!-- Status Badge -->
            <div class="status-badge">
                <div class="status-dot"></div>
                <span class="status-text">Under Maintenance</span>
            </div>

            <!-- Heading Indonesia -->
            <h1 class="heading-id">
                <?php echo esc_html( $heading_id ); ?>
            </h1>

            <!-- Heading English -->
            <p class="heading-en">
                &ldquo;<?php echo esc_html( $heading_en ); ?>&rdquo;
            </p>

            <!-- Divider -->
            <div class="divider" aria-hidden="true"></div>

            <!-- Description Indonesia -->
            <p class="description-id">
                <?php echo esc_html( $desc_id ); ?>
            </p>

            <!-- Description English -->
            <p class="description-en">
                <?php echo esc_html( $desc_en ); ?>
            </p>

            <?php if ( $show_progress ) : ?>
            <!-- Progress Bar -->
            <div class="progress-section">
                <div class="progress-label">
                    <span><?php esc_html_e( 'Progress', 'babarida-maintenance' ); ?></span>
                    <span class="progress-percent"><?php echo esc_html( $progress ); ?>%</span>
                </div>
                <div class="progress-track">
                    <div class="progress-fill" id="progressFill" data-target="<?php echo esc_attr( $progress ); ?>"></div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Contact Card -->
            <div class="contact-card">
                <div class="contact-card-title">
                    <?php esc_html_e( 'Hubungi Kami / Contact Us', 'babarida-maintenance' ); ?>
                </div>
                <div class="contact-links">

                    <!-- Email -->
                    <a href="mailto:<?php echo esc_attr( $email ); ?>" class="contact-link">
                        <div class="contact-link-icon">
                            <span class="iconify" data-icon="mdi:email-outline"></span>
                        </div>
                        <div class="contact-link-text">
                            <div class="contact-link-label"><?php esc_html_e( 'Email', 'babarida-maintenance' ); ?></div>
                            <div class="contact-link-value"><?php echo esc_html( $email ); ?></div>
                        </div>
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/<?php echo esc_attr( $whatsapp ); ?>" target="_blank" rel="noopener noreferrer" class="contact-link">
                        <div class="contact-link-icon">
                            <span class="iconify" data-icon="mdi:whatsapp"></span>
                        </div>
                        <div class="contact-link-text">
                            <div class="contact-link-label">WhatsApp</div>
                            <div class="contact-link-value"><?php echo esc_html( $whatsapp_display ); ?></div>
                        </div>
                    </a>

                    <!-- Phone -->
                    <a href="tel:<?php echo esc_attr( $phone_link ); ?>" class="contact-link">
                        <div class="contact-link-icon">
                            <span class="iconify" data-icon="mdi:phone-outline"></span>
                        </div>
                        <div class="contact-link-text">
                            <div class="contact-link-label"><?php esc_html_e( 'Phone', 'babarida-maintenance' ); ?></div>
                            <div class="contact-link-value"><?php echo esc_html( $phone ); ?></div>
                        </div>
                    </a>

                    <!-- Location -->
                    <a href="<?php echo esc_url( $maps_url ); ?>" target="_blank" rel="noopener noreferrer" class="contact-link">
                        <div class="contact-link-icon">
                            <span class="iconify" data-icon="mdi:map-marker-outline"></span>
                        </div>
                        <div class="contact-link-text">
                            <div class="contact-link-label"><?php esc_html_e( 'Location', 'babarida-maintenance' ); ?></div>
                            <div class="contact-link-value"><?php echo esc_html( $location ); ?></div>
                        </div>
                    </a>

                </div>
            </div>

            <!-- Social Links -->
            <div class="social-section">
                <div class="social-links">
                    <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Instagram">
                        <span class="iconify" data-icon="mdi:instagram"></span>
                    </a>
                    <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Facebook">
                        <span class="iconify" data-icon="mdi:facebook"></span>
                    </a>
                    <a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="YouTube">
                        <span class="iconify" data-icon="mdi:youtube"></span>
                    </a>
                    <a href="<?php echo esc_url( $tiktok ); ?>" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="TikTok">
                        <span class="iconify" data-icon="ic:baseline-tiktok"></span>
                    </a>
                    <a href="<?php echo esc_url( $tripadvisor ); ?>" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="TripAdvisor">
                        <span class="iconify" data-icon="mdi:star-circle-outline"></span>
                    </a>
                </div>
            </div>

            <!-- Refresh Notice -->
            <?php if ( absint( babarida_get( 'refresh', 60 ) ) > 0 ) : ?>
            <div class="refresh-notice">
                <span class="iconify" data-icon="mdi:refresh"></span>
                <?php esc_html_e( 'Halaman akan memuat otomatis / Page will auto-refresh periodically', 'babarida-maintenance' ); ?>
            </div>
            <?php endif; ?>

<?php get_footer(); ?>
