$(function(){

  // $(document).on('click','.fc-day',function(){
  //   var date=$(this).attr('data-date');
  //   alert('ppp');
  //
  //   $.get('/index.php?r=eventos/create',{'date':date},function(data){
  //     $('#modal').modal('show')
  //     .find('#modalContent')
  //     .html(data);
  //   });
  // });

  $('modalButton').click(function(){
    $('#modal').modal('show')
    .find('#modalContent')
    .load($(this).attr('value'));
  });

});
