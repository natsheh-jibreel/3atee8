<?php include("header.php");?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span> المنتجات</span>
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
                    <td>التصنيف </td>
                    <td>الكمية </td>
                </tr>
                <?php 
                $counter = 1;
                $sql = "SELECT product_id, product_name, user_id, category_id, is_promoted, amount_in_stock FROM Products ORDER BY product_id DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $user_id = $row["user_id"];
                    $category_id = $row["category_id"];
                    $userSql = "SELECT email FROM Users WHERE user_id = '$user_id'";
                    $categorySql = "SELECT category_name FROM Category WHERE category_id = '$category_id'";
                    $userResult = mysqli_query($conn, $userSql);
                    $categoryResult = mysqli_query($conn, $categorySql);
                    $userRow = mysqli_fetch_assoc($userResult);
                    $categoryRow = mysqli_fetch_assoc($categoryResult);
                    $user_email = $userRow["email"];
                    $category_name = $categoryRow["category_name"];
                ?>
                <tr class="d-row">
                    <td><?php echo $counter; ?></td>
                    <td><a href=""><?php echo $row["product_name"]; ?></a></td>
                    <td><?php echo $category_name; ?></td>
                    <td><?php echo $row["amount_in_stock"]; ?></td>
                    <td style="display: inline-block;">
                        <a onclick="clicked();" href="db/deleteProduct.php?id=<?php echo $row["product_id"]; ?>" style="display:inline-block;">
                            <i style="color: red;font-size:x-large;padding:0 2px;margin: 0 2px;background-color:transparent;" class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                $counter +=1;    
                }
                ?>
            </table>
            </div>
        </div>
    </div>
</div>

<?php include("footer.html");?>