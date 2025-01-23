<?

add_action('init', 'aces_casinos_bookmaker', 0);
function aces_casinos_bookmaker()
{
	foreach (ACES_MIXED_POST_TYPES as $post_type) {
		// regisster meta fields
		register_post_meta($post_type, 'main_bonus_for_casino', array(
			'show_in_rest' => true,
			'type' => 'integer',
			'single' => true,
			'sanitize_callback' => 'sanitize_text_field',
			'auth_callback' => function () {
				return current_user_can('edit_posts');
			}
		));

		register_post_meta($post_type, 'main_licence_for_casino', array(
			'show_in_rest' => true,
			'type' => 'integer',
			'single' => true,
			'auth_callback' => function () {
				return current_user_can('edit_posts');
			}
		));
	}
}

/*  Display the Relationship of the Casino/Bookmaker and Bonuses Start  */

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
		ACES_MIXED_POST_TYPES,
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
				<option value="" <?php selected($value,  ""); ?>><?= __('From default bonus category', 'aces') ?></option>
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








///////////////////////////////////////////////

/*  Casinos/Bookmakers - Short Description Start */

add_action('admin_init', 'aces_organizations_short_fields');

function aces_organizations_short_fields()
{
	add_meta_box(
		'aces_organizations_short_meta_box',
		esc_html__('Short Description', 'aces'),
		'aces_organizations_short_display_meta_box',
		ACES_MIXED_POST_TYPES,
		'normal',
		'high'
	);
}

function aces_organizations_short_display_meta_box($casino)
{

	wp_nonce_field('aces_organizations_short_box', 'aces_organizations_short_nonce');

	$casino_short_desc = get_post_meta($casino->ID, 'casino_short_desc', false);

	$editor_args = array(
		'tinymce'       => array(
			'toolbar1'  => 'bold,italic,underline,bullist,numlist,link,unlink,undo,redo'
		),
		'quicktags'     => array(
			'buttons'   => 'em,strong,link,ul,li,ol,close'
		),
		'media_buttons' => false,
		'textarea_rows' => 4
	);
	?>

	<div class="components-base-control casino_short_desc">
		<div class="components-base-control__field">
			<?php
			if (empty($casino_short_desc[0])) {
				$casino_short_desc[0] = '';
			}
			wp_editor($casino_short_desc[0], 'casino_short_desc', $editor_args);
			?>
		</div>
	</div>

<?php
}

add_action('save_post', 'aces_organizations_short_save_fields', 10, 2);

function aces_organizations_short_save_fields($post_id)
{

	if (!isset($_POST['aces_organizations_short_nonce'])) {
		return $post_id;
	}

	$nonce = $_POST['aces_organizations_short_nonce'];

	if (!wp_verify_nonce($nonce, 'aces_organizations_short_box')) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if ('casino' == $_POST['post_type'] || 'bookmaker' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	}

	$casino_short_desc = $_POST['casino_short_desc'];
	update_post_meta($post_id, 'casino_short_desc', $casino_short_desc);
}

/*  Casinos - Short Description End */

/*  Casinos - Promotional Description Start */

add_action('admin_init', 'aces_organizations_promo_fields');

function aces_organizations_promo_fields()
{
	add_meta_box(
		'aces_organizations_promo_meta_box',
		esc_html__('Promotional Description', 'aces'),
		'aces_organizations_promo_display_meta_box',
		ACES_MIXED_POST_TYPES,
		'normal',
		'high'
	);
}

function aces_organizations_promo_display_meta_box($casino)
{

	wp_nonce_field('aces_organizations_promo_box', 'aces_organizations_promo_nonce');

	$casino_terms_desc = get_post_meta($casino->ID, 'casino_terms_desc', false);

	$editor_args = array(
		'tinymce'       => array(
			'toolbar1'  => 'bold,italic,underline,bullist,numlist,link,unlink,undo,redo'
		),
		'quicktags'     => array(
			'buttons'   => 'em,strong,link,ul,li,ol,close'
		),
		'media_buttons' => false,
		'textarea_rows' => 6
	);
?>

	<div class="components-base-control casino_terms_desc">
		<div class="components-base-control__field">
			<?php
			if (empty($casino_terms_desc[0])) {
				$casino_terms_desc[0] = '';
			}
			wp_editor($casino_terms_desc[0], 'casino_terms_desc', $editor_args);
			?>
		</div>
	</div>

<?php
}

