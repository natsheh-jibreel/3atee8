<?php
include 'header.php'; 
if(!isset($_SESSION['login_error'])){
    $_SESSION['login_error'] = '';
}
if(!isset($_SESSION['email'])){
    $_SESSION['email'] = '';
}
?>

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
                    <h2>تسجيل الدخول</h2>
                    <p style="color: red;"><?php echo $_SESSION["login_error"]; ?></p>
                    <form action="db/login.php" method="post">
                        <div class="group-input">
                            <label for="email"> البريد الإلكتروني</label>
                            <input name="email" type="email" value="<?php echo $_SESSION['email']; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="pass">كلمة المرور</label>
                            <input name="password" type="password" required>
                        </div>
                        <button type="submit" class="site-btn login-btn">تسجيل</button>
                    </form>
                    <div class="switch-login">
                        <a href="register.php" class="or-login">أو قم بإنشاء حساب جديد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

<?php include("footer.php") ?>