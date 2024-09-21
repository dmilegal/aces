<?php

/*
Plugin Name: ACES
Plugin URI: https://mercurytheme.com/
Description: The plugin by MercuryTheme.com for the creation of custom post types for the Mercury theme.
Version: 3.0.1
Author: MercuryTheme.com
Author URI: https://mercurytheme.com/
License: GNU General Public License v3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: aces
*/

global $aces_version;
$aces_version = '3.0.1';

global $aces_options, $aces_plugin_dir, $aces_plugin_url;

$aces_plugin_dir = untrailingslashit(plugin_dir_path(__FILE__));
$aces_plugin_url = untrailingslashit(plugin_dir_url(__FILE__));
define("ACES_MIXED_POST_TYPES", ['casino', 'bookmaker']);

function aces_init()
{
    load_plugin_textdomain('aces', false, plugin_basename(dirname(__FILE__)) . '/languages/');
}
add_filter('init', 'aces_init');

/*  ---  Settings  ---  */

include_once $aces_plugin_dir . '/settings/index.php';

/*  Aces Settings Init Start */

/*  ---  Organizations  ---  */
include_once $aces_plugin_dir . '/settings/organizations.php';
include_once $aces_plugin_dir . '/settings/bookmakers.php';
include_once $aces_plugin_dir . '/settings/casinos.php';

/*  ---  Units  ---  */

include_once $aces_plugin_dir . '/settings/games.php';

/*  ---  Offers  ---  */

include_once $aces_plugin_dir . '/settings/bonuses.php';

/*  ---  Geolocation  ---  */

include_once $aces_plugin_dir . '/settings/geolocation.php';


/*  ---  REST API  ---  */

include_once $aces_plugin_dir . '/settings/organizations-rest.php';

/*  Aces Settings Init End */

/*  ---  Organizations  ---  */

include_once $aces_plugin_dir . '/casinos.php';

/*  ---  Bookmakers  ---  */

include_once $aces_plugin_dir . '/bookmakers.php';

/*  ---  Casinos/Bookmakers  ---  */

include_once $aces_plugin_dir . '/bookmaker-casinos.php';
include_once $aces_plugin_dir . '/bookmaker-casinos-taxs.php';

/*  ---  Units  ---  */

include_once $aces_plugin_dir . '/games.php';

/*  ---  Offers  ---  */

include_once $aces_plugin_dir . '/bonuses.php';

/*  ---  Geolocation  ---  */

include_once $aces_plugin_dir . '/functions/geolocation.php';

/*  ---  Get Bonus Parameters  ---  */

include_once $aces_plugin_dir . '/functions/currency-format.php';
include_once $aces_plugin_dir . '/functions/get-bonus-parameters.php';
include_once $aces_plugin_dir . '/functions/get-bonuses-categories.php';

/*  ACES Rating Stars Start */

function aces_star_rating($args = array())
{
    $defaults    = array(
        'rating' => 0,
        'type'   => 'rating',
        'stars_number' => 0,
        'echo'   => true,
    );
    $parsed_args = wp_parse_args($args, $defaults);

    $rating = (float) str_replace(',', '.', $parsed_args['rating']);
    $stars_number = $parsed_args['stars_number'];

    // if ( 'percent' === $parsed_args['type'] ) {
    //    $rating = round( $rating / $stars_number, 0 ) / 2;
    // }

    $full_stars  = floor($rating);
    $half_stars  = ceil($rating - $full_stars);
    $empty_stars = $stars_number - $full_stars - $half_stars;

    $output  = '<div class="star-rating">';
    $output .= str_repeat('<div class="star star-full" aria-hidden="true"></div>', $full_stars);
    $output .= str_repeat('<div class="star star-half" aria-hidden="true"></div>', $half_stars);
    $output .= str_repeat('<div class="star star-empty" aria-hidden="true"></div>', $empty_stars);
    $output .= '</div>';

    if ($parsed_args['echo']) {
        echo $output;
    }

    return $output;
}

/*  ACES Rating Stars End */

/* ACES Get Main Casino Bonus Start */
function aces_get_casino_bonus_id($casino_id, $bonus_category_list = [])
{
    if ($bonus_category_list) {
        return aces_get_casino_bonus_id_by_cats($casino_id, $bonus_category_list);
    } else {
        return aces_get_main_casino_bonus_id($casino_id);
    }
}

function aces_get_casino_bonus_id_by_cats($casino_id, $bonus_category_list = [])
{
    if (empty($bonus_category_list)) {
        return false;
    }

    foreach ($bonus_category_list as $category_id) {
        $args = array(
            'fields' => 'ids',
            'posts_per_page' => 1,
            'post_type' => 'bonus',
            'meta_query' => array(
                array(
                    'key' => 'bonus_parent_casino',
                    'value' => $casino_id,
                    'compare' => 'LIKE'
                )
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'bonus-category',
                    'field' => 'term_id',
                    'terms' => $category_id,
                )
            )
        );

        $bonuses = get_posts($args);

        if (!empty($bonuses)) {
            return $bonuses[0];
        }
    }

    return false;
}


