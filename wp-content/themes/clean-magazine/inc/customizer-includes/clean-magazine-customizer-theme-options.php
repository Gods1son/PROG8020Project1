<?php
/**
 * The template for adding additional theme options in Customizer
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */

//Theme Options
	$wp_customize->add_panel( 'clean_magazine_theme_options', array(
	    'description'    => __( 'Basic theme Options', 'clean-magazine' ),
	    'capability'     => 'edit_theme_options',
	    'priority'       => 200,
	    'title'    		 => __( 'Theme Options', 'clean-magazine' ),
	) );

	// Breadcrumb Option
	$wp_customize->add_section( 'clean_magazine_breadcumb_options', array(
		'description'	=> __( 'Breadcrumbs are a great way of letting your visitors find out where they are on your site with just a glance. You can enable/disable them on homepage and entire site.', 'clean-magazine' ),
		'panel'			=> 'clean_magazine_theme_options',
		'title'    		=> __( 'Breadcrumb Options', 'clean-magazine' ),
		'priority' 		=> 201,
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[breadcumb_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_option'],
		'sanitize_callback' => 'clean_magazine_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[breadcumb_option]', array(
		'label'    => __( 'Check to enable Breadcrumb', 'clean-magazine' ),
		'section'  => 'clean_magazine_breadcumb_options',
		'settings' => 'clean_magazine_theme_options[breadcumb_option]',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[breadcumb_onhomepage]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_onhomepage'],
		'sanitize_callback' => 'clean_magazine_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[breadcumb_onhomepage]', array(
		'label'    => __( 'Check to enable Breadcrumb on Homepage', 'clean-magazine' ),
		'section'  => 'clean_magazine_breadcumb_options',
		'settings' => 'clean_magazine_theme_options[breadcumb_onhomepage]',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[breadcumb_seperator]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_seperator'],
		'sanitize_callback'	=> 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[breadcumb_seperator]', array(
		'input_attrs' => array(
        		'style' => 'width: 40px;'
    		),
    	'label'    	=> __( 'Separator between Breadcrumbs', 'clean-magazine' ),
		'section' 	=> 'clean_magazine_breadcumb_options',
		'settings' 	=> 'clean_magazine_theme_options[breadcumb_seperator]',
		'type'     	=> 'text'
		)
	);
   	// Breadcrumb Option End

   	// Custom CSS Option
	$wp_customize->add_section( 'clean_magazine_custom_css', array(
		'description'	=> __( 'Custom/Inline CSS', 'clean-magazine'),
		'panel'  		=> 'clean_magazine_theme_options',
		'priority' 		=> 203,
		'title'    		=> __( 'Custom CSS Options', 'clean-magazine' ),
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[custom_css]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['custom_css'],
		'sanitize_callback' => 'clean_magazine_sanitize_custom_css',
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[custom_css]', array(
			'label'		=> __( 'Enter Custom CSS', 'clean-magazine' ),
	        'priority'	=> 1,
			'section'   => 'clean_magazine_custom_css',
	        'settings'  => 'clean_magazine_theme_options[custom_css]',
			'type'		=> 'textarea',
	) );
   	// Custom CSS End

   	// Excerpt Options
	$wp_customize->add_section( 'clean_magazine_excerpt_options', array(
		'panel'  	=> 'clean_magazine_theme_options',
		'priority' 	=> 204,
		'title'    	=> __( 'Excerpt Options', 'clean-magazine' ),
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[excerpt_length]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['excerpt_length'],
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[excerpt_length]', array(
		'description' => __('Excerpt length. Default is 30 words', 'clean-magazine'),
		'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'width: 60px;'
            ),
        'label'    => __( 'Excerpt Length (words)', 'clean-magazine' ),
		'section'  => 'clean_magazine_excerpt_options',
		'settings' => 'clean_magazine_theme_options[excerpt_length]',
		'type'	   => 'number',
		)
	);

	$wp_customize->add_setting( 'clean_magazine_theme_options[excerpt_more_text]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['excerpt_more_text'],
		'sanitize_callback'	=> 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[excerpt_more_text]', array(
		'label'    => __( 'Read More Text', 'clean-magazine' ),
		'section'  => 'clean_magazine_excerpt_options',
		'settings' => 'clean_magazine_theme_options[excerpt_more_text]',
		'type'	   => 'text',
	) );
	// Excerpt Options End


	//Homepage / Frontpage Options
	$wp_customize->add_section( 'clean_magazine_homepage_options', array(
		'description'	=> __( 'Only posts that belong to the categories selected here will be displayed on the front page', 'clean-magazine' ),
		'panel'			=> 'clean_magazine_theme_options',
		'priority' 		=> 209,
		'title'   	 	=> __( 'Homepage / Frontpage Options', 'clean-magazine' ),
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[front_page_category]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['front_page_category'],
		'sanitize_callback'	=> 'clean_magazine_sanitize_category_list',
	) );

	$wp_customize->add_control( new clean_magazine_Customize_Dropdown_Categories_Control( $wp_customize, 'clean_magazine_theme_options[front_page_category]', array(
        'label'   	=> __( 'Select Categories', 'clean-magazine' ),
        'name'	 	=> 'clean_magazine_theme_options[front_page_category]',
		'priority'	=> '6',
        'section'  	=> 'clean_magazine_homepage_options',
        'settings' 	=> 'clean_magazine_theme_options[front_page_category]',
        'type'     	=> 'dropdown-categories',
    ) ) );
	//Homepage / Frontpage Settings End
	//

	// Layout Options
	$wp_customize->add_section( 'clean_magazine_layout', array(
		'capability'=> 'edit_theme_options',
		'panel'		=> 'clean_magazine_theme_options',
		'priority'	=> 211,
		'title'		=> __( 'Layout Options', 'clean-magazine' ),
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[theme_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['theme_layout'],
		'sanitize_callback' => 'clean_magazine_sanitize_select',
	) );

	$layouts = clean_magazine_layouts();
	$choices = array();
	foreach ( $layouts as $layout ) {
		$choices[ $layout['value'] ] = $layout['label'];
	}

	$wp_customize->add_control( 'clean_magazine_theme_options[theme_layout]', array(
		'choices'	=> $choices,
		'label'		=> __( 'Default Layout', 'clean-magazine' ),
		'section'	=> 'clean_magazine_layout',
		'settings'   => 'clean_magazine_theme_options[theme_layout]',
		'type'		=> 'select',
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[content_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['content_layout'],
		'sanitize_callback' => 'clean_magazine_sanitize_select',
	) );

	$layouts = clean_magazine_get_archive_content_layout();
	$choices = array();
	foreach ( $layouts as $layout ) {
		$choices[ $layout['value'] ] = $layout['label'];
	}

	$wp_customize->add_control( 'clean_magazine_theme_options[content_layout]', array(
		'choices'   => $choices,
		'label'		=> __( 'Archive Content Layout', 'clean-magazine' ),
		'section'   => 'clean_magazine_layout',
		'settings'  => 'clean_magazine_theme_options[content_layout]',
		'type'      => 'select',
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[single_post_image_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['single_post_image_layout'],
		'sanitize_callback' => 'clean_magazine_sanitize_select',
	) );


	$single_post_image_layouts = clean_magazine_single_post_image_layout_options();
	$choices = array();
	foreach ( $single_post_image_layouts as $single_post_image_layout ) {
		$choices[$single_post_image_layout['value']] = $single_post_image_layout['label'];
	}

	$wp_customize->add_control( 'clean_magazine_theme_options[single_post_image_layout]', array(
			'label'		=> __( 'Single Page/Post Image Layout ', 'clean-magazine' ),
			'section'   => 'clean_magazine_layout',
	        'settings'  => 'clean_magazine_theme_options[single_post_image_layout]',
	        'type'	  	=> 'select',
			'choices'  	=> $choices,
	) );
   	// Layout Options End

	// Pagination Options
	$pagination_type	= $options['pagination_type'];

	$clean_magazine_navigation_description = sprintf( __( 'Numeric Option requires <a target="_blank" href="%s">WP-PageNavi Plugin</a>.<br/>Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'clean-magazine' ), esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ), esc_url( 'https://wordpress.org/plugins/jetpack/' ) );

	/**
	 * Check if navigation type is Jetpack Infinite Scroll and if it is enabled
	 */
	if ( ( 'infinite-scroll-click' == $pagination_type || 'infinite-scroll-scroll' == $pagination_type ) ) {
		if ( ! (class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) ) {
			$clean_magazine_navigation_description = sprintf( __( 'Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'clean-magazine' ), esc_url( 'https://wordpress.org/plugins/jetpack/' ) );
		}
		else {
			$clean_magazine_navigation_description = '';
		}
	}
	/**
	* Check if navigation type is numeric and if Wp-PageNavi Plugin is enabled
	*/
	else if ( 'numeric' == $pagination_type ) {
		if ( !function_exists( 'wp_pagenavi' ) ) {
			$clean_magazine_navigation_description = sprintf( __( 'Numeric Option requires <a target="_blank" href="%s">WP-PageNavi Plugin</a>.', 'clean-magazine' ), esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ) );
		}
		else {
			$clean_magazine_navigation_description = '';
		}
    }

	$wp_customize->add_section( 'clean_magazine_pagination_options', array(
		'description'	=> $clean_magazine_navigation_description,
		'panel'  		=> 'clean_magazine_theme_options',
		'priority'		=> 212,
		'title'    		=> __( 'Pagination Options', 'clean-magazine' ),
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[pagination_type]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['pagination_type'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$pagination_types = clean_magazine_get_pagination_types();
	$choices = array();
	foreach ( $pagination_types as $pagination_type ) {
		$choices[$pagination_type['value']] = $pagination_type['label'];
	}

	$wp_customize->add_control( 'clean_magazine_theme_options[pagination_type]', array(
		'choices'  => $choices,
		'label'    => __( 'Pagination type', 'clean-magazine' ),
		'section'  => 'clean_magazine_pagination_options',
		'settings' => 'clean_magazine_theme_options[pagination_type]',
		'type'	   => 'select',
	) );
	// Pagination Options End

	//Promotion Headline Options
    $wp_customize->add_section( 'clean_magazine_promotion_headline_options', array(
		'description'	=> __( 'To disable the fields, simply leave them empty.', 'clean-magazine' ),
		'panel'			=> 'clean_magazine_theme_options',
		'priority' 		=> 213,
		'title'   	 	=> __( 'Promotion Headline Options', 'clean-magazine' ),
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[promotion_headline_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['promotion_headline_option'],
		'sanitize_callback' => 'clean_magazine_sanitize_select',
	) );

	$clean_magazine_featured_slider_content_options = clean_magazine_featured_slider_content_options();
	$choices = array();
	foreach ( $clean_magazine_featured_slider_content_options as $clean_magazine_featured_slider_content_option ) {
		$choices[$clean_magazine_featured_slider_content_option['value']] = $clean_magazine_featured_slider_content_option['label'];
	}

	$wp_customize->add_control( 'clean_magazine_theme_options[promotion_headline_option]', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Enable Promotion Headline on', 'clean-magazine' ),
		'priority'	=> '0.5',
		'section'  	=> 'clean_magazine_promotion_headline_options',
		'settings' 	=> 'clean_magazine_theme_options[promotion_headline_option]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[promotion_headline]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline'],
		'sanitize_callback'	=> 'wp_kses_post'
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[promotion_headline]', array(
		'description'	=> __( 'Appropriate Words: 10', 'clean-magazine' ),
		'label'    	=> __( 'Promotion Headline Text', 'clean-magazine' ),
		'priority'	=> '1',
		'section' 	=> 'clean_magazine_promotion_headline_options',
		'settings'	=> 'clean_magazine_theme_options[promotion_headline]',
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[promotion_subheadline]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_subheadline'],
		'sanitize_callback'	=> 'wp_kses_post'
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[promotion_subheadline]', array(
		'description'	=> __( 'Appropriate Words: 15', 'clean-magazine' ),
		'label'    	=> __( 'Promotion Subheadline Text', 'clean-magazine' ),
		'priority'	=> '2',
		'section' 	=> 'clean_magazine_promotion_headline_options',
		'settings'	=> 'clean_magazine_theme_options[promotion_subheadline]',
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[promotion_headline_button]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_button'],
		'sanitize_callback'	=> 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[promotion_headline_button]', array(
		'description'	=> __( 'Appropriate Words: 3', 'clean-magazine' ),
		'label'    	=> __( 'Promotion Headline Button Text ', 'clean-magazine' ),
		'priority'	=> '3',
		'section' 	=> 'clean_magazine_promotion_headline_options',
		'settings'	=> 'clean_magazine_theme_options[promotion_headline_button]',
		'type'		=> 'text',
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[promotion_headline_url]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_url'],
		'sanitize_callback'	=> 'esc_url_raw'
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[promotion_headline_url]', array(
		'label'    	=> __( 'Promotion Headline Link', 'clean-magazine' ),
		'priority'	=> '4',
		'section' 	=> 'clean_magazine_promotion_headline_options',
		'settings'	=> 'clean_magazine_theme_options[promotion_headline_url]',
		'type'		=> 'text',
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[promotion_headline_target]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_target'],
		'sanitize_callback' => 'clean_magazine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[promotion_headline_target]', array(
		'label'    	=> __( 'Check to Open Link in New Window/Tab', 'clean-magazine' ),
		'priority'	=> '5',
		'section'  	=> 'clean_magazine_promotion_headline_options',
		'settings' 	=> 'clean_magazine_theme_options[promotion_headline_target]',
		'type'     	=> 'checkbox',
	) );
	// Promotion Headline Options End

	// Scrollup
	$wp_customize->add_section( 'clean_magazine_scrollup', array(
		'panel'    => 'clean_magazine_theme_options',
		'priority' => 215,
		'title'    => __( 'Scrollup Options', 'clean-magazine' ),
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[disable_scrollup]', array(
		'capability'		=> 'edit_theme_options',
        'default'			=> $defaults['disable_scrollup'],
		'sanitize_callback' => 'clean_magazine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[disable_scrollup]', array(
		'label'		=> __( 'Check to disable Scroll Up', 'clean-magazine' ),
		'section'   => 'clean_magazine_scrollup',
        'settings'  => 'clean_magazine_theme_options[disable_scrollup]',
		'type'		=> 'checkbox',
	) );
	// Scrollup End

	// Search Options
	$wp_customize->add_section( 'clean_magazine_search_options', array(
		'description'=> __( 'Change default placeholder text in Search.', 'clean-magazine'),
		'panel'  => 'clean_magazine_theme_options',
		'priority' => 216,
		'title'    => __( 'Search Options', 'clean-magazine' ),
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[search_text]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['search_text'],
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[search_text]', array(
		'label'		=> __( 'Default Display Text in Search', 'clean-magazine' ),
		'section'   => 'clean_magazine_search_options',
        'settings'  => 'clean_magazine_theme_options[search_text]',
		'type'		=> 'text',
	) );
	// Search Options End
//Theme Option End
