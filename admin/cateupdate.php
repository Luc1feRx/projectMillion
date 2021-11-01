<?php
    include_once './commons/header.php';
    include_once './commons/sidebar.php';
    include_once '../classes/category.php';
?>

<?php
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo "<script>window.location ='catelist.php'</script>";
     }else{
          $id = $_GET['id']; 
     }
     $cate = new category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cateName = $_POST['catename'];
        $update_cate = $cate->update_category($cateName, $id);
    }
 
?>


<body>
    <div class="main">
        <div class="grid">
          <h1 style="text-align: center;">Sửa Danh Mục</h1>
          <?php
            if(isset($update_cate)){
              echo $update_cate;
            }
            ?>

            <?php
                $get_cate_name = $cate->getcatebyId($id);
                if($get_cate_name == true){
                    while($result = $get_cate_name->fetch_assoc()){
                        $cateName = $result['name'];

            ?>

          <form action="" method="POST" style="margin-left: 600px;">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tên Danh Mục</label>
                    <div class="col-sm-10">
                        <input type="text" name="catename" value = "<?php echo $cateName ?>">
                    </div>
                </div>
                
                <input type="submit" name="submit" value="Sửa Thể Loại" class="btn btn-primary"></input>
            </form>

            <?php
                    }
                }
            ?>
        </div>
    </div>
</body>


<?php
    include_once './commons/footer.php';
?>