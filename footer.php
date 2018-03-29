<?php /* Footer */ ?>
	
<?php $options = get_option('bean_theme'); ?>

<?php if (is_404() || is_page_template('page-comingsoon.php') )  { } else { //HIDE HEADER FOR 404 PAGE & COMING SOON ?>

<footer class="animated BeanFadeIn">

	<?php if ( isset( $options['footer_layout'] ) ) { $layout = $options['footer_layout']; ?>
	
		<?php if ( $layout == 'three_widgets') { // START LAYOUT 3 WIDGETS ?>  
		
			<div class="footer-container hide-for-small">
			
				<div class="row">
				
					<div class="four columns">
					
						<?php dynamic_sidebar( 'Footer 1' ) ?>
					
					</div><!-- END .four columns -->
					
					<div class="four columns">
					
						<?php dynamic_sidebar( 'Footer 2' ) ?>
					
					</div><!-- END .four columns -->
					
					<div class="four columns">
					
						<?php dynamic_sidebar( 'Footer 3' ) ?>
					
					</div><!-- END .four columns -->
	
				</div><!-- END .row -->
			
			</div><!-- END .footer-container -->
		
		<?php } if ( $layout == 'five_widgets') { // START LAYOUT 5 WIDGETS ?>  
		
			<div class="footer-container hide-for-small">
			
				<div class="row">
					
					<div class="two columns">
					
						<?php dynamic_sidebar( 'Footer 1' ) ?>
					
					</div><!-- END .two columns -->
					
					<div class="two columns">
					
						<?php dynamic_sidebar( 'Footer 2' ) ?>
					
					</div><!-- END .two columns -->
					
					<div class="two columns">
					
						<?php dynamic_sidebar( 'Footer 3' ) ?>
					
					</div><!-- END .two columns -->
					
					<div class="two columns">
					
						<?php dynamic_sidebar( 'Footer 4' ) ?>
					
					</div><!-- END .two columns -->
					
					<div class="four columns">
					
						<?php dynamic_sidebar( 'Footer 5' ) ?>
					
					</div><!-- END .four columns -->
				
				</div><!-- END .row -->
			
			</div><!-- END .footer-container -->	
	
	<?php } } // END OF LAYOUT OPTIONS ?> 
							
	<div class="footer-btm">
	
		<div class="row">
		
			<div class="twelve columns">
			
				<?php if (function_exists("wp_nav_menu")) : wp_nav_menu(
						array(
							'menu' => 'Footer Nav',
							'sort_column' => 'menu_order',
							'theme_location' => 'footer-menu',
							'container' => 'ul',
							'menu_class' => 'footer-navigation',
							'depth' => '1',
							'after' => '<span class="nav-sep">&middot;</span>',
							));
					   endif; 
				?>
			
				<?php do_action('bean_colophon'); ?>
				
				<?php if (isset($options['footer_social'] ) ) { bean_social_footer(); } ?>
				
			</div><!-- END .twelve columns -->
		
		</div><!-- END .row -->
	
	</div><!-- END .footer-btm -->

</footer>
 	
<?php } bean_analytics(false);  wp_footer(); ?>

<!--<?php echo ''. BEAN_THEME_NAME .' WordPress Theme (ThemeBeans.com) with '. $wpdb->num_queries .' queries in '. timer_stop(0, 2) .' seconds'; ?>-->

</body>

</html>