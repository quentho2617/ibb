$(document).ready(function($){

    $('#client').autocomplete({
        source: function(request, reponse){
          $.ajax({
            dataType: "json",
            type :'GET',
            url:"index.php?page=term0="+$('#client').val(),
            data: {
            name_startsWith : $('#client').val(),
            maxRows : 5 // on donne la chaîne de caractère tapée dans le champ de recherche
            },
          
            success: function(data) { 
            
                  reponse($.map(data, function(objet){
                    console.log(data.value);
                    return objet.value; // on retourne cette forme de suggestion
                  }
            ))},

            error: function(data) {
                  successmessage = 'Error';
                  console.log(successmessage);
              }
      
            });
          },  
    minLength: 3,
    select: function(event,ui){
  
    //alert(ui.item.label);
    var clientName = ui.item.value;
    if(clientName != '') {
    location.href= 'index.php?clientName=' + clientName;
    }},
        
});
});