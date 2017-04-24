<h1>Formulaire4</h1>


<?php
    //exercice : réaliser un formulaire "pseudo" et "email" dans formulaire3.php, en récupérant et affichant les informations dans formulaire4.php.
    //De plus, une fois le formulaire soumis, vous vérifiez que le pseudo n'est pas vide. Si tel est le cas, affichez un message d'erreur à l'internaute (dans formulaire4.php).

    if(!empty($_POST)){ // = si le formulaire est soumis, il y a les indices correspondants aux names
        if(!empty($_POST['pseudo'])){
            echo 'pseudo : '. $_POST['pseudo'] . '<br>';
        }else{
        echo 'erreur sur le pseudo...! <br>';
        }
        echo 'email : '. $_POST['email'] . '<br>';
    }

?>