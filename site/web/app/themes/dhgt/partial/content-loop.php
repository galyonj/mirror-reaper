<?php
/**
 * Partial to output the main loop
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 29, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */

$category = get_the_category( $post->ID );
$cat_id   = get_cat_ID( $category[0]->name );
?>
<div class="post-repeater">
	<a href="<?php the_permalink(); ?>" title="Read <?php the_title();?>">
		<img src="<?php the_post_thumbnail_url( 'full' ); ?>" class="img-responsive" alt="<?php the_title(); ?>" title="<?php the_title();?>">
	</a>
	<h3><a href="<?php the_permalink(); ?>" title="Read <?php the_title();?>"><?php the_title();?></a></h3>
	<p class="small">Posted on <time datetime="<?php echo get_the_date( 'c'); ?>"><?php echo get_the_date(); ?></time> in <a href="<?php echo esc_url( get_category_link( $cat_id ) ); ?>"><?php echo $category[0]->name; ?></a></p>
	<?php the_excerpt(); ?>
</div>