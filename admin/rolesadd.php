<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include_once '../classes/roles.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>

<?php
    $roles = new roles();
    if (isset($_POST['rolesName']) && isset($_POST['submit'])){
        $rolesName = $_POST['rolesName'];

        $insert_roles = $roles->insert_roles($rolesName);
        echo "<meta http-equiv='refresh' content='0;URL=roleslist.php'>";
    }
?>

<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <form action="rolesadd.php" method="post">
					<div class="form-group">
                        <h1 class="center">Thêm Quyền</h1>
                        <?php
                            if(isset($insert_roles)){
                            echo $insert_roles;
                            }
                        ?>
					  <!-- <input type="hidden" name="id" value="<?= $id ?>"> -->
					  <label>Tên Quyền:</label>
					  <input name="rolesName" type="text" class="form-control" placeholder="Nhập tên quyền">
					<button class="btn btn-primary" name="submit" type="submit" style="margin-top: 25px;">Thêm Quyền</button>
                    </div>
				</form>
            </div>
        </div>
</div>


<?php include_once 'commons/footer.php';?>