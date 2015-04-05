<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
            
?>

<header>Объявление добавлено успешно</header>
<div>
    На Вашу пошту <strong>
        <?php    echo $model->user->email; ?>
    </strong> було відправлено листа з посиланням на активацію оголошення. 
</div>
<div>
<?php  echo CHtml::link("Вернуться на главную", Yii::app()->createUrl("site/index")); ?>
</div>
<div>
   <?php  echo CHtml::link("Добавить следующее", Yii::app()->createUrl("site/addNew")); ?>
</div>