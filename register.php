<?php
    include 'header.php';
    if(!isset($_SESSION['register_error'])){
        $_SESSION['register_error'] = '';
    }
    if(!isset($_SESSION['first_name'])){
        $_SESSION['first_name'] = '';
    }
    if(!isset($_SESSION['last_name'])){
        $_SESSION['last_name'] = '';
    }
    if(!isset($_SESSION['address'])){
        $_SESSION['address'] = '';
    }
    if(!isset($_SESSION['phone'])){
        $_SESSION['phone'] = '';
    }
    if(!isset($_SESSION['city'])){
        $_SESSION['city'] = '';
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
                    <p style="color: red;"><?php echo $_SESSION["register_error"]; ?></p>
                    <form action="db/register.php" method="POST" name="register_form">
                        <div class="group-input">
                            <label for="first_name">الإسم الأول *</label>
                            <input type="text" id="first_name" name="first_name" value="<?php echo $_SESSION["first_name"]; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="last_name">إسم العائلة *</label>
                            <input type="text" id="last_name" name="last_name" value="<?php echo $_SESSION["last_name"]; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="city">المدينة  *</label>
                            <input type="text" id="city" name="city" value="<?php echo $_SESSION["city"]; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="address">العنوان *</label>
                            <input type="text" id="address" name="address" value="<?php echo $_SESSION["address"]; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="phone">رقم الهاتف (مع مقدمة الواتس)  *</label>
                            <input type="text" id="phone" name="phone" value="<?php echo $_SESSION["phone"]; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="email">البريد الإلكتروني   *</label>
                            <input type="email" id="email" name="email" value="<?php echo $_SESSION["email"]; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="pass">كلمة المرور *</label>
                            <input type="password" id="pass" name="password" required>
                            <p id="pass_label"></p>
                        </div>
                        <div class="group-input">
                            <label for="con_pass">تأكيد كلمة المرور *</label>
                            <input type="password" id="con_pass" required>
                            <p id="con_pass_label"></p>
                        </div>
                        <button type="submit" id="submit" class="site-btn register-btn" disabled required>إنشاء حساب</button>
                    </form>
                    <div class="switch-login">
                        <a href="./login.php" class="or-login">تسجيل الدخول</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
<?php include 'footer.php';?>

<script>
var pass = document.getElementById("pass");
var con_pass = document.getElementById("con_pass");
var pass_label = document.getElementById("pass_label");
var con_pass_label = document.getElementById("con_pass_label");
var button = document.getElementById("submit");

pass.onkeyup = function(){
    var passRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{8,}$/;
     if(passRegex.test(pass.value)){
         pass_label.innerHTML = "مقبول"
         pass_label.style.color = "green";
         pass_label.style.fontSize = "15px";
     }else{
         pass_label.innerHTML = "كلمة المرور يجب ان تكون على الاقل ٨ احرف وتحتوي رقم وحرف واحد على الاقل";
         pass_label.style.color = "red";
         pass_label.style.fontSize = "15px";
     }
    if(pass.value === con_pass.value){
        con_pass_label.innerHTML = "كلمات السر متطابقة"
        con_pass_label.style.color = "green";
        con_pass_label.style.fontSize = "15px";
        button.disabled = false;
    }else{
        con_pass_label.innerHTML = "كلمات السر لا تتطابق";
        con_pass_label.style.color = "red";
        con_pass_label.style.fontSize = "15px";
        button.disabled = true;
    }
}

con_pass.onkeyup = function(){
    if(pass.value === con_pass.value){
        con_pass_label.innerHTML = "كلمات السر متطابقة"
        con_pass_label.style.color = "green";
        con_pass_label.style.fontSize = "15px";
        button.disabled = false;
    }else{
        con_pass_label.innerHTML = "كلمات السر لا تتطابق";
        con_pass_label.style.color = "red";
        con_pass_label.style.fontSize = "15px";
        button.disabled = true;
    }
}
</script>