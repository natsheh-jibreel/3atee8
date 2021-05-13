<?php 
    require('../db/db_connect.php');

    include 'header.php';
    $id = $_GET["id"];
    $sql = "SELECT * FROM DeliveryCompanies WHERE company_id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    

?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span>تعديل شركة توصيل</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>تعديل شركة التوصيل </h2>
                    <form action="db/editCompany.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="group-input">
                            <label for="company_name">إسم الشركة *</label>
                            <input type="text" name="name" value="<?php echo $row["company_name"]; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="company_phone">رقم الهاتف *</label>
                            <input type="text" name="phone" value="<?php echo $row["phone"]; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="delivery_price">( ₪ ) سعر التوصيل   *</label>
                            <input type="number" name="price" value="<?php echo $row["delivery_price"]; ?>" required>
                        </div>
                        <button type="submit" class="site-btn register-btn" required>حفظ  </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
<?php include 'footer.html';?>


<script>
    var b = document.getElementById('submit');
</script>