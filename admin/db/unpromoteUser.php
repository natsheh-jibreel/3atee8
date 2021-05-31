<?php 
require("../../db/db_connect.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "UPDATE Users SET is_promoted = 0 WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result == 1){
        header("location: ../users.php");
    }else{
        echo mysqli_error($conn);
    }
}
?>