<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Custom Category Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget to displays up to two categories.
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_category' );

// REGISTER WIDGET
function reg_bean_category() {
	register_widget( 'Bean_Category_Widget' );
}

// WIDGET CLASS
class Bean_Category_Widget extends WP_Widget {


/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_category', // BASE ID
		'Category Widget ', // NAME
		array( 'description' => __( 'A custom widget to displays up to two categories.', 'bean' ), )
	);
}
	
	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );
	
	$title = apply_filters('widget_title', $instance['title'] );
	$title2 = apply_filters('widget_title', $instance['title2'] );

	// WIDGET VARIABLES
	$category_slug1 = $instance['category_slug1'];
	$category_count1 = $instance['category_count1'];
	$category_slug2 = $instance['category_slug2'];
	$category_count2 = $instance['category_count2'];
	$displaycount = $instance['displaycount'];
	$viewmore_btn = $instance['viewmore_btn'];
	
	// BEFORE WIDGET
	echo $before_widget; ?>
	
	
<?php if($title && $category_slug1 && $category_count1 != '') : ?>
	
	<div class="bean-category cats-1 <?php if($title2 && $category_slug2 && $category_count2 != '') : ?>six columns<?php endif; ?> twelve ">		
		<?php 
		// CATEGORY QUERY
		query_posts('category_name=' .$category_slug1. '&showposts=' .$category_count1. ''); 
		$cat = get_cat_ID('' .$category_slug1. ''); $category = get_category( $cat );
		
		// WIDGET TITLE
		if ( $title ) echo $before_title . $title . $after_title;  
		
		// CATEGORY COUNT
		if($displaycount != '') : ?><span class="number"><?php echo ' ' . $category->count; ?></span><?php endif; 
		?>
				
		<ul>
			<?php 
			// THE LOOP
			if (have_posts()) : while (have_posts()) : the_post(); ?>			
				
				<li class="cat">
				
					<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), '6' ); ?></a>
				
				</li>
			
			<?php endwhile; endif; wp_reset_query(); ?>
		
		</ul>	
			
		<?php if($viewmore_btn != '') : ?>
		
			<div class="view-all">
		
				<a href="index.php?cat=<?php echo $cat; ?>" class="base-button"><?php _e('View All', 'bean') ?></a>
		
			</div><!-- END .view-all -->
	
		<?php endif; ?>	

	</div><!-- END .bean-category -->	
	
<?php endif; // if($title && $category_slug1 && $category_count1 != '') ?>	


<?php if($title2 && $category_slug2 && $category_count2 != '') : ?>	
	
	<div class="bean-category cats-2 six columns">	
	
		<?php 
		// CATEGORY QUERY
		query_posts('category_name=' .$category_slug2. '&showposts=' .$category_count2. ''); 
		$cat = get_cat_ID('' .$category_slug2. ''); $category = get_category( $cat );
		
		// WIDGET TITLE
		if ( $title2 ) echo $before_title . $title2 . $after_title;
		
		// CATEGORY COUNT
		if($displaycount != '') : ?><span class="number"><?php echo ' ' . $category->count; ?></span><?php endif; 
		?>
		
		<ul>		
			<?php 
			// THE LOOP
			if (have_posts()) : while (have_posts()) : the_post(); ?>			
				
				<li class="cat">
				
					<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), '5' ); ?></a>
				
				</li>
			
			<?php endwhile; endif; wp_reset_query(); ?>
		
		</ul>
			
		<?php if($viewmore_btn != '') : ?>
		
			<div class="view-all">
		
				<a href="index.php?cat=<?php echo $cat; ?>" class="base-button"><?php _e('View All', 'bean') ?></a>
		
			</div><!-- END .view-all -->
	
		<?php endif; ?>	
		
	</div><!-- END .bean-category -->
	
<?php endif; // if($title2 && $category_slug2 && $category_count2 != '') : ?>	


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
	$instance['title2'] = strip_tags( $new_instance['title2'] );
	$instance['category_slug1'] = stripslashes( $new_instance['category_slug1'] );
	$instance['category_count1'] = stripslashes( $new_instance['category_count1'] );
	$instance['category_slug2'] = stripslashes( $new_instance['category_slug2'] );
	$instance['category_count2'] = stripslashes( $new_instance['category_count2'] );
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
		'title'		 => 'Category Title.',
		'title2'		  => '',
		'category_slug1'  => 'uncategorized',
		'category_slug2'  => '',
		'category_count1' => '5',
		'category_count2' => '5',
		'displaycount'    => true,
		'viewmore_btn'    => true
		);
		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
	<p style="margin: 10px 0px 20px; color: #868996;"><?php _e('Enter your category slug & the count you would like displayed for both of the sections. ', 'bean') ?></p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title 1:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
	
	<table style="margin-left: -2px;">
		<tr>
	    	<td width="75%">		
				<label for="<?php echo $this->get_field_id( 'category_slug1' ); ?>"><?php _e('Category Name:', 'bean') ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'category_slug1' ); ?>" name="<?php echo $this->get_field_name( 'category_slug1' ); ?>" value="<?php echo $instance['category_slug1']; ?>" />
			</td>
			
			<td width="25%">	
				<label for="<?php echo $this->get_field_id( 'category_count1' ); ?>"><?php _e('Count:', 'bean') ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'category_count1' ); ?>" name="<?php echo $this->get_field_name( 'category_count1' ); ?>" value="<?php echo $instance['category_count1']; ?>" />
			</td>
		</tr>
	</table>
	
	<br/>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php _e('Title 2:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" value="<?php echo $instance['title2']; ?>" />
	</p>
	
	<table style="margin-left: -2px;">
		<tr>
	    	<td width="75%">		
				<label for="<?php echo $this->get_field_id( 'category_slug2' ); ?>"><?php _e('Category Name:', 'bean') ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'category_slug2' ); ?>" name="<?php echo $this->get_field_name( 'category_slug2' ); ?>" value="<?php echo $instance['category_slug2']; ?>" />
			</td>
			
			<td width="25%">	
				<label for="<?php echo $this->get_field_id( 'category_count2' ); ?>"><?php _e('Count:', 'bean') ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'category_count2' ); ?>" name="<?php echo $this->get_field_name( 'category_count2' ); ?>" value="<?php echo $instance['category_count2']; ?>" />
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