jQuery(document).ready(function ($) {
    console.warn('1')
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