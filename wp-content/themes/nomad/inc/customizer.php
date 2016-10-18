<?php
/**
 * Nomad Theme Customizer.
 *
 * @package Nomad
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nomad_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* logo option */
	$wp_customize->add_setting( 'nomad_logo_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nomad_logo', array(
		'label'    => __( 'Choose your logo (ideal width is 100-300px and ideal height is 40-100px)', 'nomad' ),
		'section'  => 'title_tagline',
		'settings' => 'nomad_logo_setting',
	) ) );

	//slider
	$wp_customize->add_section( 'nomad_slider_section' , array(
		'title'       => __( 'Slider', 'nomad' ),
		'priority'    => 20,
		'description' => __( 'Slider Option', 'nomad' ),
		'panel'  => 'nomad_home_featured_panel',
	) );

	$wp_customize->add_setting('nomad_display_slider_setting', array(
		'default'        => 1,
		'sanitize_callback' => 'nomad_sanitize_checkbox',
	));

	$wp_customize->add_control('nomad_display_slider_control', array(
		'settings' => 'nomad_display_slider_setting',
		'label'    => __('Display Slider', 'nomad'),
		'section'  => 'nomad_slider_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));

	//  Set Speed
	$wp_customize->add_setting( 'nomad_slider_speed_setting', array (
		'default' => '6000',
		'sanitize_callback' => 'nomad_sanitize_integer',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_slider_speed', array(
		'label'    => __( 'Slider Speed (milliseconds)', 'nomad' ),
		'section'  => 'nomad_slider_section',
		'settings' => 'nomad_slider_speed_setting',
		'priority'	=> 24
	) ) );

	// Featured articles
	$wp_customize->add_section( 'nomad_featured_article_section' , array(
		'title'       => __( 'Featured Article', 'nomad' ),
		'priority'    => 20,
		'description' => __( 'Featured Option', 'nomad' ),
		'panel'  => 'nomad_home_featured_panel',
	) );

	$wp_customize->add_setting('nomad_display_featured_article_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'nomad_sanitize_checkbox',
	));

	$wp_customize->add_control('nomad_display_featured_article_control', array(
		'settings' => 'nomad_display_featured_article_setting',
		'label'    => __('Display Featured Article', 'nomad'),
		'section'  => 'nomad_featured_article_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));

	$categories = get_categories();
			$cats = array();
			$i = 0;
			foreach($categories as $category){
				if($i==0){
					$default = $category->slug;
					$i++;
				}
				$cats[$category->slug] = $category->name;
			}

	//  =============================
	//  Select Box
	//  =============================
	$wp_customize->add_setting('nomad_featured_category_setting', array(
		'default' => '',
		'sanitize_callback' => 'nomad_sanitize_category',
	));

	$wp_customize->add_control('nomad_featured_category_control', array(
		'settings' => 'nomad_featured_category_setting',
		'type' => 'select',
		'label' => __( 'Select Category:', 'nomad' ),
		'section' => 'nomad_featured_article_section',
		'choices' => $cats,
		'priority'	=> 24
	));

	/* social media option */
	$wp_customize->add_section( 'nomad_social_section' , array(
		'title'       => __( 'Social Media Icons', 'nomad' ),
		'priority'    => 32,
		'description' => __( 'Optional social media buttons in the header', 'nomad' ),
	) );

	$wp_customize->add_setting( 'nomad_facebook_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_facebook', array(
		'label'    => __( 'Enter your Facebook url', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_facebook_setting',
		'priority'    => 101,
	) ) );

	$wp_customize->add_setting( 'nomad_twitter_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_twitter', array(
		'label'    => __( 'Enter your Twitter url', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_twitter_setting',
		'priority'    => 102,
	) ) );

	$wp_customize->add_setting( 'nomad_google_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_google', array(
		'label'    => __( 'Enter your Google+ url', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_google_setting',
		'priority'    => 103,
	) ) );

	$wp_customize->add_setting( 'nomad_pinterest_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_pinterest', array(
		'label'    => __( 'Enter your Pinterest url', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_pinterest_setting',
		'priority'    => 104,
	) ) );

	$wp_customize->add_setting( 'nomad_linkedin_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_linkedin', array(
		'label'    => __( 'Enter your Linkedin url', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_linkedin_setting',
		'priority'    => 105,
	) ) );

	$wp_customize->add_setting( 'nomad_youtube_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_youtube', array(
		'label'    => __( 'Enter your Youtube url', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_youtube_setting',
		'priority'    => 106,
	) ) );

	$wp_customize->add_setting( 'nomad_tumblr_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_tumblr', array(
		'label'    => __( 'Enter your Tumblr url', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_tumblr_setting',
		'priority'    => 107,
	) ) );

	$wp_customize->add_setting( 'nomad_instagram_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_instagram', array(
		'label'    => __( 'Enter your Instagram url', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_instagram_setting',
		'priority'    => 108,
	) ) );

	$wp_customize->add_setting( 'nomad_flickr_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_flickr', array(
		'label'    => __( 'Enter your Flickr url', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_flickr_setting',
		'priority'    => 109,
	) ) );

	$wp_customize->add_setting( 'nomad_vimeo_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_vimeo', array(
		'label'    => __( 'Enter your Vimeo url', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_vimeo_setting',
		'priority'    => 110,
	) ) );
	$wp_customize->add_setting( 'nomad_rss_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_rss', array(
		'label'    => __( 'Enter your RSS url', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_rss_setting',
		'priority'    => 111,
	) ) );

	$wp_customize->add_setting( 'nomad_email_setting', array (
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nomad_email', array(
		'label'    => __( 'Enter your email address', 'nomad' ),
		'section'  => 'nomad_social_section',
		'settings' => 'nomad_email_setting',
		'priority'    => 112,
	) ) );

	$wp_customize->add_panel( 'nomad_home_featured_panel', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Home Page Features', 'nomad' ),
		'description'    => __( 'Home Slider and Features Settings', 'nomad' ),
	) );

	/* color option */
	$wp_customize->add_setting( 'nomad_primary_text_color_setting', array (
		'default'     => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nomad_primary_text_color', array(
			'label'    => __( 'Theme Primary Text Color', 'nomad' ),
			'section'  => 'colors',
			'settings' => 'nomad_primary_text_color_setting',
	) ) );

	$wp_customize->add_setting( 'nomad_primary_color_setting', array (
		'default'     => '#c31516',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nomad_primary_color', array(
			'label'    => __( 'Theme Primary Color', 'nomad' ),
			'section'  => 'colors',
			'settings' => 'nomad_primary_color_setting',
	) ) );

}
add_action( 'customize_register', 'nomad_customize_register' );

