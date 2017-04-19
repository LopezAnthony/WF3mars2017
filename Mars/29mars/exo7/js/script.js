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
    var userWin = 0;
    var computerWin = 0;
    

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

        var computerMemory = ['pierre', 'feuille', 'ciseaux'];

        // Choisir aléatoirement l'un des 3 index du tableau
        var computerBet = computerMemory[Math.floor(Math.random() * computerMemory.length)];


        // Vérifier que userBet est vide
        if( userBet == '' ){
            document.querySelector('h2').innerHTML = 'Choisi ton arme'
        }else{

            // Afficher les deux choix dans la balise H2
            document.querySelector('h2').textContent = userBet + ' Vs. ' + computerBet + ':' ;
            document.querySelector('h2').style.background = 'lightgrey';
            document.querySelector('p').style.fontSize = '5rem';

            //  Comparer les variables 
            if( userBet == computerBet ){
                document.querySelector('p').textContent = 'Draw';                

            } else if( userBet == 'pierre' && computerBet == 'ciseaux'){
                document.querySelector('p').textContent = 'Win';

                // Incrémenter la variable userWin de 1;
                userWin++;

            } else if( userBet == 'feuille' && computerBet == 'pierre'){
                document.querySelector('p').textContent = 'Win';

                // Incrémenter la variable userWin de 1;
                userWin++;

            } else if( userBet == 'ciseaux' && computerBet == 'feuille'){
                document.querySelector('p').textContent = 'Win';

                // Incrémenter la variable userWin de 1;
                userWin++;

            } else{
                document.querySelector('p').textContent = 'Loose...';

                // Incrémenter la variable computerWin de 1;
                computerWin++;
            };            
        }; 

        // Vérifier les valeurs de userWin et computerWin
        if(userWin == 3){
            // Afficher le message dans le body
            document.querySelector('body').innerHTML = '<h1>Vous avez Gagné ! </h1><a href="index.html">Play AGAIN !</a>'
        };
        if(computerWin == 3){
            // Afficher le message dans le body
            document.querySelector('body').innerHTML = '<h1>Vous avez Perdu... </h1><a href="index.html">Try AGAIN !</a>'
        };

    };


    


