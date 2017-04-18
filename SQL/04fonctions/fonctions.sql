--***************************************
--Fonctions prédéfinies
--***************************************
    --Fonctions prédéfinies : prévue par le language SQL, et exécutée par le développeur.
    
        --Dernier Id inséré:
        INSERT INTO abonne (prenom) VALUES('test'); --Ajout pour test
        SELECT LAST_INSERT_ID(); --permet d'afficher le dernier identifiant inséré

        --Fonctions de dates:
            SELECT *, DATE_FORMAT(date_rendu, '%d-%m-%Y') AS date_rendu_fr FROM emprunt; --met les dates du champ date_rendu_fr au format français JJ-MM-AAAA

            SELECT NOW(); --affiche la date et l'heure en cours
            
            SELECT CURDATE(); --retourne la date du jour au format AAAA-MM-JJ

            SELECT CURTIME(); --retourne l'heure courante au format hh:mm:ss

        --Crypter un mot de passe avec l'algorithme AES:
            SELECT PASSWORD('mypass'); --affiche 'mypass' crypté par l'algorithme AES
            INSERT INTO abonne (prenom) VALUES(PASSWORD('mypass')); --insère le mdp crypté en base

        --Concaténation:
            SELECT CONCAT('a', 'b', 'c'); --concatène les 3 chaines de charactères.
            SELECT CONCAT_WS(' - ' , 'a', 'b', 'c'); --Concat With Separator

        --Fonctions sur les chaînes de caractères:
            SELECT SUBSTRING('bonjour', 1, 3); --affiche 'bon': compte 3 à partir de la position 1.
            SELECT TRIM('   Bonjour   '); --supprime les espaces avant et après la chaîne de charactères

    --SOURCE pour trouver des fonctions SQL: sql.sh