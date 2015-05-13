<?php
/**
 * Plugin Name: SC InstaFeed
 * Plugin URI: https://profiles.wordpress.org/sergiuscosta
 * Description: A simple instagram feed to your website
 * Version: 1.0.0
 * Author: Sergio Costa
 * Author URI: http://sergiocosta.net.br/
 * Text Domain: scinstafeed
 * License: GPLv2 or later
 */


// enqueue files
add_action( 'wp_enqueue_scripts', 'sc_instafeed_files' );
function sc_instafeed_files() { 
    wp_enqueue_script( 'sc-instafeed', plugins_url( 'js/sc-instafeed.js', __FILE__ ), array( 'jquery' ), null, true );
    // wp_enqueue_style( 'sc-instafeed', plugins_url( 'css/sc-instafeed.css', __FILE__ ), array(), null, 'all' );
}

require_once(plugin_dir_path( __FILE__ ) . 'functions/shortcode.php');
require_once(plugin_dir_path( __FILE__ ) . 'functions/customize.php');

?>