<div class="foriframe">
  <?php echo CHtml::beginForm(Yii::app()->createUrl('site/index')); ?>
  <div class="column">
    <p>Город:</p>
    <?php echo CHtml::dropDownList('city', $cityPreselected, CHtml::listData(City::model()->findAll(), 'id', 'name'),
          array('empty'=>"Все города", 'class' => "bigSelector locationSelect")); ?>
    <p>Цель:</p>
    <div class="categoryList">
      <?php foreach(Category::model()->findAll() as $category){
        echo "<div class='categorySelect' category_id='".$category->id."' style='background-image:url(images/category/".$category->id.".png);'>".$category->name."</div>";
      }
      echo CHtml::hiddenField('category', $categoryPreselected);
      /*echo CHtml::dropDownList('category', $categoryPreselected, CHtml::listData(Category::model()->findAll(), 'id', 'name'),
        array('empty'=>"Все цели", 'class' => "bigSelector categorySelect"));*/
      ?>
      <div class="clearfix"></div>
    </div>
  </div><!--column-->
  <div class="column">
    <p>Кто гого ищет:</p>
    <div class="targetList">
      <div class="listColumn">
        <p>Выберите Ваш пол:</p>
        <div class="boy targetDiv" type=1></div>
        <div class="girl targetDiv" type=2></div>
      </div>
      <div class="listColumn">
        <p>Кого Вы ищете:</p>
        <div class="boy targetDiv" type=1></div>
        <div class="girl targetDiv" type=2></div>
      </div>
      <?php echo CHtml::hiddenField('target', 0, Target::getTargetList()); ?>
      <?php
        /*echo CHtml::dropDownList('target', $targetPreselected, CHtml::listData(Target::model()->findAll(), 'id', 'name'),
          array('empty'=>"Все категории", 'class' => "bigSelector")); */ ?>
    </div>
    <p>Возраст:</p>
    <div class="targetList">
      <div class="listColumn">
        <p>Возраст от:</p>
        <?php echo CHtml::textField('minAge', $minAgePreselected, array("class" => 'filterField')); ?>
      </div>
      <div class="listColumn">
        <p>Возраст до:</p>
        <?php echo CHtml::textField('maxAge', $maxAgePreselected, array("class" => 'filterField')); ?>
      </div>
      <div class="clearfix"></div>
      <div id="slider"></div>
    </div>
    <?php //echo CHtml::hiddenField('offset', 0); ?>
    <?php echo CHtml::button('Искать', array(/*'submit' => array(),*/ "id"=>"sendForm")); ?>
    <div class="clearfix"></div>
  </div><!--column-->
  <div class="clearfix"></div>
  <?php echo CHtml::endForm();?>
</div><!--foriframe-->
<?php
Yii::app()->clientScript->registerScript('search',
    "
    var ajaxUpdateTimeout;
    var ajaxRequest;
    function updateList(form){
      ajaxRequest = form.serialize();
      clearTimeout(ajaxUpdateTimeout);
      ajaxUpdateTimeout = setTimeout(function () {
          $.fn.yiiListView.update(
          // this is the id of the CListView
            'PostsList',
            {
              data: ajaxRequest,
              complete: function(){
                if($('.pageEnd').html()*1 == 1 || $('.smallpost').length == 0){
                  $('.loadPage').hide();
                }
              }
            }
          )
      },
      // this is the delay
      300);
    };
    
    
    $(document).ready(function(){
      $(document).on('click', '.smallpost[link]', function(){
        window.location = $(this).attr('link');
      });
      
      $('#minAge').keyup(function(){updateList($('.foriframe form'))});
      $('#maxAge').keyup(function(){updateList($('.foriframe form'))});    
      $('#city').change(function(){updateList($('.foriframe form'))});
      
      var offset = 0;
      var loadingFlag = false;
      
      $('#sendForm, .categorySelect').on('click', function(){
        updateList($('.foriframe form'));
        //$('.foriframe').hide();
        /*$.ajax({
          type: 'post',
          url: window.location.href,
          data: $('.foriframe form').serialize(),
          success: function(data){
            $('.loadPosts').append(data);
          }
        });*/
      });
      
      $('.targetDiv').on('click', function(){
        if($('.targetDiv.SelectActive[type]').length==2){
          var target = $('#target').attr('attr_'+$('.targetDiv.SelectActive').eq(0).attr('type')+$('.targetDiv.SelectActive').eq(1).attr('type'));
          $('#target').val(target);
          updateList($('.foriframe form'));
        }
      });
      
      $(document).on('click', '.loadPage', function(){
        // защита от повторных нажатий
        if (!loadingFlag)	{
          offset += 50;
          // выставляем блокировку
          loadingFlag = true;
          $.ajax({
            type: 'post',
            url: window.location.href,
            //data: {offset:offset},
            data: $('.foriframe form').serialize()+'&offset='+offset,
            success: function(data){
              // снимаем блокировку
              loadingFlag = false;
              page = $('.pageCurrent').html()*1+1;
              
              if(page == $('.pageEnd').html()*1){
                $('.loadPage').hide();
              }
              // вставляем полученные записи после имеющихся в наш блок
              $('.pageCurrent').html(page);
              $('.loadItems').append(data);
            }
          });
        }
        return false;
      });
  
      $('#slider').slider({
        min: 1,
        max: 100,
        values: [$('input#minAge').val(),$('input#maxAge').val()],
        range: true,
        stop: function(event, ui) {
          $('input#minAge').val($('#slider').slider('values',0));
          $('input#maxAge').val($('#slider').slider('values',1));
          updateList($('.foriframe form'));
        },
        slide: function(event, ui){
          $('input#minAge').val($('#slider').slider('values',0));
          $('input#maxAge').val($('#slider').slider('values',1));
        }
      });
      
      $('input#minAge, input#maxAge').on('change keyup input click', function(){
        if (this.value.match(/[^0-9]/g)) {
          this.value = this.value.replace(/[^0-9]/g, '');
        }
      });
      
      $('input#minAge').change(function(){
        var value1=$('input#minAge').val();
        var value2=$('input#maxAge').val();
        if(parseInt(value1) > parseInt(value2)){
          value1 = value2;
          $('input#minAge').val(value1);
        }
        $('#slider').slider('values',0,value1);	
      });
      
      $('input#maxAge').change(function(){
        var value1=$('input#minAge').val();
        var value2=$('input#maxAge').val();
        
        if (value2 > 100) { value2 = 100; $('input#maxAge').val(100)}
      
        if(parseInt(value1) > parseInt(value2)){
          value2 = value1;
          $('input#maxAge').val(value2);
        }
        $('#slider').slider('values',1,value2);
      });
    });
    "
);
?>

<!---
echo CHtml::hiddenField('offset', $offset);
echo CHtml::hiddenField('limit', $limit);
-->