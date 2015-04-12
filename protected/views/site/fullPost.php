
<?php     $this->renderPartial('_commonNavigation'); ?>

<div>
    <div><?php echo $model->header?> </div>
    <div><?php echo $model->text?> </div>
    <div><?php echo $model->city->name?> </div>
    <div><?php echo $model->category->name?> </div>
    <div><?php echo $model->target->name?> </div>
    <div><?php echo $model->create_date?> </div>
</div>

<div id="response">
    <?php 
    
    $this->renderPartial('_responseForm', array('model'=>$response, 'post_id'=>$model->id))?>
    
</div>