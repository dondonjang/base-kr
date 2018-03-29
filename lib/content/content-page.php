<?php /* Default Page Content */ ?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
		
	<div class="entry-content">
	
		<?php the_content(); ?>

	</div><!-- END .entry-content -->
 	
</section><!-- END #post-<?php the_ID(); ?> -->
