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
		<div class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-12 col-md-8'); ?>>

				<?php
				if( have_posts() ) {

					while( have_posts() ) {

						the_post();

						get_template_part( 'partial/content', 'breadcrumbs' );
						get_template_part( 'partial/content', 'header' );
						the_content();
						get_template_part( 'partial/content', 'footer' );

					}

				}
				?>

			</article>
		</div>
	</main>

<?php get_footer(); ?>