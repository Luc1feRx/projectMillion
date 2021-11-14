<?php
include_once("inc/header.php");
include_once("inc/top.php");
include_once("classes/cart.php");
include_once("classes/products.php");
?>

<?php
    $cart = new cart();
    if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $cart->del_product_cart($cartid);
    }
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
 		$cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $update_quantity_cart = $cart->update_quantity_cart($quantity, $cartId);
        if($quantity<=0){
        	$delcart = $cart->del_product_cart($cartId);
        }
    }
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Giỏ Hàng</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area ">
    <div class="zigzag-bottom "></div>
    <div class="container ">
        <div class="row ">
        <?php include_once('singleSidebar.php'); ?>

            <div class="col-md-8 ">
                <div class="product-content-right ">
                    <div class="woocommerce ">
                        <form method="post" action="">
                            <table cellspacing="0 " class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail ">&nbsp;Hình ảnh</th>
                                        <th class="product-name ">Tên Sản phẩm </th>
                                        <th class="product-price ">Giá</th>
                                        <th class="product-quantity ">Số lượng</th>
                                        <th class="product-subtotal ">Tổng Tiền</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                $get_product_cart = $cart->get_product_cart();
                                if($get_product_cart){
                                    $subtotal = 0;
                                    $qty = 0;
                                    while($result = $get_product_cart->fetch_assoc()){
                                ?>

                                        <tr class="cart_item ">
                                            <td class="product-remove">
                                            <a onclick="return confirm('Bạn có muốn xóa không?');" class="remove" href="?cartid=<?php echo $result['cartId'] ?>">x</a>
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.php?product_id=<?php echo $result['productId'] ?>"><img width="145" height="145" alt="<?php $result['productName'] ?>" class="shop_thumbnail" src="<?php echo 'admin/uploads/' . $result['image'] ?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.php?product_id=<?php echo $result['productId'] ?>"><?php echo $result['productName'] ?></a>
                                            </td>

                                            <td class="product-price ">
                                                <span class="amount"><?php $sellprice = $result['price'] * (100 - $result['discount']) / 100; echo $fm->format_currency($sellprice)." "."VNĐ"; ?></span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                <form action="" method="post">
                                                    <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>"/>
                                                    <input type="number" name="quantity" min="0"  value="<?php echo $result['quantity'] ?>"/>
                                                    <input type="submit" name="submit" value="Update"/>
                                                </form>
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">
                                                    <?php $total = $sellprice * $result['quantity'];
								                    echo $fm->format_currency($total)." "."VNĐ"; ?></span>
                                            </td>
                                        </tr>
                                    <tr>

                                    <?php
                                        $subtotal += $total;
                                        $qty = $qty + $result['quantity'];
                                        }
                                    }
                                    ?>
                                        <td class="actions" colspan="6">
                                            <div class="row" style="display: flex;">
                                                <!-- <label >Coupon:</label> -->
                                                <div class="col-md-6" style="display: flex; justify-content: center;">
                                                    <input type="text" placeholder="Coupon code " value="" id="coupon_code" class="input-text" name="coupon_code">
                                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                                </div>
                                                <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
                                                    <a class="btn btn-primary" href="checkout.php" >Đặt hàng</a>
                                                    </div>
                                            </div>
                                            <!-- <input type="submit" value="CheckOut" name="check_out" class="button"> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                        <div class="cart-collaterals ">
                            <div class="cross-sells ">
                                <h2>Có thể bạn sẽ thích .</h2>
                                <ul class="products ">
                                    <li class="product ">
                                        <a href="single-product.php ">
                                            <img width="325" height="325" alt="T_4_front " class="attachment-shop_catalog wp-post-image " src="img/product-2.jpg ">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price "><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button " data-quantity="1 " data-product_sku=" " data-product_id="22 " rel="nofollow " href="single-product.php ">Select options</a>
                                    </li>

                                    <li class="product ">
                                        <a href="single-product.php ">
                                            <img width="325" height="325" alt="T_4_front " class="attachment-shop_catalog wp-post-image " src="img/product-4.jpg ">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price "><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button " data-quantity="1 " data-product_sku=" " data-product_id="22 " rel="nofollow " href="single-product.php ">Select options</a>
                                    </li>
                                </ul>
                            </div>


                            <div class="cart_totals">
                                <h2>Giỏ Hàng</h2>
                                <?php
                                    $check_cart = $cart->check_cart();
                                        if($check_cart){
                                ?>
                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Thanh Toán</th>
                                            <td><span class="amount"><?php echo $fm->format_currency($subtotal)." "."VNĐ"; ?></span></td>
                                            <?php
                                               Session::set('sum',$subtotal);
                                               Session::set('qty',$qty);
                                            ?>
                                        </tr>

                                        <tr class="shipping">
                                            <th>VAT</th>
                                            <td>10%</td>
                                        </tr>
                                        <tr class="order-total ">
                                            <th>Tổng thanh toán</th>
                                            <td><strong><span class="amount"><?php 

                                            $vat = $subtotal * 0.1;
                                            $gtotal = $subtotal + $vat;
                                            echo $fm->format_currency($gtotal)." "."VNĐ";
                                            ?></span></strong> </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    }else{
                                        echo '<div class="alert alert-danger">Your Cart is Empty ! Please Shopping Now</div>';
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("inc/footer.php");
?>