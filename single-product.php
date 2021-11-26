<?php
include_once("inc/header.php");
include_once("inc/top.php");
include_once ("classes/brand.php");
include_once ("classes/category.php");
include_once ("classes/comment.php");
?>

<?php
    $product = new product();
    $cus = new customer();
    if(isset($_GET['product_id'])){
        $id = $_GET['product_id'];
        $productSingle = $product->getProductById($id);
        $cate = new category();
        $cates = $cate->getCatesByProductId($id);
    }else if(!isset($_GET['product_id']) || $_GET['product_id']==NULL){
        echo "<script>window.location = '404.php'</script>";
    }
    $cart = new cart();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-to-cart'])){
        $quantity = $_POST['quantity'];
        $addtocart = $cart->add_to_cart($quantity, $id);
    }

    if(isset($_POST['binhluan_submit'])){
    	$binhluan_insert = $cus->insert_binhluan($_POST, $id);
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
                                <img class="mainImg" height="700px" width="800px" src="./admin/uploads/<?=$products['image']?>" alt="">

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
                        </br></br>
                                <?php
                                    if(isset($addtocart)){
                                        echo $addtocart;
                                    }
                                ?>
                        </br></br>
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

                <?
        if(isset($_POST['add-to-cart'])){
            echo "<meta http-equiv='refresh' content='0;URL=single-product.php?product_id=$id'>";
        }
    
?>
			
			
			
			<div class="col-md-12">
            <p>&nbsp;</p>
			<h5>Bình luận sản phẩm</h5>
                <?php

                if(isset($binhluan_insert)){
                    echo $binhluan_insert;
                } 
                ?>

            </br></br>
                <form action="" style="width: 100%;" method="POST">
                    <input type="text" name = "id" class="product_id" value="<?php echo $id?>" hidden>
                    <p><input type="text" style="width: 100%;" placeholder="Điền tên" class="name form-control" name="nameuser"></p>
                    <p><input type="email" style="width: 100%;" placeholder="Điền Email" class="email form-control" name="email"></p>
                    <p><textarea rows="5" style="width: 100%;" style="resize: none;" placeholder="Bình luận...." class="form-control" name="comment"></textarea></p>
                    <p><input type="submit" style="width: 100%;" name="binhluan_submit" class="submit btn btn-success" value="Gửi bình luận"></p>
                </form>
            </div>

            <?php
                $show_comments = $cus->show_comment($id);
                if($show_comments){
                    while($result = $show_comments->fetch_assoc()){
            ?>

                <div class="row">
                    <div class="col-md-12" style="margin-top: 40px;">
                        <div class="panel panel-default">
                            <div class="panel-heading">By <b>'<?php echo $result['nameuser'] ?>'</b> on <i>'<?php echo $result['email'] ?>'</i></div>
                            <div class="panel-body">'<?php echo $result['comment'] ?>'</div>
                            <div class="panel-footer" align="right"><b><?php echo $result['comment_date'] ?></b></div>
                        </div>
                    </div>
                </div>

                <?php
                    }
                }else{
                    echo "<h3 style='text-align: center; margin-top: 40px;'>Chưa Có Bình Luận Nào</h3>";
                }
                ?>
                
            </div>
            </div>

        </div>
    </div>
</div>

<?php include_once("inc/footer.php"); ?>