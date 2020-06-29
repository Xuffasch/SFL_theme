window.onload = window.onresize = function() {
    let nav = document.getElementsByTagName("nav")[0];
    let navH = nav.offsetHeight + "px"

    let landing = document.getElementById("landing");
    landing.style.paddingTop = navH;
    landing.style.paddingBottom = navH;

    // let payment = document.getElementById("services-logo");
    // payment.style.height = navH;

};