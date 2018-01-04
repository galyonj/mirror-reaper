<?php
/**
 * Partial to output artist page sidebar information
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 1, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */ ?>

<aside class="col-xs-12 col-md-4 pull-right" role="complementary">
	<?php
	$args = array(
		'post_parent' => $post->ID,
		'post_type'   => 'portfolio',
		'post_status' => 'publish'
	);

	$portfolios = new WP_Query( $args );

	if( $portfolios->have_posts() ) : ?>

		<h2>Portfolio Galleries</h2>

		<ul class="portfolio-list">

			<?php while( $portfolios->have_posts() ) : $portfolios->the_post(); ?>

				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>

			<?php endwhile; ?>

		</ul>

	<?php endif; wp_reset_postdata(); ?>
</aside>
