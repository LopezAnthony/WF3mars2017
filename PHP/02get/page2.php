<h1>Page détail des articles</h1>

<?php

//********************************
//La superglobale $_GET
//********************************

    //$_GET représente l'URL : il s'agit d'une superglobale, et comme toutes les superglobales, d'un ARRAY. Superglobale signifie qu'il est disponible dans tous les contextes du script, y compris dans les fonctions : il n'est pas nécessaire de faire global $_GET.

    //Les informations transitent dans l'url de la manière suivant : 
        //page.php?indice1=valeur1&indice2=valeur2... (sans espace)
        //chaque indice de cet URL correspondent à un indice de l'array $_GET, et chaque valeur aux valeurs correspondantes aux indices.

        print_r($_GET);
        echo '<br>';

        if(isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])){
            //si existent les indices article, couleur et prix, on peut les afficher:
                echo 'Article : ' . $_GET['article'] . '<br>';
                echo 'Couleur : ' . $_GET['couleur'] . '<br>';
                echo 'Prix : ' .  $_GET['prix'] . '<br>';
        }else{
            echo 'Aucun produit sélectionné';
        }

?>