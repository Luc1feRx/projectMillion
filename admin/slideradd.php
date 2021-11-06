<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include_once '../classes/slider.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>

<body>
    <div class="content-wrapper">
        <div class="container">
        <?php
            if (isset($_FILES['file']) && isset($_POST['sliderName']) && isset($_POST['submit'])) {
                $slider = new slider();
                ////check file upload
                $upload = new upload();
                if ($upload->uploads()) {
                    $realpath = $upload->getRealpath();
                    $_POST['file'] = $realpath;
                    $insert_slider = $slider->insert_slider($_POST);
                }
            }
        ?>
        <h1 class="m-0">Thêm Slide</h1>
            <?php
                if(isset($insert_slider)){
                    echo $insert_slider;
                }
            ?>
            </br>
            <form method="post" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên</label>
                <div class="col-sm-10">
                    <input type="text" name="sliderName">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input type="file" name="file">
                </div>
            </div>

            <input type="submit" name="submit" value="Thêm Slide" class="btn btn-primary"></input>
        </form>
        </div>
    </div>
</body>

<?php include 'commons/footer.php';?>


