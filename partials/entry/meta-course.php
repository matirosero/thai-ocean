<?php
/**
 * The default template for displaying post meta.
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>


<ul class="meta clr">

	<li class="meta-date"<?php oceanwp_schema_markup( 'publish_date' ); ?>><i class="icon-clock"></i><?php echo course_date(); ?></li>

		<?php 
		/*
		if ( 'categories' == $section ) { ?>
			<li class="meta-cat"><i class="icon-folder"></i><?php the_category( ' / ', get_the_ID() ); ?></li>
		<?php } 
		*/ ?>
	
</ul>