add_action('save_post', 'aces_organizations_promo_save_fields', 10, 2);

function aces_organizations_promo_save_fields($post_id)
{

	if (!isset($_POST['aces_organizations_promo_nonce'])) {
		return $post_id;
	}

	$nonce = $_POST['aces_organizations_promo_nonce'];

	if (!wp_verify_nonce($nonce, 'aces_organizations_promo_box')) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if ('casino' == $_POST['post_type'] || 'bookmaker' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	}

	$casino_terms_desc = $_POST['casino_terms_desc'];
	update_post_meta($post_id, 'casino_terms_desc', $casino_terms_desc);
}

/*  Casinos - Promotional Description End */

/*  Casinos - Detailed T&Cs Start */

add_action('admin_init', 'aces_casinos_detailed_tc_fields');

function aces_casinos_detailed_tc_fields()
{
	add_meta_box(
		'aces_casinos_detailed_tc_meta_box',
		esc_html__('Detailed T&Cs', 'aces'),
		'aces_casinos_detailed_tc_display_meta_box',
		ACES_MIXED_POST_TYPES,
		'normal',
		'high'
	);
}

function aces_casinos_detailed_tc_display_meta_box($casino)
{

	wp_nonce_field('aces_casinos_detailed_tc_box', 'aces_casinos_detailed_tc_nonce');

	$custom = get_post_custom($casino->ID);
	$casino_detailed_tc = get_post_meta($casino->ID, 'casino_detailed_tc', false);
	$aces_organization_popup_hide = isset($custom["aces_organization_popup_hide"][0]) ? stripslashes($custom["aces_organization_popup_hide"][0]) : '';
	$aces_organization_popup_title = get_post_meta($casino->ID, 'aces_organization_popup_title', true);

	$editor_args = array(
		'tinymce'       => array(
			'toolbar1'  => 'bold,italic,underline,bullist,numlist,link,unlink,undo,redo'
		),
		'quicktags'     => array(
			'buttons'   => 'em,strong,link,ul,li,ol,close'
		),
		'media_buttons' => false,
		'textarea_rows' => 6
	);
?>

	<div class="components-base-control casino_detailed_tc">
		<div class="components-base-control__field" style="padding-bottom: 30px;">
			<?php
			if (empty($casino_detailed_tc[0])) {
				$casino_detailed_tc[0] = '';
			}
			wp_editor($casino_detailed_tc[0], 'casino_detailed_tc', $editor_args);
			?>
		</div>
	</div>

	<div class="components-base-control aces_organization_popup_hide" style="padding: 5px 0 10px 0;">
		<div class="components-base-control__field">
			<input type="checkbox" name="aces_organization_popup_hide" <?php if ($aces_organization_popup_hide == true) { ?>checked="checked" <?php } ?> /> <?php esc_html_e('Hide the Detailed T&Cs in a popup box', 'aces') ?>
		</div>
	</div>

	<div class="components-base-control aces_organization_popup_title">
		<div class="components-base-control__field">
			<label class="components-base-control__label" for="aces_organization_popup_title-0"><?php esc_html_e('Custom link title for the', 'aces'); ?> <strong><?php esc_html_e('popup box', 'aces'); ?></strong></label>
			<input type="text" name="aces_organization_popup_title" id="aces_organization_popup_title-0" value="<?php echo esc_attr($aces_organization_popup_title); ?>" style="display: block; margin-top: 5px;" />
		</div>
	</div>

<?php
}

add_action('save_post', 'aces_casinos_detailed_tc_save_fields', 10, 2);

function aces_casinos_detailed_tc_save_fields($post_id)
{

	if (!isset($_POST['aces_casinos_detailed_tc_nonce'])) {
		return $post_id;
	}

	$nonce = $_POST['aces_casinos_detailed_tc_nonce'];

	if (!wp_verify_nonce($nonce, 'aces_casinos_detailed_tc_box')) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if ('casino' == $_POST['post_type'] || 'bookmaker' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	}

	$casino_detailed_tc = $_POST['casino_detailed_tc'];
	update_post_meta($post_id, 'casino_detailed_tc', $casino_detailed_tc);

	$aces_organization_popup_hide = sanitize_text_field($_POST['aces_organization_popup_hide']);
	update_post_meta($post_id, 'aces_organization_popup_hide', $aces_organization_popup_hide);

	$aces_organization_popup_title = sanitize_text_field($_POST['aces_organization_popup_title']);
	update_post_meta($post_id, 'aces_organization_popup_title', $aces_organization_popup_title);
}

