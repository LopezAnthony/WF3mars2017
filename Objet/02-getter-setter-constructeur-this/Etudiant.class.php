<?php

class Etudiant {
    private $prenom;

    public function __construct($prenom){ //Méthode magique qui s'exécute au moment de l'instanciation.
        $this -> setPrenom($prenom);
    }

    public function setPrenom($prenom){
        $this -> prenom = $prenom;
    }

    public function getPrenom(){
        return $this -> prenom;
    }
}

//------------------------------
$etudiant = new Etudiant('Anthony');
echo 'Prénom : ' .  $etudiant -> getPrenom();
//EXERCICE : Essayer d'affecter une valeur à prenom en modifiant UNIQUEMENT l'intérieur de la classe.