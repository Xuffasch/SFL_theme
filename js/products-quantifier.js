function Add(e) {
    let product = e.currentTarget.id;
    console.log("product to add : " + product);
    let count = document.getElementById("counter-" + product);
    count.innerText = parseInt(count.innerText) + 1 + "";
}

function Remove(e) {
    let product = e.currentTarget.id;
    console.log("product to remove : " + product);
    let count = document.getElementById("counter-" + product);
    if (parseInt(count.innerText) > 0) {
        count.innerText = parseInt(count.innerText) - 1 + "";
    }
}