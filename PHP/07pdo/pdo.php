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

// ---------------------------------------
echo '<h2> 04. while et fetch </h2>';
// ---------------------------------------

    $resultat = $pdo->query("SELECT * FROM employes");
    echo 'Nombre d\'employés : ' . $resultat->rowCount() . '<br>'; //permet de compter le nombre de lignes retournées par la requête

    while($contenu = $resultat->fetch(PDO::FETCH_ASSOC)){ //fetch retourne la ligne suivante du jeu de résultat en array associatif. La boucle while permet de faire avancer le curseur dans le jeu de résultats, et s'arrête quand il est à la fin des résultats.

        //echo '<pre>';  print_r($contenu); echo'</pre>'; //on voit que $contenu est un array associatif qui contient les données de chaque ligne du jeu de résultats. Le nom des indices correspondent aux noms des champs.

        echo $contenu['id_employes'] . '<br>';
        echo $contenu['prenom'] . '<br>';
        echo $contenu['nom'] . '<br>';
        echo $contenu['sexe'] . '<br>';
        echo $contenu['service'] . '<br>';
        echo $contenu['date_embauche'] . '<br>';
        echo $contenu['salaire'] . '<br>';
        echo '-----------------------<br>';
    }

    //Quand vous faites une requête qui ne sort qu'un seule résultat : pas de boucle while, mais un fetch seul.
    //Quand vous avez plusieurs résultats dans la requête : on fait une boucle while pour parcourir tous les résultats..$_COOKIE

// ---------------------------------------
echo '<h2> 05. fetchALL </h2>';
// ---------------------------------------

    $resultat = $pdo->query("SELECT * FROM employes");
    $donnees = $resultat->fetchALL(PDO::FETCH_ASSOC); //retourne toutes les lignes de résultats dans un tableau multidimensionnel sans faire de boucle: vous avez un array associatif à chaque indice numérique. Marche aussi avec FETCH_NUM.
    // echo '<pre>';  print_r($donnees); echo'</pre>';

        //Pour lire le contenu d'un array multidimensionnel, nous faisons des boucles foreach imbriquées :
        echo '<strong>Double Boucle foreach</strong> <br>';
        foreach ($donnees as $contenu) { //$contenu est un sous array associatif
            foreach($contenu as $indice => $valeur){ //on parcourt donc chaque sous arrayss
                echo $indice . ' correspond à ' . $valeur . '<br>';
            }
            echo'---------------- <br>';
        }

// ---------------------------------------
echo '<h2> 06. Exercice </h2>';
// ---------------------------------------

    //Afficher la liste des bases de données présentent sur votre SGBD dans une liste <ul><li>
    //Pour mémoire, la requête SQL est SHOW DATABASES


        //Solution 1:
            $resultat = $pdo->query("SHOW DATABASES");
            $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
                echo '<ul>';
                    foreach ($donnees as $contenu) { //$contenu est un sous array associatif
                            foreach($contenu as $indice => $valeur){
                                echo '<li>' . $valeur . '</li>';
                            }
                        }
                echo '</ul>';

        echo '<hr>';

        //Solution 2:
            $resultat = $pdo->query("SHOW DATABASES");
                echo '<ul>';
                    while($contenu = $resultat->fetch(PDO::FETCH_ASSOC)){
                        echo '<li>' . $contenu['Database'] . '</li>';
                    }
                echo '</ul>';

// ---------------------------------------
echo '<h2> 07. Table HTML </h2>';
// ---------------------------------------

    $resultat = $pdo->query("SELECT * FROM employes");

    echo '<table border = "1">';
        //Affichage de la ligne d'entêtes :
        echo '<tr>';
            for($i = 0; $i < $resultat->columnCount(); $i++){
                echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo'</pre>'; //pour voir ce que retourne la méthode getColumnMeta() : un array avec notamment l'indice name qui contient le nom du champs.

                $colonne = $resultat->getColumnMeta($i); //colonne est un array.qui contient l'indice name.
                echo '<th>' . $colonne['name'] . '</th>'; //l'indice name contient le nom du champ'
            }
        echo '</tr>';
            //affichage des autres lignes :
            while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
                echo '<tr>';
                    foreach($ligne as $information){
                        echo '<td>' . $information . '</td>';
                    }
                echo '</tr>';
            }
    echo '</table>';

