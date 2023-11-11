<?php get_template_part('template-parts/technology/archive-technology-title', flatsome_option('technology_archive_title')); ?>

<div id="content" role="main" class="page-wrapper">
	<?php
		$cat = false;
		$filter = get_theme_mod( 'technology_archive_filter', 'left' );
		$filter_nav = get_theme_mod( 'technology_archive_filter_style', 'line-grow' );

		if($filter == 'disabled' || is_tax()){
			$filter = 'disabled';
		}

		// Check if category
		if(is_tax()){
			$cat = get_queried_object()->term_id;
		}

    // Height
    $height = '';
    if(get_theme_mod('technology_height')) $height = get_theme_mod('technology_height');

		echo do_shortcode('[technology_grid image_height="'.$height.'" filter="'.$filter.'" filter_nav="'.$filter_nav.'" type="row" cat="'.$cat.'"]');
	?>

<?php wp_reset_query(); ?>

</div><!-- #content -->
