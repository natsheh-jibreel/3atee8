<?php
require('../../db/db_connect.php'); 

$id = $_GET["id"];

$sql = "DELETE FROM DeliveryCompanies WHERE company_id='$id'";
$result = mysqli_query($conn, $sql);
if($result == 1){
    header("location: ../deliveryCompanies.php");
}else{
    echo mysqli_error($conn);
}
?>