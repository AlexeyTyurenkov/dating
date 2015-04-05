<div class="foriframe">
<?php
echo CHtml::beginForm(Yii::app()->createUrl('site/index'));
echo CHtml::tag('span');
echo CHtml::dropDownList('city', $cityPreselected, CHtml::listData(City::model()->findAll(), 'id', 'name'),
        array('empty'=>"Все города", 'class' => "bigSelector"));
echo CHtml::tag('/span');
echo CHtml::tag('span');
echo CHtml::dropDownList('category', $categoryPreselected, 
        CHtml::listData(Category::model()->findAll(), 'id', 'name'),array('empty'=>"Все цели", 'class' => "bigSelector"));
echo CHtml::tag('/span');
echo CHtml::tag('span');
echo CHtml::dropDownList('target', $targetPreselected, CHtml::listData(Target::model()->findAll(), 'id', 'name'),array('empty'=>"Все категории", 'class' => "bigSelector"));
echo CHtml::tag('/span');
echo "Возраст от:";
echo CHtml::textField('minAge', $minAgePreselected,array("class" => 'filterField'));
echo "до:";
echo CHtml::textField('maxAge', $maxAgePreselected,array("class" => 'filterField'));
echo CHtml::endForm();

Yii::app()->clientScript->registerScript('search',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    var updateList = function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
            // this is the id of the CListView
                'PostsList',
                {data: ajaxRequest}
            )
        },
        // this is the delay
        300);
    };
    $('#minAge').keyup(updateList);
    $('#maxAge').keyup(updateList);    
    $('#target').change(updateList);
    $('#city').change(updateList);
    $('#category').change(updateList);
    "
        
);

?>

</div>

<!---
echo CHtml::hiddenField('offset', $offset);
echo CHtml::hiddenField('limit', $limit);
-->