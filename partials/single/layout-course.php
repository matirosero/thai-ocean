<?php
/**
 * Outputs page article
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>

<article id="post-<?php the_ID(); ?>">

	<?php
	// Featured Image
	/*
	if ( 'featured_image' == $element
		&& ! post_password_required() ) {

		$format = $format ? $format : 'thumbnail';

		get_template_part( 'partials/single/media/blog-single', $format );

	}
	*/

	//Header
	get_template_part( 'partials/single/header' );

	// Meta
	get_template_part( 'partials/entry/meta', 'course' );

	// Content
	get_template_part( 'partials/single/content' );

	// Location
	get_template_part( 'partials/single/course', 'location' );


		// Tags
		// if ( 'tags' == $element ) {

		// 	get_template_part( 'partials/single/tags' );

		// }

	// Social Share
	if ( OCEAN_EXTRA_ACTIVE ) {
		do_action( 'ocean_social_share' );
	}


	// Next/Prev
	get_template_part( 'partials/single/next-prev' );

	get_template_part( 'partials/single/related-posts' );


	?>


</article>