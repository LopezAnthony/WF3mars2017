<?php
interface Mouvement{ 
    public function start(); //Dans une interface les méthodes n'ont pas de contenu
    public function turnLeft();
    public function turnRight();
}

class Bateau implements Mouvement{ //On n'utilise pas extends, mais implements dans le cadre des interface.
    public function start(){ //OBLIGATION de définir toutes les méthodes récupérées via l'implémentation de l'interface.
    }
    public function turnLeft(){
    }
    public function turnRight(){
    }
}

class Avion implements Mouvement{
    public function start(){
    }
    public function turnLeft(){
    }
    public function turnRight(){
    }
}

/*
    Commentaires :
        - Une interface est une liste de méthodes (sans contenu) qui permets de garantir que toutes les classes qui vont implémenter l'interface contiendront les mêmes méthodes, et la même sémantique. C'est une sorte de contrat passé entre le dev' maître et les autres dev'.
        - Un interface n'est pas instanciable.
        - Une classe peut implémenter plusieurs interfaces.
        - Une classe peut à la fois extends une autres classe et implements une ou plusieurs interface(s).
        - Les méthodes d'une interface doivent forcément être public sinon elles ne peuvent pas être définies.
*/