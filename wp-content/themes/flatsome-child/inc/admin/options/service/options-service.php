<?php

Flatsome_Option::add_section( 'fl-service', array(
'title'       => __( 'Services', 'flatsome-admin' ),
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'select',
	'settings'     => 'services_page',
	'label'       => __( 'Custom Services Page', 'flatsome-admin' ),
	'section'     => 'fl-service',
	'default'     => false,
	'choices'     => $list_pages
));

Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_save_permalinks',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'fl-service',
    'default'     => 'You need to Click <strong>"Save & Publish"</strong> and then <strong>"Update Permalinks"</strong> button to make sure it works!<br><br> <a class="button" href="'.admin_url().'options-permalink.php?settings-updated=true" target="_blank">Update permalinks</a>',
) );


Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_service_single',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'fl-service',
    'default'     => '<div class="options-title-divider">Single Page</div>',
) );

// Single Posts
Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'service_layout',
	'label'       => __( 'Single Service Layout', 'flatsome-admin' ),
	'section'     => 'fl-service',
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
  'settings'     => 'service_title_transparent',
  'label'       => __( 'Transparent Header', 'flatsome-admin' ),
  'section'     => 'fl-service',
  'default' => 0
));

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'service_title',
	'label'       => __( 'Single Service Title', 'flatsome-admin' ),
	'section'     => 'fl-service',
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
	'settings' => 'service_share',
	'label'    => __( 'Show share icons', 'flatsome' ),
	'section'  => 'fl-service',
	'default'  => 1,
) );

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'service_related',
  'label'       => __( 'Show related items', 'flatsome-admin' ),
  'section'     => 'fl-service',
  'default' => 1
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'checkbox',
  'settings'     => 'service_next_prev',
  'label'       => __( 'Show Next/Prev navigation', 'flatsome-admin' ),
  'section'     => 'fl-service',
  'default' => 1
));



Flatsome_Option::add_field( '', array(
    'type'        => 'custom',
    'settings' => 'custom_title_service_archive',
    'label'       => __( '', 'flatsome-admin' ),
	'section'     => 'fl-service',
    'default'     => '<div class="options-title-divider">Archive Page</div>',
) );

Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-image',
	'settings'     => 'service_style',
	'label'       => __( 'Portfolio Style', 'flatsome-admin' ),
	'section'     => 'fl-service',
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
  'settings'     => 'service_height',
  'label'       => __( 'Image height', 'flatsome-admin' ),
  'section'     => 'fl-service',
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
	'settings'     => 'service_archive_title',
	'label'       => __( 'Archive Portfolio Title', 'flatsome-admin' ),
	'section'     => 'fl-service',
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
	'settings'     => 'service_archive_title_transparent',
	'label'       => __( 'Transparent Header', 'flatsome-admin' ),
	'section'     => 'fl-service',
	'default' => 0
));

Flatsome_Option::add_field( 'option',  array(
    'type'        => 'image',
    'settings'     => 'service_archive_bg',
    'label'       => __( 'Service Header Background', 'flatsome-admin' ),
	'section'     => 'fl-service',
	'default'     => "",
));


Flatsome_Option::add_field( 'option',  array(
	'type'        => 'radio-buttonset',
	'settings'     => 'service_archive_filter',
	'label'       => __( 'Filter Navigation', 'flatsome-admin' ),
	'section'     => 'fl-service',
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
	'settings'     => 'service_archive_filter_style',
	'label'       => __( 'Filter Nav style', 'flatsome-admin' ),
	'section'     => 'fl-service',
	'default' 	  => 'line-grow',
	'transport' => $transport,
	'choices'     => $nav_styles_img
));




function flatsome_refresh_service_partials( WP_Customize_Manager $wp_customize ) {

  // Abort if selective refresh is not available.
  if ( ! isset( $wp_customize->selective_refresh ) ) {
      return;
  }
	$wp_customize->selective_refresh->add_partial( 'service-single-layout', array(
		'selector' => '.service-single-page',
		'settings' => array('service_style','service_layout','service_title'),
		'render_callback' => function() {
		    get_template_part('template-parts/service/single-service', flatsome_option('service_layout'));
		},
	) );

	$wp_customize->selective_refresh->add_partial( 'service-archive-layout', array(
		'selector' => '.service-archive',
		'settings' => array('service_archive_title','service_archive_filter','service_style','service_archive_filter_style'),
		'render_callback' => function() {
		    get_template_part('template-parts/service/archive-service', flatsome_option('service_archive_layout'));
		},
	) );


}
add_action( 'customize_register', 'flatsome_refresh_service_partials' );
