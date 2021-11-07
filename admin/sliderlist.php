<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include_once '../classes/slider.php'?>

<?php
    $slider = new slider();
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $deleteslider = $slider->delete_slider($id);
     }
    
?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                    <div class="col-sm-12">
                        <h1 class="m-0 ">Danh Sách Slide</h1>
                        <?php
                            if(isset($deleteslider)){
                                echo $deleteslider;
                            }
                        ?>
                        </br>
                        <a href="slideradd.php" class="btn btn-primary">Thêm Slide</a>
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
                                $show_slider = $slider->show_list_slider();
                                if($show_slider == true){
                                    $index = 0;
                                    while ($result = $show_slider->fetch_assoc()){
                                        $name = $result['name'];
                                        $id = $result['id'];
                                        $index++;
                            ?>

                                <tr>
                                <th scope="row"><?php echo $index ?></th>
                                <td><?php echo $name ?></td>
                                <td><img src="./uploads/<?=$result['img']?>" style="max-height: 100px; margin-top: 5px; margin-bottom: 15px;" alt=" <?php echo $result['name'] ?>"></td>
                                <td><a href="sliderupdate.php?id=<?php echo $id ?>" class="btn btn-warning"><i class="far fa-pen-square"></i></a> || <a onclick = "return confirm('Bạn có muốn xóa không?')" href="?deleteid=<?php echo $id ?>" class="btn btn-danger"><i class="fad fa-trash"></i></a></td>
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
