// Attendre le chargement du DOM
$(document).ready(function(){

    // Code à exécuter sur la page une fois chargé

    /*
    deathSelector
    */

    var deathSelector = $('h3').prev().parent().parent().next().parent().find('main').children('article').find('h3');
    console.log('Balise sélectionnée :', deathSelector);

    /*
    Les Sélecteurs jQuery "classiques"
    */

        // Sélectionner une balise par son nom (tag)
        var myHtmlTag = $('header');
        console.log(myHtmlTag);

        // Sélectionner une balise par sa class
        var myClass = $('.myClass');
        console.log(myClass);

        // Sélectionner une balise par son Id
        var myId = $('#myId');
        console.log(myId);

        //  Sélecteur imbriqué
        var myItalic = $('h2 i');
        console.log( myItalic );

        // Sélecteur CSS3
        var myFooter = $('body > main + footer');
        console.log(myFooter);

    /*
    Les Sélecteurs jQuery spécifiques
    */

        // Sélecteur d'enfants
        var myChildren = $('header').children('button');
        console.log(myChildren);

        // Sélecteur de parents
        var myParent = $('h2').parent();
        console.log(myParent);

        // Trouver une balise
        var myH2 = $('main').find('h2');
        console.log(myH2);

        // Sélectionner le premier
        var myFirstBtn = $('button:first');
        console.log(myFirstBtn);

        // Sélectionner le dernier
        var myLastBtn = $('button:last');
        console.log(myLastBtn);

        // Sélectionnerla nth balise
        var secondLi = $('li').eq(1);
        console.log(secondLi);

        // Sélectionner la balise suivante
        var afterMain = $('main').next();
        console.log(afterMain);

        // Sélectionnerla balise précédente
        var beforeMain = $('main').prev();
        console.log(beforeMain);

}); //Fin de la fonction d'attente du chargement du DOM