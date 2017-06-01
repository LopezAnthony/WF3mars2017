<?php
class Autoload{
    public static function className($nom_de_la_classe){
        $tab = explode('\\', $nom_de_la_classe);

        if($tab[0] == 'Controller' && $tab[1] != 'Controller'){
            $path = __DIR__ . '/../src/' . implode('/', $tab) . '.php';
        }else{
            $path = __DIR__ . '/' . implode('/', $tab) . '.php';
        }

        require $path;
        // echo '<pre>AutoLoad : ' . $nom_de_la_classe . '<br>';
        // echo '=> ' . $path . '</pre><hr>';
    }
}
//------------------------------------
spl_autoload_register(array('Autoload', 'className'));
//------------------------------------
//En PHPoo, spl_autoload_register() a besoin du nom de la classet et de la méthode à exécuter. On passe donc un array.
//Attention, notre méthode doit OBLIGATOIREMENT être static !!!


