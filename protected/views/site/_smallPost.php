<div class="smallpost" link="<?=Yii::app()->createUrl("site/show", array('post_id'=>$data->id));?>">
    <div class="smallpostcolumn small">
       	<img class="target1" src="images/target/<?php echo $data->target->img1; ?>.png" alt="">
    </div>
    <div class="smallpostcolumn big">
        <div class="smallpostline dt"><?php echo $data->create_date ?></div>
        <div class="smallpostline"><p class="header<?php echo $data->target->img1; ?>"><?php echo $data->header; ?></p></div>
        <div class="smallpostline"><p class="city"><?php echo $data->city->name; ?><?php //echo $data->age; ?></p></div>
        <div class="smallpostline">
            <div class="smallpostcolumn child">
                <div class="smallpostline"><p class="category" style="background-image:url(images/category/<?=$data->category->id;?>-2.png);"><?php echo $data->category->name; ?></p></div>
                <div class="smallpostline"><p class="target"><?php echo $data->target->name; ?></p></div>
            </div>
            <div class="smallpostimg"><img class="target2" src="images/target/<?php echo $data->target->img2; ?>.png" alt=""></div>
        </div>
        <?php if(isset($showText)) { ?><div class="smallpostline"><p class="text"><?php echo $data->text; ?></p></div> <?php } ?>
    </div>
    
</div>


