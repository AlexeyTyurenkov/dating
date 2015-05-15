<?php $this->renderPartial('_header', array('header'=>"")); ?>

<div class="main-text">
<header>Объявление добавлено успешно</header>
    На Вашу почту <strong>
        <?php    echo $model->user->email; ?>
    </strong> было отправлено письмо с ссылкой на активацию объявления. 
    <br>
    Если Вы долго не получаете письмо с ссылкой на активацию, проверьте в почте папку "Спам"
<?php $this->renderPartial('_commonNavigation'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#logo").on('click', function(){
			window.location = "/";
		});
	});
</script>