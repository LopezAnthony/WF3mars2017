<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".



*/

$pdo = new PDO('mysql:host=localhost; dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$req = $pdo->query("SELECT DISTINCT id_contact, nom, prenom, telephone FROM contact");

	echo '<table>';
		echo '<tr>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Téléphone</th>
				<th>Détails</th>
			</tr>';
			while($table = $req->fetch(PDO::FETCH_ASSOC)){
				echo '<tr>';
					echo '<td>'. $table['nom'] .'</td>';
					echo '<td>'. $table['prenom'] .'</td>';
					echo '<td>'. $table['telephone'] .'</td>';
					echo '<td><a href="?id_contact='.$table['id_contact'].'">détails</a></td>';
				echo '</tr>';
			}
	echo '</table>';

	function executeRequete($req, $param = array()){
				if(!empty($param)){
					foreach($param as $indice => $valeur){
						$param[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
					}
				}
				global $pdo;
				$r = $pdo->prepare($req);
				$succes = $r->execute($param);
					die('Erreur sur la requête SQL : ' . $r->errorInfo()[2] );
				}
				return $r;
		}

		$contenu = '';

	if(isset($_GET['id_contact'])){
		$requete = executeRequete("SELECT * FROM contact WHERE id_contact = :id_contact", array(':id_contact' => $_GET['id_contact']));

		$resultat = $requete->fetch(PDO::FETCH_ASSOC);
		$contenu .= '<p>Autre info pour '. $resultat['prenom'] . ' ' . $resultat['nom'] . ' : </p>
		<p>téléphone : '. $resultat['telephone'] .'</p>
		<p>email : '. $resultat['email'] .'</p>
		<p>Année de rencontre : '. $resultat['annee_rencontre'] .'</p>
		<p>Type de contact : '. $resultat['type_contact'] .'</p>';
		echo $contenu;
	}


?>
