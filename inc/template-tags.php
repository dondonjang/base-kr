<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Base
 */



if ( ! function_exists( 'base_site_logo' ) ) :
/**
 * Output an <img> tag of the site logo.
 *
 * Checks if jetpack_the_site_logo is available. If so, use  jetpack_the_site_logo();.
 * If not, there's a fallback of site_logo in the Theme Customizer.
 *
 */
function base_site_logo() {

    if ( function_exists( 'jetpack_the_site_logo' ) ) : 
        if ( jetpack_has_site_logo() ) { jetpack_the_site_logo(); } 
        else { ?> <h1 class="site-logo-link"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><?php }
    else : 
        if( get_theme_mod( 'site_logo' )) { ?> 
            <a class="site-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img style="<?php base_retina_logo(); ?>" src="<?php echo esc_url( get_theme_mod( 'site_logo' ) );?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="site-logo"></a>
        <?php
        } else { ?>
            <h1 class="site-logo-link"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php }
    endif; 
}
endif;



if ( ! function_exists( 'base_retina_logo' ) ) :
/**
* Output the width of the uploaded image, at 1/2 the original size.
*
* Create your own charmed_retina_logo() to override in a child theme.
*
*/
function base_retina_logo( $location ) {
    
    $data = get_theme_mod( 'site_logo_width' ); 
    $width = 'width:'.$data.'px;';
    echo $width;
}
endif;