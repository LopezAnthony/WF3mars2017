<?php

class Membre {
    private $pseudo;
    private $mdp;

    public function setPseudo($arg){
        if(!empty($arg) && is_string($arg)){
            $this -> pseudo = $arg;
        }
    }

    public function getPseudo(){
        return $this -> pseudo;
    }

    public function setMdp($mdp){
        if(!empty($mdp) && is_string($mdp)){
            $salt = 'anthony' . time();
            $salt = md5($salt);
            //on enregistr le salt dans la BDD par membre
            $mdp_a_crypte = $salt . $mdp;
            $mdp_crypte = md5($mdp_a_crypte);
            $this -> mdp = $mdp_crypte;
        }
    }

    public function getMdp(){
        return $this -> mdp;
    }


}

//-----------------------------
//EXERCICE : au regard de cette classe, veuillez créer un membre, affecter des valeurs à pseudo et mdp et les afficher :
$membre = new Membre;

$membre -> setPseudo('Pseudo');
$membre -> setMdp('mdp');

echo 'Pseudo : ' . $membre -> getPseudo() . '<br>';
echo 'MDP : ' . $membre -> getMdp() . '<br>';

