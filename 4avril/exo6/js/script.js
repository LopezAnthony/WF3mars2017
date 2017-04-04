$(document).ready(function () {
    // Burger homePage
        // Burger menu : ouverture
        $('.homePage header>a').click(function(evt){
            evt.preventDefault();
            $('.homePage nav').slideToggle();
        });

        // Burger menu : navigation
        $('.homePage nav a').click(function(evt){
            evt.preventDefault();

            var linkToOpen = $(this).attr('href');

            // fermer le burger menu
            $('.homePage nav').slideUp(function(){
                // Changer de page
                window.location = linkToOpen;
            });
        });
    
    // Burger About
        $('.aboutPage h1 + a').click(function(evt){
            evt.preventDefault();
            $('.aboutPage nav').animate({
                left: '0'
            });
        });

        // Burger menu : navigation
        $('.aboutPage nav a').click(function(evt){
            evt.preventDefault();

            var linkToOpen = $(this).attr('href');

            // fermer le burger menu
            $('.aboutPage nav').animate({
                left:'-100%'
            }, function(){
                window.location = linkToOpen;
            });
        });









});