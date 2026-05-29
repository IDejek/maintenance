<?php
/**
 * Babarida Maintenance Theme Functions
 *
 * @package Babarida_Maintenance
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ==============================
// Theme Setup
// ==============================
function babarida_maintenance_setup() {
    // Add title tag support
    add_theme_support( 'title-tag' );

    // Add custom logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Load text domain for translation
    load_theme_textdomain( 'babarida-maintenance', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'babarida_maintenance_setup' );

// ==============================
// Enqueue Styles & Scripts
// ==============================
function babarida_maintenance_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'babarida-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap',
        array(),
        null
    );

    // Theme stylesheet
    wp_enqueue_style(
        'babarida-maintenance-style',
        get_stylesheet_uri(),
        array(),
        '1.0.0'
    );

    // Iconify
    wp_enqueue_script(
        'iconify',
        'https://code.iconify.design/3/3.1.0/iconify.min.js',
        array(),
        '3.1.0',
        true
    );

    // Theme JS
    wp_enqueue_script(
        'babarida-maintenance-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'babarida_maintenance_scripts' );

// ==============================
// Disable Unnecessary WP Features (Maintenance Mode)
// ==============================

// Disable RSS feeds
function babarida_disable_feed() {
    wp_die(
        sprintf(
            '<p>%s</p>',
            esc_html__( 'Halaman tidak tersedia saat ini. / Page not available at this time.', 'babarida-maintenance' )
        )
    );
}
add_action( 'do_feed',      'babarida_disable_feed', 1 );
add_action( 'do_feed_rdf',  'babarida_disable_feed', 1 );
add_action( 'do_feed_rss',  'babarida_disable_feed', 1 );
add_action( 'do_feed_rss2', 'babarida_disable_feed', 1 );
add_action( 'do_feed_atom', 'babarida_disable_feed', 1 );

// Remove unnecessary head links
function babarida_clean_head() {
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'rest_output_link_wp_head' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'init', 'babarida_clean_head' );

// Disable admin bar on frontend
add_filter( 'show_admin_bar', '__return_false' );

// ==============================
// Customizer
// ==============================
require get_template_directory() . '/inc/customizer.php';

// ==============================
// Helper: Get theme mod with fallback
// ==============================
function babarida_get( $key, $default = '' ) {
    return get_theme_mod( 'babarida_' . $key, $default );
}
