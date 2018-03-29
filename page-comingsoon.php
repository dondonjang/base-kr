<?php /* Template Name: Coming Soon */ ?>

<?php get_header(); ?>

<?php // CUSTOM INFO VIA THEME OPTIONS
$options = get_option('bean_theme'); 
if (isset($options['comingsoon_year'] )) { $years = $options['comingsoon_year']; }
if (isset($options['comingsoon_month'] )) { $months = $options['comingsoon_month']; }
if (isset($options['comingsoon_day'] )) { $days = $options['comingsoon_day']; }
?>

<div id="main-container" class="twelve animated BeanFadeIn"> 

	<div class="row">
			
		<div class="twelve columns mobile-four">	
		
			<h1 class="entry-title"><?php the_title(''); ?></h1>
			
			<?php 
			// THE LOOP
			while ( have_posts() ) : 
				the_post(); get_template_part( 'lib/content/content', 'page' );  
			endwhile; // END OF THE LOOP
			?>
		
		</div><!-- END .twelve columns mobile-four -->
			
		<div class="bean-coming-soon" data-years="<?php echo $years ?>" data-months="<?php echo $months ?>" data-days="<?php echo $days ?>" data-hours="00" data-minutes="00" data-seconds="00">

			<div class="three columns mobile-two animated BeanFadeIn days">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text"><?php _e( 'Days', 'bean' ); ?></div></h6>
					</div><!-- END .animated BeanFadeIn -->
				</div><!-- END .count-inner -->	
			</div><!-- END .days -->

			<div class="three columns mobile-two animated BeanFadeIn hours">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text"><?php _e( 'Hours', 'bean' ); ?></div></h6>
					</div><!-- END .animated BeanFadeIn -->		
				</div><!-- END .count-inner -->		
			</div><!-- END .hours -->	

			<div class="three columns mobile-two animated BeanFadeIn minutes">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text"><?php _e( 'Minutes', 'bean' ); ?></div></h6>
					</div><!-- END .animated BeanFadeIn -->
				</div><!-- END .count-inner -->		
			</div><!-- END .minutes -->
				
			<div class="three columns mobile-two animated BeanFadeIn seconds">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text"><?php _e( 'Seconds', 'bean' ); ?></div></h6>
					</div><!-- END .animated BeanFadeIn -->
				</div><!-- END .count-inner -->		
			</div><!-- END .seconds -->	
			
		</div><!-- END bean-coming-soon -->

	</div><!-- END .row -->	
	
</div><!-- END #primary-container -->	

<?php get_footer(); ?>