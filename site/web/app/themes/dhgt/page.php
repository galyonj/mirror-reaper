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
			<?php if( !is_page( 'artists' ) ) : ?>
				<article id="<?php the_ID(); ?>" <?php post_class( 'col-md-8' ); ?>>
					<?php get_template_part( 'partial/content', 'header' ); ?>

					<?php the_content(); ?>
				</article>
			<?php else : ?>
				<article id="<?php the_ID(); ?>" <?php post_class( 'col-xs-12' ); ?>>
					<?php get_template_part( 'partial/content', 'header' ); ?>

					<?php the_content(); ?>

					<?php if( is_page( 'artists' ) ) : get_template_part( 'partial/content', 'artists' ); endif;?>

				</article>
			<?php endif; ?>
		</div>
	</main>

<?php endwhile; endif; get_footer(); ?>
