<?php
//surcharge ou Override : permet de modifier le comportement d'un méthode héritée et d'y apporter des traitements suplémentaires.
//surcharge != redéfinition

class A{
    public function calcul(){
        return 10;
    }
}

class B extends A{ //B hérite de A
    public function calcul(){
        // return $this -> calcul() + 5 Ne Fonctionne pas car s'appelle soit-même : recursivité

        // return A::calcul() + 5 Ne fonctionne pas car calcul() n'est pas static
        
        return parent::calcul() + 5; //OK ! Permet d'appeler le comportement de la méthode calcul() telle que définie dans la classe parente.
    }
}