function aces_get_main_casino_bonus_id($casino_id)
{
    // Получаем выбранный бонус для казино из метаполя
    $selected_bonus = get_post_meta($casino_id, 'main_bonus_for_casino', true);

    // Получаем ID категории бонуса по умолчанию из настроек
    $default_category = get_option('bonuses_get_bonus_default_category', false);

    // Массив аргументов для запроса бонусов
    $args = array(
        'fields' => 'ids',
        'posts_per_page' => 1,
        'post_type' => 'bonus',
        'meta_query' => array(
            array(
                'key' => 'bonus_parent_casino',
                'value' => $casino_id,
                'compare' => 'LIKE'
            )
        )
    );

    // Если не выбран основной бонус для казино
    if (!$selected_bonus) {
        // Если указана категория по умолчанию, добавляем таксономический запрос
        if ($default_category) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'bonus-category',
                    'field' => 'term_id',
                    'terms' => $default_category
                )
            );

            $bonuses = get_posts($args);

            return count($bonuses) ? $bonuses[0] : false;
        }

        return false;
    }

    // Если выбран произвольный бонус
    if ($selected_bonus === 'random') {
        $bonuses = get_posts(array_merge($args, array(
            'orderby' => 'rand'
        )));

        return count($bonuses) ? $bonuses[0] : false;
    }

    // Если выбран конкретный бонус
    $bonuses = get_posts(array_merge($args, array(
        'post__in' => [$selected_bonus]
    )));

    // Если найден выбранный бонус, возвращаем его
    if (count($bonuses)) return $bonuses[0];

    // Если не найден выбранный бонус, удаляем метаданные и возвращаем false
    delete_post_meta($casino_id, 'main_bonus_for_casino');

    return false;
}

/* ACES Get Main Casino Bonus End */

/* ACES Get Main Casino Licence Start */

function aces_get_main_casino_licence_term_id($casino_id)
{
    $casino_licences = wp_get_object_terms($casino_id, 'licence');
    $main_licence = get_post_meta($casino_id, 'main_licence_for_casino', true);

    if ($main_licence) return intval($main_licence);
    if (count($casino_licences) == 1) return $casino_licences[0]->term_id;

    return 0;
}

/* ACES Get Main Casino Licence End */

/* ACES Casino Has Licence Start */

function aces_casino_has_licence($casino_id)
{
    $casino_licences = wp_get_object_terms($casino_id, 'licence');

    return !!$casino_licences;
}

/* ACES Casino Has Licence End */

/*  Custom Aces Plugin Widgets Start  */

include_once $aces_plugin_dir . '/widgets/casinos-widget-1.php';
include_once $aces_plugin_dir . '/widgets/casinos-widget-2.php';
include_once $aces_plugin_dir . '/widgets/casinos-widget-3.php';
include_once $aces_plugin_dir . '/widgets/casinos-widget-4.php';
include_once $aces_plugin_dir . '/widgets/casinos-widget-5.php';
include_once $aces_plugin_dir . '/widgets/casinos-widget-6.php';
include_once $aces_plugin_dir . '/widgets/casinos-widget-7.php';
include_once $aces_plugin_dir . '/widgets/casinos-widget-8.php';
include_once $aces_plugin_dir . '/widgets/casinos-widget-9.php';
include_once $aces_plugin_dir . '/widgets/casinos-widget-10.php';
include_once $aces_plugin_dir . '/widgets/games-widget-1.php';
include_once $aces_plugin_dir . '/widgets/games-widget-2.php';
include_once $aces_plugin_dir . '/widgets/games-widget-3.php';
include_once $aces_plugin_dir . '/widgets/games-sidebar.php';
include_once $aces_plugin_dir . '/widgets/bonuses-home.php';

/*  Custom Aces Plugin Widgets End  */

/*  Custom Aces Plugin Shortcodes Start  */

// Casinos

include_once $aces_plugin_dir . '/shortcodes/casinos-shortcode-1.php';
include_once $aces_plugin_dir . '/shortcodes/casinos-shortcode-2.php';
include_once $aces_plugin_dir . '/shortcodes/casinos-shortcode-3.php';
include_once $aces_plugin_dir . '/shortcodes/casinos-shortcode-4.php';
include_once $aces_plugin_dir . '/shortcodes/casinos-shortcode-5.php';
include_once $aces_plugin_dir . '/shortcodes/casinos-shortcode-6.php';
include_once $aces_plugin_dir . '/shortcodes/casinos-shortcode-7.php';
include_once $aces_plugin_dir . '/shortcodes/casinos-shortcode-8.php';
include_once $aces_plugin_dir . '/shortcodes/casinos-shortcode-9.php';

