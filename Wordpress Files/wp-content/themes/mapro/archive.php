<?php
/**
 * The template for displaying archive pages.
 *
 * @package mapro
 */

get_header();
mapro_breadcrumbs();
 ?>

<section id="blog-with-sidebar">
	<div class="container">
	 	<div class="col-lg-12 col-md-12 col-xs-12">
	   		<div class="row">
	     		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 posts">

					<?php if ( have_posts() ) : ?>
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );
						?>
					<?php endwhile; ?>
					<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>

 				</div>
				<?php get_sidebar(); ?>
			</div>
			<?php the_posts_pagination(); ?>
		</div>
    </div>
</section>
<?php get_footer(); ?>