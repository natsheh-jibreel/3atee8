<?php 
session_start();
$_SESSION["admin_auth"] = false;
$_SESSION["admin_login_error"] = '';
$username = $_POST["username"];
$password = $_POST["password"];

if($username == "admin"){
    if($password == "admin"){
        $_SESSION["admin_auth"] = true;
        header("location: ../index.php");
    }else{
        $_SESSION["admin_login_error"] = "Username or Password is Incorrect";
        header("location: ../login.php");
    }
}

?>