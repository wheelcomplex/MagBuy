var offset = 0;

//first load
$(document).ready(function () {
    loadProducts(offset);
});

//call to infinity scroll
$(window).scroll(function () {
        onScrollToBottom();
    }
);

//on change of filter
function filteredProducts() {
    $(window).bind('scroll', function () {
        onScrollToBottom();
    });
    offset = 0;
    loadProducts(offset);
}

//infinity scroll function (is separate to be called from multiple places)
function onScrollToBottom() {
    if ($(window).scrollTop() + $(window).height() > $(document).height() - 50) {
        loadProducts(offset += 8);
    }
}

//price range filter
var minPrice = 0;
var maxPrice = 1500;
$(function () {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 4000,
        values: [0, 1500],
        step: 5,
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            minPrice = ui.values[0];
            maxPrice = ui.values[1];
        },
        stop: function (event, ui) {
            $(window).bind('scroll', function () {
                onScrollToBottom();
            });
            offset = 0;
            loadProducts(offset);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));
});

//mixed load products function called by everything
function loadProducts(offset) {
    var xhttp = new XMLHttpRequest();
    var productsWindow = document.getElementById("productsWindow");
    var loading = document.createElement("img");
    loading.setAttribute("src", "../../web/assets/images/ajax-loader.gif");
    loading.setAttribute("class", "center-block");
    var loaderDiv = document.getElementById("loader");
    if (loaderDiv.children.length < 1) {
        loaderDiv.appendChild(loading);
    }
    xhttp.onreadystatechange = function () {
        if (this.status == 500 && this.readyState == 4) {
            window.location.replace("../error/error_500.php");
        } else if (this.status == 200 && this.readyState == 4) {
            loaderDiv.innerHTML = "";
            if (offset == 0) {
                productsWindow.innerHTML = "";
            }
            var products = JSON.parse(this.responseText);
            if (products.length == 0) {
                $(window).unbind('scroll');
            }
            var i = 0;
            var content = '';
            for (var key in products) {
                if (products.hasOwnProperty(key)) {

                    if (products[key]['percent'] !== null) {
                        var promotedPrice = Math.round((products[key]['price'] -
                                    ((products[key]['price'] * products[key]['percent']) / 100)
                                ) * 100) / 100;
                    } else {
                        promotedPrice = null;
                    }
                    if (products[key]['average'] === null) {
                        var productAverage = 0;
                    } else {
                        productAverage = Math.round(products[key]['average']);
                    }

                    if (key == 0) {
                        content += '<div class="products-grid-lft">';
                    }

                    if (i == 4) {
                        content +=
                            '<div class="products-grid-lft">';

                        i = 0;
                    }

                    content +=
                        '<div class="products-grd">' +
                        '<div id="categoryMarginUnderButton" class="p-one">' +
                        '<a href="single.php?pid=' + products[key]['id'] + '">' +
                        '<img src="' + products[key]['image_url'] + '"' +
                        'alt="Product Image" class="img-responsive"/>' +
                        '</a>' +
                        '<h4>' + products[key]['title'] + '</h4>' +
                        '<img class="ratingCatDiv media-object img"' +
                        ' src="../../web/assets/images/rating' + productAverage + '.png">' +
                        '<span>(' + products[key]['reviewsCount'] + ')</span>' + '<br/><br/>' +
                        '<p><a id="addButtonBlock" class="btn btn-default btn-sm"' +
                        'onclick="addToCart(' + products[key]['id'] +
                        ',' + (promotedPrice != null ? promotedPrice : products[key]['price']) + ')">' +
                        '<i class="glyphicon glyphicon-shopping-cart"></i>&nbspAdd' +
                        '</a>&nbsp&nbsp';
                    if (promotedPrice != null) {
                        content +=
                            '<span class="item_price valsa"' +
                            'style="color: red;">$' + promotedPrice + '</span>' +
                            ' <span class="item_price promoValsa">$' + products[key]['price'] + '</span>';
                    }
                    else {
                        content +=
                            '<span class="item_price valsa">$' + products[key]['price'] + '</span>';
                    }

                    content +=
                        '</p>' +
                        '<div class="pro-grd">' +
                        '<a href="single.php?pid=' + products[key]['id'] + '">View</a>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                    if (key == products.length - 1) {
                        content +=
                            '</div>';
                        $('#productsWindow').append(content);
                    }

                    i++;
                }
            }
        }
    };
    var filter = document.getElementById('filter').value;
    var subcid = location.search;
    xhttp.open("GET", "../../controller/products/products_by_category_controller.php" + subcid + "&offset="
        + offset + "&filter=" + filter + "&minP=" + minPrice + "&maxP=" + maxPrice, true);
    xhttp.send();
}