include_once $aces_plugin_dir . '/shortcodes/organization-single-1.php';
include_once $aces_plugin_dir . '/shortcodes/organization-single-2.php';
include_once $aces_plugin_dir . '/shortcodes/organization-single-3.php';
include_once $aces_plugin_dir . '/shortcodes/organization-taxonomy-1.php';
include_once $aces_plugin_dir . '/shortcodes/organization-rating-1.php';
include_once $aces_plugin_dir . '/shortcodes/organization-rating-2.php';

// Games

include_once $aces_plugin_dir . '/shortcodes/games-shortcode-1.php';
include_once $aces_plugin_dir . '/shortcodes/games-shortcode-2.php';
include_once $aces_plugin_dir . '/shortcodes/games-shortcode-3.php';
include_once $aces_plugin_dir . '/shortcodes/games-shortcode-4.php';

include_once $aces_plugin_dir . '/shortcodes/unit-single-1.php';
include_once $aces_plugin_dir . '/shortcodes/unit-single-2.php';
include_once $aces_plugin_dir . '/shortcodes/unit-single-3.php';

// Bonuses

include_once $aces_plugin_dir . '/shortcodes/bonuses-shortcode-1.php';

include_once $aces_plugin_dir . '/shortcodes/offer-single-1.php';

// Other Shortcodes

include_once $aces_plugin_dir . '/shortcodes/cards-shortcode.php';
include_once $aces_plugin_dir . '/shortcodes/pros-shortcode-1.php';
include_once $aces_plugin_dir . '/shortcodes/cons-shortcode-1.php';

/*  Custom Aces Plugin Shortcodes End  */

/*  Image Uploader Start  */

function aces_image_uploader()
{
    global $typenow;
    if ($typenow == 'casino' || $typenow == 'game' || $typenow == 'bonus' || $typenow == 'bookmaker') {

        if (!did_action('wp_enqueue_media')) {
            wp_enqueue_media();
        }

        wp_register_script('aces-image-uploader', plugin_dir_url(__FILE__) . 'js/image-uploader.js', array('jquery'), '2.4');
        wp_register_script('aces-filtering', plugin_dir_url(__FILE__) . 'js/filtering.js', array('jquery'), '2.4');
        wp_enqueue_script('aces-image-uploader');
        wp_enqueue_script('aces-filtering');
    }
}
add_action('admin_enqueue_scripts', 'aces_image_uploader');

/*  Image Uploader End  */

/*  Connecting style files for the plugin - Start  */

function aces_stylesheets()
{
    wp_enqueue_style('aces-style', $GLOBALS['aces_plugin_url'] . '/css/aces-style.css', array(), $GLOBALS['aces_version'], 'all');
    wp_enqueue_style('aces-media', $GLOBALS['aces_plugin_url'] . '/css/aces-media.css', array(), $GLOBALS['aces_version'], 'all');
}
add_action('wp_enqueue_scripts', 'aces_stylesheets');

/*  Connecting style files for the plugin - End  */

/*  Add a logo image column in the admin panel - Start  */

/*  ---  Casinos  ---  */

function aces_logo_image_column_casino($column_ars)
{

    $column_ars = array_slice($column_ars, 0, 1, true)
        + array('featured_logo' => 'Logo')
        + array_slice($column_ars, 1, NULL, true);
    return $column_ars;
}

add_filter('manage_casino_posts_columns', 'aces_logo_image_column_casino');

/*  ---  Games  ---  */

function aces_logo_image_column_game($column_ars)
{

    $column_ars = array_slice($column_ars, 0, 1, true)
        + array('featured_logo' => 'Image')
        + array_slice($column_ars, 1, NULL, true);
    return $column_ars;
}

add_filter('manage_game_posts_columns', 'aces_logo_image_column_game');

/*  ---  Bonuses  ---  */

function aces_logo_image_column_bonus($column_ars)
{

    $column_ars = array_slice($column_ars, 0, 1, true)
        + array('featured_logo' => 'Image')
        + array_slice($column_ars, 1, NULL, true);
    return $column_ars;
}

add_filter('manage_bonus_posts_columns', 'aces_logo_image_column_bonus');

/*  ---  Display logo/image column  ---  */

function aces_display_logo_column($column_name, $post_id)
{

    if ($column_name == 'featured_logo') {
        if (has_post_thumbnail($post_id)) {
            $logo_src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'thumbnail');
            $logo_id = get_post_thumbnail_id($post_id);
            echo '<img data-id="' . $logo_id . '" src="' . esc_url($logo_src[0]) . '" />';
        }
    }
}

add_action('manage_posts_custom_column', 'aces_display_logo_column', 10, 2);

