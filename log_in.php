<?php
include "backend/include_master.php";
include "backend/bootstrap.php";
?>

<html>
    <head>
        <title>Log in</title>
    </head>
    <body>
        <?php include "navbar.php"; ?>
        <div class="container-fluid p-0" style="height:100vh; background-color:#1b4b5a">
            <div class="row no-gutters flex-grow-1 h-100">
                <div class="col-2 col-xl-1 h-100 d-inline-block" style="height:100vh">
                    <?php include "sidebar.php" ?>
                </div>
                <div class="col-10 col-xl-11">
                     <form action="<? $_SERVER['PHP_SELF']?>" method="POST">
                        <div class="mb-3 mt-3 container-fluid">
                            <label for="username" class="form-label">Username:</label>
                            <br>
                            <input type="text" class="form_control" id="username" placeholder="Enter username" name="username">
                        </div>
                        <div class="mb-3 container-fluid">
                            <label for="password" class="form_label"></label>
                            <br>
                            <input type="password" class="form_control", id="password", placeholder="Enter password" name="password">
                        </div>
                        <div class="container-fluid">
                            <input type="submit" class="btn btn-secondary"></input>
                        </div>
                    </form>
                    <div class="mb-3 mt-3 container-fluid">
                        <a href="register.php">Not a member?</a>
                    </div>
                </div>
        </div>
    </body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['username']) !== true){
        echo '<div class="alert alert-danger"> "Username required"</div>';
    }
    if (isset($_POST['password']) !== true){
        echo '<div class="alert alert-danger"> "Password required"</div>';
    }
    else {
        $function = new User();
        if ($function->log_in_handler($_POST['username'], $_POST['password']) === 0){
            header('Location:index.php');
        }
        else
            echo "'<div class='alert alert-danger'> 'Error: Log in failed'</div>";
    }
}