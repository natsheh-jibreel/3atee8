<?php include("header.php");
if(isset($_SESSION["user_auth"])){
    if(!($_SESSION["user_auth"] == true)){
        header("location: login.php");
    }
}else{
    header("location: login.php");
}
?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span>  إضافة منتج</span>
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
                <div class="add-form">
                    <h2>عرض منتج</h2>
                    <form action="db/addItem.php" method="post" enctype="multipart/form-data" id="add-item">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>">
                        <div class="group-input">
                            <select name="category_id" required>
                                <option value="" selected disabled>اختر الفئة </option>
                                <?php
                                    $sql = "SELECT * FROM Category";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<option value="', $row["category_id"] ,'">', $row["category_name"] ,' </option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="group-input">
                            <label for="name">اسم المنتج</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <label for="name">وصف المنتج</label>
                        <div class="group-input">
                            <textarea dir="rtl" id="editor1" name="describtion" rows="5" form="add-item" limit="2500" required></textarea>
                        </div>
                        <div class="group-input">
                            <label for="address"> الموقع</label>
                            <input type="text" name="location" placeholder="المدينة/القرية + المنطقة" required>
                        </div>
                        <div class="group-input">
                            <select name="status" required>
                                <option value="" selected disabled>حالة المنتج</option>
                                <option value="ممتاز"> ممتاز</option>
                                <option value="جيد جداً"> جيد جداً</option>
                                <option value="مقبول"> مقبول</option>
                                <option value="سيء"> سيء</option>
                            </select>
                        </div>
                        <div class="group-input">
                            <label for="sellingStatus" dir="rtl"> هل المنتج ل:</label>
                            <select id="sell-stat" name="sellingStatus" required>
                                <option value="بيع">بيع</option>
                                <option value="اقراض">اقراض</option>
                                <option value="تبرع">تبرع</option>
                            </select>
                        </div>
                        <div class="group-input">
                            <label for="amount">الكمية  </label>
                            <input type="number" name="amount" required>
                        </div>
                        <div class="group-input">
                            <label id="price-label" for="price">(₪)السعر  </label>
                            <input type="number" id="price" name="price" value=0 required>
                        </div>
                        <div class="group-input">
                            <img src="" alt="" id="product-img">
                            <label for="img">ارفق صورة  </label>
                            <input type="file" name="img" id="input-img" onchange="return fileValidation()" required>
                        </div>
                        <button type="submit" class="site-btn login-btn">إضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

<?php include("footer.php") ?>

<script>
function fileValidation() {
    var fileInput = 
        document.getElementById('input-img');
        
    var filePath = fileInput.value;
    
    // Allowing file type
    var allowedExtensions = 
            /(\.jpg|\.jpeg|\.png|\.gif|\.JPG|\.JPEG|\.PNG|\.GIF)$/i;
        
    if (!allowedExtensions.exec(filePath)) {
        document.getElementById('product-img').src = null;
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
                document.getElementById('product-img').src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

var sellStat = document.getElementById("sell-stat");
var priceLabel = document.getElementById("price-label");
var price = document.getElementById("price");

sellStat.onchange = function(){
    if(sellStat.value == 'اقراض'){
        priceLabel.innerHTML = ' (₪)السعر / يوم';
    }else{
        priceLabel.innerHTML = '(₪)السعر';
    }
    if(sellStat.value == 'تبرع'){
        price.value = '0';
        price.disabled = true;
    }else{
        price.disabled = false;
    }
}
</script>
<script src="//cdn.ckeditor.com/4.16.0/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1');
</script>