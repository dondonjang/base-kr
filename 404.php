<?php /* 404 Template */ ?>

<?php get_header(); ?>

<div id="main-container" class="Bean404Bounce animated">

	<div class="row seven columns left">
	
		<div class="logo">
		
			<?php do_action( 'bean_header_logo' ); ?>
		
		</div><!-- END .logo -->
	
		<h1><?php do_action('bean_404_error_text'); ?></h1>
		
		<h4><?php do_action('bean_404_error_p'); ?></h4>
		
		<a class="btn" href="javascript:javascript:history.go(-1)"><?php do_action('bean_404_btn'); ?></a><!-- END .btn -->
		
	</div><!-- END .seven columns left -->
	
</div><!-- END #main-container -->

<?php get_footer(); ?>