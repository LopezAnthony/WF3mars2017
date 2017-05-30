<?php
function inclusion_automatique($nom_de_la_class){
    require( $nom_de_la_class .'.class.php' );

    echo 'On passe dans l\'autoload ! <br>';
    echo 'On fait un require (' . $nom_de_la_class . '.class.php) <br>';
}


//------------------------------------------------
spl_autoload_register('inclusion_automatique');
//------------------------------------------------
/*
    Commentaires :
        spl_autoload_register :
            - C'est une fonction super pratique ! Elle va s'exécuter à chaque fois que l'interprêteur voit le mot "new".
            - Elle va exécuter une fonction, dont on lui fournit le nom en argument.
            - Elle va apporter à notre fonction le mot qui vient après 'new' c'est à dire le nom de la classe à instancier.
*/