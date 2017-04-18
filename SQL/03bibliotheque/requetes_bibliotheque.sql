--***************************************
--Création de la BDD
--***************************************
    CREATE DATABASE bibliotheque;
    USE bibliotheque;
    
    --Copie/colle le contenu de bibliotheque .sql dans la console.

--***************************************
--Exercices
--***************************************
        --1. Quel est l'id_abonne de Laura?
            SELECT id_abonne FROM abonne WHERE prenom = 'laura';

        --2. L'abonné d'id_abonne 2 est venu emprunter un Livre à quelles dates?
            SELECT date_sortie FROM emprunt WHERE id_abonne = 2;

        --3. Combien d'emprunts on été effectués en tout?
            SELECT COUNT(id_emprunt) FROM emprunt;

        --4. Combien de livres sont sortis le 2011-12-19?
            SELECT COUNT(id_emprunt) FROM emprunt WHERE date_sortie = '2011-12-19';

        --5. Une vie est de quel auteur?
            SELECT auteur FROM livre WHERE titre = 'Une vie';

        --6. De combien de livres d'Alexandre Dumas dispose-t-on ?
            SELECT COUNT(id_livre) FROM livre WHERE auteur = 'Alexandre Dumas';

        --7. Quel id_livre est le plus emprunté?
            SELECT id_livre, COUNT(id_livre) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre DESC LIMIT 0,1 ;

        --8. Quel id_abonne emprunte le plus de livres?
            SELECT id_abonne, COUNT(id_abonne) AS nombre FROM emprunt GROUP BY id_abonne ORDER BY nombre DESC LIMIT 0,1 ;

--***************************************
--Requêtes inbriquées
--***************************************
    --Syntaxe 'aide mémoire' de la requête imbriquée:
        SELECT a FROM table_de_a WHERE b IN (SELECT b FROM table_de_b WHERE condition);

    --Afin de réaliser une requête imbriquée il faut obligatoirement un champ en COMMUN entre les deux tables.

    --Un champ NULL se teste avec IS NULL :
        SELECT id_livre FROM emprunt WHERE date_rendu IS NULL; --Affiche les id_livres non rendus

    --Afficher les titres de ces livres non rendu : 
        SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

    --Afficher le n° des livres que Chloé a emprunté;
        SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe'); --quand il n'y a qu'un seul résultat dans la requête imbriquée, ont met un signe "=".

--***************************************
--Exercices requêtes imbriquées
--***************************************

    --Exercice : afficher le prénom des abonnés ayant emprunté un livre le 19-12-2011
        SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie = '2011-12-19');

    --Exercice: afficher le prénom des abonnés ayant emprunté un livre d'Alphonse Daudet
        SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN (SELECT id_livre FROM livre WHERE auteur = 'Alphonse Daudet'));

    --Exercice: afficher le ou les titres de livres que Chloé a emprunté 
        SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe'));

    --Exercice: afficher le ou les titres de livres que Chloé n'a pas encore rendu
        SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom ='Chloe') AND date_rendu IS NULL );

    --Exercice: Combien de livres Benoit a emprunté ?
        SELECT COUNT(id_livre) FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Benoit');

    --Exercice: Qui (prénom) a emprunté le plus de livres ?
        SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC LIMIT 0,1); --Remarque : On ne peut pas utiliser LIMIT dans IN mais obligatoirement dans un "="

--***************************************
--Jointures Internes
--***************************************

    --Différence entre une jointure et une requête imbriquée:
        
        --une requête imbriquée est possible seulement dans le cas où les champs affichés (ceux dans le SELECT) sont issus de la même table.
        
        --Avec une requête de jointure, les champs sélectionnés peuvent êter issus de tables différentes. Une jointure est une requête permettant de faire des relationes entre les différentes tables afin d'avoir des colonnes ASSOCIEES qu'un seul résultat.

    --Exemples:

        --Afficher les dates de sortie et de rendu pour l'abonné Guillaume:
            SELECT a.prenom, e.date_sortie, e.date_rendu 
            FROM abonne a 
            INNER JOIN emprunt e 
            ON a.id_abonne = e.id_abonne 
            WHERE a.prenom = 'Guillaume';

            --1e ligne : ce que je souhaite afficher
            --2e ligne : la 1ère table d'où proviennent les informations
            --3e ligne : la seconde table d'où proviennent les informations
            --4e ligne : la jointure qui lie les 2 tables avec le champ COMMUN
            --5e ligne : la ou les conditions supplémentaires

