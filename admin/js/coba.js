$(document).ready(function(){
 $('.alert_notif').on('click', function(){
  var id = $(this).attr('id');
  $("#modal_confirm").modal('show');
  $('#btn_yes').attr('name', id);
 });
 $('#btn_yes').on('click', function(){
  var id = $(this).attr('name');
  $.ajax({
   type: "POST",
   url: "hapus_kriteria.php",
   data:{
    id: id
   },
   success: function(){
    $("#modal_confirm").modal('hide');
    $(".del_mem" + id).empty();
    $(".del_mem" + id).html("<td colspan='6'><center>Deleting...</center></td>");
    setTimeout(function(){
     $(".del_mem" + id).fadeOut('slow');
    }, 1000);
   }
  });
 });
});