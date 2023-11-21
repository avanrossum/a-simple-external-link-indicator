<?php

// Enqueue the JavaScript file
function aseli_enqueue_scripts()
{
    wp_enqueue_script('aseli-js', plugins_url('/js/aseli-script.js?v=1.0.4', __FILE__), array('jquery'), null, true);

    // Localize the script with new data
    wp_localize_script(
        'aseli-js',
        'aseliData',
        array(
            'icon' => get_option('aseli_icon_choice'),
            'iconSize' => get_option('aseli_icon_size'),
            'excludedSelectors' => get_option('aseli_excluded_selectors')
        )
    );
}

add_action('wp_enqueue_scripts', 'aseli_enqueue_scripts');

// Enqueue the CSS file
function aseli_enqueue_styles()
{
    wp_enqueue_style('aseli-css', plugins_url('/css/aseli-style.css?v=1.0.4', __FILE__));
}

add_action('wp_enqueue_scripts', 'aseli_enqueue_styles');

