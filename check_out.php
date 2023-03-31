<?php
include "backend/include_master.php";?>
<!DOCTYPE html>
<head>
    <?php 
    include "backend/bootstrap.php";
    ?>
    <link href="css/stylesheet.css" rel="stylesheet">
    <title>HHR</title>
    <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
</head>
<body class="no-gutters">
    <?php include "navbar.php"; ?>
    <div class="container-fluid p-0" style="height:100%; background-color:#1b4b5a">
        <div class="row no-gutters h-100">
            <div class="col-2 col-xl-1 h-100 d-inline-block mr-0" style="height:100%">
                <?php include "sidebar.php" ?>
            </div>
            <div class="col-5 col-xl-5 pl-0 pr-0 ml-0 mr-0 no-gutters">
            <form class="text-light action='backend/ajax/order_for_ajax.php'" method="POST">
                     <div class="mb-3 mt-3 container-fluid">
                            <label for="address" class="form-label">Address:</label>
                            <br>
                            <input type="text" class="form_control" id="address" placeholder="Enter address" name="address">
                        </div>
                        <div class="mb-3 mt-3 container-fluid">
                            <label for="city" class="form-label">City:</label>
                            <br>
                            <input type="text" class="form_control" id="city" placeholder="Enter city" name="city">
                        </div>
                        <div class="mb-3 mt-3 container-fluid">
                            <label for="zip" class="form-label">Zip:</label>
                            <br>
                            <input type="text" class="form_control" id="zip" placeholder="Enter zip" name="zip">
                        </div>
                        <div class="mb-3 mt-3 container-fluid">
                            <label for="country" class="form-label">Country:</label>
                            <br>
                            <input type="text" class="form_control" id="country" placeholder="Enter country" name="country">
                        </div>
                        <div class="mb-3 mt-3 container-fluid">
                            <label for="card_num" class="form-label">Card number:</label>
                            <br>
                            <input type="text" class="form_control" id="card_num" placeholder="Enter card number" name="card_num">
                        </div>
                        <div class="mb-3 container-fluid">
                            <label for="expiration" class="form_label">Expiration (mm/yy)</label>
                            <br>
                            <input type="text" class="form_control", id="expiration", placeholder="Enter expiration" name="expiration">
                        </div>
                        <div class="mb-3 mt-3 container-fluid">
                            <label for="security" class="form-label">Card security number:</label>
                            <br>
                            <input type="text" class="form_control" id="security" placeholder="Enter card security number" name="security">
                        </div>
                        <div class="mb-3 mt-3 container-fluid">
                            <label for="email" class="form-label">Email:</label>
                            <br>
                            <input type="email" class="form_control" id="city" placeholder="Enter email" name="email">
                        </div>
                        <div class="container-fluid">
                            <button type="submit" id="buy" onClick="buy_click()" class="btn btn-secondary">Submit</button>
                        </div>
                        <div class="container-fluid text-white" id="taxed"></div>
                        <div class="container-fluid text-white" id="price"></div>
                    </form>
            </div>
            <div class="col-3 col-xl-5 pl-o pr-0 ml-0 mr-0 no-gutters">
                <div id="cart1"></div>
            </div>
        </div>
    </div>
</body>

<script>
    fetch("backend/ajax/ajax_checkout.php", {
        headers : {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }}).then(function(response){
        return response.json();
    }).then(function(products){
        var html = '';
        products.forEach((product)=>{
                html += '<div class="container py-1 w-20"">' +
                            '<div class="row justify-content-center mb-3">'+
                                '<div class="card shadow-0 border rounded-3 h-50 w-55"'+
                                    '<div class="card-body">'+
                                        '<div class="row" id=order>'+
                                            '<div class=" mb-4 mb-lg-0">'+
                                                '<div class="bg-image hover-zoom ripple rounded ripple-surface">'+
                                                    '<img src="' + "images/" + product.picture_id + '" class="w-auto" style="height:10" />' +
                                            '</div>'+
                                            '<div class="">'+
                                                '<h5>' + product.name + '</h5>'+
                                                '<p class="text-truncate mb-4 mb-md-0">' + product.description + '</p>'+
                                            '</div>'+
                                            '<div class=" border-sm-start-none border-start">'+
                                                '<div class="d-flex flex-row align-items-center mb-1">'+
                                                    '<h4 class="mb-1 me-1">'+ product.price * product.tax + "€" +'</h4>'+
                                                '</div>'+
                                            '</div>'+
                                            '<h5 id='+product.id+'num1> </h5>'+
                                            '<button class="bg-danger" id="'+ product.id +'" onClick="remove_clicks(this.id)" type="button">Remove</button>' +
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>' +
                        '</div>'}
            );
            cont = document.getElementById('cart1').innerHTML = html;
        })
    fetch("backend/ajax/ajax_cart_total.php", {
        headers : {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }}).then(function(response){
            return response.json();
        }).then(function(prices){
            var html = "";
            let no_tax = prices[0];
            let taxed = prices[1];
            html = '<div>Price including tax:<b> '+ (taxed + '') +'</b></div>'
            document.getElementById("taxed").innerHTML = html;
            html = '<div>Price excluding tax: <b>'+ (no_tax + '') +'</b></div>'
            document.getElementById("price").innerHTML = html;

        })
    fetch("backend/ajax/cart_count_for_checkout_ajax.php", {
        headers : {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        }}).then(function(response){
            return response.json();
         }).then(function(products){
            var html = '';
            if (Array.isArray(products)){
                products.forEach((product)=>{
                    html = product.num_in_cart;
                    var prod_id = product.product_id;
                    if (html == null){
                        return;
                    }
                    if (document.getElementById(prod_id+"num1") != null){
                        document.getElementById(prod_id+"num1").innerHTML = html + " in cart";
                    }
                    else 
                        document.getElementById(prod_id+"num").innerHTML = "Error";
            })
        }
    })
    function remove_clicks(prod_id){
        $.ajax({
              method: "POST",
              url: "backend/ajax/ajax_remove_cart.php",
              data: {id:prod_id}
          }).done(function( response ) {
              location.reload();
          })
    }
        function buy_click(){
            $.ajax({
                method: "POST",
                url: "backend/ajax/order_for_ajax.php",
            }).done(function( response ) {
                      $html(document.getElementById(buy).innerHTML = "success")
                      location.reload();
                  })
        }
</script>