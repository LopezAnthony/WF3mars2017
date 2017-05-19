<?php
    $pdo = new PDO('mysql:host=localhost; dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $contenu = '';

    $req = $pdo->query("SELECT id_employes, prenom FROM employes");
        while ($resultat = $req->fetch(PDO::FETCH_ASSOC)) {
            $contenu .= '<option value="'.$resultat['id_employes'] .'">'. $resultat['prenom'] .'</option>';
        }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <form id="mon_form">
            <label>Prénom</label>
            <select id="choix">
                <?php
                    //récupérer tous les prénoms présent dans la BDD entreprise sur la table employes et mettre l'id_employes dans la value
                    echo $contenu;
                ?>
            </select>
            <input type="submit" id="valider" value="Valider">
        </form>
        <div id="resultat"></div>

        <script>
            //mettre en place un événement sur la validation du fomulaire (submit)
            //bloquer le rechargement de page consecutif à la validation du formulaire
            //et déclencher une requete ajax qui envoie sur ajax.php
            //sur ajax.php récupérer les informations de l'employes correspondant à l'id récupéré
            //et envoyer une réponse sous forme de tableau html.
            document.getElementById("mon_form").addEventListener('submit', ajax);

            function ajax(evt){
                evt.preventDefault();
                var file = "ajax.php";
                var xhttp = new XMLHttpRequest();
                var champSelect = document.getElementById('choix');
                var valeur = champSelect.value;
                var parametres = "id_employes="+valeur;

                xhttp.open("POST", file, true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhttp.onreadystatechange = function(){
                    if(xhttp.readyState == 4 && xhttp.status == 200){
                        console.log(xhttp.responseText);
                        var reponse = JSON.parse(xhttp.responseText);
                        document.getElementById('resultat').innerHTML = reponse.resultat;
                    }
                }
                xhttp.send(parametres); //envoi
            }

        </script>

    </body>
</html>
