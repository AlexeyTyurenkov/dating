<?php $this->renderPartial('_header', array('header'=>"Добавить")); ?>

<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>
<div class="addForm">

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-addNew-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>
	<div class="column">
	<div class="row">
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php 
			echo $form->dropDownList($model, 'city_id', CHtml::listData(City::model()->findAll(), 'id', 'name'), array('empty'=>"Все города", 'class' => "bigSelector locationSelect")); 
			echo $form->error($model,'city_id');
		?>
	</div>
</div><!--column-->
	<div class="column">
	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
            <?php 
            $emailvalue = "";
            if(!$model->isNewRecord)
            {
                $emailvalue = $model->user->email;
            }
            echo CHtml::textField('email', $emailvalue, array('placeholder'=>'@',
                                                           'id' => 'email',
                                                           'class' => 'inputField',
                                                           'readonly' => !$model->isNewRecord,
                                                           'ajax' => array(
                                                                        'type'=>'POST', //request type
                                                                        'url'=>$this->createUrl('site/getUserID'), // url to call controller action
                                                                        'success'=>' function(data) { '
                                                               . '              $(\'#Post_user_id\').val(data);'
                                                               . '              $(\'#email\').removeClass("invalidated").addClass("validated");'
                                                               . '          }',// function to call onsuccess 
                                                                        'error' => ' function(data) { '
                                                               . '              $(\'#Post_user_id\').val("");'
                                                               . '              $(\'#email\').removeClass("validated").addClass("invalidated");'
                                                               . '          }'
             // "data" is returned data and function can be regular js or jQuery
             // here we are are updating the value of another field that has id "my_output_field"
	)));
		echo $form->hiddenField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
</div><!--column-->

	<div class="column">

	<!--<div class="row inline">-->
		<?php 
		//echo $form->dropDownList($model, 'category_id', CHtml::listData(Category::model()->findAll(), 'id', 'name'), array('empty'=>"Выберите цель...",'class'=>'selectFieldInline'));
		//echo $form->error($model,'category_id'); 
                ?>
	<!--</div>-->
	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<div class="categoryList">
			<?php foreach(Category::model()->findAll() as $category){
				echo "<div class='categorySelect' category_id='".$category->id."' style='background-image:url(images/category/".$category->id.".png);'>".$category->name."</div>";
			}
			echo CHtml::hiddenField('category');
			echo '<div class="clearfix"></div>';
			echo $form->error($model,'category_id'); 
			?>
		</div>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'target_id'); ?>
		<div class="targetList">
			<div class="listColumn">
				<p>Выберите Ваш пол:</p>
				<div class="boy"></div>
				<div class="girl"></div>
			</div>
			<div class="listColumn">
				<p>Кого Вы ищете:</p>
				<div class="boy"></div>
				<div class="girl"></div>
			</div>
		</div>
		<?php 
			//echo $form->dropDownList($model, 'target_id', CHtml::listData(Target::model()->findAll(), 'id', 'name'), array('empty'=>"Выберите категорию...",'class'=>'selectFieldInline')); 
			echo $form->error($model,'target_id'); 
    ?>
	</div>

	<hr>
	<div class="row smallInput aligncenter">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php $model->age = 18; ?>
		<?php echo $form->textField($model,'age'); ?>
		<div class="smallSlider">
			<div id="slider"></div>
		</div>
		<?php echo $form->error($model,'age'); ?>
		<div class="clearfix"></div>
	</div>
	<hr>
	</div><!--column-->
	<div class="column">
	<div class="row">
		<?php echo $form->labelEx($model,'header'); ?>
		<?php echo $form->textField($model,'header'); ?>
		<?php echo $form->error($model,'header'); ?>
	</div>

	<!--<div class="row smallInput">-->
		<?php  /*
		if (CCaptcha::checkRequirements() && Yii::app()->user->isGuest)
		{        
			echo $form->labelEx($model,'verifyCode');
			echo $form->textField($model,'verifyCode');
			$this->widget('ExtCaptcha');
			echo '<div class="clearfix"></div>';
			echo $form->error($model,'verifyCode');
		}*/
		?>
	<!--</div>-->
		
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
    <?php echo $form->hiddenField($model, 'abused',array('value'=>0));?>
		<?php echo $form->error($model,'abused'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Отправить', array("id"=>"sendForm")); ?>
	</div>
</div><!--column-->
<?php $this->endWidget(); ?>
    
    <div class="row">
        <?php 
        if(!$model->isNewRecord)
        {
            echo CHtml::link('"Удалить объявление"',"#", array("submit"=>array('delete', 'code'=>$model->editCode), 'confirm' => 'Вы уверены?'));
        }    
        ?>
    </div>
</div><!-- form -->
</div><!-- addform -->

<script type="text/javascript">
	$(document).ready(function(){
		$(".b_add").addClass("b_add_active");
		
		$('#slider').slider({
      min: 1,
      max: 100,
      value:  $('input#Post_age').val(),
      range: "min",
      stop: function(event, ui) {
        $('input#Post_age').val($('#slider').slider('values',0));
      },
      slide: function(event, ui){
        $('input#Post_age').val($('#slider').slider('values',0));
      }
    });
    
    $('input#Post_age').on('change keyup input click', function(){
			if (this.value.match(/[^0-9]/g)) {
				this.value = this.value.replace(/[^0-9]/g, '');
			}
		});
    
    $('input#Post_age').change(function(){
      var value1=$('input#Post_age').val();
      $('#slider').slider('value',value1);	
    });
	});
</script>