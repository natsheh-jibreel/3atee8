<?php include('header.php');?>
<?php
if(isset($_POST["submit"])){
    if($_POST["submit"]) {
        mail("info@3atee8.com", "Email From: ". $_POST["name"] , $_POST["message"]. "\nFrom: ". $_POST["email"]);
    }
}
?>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
                    <span>تواصل معنا</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>تواصل معنا</h4>
                </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span>رقم الهاتف:</span>
                            <p dir="ltr"><a href="tel:+970 592956266">+970 592956266</a></p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span>البريد الالكتروني:</span>
                            <p><a href="mailto: info@3atee8.com">info@3atee8.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>أرسل رسالة</h4>
                        <p>سوف نقوم بالتواصل معك والاجابة على جميع استفساراتك</p>
                        <form action="contact.php" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input name="name" type="text" placeholder="الاسم" dir="rtl">
                                </div>
                                <div class="col-lg-6">
                                    <input name="email" type="text" placeholder="البريد الالكتروني" dir="rtl">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="الرسالة" dir="rtl"></textarea>
                                    <button type="submit" class="site-btn">إرسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
<?php include('footer.php');?>