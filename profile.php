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
                <div class="col-2 col-xl-1 h-100 d-inline-block" style="padding-left: 0px; padding-right:0px; padding:0px; height:100%">
                    <?php include "sidebar.php" ?>
                 </div>
                 <div class="col-10 col-xl-11" id="profile">
                    <p></p>
                 </div>
            </div>
        </div>
    </body>
</html>
<script>
    fetch("backend/ajax/ajax_session.php", {
        headers : {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    }).then(function(response){
        return response.json();
    }).then(function(user_id){
        var html = "";
        switch (<?php echo $_SESSION['logged_in']?>){
        case(false):
            html += '<a href="log_in.php">Log in</a>'
            break;
        default:
            html += "<div class='text-white'>Hey "+<?php echo $_SESSION['username']?>+". This page is a work in progress.</div>"
            break;
        }
        cont = document.getElementById('profile').innerHTML = html;
    });
</script>