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
				$cl = $category->id == $model->category_id ? "categorySelectActive" : "";
				echo "<div class='categorySelect $cl' category_id='".$category->id."'>";
        echo "<p><img src='images/category/".$category->id.".png' alt=''></p>";
        echo "<p>".$category->name."</p></div>";
			}
			echo $form->hiddenField($model,'category_id');
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
				<div class="boy targetDiv" type=1><img src='images/target/1.png' alt=''></div>
				<div class="girl targetDiv" type=2><img src='images/target/2.png' alt=''></div>
			</div>
			<div class="listColumn">
				<p>Кого Вы ищете:</p>
				<div class="boy targetDiv" type=1><img src='images/target/1.png' alt=''></div>
				<div class="girl targetDiv" type=2><img src='images/target/2.png' alt=''></div>
			</div>
	    <?php echo $form->hiddenField($model,'target_id', Target::getTargetList()); ?>
		</div>
		<?php 
			//echo $form->dropDownList($model, 'target_id', CHtml::listData(Target::model()->findAll(), 'id', 'name'), array('empty'=>"Выберите категорию...",'class'=>'selectFieldInline')); 
			echo $form->error($model,'target_id'); 
    ?>
	</div>

	<hr>
	<div class="row smallInput aligncenter">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php if($model->isNewRecord) $model->age = 18; ?>
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
		<?php 
      if(!$model->isNewRecord)
      {
        echo CHtml::link('Удалить объявление',"#", array("submit"=>array('delete', 'code'=>$model->editCode), 'confirm' => 'Вы уверены?', "class"=>"text-link"));
      }    
    ?>
		<?php echo CHtml::submitButton('Отправить', array("id"=>"sendForm")); ?>
	</div>
</div><!--column-->
<?php $this->endWidget(); ?>
</div><!-- form -->
</div><!-- addform -->

<script type="text/javascript">
	$(document).ready(function(){
		$(".b_add").addClass("b_add_active");
		
		$('#slider').slider({
      min: 18,
      max: 70,
      value:  $('input#Post_age').val(),
      range: "min",
      stop: function(event, ui) {
        $('input#Post_age').val($('#slider').slider('values',0));
      },
      slide: function(event, ui){
        $('input#Post_age').val($('#slider').slider('values',0));
      },
			change: function(event, ui){
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
			if (value1 > 70) { value1 = 70; $('input#Post_age').val(value1);}
			if (value1 < 18) { value1 = 18; $('input#Post_age').val(value1);}
      $('#slider').slider('value',value1);	
    });
		
		$('.categorySelect').on('click', function(){
			$('.categorySelect').removeClass('categorySelectActive');
			$(this).addClass('categorySelectActive');
			$('#Post_category_id').val($(this).attr('category_id'));
		});
		
		if($('#Post_target_id').val() != 0){
			var value1 = $('#Post_target_id').attr($('#Post_target_id').val()+'-1');
			var value2 = $('#Post_target_id').attr($('#Post_target_id').val()+'-2');
			$('.targetList .listColumn').eq(0).find('.targetDiv[type='+value1+']').addClass('SelectActive');
			$('.targetList .listColumn').eq(1).find('.targetDiv[type='+value2+']').addClass('SelectActive');
		}
		
		$('.targetDiv').on('click', function(){
			$(this).parents('.listColumn').find('.targetDiv').removeClass('SelectActive');
			$(this).addClass('SelectActive');
			if($('.targetDiv.SelectActive[type]').length==2){
				var target = $('#Post_target_id').attr('attr_'+$('.targetDiv.SelectActive').eq(0).attr('type')+$('.targetDiv.SelectActive').eq(1).attr('type'));
				$('#Post_target_id').val(target);
			}
		});
		
		$("#logo").on('click', function(){
			window.location = "/";
		});
	});
</script>