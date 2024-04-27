<?php

function aces_bookmakers_settings_init() {

    /*  Bookmakers settings tab - Start  */

    /*  --- The setting sections ---  */

    add_settings_section(
        'aces_bookmakers_tab_titles',
        esc_html__( 'Titles', 'aces' ),
        'aces_bookmakers_tab_titles_callback',
        'aces_bookmakers_tab'
    );

    add_settings_section(
        'aces_bookmakers_tab_slugs',
        esc_html__( 'Slugs', 'aces' ),
        'aces_bookmakers_tab_slugs_callback',
        'aces_bookmakers_tab'
    );

    /*  --- Descriptions ---  */

    function aces_bookmakers_tab_titles_callback( $args ) {
        ?>
        <p id="<?php echo esc_attr( $args['id'] ); ?>">
            <?php esc_html_e( 'Here you can change the default titles.', 'aces' ); ?>
        </p>
        <?php
    }

    function aces_bookmakers_tab_slugs_callback( $args ) {
        ?>
        <p id="<?php echo esc_attr( $args['id'] ); ?>">
            <?php esc_html_e( 'Here you can change the default slugs.', 'aces' ); ?><br>
        </p>
        <div class="card">
            <p>
                <strong><?php echo esc_html( 'WARNING:', 'aces' ); ?></strong><br>
                <?php echo esc_html( 'Slugs at custom post types (e.g. Bookmakers) and custom taxonomies (e.g. Bookmaker Categories) cannot be the same.', 'aces' ); ?>
                <hr>
                <em><?php esc_html_e( 'After saving these settings, please, go to &quot;Settings&quot; - &quot;', 'aces' ); ?><strong><a href="<?php echo esc_url( admin_url( 'options-permalink.php' ) ); ?>" title="<?php esc_attr_e( 'Permalinks', 'aces' ); ?>"><?php esc_html_e( 'Permalinks', 'aces' ); ?></a></strong><?php esc_html_e( '&quot; and click the &quot;Save Changes&quot; button.', 'aces' ); ?> <strong><?php esc_html_e( 'Only after this action, new slugs will work.', 'aces' ); ?></strong></em>
            </p>
        </div>
        <?php
    }

    /*  ----------------

    Title setting fields

    ----------------  */

    /*  --- "Bookmakers" section title ---  */

    add_settings_field(
        'bookmakers_section_name',
        esc_html__( 'The title of the &quot;Bookmakers&quot; custom post type', 'aces' ),
        'aces_bookmakers_textfield_section_name_callback',
        'aces_bookmakers_tab',
        'aces_bookmakers_tab_titles',
        array(
            'id' => 'bookmakers_section_name', 
            'option_name' => 'bookmakers_section_name'
        )  
    );
    register_setting( 'aces_bookmakers_tab', 'bookmakers_section_name', 'esc_attr');

    function aces_bookmakers_textfield_section_name_callback($args) {
        $option = esc_attr(get_option($args['option_name']));
        $id = $args['id'];
        $option_name = $args['option_name'];
        ?>
        <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Bookmakers&quot;'); ?>" class="regular-text" />
        <?php
    }

    /*  --- The "Categories" custom taxonomy title ---  */

    add_settings_field(
        'bookmakers_category_title',
        esc_html__( 'The title of the &quot;Bookmaker Categories&quot; custom taxonomy', 'aces' ),
        'aces_bookmakers_textfield_category_title_callback',
        'aces_bookmakers_tab',
        'aces_bookmakers_tab_titles',
        array(
            'id' => 'bookmakers_category_title', 
            'option_name' => 'bookmakers_category_title'
        )  
    );
    register_setting( 'aces_bookmakers_tab', 'bookmakers_category_title', 'esc_attr');

    function aces_bookmakers_textfield_category_title_callback($args) {
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

    /*  --- "Bookmakers" section slug ---  */

    add_settings_field(
        'bookmakers_section_slug',
        esc_html__( 'The slug of the &quot;Bookmakers&quot; custom post type', 'aces' ),
        'aces_bookmakers_textfield_callback',
        'aces_bookmakers_tab',
        'aces_bookmakers_tab_slugs',
        array(
            'id' => 'bookmaker', 
            'option_name' => 'bookmakers_section_slug'
        )  
    );
    register_setting( 'aces_bookmakers_tab', 'bookmakers_section_slug', 'esc_attr');

    /*  --- The "Categories" custom taxonomy slug ---  */

    add_settings_field(
        'bookmaker_category_slug',
        esc_html__( 'The slug of the &quot;Bookmaker Categories&quot; custom taxonomy', 'aces' ),
        'aces_bookmakers_textfield_callback',
        'aces_bookmakers_tab',
        'aces_bookmakers_tab_slugs',
        array(
            'id' => 'bookmaker-category', 
            'option_name' => 'bookmaker_category_slug'
        )  
    );
    register_setting( 'aces_bookmakers_tab', 'bookmaker_category_slug', 'esc_attr');

    /*  General Text Field Callback (for slugs) Start */

    function aces_bookmakers_textfield_callback($args) {
        $option = esc_attr(get_option($args['option_name']));
        $id = $args['id'];
        $option_name = $args['option_name'];
        ?>
        <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default'); ?> &quot;<?php echo esc_attr($id); ?>&quot;" class="regular-text" />
        <?php
    }

    /*  General Text Field Callback (for slugs) End */

    /*  Bookmakers settings tab - End  */

}

add_action( 'admin_init', 'aces_bookmakers_settings_init' );