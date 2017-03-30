// Sélectionner la balise dans laquelle ajouter une autre balise
var myMain = document.querySelector('main');

// Créer un tableau contenant 4 titres
var myArray = [ 'home', 'about', 'portfolio', 'contacts'];

// Faire boucle sur le tableau
for (var i = 0; i < myArray.length; i++) {     
    // Créer une variable pour géniérer une balise HTML
    var myNewTag = document.createElement('h2');

    // Ajouter du contenu dans la balise générée 
    myNewTag.innerHTML =  myArray[i];

    // Ajouter un enfant dans myMain
    myMain.appendChild(myNewTag);

}

