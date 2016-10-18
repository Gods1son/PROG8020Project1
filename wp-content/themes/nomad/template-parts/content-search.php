<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nomad
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(has_post_thumbnail()){ ?>
        <div class="img-container">
            <a href="<?php the_permalink('') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('nomad-featured-thumbnails'); ?></a>
            <?php
            if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php nomad_posted_on(); ?>
            </div><!-- .entry-meta -->
            <?php
            endif; ?>
        </div>
    <?php } ?>

    <header class="entry-header">
        <?php
            if ( is_single() ) {
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else {
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }

            if(!has_post_thumbnail()){ ?>
                <div class="entry-meta">
                    <?php nomad_posted_on(); ?>
                </div><!-- .entry-meta -->
            <?php } ?>
    </header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<a href="<?php the_permalink('') ?>" class="read_more"><?php _e( 'Read More', 'nomad' ); ?></a>

</article><!-- #post-## -->
