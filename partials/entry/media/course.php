<?php
/**
 * Displays the post entry thumbmnail
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return if there isn't a thumbnail defined
// if ( ! has_post_thumbnail() ) {
// 	return;
// }

// Add images size if blog grid
if ( 'grid-entry' == oceanwp_blog_entry_style() ) {
	$size = oceanwp_blog_entry_images_size();
} else {
	$size = 'full';
}

// Overlay class
if ( is_customize_preview()
	&& false == get_theme_mod( 'ocean_blog_image_overlay', true ) ) {
	$class = 'no-overlay';
} else {
	$class = 'overlay';
}

// Image args
$img_args = array(
    'alt' => get_the_title(),
);
if ( oceanwp_get_schema_markup( 'image' ) ) {
	$img_args['itemprop'] = 'image';
} ?>

<?php
if ( has_post_thumbnail() ) { ?>
	<div class="thumbnail">
<?php } else { ?>
	<div class="thumbnail no-image">
<?php } ?>

	<a href="<?php the_permalink(); ?>" class="thumbnail-link">

		<?php

		if ( has_post_thumbnail() ) {
			// Display post thumbnail
			the_post_thumbnail( $size, $img_args );
		} else { ?>

			<h2 class="blog-entry-title entry-title"><?php the_title(); ?></h2>
			<span class="course-date"<?php oceanwp_schema_markup( 'publish_date' ); ?>><i class="icon-clock"></i> <?php echo course_date(); ?></span>

		<?php }

		// If overlay
		if ( is_customize_preview()
			|| true == get_theme_mod( 'ocean_blog_image_overlay', true ) ) { ?>
			<span class="<?php echo esc_attr( $class ); ?>"></span>
		<?php } ?>
		
	</a>

</div><!-- .thumbnail -->