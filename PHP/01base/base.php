<style>
    h2{
        font-size: 15px;
        color: red;
    }
</style>

<?php
// ---------------------------------------
echo '<h2> Les balises PHP </h2>';
// ---------------------------------------
    ?>

    <?php
    // Pour ouvrir un passage en PHP, on utilise la balise précédente
    // Pour fermer un passage en PHP, on utilise la balise suivante
    ?>
    <strong>Bonjour</strong> <!-- en dehors des balise d'ouverture et de fermeture du PHP , nous pouvons écrire du HTML -->
    <?php
// ---------------------------------------
echo '<h2> Ecriture et affichage </h2>';
// ---------------------------------------
    
    echo 'Bonjours'; //echo est une instruction qui nous permet d'effectuer un affichage. Notez que les instructions se terminent par un ";".
    echo '<br>'; //on peut mettre des balises HTML dans un echo, elles sont interprétées comme telle.

    print 'Nous sommes jeudi'; //print est une autre instruction d'affichage.

    // Pour info il existe d'autres instructions d'affichage:
    //  - print_r();
    //  - var_dump();

// ---------------------------------------
echo '<h2> Variable : types / déclaration / affectation </h2>';
// ---------------------------------------
    
    //Définition : une variable est un espace mémoire nommé qui permet de conserver une valeur.
    //En PHP, on déclare une variable avec le signe '$'

    $a = 127; //je déclare la variable a, et je lui affecte la valeur 127
    //Le type de la variable a est Integer (entier).

    $b = 1.5; //un type Double pour nombre à virgule

    $a = 'une chaîne de caractères'; //type string

    $b = '127'; //il s'agit aussi d'un string car il y a des quotes

    $a = true; //type boolean qui prend que 2 valeurs possibles : true ou false

// ---------------------------------------
echo '<h2> Concaténation </h2>';
// ---------------------------------------

    //Déclaration :
    $x = 'bonjour ';
    $y = 'tout le monde';

    echo $x . $y . '<br>'; //point de concaténation que l'on peut traduire par 'suivi de'.

    echo "$x $y <br>"; //on obtient le même résultat sans concaténation. (cf chapitre  d'après pour l'explication de l'évaluation des variables dans les guillements "")

    //Concaténation lors de l'affectation :
    $prenom1 = 'Bruno'; //déclaration de la variable $prenom1
    $prenom1 = 'Claire'; //ici la valeur 'Claire' écrase la valeur précédente 'Bruno' qui était contenue dans la variable

    echo $prenom1 . '<br>'; //affiche Claire

    $prenom2 = 'Bruno';
    $prenom2 .= 'Claire'; //on affecte la valeur "Claire" à la variable $prenom2 en l'ajoutant à la valeur précedement contenue dans la variable grâce à l'opérateur '.='

    echo $prenom2 .'<br>'; //affiche BrunoClaire

// ---------------------------------------
echo '<h2> Guillemets et quotes </h2>';
// ---------------------------------------

    $message = "aujourd'hui"; //ou bien :
    $message = 'aujourd\'hui'; // dans les quotes on échappe les apostrophes avec l'anti-slash

    $txt = 'bonjour';

    echo "$txt tout le monde <br>"; //les variables sont évaluées quand elle sont présentes dans des guillemets, c'est leur contenu qui est affiché
    echo '$txt tout le monde <br>'; //dans des quotes simples on affiche littéralement le nom des variables : elles ne sont pas évaluées

// ---------------------------------------
echo '<h2> Constantes </h2>';
// ---------------------------------------

    //Une constante permet de conserver une valeur qui ne peut pas (ou ne doit pas) être modifiée durant la durée du script. Très tile pour garder de manière certaine la connexion à une BDD ou le chemin du site par exemple.

    define("CAPITALE", "Paris"); //par convention on écrit toujours le nom des constantes en MAJUSCULES. define() permet de déclarer une constante dont on indique d'abord le nom, puis la valeur'

    echo CAPITALE . '<br>'; //Affiche Paris

    //Constantes magiques:
    echo __FILE__ . '<br>'; //affiche le chemin complet du fichier dans lequel on est
    echo __LINE__ . '<br>'; //affiche la ligne à laquelle on est 

