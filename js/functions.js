$(document).ready(function(){
  $('.categorySelect').live('click', function(){
    $('.categorySelect').removeClass('categorySelectActive');
    $(this).addClass('categorySelectActive');
    $('#category').val($(this).attr('category_id'));
  });
  
  $('.targetList .girl').live('click', function(){
    $(this).prev('.boy').removeClass('boySelectActive');
    $(this).addClass('girlSelectActive');
  });
  
  $('.targetList .boy').live('click', function(){
    $(this).next('.girl').removeClass('girlSelectActive');
    $(this).addClass('boySelectActive');
  });
  
  $("#logo").live('click', function(){
    history.back(1);
  });
  
});