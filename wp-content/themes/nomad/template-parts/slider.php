<?php
	$slider_display = get_theme_mod( 'nomad_display_slider_setting', 1);

	//query posts
	$args =	array(
		'offset'           => 0,
		'posts_per_page' => 10,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'post__in'  => get_option( 'sticky_posts' ),
		'ignore_sticky_posts' => 1,
		'suppress_filters' => true
	);

	$counter = 1;
	$the_query = new WP_Query( $args );
?>

<?php if($slider_display == 1){ ?>
	<?php if ($the_query->have_posts()) : ?>
        <section id="home-slider">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                        if ( has_post_thumbnail() ) {
                        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        ?>
                        <?php if($counter < 6){?>
                        <div class="item bg bg<?php echo $counter; ?> <?php if($counter == 1) {echo "active";} ?>" style="background-image:url(<?php echo esc_url($large_image_url[0]); ?>); background-position: center center; background-color:#e1e1e1;">
                            <div class="carousel-content-bg">
                                <div class="container">
                                	<div class="slide-post-details">
                                        <h1><a class="more" href="<?php the_permalink('') ?>"><?php nomad_custom_title('', '...', true, '25'); ?></a></h1>
                                        <div class="slide-meta">
											<?php nomad_posted_on(); ?>
                                        </div><!-- .entry-meta --><p><?php the_excerpt(); ?></p>
                                        <a href="<?php the_permalink('') ?>" class="read_more"><?php _e( 'Read More', 'nomad' ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php $counter = $counter + 1; ?>
                         <?php } ?>
                        <?php } ?>
                    <?php endwhile; ?>
                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </section>
    <?php endif; ?>
<?php } ?>
<?php wp_reset_query(); ?>
