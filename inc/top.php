
<?php
include 'classes/products.php';
//cart in session
// unset($_SESSION['cart']);
// if (isset($_GET['add-to-cart'])) {
//     $id = $_GET['add-to-cart'];
//     if (isset($_SESSION['cart'])) {
//         $cart = $_SESSION['cart'];
//         $flag = false;
//         //tăng số luợng sp nếu đã có sp này trong giỏ hàng
//         for ($i = 0; $i < count($cart); $i++) {
//             if ($cart[$i]['id'] == $id) {
//                 $cart[$i]['quantity'] = $cart[$i]['quantity'] + 1;
//                 $flag = true; //da ton tai mot cai san pham có id như vay trong gio hang
//                 break;
//             }
//         }

//         // thêm mới sp vào giỏ hàng
//         if ($flag == false) {
//             $products = new product();
//             $product = $products->getProductById($id);
//             foreach ($product as $items){
//             $item = array(
//                 'id' => $items['id'],
//                 'name' => $items['name'],
//                 'quantity' => 1,
//                 'price' => $items['price']
//             );
//             array_push($cart, $item);
//         }
//         }
//         $_SESSION['cart'] = $cart;
//     } else {
//         // đẩy sp vào giỏ hàng
//         $products = new product();
//         $product = $products->getProductById($id);
//         foreach ($product as $items){
//             $item = array(
//                 'id' => $items['id'],
//                 'name' => $items['name'],
//                 'quantity' => 1,
//                 'price' => $items['price']
//             );
//         }
//         $cart = array($item);
//         $_SESSION['cart'] = $cart;
//     }
//     //  var_dump($_SESSION['cart']);
//     $cart = $_SESSION['cart'];
// }

// $total = 0;
// foreach ($cart as $item) {
//     $total += $item['price'] * $item['quantity'];
// }
// ?>

 <!-- Header area -->
 <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> Tài Khoản Của Tôi</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Danh Sách Mong Muốn</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> Giỏ Hàng</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li><a href="#"><i class="fa fa-user"></i> Đăng Nhập</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Đăng Ký</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="primary-header">
                    <div class="header-img-logo">
                        <div class="logo">
                            <h1><a href="./"><img src="./img/20ec5516886f959dbd7091edbc61f96b.jpg"></a></h1>
                        </div>
                    </div>
    
                    <div class="header-input">
                        <form action="search.php" method="get" class="navbar-search">
                            <input type="text" name = "search_key" class="navbar-search__input" placeholder="Tìm Kiếm">
                            <button type="submit" class="navbar-search__button"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    
                    <div class="header-cart">
                        <div class="shopping-item">
                        <!-- <a href="cart.php">Cart - <span class="cart-amunt"><?php echo number_format($total) . ' đ'; ?></span>
                            <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo count($cart); ?></span></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <!-- mainmenu -->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="shop.html">TẤT CẢ SẢN PHẨM</a></li>
                        <li><a href="single-product.html">DANH MỤC SẢN PHẨM</a></li>
                        <li><a href="cart.html">HÃNG SẢN XUẤT</a></li>
                        <li><a href="checkout.html">TIN TỨC</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->