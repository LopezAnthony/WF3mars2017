$(document).ready(function () {

    $('form').submit(function(evt){
        evt.preventDefault()

        // variable globale
        var userName = $('[type="text"]').val();
        var userSelect = $('select').val();
        var userPhone = $('[type="tel"]').val();
        var userMessage = $('textarea').val();
        var formScore = 0;

            // Condistion du formulaire
                if(userName.length < 3){
                    console.log('min.3 Caractères')
                }else{
                    console.log('userName OK')
                    formScore++
                };
                if(userSelect == 'null'){
                    console.log('veuillez sélectionner un champ')
                }else{
                    console.log('userSelect OK')
                    formScore++
                };
                if(userPhone.length < 9){
                    console.log('Veuillez rentrez un numéro valide de 10 chiffres')
                }else{
                    console.log('userPhone OK')
                    formScore++
                };
                if(userMessage.length < 5){
                    console.log('Min. 5 caractères')
                }else{
                    console.log('userMessage OK')
                    formScore++
                };

            // Le formulaire est validé
            if(formScore == 4){
                console.log('formulaire Rempli');

                $('#modal').removeClass('hidden');
                $('h3 span').text(userName);
                $('h3 .fa').click(function(){
                    $('#modal').addClass('hidden');
                });

                $('form')[0].reset();
            }else{
                $('form + p').text('* Veuillez remplir tous les champs')
            }
            
    });

});