<?php     $this->renderPartial('_commonNavigation'); ?>

<div>Вы отправили ответ </div>
<div>Через несколько секунд Вы будете перенаправлены на главную страницу</div>

<?php Yii::app()->clientScript->registerScript('redirect', ' 
           function redirectToMain()
           {
              location.href = \''.Yii::app()->createAbsoluteUrl('site/index').'\';  
           }
           setTimeout(redirectToMain,6000);     
', CClientScript::POS_HEAD); ?>
