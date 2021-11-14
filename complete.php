<?php include_once 'inc/header.php';?>
<?php include_once 'inc/top.php'; ?>
<?php include_once 'classes/cart.php'; ?>
<?php include_once 'mail/sendmail.php'; ?>

<?php
    $tieude = "Đặt hàng website shoplaptop.vn thành công!";
    $noidung = "<p>Cảm ơn quý khách đã sử dụng sản phẩm của chúng tôi </p>";
    $noidung .= "<h4>Dưới đây là đơn hàng của qúy khách bao gồm: </h4>";

    $cart = new cart();
    $get_cart = $cart->get_product_cart();
    if($get_cart){
        while($result = $get_cart->fetch_assoc()){
            $noidung .= "<ul style='border:1px solid black;margin:10px; list-style: none;'>
            <li>Tên sản phẩm:" . $result['productName'] . "</li>
            <li>Giá:" . number_format(($result['price'] * (100 - $result['discount']) / 100)) . " VNĐ</li>
            <li>Số lượng:" . $result['quantity'] . "</li>
            <li>VAT: 10%</li>
            <li>Tổng:" . number_format((($result['price'] * (100 - $result['discount']) / 100) * $result['quantity']) + (0.1 * (($result['price'] * (100 - $result['discount']) / 100) * $result['quantity']))) . " VNĐ</li>
            </ul>";
        }
    }

    $email = "";
    $mail = session::get('email');
    $email = $mail;
    $mail = new Mailer();
    $mail->datHangMail($tieude, $noidung, $email);

    unset($_SESSION['cart']);
?>

<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<div class="row">
		<div class="col-md-12" style="text-align: center;">
			<h1 style="color: green">BẠN ĐÃ TẠO ĐƠN HÀNG THÀNH CÔNG!!!</h1>
			<h4>Cảm ơn quý khách đã đặt mua sản phẩm của chúng tôi !</h4>
            <h4>Đơn hàng của quý khách đã được gửi đến email của bạn và sẽ giao hàng trong thời gian sớm nhất.</h4>
			<a href="index.php"><button class="btn btn-success" style="border-radius: 0px; font-size: 26px;">TIẾP TỤC MUA HÀNG</button></a>
		</div>
	</div>
</div>

<?php include 'inc/footer.php';?>