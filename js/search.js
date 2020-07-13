jQuery(document).ready(function() {
    jQuery("#btn-search").click(function() {
        let messagesbox = jQuery(".messages");
        let messages = jQuery('#messages');
        let searchbox = jQuery('#search-box');
        let searchbtn = jQuery('#btn-search');


        messages.toggleClass('invisible');
        searchbox.toggleClass('invisible');
        searchbtn.toggleClass('searching');
        if (searchbtn.hasClass('searching')) {
            messagesbox.css("background-color", "transparent");
            searchbtn.css("background-image", "url(" + template_url + "/images/search-activated.svg" + ")");
        } else {
            messagesbox.css("background-color", "black");
            searchbtn.css("background-image", "url(" + template_url + "/images/search.svg" + ")");
        }
    })
});