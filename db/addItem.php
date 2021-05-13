<?php 
require("db_connect.php");
$user_id = $_POST["user_id"];
$name = $_POST["name"];
$category_id = $_POST["category_id"];
$location = $_POST["location"];
$status = $_POST["status"];
$describtion = $_POST["describtion"];
$sellingStatus = $_POST["sellingStatus"];
$amount = $_POST["amount"];
$price = $_POST["price"];
$img = $_FILES["img"];
$img_name = $img["name"];
$img_tmp_name = $img["tmp_name"];
$tag = pathinfo($img_name, PATHINFO_EXTENSION);
$new_name = $name . date("mdhi") . '.' . $tag;
move_uploaded_file($img_tmp_name,  "../Assets/ProductsImages/$new_name");
echo $img;
$sql = "SELECT is_promoted FROM Users WHERE user_id = $user_id";
$result1 = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result1);

if($user["is_promoted"] == 1){
    $sql = "INSERT INTO Products 
                    (product_name, product_price, product_image, category_id, user_id, amount_in_stock,product_status,selling_status,location, describtion, is_promoted) 
            VALUES ('$name', '$price', '$new_name', '$category_id', '$user_id', '$amount', '$status', '$sellingStatus', '$location', '$describtion', '1')";
}else{
    $sql = "INSERT INTO Products 
                    (product_name, product_price, product_image, category_id, user_id, amount_in_stock,product_status,selling_status,location, describtion) 
            VALUES ('$name', '$price', '$new_name', '$category_id', '$user_id', '$amount', '$status', '$sellingStatus', '$location', '$describtion')";
}
$result = mysqli_query($conn, $sql);

if($result == 1){
    echo '<script>
    alert("تمت عملية اضافة المنتج بنجاح");
    window.location = "'.$SITE_URL.'../userProducts.php";
    </script>';
}else{
    echo '<script>
    alert("للاسف لم تتم عملية اضافة المنتج.. تأكد من المعلومات المدخلة");
    window.location = "'.$SITE_URL.'../addItem.php";
    </script>';
}
?>
