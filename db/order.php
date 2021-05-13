<?php
require("./db_connect.php"); 
session_start();
$user_id = $_SESSION["user_id"];
$product_id = $_POST["product_id"];
$delivery_company_id = $_POST["delivery_company_id"];
$amount = $_POST["amount"];

if($delivery_company_id == "non"){
    $sql = "INSERT INTO Orders (buyer_id, product_id, amount, payment_method) 
    VALUES ('$user_id', '$product_id', '$amount', 'pay_on_delivery')";
}else{
    $sql = "INSERT INTO Orders (buyer_id, product_id, amount, payment_method, delivery_company_id)
    VALUES ('$user_id', '$product_id', '$amount', 'pay_on_delivery', '$delivery_company_id')";
}

$result = mysqli_query($conn, $sql);
if($result == 1){
    $sql = "UPDATE Products SET amount_in_stock = amount_in_stock - $amount WHERE product_id = '$product_id'";
    $result2 = mysqli_query($conn, $sql);
    if($result2 == 1){
       ?>
       <script>
           alert('تمت عملية الشراء بنجاح!');
           window.location = '../userProducts.php';
       </script>
       <?php
    }
        
}
echo mysqli_error($conn);

?>