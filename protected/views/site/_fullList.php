<?php //$this->renderPartial('_header', array('header'=>"<span>Простые<br>знакомства</span>")); ?>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_smallPost',
    'summaryText' => "<div class='summaryText'><p class='summaryPages'>страница <span class='pageCurrent'>{start}</span> / <span class='pageEnd'>{pages}</span></p><p class='summaryResults'>всего {count} анкет</p></div><a class='summaryAdd' href='".Yii::app()->createUrl("site/add")."'><span>+</span> добавить свою</a>",
    'template'=>'{items}<div class="loadItems"></div><div class="clearfix"></div>{summary}<div class="clearfix"></div><div class="loadPage"></div>',
    'id' => 'PostsList'
));
?>
<script type="text/javascript">
	$(document).ready(function(){
    if($('.pageEnd').html()*1 == 1){
      $('.loadPage').hide();
    }
  });
</script>