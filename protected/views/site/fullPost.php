<?php $this->renderPartial('_header', array('header'=>"Написать")); ?>

<?php //$this->renderPartial('_returnToMain'); ?>
<div class="columns">
    <div class="column">
        <div class="full-post">
            <p class="title">Вы пишете:</p>
            <?php $this->renderPartial('_smallPost', array("data"=>$model, 'showText'=>1)); ?>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--<div>
        <div><?php //echo $model->header?> </div>
        <div><?php //echo $model->text?> </div>
        <div><?php //echo $model->city->name?> </div>
        <div><?php //echo $model->category->name?> </div>
        <div><?php //echo $model->target->name?> </div>
        <div><?php //echo $model->create_date?> </div>
    </div>-->
    <div class="column">
        <div id="response">
            <?php $this->renderPartial('_responseForm', array('model'=>$response, 'post_id'=>$model->id)); ?>
        </div>
    </div>
</div>