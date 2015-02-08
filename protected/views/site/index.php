
<?php 
echo CHtml::beginForm();
echo CHtml::tag('span');
echo CHtml::dropDownList('city', NULL, $citiesArray,array('empty'=>"Выберите город...", 'class' => "bigSelector"));
echo CHtml::tag('/span');
echo CHtml::tag('span');
echo CHtml::dropDownList('category', NULL, $categoriesArray,array('empty'=>"Выберите цель...", 'class' => "bigSelector"));
echo CHtml::tag('/span');
echo CHtml::tag('span');
echo CHtml::dropDownList('target', NULL, $targetsArray,array('empty'=>"Выберите категорию...", 'class' => "bigSelector"));
echo CHtml::tag('/span');
echo CHtml::submitButton('Фильтр');
echo CHtml::endForm();

foreach ($postsArray as $post) 
{
    $this->renderPartial("_smallPost", array('model'=>$post));
    echo CHtml::tag('hr/');
}
?>
