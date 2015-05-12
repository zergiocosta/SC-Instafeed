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
        <option value='thumbnail' <?php selected( $options['resolution'], 'thumbnail' ); ?>>Thumbnail (150x150)</option>
        <option value='low_resolution' <?php selected( $options['resolution'], 'low_resolution' ); ?>>Low Resolution (306x306)</option>
        <option value='standard_resolution' <?php selected( $options['resolution'], 'standard_resolution' ); ?>>Standard (612x612)</option>
    </select> <?php

}

// content type to get from instagram
function sc_instafeed_get_render(  ) { 

    $options = get_option( 'sc_instafeed_settings' ); ?>
    <select name='sc_instafeed_settings[get]'>
        <option value='popular' <?php selected( $options['get'], 'popular' ); ?>>Popular</option>
        <option value='tagged' <?php selected( $options['get'], 'tagged' ); ?>>Tagged</option>
        <?/*<option value='location' <?php selected( $options['get'], 'location' ); ?>>Location</option>
        <option value='user' <?php selected( $options['get'], 'user' ); ?>>User</option>*/?>
    </select> <?php

}

// tag
function sc_instafeed_tag_render(  ) { 

    $options = get_option( 'sc_instafeed_settings' ); ?>
    <input type="text" name="sc_instafeed_settings[tag]" value="<?php echo $options['tag']; ?>"> <?php

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
            <?php if ($options["tag"])                       { echo "tagName: '" . $options['tag'] . "',"; } ?>

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

