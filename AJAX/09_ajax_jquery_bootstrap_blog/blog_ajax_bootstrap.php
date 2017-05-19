<?php
require_once('inc/init.inc.php');








require_once('inc/header.inc.php');
// require_once('inc/nav.inc.php');
?>
<div class="container">
    <div class="col-sm-6 col-sm-offset-3" id="enregistrer" ></div>
    <div class="col-sm-6 col-sm-offset-3">
        <h1>
            <span class="glyphicon glyphicon-user"></span>
            &nbsp;Enregistrer un article
        </h1>
        <form action="ajax.php" id="form">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="titre" id="titre">

                <label for="auteur">Auteur</label>
                <input type="text" class="form-control" name="auteur" id="auteur">

                <label for="contenu">Contenu</label>
                <textarea name="contenu" id="contenu" class="form-control"></textarea>

                
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
    </div>

    <div class="col-sm-6 col-sm-offset-3">
        <h1>
            <span class="glyphicon glyphicon-list" style="color: plum"></span>
            &nbsp;Liste des articles
        </h1>
        <hr>
    </div>
    <div class="col-sm-12" id="liste"></div>

</div>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>
        //à placer de préférence dans le footer.inc.php avec la ligne au dessus d'appel de jquery
        $(document).ready(function () {

            $('#form').on("submit", function(evt){
                evt.preventDefault();
                var url = $(this).attr('action'); //on récupère le fichier cible dans l'attribut action du form
                var parametres = $(this).serialize() + '&mode=enregistrer';
                console.log(parametres);
                console.log(url);

                $.post(url, parametres, function(reponse){
                    $('#enregistrer').html(reponse.resultat);
                }, "json");

            });

            setInterval(function(){ 
                var parametres = 'mode=liste';
                console.log(parametres);
                $.post("ajax.php", parametres, function(reponse){
                        $('#liste').html(reponse.resultat);
                }, "json");
            }, 3000);




        });
    </script>

<?php
require_once('inc/footer.inc.php');
?>