/*  Casinos - Detailed T&Cs End */

/*  Casinos - Ratings Start */

add_action('admin_init', 'aces_casinos_ratings_fields');

function aces_casinos_ratings_fields()
{

	add_meta_box(
		'aces_casinos_ratings_meta_box',
		esc_html__('Item Ratings', 'aces'),
		'aces_casinos_ratings_display_meta_box',
		ACES_MIXED_POST_TYPES,
		'normal',
		'high'
	);
}

function aces_casinos_ratings_display_meta_box($casino)
{

	wp_nonce_field('aces_casinos_ratings_box', 'aces_casinos_ratings_nonce');
	$meta = get_post_meta($casino->ID);

	$casino_rating_enable = isset($meta['casino_rating_enable'][0]) ? $meta['casino_rating_enable'][0] == 1 : false;

	$casino_rating_trust = (isset($meta['casino_rating_trust'][0]) && '' !== $meta['casino_rating_trust'][0]) ? $meta['casino_rating_trust'][0] : '';
	$casino_rating_games = (isset($meta['casino_rating_games'][0]) && '' !== $meta['casino_rating_games'][0]) ? $meta['casino_rating_games'][0] : '';
	$casino_rating_bonus = (isset($meta['casino_rating_bonus'][0]) && '' !== $meta['casino_rating_bonus'][0]) ? $meta['casino_rating_bonus'][0] : '';
	$casino_rating_customer = (isset($meta['casino_rating_customer'][0]) && '' !== $meta['casino_rating_customer'][0]) ? $meta['casino_rating_customer'][0] : '';

	// Get the number of stars in the rating

	if (get_option('aces_rating_stars_number')) {
		$rating_stars_number_value = get_option('aces_rating_stars_number');
	} else {
		$rating_stars_number_value = '5';
	}

?>

	<style type="text/css">
		.aces-single-rating-box {
			padding-bottom: 10px;
		}

		.aces-single-rating-box label {
			padding-right: 12px;
		}

		.aces-single-rating-box label:last-child {
			padding-right: 0;
		}

		.aces-single-rating-box label input[type=radio] {
			margin-right: 0 !important;
		}
	</style>

	<div class="components-base-control casino_rating_enable">
		<div class="components-base-control__field" style="padding: 16px 0;">
			<label class="components-base-control__label">

				<input type="checkbox" name="casino_rating_enable" value="1" <?php checked($casino_rating_enable); ?>>
				<?php esc_html_e('Enable Rating', 'aces'); ?>
			</label>
		</div>
	</div>

	<div class="components-base-control casino_rating_trust">
		<div class="components-base-control__field">
			<label class="components-base-control__label">
				<?php
				$rating_1_title = get_option('rating_1');
				if ($rating_1_title) {
					echo esc_html($rating_1_title);
				} else {
					esc_html_e('Trust & Fairness', 'aces');
				} ?>
			</label>
			<div class="aces-single-rating-box">
				<?php
				for ($i = 1; $i <= $rating_stars_number_value; $i++) {
				?>
					<label>
						<input type="radio" name="casino_rating_trust" value="<?php esc_attr_e($i); ?>" <?php checked($casino_rating_trust, $i); ?>>
						<?php esc_attr_e($i); ?>
					</label>
				<?php
				}
				?>
			</div>
		</div>
	</div>

	<div class="components-base-control casino_rating_games">
		<div class="components-base-control__field">
			<label class="components-base-control__label">
				<?php
				$rating_2_title = get_option('rating_2');
				if ($rating_2_title) {
					echo esc_html($rating_2_title);
				} else {
					esc_html_e('Games & Software', 'aces');
				} ?>
			</label>
			<div class="aces-single-rating-box">
				<?php
				for ($i = 1; $i <= $rating_stars_number_value; $i++) {
				?>
					<label>
						<input type="radio" name="casino_rating_games" value="<?php esc_attr_e($i); ?>" <?php checked($casino_rating_games, $i); ?>>
						<?php esc_attr_e($i); ?>
					</label>
				<?php
				}
				?>
			</div>
		</div>
	</div>

	<div class="components-base-control casino_rating_bonus">
		<div class="components-base-control__field">
			<label class="components-base-control__label">
				<?php
				$rating_3_title = get_option('rating_3');
				if ($rating_3_title) {
					echo esc_html($rating_3_title);
				} else {
					esc_html_e('Bonuses & Promotions', 'aces');
				} ?>
			</label>
			<div class="aces-single-rating-box">
				<?php
				for ($i = 1; $i <= $rating_stars_number_value; $i++) {
				?>
					<label>
						<input type="radio" name="casino_rating_bonus" value="<?php esc_attr_e($i); ?>" <?php checked($casino_rating_bonus, $i); ?>>
						<?php esc_attr_e($i); ?>
					</label>
				<?php
				}
				?>
			</div>
		</div>
	</div>

	<div class="components-base-control casino_rating_customer">
		<div class="components-base-control__field">
			<label class="components-base-control__label">
				<?php
				$rating_4_title = get_option('rating_4');
				if ($rating_4_title) {
					echo esc_html($rating_4_title);
				} else {
					esc_html_e('Customer Support', 'aces');
				} ?>
			</label>
			<div class="aces-single-rating-box">
				<?php
				for ($i = 1; $i <= $rating_stars_number_value; $i++) {
				?>
					<label>
						<input type="radio" name="casino_rating_customer" value="<?php esc_attr_e($i); ?>" <?php checked($casino_rating_customer, $i); ?>>
						<?php esc_attr_e($i); ?>
					</label>
				<?php
				}
				?>
			</div>
		</div>
	</div>

<?php
}

