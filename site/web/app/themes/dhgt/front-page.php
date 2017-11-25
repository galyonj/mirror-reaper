<?php
/**
 * Front page template
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 24, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */

get_header(); ?>
<?php
$jumbotron = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 1,
		'order'          => 'desc',
		'orderby'        => 'date'
	)
);

if( $jumbotron->have_posts() ) : while( $jumbotron->have_posts() ) : $jumbotron->the_post(); ?>

	<div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0) 50%, rgba(0,0,0,0.8)
		100%), url(<?php the_post_thumbnail_url(); ?>)">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<span class="jumbotron-text">
						<a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
						<p class="hidden-xs"><?php echo get_the_excerpt(); ?></p>
					</span>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; endif; rewind_posts(); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

	<div class="container content-container">
		<main class="row">
			<article class="col-xs-12">
				<?php the_content(); ?>
			</article>
		</main>
	</div>

<?php endwhile; endif; ?>

	<div class="reviews-wrapper">
		<div class="container reviews-container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 review-col">
					<h2>Our <s>clients</s> friends are pretty rad.</h2>
					<?php do_action( 'wprev_pro_plugin_action', 1 ); ?>
					<a class="btn btn-primary btn-lg flex-centered" href="https://www.facebook.com/pg/donnoshighergroundtattoo/reviews/">
						Add your review on Facebook!
					</a>
				</div>
				<!--<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 cta-col">
					<a class="btn btn-primary btn-lg" href="https://www.facebook.com/pg/donnoshighergroundtattoo/reviews/">Add your
						review on Facebook!</a>
				</div>-->
			</div>
		</div>
	</div>

	<div class="container links-container">
			<?php
			$args = array(
				'order'     => 'ASC',
				'orderby'   => 'title',
				'post_type' => 'page',
				'post__in'  => array( 12, 14, 22, 85 )
			);

			$page_list = new WP_Query( $args );

			if( $page_list->have_posts() ) : ?>

				<div class="row">

					<?php while( $page_list->have_posts() ) : $page_list->the_post(); ?>

						<div class="col-xs-12 col-sm-6 link-item">
							<a style="background-image: linear-gradient(to bottom, rgba(0,0,0,0) 50%, rgba(0,0,0,0.8)
									100%), url(<?php the_post_thumbnail_url(); ?>)" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark>">
								<?php the_title(); ?>
							</a>
						</div>

					<?php endwhile; ?>
				</div>

			<?php endif; wp_reset_postdata(); ?>
		</div>
<?php get_footer(); ?>