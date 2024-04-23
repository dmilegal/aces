<?php

/*  Casinos - Post Type Start */

add_action('init', 'aces_casinos', 0);
function aces_casinos()
{

	$casino_slug = 'casino';
	if (get_option('casinos_section_slug')) {
		$casino_slug = get_option('casinos_section_slug', 'casino');
	}

	$casino_name = esc_html__('Casinos', 'aces');
	if (get_option('casinos_section_name')) {
		$casino_name = get_option('casinos_section_name', 'Casinos');
	}

	$args = array(
		'labels' => array(
			'name' => $casino_name,
			'add_new' => esc_html__('Add New', 'aces'),
			'edit_item' => esc_html__('Edit Item', 'aces'),
			'add_new_item' => esc_html__('Add New', 'aces'),
			'view_item' => esc_html__('View Item', 'aces'),
		),
		'singular_label' => __('casino'),
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
		'rest_base' => 'organization',
		'rewrite' => array(
			'slug' => $casino_slug,
			'with_front' => false
		)
	);

	register_post_type('casino', $args);

	/* --- Category: Custom Taxonomy --- */

	$casinos_category_title = esc_html__('Categories', 'aces');
	if (get_option('casinos_category_title')) {
		$casinos_category_title = get_option('casinos_category_title', 'Categories');
	}

	$labels = array(
		'name' => $casinos_category_title,
		'singular_name' => $casinos_category_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_category_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_category_title
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

	register_taxonomy('casino-category', 'casino', $args);

	/* --- Software: Custom Taxonomy --- */

	$casinos_software_title = esc_html__('Software', 'aces');
	if (get_option('casinos_software_title')) {
		$casinos_software_title = get_option('casinos_software_title', 'Software');
	}

	$labels = array(
		'name' => $casinos_software_title,
		'singular_name' => $casinos_software_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_software_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_software_title
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

	register_taxonomy('software', 'casino', $args);

	/* --- Deposit Methods: Custom Taxonomy --- */

	$casinos_deposit_method_title = esc_html__('Deposit Methods', 'aces');
	if (get_option('casinos_deposit_method_title')) {
		$casinos_deposit_method_title = get_option('casinos_deposit_method_title', 'Deposit Methods');
	}

	$labels = array(
		'name' => $casinos_deposit_method_title,
		'singular_name' => $casinos_deposit_method_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_deposit_method_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_deposit_method_title
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

	register_taxonomy('deposit-method', 'casino', $args);

	/* --- Withdrawal Methods: Custom Taxonomy --- */

	$casinos_withdrawal_method_title = esc_html__('Withdrawal Methods', 'aces');
	if (get_option('casinos_withdrawal_method_title')) {
		$casinos_withdrawal_method_title = get_option('casinos_withdrawal_method_title', 'Withdrawal Methods');
	}

	$labels = array(
		'name' => $casinos_withdrawal_method_title,
		'singular_name' => $casinos_withdrawal_method_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_withdrawal_method_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_withdrawal_method_title
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

	register_taxonomy('withdrawal-method', 'casino', $args);

	/* --- Withdrawal Limits: Custom Taxonomy --- */

	$casinos_withdrawal_limit_title = esc_html__('Withdrawal Limits', 'aces');
	if (get_option('casinos_withdrawal_limit_title')) {
		$casinos_withdrawal_limit_title = get_option('casinos_withdrawal_limit_title', 'Withdrawal Limits');
	}

	$labels = array(
		'name' => $casinos_withdrawal_limit_title,
		'singular_name' => $casinos_withdrawal_limit_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_withdrawal_limit_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_withdrawal_limit_title
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

	register_taxonomy('withdrawal-limit', 'casino', $args);

	/* --- Restricted Countries: Custom Taxonomy --- */

	$casinos_restricted_countries_title = esc_html__('Restricted Countries', 'aces');
	if (get_option('casinos_restricted_countries_title')) {
		$casinos_restricted_countries_title = get_option('casinos_restricted_countries_title', 'Restricted Countries');
	}

	$labels = array(
		'name' => $casinos_restricted_countries_title,
		'singular_name' => $casinos_restricted_countries_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_restricted_countries_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_restricted_countries_title
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

	register_taxonomy('restricted-country', 'casino', $args);

	/* --- Licences: Custom Taxonomy --- */

	$casinos_licences_title = esc_html__('Licences', 'aces');
	if (get_option('casinos_licences_title')) {
		$casinos_licences_title = get_option('casinos_licences_title', 'Licences');
	}

	$labels = array(
		'name' => $casinos_licences_title,
		'singular_name' => $casinos_licences_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_licences_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_licences_title
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

	register_taxonomy('licence', 'casino', $args);

	/* --- Languages: Custom Taxonomy --- */

	$casinos_languages_title = esc_html__('Languages', 'aces');
	if (get_option('casinos_languages_title')) {
		$casinos_languages_title = get_option('casinos_languages_title', 'Languages');
	}

	$labels = array(
		'name' => $casinos_languages_title,
		'singular_name' => $casinos_languages_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_languages_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_languages_title
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

	register_taxonomy('casino-language', 'casino', $args);

	/* --- Currencies: Custom Taxonomy --- */

	$casinos_currencies_title = esc_html__('Currencies', 'aces');
	if (get_option('casinos_currencies_title')) {
		$casinos_currencies_title = get_option('casinos_currencies_title', 'Currencies');
	}

	$labels = array(
		'name' => $casinos_currencies_title,
		'singular_name' => $casinos_currencies_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_currencies_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_currencies_title
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

	register_taxonomy('currency', 'casino', $args);

	/* --- Devices: Custom Taxonomy --- */

	$casinos_devices_title = esc_html__('Devices', 'aces');
	if (get_option('casinos_devices_title')) {
		$casinos_devices_title = get_option('casinos_devices_title', 'Devices');
	}

	$labels = array(
		'name' => $casinos_devices_title,
		'singular_name' => $casinos_devices_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_devices_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_devices_title
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

	register_taxonomy('device', 'casino', $args);

	/* --- Owner: Custom Taxonomy --- */

	$casinos_owner_title = esc_html__('Owner', 'aces');
	if (get_option('casinos_owner_title')) {
		$casinos_owner_title = get_option('casinos_owner_title', 'Owner');
	}

	$labels = array(
		'name' => $casinos_owner_title,
		'singular_name' => $casinos_owner_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_owner_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_owner_title
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

	register_taxonomy('owner', 'casino', $args);

	/* --- Established: Custom Taxonomy --- */

	$casinos_est_title = esc_html__('Established', 'aces');
	if (get_option('casinos_est_title')) {
		$casinos_est_title = get_option('casinos_est_title', 'Established');
	}

	$labels = array(
		'name' => $casinos_est_title,
		'singular_name' => $casinos_est_title,
		'search_items' => esc_html__('Find Taxonomy', 'aces'),
		'all_items' => esc_html__('All ', 'aces') . $casinos_est_title,
		'parent_item' => esc_html__('Parent Taxonomy', 'aces'),
		'parent_item_colon' => esc_html__('Parent Taxonomy:', 'aces'),
		'edit_item' => esc_html__('Edit Taxonomy', 'aces'),
		'view_item' => esc_html__('View Taxonomy', 'aces'),
		'update_item' => esc_html__('Update Taxonomy', 'aces'),
		'add_new_item' => esc_html__('Add New Taxonomy', 'aces'),
		'new_item_name' => esc_html__('Taxonomy', 'aces'),
		'menu_name' => $casinos_est_title
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

	register_taxonomy('casino-est', 'casino', $args);

	// regisster meta fields
	register_post_meta('casino', 'main_bonus_for_casino', array(
		'show_in_rest' => true,
		'type' => 'integer',
		'single' => true,
		'sanitize_callback' => 'sanitize_text_field',
		'auth_callback' => function () {
			return current_user_can('edit_posts');
		}
	));

	register_post_meta('casino', 'main_licence_for_casino', array(
		'show_in_rest' => true,
		'type' => 'integer',
		'single' => true,
		'auth_callback' => function () {
			return current_user_can('edit_posts');
		}
	));
}

/* --- Add custom slug for taxonomy 'casino-category' --- */

if (get_option('casino_category_slug')) {

	function aces_change_casino_category_slug($taxonomy, $object_type, $args)
	{

		$casino_category_slug = 'casino-category';

		if (get_option('casino_category_slug')) {
			$casino_category_slug = get_option('casino_category_slug', 'casino-category');
		}

		if ('casino-category' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_category_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_category_slug', 10, 3);
}

/* --- Add custom slug for taxonomy 'software' --- */

if (get_option('casino_software_slug')) {

	function aces_change_casino_software_slug($taxonomy, $object_type, $args)
	{

		$casino_software_slug = 'software';

		if (get_option('casino_software_slug')) {
			$casino_software_slug = get_option('casino_software_slug', 'software');
		}

		if ('software' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_software_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_software_slug', 10, 3);
}

/* --- Add custom slug for taxonomy 'deposit-method' --- */

if (get_option('casino_deposit_method_slug')) {

	function aces_change_casino_deposit_method_slug($taxonomy, $object_type, $args)
	{

		$casino_deposit_method_slug = 'deposit-method';

		if (get_option('casino_deposit_method_slug')) {
			$casino_deposit_method_slug = get_option('casino_deposit_method_slug', 'deposit-method');
		}

		if ('deposit-method' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_deposit_method_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_deposit_method_slug', 10, 3);
}

/* --- Add custom slug for taxonomy 'withdrawal-method' --- */

if (get_option('casino_withdrawal_method_slug')) {

	function aces_change_casino_withdrawal_method_slug($taxonomy, $object_type, $args)
	{

		$casino_withdrawal_method_slug = 'withdrawal-method';

		if (get_option('casino_withdrawal_method_slug')) {
			$casino_withdrawal_method_slug = get_option('casino_withdrawal_method_slug', 'withdrawal-method');
		}

		if ('withdrawal-method' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_withdrawal_method_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_withdrawal_method_slug', 10, 3);
}

/* --- Add custom slug for taxonomy 'withdrawal-limit' --- */

if (get_option('casino_withdrawal_limit_slug')) {

	function aces_change_casino_withdrawal_limit_slug($taxonomy, $object_type, $args)
	{

		$casino_withdrawal_limit_slug = 'withdrawal-limit';

		if (get_option('casino_withdrawal_limit_slug')) {
			$casino_withdrawal_limit_slug = get_option('casino_withdrawal_limit_slug', 'withdrawal-limit');
		}

		if ('withdrawal-limit' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_withdrawal_limit_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_withdrawal_limit_slug', 10, 3);
}

/* --- Add custom slug for taxonomy 'restricted-countries' --- */

if (get_option('casino_restricted_countries_slug')) {

	function aces_change_casino_restricted_countries_slug($taxonomy, $object_type, $args)
	{

		$casino_restricted_countries_slug = 'restricted-country';

		if (get_option('casino_restricted_countries_slug')) {
			$casino_restricted_countries_slug = get_option('casino_restricted_countries_slug', 'restricted-country');
		}

		if ('restricted-country' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_restricted_countries_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_restricted_countries_slug', 10, 3);
}

/* --- Add custom slug for taxonomy 'licence' --- */

if (get_option('casino_licence_slug')) {

	function aces_change_casino_licence_slug($taxonomy, $object_type, $args)
	{

		$casino_licence_slug = 'licence';

		if (get_option('casino_licence_slug')) {
			$casino_licence_slug = get_option('casino_licence_slug', 'licence');
		}

		if ('licence' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_licence_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_licence_slug', 10, 3);
}

/* --- Add custom slug for taxonomy 'casino-language' --- */

if (get_option('casino_language_slug')) {

	function aces_change_casino_language_slug($taxonomy, $object_type, $args)
	{

		$casino_language_slug = 'casino-language';

		if (get_option('casino_language_slug')) {
			$casino_language_slug = get_option('casino_language_slug', 'casino-language');
		}

		if ('casino-language' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_language_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_language_slug', 10, 3);
}

/* --- Add custom slug for taxonomy 'currency' --- */

if (get_option('casino_currency_slug')) {

	function aces_change_casino_currency_slug($taxonomy, $object_type, $args)
	{

		$casino_currency_slug = 'currency';

		if (get_option('casino_currency_slug')) {
			$casino_currency_slug = get_option('casino_currency_slug', 'currency');
		}

		if ('currency' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_currency_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_currency_slug', 10, 3);
}

/* --- Add custom slug for taxonomy 'device' --- */

if (get_option('casino_device_slug')) {

	function aces_change_casino_device_slug($taxonomy, $object_type, $args)
	{

		$casino_device_slug = 'device';

		if (get_option('casino_device_slug')) {
			$casino_device_slug = get_option('casino_device_slug', 'device');
		}

		if ('device' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_device_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_device_slug', 10, 3);
}

/* --- Add custom slug for taxonomy 'owner' --- */

if (get_option('casino_owner_slug')) {

	function aces_change_casino_owner_slug($taxonomy, $object_type, $args)
	{

		$casino_owner_slug = 'owner';

		if (get_option('casino_owner_slug')) {
			$casino_owner_slug = get_option('casino_owner_slug', 'owner');
		}

		if ('owner' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_owner_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_owner_slug', 10, 3);
}

/* --- Add custom slug for taxonomy 'casino-est' --- */

if (get_option('casino_est_slug')) {

	function aces_change_casino_est_slug($taxonomy, $object_type, $args)
	{

		$casino_est_slug = 'casino-est';

		if (get_option('casino_est_slug')) {
			$casino_est_slug = get_option('casino_est_slug', 'casino-est');
		}

		if ('casino-est' == $taxonomy) {
			remove_action(current_action(), __FUNCTION__);
			$args['rewrite'] = array('slug' => $casino_est_slug);
			register_taxonomy($taxonomy, $object_type, $args);
		}
	}
	add_action('registered_taxonomy', 'aces_change_casino_est_slug', 10, 3);
}

/*  Display the Relationship of the Casino and Bonuses Start  */

add_action('admin_init', 'aces_casinos_bonuses_list');

function aces_casinos_bonuses_list()
{

	$bonuses_section_name = esc_html__('Bonuses', 'aces');
	if (get_option('bonuses_section_name')) {
		$bonuses_section_name = esc_html__(get_option('bonuses_section_name'));
	}

	add_meta_box(
		'aces_casinos_bonuses_list_meta_box',
		$bonuses_section_name,
		'aces_casinos_display_bonuses_list_meta_box',
		'casino',
		'side',
		'high'
	);
}

function aces_casinos_display_bonuses_list_meta_box($post)
{
	$post_id_related = '"' . $post->ID . '"';
	$bonuses = get_posts(
		array(
			'post_type' => 'bonus',
			'posts_per_page' => -1,
			'orderby' => 'post_title',
			'order' => 'ASC',
			'post_status' => 'any',
			'meta_query' => array(
				array(
					'key' => 'bonus_parent_casino',
					'value' => $post_id_related,
					'compare' => 'LIKE'
				)
			)
		)
	);

	if ($bonuses) {
	?>
		<div style="max-height:200px; overflow-y:auto;">
			<ul>
				<?php foreach ($bonuses as $bonus) { ?>
					<li><a href="<?php echo esc_url(get_permalink($bonus->ID)); ?>" title="<?php esc_html_e($bonus->post_title); ?>" target="_blank"><?php esc_html_e($bonus->post_title); ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div>
			<? $value = get_post_meta($post->ID, 'main_bonus_for_casino', true); ?>
			<p>
				<label for="main_bonus_for_casino_field" class="strong">
					<strong><?= __("Main Bonus", 'aces') ?></strong>
				</label>
			</p>
			<select name="main_bonus_for_casino" id="main_bonus_for_casino_field" style="width: calc(100% - 32px);">
				<option value="" <?php selected($value,  ""); ?>><?= __('Not show', 'aces') ?></option>
				<option value="random" <?php selected($value,  "random"); ?>><?= __('Random', 'aces') ?></option>
				<?php foreach ($bonuses as $bonus) { ?>
					<option value="<?= $bonus->ID ?>" <?php selected($value,  $bonus->ID); ?>><?php esc_html_e($bonus->post_title); ?></option>
				<?php } ?>
			</select>
			<span><?= __("Main bonus will be shown in the card and in the sidebar on the single page", 'aces') ?></span>
		</div>
	<?php
	} else {
		esc_html_e('No items', 'aces');
	}
}

/*  Display the Relationship of the Casino and Bonuses End  */

/*  Add Software logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_software_taxonomy_image($taxonomy)
{
	?>
	<div class="form-field term-group">
		<label for="taxonomy-image-id">
			<?php esc_html_e('Logo', 'aces'); ?>
		</label>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
		<div id="taxonomy-image-wrapper"></div>
		<p>
			<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
			<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
		</p>
	</div>
<?php
}

add_action('software_add_form_fields', 'aces_add_software_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_software_taxonomy_image($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		add_term_meta($term_id, 'taxonomy-image-id', $image, true);
	}
}

add_action('created_software', 'aces_save_software_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_software_image_upload($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="taxonomy-image-id">
				<?php esc_html_e('Logo', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true); ?>
			<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
			<div id="taxonomy-image-wrapper">
				<?php if ($image_id) { ?>
					<?php echo wp_get_attachment_image($image_id, 'mercury-custom-logo'); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
				<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
			</p>
		</td>
	</tr>
<?php
}

add_action('software_edit_form_fields', 'aces_edit_software_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_software_image_upload($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		update_term_meta($term_id, 'taxonomy-image-id', $image);
	} else {
		update_term_meta($term_id, 'taxonomy-image-id', '');
	}
}

add_action('edited_software', 'aces_update_software_image_upload', 10, 2);

/*  Add Software logo End  */

/*  Add Deposit Methods logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_deposit_method_taxonomy_image($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="taxonomy-image-id">
			<?php esc_html_e('Logo', 'aces'); ?>
		</label>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
		<div id="taxonomy-image-wrapper"></div>
		<p>
			<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
			<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
		</p>
	</div>
<?php
}

add_action('deposit-method_add_form_fields', 'aces_add_deposit_method_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_deposit_method_taxonomy_image($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		add_term_meta($term_id, 'taxonomy-image-id', $image, true);
	}
}

add_action('created_deposit-method', 'aces_save_deposit_method_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_deposit_method_image_upload($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="taxonomy-image-id">
				<?php esc_html_e('Logo', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true); ?>
			<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
			<div id="taxonomy-image-wrapper">
				<?php if ($image_id) { ?>
					<?php echo wp_get_attachment_image($image_id, 'mercury-custom-logo'); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
				<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
			</p>
		</td>
	</tr>
<?php
}

add_action('deposit-method_edit_form_fields', 'aces_edit_deposit_method_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_deposit_method_image_upload($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		update_term_meta($term_id, 'taxonomy-image-id', $image);
	} else {
		update_term_meta($term_id, 'taxonomy-image-id', '');
	}
}

add_action('edited_deposit-method', 'aces_update_deposit_method_image_upload', 10, 2);

/*  Add Deposit Methods logo End  */

/*  Add Withdrawal Methods logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_withdrawal_method_taxonomy_image($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="taxonomy-image-id">
			<?php esc_html_e('Logo', 'aces'); ?>
		</label>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
		<div id="taxonomy-image-wrapper"></div>
		<p>
			<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
			<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
		</p>
	</div>
<?php
}

add_action('withdrawal-method_add_form_fields', 'aces_add_withdrawal_method_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_withdrawal_method_taxonomy_image($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		add_term_meta($term_id, 'taxonomy-image-id', $image, true);
	}
}

add_action('created_withdrawal-method', 'aces_save_withdrawal_method_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_withdrawal_method_image_upload($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="taxonomy-image-id">
				<?php esc_html_e('Logo', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true); ?>
			<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
			<div id="taxonomy-image-wrapper">
				<?php if ($image_id) { ?>
					<?php echo wp_get_attachment_image($image_id, 'mercury-custom-logo'); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
				<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
			</p>
		</td>
	</tr>
<?php
}

add_action('withdrawal-method_edit_form_fields', 'aces_edit_withdrawal_method_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_withdrawal_method_image_upload($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		update_term_meta($term_id, 'taxonomy-image-id', $image);
	} else {
		update_term_meta($term_id, 'taxonomy-image-id', '');
	}
}

add_action('edited_withdrawal-method', 'aces_update_withdrawal_method_image_upload', 10, 2);

/*  Add Withdrawal Methods logo End  */

/*  Add Withdrawal Limits logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_withdrawal_limit_taxonomy_image($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="taxonomy-image-id">
			<?php esc_html_e('Logo', 'aces'); ?>
		</label>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
		<div id="taxonomy-image-wrapper"></div>
		<p>
			<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
			<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
		</p>
	</div>
<?php
}

add_action('withdrawal-limit_add_form_fields', 'aces_add_withdrawal_limit_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_withdrawal_limit_taxonomy_image($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		add_term_meta($term_id, 'taxonomy-image-id', $image, true);
	}
}

add_action('created_withdrawal-limit', 'aces_save_withdrawal_limit_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_withdrawal_limit_image_upload($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="taxonomy-image-id">
				<?php esc_html_e('Logo', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true); ?>
			<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
			<div id="taxonomy-image-wrapper">
				<?php if ($image_id) { ?>
					<?php echo wp_get_attachment_image($image_id, 'mercury-custom-logo'); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
				<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
			</p>
		</td>
	</tr>
<?php
}

add_action('withdrawal-limit_edit_form_fields', 'aces_edit_withdrawal_limit_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_withdrawal_limit_image_upload($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		update_term_meta($term_id, 'taxonomy-image-id', $image);
	} else {
		update_term_meta($term_id, 'taxonomy-image-id', '');
	}
}

add_action('edited_withdrawal-limit', 'aces_update_withdrawal_limit_image_upload', 10, 2);

/*  Add Withdrawal Methods logo End  */

/*  Add country code field to Restricted Countries Start  */

/* --- Add custom taxonomy field --- */

function aces_add_restricted_countries_country_code($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="aces_country_code">
			<?php esc_html_e('Country code', 'aces'); ?>
		</label>
		<input type="text" id="aces_country_code" name="aces_country_code" class="regular-text" value="" maxlength="2" style="text-transform: uppercase;">
		<p>
			<?php esc_html_e('For example, for the', 'aces'); ?> <strong><?php esc_html_e('United States', 'aces'); ?></strong> - <strong><?php esc_html_e('US', 'aces'); ?></strong> <?php esc_html_e('code', 'aces'); ?>. <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2" title="<?php esc_attr_e('ISO 3166-1 alpha-2 country codes', 'aces'); ?>" target="_blank"><?php esc_html_e('ISO 3166-1 alpha-2 country codes', 'aces'); ?></a>
		</p>
	</div>
<?php
}

add_action('restricted-country_add_form_fields', 'aces_add_restricted_countries_country_code', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_restricted_countries_country_code($term_id, $tt_id)
{
	if (isset($_POST['aces_country_code']) && '' !== $_POST['aces_country_code']) {
		$country_code = esc_attr($_POST['aces_country_code']);
		add_term_meta($term_id, 'aces_country_code', $country_code, true);
	}
}

add_action('created_restricted-country', 'aces_save_restricted_countries_country_code', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_restricted_countries_country_code($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="aces_country_code">
				<?php esc_html_e('Country code', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $country_code = get_term_meta($term->term_id, 'aces_country_code', true); ?>
			<input type="text" id="aces_country_code" name="aces_country_code" value="<?php echo esc_attr($country_code); ?>" maxlength="2" style="text-transform: uppercase;">
			<p class="description">
				<?php esc_html_e('For example, for the', 'aces'); ?> <strong><?php esc_html_e('United States', 'aces'); ?></strong> - <strong><?php esc_html_e('US', 'aces'); ?></strong> <?php esc_html_e('code', 'aces'); ?>. <a href="https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2" title="<?php esc_attr_e('ISO 3166-1 alpha-2 country codes', 'aces'); ?>" target="_blank"><?php esc_html_e('ISO 3166-1 alpha-2 country codes', 'aces'); ?></a>
			</p>
		</td>
	</tr>
<?php
}

add_action('restricted-country_edit_form_fields', 'aces_edit_restricted_countries_country_code', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_restricted_countries_country_code($term_id, $tt_id)
{
	if (isset($_POST['aces_country_code']) && '' !== $_POST['aces_country_code']) {
		$country_code = esc_attr($_POST['aces_country_code']);
		update_term_meta($term_id, 'aces_country_code', $country_code);
	} else {
		update_term_meta($term_id, 'aces_country_code', '');
	}
}

add_action('edited_restricted-country', 'aces_update_restricted_countries_country_code', 10, 2);

/* --- Show country code in the list of restricted countries --- */

function aces_country_code_column_name($columns)
{
	$columns['restricted_country_code_column'] = esc_html__('Country code (ISO 3166-1 alpha-2)', 'aces');
	return $columns;
}

add_filter('manage_edit-restricted-country_columns', 'aces_country_code_column_name');

function aces_country_code_column_data($content, $column_name, $term_id)
{

	if ($column_name == 'restricted_country_code_column') {
		echo esc_html(get_term_meta($term_id, 'aces_country_code', true));
	}
}

add_filter('manage_restricted-country_custom_column', 'aces_country_code_column_data', 10, 3);

/*  Add country code field to Restricted Countries End  */

/*  Add Restricted Countries flag Start  */

/* --- Add custom taxonomy field --- */

function aces_add_restricted_countries_taxonomy_image($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="taxonomy-image-id">
			<?php esc_html_e('Flag', 'aces'); ?>
		</label>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
		<div id="taxonomy-image-wrapper"></div>
		<p>
			<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Flag', 'aces'); ?>" />
			<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Flag', 'aces'); ?>" />
		</p>
	</div>
<?php
}

add_action('restricted-country_add_form_fields', 'aces_add_restricted_countries_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_restricted_countries_taxonomy_image($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		add_term_meta($term_id, 'taxonomy-image-id', $image, true);
	}
}

add_action('created_restricted-country', 'aces_save_restricted_countries_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_restricted_countries_image_upload($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="taxonomy-image-id">
				<?php esc_html_e('Flag', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true); ?>
			<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
			<div id="taxonomy-image-wrapper">
				<?php if ($image_id) { ?>
					<?php echo wp_get_attachment_image($image_id, 'mercury-custom-logo'); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Flag', 'aces'); ?>" />
				<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Flag', 'aces'); ?>" />
			</p>
		</td>
	</tr>
<?php
}

add_action('restricted-country_edit_form_fields', 'aces_edit_restricted_countries_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_restricted_countries_image_upload($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		update_term_meta($term_id, 'taxonomy-image-id', $image);
	} else {
		update_term_meta($term_id, 'taxonomy-image-id', '');
	}
}

add_action('edited_restricted-country', 'aces_update_restricted_countries_image_upload', 10, 2);

/*  Add Restricted Countries flag End  */

/*  Add Licences logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_licence_taxonomy_image($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="taxonomy-image-id">
			<?php esc_html_e('Logo', 'aces'); ?>
		</label>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
		<div id="taxonomy-image-wrapper"></div>
		<p>
			<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
			<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
		</p>
	</div>
<?php
}

add_action('licence_add_form_fields', 'aces_add_licence_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_licence_taxonomy_image($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		add_term_meta($term_id, 'taxonomy-image-id', $image, true);
	}
}

add_action('created_licence', 'aces_save_licence_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_licence_image_upload($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="taxonomy-image-id">
				<?php esc_html_e('Logo', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true); ?>
			<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
			<div id="taxonomy-image-wrapper">
				<?php if ($image_id) { ?>
					<?php echo wp_get_attachment_image($image_id, 'mercury-custom-logo'); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
				<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
			</p>
		</td>
	</tr>
<?php
}

add_action('licence_edit_form_fields', 'aces_edit_licence_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_licence_image_upload($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		update_term_meta($term_id, 'taxonomy-image-id', $image);
	} else {
		update_term_meta($term_id, 'taxonomy-image-id', '');
	}
}

add_action('edited_licence', 'aces_update_licence_image_upload', 10, 2);

/*  Add Licences logo End  */

/*  Add Languages logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_casino_language_taxonomy_image($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="taxonomy-image-id">
			<?php esc_html_e('Logo', 'aces'); ?>
		</label>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
		<div id="taxonomy-image-wrapper"></div>
		<p>
			<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
			<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
		</p>
	</div>
<?php
}

add_action('casino-language_add_form_fields', 'aces_add_casino_language_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_casino_language_taxonomy_image($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		add_term_meta($term_id, 'taxonomy-image-id', $image, true);
	}
}

add_action('created_casino-language', 'aces_save_casino_language_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_casino_language_image_upload($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="taxonomy-image-id">
				<?php esc_html_e('Logo', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true); ?>
			<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
			<div id="taxonomy-image-wrapper">
				<?php if ($image_id) { ?>
					<?php echo wp_get_attachment_image($image_id, 'mercury-custom-logo'); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
				<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
			</p>
		</td>
	</tr>
<?php
}

add_action('casino-language_edit_form_fields', 'aces_edit_casino_language_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_casino_language_image_upload($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		update_term_meta($term_id, 'taxonomy-image-id', $image);
	} else {
		update_term_meta($term_id, 'taxonomy-image-id', '');
	}
}

add_action('edited_casino-language', 'aces_update_casino_language_image_upload', 10, 2);

/*  Add Languages logo End  */

/*  Add Currencies logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_currency_taxonomy_image($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="taxonomy-image-id">
			<?php esc_html_e('Logo', 'aces'); ?>
		</label>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
		<div id="taxonomy-image-wrapper"></div>
		<p>
			<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
			<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
		</p>
	</div>
<?php
}

add_action('currency_add_form_fields', 'aces_add_currency_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_currency_taxonomy_image($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		add_term_meta($term_id, 'taxonomy-image-id', $image, true);
	}
}

add_action('created_currency', 'aces_save_currency_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_currency_image_upload($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="taxonomy-image-id">
				<?php esc_html_e('Logo', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true); ?>
			<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
			<div id="taxonomy-image-wrapper">
				<?php if ($image_id) { ?>
					<?php echo wp_get_attachment_image($image_id, 'mercury-custom-logo'); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
				<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
			</p>
		</td>
	</tr>
<?php
}

add_action('currency_edit_form_fields', 'aces_edit_currency_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_currency_image_upload($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		update_term_meta($term_id, 'taxonomy-image-id', $image);
	} else {
		update_term_meta($term_id, 'taxonomy-image-id', '');
	}
}

add_action('edited_currency', 'aces_update_currency_image_upload', 10, 2);

/*  Add Currencies logo End  */

/*  Add Devices logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_device_taxonomy_image($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="taxonomy-image-id">
			<?php esc_html_e('Logo', 'aces'); ?>
		</label>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
		<div id="taxonomy-image-wrapper"></div>
		<p>
			<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
			<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
		</p>
	</div>
<?php
}

add_action('device_add_form_fields', 'aces_add_device_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_device_taxonomy_image($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		add_term_meta($term_id, 'taxonomy-image-id', $image, true);
	}
}

add_action('created_device', 'aces_save_device_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_device_image_upload($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="taxonomy-image-id">
				<?php esc_html_e('Logo', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true); ?>
			<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
			<div id="taxonomy-image-wrapper">
				<?php if ($image_id) { ?>
					<?php echo wp_get_attachment_image($image_id, 'mercury-custom-logo'); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
				<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
			</p>
		</td>
	</tr>
<?php
}

add_action('device_edit_form_fields', 'aces_edit_device_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_device_image_upload($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		update_term_meta($term_id, 'taxonomy-image-id', $image);
	} else {
		update_term_meta($term_id, 'taxonomy-image-id', '');
	}
}

add_action('edited_device', 'aces_update_device_image_upload', 10, 2);

/*  Add Devices logo End  */

/*  Add Owner logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_owner_taxonomy_image($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="taxonomy-image-id">
			<?php esc_html_e('Logo', 'aces'); ?>
		</label>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
		<div id="taxonomy-image-wrapper"></div>
		<p>
			<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
			<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
		</p>
	</div>
<?php
}

add_action('owner_add_form_fields', 'aces_add_owner_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_owner_taxonomy_image($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		add_term_meta($term_id, 'taxonomy-image-id', $image, true);
	}
}

add_action('created_owner', 'aces_save_owner_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_owner_image_upload($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="taxonomy-image-id">
				<?php esc_html_e('Logo', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true); ?>
			<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
			<div id="taxonomy-image-wrapper">
				<?php if ($image_id) { ?>
					<?php echo wp_get_attachment_image($image_id, 'mercury-custom-logo'); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
				<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
			</p>
		</td>
	</tr>
<?php
}

add_action('owner_edit_form_fields', 'aces_edit_owner_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_owner_image_upload($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		update_term_meta($term_id, 'taxonomy-image-id', $image);
	} else {
		update_term_meta($term_id, 'taxonomy-image-id', '');
	}
}

add_action('edited_owner', 'aces_update_owner_image_upload', 10, 2);

/*  Add Owner logo End  */

/*  Add Established logo Start  */

/* --- Add custom taxonomy field --- */

function aces_add_casino_est_taxonomy_image($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="taxonomy-image-id">
			<?php esc_html_e('Logo', 'aces'); ?>
		</label>
		<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
		<div id="taxonomy-image-wrapper"></div>
		<p>
			<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
			<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
		</p>
	</div>
<?php
}

add_action('casino-est_add_form_fields', 'aces_add_casino_est_taxonomy_image', 10, 2);

/* --- Save the custom taxonomy field --- */

function aces_save_casino_est_taxonomy_image($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		add_term_meta($term_id, 'taxonomy-image-id', $image, true);
	}
}

add_action('created_casino-est', 'aces_save_casino_est_taxonomy_image', 10, 2);

/* --- Add custom taxonomy field for edit --- */

function aces_edit_casino_est_image_upload($term, $taxonomy)
{
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="taxonomy-image-id">
				<?php esc_html_e('Logo', 'aces'); ?>
			</label>
		</th>
		<td>
			<?php $image_id = get_term_meta($term->term_id, 'taxonomy-image-id', true); ?>
			<input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
			<div id="taxonomy-image-wrapper">
				<?php if ($image_id) { ?>
					<?php echo wp_get_attachment_image($image_id, 'mercury-custom-logo'); ?>
				<?php } ?>
			</div>
			<p>
				<input type="button" class="button button-secondary aces_media_button" id="aces_media_button" name="aces_media_button" value="<?php esc_attr_e('Add Logo', 'aces'); ?>" />
				<input type="button" class="button button-secondary aces_media_remove" id="aces_media_remove" name="aces_media_remove" value="<?php esc_attr_e('Remove Logo', 'aces'); ?>" />
			</p>
		</td>
	</tr>
<?php
}

add_action('casino-est_edit_form_fields', 'aces_edit_casino_est_image_upload', 10, 2);

/* --- Save the edited value of the custom taxonomy field --- */

function aces_update_casino_est_image_upload($term_id, $tt_id)
{
	if (isset($_POST['taxonomy-image-id']) && '' !== $_POST['taxonomy-image-id']) {
		$image = esc_attr($_POST['taxonomy-image-id']);
		update_term_meta($term_id, 'taxonomy-image-id', $image);
	} else {
		update_term_meta($term_id, 'taxonomy-image-id', '');
	}
}

add_action('edited_casino-est', 'aces_update_casino_est_image_upload', 10, 2);

/*  Add Established logo End  */

function aces_main_licence()
{
	add_meta_box(
		'aces_main_licence_meta_box',
		esc_html__('Licence Settings', 'aces'),
		'aces_main_licence_display_meta_box',
		'casino',
		'side',
		'high'
	);
}
add_action('add_meta_boxes', 'aces_main_licence');

function aces_main_licence_display_meta_box($post)
{

	$main_licence = get_post_meta($post->ID, 'main_licence_for_casino', true);
	$casino_licences = wp_get_object_terms($post->ID, 'licence');

	if (empty($main_licence)) {
		$main_licence = '';
	}
?>
	<div class='inside'>
		<p>
			<label for="main_licence_for_casino_field"><b><?php _e('Main Licence', 'aces'); ?></b></label>
			<select name="main_licence_for_casino" id="main_licence_for_casino_field" class="regular-text" style="width: calc(100% - 32px);">
				<option value="" <?php selected($main_licence,  ''); ?>><?php _e('Select main licence...', 'aces'); ?></option>
				<? foreach ($casino_licences as $licence) { ?>
					<option value="<?= $licence->term_id ?>" <?php selected($main_licence,  $licence->term_id); ?>><?= $licence->name ?></option>
				<? } ?>
			</select>
			<br><small><span>
				<?= __("Main licence will be shown in the card and in the banner on the single page.", 'aces') ?>
				<br>
				<strong><?= __("Use only if the casino has multiple licences", 'aces') ?></strong>
		</span></small>
		</p>
	</div>
<?php
}
