<?php
/**
 * Displays the post entry header
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Heading
$heading = apply_filters( 'ocean_blog_entries_heading', 'h2' ); ?>

<header class="course-header clr">
	<a href="<?php the_permalink(); ?>" class="course-header-inner">
		<div>
			<<?php echo esc_attr( $heading ); ?> class="blog-entry-title entry-title">
			<?php the_title(); ?>
			</<?php echo esc_attr( $heading ); ?>><!-- .blog-entry-title -->
			<span class="course-date"<?php oceanwp_schema_markup( 'publish_date' ); ?>><i class="icon-clock"></i> <?php echo course_date(); ?></span>
		</div>
	</a>
</header><!-- .blog-entry-header -->