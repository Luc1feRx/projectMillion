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
                echo "<meta http-equiv='refresh' content='0;URL=sliderlist.php'>";
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

    <script>
         const wrapper = document.querySelector(".wrapperr");
         const fileName = document.querySelector(".filee-name");
         const defaultBtn = document.querySelector("#defaultr-btn");
         const customBtn = document.querySelector("#customr-btn");
         const cancelBtn = document.querySelector("#cancell-btn i");
         const img = document.querySelector(".imgg");
         let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
         function defaultBtnActive(){
           defaultBtn.click();
         }
         defaultBtn.addEventListener("change", function(){
           const file = this.files[0];
           if(file){
             const reader = new FileReader();
             reader.onload = function(){
               const result = reader.result;
               img.src = result;
               wrapper.classList.add("active");
             }
             cancelBtn.addEventListener("click", function(){
               img.src = "";
               wrapper.classList.remove("active");
             })
             reader.readAsDataURL(file);
           }
           if(this.value){
             let valueStore = this.value.match(regExp);
             fileName.textContent = valueStore;
           }
         });
      </script>

</body>

<?php include 'commons/footer.php';?>


