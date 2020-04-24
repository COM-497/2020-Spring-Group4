<?php
/**
 * The template for displaying all Pages.
 *
 * @package mapro
 */

get_header(); 

mapro_breadcrumbs();
?>

<section id="single-post-detail">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-xs-12">
		    <div class="row">
		     	<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 blog-detail">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

						<?php endwhile; // End of the loop. ?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>