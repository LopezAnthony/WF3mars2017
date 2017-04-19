$(document).ready(function () {

    // Capter la soumission du formulaire
    $('form').submit(function(evt){
        evt.preventDefault();

        var userName = $('[placeholder="Your name*"]');
        var userMail = $('[placeholder="Your email*"]');
        var userSubject = $('select');
        var userMessage =$('textarea');
        var formScore = 0;

        // Vérifier que l'utilisateur a bien saisi son nom
        if(userName.val().length == 0){
            userName.addClass('error');
        }else{
            formScore++
        };

        if(userMail.val().length < 4){
            userMail.addClass('error');
        }else{
            formScore++
        };

        if(userSubject.val() == 'null'){
            userSubject.addClass('error');
        }else{
            formScore++
        };

        if(userMessage.val().length < 5){
            userMessage.addClass('error');
        }else{
            formScore++
        };


        // Validation Finale du formulaire
        if(formScore == 4){

            // Attente réponse PHP
            // PHP répond true

            // => Afficher les données du formulaire dans une modal
            $('div span').text(userName.val());
            $('div b').text(userSubject.val());
            $('div p:last').text(userMessage.val());

            // Afficher la modal
            $('div').fadeIn();


            $('form')[0].reset();
        }

    });

    // Supprimmer les class error
    $('input, select, textarea').focus(function(){
        $(this).removeClass('error');
    });

    $('.fa-times').click(function(){
        $('div').fadeOut();
    });

});