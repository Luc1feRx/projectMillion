<?php include_once '../classes/products.php' ?>
<?php include_once '../classes/category.php' ?>

<?php 
    $products = new product();
    $cate = new category();
    $cateList = $cate->show_category();
    foreach ($cateList as $category){
?>

<?php
    $listProducts = $products->getListProductByCategory($category['id']);
?>

<div class="latest-product">
        <h2 class="section-title"><?php echo $category['name'] ?></h2>
            <div class="product-content">
                            <div class="product-carousel">
                            <?php foreach($listProducts as $item):?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="./img/<?=$item['img']?>" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html"><?=$item['name']?></a></h2>
                                    
                                        <div class="product-carousel-price">
                                            <ins><?php $sellprice = $item['price'] * (100 - $item['discount']) / 100;
                                                echo number_format($sellprice) . " VNĐ" ?></ins>
                                            <del><?php if ($sellprice != $item['price']) echo number_format($item['price']) . " VNĐ"?></del>
                                        </div> 
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
</div>

<?php } ?>