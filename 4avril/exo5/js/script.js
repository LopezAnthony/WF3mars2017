$(document).ready(function () {

    // Burger menu Classique
    $('.fa-bars').click(function(){

        $('nav ul').fadeIn(500);

    });

    // Fermer le burger menu 
    $('a').click(function(evt){
        evt.preventDefault();
        $('nav ul'). fadeOut(500);
    });

}); //Fin chargement du dom