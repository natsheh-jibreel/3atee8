<?php include 'header.html';?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span>حساب جديد</span>
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
                    <h2>إنشاء حساب جديد</h2>
                    <form action="#">
                        <div class="group-input">
                            <label for="username">الإسم الرباعي *</label>
                            <input type="text" id="username">
                        </div>
                        <div class="group-input">
                            <label for="address">العنوان *</label>
                            <input type="text" id="address">
                        </div>
                        <div class="group-input">
                            <label for="landphone">رقم الهاتف الأرضي *</label>
                            <input type="text" id="landphone">
                        </div>
                        <div class="group-input">
                            <label for="phone">رقم الهاتف  *</label>
                            <input type="text" id="phone">
                        </div>
                        <div class="group-input">
                            <label for="email">البريد الإلكتروني   *</label>
                            <input type="text" id="email">
                        </div>
                        <div class="group-input">
                            <label for="pass">كلمة المرور *</label>
                            <input type="text" id="pass">
                        </div>
                        <div class="group-input">
                            <label for="con-pass">تأكيد كلمة المرور *</label>
                            <input type="text" id="con-pass">
                        </div>
                        <button type="submit" class="site-btn register-btn">إنشاء حساب</button>
                    </form>
                    <div class="switch-login">
                        <a href="./login.php" class="or-login">أو قم بالتسجيل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
<?php include 'footer.html';?>