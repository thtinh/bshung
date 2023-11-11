<?php
get_header(); ?>

<div class="portfolio-page-wrapper portfolio-single-page">
	<div class="page-title normal-title portfolio-breadcrumb-title">
		<div class="page-title-inner container  flex-row medium-flex-wrap medium-text-center">
		 	<div class="flex-col flex-grow">
		 		<h1 class="entry-title is-larger pb-0 pt-0 mb-0"><?php the_title(); ?></h1>
		 	</div>
		 	<div class="flex-col">
				<?php get_flatsome_technology_breadcrumbs(); ?>
			</div>
		</div><!-- flex-row -->
	</div><!-- .page-title -->

	<div class="portfolio-top">
		<div class="row page-wrapper">
			<div class="large-3 col"  role="main">
				<div class="main-sidebar">
					<div id="technology-sidebar">
						<h4 class="technology-sidebar-title">Công nghệ</h4>
						<ul class="list-technology-sidebar">
							<li class="item-technology">
								<a href="">Trẻ hóa da</a>
							</li>
							<li class="item-technology">
								<a href="">Trẻ hóa da</a>
							</li>
							<li class="item-technology">
								<a href="">Trẻ hóa da</a>
							</li>
							<li class="item-technology">
								<a href="">Trẻ hóa da</a>
							</li>
							<li class="item-technology">
								<a href="">Trẻ hóa da</a>
							</li>
						</ul>
					</div>
					<div class="make-appointment">
						<div class="box box-warning">
				            <div class="box-header with-border">
				              <h3 class="box-title">Đặt lịch hẹn</h3>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				              <form role="form">
				                <!-- text input -->
				                <div class="form-group">
				                  	<input type="text" class="form-control" placeholder="Họ và tên">
				                </div>
				                <div class="form-group">
				                  	<input type="text" class="form-control" placeholder="Điện thoại">
				                </div>
				                <div class="form-group">
				                  	<select class="form-control">
				                  		<option selected="selected">Thời gian</option>
					                    <option>option 1</option>
					                    <option>option 2</option>
					                    <option>option 3</option>
					                    <option>option 4</option>
					                    <option>option 5</option>
				                  </select>
				                </div>
				                <div class="form-group">
				                  	<select class="form-control">
				                  		<option selected="selected">Chọn Tỉnh thành</option>
					                    <option>Hà Nội</option>
					                    <option>Hồ Chí Minh</option>
				                  </select>
				                </div>
				                <div class="form-group">
				                  	<select class="form-control">
				                  		<option selected="selected">Chọn chi nhánh</option>
					                    <option>Hà Nội</option>
					                    <option>Hồ Chí Minh</option>
				                  </select>
				                </div>
				                <div class="form-group">
                					<button type="submit" class="btn btn-primary">Đặt lịch hẹn</button>
				                </div>
				              </form>
				            </div>
				            <!-- /.box-body -->
				        </div>
		          	</div>
		          	<!-- /.make-appointment -->
				</div>
			</div>

			<div id="portfolio-content" class="large-9 col"  role="main">
				<div class="portfolio-summary entry-summary pb">
					<div class="row">
						<?php if(!flatsome_option('service_title')) { ?>
							<div class="large-4 col col-divided pb-0">

								<div class="featured_item_cats breadcrumbs pt-0">
									<?php echo get_the_term_list( get_the_ID(), 'technology_category', '', '<span class="divider">|</span>', '' ); ?>
								</div>
								<h1 class="entry-title is-xlarge uppercase"><?php the_title(); ?></h1>
							</div><!-- .large-4 -->
						<?php } ?>
						<div class="col col-fit pb-0">
							<?php the_excerpt();?>

						    <?php if(get_the_term_list( get_the_ID(), 'technology_tag')) { ?>
						    <div class="item-tags is-small uppercase bt pb-half pt-half">
								<strong><?php _e('Tags','woocommerce'); ?>:</strong>
								<?php echo strip_tags (get_the_term_list( get_the_ID(), 'technology_tag', '', ' / ', '' )); ?>
							</div>
						    <?php } ?>
						</div><!-- .large-6 -->
					</div><!-- .row -->
				</div><!-- .entry-summary -->

				<div class="portfolio-inner">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if(get_the_content()) {the_content();} else {
							the_post_thumbnail('original');
						}; ?>
					<?php endwhile; wp_reset_query(); // end of the loop. ?>
				</div><!-- .portfolio-inner -->

			</div><!-- #portfolio-content .large-12 -->

		</div><!-- .row -->
	</div><!-- .portfolio-top -->

	<div class="portfolio-bottom">
		<?php  if(get_theme_mod('technology_next_prev',1) == 0) return; ?>
			<div class="row">
				<div class="large-3 col pb-0"></div>
				<div class="large-9 col pb-0">
					<div class="header-relate">
						<h4 class="text-title">Công nghệ</h4>
						<h2 class="relate-title">Các công nghệ khác</h2>
					</div>
				</div>
			</div>
		<?php

		if ( get_theme_mod( 'technology_related', 1 ) == 0 ) {
			return;
		}

		$terms   = get_the_terms( get_the_ID(), 'technology_category' );
		$term_id = $terms ? current( $terms )->term_id : '';
		$height  = get_theme_mod( 'technology_height' );
		$height  = $height ? $height : '';

		echo '<div class="row">
				<div class="large-3 col pb-0"></div>';

		echo do_shortcode( '<div class="portfolio-related large-9 col pb-0">[ux_technology image_height="' . $height . '" class="portfolio-related" exclude="' . get_the_ID() . '" cat="' . $term_id . '"]</div>' );
		?>
		</div>
	</div>
</div>
<?php get_footer(); ?>