<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Feature Area Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget that displays feature areas.
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_feature_area' );

// REGISTER WIDGET
function reg_bean_feature_area() {
	register_widget( 'Bean_Feature_Area_Widget' );
}

// WIDGET CLASS
class Bean_Feature_Area_Widget extends WP_Widget {


/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_feature_area', // BASE ID
		'Home Feature Widget ', // NAME
		array( 'description' => __( 'A widget that displays feature areas.', 'bean' ), )
	);
}
	
	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );

	// WIDGET VARIABLES
	
	// GLOBAL
	$js_turn_on = $instance['js_turn_on'];
	$icon_color = $instance['icon_color'];
	// PANEL 1
	$title1  = $instance['title1'];
	$icon1   = $instance['icon1'];
	$intro1  = $instance['intro1'];
	$desc1   = $instance['desc1'];
	$link1   = $instance['link1'];
	$btn1    = $instance['btn1'];
	// PANEL 2
	$title2  = $instance['title2'];
	$icon2   = $instance['icon2'];
	$intro2  = $instance['intro2'];
	$desc2   = $instance['desc2'];
	$link2   = $instance['link2'];
	$btn2    = $instance['btn2'];
	// PANEL 3
	$title3  = $instance['title3'];
	$icon3   = $instance['icon3'];
	$intro3  = $instance['intro3'];
	$desc3   = $instance['desc3'];
	$link3   = $instance['link3'];
	$btn3    = $instance['btn3'];
	
	// BEFORE WIDGET
	echo $before_widget;

	?> 
	
	<?php if($title1 && $intro1 != '') : // REQUIRES TITLE & FRONT TEXT TO DISPLAY PANEL ?>
	
		<div class="bean-flip-panel animated BeanFadeIn hover <?php if($title1 && $intro1 && $title2 && $intro2 && $title3 && $intro3 != '') : ?>four<?php elseif($title1 && $intro1 && $title2 && $intro2 != '' ) : ?>six<?php else :?>twelve<?php endif;?> columns mobile-four">
		
			<div class="front">
			
				<div class="feature-icon <?php echo $icon1; ?>"><?php if($icon_color != '') : ?>
				
				<style scoped>.feature-icon { background-color:<?php echo $icon_color; ?>; }</style>
				
				<?php endif; ?></div>
			
				<h2><?php echo $title1; ?></h2>
			
				<p><?php echo $intro1; ?></p>
			
			</div><!-- END .front -->
			
			<?php if($js_turn_on != '') : // HIDE THIS STUFF IF ANIMATION IS TURNED OFF ?>
			
				<div class="back twelve columns">
				
					<h5><?php _e('More Info', 'bean') ?></h5>
				
					<p><?php echo $desc1; ?></p>
				
					<?php if($link1 && $btn1 != '') : // REQUIRES LINK & BUTTON TEXT TO DISPLAY BUTTON ?>
					
						<a href="<?php echo $link1; ?>" class="base-button"><?php echo $btn1; ?></a>
				
					<?php endif; // END BUTTON IF ?>
					
				</div><!-- END .back -->
		
			<?php endif; // END ANIMATION IF ?>
			
		</div><!--END .bean-flip-panel hover four columns-->
		
	<?php endif; // END PANEL 1 IF ?>	
	

	
	<?php if($title2 && $intro2 != '') : // REQUIRES TITLE & FRONT TEXT TO DISPLAY PANEL ?>
	
		<div class="bean-flip-panel animated BeanFadeIn hover <?php if($title1 && $intro1 && $title2 && $intro2 && $title3 && $intro3 != '') : ?>four<?php elseif($title1 && $intro1 && $title2 && $intro2 != '' ) : ?>six<?php else :?>twelve<?php endif;?> columns mobile-four">
		
			<div class="front">
			
				<div class="feature-icon <?php echo $icon2; ?>"></div>
			
				<h2><?php echo $title2; ?></h2>
			
				<p><?php echo $intro2; ?></p>
			
			</div><!-- END .front -->
			
			<?php if($js_turn_on != '') : // HIDE THIS STUFF IF ANIMATION IS TURNED OFF ?>
			
				<div class="back twelve columns">
				
					<h5><?php _e('More Info', 'bean') ?></h5>
				
					<p><?php echo $desc2; ?></p>
				
					<?php if($link2 && $btn2 != '') : // REQUIRES LINK & BUTTON TEXT TO DISPLAY BUTTON ?>
					
						<a href="<?php echo $link2; ?>" class="base-button"><?php echo $btn2; ?></a>
				
					<?php endif; // END BUTTON IF ?>
					
				</div><!-- END .back -->
		
			<?php endif; // END ANIMATION IF ?>
			
		</div><!--END .bean-flip-panel hover four columns-->
		
	<?php endif; // END PANEL 2 IF ?>	
	
		
		
	<?php if($title3 && $intro3 != '') : // REQUIRES TITLE & FRONT TEXT TO DISPLAY PANEL ?>
	
		<div class="bean-flip-panel animated BeanFadeIn hover <?php if($title1 && $intro1 && $title2 && $intro2 && $title3 && $intro3 != '') : ?>four<?php elseif($title1 && $intro1 && $title2 && $intro2 != '' ) : ?>six<?php else :?>twelve<?php endif;?> columns mobile-four">
		
			<div class="front">
			
				<div class="feature-icon <?php echo $icon3; ?>"></div>
			
				<h2><?php echo $title3; ?></h2>
			
				<p><?php echo $intro3; ?></p>
			
			</div><!-- END .front -->
			
			<?php if($js_turn_on != '') : // HIDE THIS STUFF IF ANIMATION IS TURNED OFF ?>
			
				<div class="back twelve columns">
				
					<h5><?php _e('More Info', 'bean') ?></h5>
				
					<p><?php echo $desc3; ?></p>
				
					<?php if($link3 && $btn3 != '') : // REQUIRES LINK & BUTTON TEXT TO DISPLAY BUTTON ?>
					
						<a href="<?php echo $link3; ?>" class="base-button"><?php echo $btn3; ?></a>
				
					<?php endif; // END BUTTON IF ?>
					
				</div><!-- END .back -->
		
			<?php endif; // END ANIMATION IF ?>
			
		</div><!--END .bean-flip-panel hover four columns-->
		
	<?php endif; // END PANEL 3 IF ?>			

