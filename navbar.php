<html>
    <nav class="navbar navbar-expand-sm" style="background-color:#8E7970; list-style-type: none;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color:#F55449" href=""><b>HKK</b></a>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Cart</a>
              <ul class="dropdown-menu dropdown-menu-end" id="cart">
              </ul>
            </li>
        </div>
    </nav>
</html>
<script>
    fetch("backend/ajax/cart_for_ajax.php", {
        headers : {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }}).then(function(response){
        return response.json();
    }).then(function(products){
        var html = '';
        if (products == "<div class='container-fluid'>Your cart is empty</div>"){
            html = products
            cont = document.getElementById('cart').innerHTML = html;
            return
        }
        else {
            if (Array.isArray(products)){
                products.forEach((product)=>{
                    if (product != null && product.picture_id != null && product.name != null && product.description != null && product.price != null && product.id != null){
                        html += '<div class="container py-1"">' +
                                    '<div class="row justify-content-center mb-3">'+
                                        '<div class="card shadow-0 border rounded-3 h-100 w-100"'+
                                            '<div class="card-body">'+
                                                '<div class="row">'+
                                                    '<div class=" mb-4 mb-lg-0">'+
                                                        '<div class="bg-image hover-zoom ripple rounded ripple-surface">'+
                                                            '<img src="' + "images/" + product.picture_id + '" class="w-50" style="height:auto" />' +
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
                                                    '<h5 id='+product.id+'num> </h5>'+
                                                    '<button class="bg-danger container-fluid"style="margin-left:2% id="'+ product.id +'" onClick="remove_click(this.id)" type="button">Remove</button>' +
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>' +
                                '</div>'}
                    else html += ""
                });
            }
     
    }
    if (html != "<div class='container-fluid'>Your cart is empty</div>"){
        html += '<div class="row container-fluid" style="margin-left:2%"><a class="btn bg-success w-100%" href="check_out.php" type="button">Buy</a></div>'
    }
    cont = document.getElementById('cart').innerHTML = html;
  });

  fetch("backend/ajax/cart_count_ajax.php", {
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
                if (document.getElementById(prod_id+"num") != null){
                    html = product.num_in_cart;
                    document.getElementById(prod_id+"num").innerHTML = html + " in cart";
                }
                else 
                document.getElementById(prod_id+"num").innerHTML = "Error";
            })
        }
    })
  function buy_click(){
    location.href = "/check_out.php"
  }
  function remove_click(prod_id){
    $.ajax({
              method: "POST",
              url: "backend/ajax/ajax_remove_cart.php",
              data: {id:prod_id}
          }).done(function( response ) {
              location.reload();
          })
    }

</script>