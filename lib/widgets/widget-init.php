<?php 

$options 	= get_option('bean_theme');

/*-----------------------------------------------------------------------------------*/
/*	REGISTER BASE WIDGET AREAS
/*-----------------------------------------------------------------------------------*/
if ( function_exists('register_sidebar') ) {
    $allWidgetizedAreas = 
        array(
                __( 'Internal Sidebar', 'bean' ),
                __( 'Drop In Header', 'bean' ),
                __( 'Home Primary', 'bean' ),
            );
            
    foreach ($allWidgetizedAreas as $WidgetAreaName) {
        register_sidebar(array(
           'name'			=> $WidgetAreaName,
            'id'            => sanitize_title($WidgetAreaName),
           'before_widget' 	=> '<div class="widget six columns clearfix">',
           'after_widget' 	=> '</div>',
           'before_title' 	=> '<h3 class="widget-title"><span>',
           'after_title' 	=> '</span></h3>',
        ));
    }
}





/*-----------------------------------------------------------------------------------*/
/*	REGISTER HOME FEATURE AREA WIDGET AREA IF SELECTED VIA THEME OPTIONS
/*-----------------------------------------------------------------------------------*/
if ( isset( $options['home_layout'] ) ) { $layout = $options['home_layout'];
	
	 if ( $layout == 'top_feat_widget' OR $layout == 'btm_feat_widget' OR $layout == 'top_and_btm' ) { 
	 
	 register_sidebar(
	 	array(
	 	'name'          => __('Home Top Feature', 'bean'),
        'id'            => 'home-top-feature',
	 	'before_widget' => '<div class="widget %2$s clearfix">',
	 	'after_widget' 	=> '</div>',
	 	'before_title' 	=> '<h3 class="widget-title"><span>',
	 	'after_title' 	=> '</span></h3>',
	 ));
	 	 
	} 	 
} 


/*-----------------------------------------------------------------------------------*/
/*	REGISTER HOME FEATURE AREA WIDGET AREA IF SELECTED VIA THEME OPTIONS
/*-----------------------------------------------------------------------------------*/
if ( isset( $options['home_layout'] ) ) { $layout = $options['home_layout'];
	
	 if ( $layout == 'top_and_btm' ) { 
	 
	 register_sidebar(
	 	array(
	 	'name'          => __('Home Bottom Feature', 'bean'),
        'id'            => 'home-bottom-feature',
	 	'before_widget' => '<div class="widget %2$s clearfix">',
	 	'after_widget' 	=> '</div>',
	 	'before_title' 	=> '<h3 class="widget-title"><span>',
	 	'after_title' 	=> '</span></h3>',
	 ));
	 	 
	} 	 
} 


/*-----------------------------------------------------------------------------------*/
/*	REGISTER FOOTER 1, 2, 3 WIDGET AREAS IF SELECTED VIA THEME OPTIONS
/*-----------------------------------------------------------------------------------*/
if ( isset( $options['footer_layout'] ) ) { $layout = $options['footer_layout'];
	
	 if ( $layout == 'three_widgets' OR $layout == 'five_widgets' ) { 
	 
	 register_sidebar(
	 	array(
	 	'name'          => __('Footer 1', 'bean'),
        'id'            => 'footer-1',
	 	'before_widget' => '<div class="widget %2$s clearfix">',
	 	'after_widget' 	=> '</div>',
	 	'before_title' 	=> '<h3 class="widget-title"><span>',
	 	'after_title' 	=> '</span></h3>',
	 ));
	 
	 register_sidebar(
	 	array(
	 	'name'          => __('Footer 2', 'bean'),
        'id'            => 'footer-2',
	 	'before_widget' => '<div class="widget %2$s clearfix">',
	 	'after_widget' 	=> '</div>',
	 	'before_title' 	=> '<h3 class="widget-title"><span>',
	 	'after_title' 	=> '</span></h3>',
	 ));
	 
	 register_sidebar(
	 	array(
	 	'name'          => __('Footer 3', 'bean'),
        'id'            => 'footer-3',
	 	'before_widget' => '<div class="widget %2$s clearfix">',
	 	'after_widget' 	=> '</div>',
	 	'before_title' 	=> '<h3 class="widget-title"><span>',
	 	'after_title' 	=> '</span></h3>',
	 ));
	 	 
	} 	 
} 

/*-----------------------------------------------------------------------------------*/
/*	REGISTER FOOTER 4, 5 WIDGET AREAS IF SELECTED VIA THEME OPTIONS
/*-----------------------------------------------------------------------------------*/
if ( isset( $options['footer_layout'] ) ) { $layout = $options['footer_layout'];
	
	 if ( $layout == 'five_widgets' ) { 
	 
	 register_sidebar(
	 	array(
	 	'name'          => __('Footer 4', 'bean'),
        'id'            => 'footer-4',
	 	'before_widget' => '<div class="widget %2$s clearfix">',
	 	'after_widget' 	=> '</div>',
	 	'before_title' 	=> '<h3 class="widget-title"><span>',
	 	'after_title' 	=> '</span></h3>',
	 ));
	 
	 register_sidebar(
	 	array(
	 	'name'          => __('Footer 5', 'bean'),
        'id'            => 'footer-5',
	 	'before_widget' => '<div class="widget %2$s clearfix">',
	 	'after_widget' 	=> '</div>',
	 	'before_title' 	=> '<h3 class="widget-title"><span>',
	 	'after_title' 	=> '</span></h3>',
	 ));
	 	 
	} 	 
} 


?>