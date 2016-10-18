<?php
	$featured_display = get_theme_mod( 'nomad_display_featured_article_setting', 0);
	$slider_cat = get_theme_mod( 'nomad_featured_category_setting');
	//query posts
	$args =	array(
		'offset'           => 0,
		'category_name' => $slider_cat,
		'post__not_in' => get_option("sticky_posts"),
		'posts_per_page' => -4,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true
	);

	$counter = 1;
	$the_query = new WP_Query( $args );
?>

<?php if($featured_display == 1){ ?>
	<?php if ($the_query->have_posts()) : ?>


        <div class="featured-articles">
            <ul class="article-list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li>
                    <?php if ( has_post_thumbnail() ) {?>
                        <div class="article-image">
                            <a href="<?php the_permalink('') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('nomad-thumb-medium'); ?></a>
                        </div>
                    <?php } ?>

                    <div class="article-excerpt">
                        <?php  the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink('') ?>" class="read_more"><?php _e( 'Read More', 'nomad' ); ?></a>
                    </div>
                </li>
                 <?php endwhile; ?>
            </ul>
        </div>


    <?php endif; ?>
<?php } ?>
<?php wp_reset_query(); ?>
