var product;
var price;
var imgSrc;
var tripId;

function addToCart(productDetails) {
    product = productDetails.getAttribute("data-product");
    price = productDetails.getAttribute("data-price");
    imgSrc = productDetails.getAttribute("data-img-src");
    tripId = productDetails.getAttribute("data-trip-id");

    if (!localStorage.getItem("product")) {
        localStorage.setItem("product", product);
        localStorage.setItem("price", price);
        localStorage.setItem("img-src", imgSrc);
        localStorage.setItem("trip_id", tripId);
    } else {
        localStorage.setItem("product", localStorage.getItem("product") + "," + product);
        localStorage.setItem("price", localStorage.getItem("price") + "," + price);
        localStorage.setItem("img-src", localStorage.getItem("img-src") + "," + imgSrc);
        localStorage.setItem("trip_id", localStorage.getItem("trip_id") + "," + tripId);
    }

    showCart();
}

function deleteProduct(productdetails) {
    var productToRemove = productdetails.getAttribute("data-product");
    var priceToRemove = productdetails.getAttribute("data-price");
    var imgSrcToRemove = productdetails.getAttribute("data-img-src");
    var tripIdToRemove = productdetails.getAttribute("data-trip-id");

    var productList = localStorage.getItem("product").split(",");
    var priceList = localStorage.getItem("price").split(",");
    var imgSrcList = localStorage.getItem("img-src").split(",");
    var tripIdList = localStorage.getItem("trip_id").split(",");

    var productIndex = productList.indexOf(productToRemove);

    if (productIndex !== -1) {
        productList.splice(productIndex, 1);
        priceList.splice(productIndex, 1);
        imgSrcList.splice(productIndex, 1);
        tripIdList.splice(productIndex, 1);

        localStorage.setItem("product", productList);
        localStorage.setItem("price", priceList);
        localStorage.setItem("img-src", imgSrcList);
        localStorage.setItem("trip_id", tripIdList);

        showCart();
    }
}

function showCart() {
    if (localStorage.getItem("trip_id")) {
        var tripIdList = localStorage.getItem("trip_id").split(",");
        var productList = localStorage.getItem("product").split(",");
        var priceList = localStorage.getItem("price").split(",");
        var imgSrcList = localStorage.getItem("img-src").split(",");

        document.getElementById("counter").innerHTML = tripIdList.length;

        var shoppingContent = "<table><thead><th>Cancel</th><th>Product</th><th>Image</th><th>Price</th></thead>"
        var total = 0;

        for (var i = 0; i < tripIdList.length; i++) {
            shoppingContent += "<tr><td><input type='button' value='x' class='delete-btn' data-product='"+ productList[i] + "' data-price='" + priceList[i] + "' data-img-src='" + imgSrcList[i] + "' data-trip-id='" + tripIdList[i] + "' onclick='deleteProduct(this)'></td><td>" + productList[i] + "</td><td><img src='" + imgSrcList[i] + "' alt='Product Image' width='50' height='50'></td><td>" + priceList[i] + " SAR</td></tr>"
            total += parseFloat(priceList[i]);
        }

        var totalBill = total
        shoppingContent += "<tfoot><th>Bill: "+total+" SAR</th><th>Total bill: "+totalBill+" SAR</th></tfoot>"+"</table>";
        document.getElementById("orders").innerHTML = shoppingContent;
    } else {
        document.getElementById("orders").innerHTML = "";
        document.getElementById("counter").innerHTML = "";
    }
}

function emptyCart() {
    localStorage.clear();
    showCart();
}

addEventListener("load", showCart);

function book() {
    if (!localStorage.getItem("trip_id")) {
        alert("Your cart is empty.");
        return;
    }

    var tripIds = localStorage.getItem("trip_id").split(",");
    var prices = localStorage.getItem("price").split(",");

    var form = new FormData();
    form.append("tripIds", tripIds.join(","));
    form.append("prices", prices.join(","));

    fetch("book_cart.php", {
        method: "POST",
        body: form
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        emptyCart();
        window.location.href = "trips.php";
    })
    .catch(error => console.error("Error:", error));
}
