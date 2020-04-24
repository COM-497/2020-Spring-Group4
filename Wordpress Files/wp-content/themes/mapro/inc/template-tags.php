<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mapro
 */

if ( ! function_exists( 'mapro_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function mapro_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html( '%s', 'post date', 'mapro' ),
			'<a href="' . esc_url( get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')) ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<li><i class="fa fa-calendar"></i></i>' . $posted_on . '</li>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'mapro_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function mapro_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html( ' %s', 'post author', 'mapro' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<li itemprop="author" itemscope itemtype="https://schema.org/Person"><i class="fa fa-folder-open"></i> ' . $byline . '</li>'; // WPCS: XSS OK.

	}
endif;


if ( ! function_exists( 'mapro_comment_on' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function mapro_comment_on() {
		// Hide category and tag text for pages.
		

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<li><i class="fa fa-comment"></i><span class="comments-link">';
			comments_popup_link(
				
			);
			echo '</span></li>';
		}
	
	}
endif;



if ( ! function_exists( 'mapro_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function mapro_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'mapro' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html( '%1$s', 'mapro' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'mapro' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'mapro' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'mapro' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'mapro' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;