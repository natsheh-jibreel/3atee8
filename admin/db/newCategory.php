<?php require('../../db/db_connect.php'); 

session_start();

$_SESSION["add_category_error"];
$category_name = $_POST["category_name"];

$sql = "SELECT * FROM Category WHERE category_name='$category_name'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) != 0){
    $_SESSION["add_category_error"] = "Category already exists";
    header('location: ../newCategory.php');
}

$sql = "INSERT INTO Category (category_name) VALUES ('$category_name')";
$result = mysqli_query($conn, $sql);

if($result == 1)
    header("location: ../categories.php");
else{
    $_SESSION["add_category_error"] = "Error Occured";
    header("location: ../newCategory.php");
}
?>