<?php
/*--------------------------------------------------------------------*/
/*                    							
/*                    							
/*                    							 
/*     GENERAL THEME FUNCTIONS					
/*     PLAY SAFE YOUNG ONE, INCORRECT MODIFICATIONS TO THIS CODE CAN BREAK THINGS BIG TIME. 	 
/*                    							
/*                    							
/*                    							
/*--------------------------------------------------------------------*/


remove_action('wp_head','wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version

add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );




/*--------------------------------------------------------------------*/    							
/*  CUSTOM ADMIN & LOGIN LOGO				      							
/*--------------------------------------------------------------------*/
if ( !function_exists('radium_login_head') ) {
 
	function radium_login_head() {
	  	
	  	$options = get_option('bean_theme');
	
		$logo_url = '';
		if ( isset($options['logo']) && $options['logo'] != '' ) { $logo_url = $options['logo'];
		} else { $logo_url = BEAN_IMAGES_URL.'/login-logo.png'; }
		
		if ( $logo_url != '' ) {
			$dimensions = @getimagesize( $logo_url );
			echo '<style>' . "\n" . 'body.login #login h1 a { background: url("' . $logo_url . '") no-repeat scroll center top transparent; height: ' . $dimensions[1] . 'px; width: auto!important; background-size: auto !important; width: auto;}' . "\n" . '</style>' . "\n";
		}
	} 
	add_filter('login_head', 'radium_login_head');	
}

if ( !function_exists('radium_login_header_url') ) {

	function radium_login_header_url($url) {
		
		$options = get_option('bean_theme');
		
		$login_url = home_url();
	
		return $login_url;
	    
	} 
	add_filter('login_headerurl', 'radium_login_header_url');
}

if ( !function_exists('radium_login_header_title') ) {

	function radium_login_header_title($title) {
	
		$title_text = get_bloginfo('name').' &raquo; Log In';
	
		return $title_text;
	
	} 
	add_filter('login_headertitle', 'radium_login_header_title');
}	




/*--------------------------------------------------------------------*/         							
/*  RENDER THE ANALYTICS EITHER IN THE FOOTER OR HEADER						 		                 			              				
/*--------------------------------------------------------------------*/
if( !function_exists('bean_analytics') ) {

	function bean_analytics($IsHeader) {
	
		$options = get_option('bean_theme');
		
		if($IsHeader):
			if ($options['header_analytics']):
				echo $options['header_analytics'];
			endif;
		else:
			if($options['other_analytics']):
		    	echo $options['other_analytics'];
			endif;
		endif;
		
	}
}




/*--------------------------------------------------------------------*/               							
/*  RENDERS THE THEME FEED URL (USER OR WORDPRESS FEED)				                							
/*--------------------------------------------------------------------*/
if ( !function_exists('radium_feed_url') ) {
	
	function radium_feed_url() {
		
 		$options = get_option('bean_theme');
 	
 		if ( isset( $options['feedburner_url'] ) ) {
 			   echo $options['feedburner_url'];
 			
		} else {
		
			 echo get_bloginfo_rss('rss2_url');
			 
		}
		
	}
}
 



/*--------------------------------------------------------------------*/                							
/*  CUSTOM CSS LOADER - THEME OPTIONS INPUT				                							
/*--------------------------------------------------------------------*/
// CSS INPUT
if( !function_exists('bean_custom_css_input') ) {
 
	function bean_custom_css_input(){ $options = get_option('bean_theme');
		
		if ( isset($options['bean_custom_css_input'] ) )
			  echo $options['bean_custom_css_input'];
	
	} add_action('bean_custom_css_input', 'bean_custom_css_input', 1);
	
}

// CSS OUTPUT
if ( !function_exists('bean_custom_css_styles') ) {

	function bean_custom_css_styles() { ?>
	
		<style><?php do_action('bean_custom_css_input'); ?></style>		
				
	<?php } add_action('wp_head','bean_custom_css_styles'); 
}




