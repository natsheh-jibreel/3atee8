<?php include 'header.php';
if(isset($_SESSION["user_auth"])){
    if(!($_SESSION["user_auth"] == true)){
        header("location: login.php");
    }
}else{
    header("location: login.php");
}
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
                    <span>عرض الملف الشخصي </span>
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
                <div class="view-form">
                    <h2>عرض الملف الشخصي</h2>
                        <div class="group-output">
                            <label >الإسم الأول: <?php echo $first_name; ?></label>
                        </div>
                        <div class="group-output">
                            <label>إسم العائلة: <?php echo $last_name; ?></label>
                        </div>
                        <div class="group-output">
                            <label>المدينة  :<?php echo $city; ?></label>
                        </div>
                        <div class="group-output">
                            <label for="address">العنوان :<?php echo $address; ?></label>
                        </div>
                        <div class="group-output">
                            <label for="phone">رقم الهاتف  : <?php echo $phone; ?></label>
                        </div>
                        <div class="group-output">
                            <label for="email">البريد الإلكتروني   : <?php echo $email; ?></label>
                        </div>
                        <button class="site-btn"><a href="editUserProfile.php" style="color: white;">تعديل الملف الشخصي</a> </button>
                        <button class="site-btn"><a href="editUserPassword.php" style="color: white;">تغيير كلمة المرور</a> </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
<?php include 'footer.php';?>