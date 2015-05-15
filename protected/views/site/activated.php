<?php $this->renderPartial('_header', array('header'=>"")); ?>

<div class="main-text">
    Ваше объявление активировано
    
    <?php $this->renderPartial('_commonNavigation'); ?>
    <br>
    <?php $this->renderPartial("_smallPost",array('data'=>$model)); ?>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#logo").on('click', function(){
			window.location = "/";
		});
	});
</script>