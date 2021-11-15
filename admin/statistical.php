<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include_once '../classes/order.php'?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 ">Thống Kê</h1>
                </br>
                <a href="chart.php" class="btn btn-primary">Biểu Đồ Thống Kê</a>
                </br></br>
                <form action="excel.php" method="post">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Loại Hàng</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Giá Cao Nhất</th>
                                <th scope="col">Giá Thấp Nhất</th>
                                <th scope="col">Giá Trung Bình</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $order = new order();
                                $show_statistical = $order->show_statistical();
                                $index = 0;
                                if($show_statistical){
                                    while($result = $show_statistical->fetch_assoc()){
                                        $index++;
                                        $name = $result['name'];
                                        $quantity = $result['soluong'];
                                        $maxprice = $result['giacao'];
                                        $minprice = $result['giathap'];
                                        $avgprice = $result['giatb'];
                            ?>
                            <tr>
                                <th><?php echo $index; ?></th>
                                <th><?php echo $name; ?></th>
                                <th><?php echo $quantity; ?></th>
                                <th><?php echo number_format($maxprice) . " VNĐ";?></th>
                                <th><?php echo number_format($minprice) . " VNĐ";?></th>
                                <th><?php echo number_format($avgprice) . " VNĐ";?></th>
                            </tr>

                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <input type="submit" name="submit" class="btn btn-success" value="Export to excel" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php include 'commons/footer.php';?>