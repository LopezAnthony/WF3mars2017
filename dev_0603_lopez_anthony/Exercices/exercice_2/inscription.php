<?php

$pdo = new PDO('mysql:host=localhost; dbname=exo1_userslist', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$errors = '';
$type = array('eleve', 'formateur');

if(isset($_POST['inscription'])){

    if(strlen($_POST['nom']) < 3){
        $errors .= 'Le nom doit être remplie et contenir 3 caractères minimum <br>';
    }

    if(strlen($_POST['prenom']) < 3){
        $errors .= 'Le prenom doit être remplie et contenir 3 caractères minimum <br>';
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors .= 'Veuillez saisir un email valide <br>';
    }

    if(strlen($_POST['password']) < 6){
        $errors .= 'Le mot de passe doit contenir minimum 6 caractères <br>';
    }

    if (!in_array($_POST['type'], $type)) {
        $errors .= 'Le type de contact n\'est pas valide <br>';
    }

    if (empty($errors)) {

        foreach($_POST as $indice => $valeur)
        {
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }

        $resultat = $pdo->query("SELECT * FROM inscription WHERE email = '$_POST[email]'");

        if($resultat->rowCount() != 0){
            $errors .= 'Email Déjà utilisé.';
        }else{
            $mdp = md5($_POST['password']);

            $query = $pdo->prepare('INSERT INTO inscription (nom, prenom, email, password, type) VALUES(:nom, :prenom, :email, :password, :type)');
            $query->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            $query->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
            $query->bindParam(':email', $_POST['email'], PDO::PARAM_INT);
            $query->bindParam(':password', $mdp, PDO::PARAM_STR);
            $query->bindParam(':type', $_POST['type'], PDO::PARAM_STR);

            $succes = $query->execute();

            if ($succes) {
                $errors .= '<div>Le contact a été enregistré avec succés<div>';
            } else {
                $errors .= '<div>Erreur lors de l\'enregistrement<div>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <style>
    .myform-container.myform {
      max-width: 600px;
      padding: 40px 40px;
    }

    .btn {
      font-weight: 700;
      height: 36px;
      -moz-user-select: none;
      -webkit-user-select: none;
      user-select: none;
      cursor: default;
    }

    .myform {
      background-color: #F7F7F7;
      padding: 20px 25px 30px;
      margin: 0 auto 25px;
      margin-top: 50px;
      -moz-border-radius: 2px;
      -webkit-border-radius: 2px;
      border-radius: 2px;
      -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>

    <?php echo $errors; ?>

  <div class="myform myform-container">
    <form class="form-horizontal" method="POST">

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="nom" placeholder="Nom" autofocus>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="prenom" placeholder="Prénom">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="password" name="password" class="form-control" placeholder="Mot de passe">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <div class="radio">
            <label>
              <input type="radio" name="type" value="eleve" checked> Elève
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="type" value="formateur"> Formateur
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <button type="submit" name="inscription" class="btn btn-default">S'inscrire</button>
        </div>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>