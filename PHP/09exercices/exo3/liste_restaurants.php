<?php

/*
    1.Afficher dans une table HTML la liste des restaurants avec les champs nom et téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact
    2.Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".
*/

$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$query = $pdo->query("SELECT id_restaurant, nom, telephone FROM restaurant");
$contenu = '';

$detail =  $pdo->prepare("SELECT * FROM restaurant WHERE id_restaurant = :id_restaurant");
$detail->bindParam(':id_restaurant', $_GET['id_restaurant'], PDO::PARAM_INT);

$detail->execute();
$affichage = $detail->fetch(PDO::FETCH_ASSOC);

if(!empty($affichage)){
    $contenu .= '<p>Autre info pour '. $affichage['nom'] . ' : </p>
		<p>téléphone : '. $affichage['telephone'] .'</p>
		<p>adresse : '. $affichage['adresse'] .'</p>
		<p>type : '. $affichage['type'] .'</p>
        <p>note : '. $affichage['note'] .'</p>
		<p>avis : '. $affichage['avis'] .'</p>';
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>liste restaurants</title>
</head>
<body>
    <table>
        <tr>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>autres infos</th>
        </tr>
            <?php
                while ($resultat = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                            echo '<td>'. $resultat['nom'] .'</td>';
                            echo '<td> '. $resultat['telephone'] .'</td>';
                            echo '<td><a href="?id_restaurant='.$resultat['id_restaurant'] .'">plus de détails</a></td>';
                        echo '</tr>';
                }
            ?>
    </table>

    <?php echo $contenu; ?>
</body>
</html>