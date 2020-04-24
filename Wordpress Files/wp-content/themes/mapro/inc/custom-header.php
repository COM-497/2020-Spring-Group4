<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @package mapro
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses mapro_header_style()
 * @uses mapro_admin_header_image()
 */
function mapro_custom_logo_setup() {
 $defaults = array(
 'height'      => 100,
 'width'       => 400,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'mapro_custom_logo_setup' );