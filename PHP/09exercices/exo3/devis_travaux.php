<?php
/* 
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous réalisez la validation du formulaire : le montant doit être en nombre positif non nul, et la période de construction conforme aux valeurs que vous aurez choisies.

	3- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.
	
	Formule de calcul d'un montant TTC :  montant TTC = montant HT * (1 + taux / 100) où taux est par exemple égale à 20.

	4- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

	5- Vous diffusez des codes de remises promotionnelles, dont un est 'abc' offrant 10% de remise. Ajoutez un champ au formulaire pour saisir le code de remise. Vous validez ce champ qui ne doit pas excéder 5 caractères. Puis la fonction montantTTC applique la remise (-10%) au montant total des travaux si le code de l'internaute est correcte. Vous affichez dans ce cas "Le montant de vos travaux est de X euros avec une TVA à Y% incluse, et y compris une remise de 10%.". 

*/
$contenu = '';
function montantTTC($montant, $date, $code){
			$codePromo ='';

			if($_POST['date'] == 'plus'){
				$montantTTC = $montant * (1 + 10/100);
				$tva = '10%';
			}else{
				$montantTTC = $montant * (1 + 20/100);
				$tva .= '20%';
			}
		
			if($_POST['code'] == 'abc'){
				$montantTTC = $montantTTC-($montantTTC*0.1);
					$codePromo = 'et y compris une remise de 10%.';
			}

			return 'Le montant de vos travaux est de '. $montantTTC .' euros avec une TVA à '.$tva.' incluse '.$codePromo.'';
}

if(!empty($_POST)){
	if(!is_numeric($_POST['montant']) || $_POST['montant'] <= 0){
		$contenu .= '<p>Le montant doit être un nombre et différent de 0.</p>';
	}
	if($_POST['date'] != 'plus' && $_POST['date'] != 'moins'){
		$contenu .= '<p>La civilité est incorrect</p>';
	}

		if(strlen($_POST['code']) > 5){
		$contenu .= '<p>Un code promo ne dépasse pas 5 caractères.</p>';
	}

	if(empty($contenu)){
		foreach($_POST as $indice => $valeur){
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}

		$contenu .= montantTTC($_POST['montant'], $_POST['date'], $_POST['code']);
	}

}



?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>devis_travaux</title>
</head>
<body>
	<?php echo $contenu; ?>
	<form method="post" action="">
		<label for="montant">Montant de vos travaux :</label>
		<input name="montant" id="montant" type="text">

		<label for="date">Date de construction :</label>
		<input type="radio" name="date" id="date" value="plus" checked>Plus de 5 ans.
		<input type="radio" name="date" id="date" value="moins">Moins de 5 ans.
		<label for="code">Code promotionnel</label>
		<input type="text" name="code" id="code">

		<input type="submit" name="submit" value="envoyer">
	</form>
</body>
</html>