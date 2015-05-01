<div id="header">
	<div id="logo"> 
		<img class="logo" src="images/logo.png" alt="<?=CHtml::encode(Yii::app()->name); ?>">
		<p><?=$header;?> <?php //echo CHtml::encode(Yii::app()->name); ?></p>
	</div>
	<div id="buttons"> 
		<?php echo CHtml::link("", Yii::app()->createUrl("site/index"), array("class"=>"b_search"));?>
		<div class="separator"></div>
		<?php echo CHtml::link("", Yii::app()->createUrl("site/add"), array("class"=>"b_add"));?>
		<div class="separator"></div>
		<?php echo CHtml::link("", "#", array("class"=>"b_ask"));?>
	</div>
	<div class="clearfix"></div>
</div><!-- header -->

