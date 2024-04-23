<?php

/*  Bookmaker - Post Type Start */

add_action('init', 'aces_bookmakers', 0);
function aces_bookmakers()
{

	$bookmaker_slug = 'bookmaker';
	if (get_option('bookmakers_section_slug')) {
		$bookmaker_slug = get_option('bookmakers_section_slug', 'bookmaker');
	}

	$bookmaker_name = esc_html__('Bookmakers', 'aces');
	if (get_option('bookmakers_section_name')) {
		$bookmaker_name = get_option('bookmakers_section_name', 'Bookmakers');
	}

	$args = array(
		'labels' => array(
			'name' => $bookmaker_name,
			'add_new' => esc_html__('Add New', 'aces'),
			'edit_item' => esc_html__('Edit Item', 'aces'),
			'add_new_item' => esc_html__('Add New', 'aces'),
			'view_item' => esc_html__('View Item', 'aces'),
		),
		'singular_label' => __('bookmaker'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'menu_icon' => plugins_url('aces/images/icon.png'),
		'_builtin' => false,
		'_edit_link' => 'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'author',
			'comments',
			'thumbnail',
			'excerpt',
			'revisions'
		),
		'has_archive' => false,
		'rest_base' => 'bookmaker',
		'rewrite' => array(
			'slug' => $bookmaker_slug,
			'with_front' => false
		)
	);

	register_post_type('bookmaker', $args);

	/* --- Category: Custom Taxonomy --- */

	$bookmakers_category_title = esc_html__('Categories', 'aces');
	if (get_option('bookmakers_category_title')) {
		$bookmakers_category_title = get_option('bookmakers_category_title', 'Categories');
	}

	$labels = array(
		'name' => $bookmakers_category_title,
		'singular_name' => $bookmakers_category_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_category_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_category_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'show_admin_column' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('bookmaker-category', 'bookmaker', $args);

	/* --- Software: Custom Taxonomy --- */

	$bookmakers_software_title = esc_html__('Software', 'aces');
	if (get_option('bookmakers_software_title')) {
		$bookmakers_software_title = get_option('bookmakers_software_title', 'Software');
	}

	$labels = array(
		'name' => $bookmakers_software_title,
		'singular_name' => $bookmakers_software_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_software_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_software_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('software', 'bookmaker', $args);

	/* --- Deposit Methods: Custom Taxonomy --- */

	$bookmakers_deposit_method_title = esc_html__('Deposit Methods', 'aces');
	if (get_option('bookmakers_deposit_method_title')) {
		$bookmakers_deposit_method_title = get_option('bookmakers_deposit_method_title', 'Deposit Methods');
	}

	$labels = array(
		'name' => $bookmakers_deposit_method_title,
		'singular_name' => $bookmakers_deposit_method_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_deposit_method_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_deposit_method_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('deposit-method', 'bookmaker', $args);

	/* --- Withdrawal Methods: Custom Taxonomy --- */

	$bookmakers_withdrawal_method_title = esc_html__('Withdrawal Methods', 'aces');
	if (get_option('bookmakers_withdrawal_method_title')) {
		$bookmakers_withdrawal_method_title = get_option('bookmakers_withdrawal_method_title', 'Withdrawal Methods');
	}

	$labels = array(
		'name' => $bookmakers_withdrawal_method_title,
		'singular_name' => $bookmakers_withdrawal_method_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_withdrawal_method_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_withdrawal_method_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('withdrawal-method', 'bookmaker', $args);

	/* --- Withdrawal Limits: Custom Taxonomy --- */

	$bookmakers_withdrawal_limit_title = esc_html__('Withdrawal Limits', 'aces');
	if (get_option('bookmakers_withdrawal_limit_title')) {
		$bookmakers_withdrawal_limit_title = get_option('bookmakers_withdrawal_limit_title', 'Withdrawal Limits');
	}

	$labels = array(
		'name' => $bookmakers_withdrawal_limit_title,
		'singular_name' => $bookmakers_withdrawal_limit_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_withdrawal_limit_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_withdrawal_limit_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('withdrawal-limit', 'bookmaker', $args);

	/* --- Restricted Countries: Custom Taxonomy --- */

	$bookmakers_restricted_countries_title = esc_html__('Restricted Countries', 'aces');
	if (get_option('bookmakers_restricted_countries_title')) {
		$bookmakers_restricted_countries_title = get_option('bookmakers_restricted_countries_title', 'Restricted Countries');
	}

	$labels = array(
		'name' => $bookmakers_restricted_countries_title,
		'singular_name' => $bookmakers_restricted_countries_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_restricted_countries_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_restricted_countries_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('restricted-country', 'bookmaker', $args);

	/* --- Licences: Custom Taxonomy --- */

	$bookmakers_licences_title = esc_html__('Licences', 'aces');
	if (get_option('bookmakers_licences_title')) {
		$bookmakers_licences_title = get_option('bookmakers_licences_title', 'Licences');
	}

	$labels = array(
		'name' => $bookmakers_licences_title,
		'singular_name' => $bookmakers_licences_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_licences_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_licences_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('licence', 'bookmaker', $args);

	/* --- Languages: Custom Taxonomy --- */

	$bookmakers_languages_title = esc_html__('Languages', 'aces');
	if (get_option('bookmakers_languages_title')) {
		$bookmakers_languages_title = get_option('bookmakers_languages_title', 'Languages');
	}

	$labels = array(
		'name' => $bookmakers_languages_title,
		'singular_name' => $bookmakers_languages_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_languages_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_languages_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('bookmaker-language', 'bookmaker', $args);

	/* --- Currencies: Custom Taxonomy --- */

	$bookmakers_currencies_title = esc_html__('Currencies', 'aces');
	if (get_option('bookmakers_currencies_title')) {
		$bookmakers_currencies_title = get_option('bookmakers_currencies_title', 'Currencies');
	}

	$labels = array(
		'name' => $bookmakers_currencies_title,
		'singular_name' => $bookmakers_currencies_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_currencies_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_currencies_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('currency', 'bookmaker', $args);

	/* --- Devices: Custom Taxonomy --- */

	$bookmakers_devices_title = esc_html__('Devices', 'aces');
	if (get_option('bookmakers_devices_title')) {
		$bookmakers_devices_title = get_option('bookmakers_devices_title', 'Devices');
	}

	$labels = array(
		'name' => $bookmakers_devices_title,
		'singular_name' => $bookmakers_devices_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_devices_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_devices_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('device', 'bookmaker', $args);

	/* --- Owner: Custom Taxonomy --- */

	$bookmakers_owner_title = esc_html__('Owner', 'aces');
	if (get_option('bookmakers_owner_title')) {
		$bookmakers_owner_title = get_option('bookmakers_owner_title', 'Owner');
	}

	$labels = array(
		'name' => $bookmakers_owner_title,
		'singular_name' => $bookmakers_owner_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_owner_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_owner_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('owner', 'bookmaker', $args);

	/* --- Established: Custom Taxonomy --- */

	$bookmakers_est_title = esc_html__('Established', 'aces');
	if (get_option('bookmakers_est_title')) {
		$bookmakers_est_title = get_option('bookmakers_est_title', 'Established');
	}

	$labels = array(
		'name' => $bookmakers_est_title,
		'singular_name' => $bookmakers_est_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $bookmakers_est_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $bookmakers_est_title
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'update_count_callback' => '',
		'rewrite' => true,
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('bookmaker-est', 'bookmaker', $args);

	// regisster meta fields
	register_post_meta('bookmaker', 'main_bonus_for_casino', array(
		'show_in_rest' => true,
		'type' => 'integer',
		'single' => true,
		'sanitize_callback' => 'sanitize_text_field',
		'auth_callback' => function () {
			return current_user_can('edit_posts');
		}
	));

	register_post_meta('bookmaker', 'main_licence_for_casino', array(
		'show_in_rest' => true,
		'type' => 'integer',
		'single' => true,
		'auth_callback' => function () {
			return current_user_can('edit_posts');
		}
	));
}

