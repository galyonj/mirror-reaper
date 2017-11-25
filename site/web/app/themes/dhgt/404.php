<?php
/**
 * 404 template
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
		<div class="row">
			<article id="<?php the_ID(); ?>" <?php post_class( 'col-md-8' ); ?>>
				<?php get_template_part( 'partial/content', 'header' ); ?>
				<p class="lead">We couldn't find the page you're trying to reach. It's possible that the link you followed is out of date.</p>
				<p>If you typed the link manually, please check to make sure that you've typed it correctly.</p>
				<hr>
				<p>Of course, if you'd rather listen to Fishbone&hellips;we can't say we blame you.</p>
				<p>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/uwX0fkGf5rA" frameborder="0" allowfullscreen></iframe>
					</div>
				</p>
			</article>
		</div>
	</main>

<?php get_footer(); ?>