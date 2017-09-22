<?php
/**
 * Default post entry layout
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get post format
// $format = get_post_format();



// Add classes to the blog entry post class
$classes = oceanwp_post_entry_classes(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>

	<div class="blog-entry-inner clr">

		<?php

		// Featured Image
		get_template_part( 'partials/entry/media/blog-entry' );

		// Title
		get_template_part( 'partials/entry/header' );

		// Meta
		get_template_part( 'partials/entry/meta', 'course' );

		// Content
		get_template_part( 'partials/entry/content', 'course' );

		// Location
		get_template_part( 'partials/entry/location', 'course' );

		// Read more button
		get_template_part( 'partials/entry/readmore' );



		?>

	</div><!-- .blog-entry-inner -->

</article><!-- #post-## -->