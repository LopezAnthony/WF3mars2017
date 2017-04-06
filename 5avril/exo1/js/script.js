$(document).ready(function () {

    $('button:first').click(function(){
        $('section:first').load('views/about.html', function(){
            // Fonction de callBack de la fonction load()
            // Animer la première section
            $('section:first').fadeIn();
        });
    });

    $('button').eq(1).click(function(){

        // Charger dans la deuxième section le contenu de l'id portfolio de views/content.html
        $('section').eq(1).load('views/content.html #portfolio');
    });

    $('button').eq(2).click(function(){

        // Charger dans la deuxième section le contenu de l'id contacts de views/content.html
        $('section').eq(2).load('views/content.html #contacts', function(){
            submitForm();
        });
    });

    // Créer une fonction pour capter la soumission du formulaire
    function submitForm(){


        // Capter la soumission du formulaire
        $('form').submit(function(evt){
            evt.preventDefault();
            var formScore = 0;
            // Minimum 4 caractères pour l'email et 5 caractères pour le message
            if ($('[type="email"]').val().length < 4) {
                console.log('Email manquant');
            } else {
                console.log('Email OK');
                formScore++
            };

            if ($('textarea').val().length < 5) {
                console.log('Min 5 caractères')
            } else{
                console.log('Message ok')
                formScore++
            };

            if(formScore == 2){
                // Envoi des données vers le fichier de traitement PHP
                // Le fichier PHP répond true : je peux continuer mon code

                // Ajouter le message dans la balise aside
                $('aside').append('<h3>'+ $('textarea').val() + '</h3><p>' + $('[type="email"]').val() + '</p>');

                // Reset du formulaire
                $('form')[0].reset();
            }else{
                console.log('not ok')
            }

        });

    };

    



}); //Fin chargement DOM