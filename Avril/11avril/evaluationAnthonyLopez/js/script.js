$(document).ready(function () {

    // Changer l'image
    $('select').change(function(){
        $('img:first').attr('src', 'img/' + $('select').val() + '.jpg');

        // Retirer la bordure d'erreur pour le select
        $('select').removeClass('error')
    });

    // Retirer le bordure d'erreur pour le textarea
    $('textarea').focus(function(){
        $('textarea').removeClass('error')
    })

    

    // Validation du formulaire
    $('form').submit(function(evt){
        evt.preventDefault();

        // Variable Globale pour le submit
        var userSelect = $('#userSelect')
        var userMessage = $('#userMessage')
        var formScore = 0;

        if(userSelect.val() == 'chat_0'){
            userSelect.addClass('error')
        }else{
            formScore++
        }
        if(userMessage.val().length < 15){
            userMessage.addClass('error');
        }else{
            formScore++
        }

        if(formScore == 2){
            $('section:nth-child(3)').html('<p>Merci pour votre adoption, prenez soin de lui, à bientôt.</p>');
        }
        


    }); //fin fonction submit form


}); //Fin de Chargement du DOM