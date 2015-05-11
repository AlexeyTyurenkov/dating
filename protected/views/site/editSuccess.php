<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
            
?>

<header>Объявление успешно отредактировано</header>
<div>
<div>Через несколько секунд Вы будете перенаправлены на главную страницу</div>
<?php Yii::app()->clientScript->registerScript('redirect', ' 
           function redirectToMain()
           {
              location.href = \''.Yii::app()->createAbsoluteUrl('site/index').'\';  
           }
           setTimeout(redirectToMain,6000);     
', CClientScript::POS_HEAD); ?>
</div>
<div>
<?php     $this->renderPartial('_commonNavigation'); ?>