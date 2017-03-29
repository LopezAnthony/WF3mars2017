//   Demander à l'utilisateur de choisir une couleur entre rouge, vert bleu
var userChoice = prompt('Choisir une couleur entre rouge, vert ou bleu');

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