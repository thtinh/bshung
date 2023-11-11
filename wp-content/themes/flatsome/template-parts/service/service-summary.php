<?php if(!flatsome_option('service_title')) { ?>
	<div class="service_cats breadcrumbs mb-half">
		<?php echo get_the_term_list( get_the_ID(), 'service_category', '', '<span class="divider">|</span>', '' ); ?>
	</div>
	<h1 class="entry-title uppercase"><?php the_title(); ?></h1>
<?php } ?>

<?php the_excerpt();?>

<?php if ( get_theme_mod( 'service_share', 1 ) ) : ?>
	<div class="portfolio-share">
		<?php echo do_shortcode( '[share style="small"]' ) ?>
	</div>
<?php endif; ?>

<?php if(get_the_term_list( get_the_ID(), 'service_tag')) { ?>
<div class="item-tags is-small bt pt-half uppercase">
	<strong><?php _e('Tags','woocommerce'); ?>:</strong>
	<?php echo strip_tags (get_the_term_list( get_the_ID(), 'service_tag', '', ' / ', '' )); ?>
</div>
<?php } ?>