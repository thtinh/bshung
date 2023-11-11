<?php get_template_part('template-parts/service/service-title', flatsome_option('service_title')); ?>

<div class="portfolio-top">
	<div class="row">

	<div class="large-3 col">
	<div class="portfolio-summary entry-summary">
		<?php get_template_part('template-parts/service/service-summary'); ?>
	</div><!-- .portfolio-summary .entry-summary -->

	</div><!-- .large-3 -->

	<div id="portfolio-content" class="large-9 col col-first col-divided"  role="main">
		<div class="portfolio-inner">
			<?php get_template_part('template-parts/service/service-content'); ?>
		</div><!-- .page-inner -->
	</div><!-- #portfolio-content -->

	</div><!-- .row -->
</div><!-- .portfolio-top -->

<div class="portfolio-bottom">
	<?php get_template_part('template-parts/service/service-next-prev'); ?>
	<?php get_template_part('template-parts/service/service-related'); ?>
</div>