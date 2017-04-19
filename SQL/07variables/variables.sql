--***************************************
-- Les VARIABLES en SQL
--***************************************

    --Une variable est un espace mémoire nommé qui permet de conserver une valeur.

        --Permet d'observer les variables système:
        SHOW VARIABLES;

        SELECT @@version; --on met deux @ pour accèder à une variable système

    --Déterminer nos propres variables :
        SET @ecole = 'WF3'; --déclare une variable ecoler et lui affecte la valeur 'WF3'.
        SELECT @ecole; --on peut accéder au contenu de cette variable par son nom.

