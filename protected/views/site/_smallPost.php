
<div class="smallpost">
    <div class="smallpostline"><?php $model->create_date ?></div>
    <div class="smallpostline"><span><?php echo $model->city->name; ?></span><span class="right"><?php echo $model->age; ?></span></div>
    <div class="smallpostline"><span><?php echo $model->category->name; ?></span><span class="right"><?php echo $model->target->name; ?></span></div>
    <div class="smallpostline header"><?php echo CHtml::link($model->header, Yii::app()->createUrl("site/showPost", array('post_id'=>$model->id)))?></div>
</div>


