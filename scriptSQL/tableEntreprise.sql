use stady;
DROP TABLE IF EXISTS Entreprise;

CREATE TABLE Entreprise
(
   entreprise_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   entreprise_name VARCHAR(100) NOT NULL,
   entreprise_siren char(14) NOT NULL,
   entreprise_secteurActivite varchar(250),
   entreprise_tel char(12),
   entreprise_adresse VARCHAR(250),
   entreprise_cp char(5),
   entreprise_ville varchar(100),
   entreprise_nbSalaries int,
   entreprise_dateCreation date
);

INSERT INTO Entreprise
(entreprise_name,entreprise_siren)
VALUES
('SuleyConsolidated','14687631576324'),('Buy-N-Large','45796143579453');