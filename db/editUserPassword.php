<?php
require("db_connect.php");
session_start();
$id = $_SESSION["user_id"];
$password = $_POST["password"];


$sql = "UPDATE Users SET password = '$password' WHERE user_id = '$id'";
$result = mysqli_query($conn, $sql);
if($result == 1){
    header("location: ../viewUserProfile.php");
}else{
    echo mysqli_error($conn);
}

?>