// ---------------------------------------
echo '<h2> 08. Requête préparée : prepare() + bindParam() + execute() </h2>';
// ---------------------------------------

    $nom = 'sennard';

    //Préparation de la requête:
        $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); //on prépare la requête sans l'exécuter, avec un marqueur nominatif écrit :nom .

        //On donne une valeur au marqueur :nom
        $resultat->bindParam(':nom', $nom, PDO::PARAM_STR); //je lie le marqueur :nom à la variable $nom. Si on change le contenu de la variable la valeur du marqueur changera automatiquement si on fait plusieurs execute.

        //On exécute la requête : 
        $resultat -> execute();

        $donnees = $resultat->fetch(PDO::FETCH_ASSOC); //$donnees est un array associatif
        echo implode($donnees, '_'); //implode transforme l'array en string.

    /*
        prepare() renvoie toujours un objet PDOStatement
        execute() renvoie :
            -Succès : un objet PDOStatement
            -Echec : false
        Les requêtes préparées sont à préconiser si vous exécutez plusieurs fois la même requête (par exemple dans une boucle), et ainsi éviter le cycle complet analyse/interprétation/exécution de la requête.

        Par Ailleurs les requêtes préparées sont souvent utilisées pour assainir les données en forçant le type des valeurs communiquées aux marqueurs.
    */

// ---------------------------------------
echo '<h2> 09. Requête préparée : prepare() + bindValue() + execute() </h2>';
// ---------------------------------------

    $nom = 'Thoyer';

    //On prépare la requête :
        $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");

    //On lie le marqueur à une valeur :
    $resultat->bindValue(':nom', $nom, PDO::PARAM_STR); //bindValue reçoit une variable ou un string. Le marqueur pointe uniquement vers la valeur : si celle-ci change, il faudra refaire un bindValue pour prendre en compte cette nouvelle valeur.

    //On exécute la requête :
    $resultat->execute();

    $donnees = $resultat->fetch(PDO::FETCH_ASSOC); //$donnees est un array associatif
        echo implode($donnees, '_');

    echo '<br>';

    //Si on change la valeur de la variable $nom, sans faire un nouveau bindValue, le marqueur de la requête pointe toujours vers 'Thoyer'
    $nom = 'Durand';
    $resultat->execute();
    $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
    echo implode($donnees, '_'); //en effet, on obtient encore les informations de Thoyer et non pas de Durand.

// ---------------------------------------
echo '<h2> 10. Exercice </h2>';
// ---------------------------------------

    //Après avoir importé la BDD "bibliothèque", affichez dans une liste <ul><li> les livres empruntés par Chloé (il y en a plusieurs...), en utilisant une requête préparée.

    $pdo = new PDO('mysql:host=localhost; dbname=bibliotheque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    $nom = 'Chloe';

        $resultat = $pdo->prepare("SELECT titre FROM livre WHERE id_livre IN(SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = :nom))");
        $resultat->bindParam(':nom', $nom, PDO::PARAM_STR); //on peut aussi avoir PDO::PARAM_INT ou PDO::PARAM_BOOL

        $resultat->execute(); //on obtient un objet issu de la classe prédéfinie PDOStatement  (= 1 résultat de requête)

        echo "Les livres empruntés par $nom :";
        echo '<ul>';
            while($livre = $resultat->fetch(PDO::FETCH_ASSOC)){
                echo "<li> $livre[titre] </li>";
            }
        echo '</ul>';


?>