<?php if($js_turn_on != '') : // TRIGGER SCRIPT ANIMATION IS TURNED ON  ?>
		
	<script type="text/javascript">
		jQuery(document).ready(function($){
		
			$('.hover').hover(function(){
				$(this).addClass('flip');
			},function(){
				$(this).removeClass('flip');
			});	
						
		});
	</script>
	
<?php endif; ?>
	
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
	$instance['js_turn_on'] = strip_tags( $new_instance['js_turn_on'] );
	$instance['icon_color'] = stripslashes( $new_instance['icon_color'] );
	
	$instance['title1'] = stripslashes( $new_instance['title1'] );
	$instance['icon1'] = stripslashes( $new_instance['icon1'] );
	$instance['intro1'] = stripslashes( $new_instance['intro1'] );
	$instance['desc1']  = strip_tags( $new_instance['desc1'] );
	$instance['link1']  = stripslashes( $new_instance['link1'] );
	$instance['btn1']   = strip_tags( $new_instance['btn1'] );
	
	$instance['title2'] = stripslashes( $new_instance['title2'] );
	$instance['icon2'] = stripslashes( $new_instance['icon2'] );
	$instance['intro2'] = stripslashes( $new_instance['intro2'] );
	$instance['desc2']  = strip_tags( $new_instance['desc2'] );
	$instance['link2']  = stripslashes( $new_instance['link2'] );
	$instance['btn2']   = strip_tags( $new_instance['btn2'] );
	
	$instance['title3'] = stripslashes( $new_instance['title3'] );
	$instance['icon3'] = stripslashes( $new_instance['icon3'] );
	$instance['intro3'] = stripslashes( $new_instance['intro3'] );
	$instance['desc3']  = strip_tags( $new_instance['desc3'] );
	$instance['link3']  = stripslashes( $new_instance['link3'] );
	$instance['btn3']   = strip_tags( $new_instance['btn3'] );
	
	return $instance;
}


