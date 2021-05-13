<?php include 'header.php'; 
if(isset($_SESSION["user_auth"])){
    if(!($_SESSION["user_auth"] == true)){
        header("location: login.php");
    }
}else{
    header("location: login.php");
}
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span> الطلبات</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->
<div class="table-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="display-table">
                <tr class="head-row">
                    <td>#</td>
                    <td>اسم المنتج</td>
                    <td>السعر </td>
                    <td>الكمية </td>
                    <td>المجموع </td>
                </tr>
                <?php 
                $counter = 1;
                $user_id = $_SESSION["user_id"];
                $sql = "SELECT product_id, amount FROM Orders WHERE buyer_id = '$user_id' ORDER BY product_id DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $product_id = $row["product_id"];
                    $productSql = "SELECT product_name, product_price FROM Products WHERE product_id = '$product_id'";
                    $productResult = mysqli_query($conn, $productSql);
                    $productRow = mysqli_fetch_assoc($productResult);
                    $product_name = $productRow["product_name"];
                    $product_price = $productRow["product_price"];
                    $amount = $row["amount"];
                ?>
                <tr class="d-row">
                    <td><?php echo $counter; ?></td>
                    
                    <td><a href="productPage.php?product_id=<?php echo $product_id;?>"><?php echo $product_name; ?></a></td>
                    <td >
                        <?php echo $product_price; ?>
                        <input type="hidden" value="<?php echo $product_price; ?>" id="price<?php echo $counter;?>">
                    </td>
                    <td>
                        <?php echo $amount; ?>
                        <input type="hidden" value="<?php echo $amount; ?>" id="amount<?php echo $counter;?>">
                    </td>
                    <td>
                        <output id="total<?php echo $counter;?>"></output>
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

<?php include 'footer.php'; ?>
