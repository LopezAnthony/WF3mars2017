$(document).ready(function () {

    // Capter le click sur le premier bouton
    $('button:first').click(function(){
        console.log('hellooooo!')

        // Charger le fichier home.html dans le main
        $('main').load('views/home.html');
    });




}); //fin chargement de DOM