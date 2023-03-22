<?php include "backend/include_master.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "backend/bootstrap.php"; ?>
        <link href="css/stylesheet.css" rel="stylesheet">
        <title>HHR</title>
    </head>
    <body>
        <?php include "navbar.php";?>
        <div class="container-fluid p-0" style="height:100vh; background-color:#1b4b5a">
            <div class="row no-gutters flex-grow-1 h-100">
                <div class="col-2 col-xl-1 h-100 d-inline-block" style="height:100vh">
                    <?php include "sidebar.php" ?>
                 </div>
                 <div class="col-10 col-xl-11" id="profile">
                    <p>vittu</p>
                 </div>
            </div>
        </div>
    </body>
</html>
<script>
    fetch("backend/ajax/ajax_session.php").then(function(response){
        return response.json();
    }).then(function(user_id){
        var html = "";
        switch (user_id){
        case(null):
            html += '<a href="log_in.php">Log in</a>'
            break;
        default:
            html += "vittu mitä paskaa"
            break;
        }
        cont = document.getElementById('profile').innerHTML = html;
    });
</script>