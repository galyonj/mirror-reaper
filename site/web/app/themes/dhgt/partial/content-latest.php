<?php
/**
 * Partial to output latest post so it's all pretty and stuff
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 24, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */

$category = get_the_category( $post->ID );
$cat_id   = get_cat_ID( $category[0]->name );
?>
<div class="latest row">
	<div class="col-xs-12 col-md-8">
		<a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>">
			<div class="ribbon"><span>new</span></div>
			<img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php the_title(); ?>"
			     title="<?php the_title(); ?>">
		</a>
	</div>
	<div class="col-xs-12 col-md-4">
		<h2>
			<a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<p>Posted on <time datetime="<?php echo get_the_date( 'c'); ?>"><?php echo get_the_date();
				?></time> in <a href="<?php echo esc_url( get_category_link( $cat_id ) ); ?>"><?php echo
				$category[0]->name; ?></a></p>
		<p class="lead"><?php echo get_the_excerpt(); ?></p>
	</div>
</div>