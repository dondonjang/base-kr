<?php /* IMAGE ATTACHMENTS */ ?>

<?php get_header(); ?>

<div id="main-container" class="twelve animated BeanFadeIn"> 

	<div class="row">

		<div class="<?php echo $bean_content_class; ?> clearfix" role="main">
	
			<?php while ( have_posts() ) : the_post(); ?>
	
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
					<div class="entry-content">
	
						<div class="entry-attachment">
							
							<div class="attachment">
									
								<?php
								$attachments = array_values( 
								get_children( array( 
								'post_parent' => $post->post_parent, 
								'post_status' => 'inherit', 
								'post_type' => 'attachment', 
								'post_mime_type' => 'image', 
								'order' => 'ASC', 
								'orderby' => 'menu_order ID' 
								) 
								) 
								);
								
								foreach ( $attachments as $k => $attachment ) {
								if ( $attachment->ID == $post->ID )
								break;
								}
								$k++;
								if ( count( $attachments ) > 1 ) {
								if ( isset( $attachments[ $k ] ) )
								$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
								else
								$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
								} else {
								$next_attachment_url = wp_get_attachment_url();
								}
								?>
								
								<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
									<?php
										$attachment_size = apply_filters( 'full', 960 );
										echo wp_get_attachment_image( $post->ID, array( $attachment_size, 1024 ) ); 								?>
								</a>
	
								<?php if ( ! empty( $post->post_excerpt ) ) : ?>
								
									<div class="entry-caption">
									
										<?php the_excerpt(); ?>
									
									</div><!-- END .entry-caption -->
								
								<?php endif; ?>
							
							</div><!-- END .attachment -->
	
						</div><!-- END .entry-attachment -->
	
						<div class="entry-description">
							
							<?php the_content(); ?>
							
							<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bean' ) . '</span>', 'after' => '</div>' ) ); ?>
							
						</div><!-- END .entry-description -->
	
					</div><!-- END .entry-content -->
	
				</article><!-- END #post-<?php the_ID(); ?> -->

			<?php endwhile; // End of the loop. ?>
	
		</div><!-- END #main -->

	</div><!-- END .row -->	

</div><!-- END #main-container -->

<?php get_footer(); ?>