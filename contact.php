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
<body class="no-gutters">
    <?php include "navbar.php"; ?>
    <div class="container-fluid p-0" style="height:100%; background-color:#1b4b5a">
        <div class="row no-gutters flex-grow-1 h-100">
            <div class="col-2 col-xl-1 h-100 d-inline-block mr-0" style="padding-left: 0px; padding-right:0px; padding:0px; height:100%">
                <?php include "sidebar.php" ?>
            </div>
            <div class="col-10 col-xl-11 pl-0 pr-0 ml-0 mr-0 overflow-y-scroll no-gutters" style="padding-left: 0px; padding-right:0px; padding:0px">
            <iframe  width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
            src="https://www.openstreetmap.org/export/embed.html?bbox=27.680123448371887%2C62.89120278343008%2C27.684492766857147%2C62.892273440221295&amp;layer=mapnik&amp;marker=62.891738116711046%2C27.682308107614517" 
            style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=62.89174&amp;mlon=27.68231#map=19/62.89174/27.68231&amp;layers=N">View Larger Map</a></small>
                <form class="text-light" action="<? $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="mb-3 mt-3 container-fluid">
                        <label for="email" class="form_label">Email:</label>
                        <br>
                        <input type="email" class="form_control", id="email", placeholder="" name="email">
                    </div>
                    <div class="mb-3 mt-3 container-fluid">
                        <label for="header" class="form_label">Title:</label>
                        <br>
                        <input type="text" class="form_control", id="header", placeholder="" name="header">
                    </div>
                    <div class="mb-3 mt-3 container-fluid">
                        <label for="message" class="form_label">Message:</label>
                        <br>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    </div>
                    <div class="container-fluid">
                        <input type="submit" class="btn btn-secondary"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['email']) !== true){
        echo 'div class="alert alert-danger"> "Email required"</div>';
    }
    else if (isset($_POST['header']) !== true){
        echo 'div class="alert alert-danger"> "tittle required"</div>';
    }
    else if (isset($_POST['message']) !== true){
        echo 'div class="alert alert-danger"> "Message required"</div>';
    }
    else {
        $to = "henri.saren@gmail.com";
        $subject = $_POST['header'];
        $txt =wordwrap(str_replace("\n.", "\n..", $_POST['message'].$POST_['email']));
        if (mail($to,$subject,$txt)){
            echo "Message sent";
        }
        else
            echo "Message not sent";
        
    }

}