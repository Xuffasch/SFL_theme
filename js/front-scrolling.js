let scrolling = false;

jQuery(document).ready(windowAdjust);
window.onresize = windowAdjust;

function windowAdjust() {
    let nav = document.getElementById("navBar");
    if (window.innerHeight < window.innerWidth) {
        nav.classList.add("black-back");
        window.onscroll = () => {
            let alpha = Math.abs((window.scrollY)) / window.innerHeight;

            nav.style.backgroundColor = "rgba(0, 0, 0, " + alpha + ")";
        }
    } else {
        nav.classList.remove("black-back");

        window.onscroll = () => {
            console.log("window is scrolling !");
            scrolling = true;
        };

        setInterval(() => {
            if (scrolling) {
                scrolling = false;
                let navH = nav.getBoundingClientRect()["height"];
                let youtube = document.getElementById('headline-actions');

                youtube.getBoundingClientRect().top < navH ?
                    youtube.classList.add("hide") :
                    youtube.classList.remove("hide");


            }
        }, 500);
    }
}