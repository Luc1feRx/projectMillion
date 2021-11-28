<?php
    include_once './commons/header.php';
    include_once './commons/sidebar.php';
    include_once '../classes/employees.php';
?>

<?php
    $emp = new employee();
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $deleteEmp = $emp->delete_employee($id);
        echo "<meta http-equiv='refresh' content='0;URL=emplist.php'>";
     }
    
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $count = 10;
    $offset = ($page - 1) * $count;
    $list = $emp->getEmpLimit($offset, $count);
?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                    <div class="col-sm-12">
                        <h1 class="m-0 ">Danh Sách Nhân Viên</h1>
                        </br>
                        <?php
                            if(isset($deleteEmp)){
                                echo $deleteEmp;
                            }
                        ?>

            </br> </br>
            <form action="searchEmp.php" method="GET">

            <div class="row">
                <div class="col-md-11">
                    <input required class="form-control" type="text" name="search" placeholder="Nhập thông tin cần tìm kiếm ...">
                </div>
                <div class="col-md-1">
                    <button type="submit" style="width: 100%;" class="btn btn-dark"><i class="fas fa-search"></i></button>
                </div>

            </div>
            </form>
            </br> </br>
                        <a href="empadd.php" class="btn btn-primary">Thêm Nhân Viên</a>
                        </br> </br>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Họ Tên</th>
                                <th scope="col">Giới Tính</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Ngày Sinh</th>
                                <th scope="col">Email</th>
                                <th scope="col">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $show_employee = $emp->show_list_employees();
                                if($show_employee == true){
                                    $index = 0;
                                    $gioitinh='';
                                    while ($result = $show_employee->fetch_assoc()){
                                        $name = $result['fullname'];
                                        $id = $result['id'];
                                        $diaChi = $result['address'];
                                        $ngaySinh = $result['dob'];
                                        $email = $result['email'];
                                        $image = $result['image'];
                                        $index++;
                            ?>

                                <tr>
                                <th scope="row"><?php echo $index++; ?></th>
                                <td><img src="./emp/<?php echo $image;?>" style="max-height: 100px; margin-top: 5px; margin-bottom: 15px;" alt=" <?php echo $name; ?>"></td>
                                <?php 
                                if($result['sex'] == 1) $gioitinh = 'Nam';
                                if($result['sex'] == 0) $gioitinh = 'Nữ';
                                ?>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $gioitinh; ?></td>
                                <td><?php echo $diaChi; ?></td>
                                <td><?php echo $ngaySinh; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><a href="empupdate.php?id=<?php echo $id ?>" class="btn btn-warning"><i class="far fa-pen-square"></i></a> || <a onclick = "return confirm('Bạn có muốn xóa không?')" href="?deleteid=<?php echo $id ?>" class="btn btn-danger"><i class="fad fa-trash"></i></a></td>
                                </tr>
                            <?php 
                            }
                        }
                            ?>
                            </tbody>
                        </table>
                        <div class="d-flex">
                <?php
                //tinh tổng số bản ghi
                $db = new Database();
                $rows = $db->Select('select count(*) as count from employees');
                foreach ($rows as $r) {
                    $allRows = $r['count'];
                }
                $page = ceil($allRows / $count); //11/5 = 2.2 xấp xỉ 3 -> 2 trang
                for ($i = 0; $i < $page; $i++) {
                    $pageCount = $i + 1;
                    // echo ' <button> <a href="?page=' . $pageCount . '">' . $pageCount . '</a></button>';
                    echo '<li class="outer circle">
                    <button><a class="" href="?page=' . $pageCount . '">' . $pageCount . '</a></button>
                    </li>';
                }
                ?>
                </div>
                    </div>
            </div>
        </div>
    </div>  

</body>

<?php
    include_once './commons/footer.php';
?>