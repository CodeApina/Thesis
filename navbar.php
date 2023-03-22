<html>
    <nav class="navbar navbar-expand-sm" style="background-color:#8E7970; list-style-type: none;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color:#F55449" href=""><b>HHK</b></a>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Cart</a>
              <ul class="dropdown-menu dropdown-menu-end" id="cart">
                
              </ul>
            </li>
        </div>
    </nav>
</html>
<script>
    fetch("backend/ajax/cart_for_ajax.php").then(function(response){
        return response.json();
    }).then(function(products){
        var html = '';
        if (products != null){
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
                                      '<h4 class="mb-1 me-1">'+ product.price + "€" +'</h4>'+
                                      //'<span class="text-danger"><s>$20.99</s></span>'+
                                    '</div>'+
                                    '<h6 class="text-success">Free shipping</h6>'+
                                    '<div class="d-flex flex-column mt-4">'+
                                      '<button class="btn btn-primary btn-sm" id="'+ product.id + ' onClick="cart_click(this.id)" type="button">Add to cart</button>'+
                                      '<button class="btn btn-outline-primary btn-sm mt-2" type="button" id="'+ product.id +'" onClick="wishlist_click(this.id)">'+
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
    }
    else {
        html += "Your cart is empty"
    }
      cont = document.getElementById('cart').innerHTML = html;
  });
</script>