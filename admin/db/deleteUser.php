<?php
require('../../db/db_connect.php'); 

$id = $_GET["id"];

$sql = "DELETE FROM Users WHERE user_id='$id'";
$result = mysqli_query($conn, $sql);
if($result == 1){
    header("location: ../users.php");
}else{
    echo mysqli_error($conn);
}
?>