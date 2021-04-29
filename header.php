<?php 
session_start();
require("db/db_connect.php");
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
    <link rel="stylesheet" href="styles/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="styles/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="styles/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="styles/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="styles/nice-select.css" type="text/css">
    <link rel="stylesheet" href="styles/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="styles/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="styles/style.css" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.all.min.js" integrity="sha256-J9avsZWTdcAPp1YASuhlEH42nySYLmm0Jw1txwkuqQw=" crossorigin="anonymous"></script></head>

<body>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="nav-item">
            <div class="container" dir="rtl">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <div class="right-nav">
                            <li class="active"><a href="./index.php">الصفحة الرئيسية</a></li>
                            <li><a href="#">الأصناف</a>
                                <ul class="dropdown">
                                    <?php
                                    $sql = "SELECT * FROM Category";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<li><a href="search.php?category_id=', $row["category_id"],'">', $row["category_name"], '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="#">ابحث عن</a>
                                <ul class="dropdown">
                                    <li><a href="search.php?selling_status=بيع">شراء</a></li>
                                    <li><a href="search.php?selling_status=اقراض">استئجار</a></li>
                                    <li><a href="search.php?selling_status=تبرع">تبرع</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.php">تواصل معنا</a></li>
                        </div>

                        <div class="left-nav">
                        <?php 
                        if(isset($_SESSION["user_auth"])){
                            if($_SESSION["user_auth"] == true){
                                echo '<li><a href="addItem.php">اعرض منتجك</a></li>';
                                echo '<li><a href="#">حسابي</a>
                                        <ul class="dropdown">
                                                <li><a href="viewUserProfile.php">عرض الملف الشخصي</a></li>
                                                <li><a href="userProducts.php">منتجاتي</a></li>
                                                <li><a href="userOrders.php?user_id='.$_SESSION["user_id"].'">مشترياتي</a></li>
                                                <li><a href="db/logout.php">تسجيل الخروج</a></li>
                                        </ul>
                                    </li>';
                            }
                        }else{
                            echo  '<li><a href="./register.php">التسجيل</a></li>
                                    <li><a href="./login.php" class="login-panel"><i class="fa fa-user"></i>  تسجيل الدخول</a></li>';
                        }
                        ?>
                        </div>

                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->