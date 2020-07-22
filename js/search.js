let searchInProgress = false;
let currentQuery = "";

function search_product(query, load, results) {
    results.empty().removeClass('empty');
    load.removeClass("invisible");
    console.log("search nonce : " + compagnons.whois);

    searchInProgress = setTimeout(function() {
        jQuery.ajax({
            url: compagnons.ajaxurl,
            type: 'post',
            data: {
                action: "search_product",
                keyword: query,
                search_nonce: compagnons.whois
            },
            success: function(output) {
                currentQuery = query;
                load.addClass("invisible");
                if (!results.hasClass('empty')) {
                    console.log('data : ' + output.data)
                    if (output.data.page) {
                        results.html('<ul class="search-results">' + output.data.page + '</ul>');
                    } else {
                        results.html('<div id="no-product">Aucun produit avec ces mots clefs.</div>');
                    }
                }
                jQuery(".more").html(output.data.plus);
                jQuery(".more").click(addQuantity);

                jQuery(".less").html(output.data.less);
                jQuery(".less").click(removeQuantity);

                jQuery(".counter.result-item").change(updateQuantity);

                clearTimeout(searchInProgress);
                searchInProgress = false;
            }
        })
    }, 100);
}


jQuery(document).ready(function() {
    jQuery("#btn-search").click(function() {
        let messagesbox = jQuery('.messages');
        let messages = jQuery('#messages');
        let searchbox = jQuery('#search-box');
        let searchbtn = jQuery('#btn-search');

        let title = jQuery('.title');
        let searchtitle = jQuery('.search-title');

        messages.toggleClass('invisible');
        searchbox.toggleClass('invisible');

        title.toggleClass('searching');
        searchtitle.toggleClass('searching');

        searchbtn.toggleClass('searching');
        messagesbox.toggleClass('searching');

        let currentlist = jQuery('div.woocommerce,.columns-2');
        currentlist.toggleClass('invisible');

        let searchResult = jQuery('.results-search');
        searchResult.toggleClass('invisible');
    })

    jQuery('form[name="product-search"]').each(function() {
        let form = jQuery(this),
            search = form.find('.search'),
            load = jQuery("#loading"),
            results = jQuery('.search-list');

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

            if (searchInProgress) {
                return;
            } else {
                if (query.trim().length >= 3) {
                    search_product(query, load, results);
                }
            }

        })
    })
});