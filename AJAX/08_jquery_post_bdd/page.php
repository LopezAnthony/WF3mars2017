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

        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function () {
                $('#mon_form').on('submit', function(evt){
                    evt.preventDefault();

                    var parametres = "id_employes="+$('#choix').val();
                    $.post("ajax.php", parametres, function(reponse){
                        $('#resultat').html(reponse.resultat);
                    }, "json");
                });
            });
        </script>

        <!--https://api.jquery.com/jquery.post/-->

    </body>
</html>
