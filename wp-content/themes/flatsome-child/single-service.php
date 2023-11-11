<?php

get_header(); ?>

<div class="portfolio-page-wrapper portfolio-single-page">
	<div class="headline_outer">
		<div class="page-title normal-title portfolio-breadcrumb-title">
			<div class="headline_color"></div>
			<div class="page-title-inner container  flex-row medium-flex-wrap medium-text-center">
			 	<div class="flex-col flex-grow">
			 		<h1 class="entry-title is-larger pb-0 pt-0 mb-0"><?php the_title(); ?></h1>
			 	</div>
			 	<div class="flex-col">
					<?php get_flatsome_service_breadcrumbs(); ?>
				</div>
			</div><!-- flex-row -->
		</div>
	</div><!-- .page-title -->

	<div class="portfolio-top">
		<div class="row page-wrapper">
			<div class="large-3 col"  role="main">
				<div class="main-sidebar">
					<div id="service-sidebar">
						<?php
							$terms   = get_the_terms( get_the_ID(), 'service_category' );
							$term_id = $terms ? current( $terms )->term_id : '';
							$name = $terms ? current( $terms )->name : '';
						?>
						<h4 class="service-sidebar-title"><?php echo $name; ?></h4>
						<?php
							$post_args = array(
									'posts_per_page' => -1,
									'post_type' => 'service',
									'tax_query' => array(
									  array(
									      'taxonomy' => 'service_category',
									      'field' => 'id',
									      'terms' => $term_id
									  	)
									)
							);
							$myposts = get_posts($post_args);
						?>
						<ul class="list-service-sidebar">
							<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
							<li class="item-service">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</li>
							<?php endforeach; // Term Post foreach ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					</div>
					<div class="make-appointment">
						<div class="box box-warning">
				            <div class="box-header with-border">
				              <h3 class="box-title">Đặt lịch hẹn</h3>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				              	<form role="form" class="form-dathen">
					                <!-- text input -->
					                <div class="form-group">
					                  	<input type="text" class="form-control" name="hovaten" placeholder="Họ và tên">
					                </div>
					                <div class="form-group">
					                  	<input type="text" class="form-control" name="dienthoai" placeholder="Điện thoại">
					                </div>
					                <div class="form-group">
					                  	<input type="text" class="form-control" name="email" placeholder="Email">
					                </div>
					                <div class="form-group">
					                  	<input type="text" class="form-control ngay" name="ngay" placeholder="Ngày">
					                </div>
					                <div class="form-group">
					                  	<input type="text" class="form-control gio" name="gio" placeholder="Giờ">
					                </div>
		                         	<input type="hidden" class="form-control" name="content" value="<?php the_title() ?>">
					                <div class="form-group">
	                					<button type="submit" class="btn btn-default btn-dathen" name="datlichhen">Đặt lịch hẹn</button>
	                					<p class="loading">
	                						<img src="<?php echo get_stylesheet_directory_uri() . '/style/image/loading.gif'; ?>" alt="">
	                					</p>
						                <p class="message"></p>
						                <p class="message-success">Đã gởi lịch hẹn thành công.</p>
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
									<?php echo get_the_term_list( get_the_ID(), 'service_category', '', '<span class="divider">|</span>', '' ); ?>
								</div>
								<h1 class="entry-title is-xlarge uppercase"><?php the_title(); ?></h1>
							</div><!-- .large-4 -->
						<?php } ?>
						<div class="col col-fit pb-0">
							<?php the_excerpt();?>

						    <?php if(get_the_term_list( get_the_ID(), 'service_tag')) { ?>
						    <div class="item-tags is-small uppercase bt pb-half pt-half">
								<strong><?php _e('Tags','woocommerce'); ?>:</strong>
								<?php echo strip_tags (get_the_term_list( get_the_ID(), 'service_tag', '', ' / ', '' )); ?>
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

				<div class="relate-service">
					<div class="header-relate">
						<h4 class="text-title">Dịch vụ</h4>
						<h2 class="relate-title">Các dịch vụ khác</h2>
					</div>
					<?php
						if ( get_theme_mod( 'service_related', 1 ) == 0 ) {
							return;
						}

						$terms   = get_the_terms( get_the_ID(), 'service_category' );
						$term_id = $terms ? current( $terms )->term_id : '';
						$height  = get_theme_mod( 'service_height' );
						$height  = $height ? $height : '';

						echo do_shortcode( '<div class="portfolio-related col pb-0">[ux_service_relate image_height="' . $height . '" class="portfolio-related" exclude="' . get_the_ID() . '" cat="' . $term_id . '"]</div>' );
					?>
				</div>

			</div><!-- #portfolio-content .large-12 -->

		</div><!-- .row -->
	</div><!-- .portfolio-top -->

</div>
<?php get_footer(); ?>