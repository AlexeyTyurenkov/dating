<?php $this->renderPartial('_header', array('header'=>"")); ?>

<div class="main-text">
<header>Объявление успешно отредактировано</header>
<br/><br/>
Через несколько секунд Вы будете перенаправлены на главную страницу

</div>

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
<script type="text/javascript">
	$(document).ready(function(){
		$("#logo").on('click', function(){
			window.location = "/";
		});
	});
</script>