<?php
function sc_instafeed_settings_init(  ) { 

    register_setting( 'sc_instafeed', 'sc_instafeed_settings' );

        add_settings_section(
            'sc_instafeed_sc_instafeed_section', 
            __( 'General configuration', 'scinstafeed' ), 
            'sc_instafeed_settings_section_callback', 
            'sc_instafeed'
        );

        // clientID
        add_settings_field( 
            'clientid', 
            __( 'Client ID (Instagram`s API) * Required', 'scinstafeed' ), 
            'sc_instafeed_clientid_render', 
            'sc_instafeed', 
            'sc_instafeed_sc_instafeed_section' 
        );

        // resolution
        add_settings_field( 
            'resolution', 
            __( 'Image Resolution', 'scinstafeed' ), 
            'sc_instafeed_resolution_render', 
            'sc_instafeed', 
            'sc_instafeed_sc_instafeed_section' 
        );

        // get
        add_settings_field( 
            'get', 
            __( 'Content type to get', 'scinstafeed' ), 
            'sc_instafeed_get_render', 
            'sc_instafeed', 
            'sc_instafeed_sc_instafeed_section' 
        );

        // tag
        add_settings_field( 
            'tag', 
            __( 'Tag to filter', 'scinstafeed' ), 
            'sc_instafeed_tag_render', 
            'sc_instafeed', 
            'sc_instafeed_sc_instafeed_section' 
        );

        // limit
        add_settings_field( 
            'limit', 
            __( 'Max Number of Images - (Only Numbers from 1 to 60)', 'scinstafeed' ), 
            'sc_instafeed_limit_render', 
            'sc_instafeed', 
            'sc_instafeed_sc_instafeed_section' 
        );

        // sortBy
        add_settings_field( 
            'sortBy', 
            __( 'Sort images by', 'scinstafeed' ), 
            'sc_instafeed_sortby_render', 
            'sc_instafeed', 
            'sc_instafeed_sc_instafeed_section' 
        );

        // custom CSS
        add_settings_field( 
            'custom_css', 
            __( 'Custom CSS (for developers)', 'scinstafeed' ), 
            'sc_instafeed_custom_css_render', 
            'sc_instafeed', 
            'sc_instafeed_sc_instafeed_section' 
        );


}

// clientid
function sc_instafeed_clientid_render(  ) { 

    $options = get_option( 'sc_instafeed_settings' ); ?>
    <input type="text" name="sc_instafeed_settings[clientid]" value="<?php echo $options['clientid']; ?>" placeholder="f0as8gfas98d7gas98f7gas0d87as" required> <?php

}

// resolution
function sc_instafeed_resolution_render(  ) { 

    $options = get_option( 'sc_instafeed_settings' ); ?>
    <select name='sc_instafeed_settings[resolution]'>
        <option value='thumbnail' <?php selected( $options['resolution'], 'thumbnail' ); ?>><?php echo __('Thumbnail (150x150)', 'scinstafeed'); ?></option>
        <option value='low_resolution' <?php selected( $options['resolution'], 'low_resolution' ); ?>><?php echo __('Low Resolution (306x306)', 'scinstafeed'); ?></option>
        <option value='standard_resolution' <?php selected( $options['resolution'], 'standard_resolution' ); ?>><?php echo __('Standard (612x612)', 'scinstafeed'); ?></option>
    </select> <?php

}

// content type to get from instagram
function sc_instafeed_get_render(  ) { 

    $options = get_option( 'sc_instafeed_settings' ); ?>
    <select name='sc_instafeed_settings[get]'>
        <option value='popular' <?php selected( $options['get'], 'popular' ); ?>><?php echo __('Popular', 'scinstafeed'); ?></option>
        <option value='tagged' <?php selected( $options['get'], 'tagged' ); ?>><?php echo __('Tagged', 'scinstafeed'); ?></option>
        <?/*<option value='location' <?php selected( $options['get'], 'location' ); ?>><?php echo __('Location', 'scinstafeed'); ?></option>
        <option value='user' <?php selected( $options['get'], 'user' ); ?>><?php echo __('User', 'scinstafeed'); ?></option>*/?>
    </select> <?php

}

