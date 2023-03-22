<?php
include "backend/include_master.php";?>
<!DOCTYPE html>
<head>
    <?php 
    include "backend/bootstrap.php";
    ?>
    <link href="css/stylesheet.css" rel="stylesheet">
    <title>HHR</title>
</head>
<body>
    <?php include "navbar.php"; ?>
    <div class="container-fluid p-0" style="height:100%; background-color:#1b4b5a">
        <div class="row no-gutters flex-grow-1 h-100">
            <div class="col-2 col-xl-1 h-100 d-inline-block " style="height:100%">
                <?php include "sidebar.php" ?>
            </div>
            <div class="col-10 col-xl-11 overflow-y-scroll" id="products"></div>
            <script>
                fetch("backend/ajax/products_for_ajax.php").then(function(response){
                        return response.json();
                    }).then(function(products){
                        var html = '';
                        products.forEach((product)=>{
                            html += '<div class="container py-1">' +
                                        '<div class="row justify-content-center mb-3">'+
                                           '<div class="col-md-12 col-xl-10">'+
                                                '<div class="card shadow-0 border rounded-3 h-100 w-100">'+
                                                    '<div class="card-body">'+
                                                        '<div class="row">'+
                                                            '<div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">'+
                                                                '<div class="bg-image hover-zoom ripple rounded ripple-surface">'+
                                                                    '<img src="' + "images/" + product.picture_id + '" class="w-50" style="height:auto" />' +
                                                                    '<a href="#!">'+
                                                                        '<div class="hover-overlay">'+
                                                                            '<div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>'+
                                                                        '</div>'+
                                                                    '</a>'+
                                                                '</div>'+
                                                            '</div>'+
                                                            '<div class="col-md-6 col-lg-6 col-xl-6">'+
                                                                '<h5>' + product.name + '</h5>'+
                                                                '<p class="text-truncate mb-4 mb-md-0">' + product.description + '</p>'+
                                                            '</div>'+
                                                            '<div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">'+
                                                                '<div class="d-flex flex-row align-items-center mb-1">'+
                                                                    '<h4 class="mb-1 me-1">'+ product.price * product.tax + "€" +'</h4>'+
                                                                    //'<span class="text-danger"><s>$20.99</s></span>'+
                                                                '</div>'+
                                                                '<h6 class="text-success">Free shipping</h6>'+
                                                                '<div class="d-flex flex-column mt-4">'+
                                                                    '<button class="cart btn btn-primary btn-sm" id="'+ product.id + ' onClick="cart_click(this.id)" type="button">Add to cart</button>'+
                                                                    '<button class="wish btn btn-outline-primary btn-sm mt-2" type="button" id="'+ product.id +'" onClick="wishlist_click(this.id)">'+
                                                                        'Add to wishlist'+
                                                                    '</button>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>' +
                                    '</div>'
                        });
                        cont = document.getElementById('products').innerHTML = html;
                    });
                  function cart_click(prod_id){
                    $.ajax({
                        method: "POST",
                        url: "backend/ajax/ajax_cart.php",
                        data: prod_id
                    }).done(function( response ) {
                        $("div.cart." + prod_id).html(document.getElementById(prod_id).innerHTML = "In cart")
                    })
                  }
                  function wishlist_click(prod_id){
                    $.ajax({
                        method: "POST",
                        url: "backend/ajax/ajax_wishlist.php",
                        data: prod_id
                    }).done(function( response){
                        $("div.wish." + prod_id)
                    })
                  }

                </script>
            </div>
        </div>
    </div>
</body>
