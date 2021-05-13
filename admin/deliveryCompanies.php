<?php 
    require('../db/db_connect.php');
    include 'header.php';

?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span> شركات التوصيل</span>
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
                    <td>اسم الشركة</td>
                    <td>رقم الهاتف </td>
                    <td>سعر النقل</td>
                </tr>
                <?php 
                $counter = 1;
                $sql = "SELECT * FROM DeliveryCompanies ORDER BY company_id DESC";
                $result = mysqli_query($conn, $sql);
                echo mysqli_error($conn);
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr class="d-row">
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $row["company_name"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["delivery_price"]; ?></td>
                    <td style="display: inline-block;">
                        <a href="editCompany.php?id=<?php echo $row["company_id"]; ?>" style="display:inline-block;margin-top: 8px;">
                            <i style="color: green;font-size:x-large;padding:0 2px;margin: 0 2px;background-color:white;border:none;" class="fa fa-edit"></i>
                        </a>
                        <a onclick="return confirm('هل انت متاكد انك تريد حذف شركة التوصيل؟');" href="db/deleteCompany.php?id=<?php echo $row["company_id"]; ?>" style="display:inline-block;">
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