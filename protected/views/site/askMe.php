<?php $this->renderPartial('_header', array('header'=>"Привет!")); ?>

<div class="main-text">
    Наш сервис объявлений абсолютно анонимен. <br/>
    Чтобы познакомиться Вам не нужно выставлять свои фото, подписываться по СМС и оплачивать размещение 
    анкет. <br/>
    Вы просто <a class="button-link" href="<?=$this->createUrl('/add');?>">оставляете объявление</a>, и ответы будут посылать Вам на вашу электронную почту.
    <br/>
    <br/>

    Если Вы хотите связаться с нами, пишите на адрес  <a class="button-link" href="mailto:admin@datings.in.ua">admin@datings.in.ua</a>
    
    <br>
    <br>
    <a class="button-link" href="<?=$this->createUrl('site/index');?>">Начните поиск сейчас</a>
    
</div>

<script type="text/javascript">
	$(window).load(function(){
		$("#logo").on('click', function(){
			window.location = "/";
		});
	});
</script>