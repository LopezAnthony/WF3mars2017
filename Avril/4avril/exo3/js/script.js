$(document).ready(function () {
    
    $('h3').click(function(){

        // Fermer la balise suivant .open
        $('.open').not(this)
        .next().slideUp()
        .prev().removeClass('open')
        .children('.fa').toggleClass('fa-arrow-right').toggleClass('fa-times');

        // Faire un toggle de la class open sur la balise h3
        $(this).toggleClass('open');

        // Faire un slideToggle sur la balise suivante
        $(this).next().slideToggle();

        // Sélectionner la balise .fa pour supprimer la class .fa-arrow-right et un toggle sur la class fa-times
        $(this).children('.fa').toggleClass('fa-arrow-right').toggleClass('fa-times');

        

    });



}); //Fin chargement du dom