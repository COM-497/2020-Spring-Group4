<?php
$mapro_enable_slider_sec = get_theme_mod('mapro_enable_slider_sec');
$mapro_slider_btntxt = esc_html(get_theme_mod('mapro_slider_us_btn','View More'));

if($mapro_enable_slider_sec){

      $args = array(
        'page_id' => get_theme_mod('mapro_slider_page') 
        );
      $query = new WP_Query($args);
      if($query->have_posts() && get_theme_mod('mapro_slider_page')):
        while($query->have_posts()) : $query->the_post();
    

  ?>
<div class="slider index-3">
     <div class="bannner">
        <div class="item">
         <?php the_post_thumbnail(); ?>
             <div class="caption d-md-block">
                <div class="display"><?php the_title(); ?></div>
                    <div class="content"><?php the_excerpt(); ?>
                    </div>

                    <?php if($mapro_slider_btntxt) { ?>
                    <a href="<?php the_permalink(); ?>" class="view_more"><?php echo esc_html($mapro_slider_btntxt); ?></a>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>

 <?php
      endwhile;
      endif;  
      wp_reset_postdata();
    } else {
      mapro_breadcrumbs();

      ?>

    <?php } ?>

<?php 
$mapro_enable_about_sec = get_theme_mod('mapro_enable_about_sec');
$mapro_about_us_title = get_theme_mod('mapro_about_us_title',__( 'About Us', 'mapro' ));

if($mapro_enable_about_sec){
  ?>

  <section id="about-us" class="index-2">
    <div class="container">
      <div class="section_heading">
        <h1><?php echo esc_html($mapro_about_us_title); ?></h1>
        <div class="separator">
          <ul>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-xs-12 content_sec">
        <?php 
      $args = array(
        'page_id' => get_theme_mod('mapro_about_page') 
        );
      $query = new WP_Query($args);
      if($query->have_posts() && get_theme_mod('mapro_about_page')):
        while($query->have_posts()) : $query->the_post();
      ?>
        <div class="row row-safari">
          <?php if( has_post_thumbnail() ) { ?>
          <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 img-area"> 
             <?php the_post_thumbnail(); ?> 
          </div>
          <?php } ?>
          <?php if( ! has_post_thumbnail() ) { ?>
          <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 content-area no-abt-bg">
          <?php } else{ ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 content-area">
            <?php } ?>
            <h5><?php the_title(); ?></h5>
            <?php the_content(); ?>
            <a class="defualt-button view_more" href="<?php the_permalink(); ?>"><?php echo esc_html__('View More','mapro'); ?></a> </div>
        </div>
        <?php
      endwhile;
      endif;  
      wp_reset_postdata();
      ?>
      </div>
      <div class="clearfix"></div>
     
    </div>
  </section>
<?php } ?>

<?php
$mapro_enable_serv_sec = get_theme_mod('mapro_enable_serv_sec');
if($mapro_enable_serv_sec)
{

$mapro_service_title = get_theme_mod('mapro_service_title',__( 'mapro service title', 'mapro' ));
$mapro_service_subtitle = get_theme_mod('mapro_service_subtitle',__( 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s', 'mapro' ));

?>

<section id="services" class="gray-bg index-2">
  <div class="container">
    <div class="section_heading">
      <h2><?php echo esc_html($mapro_service_title); ?></h2>
      <div class="separator">
        <ul>
          <li></li>
          <li></li>
          <li></li>
        </ul>
      </div>
      <div class="heading_content">
       <?php echo esc_html($mapro_service_subtitle); ?>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-xs-12 content_sec">
      <div class="service-slider owl-one owl-carousel owl-theme">
            <?php 
          $mapro_enable_services_link = get_theme_mod('mapro_enable_services_link', true);
          for( $i = 1; $i < 6; $i++ ){
              $mapro_services_page_id = get_theme_mod('mapro_services_page'.$i);
              $mapro_services_page_icon = get_theme_mod('mapro_services_page_icon'.$i, 'fab fa-500px');
          
          if($mapro_services_page_id){
              $args = array( 'page_id' => $mapro_services_page_id );
              $query = new WP_Query($args);
              if($query->have_posts()):
                  while($query->have_posts()) : $query->the_post();
              ?>
        <div class="item"> 
          <div class="service_icon"><i class="<?php echo esc_attr($mapro_services_page_icon); ?>"></i></div>
          <div class="connector"> <span></span> </div>
          <div class="service-card">
            <div class="service_detail">
              <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <?php the_excerpt(); ?>
            </div>
          </div>
          </div>
       <?php
              endwhile;
              endif;  
              wp_reset_postdata();
              }
          }
          ?>

      </div>
      <div class="h-border"><span></span></div>
    </div>
  </div>
</section>

  <?php } ?>

<?php
$mapro_blog_cat     = get_theme_mod( 'mapro_blog_cat', '' );
$mapro_blog_cat_id  = get_cat_ID( $mapro_blog_cat );

    $section_args = array(
        'category_name'  => esc_attr( $mapro_blog_cat ),
        'posts_per_page' => 6,
    );
    $section_query = new WP_Query( $section_args );
 ?>
   <section id="blog_post" class="index-2">
    <div class="container">
      <div class="section_heading">
        <h2><?php echo esc_html__('Blog Posts','mapro'); ?></span></h2>
        <div class="separator">
          <ul>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
        <div class="heading_content">
            <?php echo esc_html__('when an unknown printer took a galley of type','mapro'); ?>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-xs-12 content_sec">
        <div class="blog-slider owl-five owl-carousel owl-theme">
            <?php
                    if( $section_query->have_posts() ){
                        while( $section_query->have_posts() ){
                            $section_query->the_post();
                ?>
          <div class="item blog_card">
            <div class="post-img"> 
              <?php if( has_post_thumbnail() )
                {
                    the_post_thumbnail();
                }
              ?>
            </div>
            <div class="post-detail">
              <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <div class="post-status">
              <ul>
                  <?php
                    mapro_posted_by();
                    mapro_posted_on();
                    
                  ?>
              </ul>
              </div>
              <div class="description">
                 <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="view_more"><?php echo esc_html__('View More','mapro'); ?></a> </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <?php
                        }
                    }
                    wp_reset_postdata();
                ?>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </section>