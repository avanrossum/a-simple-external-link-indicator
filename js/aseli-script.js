jQuery(document).ready(function ($) {
    var selectedIconClass = 'aseli-dashicons dashicons ' + aseliData.icon;
    var iconSize = aseliData.iconSize + '%';
    var excludedSelectors = aseliData.excludedSelectors ? aseliData.excludedSelectors.split(',') : [];
    excludedSelectors.push('#wpadminbar');


    $('a[href^="http"]:not([href*="' + window.location.host + '"])').each(function () {
        var $link = $(this);
        var isExcluded = excludedSelectors.some(function (selector) {
            console.warn('excluded:' + selector)
            return $link.is(selector) || $link.parents(selector).length;
        });

        if (!isExcluded && $link.find('img').length === 0) {
            var $iconSpan = $('<span></span>').addClass(selectedIconClass).css('font-size', iconSize);
            $link.append($iconSpan);
        }
    });
});
