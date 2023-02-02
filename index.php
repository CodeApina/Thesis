<?php
include "backend/include_master.php"; ?>
<!DOCTYPE html>
<head>
    <?php 
    include "backend/bootstrap.php";
    ?>
    <link href="css/stylesheet.css" rel="stylesheet">
    <title><h4><b>HHR</b></h4></title>
</head>
<body>
    <div class="container d-flex flex-column flex-md-row">
        <nav class="navbar navbar-expand-md navbar-light d-flex flex-md-column">
            <a href="#">
                <img src="images/lorem-ipsum-generator-cicero-engraving.png" alt="logo" width="100" height="140">
            </a>
            <button class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 d-flex flex-md-column text-center text-md-end">
                    <li>
                        <a href="#" class="nav-link" aria-current="page">Lorem</a>
                    </li>
                    <li class="nav-link">
                        <a href="#" class="nav-link">Ipsum</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="ps-0 ps-md-5 flex-grow-1">
            <h1>Lorem ipsum</h1>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse 
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </main>
    </div>
</body>