<div style="background-color:#8E7970; height:100vh">
    <div class="d-flex justify-content-center">
        <a href="index.php" class="btn" role="button" style="background-color:#8E7970; width:99%">Home</a>
    </div>
    <div class="d-flex justify-content-center">
        <a href="profile.php" class="btn" role="button" style="background-color:#8E7970; width:99%" id="user">Profile</a>
    </div>
</div>
<script>
    var session_logged_in='<? $_SESSION["logged_in"]?>'
    if(session_logged_in == true){
        document.getElementById("user").innerHTML = session_username
    }
    else{
        document.getElementById("user").innerHTML = "Log in"
        document.getElementById("user").setAttribute("href", "log_in.php");
    }
</script>