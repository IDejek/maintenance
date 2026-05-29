<?php
/**
 * Babarida Maintenance Theme Functions
 *
 * @package Babarida_Maintenance
 * @version 1.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ==============================
// Theme Setup
// ==============================
function babarida_maintenance_setup() {
    add_theme_support( 'title-tag' );

    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Text domain — fallback jika folder languages belum ada
    $lang_dir = get_template_directory() . '/languages';
    if ( is_dir( $lang_dir ) ) {
        load_theme_textdomain( 'babarida-maintenance', $lang_dir );
    }
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
        '1.0.1'
    );

    // Iconify
    wp_enqueue_script(
        'iconify',
        'https://code.iconify.design/3/3.1.0/iconify.min.js',
        array(),
        '3.1.0',
        true
    );

    // TIDAK perlu enqueue main.js lagi — 
    // semua JS sudah inline di footer.php
}
add_action( 'wp_enqueue_scripts', 'babarida_maintenance_scripts' );

// ==============================
// Disable Unnecessary WP Features
// ==============================

// Disable RSS feeds — kirim 503 Service Unavailable
function babarida_disable_feed() {
    wp_die(
        '<p>' . esc_html__( 'Sedang dalam perbaikan. / Under maintenance.', 'babarida-maintenance' ) . '</p>',
        '',
        array( 'response' => 503 )
    );
}
add_action( 'do_feed',      'babarida_disable_feed', 1 );
add_action( 'do_feed_rdf',  'babarida_disable_feed', 1 );
add_action( 'do_feed_rss',  'babarida_disable_feed', 1 );
add_action( 'do_feed_rss2', 'babarida_disable_feed', 1 );
add_action( 'do_feed_atom', 'babarida_disable_feed', 1 );

// Clean up <head>
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

// Kirim HTTP 503 header untuk SEO (opsional tapi bagus)
function babarida_503_header() {
    if ( ! is_user_logged_in() && ! is_admin() ) {
        header( 'HTTP/1.1 503 Service Unavailable' );
        header( 'Retry-After: 60' );
    }
}
add_action( 'template_redirect', 'babarida_503_header' );

// ==============================
// Customizer
// ==============================
require get_template_directory() . '/inc/customizer.php';

// ==============================
// Helper
// ==============================
function babarida_get( $key, $default = '' ) {
    return get_theme_mod( 'babarida_' . $key, $default );
}
