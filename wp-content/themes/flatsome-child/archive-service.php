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
							} else {
								echo 'Dịch vụ';
							}
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
		<?php
			$terms = get_terms( array(
				'taxonomy'   => 'service_category',
				'hide_empty' => false,
				'orderby'    => 'menu_order'
			) );

			foreach($terms as $term)
			{
		?>

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
					$cat = $term->term_id;
				?>
				<div class="category-title-posttype">
					<h4 class="sub-category-title">Dịch vụ</h4>
					<h2 class="category-title"><?php echo $term->name; ?></h2>
				</div>
			<?php
			    // Height
			    $height = '';
			    if(get_theme_mod('service_height')) $height = get_theme_mod('service_height');

					echo do_shortcode('[service_grid_relate image_height="'.$height.'" filter="'.$filter.'" filter_nav="'.$filter_nav.'" type="row" cat="'.$cat.'"]');
				?>
			</div>
			<div class="large-3 col sidebar-service">
				<?php
					if (function_exists('get_wp_term_image'))
					{
					    $meta_image = get_wp_term_image($cat);
					    //It will give category/term image url
					}

					echo '<image src="'. $meta_image .'" alt="'. get_queried_object()->name  .'">';
				?>
			</div>
			<?php wp_reset_query(); ?>
		</div>
		<?php
			}
		?>

	</div><!-- #content -->

	<?php wp_reset_query(); ?>

	</div><!-- #content -->
</div>

<?php get_footer(); ?>
