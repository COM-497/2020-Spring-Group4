<?php
/**
 * @package mapro
 */

function mapro_inline_styles(){
	$mapro_template_color = esc_attr(get_theme_mod( 'mapro_template_color', '#5bc2ce' ));

	$mapro_page_header_bg = esc_url(get_theme_mod( 'mapro_page_header_bg', get_template_directory_uri().'/images/bg.jpg'));

	$color_css = "

a.view_more:hover,a.view_more:focus,
.separator ul li,
section#services .item:hover .service-card,
.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span,
.search-form input[type='submit'],
.widget_calendar th,
.comment-respond .form-submit input,
.pagination a:hover, .page-numbers.current,.pagination a:focus, .separator.left-align ul li,.page-numbers.current,
section#single-post-detail .tags_share .tags ul li a:hover,section#single-post-detail .tags_share .tags ul li a:focus
{
	background: $mapro_template_color !important ;
}

.blog_card .post-detail h6 a:hover, .blog_card .post-detail h4 a:hover, .blog_card .post-detail h5 a:hover,.blog_card .post-detail h6 a:focus, .blog_card .post-detail h4 a:focus, .blog_card .post-detail h5 a:focus,
.post-detail .post-status ul li i::before,
.widget a:hover,.widget a:focus,
section#inner-banner .inner-heading .breadcrumb li.breadcrumb-item a,
section#single-post-detail .comments h5 span,
.comment-body .reply a,
.footer-widget a:hover,
footer .copyright a:hover,.footer-widget a:focus,
footer .copyright a:focus
{

	color: {$mapro_template_color} !important ;

}

.search-form input[type='submit'],
.pagination a:hover, .page-numbers.current,
section#blog_post.index-2 .post-detail .description a.view_more:hover,
section#single-post-detail .tags_share .tags ul li a:hover,.pagination a:focus, .page-numbers.current,
section#blog_post.index-2 .post-detail .description a.view_more:focus,
section#single-post-detail .tags_share .tags ul li a:focus{
border-color: {$mapro_template_color} !important ;

}
section#inner-banner{ background-image: url('$mapro_page_header_bg');
                }';	
}";

    return mapro_css_strip_whitespace($color_css);
}