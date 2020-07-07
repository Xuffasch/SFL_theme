jQuery(document).ready(function() {
    jQuery(".less").click(function() {
        console.log("Less button is click for item for" + this.id);
        let counterId = $('.counter-' + this.id)[0].id;
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action: "remove_one_quantity",
                product_id: this.id,
                cart_item_id: counterId
            },
            success: function(output) {
                console.log("quantité diminuée : ", output.data.newQty);
                jQuery("#messages").text("Quantité diminuée");
            },
            error: function(output) {
                console.log("problème server")
                jQuery("#messages").text("Modification non prise en compte - problème connexion server");
            }
        });
    })
});

jQuery(document).ready(function() {
    jQuery(".more").click(function() {
        console.log("More button is click for product id " + this.id);

        let counterId = jQuery('.counter-' + this.id)[0].id;

        let counter = jQuery('.counter-' + this.id)[0];
        let counterNumber = counter.innerText;
        let newQuantity = parseInt(counterNumber) + 1;

        console.log("product_id : " + this.id);
        console.log("counterId : " + counterId);
        console.log("newQuantity : " + newQuantity);

        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action: "add_one_quantity",
                product_id: this.id,
                cart_item_id: counterId,
                new_quantity: newQuantity
            },
            success: function(output) {
                console.log('nouvelle quantité : ' + output.data.newQty);
                console.log('cart item id : ' + output.data.itemId);
                jQuery("#messages").text(output.data.success);

                if (jQuery("#" + output.data.itemId).length == 0) {
                    jQuery(".counter-" + output.data.productId).attr("id", output.data.itemId);
                }
                jQuery("#" + output.data.itemId).text(output.data.newQty);
            },
            error: function(output) {
                console.log("problème server")
                jQuery("#messages").text(output.failure);
            }
        });
    })
});