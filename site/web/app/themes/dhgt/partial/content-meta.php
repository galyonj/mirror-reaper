<?php
/**
 * Partial to output post meta information
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 1, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */

if( is_singular( 'post' ) ) {
	$category = get_the_category( $post->ID );
	$cat_id   = get_cat_ID( $category[0]->name );
}
?>

<section class="meta-row row">
	<div class="col-xs-12">
		<?php if( is_singular( 'post' ) ) : ?>
			<p class="small"><time datetime="<?php echo get_the_date( 'c'); ?>"><?php echo get_the_date( 'F j, Y'); ?></time> <em>in</em> <a href="<?php echo esc_url( get_category_link( $cat_id ) ); ?>"><?php echo $category[0]->name; ?></a></p>
		<?php endif; ?>

		<p><img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php echo
			get_the_post_thumbnail_caption(); ?>" title="<?php echo get_the_post_thumbnail_caption(); ?>"></p>
		<hr>
	</div>
</section>
