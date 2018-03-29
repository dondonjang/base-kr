<?php /* Audio Post Format */ ?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>			
	
	<header class="entry-header clearfix">
	
	<div class="entry-content-media-audio">
		
		<?php 
		
		$thumb_w = 870; //Define width
		$thumb_h = 653; // Define height
		
		$thumb = get_post_thumbnail_id();
		$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the image is too big)
		$image = radium_resize( $img_url, $thumb_w, $thumb_h, true ); //resize & crop the image
		
		if($image) : ?>	
	
			<div class="entry-content-media">
			
				<div class="post-thumb">
				
					<img src="<?php echo $image; ?>" class="wp-post-image" width="<?php echo $thumb_w; ?>" height="<?php echo $thumb_h; ?>" alt="" />
				
				</div><!-- END .post-thumb -->
			
			</div><!-- .entry-content-media -->
		
		<?php radium_audio($post->ID);
			
		else: ?>
			
		<div class="audio-no-feat">
		
			<?php radium_audio($post->ID); ?>
		
		</div><!-- END .audio-no-feat -->
		
		<?php  endif; ?>
	
	</div><!-- END .entry-content-media-audio -->		
					
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