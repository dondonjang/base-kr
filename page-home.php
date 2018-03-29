<?php /* Template Name: Home */ ?>

<?php get_header(); bean_sidebar_loader(); $options = get_option('bean_theme'); ?>	

<?php if ( isset( $options['home_layout'] ) ) { $layout = $options['home_layout']; ?>

<?php if ( $layout == 'top_feat_widget' OR $layout == 'top_and_btm') { ?>  
	
	<div class="home-widgets-featured twelve animated BeanFadeIn">
	
		<div class="row">
		
			<div class="twelve">
			
				<?php if ( !dynamic_sidebar( 'Home Top Feature' ) ): endif; ?>
				
			</div><!-- END .twelve columns -->
	
		</div><!-- END .row -->
	
	</div><!-- END .home-widgets-featured -->
	
<?php } // END IF HOME LAYOUT THEME OPTIONSIS SET TO LAYOUT 1 ?> 

<div id="main-container" class="twelve animated BeanFadeIn"> 
	
	<div class="row">
	
		<div class="twelve columns clearfix" role="main">
			
			<?php while ( have_posts() ) : the_post();
		
				get_template_part( 'lib/content/content', 'page' ); 
		
			endwhile; // END OF THE LOOP ?>
		
			<div class="home-widgets">

				<?php if ( !dynamic_sidebar( 'Home Primary' ) ): endif; ?>
			
			</div><!-- END .home-widgets -->
				
		</div><!-- END $bean_content_class -->
	
	</div><!-- END .row -->

</div><!-- END #main-container -->

<?php if ( $layout == 'btm_feat_widget' OR $layout == 'top_and_btm') { ?>

	<div class="home-widgets-featured btm <?php if ( isset( $options['footer_layout'] ) ) { $footerlayout = $options['footer_layout']; if ( $footerlayout == 'none') { echo'no-footer'; } } ?> twelve animated BeanFadeIn">
	
		<div class="row">
		
			<div class="twelve">
			
			<?php if ( $layout == 'top_and_btm') { // CALL DIFFERENT WIDGET AREAS FOR DIFFERENT LAYOUTS
			
			   if ( !dynamic_sidebar( 'Home Bottom Feature' ) ): endif;
				
			 } if ( $layout == 'btm_feat_widget') {
			
			   if ( !dynamic_sidebar( 'Home Top Feature' ) ): endif;
			
			 } ?>
				
			</div><!-- END .twelve columns -->
		
		</div><!-- END .row -->
	
	</div><!-- END .home-widgets-featured -->

<?php } } // END IF HOME LAYOUT THEME OPTIONSIS SET TO LAYOUT 2 (OR 4) ?> 

<?php get_footer(); ?>