/*--------------------------------------------------------------------*/
/*	WIDGET SETTINGS (FRONT END PANEL)
/*--------------------------------------------------------------------*/ 
function form( $instance ) {

	// WIDGET DEFAULTS
	$defaults = array(
		'js_turn_on' => true,
		'icon_color' => '#97D798',
		
		'title1' => 'Feature Area 1',
		'icon1' => 'Cog',
		'intro1' => 'Maecenas sed diam eget risus varius blandit sit amet.',
		'desc1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit dsed consecteturs.',
		'link1' => '#',
		'btn1' => 'Click Here',
		
		'title2' => 'Feature Area 2',
		'icon2' => 'Check',
		'intro2' => 'Maecenas sed diam eget risus varius blandit sit amet.',
		'desc2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit dsed consecteturs.',
		'link2' => '#',
		'btn2' => 'Click Here',
		
		'title3' => 'Feature Area 3',
		'icon3' => 'Team',
		'intro3' => 'Maecenas sed diam eget risus varius blandit sit amet.',
		'desc3' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit dsed consecteturs.',
		'link3' => '#',
		'btn3' => 'Click Here',
		);
		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
	<!-- WIDGET INTRODUCTION TEXT -->
	<p style="margin: 10px 0px 15px; color: #868996;"><?php _e('Turn on the flip animation and override the theme accent color. If the animation is on, ensure the  back is entered.', 'bean') ?></p>
	
	<!-- GLOBAL ANIMATION CHECKBOX -->
	<table style="margin-left: -2px; margin-top: -5px;">
	<tr>
		<td width="50%">		
		<?php if ($instance['js_turn_on']){ ?>
		<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'js_turn_on' ); ?>" name="<?php echo $this->get_field_name( 'js_turn_on' ); ?>" checked="checked" />
		<?php } else { ?>
		<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'js_turn_on' ); ?>" name="<?php echo $this->get_field_name( 'js_turn_on' ); ?>"  />
		<?php } ?>
		
		<label for="<?php echo $this->get_field_id( 'js_turn_on' ); ?>"><?php _e('&nbsp;Animate ON', 'bean') ?></label>		</td>
		
		<!-- GLOBAL COLOR OVERRIDE -->
		<td width="50%" style="padding-left: 7px;">	
		<label for="<?php echo $this->get_field_id( 'icon_color' ); ?>"><?php _e('Color:', 'bean') ?></label>
		<input type="text" size="5" id="<?php echo $this->get_field_id( 'icon_color' ); ?>" name="<?php echo $this->get_field_name( 'icon_color' ); ?>" value="<?php echo $instance['icon_color']; ?>" />		</td>
	</tr>
	</table>
	
	
