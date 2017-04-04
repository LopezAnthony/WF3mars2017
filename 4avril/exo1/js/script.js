$(document).ready(function(){


    // Fonction animate
        $('section:first button').click(function(){

            // Changer la hauteur et la largeur de l'article 
            $('section:first article').animate({
                height: '30rem',
                width: '30rem'

            });

        }); //fin du click sur le premier bouton

    // Fonction animate valeur dynamiques
        $('section:nth-child(2) button').click(function(){

            $('section:nth-child(2) article').animate({

                left: '+=5rem',
                top: '-=1rem',

            });

        }); //Fin du click

    // Fonction animate() : toggle/show/hide

        $('section:nth-child(3) button').click(function(){

            $('section:nth-child(3) article').animate({

                width:'toggle'

            });

        }); //Fin du click

    //  Fonction animate() avec callBack
        $('section:last button').click(function(){

            $('section:last article').animate({
                width: '20rem',
                height: '20rem'
            }, 1000, function(){

                // supprimer la balise
                $(this).hide()
            });            

        });




}); //Fin de chargement du DOM