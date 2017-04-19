$(document).ready(function () {

    // Ouvrir la modal 
    $('button').click(function(){

        $('section').fadeIn();
        
    });

    // Fermer la modal
    $('.fa').click(function(){
        $(this).parent().parent().parent().fadeOut();
    });

    $(document).keyup(function(evt){ 
        if(evt.keyCode == 27){
            $('section').fadeOut();
        }
    });



}); //Fin du chargement du DOM