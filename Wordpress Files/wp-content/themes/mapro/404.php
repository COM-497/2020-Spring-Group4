<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package mapro
 */

get_header();
mapro_breadcrumbs();

 ?>
<section id="page-not-found" class="gray-bg">
  <div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12 text-center img_sec">
            <h1><?php echo esc_html__('404 ERROR','mapro'); ?></h1>
        </div>
        <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12 text-center content_sec">
            <div class="error-content">
              <h4><?php echo esc_html__('Page Not Found!','mapro'); ?></h4>
              <div class="separator">
                <ul>
                  <li></li>
                  <li></li>
                  <li></li>
                </ul>
              </div>
              <p><?php echo esc_html__('This is not the page your are looking for. Reach out with your feelings and try refining your search or return to base.','mapro'); ?></p>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__('Back To Homepage','mapro'); ?></a>
            </div>
        </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>