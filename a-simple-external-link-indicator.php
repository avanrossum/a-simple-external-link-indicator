<?php
/*
Plugin Name: A Simple External Link Indicator
Description: Automatically adds an icon to all external links in WordPress posts and pages.
Version: 1.0.4
Plugin URI: https://nahfts.com/simple-external-link-indicator/
Author: Alex van Rossum
Author URI: https://nahfts.com
License: GPLv2
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
Requires PHP: 5.3
*/

function aseli_set_default_options()
{
    if (get_option('aseli_icon_choice') === false) {
        update_option('aseli_icon_choice', 'dashicons-admin-links');
    }
    if (get_option('aseli_icon_size') === false) {
        update_option('aseli_icon_size', '50'); // Just the number, as we append the '%' in the script
    }
    if (get_option('aseli_excluded_selectors') === false) {
        update_option('aseli_excluded_selectors', '.aseli_exclude');
    }
    // For a future release
    // if (get_option('aseli_enable_images') === false) {
    //     update_option('aseli_enable_images', False);
    // }
    // if (get_option('aseli_image_background_color') === false) {
    //     update_option('aseli_image_background_color', '#000');
    // }
    // if (get_option('aseli_image_foreground_color') === false) {
    //     update_option('aseli_image_foreground_color', '#fff');
    // }
}

register_activation_hook(__FILE__, 'aseli_set_default_options');

add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('dashicons');
});

// function aseli_enqueue_dashicons()
// {
//     wp_enqueue_style('dashicons');
// }

// add_action('wp_enqueue_scripts', 'aseli_enqueue_dashicons');




// Include admin functions only if in the admin area
if (is_admin()) {
    require_once(plugin_dir_path(__FILE__) . '/admin.php');
}

// Include frontend functions only if not in the admin area
if (!is_admin()) {
    require_once(plugin_dir_path(__FILE__) . '/frontend.php');
}




