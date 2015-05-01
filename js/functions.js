$(document).ready(function(){
  $('.categorySelect').on('click', function(){
    $('.categorySelect').removeClass('categorySelectActive');
    $(this).addClass('categorySelectActive');
    $('#category').val($(this).attr('category_id'));
  });

  $("#logo").on('click', function(){
    history.back(1);
  });
  
});