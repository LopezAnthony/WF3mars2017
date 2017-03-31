$(document).ready(function(){

    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        // Définir une variable pour le score du formulaire
        var formScore = 0;

        // Bloquer le comportement naturel du formulaire
        evt.preventDefault();


        // Connaitre la valeur saisie par l'utilisateur dans le input 
        var userName = $('input').val();
        // Connaitre le nombre de caractères dans la valeur
        console.log( userName.length);

        // Connaitre la valeur saisie par l'utilisateur dans le textarea 
        var userMessage = $('textarea').val();
        // Connaitre le nombre de caractères dans la valeur
        console.log( userMessage.length);

        // Vérifier la taille de userName (min. 1 caractères)
        if (userName.length == 0) {
            // Afficher un message dans le label
            $('[for="userName"] b').text('Champ Obligatoire');
        } else{
            console.log('useName ok');

            // Incrémenter formScore
            formScore++;
        };

        // Vérifier la taille de userMessage (min. 5 caractères)
        if (userMessage.length < 4) {
            $('[for="userMessage"] b').text('min. 5 caractères');
        } else{
            console.log('ok');

            // Incrémenter formScore
            formScore++;
        };


        // Vérifier la valeurde formScore pour valider le formulaire
        if(formScore == 2){
            console.log('Le formulaire est validé');

            //  => Envoyer les données dans le fichier PHP et attendre la réponse du PHP (true/false)
            // Le PHP répond true !

            $('section:last').append('<article><h4>' + userMessage + '</h4><p>' + userName + '</p></article>');

            // Vider les champs du formulaire
            $('input:not([type="submit"]').val('');
            $('textarea').val('');
           
        };


        // pour supprimer les messages d'erreurs
        $('input, textarea').focus(function(){
            $(this).prev().children('b').text('');
        });

    });





}); //Fin de chargement du DOM