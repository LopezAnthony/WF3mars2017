<?php
//Exercice 1 :  « On se présente ! »
$tableau = array('prenom' => 'Anthony', 'nom' => 'Lopez', 'adresse' => '113 Boulevard Bessières', 'Code_Postal' => '75017', 'Ville' => 'Paris', 'telephone' => '0632072165', 'date_naissance' => '1991-01-12');

$date = new DateTime($tableau['date_naissance']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>exercice 1</h1>
    </header>
    <main>
        <h2>Exercice 1 :  « On se présente ! »</h2>
        <ul>
            <?php foreach ($tableau as $key => $value) {
                if($key != 'date'){
                    echo '<li>'.$key .' : '. $value .'</li>';
                }else{
                    echo '<li>' .$key . ' : ' . $date->format('d-m-Y') . '</li>';
                }
            } ?>
        </ul>
    </main>
</body>
</html>