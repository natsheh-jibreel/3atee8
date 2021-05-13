<?php  
session_start();
if(!isset($_SESSION["admin_auth"])){
    header("location: login.php");
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
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="nav-item">
            <div class="container" dir="rtl">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <div class="right-nav">
                            <li class="active"><a href="./index.php">الصفحة الرئيسية</a></li>
                            <li><a href="./users.php">المستخدمين</a></li>
                            <li><a href="./products.php">المنتجات</a></li>
                            <li><a href="./categories.php">التصنيفات</a></li>
                            <li><a href="./newCategory.php">إضافة صنف</a></li>
                            <li><a href="./deliveryCompanies.php">شركات التوصيل</a></li>
                            <li><a href="./registerDeliveryCompany.php">إضافة شركة توصيل</a></li>
                            <li><a href="./db/logout.php">تسجيل الخروج</a></li>
                        </div>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->