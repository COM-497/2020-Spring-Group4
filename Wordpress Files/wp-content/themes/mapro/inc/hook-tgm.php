<?php
/**
 * Recommended plugins
 *
 * @package mapro
 */

if ( ! function_exists( 'mapro_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function mapro_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'Elementor', 'mapro' ),
                'slug'     => 'elementor',
                'required' => false,
            ),
			
			 array(
                'name'     => esc_html__( 'Essential Addons for Elementor', 'mapro' ),
                'slug'     => 'essential-addons-for-elementor-lite',
                'required' => false,
            ),
          
             array(
                'name'     => esc_html__( 'WooCommerce', 'mapro' ),
                'slug'     => 'woocommerce',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'mapro_recommended_plugins' );