<?php
/**
 * 404 Error Page — redirects to maintenance page
 *
 * @package Babarida_Maintenance
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Just load the same maintenance page for 404
get_template_part( 'index' );
