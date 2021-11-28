<?php
    include_once './commons/header.php';
    include_once './commons/sidebar.php';
    include_once '../classes/roles.php';
?>

<?php
    $roles = new roles();
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $deleteroles = $roles->delete_roles($id);
        echo "<meta http-equiv='refresh' content='0;URL=roleslist.php'>";
     }
    
?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                    <div class="col-sm-12">
                        <h1 class="m-0 ">Danh Sách Quyền</h1>
                        <?php
                            if(isset($deleteroles)){
                                echo $deleteroles;
                            }
                        ?>
                        </br>
                        <a href="rolesadd.php" class="btn btn-primary">Thêm Quyền</a>
                        </br> </br>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Quyền</th>
                                <th scope="col">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $show_roles = $roles->show_list_roles();
                                if($show_roles == true){
                                    $index = 0;
                                    while ($result = $show_roles->fetch_assoc()){
                                        $name = $result['name'];
                                        $id = $result['id'];
                                        $index++;
                            ?>

                                <tr>
                                <th scope="row"><?php echo $index ?></th>
                                <td><?php echo $name ?></td>
                                <td><a href="rolesupdate.php?id=<?php echo $id ?>" class="btn btn-warning"><i class="far fa-pen-square"></i></a> || <a onclick = "return confirm('Bạn có muốn xóa không?')" href="?deleteid=<?php echo $id ?>" class="btn btn-danger"><i class="fad fa-trash"></i></a></td>
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