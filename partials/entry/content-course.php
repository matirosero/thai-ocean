<?php
/**
 * Displays post entry content
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div class="blog-entry-summary clr"<?php oceanwp_schema_markup( 'entry_content' ); ?>>

    <?php the_content( '', '&hellip;' ); ?>

</div><!-- .blog-entry-summary -->