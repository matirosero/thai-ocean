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

<div class="course-location clr"<?php oceanwp_schema_markup( 'entry_content' ); ?>>

    <?php
    $where = wpautop(get_post_meta($post->ID, 'custom_textarea', true));
    ?>

    <h4>Location</h4>

    <?php echo $where; ?>

</div><!-- .course-location -->