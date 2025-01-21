<?php

function aces_rating_shortcode_4($atts)
{

	ob_start();

	// Define attributes and their defaults

	extract(
		shortcode_atts(
			array(
				'item_id' => '',
				'hide_ratings' => '',
			),
			$atts
		)
	);

	if (empty($item_id)) {
		$item_id = get_the_ID();
	}

	$organization_rating_trust = esc_html(get_post_meta($item_id, 'casino_rating_trust', true));
	$organization_rating_games = esc_html(get_post_meta($item_id, 'casino_rating_games', true));
	$organization_rating_bonus = esc_html(get_post_meta($item_id, 'casino_rating_bonus', true));
	$organization_rating_customer = esc_html(get_post_meta($item_id, 'casino_rating_customer', true));
	$organization_overall_rating = esc_html(get_post_meta($item_id, 'casino_overall_rating', true));

	if (get_option('aces_rating_stars_number')) {
		$organization_rating_stars_number_value = get_option('aces_rating_stars_number');
	} else {
		$organization_rating_stars_number_value = '5';
	}
?>

	<div class="organization-rating">
		<header class="organization-rating__header">
			<h2 class="organization-rating__title"><?= __('Overall Rating', 'mercury-child') ?></h2>
			<div class="organization-rating__or">
				<i class="icon-star-fill star-rating star-rating--full organization-rating__or-star" aria-hidden="true"></i>
				<div class="organization-rating__or-value">
					<?php echo esc_html(number_format(round($organization_overall_rating, 1), 1, '.', ',')); ?>
				</div>
			</div>
		</header>
		<div class="organization-rating__list">
			<?php if ($organization_rating_trust) { ?>
				<div class="organization-rating__item">
					<label class="organization-rating__item-title">
						<?php
						$rating_1_title = get_option('rating_1');
						if ($rating_1_title) {
							echo esc_html($rating_1_title);
						} else {
							esc_html_e('Trust & Fairness', 'mercury-child');
						} ?>
					</label>
					<div class="organization-rating__item-stars">
						<?php if (function_exists('aces_star_rating')) {
							aces_star_rating(
								array(
									'rating' => $organization_rating_trust,
									'type' => 'rating',
									'stars_number' => $organization_rating_stars_number_value
								)
							);
						} ?>
						<div class="organization-rating__item-value">
							<?php echo esc_html(number_format(round($organization_rating_trust, 1), 1, '.', ',')); ?>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php if ($organization_rating_games) { ?>
				<div class="organization-rating__item">
					<label class="organization-rating__item-title">
						<?php
						$rating_2_title = get_option('rating_2');
						if ($rating_2_title) {
							echo esc_html($rating_2_title);
						} else {
							esc_html_e('Games & Software', 'mercury-child');
						} ?>
					</label>
					<div class="organization-rating__item-stars">
						<?php if (function_exists('aces_star_rating')) {
							aces_star_rating(
								array(
									'rating' => $organization_rating_games,
									'type' => 'rating',
									'stars_number' => $organization_rating_stars_number_value
								)
							);
						} ?>
						<div class="organization-rating__item-value">
							<?php echo esc_html(number_format(round($organization_rating_games, 1), 1, '.', ',')); ?>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php if ($organization_rating_bonus) { ?>
				<div class="organization-rating__item">
					<label class="organization-rating__item-title">
						<?php
						$rating_3_title = get_option('rating_3');
						if ($rating_3_title) {
							echo esc_html($rating_3_title);
						} else {
							esc_html_e('Bonuses & Promotions', 'mercury-child');
						} ?>
					</label>
					<div class="organization-rating__item-stars">
						<?php if (function_exists('aces_star_rating')) {
							aces_star_rating(
								array(
									'rating' => $organization_rating_bonus,
									'type' => 'rating',
									'stars_number' => $organization_rating_stars_number_value
								)
							);
						} ?>
						<div class="organization-rating__item-value">
							<?php echo esc_html(number_format(round($organization_rating_bonus, 1), 1, '.', ',')); ?>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php if ($organization_rating_customer) { ?>
				<div class="organization-rating__item">
					<label class="organization-rating__item-title">
						<?php
						$rating_4_title = get_option('rating_4');
						if ($rating_4_title) {
							echo esc_html($rating_4_title);
						} else {
							esc_html_e('Customer Support', 'mercury-child');
						} ?>
					</label>
					<div class="organization-rating__item-stars">
						<?php if (function_exists('aces_star_rating')) {
							aces_star_rating(
								array(
									'rating' => $organization_rating_customer,
									'type' => 'rating',
									'stars_number' => $organization_rating_stars_number_value
								)
							);
						} ?>
						<div class="organization-rating__item-value">
							<?php echo esc_html(number_format(round($organization_rating_customer, 1), 1, '.', ',')); ?>
						</div>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>

<?php

	wp_reset_postdata();
	$aces_organization_rating = ob_get_clean();
	return $aces_organization_rating;
}

add_shortcode('aces-rating-4', 'aces_rating_shortcode_4');
