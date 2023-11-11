<?php get_template_part('template-parts/technology/technology-title', flatsome_option('technology_title')); ?>
<div class="portfolio-top">
<div class="page-wrapper row">

<div class="large-3 col col-divided">
	<div class="portfolio-summary entry-summary sticky-sidebar">
			<?php get_template_part('template-parts/technology/technology-summary'); ?>
	</div><!-- .entry-summary -->
</div><!-- .large-3 -->

<div id="portfolio-content" class="large-9 col"  role="main">
	<div class="portfolio-inner">
		<?php get_template_part('template-parts/technology/technology-content'); ?>
	</div><!-- .portfolio-inner -->
</div><!-- #portfolio-content -->

</div><!-- .row -->
</div><!-- .portfolio-top -->

<div class="portfolio-bottom">
	<?php get_template_part('template-parts/technology/technology-next-prev'); ?>
	<?php get_template_part('template-parts/technology/technology-related'); ?>
</div>
