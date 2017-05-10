<?php
$category = array('horreur', 'comedie', 'polar');
$language = array('fr'=>'Français', 'en'=>'English', 'es'=>'Español');
$date = date('Y');
$contenu = '';
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if(!empty($_POST)){
    if(strlen($_POST['title']) < 5 || strlen($_POST['title']) > 255){
        // Je receptionne le contenu dans une balise p que j'ai stylisé en CSS pour obtenir le message d'erreur en rouge.
        $contenu .= '<p>Le titre doit contenir au minimum 5 caractères.</p>';
    }

    if(strlen($_POST['director']) < 5 || strlen($_POST['director']) > 255){
        $contenu .= '<p>Director doit contenir au minimum 5 caractères.</p>';
    }

    if(strlen($_POST['actors']) < 5 || strlen($_POST['actors']) > 255){
        $contenu .= '<p>Actors doit contenir au minimum 5 caractères.</p>';
    }

    if(strlen($_POST['producer']) < 5 || strlen($_POST['producer']) > 255){
        $contenu .= '<p>Producer doit contenir au minimum 5 caractères.</p>';
    }

    if(!isset($_POST['year_of_prod']) && checkdate(01, 01, $_POST['year_of_prod'])){
        $contenu .= '<p>Veuillez sélectionner une année de production.</p>';
    }

    if (!in_array($_POST['language'], $language)){
        $contenu .= '<p>Veuillez sélectionner une langue valide.</p>';
    }

    if (!in_array($_POST['category'], $category)){
        $contenu .= '<p>Veuillez sélectionner une categorie valide.</p>';
    }

    if(strlen($_POST['storyline']) < 5){
        $contenu .= '<p>Storyline doit contenir au minimum 5 caractères.</p>';
    }

    if (filter_var($_POST['video'], FILTER_VALIDATE_URL) === false) {
        $contenu .= '<p>Veuillez rentrez une URL valide.</p>';
    }

    if(empty($contenu)){
        foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }

        $query = $pdo->prepare('INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES(:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)');

        $query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
        $query->bindParam(':actors', $_POST['actors'], PDO::PARAM_STR);
        $query->bindParam(':director', $_POST['director'], PDO::PARAM_STR);
        $query->bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
        $query->bindParam(':year_of_prod', $_POST['year_of_prod'], PDO::PARAM_INT);
        $query->bindParam(':language', $_POST['language'], PDO::PARAM_STR);
        $query->bindParam(':category', $_POST['category'], PDO::PARAM_STR);
        $query->bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
        $query->bindParam(':video', $_POST['video'], PDO::PARAM_STR);

        $query->execute();

        $contenu .= 'Le film à bien été ajouté.';
    }

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>exercice 3</title>
    <!--Je me permets de mettre un peu de CSS pour plus de lisibilité.-->
    <style>
        label{
            display: block;
            margin-bottom: 5px;
        }
        p{
            color:red;
        }
    </style>
</head>
<body>
    <main>
        <form method="post" action="">
            <label for="title">Title :</label>
            <input name="title" id="title" type="text">

            <label for="director">Director :</label>
            <input name="director" id="director" type="text">

            <label for="actors">Actors :</label>
            <input name="actors" id="actors" type="text">

            <label for="producer">Producer :</label>
            <input name="producer" id="producer" type="text">

            <label for="year_of_prod">Year of Production :</label>
            <select name="year_of_prod" id="year_of_prod">
                <?php for($i=date('Y'); $i>=date('Y')-100; $i--) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                ?>
            </select>

            <label for="language">Language :</label>
            <select name="language" id="language">
                <?php 
                    foreach ($language as $key => $value) {
                        echo '<option value="'.$value.'">'.$value.'</option>';
                    }
                ?>
            </select>

            <label for="category">Category :</label>
            <select name="category" id="category">
                <?php 
                    foreach ($category as $key => $value) {
                        echo '<option value="'.$value.'">'.$value.'</option>';
                    }
                ?>
            </select>

            <label for="storyline">Storyline :</label>
            <textarea name="storyline" id="storyline"></textarea>

            <label for="video">Video :</label>
            <input name="video" id="video" type="text">

            <input type="submit" name="submit" value="envoyer">
        </form>

        <?php echo $contenu; ?>
    </main>
</body>
</html>