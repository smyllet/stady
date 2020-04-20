use stady;
DROP TABLE IF EXISTS Classe;

CREATE TABLE Classe
(
   classe_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   classe_name VARCHAR(100) NOT NULL,
   classe_section_id int NOT NULL
);

INSERT INTO Classe
(classe_name, classe_section_id)
VALUES
('SIO1', 1)