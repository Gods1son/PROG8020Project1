<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nomad
 */

get_header(); ?>

	<?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', ('single') );

        // If comments are open or we have at least one comment, load up the comment template.
    endwhile; // End of the loop.
    ?>

<?php
get_footer();
