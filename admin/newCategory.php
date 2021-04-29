<?php 
    require('../db/db_connect.php');

    session_start();
    if(!isset($_SESSION['add_category_error'])){
        $_SESSION['add_category_error'] = '';
    }
    include 'header.html';

?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span>إضافة صنف</span>
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
                    <h2>إضافة صنف </h2>
                    <p style="color: red;"><?php echo $_SESSION["add_category_error"]; ?></p>
                    <form action="db/newCategory.php" method="POST">
                        <div class="group-input">
                            <label for="category_name">إسم الصنف *</label>
                            <input type="text" name="category_name" required>
                        </div>
                        <button type="submit" id="submit" class="site-btn register-btn" required>إضافة صنف  </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
<?php include 'footer.html';?>