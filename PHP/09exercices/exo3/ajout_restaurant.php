<?php

/* 1- Créer une base de données "restaurants" avec une table "restaurant" :
	  id_restaurant PK AI INT(3)
	  nom VARCHAR(100)
	  adresse VARCHAR(255)
	  telephone VARCHAR(10)
	  type ENUM('gastronomique', 'brasserie', 'pizzeria', 'autre')
	  note INT(1)
	  avis TEXT

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un restaurant dans la bdd. Les champs type et note sont des menus déroulants que vous créez avec des boucles.
	
	3- Effectuer les vérifications nécessaires :
	   Le champ nom contient 2 caractères minimum
	   Le champ adresse ne doit pas être vide
	   Le téléphone doit contenir 10 chiffres
	   Le type doit être conforme à la liste des types de la bdd
	   La note est un nombre entre 0 et 5
	   L'avis ne doit être vide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter le restaurant à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/
$type = array('gastronomique', 'brasserie', 'pizzeria', 'autre');
$contenu = '';
$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if(!empty($_POST)){
	if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 100){
			$contenu .= '<p>Le nom doit contenir entre 2 et 100 caractères.</p>';
		}

	if(strlen($_POST['adresse']) == 0 || strlen($_POST['adresse']) > 255){
		$contenu .= '<p>Veuillez saisir une adresse.</p>';
	}

	if(!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
			$contenu .= '<p>Numero de téléphone invalide (10chiffres).</p>';
	}

	if (!in_array($_POST['type'], $type)){
		$contenu .= '<p>Le type de restaurant n\'est pas valide.</p>';
	}

	if(!is_numeric($_POST['note']) || $_POST['note'] < 0 || $_POST['note'] > 5 ){
		$contenu .= '<p>Veuillez sélectionner une note valide.</p>';
	}

	if(empty($_POST['avis'])){
		$contenu .= '<p>Veuillez saisir un avis.</p>';
	}

	if(empty($contenu)){
		foreach($_POST as $indice => $valeur){
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}

		$query = $pdo->prepare('INSERT INTO restaurant (nom, adresse, telephone, type, note, avis) VALUES(:nom, :adresse, :telephone, :type, :note, :avis)');

		$query->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
		$query->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
		$query->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
		$query->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
		$query->bindParam(':note', $_POST['note'], PDO::PARAM_INT);
		$query->bindParam(':avis', $_POST['avis'], PDO::PARAM_STR);

		$succes = $query->execute();

		if ($succes) {
			$contenu .= '<p>Le restaurant a été enregistré avec succés<p>';
		} else {
			$contenu .= '<p>Erreur lors de l\'enregistrement<p>';
		}

	}

}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Ajout_restaurant</title>
	<style>
		input, select, label{
			display: block;
			margin-bottom: 5px;
		}
		p{
			color: red;
		}
	</style>
</head>
<body>
	<?php echo $contenu; ?>
	<form method="post" action="">
		<label for="nom">Nom :</label>
		<input name="nom" id="nom" type="text">

		<label for="adresse">Adresse :</label>
		<input name="adresse" id="adresse" type="text">

		<label for="telephone">Telephone :</label>
		<input name="telephone" id="telephone" type="text">

		<label for="type">Type :</label>
		<select name="type" id="type">
			<?php foreach ($type as $key => $value) {
				echo '<option value="'. $value .'">'. $value .'</option>';
			} ?>
		</select>

		<label for="note">Note :</label>
		<select name="note" id="note">
			<?php
				for ($i=0; $i <= 5; $i++) { 
					echo '<option value="'. $i .'">'. $i .'</option>';
				}
			?>
		</select>

		<label for="avis">Avis :</label>
		<textarea name="avis" id="avis"></textarea>

		<input name="submit" value="envoyer" type="submit">

	</form>


</body>
</html>