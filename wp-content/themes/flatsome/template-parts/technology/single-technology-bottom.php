<?php get_template_part('template-parts/technology/technology-title', flatsome_option('technology_title')); ?>
<div class="portfolio-top">
	<div class="row page-wrapper">

	<div id="portfolio-content" class="large-12 col"  role="main">

		<div class="portfolio-summary entry-summary pb">
			<?php get_template_part('template-parts/technology/technology-summary','full'); ?>
		</div><!-- .entry-summary -->

		<div class="portfolio-inner">
			<?php get_template_part('template-parts/technology/technology-content'); ?>
		</div><!-- .portfolio-inner -->

	</div><!-- #portfolio-content .large-12 -->

	</div><!-- .row -->
</div><!-- .portfolio-top -->

<div class="portfolio-bottom">
	<?php get_template_part('template-parts/technology/technology-next-prev'); ?>
	<?php get_template_part('template-parts/technology/technology-related'); ?>
</div>
