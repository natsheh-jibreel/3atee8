<?php 
    include 'header.php';

?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span> المستخدمون</span>
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
                    <td>اسم المستخدم</td>
                    <td>البريد الإلكتروني</td>
                    <td>المنتجات </td>
                </tr>
                <?php 
                $counter = 1;
                $sql = "SELECT user_id, first_name, last_name, email, is_promoted FROM Users ORDER BY user_id DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr class="d-row">
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $row["first_name"] . ' ' . $row["last_name"] ; ?></td>
                    <td><a href="mailto: <?php echo $row["email"]; ?>"><?php echo $row["email"]; ?></a></td>
                    <td><a href="../search.php?user_id=<?php echo $row["user_id"]; ?>">عرض المنتجات</a></td>
                    <td style="display: inline-block;">
                        <?php if($row["is_promoted"] == 0){ ?>
                        <a href="db/promoteUser.php?id=<?php echo $row["user_id"]; ?>" style="display:inline-block;margin-top: 8px;">
                            <i style="color: green;font-size:x-large;padding:0 2px;margin: 0 2px;background-color:white;border:none;" class="fa fa-star"></i>
                        </a>
                        <?php } ?>
                        <a onclick="return confirm('هل انت متاكد انك تريد حذف هذا المستخدم؟');" href="db/deleteUser.php?id=<?php echo $row["user_id"]; ?>" style="display:inline-block;">
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
<?php include 'footer.html';?>