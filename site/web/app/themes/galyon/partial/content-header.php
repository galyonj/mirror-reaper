<?php
/**
 * Partial to output content title areas
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : April 30, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage galyonj
 */
?>

<header class="header-row">
	<?php content_heading(); ?>
	<?php if( is_single() ) {
		get_template_part( 'partial/content', 'meta' );
	} ?>
</header>
