<?php

function aces_bonuses_settings_init()
{

    /*  Offers settings tab - Start  */

    /*  --- The setting sections ---  */

    add_settings_section(
        'aces_bonuses_tab_titles',
        esc_html__('Titles', 'aces'),
        'aces_bonuses_tab_titles_callback',
        'aces_bonuses_tab'
    );

    add_settings_section(
        'aces_bonuses_tab_slugs',
        esc_html__('Slugs', 'aces'),
        'aces_bonuses_tab_slugs_callback',
        'aces_bonuses_tab'
    );

    add_settings_section(
        'aces_bonuses_tab_other_settings',
        esc_html__('Other settings', 'aces'),
        'aces_bonuses_tab_other_settings_callback',
        'aces_bonuses_tab'
    );

    /*  --- Descriptions ---  */

    function aces_bonuses_tab_titles_callback($args)
    {
?>
        <p id="<?php echo esc_attr($args['id']); ?>">
            <?php esc_html_e('Here you can change the default titles.', 'aces'); ?>
        </p>
    <?php
    }

    function aces_bonuses_tab_slugs_callback($args)
    {
    ?>
        <p id="<?php echo esc_attr($args['id']); ?>">
            <?php esc_html_e('Here you can change the default slugs.', 'aces'); ?><br>
        </p>
        <div class="card">
            <p>
                <strong><?php echo esc_html('WARNING:', 'aces'); ?></strong><br>
                <?php echo esc_html('Slugs at custom post types (e.g. Bonuses) and custom taxonomies (e.g. Bonus Categories) cannot be the same.', 'aces'); ?>
                <hr>
                <em><?php esc_html_e('After saving these settings, please, go to &quot;Settings&quot; - &quot;', 'aces'); ?><strong><a href="<?php echo esc_url(admin_url('options-permalink.php')); ?>" title="<?php esc_attr_e('Permalinks', 'aces'); ?>"><?php esc_html_e('Permalinks', 'aces'); ?></a></strong><?php esc_html_e('&quot; and click the &quot;Save Changes&quot; button.', 'aces'); ?> <strong><?php esc_html_e('Only after this action, new slugs will work.', 'aces'); ?></strong></em>
            </p>
        </div>
    <?php
    }

    function aces_bonuses_tab_other_settings_callback($args)
    {
    ?>
        <p id="<?php echo esc_attr($args['id']); ?>">
            <?php esc_html_e('Other settings for offers.', 'aces'); ?>
        </p>
    <?php
    }

    /*  ----------------

    Title setting fields

    ----------------  */

    /*  --- "Bonuses" section title ---  */

    add_settings_field(
        'bonuses_section_name',
        esc_html__('The title of the &quot;Bonuses&quot; custom post type', 'aces'),
        'aces_bonuses_textfield_section_name_callback',
        'aces_bonuses_tab',
        'aces_bonuses_tab_titles',
        array(
            'id' => 'bonuses_section_name',
            'option_name' => 'bonuses_section_name'
        )
    );
    register_setting('aces_bonuses_tab', 'bonuses_section_name', 'esc_attr');

    function aces_bonuses_textfield_section_name_callback($args)
    {
        $option = esc_attr(get_option($args['option_name']));
        $id = $args['id'];
        $option_name = $args['option_name'];
    ?>
        <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Bonuses&quot;'); ?>" class="regular-text" />
    <?php
    }

    /*  --- Bonus "Categories" taxonomy title ---  */

    add_settings_field(
        'bonuses_category_title',
        esc_html__('The title of the &quot;Bonus Categories&quot; custom taxonomy', 'aces'),
        'aces_bonuses_textfield_category_title_callback',
        'aces_bonuses_tab',
        'aces_bonuses_tab_titles',
        array(
            'id' => 'bonuses_category_title',
            'option_name' => 'bonuses_category_title'
        )
    );
    register_setting('aces_bonuses_tab', 'bonuses_category_title', 'esc_attr');

    function aces_bonuses_textfield_category_title_callback($args)
    {
        $option = esc_attr(get_option($args['option_name']));
        $id = $args['id'];
        $option_name = $args['option_name'];
    ?>
        <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Categories&quot;'); ?>" class="regular-text" />
    <?php
    }

    /*  ---------------

    Slug setting fields

    ---------------  */

    /*  --- "Bonuses" section slug ---  */

    add_settings_field(
        'bonuses_section_slug',
        esc_html__('The slug of the &quot;Bonuses&quot; custom post type', 'aces'),
        'aces_bonuses_textfield_callback',
        'aces_bonuses_tab',
        'aces_bonuses_tab_slugs',
        array(
            'id' => 'bonus',
            'option_name' => 'bonuses_section_slug'
        )
    );
    register_setting('aces_bonuses_tab', 'bonuses_section_slug', 'esc_attr');

    /*  --- Bonus "Categories" taxonomy slug ---  */

    add_settings_field(
        'bonus_category_slug',
        esc_html__('The slug of the &quot;Bonus Categories&quot; custom taxonomy', 'aces'),
        'aces_bonuses_textfield_callback',
        'aces_bonuses_tab',
        'aces_bonuses_tab_slugs',
        array(
            'id' => 'bonus-category',
            'option_name' => 'bonus_category_slug'
        )
    );
    register_setting('aces_bonuses_tab', 'bonus_category_slug', 'esc_attr');

    /*  General Text Field Callback (for slugs) Start */

    function aces_bonuses_textfield_callback($args)
    {
        $option = esc_attr(get_option($args['option_name']));
        $id = $args['id'];
        $option_name = $args['option_name'];
    ?>
        <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default'); ?> &quot;<?php echo esc_attr($id); ?>&quot;" class="regular-text" />
    <?php
    }

    /*  General Text Field Callback (for slugs) End */

    /*  ----------------

    Other settings fields

    ----------------  */

    /*  --- The title "Get Bonus" button of a game ---  */

    add_settings_field(
        'bonuses_get_bonus_title',
        esc_html__('The global title of the &quot;Get Bonus&quot; button', 'aces'),
        'aces_bonuses_textfield_get_bonus_title_callback',
        'aces_bonuses_tab',
        'aces_bonuses_tab_other_settings',
        array(
            'id' => 'bonuses_get_bonus_title',
            'option_name' => 'bonuses_get_bonus_title'
        )
    );
    register_setting('aces_bonuses_tab', 'bonuses_get_bonus_title', 'esc_attr');

    function aces_bonuses_textfield_get_bonus_title_callback($args)
    {
        $option = esc_attr(get_option($args['option_name']));
        $id = $args['id'];
        $option_name = $args['option_name'];
    ?>
        <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Get Bonus&quot;'); ?>" class="regular-text" />
        <?php
    }


    add_settings_field(
        'bonuses_get_bonus_default_category',
        esc_html__('The default bonus category the for casino/bookmaker', 'aces'),
        'aces_bonuses_select_get_get_bonus_default_category_callback',
        'aces_bonuses_tab',
        'aces_bonuses_tab_other_settings',
        array(
            'id' => 'bonuses-default-category',
            'option_name' => 'bonuses_get_bonus_default_category'
        )
    );
    register_setting('aces_bonuses_tab', 'bonuses_get_bonus_default_category', 'esc_attr');

    function aces_bonuses_select_get_get_bonus_default_category_callback($args)
    {
        $option = esc_attr(get_option($args['option_name']));
        $id = $args['id'];
        $option_name = $args['option_name'];

        // Получаем все термины из таксономии "bonus_category"
        $categories = get_terms(array(
            'taxonomy' => 'bonus-category',
            'hide_empty' => false
        ));

        if (!is_wp_error($categories)) {
        ?>
            <select id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" class="regular-text">
                <option value="" <?php selected($option, ''); ?>>
                    <?php esc_html_e('Default (none)', 'aces'); ?>
                </option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo esc_attr($category->term_id); ?>" <?php selected($option, $category->term_id); ?>>
                        <?php echo esc_html($category->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <p>
                <?php esc_html_e('Default Bonus Category: This setting allows you to select a default bonus category for casinos or bookmakers. If the main bonus for a casino is not set, the first bonus from this default category associated with the casino will be used.', 'aces'); ?>
            </p>
        <?php
        } else {
        ?>
            <p><?php esc_html_e('No categories found.', 'aces'); ?></p>
<?php
        }
    }
    /*  Bonuses settings tab - End  */
}

add_action('admin_init', 'aces_bonuses_settings_init');

add_action('acf/include_fields', function () {
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_66e702828e327',
        'title' => 'Bonus',
        'fields' => array(
            array(
                'key' => 'field_66ef2dc89e20e',
                'label' => 'Currency',
                'name' => 'currency',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'USD' => 'USD',
                    'EUR' => 'EUR',
                    'JPY' => 'JPY',
                    'GBP' => 'GBP',
                    'AUD' => 'AUD',
                    'CAD' => 'CAD',
                    'CHF' => 'CHF',
                    'CNY' => 'CNY',
                    'SEK' => 'SEK',
                    'NZD' => 'NZD',
                    'MXN' => 'MXN',
                    'SGD' => 'SGD',
                    'HKD' => 'HKD',
                    'NOK' => 'NOK',
                    'KRW' => 'KRW',
                    'TRY' => 'TRY',
                    'INR' => 'INR',
                    'BRL' => 'BRL',
                    'ZAR' => 'ZAR',
                    'RUB' => 'RUB',
                    'PLN' => 'PLN',
                    'THB' => 'THB',
                    'IDR' => 'IDR',
                    'HUF' => 'HUF',
                    'CZK' => 'CZK',
                    'ILS' => 'ILS',
                    'CLP' => 'CLP',
                    'PHP' => 'PHP',
                    'AED' => 'AED',
                    'SAR' => 'SAR',
                ),
                'default_value' => false,
                'return_format' => 'value',
                'multiple' => 0,
                'allow_null' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
                'allow_custom' => 0,
                'search_placeholder' => '',
            ),
            array(
                'key' => 'field_66e70283aa0c3',
                'label' => 'Min. Deposit',
                'name' => 'min_deposit',
                'aria-label' => '',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'min' => 0,
                'max' => '',
                'placeholder' => '',
                'step' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_66e70bf5aa0c4',
                'label' => 'Max. Cashout',
                'name' => 'max_cashout',
                'aria-label' => '',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'min' => 0,
                'max' => '',
                'placeholder' => '',
                'step' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_66e70c07aa0c5',
                'label' => 'Wagering',
                'name' => 'wagering',
                'aria-label' => '',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'min' => 0,
                'max' => '',
                'placeholder' => '',
                'step' => 1,
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_66e70d8caa0c6',
                'label' => 'Safety period',
                'name' => 'safety_period',
                'aria-label' => '',
                'type' => 'number',
                'instructions' => 'Values in days',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'min' => 0,
                'max' => '',
                'placeholder' => '',
                'step' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_66e71008aa0c7',
                'label' => 'Freespins',
                'name' => 'freespins',
                'aria-label' => '',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'min' => 0,
                'max' => '',
                'placeholder' => '',
                'step' => 1,
                'prepend' => '',
                'append' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'bonus',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
        'acfe_display_title' => '',
        'acfe_autosync' => '',
        'acfe_form' => 0,
        'acfe_meta' => '',
        'acfe_note' => '',
    ));
});
