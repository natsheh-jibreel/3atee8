<?php
require('../../db/db_connect.php'); 

$id = $_POST["id"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$price = $_POST["price"];

$sql = "UPDATE DeliveryCompanies set company_name = '$name',phone = '$phone', delivery_price='$price' WHERE company_id='$id'";
$result = mysqli_query($conn, $sql);
if($result == 1){
    header("location: ../deliveryCompanies.php");
}else{
    echo mysqli_error($conn);
}

?>