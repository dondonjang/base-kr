<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Social Profiles Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget that displays your social profiles.
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_social_profiles' );

// REGISTER WIDGET
function reg_bean_social_profiles() {
	register_widget( 'Bean_Social_Profiles_Widget' );
}

// WIDGET CLASS
class Bean_Social_Profiles_Widget extends WP_Widget {


/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_social_profiles', // BASE ID
		'Social Profiles ', // NAME
		array( 'description' => __( 'A widget that displays your social profiles', 'bean' ), )
	);
}
	
	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );

	// WIDGET VARIABLES
	$title = apply_filters('widget_title', $instance['title'] );
	
	$twitter = $instance['twitter'];
	$facebook = $instance['facebook'];
	$googleplus = $instance['googleplus'];
	$linkedin = $instance['linkedin'];
	$zerply = $instance['zerply'];
	$rss = $instance['rss'];
	$dribbble = $instance['dribbble'];
	$vimeo = $instance['vimeo'];
	$youtube = $instance['youtube'];
	$forrst = $instance['forrst'];
	$flickr = $instance['flickr'];
	$digg = $instance['digg'];
	$github = $instance['github'];
	$pinterest = $instance['pinterest'];
	$stumbleupon = $instance['stumbleupon'];
	$delicious = $instance['delicious'];
	$foursquare = $instance['foursquare'];
	$behance = $instance['behance'];
		
	// BEFORE WIDGET
	echo $before_widget;

	/* Display Widget */
	/* Display the widget title if one was input (before and after defined by themes). */
	if ( $title ) echo $before_title . $title . $after_title; 
	
	?>
	
	<div class="bean-social-profiles clearfix">                        
	                   	
	    <ul>
			<?php if($twitter != '') : ?>
			    <li class="twitter">
			        <a href="<?php echo $twitter; ?>" title="Twitter"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($facebook != '') : ?>
			    <li class="facebook">
			        <a href="<?php echo $facebook; ?>" title="Facebook"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($googleplus != '') : ?>
			    <li class="googleplus">
			        <a href="<?php echo $googleplus; ?>" title="Google Plus"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($linkedin != '') : ?>
			    <li class="linkedin">
			        <a href="<?php echo $linkedin; ?>" title="LinkedIn"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($zerply != '') : ?>
			    <li class="zerply">
			        <a href="<?php echo $zerply; ?>" title="Zerply"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($rss != '') : ?>
			    <li class="rss">
			        <a href="<?php echo $rss; ?>" title="RSS Feed"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($dribbble != '') : ?>
			    <li class="dribbble">
			        <a href="<?php echo $dribbble; ?>" title="Dribbble"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($vimeo != '') : ?>
			    <li class="vimeo">
			        <a href="<?php echo $vimeo; ?>" title="Vimeo"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($youtube != '') : ?>
			    <li class="youtube">
			        <a href="<?php echo $youtube; ?>" title="YouTube"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($forrst != '') : ?>
			    <li class="forrst">
			        <a href="<?php echo $forrst; ?>" title="Forrst"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($flickr != '') : ?>
			    <li class="flickr">
			        <a href="<?php echo $flickr; ?>" title="Flickr"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($digg != '') : ?>
			    <li class="digg">
			        <a href="<?php echo $digg; ?>" title="Digg"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($github != '') : ?>
			    <li class="github">
			        <a href="<?php echo $github; ?>" title="Github"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($pinterest != '') : ?>
			    <li class="pinterest">
			        <a href="<?php echo $pinterest; ?>" title="Pinterest"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($stumbleupon != '') : ?>
			    <li class="stumbleupon">
			        <a href="<?php echo $stumbleupon; ?>" title="Stumble Upon"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($delicious != '') : ?>
			    <li class="delicious">
			        <a href="<?php echo $delicious; ?>" title="Delicious"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($foursquare != '') : ?>
			    <li class="foursquare">
			        <a href="<?php echo $foursquare; ?>" title="FourSquare"></a>
			    </li>
			<?php endif; ?>
			
			<?php if($behance != '') : ?>
			    <li class="behance">
			        <a href="<?php echo $behance; ?>" title="Behance"></a>
			    </li>
			<?php endif; ?>
			
		</ul>		
	
	</div>	<!-- END .bean-social-profiles clearfix -->		
	
	<?php
		
	// AFTER WIDGET
	echo $after_widget;
}


