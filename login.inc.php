<?php

//Check if register.php was accessed correctly
if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    require_once 'databasehandler.inc.php';
    require_once 'functions.inc.php';
    
    if (emptyInputLogin($username, $password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
}
//If register.php wasn't accessed correctly, redirect to register.php
else {
    header("location: ../login.php");
}