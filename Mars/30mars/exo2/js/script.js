/* 

    Ajouter une balise HTML dans le DOM
    - Sélectionner le document 
    - Appliquer la fonction write
    - Ajouter le contenu

*/

document.write('<p>Je suis généré en JavaScript</p>');

var myArray = ['John', 'Ringo', 'Paul', 'Anthony'];
console.log(myArray);

for (var i = 0; i < myArray.length; i++) {
    document.write('<p>Salut ' + myArray[i] + '</p>');
}