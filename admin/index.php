<?php 
include 'header.php';
?>
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<div class="container-fluid">
    <div id="layoutSidenav_content" dir="rtl">
        <main>
            <div class="container-fluid">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">إحصائيات </li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">عدد المستخدمين</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?php
                                    $sql = "SELECT COUNT(*) as c FROM Users";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row["c"];
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">عدد المنتجات</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php
                                    $sql = "SELECT COUNT(*) as c FROM Products";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row["c"];
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">عدد التصنيفات</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php
                                    $sql = "SELECT COUNT(*) as c FROM Category";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row["c"];
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">عدد الطلبات</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php
                                    $sql = "SELECT COUNT(*) as c FROM Orders";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo $row["c"];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i> Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i> Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>-->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i> المبيعات
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>المنتج</th>
                                        <th>المشتري</th>
                                        <th>شركة التوصيل</th>
                                        <th>الكمية</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>المنتج</th>
                                        <th>المشتري</th>
                                        <th>شركة التوصيل</th>
                                        <th>الكمية</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php 
                                    $orderSql = "SELECT delivery_company_id, order_id, product_id, amount, buyer_id, is_delivered FROM Orders ORDER BY is_delivered ASC, order_id DESC";
                                    $orderResult = mysqli_query($conn, $orderSql);
                                    while($order = mysqli_fetch_assoc($orderResult)){
                                        //buyer info:
                                        $buyer_id = $order["buyer_id"];
                                        $buyerSql = "SELECT CONCAT(first_name , ' ' , last_name) as name, CONCAT(city , ' / ' , address) as location, mobile_numebr 
                                                    FROM Users WHERE user_id = '$buyer_id'";
                                        $buyerResult = mysqli_query($conn, $buyerSql);
                                        $buyer = mysqli_fetch_assoc($buyerResult);
                                        //product info:
                                        $product_id = $order["product_id"];
                                        $productSql = "SELECT product_id, product_name, product_price, user_id FROM Products WHERE product_id = '$product_id'";
                                        $productResult = mysqli_query($conn, $productSql);
                                        $product = mysqli_fetch_assoc($productResult);

                                        //delivery company info:
                                        $dc_id = $order["delivery_company_id"];
                                        $dcSql = "SELECT * FROM DeliveryCompanies WHERE company_id = '$dc_id'";
                                        $dcResult = mysqli_query($conn, $dcSql);
                                        $dc = mysqli_fetch_assoc($dcResult);
                                        
                                    ?>
                                    <tr>
                                        <td><a href="../productPage.php?product_id=<?php echo $product["product_id"];?>" style="color:black;"> <?php echo $product["product_name"] ?> </a></td>
                                        <td> <?php echo $buyer["name"] ?> </td>
                                        <td> <?php echo $dc["company_name"] ?> </td>
                                        <td> <?php echo $order["amount"] ?> </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php include 'footer.html';?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>
        (function($) {
        "use strict";

        // Add active state to sidbar nav links
        var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
            $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
                if (this.href === path) {
                    $(this).addClass("active");
                }
            });

        // Toggle the side navigation
        $("#sidebarToggle").on("click", function(e) {
            e.preventDefault();
            $("body").toggleClass("sb-sidenav-toggled");
        });
    })(jQuery);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script>
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Mar 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
        datasets: [{
        label: "Sessions",
        lineTension: 0.3,
        backgroundColor: "rgba(2,117,216,0.2)",
        borderColor: "rgba(2,117,216,1)",
        pointRadius: 5,
        pointBackgroundColor: "rgba(2,117,216,1)",
        pointBorderColor: "rgba(255,255,255,0.8)",
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(2,117,216,1)",
        pointHitRadius: 50,
        pointBorderWidth: 2,
        data: [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
        }],
    },
    options: {
        scales: {
        xAxes: [{
            time: {
            unit: 'date'
            },
            gridLines: {
            display: false
            },
            ticks: {
            maxTicksLimit: 7
            }
        }],
        yAxes: [{
            ticks: {
            min: 0,
            max: 40000,
            maxTicksLimit: 5
            },
            gridLines: {
            color: "rgba(0, 0, 0, .125)",
            }
        }],
        },
        legend: {
        display: false
        }
    }
    });
</script>
<script>
    var ctx = document.getElementById("myBarChart");
    var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [{
        label: "Revenue",
        backgroundColor: "rgba(2,117,216,1)",
        borderColor: "rgba(2,117,216,1)",
        data: [4215, 5312, 6251, 7841, 9821, 14984],
        }],
    },
    options: {
        scales: {
        xAxes: [{
            time: {
            unit: 'month'
            },
            gridLines: {
            display: false
            },
            ticks: {
            maxTicksLimit: 6
            }
        }],
        yAxes: [{
            ticks: {
            min: 0,
            max: 15000,
            maxTicksLimit: 5
            },
            gridLines: {
            display: true
            }
        }],
        },
        legend: {
        display: false
        }
    }
    });
</script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>