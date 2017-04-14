--Ouvrir la console SQL sous XAMPP :
    -- cd c:\xampp\mysql\bin
    -- mysql.exe -u root --password

--ligne de commentaire en SQL début par --
--les requêtes ne sont pas sensibles à la casse,mais une convention indique qu'il faut mettre les mots clés des requêtes en MAJUSCULES.

-- ***************************************
--Requêtes générales
-- ***************************************
CREATE DATABASE entreprise;    --Crée une nouvelle base de données appelée "entreprise"


SHOW DATABASES; --permet d'afficher les BDD disponibles

--NE PAS SAISIR dans la console :
DROP DATABASE entreprise; --supprimer la BDD entreprise
DROP TABLE employess; --supprimer la table employes
TRUNCATE employes; --vider la table emplyés de son contenu


-- On peut coller dans la console :
USE entreprise; --se connectter à la BDD entreprise

SHOW TABLES; --permet de lister les tables de la BDD en cours d'utilisation

DESC employes; --observer la structure de la table ainsi que les champs

-- ***************************************
--Requêtes de sélection
-- ***************************************

SELECT nom, prenom FROM employes; --affiche (sélectionne) le nom et le prénom de la table employes : SELECT sélectionne les champs indiqués, FROM la ou les tables utilisées

SELECT service FROM employes; --affiche les services de l'entreprise

--DISTINCT
--On a vu dans la requête précédente que les services sont affichés plusieurs fois. Pour éliminer les doubles , on utilise DISTINCT :
SELECT DISTINCT service FROM employes;

--ALL ou *
--On peut afficher toutes les informations issues d'une table avec "*" (pour dire ALL) :
SELECT * FROM employes;

--clause WHERE
SELECT prenom, nom FROM employes WHERE service = 'informatique'; --affiche le prenom et le nom des employes du service informatique. Notez que le nom des champs ou des tables ne prennent pas de quotes, alors que les valeurs telle que 'informatique' prennent des quotes(guillements). Cependant, s'il s'agit d'un chiffre, on ne lui met pas de quote.

--BETWEEN
SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31'; --affiche les employes dont la date d'embauche est entre 2006 et 2010

--LIKE
SELECT prenom FROM employes WHERE prenom LIKE 's%'; --affiche les prenoms des employes commençant par S. Le signe % est un joker qui remplace les autres caractères.
SELECT prenom FROM employes WHERE prenom LIKE '%-%'; --affiche les prenoms des employes qui contiennent un tiret. LIKE est utilisé entre autre pour les formulaires de recherche sur les sites.

--Opérateurs de comparaisons :
SELECT prenom, nom, service FROM employes WHERE service != 'informatique'; --affiche le prenom et le  nom des employes n'étant pas du service informatique

--= égale 
--< plus petit
--> plus grand
-->= plus grand ou égal
--<= plus petit ou égal
--!= ou encore <> pour différent de

--ORDER BY pour faire des tris :
SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire; --affiche les employes par salaire en ordre croissant par défaut.
SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire ASC, prenom DESC; --ASC pour un tri ascendant, DESC pour un tri descendant. Ici on trie les salaires par ordre croissant puis à salaire identique, les prenoms par ordre décroissant.

--LIMIT
SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1; --affiche l'employe ayant le salaire le plus élevé : on trie d'abord les salaires par ordre décroissant (pour avoir le plus élevé en premier), puis on limite le résuiltat au premier enregistrement avec LIMIT 0,1. Le 0 signifie le point de départ de LIMIT, et le 1 signifie prendre 1 enregistrement. On utilise LIMIT dans la pagination sur les sites.

--L'alias avec AS :
SELECT nom, prenom, salaire * 12 AS salaire_annuel FROM employes; --affiche le salaire sur 12 mois des employés. salaire_annuel est un alias qui "stocke" la valeur  de ce qui précède.

--SUM
SELECT SUM(salaire * 12 )FROM employes; --affiche le salaire total annuel de tous les employes. SUM permet d'additionner des valeurs de champs différents.

--MIN et MAX :
SELECT MIN(salaire)FROM employes; --affiche le salaire le plus bas
SELECT MAX(salaire)FROM employes; --affiche le salaire le plus haut

SELECT prenom, MIN(salaire) FROM employes; --ne donne pas le résultat attendu, car affiche le premier prénom rencontré dans la table (Jean-Pierre). Il faut pour répondre à cette question utiliser ORDER BY et LIMIT comme au-dessus.
SELECT prenom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

--AVG (average)
SELECT AVG(salaire) FROM employes; --affiche le salaire moyen de l'entreprise

--ROUND
SELECT ROUND(AVG(salaire), 1) FROM employes; --affiche le salaire moyen arrondi à 1 chiffre après la virgule

--COUNT
SELECT COUNT(id_employes) FROM employes WHERE sexe = "f"; --affiche le nombre d'employées féminins'

--IN
SELECT prenom, service FROM employes WHERE service IN ('comptabilité', 'informatique'); --affiche les employes appartenant à la comptabilité ou à l'informatique.

--NOT IN
SELECT prenom, service FROM employes WHERE service NOT IN ('comptabilité', 'informatique'); --affiche les employes n'appartenant à la comptabilité ou à l'informatique.

--AND et OR
SELECT prenom, service, salaire FROM employes WHERE service = 'commercial' AND salaire <= 2000; --affiche le prenom des commerciaux dont le salaire est inférieur ou égal à 2000;
SELECT prenom, service, salaire FROM employes WHERE (service = 'production' AND salaire = 1900) OR salaire = 2300; --affiche les employes du service production dont le salaire est de 1900, ou dans les autres services ceux qui gagnent 2300.

--GROUP BY
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service; --affiche le nombre d'employes PAR service. GROUP BY distribue les résultats du comptage par les services correspondants