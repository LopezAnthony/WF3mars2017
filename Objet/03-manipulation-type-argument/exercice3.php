<?php
class Vehicule {
    private $litreEssence; //Nbre de litres d'essence dans le véhicule
    private $reservoir; //Capacité max du réservoir

    public function getLitreEssence(){
        return $this -> litreEssence;
    }

    public function setLitreEssence($litre){
        $this -> litreEssence = $litre;
    }

    public function getReservoir(){
        return $this -> reservoir;
    }

    public function setReservoir($reservoir){
        $this -> reservoir = $reservoir;
    }

}

$vehicule = new Vehicule;
$vehicule -> setLitreEssence(5);
$vehicule -> setReservoir(50);
echo 'Litre d\'essence dans le véhicule : ' . $vehicule -> getLitreEssence() . '<br>';

//----------------------------
class Pompe {

    private $litreEssence;

    public function getLitreEssence(){
        return $this -> litreEssence;
    }

    public function setLitreEssence($litre){
        $this -> litreEssence = $litre;
    }

    public function donneEssence(Vehicule $v){
        $litre_a_mettre = $v -> getReservoir() - $v -> getLitreEssence(); // 45 = 50 - 5
        $v -> setLitreEssence($v -> getLitreEssence() + $litre_a_mettre);  //Affecte 50 au véhicule;
        $this -> setLitreEssence($this -> getLitreEssence() - $litre_a_mettre) ;
    }

}

$pompe = new Pompe;
$pompe -> setLitreEssence(800);
echo 'Litre d\'essence dans la pompe : ' . $pompe -> getLitreEssence() . '<br>';

$pompe -> donneEssence($vehicule);
echo 'Litre d\'essence dans le véhicule après ravitaillement : ' . $vehicule -> getLitreEssence() . '<br>';
echo 'Litre d\'essence dans la pompe après ravitaillement : ' . $pompe -> getLitreEssence() ;

//----------------------------