add_action('save_post', 'aces_casinos_ratings_save_fields', 10, 2);

function aces_casinos_ratings_save_fields($post_id)
{

	if (!isset($_POST['aces_casinos_ratings_nonce'])) {
		return $post_id;
	}

	$nonce = $_POST['aces_casinos_ratings_nonce'];

	if (!wp_verify_nonce($nonce, 'aces_casinos_ratings_box')) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if ('casino' == $_POST['post_type'] || 'bookmaker' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	}

	if (isset($_POST['casino_rating_trust'])) {
		update_post_meta($post_id, 'casino_rating_trust', sanitize_text_field(wp_unslash($_POST['casino_rating_trust'])));
	}

	if (isset($_POST['casino_rating_games'])) {
		update_post_meta($post_id, 'casino_rating_games', sanitize_text_field(wp_unslash($_POST['casino_rating_games'])));
	}

	if (isset($_POST['casino_rating_bonus'])) {
		update_post_meta($post_id, 'casino_rating_bonus', sanitize_text_field(wp_unslash($_POST['casino_rating_bonus'])));
	}

	if (isset($_POST['casino_rating_customer'])) {
		update_post_meta($post_id, 'casino_rating_customer', sanitize_text_field(wp_unslash($_POST['casino_rating_customer'])));
	}

	if (isset($_POST['main_bonus_for_casino'])) {
		update_post_meta($post_id, 'main_bonus_for_casino', sanitize_text_field(wp_unslash($_POST['main_bonus_for_casino'])));
	}

	if (isset($_POST['main_licence_for_casino'])) {
		$licence = sanitize_text_field(wp_unslash($_POST['main_licence_for_casino']));

		if (!has_term($licence, 'licence', $post_id))
			$licence = "";

		update_post_meta($post_id, 'main_licence_for_casino', $licence);
	}

	update_post_meta($post_id, 'casino_rating_enable', isset($_POST['casino_rating_enable']) ? sanitize_text_field(wp_unslash($_POST['casino_rating_enable'])) == 1 : false);
	update_post_meta($post_id, 'show_license_tooltip', isset($_POST['show_license_tooltip']) ? sanitize_text_field(wp_unslash($_POST['show_license_tooltip'])) == 1 : false);
	

	if (!wp_is_post_revision($post_id)) {

		$casino_rating_trust = get_post_meta($post_id, 'casino_rating_trust', true);
		$casino_rating_games = get_post_meta($post_id, 'casino_rating_games', true);
		$casino_rating_bonus = get_post_meta($post_id, 'casino_rating_bonus', true);
		$casino_rating_customer = get_post_meta($post_id, 'casino_rating_customer', true);

		$casino_ratings_all = array(
			$casino_rating_trust,
			$casino_rating_games,
			$casino_rating_bonus,
			$casino_rating_customer
		);

		$casino_overall_rating = esc_html(array_sum($casino_ratings_all) / count($casino_ratings_all));

		if (is_float($casino_overall_rating)) {
			$casino_overall_rating = number_format($casino_overall_rating, 1);
		}

		update_post_meta($post_id, 'casino_overall_rating', $casino_overall_rating);
	}
}

