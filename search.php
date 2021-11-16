<?php
include_once("inc/header.php");
include_once("inc/top.php");
include_once ("classes/brand.php");
include_once ("classes/category.php");
?>

<style>
	
	.not_found {
    font-size: 30px;
    font-weight: bold;
    color: red;
}
</style>

<?php
                if (isset($_GET['search_key']) && !empty($_GET['search_key'])) {
                    $keyword = $_GET['search_key'];
                    $product = new product();
                    $brand = new brand();
                    $category = new category();
                    $cart = new cart();
                    $resultSearch = $product->getListBySearch($keyword);
                    // var_dump($resultSearch);
                    if($resultSearch){
            ?>



<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <h2>Kết quả tìm kiếm cho từ khóa :
                <?php
                echo $keyword;
                ?></h2>
            <!-- show listProducts -->
            <?php foreach ($resultSearch as $product): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img width="300px" height="300px" alt="IMG" class="shop_thumbnail" src="<?php echo 'admin/uploads/' . $product['image'] ?>" alt="<?php echo $product['name'] ?>">
                        </div>
                        <h2><a href="single-product.php?product_id=<?php echo $product['id']; ?>"><?php echo $product['name'] ?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php $sellprice = $product['price'] * (100 - $product['discount']) / 100;
                                    echo number_format($sellprice) . ' VND' ?></ins>
                            <del><?php if ($sellprice != $product['price']) echo number_format($product['price']) . ' VND' ?></del>
                        </div>
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1"" rel=" nofollow" href="?add-to-cart=<?php echo $product['id'] ?>">Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php  
            }else{
                echo"<div class='container'><div class='not_found'>
                <h3>Không Có Sản Phẩm Nào</h3>
            </div></div>";
            }
            }
            
            ?>
    </div>
</div>

<style>
    .pagenum {
        color: black
    }
</style>

<?php
                        if(isset($_GET['add-to-cart'])){
                            $id = $_GET['add-to-cart'];
                            $quantity = 1;
                            $addtocart = $cart->add_cart($quantity,$id);
                            echo "<meta http-equiv='refresh' content='0;URL=cart.php'>";
                        }
?>

<?php include_once("inc/footer.php"); ?>