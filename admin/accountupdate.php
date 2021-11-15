<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/Account.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>

<?php
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo "<script>window.location ='accountlist.php'</script>";
     }else{
          $id = $_GET['id']; 
     }
?>

<body>
    <div class="content-wrapper">
        <div class="container">
       
        <h1 class="m-0">Sửa Tài Khoản</h1>
            <?php
                if(isset($update_account)){
                    echo $update_account;
                }
            ?>
            </br>
            <?php
            $account = new Account();
                $get_account = $account->getaccountbyId($id);
                if($get_account == true){
                    while($result = $get_account->fetch_assoc()){
                        $fullName = $result['fullName'];

            ?>
            <form method="post" enctype="multipart/form-data">

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
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Số Điện Thoại</label>
                <div class="col-sm-10">
                    <input type="text" name="phone">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Địa Chỉ</label>
                <div class="col-sm-10">
                    <input type="text" name="address">
                </div>
            </div>

            <input type="submit" name="submit" value="Sửa Tài Khoản" class="btn btn-primary"></input>
        </form>
        <?php
                    }
                }
            ?>
        </div>
    </div>
</body>

<?php include 'commons/footer.php';?>