<!-- //// BEGIN PANEL 1 //// -->	
<hr style="opacity: .3; margin: 17px 0px;">
	
	<p>
	<label for="<?php echo $this->get_field_id( 'title1' ); ?>"><?php _e('Panel 1:', 'bean') ?></label>
	
	<!-- 1 ICON SELECT -->
	<p>
	<select id="<?php echo $this->get_field_id( 'icon1' ); ?>" name="<?php echo $this->get_field_name( 'icon1' ); ?>" class="widefat">
		<option <?php if ( 'Basket' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Basket</option>
		<option <?php if ( 'Box' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Box</option>
		<option <?php if ( 'Chat' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Chat</option>
		<option <?php if ( 'Check' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Check</option>
		<option <?php if ( 'Checkbox' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Checkbox</option>
		<option <?php if ( 'Code' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Code</option>
		<option <?php if ( 'Cog' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Cog</option>
		<option <?php if ( 'Compass' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Compass</option>
		<option <?php if ( 'Dashboard' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Dashboard</option>
		<option <?php if ( 'Download' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Download</option>
		<option <?php if ( 'Feedback' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Feedback</option>
		<option <?php if ( 'Globe' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Globe</option>
		<option <?php if ( 'Heart' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Heart</option>
		<option <?php if ( 'iPad' == $instance['icon1'] ) echo 'selected="selected"'; ?>>iPad</option>
		<option <?php if ( 'Puzzle' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Puzzle</option>
		<option <?php if ( 'Papers' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Papers</option>
		<option <?php if ( 'Power' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Power</option>
		<option <?php if ( 'Rocket' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Rocket</option>
		<option <?php if ( 'Scissors' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Scissors</option>
		<option <?php if ( 'Search' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Search</option>
		<option <?php if ( 'Share' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Share</option>
		<option <?php if ( 'Star' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Star</option>
		<option <?php if ( 'Team' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Team</option>
		<option <?php if ( 'Tie' == $instance['icon1'] ) echo 'selected="selected"'; ?>>Tie</option>
	</select>
	</p>	
	
	<!-- 1 TITLE -->
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" value="<?php echo $instance['title1']; ?>" />
	</p>
	
	<!-- 1 INTRO -->
	<p style="margin-top: -8px;">
	<textarea class="widefat" rows="2" cols="15" id="<?php echo $this->get_field_id( 'intro1' ); ?>" name="<?php echo $this->get_field_name( 'intro1' ); ?>"><?php echo $instance['intro1']; ?></textarea>
	</p>
	
	<!-- 1 BACK -->
	<p style="margin-top: -2px;">
	<label for="<?php echo $this->get_field_id( 'desc1' ); ?>"><?php _e('Panel Back:', 'bean') ?> <span style="font-style: italic; ;"><?php _e('(animation required)', 'bean') ?></span></label>
	<textarea class="widefat" rows="2" cols="15" id="<?php echo $this->get_field_id( 'desc1' ); ?>" name="<?php echo $this->get_field_name( 'desc1' ); ?>"><?php echo $instance['desc1']; ?></textarea>
	</p>
	
	<!-- 1 LINK / BUTTON TEXT -->
	<table style="margin-left: -2px; margin-top: -9px;">
	<tr>
		<td width="60%">		
		<label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e('Link:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" value="<?php echo $instance['link1']; ?>" />
		</td>
		
		<td width="40%">	
		<label for="<?php echo $this->get_field_id( 'btn1' ); ?>"><?php _e('Text:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'btn1' ); ?>" name="<?php echo $this->get_field_name( 'btn1' ); ?>" value="<?php echo $instance['btn1']; ?>" />
		</td>
	</tr>
	</table>
	
	
<!-- //// BEGIN PANEL 2 //// -->	
<hr style="opacity: .3; margin: 17px 0px;">
	
	<p>
	<label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php _e('Panel 2:', 'bean') ?></label>
	
	<!-- 2 ICON SELECT -->
	<p>
	<select id="<?php echo $this->get_field_id( 'icon2' ); ?>" name="<?php echo $this->get_field_name( 'icon2' ); ?>" class="widefat">
		<option <?php if ( 'Basket' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Basket</option>
		<option <?php if ( 'Box' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Box</option>
		<option <?php if ( 'Chat' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Chat</option>
		<option <?php if ( 'Check' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Check</option>
		<option <?php if ( 'Checkbox' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Checkbox</option>
		<option <?php if ( 'Code' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Code</option>
		<option <?php if ( 'Cog' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Cog</option>
		<option <?php if ( 'Compass' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Compass</option>
		<option <?php if ( 'Dashboard' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Dashboard</option>
		<option <?php if ( 'Download' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Download</option>
		<option <?php if ( 'Feedback' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Feedback</option>
		<option <?php if ( 'Globe' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Globe</option>
		<option <?php if ( 'Heart' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Heart</option>
		<option <?php if ( 'iPad' == $instance['icon2'] ) echo 'selected="selected"'; ?>>iPad</option>
		<option <?php if ( 'Puzzle' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Puzzle</option>
		<option <?php if ( 'Papers' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Papers</option>
		<option <?php if ( 'Power' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Power</option>
		<option <?php if ( 'Rocket' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Rocket</option>
		<option <?php if ( 'Scissors' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Scissors</option>
		<option <?php if ( 'Search' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Search</option>
		<option <?php if ( 'Share' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Share</option>
		<option <?php if ( 'Star' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Star</option>
		<option <?php if ( 'Team' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Team</option>
		<option <?php if ( 'Tie' == $instance['icon2'] ) echo 'selected="selected"'; ?>>Tie</option>
	</select>
	</p>	
	
	<!-- 2 TITLE -->
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" value="<?php echo $instance['title2']; ?>" />
	</p>
	
	<!-- 2 INTRO -->
	<p style="margin-top: -8px;">
	<textarea class="widefat" rows="2" cols="15" id="<?php echo $this->get_field_id( 'intro2' ); ?>" name="<?php echo $this->get_field_name( 'intro2' ); ?>"><?php echo $instance['intro2']; ?></textarea>
	</p>
	
	<!-- 2 BACK -->
	<p style="margin-top: -2px;">
	<label for="<?php echo $this->get_field_id( 'desc2' ); ?>"><?php _e('Panel Back:', 'bean') ?> <span style="font-style: italic; ;"><?php _e('(animation required)', 'bean') ?></span></label>
	<textarea class="widefat" rows="2" cols="15" id="<?php echo $this->get_field_id( 'desc2' ); ?>" name="<?php echo $this->get_field_name( 'desc2' ); ?>"><?php echo $instance['desc2']; ?></textarea>
	</p>
	
	<!-- 2 LINK / BUTTON TEXT -->
	<table style="margin-left: -2px; margin-top: -9px;">
	<tr>
		<td width="60%">		
		<label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e('Link:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" value="<?php echo $instance['link2']; ?>" />
		</td>
		
		<td width="40%">	
		<label for="<?php echo $this->get_field_id( 'btn2' ); ?>"><?php _e('Text:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'btn2' ); ?>" name="<?php echo $this->get_field_name( 'btn2' ); ?>" value="<?php echo $instance['btn2']; ?>" />
		</td>
	</tr>
	</table>


<!-- //// BEGIN PANEL 3 //// -->	
<hr style="opacity: .3; margin: 17px 0px;">
	
	<p>
	<label for="<?php echo $this->get_field_id( 'title3' ); ?>"><?php _e('Panel 3:', 'bean') ?></label>
	
	<!-- 3 ICON SELECT -->
	<p>
	<select id="<?php echo $this->get_field_id( 'icon3' ); ?>" name="<?php echo $this->get_field_name( 'icon3' ); ?>" class="widefat">
		<option <?php if ( 'Basket' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Basket</option>
		<option <?php if ( 'Box' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Box</option>
		<option <?php if ( 'Chat' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Chat</option>
		<option <?php if ( 'Check' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Check</option>
		<option <?php if ( 'Checkbox' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Checkbox</option>
		<option <?php if ( 'Code' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Code</option>
		<option <?php if ( 'Cog' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Cog</option>
		<option <?php if ( 'Compass' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Compass</option>
		<option <?php if ( 'Dashboard' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Dashboard</option>
		<option <?php if ( 'Download' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Download</option>
		<option <?php if ( 'Feedback' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Feedback</option>
		<option <?php if ( 'Globe' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Globe</option>
		<option <?php if ( 'Heart' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Heart</option>
		<option <?php if ( 'iPad' == $instance['icon3'] ) echo 'selected="selected"'; ?>>iPad</option>
		<option <?php if ( 'Puzzle' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Puzzle</option>
		<option <?php if ( 'Papers' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Papers</option>
		<option <?php if ( 'Power' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Power</option>
		<option <?php if ( 'Rocket' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Rocket</option>
		<option <?php if ( 'Scissors' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Scissors</option>
		<option <?php if ( 'Search' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Search</option>
		<option <?php if ( 'Share' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Share</option>
		<option <?php if ( 'Star' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Star</option>
		<option <?php if ( 'Team' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Team</option>
		<option <?php if ( 'Tie' == $instance['icon3'] ) echo 'selected="selected"'; ?>>Tie</option>
	</select>
	</p>	
	
	<!-- 3 TITLE -->
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" value="<?php echo $instance['title3']; ?>" />
	</p>
	
	<!-- 3 INTRO -->
	<p style="margin-top: -8px;">
	<textarea class="widefat" rows="2" cols="15" id="<?php echo $this->get_field_id( 'intro3' ); ?>" name="<?php echo $this->get_field_name( 'intro3' ); ?>"><?php echo $instance['intro3']; ?></textarea>
	</p>
	
	<!-- 3 BACK -->
	<p style="margin-top: -2px;">
	<label for="<?php echo $this->get_field_id( 'desc3' ); ?>"><?php _e('Panel Back:', 'bean') ?> <span style="font-style: italic; ;"><?php _e('(animation required)', 'bean') ?></span></label>
	<textarea class="widefat" rows="2" cols="15" id="<?php echo $this->get_field_id( 'desc3' ); ?>" name="<?php echo $this->get_field_name( 'desc3' ); ?>"><?php echo $instance['desc3']; ?></textarea>
	</p>
	
	<!-- 3 LINK / BUTTON TEXT -->
	<table style="margin-left: -2px; margin-top: -9px;">
	<tr>
		<td width="60%">		
		<label for="<?php echo $this->get_field_id( 'link3' ); ?>"><?php _e('Link:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" value="<?php echo $instance['link3']; ?>" />
		</td>
		
		<td width="40%">	
		<label for="<?php echo $this->get_field_id( 'btn3' ); ?>"><?php _e('Text:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'btn3' ); ?>" name="<?php echo $this->get_field_name( 'btn3' ); ?>" value="<?php echo $instance['btn3']; ?>" />
		</td>
	</tr>
	</table>

	
	<?php
	} // END FORM

} // END CLASS
?>