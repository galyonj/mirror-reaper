<?php
/**
 * Partial to output artists page content
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : November 29, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */ ?>

<article id="<?php the_ID(); ?>" <?php post_class( 'col-xs-12' ); ?>>
	<?php the_content(); ?>

	<?php
	$args = array(
		'post_type' => 'artist',
		'post_status' => 'publish',
		'order'       => 'asc',
		'orderby'     => 'title'
	);

	$artists = new WP_Query( $args );

	if( $artists->have_posts() ) : ?>

		<ul class="three-column full">

			<?php while( $artists->have_posts() ) : $artists->the_post(); ?>

				<li>
					<h2><?php the_title(); ?></h2>
					<p>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Learn more about <?php the_title(); ?>.">
							<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php the_title();
							?>" title="<?php the_title(); ?>">
						</a>
					</p>
					<p><?php the_excerpt(); ?></p>
				</li>

			<?php endwhile; ?>

		</ul>

	<?php endif; wp_reset_postdata(); ?>
</article>