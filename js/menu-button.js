jQuery(document).ready(function() {
    jQuery("#menu-button").click(function() {
        jQuery(this).toggleClass("change");

        jQuery(".site-title").toggleClass("invisible");

        jQuery("#menu-menu-sfl").toggleClass("invisible");
        jQuery("#menu-menu-sfl").toggleClass("stretch");
    })

    if (currentState.logged) {
        jQuery("#user-account").addClass("logged");
    } else {
        jQuery("#user-account").removeClass("logged");
    }
});