/*  Casinos - Ratings End */

/*  Upload Background image of Casino single page - Start  */

function aces_casino_background_image_block()
{
	add_meta_box(
		'aces_background_image_box',
		esc_html__('Background Image', 'aces'),
		'aces_casino_background_image_block_show',
		ACES_MIXED_POST_TYPES,
		'normal',
		'core'
	);
}
add_action('admin_menu', 'aces_casino_background_image_block');

function aces_casino_background_image_block_show($casino)
{

	wp_nonce_field('aces_casino_background_box', 'aces_casino_background_nonce');
	$aces_single_casino_background_image = 'aces_single_casino_background_image';

	echo aces_background_image_uploader($aces_single_casino_background_image, get_post_meta($casino->ID, $aces_single_casino_background_image, true));
}

function aces_casino_background_image_block_save($post_id)
{

	if (!isset($_POST['aces_casino_background_nonce'])) {
		return $post_id;
	}

	$nonce = $_POST['aces_casino_background_nonce'];

	if (!wp_verify_nonce($nonce, 'aces_casino_background_box')) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if ('casino' == $_POST['post_type'] || 'bookmaker' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	}

	$aces_single_casino_background_image = 'aces_single_casino_background_image';
	update_post_meta($post_id, $aces_single_casino_background_image, sanitize_text_field($_POST[$aces_single_casino_background_image]));
}
add_action('save_post', 'aces_casino_background_image_block_save');

/*  Upload Background image of Casino single page - End  */

/*  Casinos - Additional Fields Start */

add_action('admin_init', 'aces_casinos_fields');

function aces_casinos_fields()
{
	add_meta_box(
		'aces_casinos_meta_box',
		esc_html__('Additional information', 'aces'),
		'aces_casinos_display_meta_box',
		ACES_MIXED_POST_TYPES,
		'side',
		'high'
	);
}

