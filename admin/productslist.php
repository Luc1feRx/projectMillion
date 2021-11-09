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
    $products = new product();
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $deleteproducts = $products->delete_product($id);
     }
    

    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $count = 10;
    $offset = ($page - 1) * $count;
    $list = $products->getProductLimit($offset, $count);
?>



<style>
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    th {
        cursor: pointer;
    }
</style>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
            <h1 class="m-0 ">Danh Sách Sản Phẩm</h1>
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

            <a href="productsadd.php" class="btn btn-primary">Thêm Sản Phẩm</a>
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
                    <tbody id="myTable">
                            <?php
                            $index=0;
                                foreach ($list as $result) {
                                    $index++;
                            ?>
                        <tr>
                            <td><?php echo $index ?></td>
                            <td><img height="50px" width="50px" src="<?php echo 'uploads/' . $result['image'] ?>" alt=""></td>
                            <td><?php echo $result['name'] ?></td>
                            <?php
                            $brand = new brand();
                            $obj = $brand->getBrandById($result['brand_id']);
                                if($obj){
                                    while($row = $obj->fetch_assoc()){
                                        $namebrand = $row['name'];
                                    }
                                }
                            ?>
                            <td><?php echo $namebrand ?></td>

                            <td><?php echo number_format($result['price']) . ' VND' ?></td>
                            <td><?php echo $result['selled'] ?></td>
                            <td><?php echo $result['quantity_product'] ?></td>

                            <td><?php echo $result['short_desc'] ?></td>
                            <td><?php echo $result['chip'] ?></td>
                            <td><?php echo $result['ram']  ?></td>
                            <td><?php echo $result['card'] ?></td>
                            <td>
                                <a href="productsupdate.php?id=<?php echo $result['id'] ?>" class="btn btn-warning m-1"><i class="far fa-pen-square"></i></a>
                                <a onclick = "return confirm('Bạn có muốn xóa không?')" href="?deleteid=<?php echo $result['id'] ?>" class="btn btn-danger m-1"><i class="fad fa-trash"></i></a>
                                <!-- <a class="btn btn-danger" href="?action=delete&id=<?php echo $result['id']; ?>">Xoá</a>
                                <a class="btn btn-warning" href="edit.php?id=<?php echo $result['id'] ?>">Xem-Sửa</a> -->
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
                <div class="d-flex">
                <?php
                //tinh tổng số bản ghi
                $db = new Database();
                $rows = $db->Select('select count(*) as count from product');
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
            </div>
        </div>

    </div>


    <script>
        $(document).ready(function() {
            // Filter on the table

            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

        });
        //sort data table
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("myTableSort");
            switching = true;
            //Set the sorting direction to ascending:
            dir = "asc";
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    /*Get the two elements you want to compare,
                    one from current row and one from the next:*/
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    /*check if the two rows should switch place,
                    based on the direction, asc or desc:*/
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    /*If a switch has been marked, make the switch
                    and mark that a switch has been done:*/
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    //Each time a switch is done, increase this count by 1:
                    switchcount++;
                } else {
                    /*If no switching has been done AND the direction is "asc",
                    set the direction to "desc" and run the while loop again.*/
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>

</body>

<?php include 'commons/footer.php';?>