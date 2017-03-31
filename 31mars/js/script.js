$(document).ready(function(){

    // Créer une variable pour le titre principal du site 
    var siteTitle = 'Anthony Lopez <span>Etudiant dev FrontEnd</span>';

    // Créer un tableau pour la nav
    var myNav = ['Accueil', 'Portfolio', 'Contacts'];

    // Créer un objet pour les titres des pages
    var myTitles = {
        Accueil : 'Bienvenue sur la page d\'accueil',
        Portfolio : 'Découvrez mes travaux',
        Contacts : 'Contactez-moi pour plus d\'informations'
    };

    // Créer un objet pour le contenu des pages
    var myContent = {
        Accueil: '<h3> Contenu de la page Accueil </h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis facilis, sunt commodi! Aliquid eos quaerat qui assumenda, dolorum reiciendis nihil eaque vitae id quia delectus tempora nisi harum facilis saepe?</p>',
        Portfolio: '<h3> Contenu de la page Portfolio </h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis facilis, sunt commodi! Aliquid eos quaerat qui assumenda, dolorum reiciendis nihil eaque vitae id quia delectus tempora nisi harum facilis saepe?</p>',
        Contacts: '<h3> Contenu de la page Contacts </h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis facilis, sunt commodi! Aliquid eos quaerat qui assumenda, dolorum reiciendis nihil eaque vitae id quia delectus tempora nisi harum facilis saepe?</p>'
    }

    // Sélectionner le header et le mettre dans une variable
    var myHeader = $('header');

    // Générer une balise H dans le header avec le contenu de la varible siteTitle
    myHeader.append('<h1>'+ siteTitle + '</h1>');

    // Générer une balise nav + ul dans le header
    myHeader.append('<nav><i class="fa fa-bars" aria-hidden="true"></i><ul></ul></nav>');


    // Faire une boucle for({....})sur myNav pour générer les liens de la nav
    for (var i = 0; i < myNav.length; i++) {
        // Générer les balises html
        $('ul').append('<li><a href="' + myNav[i] + '">' + myNav[i] + '</a></li>');        
    };

    // Afficher dans le main le titre issu de l'objet myTitles
    var myMain = $('main');
    myMain.append('<h2>' + myTitles.Accueil + '</h2>');
    myMain.append( '<section>' + myContent.Accueil + '</section>' )

    // Capter l'événement click sur les balises a en bloquant le comportement naturel des balises a
    $('a').click( function(evt){
        // Bloquer le comportement naturel de la balise
        evt.preventDefault();

        // Connaitre l'occurence de la balise a sur laquelle l'utilisateur a cliqué
        // console.log($(this));

        // Récupérer la valeur de l'attribut href
        // console.log($(this).attr('href'));

        if ($(this).attr('href') == 'Accueil') {
            $('h2').text(myTitles.Accueil);
            $('section').html(myContent.Accueil);

        } else if( $(this).attr('href') == 'Portfolio' ){
            $('h2').text(myTitles.Portfolio);
            $('section').html(myContent.Portfolio);

        } else{
            $('h2').text(myTitles.Contacts);
            $('section').html(myContent.Contacts);
        };
    });

    
    $('i').click(function(){
        $('ul').css({'display': 'block'})
    });


    









}); // fin du chargement du DOM