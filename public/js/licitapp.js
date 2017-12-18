$(document).ready(function(){
$('.seguir').click(function(){
 
   var row = $(this).parents('tr');
   var id = row.data('id');
   var form = $('#form-add');
   var url = form.attr('action').replace('codigo', id);
   var data = form.serialize();
   
   $.post(url, data, function(result){
   
   alert(result);

   });
  });
  });
  
