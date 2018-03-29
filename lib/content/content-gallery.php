<?php /* Gallery Post Format */ ?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	

	<header class="entry-header clearfix">
			
		<div class="entry-content-media clearfix">
			
			<?php
			$thumb_w = 960; //Define width
			$thumb_h = 720; // Define height
			radium_gallery( $post->ID, $thumb_w, $thumb_h, true ); 
			?>
		
		</div><!-- END .entry-content-media clearfix -->	

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