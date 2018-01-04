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
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-12'); ?>>

				<?php if( have_posts() ) : ?>

					<?php while( have_posts() ) : the_post(); the_content();?>

						<?php

						$images = get_field( 'portfolio_gallery' );

						if( $images ) : ?>

							<ul class="four-column full">

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
		</div>
	</main>

<?php get_footer(); ?>