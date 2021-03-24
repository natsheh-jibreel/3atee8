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
                <div class="add-form">
                    <h2>عرض منتج</h2>
                    <form action="#">
                        <div class="group-input">
                            <label for="name">اسم المنتج</label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="group-input">
                            <label for="address"> الموقع</label>
                            <input type="text" id="address" name="address">
                        </div>
                        <div class="group-input">
                            <label for="status">حالة المنتج</label>
                            <input type="text" id="status" name="status">
                        </div>
                        <div class="group-input">
                            <label for="usageTime">مدة الإستخدام </label>
                            <div style="display:inline-flex;">
                                <input type="number" id="years" name="years" placeholder="عام">
                                <input type="number" id="months" name="months" placeholder="شهر">
                            </div>
                        </div>
                        <div class="group-input">
                            <label for="sellingStatus" dir="rtl"> هل المنتج ل:</label>
                            <select name="sellingStatus" id="sellingStatus">
                                <option value="sell">بيع</option>
                                <option value="borrow">اقراض</option>
                                <option value="charity">تبرع</option>
                            </select>
                        </div>
                        <div class="group-input">
                            <label for="price">السعر  </label>
                            <input type="number" id="price" name="price">
                        </div>
                        <button type="submit" class="site-btn login-btn">إضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

<?php include("footer.html") ?>