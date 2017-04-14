--***************************************
--Création de la BDD
--***************************************
    CREATE DATABASE bibliotheque;
    USE bibliotheque;
    
    --Copie/colle le contenu de bibliotheque .sql dans la console.

--***************************************
--Création de la BDD
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