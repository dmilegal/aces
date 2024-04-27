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

