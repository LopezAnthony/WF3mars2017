<?php

namespace General;

require('espace1.php');
require('espace2.php');

use Espace1;
use Espace2;
use PDO; 
//lorsqu'on est dans un namespace définie (General) et que l'on souhaite utiliser une classe existante dans l'espace global de PHP (ex:PDO ou Mysqli), alors on doit importer la classe avec l'instrucion "use".
// De manière général on doit toujours importer(use) les namespaces dont on a besoin.
//use Espace1, Espace2; //Idem cela marche également

$c = new Espace1\A;
echo $c -> test1();

$d = new Espace2\A;
echo $d -> test2();

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '');