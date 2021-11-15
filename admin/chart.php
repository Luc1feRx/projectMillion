<?php include 'commons/header.php';?>
<?php include 'commons/sidebar.php';?>
<?php include_once '../classes/order.php'?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div id="piechart"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    // Draw the chart and set the chart values
                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Danh Mục', 'Thống Kê Hàng Hóa'],
                    <?php
                        $order = new order();
                        $show_statistical = $order->show_statistical();
                        if($show_statistical){
                            while($result = $show_statistical->fetch_assoc()){
                                $i = 1;
                                $sumCat = count($result);
                                if ($i == $sumCat) $comma = "";
                                else $comma = ",";
                                echo "['" . $result['name'] . "'," . $result['soluong'] . "]" . $comma;
                                $i += 1;
                            }
                        }
                    ?>
                    ]);

                    // Optional; add a title and set the width and height of the chart
                    var options = {'title':'Biểu Đồ Thống Kê Hàng Hóa', 'width':1250, 'height':600};

                    // Display the chart inside the <div> element with id="piechart"
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                    }
                </script>
            </div>
        </div>
    </div>
</body>

<?php include 'commons/footer.php';?>