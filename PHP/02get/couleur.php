<?php

    //Exercice:
        /*
            -Dans le fichier listreFruits.php : Créer 3 liens banane, kiwiet cerise. Quand on clique sur les liens, on passe le nom du fruit dans l'URL à la page couleur.php.
            -Dans couleur.php : vous récupérez le nom du fruit et affichez sa couleur.

            Notez que vous ne passez pas la couleur dans l'URL mais vous la déduisez dans couleur.php.
        */

        if(isset($_GET['fruit'])){
            if($_GET['fruit'] == 'banane'){
                echo 'Une ' . $_GET['fruit'] . ' est Jaune <br>';
            }else if ($_GET['fruit'] == 'kiwi'){
                echo 'Un ' . $_GET['fruit'] . ' est vert <br>';
            }else if ($_GET['fruit'] == 'cerise'){
                echo 'Une ' . $_GET['fruit'] . ' est rouge <br>';
            }
        }else{
            echo 'Aucun produit sélectionné <br>';
        }

?>