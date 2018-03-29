<?php /* Video Post Format */ ?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>				

	<div class="entry-content-media">
	   
		<?php 
		$embed = get_post_meta($post->ID, '_radium_video_embed', true);
		if( !empty($embed) ) {
		echo "<div class='video-frame'>";
		echo stripslashes(htmlspecialchars_decode($embed));
		echo "</div>";
		} else {
		radium_video($post->ID);
		} ?>

	 </div><!-- END .entry-content-media -->
	 	
	<header class="entry-header clearfix">
	
		<?php if( is_singular() ) { ?>
			
			<h2 class="entry-title"><?php the_title(); ?></h2> 
			
			<?php bean_post_meta(); ?>
			
			<?php if(!empty($post->post_excerpt)) { ?><h4><?php the_excerpt(); ?></h4><?php } ?>
			
		<?php } else { ?>
		
			<h2 class="entry-title">
				
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bean' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				
				<?php bean_new_tag(); ?>
				
			</h2>
			
			<?php bean_post_meta(); ?>
		
		<?php } ?>

	</header><!-- .entry-header -->
			
	<article class="entry-content">	
			
		<?php the_content( __( '<span>Continue Reading</span>', 'bean' ) ); ?>
	
	</article><!-- END .entry-content -->	
	
</section><!-- END #post-<?php the_ID(); ?> -->