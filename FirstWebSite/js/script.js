$(document).ready(function () {



    //fonction pour l'animation de la skill bar
    function mySkills(paramEq, paramWidth){

        $('section > div > p').eq(paramEq).animate({
            width: paramWidth
        });

    };

    //Ouverture du burger menu
    $('header > a').click(function(evt){
        evt.preventDefault();
        $('nav').slideToggle().toggleClass('hidden');
    });


    // Burger menu : navigation
    $(' nav a').click(function(evt){
        evt.preventDefault();

        // Masquer le main
        $('main').fadeOut();

        var viewToLoad = $(this).attr('href');

        // fermer le burger menu
        $(' nav').slideUp(function(){
            // Charger la bonne vue puis afficher dans le main
            $('main').load('views/' + viewToLoad, function(){
                $('main').fadeIn();
                if(viewToLoad == 'skills.html'){
                    mySkills(0, '90%');
                    mySkills(1, '90%');
                    mySkills(2, '80%');
                    mySkills(3, '70%'); 
                    mySkills(4, '85%'); 
                    mySkills(5, '50%'); 
                }else if(viewToLoad == 'code.html'){
                    // changer image de code
                    $('main li a').click(function(evt){
                        evt.preventDefault();
                        $('main img').attr('src', $(this).attr('href')).effect("slide", "slow");
                        if($(this).attr('href') == 'img/html.png'){
                            $('main p').text('Voici une partie du code de la page index du site.');
                        }else if($(this).attr('href') == 'img/css.png'){
                            $('main p').text('Voici une partie du code CSS du site.');
                        }else{
                            $('main p').text('Voici une partie du code JavaScript/JQuery du site.')
                        };
                    });
                };
            });

        });



    });







});