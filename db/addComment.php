<?php
require("db_connect.php");
session_start();
if(!isset($_SESSION["user_auth"])){
    header("location: ../login.php");
}
$user_id = $_SESSION["user_id"];
$product_id = $_POST["product_id"];
$comment = $_POST["comment"];

$sql = "INSERT INTO product_comments (product_id, user_id, comment) values ('$product_id', '$user_id', '$comment')";
$result = mysqli_query($conn, $sql);
if($result > 0)
    header("location: ../productPage.php?product_id=$product_id");
else
    echo mysqli_error($conn);

?>