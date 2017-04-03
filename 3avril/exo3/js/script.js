$(document).ready(function(){    


    // Vérifier le genre de l'avatar
        var avatarWoman = $('#avatarWoman');
        var avatarMan = $('#avatarMan');
        var avatarGender;


        // => avatarWoman capter le click
            avatarWoman.click(function(){

                // Désactiver avatarMan                
                avatarMan.prop('checked', false);

                // Modifier la valeur de avatarGender
                avatarGender = avatarWoman.val();
            });

        // => avatarMan capter le click
            avatarMan.click(function(){

                // Désactiver avatarWoman                
                avatarWoman.prop('checked', false);

                // Modifier la valeur de avatarGender
                avatarGender = avatarMan.val();

            });

            

    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        // Bloquer le comportement par défaut du formulaire
        evt.preventDefault();

        // Définir une variable pour la validation finale du formulaire
        var formScore = 0;

    // Variable globale
        var avatarName = $('#avatarName').val();
        var avatarAge = $('#avatarAge').val();

        var avatarStyleTop = $('#avatarStyleTop').val();
        var avatarStyleBottom = $('#avatarStyleBottom').val();

    // Vérifier les champs du formulaire

        // => avatarName Minimum 5 caractères
        if (avatarName.length < 5) {
            console.log('Min. 5 caractères');
        } else {
            console.log('avatarName OK');

            // Incrémenter la variable formScore
            formScore++
        };

        //  => avatarAge entre 1 et 100
        if ( avatarAge == 0 || avatarAge > 100 || avatarAge.length == 0 ) {
            console.log('fail')
        } else {
            console.log('avatarAge OK');

            // Incrémenter la variable formScore
            formScore++;
        };

        //  => avatarStyleTop obligatoire
        if(avatarStyleTop == 'null'){
            console.log('Vous de vez choisir un avatarStyleTop')
        }else{
            console.log('avatarStyleTop OK');

            // Incrémenter la variable formScore
            formScore++;
        };

        //  => avatarStyleBottom obligatoire
        if(avatarStyleBottom == 'null'){
            console.log('Vous de vez choisir un avatarStyleBottom')
        }else{
            console.log('avatarStyleBottom OK');

            // Incrémenter la variable formScore
            formScore++;
        };

        // => avatarGender vérifier la valeur
        if( avatarGender == undefined ){
            console.log('Vous devez choisir un genre')
        }else{
            console.log('avatarGender OK');

            // Incrémenter la variable formScore
            formScore++;
        };

        // => Vérifier la valeur de formScore
        if ( formScore == 5) {
            console.log('formScore OK');
        }else{
            console.log('formScore not OK!');
        };


    }); // Fin du form submit  


}); //Fin chargement du DOM