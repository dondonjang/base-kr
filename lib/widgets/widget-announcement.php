<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Announcement Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget to display a announcement.
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_announcement' );

// REGISTER WIDGET
function reg_bean_announcement() {
	register_widget( 'Bean_Announcement_Widget' );
}

// WIDGET CLASS
class Bean_Announcement_Widget extends WP_Widget {


/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_announcement', // BASE ID
		'Announcement', // NAME
		array( 'description' => __( 'A custom widget to display a announcement.', 'bean' ), )
	);
}
	
	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );
	
	// WIDGET VARIABLES
	$announce_text = $instance['announce_text'];
	$style_change = $instance['style_change'];

	// BEFORE WIDGET
	echo $before_widget;

	?> 
	
	<?php if($announce_text != '') : ?>
	  
		<div class="bean-announcement <?php if($style_change != '') : ?>flatty<?php endif; ?>">
			
			<p><?php echo $announce_text; ?></p>	
	
		</div><!--END .bean-announcement-->  
	  
	<?php endif;

	// AFTER WIDGET
	echo $after_widget;
}


/*--------------------------------------------------------------------*/
/*	UPDATE WIDGET
/*--------------------------------------------------------------------*/
function update( $new_instance, $old_instance ) {
	
	$instance = $old_instance;
	
	// STRIP TAGS TO REMOVE HTML - IMPORTANT FOR TEXT IMPUTS
	$instance['announce_text'] = stripslashes( $new_instance['announce_text'] );
	$instance['style_change'] = strip_tags( $new_instance['style_change'] );

	return $instance;
}
	
	
/*--------------------------------------------------------------------*/
/*	WIDGET SETTINGS (FRONT END PANEL)
/*--------------------------------------------------------------------*/ 
function form( $instance ) {

	// WIDGET DEFAULTS
	$defaults = array(
		'announce_text' => 'Looking for some customizations? We’ve got you covered. Contact us at venenatis dapibus posuere velit aliquet. Aenean eu leo quam pellentesq.',
		'style_change' => false
		);
		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<textarea class="widefat" rows="6" cols="15" id="<?php echo $this->get_field_id( 'announce_text' ); ?>" name="<?php echo $this->get_field_name( 'announce_text' ); ?>"><?php echo $instance['announce_text']; ?></textarea>
	</p>
		
	<p>
	<?php if ($instance['style_change']){ ?>
	<input type="checkbox" id="<?php echo $this->get_field_id( 'style_change' ); ?>" name="<?php echo $this->get_field_name( 'style_change' ); ?>" checked="checked" />
	<?php } else { ?>
	<input type="checkbox" id="<?php echo $this->get_field_id( 'style_change' ); ?>" name="<?php echo $this->get_field_name( 'style_change' ); ?>"  />
	<?php } ?>
	
	<label for="<?php echo $this->get_field_id( 'style_change' ); ?>"><?php _e('&nbsp;Make it Flat', 'bean') ?></label>
	</p>
	
		
  	<?php
	} // END FORM

} // END CLASS
?>