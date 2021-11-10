<?php include_once 'classes/brand.php' ?>

<?php
    $brand = new brand();
    $brands = $brand->show_list_brand();
?>

<!-- brands area -->
<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list ">
                        <?php foreach ($brands as $item):?>
                            <a href="search.php?search_key=<?php echo $item['name'] ?>">
                                <img src="./admin/uploads/<?=$item['img']?>" alt=" <?php echo $item['name'] ?>"></a>

                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>