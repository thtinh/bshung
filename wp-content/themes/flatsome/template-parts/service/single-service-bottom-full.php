<?php get_template_part('template-parts/service/service-title', flatsome_option('service_title')); ?>
<?php
	echo flatsome_option('service_title'));

?>
<div class="portfolio-top">
	<div class="row page-wrapper">
	<div class="large-12 col mb-0 pb-0">
	<div class="portfolio-summary entry-summary">
		<?php get_template_part('template-parts/service/service-summary','full'); ?>
	</div><!-- .portfolio-summary .entry-summary -->
	</div><!-- .large-12 -->
	</div><!-- .row -->

	<div id="portfolio-content" role="main">
		<div class="portfolio-inner">
			<?php get_template_part('template-parts/service/service-content'); ?>
		</div><!-- .portfolio-inner -->
	</div><!-- #portfolio-content -->
</div><!-- .portfolio-top -->

<div class="portfolio-bottom">
	<?php get_template_part('template-parts/service/service-next-prev'); ?>
	<?php get_template_part('template-parts/service/service-related'); ?>
</div>