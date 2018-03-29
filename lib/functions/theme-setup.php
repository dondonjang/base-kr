<?php

/*--------------------------------------------------------------------*/
/*                    										
/*     ADD OUR SCRIPTS										
/*                    										
/*--------------------------------------------------------------------*/
if ( !function_exists( 'add_our_scripts') ) {
		 
	function add_our_scripts() {
		global $post;
		
		$options = get_option('bean_theme');
	 	
	 	wp_enqueue_style( 'bean', get_stylesheet_directory_uri(). '/assets/css/framework.css', false,'1.0','all');
	 	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri(). '/style.css', false, '1.4', 'all'); 	
		wp_enqueue_style( 'mobile', get_stylesheet_directory_uri(). '/assets/css/mobile.css',false,'1.0','all'); 

		wp_enqueue_script('jquery');
		wp_enqueue_script('custom-libraries', BEAN_JS_URL . '/custom-libraries.js', 'jquery', '1.0', true); 
		wp_enqueue_script('custom', BEAN_JS_URL . '/custom.js', 'jquery', '2.0', true);
		wp_enqueue_script('retina', BEAN_JS_URL . '/retina.js', 'jquery', '2.0', true);
		
		if ( is_page_template('page-comingsoon.php') ) { 
			wp_enqueue_script('bean-soon', BEAN_JS_URL . '/bean-soon.js', 'jquery', '1.0', true);
		}
		
		if ( is_singular('post') ) { 	
			wp_register_script('validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', 'jquery', '1.9', true);
			wp_enqueue_script('validation');
		}
		
		global $is_IE;
		
		if ( $is_IE ) {
			wp_enqueue_script('selectivizr', BEAN_JS_URL . '/selectivizr-min.js', 'jquery', '2.0', false);
		}
	 			
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
			wp_enqueue_script('validation', BEAN_JS_URL . '/jquery.validate.min.js', 'jquery', '1.9', true);
		}
		
	}
	add_action( 'wp_enqueue_scripts', 'add_our_scripts',0);
}




/*--------------------------------------------------------------------*/
/*                    										
/*     BEAN THEME SETUP											
/*                    										
/*--------------------------------------------------------------------*/
if ( !function_exists( 'bean_theme_setup') ) {

	function bean_theme_setup() {
		if ( function_exists( 'add_theme_support' ) ) {

			add_theme_support('post-thumbnails');
			add_theme_support('automatic-feed-links');
			add_image_size( 'thumbnail-large', 960, 720, true );
			
			set_post_thumbnail_size( 140, 140, true );

			add_theme_support('post-formats', array('image', 'gallery', 'video', 'audio'));

             /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support( 'title-tag' );
			
		}	 
		
	}
	add_action('after_setup_theme', 'bean_theme_setup');
}



/*--------------------------------------------------------------------*/
/*                    										
/*     PRIMARY NAVIGATION									
/*                    										
/*--------------------------------------------------------------------*/
if ( function_exists( 'wp_nav_menu') ) {

	add_theme_support( 'nav-menus' );
	$menus = array(
		'primary-menu' => __( 'Primary Navigation', 'bean' ),
		'dropin-menu' => __( 'Drop In Navigation', 'bean' ),
		'footer-menu' => __( 'Footer Navigation', 'bean' ),
	);
	$menus = apply_filters( 'radium_nav_menus', $menus );
	register_nav_menus( $menus );
	
}
 
 
 
 
/*--------------------------------------------------------------------*/
/*                    										
/*     CUSTOM CSS STYLES									
/*                    										
/*--------------------------------------------------------------------*/
if ( !function_exists('radium_insert_custom_styles') ) {

	function radium_insert_custom_styles() { 
	
		$options = get_option('bean_theme');	
		$bg_color 		= get_post_meta( get_the_ID(), '_radium_backcolor', true );
 		$bg_src = null;
 		$text_color 	= get_post_meta( get_the_ID(), '_radium_textcolor', true );
 		
  		if( function_exists('rwmb_meta') ) {
  			$bg_src_array = rwmb_meta( '_radium_bgimage', 'type=image' );
  			
  			if( is_array($bg_src_array)){
 				foreach ( $bg_src_array as $bg_image ) {
		    		$bg_src = $bg_image['full_url'];
				}
  			}
		}			
	?>
	
	
<style>
/* ACCENT COLOR */	
	<?php
	if ($options['accent_color']): ?>
	
		code,
		a:hover,
		p a:hover,
		blockquote p,
		div.bean-note a,
		#footer a:hover,	
		.format-link p a,	
		.archives-list ul,
		.modal .close:hover,
		.logged-in-as span a,
		.comment-author a:hover,
		.entry-content p a:hover,
		.entry-header h1 a:hover,
		.entry-header h2 a:hover,
		.entry-header h3 a:hover,		
		#header-container p a:hover,
		.format-quote .entry-header h2 a, 
		.drop-in-header .widget_text a:hover,	
		.footer-btm .footer-navigation a:hover,
		.radium-tabs ul.radium-nav li a:focus,
		.home-widgets-featured .widget_bean_tweets li span a { 
			color:<?php  echo $options['accent_color']; ?>; 
		}
	
		.widget_bean_tweets li span a:hover,
		.widget_bean_tweets li a:hover,
		.widget_nav_menu .current_page_item  a,
		.bean-pricing-table .pricing-column li span,
		.bean-tabs > li.active > a, .bean-panel-title > a:hover {
			color:<?php  echo $options['accent_color']; ?>!important; 
		}
	
		.btn, 
		.button, 
		.new-tag,
		.short-btn,
		#toTop:hover,
		.bean-quote,
		span.number,
		#toTop:hover,
		.feature-icon,
		div.jp-play-bar,
		button.button:hover, 
		.btn[type="submit"],
		.button[type="submit"],
		input[type="button"], 
		input[type="reset"], 
		input[type="submit"],
		div.jp-volume-bar-value,	
		.featurearea_icon .icon ,
		.entry-content a.more-link,
		.entry-content a.more-link,	
		.bean-announcement.flatty,
		.flex-direction-nav a:hover,
		.error404 .btn,
		#header-container .searchform .button[type="submit"],
		.flex-control-paging li a.flex-active { 
			background-color: <?php  echo $options['accent_color']; ?>; 
		} 
		
		#powerTip, .bean-pricing-table .pricing-highlighted  { 
			background-color: <?php  echo $options['accent_color']; ?>!important; 
			}
		
		#powerTip:after {
			border-color: <?php echo $options['accent_color']; ?> transparent!important; 
		}

		.main-menu > .current_page_item > a {
			border-color: <?php  echo $options['accent_color']; ?>;
		}
	
	<?php endif; 
