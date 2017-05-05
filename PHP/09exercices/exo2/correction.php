<?php

    function afficheDate($date, $format){
        //version avec objet date:
        $objetDate = new DateTime($date);

        if($format == 'FR'){
            return $objetDate->format('d-m-Y') . '<br>' ;
        }elseif ($format =='US'){
            return $objetDate->format('Y-m-d') . '<br>' ;
        }else{
            return 'Le format demandé n\'est pas correct';
        }

        //Autre version:
        if($format == 'FR'){
            return strftime('%d-%m-%Y', strtotime($date)); //strtotime retourne la date donnée en timestamp. strftime retourne le timestamp formaté selon le format indiqué avec des %.
        }elseif($format == 'US'){
            return strftime('%Y-%m-%d', strtotime($date));
        }else{
            return 'Le format demandé n\est pas correct';
        }
    }

echo afficheDate('05-05-2017', 'US');
echo afficheDate('2017-05-05', 'FR');
?>