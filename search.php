<?php include("header.php");

if(isset($_GET["category_id"])){
    $id = $_GET["category_id"];
    echo '<section class="latest-blog spad">
            <div class="container">
                <div class="row" dir="rtl">';
                $sql = "SELECT * FROM Products 
                        LEFT JOIN Category 
                        ON Category.category_id = Products.category_id 
                        WHERE Products.category_id = '$id' OR Category.parent_id = '$id' 
                        ORDER BY Products.is_promoted, Products.product_id DESC LIMIT 100";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $category_id = $row["category_id"];
                    $sql2 = "SELECT category_name FROM Category WHERE category_id = '$category_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo '<div class="col-lg-3 col-md-6">
                    <a href="productPage.php?product_id='.$row["product_id"].'">
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
            echo '</div>
                </div>
            </section>';

}
if(isset($_GET["user_id"])){
    $id = $_GET["user_id"];
    echo '<section class="latest-blog spad">
            <div class="container">
                <div class="row" dir="rtl">';
                $sql = "SELECT * FROM Products WHERE user_id = '$id' ORDER BY is_promoted, product_id DESC LIMIT 100";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $category_id = $row["category_id"];
                    $sql2 = "SELECT category_name FROM Category WHERE category_id = '$category_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo '<div class="col-lg-3 col-md-6">
                            <a href="productPage.php?product_id='.$row["product_id"].'">
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
            echo '</div>
                </div>
            </section>';
    
}
if(isset($_GET["selling_status"])){
    $status = $_GET["selling_status"];
    echo '<section class="latest-blog spad">
            <div class="container">
                <div class="row" dir="rtl">';
                $sql = "SELECT * FROM Products WHERE selling_status = '$status' AND amount_in_stock > 0 ORDER BY is_promoted, product_id DESC LIMIT 100";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $category_id = $row["category_id"];
                    $sql2 = "SELECT category_name FROM Category WHERE category_id = '$category_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo '<div class="col-lg-3 col-md-6">
                    <a href="productPage.php?product_id='.$row["product_id"].'">
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
            echo '</div>
                </div>
            </section>';

    
}

if(isset($_GET["search"])){
    $search = $_GET["search"];
    echo '<section class="latest-blog spad">
            <div class="container">
                <div class="row" dir="rtl">';
                $sql = "SELECT * FROM Products WHERE amount_in_stock > 0 AND product_name LIKE '%$search%' ORDER BY is_promoted, product_id DESC LIMIT 100";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $category_id = $row["category_id"];
                    $sql2 = "SELECT category_name FROM Category WHERE category_id = '$category_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo '<div class="col-lg-3 col-md-6">
                    <a href="productPage.php?product_id='.$row["product_id"].'">
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
            echo '</div>
                </div>
            </section>';

    
}

include("footer.php");
?>
