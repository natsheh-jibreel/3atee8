<?php include 'header.php';?>
<?php
if(isset($_SESSION["user_auth"])){
    if(!($_SESSION["user_auth"] == true)){
        header("location: login.php");
    }
}else{
    header("location: login.php");
}
$rater_id = $_SESSION["user_id"];
$product_id = $_GET["product_id"];
$sql = "SELECT * FROM Products WHERE product_id = '$product_id'";
$productResult = mysqli_query($conn, $sql);
$productRow = mysqli_fetch_assoc($productResult);

$user_id = $productRow["user_id"];
$userSql = "SELECT mobile_numebr FROM Users WHERE user_id = '$user_id'";
$userResult = mysqli_query($conn, $userSql);
$userRow = mysqli_fetch_assoc($userResult);

$category_id = $productRow["category_id"];
$categorySql = "SELECT category_name FROM Category WHERE category_id = '$category_id'";
$categoryResult = mysqli_query($conn, $categorySql);
$categoryRow = mysqli_fetch_assoc($categoryResult);

if (isset($_GET['rate'])) {
    $ratedIndex = $_GET['rate'];
    $sql2 = "SELECT user_id FROM user_rating WHERE user_id = '$user_id' AND rater_id = '$rater_id'";
    $result = mysqli_query($conn, $sql2);
    if(mysqli_num_rows($result) > 0){
        $conn->query("UPDATE user_rating SET rating = '$ratedIndex' WHERE user_id = '$user_id' AND rater_id = '$rater_id'");
    }else
        $conn->query("INSERT INTO user_rating VALUES ('$user_id', '$rater_id', '$ratedIndex')");
}
$avg_rate_sql = "SELECT AVG(rating) as rate FROM user_rating WHERE user_id = '$user_id'";
$avg_rate_result = mysqli_query($conn, $avg_rate_sql);
$avg_rate_row = mysqli_fetch_assoc($avg_rate_result);
$avg_rate = $avg_rate_row["rate"];
$avg_rate = $avg_rate - 1;
if($avg_rate == NULL){
    $avg_rate = 0;
}
?>

<section class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="Assets/ProductsImages/<?php echo $productRow["product_image"] ;?>" alt="" class="image-responsive">
            </div>
            <div class="info col-md-6">
                <form action="db/order.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $productRow["product_id"]; ?>">
                    <input type="hidden" name="selling_status" value="<?php echo $productRow["selling_status"]; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <h1><?php echo $productRow["product_name"]; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="label label-primary"><?php echo $categoryRow["category_name"]; ?></span>
                        </div>  
                        <div class="col-md-6">
                            <span class="label label-primary"><?php echo $productRow["location"]; ?></span>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12 outer">
                            <p class="inner"><?php echo $productRow["describtion"] ;?></p>
                        </div>
                    </div>
                    <div class="row" dir="rtl">
                        <div class="col-md-6" dir="ltr">
                            <span class="glyphicon glyphicon-star" data-index="0" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" data-index="1" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" data-index="2" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" data-index="3" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" data-index="4" aria-hidden="true"></span>
                            <?php
                            $sql = "SELECT COUNT(rating) as c FROM user_rating WHERE user_id = '$user_id'";
                            $r = mysqli_query($conn, $sql);
                            $rr = mysqli_fetch_assoc($r);
                            $c = $rr['c'];
                            ?>
                            <span class="label label-success"><?php echo $c; ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 bottom-rule">
                            <h2 class="product-price">₪<b id="price"><?php echo $productRow["product_price"] ;?></b>.00</h2>
                            <br>
                            <br>
                            <br>
                            <div class="checkout-content">
                                <label for="delivery_company_id">اختر شركة التوصيل</label>
                                <br>
                                <select name="delivery_company_id" id="dc_id" onchange="changeDc(), rdc_price.value = ((this.options[this.selectedIndex].text).replace(/[^0-9]/g,'')), updateTotal()" required>
                                    <option value="non">سأقوم بأخذ المنتج بنفسي</option>
                                    <?php 
                                    $sql = "SELECT * FROM DeliveryCompanies";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<option value="'.$row["company_id"].'">'.$row["company_name"].' + '. $row["delivery_price"].' ₪ </option>';
                                    }
                                
                                    ?>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <?php if($productRow["selling_status"] == 'اقراض')
                    echo '<div class="row">
                        <div class="col-md-12">
                            <div class="checkout-content">
                                <label for="duration">عدد ايام الاستئجار</label>
                                <input type="number" name="duration" value="1" onload="rduration.value = duration.value" onchange="rduration.value = duration.value" required>
                            </div>
                        </div>
                    </div>';
                    ?>
                    <div class="row add-to-cart">
                        <div class="col-md-6 product-qty">
                            
                            <span class="btn btn-default btn-lg btn-qty" onclick="if(parseInt(amount.value)!=parseInt(max.value))amount.value = ramount.value = parseInt(amount.value) + parseInt(plus.value), updateTotal()">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"><input type="hidden" id="plus" value="1"></span>
                            </span>
                        
                            <input type="hidden" id="max" value="<?php echo $productRow["amount_in_stock"] ;?>">
                            <input id="amount" name="amount" class="btn btn-default btn-lg btn-qty" style="padding:0;" value="1" />

                            <span class="btn btn-default btn-lg btn-qty" onclick="if(parseInt(amount.value)!=1)amount.value = ramount.value = parseInt(amount.value) + parseInt(minus.value), updateTotal()">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"><input type="hidden" id="minus" value="-1"></span>
                            </span>
                        </div>  
                    </div>

                    <div class="form-popup" id="buyForm">
                        <div class="form-container">
                            <h3>تاكيد الشراء</h3>
                            <div>
                                <table class="table" dir="rtl">
                                    <tr class="trow">
                                        <td><u>اسم المنتج</u></td>  
                                        <td><u>السعر</u></td>  
                                        <td><u>الكمية</u></td> 
                                        <?php if($productRow["selling_status"] == 'اقراض')
                                        echo '<td><u>عدد ايام الاستئجار</u></td>';
                                        ?>
                                        <td><u>سعر التوصيل</u></td>  
                                    </tr>
                                    <tr>
                                        <td><?php echo $productRow["product_name"]; ?></td>
                                        <td><output><?php echo $productRow["product_price"]; ?></output></td>
                                        <td><output id="ramount"></output></td>
                                        <?php if($productRow["selling_status"] == 'اقراض')
                                        echo '<td><output id="rduration"></output></td>';
                                        ?>
                                        <td><output id="rdc_price"></output></td>
                                    </tr>
                                    <td>المجموع: <output id="total"></output></td>  
                                </table>   
                                <div class="payment-methods">
                                    <h5>:اختر وسيلة الدفع</h5>
                                    <a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-ils" aria-hidden="true"></i></a>
                                </div>
                                
 
                            </div>                            

                            <button type="submit" class="btn">تأكيد</button>
                            <button type="button" class="btn cancel" onclick="closeForm()">إلغاء</button>
                        </div>
                    </div>

                </form>
                <div class="row">
                    <div class="col-md-6" style="float: left;">
                        <button id="orderbtn" class="btn btn-lg btn-brand" onclick="openForm(), ramount.value = amount.value, rdc_price = parseInt(dc_id.options[dc_id.selectedIndex].text), updateTotal()">
                        طلب
                        </button>
                    </div>
                </div>                    
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="monospaced"><?php echo $productRow["amount_in_stock"] ;?> :الكميةالمتوفرة</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 top-10">
                        <p>للاستفسار عن طريق الهاتف, <a href="tel:<?php echo $userRow["mobile_numebr"]; ?>" style="color: blue;">اتصل :  <?php echo $userRow["mobile_numebr"]; ?></a></p>
                        <p dir="rtl">او الواتساب:</p>
                        <img src="https://chart.apis.google.com/chart?cht=qr&chl=https://wa.me/<?php echo $userRow["mobile_numebr"]; ?>&chs=200x200" alt="">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container comments-section">
        <div class="row" dir="rtl">
            <div class="col-md-12">
                <h2>التعليقات</h2>
                <?php
                $sql = "SELECT product_comments.comment, CONCAT(Users.first_name, ' ', Users.last_name) as name, product_comments.date 
                        FROM product_comments 
                        LEFT JOIN Users 
                        on product_comments.user_id = Users.user_id 
                        WHERE product_comments.product_id = $product_id
                        ORDER BY product_comments.date DESC";

                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="comment">
                    <h5 class="writer"><?php echo $row["name"]; ?><p style="color: grey;font-size: 12px;"><?php echo $row["date"]; ?></p></h5>
                    <div class="col-8" style="font-size: small;"><?php echo $row["comment"]; ?></div>
                </div>
                <?php } ?>
                <div class="add-comment">
                    <form action="db/addComment.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <textarea name="comment" id="" rows="5" maxlength="2500" placeholder="اكتب تعليقك"></textarea>
                        <input type="submit" value="ارسال التعليق">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2> المنتجات مشابهة</h2>
                </div>
            </div>
        </div>
        <div class="row" dir="rtl">
            <?php 
            $sql = "SELECT * FROM Products WHERE amount_in_stock > 0 AND category_id = '$category_id' ORDER BY product_id DESC LIMIT 4";
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



