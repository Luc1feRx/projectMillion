<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include_once '../classes/employees.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>

<?php
        if (isset($_FILES['image']) && isset($_POST['submit'])){
            $emp = new employee();
            $insertEmp = $emp->insert_employee($_POST);
            echo "<meta http-equiv='refresh' content='0;URL=emplist.php'>";
        }

?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row center">
                    <h1>Thêm Nhân Viên</h1>
                </div>
                <?php
                    if(isset($insertEmp)){
                        echo $insertEmp;
                    }
                ?>
                <form action="empadd.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label class="form-label">Họ Và Tên:</label>
                            <input type="text" class="form-control" id="hoten" name="fullname" placeholder="Nhập Họ Tên" required aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                        <label class="form-label">Giới Tính: </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh" value="1">
                            <label class="form-check-label">
                                Nam
                            </label>
                            <div class="clear"></div>
                            <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh" value="0">
                            <label class="form-check-label">
                                Nữ
                            </label>
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Địa Chỉ:</label>
                            <input type="text" class="form-control" id="address" name="address" required name="address">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Ngày Sinh:</label>
                            <input type="datetime-local" class="form-control" id="ngaysinh" name="dob" value="2021-11-11">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Phone: </label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email: </label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Hình Ảnh:</label>
                                <div class="row">
                                <div class="wrapperr">
                            <div class="imagee">
                            <img class = "imgg" src="" alt="">
                            </div>
                            <div class="content">
                                <div class="icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="text">
                                    No file chosen, yet!
                                </div>
                            </div>
                            <div id="cancell-btn">
                            <i class="fas fa-times"></i>
                            </div>
                            <div class="filee-name">
                            File name here
                            </div>
                            </div>
                            <button onclick="defaultBtnActive()" id="customr-btn">Choose a file</button>
                            <input id="defaultr-btn" type="file" name="image" hidden>
                                </div>
                            <!-- <label class="m-1">Hình Ảnh</label>
                            <input type="file" id="thumbnail" name="image" style="width: 100%;" required/> -->
                            </div>
                        </div>


                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
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


