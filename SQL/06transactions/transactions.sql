--***************************************
--TRANSACTIONS
--***************************************

    --Une transaction permet de lancer des requêtes, telles que des modifications, et de les annuler si besoin, comme si vous pouviez faire un "CTRL+Z".

    --Transaction simple:
        START TRANSACTION; --démarre la transaction
            SELECT * FROM employes; --pour voir la table avant modification
            UPDATE employes SET prenom = 'Reghar' WHERE id_employes = 739;

        ROLLBACK; --donne l'ordre à MySQL d'annuler la transaction, l'employe reprennant son prenom.

            --ou bien:

        COMMIT; --Valide l'ensemble de la transaction

        -- Si on ne fait ni ROLLBACK ni COMMIT avant la déconnexion au SGBD, c'est un ROLLBACK qui s'effctue par défaut.