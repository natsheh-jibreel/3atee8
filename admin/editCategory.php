<?php 
    require('../db/db_connect.php');

    session_start();
    $id = $_GET["id"];
    $sql = "SELECT * FROM Category WHERE category_id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    include 'header.html';

?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span>تعديل صنف</span>
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
                    <h2>تعديل صنف </h2>
                    <form action="db/editCategory.php" method="POST">
                        <div class="group-input">
                            <label for="category_name">إسم الصنف *</label>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="text" name="name" value="<?php echo $row["category_name"]; ?>" required>
                        </div>
                        <button type="submit" class="site-btn register-btn" required>حفظ  </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
<?php include 'footer.html';?>


<script>
    var b = document.getElementById('submit');
</script>