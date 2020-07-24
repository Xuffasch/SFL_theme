jQuery(document).ready(function() {
    jQuery("#menu-button").click(function() {
        jQuery(this).toggleClass("change");

        jQuery(".site-title").toggleClass("invisible");
        let menu = jQuery(".menu-container");
        menu.toggleClass("stretch");
    })

    if (currentState.logged) {
        console.log("User logged in");
        jQuery("#user-account").addClass("logged");
    } else {
        console.log("User.logged out");
        jQuery("#user-account").removeClass("logged");
    }
});