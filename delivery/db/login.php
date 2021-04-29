<?php 
require("../../db/db_connect.php");
session_start();
$email = $_SESSION['dc_email'] = $_POST["email"];
$password = $_POST["password"];



$sql = "SELECT company_id, email, password FROM deliveryCompanies WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION["dc_id"] = $row["company_id"];
    header("location: ../index.php");
}else{
    $_SESSION["dc_login_error"] = "invalid email or password";
    header("location: ../login.php");
}

?>