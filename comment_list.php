<?php
    include_once ("classes/customer.php");
?>

<?php
    $cus = new customer();
    $get_comment = $cus->show_comment($id);
    if($get_comment){
        while ($result = $get_comment->fetch_assoc()){
?>

<div class="col-md-12">
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-3"><?php echo $result['nameuser']; ?></div>
        <div class="col-md-7"><?php echo $result['comment']; ?></div>
        <div class="clearfix"></div>
        <p>&nbsp;</p>
    </div>
</div>

<?php
            }
        }
?>