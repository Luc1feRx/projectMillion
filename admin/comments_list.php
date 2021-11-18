<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/comment.php'?>

<?php
	$cus = new customer();
	if(isset($_GET['approvedid'])){
     	$id = $_GET['approvedid'];
     	$approved = $cus->approved($id);
    }

    if(isset($_GET['deleteid'])){
     	$id = $_GET['deleteid'];
     	$del_comment = $cus->del_comment($id);
    }
?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                    <div class="col-sm-12">
                        <h1 class="m-0 ">Danh Sách Phản Hồi</h1>
                        </br>
                        <?php
                            if(isset($approved)){
                                echo $approved;
                            }

                            if(isset($del_comment)){
                                echo $del_comment;
                            }
                        ?>
                        </br></br>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nội Dung Phản Hồi</th>
                                <th scope="col">Ngày Viết</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $comment = new customer();
                                $show_comment = $comment->show_list_comment();
                                if($show_comment == true){
                                    $index = 0;
                                    while ($result = $show_comment->fetch_assoc()){
                                        $name = $result['nameuser'];
                                        $id = $result['product_id'];
                                        $index++;
                            ?>

                                <tr>
                                <th scope="row"><?php echo $index ?></th>
                                <td><?php echo $name ?></td>
                                <td><?php echo $result['email'] ?></td>
                                <td><?php echo $result['comment'] ?></td>
                                <td><?php echo $result['comment_date'] ?></td>
                                <td><?php echo $result['name'] ?></td>
                                <td><a style="width: 100%; margin-bottom: 10px;" href="http://localhost:85/SellLaptops/single-product.php?product_id=<?php echo $id ?>" class="btn btn-warning">Xem</a>  <a style="width: 100%" onclick = "return confirm('Bạn có muốn xóa không?')" href="?deleteid=<?php echo $result['id'] ?>" class="btn btn-danger">Xóa</a>
                                <?php 
                                    if($result['status']==0){
                                    ?>
                                        <a style="width: 100%; margin-top: 10px;" class="btn btn-primary" onclick = "return confirm('Bạn có muốn phê duyệt bình luận này không?')" href="?approvedid=<?php echo $result['id'] ?>">Phê Duyệt</a>
                                        <?php
                                    }elseif($result['status']==1){
                                        ?>
                                        <?php
                                        echo "<a style='width: 100%; margin-top: 10px;' class='btn btn-primary'>Đã Phê Duyệt</a>";
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