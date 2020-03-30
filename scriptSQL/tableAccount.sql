use stady;
DROP TABLE IF EXISTS TypeAccount;

CREATE TABLE TypeAccount
(
   type_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   type_name VARCHAR(100) NOT NULL
);

INSERT INTO TypeAccount
(type_name)
VALUES
('Proviseur'),('CPE'),('Professeur'),('Eleve'),('Tuteur');