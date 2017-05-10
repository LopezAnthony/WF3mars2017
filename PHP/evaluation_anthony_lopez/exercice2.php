<?php

//exercice 2: <<On part en voyage>>
function convertisseur($montant, $devise){
    if(is_numeric($montant)){
        if($devise == 'USD'){
            $resultat = $montant * 1.085965;
            return '<p>'. $montant . '€ = ' . $resultat . ' dollards américains.</p>' ;
        }elseif($devise == 'EUR'){
            $resultat = $montant / 1.085965;
            return '<p>' . $montant . '$ = ' . $resultat . ' euros.</p>' ;
        }else{
            return '<p>Nous ne pouvons convertir que $=>€ ou €=>$.</p>';
        }
    }else{
        return '<p>Le montant doit être numérique.</p>';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>exercice 3</title>
</head>
<body>
    <main>
        <h2>Exercice 2 : « On part en voyage »</h2>
        <?php echo convertisseur(10, 'EUR'); 
              echo convertisseur(1.5, 'USD');
              echo convertisseur('erreur', 'USD');
              echo convertisseur(10, 'PND');
        ?>
    </main>

</body>
</html>