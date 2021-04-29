<?php
require('../../db/db_connect.php'); 

$id = $_POST["id"];
$name = $_POST["name"];

$sql = "UPDATE Category set category_name = '$name' WHERE category_id='$id'";
$result = mysqli_query($conn, $sql);
if($result == 1){
    header("location: ../categories.php");
}else{
    echo mysqli_error($conn);
}

?>