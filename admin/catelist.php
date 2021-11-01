<?php
    include_once './commons/header.php';
    include_once './commons/sidebar.php';
    include_once '../classes/category.php';
?>

<?php
    $cate = new category();
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $deletecate = $cate->delete_category($id);
     }
    
?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                    <div class="col-sm-12">
                        <h1 class="m-0 ">Danh Sách Danh Mục</h1>
                        <?php
                            if(isset($deletecate)){
                                echo $deletecate;
                            }
                        ?>
                        </br>
                        <a href="addcate.php" class="btn btn-primary">Thêm Danh Mục</a>
                        </br> </br>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Danh Mục</th>
                                <th scope="col">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $show_cate = $cate->show_list_category();
                                if($show_cate == true){
                                    $index = 0;
                                    while ($result = $show_cate->fetch_assoc()){
                                        $name = $result['name'];
                                        $id = $result['id'];
                                        $index++;
                            ?>

                                <tr>
                                <th scope="row"><?php echo $index ?></th>
                                <td><?php echo $name ?></td>
                                <td><a href="cateupdate.php?id=<?php echo $id ?>" class="btn btn-warning"><i class="fad fa-edit"></i></a> || <a onclick = "return confirm('Bạn có muốn xóa không?')" href="?deleteid=<?php echo $id ?>" class="btn btn-danger"><i class="fad fa-trash"></i></a></td>
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