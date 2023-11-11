<?php get_template_part('template-parts/service/service-title', flatsome_option('service_title')); ?>

<div class="portfolio-top">
	<div id="portfolio-content" role="main" class="page-wrapper">
		<div class="portfolio-inner">
			<?php get_template_part('template-parts/service/service-content'); ?>
		</div><!-- .portfolio-inner -->
	</div><!-- #portfolio-content -->

	<div class="row">
	<div class="large-12 col">
		<div class="portfolio-summary entry-summary">
			<?php get_template_part('template-parts/service/service-summary','full'); ?>
		</div><!-- .portfolio-summary .entry-summary -->
	</div><!-- .large-12 -->
	</div><!-- .row -->
</div><!-- portfolio-top -->

<div class="portfolio-bottom">
	<?php get_template_part('template-parts/service/service-next-prev'); ?>
	<?php get_template_part('template-parts/service/service-related'); ?>
</div>