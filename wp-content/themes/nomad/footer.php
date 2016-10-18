<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nomad
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

    	<div class="footer-widget-container">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-4">
                        <?php dynamic_sidebar('footer-one-widget'); ?>
                    </div>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-two-widget'); ?>
                    </div>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-three-widget'); ?>
                    </div>
				</div>
			</div>
        </div>

    	<div class="site-copyright">
            <div class="container">
            	<div class="row">

                	<div class="col-sm-6">
                        <div class="site-info">
                            <?php if(is_home() && !is_paged()){?>
                                <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'nomad' ) ); ?>" title="<?php esc_attr_e( 'WordPress' ,'nomad' ); ?>"><?php printf( __( 'Powered by %s', 'nomad' ), 'WordPress' ); ?></a>
                                <?php _e(' and ', 'nomad'); ?><a href="<?php echo esc_url( __( 'http://protravelblogs.com', 'nomad' ) ); ?>"><?php printf( __( '%s', 'nomad' ), 'Pro Travel Blogs' ); ?></a>
                            <?php } else{?>
                                <?php echo __('&copy; ', 'nomad') . esc_attr( get_bloginfo( 'name' ) );  ?>
                                <?php } ?>


                        </div><!-- .site-info -->
                    </div>

                    <div class="col-md-6">
                    	<ul class="social-icons">
                            <?php if ( get_theme_mod( 'nomad_facebook_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'nomad_facebook_setting' ) ); ?>" title="<?php _e('Facebook', 'nomad'); ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'nomad_twitter_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'nomad_twitter_setting' ) ); ?>" title="<?php _e('Twitter', 'nomad'); ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'nomad_google_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'nomad_google_setting' ) ); ?>" title="<?php _e('Google Plus', 'nomad'); ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'nomad_pinterest_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'nomad_pinterest_setting' ) ); ?>" title="<?php _e('Pinterest', 'nomad'); ?>"><i class="fa fa-pinterest"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'nomad_linkedin_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'nomad_linkedin_setting' ) ); ?>" title="<?php _e('Linkedin', 'nomad'); ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'nomad_youtube_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'nomad_youtube_setting' ) ); ?>" title="<?php _e('Youtube', 'nomad'); ?>"><i class="fa fa-youtube"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'nomad_tumblr_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'nomad_tumblr_setting' ) ); ?>" title="<?php _e('Tumblr', 'nomad'); ?>"><i class="fa fa-tumblr"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'nomad_instagram_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'nomad_instagram_setting' ) ); ?>" title="<?php _e('Instagram', 'nomad'); ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'nomad_flickr_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'nomad_flickr_setting' ) ); ?>" title="<?php _e('Flickr', 'nomad'); ?>"><i class="fa fa-flickr"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'nomad_vimeo_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'nomad_vimeo_setting' ) ); ?>" title="<?php _e('Vimeo', 'nomad'); ?>"><i class="fa fa-vimeo-square"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'nomad_rss_setting' ) ){ ?>
                                <li><a href="<?php echo esc_url( get_theme_mod( 'nomad_rss_setting' ) ); ?>" title="<?php _e('RSS', 'nomad'); ?>"><i class="fa fa-rss"></i></a></li>
                            <?php } ?>
                            <?php if ( get_theme_mod( 'nomad_email_setting' ) ) : ?>
                                <li><a href="<?php _e('mailto:', 'nomad'); echo sanitize_email( get_theme_mod( 'nomad_email_setting' ) ); ?>"  title="<?php _e('Email', 'nomad');?>"><i class="fa fa-envelope"></i></a></li>
                        <?php endif; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div><!--site-copyright-->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>


