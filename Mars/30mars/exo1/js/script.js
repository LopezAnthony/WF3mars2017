/*

    - Créer un tableau contenant 4 prénoms dont le votre
    - Faire une boucle sur le tableau pour saluer dans la console chacun des prénoms

    -Afficher un message spécial pour votre prénom  (ex: Salut c'est moi ! )

*/

var myArray = ['John', 'Ringo', 'Paul', 'Anthony'];
console.log(myArray);

for (var i = 0; i < myArray.length; i++) {
   if(myArray[i] == 'Anthony'){
       console.log('Salut c\'est moi');


        //  Modifier une balise HTML
        document.querySelector('p').textContent = 'Salut c\'est moi !';

   
    } else{
       console.log('Hello ' + myArray[i]); 
    }

};
