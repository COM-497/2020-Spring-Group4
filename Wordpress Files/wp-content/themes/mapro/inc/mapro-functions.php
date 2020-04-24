<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mapro
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mapro_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	
	return $classes;
}
add_filter( 'body_class', 'mapro_body_classes' );

add_filter( 'get_custom_logo', 'mapro_remove_itemprop' );

function mapro_remove_itemprop(){
	$custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
            esc_url( home_url( '/' ) ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
    return $html; 
}



if( ! function_exists( 'mapro_get_categories_dropdown' ) ):

	/**
	 * get default categories
	 * 
	 * @since 1.0.0
	 * 
	 * @return array options array
	 */
	function mapro_get_categories_dropdown() {
		$mapro_cat_args = array(
			'orderby' 	=> 'name',
			'parent' 	=> 0
		);
		$mapro_get_raw_cats = get_categories( $mapro_cat_args );
		$mapro_get_cat_list = array();
		$mapro_get_cat_list[''] = esc_html__( 'Select Category', 'mapro' );
		foreach ( $mapro_get_raw_cats as $cat ) {
			$mapro_get_cat_list[esc_attr( $cat->slug )] = esc_html( $cat->name );
		}
		return $mapro_get_cat_list;
	}

endif;

function mapro_css_strip_whitespace($css){
	  $replace = array(
	    "#/\*.*?\*/#s" => "",  // Strip C style comments.
	    "#\s\s+#"      => " ", // Strip excess whitespace.
	  );
	  $search = array_keys($replace);
	  $css = preg_replace($search, $replace, $css);

	  $replace = array(
	    ": "  => ":",
	    "; "  => ";",
	    " {"  => "{",
	    " }"  => "}",
	    ", "  => ",",
	    "{ "  => "{",
	    ";}"  => "}", // Strip optional semicolons.
	    ",\n" => ",", // Don't wrap multiple selectors.
	    "\n}" => "}", // Don't wrap closing braces.
	    "} "  => "}\n", // Put each rule on it's own line.
	  );
	  $search = array_keys($replace);
	  $css = str_replace($search, $replace, $css);

	  return trim($css);
}

//Register widget area.
function mapro_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'mapro' ),
		'id'            => 'mapro-right-sidebar',
		'description'   => '',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar_heading"><h5>',
		'after_title'   => '</h5><div class="separator left-align "><ul><li></li><li></li><li></li></ul></div></div>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'mapro' ),
		'id'            => 'mapro-footer-one',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'mapro' ),
		'id'            => 'mapro-footer-two',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'mapro' ),
		'id'            => 'mapro-footer-three',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 4', 'mapro' ),
		'id'            => 'mapro-footer-four',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

}
add_action( 'widgets_init', 'mapro_widgets_init' );

function mapro_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}


