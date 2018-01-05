<?php
/**
 * Single portfolio template
 * Author     : John Galyon
 * Author URI : https://www.galyonj.com
 * Created    : January 3, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */

get_header();

$parent = get_post( $post->post_parent );

$parent_slug = $parent->post_name; ?>

	<main class="container">
		<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
		<?php get_template_part( 'partial/content', 'header' ); ?>
		<div class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-8'); ?>>

				<?php if( have_posts() ) : ?>

					<?php while( have_posts() ) : the_post(); the_content();?>

						<?php

						$images = get_field( 'portfolio_gallery' );

						if( $images ) : ?>

							<ul class="three-column">

								<?php foreach( $images as $image ) : ?>

									<li>
										<a class="swipebox" href="<?php echo $image['url']; ?>" rel="<?php echo $parent_slug . '_' . $post->post_name; ?>">
											<img src="<?php echo $image['url']; ?>" class="img-responsive">
										</a>
									</li>

								<?php endforeach; ?>

							</ul>

						<?php endif; ?>

					<?php endwhile; ?>
				<?php else : ?>

					<p>Sorry. There's nothing here.</p>

				<?php endif; ?>

			</article>
			<?php

			$parent = get_post( $post->post_parent );

			$args = array(
				'post_parent' => $parent->ID,
				'post_type'   => 'portfolio',
				'post_status' => 'publish',
				'post__not_in' => array( $post->ID )
			);

			$portfolios = new WP_Query( $args );

			if( $portfolios->have_posts() ) : ?>

				<aside class="col-md-4" role="complementary">

					<h2>Other Galleries</h2>

					<ul class="portfolio-list">

						<?php while( $portfolios->have_posts() ) : $portfolios->the_post(); ?>

							<li>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</li>

						<?php endwhile; ?>

					</ul>

				</aside>

			<?php endif; wp_reset_postdata(); ?>
		</div>
	</main>

<?php get_footer(); ?>