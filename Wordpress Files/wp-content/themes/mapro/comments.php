<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comments">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h5>
			<?php
			$mapro_comment_count = get_comments_number();
			if ( '1' === $mapro_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'mapro' ),
					'<span>' .esc_html(get_the_title() ). '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $mapro_comment_count, 'comments title', 'mapro' ) ),
					number_format_i18n( $mapro_comment_count ),
					'<span>' . esc_html(get_the_title()) . '</span>'
				);
			}
			?>
		</h5><div class="separator left-align"><ul><li></li><li></li><li></li></ul></div><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mapro' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->