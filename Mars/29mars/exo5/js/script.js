/*
Créer une Fonction qui permet à l'utilisateur de choisir une couleur
*/

var userChoice = '';
console.log( userChoice );

function chooseColor() {

    //  Demander à l'utilisateur de choisir une couleur
    var userPrompt = prompt('Choisi une couleur ente rouge, vert et bleu');

    //  Assigner la valeur de userPrompt à userChoice
    userChoice = userPrompt;

    //  Appeler la fonction de traduction
    translateColor(userChoice);
    
}


function translateColor(paramColor){
    //  Si userChoice est égale à 'rouge'
    if (userChoice == 'rouge') {

        console.log('Rouge ce dit Red en anglais')

    } else if (userChoice == 'vert') {

        console.log('Vert ce dit Green en anglais')

    } else if (userChoice == 'bleu') {

        console.log('Bleu ce dit Blue en anglais')

    }else { // Dans tous les autres cas
        console.log('Je ne connais pas cette couleur ...')
    }

};
