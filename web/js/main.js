$(function(){

  $(document).on('click','fc-day',function(){
    var date=$(this).attr('data-date');

    $.get('index.php?r=eventos/create',{'date':date},function(data){
      $('#modal').modal('show').find('#modalContent').load(data);
    });
  });

  $('modalButton').click(function(){
    $('#modal').modal('show')
    .find('#modalContent')
    .load($(this).attr('value'));
  });
});
