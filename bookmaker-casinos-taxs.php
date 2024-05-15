<?
add_action('init', 'aces_casinos_bookmaker_taxs', 0);
function aces_casinos_bookmaker_taxs()
{
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

	register_taxonomy('software', ACES_MIXED_POST_TYPES, $args);

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

	register_taxonomy('deposit-method', ACES_MIXED_POST_TYPES, $args);

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

	register_taxonomy('withdrawal-method', ACES_MIXED_POST_TYPES, $args);

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

	register_taxonomy('withdrawal-limit', ACES_MIXED_POST_TYPES, $args);

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

	register_taxonomy('restricted-country', ACES_MIXED_POST_TYPES, $args);

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

	register_taxonomy('licence', ACES_MIXED_POST_TYPES, $args);

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

	register_taxonomy('casino-language', ACES_MIXED_POST_TYPES, $args);

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

	register_taxonomy('currency', ACES_MIXED_POST_TYPES, $args);

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

	register_taxonomy('device', ACES_MIXED_POST_TYPES, $args);

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

	register_taxonomy('owner', ACES_MIXED_POST_TYPES, $args);

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
		'rewrite' =>  array('slug' => 'establishment'),
		'query_var' => '',
		'capabilities' => array(),
		'_builtin' => false
	);

	register_taxonomy('casino-est', ACES_MIXED_POST_TYPES, $args);
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

