<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package mapro
 */

?>
<div class="item blog_card card_mr_bt d-flex">
	 <div class="post-img"> 
	  	<?php if(has_post_thumbnail()){ the_post_thumbnail();  } ?>
	 </div>
	  <div class="post-detail">
	    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	    <div class="post-status">
	     <?php if ( 'post' === get_post_type() ) { ?>
		    <ul>
		      <?php
		      mapro_posted_by();
		      mapro_posted_on();
		      mapro_comment_on();
		      ?>
		    </ul>
		   <?php } ?>
	    </div>
		    <div class="description">
		     <?php the_excerpt(); ?>
		      <a href="<?php the_permalink(); ?>"><?php echo esc_html__('View More','mapro'); ?></a> 
		   </div>
	  </div>
  <div class="clearfix"></div>
</div>