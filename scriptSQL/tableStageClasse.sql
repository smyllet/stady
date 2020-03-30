use stady;
DROP TABLE IF EXISTS StageClasse;

CREATE TABLE StageClasse
(
   stageClasse_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   stageClasse_stage_id INT NOT NULL,
   stageClasse_classe_id INT NOT NULL
);