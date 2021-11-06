<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php include '../classes/category.php'?>
<?php include '../classes/products.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>

<?php
    if (isset($_FILES['file']) && isset($_FILES['image']) && isset($_POST['submit'])){
        $products = new product();
        $upload = new upload();
        if ($upload->uploads()) {
            $file = $upload->getRealpath();
            $_POST['file'] = $file;
            $insertProduct = $products->insert_product($_POST);
        }
    }
?>


<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
            <h2>Thêm sản phẩm</h2>
            <?php
                if(isset($insertProduct)){
                    echo $insertProduct;
                    unset($insertProduct);
                }
            ?>
            <div class="panel panel-primary">
                <div class="panel-body">
                  <form action="productsadd.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                          <!-- Tên sản phẩm -->
                          <label class="m-1">Tên Sản Phẩm</label>
                          <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" style="width: 100%;" />
                        </div>

                        <div class="form-group">
                        <label class="m-1">Danh Mục</label>
                            <select id="select" name="cate_id" style="width: 100%;">
                            <option>--------Select Category--------</option>
                            <?php
                            $cat = new category();
                            $catlist = $cat->show_category();

                            if($catlist){
                                while($result = $catlist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                        </select>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Thương Hiệu</label>
                            <select id="select" name="brand_id" style="width: 100%;">
                            <option>--------Select Brand-------</option>

                             <?php
                            $brand = new brand();
                            $brandlist = $brand->show_brand();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
                             ?>

                            <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Mô Tả</label>
                            <textarea id="ckeditor" cols="50" rows="10" name="short_desc" style="width: 100%;"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Giá Cả</label>
                            <input type="text" name="price" placeholder="Enter Price..." class="medium" style="width: 100%;"/>
                        </div>


                        <div class="form-group">
                            <label class="m-1">Hình Ảnh</label>
                            <input type="file" name="image" style="width: 100%;" required/>
                        </div>


                        <div class="form-group">
                            <label class="m-1">Tình Trạng Máy</label>
                            <select id="select" name="status" style="width: 100%;">
                            <option>--------Select Status-------</option>
                            <option value="1">Mới</option>
                            <option value="0">Cũ</option>
                            </select>
                            <!-- <input type="number" min="0" max="1" value="" style="width: 100%;"name="status" placeholder="1 là mới, 0 là cũ" required> -->
                        </div>

                        <div class="form-group">
                            <label class="m-1">Model</label>
                            <input type="text" name="model" style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">CPU</label>
                            <input type="text" name="chip" style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">RAM</label>
                            <input type="text" name="ram" style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Thêm Sản Phẩm"/>
                        </div>
                      </div>


                      <div class="col-md-6 col-12">
                        <div class="form-group">

                        <div class="form-group">
                            <label class="m-1">Card màn hình</label>
                            <input type="text" name="card" style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Ổ đĩa</label>
                            <input type="text" name="drive" style="width: 100%;" required>
                        </div>
                        <div class="form-group">
                            <label class="m-1">Màn hình</label>
                            <input type="text" name="display" style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Vân Tay</label>
                            <select id="select" name="vantay" style="width: 100%;">
                            <option>--------Select Fingerprint-------</option>
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                            </select>
                            <!-- <input type="number" min="0" max="1" value="" style="width: 100%;"name="vantay" placeholder="1 là có, 0 là không" required> -->
                        </div>

                        <div class="form-group">
                            <label class="m-1">Hệ điều hành</label>
                            <input type="text" name="operation" style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Pin</label>
                            <input type="number" name="pin" style="width: 100%;" placeholder="cell" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Trọng Lượng</label>
                            <input type="number" name="weight" style="width: 100%;" placeholder="Kg" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Kết Nối</label>
                            <input type="text" name="connect" style="width: 100%;" placeholder="Wifi, blutooth " required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Số Lượng</label>
                            <input type="number" name="quantity" style="width: 100%;" placeholder="Nhập số lượng" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Giảm Giá</label>
                            <input type="text" name="discount" style="width: 100%;" placeholder="Bao nhiêu %">
                        </div>

                        <div class="form-group">
                            <label class="m-1">Tiêu Đề</label>
                            <input type="text" name="title" placeholder="Nhập Tiêu Đề">
                            <input type="file" name="file" style="width: 100%;">
                            <textarea name="content" style="width: 100%;" cols="50" rows="10" placeholder="Nhập Nội Dung"></textarea>
                        </div>

                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php include 'commons/footer.php';?>