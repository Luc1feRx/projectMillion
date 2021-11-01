<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>


<body>
    <div class="content-wrapper">
        <div class="container">
        <?php
            if (isset($_FILES['file']) && isset($_POST['brandName'])) {
                $brand = new brand();
                ////check file upload
                $upload = new upload();
                if ($upload->uploads()) {
                    $realpath = $upload->getRealpath();
                    $_POST['file'] = $realpath;
                    $insert_brand = $brand->insert_brand($_POST);
                }
            }
        ?>
        <h1 class="m-0">Thêm Thương Hiệu</h1>
            <?php
                if(isset($insert_brand)){
                    echo $insert_brand;
                }
            ?>
            </br>
            <form method="post" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên</label>
                <div class="col-sm-10">
                    <input type="text" name="brandName">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input type="file" name="file">
                </div>
            </div>

            <input type="submit" name="submit" value="Thêm Thưong Hiệu" class="btn btn-primary"></input>
        </form>
        </div>
    </div>
</body>

<?php include 'commons/footer.php';?>