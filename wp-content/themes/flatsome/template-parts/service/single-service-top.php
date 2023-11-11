<?php get_template_part('template-parts/service/service-title', flatsome_option('service_title')); ?>

<div class="portfolio-top">
	<div class="row page-wrapper">

	<div id="portfolio-content" class="large-12 col"  role="main">
		<div class="portfolio-inner pb">
			<?php get_template_part('template-parts/service/service-content'); ?>
		</div><!-- .portfolio-inner -->

		<div class="portfolio-summary entry-summary">
			<?php get_template_part('template-parts/service/service-summary','full'); ?>
		</div><!-- .entry-summary -->
	</div><!-- #portfolio-content .large-12 -->

	</div><!-- .row -->
</div><!-- .portfolio-top -->

<div class="portfolio-bottom">
	<?php get_template_part('template-parts/service/service-next-prev'); ?>
	<?php get_template_part('template-parts/service/service-related'); ?>
</div>