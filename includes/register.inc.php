<?php

//Check if register.php was accessed correctly
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $realname = $_POST["realname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwdRepeat = $_POST["pwdRepeat"];
    
    require_once 'databasehandler.inc.php';
    require_once 'functions.inc.php';
    
    if (emptyInputRegister($realname, $email, $username, $password, $pwdRepeat) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("location: ../register.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($password, $pwdRepeat) !== false) {
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }
    
    createUser($conn, $realname, $email, $username, $password);

}
//If register.php wasn't accessed correctly, redirect to register.php
else {
    header("location: ../register.php");
}