/*--------------------------------------------------------------------*/                							
/*  BRANDING TAGLINE & BLOG INTRO					                							
/*--------------------------------------------------------------------*/
if( !function_exists('bean_branding_tagline') ) {
 
	function bean_branding_tagline(){ 
		
		$options = get_option('bean_theme');
		
		if (isset( $options['branding_tagline'] ))
			  echo $options['branding_tagline'];
	
	} add_action('bean_branding_tagline', 'bean_branding_tagline', 1);
}


if( !function_exists('bean_blog_intro') ) {
 
	function bean_blog_intro(){ 
		
		$options = get_option('bean_theme');
		
		if (isset( $options['blog_intro'] ))
			  echo $options['blog_intro'];
	
	} add_action('bean_blog_intro', 'bean_blog_intro', 1);
}


/*--------------------------------------------------------------------*/                							
/*  THE BIG SEARCH FORM (HEADER)					                							
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_header_search') ) {

	function bean_header_search() { ?>

<form id="searchform" class="searchform animated BeanBounceUp" method="get" action="<?php echo get_home_url(); ?>">
	
	<input type="text" name="s" class="s" value="<?php echo bean_search_field_text(); ?>" onfocus="this.value='';" onblur="if(this.value=='')this.value='<?php echo bean_search_field_text(); ?>';" />
		
	<button type="submit" class="button animated BeanButtonShake"><span><?php _e('Search', 'bean'); ?></span></button>
	
</form><!-- END #searchform -->

<?php }  add_action('bean_header_search','bean_header_search');
}


if( !function_exists('bean_search_field_text') ) {
 
	function bean_search_field_text(){ 
		
		$options = get_option('bean_theme');
		
		if (isset( $options['search_field_text'] ))
			  echo $options['search_field_text'];
	
	} add_action('bean_search_field_text', 'bean_search_field_text', 1);
}




/*--------------------------------------------------------------------*/
/*  LOAD NEW TAG ON BLOGROLL PAGES - IF CHECKED			          							
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_new_tag') ) {

	function bean_new_tag() { $options = get_option('bean_theme');
		
		$options = get_option('bean_theme'); $post_options = isset($options['post_options']) ? $options['post_options'] : false;  
		
		// GET THE OPTION
		if ( $post_options && array_key_exists('new_tag', $post_options) ) { 
		
		$postdate = the_date('Y-m-d','','',false); $threedaysago = date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y"))); 
		
		// DISPLAY THE TAG
		if ($postdate > $threedaysago) { echo'<span class="new-tag">'; _e( 'New', 'bean' ); echo'</span>'; }

		} 	

	}
	add_action('bean_new_tag', 'bean_new_tag');
}




/*--------------------------------------------------------------------*/             							
/*  POST META 								               							
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_post_meta') ) {

	function bean_post_meta() { ?>
	
	    <div class="entry-meta">
		    
		    <ul>
		    	<?php $options = get_option('bean_theme'); $post_options = isset($options['post_options']) ? $options['post_options'] : false;  
	    		
	    		// DISPLAY THE POST DATE
	    		if ( $post_options && array_key_exists('post_date', $post_options) ) { 
	    			echo'<li>'; echo the_time('F j, Y'); echo'<span class="meta-sep">&middot;</span>'; echo'</li>';
	    		} 
	    			   
	    		// DISPLAY THE POST AUTHOR
	    		if ( $post_options && array_key_exists('post_author', $post_options) ) { 
					echo'<li>'; ?><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name');?></a><?php echo'<span class="meta-sep">&middot;</span>'; echo'</li>';
				} 
				
				// DISPLAY THE COMMENT COUNT
				if ( $post_options && array_key_exists('post_comments', $post_options) ) { 
				    	
			    	if ( comments_open() && ! post_password_required() ) : 
		
			    	if (get_comments_number()==0) {
				    	
				    	} else {
				    	     echo'<li class="comment-meta">'; comments_popup_link( '', _x( '1', 'comments number', 'bean' ), _x( '%', 'comments number', 'bean' ) );  _e( '&nbsp;Comments', 'bean' ); echo'<span class="meta-sep">&middot;</span>'; echo'</li>';
			    		}   	
			    			
			    	endif;
		    	}
		
			// DISPLAY THE POST CATEGORY
			if ( $post_options && array_key_exists('post_category', $post_options) ) { 
				echo'<li>'; the_category(', '); echo'<span class="meta-sep">&middot;</span>'; echo'</li>';
			}
	    		
	    		// DISPLAY THE VIEW COUNT  	
	    		if ( $post_options && array_key_exists('post_views', $post_options) ) { 
	    			echo'<li>'; echo bean_get_post_views(get_the_ID()); _e( '&nbsp;Views', 'bean' ); echo'<span class="meta-sep">&middot;</span>'; echo'</li>';
	    		}
	    		
	    		// DISPLAY THE WORD COUNT  	
	    		if ( $post_options && array_key_exists('post_words', $post_options) ) { 
	    			echo'<li>'; echo wordcount(); _e( '&nbsp;Words', 'bean' ); echo'<span class="meta-sep">&middot;</span>'; echo'</li>';
	    		}	

	    		// DISPLAY THE TAGS  	
	    		if ( $post_options && array_key_exists('post_tags', $post_options) ) { 
    				if (has_tag()) { 
    					echo'<li>';  _e( 'Tagged:', 'bean' ); 
    					if( $tags = get_the_tags() ) {
					    echo '<span class="meta-sep"> | </span>';
					    foreach( $tags as $tag ) {
					        $sep = ( $tag === end( $tags ) ) ? '' : ', ';
					        echo '<a href="' . get_term_link( $tag, $tag->taxonomy ) . '">#' . $tag->name . '</a>' . $sep;
					    }
					}
					echo'<span class="meta-sep">&middot;</span>'; echo'</li>';
    				}
			}
	    		
	    		  echo'</ul">';
	    		// DISPLAY THE EDIT POST LINK
		    	edit_post_link( __( '[Edit]', 'bean' )); 
		    	
		    	?>
		    	
	    </div><!-- END .entry-meta --><?php
	
	} add_action('bean_post_meta','bean_post_meta');
}





/*--------------------------------------------------------------------*/               							
/*  DISPLAY VIEW COUNT ON POSTS							   			          							
/*--------------------------------------------------------------------*/
function bean_get_post_views( $postID ){
		
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    
	    if( $count=='' ){
	    
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 ".__('', 'bean');
	    }
	    return $count.' ';
	    
}

