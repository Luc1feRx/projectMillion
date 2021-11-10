<?php
    $cart = new cart();
    $check_cart = $cart->check_cart();
		if($check_cart){
			$sum = Session::get("sum");
			$qty = Session::get("qty");
			$total = $fm->format_currency($sum).' '.'VNĐ';
		}else{
			$total = 0;
            $qty = 0;
		}
?>



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
                        <a href="cart.php">Cart - <span class="cart-amunt"><?php echo $total ?></span>
                            <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo $qty ?></span></a>
                        </div>
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