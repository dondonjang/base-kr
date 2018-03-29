<?php /* Single Post */ ?>

<?php get_header(); ?>

<?php $options = get_option('bean_theme'); bean_sidebar_loader(); bean_set_post_views(get_the_ID()); ?>

<div id="main-container" class="twelve animated BeanFadeIn"> 

	<div class="row">
	
		<div class="<?php echo $bean_content_class; ?> clearfix" role="main">
		
			<?php do_action('bean_before_post'); ?>

			<?php if ( isset($options['reading_time'] ) ) {
			
				$mycontent = $post->post_content; 
				$word = str_word_count(strip_tags($mycontent));
				$m = floor($word / 200);
				$s = floor($word % 200 / (200 / 60));
				$est = $m . ' minute' . ($m == 1 ? '' : 's') . ', ' . $s . ' sec' . ($s == 1 ? '' : 's');
				?>
			
				<span class="new-tag reading"><?php _e( 'Reading Time: ', 'bean' ); ?><?php echo $est; ?></span>

			<?php } // END READING TIME TAG ?>
			
			<?php
			// THE LOOP
			if (have_posts()) : 
			
			while (have_posts()) : the_post();
			
			$format = get_post_format(); 
			
			if( false === $format ) { $format = 'standard'; }
			if( $format == 'gallery' || $format == 'image') { }
			
			get_template_part( 'lib/content/content', $format );
			
			endwhile; 
			
			do_action('bean_after_post');
			
			?>	

			<?php if (isset($options['related_posts'] ) ){ ?>
			
				<div class="related-posts bean-category">
							
					<ul>
						<?php 
						// GRAB THE RELATED POSTS
						$tags = wp_get_post_tags($post->ID); 
						$i = 1; 
						
						// RELATED VIA TAGS
						if ($tags) { _e('<h3>Related Articles.</h3>', 'radium');
							$tag_ids = array(); 
							foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id; 
								$args=array('tag__in' => $tag_ids, 'post__not_in' => array($post->ID), 'showposts'=>5, 'ignore_sticky_posts'=>1 ); // 5 IS CURRENT NUMBER OF POSTS 
								$my_query = new wp_query($args); 
							if( $my_query->have_posts() ) { while ($my_query->have_posts()) { $i++; $my_query->the_post(); 
						?>
						
						<li class="cat">
						
							<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'radium' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
						
							<span class="meta-views"><?php echo bean_get_post_views(get_the_ID()); _e( 'views', 'bean' );?></span>
						
						</li><!-- END li.cat -->
						
						<?php } } } wp_reset_query(); ?>
					</ul>
							
				</div><!-- END .related-posts -->	
						
			<?php } ?>			
			
			<?php // COMMENTS & COMMENT FORM
			if( bean_theme_supports( 'comments', 'posts' ) && ( comments_open() || '0' != get_comments_number() )  ) comments_template( '', true ); endif; ?>	
		
		</div><!-- END $bean_content_class -->
	
		<?php if( $bean_sidebar_location === 'left' || $bean_sidebar_location === 'right' ) { ?>
		
			<aside class="sidebar <?php echo $bean_sidebar_class; ?> hide-for-small" role="complementary">
				
				<?php get_sidebar(); ?>
			
			</aside><!-- END #sidebar -->
		
		<?php } // END SIDEBAR LEFT OR RIGHT ?>
	
	</div><!-- END .row -->

</div><!-- END #main-container -->

<script type="text/javascript">
	jQuery(window).load(function(){ 		
		if(jQuery().validate) { jQuery("#commentform").validate(); }		
		});
</script>

<?php get_footer(); ?>