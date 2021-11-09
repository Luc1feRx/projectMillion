<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php include '../classes/category.php'?>
<?php include '../classes/products.php'?>
<?php $filepath = realpath(dirname(__FILE__)); 
    include_once ($filepath.'/../lib/upload.php'); ?>

<?php
    if(!isset($_GET['id']) || $_GET['id']==NULL){
        echo "<script>window.location ='productslist.php'</script>";
     }else{
          $id = $_GET['id']; 
     }
?>
<?php
                if (isset($_FILES['file']) && isset($_FILES['image']) && isset($_POST['submit'])){
                    $products = new product();
                    $upload = new upload();
                    if ($upload->uploads()) {
                        $file = $upload->getRealpath();
                        $_POST['file'] = $file;
                        $updateProduct = $products->update_product($_POST, $_FILES, $id);
                    }
                }
            ?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid"> 
            <h2>Sửa sản phẩm</h2>
            <?php
                if(isset($updateProduct)){
                    echo $updateProduct;
                }
            ?>
            <div class="panel panel-primary">
                <div class="panel-body">
                <?php
                        $products = new product();
                        $get_products = $products->getproductsbyId($id);
                        if($get_products == true){
                            while($result_product = $get_products->fetch_assoc()){

                ?>
                  <form method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6 col-12">
                        <div class="form-group">
                        <input type="hidden" name = "id" value="<?php echo $result_product['id'] ?>"/>
                          <!-- Tên sản phẩm -->
                          <label class="m-1">Tên Sản Phẩm</label>
                          <input type="text" name="productName" placeholder="Enter Product Name..." value="<?php echo $result_product['name'] ?>" class="medium" style="width: 100%;" />
                        </div>

                        <!-- Nội dung -->
                        <div class="form-group">
                            <label class="m-1">Danh Mục</label>
                            <select id="select" name="cate_id" style="width: 100%;">
                            <option>--------Select Category--------</option>
                            <?php
                            $getCatesByProductId = $products->getCatesByProductId($id);
                            if($getCatesByProductId){
                                while($r = $getCatesByProductId->fetch_assoc()){
                                    // var_dump($r['id']);
                                $cateID = $r['id'];
                            }
                        }

                        $getBrandByProductId = $products->getBrandByProductId($id);
                            if($getBrandByProductId){
                                while($row = $getBrandByProductId->fetch_assoc()){
                                    // var_dump($r['id']);
                                $brandID = $row['brand_id'];
                            }
                        }
                                  

                            $cat = new category();
                            $catlist = $cat->show_category();

                            if($catlist){
                                while($result = $catlist->fetch_assoc()){
                             ?>

                            <option
                            <?php
                            if($result['id']==$cateID){ echo 'selected';  }
                            ?>

                            value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>


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
                                while($result2 = $brandlist->fetch_assoc()){
                             ?>

                            <option
                            <?php
                            if($result2['id']==$brandID){ echo 'selected';  }
                            ?> 
                            value="<?php echo $result2['id'] ?>"><?php echo $result2['name'] ?></option>
                            <!-- <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option> -->

                               <?php
                                  }
                              }
                           ?>
                           
                        </select>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Mô Tả</label>
                            <textarea id="ckeditor" cols="50" rows="10" name="short_desc" style="width: 100%;"><?php echo $result_product['short_desc'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Giá Cả</label>
                            <input type="text" name="price" value="<?php echo $result_product['price'] ?>" placeholder="Enter Price..." class="medium" style="width: 100%;"/>
                        </div>


                        <div class="form-group">
                            <label class="m-1">Hình Ảnh</label>
                            <input type="file" name="image" style="width: 100%;"/>
                        </div>

                        <div class="form-group">
                            <img height="200px" width="250px" src="<?php echo 'uploads/' . $result_product['image'] ?>" alt="">
                        </div>


                        <div class="form-group">
                            <label class="m-1">Tình Trạng Máy</label>
                            <select id="select" name="status" style="width: 100%;">
                            <option>--------Select Status-------</option>
                            <option <?php if($result_product['status'] == 1) {echo 'selected';} ?> value="1">Mới</option>

                            <option <?php if($result_product['status'] == 0) {echo 'selected';} ?> value="0">Cũ</option>
                            </select>
                            <!-- <input type="number" min="0" max="1" value="" style="width: 100%;"name="status" placeholder="1 là mới, 0 là cũ" required> -->
                        </div>

                        <div class="form-group">
                            <label class="m-1">RAM</label>
                            <input type="text" name="ram" value="<?php echo $result_product['ram'] ?>" style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Model</label>
                            <input type="text" name="model" value="<?php echo $result_product['model'] ?>" style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Sửa Sản Phẩm"/>
                        </div>
                      </div>


                      <div class="col-md-6 col-12">
                        <div class="form-group">


                        <div class="form-group">
                            <label class="m-1">CPU</label>
                            <input type="text" name="chip" value="<?php echo $result_product['chip'] ?>" style="width: 100%;" required>
                        </div>


                        <div class="form-group">
                            <label class="m-1">Card màn hình</label>
                            <input type="text" name="card" value="<?php echo $result_product['card'] ?>" style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Ổ đĩa</label>
                            <input type="text" name="drive" value="<?php echo $result_product['drive'] ?>" style="width: 100%;" required>
                        </div>
                        <div class="form-group">
                            <label class="m-1">Màn hình</label>
                            <input type="text" name="display" value="<?php echo $result_product['display'] ?>" style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Vân Tay</label>
                            <select id="select" name="vantay" style="width: 100%;">
                            <option>--------Select Fingerprint-------</option>
                            <option <?php if($result_product['vantay'] == 1) {echo 'selected';} ?> value="1">Có</option>

                            <option <?php if($result_product['vantay'] == 0) {echo 'selected';} ?> value="0">Không</option>
                            </select>
                            <!-- <input type="number" min="0" max="1" value="" style="width: 100%;"name="vantay" placeholder="1 là có, 0 là không" required> -->
                        </div>

                        <div class="form-group">
                            <label class="m-1">Hệ điều hành</label>
                            <input type="text" name="operation" value="<?php echo $result_product['operation'] ?>" style="width: 100%;" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Pin</label>
                            <input type="number" name="pin" value="<?php echo $result_product['pin'] ?>" style="width: 100%;" placeholder="cell" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Trọng Lượng</label>
                            <input type="number" name="weight" value="<?php echo $result_product['weight'] ?>" style="width: 100%;" placeholder="Kg" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Kết Nối</label>
                            <input type="text" name="connect" value="<?php echo $result_product['connect'] ?>" style="width: 100%;" placeholder="Wifi, blutooth " required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Số Lượng</label>
                            <input type="number" name="quantity" value="<?php echo $result_product['quantity_product'] ?>" style="width: 100%;" placeholder="Nhập số lượng" required>
                        </div>

                        <div class="form-group">
                            <label class="m-1">Giảm Giá</label>
                            <input type="text" name="discount" value="<?php echo $result_product['discount'] ?>" style="width: 100%;" placeholder="Bao nhiêu %">
                        </div>

                        <div class="form-group">
                            <label class="m-1">Tiêu Đề</label>
                            <?php
                            $getContentProducts = $products->getContentProducts($id);
                            if($getContentProducts){
                                while($ro = $getContentProducts->fetch_assoc()){
                                

                            ?>
                            <input type="text" name="title" value="<?php echo $ro['title']?>" placeholder="Nhập Tiêu Đề">
                            <input type="file" name="file" style="width: 100%;">
                            <img height="200px" width="250px" src="<?php echo 'uploads/' . $ro['imgTieuDe'] ?>" alt="">
                            <textarea name="content" style="width: 100%;" cols="50" rows="10" placeholder="Nhập Nội Dung"><?php echo $ro['content'] ?></textarea>

                        <?php
                             }
                          }
                        ?>
                        </div>
                      </div>
                    </div>
                  </form>
                  <?php
                    }
                }
            ?>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php include 'commons/footer.php';?>