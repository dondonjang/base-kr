<?php /* Image Post Format */ ?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		

	<header class="entry-header clearfix">
			
		<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?> 
								
		<div class="entry-content-media">
				
			<div class="post-thumb">
			
				<?php if( is_singular() ) { the_post_thumbnail('thumbnail-large'); // DIMENSION SPECIFICS IN /LIB/FUNCTIONS/THEME-SETUP.PHP ?>
						
					<?php } else { ?>
				    
					<a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('thumbnail-large'); ?>
					</a>
												
				<?php } ?>
			
			</div><!-- END .post-thumb -->
	
		</div><!-- END .entry-content-media -->
		
		<?php } ?>
			
			<?php if( is_singular() ) { ?>
			
				<h2 class="entry-title"><?php the_title(); ?></h2> 
				
				<?php bean_post_meta(); ?>
				
				<?php if(!empty($post->post_excerpt)) { ?><h4><?php the_excerpt(); ?></h4><?php } ?>
				
			<?php } else { ?>
			
				<h2 class="entry-title">
				
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bean' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					
					<?php bean_new_tag(); ?>
				
				</h2><!-- END .entry-title -->
				
				<?php bean_post_meta(); ?>
		
			<?php } ?>
			
	</header><!-- .entry-header -->
	
	<article class="entry-content">	
			
		<?php the_content( __( '<span>Continue Reading</span>', 'bean' ) ); ?>
	
	</article><!-- END .entry-content -->	

</section><!-- END #post-<?php the_ID(); ?> -->