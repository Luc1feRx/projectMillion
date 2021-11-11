<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php include '../classes/category.php'?>
<?php include '../classes/products.php'?>
<?php
    	$filepath = realpath(dirname(__FILE__));
        include_once ($filepath.'/../lib/database.php');
?>
            <?php
                if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $count = 10;
                $offset = ($page - 1) * $count;

                if(isset($_GET['deleteid'])){
                    $id = $_GET['deleteid'];
                    $deleteproducts = $products->delete_product($id);
                 }
                
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $keyword = $_GET['search'];
                    $product = new product();
                    $resultSearch = $product->SearchProductByKeyWord($keyword);
                    // var_dump($resultSearch);
                    $index=0;
                    if($resultSearch){
                        $index++;
            ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
            </br>
            <?php
                if(isset($deleteproducts)){
                    echo $deleteproducts;
                    unset($deleteproducts);
                    header("location: productslist.php");
                }
            ?>
            </br> </br>
            <form action="search.php" method="GET">

            <div class="row">
                <div class="col-md-11">
                    <input required class="form-control" type="text" name="search" placeholder="Nhập thông tin cần tìm kiếm ...">
                </div>
                <div class="col-md-1">
                    <button type="submit" style="width: 100%;" class="btn btn-dark"><i class="fas fa-search"></i></button>
                </div>

            </div>
            </form>
            </br> </br>

            <a href="productslist.php" class="btn btn-primary">Danh Sách Sản Phẩm</a>

            </br> </br>
            <table id="myTableSort" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th onclick="sortTable(0)" class="th-sm" scope="col">ID</th>
                            <th onclick="sortTable()" class="th-sm" scope="col">Hình ảnh</th>
                            <th onclick="sortTable(2)" class="th-sm" scope="col">Tên</th>
                            <th onclick="sortTable(3)" class="th-sm" scope="col">Thương hiệu</th>
                            <th onclick="sortTable(4)" class="th-sm" scope="col">Giá</th>
                            <th onclick="sortTable(5)" class="th-sm" scope="col">Đã bán</th>
                            <th onclick="sortTable(6)" class="th-sm" scope="col">Kho hàng</th>
                            <th onclick="sortTable(7)" class="th-sm" scope="col">Mô tả</th>
                            <th onclick="sortTable(8)" class="th-sm" scope="col">CPU</th>
                            <th onclick="sortTable(9)" class="th-sm" scope="col">RAM</th>
                            <th onclick="sortTable(10)" class="th-sm" scope="col">Card đồ họa</th>
                            <th onclick="sortTable()" class="th-sm" scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <?php foreach ($resultSearch as $product): ?>
                    <tbody id="myTable">
                        
                        <tr>
                            <td><?php echo $index ?></td>
                            <td><img height="50px" width="50px" src="<?php echo 'uploads/' . $product['image'] ?>" alt=""></td>
                            <td><?php echo $product['name'] ?></td>
                            <?php
                            $brand = new brand();
                            $obj = $brand->getBrandById($product['brand_id']);
                                if($obj){
                                    while($row = $obj->fetch_assoc()){
                                        $namebrand = $row['name'];
                                    }
                                }
                            ?>
                            <td><?php echo $namebrand ?></td>

                            <td><?php echo number_format($product['price']) . ' VND' ?></td>
                            <td><?php echo $product['selled'] ?></td>
                            <td><?php echo $product['quantity_product'] ?></td>

                            <td><?php echo $product['short_desc'] ?></td>
                            <td><?php echo $product['chip'] ?></td>
                            <td><?php echo $product['ram']  ?></td>
                            <td><?php echo $product['card'] ?></td>
                            <td>
                                <a href="productsupdate.php?id=<?php echo $product['id'] ?>" class="btn btn-warning m-1"><i class="far fa-pen-square"></i></a>
                                <a onclick = "return confirm('Bạn có muốn xóa không?')" href="?deleteid=<?php echo $product['id'] ?>" class="btn btn-danger m-1"><i class="fad fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
                <div class="d-flex">
                <?php
                //tinh tổng số bản ghi
                $db = new Database();
                $rows = $db->Select("select count(*) as count from product WHERE name LIKE N'%$keyword%'");
                foreach ($rows as $r) {
                    $allRows = $r['count'];
                }
                $page = ceil($allRows / $count); //11/5 = 2.2 xấp xỉ 3 -> 2 trang
                for ($i = 0; $i < $page; $i++) {
                    $pageCount = $i + 1;
                    // echo ' <button> <a href="?page=' . $pageCount . '">' . $pageCount . '</a></button>';
                    echo '<li class="outer circle">
                    <button><a class="" href="?page=' . $pageCount . '">' . $pageCount . '</a></button>
                    </li>';
                }
                ?>
                </div>
                <?php
                    }else{
                        echo "<div class='error'>Khong Tim Thay!!</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php include 'commons/footer.php';?>