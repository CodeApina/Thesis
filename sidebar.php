<div style="background-color:#8E7970; height:100vh; background-repeat:repeat-y">
    <div class="d-flex justify-content-center">
        <a href="index.php" class="btn" role="button" style="background-color:#8E7970; width:99%">Home</a>
    </div>
    <div class="d-flex justify-content-center">
        <a href="profile.php" class="btn" role="button" style="background-color:#8E7970; width:99%" id="user">Profile</a>
    </div>
    <div class="d-flex justify-content-center">
        <a href="contact.php" class="btn" role="button" style="background-color:#8E7970; width:99%">Contact us</a>
    </div>
    <div class="d-flex justify-content-center">
        <a href="log_out.php" class="btn" role="button" style="background-color:#8E7970; width:99%">Log out</a>
    </div>
</div>
<script>
    var session_logged_in='<?php echo $_SESSION["logged_in"]?>'
    if(session_logged_in == true){
        document.getElementById("user").innerHTML = "Profile"
    }
    else{
        document.getElementById("user").innerHTML = "Log in"
        document.getElementById("user").setAttribute("href", "log_in.php");
    }
</script>