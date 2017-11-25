<?php
/**
 * Footer template
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 23, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
 */
?>
			</div> <!-- content-wrapper -->
		</div> <!-- /wrapper -->
		<footer role="contentinfo">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-2 brand-column">
						<p><a href="<?php echo home_url(); ?>">
								<img src="<?php echo trailingslashit( get_template_directory_uri() ); ?>img/logo-rev.svg"
								     alt="<?php echo bloginfo( 'name' ); ?>" title="<?php echo bloginfo( 'name' ); ?>">
							</a><br><br>
							19B Everett Street<br>
							Bryson City, NC 28713<br>
							<a href="tel:1-828-488-8282">(828) 488-TAT2</a></p>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-10 info-column">
						<div class="row">
							<div class="col-xs-12">
								<ul class="social-nav">
									<?php
									$defaults = array(
										'theme_location'  => 'social-nav',
										'menu'            => 'social-nav',
										'container'       => false,
										'menu_class'      => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'depth'           => 0,
										'items_wrap'      => '%3$s'
									);

									wp_nav_menu( $defaults );
									?>
								</ul>
							</div>
							<div class="col-xs-12">
								<ul class="footer-nav">
									<?php
									$defaults = array(
										'theme_location'  => 'footer-nav',
										'menu'            => 'footer-nav',
										'container'       => false,
										'menu_class'      => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'depth'           => 0,
										'items_wrap'      => '%3$s'
									);

									wp_nav_menu( $defaults );
									?>
								</ul>
							</div>
							<div class="col-xs-12">
								<p>
									<a href="<?php echo site_url( '/wp-admin/ '); ?>">&copy;</a> <?php echo date(
										'Y' ); ?> <?php echo bloginfo( 'name' ); ?>, all rights reserved.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