/*--------------------------------------------------------------------*/
/*	UPDATE WIDGET
/*--------------------------------------------------------------------*/
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	// STRIP TAGS TO REMOVE HTML - IMPORTANT FOR TEXT IMPUTS
	$instance['title'] = strip_tags( $new_instance['title'] );
	
	// NO NEED TO STRIP TAGS
	$instance['twitter'] = $new_instance['twitter'];
	$instance['facebook'] = $new_instance['facebook'];
	$instance['googleplus'] = $new_instance['googleplus'];
	$instance['linkedin'] = $new_instance['linkedin'];
	$instance['zerply'] = $new_instance['zerply'];
	$instance['rss'] = $new_instance['rss'];
	$instance['dribbble'] = $new_instance['dribbble'];
	$instance['vimeo'] = $new_instance['vimeo'];
	$instance['youtube'] = $new_instance['youtube'];
	$instance['forrst'] = $new_instance['forrst'];
	$instance['flickr'] = $new_instance['flickr'];
	$instance['digg'] = $new_instance['digg'];
	$instance['github'] = $new_instance['github'];
	$instance['pinterest'] = $new_instance['pinterest'];
	$instance['stumbleupon'] = $new_instance['stumbleupon'];
	$instance['delicious'] = $new_instance['delicious'];
	$instance['foursquare'] = $new_instance['foursquare'];
	$instance['behance'] = $new_instance['behance'];
			
	return $instance;
}


/*--------------------------------------------------------------------*/
/*	WIDGET SETTINGS (FRONT END PANEL)
/*--------------------------------------------------------------------*/	
function form( $instance ) {

	// WIDGET DEFAULTS
	$defaults = array(
		'title' => 'Social Profiles',	
		'twitter' => 'https://twitter.com/ThemeBeans',
		'facebook' => 'http://www.facebook.com/ThemeBeans',
		'googleplus' => '',
		'linkedin' => '',
		'zerply' => '',
		'rss' => '',
		'dribbble' => 'http://dribbble.com/ThemeBeans',
		'vimeo' => '',
		'youtube' => '',
		'forrst' => '',
		'flickr' => '',
		'digg' => '',
		'github' => '',
		'pinterest' => '',
		'stumbleupon' => '',
		'delicious' => '',
		'foursquare' => '',
		'behance' => '',
	);
		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
 	
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
		
	<p>
		<label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e('Behance URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo $instance['behance']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'delicious' ); ?>"><?php _e('Delicious URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'delicious' ); ?>" name="<?php echo $this->get_field_name( 'delicious' ); ?>" value="<?php echo $instance['delicious']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'digg' ); ?>"><?php _e('Digg URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'digg' ); ?>" name="<?php echo $this->get_field_name( 'digg' ); ?>" value="<?php echo $instance['digg']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e('Dribbble URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $instance['dribbble']; ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" />
	</p>	
	
	<p>
		<label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e('Flickr URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo $instance['flickr']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'forrst' ); ?>"><?php _e('Forrst URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'forrst' ); ?>" name="<?php echo $this->get_field_name( 'forrst' ); ?>" value="<?php echo $instance['forrst']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'foursquare' ); ?>"><?php _e('FourSquare URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'foursquare' ); ?>" name="<?php echo $this->get_field_name( 'foursquare' ); ?>" value="<?php echo $instance['foursquare']; ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e('Github URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" value="<?php echo $instance['github']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e('Google Plus URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" value="<?php echo $instance['googleplus']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('LinkedIn URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $instance['pinterest']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e('RSS URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $instance['rss']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'stumbleupon' ); ?>"><?php _e('StumbleUpon URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'stumbleupon' ); ?>" name="<?php echo $this->get_field_name( 'stumbleupon' ); ?>" value="<?php echo $instance['stumbleupon']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e('Vimeo URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $instance['vimeo']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e('YouTube URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'zerply' ); ?>"><?php _e('Zerply URL:', 'bean') ?></label>
		<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'zerply' ); ?>" name="<?php echo $this->get_field_name( 'zerply' ); ?>" value="<?php echo $instance['zerply']; ?>" />
	</p>
  	
	<br>
		
	<?php
	} // END FORM

} // END CLASS
?>