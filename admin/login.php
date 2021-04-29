<?php require('../db/db_connect.php');

session_start();
if(!isset($_SESSION['admin_login_error'])){
    $_SESSION['admin_login_error'] = '';
}
if(!isset($_SESSION['admin_username'])){
    $_SESSION['admin_username'] = '';
}
include 'header.html'; ?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span> تسجيل الدخول</span>
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
                <div class="login-form">
                    <h2>تسجيل الدخول كمسؤول</h2>
                    <p style="color: red;"><?php echo $_SESSION["admin_login_error"]; ?></p>
                    <form action="db/login.php" method="post">
                        <div class="group-input">
                            <label for="username"> البريد الإلكتروني</label>
                            <input name="username" type="text" value="<?php echo $_SESSION['admin_username']; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="password">كلمة المرور</label>
                            <input name="password" type="password" required>
                        </div>
                        <button type="submit" class="site-btn login-btn"> تسجيل الدخول</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

<?php include("footer.html") ?>