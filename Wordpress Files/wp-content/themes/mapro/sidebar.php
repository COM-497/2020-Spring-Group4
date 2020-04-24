<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package mapro
 */



if( is_active_sidebar( 'mapro-right-sidebar' ) ){
	?>
	<aside class="col-lg-3 col-md-3 col-sm-12 col-xs-12 sidebar right">
		<?php dynamic_sidebar( 'mapro-right-sidebar' ); ?>
	</aside>
	<?php
}
?>