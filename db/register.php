<?php require('db_connect.php'); 

session_start();

$_SESSION["user_auth"] = false;
$_SESSION["register_error"];
$first_name = $_SESSION["first_name"] = $_POST["first_name"];
$last_name = $_SESSION["last_name"] = $_POST["last_name"];
$address = $_SESSION["address"] = $_POST["address"];
$phone = $_SESSION["phone"] = $_POST["phone"];
$city = $_SESSION["city"] = $_POST["city"];
$email = $_SESSION["email"] = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "SELECT * FROM Users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) != 0){
    $_SESSION["register_error"] = "Email is already registered";
    header('location: ../register.php');
}
    
$sql = "INSERT INTO Users (first_name, last_name, address, mobile_numebr, city, email, password) VALUES ('$first_name', '$last_name', '$address', '$phone', '$city', '$email', '$password')";
$result = mysqli_query($conn, $sql);

if($result == 1){
    $sql = "SELECT * FROM Users WHERE email='$email'";
    $result2 = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result2);
    $_SESSION["user_auth"] = true;
    $_SESSION["user_id"]  = $row["user_id"];
    header('location: ../index.php');
}
?>