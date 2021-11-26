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
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

          <form action="addcate.php" method="POST">
            <h1>Thêm Danh Mục</h1>
                <?php
                    if(isset($insert_cate)){
                    echo $insert_cate;
                    }
                ?>
                <div class="form-group">
                    <label>Tên Danh Mục: </label>
                    <input type="text" name="catename" class="form-control" placeholder="Nhập Tên Danh Mục">

                    <input type="submit" name="submit" value="Thêm Thể Loại" class="btn btn-primary" style="margin-top: 25px;"></input>
                </div>
                
            </form>
            </div>
        </div>
</div>
</body>

<?php include 'commons/footer.php';?>