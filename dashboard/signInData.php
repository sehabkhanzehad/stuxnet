<?php
session_start();

require "../database/database.php";

$username = $_POST["username"];
$password = $_POST["password"];


$go = false;
if (!$username) {
    $go = true;
    $_SESSION["usernameError"] = "Username is required.";
}

if (!$password) {
    $go = true;
    $_SESSION["passwordError"] = "Password is required.";
}



if ($go) {
    header("location: signIn.php");
} else {

    $sql = "SELECT COUNT(*) as count FROM users WHERE email = '$username'";
    $query = mysqli_query($dbConnect, $sql);
    $result = mysqli_fetch_assoc($query);

    if ($result["count"] == 1) {

        $sql = "SELECT * FROM users WHERE email = '$username'";
        $query = mysqli_query($dbConnect, $sql);
        $result = mysqli_fetch_assoc($query);

        // if ($result["password"] == $password) {
        if (password_verify($password, $result["password"])) {
            $_SESSION['login'] = true;
            $_SESSION['userId'] = $result["id"]; 
            header("location: dashboard.php");
        } else {
            $_SESSION["error"] = "Please enter valid username or password.";
            header("location: signIn.php");
        }
    } else {
        $_SESSION["error"] = "Please enter valid username or password.";
        header("location: signIn.php");
    }
}
