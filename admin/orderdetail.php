<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/order.php'?>
<?php include '../classes/cart.php'?>

<?php
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo "<script>window.location ='orderlist.php'</script>";
     }else{
          $id = $_GET['id']; 
     }
?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                        <h1 class="m-0 ">Chi Tiết Đơn Hàng</h1>
                    </div>
                        </br></br>
                        <div class="col-md-7">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Tổng Giá</th>
                                    <th scope="col">Ảnh Sản Phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $order = new order();
                                    $show_order = $order->show_order_detail($id);
                                    if($show_order == true){
                                        $index = 0;
                                        while ($result = $show_order->fetch_assoc()){
                                            $name = $result['name'];
                                            $total_money = $result['total_money'];
                                            $price = $result['price'];
                                            $quantity = $result['quantity'];
                                            $image = $result['image'];
                                            $index++;
                                ?>

                                    <tr>
                                    <th scope="row"><?php echo $index ?></th>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo number_format($price) . "VNĐ";?></td>
                                    <td><?php echo $quantity ?></td>
                                    <td><?php echo number_format($total_money) . "VNĐ" ?></td>
                                    <td><img src="./uploads/<?php echo $image;?>" style="max-height: 100px; margin-top: 5px; margin-bottom: 15px;" alt=" <?php echo $name; ?>"></td>
                                    </tr>
                                <?php 
                                }
                            }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-4">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                        <tr>
                                        <th scope="col">Họ Tên</th>
                                        <th scope="col">SĐT</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Địa Chỉ</th>
                                        </tr>
                                </thead>

                                <?php
                                    $order = new order();
                                    $show_customer = $order->show_list_order_customer($id);
                                    if($show_customer == true){
                                        $index = 0;
                                        while ($result1 = $show_customer->fetch_assoc()){
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $result1['fullname']; ?></td>
                                        <td><?php echo $result1['phone']; ?></td>
                                        <td><?php echo $result1['email']; ?></td>
                                        <td><?php echo $result1['address']; ?></td>
                                    </tr>
                                </tbody>
                                <?php 
                                }
                            }
                                ?>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>  
</body>


<?php include 'commons/footer.php';?>