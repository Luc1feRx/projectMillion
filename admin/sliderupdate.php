<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include_once '../classes/slider.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>

<?php
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo "<script>window.location ='sliderlist.php'</script>";
     }else{
          $id = $_GET['id']; 
     }
?>

<body>
    <div class="content-wrapper">
        <div class="container">
        <?php
            if (isset($_FILES['file']) && isset($_POST['sliderName'])) {
                $slider = new slider();
                ////check file upload
                $upload = new upload();
                if ($upload->uploads()) {
                    $realpath = $upload->getRealpath();
                    $_POST['file'] = $realpath;
                    $update_slider = $slider->update_slider($_POST, $id);
                }
            }
        ?>
        <h1 class="m-0">Sửa Slide</h1>
            <?php
                if(isset($update_slider)){
                    echo $update_slider;
                }
            ?>
            </br>
            <?php
            $slider = new slider();
                $get_slider = $slider->getSliderbyId($id);
                if($get_slider == true){
                    while($result = $get_slider->fetch_assoc()){
                        $sliderName = $result['name'];

            ?>
            <form method="post" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên</label>
                <div class="col-sm-10">
                    <input type="text" name="sliderName" value = "<?php echo $sliderName ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input type="file" name="file">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <img height="100px" width="200px" src="<?php echo 'uploads/' . $result['img'] ?>" alt="">
                </div>
            </div>

            <input type="submit" name="submit" value="Sửa Thưong Hiệu" class="btn btn-primary"></input>
        </form>
        <?php
                    }
                }
            ?>
        </div>
    </div>
</body>

<?php include 'commons/footer.php';?>