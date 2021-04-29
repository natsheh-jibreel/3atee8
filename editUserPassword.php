<?php include 'header.php';

$id = $_SESSION["user_id"];
$sql = "SELECT * from Users WHERE user_id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$first_name = $row["first_name"];
$last_name = $row["last_name"];
$address = $row["address"];
$phone = $row["mobile_numebr"];
$city = $row["city"];
$email = $row["email"];
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span>  تغيير كلمة المرور </span>
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
                    <h2>  تغيير كلمة المرور</h2>
                    <form action="db/editUserPassword.php" method="POST" name="register_form">
                    <div class="group-input">
                            <label for="pass">كلمة المرور الجديدة *</label>
                            <input type="password" id="pass" name="password" required>
                            <p id="pass_label"></p>
                        </div>
                        <div class="group-input">
                            <label for="con_pass">تأكيد كلمة المرور *</label>
                            <input type="password" id="con_pass" required>
                            <p id="con_pass_label"></p>
                        </div>
                        <button type="submit" id="submit" class="site-btn register-btn" required> حفظ</button>
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
    var passRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{8,}$/;
    if(passRegex.test(pass.value)){
        pass_label.innerHTML = "Valid"
        pass_label.style.color = "green";
        pass_label.style.fontSize = "15px";
    }else{
        pass_label.innerHTML = "Password should be at least 8 characters and contains at least one number and one letter";
        pass_label.style.color = "red";
        pass_label.style.fontSize = "15px";
    }
    if(pass.value === con_pass.value){
        con_pass_label.innerHTML = "Passwords Match"
        con_pass_label.style.color = "green";
        con_pass_label.style.fontSize = "15px";
        button.disabled = false;
    }else{
        con_pass_label.innerHTML = "Passwords Doesn't Match";
        con_pass_label.style.color = "red";
        con_pass_label.style.fontSize = "15px";
        button.disabled = true;
    }
}

con_pass.onkeyup = function(){
    if(pass.value === con_pass.value){
        con_pass_label.innerHTML = "Passwords Match"
        con_pass_label.style.color = "green";
        con_pass_label.style.fontSize = "15px";
        button.disabled = false;
    }else{
        con_pass_label.innerHTML = "Passwords Doesn't Match";
        con_pass_label.style.color = "red";
        con_pass_label.style.fontSize = "15px";
        button.disabled = true;
    }
}
</script>