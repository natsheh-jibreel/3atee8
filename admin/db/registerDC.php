<?php require('../../db/db_connect.php'); 

session_start();

$_SESSION["delivery_company_register_error"];
$company_name = $_POST["company_name"];
$company_phone = $_POST["company_phone"];
$delivery_price = $_POST["delivery_price"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "INSERT INTO DeliveryCompanies (company_name, phone, delivery_price, email, password) VALUES ('$company_name', '$company_phone' ,'$delivery_price', '$email', '$password')";
$result = mysqli_query($conn, $sql);

if($result)
    $_SESSION["delivery_company_register_error"] = "Company Added Successfully";
else
    $_SESSION["delivery_company_register_error"] = "Error Occured";
header("location: ../deliveryCompany.php");
?>