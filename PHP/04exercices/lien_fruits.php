<a href="?fruit=cerises">Cerise</a><br>
<a href="?fruit=bananes">Bananes</a><br>
<a href="?fruit=pommes">Pommes</a><br>
<a href="?fruit=peches">Pêches</a><br>


<?php

    //Exercice:
        /*
            -Faire 4 Liens HTML avec le nom des fruits
            -Quand on clique sur un lien, on affiche le prix pour 1000g de ce fruit, dans cette page lien_fruits.php.
        */
        include_once('fonction.inc.php');

        if(isset($_GET['fruit'])){
            echo calcul($_GET['fruit'], 1000);
        }else{
            echo'Sélectionnez un fruit <br>';
        }


?>
