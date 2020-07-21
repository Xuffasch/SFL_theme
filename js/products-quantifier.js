jQuery(document).ready(function() {
    jQuery(".more").click(addQuantity);
    jQuery(".less").click(removeQuantity);
    jQuery("input.counter").change(updateQuantity);
})

let addQuantity = function() {
    console.log("addQuantity function is called for product id " + this.id);

    let counterId = jQuery('.counter-' + this.id)[0].id;

    let counter = jQuery('.counter-' + this.id)[0];
    let counterNumber = counter.value;
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
            jQuery("#messages").text(output.data.success);

            if (jQuery("#" + output.data.itemId).length == 0) {
                jQuery(".counter-" + output.data.productId)[0].id = output.data.itemId;
            }

            if (jQuery(".counter-" + output.data.productId + ".result-item")[0]) {
                jQuery(".counter-" + output.data.productId + ".result-item")[0].id = output.data.itemId;
            }

            let listItem = jQuery("#" + output.data.itemId);
            let resultItem = jQuery("#" + output.data.itemId + ".result-item");

            listItem.attr("value", output.data.newQty);
            resultItem.attr("value", output.data.newQty);
        },
        error: function(output) {
            console.log("problème server")
            jQuery("#messages").text(output.failure);
        }
    });
}

let removeQuantity = function() {
    console.log("removeQuantity is called for item for" + this.id);
    let counter = jQuery('.counter-' + this.id)[0];

    if (counter.value == "0") {
        jQuery("#messages").text("Please add a quantity first");
        return;
    }

    let counterId = counter.id;
    let newQuantity = parseInt(counter.value) - 1;

    console.log("product_id : " + this.id);
    console.log("counterId : " + counterId);
    console.log("newQuantity : " + newQuantity);

    jQuery.ajax({
        type: "POST",
        url: ajaxurl,
        data: {
            action: "remove_one_quantity",
            product_id: this.id,
            cart_item_id: counterId,
            new_quantity: newQuantity
        },
        success: function(output) {
            jQuery("#messages").text("Quantité diminuée");

            let listItem = jQuery("#" + output.data.itemId);
            let resultItem = jQuery("#" + output.data.itemId + ".result-item");

            listItem.attr("value", output.data.newQty);
            resultItem.attr("value", output.data.newQty);

            if (output.data.newQty == 0) {
                listItem.removeAttr("id");
                resultItem.removeAttr("id");
            }
        },
        error: function(output) {
            console.log("problème server")
            jQuery("#messages").text("Modification non prise en compte - problème connexion server");
        }
    });
}

let updateQuantity = function() {
    console.log("updateQuantity is called");

    let updatedfield = jQuery(this);
    console.log("cart item id : " + updatedfield[0].id);
    let parentElement = updatedfield.parent();

    let productId = parentElement[0].id;
    console.log("product_id : " + productId);

    let storedValue = updatedfield[0].defaultValue;

    let enteredValue = jQuery(this).val().trim();

    let signed = parseInt(enteredValue);
    console.log("sign : " + signed);

    if (enteredValue != "" && !Number.isNaN(signed) && signed >= 0) {
        jQuery(this).attr("value", signed);

        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action: "update_quantity",
                product_id: productId,
                cart_item_id: updatedfield[0].id,
                new_quantity: signed,
            },
            success: function(output) {
                console.log('success : ' + output.data.success);
                console.log('productId : ' + output.data.productId);
                console.log('cart item id : ' + output.data.itemId);
                console.log('new quantity : ' + output.data.newQty);

                jQuery("#messages").text(output.data.success);

                if (jQuery("#" + output.data.itemId).length == 0) {
                    jQuery(".counter-" + output.data.productId)[0].id = output.data.itemId;
                }

                if (jQuery(".counter-" + output.data.productId + ".result-item")[0]) {
                    jQuery(".counter-" + output.data.productId + ".result-item")[0].id = output.data.itemId;
                }

                let listItem = jQuery("#" + output.data.itemId);
                let resultItem = jQuery("#" + output.data.itemId + ".result-item");

                listItem.attr("value", output.data.newQty);
                resultItem.attr("value", output.data.newQty);
            },
            error: function() {
                console.log("Problème server");
                jQuery("#messages").text("Modification non prise en compte - problème connexion server");
            }
        })


    } else {
        console.log("Input not a number. No update on server")
        jQuery(this).attr("value", storedValue);
    }

}