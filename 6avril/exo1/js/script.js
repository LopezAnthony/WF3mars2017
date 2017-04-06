$(document).ready(function () {

    // Créer une fonction pour l'animation des compétences
    function mySkills(paramEq, paramWidth){

        $('h3 + ul').children('li').eq(paramEq).find('p').animate({
            width: paramWidth
        });

    };

    // Créer une fonction pour l'ouverture de la modal
    function openModal(){
        // Ouvrir la modal sur les boutons
        $('figcaption > button').click(function(){

            // Afficher le titre du projet
            var modalTitle = $(this).prev().text();
            $('#modal span').text(modalTitle);

            // Afficher l'image du projet
            var modalImage = $(this).parent().prev().attr('src');
            $('#modal img').attr('src', modalImage).attr('alt', modalTitle);

            // Afficher la modal
            $('#modal').fadeIn();
        });
        // Fermer la modal au click sur fa.times
        $('.fa-times').click(function(){
        $('#modal').fadeOut();
        });
    };

    // Créer une fonction pour la gestion du formulaire
    function contactFrom(){
        console.log('je suis sur la page Contacts')

        // Capter le focus sur les inputs et le textarea
        $('input, textarea').focus(function(){
            $(this).prev().addClass('openedLabel');
        });

            // Capter le blur sur les inputs et le textarea
        $('input, textarea').blur(function(){

            // Vérifier si il n'y a pas de caractères dans le input
            if($(this).val().length == 0){
                // Sélectionner la balise précédente pour supprimer la class openedlabel
                $(this).prev().removeClass();
            };
        });


    };


    // Burger index
        // Burger menu : ouverture
        $(' header>a').click(function(evt){
            evt.preventDefault();
            $(' nav').slideToggle();
        });

        // Burger menu : navigation
        $(' nav a').click(function(evt){
            evt.preventDefault();

            // Masquer le main
            $('main').fadeOut();

            // Créer une variable pour récupérer la valeur de l'attribut href
        var viewToLoad = $(this).attr('href');

            // fermer le burger menu
            $(' nav').slideUp(function(){
                // Charger la bonne vue puis afficher le main (callBack)
                $('main').load('views/' + viewToLoad, function(){
                    $('main').fadeIn(function(){
                        // Vérifier si l'utilisateur veux voir la page about.html
                        if(viewToLoad == 'about.html'){
                            // Appeler le fonction mySkills
                            mySkills(0, '80%');
                            mySkills(1, '70%');
                            mySkills(2, '60%'); 
                        };
                        
                        // Vérifier si l'utilisateur veux voir la page portfolio.html
                        if(viewToLoad == 'portfolio.html'){
                                openModal();

                        };

                        // Vérifier si l'utilisateur veux voir la page contacts.html
                        if(viewToLoad == 'contacts.html'){
                            contactFrom();
                        };

                    });
                });
            });
        });

        






}); // Fin chargement du DOM