<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include_once '../classes/roles.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>


<?php
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo "<script>window.location ='roleslist.php'</script>";
     }else{
          $id = $_GET['id']; 
     }
     $roles = new roles();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $rolesName = $_POST['rolesName'];
        $update_roles = $roles->update_roles($rolesName, $id);
        echo "<meta http-equiv='refresh' content='0;URL=roleslist.php'>";
    }
 
?>

<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <form method="post">
					<div class="form-group">
                        <h1 class="center">Thêm Quyền</h1>
                        <?php
                            if(isset($update_roles)){
                            echo $update_roles;
                            }
                        ?>
					  <label>Tên Quyền:</label>

                      <?php
                        $get_roles = $roles->getrolesbyId($id);
                        foreach ($get_roles as $item):
                      ?>
					  <input name="rolesName" type="text" value="<?php echo $item['name'] ?>" class="form-control" placeholder="Nhập tên quyền">
                      <?php endforeach ?>
                        <button class="btn btn-primary" name="submit" type="submit" style="margin-top: 25px;">Thêm Quyền</button>
                        </div>
				</form>
            </div>
        </div>
</div>


<?php include_once 'commons/footer.php';?>