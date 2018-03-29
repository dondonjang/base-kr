<?php $options = get_option('bean_theme');  ?>

<?php if ( is_page_template('page-home.php') ) {
	
	echo '<h1 class="animated BeanFadeDown">'; 
	
	// SHOW BRANDING IF SET IN OPTIONS
	if ($options['branding_tagline'] ) { echo bean_branding_tagline();  } 
	
	// IF NOT, DISPLAY THE HOME PAGE TITLE
	else { echo get_the_title(); } 
	
	echo '</h1>'; 
	
	// DISPLAY INFO META
	$intro = get_post_meta($post->ID, '_radium_post_intro', true);
	if ($intro != '') : echo '<p>'; echo $intro; echo '</p>'; endif;
	
	 // DISPLAY BIG SEARCH IF SELECTED VIA THEME OPTIONS
	if ( isset($options['show_big_search'] ) ) { bean_header_search(); }

 } elseif ( is_singular('post') ) {

	// GET THE CATEGORY
	$category = get_the_category(); 
	
	// DISPLAY CATEGORY NAME AS HEADER TITLE
	echo '<h1 class="animated BeanFadeDown">'; echo $category[0]->cat_name;  echo'</h1>';
	
	// DISPLAY INFO META
	$intro = get_post_meta($post->ID, '_radium_post_intro', true);
	if ($intro != '') { echo '<p>'; echo $intro; echo '</p>'; }
		
	// IF NOT, DISPLAY CATEGORY DESCRIPTION 
	else { echo '<p>'; echo $category[0]->category_description; echo '</p>'; } 

 } elseif (is_archive()) { // A FEW CHECKS FOR ARCHIVE TYPES

	echo '<h1 class="animated BeanFadeDown">';
		
		if ( is_author() ) :
	   
		   	global $post; $author_id=$post->post_author; $field='display_name';	
		   	
		   	global $post; $user_email=$post->post_author; $email='user_email';	    		    
		  
 			echo '<div class="author-avatar animated BeanFadeDown">'; echo get_avatar( $user_email, '160' ); the_author_meta( $user_email, $author_id );echo '</div>';
		    
		    echo the_author_meta( $field, $author_id ); _e( '&#39;s Articles', 'bean' );  echo '</h1>';
			
			global $post; $author_id=$post->post_author; $field='description';
			
			echo '<p>'; the_author_meta( $field, $author_id ); echo '</p>';
	    
	    elseif(is_tag() ):
			printf( __( 'Tagged: %s', 'bean' ), single_tag_title( '', false ) . '' ); echo '</h1>';
			echo tag_description();
	
		elseif (is_category() ) :
		    printf( __( '%s', 'bean' ), '' . single_cat_title( '', false ) . '' ); echo '</h1>';
			echo category_description();
			
		elseif ( is_day() ) : 
			 printf( __( 'Archives: %s', 'bean' ), '' . get_the_date() . '' ); echo '</h1>'; 
		
		elseif ( is_month() ) : 
			printf( __( 'Archives: %s', 'bean' ), '' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bean' ) ) . '' ); echo '</h1>';
		
		elseif ( is_year() ) :
			printf( __( 'Archives: %s', 'bean' ), '' . get_the_date( _x( 'Y', 'yearly archives date format', 'bean' ) ) . '' ); echo '</h1>';
				    		
		else :
			printf(  __( 'Archives', 'bean' ) ); echo '</h1>';
		
		endif; 
		
} elseif( is_search() ) {

	global $query_string;
	
	query_posts( $query_string . '&posts_per_page=-1' );

	if ( have_posts() ) :

        while ( have_posts() ) : the_post();
		
    		// GET THE COUNT
    		echo '<h1 class="animated BeanFadeDown">'; 
                printf( __('Search for: "%s"', 'bean'), get_search_query()); 
            echo '</h1>';
    		
    		echo '<p>'; 
                _e( 'Search results:', 'bean' ); 
            echo '</p>';
    		
    		bean_header_search();
		
        endwhile;

	else :
	
		echo '<h1 class="animated BeanFadeDown">'; printf( __('Nothing Found', 'bean'), get_search_query()); echo '</h1>';
		
		echo '<p>'; printf( __('Unfortunately we couldn&#39;t find anything for "%s". Please try again.','bean'), get_search_query() ); echo '</p>';
		
		bean_header_search();
	
	endif;
	
} elseif(is_home()) { 	

	$options = get_option('bean_theme'); 
	
	// THE TITLE
	echo '<h1 class="animated BeanFadeDown">'; echo wp_title(''); echo '</h1>';
	
	// DISPLAY BLOG INTRO IF THEME OPTIONS
	if ($options['blog_intro'] ) { echo '<p>'; echo bean_blog_intro(); echo '</p>';  } 
	

} else { // IF ANY OTHER PAGES

	echo '<h1 class="animated BeanFadeDown">'; echo get_the_title(); echo '</h1>';
	
	// DISPLAY INFO META
	$intro = get_post_meta($post->ID, '_radium_post_intro', true);
 	if ($intro != '') : echo '<p>'; echo $intro; echo '</p>'; endif;
 	
}