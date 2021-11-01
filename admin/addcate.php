<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/category.php'?>

<?php
    $cate = new category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cateName = $_POST['catename'];

        $insert_cate = $cate->insert_category($cateName);
    }
?>


<body>
    <div class="main">
        <div class="grid">
          <h1 style="text-align: center;">Thêm Danh Mục</h1>
          <?php
            if(isset($insert_cate)){
              echo $insert_cate;
            }
        ?>

          <form action="addcate.php" method="POST" style="margin-left: 600px;">

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tên Danh Mục</label>
                    <div class="col-sm-10">
                        <input type="text" name="catename" placeholder="Nhập Tên Danh Mục">
                    </div>
                </div>
                
                <input type="submit" name="submit" value="Them Thể Loại" class="btn btn-primary"></input>
            </form>
        </div>
    </div>
</body>

<?php include 'commons/footer.php';?>