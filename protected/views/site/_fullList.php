<?php

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_smallPost', 
    'template'=>'{summary}{pager}{items}',
    'pager' => array(
        'nextPageLabel' => 'Наступна',
        'prevPageLabel' => 'Попередня',
        'firstPageLabel' => 'Перша',
        'lastPageLabel' => 'Остання'
     ),
    'id' => 'PostsList'
));
?>
