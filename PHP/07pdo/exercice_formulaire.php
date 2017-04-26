<?php 

    /*EXERCICE :
        Principe : créer un formulaire qui permet d'enregistrer un nouvel employé dans la base entreprise.

        Les étapes:
            1- Création du formulaire HTML
            2- Connexion à la BDD
            3- Lorsque le formulaire est posté, insertion des informations du formulaires en BDD. Faites-le avec une requête préparé.
            4- Afficher à la fin un message "L'employé a abien été ajouté".
    */
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
        <form method="post" action="">
            <label for="prenom">prenom : </label>
            <input name="prenom" id="prenom" type="text">
            <br>

            <label for="nom">Nom : </label>
            <input name="nom" id="nom" type="text">
            <br>

            <label>sexe : </label>
            <input type="radio" name="sexe" value="male"> Male<br>
            <input type="radio" name="sexe" value="female"> Female<br>
            <br>

            <label for="service">service : </label>
            <input name="service" id="service" type="text">
            <br>

            <label for="date_embauche">date d'embauche : </label>
            <input name="date_embauche" id="date_embauche" type="text" placeholder="AAAA-MM-JJ">
            <br>

            <label for="salaire">salaire : </label>
            <input name="salaire" id="salaire" type="text">

            <input type="submit">
        </form>

    </body>
</html>