// ---------------------------------------
echo '<h2> Opérateurs arithmétiques </h2>';
// ---------------------------------------

    //Les opérateurs
        $a = 10;
        $b = 2;

        echo $a + $b . '<br>'; //addition => 12
        echo $a - $b . '<br>'; //soustraction => 8
        echo $a * $b . '<br>'; //multiplication => 20
        echo $a / $b . '<br>'; //division => 5
        echo $a % $b . '<br>'; //modulo (reste de la division) => 0

    //Opérations et affectations combinées:
        $a += $b; //$a vaut 12 car équivaut à '$a = $a + $b' soit 10 + 2
        $a -= $b; //$a vaut 10 car équivaut à '$a = $a - $b' soit 12 - 2
        $a *= $b; //$a vaut 20 car équivaut à '$a = $a * $b' soit 10 * 2
        $a /= $b; //$a vaut 10 car équivaut à '$a = $a - $b' soit 20 / 2
        $a %= $b; //$a vaut 0 car équivaut à '$a = $a - $b' soit 10 % 2

    //Incrémenter et décrémenter :
        $i = 0;

        $i++; //incrémentation de $i de +1 (=> 1)
        $i--; //décrémentation de $i de -1 (=> 0)

        $k = ++$i; //la variable $i est incrémentée de 1, puis elle est affectée à $k
        echo $i . '<br>'; //1
        echo $k . '<br>'; //1

        $k = $i++; //la variable $i est d'abord affectée à $k puis incrémentée de 1
        echo $i . '<br>'; //2
        echo $k . '<br>'; //1

// ---------------------------------------
echo '<h2> Structures conditionnelles et opérateurs de comparaison </h2>';
// ---------------------------------------

    //Structures Conditionnelles et comparateurs

        $a = 10;
        $b = 5;
        $c = 2;

        if ($a > $b){ //si la condition renvoie true, on exécute les accolades qui suivent :
            echo '$a est bien supérieur à $b <br>';
        }else { //sinon (si la condition renvoie false) on exécute le else
            echo 'Non, C\'est $b qui est supérieur à $a <br>';
        }

        if ($a > $b && $b > $c){ //&& signifie 'et'
            echo 'Les 2 conditions sont vraies <br>';
        }

        if ($a == 9 || $b > $c){ //l'opérateur de comparaison est '==' et l'opérateur 'ou' s'écrit ||
            echo 'OK pour une des deux conditions <br>';
        }else {
            echo 'les deux conditions sont fausses <br>';
        }

        if($a == 8){
            echo 'Réponse 1 <br>';
        }else if ($a != 10){ //sinon si $a différent de 10, on exécute les accolades qui suivent :
            echo 'Réponse 2 <br>';
        }else { //sinon si les deux conditiones précédentes sont fausse, on exécute les accolades qui suivent :
            echo 'Réponse 3 <br>';
        }

        if ($a == 10 XOR $b == 6){
            echo 'OK pour la condition exclusive <br>'; //si les 2 conditions sont vraies ou les 2 conditions sont fausses en même temps, nous n'entrons pas dans les accolades.
        }
        //Pour que la condition s'exécute il faut l'une soit vraie ou alors que l'autre soit vraie, mais pas les deux en même temos.

    //Conditions ternaires (forme contractée de la condition) :

        echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>';
        //le ? remplace le if, et le : remplace le else. Si a vaut 10 on fait echo du premier string, sinon du second.

    // Différence entre == et === :

        $vara = 1; //integer
        $varb = '1'; //string

        if($vara == $varb){
            echo 'il y a égalité en valeur entre les 2 variables <br>';
        }

        if($vara === $varb){
            echo 'il y a égalité en valeur ET en type entre les 2 variables <br>';
        }else{
            echo 'le type est différent <br>';
        }
        // avec la présence du triple = , la comparaison ne fonctionne pas car les variables ne sont pas du même type: ici on compare un integer avec un string.
        //avec le double égal, on ne compare que la valeur : ici la comparaison est donc juste.

        /*
        = signe d'affectation
        == comparaison en valeur
        === comparaison valeur et type (strict)
        */

    //empty() et isset() :

        //empty() : teste si c'est vide (c'est à dire 0, '', NULL, false ou undifined).
        //isset() : teste si c'est défini et a une valeur non NULL.

        $var1 = 0;
        $var2 = ''; //string vide

        if(empty($var1)) echo 'on a 0, vide, ou non définie <br>';
        if(isset($var2)) echo 'var2 existe bien <br>';

        //différence entre empty et isset : si on met les lignes 207 et 2088 en commentaire (pou les neutraliser), empty reste vrai car $var1 n'est pas définie, alors que isset est faux car $var2 n'est pas définie.

        //empty ser utilisé pour vérifier, par exemple, que les champs d'un formulaire sont remplis. isset permettra de vérifier l'existence d'un indice dans un array avant de l'utiliser.

        

?>