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
        $('input:not([type="submit"]), textarea').focus(function(){
            $(this).prev().addClass('openedLabel hideError');
        });

        $('select').focus(function(){
            $(this).prev().addClass('hideError');
        });
        
        $('[type="checkbox"]').focus(function(){

            if($(this)[0].checked == false){
                $('form p').addClass('hideError');
            }
        });

            // Capter le blur sur les inputs et le textarea
        $('input, textarea').blur(function(){

            // Vérifier si il n'y a pas de caractères dans le input
            if($(this).val().length == 0){
                // Sélectionner la balise précédente pour supprimer la class openedlabel
                $(this).prev().removeClass();
            };
        });

        // Refermer la modal
        $('.fa').click(function(){

            $('#modal').fadeOut();

        });

        // Capter la soumission du formulaire
        $('form').submit(function(evt){
            evt.preventDefault();

            // Définir les variables globales du formulaire
            var userName = $('#userName');
            var userEmail = $('#userEmail');
            var userSubject = $('#userSubject');
            var userMessage = $('#userMessage');
            var checkbox = $('[type="checkbox"]');
            var formScore = 0;

            // Vérifier que userName à au minimum 2 caractères
            if( userName.val().length < 2){
                userName.prev().children('b').text('Min. 2 Caractères')
            }else{
                console.log('userName ok ')
                formScore++
            };

            // Vérifier que userEmail à au minimum 5 caractères
            if( userEmail.val().length < 5){
                userEmail.prev().children('b').text('Min. 5 Caractères')
            }else{
                console.log('email Ok')
                formScore++
            };

            // Vérifier que userSubject à une option de selectionné
            if( userSubject.val() == 'null' ){
                userSubject.prev().children('b').text('Veuillez sélectionner un sujet')
            }else{
                console.log('subject ok')
                formScore++
            };

            // Vérifier que userMessage à au moins 5 caractères
            if( userMessage.val().length < 5){
                userMessage.prev().children('b').text('Min. 5 Caractères')
            }else{
                console.log('email Ok')
                formScore++
            };

            // Vérifier que la checkbox est cochée
            if( checkbox[0].checked == false){
                console.log('cg required')
                $('form p b').text('vous devez accepter les conditions générales')
            }else{
                console.log('cg OK')
                formScore++
            };

            // Validation finale du formulaire
            if(formScore == 5){
                console.log('form ok ')

                // Envoi des données dans le fichier de traitement PHP
                // PHP répond true => continuer le traitement du formulaire
                    
                    // Ajouter la valeur de userName dans la balise h2 span de la modale
                    $('#modal span').text( userName.val() );

                    // Afficher la modal
                    $('#modal').fadeIn();


                    // Vider les champs
                    $('form')[0].reset();

                    // Supprimer les messages d'erreur
                    $('form b').text('');

                    // Replacer les labels 
                    $('label').removeClass();

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

                            // Fonction gestion formulairee
                            contactFrom();
                        };

                    });
                });
            });
        });

        






}); // Fin chargement du DOM