function aces_casinos_display_meta_box($casino)
{

	wp_nonce_field('aces_casinos_box', 'aces_casinos_nonce');
	$casino_id = get_post_custom($casino->ID);
	$casino_external_link = get_post_meta($casino->ID, 'casino_external_link', true);
	$casino_button_title = get_post_meta($casino->ID, 'casino_button_title', true);
	$casino_permalink_button_title = get_post_meta($casino->ID, 'casino_permalink_button_title', true);
	$casino_button_notice = get_post_meta($casino->ID, 'casino_button_notice', false);
	$organization_disable_details = isset($casino_id["organization_disable_details"][0]) ? stripslashes($casino_id["organization_disable_details"][0]) : '';
	$organization_disable_rating_block = isset($casino_id["organization_disable_rating_block"][0]) ? stripslashes($casino_id["organization_disable_rating_block"][0]) : '';
	$organization_disable_related_units = isset($casino_id["organization_disable_related_units"][0]) ? stripslashes($casino_id["organization_disable_related_units"][0]) : '';
	$organization_disable_related_offers = isset($casino_id["organization_disable_related_offers"][0]) ? stripslashes($casino_id["organization_disable_related_offers"][0]) : '';

	$editor_args = array(
		'tinymce'       => array(
			'toolbar1'  => 'bold,italic,underline,link,unlink,undo,redo'
		),
		'quicktags'     => array(
			'buttons'   => 'em,strong,link,close'
		),
		'media_buttons' => false,
		'textarea_rows' => 8
	);

?>

	<div class="components-base-control casino_external_link">
		<div class="components-base-control__field">
			<label class="components-base-control__label" for="casino_external_link-0"><?php esc_html_e('External URL for the', 'aces'); ?> <strong><?php esc_html_e('Play Now', 'aces'); ?></strong> <?php esc_html_e('button', 'aces'); ?></label>
			<input type="url" name="casino_external_link" id="casino_external_link-0" value="<?php echo esc_url($casino_external_link); ?>" style="display: block; margin-bottom: 10px;" />
		</div>
	</div>

	<div class="components-base-control casino_button_title">
		<div class="components-base-control__field">
			<label class="components-base-control__label" for="casino_button_title-0"><?php esc_html_e('Custom title for the', 'aces'); ?> <strong><?php esc_html_e('Play Now', 'aces'); ?></strong> <?php esc_html_e('button', 'aces'); ?></label>
			<input type="text" name="casino_button_title" id="casino_button_title-0" value="<?php echo esc_attr($casino_button_title); ?>" style="display: block; margin-bottom: 10px;" />
		</div>
	</div>

	<div class="components-base-control casino_permalink_button_title">
		<div class="components-base-control__field">
			<label class="components-base-control__label" for="casino_permalink_button_title-0"><?php esc_html_e('Custom title for the', 'aces'); ?> <strong><?php esc_html_e('Read Review', 'aces'); ?></strong> <?php esc_html_e('button', 'aces'); ?></label>
			<input type="text" name="casino_permalink_button_title" id="casino_permalink_button_title-0" value="<?php echo esc_attr($casino_permalink_button_title); ?>" style="display: block; margin-bottom: 10px;" />
		</div>
	</div>

	<div class="components-base-control casino_button_notice">
		<div class="components-base-control__field">
			<label class="components-base-control__label" for="casino_button_notice-0"><?php esc_html_e('Notification under the button', 'aces'); ?></label>
			<?php
			if (empty($casino_button_notice[0])) {
				$casino_button_notice[0] = '';
			}
			wp_editor($casino_button_notice[0], 'casino_button_notice', $editor_args);
			?>
		</div>
	</div>

	<div class="components-base-control organization_disable_details" style="padding-top:15px;">
		<div class="components-base-control__field">
			<input type="checkbox" name="organization_disable_details" <?php if ($organization_disable_details == true) { ?>checked="checked" <?php } ?> /> <?php esc_html_e('Disable Details Block', 'aces') ?>
		</div>
	</div>

	<div class="components-base-control organization_disable_rating_block" style="padding-top:15px;">
		<div class="components-base-control__field">
			<input type="checkbox" name="organization_disable_rating_block" <?php if ($organization_disable_rating_block == true) { ?>checked="checked" <?php } ?> /> <?php esc_html_e('Disable Rating Block', 'aces') ?>
		</div>
	</div>

	<?php
	$units_section_name = esc_html__('Games', 'aces');
	if (get_option('games_section_name')) {
		$units_section_name = esc_html__(get_option('games_section_name'));
	}
	?>

	<div class="components-base-control organization_disable_related_units" style="padding-top:15px;">
		<div class="components-base-control__field">
			<input type="checkbox" name="organization_disable_related_units" <?php if ($organization_disable_related_units == true) { ?>checked="checked" <?php } ?> /> <?php esc_html_e('Disable Related', 'aces') ?> <?php esc_html_e($units_section_name); ?> <?php esc_html_e('Block', 'aces') ?>
		</div>
	</div>

	<?php
	$offers_section_name = esc_html__('Bonuses', 'aces');
	if (get_option('bonuses_section_name')) {
		$offers_section_name = esc_html__(get_option('bonuses_section_name'));
	}
	?>

	<div class="components-base-control organization_disable_related_offers" style="padding-top:15px;">
		<div class="components-base-control__field">
			<input type="checkbox" name="organization_disable_related_offers" <?php if ($organization_disable_related_offers == true) { ?>checked="checked" <?php } ?> /> <?php esc_html_e('Disable Related', 'aces') ?> <?php esc_html_e($offers_section_name); ?> <?php esc_html_e('Block', 'aces') ?>
		</div>
	</div>

	<?php
}

add_action('save_post', 'aces_casinos_save_fields', 10, 2);

