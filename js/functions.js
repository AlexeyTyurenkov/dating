$(document).ready(function(){
  $('.categorySelect').on('click', function(){
    $('.categorySelect').removeClass('categorySelectActive');
    $(this).addClass('categorySelectActive');
    $('#category').val($(this).attr('category_id'));
  });
  
  $('.targetList .girl').on('click', function(){
    $(this).prev('.boy').removeClass('boySelectActive');
    $(this).addClass('girlSelectActive');
  });
  
  $('.targetList .boy').on('click', function(){
    $(this).next('.girl').removeClass('girlSelectActive');
    $(this).addClass('boySelectActive');
  });
  
  $("#logo").on('click', function(){
    history.back(1);
  });
  
});