/* SELECTION */
	if ($options['selection_bg_color']): ?>
			
		::selection { 
			background-color: <?php  echo $options['selection_bg_color']; ?>; 
		}
		
		::selection { 
			color: <?php  echo $options['selection_text_color']; ?>; 
		}
		
	<?php endif;
/* HEADER / FOOTER BOTTOM COLOR */
	if ($options['header_footer_color']): ?>
		
		.footer-btm,
		#header-container,
		.drop-in-header,
		.footer-container .bean-shot,
		.footer-container .bean-dribbble-shots img, 
		.footer-container .flickr_badge_image,		
		.footer-container .flickr_badge_image img,
		#responsive-nav form.custom div.custom.dropdown a.current,
		#responsive-nav form.custom div.custom.dropdown ul { 
			background-color: <?php  echo $options['header_footer_color']; ?>!important; 
		}
	
	<?php endif;
/* 404 BG IMAGE */
	if ($options['error_404_bg']): ?>
		
	<?php $error404_bg_image = $options['error_404_bg']; ?>
	
		
	body.error404 {
		background: url(<?php echo $error404_bg_image; ?>) no-repeat center center; 
		-webkit-background-size: cover;
		   -moz-background-size: cover;
		     -o-background-size: cover;
		        background-size: cover;
		}	
	
	<?php endif;
/* 404 BG IMAGE */
	if ($options['header_bg']): ?>
		
	<?php $header_bg_bg_image = $options['header_bg']; ?>
	.footer-btm,
	body.search-no-results,			
	#header-container {
		background: url(<?php echo $header_bg_bg_image; ?>) no-repeat center center; 
		-webkit-background-size: cover!important;
		   -moz-background-size: cover!important;
		     -o-background-size: cover!important;
		        background-size: cover!important;
		}	
	#responsive-nav form.custom div.custom.dropdown ul,
	#responsive-nav form.custom div.custom.dropdown a.current {
		background-color: #27292E;
		}

	#responsive-nav form.custom div.custom.dropdown ul li {
		background-color: #181920;
		}	
		
	#responsive-nav form.custom div.custom.dropdown ul li:hover {
		background-color: #27292E;
		}
		
	#header-container {
		padding-top: 40px;
		}
			
	<?php endif; ?>
</style>

<?php } add_action('wp_head', 'radium_insert_custom_styles'); }




/*------------------------------------------------------------------------------------------------*/
/*                    									
/*     ADD THEME STYLE FROM OPTIONS PANEL				
/*                    									
/*------------------------------------------------------------------------------------------------*/
if ( !function_exists( 'radium_load_theme_style') ) {

	function radium_load_theme_style() {
	
		$options = get_option('bean_theme');	
		
		if ( isset( $options['theme_style'] ) ) {
	
			$skin = $options['theme_style'];
		
			if( $skin !== 'default' OR '' )	
				wp_enqueue_style( $skin, BEAN_STYLES_URL.'/'.$skin.'/style.css', false,'1.0','all');
		}
	
	}
	add_action('wp_enqueue_scripts', 'radium_load_theme_style');
}