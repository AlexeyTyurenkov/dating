
<div class="smallpost">
    <div class="smallpostline"><?php echo $data->create_date ?></div>
    <div class="smallpostline"><span><?php echo $data->city->name; ?></span><span class="right"><?php echo $data->age; ?></span></div>
    <div class="smallpostline"><span><?php echo $data->category->name; ?></span><span class="right"><?php echo $data->target->name; ?></span></div>
    <div class="smallpostline header"><?php echo CHtml::link($data->header, Yii::app()->createUrl("site/show", array('post_id'=>$data->id)))?></div>
    <hr>
</div>


