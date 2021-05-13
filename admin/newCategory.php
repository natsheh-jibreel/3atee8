<?php 
    require('../db/db_connect.php');

    include 'header.php';
    if(!isset($_SESSION['add_category_error'])){
        $_SESSION['add_category_error'] = '';
    }
    

?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span>إضافة صنف</span>
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
                    <h2>إضافة صنف </h2>
                    <p style="color: red;"><?php echo $_SESSION["add_category_error"]; ?></p>
                    <form action="db/newCategory.php" method="POST" enctype="multipart/form-data">
                        <div class="group-input">
                            <label for="category_name">إسم الصنف *</label>
                            <input type="text" name="category_name" required>
                        </div>
                        <div class="group-input">
                            <label for="category_name"> الصنف الأب *</label>
                            <br>
                            <br>
                            <select name="parent" class="checkout-content">
                                <option value="-1">لا يوجد</option>
                                <?php 
                                    $sql = "SELECT * FROM Category WHERE parent_id is NULL";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                        <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?> </option>
                                <?php 
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="group-input">
                            <img src="" alt="" id="category-img">
                            <label for="img">ارفق صورة  </label>
                            <input type="file" name="img" id="input-img" onchange="return fileValidation()" required>
                        </div>
                        <button type="submit" id="submit" class="site-btn register-btn" required>إضافة صنف  </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
<?php include 'footer.html';?>

<script>
function fileValidation() {
    var fileInput = document.getElementById('input-img');
        
    var filePath = fileInput.value;
    
    // Allowing file type
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.JPG|\.JPEG|\.PNG|\.GIF)$/i;
        
    if (!allowedExtensions.exec(filePath)) {
        document.getElementById('category-img').src = null;
        alert('Invalid file type');
        fileInput.value = '';
        return false;
    } 
    else 
    {
        // Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('category-img').src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>
<script src="//cdn.ckeditor.com/4.16.0/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1');
</script>