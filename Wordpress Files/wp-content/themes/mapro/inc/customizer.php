<?php
/**
 * mapro Theme Customizer.
 *
 * @package mapro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mapro_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_control( 'background_color' )->section = 'background_image';
	$wp_customize->get_section( 'colors' )->priority = 25;
    $wp_customize->get_section( 'static_front_page' )->panel = 'mapro_general_settings_panel';
	

	$wp_customize->add_setting('mapro_template_color', array(
	    'default' => '#5bc2ce',
	    'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mapro_template_color', array(
	    'section' => 'colors',
	    'label' => __('Template Color', 'mapro')
	)));

	/*============GENERAL SETTINGS PANEL============*/
	$wp_customize->add_panel(
		'mapro_general_settings_panel',
		array(
			'title' 			=> __( 'General Settings', 'mapro' ),
			'priority'          => 20
		)
	);

	//TITLE AND TAGLINE SETTINGS
	$wp_customize->add_section( 'title_tagline', array(
	     'title'    => __( 'Site Title & Tagline', 'mapro' ),
	     'panel' => '',
	) );

	//HEADER LOGO 
	$wp_customize->add_section( 'header_image', array(
	     'title'    => __( 'Header Logo', 'mapro' ),
	     'panel' => '',
	) );

	//HEADER SETTINGS 
	$wp_customize->add_section(
		'mapro_header_setting_sec',
		array(
			'title'			=> __( 'Header Settings', 'mapro' ),
			'panel'         => 'mapro_general_settings_panel'
		)
	);

	$wp_customize->add_setting(
		'mapro_disable_sticky_header',
		array(
			'default'			=> 0,
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		'mapro_disable_sticky_header',
		array(
			'settings'		=> 'mapro_disable_sticky_header',
			'section'		=> 'mapro_header_setting_sec',
			'label'			=> __( 'Disable Sticky Header', 'mapro' ),
			'type'       	=> 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'mapro_page_header_bg',
		array(
			'default'			=> get_template_directory_uri().'/images/bg.jpg',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'mapro_page_header_bg',
	        array(
	            'label'    => __( 'Page Header Banner', 'mapro' ),
	            'settings' => 'mapro_page_header_bg',
	            'section'  => 'mapro_header_setting_sec',
	            'description'   => __( 'This banner will show in the header of all the inner pages <br/>Recommended Image Size: 1800X400px', 'mapro' )
	        )
	    )
	);

	//BLOG SETTINGS
	$wp_customize->add_section(
		'mapro_blog_sec',
		array(
			'title'			=> __( 'Blog Settings', 'mapro' ),
			'panel'         => 'mapro_general_settings_panel'
		)
	);

	

	//BACKGROUND IMAGE
	$wp_customize->add_section( 'background_image', array(
	     'title'    => __( 'Background Image', 'mapro' ),
	     'panel' => 'mapro_general_settings_panel',
	) );

	/*============HOME SETTINGS PANEL============*/
	$wp_customize->add_panel(
		'mapro_home_settings_panel',
		array(
			'title' 			=> __( 'Home Page Sections', 'mapro' ),
			'priority'          => 30
		)
	);

	/*============SLIDER IMAGES SECTION============*/



	$wp_customize->add_section(
		'mapro_slider_sec',
		array(
			'title'			=> __( 'Banner Section', 'mapro' ),
			'panel'         => 'mapro_home_settings_panel'
		)
	);



	$wp_customize->add_setting(	
		'mapro_enable_slider_sec',
		array(
			'default'			=> 0,
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
			'mapro_enable_slider_sec',
			array(
				'settings'		=> 'mapro_enable_slider_sec',
				'section'		=> 'mapro_slider_sec',
				'label'			=> __( 'Enable Slider Section ', 'mapro' ),
				'type'       	=> 'checkbox',
			)
	);


	$wp_customize->add_setting(
		'mapro_slider_page',
		array(
			'default'			=> '',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		'mapro_slider_page',
		array(
			'settings'		=> 'mapro_slider_page',
			'section'		=> 'mapro_slider_sec',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Select a Page', 'mapro' )
		)
	);
	


$wp_customize->add_setting(
		'mapro_slider_us_btn',
		array(
			'default'			=> __('View More','mapro'),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'mapro_slider_us_btn',
		array(
			'settings'		=> 'mapro_slider_us_btn',
			'section'		=> 'mapro_slider_sec',
			'type'			=> 'text',
			'label'			=> __( 'Slider Button Text', 'mapro' )
		)
	);
	
	/*============About Secion===============*/


	$wp_customize->add_section(
		'mapro_about_sec',
		array(
			'title'			=> __( 'About Us Section', 'mapro' ),
			'panel'         => 'mapro_home_settings_panel'
		)
	);



	$wp_customize->add_setting(
		'mapro_enable_about_sec',
		array(
			'default'			=> 0,
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
			'mapro_enable_about_sec',
			array(
				'settings'		=> 'mapro_enable_about_sec',
				'section'		=> 'mapro_about_sec',
				'label'			=> __( 'Enable About Section ', 'mapro' ),
				'type'       	=> 'checkbox',
			)
	);


	$wp_customize->add_setting(
		'mapro_about_header',
		array(
			'default'			=> '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		new Mapro_Customize_Heading(
			$wp_customize,
			'mapro_about_header',
			array(
				'settings'		=> 'mapro_about_header',
				'section'		=> 'mapro_about_sec',
				'label'			=> __( 'About Page ', 'mapro' )
			)
		)
	);


$wp_customize->add_setting(
		'mapro_about_us_title',
		array(
			'default'			=> __('About Us','mapro'),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'mapro_about_us_title',
		array(
			'settings'		=> 'mapro_about_us_title',
			'section'		=> 'mapro_about_sec',
			'type'			=> 'text',
			'label'			=> __( 'About Us Title', 'mapro' )
		)
	);


	$wp_customize->add_setting(
		'mapro_about_page',
		array(
			'default'			=> '',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		'mapro_about_page',
		array(
			'settings'		=> 'mapro_about_page',
			'section'		=> 'mapro_about_sec',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Select a Page', 'mapro' )
		)
	);





	/*============FEATURED SECTION============*/

	//FEATURED PAGES
$wp_customize->add_section(
		'mapro_services_page_sec',
		array(
			'title'			=> __( 'Services Section', 'mapro' ),
			'panel'         => 'mapro_home_settings_panel'
		)
	);

	$wp_customize->add_setting(
		'mapro_enable_serv_sec',
		array(
			'default'			=> 0,
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
			'mapro_enable_serv_sec',
			array(
				'settings'		=> 'mapro_enable_serv_sec',
				'section'		=> 'mapro_services_page_sec',
				'label'			=> __( 'Enable Services Section ', 'mapro' ),
				'type'       	=> 'checkbox',
			)
	);


$wp_customize->add_setting(
		'mapro_service_title',
		array(
			'default'			=> __('Our Services','mapro'),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'mapro_service_title',
		array(
			'settings'		=> 'mapro_service_title',
			'section'		=> 'mapro_services_page_sec',
			'type'			=> 'text',
			'label'			=> __( 'Services Title', 'mapro' )
		)
	);


$wp_customize->add_setting(
		'mapro_service_subtitle',
		array(
			'default'			=> __('Lorem Ipsum has been the industry standard dummy text ever since the 1500s','mapro'),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'mapro_service_subtitle',
		array(
			'settings'		=> 'mapro_service_subtitle',
			'section'		=> 'mapro_services_page_sec',
			'type'			=> 'text',
			'label'			=> __( 'Services SubTitle', 'mapro' )
		)
	);


	for( $i = 1; $i < 6; $i++ ){

	$wp_customize->add_setting(
		'mapro_services_header'.$i,
		array(
			'default'			=> '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		new Mapro_Customize_Heading(
			$wp_customize,
			'mapro_services_header'.$i,
			array(
				'settings'		=> 'mapro_services_header'.$i,
				'section'		=> 'mapro_services_page_sec',
				'label'			=> __( 'Service Page ', 'mapro' ).$i
			)
		)
	);

	$wp_customize->add_setting(
		'mapro_services_page'.$i,
		array(
			'default'			=> '',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		'mapro_services_page'.$i,
		array(
			'settings'		=> 'mapro_services_page'.$i,
			'section'		=> 'mapro_services_page_sec',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Select a Page', 'mapro' )
		)
	);

	$wp_customize->add_setting(
		'mapro_services_page_icon'.$i,
		array(
			'default'			=> 'fab fa-500px',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		new mapro_Fontawesome_Icon_Chooser(
		$wp_customize,
		'mapro_services_page_icon'.$i,
		array(
			'settings'		=> 'mapro_services_page_icon'.$i,
			'section'		=> 'mapro_services_page_sec',
			'label'			=> __( 'Select a Flaticon from list', 'mapro' ),
			'type'			=> 'icon'
		)
		)
	);
	}

	/*============Blog SECTION============*/

$wp_customize->add_section(
		'mapro_blog_sec2',
		array(
			'title'			=> __( 'Blog Section', 'mapro' ),
			'panel'         => 'mapro_home_settings_panel'
		)
	);

  $wp_customize->add_setting( 'mapro_blog_cat',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => '',
                'sanitize_callback' => 'mapro_sanitize_select',
            )
        );
        $wp_customize->add_control( 'mapro_blog_cat',
            array(
                'label'             => __( 'Blog Category', 'mapro' ),
                'section'           => 'mapro_blog_sec2',
                'settings'          => 'mapro_blog_cat',
                'type'			    => 'select',
                'choices'           => mapro_get_categories_dropdown(),
                'priority'          => 15,
                'active_callback'   => 'mapro_front_blog_option_active_callback'
            )
        );




	/*============Blog SECTION============*/

	
}
add_action( 'customize_register', 'mapro_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function mapro_customizer_script() {
	wp_enqueue_script( 'mapro-customizer-script', get_template_directory_uri() .'/inc/js/customizer-scripts.js', array('jquery'),'09092016', true  );
	wp_enqueue_script( 'mapro-customizer-chosen-script', get_template_directory_uri() .'/inc/js/chosen.jquery.js', array('jquery'),'1.4.1', true  );
	wp_enqueue_style( 'mapro-customizer-chosen-style', get_template_directory_uri() .'/inc/css/chosen.css');
		wp_enqueue_style( 'mapro-customizer-fontawesome', get_template_directory_uri() .'/css/font-awesome.css');
	wp_enqueue_style( 'mapro-customizer-style', get_template_directory_uri() .'/inc/css/customizer-style.css');	
}
add_action( 'customize_controls_enqueue_scripts', 'mapro_customizer_script' );



function mapro_customize_preview_js() {
	wp_enqueue_script( 'mapro-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'mapro_customize_preview_js' );



if( class_exists( 'WP_Customize_Control' ) ):	

class Mapro_Customize_Heading extends WP_Customize_Control {

    public function render_content() {
    	?>

        <?php if ( !empty( $this->label ) ) : ?>
            <h3 class="mapro-accordion-section-title"><?php echo esc_html( $this->label ); ?></h3>
        <?php endif; ?>
    <?php }
}

class Mapro_Dropdown_Chooser extends WP_Customize_Control{
	public function render_content(){
		if ( empty( $this->choices ) )
                return;
		?>
            <label>
                <span class="customize-control-title">
                	<?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <select class="hs-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>
		<?php
	}
}

class Mapro_Fontawesome_Icon_Chooser extends WP_Customize_Control{
	public $type = 'icon';

	public function render_content(){
		?>
            <label>
                <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <div class="mapro-selected-icon">
                	<i class="fa <?php echo esc_attr($this->value()); ?>"></i>
                	<span><i class="fa fa-chevron-down"></i></span>
                </div>

                <ul class="mapro-icon-list clearfix">
                	<?php
                	$mapro_font_awesome_icon_array = mapro_font_awesome_icon_array();
                	foreach ($mapro_font_awesome_icon_array as $mapro_font_awesome_icon) {
							$icon_class = $this->value() == $mapro_font_awesome_icon ? 'icon-active' : '';
							echo '<li class='.esc_attr($icon_class).'><i class="'.esc_attr($mapro_font_awesome_icon).'"></i></li>';
						}
                	?>
                </ul>
                <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
            </label>
		<?php
	}
}


endif;



if( ! function_exists( 'mapro_front_blog_option_active_callback' ) ):

    /**
	 * Check if Blog option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function mapro_front_blog_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'mapro_blog_cat' )->value() ){
            return true;
        } else {
            return false;
        }
    }

endif;




function mapro_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function mapro_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function mapro_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

if ( ! function_exists( 'mapro_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function mapro_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;
?>