<?php
require('db_connect.php'); 

$id = $_GET["id"];

$sql = "DELETE FROM Orders WHERE order_id='$id'";
$result = mysqli_query($conn, $sql);
if($result == 1){
    header("location: ../userOrders.php");
}else{
    echo mysqli_error($conn);
}
?>