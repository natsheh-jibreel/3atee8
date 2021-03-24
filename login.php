<?php include("header.html") ?>

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
                    <form action="#">
                        <div class="group-input">
                            <label for="username">اسم المستخدم أو البريد الإلكتروني</label>
                            <input type="text" id="username">
                        </div>
                        <div class="group-input">
                            <label for="pass">كلمة المرور</label>
                            <input type="text" id="pass">
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    حفظ كلمة المرور
                                    <input type="checkbox" id="save-pass">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#" class="forget-pass">نسيت كلمة المرور</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">تسجيل</button>
                    </form>
                    <div class="switch-login">
                        <a href="./register.php" class="or-login">أو قم بإنشاء حساب جديد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

<?php include("footer.html") ?>