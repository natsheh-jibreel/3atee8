<?php 
    require('../db/db_connect.php');
    include 'header.html';

?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span> الأصناف</span>
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
                    <td>اسم الصنف</td>
                </tr>
                <?php 
                $counter = 1;
                $sql = "SELECT category_id, category_name FROM Category ORDER BY category_id DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr class="d-row">
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $row["category_name"]; ?></td>
                    <td style="display: inline-block;">
                        <a href="editCategory.php?id=<?php echo $row["category_id"]; ?>" style="display:inline-block;margin-top: 8px;">
                            <i style="color: green;font-size:x-large;padding:0 2px;margin: 0 2px;background-color:white;border:none;" class="fa fa-edit"></i>
                        </a>
                        <a onclick="clicked();" href="db/deleteCategory.php?id=<?php echo $row["category_id"]; ?>" style="display:inline-block;">
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

<script type="text/javascript">
    function clicked() {
       if (confirm('هل انت متاكد انك تريد حذف هذا الصنف')) {
           yourformelement.submit();
       } else {
           return false;
       }
    }

</script>