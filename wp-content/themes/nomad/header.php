<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nomad
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nomad' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

    	<div class="branding-wrapper">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="site-branding">
                           <?php
							if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
							}
						?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
                        </div><!-- .site-branding -->
                       	<?php dynamic_sidebar('header-widget'); ?>
                    </div>

                </div>
            </div>
        </div><!--branding-wrapper-->

        <div class="nav-wrapper">
            <div class="container">
                <div class="row">
                	<div class="col-md-12">

                    <div class="search-bar">
                        <div class="search-box">
                            <div class="search-container">
                                <div class="serch-form-coantainer desktop">
                                    <?php get_search_form(); ?>
                                </div>
                                <span id="search-button" class="desktop"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>


                    <div class="main-nav-wrapper">
                    	<nav id="site-navigation" class="main-navigation" role="navigation">
                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                        </nav><!-- #site-navigation -->
                    </div>

                    </div>
                </div>
            </div>
		</div><!--nav-wrapper-->

	</header><!-- #masthead -->

	<?php if(is_home() || is_front_page()){ ?>
		<?php get_template_part( 'template-parts/slider' ) ;
		get_template_part( 'template-parts/featured-articles' )
		?>
    <?php } ?>

	<div id="content" class="site-content">
