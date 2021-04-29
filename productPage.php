<?php include 'header.php';?>
<?php
if(!$_SESSION["user_auth"]==1){
    header("login.php");
}
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
                        <div class="col-md-12">
                            <p class="description"><?php echo $productRow["describtion"] ;?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 bottom-rule">
                            <h2 class="product-price">₪<b id="price"><?php echo $productRow["product_price"] ;?></b>.00</h2>
                            <select name="delivery_company_id" id="dc_id" onchange="changeDc(), rdc_price.value = ((this.options[this.selectedIndex].text).replace(/[^0-9]/g,'')), updateTotal()" required>
                                <option value="" disabled selected>اختر شركة التوصيل</option>
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
                    <div class="row add-to-cart">
                        <div class="col-md-6 product-qty">
                            
                            <span class="btn btn-default btn-lg btn-qty" onclick="if(parseInt(amount.value)!=parseInt(max.value))amount.value = ramount.value = parseInt(amount.value) + parseInt(plus.value), updateTotal()">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"><input type="hidden" id="plus" value="1"></span>
                            </span>
                        
                            <input type="hidden" id="max" value="<?php echo $productRow["amount_in_stock"] ;?>">
                            <input id="amount" name="amount" class="btn btn-default btn-lg btn-qty" value="1" />

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
                                        <td><u>سعر التوصيل</u></td>  
                                    </tr>
                                    <tr>
                                        <td><?php echo $productRow["product_name"]; ?></td>
                                        <td><output><?php echo $productRow["product_price"]; ?></output></td>
                                        <td><output id="ramount"></output></td>
                                        <td><output id="rdc_price"></output></td>
                                    </tr>
                                    <td>المجموع: <output id="total"></output></td>  
                                </table>    
                            </div>                            

                            <button type="submit" class="btn">تأكيد</button>
                            <button type="button" class="btn cancel" onclick="closeForm()">إلغاء</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6" style="float: left;">
                        <button id="orderbtn" class="btn btn-lg btn-brand" onclick="openForm(), ramount.value = amount.value, rdc_price = parseInt(dc_id.options[dc_id.selectedIndex].text), updateTotal()" disabled>
                        طلب
                        </button>
                    </div>
                </div>                    
                <div class="row">
                    <div class="col-md-3 text-center">
                        <span class="monospaced"><?php echo $productRow["amount_in_stock"] ;?></span>
                        <span class="monospaced">In Stock</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 top-10">
                        <p>للاستفسار عن طريق الهاتف, <a href="tel:<?php echo $userRow["mobile_numebr"]; ?>" style="color: black;">اتصل :  <?php echo $userRow["mobile_numebr"]; ?></a></p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>


<?php include 'footer.html'; ?>
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


        var r = 0;
        var parsed = parseInt(dc_price);
        if (isNaN(parsed)){

        }else{
            r = parsed;
        }

        var total = document.getElementById("total");
        total.value =  r + parseInt(amount) * parseInt(price);

    }
</script>