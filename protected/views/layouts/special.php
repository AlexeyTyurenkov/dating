<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">-->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">-->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">-->

  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>

	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui.min.js',CClientScript::POS_END);?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/functions.js',CClientScript::POS_END);?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<?php echo $content; ?>

	<div class="clearfix"></div>

	<div id="footer">
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
