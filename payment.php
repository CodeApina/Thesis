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