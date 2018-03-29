<?php /* The Search */ ?>

<?php get_header(); ?>

	<?php 
	
	global $query_string;
	
	query_posts( $query_string . '&posts_per_page=-1' );
	
	if ( have_posts() ) : ?>
	
	<?php $options = get_option('bean_theme'); if ( isset( $options['index_sidebar'] ) ) { $layout = $options['index_sidebar']; ?>
	
		<div id="main-container" class="twelve animated BeanFadeIn"> 
		
			<div class="row">
			 	
				<div class="<?php if ( $layout == 'sidebar_right') { ?>seven columns<?php } else { ?>seven columns push-five<?php } ?> clearfix" role="main">
			
					<?php  
					
					$i = 0;
				
					while (have_posts()) : the_post();
					
					$format = get_post_format(); 
					
					if( false === $format ) { $format = 'standard'; }
					if( $format == 'gallery' || $format == 'image') { }
					
					get_template_part( 'lib/content/content', $format );
					
					endwhile; 
					
					?>
		
				</div><!-- END $bean_content_class -->	
				
				<aside class="sidebar <?php if ( $layout == 'sidebar_right') { ?>five columns sidebar-right<?php } else { ?>sidebar-left five columns pull-seven<?php } ?> hide-for-small" role="complementary">
					
					<?php get_sidebar(); ?>
				
				</aside><!-- END #sidebar -->
				
			</div><!-- END .row -->	
		
		</div><!-- END #main-container -->
		
		<?php } get_footer(); ?>

	<?php else : ?>
	
	<footer>
	
		<div class="footer-btm hide-for-small">
		
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
					
				</div><!-- END .twelve columns -->
			
			</div><!-- END .row -->
		
		</div><!-- END .footer-btm -->
	
	</footer>
	
	<?php wp_footer(); ?>
	
	<?php endif; ?>