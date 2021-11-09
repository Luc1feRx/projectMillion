<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include_once '../classes/slider.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row center">
                    <h1>Thêm Nhân Viên</h1>
                </div>
                <form action="" method="post">
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
                            <input type="datetime-local" class="form-control" id="ngaysinh" name="ngaysinh" required name="ngaysinh" value="2021-10-25">
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

                        <div class="form-group">
                            <label class="form-label">Quê Quán: </label>
                            <input type="text" class="form-control" id="quequan" name="quequan" required>
                        </div>

                        <div class="form-group">
                        <label class="form-label">Trình Độ Học Vấn: </label>
                        <select name="tdhv">
                            <option value="0">Tiến Sĩ</option>
                            <option value="1">Thạc Sĩ</option>
                            <option value="2">Kỹ Sư</option>
                            <option value="3">Khác</option>
                        </select>

                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php include 'commons/footer.php';?>


