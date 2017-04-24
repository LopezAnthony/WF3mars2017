<h1>Formulaire2</h1>
<form method="post" action="">
    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville"><br>

    <label for="codePostal">Code postal</label>
    <input type="text" name="codePostal" id="codePostal"></textarea><br>

    <label for="adresse">adresse</label>
    <textarea type="text" id="adresse" name="adresse"></textarea><br>

    <input type="submit" name="validation" value="envoyer">
</form>


<?php

//Exercice : créer le formulaire indiqué au tableau, récupérer les données siasies et les afficher dans la même page.

    if(!empty($_POST)){
        echo 'Ville : ' . $_POST['ville'] . '<br>';
        echo 'CP : ' . $_POST['codePostal'] . '<br>'; //attention : les name sont sensibles à la case.
        echo 'Adresse : ' . $_POST['adresse'] . '<br>';
    }


?>