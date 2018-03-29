<?php /* Template Name: Archives */ ?>

<?php get_header(); ?>

<?php $options = get_option('bean_theme'); bean_sidebar_loader(); ?>

<div id="main-container" class="twelve animated BeanFadeIn"> 
	
	<div class="row">
	
		<div class="<?php echo $bean_content_class; ?> clearfix" role="main">
		
			<?php 
			
			while ( have_posts() ) : the_post();
			
			get_template_part( 'lib/content/content', 'page' ); 
			
			endwhile; // END OF THE LOOP		
			?>
			
			<div class="archives">
			
			<?php $sitemap_content = isset($options['archives_content']) ? $options['archives_content'] : false;
			
				if ( $sitemap_content && array_key_exists('posts', $sitemap_content)) { ?>
			
					<h5 class="entry-header"><?php do_action('bean_archive_all_text'); ?></h5>
				   	
				   	<div class="archives-list">
		
				         <ul>
				             <?php $archive_query = new WP_Query('showposts=60');
				             
				             while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
				             
				             <li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
				         	
				         	<?php endwhile; ?>
				      	
				      	</ul>
				   
				   </div><!-- END .archives-list -->
			
				<?php } if ( $sitemap_content && array_key_exists('latest', $sitemap_content) ) { ?>
				
				   	<h5 class="entry-header"><?php do_action('bean_archive_latest'); ?></h5>
			   		
			   		<div class="archives-list">
				   		
				   		<ul>
				   		
				   		<?php $archive_30 = get_posts('numberposts=30');
				   			
				   			foreach($archive_30 as $post) : ?>
				   			
				   			<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
				   		
				   			<?php endforeach; ?>
				   		
				   		</ul>
			   		
			   		</div><!-- END .archives-list -->
	
				<?php } if ( $sitemap_content && array_key_exists('month', $sitemap_content)) { ?>
							  
				   	<h5 class="entry-header"><?php do_action('bean_archive_monthly'); ?></h5>
				   	
				   	<div class="archives-list">
				   
				   		<ul><?php wp_get_archives('type=monthly'); ?></ul>
				   
				   	</div><!-- END .archives-list -->
				
				<?php } if ( $sitemap_content && array_key_exists('category', $sitemap_content)) { ?>
					   
				   	<h5 class="entry-header"><?php do_action('bean_archive_category'); ?></h5>
				   	
				   	<div class="archives-list">
				   	
				   		<ul><?php wp_list_categories( 'title_li=' ); ?></ul>
				   
				   	</div><!-- END .archives-list -->
						
			 	<?php } if ( $sitemap_content && array_key_exists('pages', $sitemap_content) ) { ?>
	
					<h5 class="entry-header"><?php do_action('bean_archive_sitemap'); ?></h5>
					
					<div class="archives-list">
						
						<ul><?php wp_list_pages('title_li='); ?></ul>
					
					</div><!-- END .archives-list -->
			
			 	<?php } ?>
			
			</div><!-- END .archives -->    
		
		</div><!-- END $bean_content_class -->	
		
		<?php if( $bean_sidebar_location === 'left' || $bean_sidebar_location === 'right' ) { ?>
		
			<aside class="sidebar <?php echo $bean_sidebar_class; ?> hide-for-small" role="complementary">
				
				<?php get_sidebar(); ?>
			
			</aside><!-- END #sidebar -->
		
		<?php } // END SIDEBAR LEFT OR RIGHT ?>
	
	</div><!-- END .row -->
	
</div><!-- END #main-container -->

<?php get_footer(); ?>