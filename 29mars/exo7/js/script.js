/*

    Le Janken
    - l'utilisateur choisi entre pierre/feuille/ciseaux
    - l'ordinateur choisi entre pierre/feuille/ciseaux
    - Nous comparons le choix de l'utilisateur et de l'ordinateur
    - Selon le résultat, l'utilisateur a gagné ou l'ordinateur a gagné
    - Une partie se joue en 3 manches

*/


    //  Variable globale pour le choix de l'utilisateur
    var userBet = '';

    

    /*
    L'utilisateur doit choisir entre pierre/feuille/ciseaux
    - Créer une fonction qui prend en paramètre le choix de l'utilisateur
    - Appeler la fonction au clique sur les buttons du DOM en précisant le paramètrez
    - Afficher le résultat dans la console
    */

    function userChoice(paramChoice) {

        //  Assigner à la variable userBet la valeur de paramChoice
        userBet = paramChoice;

    };

    /*
    L'ordinateur doit choisir entre pierre/feuille/ciseaux
    - Faire une fonction pour déclencher le choix au clique sur un bouton 
    - Créer un tableau contenant 'pierre' / 'feuille' / 'ciseaux'
    - Faire en sorte de choisir aléatoirement l'un des 3 index du tableau
    - Afficher le résultat dans la console
    */

    function computerChoice() {

        //  Afficher dans la console la valeur de userBet
        console.log( 'user : ' + userBet);

        var computerMemory = ['pierre', 'feuille', 'ciseaux'];

        // Choisir aléatoirement l'un des 3 index du tableau
        var computerBet = computerMemory[Math.floor(Math.random() * computerMemory.length)];
        console.log('computer : ' + computerBet);


        // Vérifier que userBet est vide
        if( userBet == '' ){
            document.querySelector('h2').innerHTML = 'Choisi ton arme'
        }else{

            // Afficher les deux choix dans la balise H2
            document.querySelector('h2').textContent = userBet + ' Vs. ' + computerBet;
            document.querySelector('h2').style.background = 'lightgrey';
            document.querySelector('p').style.fontSize = '5rem';

            //  Comparer les variables 
            if( userBet == computerBet ){
                document.querySelector('p').textContent = 'Draw';
            } else if( userBet == 'pierre' && computerBet == 'ciseaux'){
                document.querySelector('p').textContent = 'Win';
            } else if( userBet == 'feuille' && computerBet == 'pierre'){
                document.querySelector('p').textContent = 'Win';
            } else if( userBet == 'ciseaux' && computerBet == 'feuille'){
                document.querySelector('p').textContent = 'Win';
            } else{
                document.querySelector('p').textContent = 'Loose...';
            };            
        };            
    };


    


