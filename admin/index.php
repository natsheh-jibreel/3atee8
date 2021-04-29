<?php 
session_start();
if(!isset($_SESSION["admin_auth"])){
    header("location: login.php");
}
include 'header.html';
?>

<?php 
include 'footer.html';
?>