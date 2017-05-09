<?php
/* 
   Vous créez un tableau PHP contenant les pays suivants : France, Italie, Espagne, inconnu, Allemagne auxquels vous associez les valeurs Paris, Rome, Madrid, blablabla, Berlin.

   Vous parcourez ce tableau pour afficher la phrase "La capitale X se situe en Y" dans un paragraphe (où X remplace la capitale et Y le pays).

   Pour le pays "inconnu" vous afficherez "Ca n'existe pas !" à la place de la phrase précédente. 	


*/
$pays = array('France' => 'Paris', 'Italie' => 'Rome', 'Espagne' => 'Madrid', 'Inconnu' => 'blablabla', 'Allemagne' => 'Berlin');
$phrase = '';
$tableau = '';
    foreach ($pays as $key => $value) {
        if($key == 'Inconnu'){
            $phrase .= '<p>Ca n\'existe pas !</p>';
        }else{
            $phrase .= '<p>La capitale '.$value.' se situe en '.$key . '</p>';
        }
    }


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affiche_capitales</title>
    <style>
        table, th, td, tr{
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>


    <?php echo $phrase; ?>

</body>
</html>