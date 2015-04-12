<div style="text-align: center; width:100%; margin-bottom: 5px;">
    <?php echo CHtml::link("Добавить объявление", array('add'));?>
    
</div>

<?php
    $this->renderPartial("_upperFilter", array(
                    'cityPreselected'     => $cityPreselected,
                    'categoryPreselected' => $categoryPreselected,
                    'targetPreselected'   => $targetPreselected,
                    'minAgePreselected'   => $minAgeSelected,
                    'maxAgePreselected'   => $maxAgeSelected));
?>

<div class="counterfield">
    
</div>

<?php 

    $this->renderPartial("_fullList", array(
        'dataProvider' => $dataProvider
    ));
?>