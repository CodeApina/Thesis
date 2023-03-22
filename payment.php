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
                <div class="col-11">
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
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </form>
                    <div class="mb-3 mt-3 container-fluid">
                        <a href="register.php">   Not a member?</a>
                    </div>
                </div>
        </div>
    </body>
</html>