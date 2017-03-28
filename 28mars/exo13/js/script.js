//  Créer un type d'objet pour en faire des déclinaisons
function CarType(paramDoors, paramColor, paramBrand, paramGear){
    //  des portes, un couleur, marque, boite de vitesse
    this.doors = paramDoors;
    this.color = paramColor;
    this.brand = paramBrand;
    this.gear = paramGear;

};

//  Ajouter une fonction au type d'objet CarType
CarType.prototype.welcome = function(){

    console.log('Bonjour, je suis une ' + this.brand + ', je possède '+ this.doors + ' portes et ' + this.gear + ' vitesse et je suis de couleur ' + this.color);

};

// Créer une déclinaison de CarType
var fiat = new CarType(3, 'rouge', 'Fiat', 4);
console.log(fiat);

// Appeler la fonction
fiat.welcome();

var hummer = new CarType(5, 'Noir', 'Hummer', 8);
console.log(hummer);

// Appeler la fonction
hummer.welcome();