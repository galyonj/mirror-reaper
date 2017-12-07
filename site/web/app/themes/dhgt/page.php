<?php
/**
 * Master page template
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 24, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */

get_header();

if( have_posts() ) : while( have_posts() ) : the_post(); ?>

	<main class="container">
		<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
		<div class="row">
			<?php
			if( !is_page( 'artists' ) ) {
				get_template_part( 'partial/content', 'page' );
			} else {
				get_template_part( 'partial/content', 'artists' );
			}
			?>
		</div>
	</main>

<?php endwhile; endif; get_footer(); ?>
