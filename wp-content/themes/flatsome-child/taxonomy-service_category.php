<?php get_header(); ?>

<div class="portfolio-page-wrapper portfolio-archive page-featured-item">
	<div class="headline_outer">
		<div class="page-title normal-title portfolio-breadcrumb-title">
			<div class="headline_color"></div>
			<div class="page-title-inner container  flex-row medium-flex-wrap medium-text-center">
			 	<div class="flex-col flex-grow">
			 		<h1 class="entry-title is-larger pb-0 pt-0 mb-0">
			 			<?php
							if(is_tax()){
								$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
								echo $term->name;
							} else { the_title(); }
						?>
			 		</h1>
			 	</div>
			 	<div class="flex-col">
					<?php get_flatsome_service_breadcrumbs(); ?>
				</div>
			</div><!-- flex-row -->
		</div>
	</div><!-- .page-title -->

	<div id="content" role="main" class="page-wrapper">
		<div class="row">
			<div class="large-9 col main-content-service">
				<?php
					$cat = false;
					$filter = get_theme_mod( 'service_archive_filter', 'left' );
					$filter_nav = get_theme_mod( 'service_archive_filter_style', 'line-grow' );

					if($filter == 'disabled' || is_tax()){
						$filter = 'disabled';
					}

					// Check if category
					if(is_tax()){
						$cat = get_queried_object()->term_id;
					}

			    // Height
			    $height = '';
			    if(get_theme_mod('service_height')) $height = get_theme_mod('service_height');

					echo do_shortcode('[service_grid image_height="'.$height.'" filter="'.$filter.'" filter_nav="'.$filter_nav.'" type="row" cat="'.$cat.'"]');
				?>
			</div>
			<div class="large-3 col sidebar-service">
				<?php
					if(is_tax()){
						$cat = get_queried_object()->term_id;
						if (function_exists('get_wp_term_image'))
						{
						    $meta_image = get_wp_term_image($cat);
						    //It will give category/term image url
						}

						echo '<image src="'. $meta_image .'" alt="'. get_queried_object()->name  .'">';
					}
				?>
			</div>
			<?php wp_reset_query(); ?>
		</div>

	</div><!-- #content -->

</div>

<?php get_footer(); ?>
