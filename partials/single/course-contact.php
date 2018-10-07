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
if ( get_post_meta( $post->ID, 'mro_tyma_course_url', true ) || get_post_meta( $post->ID, 'mro_tyma_course_email', true ) || get_post_meta( $post->ID, 'mro_tyma_course_phone', true ) ) { ?>

	<div class="course-contact clr"<?php oceanwp_schema_markup( 'entry_content' ); ?>>

	    <h4>Contact information</h4>

	    <ul>
	    	<?php
	    	if ( get_post_meta( $post->ID, 'mro_tyma_course_url', true ) ) { ?>
	    		<li>
	    			<h5 class="contact-title"><i class="fa fa-external-link"></i> <span>Website</span></h5>
	    			<span class="contact-website"><a href="<?php echo get_post_meta( $post->ID, 'mro_tyma_course_url', true ); ?>"><?php echo get_post_meta( $post->ID, 'mro_tyma_course_url', true ); ?></a></span>
	    		</li>
	    	<?php }

	    	if ( get_post_meta( $post->ID, 'mro_tyma_course_email', true ) ) { ?>

	    		<li>
	    			<h5 class="contact-title"><i class="fa fa-envelope"></i> <span>Email</span></h5>

		    		<?php
		    		$emails = get_post_meta( $post->ID, 'mro_tyma_course_email', true );

		    		foreach ( $emails as $email ) { ?>

		    			<span class="contact-email">
		    				<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
		    			</span>

		    		<?php } ?>

	    		</li>

	    	<?php }

	    	if ( get_post_meta( $post->ID, 'mro_tyma_course_phone', true ) ) { ?>

	    		<li>
	    			<h5 class="contact-title"><i class="fa fa-phone"></i> <span>Phone</span></h5>

		    		<?php
		    		$phones = get_post_meta( $post->ID, 'mro_tyma_course_phone', true );

		    		foreach ( $phones as $phone ) { ?>

		    			<span class="contact-phone">
		    				<?php echo $phone; ?>
		    			</span>

		    		<?php } ?>
	    		</li>

	    	<?php } ?>

	    </ul>

	</div><!-- .course-location -->

<?php } ?>