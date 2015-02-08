<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<header>Error <?php echo $code; ?></header>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>