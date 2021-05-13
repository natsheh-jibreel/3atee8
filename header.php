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
    <header class="header-section" dir="rtl">
    <nav class="navbar navbar-expand-md navbar-hover">
        <a class="navbar-brand" href="#"><img src="" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHover" aria-controls="navbarDD" aria-expanded="false" aria-label="Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse topnav" id="navbarHover">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">الصفحة الرئيسية<span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        الأصناف 
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $sql = "SELECT * FROM Category WHERE parent_id is NULL";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<li><a class="dropdown-item" href="search.php?category_id=', $row["category_id"],'"><img src="Assets/CategoriesImages/',$row["img"],'" /><p>', $row["category_name"], '</p></a>
                            <ul class="dropdown-menu submenu">';
                            $p_id = $row["category_id"];
                            $sql = "SELECT * FROM Category WHERE parent_id = '$p_id'";
                            $c_result = mysqli_query($conn, $sql);
                            while($c_row = mysqli_fetch_assoc($c_result)){
                                echo '<li><a class="dropdown-item" href="search.php?category_id=', $c_row["category_id"],'"><img src="Assets/CategoriesImages/',$c_row["img"],'" /><p>', $c_row["category_name"], '</p></a></li>';
                            }
                            echo '</ul></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        تبحث عن: 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="search.php?selling_status=بيع"><p>شراء</p></a></li>
                        <li><a class="dropdown-item" href="search.php?selling_status=اقراض"><p>استئجار</p></a></li>
                        <li><a class="dropdown-item" href="search.php?selling_status=تبرع"><p>تبرع</p></a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.php">تواصل معنا</a>
                </li>
                <?php 
                if(isset($_SESSION["user_auth"])){
                    if($_SESSION["user_auth"] == true){
                        echo '<li class="nav-item"><a class="nav-link" href="addItem.php">اعرض منتجك</a></li>';
                        echo '<li  class="nav-item dropdown">
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    حسابي
                                </a>
                                <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="viewUserProfile.php"><p>عرض الملف الشخصي</p></a></li>
                                        <li><a class="dropdown-item" href="userProducts.php"><p>منتجاتي</p></a></li>
                                        <li><a class="dropdown-item" href="userOrders.php?user_id='.$_SESSION["user_id"].'"><p>مشترياتي</p></a></li>
                                        <li><a class="dropdown-item" href="db/logout.php"><p>تسجيل الخروج</p></a></li>
                                </ul>
                            </li>';
                    }
                }else{
                    echo  '<li class="nav-item"><a class="nav-link" href="./register.php">التسجيل</a></li>
                            <li class="nav-item"><a class="nav-link" href="./login.php" class="login-panel"><i class="fa fa-user"></i>  تسجيل الدخول</a></li>';
                }
                ?>
            </ul>
        </div>
        <div class="search-container">
            <input onchange="search()" id="search_text" type="text" placeholder="ابحث..." name="search">
            <button><a href="#" id="search_btn"><i class="fa fa-search"></i></a></button>
        </div>
        <div id="mobile-menu-wrap"></div>
    </nav>
    
    </header>
    <!-- Header End -->

    <script>
        function search(){
            var text = document.getElementById("search_text");
            var sbmtBtn = document.getElementById("search_btn");
            sbmtBtn.href = "search.php?search=" + text.value;
        }
    </script>