--***************************************
-- Requêtes préparées
--***************************************

    --Les Requêtes préparées sont des Requêtes qui dissocient les phases Analyse / Interprétation / Exécution. La préparation de la requête consiste à réaliser les étapes d'analyse et d'interprétation. Ensuite on effectue l'exécution à part.

    --La séparation des phases permet de faire des gains de performance quand une requête doit être exécutée une multitude de fois. En effet, on exécute qu'une seule foit les deux premières phases, et X fois la dernière.

    --Requête préparée sans marqueur :
        --1° Préparation :
            PREPARE req FROM "SELECT * FROM employes WHERE service = 'commercial'"; --Déclare une requête préparée.
        --2° Exécution de la requête :
            EXECUTE req;
        --On peut exécuter la requête plusieurs fois sans refaire le cycle analyse / interprétation => gain de performance

    --Requête préparée avec un marqueur "?":
        --1° Préparation :
            PREPARE req2 FROM "SELECT * FROM employes WHERE prenom = ?"; --Le "?" est un marqueur qui attend une valeur
        --2° Exécution de la requête :
            SET @prenom = 'Emilie'; --déclare et affecte la variable prenom
            EXECUTE req2 USING @prenom; --On exécute la requête en utilisant la variable prenom

        --Supprimer une requête préparée :
        DROP PREPARE req2;

    --Les requêtes préparées ont une durée de vie courte : elles sont supprimées dès que l'on quitte la sesssion.