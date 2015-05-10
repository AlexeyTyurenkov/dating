

<div>
    Ваше объявление активировано
</div>
<div>
<?php
    $this->renderPartial('_commonNavigation');
    $this->renderPartial("_smallPost",array('data'=>$model));
?>