function aces_casinos_save_fields($post_id)
{

	if (!isset($_POST['aces_casinos_nonce'])) {
		return $post_id;
	}

	$nonce = $_POST['aces_casinos_nonce'];

	if (!wp_verify_nonce($nonce, 'aces_casinos_box')) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if ('casino' == $_POST['post_type'] || 'bookmaker' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	}

	$casino_external_link = esc_url($_POST['casino_external_link']);
	update_post_meta($post_id, 'casino_external_link', $casino_external_link);

	$casino_button_title = sanitize_text_field($_POST['casino_button_title']);
	update_post_meta($post_id, 'casino_button_title', $casino_button_title);

	$casino_button_notice = $_POST['casino_button_notice'];
	update_post_meta($post_id, 'casino_button_notice', $casino_button_notice);

	$casino_permalink_button_title = sanitize_text_field($_POST['casino_permalink_button_title']);
	update_post_meta($post_id, 'casino_permalink_button_title', $casino_permalink_button_title);

	$organization_disable_details = sanitize_text_field($_POST['organization_disable_details']);
	update_post_meta($post_id, 'organization_disable_details', $organization_disable_details);

	$organization_disable_rating_block = sanitize_text_field($_POST['organization_disable_rating_block']);
	update_post_meta($post_id, 'organization_disable_rating_block', $organization_disable_rating_block);

	$organization_disable_related_units = sanitize_text_field($_POST['organization_disable_related_units']);
	update_post_meta($post_id, 'organization_disable_related_units', $organization_disable_related_units);

	$organization_disable_related_offers = sanitize_text_field($_POST['organization_disable_related_offers']);
	update_post_meta($post_id, 'organization_disable_related_offers', $organization_disable_related_offers);
}

/*  Casinos - Additional Fields End */

/*  Display the Relationship of the Casino and Games Start  */

add_action('admin_init', 'aces_casinos_games_list');

function aces_casinos_games_list()
{

	$games_section_name = esc_html__('Games', 'aces');
	if (get_option('games_section_name')) {
		$games_section_name = esc_html__(get_option('games_section_name'));
	}

	add_meta_box(
		'aces_casinos_games_list_meta_box',
		$games_section_name,
		'aces_casinos_display_games_list_meta_box',
		ACES_MIXED_POST_TYPES,
		'side',
		'high'
	);
}

function aces_casinos_display_games_list_meta_box($post)
{
	$post_id_related = '"' . $post->ID . '"';
	$games = get_posts(
		array(
			'post_type' => 'game',
			'posts_per_page' => -1,
			'orderby' => 'post_title',
			'order' => 'ASC',
			'meta_query' => array(
				array(
					'key' => 'parent_casino',
					'value' => $post_id_related,
					'compare' => 'LIKE'
				)
			)
		)
	);

	if ($games) {
	?>
		<div style="max-height:200px; overflow-y:auto;">
			<ul>
				<?php foreach ($games as $game) { ?>
					<li><a href="<?php echo esc_url(get_permalink($game->ID)); ?>" title="<?php esc_html_e($game->post_title); ?>" target="_blank"><?php esc_html_e($game->post_title); ?></a></li>
				<?php } ?>
			</ul>
		</div>
	<?php
	} else {
		esc_html_e('No items', 'aces');
	}
}
///////////////////////////////////////////////////



/*  Add Established logo End  */


/*  Display the Relationship of the Casino and Games End  */

/////////////////////////////////////////////////////////

/** License */
function aces_main_licence()
{
	add_meta_box(
		'aces_main_licence_meta_box',
		esc_html__('Licence Settings', 'aces'),
		'aces_main_licence_display_meta_box',
		ACES_MIXED_POST_TYPES,
		'side',
		'high'
	);
}
add_action('add_meta_boxes', 'aces_main_licence');

function aces_main_licence_display_meta_box($post)
{

	$main_licence = get_post_meta($post->ID, 'main_licence_for_casino', true);
	$show_license_tooltip = get_post_meta($post->ID, 'show_license_tooltip', true);
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
		<p>
			
			<input id="show_license_tooltip_field" type="checkbox" name="show_license_tooltip" value="1" <?php checked($show_license_tooltip); ?> />
			<label for="show_license_tooltip_field"><b><?php _e('Show License Tooltip', 'aces'); ?></b></label>
			<br>
			<small>
				<span>
					<?= __("The License tooltip is shown in the hero banner", 'aces') ?>

				</span>
			</small>
		</p>
	</div>
<?php
}
