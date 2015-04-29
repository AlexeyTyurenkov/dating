<?php $this->renderPartial('_header', array('header'=>"Поиск")); ?>

<?php //echo CHtml::link("Добавить объявление", array('add'));?>
<?php
    $this->renderPartial("_upperFilter", array(
                    'cityPreselected'     => $cityPreselected,
                    'categoryPreselected' => $categoryPreselected,
                    'targetPreselected'   => $targetPreselected,
                    'minAgePreselected'   => $minAgeSelected,
                    'maxAgePreselected'   => $maxAgeSelected));
?>
<div class="loadPosts"></div>
<div class="counterfield">
    
</div>

<?php
    /*$this->renderPartial("_fullList", array(
        'dataProvider' => $dataProvider
    ));
    */
?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".b_search").addClass("b_search_active");
    });
</script>