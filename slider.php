<?php include_once 'classes/slider.php' ?>

<?php
    $slider = new slider();
    $get_slider = $slider->show_list_slider();
?>

<div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
                <?php foreach ($get_slider as $it):?>
					<li>
						<img src="./admin/uploads/<?=$it['img']?>" alt=" <?php echo $it['name'] ?>">
						<!-- <div class="caption-group">
							<h2 class="caption title">
								iPhone <span class="primary">6 <strong>Plus</strong></span>
							</h2>
							<h4 class="caption subtitle">Dual SIM</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div> -->
					</li>
                    <?php endforeach;?>

				</ul>
			</div> 
			<!-- ./Slider -->
    </div> <!-- End slider area -->