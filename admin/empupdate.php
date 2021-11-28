<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include_once '../classes/employees.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>

<?php
    $emp = new employee();
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo "<script>window.location ='emplist.php'</script>";
     }else{
          $id = $_GET['id']; 
     }

     if (isset($_FILES['image']) && isset($_POST['submit'])){
         $updateEmp = $emp->update_employee($_POST, $id);
         echo "<meta http-equiv='refresh' content='0;URL=emplist.php'>";
     }
?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row center">
                    <h1>Sửa Nhân Viên</h1>
                </div>
                <?php
                    if(isset($updateEmp)){
                        echo $updateEmp;
                    }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <?php
                            $get_emp = $emp->getEmployeesbyId($id);
                        ?>
                    <div class="col-md-9">
                        <?php foreach($get_emp as $row):?>
                        <div class="form-group">
                            <label class="form-label">Họ Và Tên:</label>
                            <input type="text" class="form-control" id="hoten" name="fullname" value = "<?php echo $row['fullname']; ?>" placeholder="Nhập Họ Tên" required aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                        <label class="form-label">Giới Tính: </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh" value="1" <?= $row['sex'] == 1 ? 'checked' : ''?>>
                            <label class="form-check-label">
                                Nam
                            </label>
                            <div class="clear"></div>
                            <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh" value="0" <?= $row['sex'] == 0 ? 'checked' : ''?>>
                            <label class="form-check-label">
                                Nữ
                            </label>
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Địa Chỉ:</label>
                            <input type="text" class="form-control" id="address" value = "<?php echo $row['address']; ?>" name="address" required name="address">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Ngày Sinh:</label>
                            <input type="datetime-local" class="form-control" id="ngaysinh" name="dob" value="<?= str_replace(' ', 'T', $row['dob'])  ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Phone: </label>
                            <input type="text" class="form-control" id="phone" value = "<?php echo $row['phone']; ?>" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email: </label>
                            <input type="text" class="form-control" id="email" value = "<?php echo $row['email']; ?>" name="email" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                    <div class="form-group">
                        <div class="wrapperr">
                            <div class="imagee">
                            <img class = "imgg" src="<?php echo 'emp/' . $row['image'] ?>" alt="">
                            </div>
                            <div class="content">
                                <div class="icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="text">
                                    No file chosen, yet!
                                </div>
                            </div>
                            <div id="cancell-btn">
                            <i class="fas fa-times"></i>
                            </div>
                            <div class="filee-name">
                            File name here
                            </div>
                            </div>
                            <!-- <button onclick="defaultBtnActive()" id="customr-btn">Choose a file</button> -->
                            <input id="defaultr-btn" type="file" name="image">
                            <!-- <label class="m-1">Hình Ảnh</label>
                            <input type="file" id="thumbnail" name="image" style="width: 100%;" required/> -->
                        </div>
                        </div>
                        <?php endforeach; ?>

                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<?php include 'commons/footer.php';?>


