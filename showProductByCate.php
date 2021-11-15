
<?php include_once 'classes/category.php' ?>

    <!-- main content products -->
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
                <?php 
                    $products = new product();
                    $cate = new category();
                    $cart = new cart();
                    $quantity=0;
                    $cateList = $cate->show_category();
                    if(isset($_GET['add-to-cart'])){
                        $id = $_GET['add-to-cart'];
                        $quantity = 1;
                        $addtocart = $cart->add_cart($quantity,$id);
                        echo "<meta http-equiv='refresh' content='0;URL=cart.php'>";
                    }
                    foreach ($cateList as $category){
                ?>

                

                <?php
                    $listProducts = $products->getListProductByCategory($category['id']);
                ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <div class="section-title">
                            <a href="productByCategory.php?cate=<?php echo $category['id'] ?>" class="section-title"><?php echo $category['name'] ?></a>
                        </div>
                        <div class="product-content">
                            <div class="product-carousel">
                            <?php foreach($listProducts as $item):?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="./admin/uploads/<?=$item['image']?>" alt="">
                                        <div class="product-hover">
                                            <!-- <a href="?add-to-cart=<?php echo $item['id'] ?>" 
                                            class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a> -->
                                            <a href="?add-to-cart=<?php echo $item['id'] ?>"  class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                    <h2><a href="single-product.php?product_id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></h2>

                                    
                                        <div class="product-carousel-price">
                                        <ins><?php $sellprice = $item['price'] * (100 - $item['discount']) / 100;
                                                echo number_format($sellprice) . " VNĐ" ?></ins>
                                            <del><?php if ($sellprice != $item['price']) echo number_format($item['price']) . " VNĐ"?></del>
                                            <?php 
                                                Session::set('sumss',$item['price']);
                                                Session::set('qtyss',$quantity);
                                            ?>
                                        </div> 
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div> 