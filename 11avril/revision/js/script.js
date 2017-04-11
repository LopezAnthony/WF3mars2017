$(document).ready(function () {

    // Définir une variable
    var boxChecked;
    var imgSelected = false;

    // UI checkbox
        $('[type="checkbox"]').click(function(){

            // Définir la valeur de boxChecked 
            boxChecked = $(this).val();
            
            var checkboxArray = $('[type="checkbox"]').not($(this));
            var checked = $('[type="checkbox"]').val();
            for (var i = 0; i < checkboxArray.length; i++) {

                // Unchecked les checkbox
                checkboxArray[i].checked = false
            };

            if($(this).val() =='first'){
                $('img').attr('src', 'img/first.jpg')
            }else if( $(this).val() == 'second'){                
                $('img').attr('src', 'img/second.jpg')
            }else if( $(this).val() == 'third'){
                $('img').attr('src', 'img/third.jpg')
            }else{
                $('img').attr('src', 'img/fourth.jpg')
            }

        });



    // Form Submit
        $('form').submit(function(evt){
            evt.preventDefault();
            
            /*
            Vérifier quelle checkbox est cochée
            afficher une modal avec l'image sélectionnée
            Réinitialiser le formulaire
            */

            console.log(boxChecked)
            if(boxChecked == undefined){
                console.log('Vous devez choisir une image');
            }else{
                
                // Afficher la modal
                $('#modal').fadeIn();
            }


            $('form')[0].reset();

        });



}); // Fin de chargement du DOM