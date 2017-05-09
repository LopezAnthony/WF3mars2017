<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. Lorsque le formulaire est soumis, vous affichez "La location de votre véhicule sera de X euros pour Y jour(s)." sous le formulaire.

   2- Vous validez le formulaire : la catégorie doit être correcte et le nombre de jours un entier positif.

   3- Vous créez une fonction prixLoc qui retourne le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. 

   4- Si le prix de la location est supérieur à 150€, vous consentez une remise de 10%.

*/



$categorie = array('A', 'B', 'C', 'D');
$contenu = '';

function prixLoc($categorie, $nombreJour){
    if($categorie == 'A'){
        $prix = 30;
    }elseif($categorie == 'B'){
        $prix = 50;
    }elseif($categorie == 'C'){
        $prix = 70;
    }else{
        $prix = 90;
    }
    $prixTotal = $prix * $nombreJour;

    if($prixTotal <= 150){
        return $prixTotal;
    }else{
        $prixReduit = $prixTotal - ( ($prixTotal * 10) /100);
        return $prixReduit; 
    }

}

if(!empty($_POST)){
    if (!in_array($_POST['categorie'], $categorie)){
		$contenu .= '<p>La categorie n\'est pas valide</p>';
    }

    if(!(ctype_digit($_POST['jours']))){
        $contenu .= '<p>Le nombre jours n\'est pas valide.</p>';
    }

    /*
    Synthèse des types numériques :
        is_numeric vérifie si c'est un nombre, décimal ou pas 
        is_int vérifie si c'est un entier (ne marche pas avec les formulaires : dans ce cas caster le type en integer pour le tester : cf ci-dessus)
        is_float vérifie si c'est un noombre décimal
        ctype_digit vérifie si une chaîne est un entier (utile dans le cas des formulaires)
    */

    if(empty($contenu)){

        foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }

        $contenu .= '<p>Le prix de location pour '. $_POST['jours'] . ' jours est de ' . prixLoc($_POST['categorie'], $_POST['jours']) . '€.</p>';

    }
}





?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>exo : location_voiture</title>
        <meta charset="UTF-8">
        <style>
            label, input{
                display: block;
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body>
        <form method="post" action="">
            <label for="categorie">Categorie de voiture : </label>
            <select name="categorie" id="categorie">
                <?php foreach ($categorie as $indice => $value) {
                    echo '<option value="'.$value.'">'.$value.'</option>';
                }?>
            </select>
            <label for="jours">Nombre de jours :</label>
            <input name="jours" id="jours" type="text">

            <input type="submit" name="submit" value="envoyer">
        </form>


        <?php echo $contenu ; ?>
    </body>
</html>