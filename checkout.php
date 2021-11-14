<?php include_once 'inc/header.php';?>
<?php include_once 'inc/top.php'; ?>
<?php include_once 'classes/order.php'; ?>

<?php
    $cart = new cart();
    $order = new order();
    if(isset($_POST['submit'])){
        $insertOrder = $order->insert_Order($_POST);
        // $delCart = $ct->del_all_data_cart();
        echo "<script>window.location = 'complete.php'</script>";
    }   
?>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
        <?php include_once('singleSidebar.php') ?>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">

                        <form action="checkout.php" method="post" enctype="multipart/form-data">

                            <div id="customer_details" class="col2-set">
                                <div class="col-3">
                                    <div class="woocommerce-billing-fields">
                                        <h3>Thông tin gửi hàng</h3>
                                        <p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                            <label class="" for="billing_country">Địa Chỉ<abbr title="required" class="required" ></abbr>
                                            </label>
                                            <input type="text" name="address" required>
                                        </p>

                                        <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                            <label class="" for="billing_first_name">Họ Tên<abbr title="required" class="required"></abbr>
                                            </label>
                                            <input type="text" placeholder="" name="fullname" required>
                                        </p>

                                        <div class="clear"></div>
                                        <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                            <label class="" for="billing_address_1">Email<abbr title="required" class="required"></abbr>
                                            </label>
                                            <input style="width: 100%" type="email" name="email" required>
                                        </p>

                                        <div class="clear"></div>

                                        <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                            <label class="" for="billing_email">Phone<abbr title="required" class="required"></abbr>
                                            </label>
                                            <input style="width: 100%" type="tel" name="phone" required>
                                        </p>
                                        
                                        <p id="order_comments_field" class="form-row notes">
                                            <label class="" for="order_comments">Ghi chú đơn hàng</label>
                                            <textarea type="text" cols="5" rows="2" placeholder="Ghi chú cho đơn vị vân chuyển" name="note"></textarea>
                                        </p>
                                    </div>
                                </div>
                                <h3 id="order_review_heading">Đơn Hàng Của Bạn</h3>

                                <?php
                                    if(isset($insertOrder)){
                                        echo $insertOrder;
                                        if(isset($_POST['email'])){
                                            session::set('email', $_POST['email']);
                                        }
                                    }
                                ?>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-name">Số Lượng</th>
                                                <th class="product-total">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        			// $sId = session_id();
                                                    // print_r($sId);
                                        $get_product_cart = $cart->get_product_cart();
                                        if($get_product_cart){
                                            $subtotal = 0;
                                            $qty = 0;
                                            
                                            while($result = $get_product_cart->fetch_assoc()){
                                                
                                        ?>

                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        <strong><?php echo $result['productName']; ?></strong>
                                                    </td>
                                                    <td class="product-name">
                                                        <strong class="product-quantity"><?php echo $result['quantity']; ?></strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <?php $sellprice = $result['price'] * (100 - $result['discount']) / 100; $total = $sellprice * $result['quantity']; ?>
                                                        <strong class="amount"><?php echo number_format($total) . ' VND' ?></strong> </td>
                                                </tr>
                                            <?php 
                                            	$subtotal += $total;
                                                $qty = $qty + $result['quantity'];
                                            }    
                                        ?>

                                            <tr class="cart-subtotal">
                                                <th>Tổng Giỏ Hàng</th>
                                                <?php

                                                ?>
                                                <td>
                                                </td>
                                                <td><span class="amount"><?php echo $fm->format_currency($subtotal).' '.'VNĐ'; ?></span>
                                                </td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>VAT:</th>
                                                <td>
                                                </td>
                                                <td>
                                                    <?php $vat = $subtotal * 0.1 ?>
                                                    <?php echo $fm->format_currency($vat).' '.'VNĐ'; ?>
                                                </td>
                                            </tr>


                                            <tr class="order-total">
                                                <th>Tổng đơn hàng</th>
                                                <td>
                                                </td>
                                                <td>
                                                    <strong><span name="total_money" class="amount"><?php echo number_format($subtotal + $vat).' '.'VNĐ'; ?></span></strong>
                                                    <input type="text" name="total_money" value="<?php echo $subtotal + $vat; ?>" hidden>
                                                </td>
                                            </tr>
                                            
                                            <div style="display: flex; justify-content: space-around;">

                                            <div class="form-row place-order" style="display: flex;">
                                                <input type="submit" name="submit" value="Đặt Hàng" id="place_order" class="button alt">
                                            </div>

                                            <div class="clear"></div>

                                            <div class="form-row place-order" style="background: none repeat scroll 0 0 #5a88ca; border: medium none; padding: 11px 20px; text-transform: uppercase;">
                                                    <a style="text-decoration: none; color: #fff !important;" class="button alt" href="index.php">Tiếp tục mua hàng</a>
                                            </div>
                                            </div>
                                            </br></br>
                                            <?php
                                                }else{
                                                    echo '<div class = "alert alert-warning">Your Cart is Empty ! Please Shopping Now</div>';
                                                } 
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>