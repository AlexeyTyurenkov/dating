$(document).ready(function(){
  $('.categorySelect').on('click', function(){
    $('.categorySelect').removeClass('categorySelectActive');
    $(this).addClass('categorySelectActive');
    $('#category').val($(this).attr('category_id'));
  });
  
  $('.targetList .girl').on('click', function(){
    $(this).prev('.boy').removeClass('boySelectActive SelectActive');
    $(this).addClass('girlSelectActive SelectActive');
  });
  
  $('.targetList .boy').on('click', function(){
    $(this).next('.girl').removeClass('girlSelectActive SelectActive');
    $(this).addClass('boySelectActive SelectActive');
  });
  
  $("#logo").on('click', function(){
    history.back(1);
  });
  
});