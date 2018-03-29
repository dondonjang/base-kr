<?php
/*--------------------------------------------------------------------*/	
/*  META POST/PAGE GENERAL							   			          							
/*--------------------------------------------------------------------*/
$meta_boxes[] = array(
	'id'       => 'general-settings',
	'title'    => __('Page Settings', 'bean'),
	'pages'    => array('page', 'post'),
	'context'  => 'normal',
	'priority' => 'default',
	'fields'   => array(
		array( "name" => __('Intro Heading:','bean'),
				"desc" => __('Text displayed below the title (in lieu of the category description on post pages).','bean'),
				"id" => $prefix."post_intro",
				"type" => "textarea",
				"std" => ''
			),

 		array(
			'name'     => __('Sidebar Layout:', 'radium'),
			'id'       => $prefix . 'page_layout',
			'type'     => 'radio_image',
			'options'  => array(
				'none' => '<img src="' . BEAN_ADMIN_IMAGES_URL . '/1col.png" alt="' . __('Fullwidth', 'bean') . '" title="' . __('Fullwidth"', 'bean') . ' />',
				'left'  => '<img src="' . BEAN_ADMIN_IMAGES_URL . '/2cl.png" alt="' . __('Left Sidebar', 'bean') . '" title="' . __('Left Sidebar', 'bean') . '" />',
				'right'  => '<img src="' . BEAN_ADMIN_IMAGES_URL . '/2cr.png" alt="' . __('Right Sidebar', 'bean') . '" title="' . __('Right Sidebar', 'bean') . '" />'
			),
			'std'  => 'none',
			'desc' => __('', 'bean')
		),
	)
);