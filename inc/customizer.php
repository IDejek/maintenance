<?php
/**
 * Customizer settings for Babarida Maintenance Theme
 *
 * @package Babarida_Maintenance
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function babarida_maintenance_customize_register( $wp_customize ) {

    // ==============================
    // PANEL: Babarida Settings
    // ==============================
    $wp_customize->add_panel( 'babarida_panel', array(
        'title'    => __( 'Babarida Maintenance Settings', 'babarida-maintenance' ),
        'priority' => 10,
    ) );

    // ==============================
    // SECTION: Contact Information
    // ==============================
    $wp_customize->add_section( 'babarida_contact_section', array(
        'title' => __( 'Contact Information', 'babarida-maintenance' ),
        'panel' => 'babarida_panel',
    ) );

    // Email
    $wp_customize->add_setting( 'babarida_email', array(
        'default'           => 'info@babaridadive.com',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_email', array(
        'label'   => __( 'Email Address', 'babarida-maintenance' ),
        'section' => 'babarida_contact_section',
        'type'    => 'email',
    ) );

    // WhatsApp Number
    $wp_customize->add_setting( 'babarida_whatsapp', array(
        'default'           => '6281234567890',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_whatsapp', array(
        'label'       => __( 'WhatsApp Number (with country code, no +)', 'babarida-maintenance' ),
        'section'     => 'babarida_contact_section',
        'type'        => 'text',
        'description' => __( 'Example: 6281234567890', 'babarida-maintenance' ),
    ) );

    // WhatsApp Display
    $wp_customize->add_setting( 'babarida_whatsapp_display', array(
        'default'           => '+62 812-3456-7890',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_whatsapp_display', array(
        'label'   => __( 'WhatsApp Display Text', 'babarida-maintenance' ),
        'section' => 'babarida_contact_section',
        'type'    => 'text',
    ) );

    // Phone Number
    $wp_customize->add_setting( 'babarida_phone', array(
        'default'           => '+62 812-3456-7890',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_phone', array(
        'label'   => __( 'Phone Number (Display)', 'babarida-maintenance' ),
        'section' => 'babarida_contact_section',
        'type'    => 'text',
    ) );

    // Phone Tel Link
    $wp_customize->add_setting( 'babarida_phone_link', array(
        'default'           => '+6281234567890',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_phone_link', array(
        'label'       => __( 'Phone Link (tel: format, no spaces)', 'babarida-maintenance' ),
        'section'     => 'babarida_contact_section',
        'type'        => 'text',
        'description' => __( 'Example: +6281234567890', 'babarida-maintenance' ),
    ) );

    // Location
    $wp_customize->add_setting( 'babarida_location', array(
        'default'           => 'Babarida Dive Center',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_location', array(
        'label'   => __( 'Location Name', 'babarida-maintenance' ),
        'section' => 'babarida_contact_section',
        'type'    => 'text',
    ) );

    // Location Google Maps URL
    $wp_customize->add_setting( 'babarida_maps_url', array(
        'default'           => 'https://maps.google.com/?q=Babarida+Dive+Center',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_maps_url', array(
        'label'   => __( 'Google Maps URL', 'babarida-maintenance' ),
        'section' => 'babarida_contact_section',
        'type'    => 'url',
    ) );

    // ==============================
    // SECTION: Social Media
    // ==============================
    $wp_customize->add_section( 'babarida_social_section', array(
        'title' => __( 'Social Media Links', 'babarida-maintenance' ),
        'panel' => 'babarida_panel',
    ) );

    $socials = array(
        'instagram'  => __( 'Instagram URL', 'babarida-maintenance' ),
        'facebook'   => __( 'Facebook URL', 'babarida-maintenance' ),
        'youtube'    => __( 'YouTube URL', 'babarida-maintenance' ),
        'tiktok'     => __( 'TikTok URL', 'babarida-maintenance' ),
        'tripadvisor'=> __( 'TripAdvisor URL', 'babarida-maintenance' ),
    );

    foreach ( $socials as $key => $label ) {
        $wp_customize->add_setting( 'babarida_' . $key, array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage',
        ) );
        $wp_customize->add_control( 'babarida_' . $key, array(
            'label'   => $label,
            'section' => 'babarida_social_section',
            'type'    => 'url',
        ) );
    }

    // ==============================
    // SECTION: Maintenance Settings
    // ==============================
    $wp_customize->add_section( 'babarida_maintenance_section', array(
        'title' => __( 'Maintenance Settings', 'babarida-maintenance' ),
        'panel' => 'babarida_panel',
    ) );

    // Progress Percentage
    $wp_customize->add_setting( 'babarida_progress', array(
        'default'           => 72,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_progress', array(
        'label'       => __( 'Progress Percentage (0-100)', 'babarida-maintenance' ),
        'section'     => 'babarida_maintenance_section',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 100,
            'step' => 1,
        ),
    ) );

    // Auto Refresh (seconds)
    $wp_customize->add_setting( 'babarida_refresh', array(
        'default'           => 60,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_refresh', array(
        'label'       => __( 'Auto Refresh Interval (seconds, 0 = disable)', 'babarida-maintenance' ),
        'section'     => 'babarida_maintenance_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 600,
            'step' => 10,
        ),
    ) );

    // Show Progress Bar
    $wp_customize->add_setting( 'babarida_show_progress', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_show_progress', array(
        'label'   => __( 'Show Progress Bar', 'babarida-maintenance' ),
        'section' => 'babarida_maintenance_section',
        'type'    => 'checkbox',
    ) );

    // ==============================
    // SECTION: Text Content
    // ==============================
    $wp_customize->add_section( 'babarida_text_section', array(
        'title' => __( 'Text Content', 'babarida-maintenance' ),
        'panel' => 'babarida_panel',
    ) );

    // Site Name
    $wp_customize->add_setting( 'babarida_site_name', array(
        'default'           => 'Babarida Dive Center',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_site_name', array(
        'label'   => __( 'Site Name', 'babarida-maintenance' ),
        'section' => 'babarida_text_section',
        'type'    => 'text',
    ) );

    // Tagline
    $wp_customize->add_setting( 'babarida_tagline', array(
        'default'           => 'Explore The Underwater World',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_tagline', array(
        'label'   => __( 'Tagline', 'babarida-maintenance' ),
        'section' => 'babarida_text_section',
        'type'    => 'text',
    ) );

    // Heading Indonesia
    $wp_customize->add_setting( 'babarida_heading_id', array(
        'default'           => 'Maaf, halaman ini sedang dalam perbaikan',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_heading_id', array(
        'label'   => __( 'Heading (Indonesia)', 'babarida-maintenance' ),
        'section' => 'babarida_text_section',
        'type'    => 'text',
    ) );

    // Heading English
    $wp_customize->add_setting( 'babarida_heading_en', array(
        'default'           => 'Sorry, this page is currently under maintenance',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_heading_en', array(
        'label'   => __( 'Heading (English)', 'babarida-maintenance' ),
        'section' => 'babarida_text_section',
        'type'    => 'text',
    ) );

    // Description Indonesia
    $wp_customize->add_setting( 'babarida_desc_id', array(
        'default'           => 'Coba lagi beberapa saat. Kami sedang memperbaiki dan meningkatkan pengalaman Anda.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_desc_id', array(
        'label'   => __( 'Description (Indonesia)', 'babarida-maintenance' ),
        'section' => 'babarida_text_section',
        'type'    => 'textarea',
    ) );

    // Description English
    $wp_customize->add_setting( 'babarida_desc_en', array(
        'default'           => 'Please try again in a moment. We are currently making improvements to serve you better.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_desc_en', array(
        'label'   => __( 'Description (English)', 'babarida-maintenance' ),
        'section' => 'babarida_text_section',
        'type'    => 'textarea',
    ) );

    // Footer Copyright
    $wp_customize->add_setting( 'babarida_copyright', array(
        'default'           => 'Babarida Dive Center',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'babarida_copyright', array(
        'label'   => __( 'Copyright Name', 'babarida-maintenance' ),
        'section' => 'babarida_text_section',
        'type'    => 'text',
    ) );

}
add_action( 'customize_register', 'babarida_maintenance_customize_register' );
