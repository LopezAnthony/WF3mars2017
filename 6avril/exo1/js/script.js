$(document).ready(function () {

    // Créer une fonction pour l'animation des compétences
    function mySkills(paramEq, paramWidth){

        $('h3 + ul').children('li').eq(paramEq).find('p').animate({
            width: paramWidth
        });

    };

    function openModal(){
        // Ouvrir la modal sur les boutons
        $('figcaption > button').click(function(){

            console.log($(this).prev().text());
            $('#modal').fadeIn();
        });
        // Fermer la modal au click sur fa.times
        $('.fa-times').click(function(){
        $('#modal').fadeOut();
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
                        
                        if(viewToLoad == 'portfolio.html'){
                                openModal();

                        };

                    });
                });
            });
        });






}); // Fin chargement du DOM