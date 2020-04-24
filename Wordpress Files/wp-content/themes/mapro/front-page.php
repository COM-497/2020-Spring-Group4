<?php
/**
 * Template Name: frontpage
 * @package mapro
 */

if(is_page_template() == 1 )
{ 
get_header();
get_template_part( 'home-templates/section','front-page' );
get_footer();
} 
else
{
require get_template_directory() . '/index.php';
}