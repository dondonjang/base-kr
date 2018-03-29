<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Sticky Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget to display sticky featured posts.
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_sticky' );

// REGISTER WIDGET
function reg_bean_sticky() {
	register_widget( 'Bean_Sticky_Widget' );
}

// WIDGET CLASS
class Bean_Sticky_Widget extends WP_Widget {


/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_sticky', // BASE ID
		'Sticky Widget ', // NAME
		array( 'description' => __( 'A custom widget to display sticky featured posts.', 'bean' ), )
	);
}
	
	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );
	
	$title = apply_filters('widget_title', $instance['title'] );

	// WIDGET VARIABLES
	$category_count1 = $instance['category_count1'];
	$displaycount = $instance['displaycount'];
	$viewmore_btn = $instance['viewmore_btn'];
	
	// BEFORE WIDGET
	echo $before_widget; ?>
	
	<div class="bean-category">	
	
		<?php 
		// STICKY QUERY
		$sticky = get_option('sticky_posts');

		query_posts( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1, 'showposts' => $category_count1 ) );
	
		// WIDGET TITLE
		if ( $title ) echo $before_title . $title . $after_title;
					
		// CATEGORY COUNT
		if($displaycount != '') : ?><span class="number"><?php echo count($sticky)  ?></span><?php endif; 
		?>
		
		<ul>	
		
			<?php 
			// THE LOOP
			if (have_posts()) : while (have_posts()) : the_post(); ?>			
				
				<li class="cat">
				
					<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), '10' ); ?></a>
					
					<?php  
					// NEW TAG FOR NEWEST POST < THREE DAYS OLD 
					$postdate = the_date('Y-m-d','','',false);
					$threedaysago = date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")));
					
					// OUTPUT NEW TAG
					if ($postdate > $threedaysago) { echo'<span class="new-tag">'; _e( 'New', 'bean' ); echo'</span>'; }
					?>
	
					<?php 
					
					if($viewmore_btn != '') : 
					
					echo'<span class="meta-views">'; echo bean_get_post_views(get_the_ID()); _e( 'views', 'bean' );  echo'</span>';
					
					endif; ?>
				
				</li>
			
			<?php endwhile; endif; wp_reset_query(); ?>
		
		</ul>	
				
	</div><!-- END .bean-category -->	
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
	$instance['category_count1'] = stripslashes( $new_instance['category_count1'] );
	$instance['displaycount'] = strip_tags( $new_instance['displaycount'] );	
	$instance['viewmore_btn'] = strip_tags( $new_instance['viewmore_btn'] );	

	return $instance;
}
	
	
/*--------------------------------------------------------------------*/
/*	WIDGET SETTINGS (FRONT END PANEL)
/*--------------------------------------------------------------------*/ 
function form( $instance ) {

	// WIDGET DEFAULTS
	$defaults = array(
		'title'			  => 'Featured Articles.',
		'category_count1' => '5',
		'displaycount'    => true,
		'viewmore_btn'    => true
		);
		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
	<p style="margin: 10px 0px 20px; color: #868996;"><?php _e('This custom widget features your sticky posts, across any category.', 'bean') ?></p>
		
	<table style="margin-left: -2px;">
		<tr>
			<td width="75%">	
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'bean') ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</td>
			
			<td width="25%">	
				<label for="<?php echo $this->get_field_id( 'category_count1' ); ?>"><?php _e('Count:', 'bean') ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'category_count1' ); ?>" name="<?php echo $this->get_field_name( 'category_count1' ); ?>" value="<?php echo $instance['category_count1']; ?>" />
			</td>
		</tr>
	</table>
	
	<br/>
	
	<p style="margin-top: 3px;">
		<?php if ($instance['displaycount']){ ?>
			<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'displaycount' ); ?>" name="<?php echo $this->get_field_name( 'displaycount' ); ?>" checked="checked" />
		<?php } else { ?>
			<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'displaycount' ); ?>" name="<?php echo $this->get_field_name( 'displaycount' ); ?>"  />
		<?php } ?>
		
		<label for="<?php echo $this->get_field_id( 'displaycount' ); ?>"><?php _e('&nbsp;Display Post Total Counts', 'bean') ?></label>
	</p>
	<p>
		<?php if ($instance['viewmore_btn']){ ?>
			<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'viewmore_btn' ); ?>" name="<?php echo $this->get_field_name( 'viewmore_btn' ); ?>" checked="checked" />
		<?php } else { ?>
			<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'viewmore_btn' ); ?>" name="<?php echo $this->get_field_name( 'viewmore_btn' ); ?>"  />
		<?php } ?>
		
		<label for="<?php echo $this->get_field_id( 'viewmore_btn' ); ?>"><?php _e('&nbsp;Display "View All" Button', 'bean') ?></label>
	</p>
	
	<br/>

  	<?php
	} // END FORM

} // END CLASS
?>