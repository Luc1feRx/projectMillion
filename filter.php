<?php
    $product = new product();

    $conditions = '';

    if (isset($_POST['filter'])){
        $filters = array();// khoi tao array
        $_SESSION['alert'] = '';
        foreach ($_POST as $key => $value){ //duyet cac phan tu trong form voi phuong thuc post
            if ($key != 'sort' && $value != '') {
                $filters[$key] = $value;
            }
        }

        $i = 0;
        foreach ($filters as $key => $value) {
            $i++;
            if ($i == count($filters)) {
                $condition = $key . ' LIKE ' . "'" . '%' . $value . '%' . "'";
                $_SESSION['alert'] = $_SESSION['alert'] . $key . ' = '  . $value . ' ';
            } else {
                $condition = $key . ' LIKE ' . "'" . '%' . $value . '%' . "'" . ' AND ';
                $_SESSION['alert'] = $_SESSION['alert'] . $key . ' = '  . $value . ' , ';
            }
    
            $conditions = $conditions . $condition;
        }
        $_SESSION['condition'] = $conditions;
    }
    if (isset($_POST['reset'])) $_SESSION['condition'] = '';

?>

<div class="container">
    <form method="post">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>CPU</th>
                    <th>RAM</th>
                    <th>VGA</th>
                    <th>Ổ Cưng</th>
                    <th>Màn hình</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row"><select name="chip" id="">
                            <option value="">Chọn</option>
                            <option value="i3">Intel core i3</option>
                            <option value="i5">Intel core i5</option>
                            <option value="i7">Intel core i7</option>
                            <option value="ryzen 3">Ryzen 3000 series</option>
                            <option value="ryzen 5">Ryzen 5000 series</option>
                            <option value="ryzen 7">Ryzen 7000 series</option>
                            <option value="ryzen 9">Ryzen 9000 series</option>
                        </select>
                    </td>
                    <td> <select name="ram" id="">
                            <option value="">Chọn</option>
                            <option value="4">4 GB</option>
                            <option value="8">8 GB</option>
                            <option value="12">12 GB</option>
                            <option value="16">16 GB</option>
                        </select>
                    </td>
                    <td> <select name="card" id="">
                            <option value="">Chọn</option>
                            <option value="GTX">GTX</option>
                            <option value="1050">GTX 1050</option>
                            <option value="1060">GTX 1060</option>
                            <option value="1070">GTX 1070</option>
                            <option value="AMD">AMD</option>
                        </select>
                    </td>
                    <td> <select name="drive" id="">
                            <option value="">Chọn</option>
                            <option value="ssd">SSD</option>
                            <option value="hdd">HDD</option>
                        </select>
                    </td>
                    <td>
                        <select name="display" id="">
                            <option value="">Chọn</option>
                            <option value="14">14 inch</option>
                            <option value="15">15 inch</option>
                            <option value="17">17 inch</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" name="filter">Lọc</button>
        <button type="reset" name="reset">Reset</button>
        <hr>
    </form>
    <form action="" method="post">
        <select name="sort_key" id="">
            <option value="">Chọn</option>
            <option value="tang">Giá tăng dần</option>
            <option value="giam">Giá giảm dần</option>
            <option value="new">Mới nhất trước</option>
            <option value="dis_max">Giảm gia nhiều nhất trước</option>
            <option value="topsell">Bán chạy nhất</option>
        </select>
        <button class="btn btn-primary" name="sort" type="submit">Sắp Xếp</button>
        <!-- <button type="reset" name="reset">Xoa Loc</button> -->
    </form>
</div>