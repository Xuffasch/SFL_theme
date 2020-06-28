let scrolling = false;

window.onscroll = () => {
    console.log("window is scrolling !");
    scrolling = true;
};

setInterval(() => {
    if (scrolling) {
        scrolling = false;

        let nav = document.getElementById("navBar");
        let navH = nav.getBoundingClientRect()["height"];
        let services = document.getElementById('services-logo');

        services.getBoundingClientRect().top < navH ?
            services.classList.add("hide") :
            services.classList.remove("hide");

    }
}, 500);