// tag
function sc_instafeed_tag_render(  ) { 

    $options = get_option( 'sc_instafeed_settings' ); ?>
    <input type="text" name="sc_instafeed_settings[tag]" value="<?php echo $options['tag']; ?>"> <?php

}

// limit
function sc_instafeed_limit_render(  ) { 

    $options = get_option( 'sc_instafeed_settings' ); ?>
    <input type="text" name="sc_instafeed_settings[limit]" value="<?php echo $options['limit']; ?>"> <?php

}

// sortBy
function sc_instafeed_sortby_render(  ) { 

    $options = get_option( 'sc_instafeed_settings' ); ?>
    <select name='sc_instafeed_settings[sortBy]'>
        <option value='none' <?php selected( $options['sortBy'], 'none' ); ?>><?php echo __('None', 'scinstafeed'); ?></option>
        <option value='most-recent' <?php selected( $options['sortBy'], 'most-recent' ); ?>><?php echo __('Most Recent', 'scinstafeed'); ?></option>
        <option value='least-recent' <?php selected( $options['sortBy'], 'least-recent' ); ?>><?php echo __('Least Recent', 'scinstafeed'); ?></option>
        <option value='most-liked' <?php selected( $options['sortBy'], 'most-liked' ); ?>><?php echo __('Most Liked', 'scinstafeed'); ?></option>
        <option value='least-liked' <?php selected( $options['sortBy'], 'least-liked' ); ?>><?php echo __('Least Liked', 'scinstafeed'); ?></option>
        <option value='most-commented' <?php selected( $options['sortBy'], 'most-commented' ); ?>><?php echo __('Most Commented', 'scinstafeed'); ?></option>
        <option value='least-commented' <?php selected( $options['sortBy'], 'least-commented' ); ?>><?php echo __('Least Commented', 'scinstafeed'); ?></option>
        <option value='random' <?php selected( $options['sortBy'], 'random' ); ?>><?php echo __('Random', 'scinstafeed'); ?></option>
    </select> <?php

}


// custom CSS
function sc_instafeed_custom_css_render(  ) { 

    $options = get_option( 'sc_instafeed_settings' ); ?>
    <textarea cols='40' rows='8' name='sc_instafeed_settings[custom_css]'> 
        <?php echo $options['custom_css']; ?>
    </textarea> <?php

}

function sc_instafeed_settings_section_callback(  ) { 

    echo __( 'General Configuration for SC InstaFeed<br />', 'scinstafeed' );
    echo __( 'If you don`t have an valid key (Client ID) from Instagram`s API, get yours <a href="http://instagram.com/developer/register/" target="_blank">HERE</a>', 'scinstafeed' );
}

// call plugin
add_action( 'wp_footer', 'sc_instafeed_call', 9999 );
function sc_instafeed_call() { 
    $options = get_option( 'sc_instafeed_settings' ); ?>
    <script>
        var feed = new Instafeed({
            <?php if ($options["clientid"])                  { echo "clientId: '" . $options['clientid'] . "',"; } ?>
            <?php if ($options["resolution"])                { echo "resolution: '" . $options['resolution'] . "',"; } ?>
            <?php if ($options["get"])                       { echo "get: '" . $options['get'] . "',"; } ?>
            <?php if ($options["limit"])                     { echo "limit: '" . $options['limit'] . "',"; } ?>
            <?php if ($options["tag"])                       { echo "tagName: '" . $options['tag'] . "',"; } ?>
            <?php if ($options["sortBy"])                    { echo "sortBy: '" . $options['sortBy'] . "',"; } ?>

            template:   '<div class="sc_instafeed_item">\n' +
                            '<a href="{{link}}" target="_blank">\n' +
                                '<img src="{{image}}" />\n' +
                            '</a>\n' + 
                        '</div>'
        });
        feed.run();
    </script>

<?php }

// custom css
add_action('wp_head', 'sc_instafeed_custom_css');
function sc_instafeed_custom_css() { 
    $options = get_option( 'sc_instafeed_settings' );
    if (isset($options['custom_css'])) : ?>
        <style>
            /* Custom CSS by SC InstaFeed */ 
            <?php echo $options['custom_css']; ?>
        </style> <?php
    endif;
}

