// JavaScript Document
function deleteUserPhoto(id,fileName){
     $.ajax({
        url: 'manager.php',
        type:'GET',
        data: {controller:'users',action:'deletePhoto',idUser:id,fileName:fileName},

        success: function(data,statut)
        {
           $(document).find('#avatarThumb').html('Image supprimée');
        },
         error: function(result,statut,error)
        {
           $(document).find('#avatarThumb').html('Erreur<br>' + error);
        }
    });

}

$('#sortable').sortable({
   cursor :"move",
   opacity : 0.5,
   update: function (event, ui) {
      let data = $(this).sortable('serialize');
      let controller = $(this).data('controller')
      $.ajax({
         data: data,
         type: 'POST',
         url: `manager.php?controller=${controller}&action=sortable`,
         success: function (data, statut) {
         }
      });
   }
});

       