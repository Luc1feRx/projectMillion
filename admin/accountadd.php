<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/Account.php'?>

<?php
    $acc = new Account();
?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            
            <h1 class="m-0 center">Thêm Tài Khoản</h1>
    
            </br></br>
    
            <div class="row">
                <div class="col-md-8">
                <?php
                    if(isset($insert_account)){
                        echo $insert_account;
                    }
                ?>
                <form action="accountadd.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Quyền</label>
                        <select name="role_id" style="width: 100%;">
                            <option value="0">Tiến Sĩ</option>
                            <option value="1">Thạc Sĩ</option>
                            <option value="2">Kỹ Sư</option>
                            <option value="3">Khác</option>
                        </select>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Họ Tên</label>
                    <div class="col-sm-10">
                        <input type="text" name="fullname">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tên Tài Khoản</label>
                    <div class="col-sm-10">
                        <input type="text" name="username">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Mật Khẩu</label>
                    <div class="col-sm-10">
                        <input type="text" name="password">
                    </div>
                </div>
                <input type="submit" name="submit" value="Thêm Tài Khoản" class="btn btn-primary"></input>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>

<?php include 'commons/footer.php'; ?>