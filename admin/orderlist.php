<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/order.php'?>
<?php include '../classes/cart.php'?>

<?php
	$cart = new cart();
	if(isset($_GET['shiftid'])){
     	$id = $_GET['shiftid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted = $cart->shifted($id,$time,$price);
    }

    if(isset($_GET['deleteid'])){
     	$id = $_GET['deleteid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$del_shifted = $cart->del_shifted($id,$time,$price);
    }
?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                    <div class="col-sm-12">
                        <h1 class="m-0 ">Danh Sách Đơn Hàng</h1>
                        </br>
                        <?php
                            if(isset($shifted)){
                                echo $shifted;
                            }

                            if(isset($del_shifted)){
                                echo $del_shifted;
                            }
                        ?>
                        </br></br>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Họ Tên</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Ghi Chú</th>
                                <th scope="col">Ngày Tạo Đơn</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $order = new order();
                                $show_order = $order->show_list_order();
                                if($show_order == true){
                                    $index = 0;
                                    while ($result = $show_order->fetch_assoc()){
                                        $name = $result['fullname'];
                                        $id = $result['id'];
                                        $index++;
                            ?>

                                <tr>
                                <th scope="row"><?php echo $index ?></th>
                                <td><?php echo $name ?></td>
                                <td><?php echo $result['email'] ?></td>
                                <td><?php echo $result['phone'] ?></td>
                                <td><?php echo $result['address'] ?></td>
                                <td><?php echo $result['note'] ?></td>
                                <td><?php echo $result['date_order'] ?></td>
                                <td><?php echo number_format($result['total_money']) . " VND" ?></td>
                                <td><a style="width: 100%; margin-bottom: 10px;" href="orderdetail.php?id=<?php echo $id ?>" class="btn btn-warning">Xem</a>  <a style="width: 100%" onclick = "return confirm('Bạn có muốn xóa không?')" href="?deleteid=<?php echo $result['id'] ?>&price=<?php echo $result['total_money'] ?>&time=<?php echo $result['date_order'] ?>" class="btn btn-danger">Xóa</a>
                                <?php 
                                    if($result['status']==0){
                                    ?>
                                        <a style="width: 100%; margin-top: 10px;" class="btn btn-primary" onclick = "return confirm('Bạn có muốn thực hiện đơn hàng này không?')" href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['total_money'] ?>&time=<?php echo $result['date_order'] ?>">Thực Hiện</a>
                                        <?php
                                    }elseif($result['status']==1){
                                        ?>
                                        <?php
                                        echo "<a style='width: 100%; margin-top: 10px;' class='btn btn-primary'>Đã Thực Hiện</a>";
                                        ?>
                                    <?php
                                    }
                                    ?>
                                
                                </td>
                                </tr>
                            <?php 
                            }
                        }
                            ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>  
</body>


<?php include 'commons/footer.php';?>