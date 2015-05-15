<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<?php $this->renderPartial('_header', array('header'=>"Error")); ?>
<div class="main-text">

<header>Error <?php echo $code; ?></header>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>

</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#logo").on('click', function(){
			window.location = "/";
		});
	});
</script>