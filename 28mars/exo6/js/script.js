/*

Programme pour saluer un utilisateur et afficher son année de naissance
    - Demander le prénom et le nom de l'utilisateur 
    - Saluer en disant : Bonjour prénom nom 
    - Demander l'âge de l'utilisateur 
    - Afficher l'année de naissance

*/

//  Demander le prénom et le nom de l'utilisateur
var userFirstName = prompt('Quel est ton prénom?');
var userLastName = prompt('Quel est ton nom?');

//  Saluer en disant : Bonjour prénom nom
console.log('Bonjour '+ userFirstName + ' ' + userLastName);

//  Demander l'âge de l'utilisateur 
var userAge = prompt('Quel est ton âge ?');
console.log(userAge);

//  Transformer un variable de type STRING en type NUMBER
var userAgeNumber = parseInt(userAge);
console.log(userAgeNumber);

var currentYear = 2017;
//  Afficher l'année de naissance (année - âge)
console.log('Ton année de naissance est ' + (currentYear - userAge));

