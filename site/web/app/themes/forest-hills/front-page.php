<?php
/**
 * Front page template
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 24, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage forest-hills
 */

get_header(); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

	<?php
	if ( has_post_thumbnail() ) {
		$image = get_the_post_thumbnail_url();
	} else {
		$image = trailingslashit( get_stylesheet_directory_uri() ) . 'img/front-page-assets/default-masthead.jpg';
	}
	?>

	<div class="jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0) 50%,rgba(0,0,0,0.5) 100%), url(<?php echo $image; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<<?php content_heading(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="container welcome-container">
		<main class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
				<?php content_heading(); ?>

				<?php the_content(); ?>
			</article>
		</main>
	</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>