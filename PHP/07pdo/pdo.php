<?php
// ---------------------------------------
echo '<h1> Introduction aux objets </h1>';
// ---------------------------------------
    //L'extension PHP Data Objects (PDO) définit une intergace pour accéder à une base de donnée depuis PHP.

// ---------------------------------------
echo '<h2> 01. Connexion </h2>';
// ---------------------------------------
    $pdo = new PDO('mysql:host=localhost; dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    //$pdo est un objet issu de la classe prédéfinie PDO : il représente la connexion à la BDD.
    /*
        Les arguments passés à PDO:
            -Driver + serveur + nom de la base de données
            -pseudo du SGBD
            - mdp du SGBD
            - options:
                °option 1 = pour générer l'affichage des erreurs, 
                °option 2 = commande à exécuter lors de la connexion au serveur qui définit le jeu de caracttères des échanges avec la BDD.
    */

    print_r($pdo);
    echo '<pre>';print_r(get_class_methods($pdo)); echo '</pre>'; //permet d'afficher les méthodes disponibles dans l'objet $pdo.

// ---------------------------------------
echo '<h2> 02. exec() avec INSERT, UPDATE et DELETE </h2>';
// ---------------------------------------

    // $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES('Jean', 'Tartempion', 'm', 'informatique', '2017-04-25', 300)");
        /*
            exec() est utilisé pour formuler des requêtes ne retournant pas des jeu de résultats : INSERT, UPDATE et DELETE.

            Valeur de retourn :
                -Succès : un integer correspondant au nombre de lignes affectées.
                -Echec : false
        */

    // echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";
    echo 'Dernier id généré : ' . $pdo->lastInsertId() . '<br>';

    //UPDATE
    $resultat = $pdo->exec("UPDATE employes SET salaire= 6000 WHERE id_employes = 991");
    echo"Nombre d'enregirstrements affectés par l'UPDATE : $resultat <br>";

// ---------------------------------------
echo '<h2> 03. query() avec SELECT + fetch </h2>';
// ---------------------------------------

    //query()

        $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
        //avec query : $result est un objet issu de la classe prédéfinie PDOStatement

        /*
            Au contraire d'exec(), query() est utilisé pour la formulation de requêtes retournant un ou plusieurs résultats : SELECT.
            Valeur de retour:
                -Succès : objet PDOStatement
                -Echec: false

            Notez qu'avec query, on peut aussi utiliser INSERT, DELETE et UPDATE.
        */

        echo '<pre>';  print_r($result); echo'</pre>';
        echo '<pre>';  print_r(get_class_methods($result)); echo'</pre>'; //on voit les nouvelles methodes de la classe PDOStatement
        //$result constitue le résultat de la requête sous forme inexploitable directement: il faut donc le transformer par la méthode fetch()

    //fetch() :

        $employe = $result->fetch(PDO::FETCH_ASSOC); //La méthode fetch() avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet $result en un ARRAY associatif exploitable indexé avec le nom des champs de la requête.

        echo '<pre>';  print_r($employe); echo'</pre>';
        echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service] <br> ";

        //Ou encore faire un fetch selon l'une des méthodes suivantes :
            //FETCH_NUM
                $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
                $employe = $result->fetch(PDO::FETCH_NUM); //pour obtenir un array indexé numériquement
                echo '<pre>';  print_r($employe); echo'</pre>';
                echo $employe[1]; //on accède au prénom par l'indice 1 de l'array $employe.

            //FETCH
                $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
                $employe = $result->fetch(); //pour un mélange de fetch_assoc et fetch_num.
                echo '<pre>';  print_r($employe); echo'</pre>';

            //FETCH_OBJ
                $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
                $employe = $result->fetch(PDO::FETCH_OBJ); //retourne un nouvel objet avec les noms de champs comme propriété (=attribut) public.
                echo '<pre>';  print_r($employe); echo'</pre>';
                echo $employe->prenom; //affiche la valeur de la propriété prenom de l'objet $employe.

            //Attention : il faut choisir l'un des fetch que vous voulez exécuter sur un jeu de résultat, vous ne pouvez pas faire plusieurs fetch sur le même résultat n'en contenant qu'une seule ligne. En effet, cette méthode déplace un curseur de lecture sur le résultat suivant contenu dans le jeu de résultat: ainsi, quand il n'y en a qu'un seul, on sort du jeu.

    //Exercice : affiche le service de l'employé Laura selon 2 méthodes différentes de votre choix.
        $result = $pdo->query("SELECT service FROM employes WHERE prenom = 'Laura'");
        $employe = $result->fetch(PDO::FETCH_NUM);
        echo '<pre>';  print_r($employe); echo'</pre>';
        echo $employe[0];


        $result = $pdo->query("SELECT service FROM employes WHERE prenom = 'Laura'");
        $employe = $result->fetch(PDO::FETCH_OBJ);
        echo '<pre>';  print_r($employe); echo'</pre>';
        echo $employe->service;



?>