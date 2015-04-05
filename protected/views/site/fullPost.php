
<div>
<?php  echo CHtml::link("Повернутись на головну", Yii::app()->createUrl("site/index")); ?>
</div>
<div>
   <?php  echo CHtml::link("Додати наступне", Yii::app()->createUrl("site/addNew")); ?>
</div>
<div>
    <div><?php echo $model->header?> </div>
    <div><?php echo $model->text?> </div>
    <div><?php echo $model->city->name?> </div>
    <div><?php echo $model->category->name?> </div>
    <div><?php echo $model->target->name?> </div>
    <div><?php echo $model->create_date?> </div>
</div>

<div id="response">
    <?php 
    
    $this->renderPartial('sendResponse')?>
    
</div>