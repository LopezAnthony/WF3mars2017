<?php 

    /*EXERCICE :
        Principe : créer un formulaire qui permet d'enregistrer un nouvel employé dans la base entreprise.

        Les étapes:
            1- Création du formulaire HTML
            2- Connexion à la BDD
            3- Lorsque le formulaire est posté, insertion des informations du formulaires en BDD. Faites-le avec une requête préparé.
            4- Afficher à la fin un message "L'employé a abien été ajouté".
    */

    /* Mise en commentaire pour correction***

    $pdo = new PDO('mysql:host=localhost; dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    $select = $pdo->query("SELECT * FROM employes");

    if(!empty($_POST)){

        $insert = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)");

        $insert->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $insert->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
        $insert->bindParam(':sexe', $_POST['sexe'], PDO::PARAM_STR);
        $insert->bindParam(':service', $_POST['service'], PDO::PARAM_STR);
        $insert->bindParam(':date_embauche', $_POST['date_embauche'], PDO::PARAM_STR);
        $insert->bindParam(':salaire', $_POST['salaire'], PDO::PARAM_STR);

        $insert->execute();

        echo 'L\'employé a bien été ajouté';
    }

    */


    //Correction:

        $message = ''; //variable d'affichage des messages d'erreur de validation du formulaire.
        $pdo = new PDO('mysql:host=localhost; dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        if(!empty($_POST)){ //si le formulaire est posté, il y a des indices dans $_POST, il n'est donc pas vide.

            //Contrôles du formulaire:
            if (strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) $message .= '<div>Le prénom doit comporter au moins 3 caractères</div>';

            if (strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20) $message .= '<div>Le Nom doit comporter au moins 3 caractères</div>';

            if ($_POST['sexe'] != 'm' && $_POST['sexe'] != 'f') $message .= '<div>Le sexe n\'est pas correct</div>';

            if (strlen($_POST['service']) < 3 || strlen($_POST['service']) > 20) $message .= '<div>Le service doit comporter au moins 3 caractères</div>';

            $tab_date = explode('-', $_POST['date_embauche']); //met le jour, le mois et l'année dans un array pour pouvoir les passer à la fonction checkdate($mois,$jour,$annee).
            if(!(isset($tab_date[0]) && isset($tab_date[1]) && isset($tab_date[2]) && checkdate($tab_date[1], $tab_date[2], $tab_date[0]) )) $message .= '<div> La date n\'est pas valide</div>'; //checkdate($mois, $jour, $annee) 

            if (!is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0 ) $message .= '<div>Le salaire doit être supérieur à 0</div>'; //is_numeric() teste si c'est un nombre


            if(empty($message)){ //si les messages sont vides, c'est qu'il n'y a pas d'erreur.
                $resultat = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)");

                $resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
                $resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
                $resultat->bindParam(':sexe', $_POST['sexe'], PDO::PARAM_STR);
                $resultat->bindParam(':service', $_POST['service'], PDO::PARAM_STR);
                $resultat->bindParam(':date_embauche', $_POST['date_embauche'], PDO::PARAM_STR);
                $resultat->bindParam(':salaire', $_POST['salaire'], PDO::PARAM_INT);

                $req = $resultat->execute();

                if($req){ //execute ci-dessus renvoie TRUE en cas de succès de la requête sinon false.
                    echo 'L\'employé a bien été ajouté';
                }else{
                    echo 'Une erreur est survenue lors de l\'enregistrement';
                }
            }
    }
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Exercice</title>
    </head>
    <body>

    <?php echo $message; ?>
        <form method="post" action="">
            <label for="prenom">prenom : </label>
            <input name="prenom" id="prenom" type="text">
            <br>
            <br>

            <label for="nom">Nom : </label>
            <input name="nom" id="nom" type="text">
            <br>
            <br>

            <label>sexe : </label>
            <input type="radio" name="sexe" value="m" checked><label for="homme">Male</label>
            <input type="radio" name="sexe" value="f"><label for="femme">Female</label> 
            <br>
            <br>

            <label for="service">service : </label>
            <input name="service" id="service" type="text">
            <br>
            <br>

            <label for="date_embauche">date d'embauche : </label>
            <input name="date_embauche" id="date_embauche" type="text" placeholder="AAAA-MM-JJ">
            <br>
            <br>

            <label for="salaire">salaire : </label>
            <input name="salaire" id="salaire" type="text">
            <br>
            <br>

            <input type="submit">
        </form>

    </body>
</html>