if(!function_exists('mapro_font_awesome_icon_array')){
	function mapro_font_awesome_icon_array(){
		return array("fab fa-500px","fa fa-music","fa fa-search","fa fa-heart","fa fa-star","fa fa-film","fa fa-th-large","fa fa-th","fa fa-th-list","fa fa-check","fa fa-times","fa fa-search-plus","fa fa-search-minus","fa fa-power-off","fa fa-signal","fa fa-cog","fa fa-home","fa fa-road","fa fa-download","fa fa-inbox","fa fa-list-alt","fa fa-lock","fa fa-flag","fa fa-headphones","fa fa-volume-off","fa fa-volume-down","fa fa-volume-up","fa fa-qrcode","fa fa-barcode","fa fa-tag","fa fa-tags","fa fa-book","fa fa-bookmark","fa fa-print","fa fa-camera","fa fa-font","fa fa-bold","fa fa-italic","fa fa-text-height","fa fa-text-width","fa fa-align-left","fa fa-align-center","fa fa-align-right","fa fa-align-justify","fa fa-list","fa fa-outdent","fa fa-indent","fa fa-map-marker","fa fa-adjust","fa fa-step-backward","fa fa-fast-backward","fa fa-backward","fa fa-play","fa fa-pause","fa fa-stop","fa fa-forward","fa fa-fast-forward","fa fa-step-forward","fa fa-eject","fa fa-chevron-left","fa fa-chevron-right","fa fa-plus-circle","fa fa-minus-circle","fa fa-times-circle","fa fa-check-circle","fa fa-question-circle","fa fa-info-circle","fa fa-crosshairs","fa fa-ban","fa fa-arrow-left","fa fa-arrow-right","fa fa-arrow-up","fa fa-arrow-down","fa fa-expand","fa fa-compress","fa fa-plus","fa fa-minus","fa fa-asterisk","fa fa-exclamation-circle","fa fa-gift","fa fa-leaf","fa fa-fire","fa fa-eye","fa fa-eye-slash","fa fa-exclamation-triangle","fa fa-plane","fa fa-calendar","fa fa-random","fa fa-comment","fa fa-magnet","fa fa-chevron-up","fa fa-chevron-down","fa fa-retweet","fa fa-shopping-cart","fa fa-folder","fa fa-folder-open","fa fa-camera-retro","fa fa-key","fa fa-cogs","fa fa-comments","fa fa-star-half","fa fa-trophy","fa fa-upload","fa fa-phone","fa fa-phone-square","fa fa-unlock","fa fa-credit-card","fa fa-rss","fa fa-bullhorn","fa fa-bell","fa fa-certificate","fa fa-arrow-circle-left","fa fa-arrow-circle-right","fa fa-arrow-circle-up","fa fa-arrow-circle-down","fa fa-globe","fa fa-users","fa fa-link","fa fa-cloud","fa fa-flask","fa fa-cut","fa fa-paperclip","fa fa-save","fa fa-square","fa fa-bars","fa fa-list-ul","fa fa-list-ol","fa fa-strikethrough","fa fa-underline","fa fa-table","fa fa-magic","fa fa-truck","fa fa-caret-down","fa fa-caret-right","fa fa-sort","fa fa-sort-down","fa fa-sort-up","fa fa-envelope","fa fa-bolt","fa fa-sitemap","fa fa-umbrella","fa fa-paste","fa fa-clipboard","fa fa-user-md","fa fa-stethoscope","fa fa-suitcase","fa fa-coffee","fa fa-ambulance","fa fa-medkit","fa fa-fighter-jet","fa fa-beer","fa fa-h-square","fa fa-plus-square","fa fa-angle-double-left","fa fa-angle-double-right","fa fa-angle-double-up","fa fa-angle-double-down","fa fa-angle-left","fa fa-angle-right","fa fa-angle-up","fa fa-angle-down","fa fa-desktop","fa fa-laptop","fa fa-tablet","fa fa-mobile","fa fa-quote-left","fa fa-quote-right","fa fa-spinner","fa fa-circle","fa fa-terminal","fa fa-code","fa fa-reply-all","fa fa-location-arrow","fa fa-crop","fa fa-unlink","fa fa-question","fa fa-info","fa fa-exclamation","fa fa-superscript","fa fa-subscript","fa fa-eraser","fa fa-puzzle-piece","fa fa-microphone","fa fa-microphone-slash","fa fa-rocket","fa fa-chevron-circle-left","fa fa-chevron-circle-right","fa fa-chevron-circle-up","fa fa-chevron-circle-down","fa fa-anchor","fa fa-unlock-alt","fa fa-bullseye","fa fa-ellipsis-h","fa fa-ellipsis-v","fa fa-rss-square","fa fa-play-circle","fa fa-minus-square","fa fa-file","fa fa-female","fa fa-male","fa fa-archive","fa fa-bug","fa fa-wheelchair","fa fa-space-shuttle","fa fa-envelope-square","fa fa-university","fa fa-graduation-cap","fa fa-language","fa fa-fax","fa fa-building","fa fa-child","fa fa-paw");
	}
}




function mapro_blogtag() {
$tags_list = get_the_tag_list( 'Tags ', __( ' ', 'mapro' ) );

	if ( $tags_list ) {
		printf( '<ul><li>%s</li></ul>', $tags_list );
	};
}