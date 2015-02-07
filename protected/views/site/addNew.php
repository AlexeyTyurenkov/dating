<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-addNew-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">

                <?php 
                echo $form->labelEx($model,'city_id');
                echo $form->dropDownList($model, 'city_id', CHtml::listData(City::model()->findAll(), 'id', 'name')); 
                echo $form->error($model,'city_id');
		 ?>
	</div>

	<div class="row">
		<?php 
                echo $form->labelEx($model,'category_id');
		echo $form->dropDownList($model, 'category_id', CHtml::listData(Category::model()->findAll(), 'id', 'name'));
		echo $form->error($model,'category_id'); 
                ?>
	</div>

	<div class="row">
		<?php 
                echo $form->labelEx($model,'target_id'); 
		echo $form->dropDownList($model, 'target_id', CHtml::listData(Target::model()->findAll(), 'id', 'name')); 
		echo $form->error($model,'target_id'); 
                ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'header'); ?>
		<?php echo $form->textField($model,'header'); ?>
		<?php echo $form->error($model,'header'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text'); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->error($model,'active'); ?>
                <?php echo $form->hiddenField($model, 'active',array('value'=>0));?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abused'); ?>
		<?php echo $form->textField($model,'abused'); ?>
		<?php echo $form->error($model,'abused'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Отправить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->