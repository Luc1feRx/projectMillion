<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>

<?php
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo "<script>window.location ='brandlist.php'</script>";
     }else{
          $id = $_GET['id']; 
     }
?>

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
                    $update_brand = $brand->update_brand($_POST, $id);
                }
            }
        ?>
        <h1 class="m-0">Sửa Thương Hiệu</h1>
            <?php
                if(isset($update_brand)){
                    echo $update_brand;
                }
            ?>
            </br>
            <?php
            $brand = new brand();
                $get_brand = $brand->getbrandbyId($id);
                if($get_brand == true){
                    while($result = $get_brand->fetch_assoc()){
                        $brandName = $result['name'];

            ?>
            <form method="post" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên</label>
                <div class="col-sm-10">
                    <input type="text" name="brandName" value = "<?php echo $brandName ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input type="file" name="file" value = "<?php echo $result['img'] ?>">
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