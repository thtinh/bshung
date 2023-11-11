<?php
/**
 * Portfolio related
 */

if ( get_theme_mod( 'service_related', 1 ) == 0 ) {
	return;
}

$terms   = get_the_terms( get_the_ID(), 'service_category' );
$term_id = $terms ? current( $terms )->term_id : '';
$height  = get_theme_mod( 'service_height' );
$height  = $height ? $height : '';

echo do_shortcode( '<div class="portfolio-related">[ux_service image_height="' . $height . '" class="portfolio-related" exclude="' . get_the_ID() . '" cat="' . $term_id . '"]</div>' );