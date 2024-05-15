<?php

function aces_casinos_settings_init() {

    /*  Casinos settings tab - Start  */

    /*  --- The setting sections ---  */

    add_settings_section(
        'aces_casinos_tab_titles',
        esc_html__( 'Titles', 'aces' ),
        'aces_casinos_tab_titles_callback',
        'aces_casinos_tab'
    );

    add_settings_section(
        'aces_casinos_tab_slugs',
        esc_html__( 'Slugs', 'aces' ),
        'aces_casinos_tab_slugs_callback',
        'aces_casinos_tab'
    );

    /*  --- Descriptions ---  */

    function aces_casinos_tab_titles_callback( $args ) {
        ?>
        <p id="<?php echo esc_attr( $args['id'] ); ?>">
            <?php esc_html_e( 'Here you can change the default titles.', 'aces' ); ?>
        </p>
        <?php
    }

    function aces_casinos_tab_slugs_callback( $args ) {
        ?>
        <p id="<?php echo esc_attr( $args['id'] ); ?>">
            <?php esc_html_e( 'Here you can change the default slugs.', 'aces' ); ?><br>
        </p>
        <div class="card">
            <p>
                <strong><?php echo esc_html( 'WARNING:', 'aces' ); ?></strong><br>
                <?php echo esc_html( 'Slugs at custom post types (e.g. Casinos) and custom taxonomies (e.g. Casino Categories) cannot be the same.', 'aces' ); ?>
                <hr>
                <em><?php esc_html_e( 'After saving these settings, please, go to &quot;Settings&quot; - &quot;', 'aces' ); ?><strong><a href="<?php echo esc_url( admin_url( 'options-permalink.php' ) ); ?>" title="<?php esc_attr_e( 'Permalinks', 'aces' ); ?>"><?php esc_html_e( 'Permalinks', 'aces' ); ?></a></strong><?php esc_html_e( '&quot; and click the &quot;Save Changes&quot; button.', 'aces' ); ?> <strong><?php esc_html_e( 'Only after this action, new slugs will work.', 'aces' ); ?></strong></em>
            </p>
        </div>
        <?php
    }

    /*  ----------------

    Title setting fields

    ----------------  */

    /*  --- "Casinos" section title ---  */

    add_settings_field(
        'casinos_section_name',
        esc_html__( 'The title of the &quot;Casinos&quot; custom post type', 'aces' ),
        'aces_casinos_textfield_section_name_callback',
        'aces_casinos_tab',
        'aces_casinos_tab_titles',
        array(
            'id' => 'casinos_section_name', 
            'option_name' => 'casinos_section_name'
        )  
    );
    register_setting( 'aces_casinos_tab', 'casinos_section_name', 'esc_attr');

    function aces_casinos_textfield_section_name_callback($args) {
        $option = esc_attr(get_option($args['option_name']));
        $id = $args['id'];
        $option_name = $args['option_name'];
        ?>
        <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default &quot;Casinos&quot;'); ?>" class="regular-text" />
        <?php
    }

    /*  --- The "Categories" custom taxonomy title ---  */

    add_settings_field(
        'casinos_category_title',
        esc_html__( 'The title of the &quot;Casino Categories&quot; custom taxonomy', 'aces' ),
        'aces_casinos_textfield_category_title_callback',
        'aces_casinos_tab',
        'aces_casinos_tab_titles',
        array(
            'id' => 'casinos_category_title', 
            'option_name' => 'casinos_category_title'
        )  
    );
    register_setting( 'aces_casinos_tab', 'casinos_category_title', 'esc_attr');

    function aces_casinos_textfield_category_title_callback($args) {
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

    /*  --- "Casinos" section slug ---  */

    add_settings_field(
        'casinos_section_slug',
        esc_html__( 'The slug of the &quot;Casinos&quot; custom post type', 'aces' ),
        'aces_casinos_textfield_callback',
        'aces_casinos_tab',
        'aces_casinos_tab_slugs',
        array(
            'id' => 'casino', 
            'option_name' => 'casinos_section_slug'
        )  
    );
    register_setting( 'aces_casinos_tab', 'casinos_section_slug', 'esc_attr');

    /*  --- The "Categories" custom taxonomy slug ---  */

    add_settings_field(
        'casino_category_slug',
        esc_html__( 'The slug of the &quot;Casino Categories&quot; custom taxonomy', 'aces' ),
        'aces_casinos_textfield_callback',
        'aces_casinos_tab',
        'aces_casinos_tab_slugs',
        array(
            'id' => 'casino-category', 
            'option_name' => 'casino_category_slug'
        )  
    );
    register_setting( 'aces_casinos_tab', 'casino_category_slug', 'esc_attr');

    /*  General Text Field Callback (for slugs) Start */

    function aces_casinos_textfield_callback($args) {
        $option = esc_attr(get_option($args['option_name']));
        $id = $args['id'];
        $option_name = $args['option_name'];
        ?>
        <input type="text" id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($option_name); ?>" value="<?php echo esc_attr($option); ?>" placeholder="<?php echo esc_attr('Default'); ?> &quot;<?php echo esc_attr($id); ?>&quot;" class="regular-text" />
        <?php
    }

    /*  General Text Field Callback (for slugs) End */

    /*  Casinos settings tab - End  */

}

add_action( 'admin_init', 'aces_casinos_settings_init' );