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
                    <span>تعديل الملف الشخصي </span>
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
                    <h2>تعديل الملف الشخصي</h2>
                    <form action="db/editUserProfile.php" method="POST" name="register_form">
                        <div class="group-input">
                            <label for="first_name">الإسم الأول *</label>
                            <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="last_name">إسم العائلة *</label>
                            <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="city">المدينة  *</label>
                            <input type="text" id="city" name="city" value="<?php echo $city; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="address">العنوان *</label>
                            <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="phone">رقم الهاتف  *</label>
                            <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="email">البريد الإلكتروني   *</label>
                            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
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