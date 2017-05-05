<?php
require_once('inc/init.inc.php');
//---------------------TRAITEMENT--------------------------
    //Si visiteur non connecté, on l'envoie vers la page de connection
    if(!internauteEstConnecte()){
        header('location:connexion.php'); //nous l'invitons à se connecter'
        exit();
    }

    //exercice:
    // $contenu .= 'Bonjour ' . $_SESSION['membre']['pseudo'] . '<br>Votre mail : ' . $_SESSION['membre']['email'] . '<br>Votre adresse : ' .$_SESSION['membre']['adresse'] . '<br>Votre CP : ' .$_SESSION['membre']['code_postal'];

    //correction:
    $contenu .= '<h2>Bonjour ' . $_SESSION['membre']['pseudo'] . ' !</h2>';

    //On affiche le statut du membre:
    if($_SESSION['membre']['statut'] == 1){
        $contenu .= '<p>Vous êtes un administrateur.</p>';
    }else{
        $contenu .= '<p>Vous êtes un membre.</p>';
    }

        $contenu .= '<div><h3>Voici vos informations de profil</h3>';
        $contenu .= '<p>Votre email : '.$_SESSION['membre']['email'].'</p>';
        $contenu .= '<p>Votre adresse : '.$_SESSION['membre']['adresse'].'</p>';
        $contenu .= '<p>Votre code postal : '.$_SESSION['membre']['code_postal'].'</p>';
        $contenu .= '<p>Votre ville : '.$_SESSION['membre']['ville'].'</p>';
    $contenu .= '</div>';

    /*
    Exercice:
        1.Afficher le suivi des commandes du membre (s'il y en a) dans une liste <ul><li> : id_commande, date et état de la commande S'il n'y en a pas, vous affichez "aucune commande en cours".
        2.
    */

        $var = $_SESSION['membre']['id_membre'];

        $resultat = executeRequete("SELECT id_commande, date_enregistrement, etat FROM commande WHERE id_membre = $var");

        while($suivi = $resultat->fetch(PDO::FETCH_ASSOC)){

        $contenu .= '<ul>
                        <li>'. $suivi['id_commande'] .'</li>
                        <li>'. $suivi['date_enregistrement'] .'</li>
                        <li>'. $suivi['etat'] .'</li>
                    </ul>';
        }




//---------------------AFFICHAGE--------------------------
require_once('inc/haut.inc.php');
echo $contenu; 
require_once('inc/bas.inc.php');






?>