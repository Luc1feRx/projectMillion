<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/roles.php'?>
<?php include '../classes/Account.php'?>

<?php
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo "<script>window.location ='accountlist.php'</script>";
     }else{
          $id = $_GET['id'];
     }
?>

<?php
    $account = new account();
    $role = new roles();
    if(isset($_POST['submit']) && isset($_POST['role_id'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $roles = $_POST['role_id'];
        $password = md5($_POST['password']);
        $update_account = $account->update_account($fullname, $username, $password, $roles, $id);
        echo "<meta http-equiv='refresh' content='0;URL=accountlist.php'>";
    }
?>

    <div class="content-wrapper">
        <div class="container">
        <form method="POST" style="margin-left: 200px;">
        <h1 class="m-0">Sửa Tài Khoản</h1>
        
            <?php
                if(isset($update_account)){
                    echo $update_account;
                }
            ?>

            <?php
                $getAccountbyId = $account->getAccountbyId($id);
                if($getAccountbyId){
                    while($row = $getAccountbyId->fetch_assoc()){
                        $fullname = $row['fullname'];
                        $username = $row['username'];
                        $roles = $row['role_id'];
                        $password = $row['password'];
                    }
                }
            ?>

            <form action="accountupdates.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <label class="col-sm-2 col-form-label">Quyền</label>
                            <select id="select" name="role_id" style="width: 20%;">
                            <option>--------Select roles-------</option>
                             <?php
                            $roleslist = $role->show_role();

                            if($roleslist){
                                while($result = $roleslist->fetch_assoc()){
                             ?>
                            <option
                            <?php
                            if($result['id']==$roles){ echo 'selected'; }
                            ?> 

                             value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
                </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Họ Tên</label>
                <div class="col-sm-10">
                    <input type="text" name="fullname" value="<?php echo $fullname ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên Tài Khoản</label>
                <div class="col-sm-10">
                    <input type="text" name="username" value="<?php echo $username ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Mật Khẩu</label>
                <div class="col-sm-10">
                    <input type="password" name="password" value="<?php echo $password ?>">
                </div>

            <div><input type="submit" name="submit" value="Sửa Tài Khoản" class="btn btn-primary"/></div>

            
        </form>
        </div>
    </div>


<?php include 'commons/footer.php'; ?>