<?php
require("db_connect.php");
session_start();
$id = $_SESSION["user_id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$city = $_POST["city"];
$email = $_POST["email"];

$sql = "UPDATE Users SET first_name = '$first_name', last_name = '$last_name', address = '$address', mobile_numebr = '$phone', city = '$city', email = '$email' WHERE user_id = '$id'";
$result = mysqli_query($conn, $sql);
if($result == 1){
    header("location: ../viewUserProfile.php");
}else{
    echo mysqli_error($conn);
}

?>