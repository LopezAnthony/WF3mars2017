<?php
    $mysqli = new mysqli("localhost","root","","repertoire");
    if(isset($_POST['inscription'])){
//        echo '<pre>'; print_r($_POST); echo '</pre>';

        echo '<div class="succes">';
        foreach ( $_POST as $val => $valeur){
            echo "$val = $valeur <br>";
        }
        echo '</div>';
        $date_de_naissance = $_POST['annee'] . "-" . $_POST['mois'] . "-" . $_POST['jour'];
    }

?>
<!DOCTYPE html>
<html>
    <style>
        label, select{float: left; width: 100px;
        }
        fieldset{float: left;width: 220px;}
        .submit{clear:both;}
        .erreur{background: #ff0000;}
        .succes{background: #669933;}
    </style>

    <form method="post" action="">
        <fieldset>
            <legend>Informations :</legend>
            <label for="nom">Nom :</label>
            <input id="nom" name="nom" type="text">

            <label for="prenom">Prenom :</label>
            <input id="prenom" name="prenom" type="text">

            <label for="telephone">Téléphone :</label>
            <input id="telephone" name="telephone" type="text">

            <label for="profession">Profession :</label>
            <input id="profession" name="profession" type="text">

            <label for="ville">Ville :</label>
            <input id="ville" name="ville" type="text">

            <label for="codepostal">Code postal:</label>
            <input id="codepostal" name="codepostal" type="text">

            <label for="adresse">Adresse:</label>
            <textarea id="adresse" name="adresse" cols="30"></textarea>

            <legend>Informations supplémentaires:</legend>

            <label>Date de Naissance:</label><br><br>
            <label for="jour">Jour :</label>
            <select name="jour" id="jour">
                <?php for($i=1; $i<=31; $i++)
                {
                  if($i <= 9){
                      echo "<option>0$i</option>";
                  }else{
                      echo "<option>$i</option>";
                  }
                }
                ?>
            </select><br>

            <label for="mois">Mois :</label>
            <select name="mois" id="mois">
                <option value="01">Janvier</option>
                <option value="02">Février</option>
                <option value="03">Mars</option>
                <option value="04">Avril</option>
                <option value="05">Mai</option>
                <option value="06">Juin</option>
                <option value="07">Juillet</option>
                <option value="08">Août</option>
                <option value="09">Septembre</option>
                <option value="10">Octobre</option>
                <option value="11">Novembre</option>
                <option value="12">Décembre</option>
            </select><br>

            <label for="annee">Année :</label>
            <select name="annee" id="annee">
                <?php
                    for($i = date(Y); $i >= 1930; $i--)
                    {
                        echo "<option>$i</option>";
                    }
                ?>
            </select><br>


            <label for="sexe">Sexe :</label><br>
            Homme : <input type="radio" name="sexe" value="m" checked>
            Femme : <input type="radio" name="sexe" value="f"><br>

            <label for="description">Description :</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>

            <input type="submit" value="inscription" name="inscription">
        </fieldset>
    </form>
</html>