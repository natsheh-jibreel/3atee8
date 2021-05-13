<?php 
    require('../db/db_connect.php');
    include 'header.php';
    if(!isset($_SESSION['delivery_company_register_error'])){
        $_SESSION['delivery_company_register_error'] = '';
    }

?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span>إضافة شركة توصيل</span>
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
                    <h2>إضافة شركة توصيل</h2>
                    <p style="color: red;"><?php echo $_SESSION["delivery_company_register_error"]; ?></p>
                    <form action="db/registerDC.php" method="POST">
                        <div class="group-input">
                            <label for="company_name">إسم الشركة *</label>
                            <input type="text" name="company_name" required>
                        </div>
                        <div class="group-input">
                            <label for="company_phone">رقم الهاتف *</label>
                            <input type="text" name="company_phone" required>
                        </div>
                        <div class="group-input">
                            <label for="delivery_price">( ₪ ) سعر التوصيل   *</label>
                            <input type="number" name="delivery_price" required>
                        </div>
                        <div class="group-input">
                            <label for="delivery_price">البريد الإلكتروني  *</label>
                            <input type="email" name="email" required>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
<?php include 'footer.html';?>

<script>
var pass = document.getElementById("pass");
var con_pass = document.getElementById("con_pass");
var pass_label = document.getElementById("pass_label");
var con_pass_label = document.getElementById("con_pass_label");
var button = document.getElementById("submit");

pass.onkeyup = function(){
    if(pass.value.length >= 8){
        pass_label.innerHTML = "مقبولة"
        pass_label.style.color = "green";
        pass_label.style.fontSize = "15px";
    }else{
        pass_label.innerHTML = "يجب أن لا تقل كلمة السر عن 8 أحرف";
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