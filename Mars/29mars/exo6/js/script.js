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

    // Utilisation du switch
    switch (paramColor) {

        //  1er cas: paramColor est égale à 'rouge'
        case 'rouge' : console.log('Rouge = Red');            
            break;
        // 2ème cas : paramColor est égale à 'vert'
        case 'vert' : console.log('vert = green');            
            break;
        // 3ème cas : paramColor est égale à 'bleu'
        case 'bleu' : console.log('bleu = blue');            
            break;
        // pour tous les autres cas : default est OBLIGATOIRE
        default: console.log('Je ne connais pas cette couleur ...')
            break;
    }

};
