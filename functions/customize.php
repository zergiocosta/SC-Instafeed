<?php
add_action( 'admin_menu', 'sc_instafeed_add_admin_menu' );
add_action( 'admin_init', 'sc_instafeed_settings_init' );


function sc_instafeed_add_admin_menu(  ) { 

    add_menu_page( 'SC InstaFeed', 'SC InstaFeed', 'manage_options', 'sc_instafeed', 'sc_instafeed_options_page' );

}

require_once(plugin_dir_path( __FILE__ ) . 'options/general.php');


function sc_instafeed_options_page(  ) { 

    ?>
    <form action='options.php' method='post'>
        
        <h2>SC InstaFeed</h2>
        
        <?php
        settings_fields( 'sc_instafeed' );
        do_settings_sections( 'sc_instafeed' );
        submit_button();
        ?>
        
    </form>
    <?php

}

?>