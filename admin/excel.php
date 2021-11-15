<?php include_once '../classes/order.php'?>

<?php
    $output = '';
    $order = new order();
    if(isset($_POST['submit'])){
        $index = 0;
        $show_list_to_excel = $order->show_statistical();
        if($show_list_to_excel){
            $output .= '
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Loại Hàng</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Giá Cao Nhất</th>
                        <th scope="col">Giá Thấp Nhất</th>
                        <th scope="col">Giá Trung Bình</th>
                    </tr>
                </thead>
            ';
            while($row = $show_list_to_excel->fetch_assoc()){
                $index++;
                $output .= '
                    <tbody>
                        <tr>
                            <th>'. $index .'</th>
                            <th>'. $row['name'] .'</th>
                            <th>'. $row['soluong'] .'</th>
                            <th>'. number_format($row['giacao']) . " VNĐ" .'</th>
                            <th>'. number_format($row['giathap']) . " VNĐ" .'</th>
                            <th>'. number_format($row['giatb']) . " VNĐ" .'</th>
                        </tr>
                    </tbody>
                ';
            }
            $output .= '</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=download.xls");
            echo $output;
        }
    }
?>