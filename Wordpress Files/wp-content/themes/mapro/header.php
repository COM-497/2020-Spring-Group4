<?php
/**
 * The header for our theme.
 *
 * @package mapro
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mapro' ); ?></a>
<?php
$mapro_sticky_header = get_theme_mod( 'mapro_disable_sticky_header' ); 
if($mapro_sticky_header) {
?>

<header class="header disable">
  <?php } else {?>
  <header class="header">
    <?php } ?>





    <div class="container">
       <nav class="navbar navbar-expand-lg">
            <!-- Brand -->
        <?php 
        if ( has_custom_logo() ) {
                the_custom_logo();
        } else {
                echo '<h1 class="site-title">'. esc_html(get_bloginfo( 'name' )) .'</h1>';
        } 
        ?>

           
            <!-- Links -->
            <nav id="site-navigation" class="main-navigation">
                                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                        <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'menu_id'        => 'primary-menu',
                                        
                                    ) );
                                    ?>
                    </nav>
                  </nav>
    </div>
  </header>
  <div id="content"></div>