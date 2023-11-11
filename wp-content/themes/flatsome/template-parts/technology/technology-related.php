<?php
/**
 * Portfolio related
 */

if ( get_theme_mod( 'technology_related', 1 ) == 0 ) {
	return;
}

$terms   = get_the_terms( get_the_ID(), 'technology_category' );
$term_id = $terms ? current( $terms )->term_id : '';
$height  = get_theme_mod( 'technology_height' );
$height  = $height ? $height : '';

echo do_shortcode( '<div class="portfolio-related">[ux_technology image_height="' . $height . '" class="portfolio-related" exclude="' . get_the_ID() . '" cat="' . $term_id . '"]</div>' );
