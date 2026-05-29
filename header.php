<?php
/**
 * Header template for Babarida Maintenance Theme
 *
 * @package Babarida_Maintenance
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <!-- Ocean Background -->
    <div class="ocean-bg" aria-hidden="true"></div>

    <!-- Light Rays -->
    <div class="light-rays" aria-hidden="true">
        <div class="light-ray"></div>
        <div class="light-ray"></div>
        <div class="light-ray"></div>
        <div class="light-ray"></div>
    </div>

    <!-- Particles -->
    <div class="particles" aria-hidden="true">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Bubbles -->
    <div class="bubbles" aria-hidden="true">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>

    <!-- Waves -->
    <div class="waves-container" aria-hidden="true">
        <div class="wave">
            <svg viewBox="0 0 1440 200" preserveAspectRatio="none">
                <path d="M0,100 C360,180 720,20 1080,100 C1260,140 1380,80 1440,100 L1440,200 L0,200 Z" fill="rgba(0,212,170,0.3)"/>
            </svg>
        </div>
        <div class="wave">
            <svg viewBox="0 0 1440 200" preserveAspectRatio="none">
                <path d="M0,120 C240,60 480,160 720,100 C960,40 1200,140 1440,80 L1440,200 L0,200 Z" fill="rgba(14,165,233,0.3)"/>
            </svg>
        </div>
        <div class="wave">
            <svg viewBox="0 0 1440 200" preserveAspectRatio="none">
                <path d="M0,80 C300,140 600,40 900,120 C1100,160 1300,60 1440,120 L1440,200 L0,200 Z" fill="rgba(20,184,166,0.2)"/>
            </svg>
        </div>
    </div>

    <!-- Watermark -->
    <div class="watermark" aria-hidden="true"><?php echo esc_html( babarida_get( 'site_name', 'BABARIDA' ) ); ?></div>

    <!-- Main Content -->
    <main class="main-wrapper" role="main">
        <div class="content-card">
