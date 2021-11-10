<?php include_once 'classes/category.php'; ?>


<div class="col-md-4">
    <div class="col-sm-11">
        <div class="single-sidebar">
            <h2 class="sidebar-title">Tìm kiếm sản phẩm</h2>
            <form method="get" action="search.php">
                <input type="text" name="search_key" placeholder="Nhập tên sản phẩm ...." required>
                <input type="submit" name="search" value="Search">
            </form>
        </div>
    </div>

<div class="col-sm-11">
    <div class="single-sidebar">
        <div class="rightsidebar span_3_of_1">
            <h2 class="m-1" >Danh Mục Sản Phẩm</h2>
                <ul>
                    <?php
                        $cate = new category();
                        $getall_category = $cate->show_list_category();
                            if($getall_category){
                                while($result_allcat = $getall_category->fetch_assoc()){
                    ?>
                        <li class="item"><a href="productByCategory.php?cate=<?php echo $result_allcat['id'] ?>"><?php echo $result_allcat['name'] ?></a></li>
                        <?php
                            }
                        }
                    ?>
                    </ul>
            
        </div>
    </div>
</div>


<div class="col-sm-11">
<div class="single-sidebar">
        <h2 class="sidebar-title">Sản Phẩm Mới Nhất</h2>
        <ul>
            <?php
            //get product recnet post
            $product = new product();
            $listTopSell = $product->getTopNew(); // lay 5 sp trong DB
            foreach ($listTopSell as $r) {
            ?>
                <div class="single-wid-product">
                    <a href="single-product.php?product_id=<?php echo $r['id'] ?>"><img src="<?php echo 'admin/uploads/' . $r['image'] ?>" alt="" class="product-thumb"></a>
                    <h2><a href="single-product.php?product_id=<?php echo $r['id'] ?>"><?php echo $r['name'] ?></a></h2>
                    <div class="product-wid-price">
                        <ins><?php $sellprice = $r['price'] * (100 - $r['discount']) / 100;
                                echo number_format($sellprice) . ' VND' ?></ins>
                        <del><?php if ($sellprice != $r['price']) echo number_format($r['price']) ?></del><br>
                        <ins><?php echo  date("d/m/Y", strtotime($r['time_add'])); ?></ins>

                    </div>
                </div>

            <?php } ?>
        </ul>
    </div>
</div>
    </div>


