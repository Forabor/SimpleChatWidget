<?php
/**
Plugin Name: Simple Chat Widget
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Adds a widget for peer-to-peer chat.
Version: 0.0.1
Author: Corey Ferguson
Author URI: http://www.gnu.org/licenses/gpl-2.0.html
License: GPLv2 or later
*/
/*
Simple Chat Widget is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Simple Chat Widget is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Simple Chat Widget. If not, see {License URI}.


*/

define( 'CAF_PLUGIN_VER', '0.1.0');
define('CAF_PLUGIN_URL', plugin_dir_url(__FILE__));

add_action('wp_enqueue_scripts', 'simple_chat_plugin');

function simple_chat_plugin()
{
    wp_enqueue_style('caf-css', CAF_PLUGIN_URL . 'assets/css/styles.css');
    wp_enqueue_script('caf-js', CAF_PLUGIN_URL . 'assets/js/index.js', array('express, socket, http'), CAF_PLUGIN_VER, false);
}
//Html
add_shortcode( 'index', 'html_shortcode');

function html_shortcode(){
    $content = <<<INDEX


<div id="chatarea">
    <ul id="messages"></ul>
        <form action="">
            <label for="m"></label><input id="m" autocomplete="off" /><button>Send</button>
        </form>
</div>


INDEX;

    return $content;
}

?>