<?php
/**
 * Search template
 * Author     : John Galyon
 * Author URI : https://www.galyonj.com
 * Created    : April 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */

get_header(); ?>

<main class="container">
	<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
	<?php get_template_part( 'partial/content', 'header' ); ?>
	<div class="row">
		<article id="<?php the_ID(); ?>" <?php post_class( 'col-md-8' ); ?>>

			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<h2><a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<p>Posted on <strong><time datetime="<?php echo get_the_date( 'c'); ?>"><?php echo get_the_date( 'd F Y'); ?></time></strong></p>
				<?php the_excerpt(); ?>

			<?php endwhile; endif; ?>

		</article>
	</div>
</main>

<?php get_footer(); ?>
