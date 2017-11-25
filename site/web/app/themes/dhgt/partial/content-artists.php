<?php
/**
 * Partial to output artists landing page content
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : October 19, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */

$args = array(
	'ignore_sticky_posts' => true,
	'order'               => 'ASC',
	'orderby'             => 'title',
	'post_parent'         => $post->ID,
	'post_type'           => 'page',
	'post_status'         => 'publish',
);

$artist_pages = new WP_Query( $args );

if( $artist_pages->have_posts() ) : ?>

	<div class="row artists-row">

		<?php while( $artist_pages->have_posts() ) : $artist_pages->the_post(); ?>

			<div class="col-xs-12 col-sm-4 artist-item">
				<h2><?php echo current( explode( ' ', get_the_title() ) ); ?></h2>
				<p>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
						<img src="<?php the_post_thumbnail_url(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="img-responsive">
					</a>
				</p>
				<?php the_excerpt(); ?>
			</div>

		<?php endwhile; ?>

	</div>

<?php endif; wp_reset_postdata(); ?>