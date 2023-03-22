<?php
include "backend/include_master.php";
include "backend/bootstrap.php";
?>

<html>
    <head>
        <title>Register</title>
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
                            <label for="text" class="form-label">Email:</label>
                            <br>
                            <input type="email" class="form_control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="mb-3 mt-3 container-fluid">
                            <label for="username" class="form-label">Username:</label>
                            <br>
                            <input type="text" class="form_control" id="username" placeholder="Enter username" name="username">
                        </div>
                        <div class="mb-3 container-fluid">
                            <label for="password" class="form_label">Password:</label>
                            <br>
                            <input type="password" class="form_control", id="password", placeholder="Enter password" name="password">
                        </div>
                        <div class="container-fluid">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </form>
                    <div class="mb-3 container-fluid">
                        <a href="log_in.php">Already registered?</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['email']) !== true){
        echo '<div class="alert alert-danger"> "Email required"</div>';
    }
    if (isset($_POST['password']) !== true){
        echo '<div class="alert alert-danger"> "Password required"</div>';
    }
    if (isset($_POST['username']) !== true){
        echo '<div class="alert alert-danger">"Username required"</div>';
    }
    else {
        $function = new User();
        if ($function->register_handler($_POST['email'], $_POST['username'], $_POST['password']) === 1){
            header('Location:index.php');
        }
        else
            echo "'<div class='alert alert-danger'> 'Error: Log in failed'</div>";
    }
}