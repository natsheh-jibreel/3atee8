<?php require('../db/db_connect.php');

session_start();
if(!isset($_SESSION['admin_login_error'])){
    $_SESSION['admin_login_error'] = '';
}
if(!isset($_SESSION['admin_username'])){
    $_SESSION['admin_username'] = '';
}
?>
<html lang="ar">

<head dir="rtl">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عًتيق</title>

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

</head>

<body>
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
                <div class="login-form">
                    <h2>تسجيل الدخول كمسؤول</h2>
                    <p style="color: red;"><?php echo $_SESSION["admin_login_error"]; ?></p>
                    <form action="db/login.php" method="post">
                        <div class="group-input">
                            <label for="username"> البريد الإلكتروني</label>
                            <input name="username" type="text" value="<?php echo $_SESSION['admin_username']; ?>" required>
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

<?php include("footer.html") ?>