<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wanderlust
 */

?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
		<div class="single-post">

		<?php if(has_post_thumbnail()){
                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        ?>
            <div class="img-container" style="background-image:url(<?php echo esc_url($large_image_url[0]); ?>); background-position: center center;height: 500px;max-height: 500px; background-repeat:no-repeat; background-size:cover;">

            </div>
        <?php } ?>


            <div class="container">
                <div class="row post-details">

                    <div class="col-md-9">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <header class="entry-header">
                                <?php
                                    if ( is_single() ) {
                                        the_title( '<h1 class="entry-title">', '</h1>' );
                                    } else {
                                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                    }
                                ?>
                                <?php if ( 'post' === get_post_type() ) : ?>
                                <div class="single-meta ">
                                    <?php nomad_posted_on(); ?>
                                </div><!-- .entry-meta -->
                                <?php
                                endif; ?>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <?php the_content(); ?>

                                <?php
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nomad' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                        <?php
                            the_post_navigation();
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>

                    </div>
                    <div class="col-md-3 sidebar-wrapper">
                        <?php get_sidebar(); ?>
                    </div>
                </div>

            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
