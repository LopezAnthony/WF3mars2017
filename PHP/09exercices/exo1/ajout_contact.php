

<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	id_contact PK AI INT(3)
	nom VARCHAR(20)
	prenom VARCHAR(20)
	telephone INT(10)
	annee_rencontre (YEAR)
	email VARCHAR(255)
	type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
		Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
		L'année de rencontre doit être une année valide
		Le type de contact doit être conforme à la liste des types de contacts
		L'email doit être valide
		En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	3- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/

	$pdo = new PDO('mysql:host=localhost; dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	function executeRequete($req, $param = array()){ //$param est un array vide par défaut : il est donc optionnel

		//htmlspecialchars :
			if(!empty($param)){
				//si on a bien reçu un array, on le traite :
				foreach($param as $indice => $valeur){
					$param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); //transforme en entités HTML chaque caractères spéciaux, dont les quotes
				}
			}

		//La requête préparée :
			global $pdo; //$pdo est déclarée dans l'espace global (fichier init.inc.php). Il faut donc faire global $pdo pour l'utiliser dans l'espace local de cette fonction.
			$r = $pdo->prepare($req);
			$succes = $r->execute($param); //on exécute la requête en lui passant l'array $param qui permet d'associer chaque marqueur à sa valeur.

		//Traitement erreur SQL éventuelle :
			if(!$succes){ //si $succes vaut false, il y a une erreur sur la requête
				die('Erreur sur la requête SQL : ' . $r->errorInfo()[2] ); //die arrête le script et affiche un message. Ici on affiche le message d'erreur SQL donné par errorInfo(). Cette méthode retourne un array, dans lequel le message se situe à l'indice [2]
			}
			
			return $r; //Retourne un objet PDOStatement qui contient le resultat de la requête.

	}

	$contenu = '';
	$date = date('Y');
	$annee = 2017;

	while($date >= date('Y')-100){
		$annee .= '<option value="'. $date .'">'. $date .'</option>';
		$date--;
	}


	if(!empty($_POST)){
		if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20){
			$contenu .= '<p>Le nom doit contenir entre 2 et 20 caractères</p>';
		}
		if(strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20){
			$contenu .= '<p>Le prenom doit contenir entre 2 et 20 caractères</p>';
		}
		if(!preg_match('#^[0-9]{10}$#', $_POST['telephone'])){
			$contenu .= '<p>Numero de téléphone invalide (10chiffres)</p>';
		}

		if(!(isset($_POST['annee_rencontre']) && checkdate(01, 01, $_POST['annee_rencontre']) )){
			$contenu .= '<p>Veuillez sélectionner une année valide</p>';
		}

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$contenu .= '<p>Email invalide</p>';
		}

		if($_POST['type_contact'] <> 'ami' && $_POST['type_contact'] <> 'famille' && $_POST['type_contact'] <> 'professionnel' && $_POST['type_contact'] <> 'autre'){
			$contenu .= '<p>Veuillez sélectionner un type de contact valide.</p>';
		}

		if(empty($contenu)){
			$resultat = executeRequete("INSERT INTO contact (nom, prenom, telephone, annee_rencontre, email, type_contact) VALUES (:nom, :prenom, :telephone, :annee_rencontre, :email, :type_contact)", array(':nom'=> $_POST['nom'], ':prenom'=> $_POST['prenom'], ':telephone'=> $_POST['telephone'], ':annee_rencontre'=> $_POST['annee_rencontre'], ':email'=> $_POST['email'], ':type_contact'=> $_POST['type_contact']));

			$contenu .= 'Le contact a bien été ajouté.';
		}
	}




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Ajout Contact</title>
	<style>
		select, input, label{
			display: block;
			margin-bottom: 2px;
		}
	</style>
</head>
<body>
	<main>

		<?php echo $contenu; ?>

		<form method="post" action="">
			<input type="hidden" name="id_contact">

			<label for="nom">Nom:</label>
			<input type="text" id="nom" name="nom">

			<label for="prenom">Prenom:</label>
			<input type="text" id="prenom" name="prenom">

			<label for="telephone">Téléphone:</label>
			<input type="text" id="telephone" name="telephone">

			<label for="annee_rencontre">Année:</label>
			<select name="annee_rencontre" id="annee_rencontre">
				<?php echo $annee ?>
			</select>

			<label for="email">email:</label>
			<input type="text" id="email" name="email">

			<label for="type_contact">Contact :</label>
			<select name="type_contact" id="type_contact">
				<option value="ami">Ami</option>
				<option value="famille">Famille</option>
				<option value="professionnel">Pro</option>
				<option value="autre">Autre</option>
			</select>

			<input type="submit" name="submit" value="envoyer">
		</form>
	</main>
</body>
</html>

