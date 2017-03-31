$(document).ready(function(){

    // Manipuler le contenu texte du footer
    console.log($('footer').text());
    $('footer').text('sous la licence MIT');

    // Manipuler le contenu html du footer
    console.log($('footer').html());
    $('footer').html('sous la licence <b>MIT</b>');
  


    // Créer un objet pour la page d'accueil

    
    var homeContent = {
        title: 'Bienvenue sur mon site',
        content: 'Je suis le texte de la page <b>Accueil</b>'
    };

    // Créer un objet pour la page portfolio
    var portfolioContent = {
        title: 'Bienvenue sur mon portfolio',
        content: 'Je suis le texte de la page <b>portfolio</b>'
    };

    // Créer un objet pour la page Contact
    var contactContent = {
        title: 'Bienvenue sur la page contact',
        content: 'Je suis le texte de la page <b>Contacts</b>'
    };

    // Créer une fonction pour gérer le menu
    function showMyContent(){
        // Capter le click sur la première licence
        $('li').click( function(){

            // Récupérer la valeur de l'attribut data
            var dataValue = ( $(this).attr('data') );

            // Modifier le contenu de la balise h2
            $('h2').text(homeContent.title);
            // Modifier le contenu de la balise p
            $('p').html(homeContent.content);

        } );

    }
    
    showMyContent();

});  // Fin de la fonction de chargement du DOM