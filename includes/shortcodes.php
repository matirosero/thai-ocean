<?php

/**
 * Register all shortcodes
 *
 * @return null
 */
function register_shortcodes() {
    add_shortcode('courses', 'tyma_list_courses_shortcode');
}
add_action( 'init', 'register_shortcodes' );

/*
 * List courses callback
 * - [courses]
 *
 * Returns list of team members
 */
function tyma_list_courses_shortcode($atts) {
    global $wp_query,
        $post;

    extract(shortcode_atts(array(
        'show' => 10,
        'inline' => 'no',
        'images' => 'no',
    ), $atts));

	$today = date('Y-m-d');

    // WP Query
	$args = array(
		'post_type' => 'course',
		'posts_per_page' => $show,
		//'caller_get_posts' => 10,
		'meta_key' => 'custom_datestart',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		    'meta_query' => array(
				array(
					'key' => 'custom_datestart',
					// 'meta-value' => $value,
					'value' => $today,
					'compare' => '>=',
					'type' => 'CHAR'
				)
		),
	);

    $query = new WP_Query( $args );

    if( ! $query->have_posts() ) :
        return false;
    else :

		$classes = 'course-list';

		if ( $inline == 'yes' ) :
			$classes .= ' inline-course-list';
		endif;


		$return = '<ul class="'.$classes.'">';

		while( $query->have_posts() ) : $query->the_post();

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

			$return .= '<li>'.
				'<a href="'.get_permalink().'" class="course-title">'.get_the_title().'</a> 
				<span class="course-date">'.$course_dates.'</span>
			</li>';

        endwhile;

        $return .= '</ul>';

        wp_reset_postdata();

        return $return;

    endif;

}