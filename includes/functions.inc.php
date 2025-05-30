<?php

//use Dom\Mysql;

function emptyInputRegister($realname, $email, $username, $password, $pwdRepeat) {
    if (empty($realname) || empty($email) || empty($username) || empty($password) || empty($pwdRepeat)) {
        return true; // Has empty input
    }
    return false; // No empty input
}

function invalidUid($username) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return true; // Has empty input
    }
    return false; // No empty input
}

function invalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function pwdMatch($password, $pwdRepeat) {
    if ($password !== $pwdRepeat) {
        return true;
    }
    return false;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    //protect against code injection attacks
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $realname, $email, $username, $password) {
    $sql = "INSERT INTO users (realname, email, username, password) VALUES (?, ?, ?, ?);";
    //protect against code injection attacks
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $realname, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?success=registered");
}

function emptyInputLogin($username, $password) {
    if (empty($username) || empty($password)) {
        return true; // Has empty input
    }
    return false; // No empty input
}

function loginUser($conn, $username, $password) {
    $uidExists = uidExists($conn, $username, $username);
    //check if username/email does not exist
    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["password"];
    //check if database password matches user-submitted password
    $checkPwd = password_verify($password, $pwdHashed);

    //check if the two passwords do not match
    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["realname"] = $uidExists["realname"];
        $_SESSION["username"] = $uidExists["username"];
        header("location: ../index.php");
        exit();
    }
}
