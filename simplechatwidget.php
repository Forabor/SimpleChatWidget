<?php
/*
Plugin Name: Simple Chat Widget
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Adds a widget for peer-to-peer chat.
Version: 0.0.1
Author: Corey Ferguson
Author URI: http://www.gnu.org/licenses/gpl-2.0.html
License: GPLv2 or later

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

class wp_my_plugin extends WP_Widget {
    // constructor
    function wp_my_plugin() {
        parent::WP_Widget(false, $name = __('Simple Chat Widget', 'wp_widget_plugin') );
    }
    // widget form creation
    function form($instance) {
// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
     $text = esc_attr($instance['text']);
     $textarea = esc_textarea($instance['textarea']);
} else {
     $title = '';
     $text = '';
     $textarea = '';
}

    }
    // widget update
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        // Fields
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] = strip_tags($new_instance['text']);
        $instance['textarea'] = strip_tags($new_instance['textarea']);
        return $instance;
    }
    // widget display
    function widget($args, $instance) {
        extract( $args);
        //these are the widget options
        $title = apply_filters('widget_title', $instance['title']);
        $text = $instance['text'];
        $text = $instance['textarea'];
        echo $before_widget;
        //Display the widget
        echo '<div class = "widget-text wp_widget_plugin_box">';
        //Check if the title is set
        if( $title ){
            echo $before_title . $title . $after_title;
        }
        //Check if the text is set
        if( $text ){
            echo '<p class="wp_widget_plugin_text">'.$text.'</p>';
        }
        //Check if the textarea is set
        if( $textarea ){
            echo '<p class="wp_widget_plugin_textarea">'.$textarea.'</p>';
        }
        echo "</div>";
        echo $after_widget;
    }
}
// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_my_plugin");'));

?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Simple Chat Widget', 'wp_widget_plugin'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', 'wp_widget_plugin'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Textarea:', 'wp_widget_plugin'); ?></label>
    <textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
</p>

