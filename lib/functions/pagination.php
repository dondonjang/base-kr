<?php
/*-----------------------------------------------------------------------------------
	Pagination - Thanks to Kriesi for this code - http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin
-----------------------------------------------------------------------------------*/
if(!function_exists('bean_index_pagination')) {
	/**
	* Displays a page pagination if more posts are available than can be displayed on one page
	* @param string $pages pass the number of pages instead of letting the script check the global paged var
	* @return string $output returns the pagination html code
	*/
	function bean_index_pagination($pages = '') {
		global $paged;
		
		if(get_query_var('paged')) {
		     $paged = get_query_var('paged');
		} elseif(get_query_var('page')) {
		     $paged = get_query_var('page');
		} else {
		     $paged = 1;
		}
		
		$output = "";
		$prev = $paged - 1;							
		$next = $paged + 1;	
		$range = 7; // only edit this if you want to show more page-links
		$showitems = ($range * 2)+1;
		
		if($pages == '')
		{	
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages)
			{
				$pages = 1;
			}
		}
		
		$method = "get_pagenum_link";
		if(is_single())
		{
			$method = "radium_post_pagination_link";
		}
		
		$archive_nav= "radium_post_pagination_link";
		
		
		if(1 != $pages)
		{
			$output .= "<div class='index-pagination'>";
			
			$output .= ($paged > 2 && $paged > $range+1 && $showitems < $pages)? "<a href='".$method(1)."'></a>":"";

			
			$output .= ($paged > 1 )? "<span class='index-pager prev'><a href='".$method($prev)."'></a></span>":"<span class='index-pager prev inactive'><a href='#'></a></span>";
			
					
			for ($i=1; $i <= $pages; $i++)
			{
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				{
					$output .= ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".$method($i)."' class='inactive' >".$i."</a>"; 
				}
			}

			
			$output .= ($paged < $pages ) ? "<span class='index-pager next'><a href='".$method($next)."'></a></span>" :"<span class='index-pager next inactive'><a href='#'></a></span>";
			

			
			$output .= ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".$method($pages)."'></a>":"";
			
			$output .= "</div>\n";
									
			
		}
			
		return $output;
	}
	
	function radium_post_pagination_link($link){
		$url =  preg_replace('!">$!','',_wp_link_page($link));
		$url =  preg_replace('!^<a href="!','',$url);
		return $url;
	}
}

?>