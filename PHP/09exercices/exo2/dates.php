<?php
/*
    1-Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement. Cette fonction prend 2 paramètres: une date (valide) et le format de conversion "US" ou "FR"
    2-Vous validez que le paramètre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.
*/

    function afficherDate($date, $langue){
            if($langue == 'FR'){
                $date = strftime('%d-%m-%Y', strtotime($date));
                return $date . ' ' . $langue . '<br>';
            }elseif ($langue == 'US'){
                $date = strftime('%m-%d-%Y', strtotime($date));
                return $date. ' ' . $langue ;
            }else{
                return '<br>Nope <br>';
            }
        }
    }

    echo afficherDate('2015-12-31', 'FR');
    echo afficherDate('31-12-2015', 'US');
    echo afficherDate('23-05-2015', 'ES');