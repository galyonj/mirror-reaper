<?php
/**
 * 404 template
 * Author     : John Galyon
 * Author URI : https://www.galyonj.com
 * Created    : April 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */

get_header(); ?>

	<main class="col-xs-12 col-sm-8 col-md-9 pull-left">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
			<?php get_template_part( 'partial/content', 'header' ); ?>
			<p class="lead">We couldn't find the page you're trying to reach. It's possible that the link you followed is out of date.</p>
			<p>If you typed the link manually, please check to make sure that you've typed it correctly.</p>
		</article>
	</main>

<?php get_footer(); ?>