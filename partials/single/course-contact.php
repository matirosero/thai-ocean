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

<div class="course-contact clr"<?php oceanwp_schema_markup( 'entry_content' ); ?>>

    <?php
    $where = wpautop(get_post_meta($post->ID, 'custom_textarea', true));
    ?>

    <h4>Contact information</h4>

    <ul>
    	<li><i class="fa-external-link"></i></li>
    	<li><i class="fa-envelope"></i></li>
    	<li><i class="fa-phone"></i></li>
    </ul>

</div><!-- .course-location -->