function nomad_sanitize_text_field( $str ) {
	return sanitize_text_field( $str );
}

/**
 * Sanitize integer input
 */
if ( ! function_exists( 'nomad_sanitize_integer' ) ) :
	function nomad_sanitize_integer( $input ) {
		return absint($input);
	}
endif;

/**
 * Sanitize checkbox
 */

if (!function_exists( 'nomad_sanitize_checkbox' ) ) :
	function nomad_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

if ( ! function_exists( 'nomad_sanitize_category' ) ){
	function nomad_sanitize_category( $input ) {
		$categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}
		$valid = $cats;

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';

		}
	}
}

/**
* Apply Color Scheme
*/
if ( ! function_exists( 'nomad_apply_color' ) ) :
  function nomad_apply_color() {
	?>
	<style id="color-settings">
	<?php if (esc_html(get_theme_mod('nomad_primary_text_color_setting')) ) { ?>
		.site-title a, .site-description, .main-navigation a, .slide-post-details p, .slide-post-details a, .read_more, .widget-title, .site-footer a, .site-footer table, .site-footer, .site-footer p, .site-footer .widget ul li a, .site-footer caption, .site-footer a, .site-footer table, .site-footer, .site-footer p, .site-footer .widget ul li a, .site-footer caption, .page-numbers .fa-chevron-right, .page-numbers .fa-chevron-left, button, input[type="button"], input[type="reset"], input[type="submit"] {color:<?php echo esc_html(get_theme_mod('nomad_primary_text_color_setting')); ?>}
	<?php } ?>

  <?php if (esc_html(get_theme_mod('nomad_primary_color_setting')) ) { ?>
		.branding-wrapper, .read_more, .site-copyright, .widget-title, .page-numbers .fa-chevron-right, .page-numbers .fa-chevron-left, button, input[type="button"], input[type="reset"], input[type="submit"] {background:<?php echo esc_html(get_theme_mod('nomad_primary_color_setting')); ?>}.site-footer table a, .site-footer .widget ul li a:hover, .pagination, .main-navigation a:hover, .slide-post-details h1 a:hover, .entry-title a:hover, .page-numbers .fa-chevron-right:hover, .page-numbers .fa-chevron-left:hover, a:active, a:hover, .widget ul li a:hover{color:<?php echo get_theme_mod('nomad_primary_color_setting'); ?>}
	<?php } ?>

	</style>
	<?php
  }
endif;
add_action( 'wp_head', 'nomad_apply_color' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nomad_customize_preview_js() {
	wp_enqueue_script( 'nomad_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'nomad_customize_preview_js' );