<?php include 'footer.php'; ?>
<script>
    /*Swal.fire({
        title: 'rrrrr!',
        text: 'Do you want to continue',
        icon: 'success',
        confirmButtonText: 'Cool'
    });*/
    function openForm() {
        document.getElementById("buyForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("buyForm").style.display = "none";
    }

    function changeDc(){
        var btn = document.getElementById("orderbtn");
        btn.disabled = false;
    }

    function updateTotal(){
        var dc_price = document.getElementById("rdc_price").value;
        var amount = document.getElementById("ramount").value;
        var price = document.getElementById("price").innerHTML;
        <?php if($productRow["selling_status"] == 'اقراض')
                echo 'var days = document.getElementById("rduration").value;';
            else
                echo 'var days = 1;';
        ?>

        var r = 0;
        var parsed = parseInt(dc_price);
        if (isNaN(parsed)){

        }else{
            r = parsed;
        }

        var total = document.getElementById("total");
        total.value =  r + parseInt(amount) * parseInt(price) * parseInt(days);

    }

    function orderbtnCheck(){
        if (document.getElementById("orderbtn").disabled) {
            alert("يرجى اختيار طريقة التوصيل");
        }
    }
</script>
<script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
<script>
    var ratedIndex = -1;

    $(document).ready(function(){
        resetStarColors();


        $('.glyphicon-star').on('click', function () {
            ratedIndex = parseInt($(this).data('index'));
            rate = ratedIndex + 1;
            window.location.href="productPage.php?product_id=<?php echo $product_id; ?>&rate="+rate;
        });



        $('.glyphicon-star').mouseover(function(){
            resetStarColors();
            var currentIndex = parseInt($(this).data('index'));

            for (var i=0; i <= currentIndex; i++)
                 $('.glyphicon-star:eq('+i+')').css('color', 'green');

        });
        $('.glyphicon-star').mouseleave(function(){
            resetStarColors();
        });
    });

    function resetStarColors(){
        $('.glyphicon-star').css('color', 'black');
        for (var i=0; i <= <?php echo $avg_rate; ?>; i++)
            $('.glyphicon-star:eq('+i+')').css('color', 'green');

    }
</script>