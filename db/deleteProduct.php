<?php
require('db_connect.php'); 

$id = $_GET["id"];

$sql = "DELETE FROM Products WHERE product_id='$id'";
$result = mysqli_query($conn, $sql);
if($result == 1){
    header("location: ../products.php");
}else{
    echo mysqli_error($conn);
}
?>