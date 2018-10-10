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

<?php
if ( get_post_meta( $post->ID, 'mro_tyma_course_pricing', true ) ) { ?>

	<div class="course-pricing clr"<?php oceanwp_schema_markup( 'entry_content' ); ?>>

	    <h4>Pricing</h4>

	    <ul>

	    <?php
	    $prices = get_post_meta( $post->ID, 'mro_tyma_course_pricing', true );

	    foreach ($prices as $price) {
	    	echo '<li class="course-price">'.$price.'</li>';
	    }
	    ?>
	    	
	    </ul>

	</div><!-- .course-location -->

<?php } ?>