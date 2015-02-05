
<?php 
echo CHtml::beginForm();
echo CHtml::dropDownList('city', NULL, $citiesArray);
echo CHtml::tag('br/');
echo CHtml::dropDownList('category', NULL, $categoriesArray);
echo CHtml::tag('br/');
echo CHtml::dropDownList('target', NULL, $targetsArray);
echo CHtml::submitButton('Фильтр');
echo CHtml::endForm();

foreach ($postsArray as $post) 
{
    echo $post->category_id;
    echo $post->category()->name;
}
?>
