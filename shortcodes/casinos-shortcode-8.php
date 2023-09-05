<?php
function aces_casinos_shortcode_8($atts) {
	if (apply_filters('geoip_object', '')) {
		$record = apply_filters('geoip_object', '');
		$iso_code = $record->country->isoCode;
		$country = $record->country->name;
		$flag = $record->extra->flag;
	}

	ob_start();

	// Define attributes and their defaults

	extract( shortcode_atts( array (
	    'items_number' => 5,
	    'external_link' => '',
	    'category' => '',
	    'items_id' => '',
	    'exclude_id' => '',
	    'game_id' => '',
	    'order' => '',
	    'orderby' => '',
	    'title' => ''
	), $atts ) );

	if ($iso_code) {
		$iso_code_id = get_terms(
			array(
				'taxonomy'     =>  'restricted-country',
				'meta_key'     =>  'aces_country_code',
				'meta_value'   =>  $iso_code,
				'meta_compare' =>  '=',
				'fields'       =>  'ids'
			)
		);
	}

	if ( $orderby == 'rating') {
		$orderby = 'meta_value_num';
	}

	$exclude_id_array = '';

	if ($exclude_id) {
		$exclude_id_array = explode( ',', $exclude_id );
	}

	if ($game_id) {
		
		$casino_ids = get_post_meta( $game_id, 'parent_casino', true );
		
		$args = array(
			'posts_per_page' => $items_number,
			'post_type'      => 'casino',
			'post__in'       => $casino_ids,
			'tax_query' => array(
				array(
					'taxonomy' => 'restricted-country',
					'field'    => 'term_id',
					'terms' => $iso_code_id,
                    'operator'  => 'NOT IN',
				),
			),
			'post__not_in'   => $exclude_id_array,
			'no_found_rows'  => true,
			'post_status'    => 'publish',
			'meta_key'       => 'casino_overall_rating',
			'orderby'        => 'meta_value_num',
			'order'          => $order
		);

	} else {

		if ( !empty( $category ) ) {

			$categories_id_array = explode( ',', $category );

			$args = array(
				'posts_per_page' => $items_number,
				'post_type'      => 'casino',
				'post__not_in'   => $exclude_id_array,
				'no_found_rows'  => true,
				'post_status'    => 'publish',
				'tax_query' => array(
					array(
						'taxonomy' => 'casino-category',
						'field'    => 'id',
						'terms'    => $categories_id_array
					),
					array(
						'taxonomy' => 'restricted-country',
						'field'    => 'term_id',
						'terms' => $iso_code_id,
                        'operator'  => 'NOT IN',
					),
				),
				'meta_key' => 'casino_overall_rating',
				'orderby'  => $orderby,
				'order'    => $order
			);

		} else if ( !empty( $items_id ) ) {

			$items_id_array = explode( ',', $items_id );

			$args = array(
				'posts_per_page' => $items_number,
				'post_type'      => 'casino',
				'tax_query' => array(
					array(
						'taxonomy' => 'restricted-country',
						'field'    => 'term_id',
						'terms' => $iso_code_id,
                        'operator'  => 'NOT IN',
					),
				),
				'post__in'       => $items_id_array,
				'orderby'        => 'post__in',
				'no_found_rows'  => true,
				'post_status'    => 'publish'
			);

		} else {

			$args = array(
				'posts_per_page' => $items_number,
				'post_type'      => 'casino',
				'tax_query' => array(
					array(
						'taxonomy' => 'restricted-country',
						'field'    => 'term_id',
						'terms' => $iso_code_id,
                        'operator'  => 'NOT IN',
					),
				),
				'post__not_in'   => $exclude_id_array,
				'no_found_rows'  => true,
				'post_status'    => 'publish',
				'meta_key'       => 'casino_overall_rating',
				'orderby'        => $orderby,
				'order'          => $order
			);

		}

	}

	$casino_query = new WP_Query( $args );

	if ( $casino_query->have_posts() ) {

		if ( get_option( 'aces_rating_stars_number' ) ) {
			$casino_rating_stars_number_value = get_option( 'aces_rating_stars_number' );
		} else {
			$casino_rating_stars_number_value = '5';
		}

	?>

	<div class="space-shortcode-wrap space-shortcode-11 relative">
		<div class="space-shortcode-wrap-ins relative">
		<?php

			if(class_exists('Casino_Noref_Popup'))
				echo do_shortcode('[ref_casinos_popup]');

			if ( $title ) { ?>
			<div class="space-block-title relative">
				<span><?php echo esc_html($title); ?></span>
			</div>
			<?php } ?>

			<div class="space-organizations-7-archive-items box-100 relative">
				<?php while ( $casino_query->have_posts() ) : $casino_query->the_post();
					global $post;
					$casino_allowed_html = array(
						'a' => array(
							'href' => true,
							'title' => true,
							'target' => true,
							'rel' => true
						),
						'ul' => true,
						'li' => true,
						'br' => true,
						'em' => array(),
						'strong' => true,
						'span' => array(
							'class' => true
						),
						'div' => array(
							'class' => true
						),
						'p' => array()
					);

					$casino_external_link = esc_url( get_post_meta( get_the_ID(), 'casino_external_link', true ) );
                    $casino_restricted_countries = wp_get_object_terms( get_the_ID(), 'restricted-country' );
					$casino_button_title = esc_html( get_post_meta( get_the_ID(), 'casino_button_title', true ) );
					$casino_terms_desc = wp_kses( get_post_meta( get_the_ID(), 'casino_terms_desc', true ), $casino_allowed_html );
					$casino_button_notice = wp_kses( get_post_meta( get_the_ID(), 'casino_button_notice', true ), $casino_allowed_html );
					$casino_permalink_button_title = esc_html( get_post_meta( get_the_ID(), 'casino_permalink_button_title', true ) );
					$casino_button_notice = wp_kses( get_post_meta( get_the_ID(), 'casino_button_notice', true ), $casino_allowed_html );
					$overall_rating = esc_html( get_post_meta( get_the_ID(), 'casino_overall_rating', true ) );

					$organization_detailed_tc = wp_kses( get_post_meta( get_the_ID(), 'casino_detailed_tc', true ), $casino_allowed_html );
					$organization_popup_hide = esc_attr( get_post_meta( get_the_ID(), 'aces_organization_popup_hide', true ) );
					$organization_popup_title = esc_html( get_post_meta( get_the_ID(), 'aces_organization_popup_title', true ) );

					$bonus_fields = get_field('bonus_fields');

					if ($casino_button_title) {
						$button_title = $casino_button_title;
					} else {
						if ( get_option( 'casinos_play_now_title') ) {
							$button_title = esc_html( get_option( 'casinos_play_now_title') );
						} else {
							$button_title = esc_html__( 'Play Now', 'aces' );
						}
					}

					if ($organization_popup_title) {
						$custom_popup_title = $organization_popup_title;
					} else {
						$custom_popup_title = esc_html__( 'T&Cs Apply', 'aces' );
					}

					if ($casino_permalink_button_title) {
						$permalink_button_title = $casino_permalink_button_title;
					} else {
						if ( get_option( 'casinos_read_review_title') ) {
							$permalink_button_title = esc_html( get_option( 'casinos_read_review_title') );
						} else {
							$permalink_button_title = esc_html__( 'Read Review', 'aces' );
						}
					}

					$terms = get_the_terms( $post->ID, 'casino-category' );
					?>

				<div class="space-organizations-7-archive-item box-100 relative">
					<div class="space-organizations-7-archive-item-ins relative">
						<div class="space-organizations-7-archive-item-bg box-100 relative">
							<div class="space-organizations-7-archive-item-left box-25 relative">
								<div class="space-organizations-7-archive-item-ins-pd relative">
									<div class="space-organizations-7-archive-item-logo box-100 relative">
										<div class="space-organizations-7-archive-item-logo-img relative">
											<?php
											$post_title_attr = the_title_attribute( 'echo=0' );
											if ( wp_get_attachment_image(get_post_thumbnail_id()) ) { ?>
												<a href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
													<?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'mercury-100-100', "", array( "alt" => $post_title_attr ) ); ?>
												</a>
											<?php } ?>
										</div>
										<div class="space-organizations-7-archive-item-logo-title relative">
											<div class="space-organizations-7-archive-item-logo-title-wrap box-100 relative">
												<a href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
												<div class="space-header-accepted-info box-100 relative">
													<?php
														echo $flag;
                                                        esc_html_e(
															sprintf(
																__('Users from %s are accepted', 'aces'),
																$country
															)
														)
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="space-organizations-7-archive-item-badges bbk">
									<?php if($bonus_fields && $bonus_fields['trusted']) { ?>
										<div class="trust"><?php esc_html_e('Trusted', 'aces'); ?></div>
									<? } 
									if($bonus_fields && $bonus_fields['best_for']) { ?>
									<div class="best">
										<img role="img" class="emoji" alt="🔥" src="https://s.w.org/images/core/emoji/13.1.0/svg/1f525.svg">
										<?php echo esc_html($bonus_fields['best_for']); ?>
									</div>
									<?php } ?>
								</div>
							</div>
							<div class="space-organizations-7-archive-item-central box-45 relative">
								<div class="space-organizations-7-archive-item-ins-pd relative">
									<?php if($bonus_fields && $bonus_fields['bonus_title']) { ?>
										<div class="space-organizations-7-archive-item-bonus">
											<strong><?php echo ($bonus_fields['bonus_title']); ?></strong>
										</div>
									<?php } ?>	
									<div class="space-organizations-7-archive-item-terms box-100 relative">
										<?php if ($casino_terms_desc) {
											echo wp_kses( $casino_terms_desc, $casino_allowed_html );
										} ?>
									</div>
								</div>
							</div>
							<div class="space-organizations-7-archive-item-right box-30 relative">
								<div class="space-organizations-7-archive-item-ins-pd relative">
									<div class="space-organizations-7-archive-item-buttons box-100 relative">
										<div class="space-organizations-7-archive-item-buttons-left text-center relative">

											<?php if( function_exists('aces_star_rating') ){ ?>
												<div class="space-organizations-7-archive-item-rating relative">
													<div class="space-rating-star-wrap relative">
														<div class="space-rating-star-background absolute"></div>
														<div class="space-rating-star-icon absolute">
															<i class="fas fa-star"></i>
														</div>
													</div>
													<strong><?php echo esc_html( number_format( round( $overall_rating, 1 ), 1, '.', ',') ); ?></strong>/<?php echo esc_html( $casino_rating_stars_number_value ); ?>
												</div>
											<?php } ?>

											<div class="space-organizations-7-archive-item-button-one box-100 relative">
												<a href="<?php echo get_the_permalink(); ?>" title="<?php echo esc_attr( $permalink_button_title ); ?>"><?php echo esc_html( $permalink_button_title ); ?></a>
											</div>
										</div>
										<div class="space-organizations-7-archive-item-buttons-right text-center relative">
											<div class="space-organizations-7-archive-item-button-two box-100 relative">
												<?php if(empty($casino_external_link) || $casino_external_link == '#') : ?>
													<a href="#" onclick="noRefPopup(event)" title="<?php echo esc_attr( $button_title ); ?>"><?php echo esc_html( $button_title ); ?></a>
												<?php else: ?>
													<a href="<?php echo esc_attr($casino_external_link); ?>" title="<?php echo esc_attr( $button_title ); ?>" <?php if ($external_link) { ?>target="_blank" rel="nofollow"<?php } ?>><?php echo esc_html( $button_title ); ?></a>
												<?php endif; ?>
											</div>

											<?php if ($organization_popup_hide == true ) { ?>
												<div class="space-organization-header-button-notice relative" style="margin-top: 5px;">
													<span class="tc-apply"><?php echo esc_html( $custom_popup_title ); ?></span>
													<div class="tc-desc">
														<?php
															if ($organization_detailed_tc) {
																echo wp_kses( $organization_detailed_tc, $casino_allowed_html );
															}
														?>
													</div>
												</div>
											<?php } ?>

											<?php if ($casino_button_notice) { ?>
												<div class="space-organizations-7-archive-item-button-notice box-100 relative" style="margin-top: 5px;">
													<?php echo wp_kses( $casino_button_notice, $casino_allowed_html ); ?>
												</div>
											<?php }

											if ($bonus_fields) { ?>
												<a class="bonus-more" href="javascript:void(0);">
													<i class="fas fa-chevron-down"></i>
												</a>
											<?php } ?>

										</div>
									</div>
								</div>
							</div>
						</div>

						<?php
							if ($bonus_fields) {
						?>

						<div class="bonus-content hide">
							<?php if ($bonus_fields['bonus_description']) { ?>
								<div class="bonus-desc">
									<?php echo $bonus_fields['bonus_description']; ?>
								</div>
							<?php } ?>
							<div class="bonus-features <?php echo $bonus_fields['bonus_description'] ? '' : 'no-desc'; ?>">
								<div><i class="fas fa-user"></i><strong><?php esc_html_e('For whom:', 'aces'); ?> </strong><?php esc_html_e($bonus_fields['for_whom'], 'aces'); ?></div>
								<div><i class="fas fa-dice"></i><strong><?php esc_html_e('Form:', 'aces'); ?> </strong><?php esc_html_e($bonus_fields['form'], 'aces'); ?></div>
								<div><i class="fas fa-percent"></i><strong><?php esc_html_e('Type:', 'aces'); ?> </strong><?php esc_html_e($bonus_fields['type'], 'aces'); ?></div>
								<div><i class="fas fa-clipboard"></i><strong><?php esc_html_e('Term:', 'aces'); ?> </strong><?php esc_html_e($bonus_fields['term'], 'aces'); ?></div>
								<div><i class="fas fa-thumbs-up"></i><strong><?php esc_html_e('Best bonus:', 'aces'); ?> </strong><?php esc_html_e($bonus_fields['best_bonus'], 'aces'); ?></div>
								<div><i class="fas fa-wallet"></i><strong><?php esc_html_e('Cashback:', 'aces'); ?> </strong><?php esc_html_e($bonus_fields['cashback'], 'aces'); ?></div>
								<div><i class="fas fa-gift"></i><strong><?php esc_html_e('Birthday bonus:', 'aces'); ?> </strong><?php esc_html_e($bonus_fields['birthday_bonus'], 'aces'); ?></div>
							</div>
						</div>

						<?php }
						if ($organization_popup_hide == true ) {

						} else {
							if ($organization_detailed_tc) { ?>
						<div class="space-organizations-archive-item-detailed-tc box-100 relative">
							<div class="space-organizations-archive-item-detailed-tc-ins relative" style="padding-top: 5px;">
								<?php echo wp_kses( $organization_detailed_tc, $casino_allowed_html ); ?>
							</div>
						</div>
						<?php
							}
						}
						?>

					</div>
				</div>

				<?php endwhile; ?>
				
			</div>

		</div>
	</div>

<?php
wp_reset_postdata();
$casino_items = ob_get_clean();
return $casino_items;
}

}
 
add_shortcode('aces-casinos-8', 'aces_casinos_shortcode_8');