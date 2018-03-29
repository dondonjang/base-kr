<!DOCTYPE HTML>
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="no-js ie9" lang="en"><![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name="naver-site-verification" content="c9cbb04941fcecf8e8c29f99f3e6535e7e485c9b"/>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php if (is_404() || is_page_template('page-comingsoon.php') )  { } else { //HIDE HEADER FOR 404 PAGE & COMING SOON ?>
					
 	<div id="responsive-nav" class="show-for-small">
 		
 		<?php radium_dropdown_menu(
				array( 
					'depth' => 0,
					'sort_column' => 'menu_order',
					'theme_location' => 'primary-menu', 
					'dropdown_title' => ' ',
					'indent_string' => '&nbsp;&nbsp;&nbsp;&nbsp;',
					'indent_after' => '',
					'fallback_cb' 		=> 'radium_mobile_nav_fallback_cb'
					) 
				); 
 		?>
 		
	</div><!-- END #responsive-nav --> 	

	<?php if (isset($options['drop_in_header'] ) ) { ?>  
		
		<div class="drop-in-header full">
			
			<div class="row">	
				
				<div class="logo four columns">
				
					<?php do_action( 'bean_header_logo' ); ?>
				
				</div><!-- END .logo -->
			
				<div class="eight columns right">
				
					<?php if ( has_nav_menu( 'dropin-menu' ) ) :
					
						wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_class' => 'main-menu', 'theme_location' => 'dropin-menu' ) );
					
						else : dynamic_sidebar( 'Drop In Header' );
					
						endif; 
					?>
				
				</div><!-- END .eight columns -->
				
			</div><!-- END .row -->
		
		</div><!-- END .drop-in-header full -->
	
	<?php } // END IF DROP IN HEADER IS SELECTED ?>

	<div id="header-container">
	
		<div class="row">		
				
			<div class="header-navigation">
				
				<div class="logo three columns">
				
					<?php base_site_logo(); ?>
				
				</div><!-- END .logo -->
			
				<div class="nine columns hide-for-small">	
				
					<nav id="navigation" role="navigation">
											
						<div class="main_menu">
								
							<?php
							if ( function_exists('wp_nav_menu') ) {
								wp_nav_menu( array(
									'theme_location' => 'primary-menu',
									'sort_column' => 'menu_order',
									'menu_class' => 'main-menu',
								));
							}
							?>
							
						</div><!-- END .main_menu -->
							
					</nav><!-- END #navigation -->
				
				</div><!-- END .ten columns -->
					
			</div><!-- END .header-navigation -->
			
			<header id="page-header" class="twelve columns">
			
				<div class="eleven columns centered">
					
					<?php get_template_part( 'lib/content/content', 'header' ); ?>
				
				</div><!-- END .ten columns centered -->
			
			</header><!-- END #page-header -->
			
		</div><!-- END .row -->
		
	</div><!-- END #header-container -->	
	
<?php } //END if (is_404() || is_page_template('page-comingsoon.php') ?>	