<?php include_once 'inc/header.php';?>
<?php include_once 'inc/top.php'; ?>
<?php include_once 'classes/cart.php'; ?>
<?php include_once 'mail/sendmail.php'; ?>

<?php
    $tieude = "Đặt hàng website shoplaptop.com thành công!";
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
            <li>Tổng thanh toán:" . number_format((($result['price'] * (100 - $result['discount']) / 100) * $result['quantity']) + (0.1 * (($result['price'] * (100 - $result['discount']) / 100) * $result['quantity']))) . " VNĐ</li>
            </ul>";
        }
    }

    $email = "";
    $mail = session::get('email');
    $email = $mail;
    $mail = new Mailer();
    if(!isset($_GET['id'])){
        $mail->datHangMail($tieude, $noidung, $email);
    }

?>

<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<div class="row">
		<div class="col-md-12" style="text-align: center;">
			<h1 style="color: #5a88ca">BẠN ĐÃ ĐẶT HÀNG THÀNH CÔNG!!!</h1>
			<h4>Cảm ơn quý khách đã đặt mua sản phẩm của cửa hàng chúng tôi!</h4>
            <h4>Đơn hàng của quý khách đã được gửi đến email của bạn và sẽ giao hàng trong thời gian sớm nhất.</h4>
		</div>
	</div>
</div>

<?php 
    $del_cart = $cart->del_all_data_cart();
    if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
    
    echo "<script>setTimeout(function(){
        window.location = 'index.php'
    }, 5000)</script>"; //tương ứng 5 giây
?>

<?php include 'inc/footer.php';?>