<?php
/**
 * The template for displaying the footer.
 *
 * @package mapro
 */

?>
<footer>
  <div class="container">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 column">
         <?php if(is_active_sidebar('mapro-footer-one')): 
              dynamic_sidebar('mapro-footer-one');
            endif;
            ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 column">
           <?php if(is_active_sidebar('mapro-footer-two')): 
              dynamic_sidebar('mapro-footer-two');
            endif;
            ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 column">
         <?php if(is_active_sidebar('mapro-footer-three')): 
              dynamic_sidebar('mapro-footer-three');
            endif;
            ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 column">
          <?php if(is_active_sidebar('mapro-footer-four')): 
              dynamic_sidebar('mapro-footer-four');
            endif;
            ?>
        </div>
      </div>
    </div>
    
     <div class="copyright col-lg-12">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>  <?php echo esc_html(date_i18n( __( 'Y', 'mapro' ) )); ?> <?php esc_html_e('. Powered by WordPress','mapro'); ?>
           </div>
        </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>