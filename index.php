<?php include('header.php')?>
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="img/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag,kids</span>
                        <h1>Black friday</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore</p>
                        <a href="#" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="Assets/ProductsImages/5-jjj2021-04-26 02-34.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag,kids</span>
                        <h1>Black friday</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore</p>
                        <a href="#" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top Products -->
<section class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2> المنتجات المقترحة</h2>
                </div>
            </div>
        </div>
        <div class="row" dir="rtl">
            <?php 
            $sql = "SELECT * FROM Products WHERE amount_in_stock > 0 AND is_promoted = 1 ORDER BY product_id DESC LIMIT 12";
            $result1 = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result1)){
                $category_id = $row["category_id"];
                $sql2 = "SELECT category_name FROM Category WHERE category_id = '$category_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                echo '<div class="col-lg-3 col-md-6">
                        <a href="productPage.php?product_id='.  $row["product_id"] .'">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="Assets/ProductsImages/'.  $row["product_image"] .'" alt="">
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">'.  $row2["category_name"] .' | '.  $row["selling_status"] .'</div>
                                    <h5>'.  $row["product_name"] .'</h5>
                                    <div class="product-price">
                                        ₪'.  $row["product_price"] .'.00
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>المنتجات</h2>
                </div>
            </div>
        </div>
        <div class="row" dir="rtl">
            <?php 
            $sql = "SELECT * FROM Products WHERE amount_in_stock > 0 ORDER BY product_id DESC LIMIT 100";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $category_id = $row["category_id"];
                $sql2 = "SELECT category_name FROM Category WHERE category_id = '$category_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                echo '<div class="col-lg-3 col-md-6">
                        <a href="productPage.php?product_id='.  $row["product_id"] .'">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="Assets/ProductsImages/'.  $row["product_image"] .'" alt="">
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">'.  $row2["category_name"] .' | '.  $row["selling_status"] .'</div>
                                    <h5>'.  $row["product_name"] .'</h5>
                                    <div class="product-price">
                                        ₪'.  $row["product_price"] .'.00
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>';
            }
            ?>
        </div>
    </div>
</section>

<?php include('footer.html')?>
    
