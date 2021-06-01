<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row" dir="rtl">
            <div class="col-lg-6">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="#"><img src="Assets/img/logo.png" alt=""></a>
                    </div>
                    <div class="footer-widget">
                        <h5> تواصل معنا</h5>
                    </div>
                    <ul>
                        <li>هاتف:
                            <a href="tel: +970 592956266" dir="ltr">+970 592956266</a>
                        </li>
                        <li>البريد الالكتروني:
                            <a href="mailto:info@3atee8.com">info@3atee8.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-widget">
                    <h5>خريطة الموقع</h5>
                    <ul>
                        <li><a href="register.php">تسجيل</a></li>
                        <li><a href="contact.php">تواصل معنا</a></li>
                        <li><a href="search.php?selling_status=بيع">تسوق</a></li>
                        <li><a href="privacyConditions.php">سياسة الخصوصية</a></li>
                        <li><a href="termsOfUse.php">شروط وأحكام الإستخدام</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-widget">
                    <h5>التصنيفات</h5>
                    <ul>
                    <?php
                    $sql = "SELECT * FROM Category LIMIT 5";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<li><a href="search.php?category_id=', $row["category_id"],'">', $row["category_name"], '</a></li>';
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        حقوق النشر &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> جميع الحقوق محفوظة</div>
                    <div class="payment-pic">
                        <img src="img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/jquery.dd.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>