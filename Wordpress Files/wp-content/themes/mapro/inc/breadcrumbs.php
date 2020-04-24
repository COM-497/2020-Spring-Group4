<?php if((!is_front_page()))  { ?>
<?php if( !function_exists('mapro_breadcrumbs') ): function mapro_breadcrumbs() { ?>

<section id="inner-banner">
  <div class="container">
    <div class="row">
      <div class="inner-heading">
        <?php if(is_home()): ?>
            <h2 ><?php bloginfo('name'); ?></h2>
            <?php else: ?>
              <h2><?php if ( is_archive() ) {
                the_archive_title();
              }
               elseif(is_search()){

                echo  esc_html__('Search Results For ', 'mapro') . ' " ' . get_search_query() . ' "';

               }elseif ( is_404() ) {
                echo  esc_html__('Nothing Found ', 'mapro');
               }
               else{
                
                  echo esc_html( get_the_title() );
                  
                } 
               ?></h2>
            <?php endif; ?>
			<div class="separator ">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div> <?php
         mapro_breadcrumb_trail(); ?>
      </div>
    </div>
  </div>
</section>
<?php } endif;  } ?>