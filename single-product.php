<?php
include_once("inc/header.php");
include_once("inc/top.php");
include_once ("classes/products.php");
include_once ("classes/brand.php");
include_once ("classes/category.php");
?>

<?php
    $product = new product();
    if(isset($_GET['product_id'])){
        $id = $_GET['product_id'];
        $productSingle = $product->getProductById($id);
        $cate = new category();
        $cates = $cate->getCatesByProductId($id);
    }
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Chi Tiết Sản Phẩm</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
                <?php include_once('singleSidebar.php') ?>
            <!-- ./ end sidebar -->
            <!-- MAin details -->
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="index.php">Home</a>
                        <?php foreach ($cates as $category) { ?>
                                <a href="productByCategory.php?cate=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a> 
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                        <?php foreach ($productSingle as $products): ?>
                            <div class="product-images">
                                <div class="product-main-img">
                                <img class="mainImg" height="800px" width="1000px" src="./admin/uploads/<?=$products['image']?>" alt="">

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo $products['name'] ?></h2>
                                <div class="product-inner-price">
                                    <!-- <ins><?php echo number_format($products['price']) . ' VND' ?></ins> -->
                                    <ins><?php $sellprice = $products['price'] * (100 - $products['discount']) / 100;
                                            echo number_format($sellprice) . ' VND' ?></ins>
                                    <del><?php if ($sellprice != $products['price']) echo number_format($products['price']) . ' VND' ?></del>
                                    <!-- <del>$100.00</del> -->
                                </div>
                                <!-- form post to cart  -->
                                <form action="" method="post" class="cart">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Số lượng" value="1" name="quantity" min="1" step="1">
                                    </div>
                                    <button class="add_to_cart_button" name="add-to-cart" value="<?php echo $products['id'] ?>" type="submit">Thêm vào giỏ</button>
                                </form>

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Chi Tiết</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Thông số kỹ thuật</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2><?php echo $products['short_desc'] ?></h2>
                                            <h2><b>Đặc Điểm Nổi Bật</b></h2>
                                            <hr>
                                            <?php // layu noi dung chi tiet ve lap top theo id san pham
                                            $contents = $product->getContentProducts($id);
                                            foreach ($contents as  $r) { ?>
                                                <h3><?php echo $r['title'] ?></h3>
                                                <img height="300px" width="400px" src="<?php echo 'admin/uploads/' . $r['imgTieuDe'] ?> " alt="">
                                                <p><?php echo $r['content'] ?></p>
                                                <hr>
                                            <?php } ?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <table class="table table-striped table-inverse table-responsive">

                                                <tbody>
                                                    <tr>
                                                        <td scope="row">Model</td>
                                                        <td><?php echo $products['model'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">CPU</td>
                                                        <td><?php echo $products['chip'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">VGA</td>
                                                        <td><?php echo $products['card'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Tình trạng máy</td>
                                                        <td><?php if ($products['status'] == 0) echo 'Máy mới';
                                                            else echo 'Máy cũ' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">RAM</td>
                                                        <td><?php echo $products['ram'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Ổ đĩa</td>
                                                        <td><?php echo $products['drive'] ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td scope="row">Màn hình</td>
                                                        <td><?php echo $products['display'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Kết nối</td>
                                                        <td><?php echo $products['connect'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Vân tay</td>
                                                        <td><?php if ($products['vantay'] == 0) echo 'Có';
                                                            else echo 'Không' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">HDH</td>
                                                        <td><?php echo $products['operation'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Pin</td>
                                                        <td><?php echo $products['pin'] . ' cell' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row">Trọng lượng</td>
                                                        <td><?php echo $products['weight'] . ' kg' ?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td scope="row">Đã bán</td>
                                                        <td><?php echo $products['selled'] ?></td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
			
			
			
			<div class="col-md-12">
			<h5>Bình luận sản phẩm</h5>
                <?php
                // if(isset($binhluan_insert)){
                //     echo $binhluan_insert;
                // } 
                ?>
                <form action="" style="width: 100%;" method="POST">
                    <p><input type="hidden" style="width: 100%;" value="<?php echo $id ?>" name="product_id_binhluan"></p>
                    <p><input type="text" style="width: 100%;" placeholder="Điền tên" class="form-control" name="tennguoibinhluan"></p>
                    <p><textarea rows="5" style="width: 100%;" style="resize: none;" placeholder="Bình luận...." class="form-control" name="binhluan"></textarea></p>
                    <p><input type="submit" style="width: 100%;" name="binhluan_submit" class="btn btn-success" value="Gửi bình luận"></p>
                </form>
            </div>
            </div>
            </div>

        </div>
    </div>
</div>

<?php include_once("inc/footer.php"); ?>