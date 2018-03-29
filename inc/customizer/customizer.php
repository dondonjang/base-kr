<?php
/**
 * Charmed Customizer functionality
 *
 * @package Base
 */


/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function bean_customize_register( $wp_customize ) {

    

    /**
     * Remove unnecessary controls.
     */
    $wp_customize->remove_section( 'colors');
    $wp_customize->remove_section( 'background_image');
    $wp_customize->get_section( 'title_tagline'  )->title = esc_html__('Site Identity','bean');
    


    /**
     * JetPack Site Logo feaure support
     * Check to see if JetPack Site Logo module is added. 
     * For more information on the JetPack site logo:
     *
     * @see http://jetpack.me/support/site-logo/
     */
    if ( !function_exists( 'jetpack_the_site_logo' ) ) { 

        // Add sharing default image uploader setting and control.
        $wp_customize->add_setting( 'site_logo', array(
            'sanitize_callback'     => 'bean_sanitize_image',
            'default'               => '',
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo', array(
              'label'                   => esc_html__( 'Logo', 'bean' ),
              'section'                 => 'title_tagline',
              'settings'                => 'site_logo',
        ) ) );

        // Add the retina height setting and control.
        $wp_customize->add_setting( 'site_logo_width', array(
            'default'               => '',
            'sanitize_callback'     => 'bean_sanitize_nohtml',
        ) );

        $wp_customize->add_control( 'site_logo_width', array(
            'type'              => 'text',
            'label'                 => esc_html__( 'Logo Retina Width', 'bean' ),
            'description'           => esc_html__( 'This value should be equal to half of the logo image width (in px). For example, enter "50" for a logo that is 100px wide.', 'bean' ),
            'section'               => 'title_tagline',
        ) );

    } else {
        
        // Add the retina logo  setting and control.
        $wp_customize->add_setting( 'retina_logo', array(
            'default'               => FALSE,
            'sanitize_callback'     => 'bean_sanitize_checkbox',
        ) );

        $wp_customize->add_control( 'retina_logo', array(
            'type'              => 'checkbox',
            'label'                 => esc_html__( 'Enable retina logo', 'bean' ),
            'description'           => esc_html__( '', 'bean' ),
            'section'           => 'title_tagline',
        ) );
    }
}

add_action( 'customize_register', 'bean_customize_register', 11 );