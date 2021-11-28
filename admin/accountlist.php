<?php
    include_once './commons/header.php';
    include_once './commons/sidebar.php';
    include_once '../classes/Account.php';
?>

<?php
    $account = new account();
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $deleteaccount = $account->delete_account($id);
        echo "<meta http-equiv='refresh' content='0;URL=accountlist.php'>";
     }
    
?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                    <div class="col-sm-12">
                        <h1 class="m-0 ">Danh Sách Tài Khoản</h1>
                        <?php
                            if(isset($deleteaccount)){
                                echo $deleteaccount;
                            }
                        ?>
                        </br>
                        <a href="accountadd.php" class="btn btn-primary">Thêm Tài Khoản</a>
                        </br> </br>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Họ Tên</th>
                                <th scope="col">Tên Tài Khoản</th>
                                <th scope="col">Mật Khẩu</th>
                                <th scope="col">Quyền</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $index = 0;
                                $show_account = $account->show_list_account();
                                if($show_account == true){
                                    
                                    while ($result = $show_account->fetch_assoc()){
                                        $id = $result['id'];
                                        $fullname = $result['fullname'];
                                        $username = $result['username'];
                                        $role = $result['name'];
                                        $password = $result['password'];
                                        $index++;
                            ?>

                                <tr>
                                <th scope="row"><?php echo $index ?></th>
                                <td><?php echo $fullname ?></td>
                                <td><?php echo $username ?></td>
                                <td><?php echo $password ?></td>
                                <td><?php echo $role ?></td>
                                <td><a href="accountupdates.php?id=<?php echo $id ?>" class="btn btn-warning"><i class="far fa-pen-square"></i></a> || <a onclick = "return confirm('Bạn có muốn xóa không?')" href="?deleteid=<?php echo $id ?>" class="btn btn-danger"><i class="fad fa-trash"></i></a></td>
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



<?php
    include_once './commons/footer.php';
?>