<?php 
if(!isset($_SESSION["dc_login_error"])){
    $_SESSION["dc_login_error"] = '';
}
if(!isset($_SESSION['dc_email'])){
    $_SESSION['dc_email'] = '';
}
?>

<html lang="ar">

<head dir="rtl">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عًتيق</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Styles -->
    <!--<link rel="stylesheet" href="styles/bootstrap.min.css" type="text/css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.rtl.min.css" integrity="sha384-4dNpRvNX0c/TdYEbYup8qbjvjaMrgUPh+g4I03CnNtANuv+VAvPL6LqdwzZKV38G" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../styles/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../styles/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../styles/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../styles/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../styles/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../styles/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../styles/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../styles/style.css" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.all.min.js" integrity="sha256-J9avsZWTdcAPp1YASuhlEH42nySYLmm0Jw1txwkuqQw=" crossorigin="anonymous"></script></head>

<body>

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>تسجيل الدخول</h2>
                    <p style="color: red;"><?php echo $_SESSION["dc_login_error"]; ?></p>
                    <form action="db/login.php" method="post">
                        <div class="group-input">
                            <label for="email"> البريد الإلكتروني</label>
                            <input name="email" type="email" value="<?php echo $_SESSION['dc_email']; ?>" required>
                        </div>
                        <div class="group-input">
                            <label for="password">كلمة المرور</label>
                            <input name="password" type="password" required>
                        </div>
                        <button type="submit" class="site-btn login-btn"> تسجيل الدخول</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

<!-- Js Plugins -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/jquery.countdown.min.js"></script>
<script src="../js/jquery.nice-select.min.js"></script>
<script src="../js/jquery.zoom.min.js"></script>
<script src="../js/jquery.dd.min.js"></script>
<script src="../js/jquery.slicknav.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/main.js"></script>
</body>

</html>
