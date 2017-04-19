--***************************************
--Exercice
--***************************************

    --1. Qui conduit la voiture d'id_vehicule 503?
        --Solution 1°:
            SELECT prenom FROM conducteur WHERE id_conducteur IN ( SELECT id_conducteur FROM association_vehicule_conducteur WHERE id_vehicule = 503); --IMBRIQUER

        --Solution 2°:
            SELECT c.prenom, c.nom 
            FROM conducteur c 
            INNER JOIN association_vehicule_conducteur a 
            ON c.id_conducteur = a.id_conducteur 
            WHERE a.id_vehicule = 503; --Jointure interne

    --2. Qui (prenom) conduit quel modele ?
        SELECT c.prenom, v.modele
        FROM conducteur c
        INNER JOIN association_vehicule_conducteur a
        ON c.id_conducteur = a.id_conducteur
        INNER JOIN vehicule v
        ON a.id_vehicule = v.id_vehicule;

    --3. Insérez vous dans la table conducteur. Puis afficher tous les conducteurs (même ceux qui n'ont pas de véhicule affecté) ainsi que les modeles de véhicules.
        INSERT INTO conducteur (prenom, nom) VALUES ('Anthony', 'Lopez');

        SELECT c.prenom, c.nom, v.modele
        FROM conducteur c
        LEFT JOIN association_vehicule_conducteur a
        ON c.id_conducteur = a.id_conducteur
        LEFT JOIN vehicule v
        ON a.id_vehicule = v.id_vehicule;

    --4. Ajoutez l'enregistrement suivant : 
        INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES ('renault', 'Espace', 'Noir', 'ZE-123-RT');
        --Puis afficher tous les modèles de véhicule, y compris ceux qui n'ont pas de chauffeur affecté, et le prénom des conducteurs.

        SELECT v.modele, c.prenom
        FROM vehicule v
        LEFT JOIN association_vehicule_conducteur a
        ON v.id_vehicule = a.id_vehicule
        LEFT JOIN conducteur c 
        ON a.id_conducteur = c.id_conducteur;

    --5. Afficher les prénoms des conducteurs (y compris ceux qui n'ont pas de véhicule) et tous les modèles  (y compris ceux qui n'ont pas de chauffeur)
        (SELECT c.prenom, v.modele
        FROM conducteur c
        LEFT JOIN association_vehicule_conducteur a
        ON c.id_conducteur = a.id_conducteur
        LEFT JOIN vehicule v
        ON a.id_vehicule = v.id_vehicule)
        UNION
        (SELECT c.prenom, v.modele
        FROM vehicule v
        LEFT JOIN association_vehicule_conducteur a 
        ON a.id_vehicule = v.id_vehicule
        LEFT JOIN conducteur c
        ON a.id_conducteur = c.id_conducteur);