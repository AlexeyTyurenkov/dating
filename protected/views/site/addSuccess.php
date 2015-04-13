<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
            
?>

<header>Объявление добавлено успешно</header>
<div>
    На Вашу почту <strong>
        <?php    echo $model->user->email; ?>
    </strong> було отправлено письмо с ссылкой на активацию объявления. 
    <br>
    Если Вы долго не получаете письмо с ссылкой на активацию, проверьте в почте папку "Спам"
</div>
<div>
<?php     $this->renderPartial('_commonNavigation'); ?>