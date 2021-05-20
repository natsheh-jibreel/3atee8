<?php 
session_start();
require("../db/db_connect.php");
if(!isset($_SESSION["dc_id"])){
    header("location: login.php");
}
?>
<html lang="ar">

<head dir="rtl">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عًتيق</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Styles -->
    <!--<link rel="stylesheet" href="styles/bootstrap.min.css" type="text/css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.rtl.min.css" integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../styles/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../styles/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../styles/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../styles/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../styles/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../styles/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../styles/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../styles/style.css" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.all.min.js" integrity="sha256-J9avsZWTdcAPp1YASuhlEH42nySYLmm0Jw1txwkuqQw=" crossorigin="anonymous"></script></head>

<body>
<div class="table-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <table class="display-table">
                <tr class="head-row">
                    <td>#</td>
                    <td>اسم المنتج</td>
                    <td>السعر </td>
                    <td>الكمية </td>
                    <td>المجموع </td>
                    <td>اسم البائع </td>
                    <td>موقع البائع </td>
                    <td>هاتف البائع </td>
                    <td>اسم المشتري </td>
                    <td>موقع المشتري </td>
                    <td>هاتف المشتري </td>
                </tr>
                <?php 
                $counter = 1;
                $dc_id = $_SESSION["dc_id"];
                $orderSql = "SELECT order_id, product_id, amount, buyer_id, is_delivered FROM Orders WHERE delivery_company_id = '$dc_id' ORDER BY is_delivered ASC, order_id DESC";
                $orderResult = mysqli_query($conn, $orderSql);
                while($order = mysqli_fetch_assoc($orderResult)){
                    //buyer info:
                    $buyer_id = $order["buyer_id"];
                    $buyerSql = "SELECT CONCAT(first_name , ' ' , last_name) as name, CONCAT(city , ' / ' , address) as location, mobile_numebr 
                                FROM Users WHERE user_id = '$buyer_id'";
                    $buyerResult = mysqli_query($conn, $buyerSql);
                    $buyer = mysqli_fetch_assoc($buyerResult);
                    //product info:
                    $product_id = $order["product_id"];
                    $productSql = "SELECT product_id, product_name, product_price, user_id FROM Products WHERE product_id = '$product_id'";
                    $productResult = mysqli_query($conn, $productSql);
                    $product = mysqli_fetch_assoc($productResult);
                    
                    //seller info:
                    $seller_id = $product["user_id"];
                    $sellerSql = "SELECT CONCAT(first_name , ' ' , last_name) as name, CONCAT(city , ' / ' , address) as location, mobile_numebr 
                                FROM Users WHERE user_id = '$seller_id'";
                    $sellerResult = mysqli_query($conn, $sellerSql);
                    $seller = mysqli_fetch_assoc($sellerResult);
                    
                ?>
                <tr class="d-row" <?php if($order["is_delivered"] == 1) echo 'style="background-color: rgba(30, 180, 30, 0.6);"' ?>>
                    <td><?php echo $counter; ?></td>
                    <td><a href="../productPage.php?product_id=<?php echo $product["product_id"];?>"><?php echo $product["product_name"]; ?></a></td>
                    <td >
                        <?php echo $product["product_price"]; ?>
                        <input type="hidden" value="<?php echo $product["product_price"]; ?>" id="price<?php echo $counter;?>">
                    </td>
                    <td>
                        <?php echo $order["amount"]; ?>
                        <input type="hidden" value="<?php echo $order["amount"]; ?>" id="amount<?php echo $counter;?>">
                    </td>
                    <td>
                        <output id="total<?php echo $counter;?>"></output>
                    </td>
                    <td><?php echo $seller["name"]; ?></td>
                    <td><?php echo $seller["location"]; ?></td>
                    <td><a href="tel:<?php echo $seller["mobile_numebr"]; ?>"><?php echo $seller["mobile_numebr"]; ?></a></td>
                    <td><?php echo $buyer["name"]; ?></td>
                    <td><?php echo $buyer["location"]; ?></td>
                    <td><a href="tel:<?php echo $buyer["mobile_numebr"]; ?>"><?php echo $buyer["mobile_numebr"]; ?></a></td>
                    <td>
                    <?php if($order["is_delivered"] == 0){ ?>
                        <a href="db/check.php?id=<?php echo $order["order_id"]; ?>" style="display:inline-block;margin-top: 8px;">
                            <i style="color: green;font-size:x-large;padding:0 2px;margin: 0 2px;background-color:white;border:none;" class="fa fa-check"></i>
                        </a>
                        <?php } ?>
                    </td>
                </tr>
                <?php
                $counter +=1;    
                }
                echo '<script type="text/JavaScript"> 
                        var total_items = '. $counter .';
                        for (i=1; i<=total_items; i++) {
                            var price = document.getElementById("price"+i).value;
                            var amount = document.getElementById("amount"+i).value;
                            var total = document.getElementById("total"+i);
                            var result = parseInt(amount) * parseInt(price);
                            total.value = result;
                        }
                    </script>';
                ?>
            </table>
            </div>
        </div>
    </div>
</div>

<!-- Js Plugins -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/jquery.countdown.min.js"></script>
<script src="../js/jquery.nice-select.min.js"></script>
<script src="../js/jquery.zoom.min.js"></script>
<script src="../js/jquery.dd.min.js"></script>
<script src="../js/jquery.slicknav.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/main.js"></script>
</body>

</html>
