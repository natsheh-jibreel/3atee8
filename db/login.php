<?php 
require('db_connect.php'); 

session_start();
$_SESSION["user_auth"] = false;
$_SESSION["login_error"] = '';
$email = $_SESSION["email"] = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM Users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $verify = password_verify($password, $row["password"]);
    if($verify == true){
        $_SESSION["user_auth"] = true;
        $_SESSION["user_id"]  = $row["user_id"];
        header("location: ../index.php");
    }else{
        $_SESSION["login_error"] = "كلمة السر غير صحيحة";
        header("location: ../login.php");
    }
}else{
    $_SESSION["login_error"] = "البريد الالكتروني غير موجود";
    header("location: ../login.php");
}
?>