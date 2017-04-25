<?php

    //Exercice:
        /*
            1° Réaliser un formulaire permettant de sélectionner un fruit dans un sélecteur, et de saisir un poinds quelcquonque exprimé en grammes
            2° Faire le traitement du formulaire pour afficher le prix du fruit choisi selon le poids indiqué, en passant par la fonction calcul()
            3°Faire en sorte de garder le fruit choisi et le poids saisi dans les champs du formulaire après que celui-ci soit validé.
        */

        include('fonction.inc.php');
        
        if(!empty($_POST)){
            echo calcul($_POST['select'], $_POST['poids']);
        }

?>

<form method="post" action="">
    <label for="select">Selectionner un fruit : </label><br>
    <select name="select" id="select">
        <option value="NULL">--Selectionner un fruit--</option>
        <option value="cerises" <?php if(isset($_POST['select']) && $_POST['select'] == 'cerises') echo'selected'; ?> >Cerises</option>
        <option value="bananes" <?php if(isset($_POST['select']) && $_POST['select'] == 'bananes') echo'selected'; ?> >Bananes</option>
        <option value="pommes" <?php if(isset($_POST['select']) && $_POST['select'] == 'pommes') echo'selected'; ?> >Pommes</option>
        <option value="peches" <?php if(isset($_POST['select']) && $_POST['select'] == 'peches') echo'selected'; ?> >Pêches</option>
    </select> <br>

    <label for="poids">Saisir poids (en g)</label><br>
    <input id="poids" type="number" name="poids" value="<?php echo $_POST['poids'] ?? ''; ?>"><br>

    <input type="submit">
</form>