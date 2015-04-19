<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns' => array(
        array('name'=>'Город',
              'value'=>'$data->city->name',
              'htmlOptions'=>array('style'=>'width: 100px')
        ),
        array('name'=>'заголовок',
              'value'=>'CHtml::link(CHtml::encode($data->header), Yii::app()->controller->createUrl("show", array("post_id" => $data->id)))',
              'type'=>'html',
              'htmlOptions'=>array('style'=>'width: 100px')
            ),
        array('name'=>'Дата создания',
              'value'=>'$data->create_date',
              'htmlOptions'=>array('style'=>'width: 100px')
            )
    )
));

?>