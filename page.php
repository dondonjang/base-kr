<?php /* Default Template */ ?>

<?php get_header(); bean_sidebar_loader(); ?>	
		
<div id="main-container" class="twelve animated BeanFadeIn"> 

	<div class="row">

		<div class="<?php echo $bean_content_class; ?> clearfix" role="main">

			<?php 
			
			while ( have_posts() ) : the_post();
			
			get_template_part( 'lib/content/content', 'page' ); 
			
			endwhile; // END OF THE LOOP
			
			?>
			
		</div><!-- END $bean_content_class -->		

		<?php if( $bean_sidebar_location === 'left' || $bean_sidebar_location === 'right' ) { ?>
		
			<aside class="sidebar <?php echo $bean_sidebar_class; ?> hide-for-small" role="complementary">
				
				<?php get_sidebar(); ?>
			
			</aside><!-- END #sidebar -->
		
		<?php } // END SIDEBAR LEFT OR RIGHT ?>
		
	</div><!-- END .row -->	

</div><!-- END #main-container -->

<?php get_footer(); ?>