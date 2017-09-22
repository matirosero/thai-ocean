<?php

/*
 * Returns nicely formated course dates
 */

if ( ! function_exists( 'course_date' ) ) {
	function course_date() {

		global $post;

		$today = date('Y-m-d');

		if ( !get_post_meta($post->ID, 'custom_datestart', true) ) {
			return false;
		}

		$start_month = date("M", strtotime(get_post_meta($post->ID, 'custom_datestart', true)));
		$start_day = date("j", strtotime(get_post_meta($post->ID, 'custom_datestart', true)));
		$start_year = date("Y", strtotime(get_post_meta($post->ID, 'custom_datestart', true)));
		$end_month = date("M", strtotime(get_post_meta($post->ID, 'custom_dateend', true)));
		$end_day = date("j", strtotime(get_post_meta($post->ID, 'custom_dateend', true)));
		$end_year = date("Y", strtotime(get_post_meta($post->ID, 'custom_dateend', true)));


		if ($start_year == $end_year) {
			//same year
			if ($start_month == $end_month) {
				//same month
				$course_dates = $start_month.' '.$start_day.'-'.$end_day.', '.$start_year;
			} else {
				// different month
				$course_dates = $start_month.' '.$start_day.'-'.$end_month.' '.$end_day.', '.$start_year;
			}
		} else {
			//different year
			$course_dates = $start_month.' '.$start_day.', '.$start_year.'-'.$end_month.' '.$end_day.', '.$end_year;
		}

		return $course_dates;
	}
}


/*
 * Changes course post type archive sort order
 */
function tyma_pre_get_posts( $query ) {

	// do not modify queries in the admin
	if( is_admin() ) {
		return $query;
	}


	// only modify queries for 'event' post type
	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'course' ) {

		//Order by custom date
		$query->set('orderby', 'meta_value');
		$query->set('meta_key', 'custom_datestart');
		$query->set('order', 'ASC');

		//Today's date
		$today = date('Y-m-d');

		//Only show if custom date is after today
		$query->set('meta_query', array(
			array(
				'key' => 'custom_datestart',
				'value' => $today,
				'compare' => '>=',
				'type' => 'CHAR'
			)
		) );

	}


	// return
	return $query;

}

add_action('pre_get_posts', 'tyma_pre_get_posts');