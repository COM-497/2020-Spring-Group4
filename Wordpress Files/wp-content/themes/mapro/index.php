<?php
/**
 * The main template file.
 *
 * @package mapro
 */

get_header();

 ?>

<section id="inner-banner">
  <div class="container">
    <div class="row">
      <div class="inner-heading">
         <?php if (is_home() || is_front_page()) { ?>
	      <h2><?php echo esc_html__('Home', 'mapro') ?></h2>
	      <?php } else { ?>
	      <h2><?php single_post_title(); ?></h2>
	      <?php } 
         mapro_breadcrumb_trail(); ?>
      </div>
    </div>
  </div>
</section>

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
				<?php the_posts_pagination(); ?>
 			</div>
			<?php get_sidebar(); ?>
		</div>
		
	</div>
    </div>
 </section>
<?php get_footer(); ?>