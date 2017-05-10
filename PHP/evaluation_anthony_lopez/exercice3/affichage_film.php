<?php
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$query = $pdo->query("SELECT id_movies, title, director, year_of_prod FROM movies");

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <main>
        <table>
            <tr>
                <th>Titre</th>
                <th>Réalisateur</th>
                <th>Année de production</th>
                <th>Plus d'info</th>
            </tr>
            <?php
                while ($resultat = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>'. $resultat['title'] .'</td>';
                    echo '<td>'. $resultat['director'] .'</td>';
                    echo '<td>'. $resultat['year_of_prod'] .'</td>';
                    echo '<td><a href="fiche_detail_produit.php?id_movies='. $resultat['id_movies'] .'">Plus d\'info</a></td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </main>
</body>
</html>