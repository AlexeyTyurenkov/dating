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
<div class="counterfield"></div>

<?php
    $this->renderPartial("_fullList", array(
        'dataProvider' => $dataProvider
    ));
?>
<div class="loadPosts"></div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.b_search').on('click', function(e){
            e.preventDefault();
            $('.foriframe').toggle();
            $(".b_search").toggleClass("b_search_active");
        });
    });
</script>