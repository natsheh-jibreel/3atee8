<?php include('header.php');
$per_page_record = 8;
              
if (isset($_GET["page"])) {    
    $page  = $_GET["page"];    
}    
else {    
    $page=1;    
}    

$start_from = ($page-1) * $per_page_record;     

$sql2 = "SELECT count(product_id) as count FROM Products WHERE amount_in_stock > 0";
$result2 = mysqli_query($conn, $sql2);
$num_of_products = mysqli_fetch_assoc($result2);

$sql = "SELECT * FROM Products WHERE amount_in_stock > 0 ORDER BY product_id DESC LIMIT $start_from, $per_page_record";
$result = mysqli_query($conn, $sql);
?>
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="Assets/ProductsImages/jjj04260236.png">
            
        </div>
        <div class="single-hero-items set-bg" data-setbg="Assets/ProductsImages/huffy04281130.jpeg">
            
        </div>
        <div class="single-hero-items set-bg" data-setbg="Assets/ProductsImages/huffy04281130.jpeg">
            
        </div>
    </div>
</section>

<!-- Categories -->
<section class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2> ابرز التصنيفات</h2>
                </div>
            </div>
        </div>
        <div class="row" dir="rtl">
            <?php 
            $sql = "SELECT Category.category_id, Category.category_name, Category.img, COUNT(Category.category_id) FROM Category LEFT JOIN Products ON Category.category_id = Products.category_id GROUP BY Category.category_id ORDER BY COUNT(Category.category_id) DESC LIMIT 4";
            $result1 = mysqli_query($conn, $sql);
            echo mysqli_error($conn);
            while($row = mysqli_fetch_assoc($result1)){
                echo '<div class="col-lg-3 col-md-6">
                        <a href="search.php?category_id='.  $row["category_id"] .'">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="Assets/CategoriesImages/'.  $row["img"] .'" alt="">
                                </div>
                                <div class="pi-text">
                                    <h5>'.  $row["category_name"] .'</h5>
                                </div>
                            </div>
                        </a>
                    </div>';
            }
            ?>
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
                                    <div class="catagory-name">'.  $row2["category_name"] . ' | ' .  $row["selling_status"] . ' | ' .  $row["product_status"] . '</div>
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
        <div class="row index-row" dir="rtl">
            <?php
            $number_of_pages = $num_of_products["count"] / $per_page_record + 1;
                for($i = 1; $i <= $number_of_pages; $i+=1){
                    echo '<a class="page-index" href="index.php?page='.$i.'">'.$i.'</a>';
                }
            ?>
        </div>
        <div class="row" dir="rtl">
            <?php 
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
                                    <div class="catagory-name">'.  $row2["category_name"] .' | '.  $row["selling_status"] . ' | ' .  $row["product_status"] .'</div>
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
        <div class="row index-row" dir="rtl">
            <?php
            $number_of_pages = $num_of_products["count"] / $per_page_record + 1;
                for($i = 1; $i <= $number_of_pages; $i+=1){
                    echo '<a class="page-index" href="index.php?page='.$i.'">'.$i.'</a>';
                }
            ?>
        </div>
    </div>
</section>

<?php include('footer.php')?>
    
