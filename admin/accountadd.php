<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/roles.php'?>
<?php include '../classes/Account.php'?>
<?php
    $account = new account();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role_id = $_POST['role_id'];
        $insert_account = $account->insert_account($fullname, $username, $password, $role_id);
    }
?>
<body>
    <div class="content-wrapper">
        <div class="container">
        <form action="accountadd.php" method="POST" style="margin-left: 200px;">
        <h1 class="m-0">Thêm Tài Khoản</h1>
        
            <?php
                if(isset($insert_account)){
                    echo $insert_account;
                }
            ?>
            <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Quyền</label>
                            <select id="select" name="role_id" style="width: 20%;">
                            <option>--------Select roles-------</option>
                             <?php
                            $roles = new roles();
                            $roleslist = $roles->show_list_roles();

                            if($roleslist){
                                while($result = $roleslist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Họ Tên</label>
                <div class="col-sm-10">
                    <input type="text" name="fullname" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên Tài Khoản</label>
                <div class="col-sm-10">
                    <input type="text" name="username" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Mật Khẩu</label>
                <div class="col-sm-10">
                    <input type="password" name="password" required>
                </div>

            <div><input type="submit" name="submit" value="Thêm Tài Khoản" class="btn btn-primary"/></div>
            
        </form>
        </div>
    </div>
</body>

<?php include 'commons/footer.php'; ?>