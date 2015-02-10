<div style="text-align: center; width:40%;">
    <?php echo CHtml::link("Добавить объявление", array('addNew'));?>
    
</div>

<div class="foriframe">
<?php
echo CHtml::link("Добавить объявление", array('addNew'));
echo CHtml::beginForm();
echo CHtml::tag('span');
echo CHtml::dropDownList('city', $cityPreselected, CHtml::listData(City::model()->findAll(), 'id', 'name'),array('empty'=>"Все города", 'class' => "bigSelector"));
echo CHtml::tag('/span');
echo CHtml::tag('span');
echo CHtml::dropDownList('category', $categoryPreselected, CHtml::listData(Category::model()->findAll(), 'id', 'name'),array('empty'=>"Все цели", 'class' => "bigSelector"));
echo CHtml::tag('/span');
echo CHtml::tag('span');
echo CHtml::dropDownList('target', $targetPreselected, CHtml::listData(Target::model()->findAll(), 'id', 'name'),array('empty'=>"Все категории", 'class' => "bigSelector"));
echo CHtml::tag('/span');
echo "Возраст от:";
echo CHtml::textField('minAge');
echo "до:";
echo CHtml::textField('maxAge');
echo CHtml::submitButton('Фильтр');

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
