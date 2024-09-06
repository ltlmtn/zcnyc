<?php
function asw_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'banner' , array(
        'title'             => 'Banner',
        'priority'          => 1
    ) );

    $wp_customize->add_section( 'theme' , array(
        'title'             => 'Theme Settings',
        'priority'          => 2
    ) );

    $wp_customize->add_section( 'seo' , array(
        'title'             => 'SEO',
        'priority'          => 3
    ) );

    // Banner Settings

    $wp_customize->add_setting( 'banner_text', array() );
    $wp_customize->add_control( 'banner_text', array(
        'label'    => 'Banner Text',
        'section'  => 'banner',
        'type'     => 'textarea',
        'description' => 'This is the text that will appear on the banner.'
    ) );

    $wp_customize->add_setting( 'banner_button_label', array() );
    $wp_customize->add_control( 'banner_button_label', array(
        'label'    => 'Button Label',
        'section'  => 'banner',
        'type'     => 'text'
    ) );

    $wp_customize->add_setting( 'banner_button_url', array() );
    $wp_customize->add_control( 'banner_button_url', array(
        'label'    => 'Button URL',
        'section'  => 'banner',
        'type'     => 'text',
        'description' => '/example/ or https://example.com'
    ) );

    // SEO Settings

    $wp_customize->add_setting( 'seo_title');
    $wp_customize->add_control( 'seo_title', array(
        'label' => __( 'SEO Title' ),
        'type' => 'text',
        'section' => 'seo',
        'description' => 'Enter the SEO title for the page.'
    ) );

    $wp_customize->add_setting( 'seo_description');
    $wp_customize->add_control( 'seo_description', array(
        'label' => __( 'SEO Description' ),
        'type' => 'text',
        'section' => 'seo',
        'description' => 'Enter the SEO description for the page.'
    ) );

    $wp_customize->add_setting( 'default_image');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'default_image', array(
        'label' => __( 'Default Image' ),
        'section' => 'seo',
        'description' => 'Upload the default image for the page.'
    ) ) );

    // Theme Settings
    $wp_customize->add_setting( 'monochrome_heroes', array( 
        'default' => false, 
        'sanitize_callback' => 'sanitize_text_field' 
    ) ); 
    $wp_customize->add_control( 'monochrome_heroes', array( 
        'label' => 'Monochrome Heroes', 
        'section' => 'theme', 
        'type' => 'checkbox', 
        'description' => 'Enable monochrome heroes.' 
    ) );



}

add_action( 'customize_register', 'asw_customize_register' );