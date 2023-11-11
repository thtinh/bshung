<?php

Flatsome_Option::add_section( 'fl-technology', array(
'title'       => __( 'Technology', 'flatsome-admin' ),
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'select',
	'settings'     => 'technologies_page',
	'label'       => __( 'Custom Technology Page', 'flatsome-admin' ),
	'section'     => 'fl-technology',
	'default'     => false,
	'choices'     => $list_pages
));

Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_save_permalinks',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'fl-technology',
    'default'     => 'You need to Click <strong>"Save & Publish"</strong> and then <strong>"Update Permalinks"</strong> button to make sure it works!<br><br> <a class="button" href="'.admin_url().'options-permalink.php?settings-updated=true" target="_blank">Update permalinks</a>',
) );


Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_technology_single',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'fl-technology',
    'default'     => '<div class="options-title-divider">Single Page</div>',
) );

// Single Posts
Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'technology_layout',
	'label'       => __( 'Single Technology Layout', 'flatsome-admin' ),
	'section'     => 'fl-technology',
	'default' 	  => '',
	'transport'   => $transport,
	'choices'     => array(
		'' => $image_url . 'portfolio.svg',
		'sidebar-right' => $image_url . 'portfolio-sidebar-right.svg',
		'top' => $image_url . 'portfolio-top.svg',
		'top-full' => $image_url . 'portfolio-top-full.svg',
		'bottom' => $image_url . 'portfolio-bottom.svg',
		'bottom-full' => $image_url . 'portfolio-bottom-full.svg',
	),
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'technology_title_transparent',
  'label'       => __( 'Transparent Header', 'flatsome-admin' ),
  'section'     => 'fl-technology',
  'default' => 0
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'technology_title',
	'label'       => __( 'Single Technology Title', 'flatsome-admin' ),
	'section'     => 'fl-technology',
	'default' 	  => '',
	'transport'   => $transport,
	'choices'     => array(
		'' => $image_url . 'portfolio-title.svg',
		'featured' => $image_url . 'portfolio-title-featured.svg',
		'breadcrumbs' => $image_url . 'portfolio-title-breadcrumbs.svg',
	),
));

Flatsome_Option::add_field( 'option', array(
	'type'     => 'checkbox',
	'settings' => 'technology_share',
	'label'    => __( 'Show share icons', 'flatsome' ),
	'section'  => 'fl-technology',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'technology_related',
  'label'       => __( 'Show related items', 'flatsome-admin' ),
  'section'     => 'fl-technology',
  'default' => 1
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'technology_next_prev',
  'label'       => __( 'Show Next/Prev navigation', 'flatsome-admin' ),
  'section'     => 'fl-technology',
  'default' => 1
));



Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_technology_archive',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'fl-technology',
    'default'     => '<div class="options-title-divider">Archive Page</div>',
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'technology_style',
	'label'       => __( 'Technology Style', 'flatsome-admin' ),
	'section'     => 'fl-technology',
	'default' 	  => '',
	'transport'   => $transport,
	'choices'     => array(
		'' => $image_url . 'portfolio-simple.svg',
		'overlay' => $image_url . 'portfolio-overlay.svg',
		'shade' => $image_url . 'portfolio-shade.svg',
	),
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'select',
  'settings'     => 'technology_height',
  'label'       => __( 'Image height', 'flatsome-admin' ),
  'section'     => 'fl-technology',
  'default'     => 0,
  'choices'     => array(
     0   => 'Auto',
    '50%' => '1:2 (Wide)',
    '75%' => '4:3 (Rectangular)',
    '56%' => '16:9 (Widescreen)',
    '100%' => '1:1 (Square)',
    '125%' => 'Portrait',
    '100%' => '2:1 (Tall)',
  ),
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'technology_archive_title',
	'label'       => __( 'Archive Technology Title', 'flatsome-admin' ),
	'section'     => 'fl-technology',
	'default' 	  => '',
	'transport'   => $transport,
	'choices'     => array(
		'' => $image_url . 'portfolio-title.svg',
		'featured' => $image_url . 'portfolio-title-featured.svg',
		'breadcrumbs' => $image_url . 'portfolio-title-breadcrumbs.svg',
	),
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'checkbox',
	'settings'     => 'technology_archive_title_transparent',
	'label'       => __( 'Transparent Header', 'flatsome-admin' ),
	'section'     => 'fl-technology',
	'default' => 0
));

Flatsome_Option::add_field( 'option',  array(
    'type'        => 'image',
    'settings'     => 'technology_archive_bg',
    'label'       => __( 'Technology Header Background', 'flatsome-admin' ),
	'section'     => 'fl-technology',
	'default'     => "",
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-buttonset',
	'settings'     => 'technology_archive_filter',
	'label'       => __( 'Filter Navigation', 'flatsome-admin' ),
	'section'     => 'fl-technology',
	'default'     => 'left',
	'choices'     => array(
		'left' => 'Left',
		'center' => 'Center',
		'disabled' => 'Disabled'
	),
	'transport' => $transport,
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'technology_archive_filter_style',
	'label'       => __( 'Filter Nav style', 'flatsome-admin' ),
	'section'     => 'fl-technology',
	'default' 	  => 'line-grow',
	'transport' => $transport,
	'choices'     => $nav_styles_img
));




function flatsome_refresh_technology_partials( WP_Customize_Manager $wp_customize ) {

  // Abort if selective refresh is not available.
  if ( ! isset( $wp_customize->selective_refresh ) ) {
      return;
  }
	$wp_customize->selective_refresh->add_partial( 'technology-single-layout', array(
		'selector' => '.technology-single-page',
		'settings' => array('technology_style','technology_layout','technology_title'),
		'render_callback' => function() {
		    get_template_part('template-parts/technology/single-technology', flatsome_option('technology_layout'));
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'technology-archive-layout', array(
		'selector' => '.technology-archive',
		'settings' => array('technology_archive_title','technology_archive_filter','technology_style','technology_archive_filter_style'),
		'render_callback' => function() {
		    get_template_part('template-parts/technology/archive-technology', flatsome_option('technology_archive_layout'));
		},
	) );


}
add_action( 'customize_register', 'flatsome_refresh_technology_partials' );
