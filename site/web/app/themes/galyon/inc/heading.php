<?php
/**
 * Easily output the page/post headings for your site.
 * This function can be called inside template files
 * by injecting <?php content_heading(); ?> into your
 * template file.
 *
 * @version 2.1.0
 * @package WordPress
 * @subpackage galyon
 */

function content_heading() {

	global $post;

	// Is the query for a static front page or
	// blog page that's been set by the site
	// admin, or the default WordPress homepage?
	if( is_front_page() && is_home() ) {

		// As a default, we'll show the site title and tag line
		$welcome_msg = 'Welcome to';
		echo '<h1>' . $welcome_msg . ' ' . get_bloginfo( 'name' ) . '</h1>';

	} elseif( is_front_page() || is_home() ) {

		// Store the title of each type of page as a variable
		$front_page = get_the_title( get_option( 'page_on_front' ) );
		$blog_index = get_the_title( get_option( 'page_for_posts' ) );

		// Now we output the title
		echo is_front_page() ? '<h1>' . $front_page . '</h1>' : '<h1>' . $blog_index . '</h1>';
	} else {

		// Now we handle everything else
		if( !is_singular() ) {
			// If the content served is the search page, we've got to
			// adjust the verbiage of the page headline depending on the
			// number of results returned.
			if( is_search() ) {

				// The easiest way to get the number of search results
				// returned is by calling an instance of the WP_Query class
				// and then saving the number of posts found (found_posts)
				// by that query as a variable.
				global $wp_query;

				$results = $wp_query->found_posts;

				if( $results !== 0 ) {
					if( $results > 1 ) {
						echo '<h1>';
						printf( __( $results . ' results returned for &ldquo;%s&rdquo;', 'galyon' ), get_search_query() );
						echo '</h1>';
					} else {
						echo '<h1>';
						printf( __( $results . ' result returned for &ldquo;%s&rdquo;', 'galyon' ), get_search_query() );
						echo '</h1>';
					}
				} else {
					echo '<h1>';
					printf( __( 'Nothing returned for &ldquo;%s&rdquo;', 'galyon' ), get_search_query() );
					echo '</h1>';
				}
			} elseif( is_404() ) {
				echo '<h1>';
				printf( __( 'Whoops!', 'galyon' ) );
				echo '</h1>';
			} else {
				// This outputs our fallback condition
				// for any archive page – categories, tags
				// author pages, date-based archives, etc.
				if( is_archive() ) {
					if( is_category() ) {
						echo '<h1>';
						single_cat_title( '', true );

						if( category_description() ) {
							echo '<br><small>';
							echo category_description();
							echo '</small>';
						}

						echo '</h1>';

					} elseif( is_tag() ) {
						echo '<h1>';
						single_tag_title( '', true);

						if( tag_description() ) {
							echo '<br><small>';
							echo tag_description();
							echo '</small>';
						}
						echo '</h1>';

					} elseif( is_author() ) {
						echo '<h1>' . get_the_author() . '</h1>';
					} elseif( is_date() ) {
						// Open the h1 tag
						echo '<h1>Post archive for ';

						if( is_year() ) {
							get_the_date( 'Y' );
						} elseif( is_month() ) {
							get_the_date( 'F Y' );
						} else {
							get_the_date( 'F j, Y' );
						}

						// Now close it
						echo '</h1>';
					}
				}
			}
		} else {
			// This will be output as our base condition, which
			// assumes that the content shown is a singular type
			// such as a page, post, or attachment.
			if( is_single() ) {

				$category = get_the_category( $post->ID );
				$cat_id   = get_cat_ID( $category[0]->name );

				echo '<h1>';
				single_post_title( '', true);
				echo '</h1>';
			} else {
				the_title( '<h1>', '</h1>');
			}
		}
	}
}