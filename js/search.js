function productSearch(query, load, results, currentQuery, timeout) {
    console.log("productSearch is called");

    query = query.trim();
    if (query.length >= 3) {

        if (timeout) {
            clearTimeout(timeout);
        }

        results.empty().removeClass('empty');
        load.removeClass("invisible");

        if (query != currentQuery) {
            timeout = setTimeout(function() {
                jQuery.ajax({
                    url: options.ajaxurl,
                    type: 'post',
                    data: { action: "search_product", keyword: query },
                    success: function(data) {
                        currentQuery = query;
                        load.addClass("invisible");
                        if (!results.hasClass('empty')) {
                            console.log('data : ' + data)
                            if (data.length) {
                                results.html('<ul>' + data + '</ul>');
                            } else {
                                results.html('<div id="no-product">Aucun produit avec ces mots clefs.</div>');
                            }
                        }
                        clearTimeout(timeout);
                        timeout = false;
                    }
                })
            }, 500);
        }

    } else {
        load.addClass("invisible");
        results.empty().removeClass("empty");

        clearTimeout(timeout);
        timeout = false;
    }

}


jQuery(document).ready(function() {
    jQuery("#btn-search").click(function() {
        let messagesbox = jQuery('.messages');
        let messages = jQuery('#messages');
        let searchbox = jQuery('#search-box');
        let searchbtn = jQuery('#btn-search');

        messages.toggleClass('invisible');
        searchbox.toggleClass('invisible');

        searchbtn.toggleClass('searching');
        if (searchbtn.hasClass('searching')) {
            messagesbox.css("background-color", "transparent");
            searchbtn.css("background-image", "url(" + options.template_url + "/images/search-activated.svg" + ")");
        } else {
            messagesbox.css("background-color", "black");
            searchbtn.css("background-image", "url(" + options.template_url + "/images/search.svg" + ")");
        }

        let currentlist = jQuery('div.woocommerce,.columns-2');
        currentlist.toggleClass('invisible');

        let searchResult = jQuery('#search-result');
        searchResult.toggleClass('invisible');
    })

    jQuery('form[name="product-search"]').each(function() {
        let form = jQuery(this),
            search = form.find('.search'),
            load = jQuery("#loading"),
            results = jQuery('#search-list'),
            currentQuery = '',
            timeout = false;

        search.on("search", function() {
            if (jQuery(this).val() == "") {
                results.empty();
            }
        })

        search.keyup(function() {
            if (search.val() == "") {
                results.empty();
            }

            var query = jQuery(this).val();
            productSearch(query, load, results, currentQuery, timeout);
        })
    })
});