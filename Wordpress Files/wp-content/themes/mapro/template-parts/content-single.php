<?php
/**
 * Template part for displaying single posts.
 *
 * @package mapro
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if(has_post_thumbnail())
	{ ?>	<div class="post-img">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php
	} ?>
      <div class="post-detail">
          <div class="about-post">
              <h4><?php the_title(); ?></h4>
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
               		<?php
        	    		the_content( sprintf(
        	    			wp_kses(
        	    				/* translators: %s: Name of current post. Only visible to screen readers */
        	    				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mapro' ),
        	    				array(
        	    					'span' => array(
        	    						'class' => array(),
        	    					),
        	    				)
        	    			),
        	    							get_the_title()

        	    		) );

        	    		wp_link_pages( array(
        	    			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mapro' ),
        	    			'after'  => '</div>',
        	    		) );
        	     	?>	
                </div>
              <div class="clearfix"></div>
          </div>
            <?php if(has_tag()) { ?>
            <div class="tags_share">
              <div class="tags">
                <div class="title"><?php esc_html__( 'Tags', 'mapro' ) ?> </div>
                <?php
                  mapro_blogtag();
                  ?>
              </div>
            </div>
            <?php } ?>
      </div>
</div>