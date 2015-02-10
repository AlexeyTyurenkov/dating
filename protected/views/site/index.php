<div style="text-align: center; width:40%;">
    <?php echo CHtml::link("Добавить объявление", array('addNew'));?>
    
</div>

<div class="foriframe">
<?php
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
echo CHtml::textField('minAge', $minAgeSelected,array("class" => 'filterField'));
echo "до:";
echo CHtml::textField('maxAge', $maxAgeSelected,array("class" => 'filterField'));
echo CHtml::hiddenField('offset', $offset);
echo CHtml::hiddenField('limit', $limit);
echo CHtml::submitButton('Фильтр');

echo CHtml::endForm();

?>
</div>

<div class="counterfield">
    <?php
        echo "Всего ".  count($postsArray)." найдено";
    ?>
    <div class="pagination">
        <div style="width: 50%; display: inline">
            <?php                
            if ($offset != 0) 
            {
                echo CHtml::link("Предыдущие " . $limit, Yii::app()->createAbsoluteUrl('site/index', array(
                    'city'     => $cityPreselected,
                    'category' => $categoryPreselected,
                    'target'   => $targetPreselected,
                    'minAge'   => $minAgeSelected,
                    'maxAge'   => $maxAgeSelected,
                    'offset'   => $offset - $limit,
                    'limit'    => $limit
                )));
            }
            ?>
        </div>
        <div style="width: 50%; display: inline">
            <?php                
            if ($offset + $limit > count($postsArray)) 
            {
                echo CHtml::link("Предыдущие " . $offset, Yii::app()->createAbsoluteUrl('site/index', array(
                    'city'     => $cityPreselected,
                    'category' => $categoryPreselected,
                    'target'   => $targetPreselected,
                    'minAge'   => $minAgeSelected,
                    'maxAge'   => $maxAgeSelected,
                    'offset'   => $offset + $limit,
                    'limit'    => $limit
                )));
            }
            ?>
        </div>
    </div>
</div>

<?php 
foreach ($postsArray as $post) 
{
    $this->renderPartial("_smallPost", array('model'=>$post));
    echo CHtml::tag('hr/');
}
?>
