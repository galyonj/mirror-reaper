<?php
/**
 * 404 template
 * Author     : John Galyon
 * Author URI : https://www.galyonj.com
 * Created    : April 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage forest-hills
 */

get_header(); ?>

	<main class="container">
		<?php get_template_part( 'partial/content', 'breadcrumbs' ); ?>
		<div class="row">
			<article id="<?php the_ID(); ?>" <?php post_class( 'col-md-8' ); ?>>
				<?php get_template_part( 'partial/content', 'header' ); ?>
				<p class="lead">We couldn't find the page you're trying to reach. It's possible that the link you followed is out of date.</p>
				<hr>
				<p>If you typed the link manually, please check to make sure that you've typed it correctly. You can also use the form below to search <?php echo get_bloginfo( 'name' ); ?>, or you can go back to the <a href="<?php echo home_url();?>">home page</a>.</p>

				<form action="<?php echo home_url( '/' ); ?>" role="search" method="get" class="error-page-search">
					<div class="input-group">
						<input name="s" id="s" type="text" class="search-query form-control input-lg" autocomplete="on" placeholder="<?php _e('Search ' . get_bloginfo( 'name' ),''); ?>">
						<span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search fa-2x" aria-hidden="true"></i></button>
                    </span>
					</div>
				</form>
			</article>
		</div>
	</main>

<?php get_footer(); ?>