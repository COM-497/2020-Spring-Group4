<?php
/**
 * Template part for displaying posts.
 *
 * @package mapro
 */

?>
<div class="item blog_card card_mr_bt d-flex">
      <?php if(has_post_thumbnail())
	{ ?>	<div class="post-img">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php
	} ?>
      <div class="post-detail">
        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
          <div class="post-status">
            <ul>
            <?php
            mapro_posted_by();
            mapro_posted_on();
            mapro_comment_on();
            
            ?>
          </ul>
          </div>
          <div class="description">
           <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>"><?php echo esc_html__('View More','mapro'); ?></a>
          </div>
      </div>
  <div class="clearfix"></div>
</div>