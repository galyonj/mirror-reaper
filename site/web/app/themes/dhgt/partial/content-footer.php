<?php
/**
 * Partial to output post footer information
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : January 2, 2018
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */
?>

<footer class="post-footer">
	<?php if( has_tag() ) : ?>
		<h2>Topics covered in this post:</h2>
		<?php the_tags( '<p>', ', ', '</p>' ); ?>
	<?php endif; ?>

	<?php
	/*	if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		*/?>
</footer>
