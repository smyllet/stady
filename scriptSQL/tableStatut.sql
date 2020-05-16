use stady;
DROP TABLE IF EXISTS Statut;

CREATE TABLE Statut
(
   statut_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   statut_name VARCHAR(250)
);

INSERT INTO Statut (statut_name) VALUES ("Recherche"),("Convention en cours"),("Convention Signé")