function bean_set_post_views( $postID ) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    
    if($count==''){
    
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function bean_posts_column_views( $defaults ){

    $defaults['post_views'] = __('Views', 'bean');
    return $defaults;
    
}
add_filter('manage_posts_columns', 'bean_posts_column_views');


function bean_posts_custom_column_views( $column_name, $id ){
	if( $column_name === 'post_views')
        echo bean_get_post_views(get_the_ID());
 
}

add_action('manage_posts_custom_column', 'bean_posts_custom_column_views',5,2);





/*--------------------------------------------------------------------*/                 							
/*  WORD COUNTER					   			                 							
/*--------------------------------------------------------------------*/
function wordcount(){
    ob_start();
    the_content();
    $content = ob_get_clean();
    return sizeof(explode(" ", $content));
}





/*--------------------------------------------------------------------*/                							
/*  POST LIKES					                							
/*--------------------------------------------------------------------*/
$timebeforerevote = 1440;

add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');

function add_like_scripts() {
	wp_enqueue_script('like_post', BEAN_JS_URL . '/post-likes.js', array('jquery'), '1.0', 1 );
	
	wp_localize_script('like_post', 'ajax_var', array(
		'url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('ajax-nonce')
	));
}

add_action( 'wp_enqueue_scripts', 'add_like_scripts',0);

function post_like(){
	$nonce = $_POST['nonce'];
 
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');
		
	if(isset($_POST['post_like'])){
		$ip = $_SERVER['REMOTE_ADDR'];
		$post_id = $_POST['post_id'];
		
		$meta_IP = get_post_meta($post_id, "voted_IP");

		$voted_IP = $meta_IP[0];
		if(!is_array($voted_IP))
			$voted_IP = array();
		
		$meta_count = get_post_meta($post_id, "votes_count", true);

		if(!hasAlreadyVoted($post_id)){
			$voted_IP[$ip] = time();

			update_post_meta($post_id, "voted_IP", $voted_IP);
			update_post_meta($post_id, "votes_count", ++$meta_count);
			
			echo $meta_count;
		}
		else
			echo "already";
	}
	exit;
}

function hasAlreadyVoted($post_id){
	global $timebeforerevote;

	$meta_IP = get_post_meta($post_id, "voted_IP");
	$voted_IP = $meta_IP[0];
	if(!is_array($voted_IP))
		$voted_IP = array();
	$ip = $_SERVER['REMOTE_ADDR'];
	
	if(in_array($ip, array_keys($voted_IP))){
		$time = $voted_IP[$ip];
		$now = time();
		
		if(round(($now - $time) / 60) > $timebeforerevote)
			return false;
			
		return true;
	}
	
	return false;
}

function getPostLikeLink($post_id){
	$vote_count = get_post_meta($post_id, "votes_count", true);
	
	if(hasAlreadyVoted($post_id)) {
	
		echo'<div class="post-like alreadyvoted">';
		
		echo'<span class="count">';
	
		if($vote_count =='') { echo __('0 Likes', 'bean'); } 
		
		elseif ($vote_count =='1') { echo __('1 Like', 'bean'); }
		
		else { echo $vote_count; echo __('&nbsp;Likes', 'bean'); };
		
		echo '</span><span title="'.__('I liked this!', 'bean').'"></span>';
		
		echo '</div>';
	
	} 
	
	else {
	
		// HAVE NOT LIKED IT YET
		echo '<div class="post-like">';
		
		echo '<a href="#" data-post_id="'.$post_id.'">';
		
		echo '<span  title="'.__('Do I like this?', 'bean').'"><span class="count">';
		
		if($vote_count =='') { echo __('0 Likes', 'bean'); } 
		
		elseif ($vote_count =='1') { echo __('1 Like', 'bean'); }
		
		else { echo $vote_count; echo __('&nbsp;Likes', 'bean'); };
		
		echo '</span>';
		
		echo '</span></a></div>';
		
		}
}




/*--------------------------------------------------------------------*/
/*  LOAD OPTIONAL META AT THE END OF THE POST			          							
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_after_meta') ) {

	function bean_after_meta() { $options = get_option('bean_theme');
		
		// DISPLAY TAGS
		if ( isset($options['post_tags'] ) ) { if( has_tag() ) { echo'<li class=post-tags><span class="tag-icon"></span>'; the_tags('', '', '');  echo'</li>'; } }
		
		// DISPLAY LIKES
		if ( isset($options['post_likes'] ) ) { echo getPostLikeLink(get_the_ID()); }
		

	}
	add_action('bean_after_post', 'bean_after_meta');
}




/*--------------------------------------------------------------------*/                							
/*  LOAD FOOTER COLOPHON					                							
/*--------------------------------------------------------------------*/
// COPYRIGHT TEXT INPUT
if( !function_exists('bean_copyright') ) {
 
	function bean_copyright(){ $options = get_option('bean_theme');
		
		if ( isset($options['copyright_text'] ) )
			  echo $options['copyright_text'];
	
	} add_action('bean_copyright', 'bean_copyright', 1);
}

// COLOPHON INPUT (INCLUDES THE ABOVE THEME OPTIONS INPUT)
if ( !function_exists('bean_colophon') ) {

	function bean_colophon() { ?>
		
		<div class="copyright">
			
			<?php do_action('bean_copyright'); ?> 

		</div> <!--END .colophon-->
				
	<?php } add_action('bean_colophon','bean_colophon'); 
}




/*--------------------------------------------------------------------*/             							
/*  ARCHIVES TEMPLATE									                  							
/*--------------------------------------------------------------------*/
if( !function_exists('bean_archive_all_text') ) {
 
	function bean_archive_all_text(){ $options = get_option('bean_theme');
		
		if (isset( $options['archive_all_text'] ))
			  echo $options['archive_all_text'];
	
	} add_action('bean_archive_all_text', 'bean_archive_all_text', 1);	
}


if( !function_exists('bean_archive_latest') ) {
 
	function bean_archive_latest(){ $options = get_option('bean_theme');
		
		if (isset( $options['archive_latest'] ))
			  echo $options['archive_latest'];
	
	} add_action('bean_archive_latest', 'bean_archive_latest', 1);
}


if( !function_exists('bean_archive_monthly') ) {
 
	function bean_archive_monthly(){ $options = get_option('bean_theme');
		
		if (isset( $options['archive_monthly'] ))
			  echo $options['archive_monthly'];
	
	} add_action('bean_archive_monthly', 'bean_archive_monthly', 1);	
}


if( !function_exists('bean_archive_category') ) {
 
	function bean_archive_category(){ $options = get_option('bean_theme');
		
		if (isset( $options['archive_category'] ))
			  echo $options['archive_category'];
	
	} add_action('bean_archive_category', 'bean_archive_category', 1);
}


if( !function_exists('bean_archive_sitemap') ) {
 
	function bean_archive_sitemap(){ $options = get_option('bean_theme');
		
		if (isset( $options['archive_sitemap'] ))
			  echo $options['archive_sitemap'];
	
	} add_action('bean_archive_sitemap', 'bean_archive_sitemap', 1);
}




/*--------------------------------------------------------------------*/             							
/*  404 TEMPLATE					                  							
/*--------------------------------------------------------------------*/
if( !function_exists('bean_404_header') ) {
 
	function bean_404_header(){ $options = get_option('bean_theme');
		
		if (isset( $options['404_error_header'] ))
			  echo $options['404_error_header'];
	
	} add_action('bean_404_header', 'bean_404_header', 1);
}

if( !function_exists('bean_404_error_text') ) {
 
	function bean_404_error_text(){ $options = get_option('bean_theme');
		
		if (isset( $options['404_error_text'] ))
			  echo $options['404_error_text'];
	
	} add_action('bean_404_error_text', 'bean_404_error_text', 1);
}

if( !function_exists('bean_404_error_p') ) {
 
	function bean_404_error_p(){ $options = get_option('bean_theme');
		
		if (isset( $options['404_error_p_text'] ))
			  echo $options['404_error_p_text'];
	
	} add_action('bean_404_error_p', 'bean_404_error_p', 1);
}

if( !function_exists('bean_404_btn') ) {
 
	function bean_404_btn(){ $options = get_option('bean_theme');
		
		if (isset( $options['404_error_btn_text'] ))
			  echo $options['404_error_btn_text'];
	
	} add_action('bean_404_btn', 'bean_404_btn', 1);
}




/*--------------------------------------------------------------------*/
/*  LOAD SINGLE POST NAVIGATION				          							
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_single_posts_navigation') ) {

	function bean_single_posts_navigation() { 
		
		if( is_single() ) : ?>
	
			<div class="single-pagination">
		
				<div class="pagination animated">
					
					<span class="page-previous base-button">
		
						<?php previous_post_link('%link', ''); if(!get_adjacent_post(false, '', true)) { echo '<style>span.page-previous {display:none}</style>'; } ?>
				
					</span><!-- END .page-previous -->
					
					<span class="page-home base-button">
				
						<a href="<?php $options = get_option('bean_theme'); echo get_permalink( $options['posts_home_select'] ); ?>"></a>
					
					</span><!-- END .page-next -->

					<span class="page-next base-button">
				
						<?php next_post_link('%link', ''); if(!get_adjacent_post(false, '', false)) { echo '<style>span.page-next {display:none}</style>'; } ?>
				
					</span><!-- END .page-next -->
			
				</div><!-- END .pagination -->
			
			</div><!-- END .single-pagination -->		
			
		<?php endif;
		
	}
	add_action('bean_before_post', 'bean_single_posts_navigation');
}




/*--------------------------------------------------------------------*/                							
/*  SOCIAL PROFILES THEME OPTIONS INPUT									      							
/*--------------------------------------------------------------------*/
// TWITTER
if( !function_exists('bean_profile_twitter') ) {
 
	function bean_profile_twitter(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_twitter'] ))
			  echo $options['profile_twitter'];
	
	} add_action('bean_profile_twitter', 'bean_profile_twitter', 1);
}

// FACEBOOK  
if( !function_exists('bean_profile_facebook') ) {
 
	function bean_profile_facebook(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_facebook'] ))
			  echo $options['profile_facebook'];
	
	} add_action('bean_profile_facebook', 'bean_profile_facebook', 1);
}

// DRIBBBLE  
if( !function_exists('bean_profile_dribbble') ) {
 
	function bean_profile_dribbble(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_dribbble'] ))
			  echo $options['profile_dribbble'];
	
	} add_action('bean_profile_dribbble', 'bean_profile_dribbble', 1);
}

// INSTAGRAM  
if( !function_exists('bean_profile_instagram') ) {
 
	function bean_profile_instagram(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_instagram'] ))
			  echo $options['profile_instagram'];
	
	} add_action('bean_profile_instagram', 'bean_profile_instagram', 1);
}

// ZERPLY 
if( !function_exists('bean_profile_zerply') ) {
 
	function bean_profile_zerply(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_zerply'] ))
			  echo $options['profile_zerply'];
	
	} add_action('bean_profile_zerply', 'bean_profile_zerply', 1);
}

// GITHUB  
if( !function_exists('bean_profile_github') ) {
 
	function bean_profile_github(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_github'] ))
			  echo $options['profile_github'];
	
	} add_action('bean_profile_github', 'bean_profile_github', 1);
}

// EMAIL 
if( !function_exists('bean_profile_email') ) {
 
	function bean_profile_email(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_email'] ))
			  echo $options['profile_email'];
	
	} add_action('bean_profile_email', 'bean_profile_email', 1);
}

// FORRST 
if( !function_exists('bean_profile_forrst') ) {
 
	function bean_profile_forrst(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_forrst'] ))
			  echo $options['profile_forrst'];
	
	} add_action('bean_profile_forrst', 'bean_profile_forrst', 1);
}

// FLICKR  
if( !function_exists('bean_profile_flickr') ) {
 
	function bean_profile_flickr(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_flickr'] ))
			  echo $options['profile_flickr'];
	
	} add_action('bean_profile_flickr', 'bean_profile_flickr', 1);
}

// RSS  
if( !function_exists('bean_profile_rss') ) {
 
	function bean_profile_rss(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_rss'] ))
			  echo $options['profile_rss'];
	
	} add_action('bean_profile_rss', 'bean_profile_rss', 1);
}

// LINKEDIN  
if( !function_exists('bean_profile_linkedin') ) {
 
	function bean_profile_linkedin(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_linkedin'] ))
			  echo $options['profile_linkedin'];
	
	} add_action('bean_profile_linkedin', 'bean_profile_linkedin', 1);
}

// GOOGLE PLUS  
if( !function_exists('bean_profile_google') ) {
 
	function bean_profile_google(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_google'] ))
			  echo $options['profile_google'];
	
	} add_action('bean_profile_google', 'bean_profile_google', 1);
}

// BEHANCE  
if( !function_exists('bean_profile_behance') ) {
 
	function bean_profile_behance(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_behance'] ))
			  echo $options['profile_behance'];
	
	} add_action('bean_profile_behance', 'bean_profile_behance', 1);
}

// PINTEREST  
if( !function_exists('bean_profile_pinterest') ) {
 
	function bean_profile_pinterest(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_pinterest'] ))
			  echo $options['profile_pinterest'];
	
	} add_action('bean_profile_pinterest', 'bean_profile_pinterest', 1);
}

// YOUTUBE  
if( !function_exists('bean_profile_youtube') ) {
 
	function bean_profile_youtube(){ $options = get_option('bean_theme');
		
		if (isset( $options['profile_youtube'] ))
			  echo $options['profile_youtube'];
	
	} add_action('bean_profile_youtube', 'bean_profile_youtube', 1);
}



/*--------------------------------------------------------------------*/                							
/*  DISPLAY FOOTER SOCIAL ICONS					                							
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_social_footer') ) {

	function bean_social_footer() {  $options = get_option('bean_theme'); ?>
	
		<ul class="social-foot">
									
			<?php $social_footer = isset($options['social_checklist']) ? $options['social_checklist'] : false;  ?>	
				
			<?php if ( $social_footer && array_key_exists('twitter_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="http://www.twitter.com/<?php do_action('bean_profile_twitter'); ?>" title="Twitter" class="social-icon twitter"></a>
				</li>
				
			<?php } if ( $social_footer && array_key_exists('facebook_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="<?php do_action('bean_profile_facebook'); ?>" title="Facebook" class="social-icon facebook"></a>
				</li>
				
			<?php } if ( $social_footer && array_key_exists('dribbble_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="http://www.dribbble.com/<?php do_action('bean_profile_dribbble'); ?>" title="Dribbble" class="social-icon dribbble"></a>
				</li>
			
			<?php } if ( $social_footer && array_key_exists('instagram_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="http://www.instagram.com/<?php do_action('bean_profile_instagram'); ?>" title="Instagram" class="social-icon instagram"></a>
				</li>
			
			<?php } if ( $social_footer && array_key_exists('googleplus_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="<?php do_action('bean_profile_google'); ?>" title="Google Plus" class="social-icon googleplus"></a>
				</li>
			
			<?php } if ( $social_footer && array_key_exists('linkedin_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="<?php do_action('bean_profile_linkedin'); ?>" title="Linkedin" class="social-icon linkedin"></a>
				</li>	
			
			<?php } if ( $social_footer && array_key_exists('zerply_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="http://zerply.com/<?php do_action('bean_profile_zerply'); ?>" title="Zerply" class="social-icon zerply"></a>
				</li>			
			
			<?php } if ( $social_footer && array_key_exists('behance_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="http://www.behance.net/<?php do_action('bean_profile_behance'); ?>" title="Behance" class="social-icon behance"></a>
				</li>	
			
			<?php } if ( $social_footer && array_key_exists('pinterest_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="http://pinterest.com/<?php do_action('bean_profile_pinterest'); ?>" title="Pinterst" class="social-icon pinterest"></a>
				</li>	
				
			<?php } if ( $social_footer && array_key_exists('github_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="<?php do_action('bean_profile_github'); ?>" title="GitHub" class="social-icon github"></a>
				</li>		
			
			<?php } if ( $social_footer && array_key_exists('youtube_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="<?php do_action('bean_profile_youtube'); ?>" title="YouTube" class="social-icon youtube"></a>
				</li>
			
			<?php } if ( $social_footer && array_key_exists('email_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="mailto:<?php do_action('bean_profile_email'); ?>" title="Email Us" class="social-icon email"></a>
				</li>			
			
			<?php } if ( $social_footer && array_key_exists('flickr_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="<?php do_action('bean_profile_flickr'); ?>" title="Flickr" class="social-icon flickr"></a>
				</li>			
			
			<?php } if ( $social_footer && array_key_exists('rss_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="<?php do_action('bean_profile_rss'); ?>" title="Subscribe via RSS" class="social-icon rss"></a>
				</li>
				
			<?php } if ( $social_footer && array_key_exists('forrst_select', $social_footer) ) { ?>
				 	
				<li>
				    <a href="http://www.forrst.com/<?php do_action('bean_profile_forrst'); ?>" title="Forrst" class="social-icon forrst"></a>
				</li>
							
			<?php } ?>
					
		</ul>				

	<?php } add_action('bean_social_footer','bean_social_footer'); 
}




/*--------------------------------------------------------------------*/             				
/*  CUSTOM COMMENT STRUCTURE
/*--------------------------------------------------------------------*/
function base_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
	?>
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	
	<?php if ( 'div' != $args['style'] ) : ?>
	
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	
	<?php endif; ?>
	
	<div class="comment-author vcard">
	
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment ); ?>
	
		<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
	
	</div>
	
	<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation') ?></em>
		<br />
	<?php endif; ?>
	
	<div class="comment-meta commentmetadata">
	
		<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( __('%1$s'), get_comment_date()) ?></a><span class="meta-sep">&middot;</span><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?><?php edit_comment_link(__('<span class="meta-sep">&middot;</span> Edit'),'  ','' ); ?>
	
	</div>
	
	<?php comment_text() ?>
			
	<?php if ( 'div' != $args['style'] ) : ?></div><?php endif; ?>
<?php
}