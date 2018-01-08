<?php
/**
 * Partial to output normal page content
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : November 29, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */ ?>

<article id="<?php the_ID(); ?>" <?php post_class( 'col-md-8' ); ?>>
	<?php the_content(); ?>
</article>
<?php if( get_field( 'page_sidebar' ) ) : ?>
	<aside class="col-md-4" role="complementary">
		<div class="well">
			<?php the_field( 'page_sidebar' ); ?>
		</div>
	</aside>
<?php endif; ?>