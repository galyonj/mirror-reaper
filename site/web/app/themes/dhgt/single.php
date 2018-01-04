<?php
/**
 * Single page template
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
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-12 col-md-8'); ?>>
				<?php get_template_part( 'partial/content', 'meta' ); ?>
				<?php
				if( have_posts() ) {

					while( have_posts() ) {

						the_post();

						the_content();

					}

				}
				?>

			</article>
			<?php get_template_part( 'partial/content', 'sidebar' ); ?>
		</div>
	</main>

<?php get_footer(); ?>