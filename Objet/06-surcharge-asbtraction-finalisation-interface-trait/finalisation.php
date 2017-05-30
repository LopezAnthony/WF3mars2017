<?php
final class Application{ //création d'une classe finale : signifiant qu'elle ne pourra pas être héritée.
    public function run(){
        return 'L\'application se lance !';
    }

}

//----------------------------------------------
// class Extension extends Application{} //IMPOSSIBLE ! Une classe finale ne peut pas être hérité.

$app = new Application; //ok ! Une classe finale peut être instanciée
$app -> run();

class Application2{
    final public function run2(){
        return 'L\'application se lance !';
    }
}

class Extension2 extends Application2{ //Ok, application2 n'est pas final donc on peut en hériter
    public function run2(){} //ERREUR ! IMPOSSIBLE de redéfinir ni de surcharger une méthode final.
}

/*
    Commentaires :
        - Une classe final ne peut pas être héritée.
        - Une classe final peut être instanciée.
        - Une classe final n'a forcément que des méthodes final puisque par définition elle ne pourra être héritée, donc ses méthodes ne pourront être surchargées ou redéfinies.

        - Une méthode final peut être présente dans une classe "normale"
        - Une méthode final ne peut être surchargée ou redéfinie
*/