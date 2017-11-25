<?php
/**
 * Standared template
 * Author     : BJ Brown
 * Author URI : http://www.beejbrwn.com
 * Created    : 5/10/2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage [Thrill Rides - For Motorcycle Enthusiast]
 */
get_header(); ?>
	<div class="content-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8">
					<?php if( have_posts() ) : while( have_posts()) : the_post; ?>

						<!-- Output the page title -->
						<h1><?php the_title(); ?></h1>

						<!-- output the page content -->
						<?php the_content(); ?>

					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>