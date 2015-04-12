
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'response-sendResponse-form',
        'action' => Yii::app()->createUrl('site/sendmail'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
));
?>

	<p class="note">Все поля обязательны</p>

	<?php echo $form->errorSummary($model,
                "Исправьте следующие ошибки:"
                ); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'senderemail'); ?>
		<?php echo $form->textField($model,'senderemail'); ?>
		<?php echo $form->error($model,'senderemail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message'); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

        <?php echo $form->hiddenField($model,'post_id',array('value'=>$post_id));?>
        <div class="row">
            <?php 
            if (CCaptcha::checkRequirements() && Yii::app()->user->isGuest)
            {        
                $this->widget('ExtCaptcha');
                echo $form->textField($model,'verifyCode',array('placeholder'=>'Введите символы с картинки...','class'=>'headerText'));
                echo $form->error($model,'verifyCode');
            }
            ?>
        </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Отправить сообщение'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->