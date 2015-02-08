<div class="foriframe">
<?php 
echo CHtml::beginForm();
echo CHtml::tag('span');
echo CHtml::dropDownList('city', NULL, CHtml::listData(City::model()->findAll(), 'id', 'name'),array('empty'=>"Выберите город...", 'class' => "bigSelector", 'selected' => $cityPreselected));
echo CHtml::tag('/span');
echo CHtml::tag('span');
echo CHtml::dropDownList('category', NULL, CHtml::listData(Category::model()->findAll(), 'id', 'name'),array('empty'=>"Выберите цель...", 'class' => "bigSelector"));
echo CHtml::tag('/span');
echo CHtml::tag('span');
echo CHtml::dropDownList('target', NULL, CHtml::listData(Target::model()->findAll(), 'id', 'name'),array('empty'=>"Выберите категорию...", 'class' => "bigSelector"));
echo CHtml::tag('/span');
echo CHtml::submitButton('Фильтр');
echo CHtml::link("Добавить объявление", array('addNew'));
echo CHtml::endForm();

?>
</div>

<div class="counterfield">
    <?php
        echo "Всего ".  count($postsArray)." найдено";
    ?>
</div>
<?php 
foreach ($postsArray as $post) 
{
    $this->renderPartial("_smallPost", array('model'=>$post));
    echo CHtml::tag('hr/');
}
?>
