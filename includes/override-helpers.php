<?php

/**
 * Return the title
 *
 * @since 1.0.0
 */
// if ( ! function_exists( 'oceanwp_title' ) ) {

	function oceanwp_title() {

		// Default title is null
		$title = NULL;
		
		// Get post ID
		$post_id = oceanwp_post_id();
		
		// Homepage - display blog description if not a static page
		if ( is_front_page() && ! is_singular( 'page' ) ) {
			
			if ( get_bloginfo( 'description' ) ) {
				$title = get_bloginfo( 'description' );
			} else {
				return esc_html__( 'Recent Posts', 'oceanwp' );
			}

		// Homepage posts page
		} elseif ( is_home() && ! is_singular( 'page' ) ) {

			$title = get_the_title( get_option( 'page_for_posts', true ) );

		}

		// Search needs to go before archives
		elseif ( is_search() ) {
			global $wp_query;
			$title = '<span id="search-results-count">'. $wp_query->found_posts .'</span> '. esc_html__( 'Search Results Found', 'oceanwp' );
		}
			
		// Archives
		elseif ( is_archive() ) {

			// Author
			if ( is_author() ) {
				$title = get_the_archive_title();
			}

			// Post Type archive title
			elseif ( is_post_type_archive() ) {
				$title = post_type_archive_title( '', false );
			}

			// Daily archive title
			elseif ( is_day() ) {
				$title = sprintf( esc_html__( 'Daily Archives: %s', 'oceanwp' ), get_the_date() );
			}

			// Monthly archive title
			elseif ( is_month() ) {
				$title = sprintf( esc_html__( 'Monthly Archives: %s', 'oceanwp' ), get_the_date( esc_html_x( 'F Y', 'Page title monthly archives date format', 'oceanwp' ) ) );
			}

			// Yearly archive title
			elseif ( is_year() ) {
				$title = sprintf( esc_html__( 'Yearly Archives: %s', 'oceanwp' ), get_the_date( esc_html_x( 'Y', 'Page title yearly archives date format', 'oceanwp' ) ) );
			}

			// Categories/Tags/Other
			else {

				// Get term title
				$title = single_term_title( '', false );

				// Fix for plugins that are archives but use pages
				if ( ! $title ) {
					global $post;
					$title = get_the_title( $post_id );
				}

			}

		} // End is archive check

		// 404 Page
		elseif ( is_404() ) {

			$title = esc_html__( '404: Page Not Found', 'oceanwp' );

		}
		
		// Anything else with a post_id defined
		elseif ( $post_id ) {

			// Single Pages
			if ( is_singular( 'page' ) || is_singular( 'attachment' ) ) {
				$title = get_the_title( $post_id );
			}

			// Single blog posts
			elseif ( is_singular( 'post' ) ) {

				if ( 'post-title' == get_theme_mod( 'ocean_blog_single_page_header_title', 'blog' ) ) {
					$title = get_the_title();
				} else {
					$title = esc_html__( 'Blog', 'oceanwp' );
				}

			}

			// Single blog posts
			elseif ( is_singular( 'course' ) ) {

				$title = esc_html__( 'Courses', 'oceanwp' );

			}

			// Other posts
			else {

				$title = get_the_title( $post_id );
				
			}

		}

		// Last check if title is empty
		$title = $title ? $title : get_the_title();

		// Apply filters and return title
		return apply_filters( 'ocean_title', $title );
		
	}

// }