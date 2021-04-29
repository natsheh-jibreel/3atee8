<?php 
require("../../db/db_connect.php");
$id = $_GET["id"];
$sql = "UPDATE Orders SET is_delivered = 1 WHERE order_id = '$id'";
$result = mysqli_query($conn, $sql);
if($result == 1){
    header("location:../index.php");
}
echo mysqli_error($conn);
?>