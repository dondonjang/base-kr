<?php /* The Base */ ?>

<?php get_header(); ?>

<?php $options = get_option('bean_theme'); if ( isset( $options['index_sidebar'] ) ) { $layout = $options['index_sidebar']; ?>

<div id="main-container" class="twelve animated BeanFadeIn"> 

	<div class="row">

		<div class="<?php if ( $layout == 'sidebar_right') { ?>seven columns<?php } else { ?>seven columns push-five<?php } ?> clearfix" role="main">


			<?php if (have_posts()) : while (have_posts()) : the_post(); 
			
			$format = get_post_format(); 
			if( false === $format ) { $format = 'standard'; }
			if( $format == 'gallery' || $format == 'image') { }
			
			get_template_part( 'lib/content/content', $format ); 
			
			endwhile; 
			
			endif; 
			
		echo bean_index_pagination(); 
			
			?>
			
		</div><!-- END $bean_content_class -->

		<aside class="sidebar <?php if ( $layout == 'sidebar_right') { ?>five columns sidebar-right<?php } else { ?>sidebar-left five columns pull-seven<?php } ?> hide-for-small" role="complementary">
			
			<?php get_sidebar(); ?>
		
		</aside><!-- END #sidebar -->
			
	</div><!-- END .row -->	

</div><!-- END #main-container -->
	
<?php } get_footer(); ?>