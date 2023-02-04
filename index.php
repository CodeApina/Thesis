<?php
include "backend/include_master.php"; ?>
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
    <?php include "sidebar.php"; ?>
    <div class="row">
        <div class="col-1">    
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
            Sidebar
            </button>
        </div>
        <div class="col-11" id="products">
        <script>
            fetch("backend/products_for_ajax.php").then(function(response){
                    return response.json();
                }).then(function(products){
                    var html = '';
                    products.forEach((product)=>{
                        html += '<div class="card mb-4 bg-secondary text-light">' +
                                    '<img class="card-img-top" style="max-width: 100px; max-height:100px);" src="' + "images/" + product.picture_id +'"></img>' +
                                    '<div class="card-body justify-content-center">' +
                                        '<div class="d-flex justify-content-start">' +
                                            '<p id="title_box" class="medium mb-0 ms-0"><h5>' + product.name + '</h5></p>' +
                                        '</div>' + 
                                        '<div class="d-flex justify-content-start">' +
                                            '<p id="content_box" class="medium mb-0 ms-6">' + product.description +'</p>' +
                                        '</div>' +
                                        '<div class="d-flex justify-content-between">' +
                                            '<p id="user_box" class="small mb-0 ms-0">' + product.category + '</p>' +
                                        '</div>' + 
                                        '<div class="d-flex flex-row align-items-center">' +
                                            '<p class="small text-muted mb-0">Upvote?</p>' +
                                            '<i class="far fa-thumbs-up mx-2 fa-xs text-white" style="margin-top: -0.16rem;"></i>' +
                                            '<p id="likes_box" class="small text-muted mb-0">' + product.stock + '</p>' +
                                        '</div>' +
                                        '<div class="d-flex flex-row align-items-end>'+ product.price * product.tax + ' </div>' +
                                    '</div>' +
                                '</div>'
                    });

                    cont = document.getElementById('products').innerHTML = html;
                });
            </script>
        </div>
    </div>
</body>
