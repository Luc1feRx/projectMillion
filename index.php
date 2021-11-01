
<?php
    include ('inc/head.php');
    include_once 'classes/brand.php';
?>

<?php
    $brand = new brand();
    $brands = $brand->show_list_brand();
?>

  <body>
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
    
    <!-- site branding area -->
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
                        <form action="" class="navbar-search">
                            <input type="text" class="navbar-search__input" placeholder="Tìm Kiếm">
                            <button class="navbar-search__button"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    
                    <div class="header-cart">
                        <div class="shopping-item">
                            <a href="cart.html">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
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
                        <li class="active"><a href="index.html">Home</a></li>
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
    
    <div class="slider-area">
        	<!-- Slider -->
			<div class="slider-first">
                <i class="fas fa-angle-right slider-next"></i>
                <ul class="slider-dots">
                    <li class="slider-dot-item active" data-index="0"></li>
                    <li class="slider-dot-item" data-index="1"></li>
                    <li class="slider-dot-item" data-index="2"></li>
                    <li class="slider-dot-item" data-index="3"></li>
                </ul>
                <div class="slider-wrapper">
                    <div class="slider-main">
                        <div class="slider-item">
                            <img src="./img/15877259134838_pastedimage0.png" alt="Slide">
                            <!-- <div class="caption-group">
                                <h2 class="caption title">
                                    iPhone <span class="primary">6 <strong>Plus</strong></span>
                                </h2>
                                <h4 class="caption subtitle">Dual SIM</h4>
                                <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                            </div> -->
                        </div>
                        <div class="slider-item">
                            <img src="./img/15877259134838_pastedimage0.png" alt="Slide">
                            <!-- <div class="caption-group">
                                <h2 class="caption title">
                                    iPhone <span class="primary">6 <strong>Plus</strong></span>
                                </h2>
                                <h4 class="caption subtitle">Dual SIM</h4>
                                <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                            </div> -->
                        </div>
                        <div class="slider-item">
                            <img src="./img/15877259134838_pastedimage0.png" alt="Slide">
                            <!-- <div class="caption-group">
                                <h2 class="caption title">
                                    iPhone <span class="primary">6 <strong>Plus</strong></span>
                                </h2>
                                <h4 class="caption subtitle">Dual SIM</h4>
                                <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                            </div> -->
                        </div>

                        <div class="slider-item">
                            <img src="./img/15877259134838_pastedimage0.png" alt="Slide">
                            <!-- <div class="caption-group">
                                <h2 class="caption title">
                                    iPhone <span class="primary">6 <strong>Plus</strong></span>
                                </h2>
                                <h4 class="caption subtitle">Dual SIM</h4>
                                <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <i class="fas fa-angle-left slider-prev"></i>
            </div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <!-- promo area -->
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>Hoàn Trả Trong 30 Ngày</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Giao Hàng Miễn Phí</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Bảo Mật Thanh Toán</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>Nhiều Sản Phẩm Mới</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <!-- brands area -->
    <div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list ">
                        <?php foreach ($brands as $item):?>
                            <a href="http://localhost/laptopcu/search.php?search_key=<?php echo $item['name'] ?>">
                                <img src="./admin/uploads/<?=$item['img']?>" alt=" <?php echo $item['name'] ?>"></a>

                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <!-- main content products -->
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản Phẩm Mới Nhất</h2>
                        <div class="product-content">
                            <div class="product-carousel">
                            <?php foreach($products as $item):?>
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
                                <!-- <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    

                                    <div class="detail-products">
                                        <h2>LG Leon 2015</h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$400.00</ins> <del>$425.00</del>
                                        </div>  
                                    </div>                               
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html">Sony microsoft</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$200.00</ins> <del>$225.00</del>
                                        </div>  
                                    </div>                           
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="">iPhone 6</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$1200.00</ins> <del>$1355.00</del>
                                        </div>  
                                    </div>
                                
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$400.00</ins>
                                        </div>  
                                    </div>                            
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Laptop Gaming</h2>
                        <div class="product-content">
                            <div class="product-carousel">
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html">Samsung Galaxy s5- 2015</a></h2>
                                    
                                        <div class="product-carousel-price">
                                            <ins>$700.00</ins> <del>$100.00</del>
                                        </div> 
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2>Nokia Lumia 1320</h2>
                                        <div class="product-carousel-price">
                                            <ins>$899.00</ins> <del>$999.00</del>
                                        </div> 
                                    </div>

                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    

                                    <div class="detail-products">
                                        <h2>LG Leon 2015</h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$400.00</ins> <del>$425.00</del>
                                        </div>  
                                    </div>                               
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html">Sony microsoft</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$200.00</ins> <del>$225.00</del>
                                        </div>  
                                    </div>                           
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="">iPhone 6</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$1200.00</ins> <del>$1355.00</del>
                                        </div>  
                                    </div>
                                
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$400.00</ins>
                                        </div>  
                                    </div>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Giá Rẻ</h2>
                        <div class="product-content">
                            <div class="product-carousel">
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html">Samsung Galaxy s5- 2015</a></h2>
                                    
                                        <div class="product-carousel-price">
                                            <ins>$700.00</ins> <del>$100.00</del>
                                        </div> 
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2>Nokia Lumia 1320</h2>
                                        <div class="product-carousel-price">
                                            <ins>$899.00</ins> <del>$999.00</del>
                                        </div> 
                                    </div>

                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    

                                    <div class="detail-products">
                                        <h2>LG Leon 2015</h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$400.00</ins> <del>$425.00</del>
                                        </div>  
                                    </div>                               
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html">Sony microsoft</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$200.00</ins> <del>$225.00</del>
                                        </div>  
                                    </div>                           
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="">iPhone 6</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$1200.00</ins> <del>$1355.00</del>
                                        </div>  
                                    </div>
                                
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$400.00</ins>
                                        </div>  
                                    </div>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">LAPTOP CŨ</h2>
                        <div class="product-content">
                            <div class="product-carousel">
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html">Samsung Galaxy s5- 2015</a></h2>
                                    
                                        <div class="product-carousel-price">
                                            <ins>$700.00</ins> <del>$100.00</del>
                                        </div> 
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2>Nokia Lumia 1320</h2>
                                        <div class="product-carousel-price">
                                            <ins>$899.00</ins> <del>$999.00</del>
                                        </div> 
                                    </div>

                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    

                                    <div class="detail-products">
                                        <h2>LG Leon 2015</h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$400.00</ins> <del>$425.00</del>
                                        </div>  
                                    </div>                               
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html">Sony microsoft</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$200.00</ins> <del>$225.00</del>
                                        </div>  
                                    </div>                           
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="">iPhone 6</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$1200.00</ins> <del>$1355.00</del>
                                        </div>  
                                    </div>
                                
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                       <img src="./img/LapMSI.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    
                                    <div class="detail-products">
                                        <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
    
                                        <div class="product-carousel-price">
                                            <ins>$400.00</ins>
                                        </div>  
                                    </div>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div> 
    <!-- main content products -->
    
    <!-- product widget area -->
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <!-- Top seller -->
                        <h2 class="product-wid-title">Top Sellers</h2>
                        <a href="" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Apple new mac book 2015</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Apple new i phone 6</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                    </div>
                </div>
                <!-- end TopSeller -->

                <!-- Recently Viewed -->
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Recently Viewed</h2>
                        <a href="#" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony playstation microsoft</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony Smart Air Condtion</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                    </div>
                </div>

                 <!-- End Recently Viewed -->
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top New</h2>
                        <a href="#" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Apple new i phone 6</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Sony playstation microsoft</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->

<?php
    include ('inc/footer.php');
?>