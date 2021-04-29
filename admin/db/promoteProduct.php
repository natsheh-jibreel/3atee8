<?php 
require("../../db/db_connect.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "UPDATE Products SET is_promoted = 1 WHERE product_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result == 1){
        header("location: ../products.php");
    }else{
        echo mysqli_error($conn);
    }
}
?>