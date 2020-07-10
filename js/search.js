jQuery(document).ready(function() {
    jQuery("#btn-search").click(function() {
        let messages = jQuery('#messages');
        let searchbox = jQuery('#search-box');

        messages.toggleClass('invisible');
        searchbox.toggleClass('invisible');
    })
});