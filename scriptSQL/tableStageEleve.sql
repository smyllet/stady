use stady;
DROP TABLE IF EXISTS StageEleve;

CREATE TABLE StageEleve
(
   stageEleve_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   stageEleve_eleve_id INT NOT NULL,
   stageEleve_stage_id INT NOT NULL,
   stageEleve_entreprise_id INT NOT NULL,
   stageEleve_tuteur_id INT,
   stageEleve_referent_id INT,
   stageEleve_statut_id INT
);