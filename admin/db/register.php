<?php require('../../db/db_connect.php'); 

session_start();

$_SESSION["admin_register_error"];
$username = $_SESSION["admin_username"] = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM Admins WHERE username='$username'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) != 0){
    $_SESSION["admin_register_error"] = "username is already registered";
    header('location: ../registerAdmin.php');
}
    
$sql = "INSERT INTO Admins (username, password) VALUES ('$username', '$password')";
$result = mysqli_query($conn, $sql);

if($result)
    $_SESSION["admin_register_error"] = "Admin Added Successfully";
else
    $_SESSION["admin_register_error"] = "Error Occured";
header('location: ../registerAdmin.php');
?>