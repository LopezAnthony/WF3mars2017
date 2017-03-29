/*
Créer un tableau contenant 4 index
- 1 string
- 1 nummber
- 2 boolean différents
Afficher le tableau dans la console
*/

var myArray = [ 'un string', 26, true, false ];
console.log(myArray);

/*
Ajouter un string dans le tableau
Afficher le tableau dans la console
*/

myArray.push('nouveau');
console.log(myArray);

/*
Afficher dans la console la taille du tableau
Afficher le premier et le dernier index du tableau dans la console
*/
console.log(myArray.length, myArray[0], myArray[4]);

/*
Créer un objet contenant 3 propriétés
- le tableau
- 1 prénom
- 1 âge
Afficher l'objet dans la console
*/

var myObject = {
    array : myArray,
    name : 'Anthony',
    age : 26
};

console.log(myObject);

/*
Afficher toutes les propriétés de l'objet dans la console
*/

console.log(myObject.array, myObject.name, myObject.age);

/*
Modifier la propriété age de l'objet 
Afficher l'objet dans la console
*/

myObject.age = 1991;
console.log(myObject);
