<?php
$contenu = '';
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$query = $pdo->prepare('SELECT * FROM movies WHERE id_movies = :id_movies');

$query->bindParam(':id_movies', $_GET['id_movies'], PDO::PARAM_INT);

$query->execute();
$resultat = $query->fetch(PDO::FETCH_ASSOC);



if(!isset($_GET['id_movies'])){
    $contenu .= 'Ce film n\'existe.';
}else{
    $contenu .= 
    '<p>Détail du film '. $resultat['title'] .' :</p>
    <ul>
        <li> Réalisateur : '. $resultat['director'] .'</li>
        <li> Acteurs : '. $resultat['actors'] .'</li>
        <li> Producteur : '. $resultat['producer'] .'</li>
        <li> Année de production : '. $resultat['year_of_prod'] .'</li>
        <li> Langue :  '. $resultat['language'] .'</li>
        <li> Catégorie : '. $resultat['category'] .'</li>
        <li> Synopsis : '. $resultat['storyline'] .'</li>
        <li> Bande-Annonce : <a href="'. $resultat['video'] .'" target="_blank">'. $resultat['video'] .'</a></li>
    </ul>';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <main>
        <?php echo $contenu ?>
    </main>
</body>
</html>