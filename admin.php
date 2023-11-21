<?php

function aseli_admin_menu()
{
    add_options_page('Simple External Link Indicator Settings', 'Simple External Link Indicator', 'manage_options', 'aseli-settings', 'aseli_settings_page');
}

add_action('admin_menu', 'aseli_admin_menu');

// Save the settings
function aseli_register_settings()
{
    register_setting('aseli-settings-group', 'aseli_icon_choice');
    register_setting('aseli-settings-group', 'aseli_icon_size');
    register_setting('aseli-settings-group', 'aseli_excluded_selectors');
}

add_action('admin_init', 'aseli_register_settings');


// Admin page for icon selection
function aseli_settings_page()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    // Subset of Dashicons
    $dashicons = [
        'dashicons-admin-links',
        'dashicons-external',
        'dashicons-migrate',
        'dashicons-share-alt2',
        'dashicons-admin-site',
        'dashicons-admin-post',
        'dashicons-admin-page',
        'dashicons-admin-tools',
        'dashicons-admin-site-alt3',
        'dashicons-admin-network',
        'dashicons-exit',

    ];
    $current_icon = get_option('aseli_icon_choice');
    $icon_size = get_option('aseli_icon_size', '50');
    $preview_icon_class = get_option('aseli_icon_choice', 'dashicons-admin-links');
    $preview_icon_size = get_option('aseli_icon_size', '50');
    ?>

    <div class="wrap ">
        <h1 style='font-size: 0; dsiplay: none;' class='notification-will-go-where-i-want-you-to'>hello you found me =D</h1>
        <div class='aseli-container'>
            <div class='aseli-admin-hero'>
                <h1>A (Super) Simple External Link Indicator</h1>
                <h4 class='aseli-preview'>A Quality of Life Plugin Courtesy of <a href='https://nahfts.com'>NAHFTS<span
                            class="dashicons <?php echo $preview_icon_class; ?>"
                            style="font-size: <?php echo $preview_icon_size; ?>%; vertical-align: top;"></span></a></h4>
            </div>
            <div class='aseli-inner-container'>
                <div class='aseli-left'>
                    <div class='aseli-settings'>
                        <h2>SETTINGS</h2>
                    </div>
                    <form class='aseli-form' method="post" action="options.php">
                        <?php settings_fields('aseli-settings-group'); ?>
                        <?php do_settings_sections('aseli-settings-group'); ?>
                        <div id="dashicons-selector">
                            <div class='aseli-instructions'>
                                <h3>Choose an icon style:</h3>
                            </div>
                            <?php

                            foreach ($dashicons as $icon):
                                $selected_class = ($icon === $current_icon) ? 'selected' : '';
                                ?>
                                <span class="dashicons-selector-item dashicons <?php echo $icon . ' ' . $selected_class; ?>"
                                    data-icon="<?php echo $icon; ?>"></span>
                            <?php endforeach; ?>
                        </div>
                        <div id="font-size-selector">
                            <div class='aseli-instructions'>
                                <h3>Set the size of the icon relative to text</h3>
                            </div>
                            <select name="aseli_icon_size" id="aseli_icon_size">
                                <option value="100" <?php selected($icon_size, '100'); ?>>100%</option>
                                <option value="90" <?php selected($icon_size, '90'); ?>>90%</option>
                                <option value="80" <?php selected($icon_size, '80'); ?>>80%</option>
                                <option value="70" <?php selected($icon_size, '70'); ?>>70%</option>
                                <option value="60" <?php selected($icon_size, '60'); ?>>60%</option>
                                <option value="50" <?php selected($icon_size, '50'); ?>>50%</option>
                                <option value="40" <?php selected($icon_size, '40'); ?>>40%</option>
                                <option value="30" <?php selected($icon_size, '30'); ?>>30%</option>
                            </select>
                        </div>
                        <div class="aseli-settings-field">
                            <label for="aseli_excluded_selectors"><div class='aseli-instructions'><h3>Excluded CSS Selectors:</h3></div></label><br>
                            <input type="text" id="aseli_excluded_selectors" name="aseli_excluded_selectors"
                                value="<?php echo esc_attr(get_option('aseli_excluded_selectors')); ?>" />
                            <p class="description">Enter CSS selectors exactly as you would use in a stylesheet to exclude, separated by commas. 
    For example: .no-icon, #exclude-this-id, aside .external-link. Excluded selectors will include the selector and ALL children</p>
                        </div>
                        <input type="hidden" name="aseli_icon_choice" id="aseli_icon_choice"
                            value="<?php echo esc_attr(get_option('aseli_icon_choice')); ?>">
                        <?php submit_button(); ?>
                    </form>
                </div>
                <div class='aseli-right'>
                    <div class="aseli-preview">
                        <h2>PREVIEW</h2>
                        <a href="#" target="_blank" style="text-decoration: none;">
                            Example Link <span class="dashicons <?php echo $preview_icon_class; ?>"
                                style="font-size: <?php echo $preview_icon_size; ?>%; vertical-align: top;"></span>
                        </a>

                        <h1><a href="#" target="_blank" style="text-decoration: none;">
                                Example Link (h1) <span class="dashicons <?php echo $preview_icon_class; ?>"
                                    style="font-size: <?php echo $preview_icon_size; ?>%; vertical-align: top;"></span>
                            </a></h1>
                    </div>
                </div>
            </div>
            <div class='thanks-image'>
                <img width='160' src="<?php echo plugins_url('img/thanks.jpg', __FILE__); ?>" alt="Thanks">
                <div class='thanks-credits aseli-preview'>
                    <div class='thanks-credits-content'>
                        If you like my stuff, consider visiting my website <a href='https://nahfts.com'>NAHFTS.com<span
                                class="dashicons <?php echo $preview_icon_class; ?>"
                                style="font-size: <?php echo $preview_icon_size; ?>%; vertical-align: top;"></span></a><br>subscribing
                        to <a href='https://nahfts.com/newsletter'>my newsletter<span
                                class="dashicons <?php echo $preview_icon_class; ?>"
                                style="font-size: <?php echo $preview_icon_size; ?>%; vertical-align: top;"></span></a><br>
                        or
                        buying a <a href='https://www.buymeacoffee.com/nahfts'>cup of coffee?<span
                                class="dashicons <?php echo $preview_icon_class; ?>"
                                style="font-size: <?php echo $preview_icon_size; ?>%; vertical-align: top;"></span></a><br>
                                <a href = 'https://nahfts.com' target="_blank"><img src = "<?php echo plugins_url('img/Logo.png', __FILE__); ?>" alt="NAHFTS Logo" width="150"/></a>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    $('#dashicons-selector .dashicons-selector-item').click(function () {
                        // Remove any previously selected class
                        $('#dashicons-selector .dashicons-selector-item.selected').removeClass('selected');

                        // Add 'selected' class to the clicked icon
                        $(this).addClass('selected');

                        // Update the hidden input's value with the selected icon's data
                        var selectedIcon = $(this).data('icon');
                        $('#aseli_icon_choice').val(selectedIcon);
                        var iconClass = 'dashicons ' + selectedIcon;
                        $('.aseli-preview .dashicons').attr('class', iconClass);
                    });


                    // Update preview on size change
                    $('#aseli_icon_size').change(function () {
                        var iconSize = $(this).val() + '%';
                        $('.aseli-preview .dashicons').css('font-size', iconSize);
                    });
                });
            </script>
        </div>
    </div>
    <?php
}


function aseli_enqueue_admin_styles()
{
    wp_enqueue_style('aseli-admin-css', plugins_url('/css/aseli-admin.css?v=1.0.3', __FILE__));
}
add_action('admin_enqueue_scripts', 'aseli_enqueue_admin_styles');