--***************************************
--Exercices Jointures Internes
--***************************************
    --Exercice: nous aimerions connaitre les mouvements des livres (titre, date_sortie et date_rendu) écrits par Alphonse Daudet:
        SELECT l.titre, e.date_sortie, e.date_rendu
        FROM livre l
        INNER JOIN emprunt e
        ON l.id_livre = e.id_livre
        WHERE l.auteur = 'Alphonse Daudet';

    --Exercice: qui a emprunté "Une vie" sur l'année 2011?
        SELECT a.prenom
        FROM abonne a
        INNER JOIN emprunt e
        ON a.id_abonne = e.id_abonne
        INNER JOIN livre l
        ON l.id_livre = e.id_livre
        WHERE l.titre = 'une vie' AND e.date_sortie LIKE "2011%";

    --Exercice: Afficher le nombre de livres empruntés par chaque abonné
        SELECT a.prenom, COUNT(e.date_sortie) AS 'nombre_de_livres'
        FROM abonne a
        INNER JOIN emprunt e
        ON a.id_abonne = e.id_abonne
        GROUP BY a.prenom;

    --Exercice: afficher qui a emprunté quels livres et à quelles dates de sortie ? (prenom, titre , date_sortie)
        SELECT a.prenom, l.titre, e.date_sortie
        FROM abonne a
        INNER JOIN emprunt e
        ON a.id_abonne = e.id_abonne
        INNER JOIN livre l
        ON e.id_livre = l.id_livre;
            --ICI pas de GROUP BY car il est normal que les prénoms sortent plusieurs fois (ils peuvent emprunter plusieurs livres).

    --Exercice: afficher les prenoms des abonnes avec les id_livres qu'ils ont empruntés
        SELECT a.prenom, e.id_livre
        FROM abonne a
        INNER JOIN emprunt e
        ON a.id_abonne = e.id_abonne;

--***************************************
--Jointures Externes
--***************************************
    --Une Jointure externe permet de faire des requêtes sans correspondance exigée entre les valeurs requêtées.

    --Ajoutez vous dans la table abonne:
    INSERT INTO abonne (prenom) VALUES ('Anthony');

    --EXEMPLE 1:
        --Si on relance la dernière requête de jointures internes, ci-dessous, nous n'apparaissons pas dans la liste car nous n'avons pas emprunté de livre.'
            SELECT a.prenom, e.id_livre
            FROM abonne a
            INNER JOIN emprunt e
            ON a.id_abonne = e.id_abonne;
        
        --Pour y remédier, nous faisons une jointure externe.
            SELECT a.prenom, e.id_livre
            FROM abonne a
            LEFT JOIN emprunt e
            ON a.id_abonne = e.id_abonne;

    --La clause LEFT JOIN permet de rapatrier TOUTES les données dans la table considérée comme étant à gauche de l'intruction LEFT JOIN (donc abonne dans notre cas), sans correspondance exigée dans l'autre table (emprunt ici).

    --EXEMPLE 2:
        --Voici le cas avec un livre supprimé de la bibliothèque:
        DELETE FROM livre WHERE id_livre = 100; --le livre "une Vie"

        --On visualise les emprunts avec une jointure interne :
            SELECT emprunt.id_emprunt, livre.titre
            FROM emprunt
            INNER JOIN livre
            ON emprunt.id_livre = livre.id_livre;
            --On ne voit pas dans cette requête le livre "une Vie" qui a été supprimé.

        --On fait la même chose avec une jointure externer :
            SELECT emprunt.id_emprunt, livre.titre
            FROM emprunt
            LEFT JOIN livre
            ON emprunt.id_livre = livre.id_livre;
            --Ici tous les emprunts sont affichés, y compris ceux pour lesquels les titres sont surpprimés et remplacés par NULL.

--***************************************
--UNION
--***************************************
    --Union permet de fusionner le résultat de deux requêtes dans la même liste de résultat.

    --EXEMPLE 1:
        --si on désinscrit Guillaume (suppression du profil de la table abonne), on puet afficher à la fois tous les livres empruntés, y compris ceux par des lecteurs désincrits (on affiche NULL à la place de Guillaume), et tous les abonnés, y compris ceux qui n'ont rien emprunté (on affiche NULL dans id_livre pour 'Anthony').

        --Suppression du profil de Guillaume
        DELETE FROM abonne WHERE prenom = 'Guillaume';

        --Requête sur les livres empruntés avec UNION :
        (SELECT abonne.prenom, emprunt.id_livre FROM abonne LEFT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne) UNION
        (SELECT abonne.prenom, emprunt.id_livre FROM abonne RIGHT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne);

