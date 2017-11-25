<?php
/**
 * Blog index template
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 24, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */

get_header(); ?>

<main class="container">
	<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
	<?php get_template_part( 'partial/content', 'header' ); ?>
	<div class="post-container">
		<?php
		if( have_posts() ) {
			while( have_posts() ) {
				the_post();

				if( !is_paged() ) {

					if( 0 === $wp_query->current_post ) {

						get_template_part( 'partial/content', 'latest' );


					} else {

						get_template_part( 'partial/content', 'loop' );

					}

				} else {

					get_template_part( 'partial/content', 'loop' );

				}
			}

			the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => __( '<i class="fa fa-caret-left" aria-hidden="true"></i>' , 'dhgt' ),
				'next_text' => __( '<i class="fa fa-caret-right" aria-hidden="true"></i>', 'dhgt' )
			) );
		}
		?>
	</div>
</main>

<?php get_footer(); ?>
