<?php
    include_once './commons/header.php';
    include_once './commons/sidebar.php';
    include_once '../classes/brand.php';
?>

<?php
    $brand = new brand();
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $deletebrand = $brand->delete_brand($id);
     }
    
?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                    <div class="col-sm-12">
                        <h1 class="m-0 ">Danh Sách Thương Hiệu</h1>
                        <?php
                            if(isset($deletebrand)){
                                echo $deletebrand;
                            }
                        ?>
                        </br>
                        <a href="brandadd.php" class="btn btn-primary">Thêm Thương Hiệu</a>
                        </br> </br>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Thương Hiệu</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $show_brand = $brand->show_list_brand();
                                if($show_brand == true){
                                    $index = 0;
                                    while ($result = $show_brand->fetch_assoc()){
                                        $name = $result['name'];
                                        $id = $result['id'];
                                        $index++;
                            ?>

                                <tr>
                                <th scope="row"><?php echo $index ?></th>
                                <td><?php echo $name ?></td>
                                <td><img src="./uploads/<?=$result['img']?>" alt=" <?php echo $result['name'] ?>"></td>
                                <td><a href="brandupdate.php?id=<?php echo $id ?>" class="btn btn-warning"><i class="fad fa-edit"></i></a> || <a onclick = "return confirm('Bạn có muốn xóa không?')" href="?deleteid=<?php echo $id ?>" class="btn btn-danger"><i class="fad fa-trash"></i></a></td>
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