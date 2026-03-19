<?php

/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

define('HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0');

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles()
{

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20);



// function update_event_timeframe_terms($post_id, $post, $update)
// {
// 	if ($post->post_type !== 'event' || defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
// 		return;
// 	}

// 	$taxonomy = 'timeframe';
// 	$post_date = strtotime($post->post_date);
// 	$today_start = strtotime('today');
// 	$week_start  = strtotime('monday this week');
// 	$month_start = strtotime('first day of this month');

// 	$terms_to_add = [];
// 	if ($post_date >= $today_start && $post_date < strtotime('tomorrow')) {
// 		$terms_to_add[] = 'Today';
// 	}
// 	if ($post_date >= $week_start && $post_date < strtotime('next monday')) {
// 		$terms_to_add[] = 'This Week';
// 	}
// 	if ($post_date >= $month_start && $post_date < strtotime('first day of next month')) {
// 		$terms_to_add[] = 'This Month';
// 	}

// 	if (! empty($terms_to_add)) {
// 		wp_set_object_terms($post_id, $terms_to_add, $taxonomy, false);
// 	}
// }
// add_action('save_post', 'update_event_timeframe_terms', 10, 3);

function mytheme_register_elementor_widgets()
{
	require_once get_stylesheet_directory() . '/elementor-widgets/init.php';
}
add_action('after_setup_theme', 'mytheme_register_elementor_widgets');

function mytheme_card_widget_assets()
{

	wp_register_style(
		'mytheme-card-widget',
		get_stylesheet_directory_uri() . '/elementor-widgets/assets/css/card-widget.css'
	);

	wp_register_script(
		'mytheme-card-widget',
		get_stylesheet_directory_uri() . '/elementor-widgets/assets/js/card-widget.js',
		['jquery'],
		false,
		true
	);
}
add_action('wp_enqueue_scripts', 'mytheme_card_widget_assets');
