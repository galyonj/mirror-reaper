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
	<?php get_template_part( 'partial/content', 'header' ); ?>

	<?php the_content(); ?>
</article>