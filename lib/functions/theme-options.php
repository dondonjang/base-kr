<?php

function bean_load_framework_theme_options() {

$sections[] = array(
				'title' => __('General Options', 'bean'),
				'desc' => __('<p class="description">This page contains general theme options.</p>', 'bean'),
				'fields' => array(
					array(
						'id' => 'drop_in_header',
						'type' => 'checkbox',
						'title' => __( 'Enable Drop In Header', 'bean'), 
						'sub_desc' => __('Elect to turn on/off the widgetized/menu drop in header. If the menu is not set (via WP Dashboard) it will act as the "Drop In Header" widget area.', 'bean'),
						'desc' => __('Yes do it', 'bean'),
						'std' => 0 
						),	
						
					array(
						'id' => 'footer_layout',
						'type' => 'radio_img',
						'title' => __('Footer Widgets Layout', 'bean'), 
						'sub_desc' => __('Please select a layout style for your primary footer widget areas.', 'bean'),
							'options' => array(
								'three_widgets' => array(
									'title' => '3 Widgets', 
									'img' => RADIUM_OPTIONS_URL.'assets/images/three_widgets.png'
								),
								'five_widgets' => array(
									'title' => '5 Widgets',
									'img' => RADIUM_OPTIONS_URL.'assets/images/five_widgets.png'
								),
								'none' => array(
									'title' => 'None', 
									'img' => RADIUM_OPTIONS_URL.'assets/images/no_widgets.png'
								),
							),
							
						'std' => 'none'
						),
					
					array(
						'id' => 'footer_social',
						'type' => 'checkbox_hide_below',
						'title' => __( 'Display the Footer Icons', 'bean'), 
						'sub_desc' => __('Elect to display the footer icons at the bottom of your footer.', 'bean'),
						'desc' => __('Yes do it', 'bean'),
						'std' => 1 
						),
						
					array(
						'id' => 'social_checklist',
						'type' => 'multi_checkbox',
						'title' => __( 'Social Media Footer Icons', 'bean'), 
						'sub_desc' => __('Select which icons are displayed in your footer. Remember to set up your social profiles/URLs in the "Social Media" options tab.', 'bean'),
						'options' => array(
							'behance_select'    => 'Behance',
							'dribbble_select'   => 'Dribbble',
							'email_select'      => 'Email',
							'facebook_select'   => 'Facebook',
							'flickr_select'   	=> 'Flickr',
							'forrst_select'   	=> 'Forrst',
							'github_select'     => 'GitHub',
							'googleplus_select' => 'Google Plus',
							'instagram_select' 	=> 'Instagram', 
							'linkedin_select' 	=> 'LinkedIn',
							'pinterest_select'  => 'Pinterest',
							'rss_select'   		=> 'RSS',
							'twitter_select'    => 'Twitter',
							'youtube_select'    => 'YouTube',
							'zerply_select'     => 'Zerply',
					
						),
						
						'std' => array(
							'behance_select'    => '1',
							'dribbble_select'   => '1',
							'email_select'      => '1',
							'facebook_select'   => '1',
							'flickr_select'   	=> '1',
							'forrst_select'   	=> '1',
							'github_select'     => '1',
							'googleplus_select' => '1',
							'instagram_select' 	=> '1', 
							'linkedin_select' 	=> '1',
							'pinterest_select'  => '1',
							'rss_select'   		=> '1',
							'twitter_select'    => '1',
							'youtube_select'    => '1',
							'zerply_select'     => '1', 
						)
					),	
					
					array(
						'id' => 'copyright_text',
						'type' => 'textarea',
						'title' => __('Footer Copyright Text', 'bean'),
						'sub_desc' => __('This text overrides the default copyright message located in the theme footer.', 'bean'),
						'std' => 'Copyright © 2013 <a href="http://themeforest.net/user/ThemeBeans/?ref=themebeans">Base Theme</a>. Powered by <a href="www.wordpress.org">WordPress</a>.'
						),
						
					array(
						'id' => 'header_analytics',
						'type' => 'textarea',
						'title' => __('Header Analytics', 'bean'),
						'sub_desc' => __('Paste any analytics code that belongs in the head element of your site here.', 'bean'),
						'std' => ''
						),	
						
					array(
						'id' => 'other_analytics',
						'type' => 'textarea',
						'title' => __('Footer Analytics', 'bean'),
						'sub_desc' => __('Paste any analytics code that belongs before the closing body tag here.', 'bean'),
						'std' => ''
						),	
								
 					)
				);
  				

$sections[] = array(
				'title' => __('Home Template', 'bean'),
				'desc' => __('<p class="description">Manage & customize your theme home template.</p>', 'bean'),
 				'fields' => array(
 						array(
 							'id' => 'branding_tagline',
 							'type' => 'textarea',
 							'title' => __('Branding Tagline', 'bean'),
 							'sub_desc' => __('Customize the bold title lettering located at the top of home template header.', 'bean'),
 							'std' => 'Welcome Ladies & Gents.  Meet Base, a Nice New Theme.'
 							),		
 						
 						array(
 							'id' => 'show_big_search',
 							'type' => 'checkbox_hide_below',
 							'title' => __( 'Display the Search Field', 'bean'), 
 							'sub_desc' => __('Elect to display the large search field in the header of your home template.', 'bean'),
 							'desc' => __('Yes do it', 'bean'),
 							'std' => 1 
 							),	
 							
 						array(
 							'id' => 'search_field_text',
 							'type' => 'text',
 							'title' => __('Search Field Text', 'bean'),
 							'sub_desc' => __('Customize the placeholder/value text in the search fields throughout the theme.', 'bean'),
 							'std' => 'Search the knowledgebase...'
 							),
 							
 						array(
 							'id' => 'home_layout',
 							'type' => 'radio_img',
 							'title' => __('Home Layout', 'bean'), 
 							'sub_desc' => __('Please select a layout style for your home template widget areas.', 'bean'),
 								'options' => array(
 									'top_feat_widget' => array(
 										'title' => 'Layout 1', 
 										'img' => RADIUM_OPTIONS_URL.'assets/images/top.png'
 									),
 									'btm_feat_widget' => array(
 										'title' => 'Layout 2',
 										'img' => RADIUM_OPTIONS_URL.'assets/images/btm.png'
 									),
 									'top_and_btm' => array(
 										'title' => 'Layout 3', 
 										'img' => RADIUM_OPTIONS_URL.'assets/images/top_and_btm.png'
 									),
  									'full' => array(
 										'title' => 'None', 
 										'img' => RADIUM_OPTIONS_URL.'assets/images/full.png'
 									),
 									
 								),
 								
 							'std' => 'top_and_btm'
 							),
 						
 					)
  				);
  				
  				  								
$sections[] = array(
				'title' => __('Post Settings', 'bean'),
				'desc' => __('<p class="description">Manage multiple general page & blog view settings.</p>', 'bean'),
				'icon' => '',
				'fields' => array(	
					array(
						'id' => 'post_options',
						'type' => 'multi_checkbox',
						'title' => __( 'Post Meta Options', 'bean'), 
						'sub_desc' => __('Select which post meta you would like to display under the each post title.', 'bean'),
						'options' => array(
							
							'post_date'        => 'Post Date',
							'post_author'      => 'Author',
							'post_category'    => 'Category',
							'post_comments'    => 'Comments',
							'post_tags'    	   => 'Tags',
							'post_views'       => 'View Count',
							'post_words'       => 'Word Count',
							'new_tag'    	   => 'New Tag',
						),
						
						'std' => array(
							'post_date'        => '1',
							'post_author'      => '0',
							'post_category'    => '0',
							'post_comments'    => '1',
							'post_tags'        => '0',
							'post_views'       => '1',
							'post_words'       => '0',
						)
					),	
					
					array(
						'id' => 'reading_time',
						'type' => 'checkbox',
						'title' => __( 'Display Reading Time', 'bean'), 
						'sub_desc' => __('Elect to display the estimated post reading time (based on word count) on your single posts.', 'bean'),
						'desc' => __('Yes do it', 'bean'),
						'std' => 1 
						),
					
					array(
						'id' => 'post_tags',
						'type' => 'checkbox',
						'title' => __( 'Display the Tags', 'bean'), 
						'sub_desc' => __('Elect to display the post tags at the bottom of your single posts.', 'bean'),
						'desc' => __('Yes do it', 'bean'),
						'std' => 0 
						),
							
					array(
						'id' => 'post_likes',
						'type' => 'checkbox',
						'title' => __( 'Display the Post Likes', 'bean'), 
						'sub_desc' => __('Elect to display the post likes button at the bottom of your single posts.', 'bean'),
						'desc' => __('Yes do it', 'bean'),
						'std' => 1 
						),	

					array(
						'id' => 'related_posts',
						'type' => 'checkbox',
						'title' => __( 'Display Related Posts', 'bean'), 
						'sub_desc' => __('Elect to display the related posts, which will appear (based on tags) below each single post.', 'bean'),
						'desc' => __('Yes do it', 'bean'),
						'std' => 1 
						),	
											
					array(
						'id' => 'posts_home_select',
						'type' => 'pages_select',
						'title' => __('Pagination Middle Button Link', 'radium'), 
						'sub_desc' => __('Select your blogroll or home page that you would like to link the middle pagination button to.', 'bean'),
						'args' => array()
						),														
				)
			);							
					

$sections[] = array(
				'title' => __('Site Archives', 'bean'),
				'desc' => __('<p class="description">Customize the headers and content displayed on the Archives Template.</p>', 'bean'),
 				'fields' => array(
 						array(
 							'id' => 'archives_content',
 							'type' => 'multi_checkbox',
 							'title' => __( 'Archive Page Content', 'bean'), 
 							'sub_desc' => __('Select which contexts are displayed on the Archives page.', 'bean'),
 							'options' => array(
 								'posts'    => 'All Posts',
 								'latest'   => 'Latest Posts', 
 								'month'    => 'Archives by Month',
 								'category' => 'Archives by Category', 
 								'pages'    => 'Site Map',
 							),
 							
 							'std' => array(
 								'posts'    => '0', 
 								'latest'   => '1', 
 								'category' => '1', 
 								'month'    => '1',
 								'pages'    => '0', 
 							)
 						),	
 						
 						array(
 							'id' => 'index_sidebar',
 							'type' => 'radio_img',
 							'title' => __('Index Sidebar', 'bean'), 
 							'sub_desc' => __('Please select the sidebar location for the blog index, archives & search templates. These default WordPress templates cannot be set via the page sidebar selectors, only here.', 'bean'),
 								'options' => array(
 									'sidebar_left' => array(
 										'title' => 'Left', 
 										'img' => RADIUM_OPTIONS_URL.'assets/images/sidebar_left.png'
 									),
 									'sidebar_right' => array(
 										'title' => 'Right',
 										'img' => RADIUM_OPTIONS_URL.'assets/images/sidebar_right.png'
 									),
 									
 								),
 								
 							'std' => 'sidebar_right'
 							),
 							
 						array(
 							'id' => 'blog_intro',
 							'type' => 'textarea',
 							'title' => __('Blogroll Intro Text', 'bean'),
 							'sub_desc' => __('The text that appears below the index blog page title.', 'bean'),
 							'std' => ''
 							),	
 						
						
						array(
							'id' => 'archive_all_text',
							'type' => 'text',
							'title' => __('All Published Posts', 'bean'),
							'sub_desc' => __('Replace the text above the all posts archive content.', 'bean'),
							'std' => 'All Published Posts'
							),	
							
						array(
							'id' => 'archive_latest',
							'type' => 'text',
							'title' => __('Last 30 Posts Header', 'bean'),
							'sub_desc' => __('Replace the text above the latest 30 posts archive content.', 'bean'),
							'std' => 'Last 30 Posts'
							),
															
						array(
							'id' => 'archive_monthly',
							'type' => 'text',
							'title' => __('Monthly Archive Header', 'bean'),
							'sub_desc' => __('Replace the text above the monthly posts archive content.', 'bean'),
							'std' => 'Monthly Archives'
							),	
							
						array(
							'id' => 'archive_category',
							'type' => 'text',
							'title' => __('Category Archive Header', 'bean'),
							'sub_desc' => __('Replace the text above the all category archive content.', 'bean'),
							'std' => 'Category Archives'
							),	
							
						array(
							'id' => 'archive_sitemap',
							'type' => 'text',
							'title' => __('Site Map Header', 'bean'),
							'sub_desc' => __('Replace the text above the site map content.', 'bean'),
							'std' => 'Site Map'
							),	
																							
					)
  				); 			
  				

$sections[] = array(
				'title' => __('404 & Coming Soon', 'bean'),
				'desc' => __('<p class="description">Manage & customize your theme 404 error page and Coming Soon Page.</p>', 'bean'),
 				'fields' => array(
 						array(
 							'id' => 'error_404_bg',
 							'type' => 'upload', 
 							'title' => __('Upload 404 Background Image', 'bean'),
 							'sub_desc' => __('Upload a custom background image to be displayed full screen on your 404 page.', 'bean'),
 							),	
 							
						array(
							'id' => '404_error_text',
							'type' => 'text',
							'title' => __('404 Page Header', 'bean'),
							'sub_desc' => __('Customize the bold header text on the 404 Page.', 'bean'),
							'std' => '404 Error... Ain&#39;t nobody got time for that!'
							),	
						
						array(
							'id' => '404_error_p_text',
							'type' => 'textarea',
							'title' => __('404 Page Paragraph', 'bean'),
							'sub_desc' => __('Customize the paragraph text displayed on the 404 page to say anything you would liket.', 'bean'),
							'std' => 'We hate these little bugs just as much as you do. Really. Customize this 404 via the Theme Options Panel.'
							),
						
						array(
							'id' => '404_error_btn_text',
							'type' => 'text',
							'title' => __('Back Button', 'bean'),
							'sub_desc' => __('Customize the text that is displayed on the 404 Page "Back" button.', 'bean'),
							'std' => 'Head on Back'
							),
							
						array(
							'id' => 'comingsoon_year',
							'type' => 'text',
							'title' => __('Year (ex: 2014)', 'bean'),
							'sub_desc' => __('For the Coming Soon template. Create a page using this template to utilize it.', 'bean'),
							'std' => ''
							),	
							
						array(
							'id' => 'comingsoon_month',
							'type' => 'text',
							'title' => __('Month (ex: 01 for JAN)', 'bean'),
							'sub_desc' => __('For the Coming Soon template. Create a page using this template to utilize it.', 'bean'),
							'std' => ''
							),	
								
						array(
							'id' => 'comingsoon_day',
							'type' => 'text',
							'title' => __('Day (ex: 01)', 'bean'),
							'sub_desc' => __('For the Coming Soon template. Create a page using this template to utilize it.', 'bean'),
							'std' => ''
							),		
															
					)
  				);
  				
$sections[] = array(
				'title' => __('Social Media', 'bean'),
				'desc' => __('<p class="description">Social account which will populate corresponding parts throughout the theme.</p>', 'bean'),
 				'fields' => array(											
					
					array(
						'id' => 'profile_behance',
						'type' => 'text',
						'title' => __('Behance Profile URL', 'bean'),
						'sub_desc' => __('Enter your Behance public profile URL.', 'bean'),
						'std' => ''
						),
					
					array(
						'id' => 'profile_dribbble',
						'type' => 'text',
						'title' => __('Dribbble Username', 'bean'),
						'sub_desc' => __('Enter your Dribbble username.', 'bean'),
						'std' => 'ThemeBeans'
						),
					
					array(
						'id' => 'profile_email',
						'type' => 'text',
						'title' => __('Email Address', 'bean'),
						'sub_desc' => __('Enter your preferred contact email address.', 'bean'),
						'std' => 'hello@themebeans.com'
						),	
					
					array(
						'id' => 'profile_facebook',
						'type' => 'text',
						'title' => __('FaceBook URL', 'bean'),
						'sub_desc' => __('Enter your FaceBook URL.', 'bean'),
						'std' => 'ThemeBeans'
						),		
					
					array(
						'id' => 'profile_flickr',
						'type' => 'text',
						'title' => __('Flickr URL', 'bean'),
						'sub_desc' => __('Enter your Flickr URL.', 'bean'),
						'std' => ''
						),
					
					array(
						'id' => 'profile_forrst',
						'type' => 'text',
						'title' => __('Forrst Username', 'bean'),
						'sub_desc' => __('Enter your Forrst username.', 'bean'),
						'std' => ''
						),	
						
					array(
						'id' => 'profile_github',
						'type' => 'text',
						'title' => __('GitHub URL', 'bean'),
						'sub_desc' => __('Enter your GitHub url.', 'bean'),
						'std' => ''
						),	
						
					array(
						'id' => 'profile_google',
						'type' => 'text',
						'title' => __('Google Plus Profile URL', 'bean'),
						'sub_desc' => __('Enter your Google Plus public profile URL.', 'bean'),
						'std' => ''
						),
					
					array(
						'id' => 'profile_instagram',
						'type' => 'text',
						'title' => __('Instagram Username', 'bean'),
						'sub_desc' => __('Enter your Instagram username.', 'bean'),
						'std' => ''
						),		
					
					array(
						'id' => 'profile_linkedin',
						'type' => 'text',
						'title' => __('LinkedIn URL', 'bean'),
						'sub_desc' => __('Enter your LinkedIn profile URL.', 'bean'),
						'std' => ''
						),		
					
					array(
						'id' => 'profile_pinterest',
						'type' => 'text',
						'title' => __('Pinterest Username', 'bean'),
						'sub_desc' => __('Enter your Pinterest username.', 'bean'),
						'std' => ''
						),		
					
					array(
						'id' => 'profile_rss',
						'type' => 'text',
						'title' => __('RSS Subscribe URL', 'bean'),
						'sub_desc' => __('Enter your RSS Subscribe URL.', 'bean'),
						'std' => ''
						),
							
					array(
						'id' => 'profile_twitter',
						'type' => 'text',
						'title' => __('Twitter Username', 'bean'),
						'sub_desc' => __('Enter your Twitter username.', 'bean'),
						'std' => 'ThemeBeans'
						),	
						
					array(
						'id' => 'profile_youtube',
						'type' => 'text',
						'title' => __('YouTube URL', 'bean'),
						'sub_desc' => __('Enter your YouTube URL.', 'bean'),
						'std' => ''
						),		
					
					array(
						'id' => 'profile_zerply',
						'type' => 'text',
						'title' => __('Zerply Username', 'bean'),
						'sub_desc' => __('Enter your Zerply username.', 'bean'),
						'std' => ''
						),	
					)
  				); 
  				  				  				  				
$sections[] = array(
				'title' => __('Theme Customization', 'bean'),
				'desc' => __('<p class="description">Easily manipulate various CSS elements throughout the theme. <b>Note:</b> These colors will override all other theme stylesheets. Deleting the color values inputted here will allow the stylesheets display.
				</p>', 'bean'),
				'fields' => array(
					array(
						'id' => 'theme_style',
						'type' => 'radio_img',
						'title' => __('Theme Style', 'bean'), 
						'sub_desc' => __('Please select a style for your site. There are currently 2 styles included in this theme.', 'bean'),
						'icon' => '',
							'options' => array(
								'default' => array(
									'title' => 'Style 1', 
									'img' => BEAN_STYLES_URL.'/default.jpg'
								),
								'2' => array(
									'title' => 'Style 2', 
									'img' => BEAN_STYLES_URL.'/2/style-thumb.jpg'
								),
								'3' => array(
									'title' => 'Style 3', 
									'img' => BEAN_STYLES_URL.'/3/style-thumb.jpg'
								),
							),
						'std' => 'default'
						),
					
					array(
						'id' => 'header_bg',
						'type' => 'upload', 
						'title' => __('Upload Header Background Image', 'bean'),
						'sub_desc' => __('Upload an optional custom header background image to be displayed globally.', 'bean'),
						),	
						
					array(
						'id' => 'accent_color',
						'type' => 'color',
						'title' => __('Accent Color', 'bean'), 
						'sub_desc' => __('Default color of this element: #00BCEB', 'bean'),
						'std' => ''
						),
						
					array(
						'id' => 'header_footer_color',
						'type' => 'color',
						'title' => __('Header / Footer Background', 'bean'), 
						'sub_desc' => __('Default color of this element: #2E3236', 'bean'),
						'std' => ''
						),
				
					array(
						'id' => 'selection_bg_color',
						'type' => 'color',
						'title' => __('Selection Background', 'bean'), 
						'sub_desc' => __('Default color of this element: #F4F4F6', 'bean'),
						'std' => ''
						),							

					array(
						'id' => 'selection_text_color',
						'type' => 'color',
						'title' => __('Selection Text Color', 'bean'), 
						'sub_desc' => __('Default color of this element: #2E3236', 'bean'),
						'std' => ''
						),	

					)
				);

$sections[] = array(
				'title' => __('Custom CSS', 'bean'),
				'desc' => __('<p class="description">Overwrite or customize various CSS elements throughout the theme by implementing your styles in this textarea.
				</p>', 'bean'),
				'fields' => array(
				
					array(
						'id' => 'bean_custom_css_input',
						'type' => 'textarea',
						'title' => __('Custom StyleSheet', 'bean'), 
						'sub_desc' => __('The CSS entered here will override all other CSS elements thoughout the theme.', 'bean'),
						'std' => ''
						),
					
					)
				);
				
								
  return $sections;
  
}

add_filter('radium-opts-sections-bean_theme', 'bean_load_framework_theme_options');

?>