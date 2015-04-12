

<div>
    Ваше оголошення активоване
</div>
<div>
<?php  echo CHtml::link("Повернутись на головну", Yii::app()->createUrl("site/index")); ?>
</div>
<div>
   <?php  echo CHtml::link("Додати наступне", Yii::app()->createUrl("site/add")); ?>
</div>
<?php
    $this->renderPartial("_smallPost",array('data'=>$model));
?>