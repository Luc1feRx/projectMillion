<?php
  include '../commons/header.php';
  include '../commons/sidebar.php';
  include '../classes/category.php';
?>

<?php
    $cate = new category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cateName = $_POST['catename'];
        $level = $_POST['level'];

        
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

          <form action="add.php" method="POST" style="margin-left: 600px;">

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tên Thể Loại</label>
                    <div class="col-sm-10">
                        <input type="text" name="catename">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cấp Độ</label>
                    <div class="col-sm-10">
                        <input type="text" name="level">
                    </div>
                </div>
                <input type="submit" name="submit" value="Them Thể Loại" class="btn btn-primary"></input>
            </form>
        </div>
    </div>
</body>

<?php
  include_once '../commons/footer.php';
?>