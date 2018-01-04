<?php
/**
 * Output a list of posts in the same category as the currently
 * displayed post in the sidebar of blog content pages.
 *
 * @version 1.0.0
 * @created January 3, 2018
 * @author John Galyon <galyon.jb@gmai.com>
 * @package WordPress
 * @subpackage dhgt
 */

function related_posts() {
	// get the ID of the current post
	$post_id = get_the_ID();

	// create an empty array in which to push all the categories on the site
	$cat_ids = array();

	// get the category of the current post
	$categories = get_the_category( $post_id );

	// Push all the categories registered on
	// the blog to the array we created earlier
	if( $categories && !( is_wp_error( $categories ) ) ) {

		foreach( $categories as $category ) {

			// PUUUUUUSH
			array_push( $cat_ids, $category->term_id );

		}
	}

	// Get the post type of the current post
	$current_post_type = get_post_type( $post_id );

	// Let's argue so we can make up later.
	$args = array(
		'category__in'   => $cat_ids,
		'order'          => 'DESC',
		'orderby'        => 'date',
		'posts_per_page' => '3',
		'post_type'      => $current_post_type,
		'post__not_in'   => array( $post_id )
	);

	$related_posts = new WP_Query( $args );

	if( $related_posts->have_posts() ) : ?>

		<div class="well">
			<h2>Related Posts</h2>
			<ul class="related-posts">

				<?php while( $related_posts->have_posts() ) : $related_posts->the_post(); ?>

					<li>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
							<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
						</a>
						<p class="small">
							<?php echo get_the_excerpt(); ?>&ensp;
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
								<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
							</a>
						</p>
					</li>

				<?php endwhile; ?>

			</ul>
		</div>
	<?php endif; wp_reset_postdata();
}