/* --- Add CSS styles for the custom logo column --- */

function aces_custom_logo_css()
{

    echo '<style>
		#featured_logo {
			width: 100px;
		}
		td.featured_logo.column-featured_logo img {
			max-width: 100%;
			height: auto;
			border-radius: 5px;
		}
	</style>';
}

add_action('admin_head', 'aces_custom_logo_css');

/*  Add a logo image column in the admin panel - End  */

/*  Add item ID column in the admin panel - Start  */

/*  ---  Casinos  ---  */

function aces_item_id_column_organization($column_ars)
{

    $column_ars = array_slice($column_ars, 0, 3, true)
        + array('aces_item_id' => 'Item ID')
        + array_slice($column_ars, 1, NULL, true);
    return $column_ars;
}

add_filter('manage_casino_posts_columns', 'aces_item_id_column_organization');

/*  ---  Games  ---  */

function aces_item_id_column_unit($column_ars)
{

    $column_ars = array_slice($column_ars, 0, 3, true)
        + array('aces_item_id' => 'Item ID')
        + array_slice($column_ars, 1, NULL, true);
    return $column_ars;
}

add_filter('manage_game_posts_columns', 'aces_item_id_column_unit');

/*  ---  Bonuses  ---  */

function aces_item_id_column_offer($column_ars)
{

    $column_ars = array_slice($column_ars, 0, 3, true)
        + array('aces_item_id' => 'Item ID')
        + array_slice($column_ars, 1, NULL, true);
    return $column_ars;
}

add_filter('manage_bonus_posts_columns', 'aces_item_id_column_offer');

/*  ---  Display item ID column  ---  */

function aces_display_item_id_column($column_name, $post_id)
{

    if ($column_name == 'aces_item_id') {
        if ($post_id) {
            echo '<strong>' . $post_id . '</strong>';
        }
    }
}

add_action('manage_posts_custom_column', 'aces_display_item_id_column', 10, 2);

/*  Add item ID column in the admin panel - End  */

/*  The standard field for the upload Background image of casino/game single page - Start  */

function aces_background_image_uploader($name, $value = '')
{
    $image = ' button">' . esc_html__('Upload image', 'aces');
    $display = 'none';

    if ($image_attributes = wp_get_attachment_image_src($value, 'mercury-2000-400')) {
        $image = '"><img src="' . $image_attributes[0] . '" style="max-width: 100%; width: auto; display: block;" />';
        $display = 'block';
    }

    return '
	<div style="margin-top: 1em;">
		<a href="#" style="display: inline-block;" class="aces_upload_background_button' . $image . '</a>
		<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . esc_attr($value) . '" />
		<a href="#" class="aces_remove_background_button components-button is-link is-destructive" style="margin-top: 1em; display:' . $display . '">' . esc_html__('Remove background image', 'aces') . '</a>
	</div>';
}

/*  The standard field for the upload Background image of casino/game single page - End  */

/*  Changing classes for custom post types in the body - Start  */

/*  ---  Casinos  ---  */

function aces_change_casino_body_classes($classes, $class)
{
    global $post;
    if (!$post || $post->post_type != 'casino') {
        return $classes;
    } else {
        foreach ($classes as &$str) {
            if (strpos($str, 'single-casino') > -1) {
                $str = 'single-organization';
            }
            if (strpos($str, 'casino-template-default') > -1) {
                $str = 'organization-template-default';
            }
        }
    }
    return $classes;
}
add_filter('body_class', 'aces_change_casino_body_classes', 10, 2);

/*  ---  Games  ---  */

function aces_change_game_body_classes($classes, $class)
{

    global $post;

    if (!$post || $post->post_type != 'game') {
        return $classes;
    } else {
        foreach ($classes as &$str) {
            if (strpos($str, 'single-game') > -1) {
                $str = 'single-unit';
            }
            if (strpos($str, 'game-template-default') > -1) {
                $str = 'unit-template-default';
            }
        }
    }
    return $classes;
}
add_filter('body_class', 'aces_change_game_body_classes', 10, 2);

/*  ---  Bonuses  ---  */

function aces_change_bonus_body_classes($classes, $class)
{
    global $post;
    if (!$post || $post->post_type != 'bonus') {
        return $classes;
    } else {
        foreach ($classes as &$str) {
            if (strpos($str, 'single-bonus') > -1) {
                $str = 'single-offer';
            }
            if (strpos($str, 'bonus-template-default') > -1) {
                $str = 'offer-template-default';
            }
        }
    }
    return $classes;
}
add_filter('body_class', 'aces_change_bonus_body_classes', 10, 2);

/*  Changing classes for custom post types in the body - End  */

/* Start init rest api */

add_action('rest_api_init', function () {
    $casinoRest = new Aces_Organization_Rest();
    $casinoRest->init();
});

/* End init rest api */